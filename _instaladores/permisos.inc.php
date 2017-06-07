<?php

/**
 * Este archivo ocntiene  todos los permisos especificados para la implementación
 * del modulo, los permisos se definen uno por uno en proceso tipo instalación.
 * Este archivo representa la instalación de los permisos en la plataforma.
 */
$permisos = new Inventarios_Permisos();
echo("<li>Eliminando todos los permisos asociados al modulo...");
$permisos->deleteAll($modulo["modulo"]);
echo("<li>Instalando el listado de permisos requeridos...");
echo("<ul class=\"permisos-instalados-ul\">");
echo("<li class=\"permisos-instalados-li\">INVENTARIOS-MODULO-ACCEDER</li>");
$permisos->crear(array(
    "modulo" => $modulo["modulo"],
    "permiso" => "INVENTARIOS-MODULO-ACCEDER",
    "nombre" => "Acceso Modulo de Inventarios",
    "descripcion" => "Este permiso es necesario para poder acceder al - Módulo de Inventarios - , si no se dispone del mismo el módulo no será listado entre los módulos accesibles en la pantalla del bienvenida de la plataforma.",
    "fecha" => $hoy,
    "hora" => $ahora,
    "creador" => $usuario
        )
);

echo("<li class=\"permisos-instalados-li\">INVENTARIOS-SOLICITUDES-CONSULTAR</li>");
$permisos->crear(array(
    "modulo" => $modulo["modulo"],
    "permiso" => "INVENTARIOS-SOLICITUDES-CONSULTAR",
    "nombre" => "Consultar Solicitudes",
    "descripcion" => "Este permiso permite ver el listado de solicitudes de entrega de materiales, que sean de nuestra autoría es decir propias, no concede acceso para visualizar las solicitudes de los demás miembros del equipo de trabajo ni de la empresa u entidad en general.",
    "fecha" => $hoy,
    "hora" => $ahora,
    "creador" => $usuario
        )
);

echo("<li class=\"permisos-instalados-li\">INVENTARIOS-SOLICITUDES-CONSULTAR-EQUIPO</li>");
$permisos->crear(array(
    "modulo" => $modulo["modulo"],
    "permiso" => "INVENTARIOS-SOLICITUDES-CONSULTAR-EQUIPO",
    "nombre" => "Consultar solicitudes de equipo",
    "descripcion" => "Este permiso consede autorización para consultar todas las solicitudes presentadas por el equipo de trabajo.",
    "fecha" => $hoy,
    "hora" => $ahora,
    "creador" => $usuario
        )
);

echo("<li class=\"permisos-instalados-li\">INVENTARIOS-SOLICITUDES-CONSULTAR-TODAS</li>");
$permisos->crear(array(
    "modulo" => $modulo["modulo"],
    "permiso" => "INVENTARIOS-SOLICITUDES-CONSULTAR-TODAS",
    "nombre" => "Consultar todas las solicitudes.",
    "descripcion" => "Este permiso consede autorización para consultar todas las solicitudes de entrega de materiales existentes.",
    "fecha" => $hoy,
    "hora" => $ahora,
    "creador" => $usuario
        )
);

echo("<li class=\"permisos-instalados-li\">INVENTARIOS-SOLICITUD-CREAR</li>");
$permisos->crear(array(
    "modulo" => $modulo["modulo"],
    "permiso" => "INVENTARIOS-SOLICITUD-CREAR",
    "nombre" => "Permite solicitar la entrega de materiales.",
    "descripcion" => "Este permiso concede acceso a la opción para crear solicitudes.",
    "fecha" => $hoy,
    "hora" => $ahora,
    "creador" => $usuario
        )
);

echo("<li class=\"permisos-instalados-li\">INVENTARIOS-SOLICITUD-ELIMINAR</li>");
$permisos->crear(array(
    "modulo" => $modulo["modulo"],
    "permiso" => "INVENTARIOS-SOLICITUD-ELIMINAR",
    "nombre" => "Permite eliminar una solicitud de entrega de materiales.",
    "descripcion" => "Este permiso eliminar una solicitud de entrega de materiales.",
    "fecha" => $hoy,
    "hora" => $ahora,
    "creador" => $usuario
        )
);

echo("<li class=\"permisos-instalados-li\">INVENTARIOS-SOLICITUD-ELIMINAR-TODAS</li>");
$permisos->crear(array(
    "modulo" => $modulo["modulo"],
    "permiso" => "INVENTARIOS-SOLICITUD-ELIMINAR-TODAS",
    "nombre" => "Permite eliminar cualquier solicitud de entrega de materiales.",
    "descripcion" => "Este permiso eliminar una solicitud de entrega de materiales.",
    "fecha" => $hoy,
    "hora" => $ahora,
    "creador" => $usuario
        )
);

