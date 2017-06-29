<?php

if (!class_exists("Inventarios_Salidas_Detalles_Seriales")) {

    class Inventarios_Salidas_Detalles_Seriales {

        public function crear($datos = array()) {
            if (is_array($datos)) {
                $db = new MySQL(Sesion::getConexion());
                $sql = "INSERT INTO `inventarios_salidas_detalles_seriales` SET "
                        . "`serial`='" . $datos['serial'] . "',"
                        . "`detalle`='" . $datos['detalle'] . "',"
                        . "`codigo`='" . $datos['codigo'] . "',"
                        . "`lote`='" . $datos['lote'] . "',"
                        . "`cantidad`='" . $datos['cantidad'] . "',"
                        . "`fecha`='" . $datos['fecha'] . "',"
                        . "`hora`='" . $datos['hora'] . "',"
                        . "`creador`='" . $datos['creador'] . "'"
                        . ";";
                $db->sql_query($sql);
                $db->sql_close();
            } else {
                echo("Error: Inventarios_Salidas_Detalles_Seriales::crear se esperaba un vector.");
            }
        }

        public function actualizar($serial, $campo, $valor) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "UPDATE `inventarios_salidas_detalles_seriales` "
                    . "SET `" . $campo . "`='" . $valor . "' "
                    . "WHERE `serial`='" . $serial . "';";
            $db->sql_query($sql);
            $db->sql_close();
        }

        public function eliminar($serial) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "DELETE FROM `inventarios_salidas_detalles_seriales` "
                    . "WHERE `serial`='" . $serial . "';";
            $db->sql_query($sql);
            $db->sql_close();
        }

        public function consultar($serial) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "SELECT * FROM `inventarios_salidas_detalles_seriales` "
                    . "WHERE `serial`='" . $serial . "';";
            $consulta = $db->sql_query($sql);
            $fila = $db->sql_fetchrow($consulta);
            $db->sql_close();
            return($fila);
        }
        
        /**
         * Retorna el numero total de seriales asociados a un detalle especifico
         * @param type $detalle
         * @return type
         */
        public function getCount($detalle) {
            $db = new MySQL(Sesion::getConexion());
            $sql = ""
                    . "SELECT Count(*) AS `conteo` "
                    . "FROM `inventarios_salidas_detalles_seriales` "
                    . "WHERE(`detalle`='$detalle');";
            $consulta = $db->sql_query($sql);
            $fila = $db->sql_fetchrow($consulta);
            return(intval($fila['conteo']));
        }

    }

}
?>