<?php

if (!class_exists('Inventarios_Vencimientos')) {

    class Inventarios_Vencimientos {

        /**
         * Retorna el listado de criterios asignables al reporte de salidas vencidas.
         * criterio / label / value
         * @param type $parametros
         * @return type
         */
        public function getList($parametros = array()) {
            if (is_array($parametros)) {
                $db = new MySQL(Sesion::getConexion());
                $sql = "SELECT * FROM `inventarios_vencimientos_criterios` ORDER BY `label`;";
                $consulta = $db->sql_query($sql);
                $criterios = array();
                while ($fila = $db->sql_fetchrow($consulta)) {
                    array_push($criterios, $fila);
                }
                return($criterios);
            } else {
                echo("Error: Usos::getList() esperava un vector de parametros.");
            }
        }

    }

}
?>