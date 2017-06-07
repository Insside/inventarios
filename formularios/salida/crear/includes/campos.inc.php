<?php
/** Campos * */
$f->oculto("grid",$d["grid"]);
$f->campos["salida"] = $f->text("salida", $d["salida"], "10", "required codigo", true);
$f->campos["tercero"] = $ie->combo("tercero",$d["tercero"]);
$f->campos["centro_costos"] = $ic->combo("centro_costos",$d["centro_costos"]);
$f->campos["observacion"]=$f->getTextArea(array(
    "id"=>"observacion",
    "value"=>urldecode($d["observacion"]),
    "pattern"=>"rtf",
    "readonly"=>false,
    "class"=>"h100px"));
$f->campos["tipo"] = $ist->combo("tipo",$d["tipo"]);
$f->campos["orden"] = $f->text("orden", $d["orden"], "10", "", false);
$f->campos["cobro"] = $f->text("cobro", $d["cobro"], "10", "require automatico", false);
$f->campos["fecha"] = $f->text("fecha", $d["fecha"], "10", "require automatico", true);
$f->campos["hora"] = $f->text("hora", $d["hora"], "8", "require automatico", true);
$f->campos["creador"] = $f->text("creador", $d["creador"], "10", "require automatico", true);
$f->campos["creador-nombre"] = $f->campo("creador-nombre", $d["creador-nombre"]);
$f->campos["ayuda"] = $f->button("ayuda" . $f->id, "button", "Ayuda");
$f->campos["cancelar"] = $f->button("cancelar" . $f->id, "button", "Cancelar");
$f->campos["continuar"] = $f->button("continuar" . $f->id, "submit", "Registrar");
?>