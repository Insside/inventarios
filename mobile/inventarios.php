<?php
error_reporting(E_ALL);
if(!defined("ROOT")){define('ROOT', dirname(__FILE__) . '/../../../');}
require_once(ROOT . "librerias/Configuracion.mob.php");
/* * --------------------------------------------------------------------------* */

/**
 * Create a new jqmPhp object.
 */
$j = new Mobile();

/**
 * Config 'html' and 'head' tag.
 */
$j->head()->title('Examples');
/**
 * Create and config a jqmPage object.
 */
$p = new jqmPage('examples');
$p->theme('a')->title('INVENTARIOS');
/** Encabezado * */
$p->header()->theme('a');
$p->header()->addButton('Inicio', './', '', 'home');
$p->header()->position('fixed');
//$p->header()->items()->get(1)->attribute('data-iconpos', 'notext')->attribute('rel', 'external');
/** Cuerpo * */
//$p->addContent('<h1>Secciones</h1>');
$p->addContent('<a href="salidas.php" data-prefetch="true" data-role="button">Salidas</a>');
$p->addContent('<a href="#" data-prefetch="true" data-role="button">Entradas</a>');
$p->addContent('<a href="#" data-prefetch="true" data-role="button">Terceros</a>');
$p->addContent('<a href="#" data-prefetch="true" data-role="button">Configuración</a>');
$p->addContent('<a href="/framework/mobile.php" data-prefetch="true" data-role="button">Inicio</a>');
/** Pie de Pagina * */
$p->footer()->title('Insside Technologies LLC');
$p->footer()->position('fixed');
$p->footer()->theme('a');
/** Cuerpo * */
/** Add the page to jqmPhp object. */
$j->addPage($p);
/** Generate the HTML code. * */
echo($j);
?>