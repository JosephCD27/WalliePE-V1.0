<?php
    include("../../Model/CRUD_Conexion.php");

    if (isset($_GET['navbar'])) {
        header("location:../View/listarRol.php");
    }
    
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
        $parametros=null;
        //saca la info de dase de datos
        $datos=new classCRUD();
        $info=$datos->selectBD($tabla_nom,$parametros,$campoPK,$Rol_Cod);

        $Rol_Nombre=$info[0]["Rol_Nombre"];
        $Rol_Desc=$info[0]["Rol_Desc"];
        include('../View/editarRol.php');
    }
    //Direccion a eliminar
    if (isset($_GET['btn_eliminar'])) {
        $tabla_nom="rol";
        $Rol_Cod=$_GET['cod'];
        $campoPK=$_GET['campo'];
        $parametros=null;
        //saca la info de dase de datos
        $datos=new classCRUD();
        $info=$datos->selectBD($tabla_nom,$parametros,$campoPK,$Rol_Cod);

        $Rol_Nombre=$info[0]["Rol_Nombre"];
        
        include('../View/eliminarRol.php');
    }
    
    //Direccion a modificar permisos
    if (isset($_POST['btn_permisos'])) {
        $tabla = $_POST["tabla"];
        $rol_cod = $_POST["rol_cod"];

        $datos = new classCRUD();
        $modulos = $datos->selectBD('modulos', null, 'rol_cod', $rol_cod);
        $permisos = $datos->selectBD("permisos", null, null, null); // Obtener todos los permisos
        include('../View/modificarPermisos.php');
    }
    
    //---------------------LISTAR ROLES------------------------
    $tabla_nom="rol";

    if (isset($_POST['btn_buscar'])) {
        $campo=$_POST["opciones"];

        $campos_busqueda = explode(",",$campo);

        $condicion=$_POST["condicion"];

        $listar_roles=new classCRUD();
        $dato=$listar_roles->buscarBD($tabla_nom,null,$campos_busqueda,$condicion);

        if (empty($dato)) {
            $dato_vacio="si";
        }
        
        include "../View/selectRol.php";
    }else{
        $campo=$_POST["opciones"]??null;
        $condicion=$_POST["condicion"]??null;
        $parametros=null;

        $listar_roles=new classCRUD();
        $dato=$listar_roles->selectBD($tabla_nom,$parametros,$campo,$condicion);
        
    }

    // --------------------REGISTRAR ROLES----------------------
    if (isset($_GET['registrar'])) {
        // $Rol_Cod=$_POST['Rol_Cod'];
        $Rol_Nombre=$_POST['Rol_Nombre'];
        $Rol_Desc=$_POST['Rol_Desc'];
        $tabla_nom=$_POST['tabla_nom'];

        $campos=array(
            // 'Rol_Cod',
            'Rol_Nombre',
            'Rol_Desc',
            'Est_Cod'
        );
        $valores=array(
            // $Rol_Cod,
            $Rol_Nombre,
            $Rol_Desc,
            1
        );
        $consulta=new classCRUD();
        $consulta->insertBD($tabla_nom,$valores,$campos);
        // ----------generar registro de modulos para el nuvo rol--------------
        $nuevo_rol=$consulta->selectBD($tabla_nom,null,'Rol_Nombre',$Rol_Nombre);

        $campos = array('mod_nombre', 'rol_cod', 'permisos');
        $modulos = array('Usuarios', 'Bitacora', 'Roles', 'Elementos','Tipo de Elemento', 'Ambientes', 'Tipo de Documento', 'Permisos', 'Novedades');
        $rolCod = $nuevo_rol[0]['Rol_Cod'];
        
        foreach ($modulos as $modulo) {
            $valores = array($modulo, $rolCod, '');
            $consulta->insertBD('modulos', $valores, $campos);
        }

        echo "Registro creado Exitosamente";
    }
    // --------------------ACTUALIZAR ROLES----------------------

    if (isset($_GET['actualizar'])) {
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
    }

    // --------------------ELIMINAR ROLES----------------------

    if (isset($_GET['borrar'])) {
        $del_cod=$_POST['rol_delete'];
        $del_campo=$_POST['rol_campo'];

        $eliminar_rol=new classCRUD();
        $arreglo = array(
            'Est_Cod' => 2
        );
        $eliminar_rol->updateBD($tabla_nom,$del_campo,$del_cod,$arreglo);

        echo "<h6>Registro anulado con exito</h6>";

    }

// --------------------GUARDAR PERMISOS----------------------
if (isset($_POST['guardar_permisos'])) {
    $rol_cod = $_POST['rol_cod'];
    $modulos = $_POST['modulos']; // Array de módulos y permisos seleccionados

    $datos = new classCRUD();

    // Recorrer cada módulo y actualizar los permisos individualmente
    foreach ($modulos as $mod_cod => $mod_info) {
        // Verificar si hay permisos seleccionados para el módulo
        if (isset($mod_info['permisos_seleccionados'])) {
            // Convertir el array de permisos seleccionados a una cadena separada por comas
            $permisos_str = implode(',', $mod_info['permisos_seleccionados']);
        } else {
            // Si no hay permisos seleccionados, establecer la cadena de permisos como vacía
            $permisos_str = '';
        }

        $arreglo = array('permisos' => $permisos_str);
        // Actualizar los permisos para el módulo actual
        $datos->updateBD('modulos', 'mod_cod', $mod_cod, $arreglo);
    }

    header("Location: ../View/listarRol.php"); // Redirigir después de guardar
}


?>