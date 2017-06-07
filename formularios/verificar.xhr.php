<?php 
if(!isset($ROOT)) {$ROOT='../../../';}
if(!class_exists('Sesion')){require_once($ROOT."librerias/Sesion.class.php");}
if(!class_exists('MySQL')) {require_once($ROOT."librerias/MySQL.class.php");}
if(!class_exists('Medidores')) {require_once($ROOT."librerias/Medidores.class.php");}
if(!class_exists('Cadenas')) {require_once($ROOT."librerias/Cadenas.class.php");}
if(!class_exists('Usuarios')) {require_once($ROOT."librerias/Usuarios.class.php");}
if(!class_exists('Validaciones')) {require_once($ROOT."librerias/Validaciones.class.php");}
if(!class_exists('Inventarios')) {require_once($ROOT."librerias/Inventarios.class.php");}
if(!class_exists('Fechas')) {require_once($ROOT."librerias/Fechas.class.php");}

$existencia=@$_REQUEST['existencia'];
$producto=@$_REQUEST['productos'];
$localizacion=@$_REQUEST['localizaciones'];
$cantidad=@$_REQUEST['cantidad'];

$estado['cantidad']=(intval($cantidad)>0)?true:false;

if($estado['cantidad']){
	$inventarios->existencia_crear($existencia,$producto,$cantidad,$localizacion);
	echo('<input name="exito" id="exito" type="hidden" value="transaccion-realizada" />');
}
?>






<table border="0" cellspacing="0" cellpadding="0">
<tr><td>Existencia:</td><td>Fecha:</td></tr>
<tr>
<td><input type="text" name="existencia" id="existencia" value="<?php  echo(time());?> " class="verificado campo" readonly="readonly"/></td>
<td><input type="text" name="fecha" id="fecha" class="verificado campo" readonly="readonly" value="<?php  echo($fechas->hoy());?>"/></td>
</tr>
<tr><td colspan="2">Producto:</td></tr>
<tr><td colspan="2"><?php  echo($inventarios->productos_combo(@$_REQUEST['productos']));?></td></tr>
<tr><td>Cantidad:</td><td>Localización</td></tr>
<tr><td><input type="text" name="cantidad" id="cantidad" class="<?php  echo(((!$estado['cantidad'])?"error":"verificado"));?> campo" value="<?php  echo(@$_REQUEST['cantidad']);?>"/></td>
<td>
<input type="text" name="localizaciones" id="localizaciones" class="campo" value=""/>

</tr>
<tr><td colspan="2" align="center"><input type="submit" name="button" id="button" value="Registrar" class="boton" /></td></tr>
</table>