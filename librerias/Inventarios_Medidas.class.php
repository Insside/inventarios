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
if (!class_exists('Inventarios_Medidas')) {

  class Inventarios_Medidas {

    function crear($datos) {
      $db = new MySQL(Sesion::getConexion());
      $sql = "INSERT INTO `inventarios_medidas` SET "
              . "`siglas`='" . $datos['siglas'] . "',"
              . "`nombre`='" . $datos['nombre'] . "',"
              . "`descripcion`='" . $datos['descripcion'] . "',"
              . "`fecha`='" . $datos['fecha'] . "',"
              . "`hora`='" . $datos['hora'] . "'"
              . ";";
      $db->sql_query($sql);
      $db->sql_close();
    }

    function actualizar($medida, $campo, $valor) {
      $db = new MySQL(Sesion::getConexion());
      $sql = "UPDATE `inventarios_medidas` "
              . "SET `" . $campo . "`='" . $valor . "' "
              . "WHERE `medida`='" . $medida . "';";
      echo($sql);
      $db->sql_query($sql);
      $db->sql_close();
    }

    function eliminar($medida) {
      $db = new MySQL(Sesion::getConexion());
      $sql = "DELETE FROM `inventarios_medidas` "
              . "WHERE `medida`='" . $medida . "';";
      $db->sql_query($sql);
      $db->sql_close();
    }

    function consultar($medida) {
      $db = new MySQL(Sesion::getConexion());
      $sql = "SELECT * FROM `inventarios_medidas` "
              . "WHERE `medida`='" . $medida . "';";
      $consulta = $db->sql_query($sql);
      $fila = $db->sql_fetchrow($consulta);
      $db->sql_close();
      return($fila);
    }

    function combo($name, $selected, $disabled = false, $change = "") {
      $selected = empty($selected) ? "04" : $selected;
      $disabled = ($disabled) ? "disabled=\"disabled\"" : "";
      $db = new MySQL(Sesion::getConexion());
      $sql = "SELECT * FROM `inventarios_medidas` ORDER BY `medida`";
      $consulta = $db->sql_query($sql);
      $html = ('<select name="' . $name . '"id="' . $name . '" ' . $disabled . ' onChange="' . $change . '">');
      $conteo = 0;
      while ($fila = $db->sql_fetchrow($consulta)) {
        $html.=('<option value="' . $fila['medida'] . '"' . (($selected == $fila['medida']) ? "selected" : "") . '>' . $fila['medida'] . ' | ' . $fila['nombre'] . '</option>');
        $conteo++;
      }$db->sql_close();
      $html.=("</select>");
      return($html);
    }

    function conteo($sql = "") {
      $db = new MySQL(Sesion::getConexion());
      $sql = "SELECT Count(*) AS `conteo` FROM `inventarios_medidas` " . $sql . ";";
      $consulta = $db->sql_query($sql);
      $fila = $db->sql_fetchrow($consulta);
      return(intval($fila['conteo']));
    }

  }

}
?>