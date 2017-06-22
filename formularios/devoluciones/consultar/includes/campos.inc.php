<?php
/** Campos **/
$f->oculto("grid",Request::getValue("grid"));
$f->oculto("detalle",$d['detalle']);
$f->oculto("salida",$d['salida']);
$f->oculto("fecha_solicitud",$fechas->hoy());
$f->oculto("creador_solicitud",$usuario);
$f->oculto("medida",$d["medida"]);
$f->campos['detalle']=$f->text("detalle",$d['detalle'],"10","required",true);
//$f->campos['salida']=$f->text("salida",$d['salida'],"10","",true);
//$f->campos['familia']=$f->getSelect(array("id" =>"familia".$f->id,"values" =>$if->getList(),"label" => "nombre","option" => "familia","onChange" => "changeFamilia".$f->id."()","selected"=>$d['familia']));
$f->campos['articulo']=$f->getSelect(array("id" =>"articulo".$f->id,"values" =>$ia->getList(),"label" => "nombre","option" => "articulo","onChange" => "changeArticulo".$f->id."()","selected"=>$d['articulo']));
$f->campos['medida']=$f->dynamic(array("id"=>"medida".$f->id,"field"=>"medida","value"=>$d["medida"],"readonly"=>true));
$f->campos['cantidad_solicitada']=$f->dynamic(array("field"=>"cantidad_solicitada","value"=>$d["cantidad_solicitada"]));
$f->campos['cantidad_entregada']=$f->dynamic(array("field"=>"cantidad_entregada","value"=>$d["cantidad_entregada"]));
$f->campos['cantidad_devuelta']=$f->dynamic(array("field"=>"cantidad_devuelta","value"=>$d["cantidad_devuelta"]));
$f->campos['fecha_solicitud']=$f->text("fecha_solicitud",$d['fecha_solicitud'],"10","",true);
$f->campos['fecha_entrega']=$f->text("fecha_entrega",$d['fecha_entrega'],"10","",true);
$f->campos['fecha_retorno']=$f->text("fecha_retorno",$d['fecha_retorno'],"10","",true);
$f->campos['creador_solicitud']=$f->text("creador_solicitud",$d['creador_solicitud'],"10","",true);
$f->campos['creador_entrega']=$f->text("creador_entrega",$d['creador_entrega'],"10","",true);
$f->campos['creador_retorno']=$f->text("creador_retorno",$d['creador_retorno'],"11","",true);
$f->campos['ayuda']=$f->button("ayuda".$f->id, "button","Ayuda");
$f->campos['cancelar']=$f->button("cancelar".$f->id, "button","Cancelar");
$f->campos['continuar']=$f->button("continuar".$f->id, "submit","Agregar");
?>