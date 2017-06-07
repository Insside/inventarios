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
$v['url'] = "modulos/inventarios/formularios/centros/consultar/consultar.json.php?"
        . "uid=" . $v['uid']
        . "&criterio=" . $v['criterio']
        . "&valor=" . $v['valor']
        . "&inicio=" . $v['inicio']
        . "&final=" . $v['final']
        . "&transaccion=" . $v['transaccion'];

/** Creación de la tabla * */
$tabla = new Grid(array("id" =>"Grid_". time(), "url" => $v['url']));
//$tabla->boton('btnVer', 'Acceder', 'centro', "MUI.Inventarios_Centro_Consultar", "pVer");
$tabla->boton('btnCrear', 'Crear', '', "MUI.Inventarios_Centro_Crear", "new");
$tabla->boton('btnModificar', 'Modificar', 'centro', "MUI.Inventarios_Centro_Modificar", "edit");
$tabla->boton('btnEliminar', 'Eliminar', 'centro', "MUI.Inventarios_Centro_Eliminar", "pEliminar");
//$tabla->boton('btnBuscar', 'Buscar', '', "MUI.Inventarios_Centro_Buscar", "pBuscar");
$tabla->columna('cCodigo', 'Centro', 'codigo', 'string', '95', 'center', 'false');
$tabla->columna('cContable', 'Contable', 'codigo_contable', 'string', '90', 'center', 'false');
$tabla->columna('cCentro', 'Centro', 'centro', 'string', '90', 'center', 'true');
$tabla->columna('cDeatlles', 'Detalles', 'detalles', 'string', '450', 'left', 'false');
$tabla->columna('cLimite', 'Limite (DHT)', 'limite_dht', 'string', '100', 'center', 'false');
//$tabla->columna('cTelefono', 'Teléfono ', 'telefono', 'string', '100', 'left', 'false');
$tabla->columna('cFecha', 'Fecha', 'fecha', 'date', '75', 'center', 'false');
$tabla->columna('cHora', 'Hora', 'hora', 'string', '75', 'center', 'false');
$tabla->generar();
?>