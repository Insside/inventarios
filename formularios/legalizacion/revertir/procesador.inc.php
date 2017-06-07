<?php
$fechas=new Fechas();
$isdl=new Inventarios_Salidas_Detalles_Legalizaciones();
$legalizacion=$isdl->consultar($v->recibir("legalizacion"));
if($legalizacion["fecha"]==$fechas->hoy()){
   require_once(PATH . "/includes/revertir.inc.php");
}else{
  require_once(PATH . "/includes/advertencia.inc.php");
}

?>
