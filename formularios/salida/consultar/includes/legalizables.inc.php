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
$legalizables = new Grid(array("id" =>"GridLegalizables{$grids}", "url" => $d['url'],"height"=>"480"));
//$legalizables->set_Function("solicitar","MUI.Inventarios_Salida_Detalle_Legalizaciones('".$salida."','i".$legalizables->id."');");
$legalizables->boton('btnCrear','Legalizar', 'detalle',"MUI.Inventarios_Salida_Detalle_Legalizaciones", "ticket");
$legalizables->boton('btnDevolucion','Devolución',"detalle","MUI.Inventarios_Salida_Detalle_Solicitud_Devolucion", "ticket");
//$legalizables->boton('btnModificar', 'Modificar', 'detalle', "MUI.Inventarios_Salida_Detalle_Solicitud_Modificar", "edit");
//$legalizables->boton('btnEliminar', 'Eliminar', 'detalle', "MUI.Inventarios_Salida_Detalle_Solicitud_Eliminar", "delete");
$legalizables->columna('cDetalle', 'Detalle', 'detalle', 'string', '100', 'center', 'true');
$legalizables->columna('cCodigo', '#', 'conteo', 'string', '25', 'center', 'false');
$legalizables->columna('cCodigo', 'Código', 'codigo', 'string', '100', 'center', 'false');
$legalizables->columna('cArticulo', 'A', 'articulo', 'string', '50', 'center', 'false');
$legalizables->columna('cNombre', 'Nombre del Producto Solicitado', 'nombre', 'string', '380', 'left', 'false');
//$legalizables->columna('cCantidadS', 'S', 'cantidad_solicitada', 'string', '50', 'right', 'false');
$legalizables->columna('cCantidadE', 'E', 'cantidad_entregada', 'string', '50', 'right', 'false');
$legalizables->columna('cCantidadS', 'D', 'cantidad_devuelta', 'string', '50', 'right', 'false');
//$legalizables->columna('cCantidadL', 'L', 'cantidad_legalizable', 'string', '50', 'right', 'false');
$legalizables->columna('cCantidadL', 'C', 'cantidad_cobrada', 'string', '50', 'right', 'false');
$legalizables->columna('cCantidadL', 'P', 'cantidad_pendiente', 'string', '50', 'right', 'false');
$legalizables->columna('cMedida', 'Medida', 'medida', 'string', '55', 'left', 'false');
$f->fila["articulos_legalizables"]=$f->fila($legalizables->get_Code());
?>