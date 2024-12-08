<?php
    include("../../Model/CRUD_Conexion.php");

    $tabla_nom = "usuario";

    if (isset($_GET['consultar'])) {
        $campoPK = $_POST['campo_doc'];
        $Usu_Id = $_POST['documento'];
        $password = $_POST['password'];
        $parametros = null;

        $login = new classCRUD();
        $info = $login->selectBD($tabla_nom, $parametros, $campoPK, $Usu_Id);
        

        // Código para procesar la autenticación
        $usuarioEsValido = ($password == $info[0]['Usu_Clave']);
        
        if ($usuarioEsValido) {
            session_start();
            // Asignar valores a las variables de sesión
            $_SESSION['cod_usu']=$info[0]['Usu_Id'];
            $_SESSION['nombreUsuario'] = $info[0]['Usu_Nombre']; // captura el nombre del usuario
            $_SESSION['apellidoUsuario'] = $info[0]['Usu_Apellido']; // captura apellido del usuario
            $r=$login->selectBD('rol',null,'Rol_Cod',$info[0]['Rol_Cod']);
            $_SESSION['rol'] = $r[0]['Rol_Nombre']; //Guarda el Nombre del rol asignado al usuario

            $permisos = $login->selectBD('modulos', null, 'rol_cod', $info[0]['Rol_Cod']);
            $_SESSION['permisos'] = $permisos;

            // Devolver al AJAX 'true' y el nombre y apellido del usuario
            echo "true," . $_SESSION['nombreUsuario'] . "," . $_SESSION['apellidoUsuario'];
        } else {
            // Devolver al AJAX 'false'
            echo 'false';
        }
    }
?>