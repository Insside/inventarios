<?php

/** Tabla de Datos **/
$f->table="inventarios_salidas_detalles_seriales";
/** Variables **/
$cadenas = new Cadenas();
$fechas = new Fechas();
$r= new Request();
/** Valores **/
$grid=$r->getValue("grid");
$d['serial']=time();
$d['detalle']=$r->getValue("detalle");
$d['codigo']="";
$d['lote']="NINGUNO";
$d['cantidad']="1";
$d['fecha']=$fechas->hoy();
$d['hora']=$fechas->ahora();
$d['creador']=Sesion::getUser();
/** Campos **/
if(!empty($grid)){$f->oculto("grid",$grid);}
$f->oculto("serial",$d['serial']);
$f->oculto("detalle",$d['detalle']);
$f->oculto("fecha",$d['fecha']);
$f->oculto("hora",$d['hora']);
$f->oculto("creador",$d['creador']);
//$f->campos['serial']=$f->dynamic(array("field"=>"serial","value"=>$d["serial"]));
//$f->campos['detalle']=$f->dynamic(array("field"=>"detalle","value"=>$d["detalle"]));
$f->campos['codigo']=$f->dynamic(array("field"=>"codigo","value"=>$d["codigo"]));
$f->campos['lote']=$f->dynamic(array("field"=>"lote","value"=>$d["lote"]));
$f->campos['cantidad']=$f->dynamic(array("field"=>"cantidad","value"=>$d["cantidad"]));
//$f->campos['fecha']=$f->dynamic(array("field"=>"fecha","value"=>$d["fecha"]));
//$f->campos['hora']=$f->dynamic(array("field"=>"hora","value"=>$d["hora"]));
//$f->campos['creador']=$f->dynamic(array("field"=>"creador","value"=>$d["creador"]));
$f->campos['ayuda']=$f->button("ayuda".$f->id, "button","Ayuda");
$f->campos['cancelar']=$f->button("cancelar".$f->id, "button","Cancelar");
$f->campos['continuar']=$f->button("continuar".$f->id, "submit","Registrar");
/** Celdas **/
//$f->celdas["serial"]=$f->celda("Serial:",$f->campos['serial']);
//$f->celdas["detalle"]=$f->celda("Detalle:",$f->campos['detalle']);
$f->celdas["codigo"]=$f->celda("Número de Serie:",$f->campos['codigo']);
$f->celdas["lote"]=$f->celda("Código del Lote:",$f->campos['lote']);
$f->celdas["cantidad"]=$f->celda("Cantidad:",$f->campos['cantidad']);
//$f->celdas["fecha"]=$f->celda("Fecha:",$f->campos['fecha']);
//$f->celdas["hora"]=$f->celda("Hora:",$f->campos['hora']);
//$f->celdas["creador"]=$f->celda("Creador:",$f->campos['creador']);
/** Filas **/
$f->fila["fila1"]=$f->fila($f->celdas["codigo"]);
$f->fila["fila2"]=$f->fila($f->celdas["lote"]);
$f->fila["fila3"]=$f->fila($f->celdas["cantidad"]);
/** Compilando **/
$f->filas($f->fila['fila1']);
$f->filas($f->fila['fila2']);
$f->filas($f->fila['fila3']);
/** Botones **/
$f->botones($f->campos['ayuda'], "inferior-izquierda");
$f->botones($f->campos['continuar'], "inferior-derecha");
$f->botones($f->campos['cancelar'], "inferior-derecha");

/** JavaScripts **/
$f->windowTitle("{$d['detalle']} / Serializar ","1.0");
$f->windowResize(array("autoresize"=>false,"width"=>"320","height"=>"240"));
$f->windowCenter();
$f->eClick("cancelar".$f->id,"MUI.closeWindow($('".$f->ventana."'));");
?>
