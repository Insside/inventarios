<?php 
if(!isset($ROOT)) {$ROOT='../../../';}//4:Nivel
if(!class_exists('Sesion')){require_once($ROOT."librerias/Sesion.class.php");}
if(!class_exists('MySQL')){require_once($ROOT."librerias/MySQL.class.php");}
if(!class_exists('Medidores')) {require_once($ROOT."librerias/Medidores.class.php");}
if(!class_exists('Suscriptores')) {require_once($ROOT."librerias/Suscriptores.class.php");}
if(!class_exists('Usuarios')) {require_once($ROOT."librerias/Usuarios.class.php");}
?>