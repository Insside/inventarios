<?php
$usuarios=new Inventarios_Usuarios();
$salidas=new Inventarios_Salidas();
$usuario=$usuarios->consultar(Sesion::getUser());
$ist=$salidas->getCount();
$ise=$salidas->getCountEquipo($usuario["equipo"]);
$isu=$salidas->getCountUsuario($usuario["usuario"]);
/** Filas **/
$f->fila["f1"]=$f->fila($f->getScoreBoard(array(
    "id"=>"propias".$f->id,
    "title"=>"Tus Solicitudes",
    "number"=>$isu,
    "total"=>$ist,
    "link"=>"#")));
$f->fila["f2"]=$f->fila($f->getScoreBoard(array(
    "id"=>"area".$f->id,
    "title"=>"Solicitudes del Area",
    "number"=>$ise,
    "total"=>$ist,
    "link"=>"#")));
$f->fila["f3"]=$f->fila($f->getScoreBoard(array(
    "id"=>"general".$f->id,
    "title"=>"Total Solicitudes",
    "number"=>$ist,
    "total"=>$ist,
    "link"=>"#")));
//$f->fila["fila3"]=$f->fila($f->celdas["fecha"].$f->celdas["hora"]);
/* Compilando **/
$f->filas($f->fila['f1']);
$f->filas($f->fila['f2']);
$f->filas($f->fila['f3']);
/** JavaScripts **/
$f->setPanelTitle("complementos","Estadísticas");
?>