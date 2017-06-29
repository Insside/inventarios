<?php

$grid = $v->recibir("grid");
$is = new Inventarios_Salidas();
$isd = new Inventarios_Salidas_Detalles();
/** Variables * */
$detalle = $isd->consultar($v->recibir("detalle"));
$salida = $is->consultar($detalle["salida"]);
/** Valores * */
$html = "<div class=\"i100x100_eliminar\" style=\"float: left;\"></div>";
$html .= "<div class=\"notificacion\"><p><b>Eliminar Detalle " . $detalle['detalle'] . ".</b><br>";
$html .= "Se dispone a eliminar un detalle de la presente remisión. ";
$html .= "acción es irreversible. Antes de proceder, confirme o cancele la presente solicitud para poder continuar.";
$html .= "</p></div>";
/** Campos * */
$f->oculto("detalle", $detalle['detalle']);
$f->oculto("grid", $grid);
$f->campos['eliminar'] = $f->button("eliminar" . $f->id, "submit", "Confirmar");
$f->campos['cancelar'] = $f->button("cancelar" . $f->id, "button", "Cancelar");
// Celdas
$f->celdas['info'] = $f->celda("", $html, "", "notificacion");
if ($salida["autorizado"] == "NO") {
    $f->fila["info"] = $f->fila($f->celdas['info'], "notificacion");
    $f->filas($f->fila['info']);
    $f->botones($f->campos['eliminar'], "inferior-derecha");
    $f->windowResize(array("autoresize" => false, "width" => "390", "height" => "180"));
} else {
    $message = "<p>No es posible eliminar elementos del detalle de una solicitud de entrega de materiales que se encuentra con aprobación expedida por un jefe de área. Para realizar esta acción deberá requerir al jefe de área que retire su aprobación, en tanto elimina el producto previamente solicitado, y que solicitar apruebe nuevamente el pedido cuando haya concluido, para dar curso al mismo en el almacén. Presione cancelar para continuar.</p>";
    $f->fila["info"] = $f->getNotification(array("image" => "lock", "message" => $message));
    $f->filas($f->fila['info']);
    $f->windowResize(array("autoresize" => false, "width" => "450", "height" => "240"));
    $f->setAudio(array("src" => "modulos/inventarios/multimedia/audios/inventarios-solicitud-denegado-eliminar-detalle.mp3", "autoplay" => true));
}
//Compilacion
$f->botones($f->campos['cancelar'], "inferior-derecha");



/** JavaScripts * */
$f->JavaScript("MUI.titleWindow($('" . ($f->ventana) . "'), \"Eliminar Detalle - " . $detalle['detalle'] . "\");");
$f->JavaScript("MUI.centerWindow($('" . $f->ventana . "'));");
$f->eClick("cancelar" . $f->id, ""
        . "new MUI.Audio({\"audio\":\$(AudioGlobal),\"src\":\"modulos/inventarios/multimedia/audios/window-close.mp3\",\"autoplay\":true});"
        . "MUI.closeWindow($('" . $f->ventana . "'));");
?>