<?php

    $opciones_amb="<option class='center' name='Amb_Cod' value='defecto'>--selecionar--</option>";
    $tabla_nom = "ambientes";
    $campo = $_POST["campo"]??null;
    $condicion = $_POST["condicion"]??null;
    $parametros=null;
    $listar_Novedades = new classCRUD();
    $datos = $listar_Novedades->selectBD($tabla_nom,$parametros,$campo,$condicion);
    foreach ($datos as $valor) {

        $opciones_amb .="<option class='center' name='Amb_Cod' value='{$valor["Amb_Cod"]}'>{$valor["Amb_Ref"]} | {$valor["Amb_Desc"]}</option>";

    }

    include("../View/seleccionAmbiente.php");

?>