<?php
$fechas=new Fechas();
$isdd=new Inventarios_Salidas_Detalles_Devoluciones();
$devolucion=$isdd->consultar($v->recibir("devolucion"));
if($devolucion["fecha"]==$fechas->hoy()){
   require_once(PATH . "/includes/revertir.inc.php");
}else{
  require_once(PATH . "/includes/advertencia.inc.php");
}

?>
