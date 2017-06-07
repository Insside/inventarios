<?php
$criterio=Request::getValue("criterio");
$valor=Request::getValue("valor");
$inicio=Request::getValue("inicio");
$final=Request::getValue("final");
$f->JavaScript("MUI.Inventarios_Articulos_Filtrar('".$criterio."','".$valor."','".$inicio."','".$final."');");
?>