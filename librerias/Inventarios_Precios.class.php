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
if (!class_exists('Inventarios_Precios')) {

  class Inventarios_Precios {

    function crear($datos) {
      $db = new MySQL(Sesion::getConexion());
      $sql = "INSERT INTO `inventarios_precios` SET "
              . "`precio`='" . $datos['precio'] . "',"
              . "`articulo`='" . $datos['articulo'] . "',"
              . "`costo_compra_unidad`='" . $datos['costo_compra_unidad'] . "',"
              . "`margen_utilidad`='" . $datos['margen_utilidad'] . "',"
              . "`precio_venta_unidad`='" . $datos['precio_venta_unidad'] . "',"
              . "`impuesto`='" . $datos['impuesto'] . "',"
              . "`responsable`='" . $datos['responsable'] . "',"
              . "`fecha`='" . $datos['fecha'] . "',"
              . "`hora`='" . $datos['hora'] . "'"
              . ";";
      $db->sql_query($sql);
      $db->sql_close();
    }

    function actualizar($precio, $campo, $valor) {
      $db = new MySQL(Sesion::getConexion());
      $sql = "UPDATE `inventarios_precios` "
              . "SET `" . $campo . "`='" . $valor . "' "
              . "WHERE `precio`='" . $precio . "';";
      $db->sql_query($sql);
      $db->sql_close();
    }

    function eliminar($precio) {
      $db = new MySQL(Sesion::getConexion());
      $sql = "DELETE FROM `inventarios_precios` "
              . "WHERE `precio`='" . $precio . "';";
      $db->sql_query($sql);
      $db->sql_close();
    }

    function consultar($precio) {
      $db = new MySQL(Sesion::getConexion());
      $sql = "SELECT * FROM `inventarios_precios` "
              . "WHERE `precio`='" . $precio . "';";
      $consulta = $db->sql_query($sql);
      $fila = $db->sql_fetchrow($consulta);
      $db->sql_close();
      return($fila);
    }

  }

}
?>
