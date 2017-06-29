<?php
error_reporting(E_ALL);
define("PATH", dirname(__FILE__));
define('ROOT', PATH . "/../../../");
require_once(ROOT . "modulos/inventarios/librerias/Configuracion.cnf.php");
Sesion::init();
$cadenas=new Cadenas();
$fechas=new Fechas();
$sesion=new Sesion();
/** Includes **/
echo("<html>");
echo("<head>");
echo("<link rel=\"stylesheet\" type=\"text/css\" href=\"estilos.css\" />");
echo("</head>");
echo("<body>");
echo("<h1>Instalando Modulo</h1>");
echo("<ul>");
require_once(PATH . "/variables.inc.php");
require_once(PATH . "/modulo.inc.php");
require_once(PATH . "/permisos.inc.php");
echo("</ul>");
echo("</body>");
echo("</html>");
?>