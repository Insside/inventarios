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
$v['criterio'] = $validaciones->recibir("criterio");
$v['valor'] = $validaciones->recibir("valor");
$v['inicio'] = $validaciones->recibir("inicio");
$v['final'] = $validaciones->recibir("final");
$v['transaccion'] = $validaciones->recibir("transaccion");
$v['url'] = "modulos/inventarios/formularios/familias/consultar/familias.json.php?"
        . "uid=" . $v['uid']
        . "&criterio=" . $v['criterio']
        . "&valor=" . $v['valor']
        . "&inicio=" . $v['inicio']
        . "&final=" . $v['final']
        . "&transaccion=" . $v['transaccion'];

/** Creación de la tabla * */
$tabla = new Grid(array("id" =>"Grid_". time(), "url" => $v['url']));
$tabla->boton('btnCrear', 'Crear', '', "MUI.Inventarios_Familia_Crear", "new");
$tabla->boton('btnModificar', 'Modificar', 'familia', "MUI.Inventarios_Familia_Modificar", "edit");
$tabla->boton('btnEliminar', 'Eliminar', 'familia', "MUI.Inventarios_Familia_Eliminar", "pEliminar");
//$tabla->boton('btnBuscar', 'Buscar', '', "MUI.Inventarios_Articulo_Buscar", "pBuscar");
//$tabla->boton('btnPrecios', 'Precios', 'articulo', "MUI.Inventarios_Articulo_Precios", "precio");
$tabla->columna('cFamilia', 'Familia', 'familia', 'string', '100', 'center', 'false');
$tabla->columna('cCodigo', 'Código', 'codigo', 'string', '100', 'center', 'false');
$tabla->columna('cDetalles', 'Detalles', 'detalles', 'string', '500', 'left', 'false');
$tabla->columna('cFecha', 'Fecha', 'fecha', 'date', '90', 'center', 'false');
$tabla->columna('cHora', 'Hora', 'hora', 'string', '90', 'center', 'false');
$tabla->generar();
?>