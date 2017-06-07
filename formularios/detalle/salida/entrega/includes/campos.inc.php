<?php
/** Ocultos **/
$f->oculto("grid",$validaciones->recibir("grid"));
$f->oculto("detalle",$d['detalle']);
$f->oculto("salida",$d['salida']);
$f->oculto("fecha_solicitud",$fechas->hoy());
$f->oculto("creador_solicitud",$usuario);
$f->oculto("medida",$d["medida"]);
$f->oculto("cantidad_solicitada",$d["cantidad_solicitada"]);
/** Visibles **/
$f->campos['detalle']=$f->text("detalle",$d['detalle'],"10","required",true);
$f->campos['articulo']=$f->getSelect(array("id" =>"articulo".$f->id,"values" =>$ia->getList(array("familia"=>$articulo["familia"])),"label" => "nombre","option" => "articulo","onChange" => "changeArticulo".$f->id."()","selected"=>$d['articulo'],"disabled"=>true));
$f->campos['medida']=$f->dynamic(array("id"=>"medida".$f->id,"field"=>"medida","value"=>$d["medida"],"readonly"=>true));
$f->campos['cantidad_entregada']=$f->dynamic(array("field"=>"cantidad_entregada","value"=>$d["cantidad_entregada"]));
$f->campos['fecha_solicitud']=$f->text("fecha_solicitud",$d['fecha_solicitud'],"10","",true);
$f->campos['fecha_entrega']=$f->text("fecha_entrega",$d['fecha_entrega'],"10","",true);
$f->campos['creador_solicitud']=$f->text("creador_solicitud",$d['creador_solicitud'],"10","",true);
$f->campos['creador_entrega']=$f->text("creador_entrega",$d['creador_entrega'],"10","",true);
$f->campos['ayuda']=$f->button("ayuda".$f->id, "button","Ayuda");
$f->campos['cancelar']=$f->button("cancelar".$f->id, "button","Cancelar");
$f->campos['continuar']=$f->button("continuar".$f->id, "submit","Agregar");
?>