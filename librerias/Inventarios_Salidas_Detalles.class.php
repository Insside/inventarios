<?php
/**
 * @package Insside
 * @subpackage Inventarios
 * @author Jose Alexis Correa Valencia <jalexiscv@gmail.com>
 * @copyright (c) 2015 www.insside.com
 */
if (!class_exists('Inventarios_Salidas_Detalles')) {

    class Inventarios_Salidas_Detalles {

        function crear($datos) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "INSERT INTO `inventarios_salidas_detalles` SET "
                    . "`detalle`='" . $datos['detalle'] . "',"
                    . "`salida`='" . $datos['salida'] . "',"
                    . "`articulo`='" . $datos['articulo'] . "',"
                    . "`medida`='" . $datos['medida'] . "',"
                    . "`cantidad_solicitada`='" . $datos['cantidad_solicitada'] . "',"
                    . "`cantidad_entregada`='0',"
                    . "`fecha_solicitud`='" . $datos['fecha_solicitud'] . "',"
                    . "`fecha_entrega`='0000-00-00',"
                    . "`creador_solicitud`=0,"
                    . "`observacion`='{$datos['observacion']}',"
                    . "`creador_entrega`=0;";
            $result=$db->sql_query($sql);
            $db->sql_close();
            unset($db);
            unset($sql);
            return($result);
        }

        function actualizar($detalle, $campo, $valor) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "UPDATE `inventarios_salidas_detalles` "
                    . "SET `" . $campo . "`='" . $valor . "' "
                    . "WHERE `detalle`='" . $detalle . "';";
            $db->sql_query($sql);
            $db->sql_close();
        }

        function eliminar($detalle) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "DELETE FROM `inventarios_salidas_detalles` "
                    . "WHERE `detalle`='" . $detalle . "';";
            $db->sql_query($sql);
            $db->sql_close();
        }

        function consultar($detalle) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "SELECT * FROM `inventarios_salidas_detalles` "
                    . "WHERE `detalle`='" . $detalle . "';";
            $consulta = $db->sql_query($sql);
            $fila = $db->sql_fetchrow($consulta);
            $db->sql_close();
            unset($db);
            unset($sql);
            unset($consulta);
            return($fila);
        }

        function conteo($sql = "") {
            $db = new MySQL(Sesion::getConexion());
            $sql = "SELECT Count(*) AS `conteo` FROM `inventarios_salidas_detalles` " . $sql . ";";
            $consulta = $db->sql_query($sql);
            $fila = $db->sql_fetchrow($consulta);
            return(intval($fila['conteo']));
        }

        /**
         * El estado de la legalización de un detalle analiza si la cifra
         * total de la entrega es igual a la sumatoria de las cifras totales 
         * cantidades totales devueltos y/o cobradas del mismo detalle, si ambas 
         * cifras coinciden se dara por establecido que la legalización esta 
         * completa (true) o esta incompleta (false).
         * @param type $detalle
         */
        public function getPendienteLegalizar($detalle) {
            $isdd = new Inventarios_Salidas_Detalles_Devoluciones();
            $isdl = new Inventarios_Salidas_Detalles_Legalizaciones();
            $d = $this->consultar($detalle);
            /** Consideraciones * */
            $cd = $isdd->getSummatory($d["detalle"]);
            $cd = (!empty($cd) && ($cd > 0)) ? $cd : "0.0";
            $cl = (float) ($d["cantidad_entregada"] - $cd);
            $cc = $isdl->getSummatory($d["detalle"]);
            $cp = $cl - $cc;
            return($cp);
        }

    }

}
?>