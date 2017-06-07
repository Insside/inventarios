<?php
$ROOT = (!isset($ROOT)) ? "../../../../../" : $ROOT;
require_once($ROOT . "modulos/inventarios/librerias/Configuracion.cnf.php");
$im=new Inventarios_Medidas();
/** Valores **/
$itable=$validaciones->recibir("itable");
$valores=$im->consultar($validaciones->recibir("medida"));
/** Campos **/
if(!empty($itable)){$f->oculto("itable",$itable);}
$f->oculto("medida",$valores["medida"]);
//$f->campos['medida']=$f->dynamic(array("field"=>"medida","value"=>$valores["medida"]));
$f->campos['siglas']=$f->dynamic(array("field"=>"siglas","value"=>$valores["siglas"],"required"=>true));
$f->campos['nombre']=$f->dynamic(array("field"=>"nombre","value"=>$valores["nombre"],"required"=>true));
$f->campos['descripcion']=$f->dynamic(array("field"=>"descripcion","value"=>$valores["descripcion"]));
$f->campos['fecha']=$f->dynamic(array("field"=>"fecha","value"=>$valores["fecha"],"required"=>true,"readonly"=>true,"class"=>"codigo"));
$f->campos['hora']=$f->dynamic(array("field"=>"hora","value"=>$valores["hora"],"required"=>true,"readonly"=>true,"class"=>"codigo"));
$f->campos['ayuda']=$f->button("ayuda".$f->id, "button","Ayuda");
$f->campos['cancelar']=$f->button("cancelar".$f->id, "button","Cancelar");
$f->campos['continuar']=$f->button("continuar".$f->id, "submit","Continuar");
/** Celdas **/
//$f->celdas["medida"]=$f->celda("Medida:",$f->campos['medida']);
$f->celdas["siglas"]=$f->celda("Siglas:",$f->campos['siglas']);
$f->celdas["nombre"]=$f->celda("Nombre:",$f->campos['nombre']);
$f->celdas["descripcion"]=$f->celda("Descripcion:",$f->campos['descripcion']);
$f->celdas["fecha"]=$f->celda("Fecha:",$f->campos['fecha']);
$f->celdas["hora"]=$f->celda("Hora:",$f->campos['hora']);
/** Filas **/
$f->fila["fila1"]=$f->fila($f->celdas["siglas"].$f->celdas["nombre"]);
$f->fila["fila2"]=$f->fila($f->celdas["descripcion"]);
//$f->fila["fila3"]=$f->fila($f->celdas["fecha"].$f->celdas["hora"]);
/* Compilando **/
$f->filas($f->fila['fila1']);
$f->filas($f->fila['fila2']);
//$f->filas($f->fila['fila3']);
/** Botones **/
$f->botones($f->campos['ayuda'], "inferior-izquierda");
$f->botones($f->campos['cancelar'], "inferior-derecha");
$f->botones($f->campos['continuar'], "inferior-derecha");
/** JavaScripts **/
$f->JavaScript("MUI.titleWindow($('".($f->ventana)."'),\"Crear: Unidad de Medida\");");
$f->JavaScript("MUI.resizeWindow($('".($f->ventana)."'),{width: 500,height:430});");
$f->JavaScript("MUI.centerWindow($('".$f->ventana."'));");$f->eClick("cancelar".$f->id,"MUI.closeWindow($('".$f->ventana."'));");
?>