<?php

/** Incudes * */
require_once(PATH . "/includes/variables.inc.php");
require_once(PATH . "/includes/campos.inc.php");
require_once(PATH . "/includes/celdas.inc.php");

/** Filas * */
if($ci<$cimax&&$salida["autorizado"] == "NO"){
    $f->fila["fila1"] = $f->fila($f->celdas["familia"]);
    $f->fila["fila2"] = $f->fila($f->celdas["articulo"]);
    $f->fila["fila3"] = $f->fila($f->celdas["cantidad_solicitada"] . $f->celdas["medida"]);
    $f->fila["fila4"] = $f->fila($f->celdas["observacion"]);
    /** Compilando * */
    $f->filas($f->fila['fila1']);
    $f->filas($f->fila['fila2']);
    $f->filas($f->fila['fila3']);
    $f->filas($f->fila['fila4']);
    /** Botones * */
    $f->botones($f->campos['ayuda'], "inferior-izquierda");
    $f->botones($f->campos['continuar'], "inferior-derecha");
    $f->windowResize(array("autoresize" => false, "width" => "480", "height" => "300"));
}elseif($ci>=$cimax){
    $message = "<p>No es posible adicionar más de {$cimax} elementos al detalle de una solicitud de entrega de materiales esta restricción se crea para preservar la integridad del FT-DAF-058. Recuerde que podra realizar tantas solicitudes como estime conveniente. Presione cancelar para continuar.</p>";
    $f->fila["info"] = $f->getNotification(array("image" => "lock", "message" => $message));
    $f->filas($f->fila['info']);
    $f->windowResize(array("autoresize" => false, "width" => "450", "height" => "260"));
    $f->setAudio(array("src"=>"modulos/inventarios/multimedia/audios/m0003.mp3","autoplay"=>true));
} else {
    $message = "<p>No es posible adicionar más elementos al detalle de una solicitud de entrega de materiales que se encuentra con aprobación expedida por un jefe de área. Para modificar o adicionar cualquier detalle de la presente solicitud deberá requerir al jefe de área que retire su aprobación, en tanto realiza las modificaciones relacionadas, y que solicitar apruebe nuevamente el pedido cuando estas hayan concluido, para dar curso al mismo en el almacén. Presione cancelar para continuar.</p>";
    $f->fila["info"] = $f->getNotification(array("image" => "lock", "message" => $message));
    $f->filas($f->fila['info']);
    $f->windowResize(array("autoresize" => false, "width" => "450", "height" => "240"));
    $f->setAudio(array("src"=>"modulos/inventarios/multimedia/audios/inventarios-solicitud-denegado-agregar-detalle.mp3","autoplay"=>true));
}
/** Botones * */
$f->botones($f->campos['cancelar'], "inferior-derecha");
require_once(PATH . "/includes/javascripts.inc.php");
?>