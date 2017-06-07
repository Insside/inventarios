<?php
/** Campos Recibidos **/
$datos=array();
$datos['devolucion']=$v->recibir("devolucion");
$datos['detalle']=$detalle["detalle"];
$datos['cantidad']=$v->recibir("cantidad");
$datos['transaccion']=$v->recibir("transaccion".$f->id);
$datos['observacion']=$v->recibir("observacion");
$datos['fecha']=$v->recibir("fecha");
$datos['hora']=$v->recibir("hora");
$datos['creador']=$v->recibir("creador");
$codigo=$isdd->crear($datos);
/** JavaScripts **/
$f->gridRefresh($v->recibir("grid"));
$f->windowClose();
?>
