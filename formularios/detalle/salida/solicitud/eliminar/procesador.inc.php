<?php
/**
 * Este archivo recibe el nombre del archivo a eliminar y realiza la accion si valoraciones adiciones su
 * proceso implica dos acciones eliminar el registro de la base de datos y eliminar fisicamente el archivo
 * */
$isd=new Inventarios_Salidas_Detalles();
$detalle=$v->recibir("detalle");
$isd->eliminar($detalle); 
$f->windowClose();
$f->gridRefresh($v->recibir("grid"));
?>