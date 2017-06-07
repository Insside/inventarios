<?php

/**
 * @package Insside
 * @subpackage Inventarios
 * @author Jose Alexis Correa Valencia <jalexiscv@gmail.com>
 * @copyright (c) 2015 www.insside.com
 */
/**
 * Description of Tesoreria_Modulo
 *
 * @author Jose Alexis Correa Valencia <jalexiscv@gmail.com>
 */
if (!class_exists('Inventarios_Salidas')) {

    class Inventarios_Salidas {

        function crear($datos) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "INSERT INTO `inventarios_salidas` SET "
                    . "`salida`='" . $datos['salida'] . "',"
                    . "`tercero`='" . $datos['tercero'] . "',"
                    . "`centro_costos`='" . $datos['centro_costos'] . "',"
                    . "`observacion`='" . urlencode($datos['observacion']) . "',"
                    . "`orden`='" . $datos['orden'] . "',"
                    . "`cobro`='" . $datos['cobro'] . "',"
                    . "`fecha`='" . $datos['fecha'] . "',"
                    . "`fecha_limite`='" . $datos['fecha_limite'] . "',"
                    . "`hora`='" . $datos['hora'] . "',"
                    . "`creador`='" . $datos['creador'] . "',"
                    . "`equipo`='" . $datos['equipo'] . "',"
                    . "`tipo`='" . $datos['tipo'] . "'"
                    . ";";
            echo($sql);
            $db->sql_query($sql);
            $db->sql_close();
        }

        function actualizar($salida, $campo, $valor) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "UPDATE `inventarios_salidas` "
                    . "SET `" . $campo . "`='" . $valor . "' "
                    . "WHERE `salida`='" . $salida . "';";
            $db->sql_query($sql);
            $db->sql_close();
        }

        function eliminar($salida) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "DELETE FROM `inventarios_salidas` "
                    . "WHERE `salida`='" . $salida . "';";
            $db->sql_query($sql);
            $db->sql_close();
        }

        function consultar($salida) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "SELECT * FROM `inventarios_salidas` "
                    . "WHERE `salida`='" . $salida . "';";
            $consulta = $db->sql_query($sql);
            $fila = $db->sql_fetchrow($consulta);
            $db->sql_close();
            return($fila);
        }

        function estado_cobro($salida) {
            $salida = $this->consultar($salida);
            if ($salida["tipo"] == "01" && (empty($salida["cobro"]) || $salida["cobro"] == "0")) {
                return("cobrorojo");
            } elseif ($salida["tipo"] == "02") {
                return("cobroinecesario");
            } else {
                return("cobroverde");
            }
        }

        /**
         * Retorna la cantidad de solicitudes de entrega de amteriales realziadas
         * por un ususario especifico.
         * @param type $usuario
         * @return type
         */
        function getCountUsuario($usuario) {
            $db = new MySQL(Sesion::getConexion());
            $sql = ""
                    . "SELECT count(*) AS `conteo` "
                    . "FROM `inventarios_salidas` "
                    . "WHERE(`creador` = '{$usuario}');";
            $consulta = $db->sql_query($sql);
            $fila = $db->sql_fetchrow($consulta);
            $db->sql_close();
            return($fila["conteo"]);
        }

        /**
         * Retorna la cantidad de solicitudes de entrega de amteriales realziadas
         * por un equipo especifico.
         * @param type $usuario
         * @return type
         */
        function getCountEquipo($equipo) {
            $db = new MySQL(Sesion::getConexion());
            $sql = ""
                    . "SELECT count(*) AS `conteo` "
                    . "FROM `inventarios_salidas` "
                    . "WHERE(`equipo` = '{$equipo}');";
            $consulta = $db->sql_query($sql);
            $fila = $db->sql_fetchrow($consulta);
            $db->sql_close();
            return($fila["conteo"]);
        }

        /**
         * Retorna el numero de items que contiene el detalle de la solicitud,
         * no hace referencia a las cantidades individuales solicitadas, sino al 
         * total de los elementos contenidos en el detalle.
         * @param type $salida
         * @return type
         */
        function getItemsCount($salida) {
            $db = new MySQL(Sesion::getConexion());
            $sql = ""
                    . "SELECT count(*) AS `conteo` "
                    . "FROM `inventarios_salidas_detalles` "
                    . "WHERE(`salida` = '{$salida}');";
            $consulta = $db->sql_query($sql);
            $fila = $db->sql_fetchrow($consulta);
            $db->sql_close();
            $conteo=$fila["conteo"];
            unset($db);
            unset($sql);
            unset($consulta);
            unset($fila);
            return($conteo);
        }

        /**
         * Retorna la cantidad de solicitudes total registradas en el sistema
         * @param type $usuario
         * @return type
         */
        function getCount() {
            $db = new MySQL(Sesion::getConexion());
            $sql = ""
                    . "SELECT count(*) AS `conteo` "
                    . "FROM `inventarios_salidas` "
                    . ";";
            $consulta = $db->sql_query($sql);
            $fila = $db->sql_fetchrow($consulta);
            $db->sql_close();
            return($fila["conteo"]);
        }

        /**
         * Restorna un estado que indica si es posible o no desautorizar (disavow)
         * una salida, evaluando recursivamente los elementos que conforman su 
         * detalle y si estos han sido entregados retornara falso (false).
         * @param type $salida
         */
        public function disavowStatus($salida) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "SELECT * FROM `inventarios_salidas_detalles` "
                    . "WHERE `salida`='" . $salida . "';";
            $consulta = $db->sql_query($sql);
            $estado = true;
            while ($fila = $db->sql_fetchrow($consulta)) {
                $entegado = doubleval($fila["cantidad_entregada"]);
                if ($entegado > 0.0) {
                    $estado = false;
                }
            }
            $db->sql_close();
            return($estado);
        }

        /**
         * Retorna el valor del campo Autorizado en una salida especifica.
         * @param type $salida
         * @return type
         */
        public function getAutorizado($salida) {
            $salida = $this->consultar($salida);
            return($salida["autorizado"]);
        }

        /**
         * Restorna un estado que indica si es posible o no desautorizar (disavow)
         * una salida, evaluando recursivamente los elementos que conforman su 
         * detalle y si estos han sido entregados retornara falso (false).
         * @param type $salida
         */
        public function getStatusLegalizacion($salida) {
            $isd = new Inventarios_Salidas_Detalles();
            $db = new MySQL(Sesion::getConexion());
            $sql = "SELECT * FROM `inventarios_salidas_detalles` "
                    . "WHERE `salida`='" . $salida . "';";
            $consulta = $db->sql_query($sql);
            $estado = true;
            while ($fila = $db->sql_fetchrow($consulta)) {
                $legalizado = doubleval($isd->getPendienteLegalizar($fila["detalle"]));
                if ($legalizado > 0.0) {
                    $estado = false;
                }
            }
            $db->sql_close();
            return($estado);
        }
/**
         * Retorna el listado de usos especificados en la base de datos.
         * @param type $parametros
         * @return type
         */
        public function getListFilter($parametros = array()) {
            if (is_array($parametros)) {
                $db = new MySQL(Sesion::getConexion());
                $sql = "SELECT * FROM `inventarios_salidas_filtros` ORDER BY `filtro`;";
                $consulta = $db->sql_query($sql);
                $usos = array();
                while ($fila = $db->sql_fetchrow($consulta)) {
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