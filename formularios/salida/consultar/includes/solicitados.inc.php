<?php

$d['uid'] = $usuario['usuario'];
$d['criterio'] = $v->recibir("criterio");
$d['valor'] = $v->recibir("valor");
$d['inicio'] = $v->recibir("inicio");
$d['final'] = $v->recibir("final");
$d['transaccion'] = Request::getValue("transaccion");
$d['url'] = "modulos/inventarios/formularios/salida/consultar/includes/articulos.json.php?"
        . "uid=" . $d['uid']
        . "&criterio=salida"
        . "&valor=" . $salida
        . "&inicio=" . $d['inicio']
        . "&final=" . $d['final']
        . "&transaccion=" . $d['transaccion'];

/** Creación de la tabla * */
$solicitados = new Grid(array("id" =>"GridSolicitados". time(), "url" => $d['url'],"height"=>"480"));
$solicitados->set_Function("solicitar","MUI.Inventarios_Salida_Detalle_Solicitud_Crear('".$salida."','".$solicitados->id."');");
$solicitados->set_Function("entregar","MUI.Inventarios_Salida_Detalle_Solicitud_Crear('".$salida."','".$solicitados->id."');");
$solicitados->set_Function("legalizar","MUI.Inventarios_Salida_Detalle_Solicitud_Crear('".$salida."','".$solicitados->id."');");
$solicitados->set_Function("imprimirentrega","MUI.Inventarios_Salida_Imprimir_Entrega('{$salida}','{$solicitados->id}');");

$solicitados->boton('btnVer', 'Visualizar', "detalle", "MUI.Inventarios_Salida_Detalle", "cells_row-list");
$solicitados->boton('btnCrear', 'Solicitar', '', $solicitados->get_Function("solicitar"), "cells_row-add");
$solicitados->boton('btnEliminar', 'Eliminar', 'detalle', "MUI.Inventarios_Salida_Detalle_Solicitud_Eliminar", "cells_row-delete");
//$solicitados->boton("btnImprimir","Imprimir","",$solicitados->get_Function("imprimirentrega"),"print");

$solicitados->columna('cSalida', 'Salida', 'salida', 'string', '100', 'center', 'true');
$solicitados->columna('cCodigo', '#', 'conteo', 'string', '25', 'center', 'false');
$solicitados->columna('cCodigo', 'Código', 'codigo', 'string', '100', 'center', 'false');
$solicitados->columna('cArticulo', 'A', 'articulo', 'string', '50', 'center', 'false');
$solicitados->columna('cNombre', 'Nombre del Producto Solicitado', 'nombre', 'string', '470', 'left', 'false');
$solicitados->columna('cCantidadS', 'S', 'cantidad_solicitada', 'string', '50', 'right', 'false');
$solicitados->columna('cCantidadE', 'E', 'cantidad_entregada', 'string', '50', 'right', 'false');
$solicitados->columna('cMedida', 'Medida', 'medida', 'string', '55', 'left', 'false');
$solicitados->columna('cObservaciones', 'Obs', 'observacion', 'string', '50', 'center', 'false');
//$solicitados->columna('cFecha Solicitud', 'Fecha', 'fecha_solicitud', 'date', '90', 'center', 'false');
//$solicitados->columna('cHora', 'Hora', 'hora', 'string', '90', 'center', 'false');
$f->fila["articulos_solicitados"]=$f->fila($solicitados->get_Code());
?>