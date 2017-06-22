<?php

$im = new Inventarios_Medidas();

$valores['costo_compra_unidad'] = Request::getValue("costo_compra_unidad");
$valores['margen_utilidad'] = Request::getValue("medida_venta_cantidad");
$valores['precio_venta'] = Request::getValue("medida_venta");
$valores['ganancia'] = Request::getValue("ganancia");

$message="<p>Un costo, es un egreso que representa el valor de los recursos que se erogan en la "
        . "realización de actividades que generan ingreso; el costo se identifica por ser generador directo de ingreso y por tanto, "
        . "es recuperable, está directamente relacionado con el producto y/o servicio que adquiere la empresa y ante el cual "
        . "se plantea obtener una ganancia definida como utilidad, lo cual convierte al artículo u objeto adquirido en un activo."
        . "</p>";

$f->campos['unidad_compra'] = $f->text("unidad_compra", "1", "10", "automatico", "true");
$f->campos['costo_compra_unidad'] = $f->text("costo_compra_unidad", "0", "10", "");
$f->campos['margen_utilidad'] = $f->text("margen_utilidad", "0", "10", "");
$f->campos['unidad_venta'] = $f->text("unidad_venta", "1", "10", "automatico", "true");
$f->campos['precio_venta'] = $f->text("precio_venta", "0", "10", "");
$f->campos['ganancia'] = $f->text("ganancia", "0", "10", "");
$f->campos['ganancia_venta'] = $f->text("ganancia_venta", "0", "10", "");

$f->celdas["unidad_compra"] = $f->celda("Unidad de Compra:", $f->campos['unidad_compra']);
$f->celdas["costo_compra_unidad"] = $f->celda("Costo: (\$COP)", $f->campos['costo_compra_unidad']);
$f->celdas["margen_utilidad"] = $f->celda("Margen de Utilidad: (%)", $f->campos['margen_utilidad']);
$f->celdas["unidad_venta"] = $f->celda("Unidad(es) Vendibles:", $f->campos['unidad_venta']);
$f->celdas["precio_venta"] = $f->celda("Precio (Unidad Vendible):", $f->campos['precio_venta']);
$f->celdas["ganancia"] = $f->celda("Ganancia Total:", $f->campos['ganancia']);
$f->celdas["ganancia_venta"] = $f->celda("Ganancia (Unidad Vendida):", $f->campos['ganancia_venta']);

$f->fila["pf1"] = $f->getNotification(array("image"=>"money","message"=>$message));
$f->fila["pf2"] = $f->fila($f->celdas["unidad_compra"] . $f->celdas["costo_compra_unidad"] . $f->celdas["margen_utilidad"] . $f->celdas["ganancia"]);
$f->fila["pf3"] = $f->fila("<h2>Precio de Venta</h2>");
$f->fila["pf4"] = $f->fila($f->celdas["unidad_venta"] . $f->celdas["precio_venta"] . $f->celdas["ganancia_venta"]);

$f->fila["precios"] = $f->fila["pf1"] . $f->fila["pf2"] . $f->fila["pf3"] . $f->fila["pf4"];

$f->JavaScript(""
        . "var cc=\$(\"costo_compra_unidad\");"
        . "var mu=\$(\"margen_utilidad\");"
        . "var pv=\$(\"precio_venta\");"
        . "var g=\$(\"ganancia\");"
        . "var uv=\$(\"unidad_venta\");"
        . "var guv=\$(\"ganancia_venta\");"
        . ""
        . "cc.addEvent('keyup', function(event){"
        . "    evaluar(\"cc\",cc,mu,pv,uv,g,guv);"
        . "});"
        . ""
        . "mu.addEvent('keyup', function(event){"
        . "    evaluar(\"mu\",cc,mu,pv,uv,g,guv);"
        . "});"
        . ""
        . "pv.addEvent('keyup', function(event){"
        . "    evaluar(\"pv\",cc,mu,pv,uv,g,guv);"
        . "});"
        . ""
        . "function evaluar(origen,cc,mu,pv,uv,g,guv){"
        . "   var vcc=cc.value;"
        . "   var vmu=mu.value;"
        . "   var vpv=pv.value;"
        . "   var vuv=uv.value;"
        . "   var vguv=guv.value;"
        . ""
        . "   if(origen===\"cc\"){"
        . "     if(vmu==null || vmu==\"\"){mu.value=35;}"
        . "     var ganancia=(parseFloat(vcc)*parseFloat(vmu))/100;"
        . "     vguv=((parseFloat(vcc)/vuv)*(vmu/100));"
        . "     vpv=(parseFloat(vcc)/vuv)+(parseFloat(ganancia)/vuv);"
        . "     g.value=ganancia.toFixed(2);"
        . "      pv.value=(parseFloat(vpv)).toFixed(2);"
        . "     guv.value=(parseFloat(vguv)).toFixed(2);"
        . "   }else if(origen===\"mu\"){"
        . "     /** Margen de Utilidad **/"
        . "     var ganancia=(parseFloat(vcc)*parseFloat(vmu))/100;"
        . "     vguv=((parseFloat(vcc)/vuv)*(vmu/100));"
        . "     vpv=(parseFloat(vcc)/vuv)+(parseFloat(ganancia)/vuv);"
        . "     g.value=parseFloat(ganancia).toFixed(2);"
        . "     pv.value=parseFloat(vpv).toFixed(2);"
        . "     guv.value=(parseFloat(vguv)).toFixed(2);"
        . "   }else if(origen===\"pv\"){"
        . "       var ganancia=(parseFloat(vpv)*vuv)-parseFloat(vcc);"
        . "       vmu=(parseFloat(ganancia)*100)/parseFloat(vcc);"
        . "       vguv=((parseFloat(vcc)/vuv)*(vmu/100));"
        . "       mu.value=vmu.toFixed(2);"
        . "       g.value=parseFloat(ganancia).toFixed(2);"
        . "       guv.value=(parseFloat(vguv)).toFixed(2);"
        . "   }else{"
        . "     if(vmu==null || vmu==\"\"){mu.value=35;}"
        . "     var ganancia=(parseFloat(vcc)*parseFloat(vmu))/100;"
        . "     vguv=((parseFloat(vcc)/vuv)*(vmu/100));"
        . "     vpv=(parseFloat(vcc)/vuv)+(parseFloat(ganancia)/vuv);"
        . "     g.value=ganancia.toFixed(2);"
        . "      pv.value=(parseFloat(vpv)).toFixed(2);"
        . "     guv.value=(parseFloat(vguv)).toFixed(2);"
        . "   }"
        . ""
        . "}"
        . "");
?>