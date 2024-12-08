<?php
    include("../../Model/CRUD_Conexion.php");
    $tabla_nom="elementos";

    if (isset($_GET['navbar'])) {
        header("location:../View/listarElementos.php");
    }
    // ----------------------------------ABRIR MODAL ELEMENTO-----------------------------------

    //Direccion a crear
    if (isset($_POST['btn_crear'])) {
        include("../Logic/modalCrear.php");

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
        include("../Logic/modalEliminar.php");
    }

    // -------------------------------COSULTAS A LA BASE DE DATOS------------------------------

    //---------------------LISTAR ELEMENTO-----------------------
    include("../Logic/logicaListar.php");

    // ------------------REGISTRAR ELEMENTO----------------------
    if (isset($_GET['registrar'])) {
        include("../Logic/logicaCrear.php");
    }
    
    // --------------------ACTUALIZAR ELEMENTO----------------------
    if (isset($_GET['actualizar'])) {
        include("../Logic/logicaEditar.php");
    }

    // --------------------ELIMINAR ELEMENTO----------------------

    if (isset($_GET['borrar'])) {
        include("../Logic/logicaEliminar.php");
    }

?>