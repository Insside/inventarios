<?php

if (!class_exists("Inventarios_Salidas_Detalles_Devoluciones")) {

    class Inventarios_Salidas_Detalles_Devoluciones {

        public function crear($datos = array()) {
            if (is_array($datos)) {
                $db = new MySQL(Sesion::getConexion());
                $sql = "INSERT INTO `inventarios_salidas_detalles_devoluciones` SET "
                        . "`devolucion`='" . $datos['devolucion'] . "',"
                        . "`detalle`='" . $datos['detalle'] . "',"
                        . "`cantidad`='" . $datos['cantidad'] . "',"
                        . "`transaccion`='" . $datos['transaccion'] . "',"
                        . "`observacion`='" . $datos['observacion'] . "',"
                        . "`fecha`='" . $datos['fecha'] . "',"
                        . "`hora`='" . $datos['hora'] . "',"
                        . "`creador`='" . $datos['creador'] . "'"
                        . ";";
                $db->sql_query($sql);
                $db->sql_close();
            } else {
                echo("Error: Inventarios_Salidas_Detalles_Devoluciones::crear se esperaba un vector.");
            }
        }

        public function actualizar($devolucion, $campo, $valor) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "UPDATE `inventarios_salidas_detalles_devoluciones` "
                    . "SET `" . $campo . "`='" . $valor . "' "
                    . "WHERE `devolucion`='" . $devolucion . "';";
            $db->sql_query($sql);
            $db->sql_close();
        }

        public function eliminar($devolucion) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "DELETE FROM `inventarios_salidas_detalles_devoluciones` "
                    . "WHERE `devolucion`='" . $devolucion . "';";
            $db->sql_query($sql);
            $db->sql_close();
        }

        public function consultar($devolucion) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "SELECT * FROM `inventarios_salidas_detalles_devoluciones` "
                    . "WHERE `devolucion`='" . $devolucion . "';";
            $consulta = $db->sql_query($sql);
            $fila = $db->sql_fetchrow($consulta);
            $db->sql_close();
            return($fila);
        }

        /**
         * Este metodo suma la totalidad de las devoluciones acontesidas a un detalle
         * retorna especificamente el resultado de la sumatoria.
         */
        public function getSummatory($detalle) {
            $db = new MySQL(Sesion::getConexion());
            $sql = ""
                    . "SELECT Sum(`inventarios_salidas_detalles_devoluciones`.`cantidad`) AS `sum` "
                    . "FROM `inventarios_salidas_detalles_devoluciones` "
                    . "WHERE(`inventarios_salidas_detalles_devoluciones`.`detalle`='{$detalle}')"
                    . "ORDER BY `inventarios_salidas_detalles_devoluciones`.`devolucion`"
                    . "";
            $consulta = $db->sql_query($sql);
            $fila = $db->sql_fetchrow($consulta);
            $db->sql_close();
            return($fila["sum"]);
        }

    }

}
?>