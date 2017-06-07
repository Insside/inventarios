<?php
/** Segmentos * */
require_once($ROOT."modulos/inventarios/formularios/articulo/consultar/segmentos/perfil/perfil.inc.php");
require_once($ROOT."modulos/inventarios/formularios/articulo/consultar/segmentos/medidas/medidas.inc.php");
require_once($ROOT."modulos/inventarios/formularios/articulo/consultar/segmentos/precios/precios.inc.php");
$f->fila["tabs"] = ""
        . "<ul id=\"tabs\" class=\"TabbedPane\">"
        . "<li><a class=\"tab\" href=\"#\" id=\"it1\">Perfil</a></li>"
        . "<li><a class=\"tab\" href=\"#\" id=\"it3\">Medidas</a></li>"
        . "<li><a class=\"tab\" href=\"#\" id=\"it4\">Precios</a></li>"
        . "</ul>";
$f->fila["home"] = ""
        . "<div id=\"home\">"
        . "<div class=\"feature\">" . $f->fila["perfil"] . "</div>"
        . "<div class=\"feature\">" . $f->fila["medidas"] . "</div>"
        . "<div class=\"feature\">" . $f->fila["precios"] . "</div>"
        . "</div>";
/** Compilando * */
$f->filas($f->fila['tabs']);
$f->filas($f->fila['home']);
/** Botones * */
$f->botones($f->campos['ayuda'], "inferior-izquierda");
$f->botones($f->campos['cancelar'], "inferior-derecha");
$f->botones($f->campos['continuar'], "inferior-derecha");
/** JavaScripts * */
$f->JavaScript("MUI.titleWindow($('" . ($f->ventana) . "'),\"Publicar / Compartir\");");
$f->JavaScript("MUI.resizeWindow($('" . ($f->ventana) . "'),{width: 750,height:460});");
$f->JavaScript("MUI.centerWindow($('" . $f->ventana . "'));");
$f->eClick("cancelar" . $f->id, "MUI.closeWindow($('" . $f->ventana . "'));");
$f->JavaScript("var tabs = new MUI.TabbedPane(('.tab', '.feature', {autoplay: false,transitionDuration: 500,slideInterval: 3000,hover: true});");
?>