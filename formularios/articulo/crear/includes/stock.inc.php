<?php
$im=new Inventarios_Medidas();

$valores['stock_minimo']=$validaciones->recibir("stock_minimo");
$valores['stock_maximo']=$validaciones->recibir("stock_maximo");

$f->campos['stock_minimo']=$f->dynamic(array("field"=>"stock_minimo","value"=>$valores["stock_minimo"]));
$f->campos['stock_maximo']=$f->dynamic(array("field"=>"stock_maximo","value"=>$valores["stock_maximo"]));

$f->celdas["stock_minimo"]=$f->celda("Stock Mínimo:",$f->campos['stock_minimo']);
$f->celdas["stock_maximo"]=$f->celda("Stock Máximo:",$f->campos['stock_maximo']);

$f->fila["sf1"]=$f->fila("<h2>Stock Minimo</h2>");
$f->fila["sf2"]=$f->fila($f->celdas["stock_minimo"]);
$f->fila["sf3"]=$f->fila("<h2>Stock Máximo</h2>");
$f->fila["sf4"]=$f->fila($f->celdas["stock_maximo"]);

$f->fila["stock"]=$f->fila["sf1"].$f->fila["sf2"].$f->fila["sf3"].$f->fila["sf4"];
?>