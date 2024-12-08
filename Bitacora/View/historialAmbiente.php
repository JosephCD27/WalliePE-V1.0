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
    .row .col.s3 {
        margin-top: 10px;
        border: 2px solid  #E9D5FF;
        transform: scale(0.95);
        box-shadow: 0 4px 5px  #6d6d6dc8;
        border-radius: 5px;
    }

    .row .col.s3:hover {
    transform: scale(0.99);
    background-color: #f2eef6;
}
    </style>
</head>
<body>
    <div class="row">
        <div class="col s12 bit_contenedor">
            <!-- <div class="contenedor_superior"> -->
            <p class="tituloModal">Historial de bitacoras</p>
            <!-- </div> -->
            <div class="historial">
                <?php
                        foreach ($bitacora as $valor) {

                            $usuario = $consulta->selectBD("usuario",null,"Usu_Id",$valor["fk_usu_doc"]);

                            $hora_fin=($valor["bit_hora_fin"] != null)? $valor["bit_hora_fin"] : " - - ";

                            ?>
                              <div class="col s3 elementoBitacoras">
                                  <p><?php echo $valor["Bita_Cod"];?></p>
                                  <p>Usuario: <br> <?php echo $usuario[0]["Usu_Nombre"]." ".$usuario[0]["Usu_Apellido"];?></p>
                                  <p>Fecha: <br> <?php echo $valor["bit_fecha"];?></p>
                                  <p>Inicio: <?php echo $valor["bit_hora_inicio"]."<br> fin: ".$hora_fin;?></p>
                                  <div class="botonElementoBitacora">
                                        <a class="modal-trigger tooltipped" data-position="top" data-tooltip="Detalles" href="#modalDetalleAmbiente" onclick="detalleBitacora(<?php echo $valor['Bita_Cod']; ?>,'detalleBitacora','Bita_Cod')"><i class="fa-solid fa-clipboard fa-2xl"></i></a>
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
        </div>
    </div>

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