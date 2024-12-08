<?php

$Elem_Cod=$_GET['codigo'];
$campoPK=$_GET['campo'];
$parametros=null;

//saca la info de dase de datos
$datos=new classCRUD();
$info=$datos->selectBD($tabla_nom,$parametros,$campoPK,$Elem_Cod);

$Elem_Nombre=$info[0]["Elem_Nombre"];

include('../View/eliminarElementos.php');

?>