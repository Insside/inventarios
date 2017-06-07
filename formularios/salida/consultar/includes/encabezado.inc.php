<?php
$validaciones=new Validaciones();
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

$codigos=new Codigos();
$codificado = $codigos->generar("http://www.aguasdebuga.net/?modulo=inventarios&codigo=". $validaciones->recibir("remision"));
$html["encabezado_izquierda"] = ""
        . "<div class=\"celda izquierda sinfondo\" style=\"vertical-align:middle !important;\">"
        . "<img src=\"imagenes/logo-267x140.png\" width=\"267\" height=\"140\"/>"
        . "</div>";
$html["encabezado_centro"] = ""
        . "<div class=\"celda centro sinfondo\" style=\"vertical-align:middle !important;\">"
        . "<h1> REMISIÓN REM-" . ($validaciones->recibir("remision")). "</h1>"
        . "<p>Codigo: IMIS-003 / Revisión: 01  / Rige a partir de: 2015-01-01</p>"
        . "<p style=\"margin-top:5px;font-size:12px;line-height:10px; color:#cccccc;\">El presente documento constituye una constancia legal de la verificación y registro de la presente información en nuestros sistemas informáticos, la verificación de la integridad del mismo se puede realizar mediante el código QR en la parte superior derecha del presente formato o mediante el código RE-PQRS asignado textualmente en la parte superior central del presente documento."
        . "</p>"
        . "</div>";
$html["encabezado_derecha"] = ""
        . "<div class=\"celda derecha sinfondo\">"
        . "<div style=\"float:right;\">"
        . "<img src=\"librerias/" . $codificado . "\"/></div>"
        . "</div>";
$html["encabezado"] = "<div class=\"encabezado tabla\" style=\" border-style:solid;border-width:1px;border-color:#cccccc;padding:10px;\">" . $html["encabezado_izquierda"] . $html["encabezado_centro"] . $html["encabezado_derecha"] . "</div>";
$f->fila["encabezado"] = $html["encabezado"];
?>

