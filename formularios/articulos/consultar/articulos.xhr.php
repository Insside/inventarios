<?php
define("PATH", dirname(__FILE__));
define('ROOT', PATH . "/../../../../../");

require_once(ROOT . "modulos/inventarios/librerias/Configuracion.cnf.php");
Sesion::init();

$transaccion = Request::getValue("transaccion");
$trasmision = Request::getValue("trasmision");
$f = new Forms($transaccion);
echo($f->apertura());

if (Sesion::Iniciada()) {
    require_once(PATH . "/tabla.inc.php");
} else {
    require_once(PATH . "/reconexion.inc.php");
}
echo($f->generar());
echo($f->controles());
echo($f->cierre());
?>