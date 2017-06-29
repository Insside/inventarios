<?php


/**
 * @package Insside
 * @subpackage Inventarios
 * @author Jose Alexis Correa Valencia <jalexiscv@gmail.com>
 * @copyright (c) 2015 www.insside.com
 */
if (!class_exists('Inventarios_Familias')) {

    class Inventarios_Familias {

        function consultar($familia) {
            $db = new MySQL(Sesion::getConexion());
            $acentos = $db->sql_query("SET NAMES 'utf8'");
            $consulta = $db->sql_query("SELECT * FROM `inventarios_familias` WHERE `familia`='" . $familia . "' ;");
            $fila = $db->sql_fetchrow($consulta);
            $db->sql_close();
            return($fila);
        }

        function crear($datos) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "INSERT INTO `inventarios_familias` SET "
                    . "`familia`='" . $datos['familia'] . "',"
                    . "`codigo`='" . $datos['codigo'] . "',"
                    . "`nombre`='" . $datos['nombre'] . "',"
                    . "`descripcion`='" . $datos['descripcion'] . "',"
                    . "`fecha`='" . $datos['fecha'] . "',"
                    . "`hora`='" . $datos['hora'] . "',"
                    . "`creador`='" . $datos['creador'] . "'"
                    . ";";
            $db->sql_query($sql);
            echo($sql);
            $db->sql_close();
        }

        function actualizar($familia, $campo, $valor) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "UPDATE `inventarios_familias` SET ";
            $sql .= "`" . $campo . "`='" . $valor . "'";
            $sql .= " WHERE `familia`='" . $familia . "';";
            $consulta = $db->sql_query($sql);
            $db->sql_close();
            return($consulta);
        }

        function eliminar($familia) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "DELETE FROM `inventarios_familias` WHERE `familia`='" . $familia . "';";
            $consulta = $db->sql_query($sql);
            $db->sql_close();
            return($consulta);
        }

        function conteo($sql = "") {
            $db = new MySQL(Sesion::getConexion());
            $sql = "SELECT Count(*) AS `conteo` FROM `inventarios_familias` " . $sql . ";";
            $consulta = $db->sql_query($sql);
            $fila = $db->sql_fetchrow($consulta);
            return(intval($fila['conteo']));
        }

        /**
         * Retorna el listado de usos especificados en la base de datos.
         * @param type $parametros
         * @return type
         */
        public function getList($parametros = array()) {
            if (is_array($parametros)) {
                $db = new MySQL(Sesion::getConexion());
                $sql = "SELECT * FROM `inventarios_familias` ORDER BY `nombre`;";
                $consulta = $db->sql_query($sql);
                $usos = array();
                while ($fila = $db->sql_fetchrow($consulta)) {
                    $fila["nombre"]=$fila["familia"]." - ".$fila["nombre"];
                    array_push($usos, $fila);
                }
                return($usos);
            } else {
                echo("Error: Usos::getList() esperava un vector de parametros.");
            }
        }

    }

}
?>
