<?php

$ROOT = (!isset($ROOT)) ? "../../../../../" : $ROOT;
require_once($ROOT . "librerias/Configuracion.cnf.php");
require_once($ROOT . "librerias/Moneda.class.php");
require_once($ROOT . "modulos/facturacion/librerias/Configuracion.cnf.php");
require_once($ROOT . "librerias/pdf/fpdf.php");
require_once($ROOT . "librerias/pdf/fpdi.php");
require_once($ROOT . "modulos/inventarios/librerias/Configuracion.cnf.php");
require_once($ROOT . "modulos/usuarios/librerias/Configuracion.cnf.php");
setlocale(LC_MONETARY, 'es_CO');
$cadenas = new Cadenas();
$ie = new Inventarios_Empleados();
$ia = new Inventarios_Articulos();
$isdd = new Inventarios_Salidas_Detalles_Devoluciones();
$isdl = new Inventarios_Salidas_Detalles_Legalizaciones();
$is = new Inventarios_Salidas();
$iu = new Inventarios_Usuarios();
$ic = new Inventarios_Centros();

$salida = $is->consultar(Request::getValue("salida"));

/** Perfil- Autoriza * */
$pa = $iu->consultar($salida["autoriza"]);
$autoriza = new Usuarios_Perfil($pa["perfil"]);
$empleado = $ie->consultar($salida["tercero"]);
/** Centro de Costos * */
$centro = $ic->consultar($salida["centro_costos"]);

function setText($pdf, $x, $y, $size, $text, $color = "black") {
    if ($color == "gris") {
        $pdf->SetTextColor(114, 115, 118);
    } else {
        $pdf->SetTextColor(0, 0, 0);
    }
    $pdf->SetFont('Helvetica', 'B', $size);

    $pdf->SetXY($x, $y);
    $pdf->Write(0, $text);
}

$ml = "20"; //MArgen Izquierda
$mt = "0"; //Margen Superior
// Hoja tamaño del modelo
$pdf = new FPDI();
$pdf->setSourceFile($ROOT . "modulos/inventarios/formularios/salida/imprimir/formato.pdf");
$tid = $pdf->importPage(1);
$size = $pdf->getTemplateSize($tid);
$pdf->AddPage();
$pdf->useTemplate($tid, 10, 10, 190);
setText($pdf, ($ml + 117), ($mt + 27), 24, $salida["salida"]);
setText($pdf, ($ml + 127), ($mt + 35), 14, $salida["fecha"]);
setText($pdf, ($ml + 140), ($mt + 51), 14, $centro["codigo_contable"]);
setText($pdf, ($ml + 30), ($mt + 51), 14, $autoriza->getNombre());



$db = new MySQL(Sesion::getConexion());
$sql = ""
        . "SELECT * "
        . "FROM `inventarios_salidas_detalles` "
        . "WHERE(`salida` ='{$salida["salida"]}')"
        . "ORDER BY `detalle`  "
        . "DESC;";
$consulta = $db->sql_query($sql);
$conteo = 0;
$observaciones = "Observaciones: {$salida["observacion"]} ";
while ($fila = $db->sql_fetchrow($consulta)) {
    $conteo++;
    $articulo = $ia->consultar($fila["articulo"]);
    $fila["conteo"] = $conteo;
    $fila["articulo"] = "{$fila["articulo"]}";
    $fila["nombre"] = $articulo["nombre"];
    if (!empty($fila["observacion"])) {
        $observaciones .= $conteo . ": " . $fila["observacion"] . " | ";
    }
    /** Detalle * */
    $y = ($mt + 65 + ($conteo * 5));
    //$pdf->Line($mt + 20, $y + 107, 190, $y + 107);
    $yp = ($mt + 170 + ($conteo * 5));
    setText($pdf, ($ml + 1), $y, 9, $cadenas->zerofill($fila["conteo"], 2));
    setText($pdf, ($ml + 9), $y, 9, $articulo["codigo"]);
    setText($pdf, ($ml + 30), $y, 9, substr($articulo["nombre"], 0, 44) . "...");
    $pdf->SetTextColor(114, 115, 118);
    $pdf->SetXY($ml + 87, $y);
    $pdf->Cell(50, 0, $fila["cantidad_solicitada"], 0, 0, 'R');
    $pdf->SetXY($ml + 102, $y);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(50, 0, $fila["cantidad_entregada"], 0, 0, 'R');
    $pdf->SetTextColor(114, 115, 118);
    $pdf->SetXY($ml + 153, $y);
    $pdf->Cell(20, 0, $articulo["medida"], 0, 0, 'L');
    /** Movimeintos * */
    setText($pdf, ($ml + 1), $yp, 9, $cadenas->zerofill($fila["conteo"], 2));
//    setText($pdf, ($ml + 9), $y+200, 9, $articulo["codigo"]);
    setText($pdf, ($ml + 7), $yp, 9, substr($articulo["nombre"], 0, 22) . "...");
}
setText($pdf, ($ml + 0), ($mt + 132), 10, $observaciones);



for ($linea = 0; $linea < 22; $linea++) {
    $y = ($mt + 65 + ($linea * 5));
    $pdf->Line($mt + 19, $y + 107, 190, $y + 107);
}

setText($pdf, ($ml + 57), ($mt + 142), 10, $cadenas->capitalizar($empleado["nombres"] . " " . $empleado["apellidos"]), "gris");
$pdf->Output();

/** Liberando Memoria * */
unset($db);
unset($sql);
unset($consulta);
?>