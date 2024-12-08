<?php
    // ----------------Cargar el nombre del ambiente seleccionado------------------------------------------------
    $tabla_nom = "ambientes";
    $campo = $_POST["campo"];
    $cod_amb = $_POST["ambiente"];


    $listar_Novedades = new classCRUD();
    $datos = $listar_Novedades->selectBD($tabla_nom,null,$campo,$cod_amb);

    $nom_amb=$datos[0]['Amb_Ref'];

    // ----------------------cargar elementos asociados al ambiente--------------------------------------------------------
    $tabla_nom = "elementos";
    $listar_Novedades = new classCRUD();
    $elementos = $listar_Novedades->selectBD($tabla_nom,null,$campo,$cod_amb);
    
    
    // ----------------select para seleccionar el tipo de Novedad------------------------------------------------
    $opciones_TN="<option class='center' name='TN_Cod' value='defecto'>--seleccionar--</option>";
    $tabla_nom = "tipo_novedad";
    $campo = $_POST["opciones"]??null;
    $condicion = $_POST["condicion"]??null;
    $parametros=null;
    $listar_Novedades = new classCRUD();
    $datos = $listar_Novedades->selectBD($tabla_nom,$parametros,$campo,$condicion);
    foreach ($datos as $valor) {

        $opciones_TN .= "<option class='center' name='TN_Cod' value='{$valor["TN_Cod"]}'>{$valor["TN_Nom"]}</option>";
    }

    include('../View/crearNovedad.php');
?>