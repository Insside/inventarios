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
$dcte=(double)($detalle["cantidad_entregada"]);
$dctl=(double)($isdl->getSummatory($detalle["detalle"]));
$dctd=(double)($isdd->getSummatory($detalle["detalle"]));
$ctd=(double)($v->recibir("cantidad")+$dctd+$dctl);

/**
 * Nota: problema brutal para comparar numeros decimales unico modo hallado
 * fue este intentado.
 */
if(number_format($ctd,2)<=number_format($dcte,2)){
   require_once(PATH . "/includes/registrar.inc.php");
}else{
  require_once(PATH . "/includes/advertencia.inc.php");
}
?>