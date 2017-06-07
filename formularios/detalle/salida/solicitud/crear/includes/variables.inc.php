<?php
/** Variables 
 * $salida = Codigo de la salida recibido
 * $ci = Cantidad Items
 * $cimax= Cantidad maxima de items
 ***/
$cadenas = new Cadenas();
$ia=new Inventarios_Articulos();
$if=new Inventarios_Familias();
$is = new Inventarios_Salidas();
$usuario=Sesion::getUser();
$grid=Request::getValue("grid");
$hoy=Dates::getDate();
$salida = $is->consultar(Request::getValue("salida"));
$ci= intval($is->getItemsCount($salida["salida"]));
$cimax=12;
//print_r($_REQUEST);
/** Valores **/
$d['detalle']=time();
$d['salida']=Request::getValue("salida");
$d['familia']=Request::getValue("_familia");
$d['articulo']=Request::getValue("_articulo");
$d['medida']=Request::getValue("_medida");
$d['cantidad_solicitada']=Request::getValue("_cantidad_solicitada");
$d['cantidad_entregada']=Request::getValue("_cantidad_entregada");
$d['cantidad_devuelta']=Request::getValue("_cantidad_devuelta");
$d['fecha_solicitud']=Request::getValue("_fecha_solicitud");
$d['fecha_entrega']=Request::getValue("_fecha_entrega");
$d['fecha_retorno']=Request::getValue("_fecha_retorno");
$d['creador_solicitud']=Request::getValue("_creador_solicitud");
$d['creador_entrega']=Request::getValue("_creador_entrega");
$d['creador_retorno']=Request::getValue("_creador_retorno");
$d['observacion']=Request::getValue("observacion");
?>