<?php
    include("../../Model/CRUD_Conexion.php");

    
    // -------------------------------CONTENIDO MODALES-------------------------------
    //Direccion a crear
    if (isset($_POST['btn_crear'])) {
        include('../View/crearRol.php');
    }
    //Direccion a editar
    if (isset($_GET['btn_editar'])) {
        $tabla_nom="rol";
        $Rol_Cod=$_GET['cod'];
        $campoPK=$_GET['campo'];
        //saca la info de dase de datos
        $datos=new classCRUD();
        $info=$datos->selectBD($tabla_nom,$campoPK,$Rol_Cod);

        $Rol_Nombre=$info[0]["Rol_Nombre"];
        $Rol_Desc=$info[0]["Rol_Desc"];
        include('../View/editarRol.php');
    }
    //Direccion a eliminar
    if (isset($_GET['btn_eliminar'])) {
        $tabla_nom="rol";
        $Rol_Cod=$_GET['cod'];
        $campoPK=$_GET['campo'];
        //saca la info de dase de datos
        $datos=new classCRUD();
        $info=$datos->selectBD($tabla_nom,$campoPK,$Rol_Cod);

        $Rol_Nombre=$info[0]["Rol_Nombre"];
        
        include('../View/eliminarRol.php');
    }
    
    //---------------------LISTAR ROLES------------------------
    $tabla_nom="rol";

    if (isset($_POST['btn_buscar'])) {
        $campo=$_POST["opciones"];
        $condicion=$_POST["condicion"];
        $listar_roles=new classCRUD();
        $dato=$listar_roles->selectBD($tabla_nom,$campo,$condicion);
        include "../View/selectRol.php";
    }else{
        $campo=$_POST["opciones"]??null;
        $condicion=$_POST["condicion"]??null;
        $listar_roles=new classCRUD();
        $dato=$listar_roles->selectBD($tabla_nom,$campo,$condicion);
        
    }

    // --------------------REGISTRAR ROLES----------------------
    if (isset($_POST['registrar'])) {
        $Rol_Cod=$_POST['Rol_Cod'];
        $Rol_Nombre=$_POST['Rol_Nombre'];
        $Rol_Desc=$_POST['Rol_Desc'];
        $tabla_nom=$_POST['tabla_nom'];

        $campos=array(
            'Rol_Cod',
            'Rol_Nombre',
            'Rol_Desc'
        );
        $valores=array(
            $Rol_Cod,
            $Rol_Nombre,
            $Rol_Desc
        );
        $crear_rol=new classCRUD();
        $crear_rol->insertBD($tabla_nom,$valores,$campos);

        ?>
        <!-- <script type="text/javascript">
            modalExitoso(); //
        </script> -->
        <?php

        header("location:../View/listarRol.php");
    }
    // --------------------ACTUALIZAR ROLES----------------------

    if (isset($_POST['actualizar'])) {
        $camp_pk=$_POST['camp_pk'];
        $upd_cod=$_POST['upd_cod'];
        $upd_nom=$_POST['upd_nom'];
        $upd_des=$_POST['upd_des'];

        $arreglo=array(
            'Rol_Nombre'=>$upd_nom,
            'Rol_Desc'=>$upd_des
        );

        $actualizar_rol=new classCRUD();
        echo $actualizar_rol->updateBD($tabla_nom,$camp_pk, $upd_cod,$arreglo);

        header("location:../View/listarRol.php");
    }

    // --------------------ELIMINAR ROLES----------------------

    if (isset($_POST['borrar'])) {
        $del_cod=$_POST['rol_delete'];
        $del_campo=$_POST['rol_campo'];
        $eliminar_rol=new classCRUD();
        $eliminar_rol->deleteBD($tabla_nom,$del_campo,$del_cod);

        header("location:../View/listarRol.php");
    }

?>