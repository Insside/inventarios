<?php

$iu = new Inventarios_Usuarios();
$v['uid'] = Sesion::getUser();
$v['criterio'] = Request::getValue("criterio");
$v['valor'] = Request::getValue("valor");
$v['inicio'] = Request::getValue("inicio");
$v['final'] = Request::getValue("final");
$v['transaccion'] = Request::getValue("transaccion");
$v['url'] = "modulos/inventarios/formularios/articulos/consultar/articulos.json.php?"
        . "uid=" . $v['uid']
        . "&criterio=" . $v['criterio']
        . "&valor=" . $v['valor']
        . "&inicio=" . $v['inicio']
        . "&final=" . $v['final']
        . "&transaccion=" . $v['transaccion'];

/** Creación de la tabla * */
$tabla = new Grid(array("id" => "Grid_" . time(), "url" => $v['url']));

if ($iu->permiso("INVENTARIOS-ARTICULOS-CREAR", $v["uid"])) {
    $tabla->boton('btnCrear', 'Crear', '', "MUI.Inventarios_Articulo_Crear", "table-add");
}

if ($iu->permiso("INVENTARIOS-ARTICULOS-MODIFICAR", $v["uid"])) {
    $tabla->boton('btnModificar', 'Modificar', 'articulo', "MUI.Inventarios_Articulo_Modificar", "table-edit");
}
if ($iu->permiso("INVENTARIOS-ARTICULOS-FILTRAR", $v["uid"])) {
    $tabla->boton('btnFiltrar', 'Filtrar', '', "MUI.Inventarios_Articulo_Buscar", "table-search");
}


//$tabla->boton('btnPrecios', 'Precios', 'articulo', "MUI.Inventarios_Articulo_Precios", "table_money-add");
$tabla->columna('cArticulo', 'Articulo', 'codigo', 'string', '100', 'center', 'false');
$tabla->columna('cDetalles', 'Detalles', 'detalles', 'string', '500', 'left', 'false');
$tabla->columna('cFecha', 'Medida', 'medida', 'date', '50', 'center', 'false');
$tabla->columna('cFecha', 'Fecha', 'fecha', 'date', '90', 'center', 'false');
$tabla->columna('cHora', 'Hora', 'hora', 'string', '90', 'center', 'false');
$tabla->columna('cEstado', 'Estado', 'estado', 'string', '100', 'center', 'false');
$tabla->generar();
?>