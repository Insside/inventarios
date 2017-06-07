<?php
$devolucion=$v->recibir("devolucion");
/** Valores **/
$html="<div class=\"i100x100_advertencia\" style=\"float: left;\"></div>";
$html.="<div class=\"notificacion\"><p><b>Imposible recibir devolución {$devolucion}.</b><br>";
$html.="La cantidad total del detalle que intenta hacer devolución o la sumatoria total de las devoluciones recibidas en relación al detalle seleccionado, supera la cifra total del producto entregado, por tal motivo su solicitud no puede ser procesada.";
$html.="</p></div>";
/** Campos **/
$f->oculto("devolucion",$devolucion);
$f->oculto("grid",$v->recibir("grid"));
$f->campos['cancelar']=$f->button("cancelar".$f->id,"button","Cerrar");
// Celdas
$f->celdas['info']=$f->celda("",$html,"","notificacion");
// Filas
$f->fila["info"]=$f->fila($f->celdas['info'],"notificacion");
//Compilacion
$f->filas($f->fila['info']);
$f->botones($f->campos['cancelar'],"inferior-derecha");
/** JavaScripts **/
$f->setAudio(array("src"=>"modulos/inventarios/multimedia/audios/inventarios-solicitud-detalle-devolucion-imposesable.mp3","autoplay"=>true));
$f->windowTitle("Advertencia: Imposible registrar devolución","1.0");
$f->windowResize(array("autoresize"=>false,"width"=>"390","height"=>"180"));
$f->windowCenter();
$f->eClick("cancelar" . $f->id, "MUI.closeWindow($('" . $f->ventana . "'));");
?>