<?php 
/** Valores **/
$message="La cantidad a entregar siempre deberá ser menor o igual a la cifra solicitada., no se aceptarán cifras negativas o valores no numéricos. Verifique la cifra e inténtelo nuevamente.";
/** Campos **/
$f->campos['cancelar']=$f->button("cancelar".$f->id,"button","Cancelar");
$f->fila['notification']=$f->getNotification(array("image"=>"advertencia","message"=>$message));
//Compilacion
$f->filas($f->fila['notification']);
$f->botones($f->campos['cancelar'],"inferior-derecha");
/** JavaScripts **/
$f->setAudio(array("src"=>"modulos/inventarios/multimedia/audios/m0001.mp3","autoplay"=>true));
$f->windowTitle("Error / Entrega / Detalle / {$detalle["detalle"]}","1.0");
$f->windowResize(array("autoresize"=>false,"width"=>"390","height"=>"190"));
$f->windowCenter();
$f->eClick("cancelar" . $f->id, "MUI.closeWindow($('" . $f->ventana . "'));");
?>
