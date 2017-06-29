<?php
require_once(PATH . "/includes/variables.inc.php");
$is->crear($d);
/** JavaScripts **/
$f->windowClose();
$f->gridRefresh($d["grid"]);
?>