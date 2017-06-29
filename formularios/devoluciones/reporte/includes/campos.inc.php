<?php

/** Campos * */
if (!empty($grid)) {
    $f->oculto("grid", $grid);
}

/** Campos **/
//$f->campos['criterio']=$solicitudes->criterios("criterio", $valores['criterio']);
//$f->campos['valor']=$f->text("valor",$valores['valor'], "32","", false);
$f->campos['inicial']=$f->calendario("inicial".$f->id,$d['inicial'],"-1","2");
$f->campos['final']=$f->calendario("final".$f->id,$d['final'],"-1");
//$f->campos['devolucion']=$f->dynamic(array("field"=>"devolucion","value"=>$d["devolucion"]));
//$f->campos['detalle']=$f->dynamic(array("field"=>"detalle","value"=>$d["detalle"]));
//$f->campos['cantidad']=$f->dynamic(array("field"=>"cantidad","value"=>$d["cantidad"]));
//$f->campos['transaccion']=$f->dynamic(array("field"=>"transaccion","value"=>$d["transaccion"]));
//$f->campos['observacion']=$f->dynamic(array("field"=>"observacion","value"=>$d["observacion"]));
//$f->campos['fecha']=$f->dynamic(array("field"=>"fecha","value"=>$d["fecha"]));
//$f->campos['hora']=$f->dynamic(array("field"=>"hora","value"=>$d["hora"]));
//$f->campos['creador']=$f->dynamic(array("field"=>"creador","value"=>$d["creador"]));
$f->campos['ayuda'] = $f->button("ayuda" . $f->id, "button", "Ayuda");
$f->campos['cancelar'] = $f->button("cancelar" . $f->id, "button", "Cancelar");
$f->campos['continuar'] = $f->button("continuar" . $f->id, "submit", "Continuar");
?>