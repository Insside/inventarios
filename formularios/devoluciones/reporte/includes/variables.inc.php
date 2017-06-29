<?php
/** Tabla de Datos **/
$f->table="inventarios_salidas_detalles_devoluciones";
/** Variables **/
$cadenas = new Cadenas();
$fechas = new Fechas();
$r= new Request();
/** Valores **/
$grid=$r->getValue("grid");
$d['devolucion']=$r->getValue("_devolucion");
$d['detalle']=$r->getValue("_detalle");
$d['cantidad']=$r->getValue("_cantidad");
$d['transaccion']=$r->getValue("_transaccion");
$d['observacion']=$r->getValue("_observacion");
$d['fecha']=$r->getValue("_fecha");
$d['hora']=$r->getValue("_hora");
$d['creador']=$r->getValue("_creador");


$d['inicial']=Dates::getDate();
$d['final']=Dates::getDate();
?>