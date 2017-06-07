<?php

/**
 * Este archivo registra el modulo en la lista de modulos disponibles en la
 * plataforma.
 */
echo("<li>Verificando la existencia del módulo...<ul>");
if (!empty($modulo["modulo"])) {
    echo("<li>El módulo estaba previamente registrado...</li>");
} else {
    $db = new MySQL(Sesion::getConexion());
    $db->sql_query(""
            . "INSERT INTO `insside`.`aplicacion_modulos` SET 
            `modulo`='010',
            `nombre`='Inventarios',
            `titulo`='Modulo Control de Inventarios.',
            `fecha`='{$hoy}',
            `hora`='{$ahora}',
            `creador`='{$usuario}'"
            . ";");
    $db->sql_close();
    echo("<li>El módulo se registrado correctamente...</li>");
}
echo("</ul></li>");
?>