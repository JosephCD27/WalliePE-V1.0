<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Novedad</title>
    <link rel="stylesheet" href="../../CSS_N/generalModales.css">

</head>
<body>
    <div class="contenedorEliminarElemento">
            <div class="row">
                <div class="col s12">
                    <p class="tituloModal">Novedad</p>
                    <p>Selecciona el ambiente al cual haras una novedad</p>
                </div>
            </div>
            <div class="row">
                <div class="col s4 offset-s4">
                    <form action="../Controller/controllerNovedades.php" method="post">
                        <label>Ambiente</label>
                        <select name="consul_ambiente" id="consul_ambiente">
                            <?php
                                echo $opciones_amb;
                            ?>
                        </select>
                        <div id="mensaje-error"></div>
                        <div class="centrarBoton">
                            <button type="button" class="btnFormulario botonModal" onclick="crearNovedad('crear',document.getElementById('consul_ambiente').value)">Confirmar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <script type="text/javascript" src="../../JS/scriptElementos.js"></script>
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
</body>
</body>
</html>