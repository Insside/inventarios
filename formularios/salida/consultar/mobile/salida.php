<?php

define("PATH", dirname(__FILE__));
define('ROOT', PATH . "/../../../../../../");
require_once(ROOT . "librerias/Configuracion.mob.php");
require_once(ROOT . "modulos/inventarios/librerias/Configuracion.cnf.php");
Sesion::init();
/* * --------------------------------------------------------------------------* */

/**
 * Create a new jqmPhp object.
 */
$tid = time();
$j = new Mobile();

/**
 * Config "html" and "head" tag.
 */
$j->head()->title("Salidas");
/**
 * Create and config a jqmPage object.
 */
$p = new Page("salidas");
$p->addAttribute(new Attribute("data-dom-cache","false"));
$p->theme("a")->title("INVENTARIOS/SALIDAS");
/** Encabezado * */
$p->header()->theme("a");
$p->header()->addButton("Inicio", "./", "", "home");
$p->header()->position("fixed");
//$p->header()->items()->get(1)->attribute("data-iconpos", "notext")->attribute("rel", "external");
/** Cuerpo * */
//$p->addContent("<h1>Inventarios</h1>");
//$p->addContent("<a href=\"#\" data-prefetch=\"true\" data-role=\"button\">Entradas</a>");
//$p->addContent("<a href=\"/framework/modulos/inventarios/formularios/salidas/consultar/salidas.mob.php\" data-prefetch=\"true\" data-role=\"button\">Salidas</a>");
//$p->addContent("<a href=\"#\" data-prefetch=\"true\" data-role=\"button\">Configuración</a>");
//$p->addContent("<a href=\"/framework/modulos/mobile.php?{$tid}\" data-prefetch=\"true\" data-role=\"button\">Modulos</a>");
require_once(PATH . "/includes/detalle.inc.php");
/** Pie de Pagina * */
$p->footer()->title(Sesion::getValue("alias"));
$p->footer()->position("fixed");
$p->footer()->theme("a");
/** Cuerpo * */
/** Add the page to jqmPhp object. */
$j->addPage($p);
/** Generate the HTML code. * */
echo($j);
?>