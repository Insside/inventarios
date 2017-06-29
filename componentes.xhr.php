<?php
$ROOT = (!isset($ROOT)) ? "../../" : $ROOT;
require_once($ROOT . "modulos/inventarios/librerias/Configuracion.cnf.php");
Sesion::init();
$usuario=Sesion::usuario();
$menus = new Inventarios_Menus();
echo($menus->menu("0000100000",$usuario['usuario']));
?>