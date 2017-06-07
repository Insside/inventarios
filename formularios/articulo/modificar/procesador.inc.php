<?php
/** procesador.inc.php Codigo fuente archivo procesador **/
$cadenas = new Cadenas();
$fechas = new Fechas();
$r=new Request();
/** Clase representativa Del Objeto **/
$ia=new Inventarios_Articulos();
/** Campos Recibidos **/
$d=array();
$d['articulo']=Request::getValue("articulo");
$d['codigo']=Request::getValue("codigo");
$d['nombre']=Request::getValue("nombre");
$d['referencia']=Request::getValue("referencia");
$d['familia']=Request::getValue("familia".$f->id);
$d['medida']=Request::getValue("medida"); 
$d['descripcion']=Request::getValue("descripcion");
$d['stock_minimo']=Request::getValue("stock_minimo");
$d['stock_maximo']=Request::getValue("stock_maximo");
$d['fecha']=Request::getValue("fecha");
$d['hora']=Request::getValue("hora");
$d['creador']=Request::getValue("creador");
$d['medida_compra']=Request::getValue("medida_compra");
$d['medida_venta']=Request::getValue("medida_venta");
$d['medida_venta_cantidad']=Request::getValue("medida_venta_cantidad");
$d['estado']=Request::getValue("estado");
$d['serializable']=Request::getValue("serializable");
print_r($d);

foreach ($d as $campo => $valor) {
    $ia->actualizar($d['articulo'], $campo, $valor);
}

/** JavaScripts **/
$f->gridRefresh(Request::getValue("grid"));
$f->windowClose();
?>