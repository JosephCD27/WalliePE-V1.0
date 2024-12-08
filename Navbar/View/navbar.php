<style>
    .zx{
        position: relative;
        z-index: 2;
    }

    .nav-wrapper{
            background-color: #5745C4!important;
        }

    .nav-wrapper img{
        margin: 10px;
        height: 50PX;
        width: 100px;
    }

    .nav-wrapper .cerrar{
        border-radius: 5px;
        margin-right: 10px;
        background-color: #ffff;
    }
    .nav-wrapper .cerrar input{
        background-color: #ffff !important;
        border: none !important;
        font-weight: bolder;
        color: #401d6b!important;
    }
</style>
<?php  
    $modulosNavbar = [
        ["CodigoModulo" => tienePermisoModulo(1), "link" => "<a href='../../Usuarios/View/listarUsuario.php'><i class='fa-solid fa-user fa-lg tooltipped' data-position='bottom' data-tooltip='Usuarios' style='color: white;'></i></a>", "nombreModulo" => "Usuario"],
        ["CodigoModulo" => tienePermisoModulo(6), "link" => "<a href='../../Bitacora/View/listarAmbientes.php'><i class='fa-solid fa-book fa-lg tooltipped' data-position='bottom' data-tooltip='Bitacora' style='color: white;'></i></a>", "nombreModulo" => "Bitacora"],
        ["CodigoModulo" => tienePermisoModulo(9), "link" => "<a href='../../Novedades/View/listarNovedad.php'><i class='fa-solid fa-circle-exclamation fa-lg tooltipped' data-position='bottom' data-tooltip='Novedades' style='color: white;'></i></a>", "nombreModulo" => "Novedades"],
        ["CodigoModulo" => tienePermisoModulo(4), "link" => "<a href='../../ambientes/View/listarAmbientes.php'><i class='fa-solid fa-school fa-lg tooltipped' data-position='bottom' data-tooltip='Ambientes' style='color: white;'></i></a>", "nombreModulo" => "Ambientes"],
        ["CodigoModulo" => tienePermisoModulo(5), "link" => "<a href='../../Elementos/View/listarElementos.php'><i class='fa-solid fa-laptop fa-lg tooltipped' data-position='bottom' data-tooltip='Elementos' style='color: white;'></i></a>", "nombreModulo" => "Elementos"],
        ["CodigoModulo" => tienePermisoModulo(2), "link" => "<a href='../../Rol/View/listarRol.php'><i class='fa-solid fa-people-group fa-lg tooltipped' data-position='bottom' data-tooltip='Roles' style='color: white;'></i></a>", "nombreModulo" => "Roles"],
        ["CodigoModulo" => tienePermisoModulo(8), "link" => "<a href='../../Tipo Documento/View/listarDocu.php'><i class='fa-solid fa-id-card fa-lg tooltipped' data-position='bottom' data-tooltip='Tipo documento identidad' style='color: white;'></i></a>", "nombreModulo" => "Tipo de documento"],
        ["CodigoModulo" => tienePermisoModulo(7), "link" => "<a href='../../TipoElementos/View/listarTipoElementos.php'><i class='fa-regular fa-newspaper fa-lg tooltipped' data-position='bottom' data-tooltip='Tipo elemento' style='color: white;'></i></a>", "nombreModulo" => "Tipo elemento"],
        ["CodigoModulo" => tienePermisoModulo(3), "link" => "<a href='../../Permisos/View/listarPermisos.php'><i class='fa-solid fa-lock fa-lg tooltipped' data-position='bottom' data-tooltip='Permisos' style='color: white;'></i></a>", "nombreModulo" => "Permisos"]
    ];
?>
<div class="zx">
    <nav>
        <div class="nav-wrapper">
            <a href="../../Principal/View/pantallaPrincipal.php" class="brand-logo">
                <img src="../../IMG/logoLetras2.png" alt="">
            </a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li>
                    <i class="fa-solid fa-circle fa-xs" style="color: #AEFFC7;" ></i> <?php echo $_SESSION['nombreUsuario']." ".$_SESSION['apellidoUsuario'];?>
                </li>
                <li>
                    <a href='../../Principal/View/pantallaPrincipal.php'><i class='fa-solid fa-house fa-lg' style='color: #ffffff;'></i></a>
                </li>
                <?php
                // Recorrer el arreglo de modulos y mostrar icono con redireccion
                foreach ($modulosNavbar as $moduloN ) {
                    if ($moduloN["CodigoModulo"]) :
                ?>
                    <li>
                        <?php
                        echo $moduloN["link"];
                        ?>
                    </li>
                <?php
                    endif;
                }
                ?>  
                <form class='cerrar btn' action='../../Login/View/Login.php' method='post'><input type='submit' value='Cerrar Sesión'></form>
            </ul>
        </div>
    </nav>
</div>