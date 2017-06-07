<?php
$criterio=$r->getValue("criterio".$f->id);
$valor=$r->getValue("valor");
$inicio=$r->getValue("inicio");
$final=$r->getValue("final");
$f->JavaScript("\nMUI.Inventarios_Salidas_Filtrar('".$criterio."','".$valor."','".$inicio."','".$final."');");
?>