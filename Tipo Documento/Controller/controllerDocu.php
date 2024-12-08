<?php
    include("../../Model/CRUD_Conexion.php");

    if (isset($_GET['navbar'])) {
        header("location:../View/listarDocu.php");
    }
    
    // -------------------------------CONTENIDO MODALES-------------------------------
    //Direccion a crear
    if (isset($_POST['btn_crear'])) {
        include('../View/crearDocu.php');
    }
    //Direccion a editar
    if (isset($_GET['btn_editar'])) {
        $tabla_nom="Tipo_Documento";
        $Docu_Cod=$_GET['cod'];
        $campoPK=$_GET['campo'];
        $parametros=null;
        //saca la info de dase de datos
        $datos=new classCRUD();
        $info=$datos->selectBD($tabla_nom,$parametros,$campoPK,$Docu_Cod);

        $Docu_Nom=$info[0]["Docu_Nom"];
        $Docu_des=$info[0]["Docu_des"];
        include('../View/editarDocu.php');
    }
    //Direccion a eliminar
    if (isset($_GET['btn_eliminar'])) {
        $tabla_nom="Tipo_Documento";
        $Docu_Cod=$_GET['cod'];
        $campoPK=$_GET['campo'];
        $parametros=null;
        //saca la info de dase de datos
        $datos=new classCRUD();
        $info=$datos->selectBD($tabla_nom,$parametros,$campoPK,$Docu_Cod);

        $Docu_Nom=$info[0]["Docu_Nom"];
        
        include('../View/eliminarDocu.php');
    }
    //---------------------LISTAR DocuES------------------------
    $tabla_nom="Tipo_Documento";

    if (isset($_POST['btn_buscar'])) {
        $campo=$_POST["opciones"];

        $campos_busqueda = explode(",",$campo);

        $condicion=$_POST["condicion"];

        $listar_roles=new classCRUD();
        $dato=$listar_roles->buscarBD($tabla_nom,null,$campos_busqueda,$condicion);

        if (empty($dato)) {
            $dato_vacio="si";
        }
        
        include "../View/selectDocu.php";
    }else{
        $campo=$_POST["opciones"]??null;
        $condicion=$_POST["condicion"]??null;
        $parametros=null;
        $listar_Docues=new classCRUD();
        $dato=$listar_Docues->selectBD($tabla_nom,$parametros,$campo,$condicion);
        
    }

    // --------------------REGISTRAR DocuES----------------------
    if (isset($_GET['registrar'])) {
        // $Docu_Cod=$_POST['Docu_Cod'];
        $Docu_Nom=$_POST['Docu_Nom'];
        $Docu_des=$_POST['Docu_Desc'];
        $tabla_nom=$_POST['tabla_nom'];

        $campos=array(
            // 'Docu_Cod',
            'Docu_Nom',
            'Docu_des'
        );
        $valores=array(
            // $Docu_Cod,
            $Docu_Nom,
            $Docu_des
        );
        $crear_Docu=new classCRUD();
        $crear_Docu->insertBD($tabla_nom,$valores,$campos);

        echo "Registro creado Exitosamente";
    }
    // --------------------ACTUALIZAR DocuES----------------------

    if (isset($_GET['actualizar'])) {
        $camp_pk=$_POST['camp_pk'];
        $upd_cod=$_POST['upd_cod'];
        $upd_nom=$_POST['upd_nom'];
        $upd_des=$_POST['upd_des'];

        $arreglo=array(
            'Docu_Nom'=>$upd_nom,
            'Docu_des'=>$upd_des
        );

        $actualizar_Docu=new classCRUD();
        echo $actualizar_Docu->updateBD($tabla_nom,$camp_pk, $upd_cod,$arreglo);
    }

    // --------------------ELIMINAR DocuES----------------------

    if (isset($_GET['borrar'])) {
        $del_cod=$_POST['Docu_delete'];
        $del_campo=$_POST['Docu_campo'];

        $eliminar_Docu=new classCRUD();
        echo $eliminar_Docu->deleteBD($tabla_nom,$del_campo,$del_cod);
    }

?>