<?php
    // ---Cargar datos de la novedad general--
    $tabla_nom = "novedad";
    $campo = "Nov_Cod";
    $cod_nov=$_GET["codigo"];
    $listar_Novedades = new classCRUD();
    $datos_nov = $listar_Novedades->selectBD($tabla_nom,null,$campo,$cod_nov);
    $nov_fecha=$datos_nov[0]['Nov_Hora'];
    $nov_usu=$datos_nov[0]['Usu_Id'];
    $nov_cod=$datos_nov[0]['Nov_Cod'];
    //---Cargando nombre del usuario----
    $tabla_nom = "usuario";
    $campo = "Usu_Id";
    $datos = $listar_Novedades->selectBD($tabla_nom,null,$campo,$nov_usu);
    $usu_nom=$datos[0]['Usu_Nombre']." ".$datos[0]['Usu_Apellido'];
    // ---Cargar el nombre del ambiente seleccionado--
    $tabla_nom = "ambientes";
    $campo = "Amb_Cod";
    $cod_amb = $_GET["ambiente"];
    $datos = $listar_Novedades->selectBD($tabla_nom,null,$campo,$cod_amb);
    $amb_nom=$datos[0]['Amb_Ref'];
    // ----------------------cargar elementos asociados a la novedad--------------------------------------------------------
    $tabla_nom = "novedad_elemento";
    $cod_nov=$_GET["codigo"];
    $campo="Nov_Cod";
    $elementos = $listar_Novedades->selectBD($tabla_nom,null,$campo,$cod_nov);
    
    // ----------------select para seleccionar el tipo de Novedad------------------------------------------------
    $opciones_TN="";
    $tabla_nom = "tipo_novedad";
    $campo = $_GET["opciones"]??null;
    $condicion = $_GET["condicion"]??null;
    $parametros=null;
    $datos = $listar_Novedades->selectBD($tabla_nom,$parametros,$campo,$condicion);
    include ("../View/atenderNovedad.php");
?>