<?php

$ROOT = (!isset($ROOT)) ? "../../../../../" : $ROOT;
require_once($ROOT . "modulos/inventarios/librerias/Configuracion.cnf.php");
$v=new Validaciones();
$remision=$v->recibir("remision");
?>
<div class="toolbox divider">
  <a href="#" onClick="MUI.Inventarios_Salidas();"><img src="imagenes/16x16/retroceder.png" class="icon16"/></a>
  <a href="#" onClick="MUI.Inventarios_Remision_Consultar('<?php echo($remision); ?>');"><img src="imagenes/16x16/actualizar.png" class="icon16"/></a>
  <a href="#" onClick="MUI.Inventarios_Remision_Articulo_Adicionar();"><img src="imagenes/16x16/adicionar.png" class="icon16"/></a>
</div>
