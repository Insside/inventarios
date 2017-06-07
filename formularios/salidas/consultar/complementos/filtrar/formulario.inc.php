<?php
$ROOT = (!isset($ROOT)) ? "../../../../../../../" : $ROOT;
require_once($ROOT . "modulos/inventarios/librerias/Configuracion.cnf.php");
$is=new Inventarios_Salidas();
$r=new Request();
$fechas=new Fechas();
/* 
 * Copyright (c) 2014, Jose Alexis Correa Valencia
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 * * Redistributions of source code must retain the above copyright notice, this
 *   list of conditions and the following disclaimer.
 * * Redistributions in binary form must reproduce the above copyright notice,
 *   this list of conditions and the following disclaimer in the documentation
 *   and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 */
$isglf=$is->getListFilter();
/** Valores **/
$d['criterio']=$r->getValue("criterio");
$d['valor']=$r->getValue("valor");
$d['inicio']=$r->getValue("inicio");   
$d['final']=$r->getValue("final");
$s['inicio']=$r->getValue("inicio");
$s['final']=$r->getValue("final");
$d['inicio']=empty($s['inicio'])?"2012-01-01":$s['inicio'];
$d['final']=empty($s['final'])?$fechas->hoy():$s['final'];
/** Campos **/
$f->campos['criterio']=$f->getSelect(array("id"=>"criterio".$f->id,"values"=>$isglf,"label" => "etiqueta","option" => "valor","onChange" => "changeFiltro".$f->id."()","selected"=>$d['criterio']));
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