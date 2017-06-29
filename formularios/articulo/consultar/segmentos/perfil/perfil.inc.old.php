/** Variables * */
$cadenas = new Cadenas();
$fechas = new Fechas();
$productos = new Productos();
$familias = new Familias();
$producto = $productos->consultar($_REQUEST['producto']);
$familia = $familias->consultar($producto['familia']);
/** Valores * */
$valores = $producto;
$valores['familia'] = $familia['familia'] . ": " . $familia['nombre'];
$f->campos['producto'] = $f->campo("producto", $valores['producto']);
$f->campos['nombre'] = $f->campo("nombre", $valores['nombre']);
$f->campos['descripcion'] = $f->campo("descripcion", $valores['descripcion']);
$f->campos['familia'] = $f->campo("familia", $valores['familia']);
$f->campos['medida'] = $f->campo("medida", $valores['medida']);
$f->campos['stock'] = $f->campo("stock", $valores['stock']);
$f->campos['legalizacion'] = $f->campo("legalizacion", $valores['legalizacion']);
$f->campos['prioridad'] = $f->campo("prioridad", $valores['prioridad']);
$f->campos['valor'] = $f->campo("valor", "$" . $valores['valor']);
$f->campos['creador'] = $f->campo("creador", $valores['creador']);
$f->campos['fecha'] = $f->campo("fecha", $valores['fecha']);
$f->campos['hora'] = $f->campo("hora", $valores['hora']);
$f->campos['cancelar'] = $f->button("cancelar" . $f->id, "button", "Cerrar");
$f->campos['actualizar'] = $f->button("actualizar" . $f->id, "button", "Modificar");
/** Celdas * */
$f->celdas["producto"] = $f->celda("Código Del Producto:", $f->campos['producto']);
$f->celdas["nombre"] = $f->celda("Referencia / Nombre Del Producto:", $f->campos['nombre']);
$f->celdas["descripcion"] = $f->celda("Descripción:", $f->campos['descripcion'], "", "h100");
$f->celdas["familia"] = $f->celda("Familia:", $f->campos['familia']);
$f->celdas["medida"] = $f->celda("Medida:", $f->campos['medida']);
$f->celdas["stock"] = $f->celda("Stock:", $f->campos['stock']);
$f->celdas["legalizacion"] = $f->celda("Legalizacion:", $f->campos['legalizacion']);
$f->celdas["prioridad"] = $f->celda("Prioridad:", $f->campos['prioridad']);
$f->celdas["valor"] = $f->celda("Valor / Precio: [ <a href=\"#\" onClick=\"MUI.Inventarios_Producto_Precio('" . $valores['producto'] . "');\">Cambiar</a> ]", $f->campos['valor']);
$f->celdas["creador"] = $f->celda("Creador:", $f->campos['creador']);
$f->celdas["fecha"] = $f->celda("Fecha:", $f->campos['fecha']);
$f->celdas["hora"] = $f->celda("Hora:", $f->campos['hora']);
/** Filas * */
//$f->fila["fila1"] = $f->fila($f->celdas["producto"] . $f->celdas["creador"] . $f->celdas["fecha"] . $f->celdas["hora"]);
//$f->fila["fila2"] = $f->fila($f->celdas["nombre"]);
//$f->fila["fila3"] = $f->fila($f->celdas["descripcion"]);
//$f->fila["fila4"] = $f->fila($f->celdas["familia"] . $f->celdas["medida"] . $f->celdas["stock"]);
//$f->fila["fila5"] = $f->fila($f->celdas["legalizacion"] . $f->celdas["prioridad"] . $f->celdas["valor"]);
/** Compilando * */
//$f->filas($f->fila['fila1']);
//$f->filas($f->fila['fila2']);
//$f->filas($f->fila['fila3']);
//$f->filas($f->fila['fila4']);
//$f->filas($f->fila['fila5']);
$f->botones($f->campos["cancelar"]);
$f->botones($f->campos["actualizar"]);
?>
<script type="text/javascript">
  if ($('cancelar<?php echo($f->id); ?>')) {
    $('cancelar<?php echo($f->id); ?>').addEvent('click', function(e) {
      MUI.closeWindow($('<?php echo($f->ventana); ?>'));
    });
  }
</script>