echo("<li class=\"permisos-instalados-li\">INVENTARIOS-SOLICITUD-MODIFICAR</li>");
$permisos->crear(array(
    "modulo" => $modulo["modulo"],
    "permiso" => "INVENTARIOS-SOLICITUD-MODIFICAR",
    "nombre" => "Permite modificar una solicitud de entrega de materiales.",
    "descripcion" => "Este permiso consede los privilegios necesarios para modificar una solicitud de entrega de materiales.",
    "fecha" => $hoy,
    "hora" => $ahora,
    "creador" => $usuario
        )
);
echo("<li class=\"permisos-instalados-li\">INVENTARIOS-SOLICITUD-MODIFICAR-TODAS</li>");
$permisos->crear(array(
    "modulo" => $modulo["modulo"],
    "permiso" => "INVENTARIOS-SOLICITUD-MODIFICAR-TODAS",
    "nombre" => "Permite modificar cualquier solicitud de entrega de materiales.",
    "descripcion" => "Este permiso consede los privilegios necesarios para modificar una solicitud de entrega de materiales.",
    "fecha" => $hoy,
    "hora" => $ahora,
    "creador" => $usuario
        )
);
echo("<li class=\"permisos-instalados-li\">INVENTARIOS-SOLICITUD-ENTREGAR</li>");
$permisos->crear(array(
    "modulo" => $modulo["modulo"],
    "permiso" => "INVENTARIOS-SOLICITUD-ENTREGAR",
    "nombre" => "Permite realizar la entrega de materiales.",
    "descripcion" => "Este permiso consede los privilegios necesarios para realziar la entrega de materiales.",
    "fecha" => $hoy,
    "hora" => $ahora,
    "creador" => $usuario
        )
);
echo("<li class=\"permisos-instalados-li\">INVENTARIOS-SOLICITUD-LEGALIZAR</li>");
$permisos->crear(array(
    "modulo" => $modulo["modulo"],
    "permiso" => "INVENTARIOS-SOLICITUD-LEGALIZAR",
    "nombre" => "Permite legalizar los materiales entregados.",
    "descripcion" => "Este permiso consede los privilegios necesarios para realziar la legalización de materiales entregados.",
    "fecha" => $hoy,
    "hora" => $ahora,
    "creador" => $usuario
        )
);
/** INVENTARIOS-SOLICITUD-REVERTIR * */
//$permisos->crear(array(
//    "modulo" =>$modulo["modulo"],
//    "permiso" => "INVENTARIOS-SOLICITUD-ENTREGAR",
//    "nombre" => "Permite realizar la entrega de materiales.",
//    "descripcion" => "Este permiso consede los privilegios necesarios para realziar la entrega de materiales.",
//    "fecha" =>$hoy,
//    "hora" =>$ahora,
//    "creador" =>$usuario
//        )
//);

echo("<li class=\"permisos-instalados-li\">INVENTARIOS-SOLICITUD-REVERTIR</li>");
$permisos->crear(array(
    "modulo" => $modulo["modulo"],
    "permiso" => "INVENTARIOS-SOLICITUD-ENTREGAR-IMPRIMIR",
    "nombre" => "Permite imprimir la entrega de materiales.",
    "descripcion" => "Este permiso consede los privilegios necesarios para realziar la impresion de un comprovante de entrega de materiales.",
    "fecha" => $hoy,
    "hora" => $ahora,
    "creador" => $usuario
        )
);

echo("<li class=\"permisos-instalados-li\">INVENTARIOS-SOLICITUD-APROBAR</li>");
$permisos->crear(array(
    "modulo" => $modulo["modulo"],
    "permiso" => "INVENTARIOS-SOLICITUD-APROBAR",
    "nombre" => "Permite aprobar la entrega de solicitudes.",
    "descripcion" => "Este permiso consede los privilegios necesarios para realziar la aprobación de solicitudes de entrega de materiales.",
    "fecha" => $hoy,
    "hora" => $ahora,
    "creador" => $usuario
        )
);

echo("<li class=\"permisos-instalados-li\">INVENTARIOS-SOLICITUD-DETALLE-SERIAL-ELIMINAR</li>");
$permisos->crear(array(
    "modulo" => $modulo["modulo"],
    "permiso" => "INVENTARIOS-SOLICITUD-DETALLE-SERIAL-ELIMINAR",
    "nombre" => "Permite eliminar un serial.",
    "descripcion" => "Este permiso consede los privilegios necesarios para realziar la aprobación de solicitudes de entrega de materiales.",
    "fecha" => $hoy,
    "hora" => $ahora,
    "creador" => $usuario
        )
);

echo("<li class=\"permisos-instalados-li\">INVENTARIOS-SOLICITUD-DETALLE-SERIAL-ELIMINAR-TODOS</li>");
$permisos->crear(array(
    "modulo" => $modulo["modulo"],
    "permiso" => "INVENTARIOS-SOLICITUD-DETALLE-SERIAL-ELIMINAR-TODOS",
    "nombre" => "Permite eliminar un serial.",
    "descripcion" => "Este permiso consede los privilegios necesarios para realziar la aprobación de solicitudes de entrega de materiales.",
    "fecha" => $hoy,
    "hora" => $ahora,
    "creador" => $usuario
        )
);


