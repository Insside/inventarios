<?php
$ROOT=(!isset($ROOT))?"../../../../../../../../":$ROOT;
require_once($ROOT."modulos/aplicacion/librerias/Configuracion.cnf.php");
error_reporting(E_ALL);
header('Content-Type: application/json');
$v=new Validaciones();
$articulo=$v->recibir("articulo");

$db = new MySQL(Sesion::getConexion());
if (!empty($articulo)) {
    $sql = ""
            . "SELECT * "
            . "FROM `inventarios_articulos` "
            . "WHERE `articulo` ='" . $articulo. "' "
            . "ORDER BY `nombre`";
} else {
    $sql = ""
            . "SELECT * "
            . "FROM `inventarios_articulos` "
            . "ORDER BY `nombre`";
}
//echo($sql);
$consulta = $db->sql_query($sql);
$articulos = array();
while ($fila = $db->sql_fetchrow($consulta)) {
    array_push($articulos, $fila);
}
echo(json_encode($articulos));
?>