<?php 
$itable=$validaciones->recibir("itable");
$ip=new Inventarios_Precios();
$precio=$ip->consultar($validaciones->recibir("precio"));
/** Valores **/
$html="<div class=\"i100x100_eliminar\" style=\"float: left;\"></div>";
$html.="<div class=\"notificacion\"><p><b>Eliminar Precio ".$precio['precio_venta_unidad'].".</b>, identificado con el código ".$precio['precio']."<br>";
$html.="Se dispone a eliminar un precio asociado a un articulo se le solicita considere que esta ";
$html.="acción es irreversible. Antes de proceder, confirme o cancele la presente solicitud para poder continuar.";
$html.="</p></div>";
/** Campos **/
$f->oculto("precio",$precio['precio']);
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
$f->JavaScript("MUI.titleWindow($('" . ($f->ventana) . "'), \"Eliminar Precio - ".$precio['precio']."\");");
$f->JavaScript("MUI.resizeWindow($('" . ($f->ventana) . "'), {width: 390, height: 200});");
$f->JavaScript("MUI.centerWindow($('" . $f->ventana . "'));");
$f->eClick("cancelar" . $f->id, "MUI.closeWindow($('" . $f->ventana . "'));");
?>