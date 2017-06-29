<?php
$f->campos['ayuda'] = $f->button("ayuda" . $f->id, "button", "Ayuda");
$f->campos['cancelar'] = $f->button("cancelar" . $f->id, "button", "Cerrar");
$f->campos['registrar'] = $f->button("actualizar" . $f->id, "submit", "Registrar");
/** Segmentos * */
require_once(PATH."/includes/perfil.inc.php");
require_once(PATH."/includes/medidas.inc.php");
require_once(PATH."/includes/precios.inc.php");
require_once(PATH."/includes/stock.inc.php");
require_once(PATH."/includes/descripcion.inc.php");
/** <TabbedPane> **/
$tp = new TabbedPane(array("pagesHeight" => "330px"));
$tp->addTab("Perfil",null, $f->fila["perfil"]);
$tp->addTab("Medidas",null, $f->fila["medidas"]);
$tp->addTab("Precio",null, $f->fila["precios"]);
$tp->addTab("Stock",null, $f->fila["stock"]);
$tp->addTab("Descripción",null, $f->fila["descripcion"]);
/** Compilando * */
$f->filas($tp->getPane());
/** </TabbedPane> **/
/** Botones * */
$f->botones($f->campos['ayuda'], "inferior-izquierda");
$f->botones($f->campos['cancelar'], "inferior-derecha");
$f->botones($f->campos['registrar'], "inferior-derecha");
/** JavaScripts * */
$f->windowTitle("Articulo / Nuevo","1.1");
$f->windowResize(array("autoresize"=>false,"width"=>"640","height"=>"420"));
$f->windowCenter();
$f->eClick("cancelar" . $f->id, "MUI.closeWindow($('" . $f->ventana . "'));");
?>