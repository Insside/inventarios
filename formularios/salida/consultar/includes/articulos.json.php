<?php

$ROOT = (!isset($ROOT)) ? "../../../../../../" : $ROOT;
require_once($ROOT . "modulos/inventarios/librerias/Configuracion.cnf.php");
header('Content-Type: application/json');

Sesion::init();
$ia = new Inventarios_Articulos();
$isdd = new Inventarios_Salidas_Detalles_Devoluciones();
$isdl = new Inventarios_Salidas_Detalles_Legalizaciones();
$isds = new Inventarios_Salidas_Detalles_Seriales();
$usuario = Sesion::usuario();
$color["black25p"] = "rgba(0,0,0,0.25)";
/** Variables Recibidas * */
$d['grid'] = Request::getValue("grid");
$d['criterio'] = Request::getValue("criterio");
$d['valor'] = Request::getValue("valor");
$d['inicio'] = Request::getValue("inicio");
$d['final'] = Request::getValue("final");
$d['transaccion'] = Request::getValue("transaccion");
$d['page'] = Request::getValue("page");
$d['perpage'] = Request::getValue("perpage");
/** Verificaciones * */
/**
 * Se evalua el comportamiento en caso de no recibir el periodo inicio y final de la consulta para lo 
 * cual se presuponen la fecha de la primera solicitud y la ultima que se hallan registrado por
 * el usuario activo en el sistema de atencion de solicitudes.
 */
$d['inicio'] = empty($d['inicio']) ? "2012-01-01" : $d['inicio'];
$d['final'] = empty($d['final']) ? "2018-01-01" : $d['final'];

/* * Variables Definidas * */
if (!empty($d['page'])) {
    $pagination = true;
    $page = intval($d['page']);
    $perpage = intval($d['perpage']);
    $n = ( $page - 1 ) * $perpage;
    $limite = "LIMIT $n, $perpage";
} else {
    $pagination = false;
    $page = 1;
    $perpage = 20;
    $n = 0;
    $limite = "LIMIT $n, $perpage";
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
if (!empty($d['criterio']) && !empty($d['valor']) && $d['criterio'] != "estado") {
    $buscar = "WHERE(`" . $d['criterio'] . "` ='{$d['valor']}')";
} else {
    $buscar = "";
}

$db = new MySQL(Sesion::getConexion());
$consulta = $db->sql_query(""
        . "SELECT * "
        . "FROM `inventarios_salidas_detalles` {$buscar} "
        . "ORDER BY `detalle` "
        . "DESC;");
$total = $db->sql_numrows($consulta);

$sql = ""
        . "SELECT * "
        . "FROM `inventarios_salidas_detalles` {$buscar} "
        . "ORDER BY `detalle`  "
        . "DESC {$limite}";
//echo($sql);
$consulta = $db->sql_query($sql);
$ret = array();
$conteo = 0;
while ($fila = $db->sql_fetchrow($consulta)) {
    $conteo++;
    $articulo = $ia->consultar($fila["articulo"]);
    $fila["conteo"] = $conteo;
    $fila["codigo"] = "<b>{$articulo["codigo"]}</b>";
    $fila["articulo"] = "{$fila["articulo"]}";
    $fila["nombre"] = htmlentities(urldecode($articulo["nombre"])) . "...";
    if ($articulo["serializable"] == "SI") {
        $sns = $isds->getCount($fila["detalle"]) . "/" . intval($fila["cantidad_entregada"]);
        $fila["seriales"] = "<a href=\"#\" onClick=\"MUI.Inventarios_Salida_Detalle_Serializacion('{$fila["detalle"]}','{$d['grid']}');\">{$sns}</a>";
    } else {
        $fila["seriales"] = "NO";
    }
    /** Evaluaciones previas * */
    $ce=$fila["cantidad_entregada"];
    $cd = $isdd->getSummatory($fila["detalle"]);
    $cl = $ce - $cd;
    $cc = $isdl->getSummatory($fila["detalle"]);
    $cp = $cl-$cc;
    /** Condideraciones de forma * */
    if ($cd == "0.00") {
        $cdcolor = $color["black25p"];
    } else {
        $cdcolor = "blue";
    }



    if ($cc == "0.00") {
        $cccolor = $color["black25p"];
    } else {
        $cccolor = "green";
    }


    if ($cp == "0.00") {
        $cp = "0.00";
        $cpcolor = $color["black25p"];
    } else {
        $cpcolor = "red";
    }

    $fila["cantidad_solicitada"] = "<span style=\"color:red;\">{$fila["cantidad_solicitada"]}</span>";
    $fila["cantidad_entregada"] = "<span style=\"color:green;font-weight:800;\">".number_format($ce,2)."</span>";
    $fila["cantidad_devuelta"] = "<span style=\"color:{$cdcolor};font-weight:800;\">".number_format($cd,2)."</span>";
    $fila["cantidad_legalizable"] = "<span style=\"color:blue;\">{$cl}</span>";
    $fila["cantidad_cobrada"] = "<span style=\"color:{$cccolor};font-weight:800;\">".number_format($cc,2)."</span>";
    $fila["cantidad_pendiente"] = "<span style=\"color:{$cpcolor};font-weight:800;\">".number_format($cp,2)."</span>";
    /** Observación * */
    if (!empty($fila["observacion"])) {
        $fila["observacion"] = "SI";
    }
    array_push($ret, $fila);
}

$db->sql_close();
echo json_encode(array("sql" => $sql, "uid" => $usuario['usuario'], "page" => $page, "total" => $total, "data" => $ret));
/** Liberando Memoria * */
unset($ia);
unset($isdd);
unset($isdl);
unset($isds);
unset($usuario);
unset($d);
unset($db);
unset($consulta);
unset($fila);
?>