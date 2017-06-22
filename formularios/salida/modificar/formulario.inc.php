<?php
$ROOT = (!isset($ROOT)) ? "../../../../../" : $ROOT;
require_once($ROOT . "modulos/inventarios/librerias/Configuracion.cnf.php");
/** Variables * */
$cadenas = new Cadenas();
$fechas = new Fechas();
$validaciones = new Validaciones();
$componentes = new Componentes();
$is=new Inventarios_Salidas();
$ie=new Inventarios_Empleados();
$ic=new Inventarios_Centros();
$ist=new Inventarios_Salidas_Tipos();
$usuario = Sesion::usuario();
/** Valores **/
$valores=$is->consultar(Request::getValue("salida"));
/** Campos * */
$f->oculto("itable",Request::getValue("itable"));
$f->campos['salida'] = $f->text("salida", $valores['salida'], "10", "required codigo", true);
$f->campos['tercero'] = $ie->combo("tercero",$valores['tercero']);
$f->campos['centro_costos'] = $ic->combo("centros_costos",@$valores['centros_costos']);
$f->campos['tipo'] = $ist->combo("tipo",@$valores['tipo']);
$f->campos['orden'] = $f->text("orden", $valores['orden'], "10", "", false);
$f->campos['cobro'] = $f->text("cobro", $valores['cobro'], "10", "require automatico", true);
$f->campos['fecha'] = $f->text("fecha", $valores['fecha'], "10", "require automatico", true);
$f->campos['hora'] = $f->text("hora", $valores['hora'], "8", "require automatico", true);
$f->campos['creador'] = $f->text("creador", $valores['creador'], "10", "require automatico", true);
$f->campos['ayuda'] = $f->button("ayuda" . $f->id, "button", "Ayuda");
$f->campos['cancelar'] = $f->button("cancelar" . $f->id, "button", "Cancelar");
$f->campos['continuar'] = $f->button("continuar" . $f->id, "submit", "Registrar");
/** Celdas **/
$f->celdas["salida"] = $f->celda("Salida:", $f->campos['salida']);
$f->celdas["tercero"] = $f->celda("Cliente / Empleado:", $f->campos['tercero']);
$f->celdas["tipo"] = $f->celda("Tipo:", $f->campos['tipo']);
$f->celdas["centro_costos"] = $f->celda("Centro de Costos:", $f->campos['centro_costos']);
$f->celdas["orden"] = $f->celda("Orden de Servicio:", $f->campos['orden']);
$f->celdas["cobro"] = $f->celda("Cobro:", $f->campos['cobro']);
$f->celdas["fecha"] = $f->celda("Fecha:", $f->campos['fecha']);
$f->celdas["hora"] = $f->celda("Hora:", $f->campos['hora']);
$f->celdas["creador"] = $f->celda("Creador:", $f->campos['creador']);
/** Filas * */
$f->fila["fila1"] = $f->fila($f->celdas["salida"] . $f->celdas["fecha"] . $f->celdas["hora"] . $f->celdas["creador"]);
$f->fila["fila2"] = $f->fila($f->celdas["tercero"]);
$f->fila["fila3"] = $f->fila($f->celdas["centro_costos"]);
//$f->fila["fila4"] = $f->fila($f->celdas["orden"] . $f->celdas["cobro"]);
/** Compilando * */
$f->filas($f->fila['fila1']);
$f->filas($f->fila['fila2']);
$f->filas($f->fila['fila3']);
//$f->filas($f->fila['fila4']);
/** Botones * */
$f->botones($f->campos['ayuda'], "inferior-izquierda");
$f->botones($f->campos['continuar'], "inferior-derecha");
$f->botones($f->campos['cancelar'], "inferior-derecha");
/** JavaScripts * */
$f->JavaScript("MUI.titleWindow($('" . ($f->ventana) . "'),\"Modificar / Salida / ".$valores["salida"]." \");");
$f->JavaScript("MUI.resizeWindow($('" . ($f->ventana) . "'),{width: 500,height:270});");
$f->JavaScript("MUI.centerWindow($('" . $f->ventana . "'));");
$f->eClick("cancelar" . $f->id, "MUI.closeWindow($('" . $f->ventana . "'));");
?>