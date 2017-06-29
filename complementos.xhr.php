<?php 
$ROOT = (!isset($ROOT)) ? "../../" : $ROOT;
require_once($ROOT . "modulos/usuarios/librerias/Configuracion.cnf.php");
?>
<form action="complementos.xhr.php" name="fomulario" id="formulario" method="post" target="_self">
 <input name="accion" type="hidden" value="establecer-filtro" />
 <table align="center" width="100%" style="border:1px; border-color:#666 " border="1">
  <tr><td colspan="2" align="center" bgcolor="#CCCCCC"><b>Usuarios Activos</b></td></tr>
  <tr><td colspan="2" height="55" valign="middle"><p align="center" style="font-size:55px; color:#33C; font-weight:bold"><?php  echo($usuarios->conteo()) ?></p></td></tr>
  <tr><td colspan="2" bgcolor="#CCCCCC" align="center"><b>Estadisticas</b></td></tr>
  <!--
  <tr><td align="center" bgcolor="#CCCCCC"><b>Conceptos</b></td><td align="center" bgcolor="#CCCCCC"><b>Totales</b></td></tr>
  <tr><td align="right" width="50%"><b>Suscriptores</b>:</td><td>&nbsp;<?php  echo($s); ?></td></tr>
  <tr><td align="right"><b>Medidores</b>:</td><td>&nbsp;<?php  echo($m); ?></td></tr>
  <tr><td align="right"><b>Catastro</b>:</td><td>&nbsp;<?php  echo(round(($m * 100) / $s, 2)); ?>%</td></tr>
  <tr><td align="right"><b>Geo-Refereciados</b>:</td><td>&nbsp;<?php  echo(round(($g * 100) / $s, 2)); ?>%</td></tr>
  -->
 </table>
</form>