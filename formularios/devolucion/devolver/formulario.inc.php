<?php
/** Variables **/
$cadenas = new Cadenas();
$fechas = new Fechas();
$validaciones = new Validaciones();
$usuario=Sesion::getUser();
/** Valores **/
$itable=Request::getValue("itable");
$valores['devolucion']=Request::getValue("_devolucion");
$valores['detalle']=Request::getValue("_detalle");
$valores['cantidad']=Request::getValue("_cantidad");
$valores['transaccion']=Request::getValue("_transaccion");
$valores['observacion']=Request::getValue("_observacion");
$valores['fecha']=Request::getValue("_fecha");
$valores['hora']=Request::getValue("_hora");
$valores['creador']=Request::getValue("_creador");
/** Campos **/
$f->oculto("grid",$v->recibir("grid"));
$f->oculto("devolucion",time());
$f->oculto("detalle",$v->recibir("detalle"));
$f->oculto("fecha",$fechas->hoy());
$f->oculto("hora",$fechas->ahora());
$f->oculto("creador",$usuario);

$f->campos['devolucion']=$f->dynamic(array("field"=>"devolucion","value"=>$valores["devolucion"]));
$f->campos['detalle']=$f->dynamic(array("field"=>"detalle","value"=>$valores["detalle"]));
$f->campos['cantidad']=$f->dynamic(array("field"=>"cantidad","value"=>$valores["cantidad"]));
$f->campos['transaccion']=$f->dynamic(array("id"=>"transaccion".$f->id,"field"=>"transaccion","value"=>$valores["transaccion"],"class"=>"required"));
$f->campos['observacion']=$f->dynamic(array("field"=>"observacion","value"=>$valores["observacion"],"height"=>"100"));
$f->campos['fecha']=$f->dynamic(array("field"=>"fecha","value"=>$valores["fecha"]));
$f->campos['hora']=$f->dynamic(array("field"=>"hora","value"=>$valores["hora"]));
$f->campos['creador']=$f->dynamic(array("field"=>"creador","value"=>$valores["creador"]));
$f->campos['ayuda']=$f->button("ayuda".$f->id, "button","Ayuda");
$f->campos['cancelar']=$f->button("cancelar".$f->id, "button","Cancelar");
$f->campos['continuar']=$f->button("continuar".$f->id, "submit","Reportar");
/** Celdas **/
$f->celdas["devolucion"]=$f->celda("Devolucion:",$f->campos['devolucion']);
$f->celdas["detalle"]=$f->celda("Detalle:",$f->campos['detalle']);
$f->celdas["cantidad"]=$f->celda("Cantidad:",$f->campos['cantidad']);
$f->celdas["transaccion"]=$f->celda("Transaccion:",$f->campos['transaccion']);
$f->celdas["observacion"]=$f->celda("Observacion:",$f->campos['observacion']);
$f->celdas["fecha"]=$f->celda("Fecha:",$f->campos['fecha']);
$f->celdas["hora"]=$f->celda("Hora:",$f->campos['hora']);
$f->celdas["creador"]=$f->celda("Creador:",$f->campos['creador']);
/** Filas **/
$f->fila["fila1"]=$f->fila($f->celdas["transaccion"].$f->celdas["cantidad"]);
$f->fila["fila2"]=$f->fila($f->celdas["observacion"]);
/** Compilando **/
$f->filas($f->fila['fila1']);
$f->filas($f->fila['fila2']);
/** Botones **/
$f->botones($f->campos['ayuda'], "inferior-izquierda");
$f->botones($f->campos['continuar'], "inferior-derecha");
$f->botones($f->campos['cancelar'], "inferior-derecha");
/** JavaScripts **/
$f->setAudio(array("src"=>"modulos/inventarios/multimedia/audios/inventarios-solicitud-detalle-devolucion.mp3","autoplay"=>true));
$f->windowTitle("Devolución","1.0");
$f->windowResize(array("autoresize"=>false,"width"=>"550","height"=>"350"));
$f->windowCenter();
$f->eClick("cancelar".$f->id,"MUI.closeWindow($('".$f->ventana."'));");
?>
