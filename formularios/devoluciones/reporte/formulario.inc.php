<?php
require_once(PATH . "/includes/variables.inc.php");
require_once(PATH . "/includes/campos.inc.php");
require_once(PATH . "/includes/celdas.inc.php");

$f->fila["f01"]=$f->fila($f->celdas["inicial"]);
$f->fila["f02"]=$f->fila($f->celdas["final"]);




require_once(PATH . "/includes/tabla.inc.php");
/** Filas **/
//$f->fila["fila1"]=$f->fila($f->celdas["devolucion"].$f->celdas["detalle"].$f->celdas["cantidad"].$f->celdas["transaccion"]);
//$f->fila["fila2"]=$f->fila($f->celdas["observacion"].$f->celdas["fecha"].$f->celdas["hora"].$f->celdas["creador"]);

/** Compilando **/
$f->filas($f->fila["f01"]);
$f->filas($f->fila["f02"]);
/** Botones **/
$f->botones($f->campos['ayuda'], "inferior-izquierda");
$f->botones($f->campos['cancelar'], "inferior-derecha");
$f->botones($f->campos['continuar'], "inferior-derecha");
/** JavaScripts **/
$f->windowTitle("Reporte / Devoluciones","1.0");
$f->windowResize(array("autoresize"=>false,"width"=>"320","height"=>"200"));
$f->windowCenter();
$f->eClick("cancelar".$f->id,"MUI.closeWindow($('".$f->ventana."'));");
?>