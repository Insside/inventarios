<?php

$ROOT = (!isset($ROOT)) ? "../../../../../" : $ROOT;
require_once($ROOT . "modulos/inventarios/librerias/Configuracion.cnf.php");

/** Variables **/
$cadenas = new Cadenas();
$fechas = new Fechas();
$validaciones = new Validaciones();
$componentes=new Componentes();
$ie=new Inventarios_Empleados();
$usuario=Sesion::usuario();
/** Valores **/
$valores=$ie->consultar($validaciones->recibir("empleado"));
/** Campos **/
$f->oculto("itable",$validaciones->recibir("itable"));
$f->campos['empleado']=$f->campo("empleado",$valores['empleado']);
$f->campos['documento']=$f->campo("documento",$valores['documento']);
$f->campos['nombres']=$f->campo("nombres",$valores['nombres']);
$f->campos['apellidos']=$f->campo("apellidos",$valores['apellidos']);
$f->campos['direccion']=$f->campo("direccion",$valores['direccion']);
$f->campos['telefono']=$f->campo("telefono",$valores['telefono']);
$f->campos['correo']=$f->campo("correo",$valores['correo']);
$f->campos['sexo']=$f->campo("sexo",$valores['sexo']);
$f->campos['foto']=$f->campo("foto",$valores['foto']);
$f->campos['fecha']=$f->campo("fecha",$valores['fecha']);
$f->campos['hora']=$f->campo("hora",$valores['hora']);
$f->campos['creador']=$f->campo("creador",$valores['creador']);
$f->campos['ayuda']=$f->button("ayuda".$f->id, "button","Ayuda");
$f->campos['cancelar']=$f->button("cancelar".$f->id, "button","Cancelar");
$f->campos['continuar']=$f->button("continuar".$f->id, "submit","Continuar");
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
$f->fila["fila5"]=$f->fila($f->celdas["foto"].$f->celdas["fecha"].$f->celdas["hora"].$f->celdas["creador"]);
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
$f->JavaScript("MUI.titleWindow($('".($f->ventana)."'),\"Consulta Empleado\");");
$f->JavaScript("MUI.resizeWindow($('".($f->ventana)."'),{width: 500,height:300});");
$f->JavaScript("MUI.centerWindow($('".$f->ventana."'));");
$f->eClick("cancelar".$f->id,"MUI.closeWindow($('".$f->ventana."'));");
?>