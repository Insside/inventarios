<?php
$sesion = new Sesion();
$validaciones = new Validaciones();
$usuario = Sesion::usuario();
/**
 * La legalizacion debe recibir la identificación del detalle sobre el cual se 
 * efectuara la devolución.
 */
$detalle=$v->recibir("detalle");
$d['uid'] = $usuario['usuario'];
$d['criterio'] ="detalle";
$d['valor'] = $detalle;
$d['inicio'] = Request::getValue("inicio");
$d['final'] = Request::getValue("final");
$d['transaccion'] = Request::getValue("transaccion");
$d['url'] = "modulos/inventarios/formularios/legalizaciones/consultar/legalizaciones.json.php?"
        . "uid=" . $d['uid']
        . "&criterio=" . $d['criterio']
        . "&valor=" . $d['valor']
        . "&inicio=" . $d['inicio']
        . "&final=" . $d['final']
        . "&transaccion=" . $d['transaccion'];

/** Creación de la tabla * */
$tabla = new Grid(array("id" =>"Grid_". time(), "url" => $d['url']));
$tabla->set_Function("legalizacion","MUI.Inventarios_Salida_Legalizacion_Crear('".$detalle."','".$tabla->id."');");
$tabla->boton('btnCrear', 'Legalizar','',$tabla->get_Function("legalizacion"), "new");
$tabla->boton('btnEliminar', 'Revertir', 'legalizacion', "MUI.Inventarios_Salida_Legalizacion_Revertir", "delete");
$tabla->columna('cLegalizacion', 'Legalización', 'legalizacion', 'string', '100', 'center', 'false');
$tabla->columna('cCantidad', 'Cantidad', 'cantidad', 'string', '100', 'right', 'false');
$tabla->columna('cCobro', 'Cobro', 'cobro', 'string', '100', 'left', 'false');
$tabla->columna('cFecha', 'Fecha', 'fecha', 'date', '75', 'center', 'false');
$tabla->columna('cHora', 'Hora', 'hora', 'string', '75', 'center', 'false');
$tabla->generar();
/** JavaScripts **/
$f->windowTitle("Cantidades Legalizadas","1.0");
$f->setAudio(array("src"=>"modulos/inventarios/multimedia/audios/inventarios-solicitud-detalle-legalizaciones.mp3","autoplay"=>true));
?>