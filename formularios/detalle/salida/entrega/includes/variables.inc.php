<?php
/** Variables **/
$cadenas = new Cadenas();
$fechas = new Fechas();
$validaciones = new Validaciones();
$ia=new Inventarios_Articulos();
$isd=new Inventarios_Salidas_Detalles();
$if=new Inventarios_Familias();
$usuario=Sesion::getUser();
//print_r($_REQUEST);
/** Valores **/
$d=$isd->consultar($v->recibir("detalle"));
$articulo=$ia->consultar($d["articulo"]);
?>