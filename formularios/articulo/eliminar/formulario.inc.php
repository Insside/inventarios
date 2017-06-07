<?php 
$itable=$validaciones->recibir("itable");
$ia=new Inventarios_Articulos();
$articulo=$ia->consultar($validaciones->recibir("articulo"));
/** Valores **/
$html="<div class=\"i100x100_eliminar\" style=\"float: left;\"></div>";
$html.="<div class=\"notificacion\"><p><b>Eliminar Articulo ".$articulo['nombre'].".</b>, identificado con el código ".$articulo['articulo']."<br>";
$html.="Se dispone a eliminar un articulo del sistema se le solicita considere que esta ";
$html.="acción es irreversible. Antes de proceder, confirme o cancele la presente solicitud para poder continuar.";
$html.="</p></div>";
/** Campos **/
$f->oculto("articulo",$articulo['articulo']);
$f->oculto("itable",$itable);
$f->campos['eliminar']=$f->button("eliminar".$f->id,"submit","Confirmar");
$f->campos['cancelar']=$f->button("cancelar".$f->id,"button","Cancelar");
// Celdas
$f->celdas['info']=$f->celda("",$html,"","notificacion");
// Filas
$f->fila["info"]=$f->fila($f->celdas['info'],"notificacion");
//Compilacion
$f->filas($f->fila['info']);
$f->botones($f->campos['eliminar'],"inferior-derecha");
$f->botones($f->campos['cancelar'],"inferior-derecha");
/** JavaScripts **/
$f->JavaScript("MUI.titleWindow($('" . ($f->ventana) . "'), \"Eliminar Articulo - ".$articulo['articulo']."\");");
$f->JavaScript("MUI.resizeWindow($('" . ($f->ventana) . "'), {width: 390, height: 200});");
$f->JavaScript("MUI.centerWindow($('" . $f->ventana . "'));");
$f->eClick("cancelar" . $f->id, "MUI.closeWindow($('" . $f->ventana . "'));");
?>