<?php
$iu = new Inventarios_Usuarios();
$d['uid'] = Sesion::getUsuario();
$d['criterio'] = Request::getValue("criterio");
$d['valor'] = Request::getValue("valor");
$d['inicio'] = Request::getValue("inicio");
$d['final'] = Request::getValue("final");
$d['transaccion'] = Request::getValue("transaccion");
$d['url'] = "modulos/inventarios/formularios/salidas/consultar/salidas.json.php?"
        . "uid=" . $d['uid']
        . "&criterio=" . $d['criterio']
        . "&valor=" . $d['valor']
        . "&inicio=" . $d['inicio']
        . "&final=" . $d['final']
        . "&transaccion=" . $d['transaccion'];

/** Creación de la tabla * */
$g= new Grid(array("id" => "Grid_" . time(), "url" => $d['url']));
$g->boton('btnVer', 'Detalles', 'salida', "MUI.Inventarios_Salida_Consultar", "compras");
if ($iu->permiso("INVENTARIOS-SOLICITUD-CREAR", $d["uid"])) {
    $g->boton('btnCrear', 'Crear', '', "MUI.Inventarios_Salida_Crear", "new");
}

if ($iu->permiso("INVENTARIOS-SOLICITUD-MODIFICAR", $d["uid"])) {
    $g->boton('btnModificar', 'Modificar', 'salida', "MUI.Inventarios_Salida_Modificar", "edit");
}

if ($iu->permiso("INVENTARIOS-SOLICITUD-ELIMINAR", $d["uid"])) {
$g->boton('btnEliminar', 'Eliminar', 'salida', "MUI.Inventarios_Salida_Eliminar", "delete");
}
$g->boton('btnFiltrar', 'Filtrar', '', "MUI.Inventarios_Salida_Buscar", "search");

if ($iu->permiso("INVENTARIOS-SOLICITUD-APROBAR", $d["uid"])){
    $g->boton('btnAprobar', 'Autorización', 'salida', "MUI.Inventarios_Salida_Autorizar", "confirm2");
}
$g->columna('cCodigo', 'Salida', 'codigo', 'string', '100', 'center', 'false');
$g->columna('cSalida', 'Salida', 'salida', 'string', '75', 'center', 'true');
//$g->columna('cireador', 'C', 'icreador', 'string', '18', 'center', 'false');
$g->columna('cRecibe', 'Recibe', 'nempleado', 'string', '200', 'left', 'false');
//$g->columna('cAutoriza', 'Autoriza', 'nautoriza', 'string', '200', 'left', 'false');
//$g->columna('cOrden', 'Orden', 'orden', 'string', '90', 'left', 'false');
//$g->columna('cCobro', 'Cobro', 'cobro', 'string', '90', 'left', 'false');
//$g->columna('cTelefono', 'Teléfono ', 'telefono', 'string', '100', 'left', 'false');
//$g->columna('cEstados', 'Estados', 'estados', 'string', '50', 'center', 'false');
$g->columna('cFecha', 'Fecha', 'fecha', 'date', '75', 'center', 'false');
$g->columna('cHora', 'Hora', 'hora', 'string', '75', 'center', 'false');
$g->columna('cFechaLimite', 'Limite', 'fecha_limite', 'date', '80', 'center', 'false');
$g->columna('cCentro', 'Centro', 'centro_costos', 'string', '85', 'center', 'false');
$g->columna('cEstadoEntrega', 'Estados', 'estadoentrega', 'string', '90', 'center', 'false');
$g->columna('cSolicita', 'Solicita', 'solicita', 'string', '75', 'center', 'false');
$g->columna('cAprueba', 'Aprueba', 'aprueba', 'string', '75', 'center', 'false');
$g->generar();
/** Optimizando memoria **/
unset($iu);// Inventarios Usuarios
unset($v);// Valores
unset($g);// Grid (Tabla)
?>