<?php
    $tabla="elementos";
    $condicion=$_GET['codigo'];
    $campo=$_GET['campo'];
    $parametros=null;

    $registro=  new classCRUD();
    $info=$registro->selectBD($tabla,$parametros,$campo,$condicion);

    $Elem_Cod      = $info[0]['Elem_Cod'];
    $Elem_Nombre   = $info[0]['Elem_Nombre'];
    $Elem_Marca    = $info[0]['Elem_Marca'];
    $Elem_Serial   = $info[0]['Elem_Serial'];
    $Elem_FechaReg = $info[0]['Elem_FechaReg'];
    $Amb_Cod       = $info[0]['Amb_Cod'];
    $Tipo_Cod      = $info[0]['Tipo_Cod'];

    //nombre tipo elemento
    $tabla_nom="tipo_elemento";
    $campo="Tipo_Cod";
    $condicion=$Tipo_Cod;
    $tipo= new classCRUD();
    $info_tipo=$tipo->selectBD($tabla_nom,null,$campo,$condicion);

    $tipo_nom=$info_tipo[0]["Tipo_Nombre"];

    //referencia ambiente
    $tabla_nom="ambientes";
    $campo="Amb_Cod";
    $condicion=$Amb_Cod;
    $ambiente= new classCRUD();
    $info_amb=$ambiente->selectBD($tabla_nom,null,$campo,$condicion);

    $amb_nom=$info_amb[0]["Amb_Ref"];

    include("../View/detalleElementos.php");
?>