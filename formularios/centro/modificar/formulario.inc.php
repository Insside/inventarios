<?php
$ROOT = (!isset($ROOT)) ? "../../../../../" : $ROOT;
require_once($ROOT . "modulos/inventarios/librerias/Configuracion.cnf.php");
/** Variables * */
$cadenas = new Cadenas();
$fechas = new Fechas();
$validaciones = new Validaciones();
$componentes = new Componentes();
$is = new Inventarios_Salidas();
$ie = new Inventarios_Empleados();
$ic = new Inventarios_Centros();
$usuario = Sesion::usuario();
/** Valores * */
$itable = Request::getValue("itable");
$valores=$ic->consultar(Request::getValue("centro"));
/** Campos * */
if (!empty($itable)) {
  $f->oculto("itable", $itable);
}
$f->campos['centro'] = $f->dynamic(array("field"=>"centro","value"=> $valores["centro"],"class"=>"codigo w100px"));
$f->campos['codigo_contable'] = $f->dynamic(array("field" => "codigo_contable", "value" => $valores["codigo_contable"]));
$f->campos['nombre'] = $f->dynamic(array("field" => "nombre", "value" => $valores["nombre"]));
$f->campos['descripcion'] = $f->dynamic(array("field" => "descripcion", "value" => urldecode($valores["descripcion"])));
$f->campos['fecha'] = $f->dynamic(array("field" => "fecha", "value" => $valores["fecha"],"class"=>"automatico w100px"));
$f->campos['hora'] = $f->dynamic(array("field" => "hora", "value" => $valores["hora"],"class"=>"automatico w100px"));
$f->campos['ayuda'] = $f->button("ayuda" . $f->id, "button", "Ayuda");
$f->campos['cancelar'] = $f->button("cancelar" . $f->id, "button", "Cancelar");
$f->campos['continuar'] = $f->button("continuar" . $f->id, "submit", "Continuar");
/** Celdas * */
$f->celdas["centro"] = $f->celda("Centro:", $f->campos['centro']);
$f->celdas["codigo_contable"] = $f->celda("Código Contable:", $f->campos['codigo_contable']);
$f->celdas["nombre"] = $f->celda("Nombre:", $f->campos['nombre']);
$f->celdas["descripcion"] = $f->celda("Descripcion:", $f->campos['descripcion']);
$f->celdas["fecha"] = $f->celda("Fecha:", $f->campos['fecha']);
$f->celdas["hora"] = $f->celda("Hora:", $f->campos['hora']);
/** Filas * */
$f->fila["fila1"] = $f->fila($f->celdas["centro"].$f->celdas["codigo_contable"].$f->celdas["fecha"].$f->celdas["hora"]);
$f->fila["fila2"] = $f->fila($f->celdas["nombre"]);
$f->fila["fila3"] = $f->fila($f->celdas["descripcion"]);
/** Compilando * */
$f->filas($f->fila['fila1']);
$f->filas($f->fila['fila2']);
$f->filas($f->fila['fila3']);
/** Botones * */
$f->botones($f->campos['ayuda'], "inferior-izquierda");
$f->botones($f->campos['continuar'], "inferior-derecha");
$f->botones($f->campos['cancelar'], "inferior-derecha");
/** JavaScripts * */
$f->JavaScript("MUI.titleWindow($('" . ($f->ventana) . "'),\"Inventarios / Centros / Crear\");");
$f->JavaScript("MUI.resizeWindow($('" . ($f->ventana) . "'),{width: 500,height:500});");
$f->JavaScript("MUI.centerWindow($('" . $f->ventana . "'));");
$f->eClick("cancelar" . $f->id, "MUI.closeWindow($('" . $f->ventana . "'));");
?>