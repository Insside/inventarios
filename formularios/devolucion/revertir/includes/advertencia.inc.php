<?php
$devolucion=$v->recibir("devolucion");
/** Valores **/
$html="<div class=\"i100x100_advertencia\" style=\"float: left;\"></div>";
$html.="<div class=\"notificacion\"><p><b>Imposible revertir devolución {$devolucion}.</b><br>";
$html.="La devolución seleccionada no se puede revertir ya que el tiempo evaluable a trascurrido, si la presente situación presenta conflicto para la realización de sus labores por favor contáctese con el jefe de área.";
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
$f->setAudio(array("src"=>"modulos/inventarios/multimedia/audios/inventarios-solicitud-detalle-devolucion-noreversible.mp3","autoplay"=>true));
$f->JavaScript("MUI.titleWindow($('" . ($f->ventana) . "'), \"Revertir Devolucion - \");");
$f->JavaScript("MUI.resizeWindow($('" . ($f->ventana) . "'), {width: 390, height: 180});");
$f->JavaScript("MUI.centerWindow($('" . $f->ventana . "'));");
$f->eClick("cancelar" . $f->id, "MUI.closeWindow($('" . $f->ventana . "'));");
?>