<?php
/**
 * @package Insside
 * @subpackage Inventarios
 * @author Jose Alexis Correa Valencia <jalexiscv@gmail.com>
 * @copyright (c) 2015 www.insside.com
 */
if (!class_exists('Inventarios_Empleados')) {


  class Inventarios_Empleados {

    var $formularios;

    function Inventarios_Empleados() {
      $this->formularios = new Forms(time());
    }

    function crear($datos) {
      $db = new MySQL(Sesion::getConexion());
      $sql = "INSERT INTO `empleados_empleados` SET `empleado`='" . $datos['empleado'] . "';";
      $db->sql_query($sql);
      $db->sql_close();
      $this->actualizar($datos['empleado'], 'documento', $datos['documento']);
      $this->actualizar($datos['empleado'], 'nombres', $datos['nombres']);
      $this->actualizar($datos['empleado'], 'apellidos', $datos['apellidos']);
      $this->actualizar($datos['empleado'], 'direccion', $datos['direccion']);
      $this->actualizar($datos['empleado'], 'telefono', $datos['telefono']);
      $this->actualizar($datos['empleado'], 'correo', $datos['correo']);
      $this->actualizar($datos['empleado'], 'sexo', $datos['sexo']);
      $this->actualizar($datos['empleado'], 'foto', $datos['foto']);
      $this->actualizar($datos['empleado'], 'fecha', $datos['fecha']);
      $this->actualizar($datos['empleado'], 'hora', $datos['hora']);
      $this->actualizar($datos['empleado'], 'creador', $datos['creador']);
    }

    function actualizar($empleado, $campo, $valor) {
      $db = new MySQL(Sesion::getConexion());
      $sql = "UPDATE `empleados_empleados` "
              . "SET `" . $campo . "`='" . $valor . "' "
              . "WHERE `empleado`='" . $empleado . "';";
      $db->sql_query($sql);
      $db->sql_close();
    }

    function eliminar($empleado) {
      $db = new MySQL(Sesion::getConexion());
      $sql = "DELETE FROM `empleados_empleados` "
              . "WHERE `empleado`='" . $empleado . "';";
      $db->sql_query($sql);
      $db->sql_close();
    }

    function consultar($empleado) {
      $db = new MySQL(Sesion::getConexion());
      $sql = "SELECT * FROM `empleados_empleados` "
              . "WHERE `empleado`='" . $empleado . "';";
      $consulta = $db->sql_query($sql);
      $fila = $db->sql_fetchrow($consulta);
      $db->sql_close();
      return($fila);
    }

    function conteo($sql = "") {
      $db = new MySQL(Sesion::getConexion());
      $sql = "SELECT Count(*) AS `conteo` FROM `empleados_empleados` " . $sql . ";";
      $consulta = $db->sql_query($sql);
      $fila = $db->sql_fetchrow($consulta);
      return(intval($fila['conteo']));
    }

    function criterios($nombre, $seleccionado) {
      $etiquetas = array("Identificacion", "Nombres", "Apellidos", "Teléfono");
      $valores = array("empleado", "nombres", "apellidos", "telefono");
      return($this->formularios->combo($nombre, $etiquetas, $valores, $seleccionado, ""));
    }

    function combo($name, $selected, $disabled = false, $change = "") {
      $selected = empty($selected) ? "" : $selected;
      $disabled = ($disabled) ? "disabled=\"disabled\"" : "";
      $db = new MySQL(Sesion::getConexion());
      $sql = "SELECT * FROM `empleados_empleados` ORDER BY `apellidos`";
      $consulta = $db->sql_query($sql);
      $html = ('<select name="' . $name . '"id="' . $name . '" ' . $disabled . ' onChange="' . $change . '">');
      $conteo = 0;
      while ($fila = $db->sql_fetchrow($consulta)) {
        $html.=('<option value="' . $fila['empleado'] . '"' . (($selected == $fila['empleado']) ? "selected" : "") . '>'  . $fila['apellidos'] ." ".$fila['nombres'] . '</option>');
        $conteo++;
      }$db->sql_close();
      $html.=("</select>");
      return($html);
    }

  }

}
?>