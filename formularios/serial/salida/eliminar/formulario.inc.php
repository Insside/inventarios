<?php

/** Variables * */
$isds = new Inventarios_Salidas_Detalles_Seriales();
$grid = Request::getValue("grid");
$serial = $isds->consultar(Request::getValue("serial"));
/** Campos * */
$f->campos['cancelar'] = $f->button("cancelar" . $f->id, "button", "Cancelar");
/** Compilación * */
$creado=$serial["fecha"];
$intento=Dates::getDate();
if ($creado==$intento) {
    require_once(PATH . "/includes/proceder.inc.php");
} else {
    echo("\n<!-- Creado:{$creado} vs Intento:{$intento}//-->");
    require_once(PATH . "/includes/fecha.inc.php");
}
$f->botones($f->campos['cancelar'], "inferior-derecha");
/** JavaScripts * */
$f->JavaScript("MUI.centerWindow($('" . $f->ventana . "'));");
$f->eClick("cancelar" . $f->id, ""
        . "new MUI.Audio({\"audio\":\$(AudioGlobal),\"src\":\"modulos/inventarios/multimedia/audios/window-close.mp3\",\"autoplay\":true});"
        . "MUI.closeWindow($('" . $f->ventana . "'));");
?>