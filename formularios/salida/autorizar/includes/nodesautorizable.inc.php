<?php
/** Filas * */
$f->fila["fila1"] =$f->getNotification(array("image"=>"stop","message"=>$message["denegado"]));
/** Compilando **/
$f->filas($f->fila['fila1']);
/** Botones * */
//$f->botones($f->campos['ayuda'], "inferior-izquierda");
//$f->botones($f->campos['continuar'], "inferior-derecha");
$f->botones($f->campos['cerrar'], "inferior-derecha");
/** JavaScripts * */
$f->windowTitle("Notificación","1.0");
$f->windowResize(array("autoresize"=>false,"width"=>"380","height"=>"190"));
$f->windowCenter();
$f->eClick("cerrar" . $f->id, "MUI.closeWindow($('" . $f->ventana . "'));");
?>