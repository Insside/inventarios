<?php

/**
 * @package Insside
 * @subpackage Inventarios
 * @author Jose Alexis Correa Valencia <jalexiscv@gmail.com>
 * @copyright (c) 2015 www.insside.com
 */
if (!class_exists('Inventarios_Componentes')) {
    if (!class_exists('Aplicacion_Modulos_Componentes')) {
        require_once(ROOT . "modulos/aplicacion/librerias/Aplicacion_Modulos_Componentes.class.php");
    }

    class Inventarios_Componentes extends Aplicacion_Modulos_Componentes {

        private $modulo;
        private $permiso;
        private $datos;

        function Inventarios_Componentes() {
            $modulo = new Inventarios_Modulo();
            $f = new Fechas();
            $this->modulo = $modulo->modulo;
            $this->permiso = "INVENTARIOS-MODULO-A";
            /** Regeneracion del Menu * */
            $this->datos[0] = array("componente" => $this->codigo("0", "0"), "herencia" => "0", "titulo" => "Inventarios", "descripcion" => "Modulo Inventarios", "funcion" => "1387795376", "icono" => "i033x033_usuarios", "peso" => "2", "estado" => "ACTIVO", "fecha" => $f->hoy(), "permiso" => $this->permiso, "hora" => $f->ahora(), "creador" => "0000000000");
            /** Componentes * */
            $this->datos[1] = array("componente" => $this->codigo("1", "0"), "herencia" => $this->datos[0]['componente'], "titulo" => "Movimientos", "descripcion" => "Componente", "funcion" => "0000000000", "icono" => "i033x033_componente", "peso" => "1", "estado" => "ACTIVO", "fecha" => $f->hoy(), "permiso" => $this->permiso, "hora" => $f->ahora(), "creador" => "0000000000");
            $this->datos[2] = array("componente" => $this->codigo("2", "0"), "herencia" => $this->datos[0]['componente'], "titulo" => "Catálogo / Productos", "descripcion" => "Componente", "funcion" => "0000000000", "icono" => "i033x033_componente", "peso" => "2", "estado" => "ACTIVO", "fecha" => $f->hoy(), "permiso" => $this->permiso, "hora" => $f->ahora(), "creador" => "0000000000");
            $this->datos[3] = array("componente" => $this->codigo("3", "0"), "herencia" => $this->datos[0]['componente'], "titulo" => "Clientes / Empleados", "descripcion" => "Componente", "funcion" => "0000000000", "icono" => "i033x033_componente", "peso" => "3", "estado" => "ACTIVO", "fecha" => $f->hoy(), "permiso" => $this->permiso, "hora" => $f->ahora(), "creador" => "0000000000");
            $this->datos[4] = array("componente" => $this->codigo("4", "0"), "herencia" => $this->datos[0]['componente'], "titulo" => "Configuración", "descripcion" => "Componente", "funcion" => "0000000000", "icono" => "i033x033_componente", "peso" => "3", "estado" => "ACTIVO", "fecha" => $f->hoy(), "permiso" => $this->permiso, "hora" => $f->ahora(), "creador" => "0000000000");
            /** Opciones * */
            $this->datos['011'] = array("componente" => $this->codigo("1", "1"), "herencia" => $this->datos[1]['componente'], "titulo" => "Entradas", "descripcion" => "Listado General", "funcion" => "1387972719", "icono" => "i033x033_componente", "peso" => "1", "estado" => "ACTIVO", "fecha" => $f->hoy(), "permiso" => $this->permiso, "hora" => $f->ahora(), "creador" => "0000000000");
            $this->datos['012'] = array("componente" => $this->codigo("1", "2"), "herencia" => $this->datos[1]['componente'], "titulo" => "Salidas", "descripcion" => "Listado General", "funcion" => "1387972719", "icono" => "i033x033_componente", "peso" => "1", "estado" => "ACTIVO", "fecha" => $f->hoy(), "permiso" => $this->permiso, "hora" => $f->ahora(), "creador" => "0000000000");

            $this->datos['021'] = array("componente" => $this->codigo("2", "1"), "herencia" => $this->datos[2]['componente'], "titulo" => "Articulos", "descripcion" => "Listado General", "funcion" => "1387972550", "icono" => "i033x033_componente", "peso" => "1", "estado" => "ACTIVO", "fecha" => $f->hoy(), "permiso" => $this->permiso, "hora" => $f->ahora(), "creador" => "0000000000");
            $this->datos['022'] = array("componente" => $this->codigo("2", "2"), "herencia" => $this->datos[2]['componente'], "titulo" => "Grupos", "descripcion" => "Listado General", "funcion" => "1392111180", "icono" => "i033x033_componente", "peso" => "1", "estado" => "ACTIVO", "fecha" => $f->hoy(), "permiso" => $this->permiso, "hora" => $f->ahora(), "creador" => "0000000000");
            $this->datos['031'] = array("componente" => $this->codigo("3", "1"), "herencia" => $this->datos[3]['componente'], "titulo" => "Terceros", "descripcion" => "Listado General", "funcion" => "1449829630", "icono" => "i033x033_componente", "peso" => "1", "estado" => "ACTIVO", "fecha" => $f->hoy(), "permiso" => $this->permiso, "hora" => $f->ahora(), "creador" => "0000000000");
            $this->datos['041'] = array("componente" => $this->codigo("4", "1"), "herencia" => $this->datos[4]['componente'], "titulo" => "Componentes", "descripcion" => "Regenerar", "funcion" => "1449829630", "icono" => "i033x033_componente", "peso" => "1", "estado" => "ACTIVO", "fecha" => $f->hoy(), "permiso" => $this->permiso, "hora" => $f->ahora(), "creador" => "0000000000");
            $this->datos['042'] = array("componente" => $this->codigo("4", "2"), "herencia" => $this->datos[4]['componente'], "titulo" => "Empleados", "descripcion" => "Sincronizar", "funcion" => "1449829630", "icono" => "i033x033_componente", "peso" => "1", "estado" => "ACTIVO", "fecha" => $f->hoy(), "permiso" => $this->permiso, "hora" => $f->ahora(), "creador" => "0000000000");
            $this->datos['043'] = array("componente" => $this->codigo("4", "3"), "herencia" => $this->datos[4]['componente'], "titulo" => "Unidades", "descripcion" => "de Medida", "funcion" => "1452187025", "icono" => "i033x033_componente", "peso" => "1", "estado" => "ACTIVO", "fecha" => $f->hoy(), "permiso" => $this->permiso, "hora" => $f->ahora(), "creador" => "0000000000");
            $this->datos['044'] = array("componente" => $this->codigo("4", "4"), "herencia" => $this->datos[4]['componente'], "titulo" => "Centros", "descripcion" => "de Costo", "funcion" => "1455204329", "icono" => "i033x033_componente", "peso" => "1", "estado" => "ACTIVO", "fecha" => $f->hoy(), "permiso" => $this->permiso, "hora" => $f->ahora(), "creador" => "0000000000");
        }

        function regenerar() {
            $datos = $this->datos;
            foreach ($datos as $dato) {
                $this->evaluar($dato);
            }
        }

        function evaluar($dato) {
            $consulta = $this->consultar($dato['componente']);
            if (isset($consulta['componente'])) {
                if ($dato['hora'] != $consulta['hora']) {
                    $this->actualizar($dato['componente'], "herencia", $dato['herencia']);
                    $this->actualizar($dato['componente'], "titulo", $dato['titulo']);
                    $this->actualizar($dato['componente'], "descripcion", $dato['descripcion']);
                    $this->actualizar($dato['componente'], "funcion", $dato['funcion']);
                    $this->actualizar($dato['componente'], "icono", $dato['icono']);
                    $this->actualizar($dato['componente'], "fecha", $dato['fecha']);
                    $this->actualizar($dato['componente'], "hora", $dato['hora']);
                    $this->actualizar($dato['componente'], "peso", $dato['peso']);
                    $this->actualizar($dato['componente'], "permiso", $dato['permiso']);
                } else {
                    
                }
            } else {
                echo($this->crear($dato));
            }
        }

        function codigo($componente, $opcion) {
            return(str_pad($this->modulo, 2, "0", STR_PAD_LEFT) . str_pad($componente, 2, "0", STR_PAD_LEFT) . str_pad($opcion, 2, "0", STR_PAD_LEFT));
        }

        /**
         * Este metodo retorna el codigo modular del componente generalmente es 
         * utilizado en la generacion del menu. 
         * @return type
         */
        function modulo() {
            return($this->datos[0]['componente']);
        }

    }

}
//$ic=new Inventarios_Componentes();
//$ic->regenerar();
?>