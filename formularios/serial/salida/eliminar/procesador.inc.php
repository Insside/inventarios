<?php
$isds = new Inventarios_Salidas_Detalles_Seriales();
$grid = Request::getValue("grid");
$serial = Request::getValue("serial");
$isds->eliminar($serial); 
$f->windowClose();
$f->gridRefresh($grid);
?>