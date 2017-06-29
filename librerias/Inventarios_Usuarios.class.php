<?php

if (!class_exists('Inventarios_Usuarios')) {
    if (!class_exists('Usuarios')) {
        require_once(ROOT . "modulos/usuarios/librerias/Usuarios.class.php");
    }

    class Inventarios_Usuarios extends Usuarios {
        
    }

}
?>