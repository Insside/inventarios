<?php
print_r($_REQUEST);
$isd=new Inventarios_Salidas_Detalles();
$datos=array();
$datos['detalle']=Request::getValue("detalle");
$datos['salida']=Request::getValue("salida");
$datos['articulo']=Request::getValue("articulo".$f->id);
$datos['medida']=Request::getValue("medida".$f->id);
$datos['cantidad_solicitada']=Request::getValue("cantidad_solicitada");
$datos['cantidad_entregada']=Request::getValue("cantidad_entregada");
$datos['fecha_solicitud']=Request::getValue("fecha_solicitud");
$datos['fecha_entrega']=Request::getValue("fecha_entrega");
$datos['creador_solicitud']=Request::getValue("creador_solicitud");
$datos['creador_entrega']=Request::getValue("creador_entrega");
$datos['observacion']=Request::getValue("observacion");
$cantidad=(double)$datos['cantidad_solicitada'];
if($cantidad>0.0&&!empty($datos['articulo'])){
  $isd->crear($datos);
}
/** JavaScripts **/
$f->windowClose();
$f->gridRefresh(Request::getValue("grid"));
?>