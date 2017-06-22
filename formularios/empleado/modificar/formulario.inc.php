<?php

$ROOT = (!isset($ROOT)) ? "../../../../../" : $ROOT;
require_once($ROOT . "modulos/inventarios/librerias/Configuracion.cnf.php");

/** Variables **/
$cadenas = new Cadenas();
$date = new Dates();
$validaciones = new Validaciones();
$componentes=new Componentes();
$ie=new Inventarios_Empleados();
$usuario=Sesion::usuario();
/** Valores **/
$valores=$ie->consultar(Request::getValue("empleado"));
/** Campos **/
$f->oculto("itable",Request::getValue("itable"));
$f->campos['empleado']=$f->text("empleado",$valores['empleado'],"10","required codigo",true);
$f->campos['documento']=$f->text("documento",$valores['documento'],"2","required codigo",true);
$f->campos['nombres']=$f->text("nombres",$valores['nombres'],"255","",false);
$f->campos['apellidos']=$f->text("apellidos",$valores['apellidos'],"255","",false);
$f->campos['direccion']=$f->text("direccion",$valores['direccion'],"255","",false);
$f->campos['telefono']=$f->text("telefono",$valores['telefono'],"255","",false);
$f->campos['correo']=$f->text("correo",$valores['correo'],"255","",false);
$f->campos['sexo']=$componentes->combo_sexo("sexo",$valores['sexo']);
$f->campos['foto']=$f->text("foto",$valores['foto'],"255","",true);
$f->campos['fecha']=$f->text("fecha",$date->getDate(),"10","required automatico",true);
$f->campos['hora']=$f->text("hora",$date->getNow(),"8","required automatico",true);
$f->campos['creador']=$f->text("creador",$usuario["usuario"],"10","required automatico",true);
$f->campos['ayuda']=$f->button("ayuda".$f->id, "button","Ayuda");
$f->campos['cancelar']=$f->button("cancelar".$f->id, "button","Cancelar");
$f->campos['continuar']=$f->button("continuar".$f->id, "submit","Modificar");
/** Celdas **/
$f->celdas["empleado"]=$f->celda("Numero de Identificación:",$f->campos['empleado']);
$f->celdas["documento"]=$f->celda("Tipo de Documento:",$f->campos['documento']);
$f->celdas["nombres"]=$f->celda("Nombres:",$f->campos['nombres']);
$f->celdas["apellidos"]=$f->celda("Apellidos:",$f->campos['apellidos']);
$f->celdas["direccion"]=$f->celda("Dirección de Residencia:",$f->campos['direccion']);
$f->celdas["telefono"]=$f->celda("Teléfono:",$f->campos['telefono']);
$f->celdas["correo"]=$f->celda("Correo Electrónico:",$f->campos['correo']);
$f->celdas["sexo"]=$f->celda("Sexo:",$f->campos['sexo']);
$f->celdas["foto"]=$f->celda("Foto:",$f->campos['foto']);
$f->celdas["fecha"]=$f->celda("Fecha:",$f->campos['fecha']);
$f->celdas["hora"]=$f->celda("Hora:",$f->campos['hora']);
$f->celdas["creador"]=$f->celda("Creador:",$f->campos['creador']);
/** Filas **/
$f->fila["fila1"]=$f->fila($f->celdas["documento"].$f->celdas["empleado"]);
$f->fila["fila2"]=$f->fila($f->celdas["nombres"].$f->celdas["apellidos"]);
$f->fila["fila3"]=$f->fila($f->celdas["direccion"].$f->celdas["telefono"]);
$f->fila["fila4"]=$f->fila($f->celdas["correo"].$f->celdas["sexo"]);
$f->fila["fila5"]=$f->fila($f->celdas["fecha"].$f->celdas["hora"].$f->celdas["creador"]);
/** Compilando **/
$f->filas($f->fila['fila1']);
$f->filas($f->fila['fila2']);
$f->filas($f->fila['fila3']);
$f->filas($f->fila['fila4']);
$f->filas($f->fila['fila5']);
/** Botones **/
$f->botones($f->campos['ayuda'], "inferior-izquierda");
$f->botones($f->campos['continuar'], "inferior-derecha");
$f->botones($f->campos['cancelar'], "inferior-derecha");

/** JavaScripts **/
$f->JavaScript("MUI.titleWindow($('".($f->ventana)."'),\"Registrar Empleado\");");
$f->JavaScript("MUI.resizeWindow($('".($f->ventana)."'),{width: 500,height:360});");
$f->JavaScript("MUI.centerWindow($('".$f->ventana."'));");
$f->eClick("cancelar".$f->id,"MUI.closeWindow($('".$f->ventana."'));");
?>