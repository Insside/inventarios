<?php

$itable = Request::getValue("itable");
$is = new Inventarios_Salidas();
$salida = $is->consultar(Request::getValue("salida"));
/** Valores * */
if ($salida["autorizado"] == "NO") {
    $message = "<p><b>Eliminar Salida " . $salida['salida'] . ".</b><br>Se dispone a eliminar un salida del sistema se le solicita considere que esta acción es irreversible. Antes de proceder, confirme o cancele la presente solicitud para poder continuar.</p>";
} else {
    $message = "<p>No es posible eliminar la salida seleccionada, ya que esta se encuentra aprobada. Para eliminar la salida asegúrese de solicitar al jefe de área retire la aprobación concedida a la misma y luego repita el presente procedimiento. Presione cancelar para continuar.</p>";
}
/** Campos * */
$f->oculto("salida", $salida['salida']);
$f->oculto("itable", $itable);
$f->campos['eliminar'] = $f->button("eliminar" . $f->id, "submit", "Confirmar");
$f->campos['cancelar'] = $f->button("cancelar" . $f->id, "button", "Cancelar");
// Celdas
// Filas
$f->fila["info"] = $f->getNotification(array("image" => "advertencia", "message" => $message));
//Compilacion
$f->filas($f->fila['info']);
if ($salida["autorizado"] == "NO") {
    $f->botones($f->campos['eliminar'], "inferior-derecha");
}
$f->botones($f->campos['cancelar'], "inferior-derecha");
/** JavaScripts * */
$f->JavaScript("MUI.titleWindow($('" . ($f->ventana) . "'), \"Eliminar / Salida - " . $salida['salida'] . "\");");
$f->JavaScript("MUI.resizeWindow($('" . ($f->ventana) . "'), {width: 390, height: 200});");
$f->JavaScript("MUI.centerWindow($('" . $f->ventana . "'));");
$f->eClick("cancelar" . $f->id, "MUI.closeWindow($('" . $f->ventana . "'));");
?>