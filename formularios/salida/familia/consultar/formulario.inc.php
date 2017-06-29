<?php
/** Variables * */
$cadenas = new Cadenas();
$fechas = new Fechas();
$familias = new Familias();
$familia = $familias->consultar($_REQUEST['familia']);
/** Valores * */
$valores = $familia;
/** Campos * */
$f->campos['familia'] = $f->campo("familia", $valores['familia']);
$f->campos['nombre'] = $f->campo("nombre", $valores['nombre']);
$f->campos['descripcion'] = $f->campo("descripcion", $valores['descripcion']);
$f->campos['fecha'] = $f->campo("fecha", $valores['fecha']);
$f->campos['hora'] = $f->campo("hora", $valores['hora']);
$f->campos['creador'] = $f->campo("creador", $valores['creador']);
$f->campos['cancelar'] = $f->button("cancelar" . $f->id, "button", "Cerrar");
$f->campos['actualizar'] = $f->button("actualizar" . $f->id, "button", "Modificar");
/** Celdas * */
$f->celdas["familia"] = $f->celda("Código Familia:", $f->campos['familia']);
$f->celdas["nombre"] = $f->celda("Referencia / Nombre: ", $f->campos['nombre']);
$f->celdas["descripcion"] = $f->celda("Descripcion:", $f->campos['descripcion'], "", "h100");
$f->celdas["fecha"] = $f->celda("Fecha:", $f->campos['fecha']);
$f->celdas["hora"] = $f->celda("Hora:", $f->campos['hora']);
$f->celdas["creador"] = $f->celda("Creador:", $f->campos['creador']);
/** Filas * */
$f->fila["fila1"] = $f->fila($f->celdas["familia"] . $f->celdas["nombre"]);
$f->fila["fila2"] = $f->fila($f->celdas["descripcion"]);
$f->fila["fila3"] = $f->fila($f->celdas["fecha"] . $f->celdas["hora"] . $f->celdas["creador"]);
/** Compilando * */
$f->filas($f->fila['fila1']);
$f->filas($f->fila['fila2']);
$f->filas($f->fila['fila3']);
$f->botones($f->campos["cancelar"]);
$f->botones($f->campos["actualizar"]);
?>
<script type="text/javascript">
  MUI.resizeWindow($('<?php echo($f->ventana); ?>'), {width: 480, height: 290, top: 0, left: 0});
  MUI.centerWindow($('<?php echo($f->ventana); ?>'));

  if ($('cancelar<?php echo($f->id); ?>')) {
    $('cancelar<?php echo($f->id); ?>').addEvent('click', function(e) {
      MUI.closeWindow($('<?php echo($f->ventana); ?>'));
    });
  }

  if ($('actualizar<?php echo($f->id); ?>')) {
    $('actualizar<?php echo($f->id); ?>').addEvent('click', function(e) {
      MUI.Inventarios_Familia_Actualizar('<?php echo($familia['familia']); ?>');
      MUI.closeWindow($('<?php echo($f->ventana); ?>'));
    });
  }

</script>