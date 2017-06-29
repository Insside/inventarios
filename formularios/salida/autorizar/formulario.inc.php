<?php

$ROOT = (!isset($ROOT)) ? "../../../../../" : $ROOT;
require_once($ROOT . "modulos/inventarios/librerias/Configuracion.cnf.php");
require_once(PATH . "/includes/variables.inc.php");
require_once(PATH . "/includes/campos.inc.php");
require_once(PATH . "/includes/celdas.inc.php");

if ($salida["autorizado"] == "SI") {
    if (!$desautorizable) {
        require_once(PATH . "/includes/nodesautorizable.inc.php");
    } else {
        require_once(PATH . "/includes/desautorizar.inc.php");
    }
} else {
    if ($itemsCount > 0) {
        require_once(PATH . "/includes/autorizar.inc.php");
    } else {
        require_once(PATH . "/includes/noautorizable.inc.php");
    }
}
?>