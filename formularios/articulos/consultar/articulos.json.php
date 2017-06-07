<?php

$ROOT = (!isset($ROOT)) ? "../../../../../" : $ROOT;
require_once($ROOT . "modulos/inventarios/librerias/Configuracion.cnf.php");
header('Content-Type: application/json');

Sesion::init();
/** Variables Recibidas * */
$v["uid"]=Sesion::getUser();
$v['criterio'] = Request::getValue("criterio");
$v['valor'] = Request::getValue("valor");
$v['inicio'] = Request::getValue("inicio");
$v['final'] = Request::getValue("final");
$v['transaccion'] = Request::getValue("transaccion");
$v['page'] = Request::getValue("page");
$v['perpage'] = Request::getValue("perpage");
$v['inicio'] = empty($v['inicio']) ? "2012-01-01" : $v['inicio'];
$v['final'] = empty($v['final']) ? Dates::getDate(): $v['final'];

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

if (!empty($v['criterio']) && !empty($v['valor']) && $v['criterio'] != "estado") {
    $buscar = "WHERE((`fecha` BETWEEN '" . $v['inicio'] . "' AND '" . $v['final'] . "')"
            . "AND(`" . $v['criterio'] . "` LIKE '%" . $v['valor'] . "%')"
            . ")";
} else {
    $buscar = "";
}

$db = new MySQL(Sesion::getConexion());
$consulta = $db->sql_query(""
        . "SELECT * "
        . "FROM `inventarios_articulos` " . $buscar . " "
        . "ORDER BY `articulo` "
        . "DESC;");
$total = $db->sql_numrows($consulta);

$sql = ""
        . "SELECT * "
        . "FROM `inventarios_articulos` " . $buscar . " "
        . "ORDER BY `articulo`  "
        . "DESC " . $limite;

$consulta = $db->sql_query($sql);
$ret = array();
while ($fila = $db->sql_fetchrow($consulta)) {
    $fila['detalles'] = $fila['nombre'] . " <i>" . $fila['codigo'] . "</i>";
    if($fila["estado"]=="ACTIVO"){
        $fila["estado"]="<span class=\"estado-exitoso\">ACT</span>";
    }else{
        $fila["estado"]="<span class=\"estado-deshabilitado\">DES</span>";
    }
    array_push($ret, $fila);
    unset($fila);
}

$db->sql_close();
echo json_encode(array("sql" => $sql, "uid" => $v['uid'], "page" => $page, "total" => $total, "data" => $ret));
/** Liberando Memoria **/
unset($v);
unset($db);
unset($consulta);
?>