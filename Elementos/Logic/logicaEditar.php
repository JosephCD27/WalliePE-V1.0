<?php

$camp_pk=$_POST['camp_pk'];
$upd_cod=$_POST['upd_cod'];

$upd_nom=$_POST['upd_nom'];
$upd_marca=$_POST['upd_marca'];
$upd_serial=$_POST['upd_ser'];
$fecha=$_POST['fecha'];
$upd_tipo=$_POST['upd_tipo'];
$upd_amb=$_POST['upd_amb'];

$arreglo=array(
    'Elem_Nombre'  =>$upd_nom,
    'Elem_Marca'   =>$upd_marca,
    'Elem_Serial'  =>$upd_serial,
    'Elem_FechaReg'=>$fecha,
    'Tipo_Cod'     =>$upd_tipo,
    'Amb_Cod'      =>$upd_amb
);

$actualizar_Elemento=new classCRUD();
echo $actualizar_Elemento->updateBD($tabla_nom,$camp_pk,$upd_cod,$arreglo);
?>