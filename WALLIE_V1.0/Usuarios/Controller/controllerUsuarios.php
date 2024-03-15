<?php
    include("../../Model/CRUD_Conexion.php");
    
    $tabla_nom="Usuario";
    
    // -------------------------------CONTENIDO MODAL USUARIO-------------------------------
    //Direccion a crear
    if (isset($_POST['btn_crear'])) {
        include('../View/crearUsuario.php');
    }
    //Direccion a editar
    if (isset($_GET['btn_editar'])) {
        $Usu_Id=$_GET['Usu_Id'];
        $campoPK=$_GET['campo'];
        //saca la info de dase de datos
        $datos=new classCRUD();
        $info=$datos->selectBD($tabla_nom,$campoPK,$Usu_Id);

        $Usu_Nombre=$info[0]["Usu_Nombre"];
        $Usu_Apellido=$info[0]["Usu_Apellido"];
        $Usu_Correo=$info[0]["Usu_Correo"];
        $Usu_Telefono=$info[0]["Usu_Telefono"];
        $Usu_Contraseña=$info[0]["Usu_Contraseña"];
        
        include('../View/editarUsuario.php');
    }
    //Direccion a eliminar
    if (isset($_GET['btn_eliminar'])) {
        $Usu_Id=$_GET['Usu_Id'];
        $campoPK=$_GET['campo'];
        //saca la info de dase de datos
        $datos=new classCRUD();
        $info=$datos->selectBD($tabla_nom,$campoPK,$Usu_Id);

        $Usu_Nombre=$info[0]["Usu_Nombre"];
        
        include('../View/eliminarUsuario.php');
    }
    //---------------------LISTAR Usuario------------------------

    if (isset($_POST['btn_buscar'])) {
        $campo = $_POST["opciones"];
        $condicion = $_POST["condicion"];
        $listar_Usuarios = new classCRUD();
        $dato=$listar_Usuarios->selectBD($tabla_nom,$campo,$condicion);
        include "../View/selectUsuario.php";
    }else{
        $campo = $_POST["opciones"]??null;
        $condicion = $_POST["condicion"]??null;
        $listar_Usuarios = new classCRUD();
        $dato = $listar_Usuarios->selectBD($tabla_nom,$campo,$condicion);
    }

    // --------------------REGISTRAR Usuario----------------------
    if (isset($_POST['registrar'])) {
        $Usu_Id         =   $_POST['Usu_Id'];
        $Usu_Nombre     =   $_POST['Usu_Nombre'];
        $Usu_Apellido   =   $_POST['Usu_Apellido'];
        $Usu_Correo     =   $_POST['Usu_Correo'];
        $Usu_Telefono   =   $_POST['Usu_Telefono'];
        $Usu_Contraseña =   $_POST['Usu_Contraseña'];
        $tabla_nom      =   $_POST['tabla_nom'];

        $campos=array(
            'Usu_Id',
            'Usu_Nombre',
            'Usu_Apellido',
            'Usu_Correo',
            'Usu_Telefono',
            'Usu_Contraseña'
        );
        $valores=array(
            $Usu_Id,
            $Usu_Nombre,
            $Usu_Apellido,
            $Usu_Correo,
            $Usu_Telefono,
            $Usu_Contraseña
        );
        $crear_Usu=new classCRUD();
        $crear_Usu->insertBD($tabla_nom,$valores,$campos);

        header("location:../View/listarUsuario.php");
    }
    // --------------------ACTUALIZAR Usuario----------------------

    if (isset($_POST['actualizar'])) {
        $camp_pk=$_POST['camp_pk'];
        $upd_id=$_POST['upd_id'];
        $upd_nom=$_POST['upd_nom'];
        $upd_ape=$_POST['upd_ape'];
        $upd_cor=$_POST['upd_cor'];
        $upd_tel=$_POST['upd_tel'];
        $upd_con=$_POST['upd_con'];

        $arreglo=array(
            'Usu_Nombre'    =>$upd_nom,
            'Usu_Apellido'  =>$upd_ape,
            'Usu_Correo'    =>$upd_cor,
            'Usu_Telefono'  =>$upd_tel,
            'Usu_Contraseña'=>$upd_con
        );

        $actualizar_Usuarios=new classCRUD();
        echo $actualizar_Usuarios->updateBD($tabla_nom,$camp_pk,$upd_id,$arreglo);
        
        header("location:../View/listarUsuario.php");
    }

    // --------------------ELIMINAR Usuario----------------------

    if (isset($_POST['borrar'])) {
        $Usu_Id=$_POST['Usu_delete'];
        $del_campo=$_POST['Usu_campo'];
        $eliminar_Usu=new classCRUD();
        $eliminar_Usu->deleteBD($tabla_nom,$del_campo,$Usu_Id);

        header("location:../View/listarUsuario.php");
    }

?>