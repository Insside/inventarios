<?php
/** Campos Recibidos **/
$datos=array();
$datos['legalizacion']=$v->recibir("legalizacion");
$datos['detalle']=$detalle["detalle"];
$datos['cobro']=$v->recibir("cobro".$f->id);
Sesion::setValue("legalizacioncobro",$datos['cobro']);
$datos['cantidad']=$v->recibir("cantidad");

$datos['observacion']=$v->recibir("observacion");
$datos['fecha']=$v->recibir("fecha");
$datos['hora']=$v->recibir("hora");
$datos['creador']=$v->recibir("creador");
$codigo=$isdl->crear($datos);
/** JavaScripts **/
$f->gridRefresh($v->recibir("grid"));
$f->windowClose();
?>
