<?php
/** Variables * */
$r = new Request();
$componentes = new Componentes();
$is=new Inventarios_Salidas();
$ie=new Inventarios_Empleados();
$ic=new Inventarios_Centros();
$ist=new Inventarios_Salidas_Tipos();
$creador=new Inventarios_Usuario(Sesion::getUser());
/** Asignación de Valores **/
$d["grid"]=$r->getValue("grid");
$d["salida"] =$r->getDeafault("salida",time());
$d["tercero"] =$r->getDeafault("tercero",null);
$d["orden"] = $r->getDeafault("orden",null);
$d["cobro"] = $r->getDeafault("cobro",null);
$d["centro_costos"] =$r->getDeafault("centro_costos",null);
$d["observacion"] =$r->getDeafault("observacion",null);
$d["tipo"] =$r->getDeafault("tipo",null);
$d["fecha"] =$r->getDeafault("fecha",Dates::getDate());
$d["hora"] =$r->getDeafault("hora",Dates::getNow());
$d["creador"] =$creador->getUsuario();
$d["creador-nombre"] =$creador->getNombre();
$d["equipo"]=$creador->getEquipo();
$icc=$ic->consultar($d["centro_costos"]);
$d['fecha_limite']=Dates::addDaysAprox($d['fecha'],$icc["limite_dht"]);
/** Errores **/
$error["estado"] = false;
$error["mensaje"] = "";
?>