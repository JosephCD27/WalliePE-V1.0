<?php
    session_start();
    $modulos = $_SESSION['permisos'];

    function tienePermisoModulo($permiso) {
        global $modulos;
        if ($modulos) {
            foreach ($modulos as $valores) {
                $permisos = explode(',', $valores['permisos']);

                if (in_array($permiso, $permisos)) {
                    return true;
                }
            }
        }
        return false;
    }

    $modulosInterfaz = [
        [
            "link" => '../../Usuarios/View/listarUsuario.php', 
            "icono" => "<i class='fa-solid fa-user fa-xl'></i>", 
            "nombreModulo" => "Usuario",
            "CodigoModulo" => tienePermisoModulo(1)
        ],
        [
            "link" => '../../Permisos/View/listarPermisos.php', 
            "icono" => "<i class='fa-solid fa-lock fa-xl'></i>", 
            "nombreModulo" => "Permisos",
            "CodigoModulo" => tienePermisoModulo(3)
        ],
        [
            "link" => '../../Bitacora/View/listarAmbientes.php', 
            "icono" => "<i class='fa-solid fa-book fa-xl'></i>", 
            "nombreModulo" => "Bitacora",
            "CodigoModulo" => tienePermisoModulo(6)
        ],
        [
            "link" => '../../Novedades/View/listarNovedad.php', 
            "icono" => "<i class='fa-solid fa-circle-exclamation fa-xl'></i>", 
            "nombreModulo" => "Novedades",
            "CodigoModulo" => tienePermisoModulo(9)
        ],
        [
            "link" => '../../ambientes/View/listarAmbientes.php', 
            "icono" => "<i class='fa-solid fa-school fa-xl'></i>", 
            "nombreModulo" => "Ambientes",
            "CodigoModulo" => tienePermisoModulo(4)
        ],
        [
            "link" => '../../Elementos/View/listarElementos.php', 
            "icono" => "<i class='fa-solid fa-laptop fa-xl'></i>", 
            "nombreModulo" => "Elementos",
            "CodigoModulo" => tienePermisoModulo(5)
        ],
        [
            "link" => '../../Rol/View/listarRol.php', "icono" => 
            "<i class='fa-solid fa-people-group fa-xl'></i>", 
            "nombreModulo" => "Roles",
            "CodigoModulo" => tienePermisoModulo(2)
        ],
        [
            "link" => '../../Tipo Documento/View/listarDocu.php', 
            "icono" => "<i class='fa-solid fa-id-card fa-xl'></i>", 
            "nombreModulo" => "Tipo de documento",
            "CodigoModulo" => tienePermisoModulo(8)
        ],
        [
            "link" => '../../TipoElementos/View/listarTipoElementos.php',
            "icono" => "<i class='fa-regular fa-newspaper fa-xl'></i>", 
            "nombreModulo" => "Tipo elemento",
            "CodigoModulo" => tienePermisoModulo(7)
        ]
    ];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicia sesion</title>
    <link type="text/css" rel="stylesheet" href="../../MATERIALIZE/css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/fontawesome.min.css" integrity="sha512-xXkCeYSSuCWpUAhDUIWJdCI9xm0uzrOVuONuGIx7NTRHwTFSCDS3WwNqlSEeNDK2TJggwgsfdDUpb05c7XK2yA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../CSS_N/generalListar.css">        
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

        body {
            background-image:   linear-gradient(60deg, #5745C4 0%, #5745C4 20%, transparent 20%, transparent 80%, transparent 100%),
                                linear-gradient(120deg, #9381FF 0%, #9381FF 15%, transparent 15%, transparent 80%, transparent 100%);
            background-size: 100% 100%;
            background-repeat: no-repeat;
            height: 100vh;
            margin: 0;
            font-family: "Roboto", sans-serif;
            font-weight: 500;
            font-style: normal;
            color: #401d6b;
            overflow: hidden;
            position: relative; 
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center; /* Centrar verticalmente */
            min-height: 100vh; /* Altura mínima para ocupar toda la pantalla */
        }


        /*TARJETAS*/
        .elemento {
            margin-bottom: 10px;
            height: 85px;
            border-radius: 10px;
            border: 2px solid #E9D5FF !important;
            background-color: #FAF9FF !important;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            transform: scale(0.97);
            transition: transform 0.2s; /* Agregar transición para la propiedad transform */
        }
        .elemento:hover {
            border: 2px solid #EAE8F5 !important;
            background-color: #EAE8F5 !important;
            transform: scale(0.90); /* Reducir ligeramente el tamaño al hacer hover */
            cursor: pointer; /* Cambiar cursor al pasar el mouse */
        }
        .elemento i {
            margin-bottom: 10px;
            color: #401d6b;
        }

        /*IMAGEN LOGO */
        .logoWallie {
            position: Fixed;
            width: 100px;
            height: 50px;
            bottom: 0; /* Lo coloca en la parte inferior */
            right: 0; /* Lo coloca en la parte derecha */
            

        }
        .logoSena {
            position: Fixed;
            width: 80px;
            height: 80px;
            bottom: 0; /* Lo coloca en la parte inferior */
            left: 0; /* Lo coloca en la parte derecha */
        }


        /*ANIMACION USUARIO LOGUEADO */
        .tarjUsuarioLogueado {
            position: absolute;
            left: 50%;
            transform: translate(-50%);
            text-align: center;
            width: 25%;
            border: 2px solid #5745C4;
            border-end-end-radius: 10px;
            border-end-start-radius: 10px;
            background-color:#5745C4;
            animation: gradientAnimation 10s infinite alternate; /* Animamos el fondo */
            color: #ffff;
            font-weight: bolder;
        }

        @keyframes gradientAnimation {
        0% {
            background-position: 0% 0%;
        }
        100% {
            background-position: 100% 100%;
        }
        }

        .cerrarSesion{
            position: absolute;
            background-color: #ffff;
            margin-left: 10px;
            margin-top: 10px;
        }
        .cerrarSesion input{
            border: none;
            background-color: transparent;
            color: #401d6b;
            font-weight: bolder;
        }
        .cerrarSesion:hover, .cerrarSesion input:hover{
            background-color:#401d6b;
            color: #ffff;
        }
    </style>
</head>
<body>
    <div class="content-container">
        <div class="tarjUsuarioLogueado">
            <h6>BIENVENID@ <?php echo $_SESSION['nombreUsuario']." ".$_SESSION['apellidoUsuario']. " [". $_SESSION['rol']."]";?></h6>
        </div>
        <div id="particles-js"></div> <!-- le da el estilo de las particulas al fondo-->
        <form class='cerrarSesion btn' action='../../Login/View/Login.php' method='post'>
            <input type='submit' value='Cerrar Sesión'>
        </form>
        <div class="container">
            <div class="">
                <img src="../../IMG/logoLetras.png"  alt="" class="logoWallie">
                <div class="row center centered">
                    <?php
                    // Recorrer el arreglo de modulos y mostrar nombre modulo e icono 
                    foreach ($modulosInterfaz as $moduloI) {
                        if ($moduloI["CodigoModulo"]) :
                        ?>
                        <div class="col s3 elemento" onclick="location.href='<?php echo $moduloI['link']?>'">
                            <?php
                            echo $moduloI["icono"] . "\n" . $moduloI["nombreModulo"];
                            ?>
                        </div>
                        <?php
                        endif;
                    }
                    ?>
                </div>
                <img src="../../IMG/logoSenaBlanco.png" alt="" class="logoSena">
            </div>
        </div>
     </div>
                    
    <script src="../../JS/scriptRoles.js"></script>
    <!-- JQUERY SCRIPT-->
    <script type="text/javascript" src="../../JS/jquery-3.7.1.js"></script>
    <!-- DATATABLES SCRIPT -->
    </script>
    <!-- PARTICLES.JS-MASTER SCRIPT-->
    <script src="../../particles.js-master/demo/js/lib/particles.js"></script>
    <script src="../../particles.js-master/demo/js/lib/app.js"></script>
    <script src="../../particles.js-master/demo/js/lib/stats.js"></script>
    <!--INICIO MATERIALIZE SCRIPT-->    
    <script type="text/javascript" src="../../MATERIALIZE/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../JS/scriptMaterialize.js"></script>
    <!--FONTAWESOME ICONOS SCRIPT--> 
    <script src="https://kit.fontawesome.com/b78e465c40.js" crossorigin="anonymous"></script>
</body>
</html>
