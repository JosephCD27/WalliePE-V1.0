<?php
    include("../../Model/CRUD_Conexion.php");
    
    $tabla_nom="Usuario";

    if (isset($_GET['navbar'])) {
        header("location:../View/listarUsuario.php");
    }
    
    // -------------------------------CONTENIDO MODAL USUARIO-------------------------------
    //Direccion a crear
    if (isset($_POST['btn_crear'])) {
        include('../View/crearUsuario.php');
    }
    //Direccion a detalle
    if (isset($_GET['btn_detalle'])) {
        include("../Logic/modalDetalle.php");
    }
    //Direccion a editar
    if (isset($_GET['btn_editar'])) {
        include("../Logic/modalEditar.php");
    }
    //Direccion a eliminar
    if (isset($_GET['btn_eliminar'])) {
        $Usu_Id=$_GET['Usu_Id'];
        $campoPK=$_GET['campo'];
        $parametros=null;
        //saca la info de dase de datos
        $datos=new classCRUD();
        $info=$datos->selectBD($tabla_nom,$parametros,$campoPK,$Usu_Id);

        $Usu_Nombre=$info[0]["Usu_Nombre"];
        
        include('../View/eliminarUsuario.php');
    }
    //---------------------LISTAR Usuario------------------------

    if (isset($_POST['btn_buscar'])) {
        $campo=$_POST["opciones"];

        $campos_busqueda = explode(",",$campo);

        $condicion=$_POST["condicion"];

        $listar_roles=new classCRUD();
        $dato=$listar_roles->buscarBD($tabla_nom,null,$campos_busqueda,$condicion);

        if (empty($dato)) {
            $dato_vacio="si";
        }
        

        include "../View/selectUsuario.php";
    }else{
        $campo = $_POST["opciones"]??null;
        $condicion = $_POST["condicion"]??null;
        $parametros=null;
        $listar_Usuarios = new classCRUD();
        $dato = $listar_Usuarios->selectBD($tabla_nom,$parametros,$campo,$condicion);
    }

    // --------------------REGISTRAR Usuario----------------------
    if (isset($_GET['registrar'])) {
        $Usu_Id         =   $_POST['Usu_Id'];
        $Usu_Nombre     =   $_POST['Usu_Nombre'];
        $Usu_Apellido   =   $_POST['Usu_Apellido'];
        $Usu_Correo     =   $_POST['Usu_Correo'];
        $Usu_Telefono   =   $_POST['Usu_Telefono'];
        $Usu_Clave      =   $_POST['Usu_Clave'];
        $Rol_Cod        =   $_POST['Rol_Cod'];
        $Docu_Cod       =   $_POST['Docu_Cod'];
        $tabla_nom      =   $_POST['tabla_nom'];

        $campos=array(
            'Usu_Id',
            'Usu_Nombre',
            'Usu_Apellido',
            'Usu_Correo',
            'Usu_Telefono',
            'Usu_Clave',
            'Rol_Cod',
            'Docu_Cod',
            'Est_Cod'
            
        );
        $valores=array(
            $Usu_Id,
            $Usu_Nombre,
            $Usu_Apellido,
            $Usu_Correo,
            $Usu_Telefono,
            $Usu_Clave,
            $Rol_Cod,
            $Docu_Cod,
            1
        );
        $crear_Usu=new classCRUD();
        $crear_Usu->insertBD($tabla_nom,$valores,$campos);

        echo "Registro creado Exitosamente";
    }
    // --------------------ACTUALIZAR Usuario----------------------

    if (isset($_GET['actualizar'])) {
        $camp_pk=$_POST['camp_pk'];
        $upd_id=$_POST['upd_id'];

        $upd_nom=$_POST['upd_nom'];
        $upd_ape=$_POST['upd_ape'];
        $upd_cor=$_POST['upd_cor'];
        $upd_tel=$_POST['upd_tel'];
        $upd_con=$_POST['upd_con'];
        $upd_tdoc=$_POST['upd_tdoc'];
        $upd_rol=$_POST['upd_rol'];

        $arreglo=array(
            'Usu_Nombre'    =>$upd_nom,
            'Usu_Apellido'  =>$upd_ape,
            'Usu_Correo'    =>$upd_cor,
            'Usu_Telefono'  =>$upd_tel,
            'Usu_Clave'     =>$upd_con,
            'Rol_Cod'       =>$upd_rol,
            'Docu_Cod'      =>$upd_tdoc
        );

        $actualizar_Usuarios=new classCRUD();
        echo $actualizar_Usuarios->updateBD($tabla_nom,$camp_pk,$upd_id,$arreglo);
    }

    // --------------------ELIMINAR Usuario----------------------

    if (isset($_GET['borrar'])) {
        $Usu_Id=$_POST['Usu_delete'];
        $del_campo=$_POST['Usu_campo'];

        $eliminar_Usu=new classCRUD();

        $arreglo = array(
            'Est_Cod'=>2
        );

        $eliminar_Usu->updateBD($tabla_nom,$del_campo,$Usu_Id,$arreglo);
        echo "Usuario desactivado con exito";
    }

?>