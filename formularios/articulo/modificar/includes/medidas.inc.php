<?php
$im = new Inventarios_Medidas();
$d['medida_compra'] = $d['medida'];
$f->campos['medida_compra'] = $im->combo("medida_compra", $d['medida_compra']);
$f->campos['medida_venta'] = $im->combo("medida_venta", $d['medida_venta']);
$f->campos['medida_venta_cantidad'] = $f->dynamic(array("field" => "medida_venta_cantidad", "value" => $d["medida_venta_cantidad"], "required" => true));
$f->celdas["medida_compra"] = $f->celda("Unidad de Compra:", $f->campos['medida_compra']);
$f->celdas["medida_venta"] = $f->celda("Unidad de Venta:", $f->campos['medida_venta']);
$f->celdas["medida_venta_cantidad"] = $f->celda("Cantidad Equivalente:", $f->campos['medida_venta_cantidad']);
$f->fila["mf1"] = $f->fila($f->celdas["medida_compra"]);
$f->fila["mf2"] = $f->fila($f->celdas["medida_venta"]);
$f->fila["mf3"] = $f->fila($f->celdas["medida_venta_cantidad"]);
$f->fila["medidas"] = $f->fila["mf1"]. $f->fila["mf2"].$f->fila["mf3"];

$f->JavaScript(""
        . "var mvc=\$(\"medida_venta_cantidad\");"
        . "mvc.addEvent('keyup', function(event){"
        . "    if(\$(\"unidad_venta\")){"
        . "         \$(\"unidad_venta\").value=mvc.value;"
        . "          evaluar(\"uv\",cc,mu,pv,uv,g,guv);"
        . "    }"
        . "   "
        . "});"
        . "");
?>