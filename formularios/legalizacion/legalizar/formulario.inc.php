<?php
/** Variables **/
$cadenas = new Cadenas();
$fechas = new Fechas();
$validaciones = new Validaciones();
$usuario=Sesion::getUser();
/** Valores **/
$itable=Request::getValue("itable");
$valores['legalizacion']=Request::getValue("_legalizacion");
$valores['detalle']=Request::getValue("_detalle");
$valores['cantidad']=Request::getValue("_cantidad");
$valores['cobro']=Sesion::getValue("legalizacioncobro");
$valores['observacion']=Request::getValue("_observacion");
$valores['fecha']=Request::getValue("_fecha");
$valores['hora']=Request::getValue("_hora");
$valores['creador']=Request::getValue("_creador");
/** Campos **/
$f->oculto("grid",$v->recibir("grid"));
$f->oculto("legalizacion",time());
$f->oculto("detalle",$v->recibir("detalle"));
$f->oculto("fecha",$fechas->hoy());
$f->oculto("hora",$fechas->ahora());
$f->oculto("creador",$usuario);

$f->campos['legalizacion']=$f->dynamic(array("field"=>"legalizacion","value"=>$valores["legalizacion"]));
$f->campos['detalle']=$f->dynamic(array("field"=>"detalle","value"=>$valores["detalle"]));
$f->campos['cantidad']=$f->dynamic(array("field"=>"cantidad","value"=>$valores["cantidad"]));
$f->campos['cobro']=$f->dynamic(array("id"=>"cobro".$f->id,"field"=>"cobro","value"=>$valores["cobro"],"class"=>"required"));
$f->campos['observacion']=$f->dynamic(array("field"=>"observacion","value"=>$valores["observacion"],"height"=>"100"));
//$f->campos['fecha']=$f->dynamic(array("field"=>"fecha","value"=>$valores["fecha"]));
//$f->campos['hora']=$f->dynamic(array("field"=>"hora","value"=>$valores["hora"]));
//$f->campos['creador']=$f->dynamic(array("field"=>"creador","value"=>$valores["creador"]));
$f->campos['ayuda']=$f->button("ayuda".$f->id, "button","Ayuda");
$f->campos['cancelar']=$f->button("cancelar".$f->id, "button","Cancelar");
$f->campos['continuar']=$f->button("continuar".$f->id, "submit","Reportar");
/** Celdas **/
$f->celdas["legalizacion"]=$f->celda("Legalización:",$f->campos['legalizacion']);
$f->celdas["detalle"]=$f->celda("Detalle:",$f->campos['detalle']);
$f->celdas["cantidad"]=$f->celda("Cantidad:",$f->campos['cantidad']);
$f->celdas["cobro"]=$f->celda("Código del Cobro:",$f->campos['cobro']);
$f->celdas["observacion"]=$f->celda("Observacion:",$f->campos['observacion']);
//$f->celdas["fecha"]=$f->celda("Fecha:",$f->campos['fecha']);
//$f->celdas["hora"]=$f->celda("Hora:",$f->campos['hora']);
//$f->celdas["creador"]=$f->celda("Creador:",$f->campos['creador']);
/** Filas **/
$f->fila["fila1"]=$f->fila($f->celdas["cobro"].$f->celdas["cantidad"]);
$f->fila["fila2"]=$f->fila($f->celdas["observacion"]);
/** Compilando **/
$f->filas($f->fila['fila1']);
$f->filas($f->fila['fila2']);
/** Botones **/
$f->botones($f->campos['ayuda'], "inferior-izquierda");
$f->botones($f->campos['continuar'], "inferior-derecha");
$f->botones($f->campos['cancelar'], "inferior-derecha");
/** JavaScripts **/
$f->setAudio(array("src"=>"modulos/inventarios/multimedia/audios/inventarios-solicitud-detalle-legalizar-cantidad.mp3","autoplay"=>true));
$f->windowTitle("Legalización","1.0");
$f->windowResize(array("autoresize"=>false,"width"=>"550","height"=>"350"));
$f->windowCenter();
$f->eClick("cancelar".$f->id,"MUI.closeWindow($('".$f->ventana."'));");
?>
