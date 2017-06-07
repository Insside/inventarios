<?php
$ROOT = (!isset($ROOT)) ? "../../../../../" : $ROOT;
require_once($ROOT . "modulos/inventarios/librerias/Configuracion.cnf.php");
$if=new Inventarios_Familias();
/** Valores **/
$itable=$validaciones->recibir("itable");
$valores=$if->consultar($validaciones->recibir("familia"));
/** Campos **/
if(!empty($itable)){$f->oculto("itable",$itable);}
$f->campos['familia']=$f->dynamic(array("field"=>"familia","value"=>$valores["familia"]));
$f->campos['codigo']=$f->dynamic(array("field"=>"codigo","value"=>$valores["codigo"]));
$f->campos['nombre']=$f->dynamic(array("field"=>"nombre","value"=>$valores["nombre"]));
$f->campos['descripcion']=$f->dynamic(array("field"=>"descripcion","value"=>  urldecode($valores["descripcion"])));
$f->campos['fecha']=$f->dynamic(array("field"=>"fecha","value"=>$valores["fecha"]));
$f->campos['hora']=$f->dynamic(array("field"=>"hora","value"=>$valores["hora"]));
$f->campos['creador']=$f->dynamic(array("field"=>"creador","value"=>$valores["creador"]));
$f->campos['ayuda']=$f->button("ayuda".$f->id, "button","Ayuda");
$f->campos['cancelar']=$f->button("cancelar".$f->id, "button","Cancelar");
$f->campos['continuar']=$f->button("continuar".$f->id, "submit","Continuar");
/** Celdas **/
$f->celdas["familia"]=$f->celda("Familia:",$f->campos['familia']);
$f->celdas["codigo"]=$f->celda("Código Contable:",$f->campos['codigo']);
$f->celdas["nombre"]=$f->celda("Nombre:",$f->campos['nombre']);
$f->celdas["descripcion"]=$f->celda("Descripción:",$f->campos['descripcion']);
$f->celdas["fecha"]=$f->celda("Fecha:",$f->campos['fecha']);
$f->celdas["hora"]=$f->celda("Hora:",$f->campos['hora']);
$f->celdas["creador"]=$f->celda("Creador:",$f->campos['creador']);
/** Filas **/
$f->fila["fila1"]=$f->fila($f->celdas["familia"].$f->celdas["codigo"].$f->celdas["nombre"]);
$f->fila["fila2"]=$f->fila($f->celdas["descripcion"]);

/** Compilando **/
$f->filas($f->fila['fila1']);
$f->filas($f->fila['fila2']);
/** Botones **/
$f->botones($f->campos['ayuda'], "inferior-izquierda");
$f->botones($f->campos['cancelar'], "inferior-derecha");
$f->botones($f->campos['continuar'], "inferior-derecha");
/** JavaScripts **/
$f->JavaScript("MUI.titleWindow($('".($f->ventana)."'),\"Crear: Unidad de Medida\");");
$f->JavaScript("MUI.resizeWindow($('".($f->ventana)."'),{width: 500,height:430});");
$f->JavaScript("MUI.centerWindow($('".$f->ventana."'));");$f->eClick("cancelar".$f->id,"MUI.closeWindow($('".$f->ventana."'));");
?>