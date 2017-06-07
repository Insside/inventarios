<?php
/** Filas * */
$f->fila["fila1"] =$f->getNotification(array("image"=>"cancel","message"=>$message["desautorizar"]));
$f->fila["fila2"] = $f->fila($f->celdas["autoriza"]);
$f->fila["fila3"] = $f->fila($f->celdas["autorizado"]);
/** Compilando **/
$f->filas($f->fila['fila1']);
$f->filas($f->fila['fila2']);
$f->filas($f->fila['fila3']);
/** Botones * */
$f->botones($f->campos['ayuda'], "inferior-izquierda");
$f->botones($f->campos['continuar'], "inferior-derecha");
$f->botones($f->campos['cancelar'], "inferior-derecha");
/** JavaScripts * */
$f->windowTitle("Desautorización / Salida","1.0");
$f->windowResize(array("autoresize"=>false,"width"=>"380","height"=>"320"));
$f->windowCenter();
$f->eClick("cancelar" . $f->id, "MUI.closeWindow($('" . $f->ventana . "'));");
?>