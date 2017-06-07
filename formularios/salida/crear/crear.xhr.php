<?php

define("PATH", dirname(__FILE__));
define('ROOT', PATH . "/../../../../../");

require_once(ROOT . "modulos/inventarios/librerias/Configuracion.cnf.php");
Sesion::init();

$r = new Request();
$transaccion = $r->getValue("transaccion");
$trasmision = $r->getValue("trasmision");
$f = new Forms($transaccion);
echo($f->apertura());

if (Sesion::Iniciada()) {
    if (empty($trasmision)) {
        require_once(PATH . "/formulario.inc.php");
    } else {
        require_once(PATH . "/validador.inc.php");
    }
} else {
    require_once(PATH . "/reconexion.inc.php");
}
echo($f->generar());
echo($f->controles());
echo($f->cierre());
?>