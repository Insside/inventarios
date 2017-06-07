<?php

if (!class_exists("Inventarios")) {

    class Inventarios {

        var $sesion;
        var $fechas;
        var $permisos;
        var $formularios;

        function Inventarios() {
            $this->sesion = new Sesion();
            $this->fechas = new Fechas();
            $this->permisos = new Inventarios_Permisos();
            $permisos = new Inventarios_Permisos();
            $this->formularios = new Forms(time());
            $modulos = new Aplicacion_Modulos();
        }

        function existencia_crear($existencia, $producto, $cantidad, $localizacion) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "INSERT INTO `inventarios_existencias` SET ";
            $sql .= "`existencia`='" . $existencia . "',";
            $sql .= "`producto`='" . $producto . "',";
            $sql .= "`cantidad`='" . $cantidad . "',";
            $sql .= "`localizacion`='" . $localizacion . "',";
            $sql .= "`fecha`='" . $this->fechas->hoy() . "',";
            $sql .= "`creador`='" . $this->sesion->getValue("usuario") . "';";
            //echo($sql);
            $consulta = $db->sql_query($sql);
            $db->sql_close();
        }

        function existencias_conteo($sql) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "SELECT Count(`existencia`) AS `conteo` FROM `inventarios_existencias` " . $sql . ";";
            $consulta = $db->sql_query($sql);
            $fila = $db->sql_fetchrow($consulta);
            return(intval($fila['conteo']));
        }

        function productos_consultar($producto) {
            $db = new MySQL(Sesion::getConexion());
            $acentos = $db->sql_query("SET NAMES 'utf8'");
            $consulta = $db->sql_query("SELECT * FROM `inventarios_productos` WHERE `producto`='" . $producto . "' ;");
            $fila = $db->sql_fetchrow($consulta);
            $db->sql_close();
            return($fila);
        }

        function productos_conteo($sql) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "SELECT Count(`producto`) AS `conteo` FROM `inventarios_productos` " . $sql . ";";
            $consulta = $db->sql_query($sql);
            $fila = $db->sql_fetchrow($consulta);
            return(intval($fila['conteo']));
        }

        function productos_combo($selected) {
            $c = new Componentes();
            return($c->combo_consulta("productos", "nombre", "producto", "inventarios_productos", $selected, "height:30px; width:100%; font-size:16px;margin:0; padding-bottom:3"));
        }

        function localizaciones_consultar($localizacion) {
            $db = new MySQL(Sesion::getConexion());
            $acentos = $db->sql_query("SET NAMES 'utf8'");
            $consulta = $db->sql_query("SELECT * FROM `inventarios_localizaciones` WHERE `localizacion`='" . $localizacion . "' ;");
            $fila = $db->sql_fetchrow($consulta);
            $db->sql_close();
            return($fila);
        }

        function localizaciones_combo($selected) {
            $c = new Componentes();
            return($c->combo_consulta("localizaciones", "referencia", "localizacion", "inventarios_localizaciones", $selected, "height:30px; width:100%; font-size:16px;margin:0; padding-bottom:3"));
        }

        function criterios($nombre, $seleccionado) {
            $etiquetas = array("Código Contable", "Nombre Articulo", "Familia de Articulos");
            $valores = array("codigo", "nombre", "familia");
            return($this->formularios->combo($nombre, $etiquetas, $valores, $seleccionado, ""));
        }

    }

}
$inventarios = new Inventarios();
?>