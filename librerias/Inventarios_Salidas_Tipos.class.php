<?php
if (!class_exists('Inventarios_Salidas_Tipos')) {

class Inventarios_Salidas_Tipos{
  function combo($name, $selected, $disabled = false, $change = "") {
      $selected = empty($selected) ? "" : $selected;
      $disabled = ($disabled) ? "disabled=\"disabled\"" : "";
      $db = new MySQL(Sesion::getConexion());
      $sql = "SELECT * FROM `inventarios_salidas_tipos` ORDER BY `nombre`";
      $consulta = $db->sql_query($sql);
      $html = ('<select name="' . $name . '"id="' . $name . '" ' . $disabled . ' onChange="' . $change . '">');
      $conteo = 0;
      while ($fila = $db->sql_fetchrow($consulta)) {
        $html.=('<option value="' . $fila['tipo'] . '"' . (($selected == $fila['tipo']) ? "selected" : "") . '>'  . $fila['tipo'] ." ".$fila['nombre'] . '</option>');
        $conteo++;
      }$db->sql_close();
      $html.=("</select>");
      return($html);
    }
  
  }
}
?>