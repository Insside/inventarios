<?php
$iu = new Inventarios_Usuarios();
$is=new Inventarios_Salidas();
/** Variables **/
$usuario=Sesion::usuario();
$salida=$v->recibir("salida");
$autorizada=$is->getAutorizado($salida);
$uid = Sesion::getUsuario();
$grids = time();
$p["entregar"]=$iu->permiso("INVENTARIOS-SOLICITUD-ENTREGAR", $uid);
$p["legalizar"]=$iu->permiso("INVENTARIOS-SOLICITUD-LEGALIZAR", $uid);
?>