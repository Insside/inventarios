<?php
$valores['descripcion']=Request::getValue("descripcion");

$f->campos['descripcion']=$f->dynamic(array("field"=>"descripcion","value"=>$valores["descripcion"]));

$f->celdas["descripcion"]=$f->celda("Descripción:",$f->campos['descripcion']);

$f->fila["df1"]=$f->fila("<h2>Descripción / Detalles</h2>");
$f->fila["df2"]=$f->fila($f->celdas["descripcion"]);

$f->fila["descripcion"]=$f->fila["df1"].$f->fila["df2"];
?>