<?php
$ia=new Inventarios_Articulos();
$ip=new Inventarios_Precios();
$im=new Inventarios_Medidas();
/** Valores **/
$articulo=$ia->consultar($validaciones->recibir("articulo"));
$im_compra=$im->consultar($articulo["medida_compra"]);
$im_venta=$im->consultar($articulo["medida_venta"]);
/** Valores **/
$itable=$validaciones->recibir("itable");
$valores['precio']=time();
$valores['articulo']=$articulo["articulo"];
$valores['costo_compra_unidad']="0.0";
$valores['margen_utilidad']="35.00";
$valores['precio_venta_unidad']="0.0";
$valores['impuesto']="16.00";
$valores['responsable']=$validaciones->recibir("_responsable");
$valores['fecha']=date("Y-m-d");
$valores['hora']=date("H:m:s");
/** Campos **/
if(!empty($itable)){$f->oculto("itable",$itable);}
$f->campos['precio']=$f->dynamic(array("field"=>"precio","value"=>$valores["precio"],"readonly"=>true,"class"=>"codigo"));
$f->campos['articulo']=$f->dynamic(array("field"=>"articulo","value"=>$valores["articulo"],"readonly"=>true,"class"=>"codigo"));
$f->campos['articulo_medida_compra']=$f->text("articulo_medida_compra", $articulo["medida_compra"].": ".$im_compra["nombre"], "10", "automatico", "true");
$f->campos['articulo_medida_venta']=$f->text("articulo_medida_venta",$articulo["medida_venta"].": ".$im_venta["nombre"], "10", "automatico", "true");
$f->campos['articulo_medida_venta_cantidad']=$f->text("articulo_medida_venta_cantidad", $articulo["medida_venta_cantidad"], "10", "automatico", "true");
$f->campos['costo_compra_unidad']=$f->dynamic(array("field"=>"costo_compra_unidad","value"=>$valores["costo_compra_unidad"]));
$f->campos['margen_utilidad']=$f->dynamic(array("field"=>"margen_utilidad","value"=>$valores["margen_utilidad"]));
$f->campos['ganancia']=$f->text("ganancia","0.0", "10", "automatico");
$f->campos['precio_venta_unidad']=$f->dynamic(array("field"=>"precio_venta_unidad","value"=>$valores["precio_venta_unidad"]));
$f->campos['impuesto']=$f->dynamic(array("field"=>"impuesto","value"=>$valores["impuesto"]));
$f->campos['responsable']=$f->dynamic(array("field"=>"responsable","value"=>$valores["responsable"]));
$f->campos['fecha']=$f->dynamic(array("field"=>"fecha","value"=>$valores["fecha"],"readonly"=>true,"class"=>"automatico"));
$f->campos['hora']=$f->dynamic(array("field"=>"hora","value"=>$valores["hora"],"readonly"=>true,"class"=>"automatico"));
$f->campos['ayuda']=$f->button("ayuda".$f->id, "button","Ayuda");
$f->campos['cancelar']=$f->button("cancelar".$f->id, "button","Cancelar");
$f->campos['continuar']=$f->button("continuar".$f->id, "submit","Registrar");
/** Celdas **/
$f->celdas["precio"]=$f->celda("Código del Precio:",$f->campos['precio']);
$f->celdas["articulo_medida_compra"]=$f->celda("Medida de Compra:",$f->campos['articulo_medida_compra']);
$f->celdas["articulo_medida_venta"]=$f->celda("Medida de Venta:",$f->campos['articulo_medida_venta']);
$f->celdas["articulo_medida_venta_cantidad"]=$f->celda("Unidades de Venta:",$f->campos['articulo_medida_venta_cantidad']);
$f->celdas["articulo"]=$f->celda("Código del Articulo:",$f->campos['articulo']);
$f->celdas["costo_compra_unidad"]=$f->celda("Costo (Unidad de Compra):",$f->campos['costo_compra_unidad']);
$f->celdas["margen_utilidad"]=$f->celda("Margen de Utilidad(%):",$f->campos['margen_utilidad']);
$f->celdas["ganancia"]=$f->celda("Ganancia Total:",$f->campos['ganancia']);
$f->celdas["precio_venta_unidad"]=$f->celda("Precio (Unidad Venta):",$f->campos['precio_venta_unidad']);
$f->celdas["impuesto"]=$f->celda("Impuesto Aplicable (IVA):",$f->campos['impuesto']);
$f->celdas["responsable"]=$f->celda("Responsable:",$f->campos['responsable']);
$f->celdas["fecha"]=$f->celda("Fecha:",$f->campos['fecha']);
$f->celdas["hora"]=$f->celda("Hora:",$f->campos['hora']);
/** Filas **/
$f->fila["fila1"]=$f->fila($f->celdas["precio"].$f->celdas["articulo"].$f->celdas["fecha"].$f->celdas["hora"]);
$f->fila["fila2"]=$f->fila($f->celdas["articulo_medida_compra"].$f->celdas["costo_compra_unidad"].$f->celdas["margen_utilidad"].$f->celdas["ganancia"]);
$f->fila["fila3"]=$f->fila($f->celdas["articulo_medida_venta"].$f->celdas["articulo_medida_venta_cantidad"].$f->celdas["precio_venta_unidad"]);
$f->fila["fila4"]=$f->fila($f->celdas["impuesto"]);
/** Compilando **/
$f->filas($f->fila['fila1']);
$f->filas($f->fila['fila2']);
$f->filas($f->fila['fila3']);
$f->filas($f->fila['fila4']);
/** Botones * */
$f->botones($f->campos['ayuda'], "inferior-izquierda");
$f->botones($f->campos['cancelar'], "inferior-derecha");
$f->botones($f->campos['continuar'], "inferior-derecha");
/** JavaScripts * */
$f->JavaScript("MUI.titleWindow($('" . ($f->ventana) . "'),\"Nuevo Precio de Venta\");");
$f->JavaScript("MUI.resizeWindow($('" . ($f->ventana) . "'),{width: 750,height:270});");
$f->JavaScript("MUI.centerWindow($('" . $f->ventana . "'));");
$f->eClick("cancelar" . $f->id, "MUI.closeWindow($('" . $f->ventana . "'));");

