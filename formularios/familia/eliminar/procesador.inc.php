<?php

/**
 * Este archivo recibe el nombre del archivo a eliminar y realiza la accion si valoraciones adiciones su
 * proceso implica dos acciones eliminar el registro de la base de datos y eliminar fisicamente el archivo
 * */
$if = new Inventarios_Familias();
$ia = new Inventarios_Articulos();

$familia = $validaciones->recibir("familia");
$itable = $validaciones->recibir("itable");
/**
 * Se debe evaluar si el familia esta relacionado en algun movimiento de entrada o salida, si es asi no se se podra permitir
 * la eliminación del mismo del catalogo.
 */
$sql = "WHERE(`familia`='" . $familia. "')";
$conteo = $ia->conteo($sql);
//echo($conteo);
if ($conteo > 0) {
  require_once($ROOT."modulos/inventarios/formularios/familia/eliminar/restringido.inc.php");
} else {
  $if->eliminar($familia);
  $f->windowClose();
  $f->gridRefresh($itable);
}
?>