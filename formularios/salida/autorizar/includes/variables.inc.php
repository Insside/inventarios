<?php
/** Variables * */
$cadenas = new Cadenas();
$fechas = new Fechas();
$r= new Request();
$componentes = new Componentes();
$is=new Inventarios_Salidas();
$ie=new Inventarios_Empleados();
$ic=new Inventarios_Centros();
$ist=new Inventarios_Salidas_Tipos();
$usuario = Sesion::usuario();
/** Valores **/
$salida=$is->consultar($r->getValue("salida"));
$desautorizable=$is->disavowStatus($salida["salida"]);
$itemsCount= intval($is->getItemsCount($salida["salida"]));
$grid=$r->getValue("grid");
$d['autoriza'] =Sesion::getUser();
$d['autorizado'] =$salida["autorizado"];

$message["autorizar"]="<p>El presente formulario permite <b>autorizar/b> una solicitud "
        . "radicada en el sistema, para que se produzca la entrega en el almacén. "
        . "La solicitud una vez ha sido autorizada o se haya producido la entrega "
        . "de cualquier material listado en su detalle no podrá ser modificada, "
        . "eliminada, ni desautorizada.</p>";
$message["desautorizar"]="<p>El presente formulario permite <b>desautorizar</b> una solicitud "
        . "de entrega de materiales, para evitar que se produzca la entrega en el almacén. "
        . "La tras revisar la solicitud se concluye que esta se puede desautorizar ya que no se ha producido la entrega "
        . "de ningun material listado en el detalle."
        . "</p>";
$message["denegado"]="<p>"
        . "No se puede <b>desautorizar</b> la entrega de materiales, debido a que esta "
        . "se esta efectuando o se ha realizado, si los materiales solicitados "
        . "por algun motivo se solicitarion erroneamente o ya no son necesarios "
        . "proceda a <b>realizar una devolucón</b> normal de los mismos. "
        . "</p>";
$message["noautorizable"]="<p>"
        . "No se puede <b>autorizar</b> una solicitud de entrega de materiales, "
        . "vacia, seleccione en detalle los materiales u articulos y las "
        . "respectivas cantidades a solicitar, y luego proceda a obtener o "
        . "generar la utorización segun corresponda."
        . "</p>";
?>