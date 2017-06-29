<?php
error_reporting(E_ALL);
if(!defined("ROOT")){define('ROOT', dirname(__FILE__) . '/../../../');}
if(!defined("ROOT_MODULE_INVENTARIOS")){define('ROOT_MODULE_INVENTARIOS', dirname(__FILE__) . '/../');}
$ROOT = (!isset($ROOT)) ? ROOT:$ROOT;
/** Requires **/
$RMI=ROOT_MODULE_INVENTARIOS;
// Librerias Del Modulo
//require_once($ROOT . "modulos/inventarios/librerias/Familias.class.php");
//require_once($ROOT . "modulos/inventarios/librerias/Productos.class.php");
require_once($RMI."librerias/Inventarios_Salidas_Detalles_Seriales.class.php");
require_once($RMI."librerias/Inventarios_Salidas_Detalles_Legalizaciones.class.php");
require_once($RMI."librerias/Inventarios_Salidas_Detalles_Devoluciones.class.php");
require_once($RMI."librerias/Inventarios_Salidas_Tipos.class.php");
require_once($RMI."librerias/Inventarios_Centros.class.php");
require_once($RMI."librerias/Inventarios_Precios.class.php");
require_once($RMI."librerias/Inventarios_Salidas_Detalles.class.php");
require_once($RMI."librerias/Inventarios_Salidas.class.php");
require_once($RMI."librerias/Inventarios_Empleados.class.php");
require_once($RMI."librerias/Inventarios_Medidas.class.php");
require_once($RMI."librerias/Inventarios_Menus.class.php");
require_once($RMI."librerias/Inventarios_Familias.class.php");
require_once($RMI."librerias/Inventarios_Articulos.class.php");
require_once($RMI."librerias/Inventarios_Modulo.class.php");
require_once($RMI."librerias/Inventarios_Componentes.class.php");
require_once($RMI."librerias/Inventarios_Permisos.class.php");
require_once($RMI."librerias/Inventarios_Usuario_Perfil.class.php");
require_once($RMI."librerias/Inventarios_Usuario.class.php");
require_once($RMI."librerias/Inventarios_Usuarios.class.php");
require_once($RMI."librerias/Inventarios.class.php");
?>