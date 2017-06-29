<?php

$inicial = Request::getValue("inicial" . $f->id);
$final = Request::getValue("final" . $f->id);

$isds = new Inventarios_Salidas_Detalles();
$ias = new Inventarios_Articulos();


/** <Tabla> * */
$db = new MySQL(Sesion::getConexion());
$sql = ""
        . "SELECT * "
        . "FROM `inventarios_salidas_detalles_devoluciones`"
        . "WHERE(`fecha` BETWEEN '{$inicial}' AND '{$final}');";
$consulta = $db->sql_query($sql);
echo("<table border=\"1\">");
echo("<tr>");
echo("<td align=\"center\">Devolución</td>");
echo("<td align=\"center\">Código</td>");
echo("<td align=\"center\">Articulo</td>");
echo("<td align=\"center\">Cantidad</td>");
echo("<td align=\"center\">FT-DAF-058</td>");
echo("<td align=\"center\">CT-A</td>");
echo("<td align=\"center\">Fecha</td>");
echo("<td align=\"center\">Hora</td>");
echo("</tr>");

while ($fila = $db->sql_fetchrow($consulta)) {
    $detalle = $isds->consultar($fila["detalle"]);
    $articulo = $ias->consultar($detalle["articulo"]);

    echo("<tr>");
    echo("<td>{$fila["devolucion"]}</td>");
    echo("<td>{$articulo["codigo"]}</td>");
    echo("<td>{$articulo["nombre"]}</td>");
    echo("<td>{$fila["cantidad"]}</td>");
    echo("<td>{$detalle["salida"]}</td>");
    echo("<td>{$fila["transaccion"]}</td>");
    echo("<td>{$fila["fecha"]}</td>");
    echo("<td>{$fila["hora"]}</td>");
    echo("</tr>");
}
echo("</table>");
/** </Tabla> * */
/** JavaScript * */
$f->windowTitle("Reporte {$inicial} - {$final} ", "1.0");
$f->windowResize(array("autoresize" => false, "width" => "900", "height" => "480"));
$f->windowCenter();
?>