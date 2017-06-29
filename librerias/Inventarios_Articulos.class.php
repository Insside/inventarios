<?php

/**
 * @package Insside
 * @subpackage Inventarios
 * @author Jose Alexis Correa Valencia <jalexiscv@gmail.com>
 * @copyright (c) 2015 www.insside.com
 */


if (!class_exists('Inventarios_Articulos')) {

    class Inventarios_Articulos {

        function crear($datos) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "INSERT INTO `inventarios_articulos` SET "
                    . "`articulo`='" . $datos['articulo'] . "',"
                    . "`codigo`='" . $datos['codigo'] . "',"
                    . "`nombre`='" . $datos['nombre'] . "',"
                    . "`referencia`='" . $datos['referencia'] . "',"
                    . "`familia`='" . $datos['familia'] . "',"
                    . "`medida`='" . $datos['medida'] . "',"
                    . "`descripcion`='" . $datos['descripcion'] . "',"
                    . "`stock_minimo`='" . $datos['stock_minimo'] . "',"
                    . "`stock_maximo`='" . $datos['stock_maximo'] . "',"
                    . "`fecha`='" . $datos['fecha'] . "',"
                    . "`hora`='" . $datos['hora'] . "',"
                    . "`creador`='" . $datos['creador'] . "',"
                    . "`medida_compra`='" . $datos['medida_compra'] . "',"
                    . "`medida_venta`='" . $datos['medida_venta'] . "',"
                    . "`medida_venta_cantidad`='" . $datos['medida_venta_cantidad'] . "',"
                    . "`estado`='" . $datos['estado'] . "';";
            $db->sql_query($sql);
            $db->sql_close();
        }

        function actualizar($articulo, $campo, $valor) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "UPDATE `inventarios_articulos` "
                    . "SET `" . $campo . "`='" . $valor . "' "
                    . "WHERE `articulo`='" . $articulo . "';";
            $db->sql_query($sql);
            $db->sql_close();
            unset($db);
            unset($sql);
        }

        function eliminar($articulo) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "DELETE FROM `inventarios_articulos` "
                    . "WHERE `articulo`='" . $articulo . "';";
            $db->sql_query($sql);
            $db->sql_close();
        }

        function consultar($articulo) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "SELECT * FROM `inventarios_articulos` "
                    . "WHERE `articulo`='" . $articulo . "';";
            $consulta = $db->sql_query($sql);
            $fila = $db->sql_fetchrow($consulta);
            $db->sql_close();
            return($fila);
        }
        
        function combo($name, $selected, $disabled = false, $change = "") {
            $selected = empty($selected) ? "00" : $selected;
            $disabled = ($disabled) ? "disabled=\"disabled\"" : "";
            $db = new MySQL(Sesion::getConexion());
            $sql = "SELECT * FROM `inventarios_articulos` ORDER BY `nombre`";
            $consulta = $db->sql_query($sql);
            $html = ('<select name="' . $name . '"id="' . $name . '" ' . $disabled . ' onChange="' . $change . '">');
            $conteo = 0;
            while ($fila = $db->sql_fetchrow($consulta)) {
                $html .= ('<option value="' . $fila['articulo'] . '"' . (($selected == $fila['articulo']) ? "selected" : "") . '>' . $fila['nombre'] . ' - ' . $fila['articulo'] . '</option>');
                $conteo++;
            }$db->sql_close();
            $html .= ("</select>");
            return($html);
        }
        /**
         * Retorna el listado de usos especificados en la base de datos.
         * @param type $parametros
         * @return type
         */
        public function getList($parametros = array()) {
            if (is_array($parametros)) {
                $db = new MySQL(Sesion::getConexion());
                $sql = "SELECT * FROM `inventarios_articulos` WHERE(`familia`='{$parametros["familia"]}' AND `estado` = 'ACTIVO' )ORDER BY `nombre`;";
                $consulta = $db->sql_query($sql);
                $usos = array();
                while ($fila = $db->sql_fetchrow($consulta)) {
                    $fila["nombre"] = $fila["codigo"] . " - " . $fila["nombre"];
                    array_push($usos, $fila);
                }
                return($usos);
            } else {
                echo("Error: Usos::getList() esperava un vector de parametros.");
            }
        }

        function conteo($sql = "") {
            $db = new MySQL(Sesion::getConexion());
            $sql = "SELECT Count(*) AS `conteo` FROM `inventarios_articulos` " . $sql . ";";
            $consulta = $db->sql_query($sql);
            $fila = $db->sql_fetchrow($consulta);
            return(intval($fila['conteo']));
        }

    }

}
?>