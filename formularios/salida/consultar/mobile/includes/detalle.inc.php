<?php

$automatizaciones = new Automatizaciones();
$cadenas = new Cadenas();
$fechas = new Fechas();
$ia = new Inventarios_Articulos();
$isdd = new Inventarios_Salidas_Detalles_Devoluciones();
$isdl = new Inventarios_Salidas_Detalles_Legalizaciones();
$isds = new Inventarios_Salidas_Detalles_Seriales();
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
/** Variables Recibidas * */
$d['grid'] = Request::getValue("grid");
$d['criterio'] = "salida";
$d['valor'] = Request::getValue("salida");
$d['inicio'] = Request::getValue("inicio");
$d['final'] = Request::getValue("final");
$d['transaccion'] = Request::getValue("transaccion");
$d['page'] = Request::getValue("page");
$d['perpage'] = Request::getValue("perpage");
/** Verificaciones * */
/**
 * Se evalua el comportamiento en caso de no recibir el periodo inicio y final de la consulta para lo 
 * cual se presuponen la fecha de la primera solicitud y la ultima que se hallan registrado por
 * el usuario activo en el sistema de atencion de solicitudes.
 */
$d['inicio'] = empty($d['inicio']) ? "2012-01-01" : $d['inicio'];
$d['final'] = empty($d['final']) ? "2018-01-01" : $d['final'];

/* * Variables Definidas * */
if (!empty($d['page'])) {
    $pagination = true;
    $page = intval($d['page']);
    $perpage = intval($d['perpage']);
    $n = ( $page - 1 ) * $perpage;
    $limite = "LIMIT $n, $perpage";
} else {
    $pagination = false;
    $page = 1;
    $perpage = 20;
    $n = 0;
    $limite = "LIMIT $n, $perpage";
}



/**
 * En este segmento se evalua si se esta recibiendo o no un criterio y un valor a buscar segun el 
 * criterio adicionalmente se contempla la propiedad y responsabilidad del usuario activo sobre los 
 * registros visualizados. En terminos de criterios existe un criterio especial que se utiliza para
 * identificar una peticion en la que solo se desean ver aquellas solicitudes que se encuentran 
 * pendientes de respuesta, ese criterio es "estado", donde no existe ningun campo denominado 
 * estado pero se usa para definir si los registros se muestran como se hace habitualmente o 
 * solamente aquellos que correspondan a peticiones a la espera de respuesta.
 * */
if (!empty($d['criterio']) && !empty($d['valor']) && $d['criterio'] != "estado") {
    $buscar = "WHERE(`" . $d['criterio'] . "` ='{$d['valor']}')";
} else {
    $buscar = "";
}

$db = new MySQL(Sesion::getConexion());
$consulta = $db->sql_query(""
        . "SELECT * "
        . "FROM `inventarios_salidas_detalles` {$buscar} "
        . "ORDER BY `detalle` "
        . "DESC;");
$total = $db->sql_numrows($consulta);

$sql = ""
        . "SELECT * "
        . "FROM `inventarios_salidas_detalles` {$buscar} "
        . "ORDER BY `detalle`  "
        . "DESC {$limite}";
//echo($sql);
$consulta = $db->sql_query($sql);
$ret = array();

$p->addContent("\n<!--{$sql}//-->");
$p->addContent("\n<table data-role=\"table\" id=\"tSalida\" data-mode=\"columntoggle\" class=\"ui-body-d ui-shadow table-stripe ui-responsive\" data-column-button-theme=\"b\" data-column-button-text=\"Columns to display...\" data-column-popup-theme=\"a\">");
$p->addContent("<thead>");
$p->addContent("<th>Conteo</th>");
$p->addContent("<th>Código</th>");
$p->addContent("<th>Articulo</th>");
$p->addContent("<th>Nombre</th>");
//$p->addContent("<th data-priority=\"3\">Centro Costos</th>");
//$p->addContent("<th data-priority=\"3\">Solicita</th>");
//$p->addContent("<th data-priority=\"3\">Aprueba</th>");
//$p->addContent("<th data-priority=\"3\">Fecha</th>");
$p->addContent("</thead>");
$p->addContent("<tbody>");




$conteo = 0;
while ($fila = $db->sql_fetchrow($consulta)) {
    $conteo++;
    $articulo = $ia->consultar($fila["articulo"]);
    $fila["conteo"] = $conteo;
    $fila["codigo"] = "<b>{$articulo["codigo"]}</b>";
    $fila["articulo"] = "{$fila["articulo"]}";
    $fila["nombre"] = $articulo["nombre"] . "...";

    if ($articulo["serializable"] == "SI") {
        $sns = $isds->getCount($fila["detalle"]) . "/" . intval($fila["cantidad_entregada"]);
        $fila["seriales"] = "<a href=\"#\" onClick=\"MUI.Inventarios_Salida_Detalle_Serializacion('{$fila["detalle"]}','{$d['grid']}');\">{$sns}</a>";
    } else {
        $fila["seriales"] = "NO";
    }
    /** Evaluaciones previas * */
    $cd = $isdd->getSummatory($fila["detalle"]);
    $cd = (!empty($cd) && ($cd > 0)) ? $cd : "0.0";
    $cl = (float) ($fila["cantidad_entregada"] - $cd);
    $cc = $isdl->getSummatory($fila["detalle"]);
    $cp = $cl - $cc;
    /** Condideraciones de forma * */
    if (empty($cc)) {
        $cc = "0.0";
    }
    if (empty($cp)) {
        $cp = "0.0";
        $cpcolor = "gray";
    } else {
        $cpcolor = "red";
    }

    $fila["cantidad_solicitada"] = "<span style=\"color:red;font-weight:400;\">{$fila["cantidad_solicitada"]}</span>";
    $fila["cantidad_entregada"] = "<span style=\"color:green;font-weight:400;\">{$fila["cantidad_entregada"]}</span>";
    $fila["cantidad_devuelta"] = "<span style=\"color:blue;font-weight:400;\">{$cd}</span>";
    $fila["cantidad_legalizable"] = "<span style=\"color:blue;font-weight:400;\">{$cl}</span>";
    $fila["cantidad_cobrada"] = "<span style=\"color:green;font-weight:800;\">{$cc}</span>";
    $fila["cantidad_pendiente"] = "<span style=\"color:{$cpcolor};font-weight:800;\">{$cp}</span>";
    //array_push($ret, $fila);

    $p->addContent("\n<tr role=\"row\">");
    $p->addContent("<td>{$fila["conteo"]}</td>");
    $p->addContent("<td>{$fila["codigo"]}</td>");
    $p->addContent("<td>{$fila["articulo"]}</td>");
    $p->addContent("<td>{$fila["nombre"]}</td>");
    //$p->addContent("<th><a href=\"{$url}{$fila["salida"]}\">{$fila["salida"]}</a></th>");
    //$p->addContent("<td>{$fila["nempleado"]}</td>");
    //$p->addContent("<td>{$ee}</td>");
    //$p->addContent("<td>{$fila["centro_costos"]}</td>");
    //$p->addContent("<td>{$fila["solicita"]}</td>");
    //$p->addContent("<td>{$fila["aprueba"]}</td>");
    //$p->addContent("<td>{$fila["fecha"]}</td>");
    $p->addContent("</tr>");
}
$p->addContent("</tbody>");
$p->addContent("\n</table>");

/** Optimizando Memoria * */
$db->sql_close();
//echo json_encode(array("sql" => $sql, "uid" => $usuario['usuario'], "page" => $page, "total" => $total, "data" => $ret));
?>