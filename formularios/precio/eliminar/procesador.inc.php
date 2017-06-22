<?php

/**
 * Este archivo recibe el nombre del archivo a eliminar y realiza la accion si valoraciones adiciones su
 * proceso implica dos acciones eliminar el registro de la base de datos y eliminar fisicamente el archivo
 * */
$ip = new Inventarios_Precios();

$precio = Request::getValue("precio");
$itable = Request::getValue("itable");
/**
 * Se debe evaluar si el articulo esta relacionado en algun movimiento de entrada o salida, si es asi no se se podra permitir
 * la eliminación del mismo del catalogo.
 */

//echo("conteo: ".$conteo);
//if ($conteo > 0) {
//  require_once($ROOT."modulos/inventarios/formularios/articulo/eliminar/restringido.inc.php");
//} else {
  $ip->eliminar($precio);
  $f->windowClose();
  $f->gridRefresh($itable);
//}
?>