$f->JavaScript(""
        . "var ccu=\$(\"costo_compra_unidad\");"
        . "var mu=\$(\"margen_utilidad\");"
        . "var g=\$(\"ganancia\");"
        . "var cuv=\$(\"articulo_medida_venta_cantidad\");"
        . "var pvu=\$(\"precio_venta_unidad\");"
        . ""
        . "ccu.addEvent('keyup', function(event){"
        . "    evaluar(\"ccu\",ccu,mu,g,cuv,pvu);"
        . "});"
        . ""
        . "mu.addEvent('keyup', function(event){"
        . "    evaluar(\"mu\",ccu,mu,g,cuv,pvu);"
        . "});"
        . ""
        . ""
        . "g.addEvent('keyup', function(event){"
        . "    evaluar(\"g\",ccu,mu,g,cuv,pvu);"
        . "});"
        . ""
        . "pvu.addEvent('keyup', function(event){"
        . "    evaluar(\"pvu\",ccu,mu,g,cuv,pvu);"
        . "});"
        . ""
        . ""
        . "function evaluar(origen,ccu,mu,g,cuv,pvu){"
        . "   var vccu=ccu.value;"
        . "   var vmu=mu.value;"
        . "   var vg=g.value;"
        . "   var vcuv=cuv.value;"
        . "   var vpvu=pvu.value;"
        . ""
        . "   if(origen===\"ccu\"){"
        . "     vg=(parseFloat(vccu)*(parseFloat(vmu)/100)).toFixed(2);"
        . "     vpuv=((parseFloat(vccu/vcuv))+(vg/parseFloat(vcuv))).toFixed(2);"
        . "     g.value=vg;"
        . "     pvu.value=vpuv;"
        . "   }else if(origen===\"mu\"){"
        . "     vg=(parseFloat(vccu)*(parseFloat(vmu)/100)).toFixed(2);"
        . "     vpuv=((parseFloat(vccu/vcuv))+(vg/parseFloat(vcuv))).toFixed(2);"
       . "      g.value=vg;"
        . "     pvu.value=vpuv;"
        . "   }else if(origen===\"pvu\"){"
        . "     vg=(parseFloat(vpvu)*vcuv)-parseFloat(vccu);"
        . "     vmu=(parseFloat(vg)*100)/parseFloat(vccu);"
        . "     g.value=vg;"
        . "     mu.value=vmu;"
        . "   }"
        . ""
        . ""
        . ""
        . "}"
        . "");
?>