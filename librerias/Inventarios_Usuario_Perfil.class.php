<?php

if (!class_exists('Inventarios_Usuario_Perfil')) {
    if (!class_exists('Usuarios_Perfil')) {
        require_once(ROOT . "modulos/usuarios/librerias/Usuarios_Perfil.class.php");
    }

    class Inventarios_Usuario_Perfil extends Usuarios_Perfil {
        
    }

}
?>