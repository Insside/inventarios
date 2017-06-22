<?php
/** procesador.inc.php Codigo fuente archivo procesador 
 * $cte - Cantidad total entregada.
 * $ctl - Cantidad total legalizada.
 * $ctd - Cantidad total devuelta.
 * $cl -  Cantidad legalizable
 * $ctl - Cantidad total legalizable.
 * **/

$cadenas = new Cadenas();
$fechas = new Fechas();
/** Clase representativa Del Objeto **/
$isd=new Inventarios_Salidas_Detalles();
$isdd=new Inventarios_Salidas_Detalles_Devoluciones();
$isdl=new Inventarios_Salidas_Detalles_Legalizaciones();

$detalle=$isd->consultar($v->recibir("detalle"));
$cte=$detalle["cantidad_entregada"];
$ctd=$isdd->getSummatory($detalle["detalle"]);
$cl=$cte-$ctd;
$ctl=$v->recibir("cantidad")+$isdl->getSummatory($detalle["detalle"]);

if(number_format($ctl,2)<=number_format($cl,2)){
   require_once(PATH . "/includes/registrar.inc.php");
}else{
  require_once(PATH . "/includes/advertencia.inc.php");
}

?>