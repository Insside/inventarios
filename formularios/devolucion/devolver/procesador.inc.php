<?php
/** 
 * $dcte - Cantidad total entregada.
 * $dctl - Cantidad total legalizada.
 * $dctd - Cantidad total a revertir
 * **/
$cadenas = new Cadenas();
$fechas = new Fechas();
$isd=new Inventarios_Salidas_Detalles();
$isdd=new Inventarios_Salidas_Detalles_Devoluciones();
$isdl=new Inventarios_Salidas_Detalles_Legalizaciones();
$detalle=$isd->consultar($v->recibir("detalle"));
$dcte=$detalle["cantidad_entregada"];
$dctl=$isdl->getSummatory($detalle["detalle"]);
$dctd=$isdd->getSummatory($detalle["detalle"]);
$ctd=$v->recibir("cantidad")+$dctd+$dctl;
if($ctd<=$dcte){
   require_once(PATH . "/includes/registrar.inc.php");
}else{
  require_once(PATH . "/includes/advertencia.inc.php");
}
?>