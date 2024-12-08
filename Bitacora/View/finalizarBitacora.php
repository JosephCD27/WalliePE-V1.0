<?php
    session_start();
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>detalle bitacora</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/fontawesome.min.css" integrity="sha512-xXkCeYSSuCWpUAhDUIWJdCI9xm0uzrOVuONuGIx7NTRHwTFSCDS3WwNqlSEeNDK2TJggwgsfdDUpb05c7XK2yA==" crossorigin="anonymous" />
        <link type="text/css" rel="stylesheet" href="../../MATERIALIZE/css/materialize.min.css"  media="screen,projection"/>
        <link rel="stylesheet" href="../../CSS_N/generalListar.css">
        <link rel="stylesheet" href="../../CSS_N/generalModales.css">
    </head>
    <body>
        <div class="row">
            <p class="tituloModal">Bitacora</p>
            <span class="right"><h6>Ambiente <?php foreach ($select as $DE) { echo $DE['Amb_Ref']; break;}?></h6></span>
            <div class="contenedorContenido">
    <!--TARJETA DE ELEMENTOS-->
                <div class="row">
                    <div class="col s10 offset-s1 "><!--class="col s12 m6"-->
                        <div class="card grey lighten-5">
                            <div class="card-content black-text">
                                <span class="card-title center">Elementos asignados</span>
                                <?php include "../Logic/selectElementosBitacora.php"; ?>
                            </div>
                        </div>
                    </div>
                </div>
    <!------------------------>

    <!--FORMULARIO------------>
                <div class="row">
                    <form id="FormTerminarBitacora" class="col s12">
                        <div>
                            <?php
                            foreach ($select as $DE) {
                                ?>
                                <div class="col s4">
                                    <label for="" class="labelModificado active">Conteo <?php echo $DE['Elem_Nombre']; ?></label>       
                                <?php  
                                    if ($DE['Elem_Nombre']==='Cargador') {
                                        $VBI=$BI[0]['bit_ini_cargadores']; 
                                    }elseif ($DE['Elem_Nombre']==='Computador') {
                                        $VBI=$BI[0]['bit_ini_computadores'];
                                    }elseif ($DE['Elem_Nombre']==='Mouse') {
                                        $VBI=$BI[0]['bit_ini_mouses'];
                                    }elseif ($DE['Elem_Nombre']==='VideoBeam') {
                                        $VBI=$BI[0]['bit_ini_proyector'];
                                    }elseif ($DE['Elem_Nombre']==='AireAcondicionado') {
                                        $VBI=$BI[0]['bit_ini_aire'];
                                    }elseif ($DE['Elem_Nombre']==='Mesa') {
                                        $VBI=$BI[0]['bit_ini_mesas'];
                                    }
                                ?>
                                    <input placeholder="<?php echo $VBI; ?>" type="text" class="inputModificadoCrear"  value="" name="<?php echo $DE['Elem_Nombre']; ?>">
                                </div>
                            <?php
                            }
                            ?>
                            <input type="hidden" name="CodA" value="<?php echo $amb_cod; ?>">
                            <input type="hidden" name="CodB" value="<?php echo $BC; ?>">
                            <input placeholder="" type="hidden" name="FechaF" value="<?php echo date('Y-m-d');?>">
                            <input placeholder="" type="hidden" name="HoraF" value="<?php echo date('H:i:s');?>">
                        </div>
                        <div id="mensaje-error"></div>
                        <div class="row center">
                            <div class="col s4 offset-s4">
                                <button type="button" value="Generar" class="btnFormulario botonModal" onclick="terminarBitacora()">Generar</button>
                            </div>
                        </div>
                    </form>
                </div>
    <!------------------------>
            </div>
        </div>
    </body>
</html>