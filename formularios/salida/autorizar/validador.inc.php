<?php

$error["estado"] = true;
$error["mensaje"] = "";
$validaciones = new Validaciones();

$datos = array();
$datos['salida'] = $validaciones->recibir("salida");
$datos['tercero'] = $validaciones->recibir("tercero");
$datos['tipo'] = $validaciones->recibir("tipo");
$datos['centro_costos'] = $validaciones->recibir("centro_costos");
$datos['orden'] = $validaciones->recibir("orden");
$datos['cobro'] = $validaciones->recibir("cobro");
$datos['fecha'] = $validaciones->recibir("fecha");
$datos['hora'] = $validaciones->recibir("hora");
$datos['creador'] = $validaciones->recibir("creador");

if (!empty($datos['orden']) && !$validaciones->entero($datos['orden'])) {
  $error["estado"] = true;
  echo("<div class=\"error\"><b>Error</b>: El código de la orden de servicio debe ser un valor número.</div>");
} else {
  if (!empty($datos['cobro']) && !$validaciones->entero($datos['cobro'])) {
    $error["estado"] = true;
    echo("<div class=\"error\"><b>Error</b>: El código del cobro debe ser un valor número.</div>");
  } else {
    $error["estado"] = false;
  }
}


// Calculando el limite 
$fechas=new Fechas();
$ic=new Inventarios_Centros();
$icc=$ic->consultar($datos['centro_costos']);
$datos['fecha_limite']=$fechas->sumar_diashabiles($datos['fecha'], $icc["limite_dht"]);



if ($error["estado"]) {
  require_once($url['formulario']);
} else {
  require_once($url['procesador']);
}
?>