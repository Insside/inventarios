<?php

$cadenas = new Cadenas();
$ias = new Inventarios_Articulos();
$ie = new Inventarios_Empleados();
$is = new Inventarios_Salidas();
$ius = new Inventarios_Usuarios();
$icc = new Inventarios_Centros();
$isdd = new Inventarios_Salidas_Detalles_Devoluciones();
$isdl = new Inventarios_Salidas_Detalles_Legalizaciones();
$isds = new Inventarios_Salidas_Detalles_Seriales();

$db = new MySQL(Sesion::getConexion());
$sql = "SELECT * FROM `inventarios_salidas` WHERE `autorizado` = 'SI' ORDER BY `tercero`,`fecha` DESC;";
$consulta = $db->sql_query($sql);
$html = ("<table border=\"1\">");
$c = 1;
while ($fila = $db->sql_fetchrow($consulta)) {
    /** <salida> * */
    $estado = $is->getLegalizacionPendingStatus($fila["salida"]);
    //$html.="ESTADO: $estado";
    if ($estado) {
        $empleado = $ie->consultar($fila["tercero"]);
        $fila["nempleado"] = $cadenas->capitalizar($empleado["nombres"] . " " . $empleado["apellidos"]);
        $identificacion = intval($fila["tercero"]);
        $html .= ("<tr>");
        $html .= ("<td style=\"width:70px;text-align:center;font-weight:bold;\">{$c}</td>");
        $html .= ("<td>{$fila["salida"]}</td>");
        $html .= ("<td>");
        $html .= ("<table border=\"1\"><tr>"
                . "<td style=\"width:90px;text-align:right;font-weight:bold;\">{$identificacion}</td>"
                . "<td>{$fila["nempleado"]}</td>"
                . "<td style=\"width:70px;text-align:center;font-weight:bold;\">CE</td>"
                . "<td style=\"width:70px;text-align:center;font-weight:bold;\">CD</td>"
                . "<td style=\"width:70px;text-align:center;font-weight:bold;\">CC</td>"
                . "<td style=\"width:70px;text-align:center;font-weight:bold;\">TP</td>"
                . "</tr></table>");
        $sql2 = "SELECT * FROM `inventarios_salidas_detalles` WHERE `salida` = {$fila["salida"]} ORDER BY `detalle`;";
        $consulta2 = $db->sql_query($sql2);
        $html .= ("<table border=\"1\">");
        while ($row2 = $db->sql_fetchrow($consulta2)) {
            $ce = $row2["cantidad_entregada"];
            $cd = $isdd->getSummatory($row2["detalle"]);
            $cc = $isdl->getSummatory($row2["detalle"]);
            $cl = $cd + $cc;
            $cp = ($ce) - ($cl);

            $articulo = $ias->consultar($row2["articulo"]);
            $nombre = Cadenas::capitalizar($articulo["nombre"]);
            $html .= ("<tr>");
            $html .= ("<td style=\"width:90px;text-align:right;font-weight:bold;\">{$articulo["codigo"]}</td>");
            $html .= ("<td>&nbsp;-&nbsp;{$nombre}</td>");
            $html .= ("<td style=\"width:70px;text-align:right;\">" . number_format($ce, 2) . "</td>");
            $html .= ("<td style=\"width:70px;text-align:right;\">" . number_format($cd, 2) . "</td>");
            $html .= ("<td style=\"width:70px;text-align:right;\">" . number_format($cc, 2) . "</td>");
            if (number_format($cp, 2) > 0.0) {
                $html .= ("<td style=\"width:70px;text-align:right;color:red;\">" . number_format($cp, 2) . "</td>");
            } else {
                $html .= ("<td style=\"width:70px;text-align:right;\">" . number_format($cp, 2) . "</td>");
            }
            $html .= ("</tr>");
        }
        $html .= ("</table>");
        $html .= ("</td>");
        $html .= ("<td style=\"width:90px;text-align:center;\">{$fila["fecha"]}</td>");
        $html .= ("</tr>");
        $c++;
    }
    /** </salida> * */
}
$html .= ("</table>");

$db->sql_close();
echo($html);

/** JavaScripts * */
$f->windowTitle("Vencimiento de Legalizaciones", "1.0");
$f->windowResize(array("autoresize" => false, "width" => "980", "height" => "550"));
$f->windowCenter();
?>