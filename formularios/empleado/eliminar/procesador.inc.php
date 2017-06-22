<?php
/**
 * Este archivo recibe el nombre del archivo a eliminar y realiza la accion si valoraciones adiciones su
 * proceso implica dos acciones eliminar el registro de la base de datos y eliminar fisicamente el archivo
 * */
$ie=new Inventarios_Empleados();
$empleado=Request::getValue("empleado");
$itable=Request::getValue("itable");
$ie->eliminar($empleado); 
$f->windowClose();
$f->JavaScript("if(".$itable."){".$itable.".refresh();}");
?>