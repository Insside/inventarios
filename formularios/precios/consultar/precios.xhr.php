<?php
$ROOT = (!isset($ROOT)) ? "../../../../../" : $ROOT;
require_once($ROOT . "modulos/inventarios/librerias/Configuracion.cnf.php");
$sesion = new Sesion();
$validaciones = new Validaciones();
/*
 * Copyright (c) 2013, Alexis
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
$usuario = Sesion::usuario();
$v['uid'] = $usuario['usuario'];
$v['criterio'] = "articulo";
$v['valor'] = Request::getValue("articulo");
$v['inicio'] = Request::getValue("inicio");
$v['final'] = Request::getValue("final");
$v['transaccion'] = Request::getValue("transaccion");
$v['url'] = "modulos/inventarios/formularios/precios/consultar/precios.json.php?"
        . "uid=" . $v['uid']
        . "&criterio=" . $v['criterio']
        . "&valor=" . $v['valor']
        . "&inicio=" . $v['inicio']
        . "&final=" . $v['final']
        . "&transaccion=" . $v['transaccion'];

/** Creación de la tabla * */
$tabla = new Grid(array("id" =>"Grid_". time(), "url" => $v['url'],"height"=>"360"));
$tabla->boton('btnCrear', 'Crear',array("directo"=>$v['valor']), "MUI.Inventarios_Articulo_Precio_Crear", "new");
$tabla->boton('btnEliminar', 'Eliminar', 'precio', "MUI.Inventarios_Articulo_Precio_Eliminar", "pEliminar");
$tabla->columna('cPrecio', 'Precio', 'precio', 'string', '100', 'center', 'true');
$tabla->columna('cFecha', 'Fecha', 'fecha', 'date', '90', 'center', 'false');
$tabla->columna('cHora', 'Hora', 'hora', 'string', '90', 'center', 'false');
$tabla->columna('cCosto', 'Costo', 'costo_compra_unidad', 'string', '100', 'right', 'false');
$tabla->columna('cUtilidad', 'Utilidad', 'margen_utilidad', 'string', '100', 'right', 'false');
$tabla->columna('cPrecio de Venta', 'Precio', 'precio_venta_unidad', 'string', '100', 'right', 'false');
$tabla->columna('cImpuesto', 'Impuesto', 'impuesto', 'string', '100', 'right', 'false');

$tabla->generar();
?>
