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
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bitacora</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/fontawesome.min.css" integrity="sha512-xXkCeYSSuCWpUAhDUIWJdCI9xm0uzrOVuONuGIx7NTRHwTFSCDS3WwNqlSEeNDK2TJggwgsfdDUpb05c7XK2yA==" crossorigin="anonymous" />
    <link type="text/css" rel="stylesheet" href="../../MATERIALIZE/css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" href="../../CSS_N/generalListar.css">
</head>
<body>
<?php include "../../Navbar/View/navbar.php";?>
<div class="content-container">
    <div id="particles-js"></div> <!-- le da el estilo de las particulas al fondo-->
        <div class="container">
            <div class="fondo">
                <p class="titulo">Bitacora</p>
                    <div class="row dt-container">
                        <h5><?php echo $referencia; ?></h5>
                        <p>Bitacoras Anteriores</p>
                        <div class="historial">
                            <?php

                                foreach ($bitacora as $valor) {
                                    $usuario = $consulta->selectBD("usuario",null,"Usu_Id",$valor["fk_usu_doc"]);

                                    $hora_fin=($valor["bit_hora_fin"] != null)? $valor["bit_hora_fin"] : " - - ";

                                    ?>
                                    <div class="col s3 elementoBitacora">
                                        <p># <?php echo $valor["Bita_Cod"];?></p>
                                        <p>Usuario: <br> <?php echo $usuario[0]["Usu_Nombre"]." ".$usuario[0]["Usu_Apellido"];?></p>
                                        <p>Fecha: <br> <?php echo $valor["bit_fecha"];?></p>
                                        <p>Inicio: <?php echo $valor["bit_hora_inicio"]."<br> fin: ".$hora_fin;?></p>
                                        <div class="botonElementoBitacora">
                                            <?php if (tienePermisoModulo(47)) : ?>
                                            <a class="modal-trigger tooltipped" data-position="top" data-tooltip="Detalles" href="#modalDetalleAmbiente" onclick="detalleBitacora(<?php echo $valor['Bita_Cod']; ?>,'detalleBitacora','Bita_Cod')"><i class="fa-solid fa-clipboard fa-2xl"></i></a>
                                            <?php endif; ?>
                                                <?php
                                                if ($valor['bit_conteo_final']===null) {
                                                ?>
                                                    <a class="modal-trigger tooltipped" data-position="top" data-tooltip="Cerrar Bitacora" href="#modalDetalleAmbiente" onclick="finalizarBitacora('finalizarBitacora', <?php echo $valor['Bita_Cod']; ?> , <?php echo $valor['Amb_Cod']; ?> ,'Amb_Cod','Bita_Cod')"><i class="fa-solid fa-check fa-2xl"></i></a>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                            ?>
                        </div>
                        <div class="contenedor_inferior col s12">
                        <?php
                        $registrar = true; // Asumimos que se puede registrar por defecto
                        foreach ($bitacora as $valor) {
                            if ($valor['bit_estado'] == "Iniciada") {
                                $registrar = false; // Si encontramos un estado "Iniciada", no se debe registrar
                                break; // Salimos del bucle inmediatamente
                            }
                        }
                        ?>
                        <div>
                            <div class="accionesBitacora">
                                <?php if (tienePermisoModulo(46)) : ?>
                                    <a class="modal-trigger btn blue tooltipped" data-position="top" data-tooltip="Historial Bitacoras" href="#modalDetalleAmbiente" onclick="historialBitacoras('consultar',<?php echo $valor['Amb_Cod']; ?>,'Amb_Cod')"><i class="fa-solid fa-book"></i></a>
                                <?php endif; ?>
                        <?php
                        if (!$registrar) {
                            // Si $registrar es falso, no mostramos el botón
                        } else {
                            ?>
                                <?php if (tienePermisoModulo(22)) : ?>
                                    <a class="modal-trigger btn green tooltipped" data-position="top" data-tooltip="Registrar Bitacora" href="#modalDetalleAmbiente" onclick="registrarBitacora('registrar', <?php echo $amb_cod; ?>, 'Amb_Cod')">
                                        <i class="fa-solid fa-square-plus"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if (tienePermisoModulo(29)) : ?>
                                    <a class="modal-trigger btn red tooltipped" data-position="top" data-tooltip="Cambiar Ambiente" href="../View/listarAmbientes.php"><i class="fa-solid fa-rotate"></i></a>
                                <?php endif; ?>
                            <?php
                        }
                        ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!----------------- inicio Modal del CRUD ---------------------------------------->
    <div id="modalDetalleAmbiente" class="modal">
        <div class="modal-content">
            <!--Contenido-->
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat"><i class="fa-solid fa-xmark fa-xl"></i></a>
        </div>
    </div>
<!----------------- final Modal del CRUD ---------------------------------------->


<!-----------------Conexiones con archivos de JavaScript----------------------------->
<script type="text/javascript" src="../../JS/scriptBitacora.js"></script>
<!-- JQUERY SCRIPT-->
<script type="text/javascript" src="../../JS/jquery-3.7.1.js"></script>
<!-- PARTICLES.JS-MASTER SCRIPT-->
    <script src="../../particles.js-master/demo/js/lib/particles.js"></script>
    <script src="../../particles.js-master/demo/js/lib/app.js"></script>
    <script src="../../particles.js-master/demo/js/lib/stats.js"></script>
<!--INICIO MATERIALIZE SCRIPT-->    
    <script type="text/javascript" src="../../MATERIALIZE/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../JS/scriptMaterialize.js"></script>
<!--FONTAWESOME ICONOS SCRIPT--> 
    <script src="https://kit.fontawesome.com/b78e465c40.js" crossorigin="anonymous"></script>
</script>
</body>
</html>