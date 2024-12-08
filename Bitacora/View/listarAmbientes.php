<?php //no lo quites para optimizar, se cae todo :c
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
include "../Controller/controllerBitacora.php";
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
    <link rel="stylesheet" href="../../CSS_N/generalModales.css">
    <style>
        .elemento{
            margin-right: 10px;
        }
    </style>
</head>
<body>
<?php include("../../Navbar/View/navbar.php"); ?>
    <div class="content-container">
        <div id="particles-js"></div> <!-- le da el estilo de las particulas al fondo-->
        <div class="container">
            <div class="fondo">
                <div class="dt-container">
                    <p class="titulo">Bitacora</p>
                    <div class="row">
                        <div class="col s3">
                            <label class="labelModificado">Buscar Ambiente</label>
                            <input type="hidden" id="opciones" name="opciones" value="Amb_Ref">
                            <input placeholder="Numero de ambiente" name="condicion" type="text" class="validate inputModificadoCrear" OnKeyUp="buscarAmbienteBitacora(this.value, document.getElementById('opciones').value)">
                        </div>
                    </div>
                    <div class="row  tarjetaBotonesAmbientes center">
                        <div class="col s12" id="tblBitacora">
                            <?php
                                include("selectBitacora.php");
                            ?>
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