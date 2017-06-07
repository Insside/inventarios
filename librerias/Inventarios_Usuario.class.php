<?php

if (!class_exists('Inventarios_Usuario')) {
    if (!class_exists('Usuarios_Usuario')) {
        require_once(ROOT . "modulos/usuarios/librerias/Usuarios_Usuario.class.php");
    }

    class Inventarios_Usuario extends Usuarios_Usuario {
        
    }

}
?>