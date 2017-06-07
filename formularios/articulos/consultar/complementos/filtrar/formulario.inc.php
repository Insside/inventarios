<?php
$ROOT = (!isset($ROOT)) ? "../../../../../../../" : $ROOT;
require_once($ROOT . "modulos/solicitudes/librerias/Configuracion.cnf.php");
$inventarios=new Inventarios();
/** Valores **/
$d['criterio']=Request::getValue("criterio");
$d['valor']=Request::getValue("valor");
$d['inicio']=Request::getValue("inicio");   
$d['final']=Request::getValue("final");
$s['inicio']=Request::getValue("inicio");
$s['final']=Request::getValue("final");

$d['inicio']=empty($s['inicio'])?"2012-01-01":$s['inicio'];
$d['final']=empty($s['final'])?Dates::getDate():$s['final'];
/** Campos **/
$f->campos['criterio']=$inventarios->criterios("criterio", $d['criterio']);
$f->campos['valor']=$f->text("valor",$d['valor'], "8","", false);
$f->campos['inicio']=$f->calendario("inicio",$d['inicio'],"-1","2");
$f->campos['final']=$f->calendario("final",$d['final'],"-1");
$f->campos['buscar'] = $f->button("buscar" . $f->id, "submit","Filtrar");
/** Celdas **/
$f->celdas["criterio"] = $f->celda("Criterio:", $f->campos['criterio']);
$f->celdas["valor"] = $f->celda("Valor:", $f->campos['valor']);
$f->celdas["inicio"] = $f->celda("Fecha Inicial:", $f->campos['inicio']);
$f->celdas["final"] = $f->celda("Fecha Final:", $f->campos['final']);
/** Filas **/
$f->fila["fila1"] = $f->fila($f->celdas["criterio"]);
$f->fila["fila2"] = $f->fila($f->celdas["valor"]);
$f->fila["fila3"] = $f->fila($f->celdas["inicio"]);
$f->fila["fila4"] = $f->fila($f->celdas["final"]);
/** Compilando **/
$f->filas($f->fila['fila1']);
$f->filas($f->fila['fila2']);
$f->filas($f->fila['fila3']);
$f->filas($f->fila['fila4']);
/** Botones **/
$f->botones($f->campos['buscar'], "inferior-izquierda");
?>