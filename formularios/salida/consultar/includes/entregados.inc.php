<?php

$gridEntrega = "GridEntregados" . time();
$d['uid'] = $usuario['usuario'];
$d['criterio'] = Request::getValue("criterio");
$d['valor'] = Request::getValue("valor");
$d['inicio'] = Request::getValue("inicio");
$d['final'] = Request::getValue("final");
$d['transaccion'] = Request::getValue("transaccion");
$d['url'] = "modulos/inventarios/formularios/salida/consultar/includes/articulos.json.php?"
        . "grid=" . $gridEntrega
        . "&uid=" . $d['uid']
        . "&criterio=salida"
        . "&valor=" . $salida
        . "&inicio=" . $d['inicio']
        . "&final=" . $d['final']
        . "&transaccion=" . $d['transaccion'];

/** Creación de la tabla * */
$entregados = new Grid(array("id" => $gridEntrega, "url" => $d['url'], "height" => "480"));
//$entregados->set_Function("solicitar","MUI.Inventarios_Salida_Detalle_Solicitud_Crear('".$salida."','i".$entregados->id."');");
$entregados->set_Function("entregar", "MUI.Inventarios_Salida_Detalle_Solicitud_Entregar('{$salida}','{$entregados->id}');");
$entregados->set_Function("imprimirentrega", "MUI.Inventarios_Salida_Imprimir_Entrega('{$salida}','{$entregados->id}');");

$entregados->boton('btnVer', 'Visualizar', "detalle", "MUI.Inventarios_Salida_Detalle", "cells_row-list");
$entregados->boton('btnEntregar', 'Entregar', "detalle", "MUI.Inventarios_Salida_Detalle_Solicitud_Entregar", "cells_row-edit");
$entregados->boton("btnImprimir", "Imprimir", "", $entregados->get_Function("imprimirentrega"), "cells_row-print");

$entregados->columna('cDetalle', 'Detalle', 'detalle', 'string', '100', 'center', 'true');
$entregados->columna('cCodigo', '#', 'conteo', 'string', '25', 'center', 'false');
$entregados->columna('cCodigo', 'Código', 'codigo', 'string', '100', 'center', 'false');
$entregados->columna('cArticulo', 'A', 'articulo', 'string', '50', 'center', 'false');
$entregados->columna('cNombre', 'Nombre del Producto Solicitado', 'nombre', 'string', '420', 'left', 'false');
$entregados->columna('cCantidadS', 'S', 'cantidad_solicitada', 'string', '50', 'right', 'false');
$entregados->columna('cCantidadE', 'E', 'cantidad_entregada', 'string', '50', 'right', 'false');
$entregados->columna('cMedida', 'Medida', 'medida', 'string', '50', 'center', 'false');
$entregados->columna('cSeriales', 'Sns', 'seriales', 'string', '50', 'center', 'false');
$entregados->columna('cObservaciones', 'Obs', 'observacion', 'string', '50', 'center', 'false');
//$entregados->columna('cHora', 'Hora', 'hora', 'string', '90', 'center', 'false');

$f->fila["articulos_entregados"] = $f->fila($entregados->get_Code());
?>