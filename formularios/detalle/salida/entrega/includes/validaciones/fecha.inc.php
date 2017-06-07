<?php 
/** Valores **/
$message="No se puede modificar una cantidad entregada, cuando se ha superado el tiempo máximo fijado para realizar este procedimiento. Actualmente el tiempo está fijado en 12 horas.";
/** Campos **/
$f->campos['cancelar']=$f->button("cancelar".$f->id,"button","Cancelar");
$f->fila['notification']=$f->getNotification(array("image"=>"advertencia","message"=>$message));
//Compilacion
$f->filas($f->fila['notification']);
$f->botones($f->campos['cancelar'],"inferior-derecha");
/** JavaScripts **/
$f->setAudio(array("src"=>"modulos/inventarios/multimedia/audios/m0002.mp3","autoplay"=>true));
$f->JavaScript("MUI.titleWindow($('" . ($f->ventana) . "'), \"Error / Entrega /{$detalle["detalle"]}\");");
$f->JavaScript("MUI.resizeWindow($('" . ($f->ventana) . "'), {width: 390, height: 182});");
$f->JavaScript("MUI.centerWindow($('" . $f->ventana . "'));");
$f->eClick("cancelar" . $f->id, "MUI.closeWindow($('" . $f->ventana . "'));");
?>
