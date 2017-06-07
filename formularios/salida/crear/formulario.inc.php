<?php
$ROOT = (!isset($ROOT)) ? "../../../../../" : $ROOT;
require_once($ROOT . "modulos/inventarios/librerias/Configuracion.cnf.php");
require_once(PATH . "/includes/variables.inc.php");
require_once(PATH . "/includes/campos.inc.php");
require_once(PATH . "/includes/celdas.inc.php");
require_once(PATH . "/includes/salida.inc.php");
require_once(PATH . "/includes/observacion.inc.php");
/** <TabbedPane> **/
$tp = new TabbedPane(array("pagesHeight" => "340px"));
$tp->addTab("Salida",null, $tab["salida"]);
$tp->addTab("Observación",null, $tab["observacion"]);
/** Compilando * */
$f->filas($tp->getPane());
/** </TabbedPane> **/
/** Botones * */
$f->botones($f->campos['ayuda'], "inferior-izquierda");
$f->botones($f->campos['continuar'], "inferior-derecha");
$f->botones($f->campos['cancelar'], "inferior-derecha");
/** JavaScripts * */
$f->windowTitle("Salidas / Requisición de materiales","1.3");
$f->windowResize(array("autoresize"=>false,"width"=>"640","height"=>"440"));
$f->windowCenter();
$f->eClick("cancelar" . $f->id, "MUI.closeWindow($('" . $f->ventana . "'));");
?>