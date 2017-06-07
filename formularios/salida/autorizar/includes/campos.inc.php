<?php
/** Campos * */
$f->oculto("grid",$grid);
$f->oculto("salida",$salida["salida"]);
$f->campos['autoriza'] = $f->text("autoriza", $d['autoriza'], "10", "require automatico", true);
$f->campos['autorizado']=$f->dynamic(array("field"=>"autorizado","value"=>$d["autorizado"]));
$f->campos['ayuda'] = $f->button("ayuda" . $f->id, "button", "Ayuda");
$f->campos['cancelar'] = $f->button("cancelar" . $f->id, "button", "Cancelar");
$f->campos['continuar'] = $f->button("continuar" . $f->id, "submit", "Autorizar");
$f->campos['cerrar'] = $f->button("cerrar" . $f->id, "button", "Continuar");
?>