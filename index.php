<?php
//$ROOT = (!isset($ROOT)) ? "../../" : $ROOT;
//require_once($ROOT . "modulos/usuarios/librerias/Configuracion.cnf.php");
//require_once($ROOT."modulos/usuarios/librerias/Usuarios_Componentes.class.php");
//$t = new Usuarios_Componentes();
//$t->regenerar();
?>
<style>
    #splashscreen .logo{
        height: 240px;
        padding-top: 24px;
        width: 640px;
        z-index: 100;
    }
    #splashscreen .foto {
   background-image: url("modulos/inventarios/imagenes/portada.fw.png");
    background-size: auto 100%;
    height: 100%;
    }
    #splashscreen .logo .titular {
        border-bottom: 1px solid #cccccc;
        border-top: 1px solid #cccccc;
        color: #444;
        font-family: RobotoThinItalic;
        font-size: 24px;
        left: 20px;
        margin-bottom: 10px;
        padding-top: 5px;
        padding-bottom: 5px;
        position: relative;
        width: 400px;
    }

    #splashscreen .logo .imagen {
        position: relative;
        margin-left: 20px;
        float: left;
    }

    #splashscreen .logo .imis {
        color: #000000;
        float: left;
        font-family: EuroStyleBE;
        font-size: 100px;
        left: 20px;
        line-height: 100px;
        position: relative;
    }

    #splashscreen .logo .modulo {
        color: #D93702;
        float: left;
        font-family: EuroStyleBE;
        font-size: 60px;
        left: 20px;
        line-height: 50px;
        position: relative;
        top: -10px;
    }


#splashscreen .mensaje {
    background-position: left center;
    background-repeat: no-repeat;
    float: left;
    padding-top: 20px;
    position: absolute;
}

</style>
<div id="splashscreen">
    <div class="logo">
        <div class="titular">Modulo de Inventarios</div>
        <div class="imagen"><img src="modulos/inventarios/imagenes/logo.fw.png"/></div>
        <div class="imis">i:MIS</div>
        <div class="modulo">INV</div>
    </div>
    <div class="foto foto"></div>
    <div class="mensaje xrup"><p>Bienvenido al Módulo de Inventarios v.1.0. Al llegar a manejar un número 
        importante de productos, o variedades de un mismo producto, una entidad u empresa por regla general 
        necesitará automatizar el control de sus inventarios con el fin de conocer de manera veraz y oportuna las 
        cantidades de materias primas, productos en proceso o productos terminados 
de las que puede disponer. Por otra parte, también será necesario realizar eventualmente medidas de control, 
tales como la toma de inventarios físicos. </p>
        <hr>
        <p>
            Para mayor información visite: <a href="http://www.insside.com/plataforma/imis/inventarios.html" target="_blank">Insside / Imis / Inventarios </a>.
        </p></div>
    <div class="container2">
        <div class="container1">
            <div class="col1"></div>
            <div class="col2"></div>
            <div class="col3"></div>
        </div>
    </div>
</div>  