<?php

/** Valores * */
$message="Se dispone a eliminar un numero serie. Esta acción es "
        . "irreversible. Antes de proceder, confirme o cancele la presente "
        . "solicitud para poder continuar.";
/** Campos * */
$f->oculto("grid", $grid);
$f->oculto("serial", $serial["serial"]);
$f->campos['eliminar'] = $f->button("eliminar" . $f->id, "submit", "Eliminar");
/** Filas **/
$f->fila["info"] =$f->getNotification(array("image"=>"fastdelete","message"=>$message));
$f->filas($f->fila['info']);
$f->botones($f->campos['eliminar'], "inferior-derecha");
/** JavaScripts **/
$codigo= strtoupper($serial["codigo"]);
$f->windowTitle("Eliminar / Serial / {$codigo}","1.3");
$f->windowResize(array("autoresize" => false, "width" => "390", "height" => "185"));
?>