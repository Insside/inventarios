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
if (!class_exists('Inventarios_Modulo')) {

    class Inventarios_Modulo {

        public $modulo = "010";
        private $nombre = "Inventarios";
        private $titulo = "Modulo Control de Inventarios.";
        private $descripcion = "Modulo Control de Inventarios.";
        private $creador = "0";
        private $permisos;

        function Inventarios_Modulo() {
            $consulta = $this->crear($this->modulo, $this->nombre, $this->titulo, $this->descripcion, $this->creador);
            $this->permisos = new Inventarios_Permisos();
            $this->permisos->permiso_crear($this->modulo, "INVENTARIOS-MODULO-A", "Acceso Modulo De Inventarios", "Permite acceder al modulo Inventarios.", "0000000000");
          }

        function crear($modulo, $nombre, $titulo, $descripcion, $creador = "0") {
            $fechas = new Fechas();
            $db = new MySQL(Sesion::getConexion());
            $sql = "SELECT * FROM `aplicacion_modulos` WHERE `modulo` =" . $modulo . ";";
            $consulta = $db->sql_query($sql);
            $conteo = $db->sql_numrows($consulta);
            if ($conteo == 0) {
                $sql = "INSERT INTO `aplicacion_modulos` SET ";
                $sql.="`modulo` = '" . $modulo . "', ";
                $sql.="`nombre` = '" . $nombre . "', ";
                $sql.="`titulo` = '" . $titulo . "', ";
                $sql.="`descripcion` = '" . $descripcion . "', ";
                $sql.="`fecha` = '" . $fechas->hoy() . "', ";
                $sql.="`hora` = '" . $fechas->ahora() . "', ";
                $sql.="`creador` = '" . $creador . "';";
                $consulta = $db->sql_query($sql);
            } else {
                
            }
            $db->sql_close();
            return($sql);
        }

    }

}
?>