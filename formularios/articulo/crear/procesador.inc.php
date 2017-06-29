<?php
$validaciones=new Validaciones();
$fechas=new Fechas();
/* 
 * Copyright (c) 2015, Alexis
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
//print_r($_REQUEST);
$itable=Request::getValue("itable");
$ia=new Inventarios_Articulos();
$usuario=  Sesion::usuario();

$d=array();
$d['articulo']=Request::getValue("articulo");
$d['codigo']=Request::getValue("codigo");
$d['nombre']=Request::getValue("nombre");
$d['referencia']=Request::getValue("referencia");
$d['familia']=Request::getValue("familia".$f->id); 
$d['descripcion']=Request::getValue("descripcion");
$d['stock_minimo']=Request::getValue("stock_minimo");
$d['stock_maximo']=Request::getValue("stock_maximo");
$d['fecha']=Request::getValue("fecha");
$d['hora']=Request::getValue("hora");
$d['creador']=$usuario["usuario"];
$d['medida']=Request::getValue("medida_compra");
$d['medida_compra']=Request::getValue("medida_compra");
$d['medida_venta']=Request::getValue("medida_venta");
$d['medida_venta_cantidad']=Request::getValue("medida_venta_cantidad");
$d['estado']="ACTIVO";
$ia->crear($d);
/** JavaScripts **/
$f->windowClose();
$f->gridRefresh(Request::getValue("grid"));
?>