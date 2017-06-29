<?php
/** Clase representativa Del Objeto **/
$isdd=new Inventarios_Salidas_Detalles_Devoluciones();
$isdd->eliminar($v->recibir("devolucion"));
/** JavaScripts **/
$f->gridRefresh($v->recibir("grid"));
$f->windowClose();
?>