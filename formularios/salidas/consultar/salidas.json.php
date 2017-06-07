<?php

$ROOT = (!isset($ROOT)) ? "../../../../../" : $ROOT;
require_once($ROOT . "modulos/inventarios/librerias/Configuracion.cnf.php");
header('Content-Type: application/json');

Sesion::init();
$r = new Request();
$cadenas = new Cadenas();
$fechas = new Fechas();
$ie = new Inventarios_Empleados();
$is = new Inventarios_Salidas();
$ius = new Inventarios_Usuarios();
$icc = new Inventarios_Centros();
$usuario = $ius->consultar(Sesion::getUser());


/** Variables Recibidas * */
$v['criterio'] = $r->getValue("criterio");
$v['valor'] = $r->getValue("valor");
$v['inicio'] = $r->getValue("inicio");
$v['final'] = $r->getValue("final");
$v['transaccion'] = $r->getValue("transaccion");
$v['page'] = $r->getValue("page");
$v['perpage'] = $r->getValue("perpage");
/** Verificaciones * */
/**
 * Se evalua el comportamiento en caso de no recibir el periodo inicio y final de la consulta para lo 
 * cual se presuponen la fecha de la primera solicitud y la ultima que se hallan registrado por
 * el usuario activo en el sistema de atencion de solicitudes.
 */
$v['inicio'] = empty($v['inicio']) ? "2012-01-01" : $v['inicio'];
$v['final'] = empty($v['final']) ? "2018-01-01" : $v['final'];

/* * Variables Definidas * */
if (!empty($v['page'])) {
    $pagination = true;
    $page = intval($v['page']);
    $perpage = intval($v['perpage']);
    $n = ( $page - 1 ) * $perpage;
    $limite = "LIMIT $n, $perpage";
} else {
    $pagination = false;
    $page = 1;
    $perpage = 20;
    $n = 0;
    $limite = "LIMIT $n, $perpage";
}

if (!empty($v['criterio']) && $v['criterio'] == "centro_costos") {
    $centro = $icc->getCentro($v['valor']);
    $v['valor'] = $centro;
}

/**
 * En este segmento se evalua si se esta recibiendo o no un criterio y un valor a buscar segun el 
 * criterio adicionalmente se contempla la propiedad y responsabilidad del usuario activo sobre los 
 * registros visualizados. En terminos de criterios existe un criterio especial que se utiliza para
 * identificar una peticion en la que solo se desean ver aquellas solicitudes que se encuentran 
 * pendientes de respuesta, ese criterio es "estado", donde no existe ningun campo denominado 
 * estado pero se usa para definir si los registros se muestran como se hace habitualmente o 
 * solamente aquellos que correspondan a peticiones a la espera de respuesta.
 * */
if (!empty($v['criterio']) && !empty($v['valor']) && $v['criterio'] != "estado") {
    $restriccion = array();
    if ($ius->permiso("INVENTARIOS-SOLICITUDES-CONSULTAR-TODAS", $usuario["usuario"])) {
        $restriccion = "";
    } elseif ($ius->permiso("INVENTARIOS-SOLICITUDES-CONSULTAR-EQUIPO", $usuario["usuario"])) {
        $restriccion = "`equipo`='{$usuario['equipo']}'";
    } elseif ($ius->permiso("INVENTARIOS-SOLICITUDES-CONSULTAR", $usuario["usuario"])) {
        $restriccion = "`creador`='{$usuario["usuario"]}'";
    }

    if ($ius->permiso("INVENTARIOS-SOLICITUD-VER-SOLO-APROBADAS", $usuario["usuario"])) {
        $aprobacion = "";
    }

    /** Disponibles * */
    if (empty($restriccion)) {
        $buscar = "WHERE("
                . "(`fecha` BETWEEN '{$v['inicio']}' AND '{$v['final']}')AND"
                . "(`{$v['criterio']}` LIKE '%{$v['valor']}%')"
                . ")";
    } else {
        $restriccion = "({$restriccion})AND";
        $buscar = "WHERE({$restriccion}"
                . "(`fecha` BETWEEN '{$v['inicio']}' AND '{$v['final']}')AND"
                . "(`{$v['criterio']}` LIKE '%{$v['valor']}%')"
                . ")";
    }
} else {
    /** Restricciones relacionadas con las consultas * */
    $restriccion = array();
    if ($ius->permiso("INVENTARIOS-SOLICITUDES-CONSULTAR-TODAS", $usuario["usuario"])) {
        $restriccion = "";
    } elseif ($ius->permiso("INVENTARIOS-SOLICITUDES-CONSULTAR-EQUIPO", $usuario["usuario"])) {
        $restriccion = "`equipo`='{$usuario['equipo']}'";
    } elseif ($ius->permiso("INVENTARIOS-SOLICITUDES-CONSULTAR", $usuario["usuario"])) {
        $restriccion = "`creador`='{$usuario["usuario"]}'";
    }

    if ($ius->permiso("INVENTARIOS-SOLICITUD-VER-SOLO-APROBADAS", $usuario["usuario"])) {
        $aprobacion = "";
    }
    /** Disponibles * */
    if (empty($restriccion)) {
        $buscar = "";
    } else {
        $buscar = "WHERE({$restriccion})";
    }
}

