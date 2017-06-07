<?php
/** procesador.inc.php Codigo fuente archivo procesador **/
$cadenas = new Cadenas();
$fechas = new Fechas();
$r=new Request();
/** Clase representativa Del Objeto **/
$isds=new Inventarios_Salidas_Detalles_Seriales();
/** Campos Recibidos **/
$d=array();
$d['serial']=$r->getValue("serial");
$d['detalle']=$r->getValue("detalle");
$d['codigo']=$r->getValue("codigo");
$d['lote']=$r->getValue("lote");
$d['cantidad']=$r->getValue("cantidad");
$d['fecha']=$r->getValue("fecha");
$d['hora']=$r->getValue("hora");
$d['creador']=$r->getValue("creador");
$crear=$isds->crear($d);
/** JavaScripts **/
$f->gridRefresh($r->getValue("grid"));
$f->windowClose();
?>