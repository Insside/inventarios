<?php
/** Celdas **/
$f->celdas["salida"] = $f->celda("Código de Salida:", $f->campos['salida']);
$f->celdas["tercero"] = $f->celda("Responsable (Cliente / Empleado):", $f->campos['tercero']);
$f->celdas["tipo"] = $f->celda("Tipo:", $f->campos['tipo']);
$f->celdas["centro_costos"] = $f->celda("Centro de Costos:", $f->campos['centro_costos'],"","w250px");
$f->celdas["observacion"] = $f->celda("Observaciones:", $f->campos["observacion"]);
$f->celdas["orden"] = $f->celda("Orden de Servicio:", $f->campos['orden']);
$f->celdas["cobro"] = $f->celda("Cobro:", $f->campos['cobro']);
$f->celdas["fecha"] = $f->celda("Fecha:", $f->campos['fecha']);
$f->celdas["hora"] = $f->celda("Hora:", $f->campos['hora']);
$f->celdas["creador"] = $f->celda("Creador:", $f->campos['creador']);
$f->celdas["creador-nombre"] = $f->celda("Solicitante (Nombre Completo):", $f->campos['creador-nombre']);
?>