$db = new MySQL(Sesion::getConexion());
$consulta = $db->sql_query(""
        . "SELECT * "
        . "FROM `inventarios_salidas` " . $buscar . " "
        . "ORDER BY `salida` "
        . "DESC;");
$total = $db->sql_numrows($consulta);

$sql = ""
        . "SELECT * "
        . "FROM `inventarios_salidas` " . $buscar . " "
        . "ORDER BY `salida`  "
        . "DESC " . $limite;
//echo($sql);
$consulta = $db->sql_query($sql);
$ret = array();
while ($fila = $db->sql_fetchrow($consulta)) {
    $empleado = $ie->consultar($fila["tercero"]);
    $creador = new Inventarios_Usuario($fila["creador"]);
    $autoriza = new Inventarios_Usuario($fila["autoriza"]);
    $centro = $icc->consultar($fila["centro_costos"]);

    $fila["solicita"] = $creador->getAlias();
    $fila["aprueba"] = $autoriza->getAlias();
    $fila["centro_costos"] = $centro["codigo_contable"];
    //$autoriza=$ius->consultar($fila["autoriza"]);
    //$iusa=new Inventarios_Usuario_Perfil($autoriza["perfil"]);
    /**
     * Cada fila representa una solicitud y cada solicitud se le evaluan multiples datos cuyo resultado
     * repercute en los elementos graficos visualizados a manera de estados. En primera instancia se 
     * debe de evaluar el estado general de la solicitud en los indicadores S.R.N.T.A. los datos de esta 
     * evaluación se depositaran en un vector de estados "$e[]" donde su analisis determina el estado
     * general de la solicitud, del cual se asume en primera instancia que es "pendiente" de solucionar
     * es decir ($e['general']=false;) o notificar, pero segun los indicadores recibidos se puede asumir 
     * como "resuelta" ($e['general']=true;).
     */
    $estado['cobro'] = $is->estado_cobro($fila['salida']);
    $indicadores = ""
            . "<a href=\"#\" onClick=\"#\"><div class=\"i016x016_" . strtolower($estado['cobro']) . "\"></div></a>"
            . "";
    $fila["estados"] = $indicadores;
    $fila['codigo'] = "<b>" . $fila['salida'] . "</b>";
    $fila["nempleado"] = $cadenas->capitalizar($empleado["nombres"] . " " . $empleado["apellidos"]);
    //$fila["nautoriza"]=$cadenas->capitalizar($iusa->getNombre());
    //$fila["icreador"]="<a href=\"#\" onclick=\"return(false);\"><div class=\"i016x016_tag\"></div></a>";
    if ($fila["autorizado"] == "SI") {
        $ee = "<span class=\"estado-exitoso\">AUT</span>";
    } else {
        $ee = "<span class=\"estado-pendiente\">AUT</span>";
    }

    if ($fila["autorizado"] == "SI") {
        $ies = $is->disavowStatus($fila["salida"]);
        if ($ies) {
            $ee .= "<span class=\"estado-pendiente\">ENT</span>";
        } else {
            $ee .= "<span class=\"estado-exitoso\">ENT</span>";
        }
    } else {
        $ee .= "<span class=\"estado-deshabilitado\">ENT</span>";
    }
    /** Realizo el calculo de las legalizaciones * */
    if ($fila["autorizado"] == "SI") {
        if (!$ies) {
            $isel = $is->getStatusLegalizacion($fila["salida"]);
            if ($isel) {
                $ee .= "<span class=\"estado-exitoso\">LEG</span>";
            } else {
                $ee .= "<span class=\"estado-pendiente\">LEG</span>";
            }
        } else {
            $ee .= "<span class=\"estado-deshabilitado\">LEG</span>";
        }
    } else {
        $ee .= "<span class=\"estado-deshabilitado\">LEG</span>";
    }
    $fila["estadoentrega"] = $ee;

    array_push($ret, $fila);
}

$db->sql_close();
echo json_encode(array(
    "php" => round(memory_get_usage() / 1048576, 2) . "MB",
    "sql" => $sql,
    "uid" => $usuario,
    "page" => $page,
    "total" => $total,
    "memory_usage" => memory_get_usage(),
    "data" => $ret));
/** Optimizando Memoria * */
unset($r);
unset($cadenas);
unset($fechas);
unset($ie);
unset($is);
unset($ius);
unset($icc);
unset($usuario);
unset($v);
unset($db);
unset($fila);
unset($empleado);
unset($creador);
unset($autoriza);
unset($consulta);
unset($ret);
unset($ies);
unset($estado);
unset($indicadores);
unset($ee);
unset($centro);
//echo("//".round(memory_get_usage() / 1048576, 2) . "MB");
?>