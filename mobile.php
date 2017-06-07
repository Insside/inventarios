<?php
error_reporting(E_ALL);
define("PATH", dirname(__FILE__));
define("ROOT", PATH ."/../../");
require_once(ROOT . "librerias/Configuracion.mob.php");
require_once(ROOT . "modulos/inventarios/librerias/Configuracion.cnf.php");
Sesion::init();
/* * --------------------------------------------------------------------------* */

/**
 * Create a new jqmPhp object.
 */
$tid=time();
$j = new Mobile();

/**
 * Config "html" and "head" tag.
 */
$j->head()->title("Examples");
/**
 * Create and config a jqmPage object.
 */
$p = new Page("examples");
$p->addAttribute(new Attribute("data-dom-cache","false"));
$p->theme("a")->title("AGUAS DE BUGA S.A. E.S.P.");
/** Encabezado * */
$p->header()->theme("a");
$p->header()->addButton("","/frameworks/mobile.php","home","home");
$p->header()->position("fixed");
//$p->header()->items()->get(1)->attribute("data-iconpos", "notext")->attribute("rel", "external");
/** Cuerpo * */
//$p->addContent("<h1>Inventarios</h1>");
$p->addContent("<a href=\"#\" data-prefetch=\"true\" data-role=\"button\">Entradas</a>");
$p->addContent("<a href=\"formularios/salidas/consultar/mobile/salidas.php?tid={$tid}\" data-prefetch=\"true\" data-role=\"button\">Salidas</a>");
$p->addContent("<a href=\"#\" data-prefetch=\"true\" data-role=\"button\">Configuración</a>");
$p->addContent("<a href=\"/framework/modulos/mobile.php?tid={$tid}\" data-prefetch=\"true\" data-role=\"button\">Modulos</a>");
/** Pie de Pagina * */
$p->footer()->title("INVENTARIOS/".strtoupper(Sesion::getValue("alias")));
$p->footer()->position("fixed");
$p->footer()->theme("a");
/** Cuerpo * */
/** Add the page to jqmPhp object. */
$j->addPage($p);
/** Generate the HTML code. * */
echo($j);
?>