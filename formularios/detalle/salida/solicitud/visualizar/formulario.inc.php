<?php
/** Variables **/
/** Valores **/
$ia=new Inventarios_Articulos();
$isd= new Inventarios_Salidas_Detalles();
$d=$isd->consultar(Request::getValue("detalle"));
$articulo=$ia->consultar($d["articulo"]);
$grid=Request::getValue("grid");
/** Campos **/
$f->campos['detalle']=$f->campo("detalle",$d['detalle']);
$f->campos['salida']=$f->campo("salida",$d['salida']);
$f->campos['articulo']=$f->campo("articulo",$d['articulo']);
$f->campos['cantidad_solicitada']=$f->campo("cantidad_solicitada",$d['cantidad_solicitada']);
$f->campos['cantidad_entregada']=$f->campo("cantidad_entregada",$d['cantidad_entregada']);
$f->campos['medida']=$f->campo("medida",$d['medida']);
$f->campos['fecha_solicitud']=$f->campo("fecha_solicitud",$d['fecha_solicitud']);
$f->campos['fecha_entrega']=$f->campo("fecha_entrega",$d['fecha_entrega']);
$f->campos['creador_solicitud']=$f->campo("creador_solicitud",$d['creador_solicitud']);
$f->campos['creador_entrega']=$f->campo("creador_entrega",$d['creador_entrega']);
$f->campos['observacion']=$f->campo("observacion",$d['observacion']);
$f->campos['articulo_codigo']=$f->campo("articulo_codigo",$articulo["codigo"]);
$f->campos['articulo_nombre']=$f->campo("articulo_nombre",$articulo["nombre"]);
$f->campos['ayuda']=$f->button("ayuda".$f->id, "button","Ayuda");
$f->campos['cancelar']=$f->button("cancelar".$f->id, "button","Cerrar");
$f->campos['continuar']=$f->button("continuar".$f->id, "submit","Continuar");
/** Celdas **/
$f->celdas["detalle"]=$f->celda("Código del Detalle:",$f->campos['detalle']);
$f->celdas["salida"]=$f->celda("Código de la Salida:",$f->campos['salida']);
$f->celdas["articulo"]=$f->celda("Código del Articulo:",$f->campos['articulo']);
$f->celdas["cantidad_solicitada"]=$f->celda("Cantidad_Solicitada:",$f->campos['cantidad_solicitada']);
$f->celdas["cantidad_entregada"]=$f->celda("Cantidad_Entregada:",$f->campos['cantidad_entregada']);
$f->celdas["medida"]=$f->celda("Medida:",$f->campos['medida']);
$f->celdas["fecha_solicitud"]=$f->celda("Fecha_Solicitud:",$f->campos['fecha_solicitud']);
$f->celdas["fecha_entrega"]=$f->celda("Fecha_Entrega:",$f->campos['fecha_entrega']);
$f->celdas["creador_solicitud"]=$f->celda("Creador_Solicitud:",$f->campos['creador_solicitud']);
$f->celdas["creador_entrega"]=$f->celda("Creador_Entrega:",$f->campos['creador_entrega']);
$f->celdas["observacion"]=$f->celda("Observacion:",$f->campos['observacion']);
$f->celdas["articulo_codigo"]=$f->celda("Código Contable:",$f->campos['articulo_codigo']);
$f->celdas["articulo_nombre"]=$f->celda("Referencia Completa del Articulo Solicitado:",$f->campos['articulo_nombre']);
/** Filas **/
$f->fila["fila1"]=$f->fila($f->celdas["detalle"].$f->celdas["salida"].$f->celdas["articulo"].$f->celdas["articulo_codigo"]);
$f->fila["fila2"]=$f->fila($f->celdas["articulo_nombre"]);
$f->fila["fila3"]=$f->fila($f->celdas["cantidad_solicitada"].$f->celdas["cantidad_entregada"].$f->celdas["medida"]);
//$f->fila["fila4"]=$f->fila($f->celdas["fecha_solicitud"].$f->celdas["fecha_entrega"]);
//$f->fila["fila5"]=$f->fila($f->celdas["creador_solicitud"].$f->celdas["creador_entrega"]);
$f->fila["fila6"]=$f->fila($f->celdas["observacion"]);
/** Compilando **/
$f->filas($f->fila['fila1']);
$f->filas($f->fila['fila2']);
$f->filas($f->fila['fila3']);
//$f->filas($f->fila['fila4']);
//$f->filas($f->fila['fila5']);
$f->filas($f->fila['fila6']);
/** Botones **/
$f->botones($f->campos['ayuda'], "inferior-izquierda");
$f->botones($f->campos['cancelar'], "inferior-derecha");
//$f->botones($f->campos['continuar'], "inferior-derecha");
/** JavaScripts **/
$f->windowTitle("Visualizar / Salida / Detalle / {$d["detalle"]}","1.0");


$f->JavaScript("MUI.resizeWindow($('".($f->ventana)."'),{width:640,height:300});");
$f->JavaScript("MUI.centerWindow($('".$f->ventana."'));");
$f->eClick("cancelar".$f->id,"MUI.closeWindow($('".$f->ventana."'));");

?>