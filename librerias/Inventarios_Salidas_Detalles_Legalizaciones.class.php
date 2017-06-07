<?php

if (!class_exists("Inventarios_Salidas_Detalles_Legalizaciones")) {

    class Inventarios_Salidas_Detalles_Legalizaciones {

        public function crear($datos = array()) {
            if (is_array($datos)) {
                $db = new MySQL(Sesion::getConexion());
                $sql = "INSERT INTO `inventarios_salidas_detalles_legalizaciones` SET "
                        . "`legalizacion`='" . $datos['legalizacion'] . "',"
                        . "`detalle`='" . $datos['detalle'] . "',"
                        . "`cantidad`='" . $datos['cantidad'] . "',"
                        . "`cobro`='" . $datos['cobro'] . "',"
                        . "`observacion`='" . $datos['observacion'] . "',"
                        . "`fecha`='" . $datos['fecha'] . "',"
                        . "`hora`='" . $datos['hora'] . "',"
                        . "`creador`='" . $datos['creador'] . "'"
                        . ";";
                $db->sql_query($sql);
                $db->sql_close();
            } else {
                echo("Error: Inventarios_Salidas_Detalles_Legalizaciones::crear se esperaba un vector.");
            }
        }

        public function actualizar($legalizacion, $campo, $valor) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "UPDATE `inventarios_salidas_detalles_legalizaciones` "
                    . "SET `" . $campo . "`='" . $valor . "' "
                    . "WHERE `legalizacion`='" . $legalizacion . "';";
            $db->sql_query($sql);
            $db->sql_close();
        }

        public function eliminar($legalizacion) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "DELETE FROM `inventarios_salidas_detalles_legalizaciones` "
                    . "WHERE `legalizacion`='" . $legalizacion . "';";
            $db->sql_query($sql);
            $db->sql_close();
        }

        public function consultar($legalizacion) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "SELECT * FROM `inventarios_salidas_detalles_legalizaciones` "
                    . "WHERE `legalizacion`='" . $legalizacion . "';";
            $consulta = $db->sql_query($sql);
            $fila = $db->sql_fetchrow($consulta);
            $db->sql_close();
            return($fila);
        }

        /**
         * Este metodo suma la totalidad de las legalizaciones acontesidas a un detalle
         * retorna especificamente el resultado de la sumatoria.
         */
        public function getSummatory($detalle) {
            $db = new MySQL(Sesion::getConexion());
            $sql = ""
                    . "SELECT Sum(`inventarios_salidas_detalles_legalizaciones`.`cantidad`) AS `sum` "
                    . "FROM `inventarios_salidas_detalles_legalizaciones` "
                    . "WHERE(`inventarios_salidas_detalles_legalizaciones`.`detalle`='{$detalle}')"
                    . "ORDER BY `inventarios_salidas_detalles_legalizaciones`.`legalizacion`"
                    . "";
            $consulta = $db->sql_query($sql);
            $fila = $db->sql_fetchrow($consulta);
            $db->sql_close();
            return($fila["sum"]);
        }

    }

}
?>