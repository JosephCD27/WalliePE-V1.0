<?php

$Elem_Cod=$_POST['Elem_delete'];
$del_campo=$_POST['Elem_campo'];

$eliminar_Elem=new classCRUD();
$arreglo=array(
    'Est_Cod'=>2
);
$eliminar_Elem->updateBD($tabla_nom,$del_campo,$Elem_Cod,$arreglo);
echo "Elemento anulado con exito";
?>