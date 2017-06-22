<?php
$ROOT=(!isset($ROOT))?"../../../../../../../../":$ROOT;
require_once($ROOT."modulos/aplicacion/librerias/Configuracion.cnf.php");
error_reporting(E_ALL);
header('Content-Type: application/json');
$v=new Validaciones();
$familia=$v->recibir("familia");

$db = new MySQL(Sesion::getConexion());
if (!empty($familia)) {
    $sql = ""
            . "SELECT * "
            . "FROM `inventarios_articulos` "
            . "WHERE `familia` ='" . $familia. "' AND `estado` = 'ACTIVO' " 
            . "ORDER BY `nombre`";
} else {
    $sql = ""
            . "SELECT * "
            . "FROM `inventarios_articulos` "
            . "ORDER BY `nombre`";
}
//echo($sql);
$consulta = $db->sql_query($sql);
$regiones = array();
while ($fila = $db->sql_fetchrow($consulta)) {
    $fila["nombre"]="{$fila["codigo"]} {$fila["nombre"]}";
    array_push($regiones, $fila);
}
echo(json_encode($regiones));
?>