<?php
/** Variables **/
$if=new Inventarios_Familias();
$ia=new Inventarios_Articulos();
$cadenas = new Cadenas();
$fechas = new Fechas();
$validaciones = new Validaciones();
$usuario=  Sesion::usuario();
/** Valores **/
$igl=$if->getList();
$grid=Request::getValue("grid");
$d=$ia->consultar(Request::getValue("articulo"));
/** Campos **/
$f->oculto("creador",$usuario["usuario"]);
$f->oculto("grid",$grid);
$f->campos['articulo']=$f->dynamic(array("field"=>"articulo","value"=>$d["articulo"],"required"=>true,"readonly"=>true,"class"=>"codigo"));
$f->campos['codigo']=$f->dynamic(array("field"=>"codigo","value"=>$d["codigo"]));
$f->campos['familia']=$f->getSelect(array("id" =>"familia".$f->id,"values" => $igl,"label" => "nombre","option" => "familia","onChange" => "changeFamilia".$f->id."()","selected"=>$d['familia']));
$f->campos['nombre']=$f->dynamic(array("field"=>"nombre","value"=>$d["nombre"],"required"=>true));
$f->campos['referencia']=$f->dynamic(array("field"=>"referencia","value"=>$d["referencia"],"required"=>true));
$f->campos['estado']=$f->dynamic(array("field"=>"estado","value"=>$d["estado"]));
$f->campos['fecha']=$f->dynamic(array("field"=>"fecha","value"=>$d["fecha"],"class"=>"automatico"));
$f->campos['hora']=$f->dynamic(array("field"=>"hora","value"=>$d["hora"],"class"=>"automatico"));
$f->campos['creador']=$f->dynamic(array("field"=>"creador","value"=>$d["creador"]));
/** Celdas **/
$f->celdas["articulo"]=$f->celda("Código del Articulo:",$f->campos['articulo']);
$f->celdas["codigo"]=$f->celda("Código Contable:",$f->campos['codigo'],"","w40p");
$f->celdas["familia"]=$f->celda("Familia de Articulos:",$f->campos['familia']);
$f->celdas["nombre"]=$f->celda("Nombre:",$f->campos['nombre']);
$f->celdas["referencia"]=$f->celda("Referencia (Lote):",$f->campos['referencia']);
$f->celdas["fecha"]=$f->celda("Fecha:",$f->campos['fecha']);
$f->celdas["hora"]=$f->celda("Hora:",$f->campos['hora']);
$f->celdas["creador"]=$f->celda("Creador:",$f->campos['creador']);
$f->celdas["estado"]=$f->celda("Estado:",$f->campos['estado']);
/** Filas **/
$f->fila["pf1"]=$f->fila($f->celdas["articulo"].$f->celdas["fecha"].$f->celdas["hora"]);
$f->fila["pf2"]=$f->fila($f->celdas["codigo"].$f->celdas["familia"]);
$f->fila["pf3"]=$f->fila($f->celdas["nombre"]);
$f->fila["pf4"]=$f->fila($f->celdas["referencia"]);
/** Compilando **/
$f->fila["perfil"]=$f->fila["pf1"].$f->fila["pf2"].$f->fila["pf3"].$f->fila["pf4"];
?>