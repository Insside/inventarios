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
$d['inicio'] = $validaciones->recibir("inicio");
$d['final'] = $validaciones->recibir("final");
$d['transaccion'] = $validaciones->recibir("transaccion");
$d['url'] = "modulos/inventarios/formularios/seriales/consultar/seriales.json.php?"
        . "uid=" . $d['uid']
        . "&criterio=" . $d['criterio']
        . "&valor=" . $d['valor']
        . "&inicio=" . $d['inicio']
        . "&final=" . $d['final']
        . "&transaccion=" . $d['transaccion'];

/** Creación de la tabla * */
$tabla = new Grid(array("id" =>"Grid_". time(), "url" => $d['url']));
$tabla->set_Function("legalizacion","MUI.Inventarios_Salida_Detalle_Serial_Crear('".$detalle."','".$tabla->id."');");
$tabla->boton('btnCrear', 'Registrar','',$tabla->get_Function("legalizacion"), "new");
$tabla->boton('btnEliminar', 'Descartar', 'serial', "MUI.Inventarios_Salida_Detalle_Serial_Eliminar", "delete");
$tabla->columna('cSerial', 'Serial', 'serial', 'string', '100', 'center', 'true');
$tabla->columna('cConteo', '#', 'conteo', 'string', '40', 'right', 'false');
$tabla->columna('cCodigo', 'Código', 'codigo', 'string', '140', 'left', 'false');
$tabla->columna('cLote', 'Lote', 'lote', 'string', '70', 'center', 'false');
$tabla->columna('cCantidad', 'Cantidad', 'cantidad', 'string', '75', 'right', 'false');
$tabla->columna('cFecha', 'Fecha', 'fecha', 'date', '75', 'center', 'false');
$tabla->columna('cHora', 'Hora', 'hora', 'string', '70', 'center', 'false');
$tabla->generar();
/** JavaScripts **/
$f->windowTitle("Serialización de Cantidades Entregadas","1.0");
//$f->setAudio(array("src"=>"modulos/inventarios/multimedia/audios/inventarios-solicitud-detalle-legalizaciones.mp3","autoplay"=>true));
?>