<?php
require_once(PATH . "/includes/variables.inc.php");

//if (!empty($datos['orden']) && !$validaciones->entero($datos['orden'])) {
//  $error["estado"] = true;
//  echo("<div class=\"error\"><b>Error</b>: El código de la orden de servicio debe ser un valor número.</div>");
//} else {
//  if (!empty($datos['cobro']) && !$validaciones->entero($datos['cobro'])) {
//    $error["estado"] = true;
//    echo("<div class=\"error\"><b>Error</b>: El código del cobro debe ser un valor número.</div>");
//  } else {
//    $error["estado"] = false;
//  }
//}

if ($error["estado"]) {
  require_once(PATH . "/formulario.inc.php");
} else {
  require_once(PATH . "/procesador.inc.php");
}
?>