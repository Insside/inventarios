<?php
/** Clase representativa Del Objeto **/
$isdl=new Inventarios_Salidas_Detalles_Legalizaciones();
$isdl->eliminar($v->recibir("legalizacion"));
/** JavaScripts **/
$f->gridRefresh($v->recibir("grid"));
$f->windowClose();
?>