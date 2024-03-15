<?php
    include("../../Model/CRUD_Conexion.php");

    
    // -------------------------------CONTENIDO MODALES-------------------------------
    //Direccion a crear
    if (isset($_POST['btn_crear'])) {
        include('../View/crearTipoElementos.php');
    }
    //Direccion a editar
    if (isset($_GET['btn_editar'])) {
        $tabla_nom="tipo_elemento";
        $Tipo_Cod=$_GET['cod'];
        $campoPK=$_GET['campo'];
        //saca la info de dase de datos
        $datos=new classCRUD();
        $info=$datos->selectBD($tabla_nom,$campoPK,$Tipo_Cod);

        $tipoElementos_Nombre=$info[0]["Tipo_Nombre"];
        $tipoElementos_Desc=$info[0]["Tipo_Desc"];
        include('../View/editarTipoElementos.php');
    }
    //Direccion a eliminar
    if (isset($_GET['btn_eliminar'])) {
        $tabla_nom="tipo_elemento";
        $Tipo_Cod=$_GET['cod'];
        $campoPK=$_GET['campo'];
        //saca la info de dase de datos
        $datos=new classCRUD();
        $info=$datos->selectBD($tabla_nom,$campoPK,$Tipo_Cod);

        $Tipo_Nombre=$info[0]["Tipo_Nombre"];
        
        include('../View/eliminarTipoElementos.php');
    }
    //---------------------LISTAR ROLES------------------------
    $tabla_nom="tipo_elemento";

    if (isset($_POST['btn_buscar'])) {
        $campo=$_POST["opciones"];
        $condicion=$_POST["condicion"];
        $listar_tipoElementos=new classCRUD();
        $dato=$listar_tipoElementos->selectBD($tabla_nom,$campo,$condicion);
        include "../View/selectTipoElementos.php";
    }else{
        $campo=$_POST["opciones"]??null;
        $condicion=$_POST["condicion"]??null;
        $listar_tipoElementos=new classCRUD();
        $dato=$listar_tipoElementos->selectBD($tabla_nom,$campo,$condicion);
        
    }

    // --------------------REGISTRAR ROLES----------------------
    if (isset($_POST['registrar'])) {
        $Tipo_Cod=$_POST['Tipo_Cod'];
        $Tipo_Nombre=$_POST['Tipo_Nombre'];
        $Tipo_Desc=$_POST['Tipo_Desc'];
        $tabla_nom=$_POST['tabla_nom'];

        $campos=array(
            'Tipo_Cod',
            'Tipo_Nombre',
            'Tipo_Desc'
        );
        $valores=array(
            $Tipo_Cod,
            $Tipo_Nombre,
            $Tipo_Desc
        );
        $crear_tipoElementos=new classCRUD();
        $crear_tipoElementos->insertBD($tabla_nom,$valores,$campos);

        header("location:../View/listarTipoElementos.php");
    }
    // --------------------ACTUALIZAR ROLES----------------------

    if (isset($_POST['actualizar'])) {
        $camp_pk=$_POST['camp_pk'];
        $upd_cod=$_POST['upd_cod'];
        $upd_nom=$_POST['upd_nom'];
        $upd_des=$_POST['upd_des'];

        $arreglo=array(
            'Tipo_Nombre'=>$upd_nom,
            'Tipo_Desc'=>$upd_des
        );

        $actualizar_tipoElementos=new classCRUD();
        echo $actualizar_tipoElementos->updateBD($tabla_nom,$camp_pk, $upd_cod,$arreglo);

        header("location:../View/listarTipoElementos.php");
    }

    // --------------------ELIMINAR ROLES----------------------

    if (isset($_POST['borrar'])) {
        $del_cod=$_POST['Tipo_delete'];
        $del_campo=$_POST['Tipo_campo'];
        $eliminar_tipoElementos=new classCRUD();
        $eliminar_tipoElementos->deleteBD($tabla_nom,$del_campo,$del_cod);

        header("location:../View/listarTipoElementos.php");
    }

?>