<?php

$Elem_Nombre   =  $_POST['Elem_Nombre'];
$Elem_Marca    =  $_POST['Elem_Marca'];
$Elem_Serial   =  $_POST['Elem_Serial'];
// $Elem_FechaReg =  "NOW()";
$Amb_Cod       =  $_POST['Amb_Cod'];
$Tipo_Cod      =  $_POST['tipo'];

$campos=array(
    'Elem_Nombre',
    'Elem_Marca',
    'Elem_Serial',
    'Amb_Cod',
    'Tipo_Cod',
    'Est_Cod'
);
$valores=array(
    $Elem_Nombre,
    $Elem_Marca,
    $Elem_Serial,
    // $Elem_FechaReg,
    $Amb_Cod,
    $Tipo_Cod,
    1
);
$crear_Usu=new classCRUD();
$crear_Usu->insertBD($tabla_nom,$valores,$campos);

echo "Registro creado Exitosamente";
?>