<?php 
$itable=Request::getValue("itable");
$ia=new Inventarios_Articulos();
$articulo=$ia->consultar(Request::getValue("articulo"));
/** Valores **/
$html="<div class=\"i100x100_restringido\" style=\"float: left;\"></div>";
$html.="<div class=\"notificacion\"><p><b>Denegado / Restringido</b><br>";
$html.="No se puede eliminar esta familia de articulos  del catálogo, debido a que esta vinculada a uno mas articulos. "
        . "o mas movimientos.";
$html.="</p></div>";
/** Campos **/
$f->oculto("articulo",$articulo['articulo']);
$f->oculto("itable",$itable);
$f->campos['cancelar']=$f->button("cancelar".$f->id,"button","Cancelar");
// Celdas
$f->celdas['info']=$f->celda("",$html,"","notificacion");
// Filas
$f->fila["info"]=$f->fila($f->celdas['info'],"notificacion");
//Compilacion
$f->filas($f->fila['info']);
$f->botones($f->campos['cancelar'],"inferior-derecha");
/** JavaScripts **/
$f->JavaScript("MUI.titleWindow($('" . ($f->ventana) . "'), \"Eliminar Articulo - ".$articulo['articulo']."\");");
$f->JavaScript("MUI.resizeWindow($('" . ($f->ventana) . "'), {width: 390, height: 180});");
$f->JavaScript("MUI.centerWindow($('" . $f->ventana . "'));");
$f->eClick("cancelar" . $f->id, "MUI.closeWindow($('" . $f->ventana . "'));");
?>