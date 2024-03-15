<?php
    include("../../Model/CRUD_Conexion.php");

    $tabla_nom = "usuario";

    if (isset($_GET['consultar'])) {
        $campoPK = $_POST['campo_doc'];
        $Usu_Id = $_POST['documento'];
        $password = $_POST['password'];

        $login = new classCRUD();
        $info = $login->selectBD($tabla_nom, $campoPK, $Usu_Id);

        // Código para procesar la autenticación
        $usuarioEsValido = ($password == $info[0]['Usu_Contraseña']);
        $nombreUsuario = $info[0]['Usu_Nombre']; // Asumiendo que 'Usu_Nombre' es la columna con el nombre del usuario
        $apellidoUsuario = $info[0]['Usu_Apellido']; // Asumiendo que 'Usu_Nombre' es la columna con el nombre del usuario

        // Devolver 'true' o 'false' y el nombre del usuario como texto plano
        echo $usuarioEsValido ? "true,$nombreUsuario,$apellidoUsuario" : 'false';
    }

    // if (isset($_GET['consultar'])) {
    //     $nombre=$_POST['nombre'];
    //     $password=$_POST['password'];

    //     // header("location:../../principal/pantallaPrincipal.php");
    //     $login=new classCRUD();
    //     $info=$login->selectBD($tabla_nom,$campoPK,$rol_cod);

    //     var_dump($info);
    //     // ... código para procesar la autenticación ...

    //     $usuarioEsValido = true; // o false, según la validación
    //     $usuarioId = 123; // El ID del usuario

    //     // Suponiendo que has validado al usuario
    //     if($usuarioEsValido) {
    //         echo "usuarioEsValido:true,usuarioId:$usuarioId";
    //     } else {
    //         echo "usuarioEsValido:false";
    //     }

    // }
?>