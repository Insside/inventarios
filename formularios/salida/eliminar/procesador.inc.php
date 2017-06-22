<?php
/**
 * Este archivo recibe el nombre del archivo a eliminar y realiza la accion si valoraciones adiciones su
 * proceso implica dos acciones eliminar el registro de la base de datos y eliminar fisicamente el archivo
 * */
$is=new Inventarios_Salidas();
$salida=Request::getValue("salida");
$itable=Request::getValue("itable");
$is->eliminar($salida); 
$f->windowClose();
$f->JavaScript("if(".$itable."){".$itable.".refresh();}");
?>