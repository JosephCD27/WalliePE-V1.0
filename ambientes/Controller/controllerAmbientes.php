<?php
    include("../../Model/CRUD_Conexion.php");

    if (isset($_GET['navbar'])) {
        header("location:../View/listarAmbientes.php");
    }

    // -------------------------------CONTENIDO MODALES-------------------------------
    //Direccion a crear
    if (isset($_POST['btn_crear'])) {
        include('../View/crearAmbientes.php');
    }
    //Direccion a detalle
    if (isset($_GET['btn_detalle'])) {
        include("../Logic/modalDetalles.php");
    }
    //Direccion a editar
    if (isset($_GET['btn_editar'])) {
        $tabla_nom="ambientes";
        $Amb_Cod=$_GET['cod'];
        $campoPK=$_GET['campo'];
        $parametros=null;
        //saca la info de dase de datos
        $datos=new classCRUD();
        $info=$datos->selectBD($tabla_nom,$parametros,$campoPK,$Amb_Cod);

        $Ambiente_Ref=$info[0]["Amb_Ref"];
        $Ambiente_Desc=$info[0]["Amb_Desc"];
        include('../View/editarAmbientes.php');
    }
    //Direccion a eliminar
    if (isset($_GET['btn_eliminar'])) {
        $tabla_nom="ambientes";
        $Amb_Cod=$_GET['cod'];
        $campoPK=$_GET['campo'];
        $parametros=null;
        //saca la info de dase de datos
        $datos=new classCRUD();
        $info=$datos->selectBD($tabla_nom,$parametros,$campoPK,$Amb_Cod);

        $Ambiente_Ref=$info[0]["Amb_Ref"];
        
        include('../View/eliminarAmbientes.php');
    }
    //---------------------LISTAR ROLES------------------------
    $tabla_nom="ambientes";

    if (isset($_POST['btn_buscar'])) {
        $campo=$_POST["opciones"];

        $campos_busqueda = explode(",",$campo);

        $condicion=$_POST["condicion"];

        $listar_roles=new classCRUD();
        $dato=$listar_roles->buscarBD($tabla_nom,null,$campos_busqueda,$condicion);

        if (empty($dato)) {
            $dato_vacio="si";
        }
        
        include "../View/selectAmbientes.php";
    }else{
        $campo=$_POST["opciones"]??null;
        $condicion=$_POST["condicion"]??null;
        $parametros=null;
        $listar_ambiente=new classCRUD();
        $dato=$listar_ambiente->selectBD($tabla_nom,$parametros,$campo,$condicion);
        
    }

    // --------------------REGISTRAR ROLES----------------------
    if (isset($_GET['registrar'])) {
        // $Amb_Cod=$_POST['Amb_Cod'];
        $Amb_Ref=$_POST['Amb_Ref'];
        $Amb_Desc=$_POST['Amb_Desc'];
        $tabla_nom=$_POST['tabla_nom'];

        $campos=array(
            // 'Amb_Cod',
            'Amb_Ref',
            'Amb_Desc'
        );
        $valores=array(
            // $Amb_Cod,
            $Amb_Ref,
            $Amb_Desc
        );
        $crear_ambiente=new classCRUD();
        $crear_ambiente->insertBD($tabla_nom,$valores,$campos);

        echo "Registro creado Exitosamente";
    }
    // --------------------ACTUALIZAR ROLES----------------------

    if (isset($_GET['actualizar'])) {
        $camp_pk=$_POST['camp_pk'];
        $upd_cod=$_POST['upd_cod'];
        $upd_nom=$_POST['upd_nom'];
        $upd_des=$_POST['upd_des'];

        $arreglo=array(
            'Amb_Ref'=>$upd_nom,
            'Amb_Desc'=>$upd_des
        );

        $actualizar_ambiente=new classCRUD();
        echo $actualizar_ambiente->updateBD($tabla_nom,$camp_pk, $upd_cod,$arreglo);
    }

    // --------------------ELIMINAR ROLES----------------------

    if (isset($_GET['borrar'])) {
        $del_cod=$_POST['Amb_delete'];
        $del_campo=$_POST['Amb_campo'];

        $eliminar_ambiente=new classCRUD();
        echo $eliminar_ambiente->deleteBD($tabla_nom,$del_campo,$del_cod);
    }

?>