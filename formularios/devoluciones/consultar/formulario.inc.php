<?php
$sesion = new Sesion();
$validaciones = new Validaciones();
$usuario = Sesion::usuario();
/**
 * La devolucion debe recibir la identificación del detalle sobre el cual se 
 * efectuara la devolución.
 */
$detalle=$v->recibir("detalle");
$d['uid'] = $usuario['usuario'];
$d['criterio'] ="detalle";
$d['valor'] = $detalle;
$d['inicio'] = Request::getValue("inicio");
$d['final'] = Request::getValue("final");
$d['transaccion'] = Request::getValue("transaccion");
$d['url'] = "modulos/inventarios/formularios/devoluciones/consultar/devolucion.json.php?"
        . "uid=" . $d['uid']
        . "&criterio=" . $d['criterio']
        . "&valor=" . $d['valor']
        . "&inicio=" . $d['inicio']
        . "&final=" . $d['final']
        . "&transaccion=" . $d['transaccion'];

/** Creación de la tabla * */
$tabla = new Grid(array("id" =>"Grid_". time(), "url" => $d['url']));
$tabla->set_Function("devolucion","MUI.Inventarios_Devolucion_Crear('".$detalle."','".$tabla->id."');");
$tabla->boton('btnCrear', 'Recibir','',$tabla->get_Function("devolucion"), "new");
$tabla->boton('btnEliminar', 'Revertir', 'devolucion', "MUI.Inventarios_Devolucion_Revertir", "delete");
$tabla->columna('cDevolucion', 'Devolución', 'devolucion', 'string', '100', 'center', 'false');
$tabla->columna('cCantidad', 'Cantidad', 'cantidad', 'string', '100', 'right', 'false');
$tabla->columna('cTransaccion', 'Transacción', 'transaccion', 'string', '100', 'left', 'false');
$tabla->columna('cFecha', 'Fecha', 'fecha', 'date', '75', 'center', 'false');
$tabla->columna('cHora', 'Hora', 'hora', 'string', '75', 'center', 'false');
$tabla->generar();
/** JavaScripts **/
$f->setAudio(array("src"=>"modulos/inventarios/multimedia/audios/inventarios-solicitud-detalle-devoluciones.mp3","autoplay"=>true));
?>