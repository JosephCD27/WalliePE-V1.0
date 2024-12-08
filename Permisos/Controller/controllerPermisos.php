<?php
include("../../Model/CRUD_Conexion.php");

if (isset($_GET['navbar'])) {
    header("location:../View/listarPermisos.php");
}

// -------------------------------CONTENIDO MODALES-------------------------------
// Dirección a crear
if (isset($_POST['btn_crear'])) {
    include('../View/crearPermiso.php');
}
// Dirección a editar
if (isset($_POST['btn_editar'])) {
    $tabla_nom = "permisos";
    $id_permiso = $_POST['id_permiso'];
    $campoPK = 'id_permiso';
    $parametros = null;
    // Obtener la información de la base de datos
    $datos = new classCRUD();
    $info = $datos->selectBD($tabla_nom, $parametros, $campoPK, $id_permiso);

    $per_nombre = $info[0]["per_nombre"];
    $per_descripcion = $info[0]["per_descripcion"];
    include('../View/editarPermiso.php');
}
// Dirección a eliminar
if (isset($_POST['btn_eliminar'])) {
    $tabla_nom = "permisos";
    $id_permiso = $_POST['id_permiso'];
    $campoPK = 'id_permiso';
    $parametros = null;
    // Obtener la información de la base de datos
    $datos = new classCRUD();
    $info = $datos->selectBD($tabla_nom, $parametros, $campoPK, $id_permiso);

    $per_nombre = $info[0]["per_nombre"];

    include('../View/eliminarPermiso.php');
}

//---------------------LISTAR PERMISOS------------------------
$tabla_nom = "permisos";

if (isset($_POST['btn_buscar'])) {
    $campo=$_POST["opciones"];

    $campos_busqueda = explode(",",$campo);

    $condicion=$_POST["condicion"];

    $listar_roles=new classCRUD();
    $dato=$listar_roles->buscarBD($tabla_nom,null,$campos_busqueda,$condicion);

    if (empty($dato)) {
        $dato_vacio="si";
    }
    
    include "../View/selectPermiso.php";
    
} else {
    $campo = $_POST["opciones"] ?? null;
    $condicion = $_POST["condicion"] ?? null;
    $parametros = null;

    $listar_permisos = new classCRUD();
    $dato = $listar_permisos->selectBD($tabla_nom, $parametros, $campo, $condicion);
}

// --------------------REGISTRAR PERMISOS----------------------
if (isset($_GET['registrar'])) {
    $per_nombre = $_POST['per_nombre'];
    $per_descripcion = $_POST['per_descripcion'];
    $tabla_nom = 'permisos';

    $campos = array(
        'per_nombre',
        'per_descripcion'
    );
    $valores = array(
        $per_nombre,
        $per_descripcion
    );
    $crear_permiso = new classCRUD();
    $crear_permiso->insertBD($tabla_nom, $valores, $campos);
    echo "permiso  registrado con exito";
}

// --------------------ACTUALIZAR PERMISOS----------------------

if (isset($_GET['actualizar'])) {
    $camp_pk = 'id_permiso';
    $upd_cod = $_POST['upd_cod'];
    $upd_nom = $_POST['upd_nom'];
    $upd_des = $_POST['upd_des'];

    $arreglo = array(
        'per_nombre' => $upd_nom,
        'per_descripcion' => $upd_des
    );

    $actualizar_permiso = new classCRUD();
    echo $actualizar_permiso->updateBD($tabla_nom, $camp_pk, $upd_cod, $arreglo);
}

// --------------------ELIMINAR PERMISOS----------------------

if (isset($_GET['borrar'])) {
    $del_cod = $_POST['permiso_delete'];
    $del_campo = 'id_permiso';

    $eliminar_permiso = new classCRUD();
    echo $eliminar_permiso->deleteBD($tabla_nom, $del_campo, $del_cod);
}
?>
