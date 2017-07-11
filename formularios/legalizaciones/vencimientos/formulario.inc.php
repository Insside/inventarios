<?php
/** Tabla de Datos **/
$f->table="aplicaccion_configuraciones";
/** Variables **/
$iv=new Inventarios_Vencimientos();
$ivc=$iv->getList(array());
/** Valores **/
$grid=Request::getValue("grid");
$d['configuracion']=Request::getValue("_configuracion");
$d['criterio']=Request::getValue("_criterio");
$d['valor']=Request::getValue("_valor");
/** Campos **/
if(!empty($grid)){$f->oculto("grid",$grid);}
//$f->campos['configuracion']=$f->dynamic(array("field"=>"configuracion","value"=>$d["configuracion"]));
//$f->campos['titulo']=$f->dynamic(array("field"=>"titulo","value"=>$d["titulo"]));
$f->campos['criterio']=$f->getSelect(array("id" =>"criterio".$f->id,"values" => $ivc,"label" => "label","option" => "value","onChange" => "","selected"=>$d["criterio"]));
$f->campos['valor']=$f->dynamic(array("field"=>"valor","value"=>$d["valor"]));
$f->campos['ayuda']=$f->button("ayuda".$f->id, "button","Ayuda");
$f->campos['cancelar']=$f->button("cancelar".$f->id, "button","Cancelar");
$f->campos['continuar']=$f->button("continuar".$f->id, "submit","Continuar");
/** Celdas **/
//$f->celdas["configuracion"]=$f->celda("Configuracion:",$f->campos['configuracion']);
//$f->celdas["titulo"]=$f->celda("Titulo:",$f->campos['titulo']);
$f->celdas["criterio"]=$f->celda("Criterio:",$f->campos['criterio']);
$f->celdas["valor"]=$f->celda("Valor:",$f->campos['valor']);
/** Filas **/
$f->fila["fila1"]=$f->fila($f->celdas["criterio"]);
$f->fila["fila2"]=$f->fila($f->celdas["valor"]);
/** Compilando **/
$f->filas($f->fila['fila1']);
$f->filas($f->fila['fila2']);
/** Botones **/

$f->botones($f->campos['ayuda'], "inferior-izquierda");
$f->botones($f->campos['cancelar'], "inferior-derecha");
$f->botones($f->campos['continuar'], "inferior-derecha");
/** JavaScripts **/

$f->windowTitle("Filtro de vencimientos","1.0");
$f->windowResize(array("autoresize"=>false,"width"=>"480","height"=>"250"));
$f->windowCenter();
$f->eClick("cancelar".$f->id,"MUI.closeWindow($('".$f->ventana."'));");
?>