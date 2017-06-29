<?php
/** Filas * */
$f->fila["fila1"] = $f->fila($f->celdas["salida"] . $f->celdas["fecha"] . $f->celdas["hora"] . $f->celdas["creador"]);
$f->fila["fila2"] = $f->fila($f->celdas["creador-nombre"]);
$f->fila["fila3"] = $f->fila($f->celdas["tercero"]);
$f->fila["fila4"] = $f->fila($f->celdas["centro_costos"]);

//$f->fila["fila4"] = $f->fila($f->celdas["cobro"]);
/** Compilando * */
$tab["salida"]=$f->fila["fila1"].$f->fila["fila2"].$f->fila["fila3"].$f->fila["fila4"];
?>