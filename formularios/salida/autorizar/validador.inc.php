<?php

$error["estado"] = true;
$error["mensaje"] = "";
$validaciones = new Validaciones();

$datos = array();
$datos['salida'] = Request::getValue("salida");
$datos['tercero'] = Request::getValue("tercero");
$datos['tipo'] = Request::getValue("tipo");
$datos['centro_costos'] = Request::getValue("centro_costos");
$datos['orden'] = Request::getValue("orden");
$datos['cobro'] = Request::getValue("cobro");
$datos['fecha'] = Request::getValue("fecha");
$datos['hora'] = Request::getValue("hora");
$datos['creador'] = Request::getValue("creador");

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