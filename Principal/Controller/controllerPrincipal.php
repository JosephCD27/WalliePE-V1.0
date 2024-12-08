<?php
    session_start();
    include("../../Model/CRUD_Conexion.php");

    if (isset($_GET['navbar'])) {
        header("location:../../Principal/View/pantallaPrincipal.php");
        exit(); 
    }

    // Verificar si el botón 'cerrar' fue presionado
    if (isset($_POST['cerrar'])) {

        session_destroy();
        header("location:../../Login/View/Login.php");
        exit(); 
    }

    // Verificar si las variables de sesión están establecidas antes de usarlas
    if (isset($_SESSION['nombreUsuario']) && isset($_SESSION['apellidoUsuario'])) {
    
        header("location:../../Principal/View/pantallaPrincipal.php");
        exit(); 

    } else {
        // Redirigir al usuario si las variables de sesión no están establecidas
        header("location:../../Login/View/Login.php");
        exit(); 
    }

?>
