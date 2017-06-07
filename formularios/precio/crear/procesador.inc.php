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
$itable=$validaciones->recibir("itable");
$ip=new Inventarios_Precios();
$usuario=  Sesion::usuario();
$datos=array();
$datos['precio']=$validaciones->recibir("precio");
$datos['articulo']=$validaciones->recibir("articulo");
$datos['costo_compra_unidad']=$validaciones->recibir("costo_compra_unidad");
$datos['margen_utilidad']=$validaciones->recibir("margen_utilidad");
$datos['precio_venta_unidad']=$validaciones->recibir("precio_venta_unidad");
$datos['impuesto']=$validaciones->recibir("impuesto");
$datos['responsable']=$usuario["usuario"];
$datos['fecha']=$validaciones->recibir("fecha");
$datos['hora']=$validaciones->recibir("hora");
$ip->crear($datos);
/** JavaScripts **/
$f->windowClose();
$f->JavaScript("if(".$itable."){".$itable.".refresh();}");
?>