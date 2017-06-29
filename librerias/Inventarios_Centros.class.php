<?php
if (!class_exists('Inventarios_Centros')) {

    class Inventarios_Centros {

        function crear($datos) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "INSERT INTO `inventarios_centros` SET "
                    . "`centro`='" . $datos['centro'] . "',"
                    . "`codigo_contable`='" . $datos['codigo_contable'] . "',"
                    . "`nombre`='" . $datos['nombre'] . "',"
                    . "`descripcion`='" . $datos['descripcion'] . "',"
                    . "`fecha`='" . $datos['fecha'] . "',"
                    . "`hora`='" . $datos['hora'] . "'"
                    . ";";
            $db->sql_query($sql);
            $db->sql_close();
        }

        function actualizar($centro, $campo, $valor) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "UPDATE `inventarios_centros` "
                    . "SET `" . $campo . "`='" . $valor . "' "
                    . "WHERE `centro`='" . $centro . "';";
            $db->sql_query($sql);
            $db->sql_close();
        }

        function eliminar($centro) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "DELETE FROM `inventarios_centros` "
                    . "WHERE `centro`='" . $centro . "';";
            $db->sql_query($sql);
            $db->sql_close();
        }

        function consultar($centro) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "SELECT * FROM `inventarios_centros` "
                    . "WHERE `centro`='" . $centro . "';";
            $consulta = $db->sql_query($sql);
            $fila = $db->sql_fetchrow($consulta);
            $db->sql_close();
            return($fila);
        }

        /**
         * Recibido el codigo contable del centro de costos retorna el codigo del elemento
         * @param type $codigo_contable
         * @return type
         */
        function getCentro($codigo_contable) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "SELECT * FROM `inventarios_centros` "
                    . "WHERE `codigo_contable`='{$codigo_contable}';";
            $consulta = $db->sql_query($sql);
            $fila = $db->sql_fetchrow($consulta);
            $db->sql_close();
            return($fila["centro"]);
        }

        function combo($name, $selected, $disabled = false, $change = "") {
            $selected = empty($selected) ? "" : $selected;
            $disabled = ($disabled) ? "disabled=\"disabled\"" : "";
            $db = new MySQL(Sesion::getConexion());
            $sql = "SELECT * FROM `inventarios_centros` ORDER BY `centro`";
            $consulta = $db->sql_query($sql);
            $html = ('<select name="' . $name . '"id="' . $name . '" ' . $disabled . ' onChange="' . $change . '">');
            $conteo = 0;
            while ($fila = $db->sql_fetchrow($consulta)) {
                $html .= ('<option value="' . $fila['centro'] . '"' . (($selected == $fila['centro']) ? "selected" : "") . '>' . $fila['codigo_contable'] . " " . $fila['nombre'] . '</option>');
                $conteo++;
            }$db->sql_close();
            $html .= ("</select>");
            return($html);
        }

    }

}
?>