<?php
$ROOT = (!isset($ROOT)) ? "../../../../../../../" : $ROOT;
require_once($ROOT . "modulos/inventarios/librerias/Configuracion.cnf.php");
/*
 * Este archivo XHR retorna las estadisticas asociadas a las solicitudes procesadas por un usuario
 * del sistema las cuales a saber estan distribuidas como recibidas, procesadas y pendientes.
 * La información se proporsiona en cifras y prorcentajes exactos. 
 * 
 * Copyright (c) 2015, Jose Alexis Correa Valencia
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
/** Clases **/
Sesion::init();
$validaciones=new Validaciones();
$ia=new Inventarios_Articulos();
/** Variables **/
$usuario=Sesion::usuario();
$t=$ia->conteo();
?>

<h2>Artículos Catalogados</h2>
<p class="critico"><?php echo($t); ?></p>
<div class="porcentual"><a href="#" onClick="#">TOTAL 100%</a> </div>
<br>
<p>  
  La información visualizada corresponde a la totalidad de artículos registrados en la base de datos.
</p>
<hr>
<p>
  Para mayor información y referencia técnica visite:
  <a href="http://www.insside.com/plataforma/imis/inventarios/articulos.html" target="_blank">
    Insside / Imis / Inventarios / Artículos
  </a>
</p>