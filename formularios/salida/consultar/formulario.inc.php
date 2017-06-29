<?php

$ROOT = (!isset($ROOT)) ? "../../../../../" : $ROOT;
require_once($ROOT . "modulos/inventarios/librerias/Configuracion.cnf.php");


/** Campos * */
$f->oculto("grid", $v->recibir("grid"));
/** Compilando * */
require_once(PATH . "/includes/variables.inc.php");
require_once(PATH . "/includes/encabezado.inc.php");
require_once(PATH . "/includes/solicitados.inc.php");
require_once(PATH . "/includes/entregados.inc.php");
require_once(PATH . "/includes/legalizables.inc.php");
/** <TabbedPane> * */
$tp = new TabbedPane(array("pagesHeight" => "480px"));
$tp->addTab("Solicitud", null, $f->fila["articulos_solicitados"]);
if (($p["entregar"])&&($autorizada=="SI")){
    $tp->addTab("Entrega", null, $f->fila["articulos_entregados"]);
}
if (($p["legalizar"])&&($autorizada=="SI")){
    $tp->addTab("Legalización", null, $f->fila["articulos_legalizables"]);
}
/** Compilando * */
$f->filas($tp->getPane());
/** </TabbedPane> * */
/** JavaScripts * */
$f->windowResize(array("autoresize" => false, "width" => "900", "height" => "335"));
//$f->eClick("modificar".$f->id,"MUI.closeWindow($('".$f->ventana."'));MUI.Tesoreria_Solicitud_Cheque_Modificar('".@$valores['solicitud']."');");
?>