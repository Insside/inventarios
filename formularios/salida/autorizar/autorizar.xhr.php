<?php

define("PATH", dirname(__FILE__));
define('ROOT', PATH . "/../../../../../");

require_once(ROOT . "modulos/inventarios/librerias/Configuracion.cnf.php");
Sesion::init();

$v = new Validaciones();
$transaccion = Request::getValue("transaccion");
$trasmision = Request::getValue("trasmision");;
$f = new Forms($transaccion);
$f->setTable("inventarios_salidas");
echo($f->apertura());

if (Sesion::Iniciada()) {
    if (empty($trasmision)) {
        require_once(PATH . "/formulario.inc.php");
    } else {
        require_once(PATH . "/procesador.inc.php");
    }
} else {
    require_once(PATH . "/reconexion.inc.php");
}
echo($f->generar());
echo($f->controles());
echo($f->cierre());
?>