echo("<li class=\"permisos-instalados-li\">INVENTARIOS-SOLICITUD-VER-SOLO-APROBADAS</li>");
$permisos->crear(array(
    "modulo" => $modulo["modulo"],
    "permiso" => "INVENTARIOS-SOLICITUD-VER-SOLO-APROBADAS",
    "nombre" => "Ver solo aprobadas.",
    "descripcion" => "Restringe las solicitudes visualizadas solo a aquellas que se encuentren actualmente aprobadas.",
    "fecha" => $hoy,
    "hora" => $ahora,
    "creador" => $usuario
   )
);
/** INVENTARIOS-SOLICITUD-APROBAR **/
echo("<li class=\"permisos-instalados-li\">INVENTARIOS-ARTICULOS-CREAR</li>");
$permisos->crear(array(
    "modulo" => $modulo["modulo"],
    "permiso" => "INVENTARIOS-ARTICULOS-CREAR",
    "nombre" => "Crear articulos.",
    "descripcion" => "Permite crear articulos.",
    "fecha" => $hoy,
    "hora" => $ahora,
    "creador" => $usuario
   )
);

echo("<li class=\"permisos-instalados-li\">INVENTARIOS-ARTICULOS-MODIFICAR</li>");
$permisos->crear(array(
    "modulo" => $modulo["modulo"],
    "permiso" => "INVENTARIOS-ARTICULOS-MODIFICAR",
    "nombre" => "Modificar articulos.",
    "descripcion" => "Permite modificar articulos.",
    "fecha" => $hoy,
    "hora" => $ahora,
    "creador" => $usuario
   )
);
echo("<li class=\"permisos-instalados-li\">INVENTARIOS-ARTICULOS-CONSULTAR</li>");
$permisos->crear(array(
    "modulo" => $modulo["modulo"],
    "permiso" => "INVENTARIOS-ARTICULOS-CONSULTAR",
    "nombre" => "Consultar listado de articulos.",
    "descripcion" => "Permite consultar el listado de articulos.",
    "fecha" => $hoy,
    "hora" => $ahora,
    "creador" => $usuario
   )
);

echo("<li class=\"permisos-instalados-li\">INVENTARIOS-ARTICULOS-FILTRAR</li>");
$permisos->crear(array(
    "modulo" => $modulo["modulo"],
    "permiso" => "INVENTARIOS-ARTICULOS-FILTRAR",
    "nombre" => "Filtrar listado de articulos.",
    "descripcion" => "Permite realizar busquedas el listado de articulos.",
    "fecha" => $hoy,
    "hora" => $ahora,
    "creador" => $usuario
   )
);





echo("<li class=\"permisos-instalados-li\">INVENTARIOS-GRUPOS-CONSULTAR</li>");
$permisos->crear(array(
    "modulo" => $modulo["modulo"],
    "permiso" => "INVENTARIOS-GRUPOS-CONSULTAR",
    "nombre" => "Consultar listado de grupos de articulos.",
    "descripcion" => "Permite consultar el listado de grupos (familias) de articulos.",
    "fecha" => $hoy,
    "hora" => $ahora,
    "creador" => $usuario
   )
);

echo("<li class=\"permisos-instalados-li\">INVENTARIOS-GRUPOS-CREAR</li>");
$permisos->crear(array(
    "modulo" => $modulo["modulo"],
    "permiso" => "INVENTARIOS-GRUPOS-CREAR",
    "nombre" => "Crear grupos (familias).",
    "descripcion" => "Permite crear grupos (familias) de articulos.",
    "fecha" => $hoy,
    "hora" => $ahora,
    "creador" => $usuario
   )
);

echo("<li class=\"permisos-instalados-li\">INVENTARIOS-GRUPOS-MODIFICAR</li>");
$permisos->crear(array(
    "modulo" => $modulo["modulo"],
    "permiso" => "INVENTARIOS-GRUPOS-MODIFICAR",
    "nombre" => "Modificar grupos (familias).",
    "descripcion" => "Permite modificar grupos (familias) de articulos.",
    "fecha" => $hoy,
    "hora" => $ahora,
    "creador" => $usuario
   )
);




echo("</ul></li>");
//    $modulo = $modulos->crear("010", "Inventarios", "Módulo De Inventarios", "");
//    $permisos->permiso_crear($modulo, "INVENTARIOS-MODULO-A", "Acceso al modulo de distribución.", "Permite acceder al modulo comercial", "0000000000");
//    $permisos->permiso_crear($modulo, "INVENTARIOS-MEDIDAS-CREAR", "Acceso al modulo de distribución.", "Permite acceder al modulo comercial", "0000000000");
//    $permisos->permiso_crear($modulo, "INVENTARIOS-MEDIDAS-MODIFICAR", "Acceso al modulo de distribución.", "Permite acceder al modulo comercial", "0000000000");
//    $permisos->permiso_crear($modulo, "INVENTARIOS-MEDIDAS-ELIMINAR", "Acceso al modulo de distribución.", "Permite acceder al modulo comercial", "0000000000");
?>