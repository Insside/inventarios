<?php
/** Incudes **/
require_once(PATH. "/includes/variables.inc.php");
require_once(PATH. "/includes/campos.inc.php");
require_once(PATH. "/includes/celdas.inc.php");
/** Filas **/
//$f->fila["fila1"]=$f->fila($f->celdas["familia"]);
$f->fila["fila2"]=$f->fila($f->celdas["articulo"]);
$f->fila["fila3"]=$f->fila($f->celdas["cantidad_entregada"].$f->celdas["medida"]);
/** Compilando **/
//$f->filas($f->fila['fila1']);
$f->filas($f->fila['fila2']);
$f->filas($f->fila['fila3']);
/** Botones **/
$f->botones($f->campos['ayuda'], "inferior-izquierda");
$f->botones($f->campos['continuar'], "inferior-derecha");
$f->botones($f->campos['cancelar'], "inferior-derecha");
/** JavaScripts **/
//$f->windowTitle("Adicionar Articulo / Material", "1.1");
$f->windowResize(array("autoresize"=>false,"width"=>"320","height"=>"180"));
$f->eClick("cancelar" . $f->id, "MUI.closeWindow($('" . $f->ventana . "'));");
?>