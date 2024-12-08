<?php
    session_start();
    $_SESSION['cod_usu'];
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
        <style>
            .card .card-content {
                background-color:#DEDAEE;
            }
        </style>
</head>
<body>
    <div class="row">
    <p class="tituloModal">Crear bitacora</p>
        <div class="col s12">
            <span class="right"><h6>Ambiente <?php foreach ($select as $registro) { echo $registro['Amb_Ref']; break;}?></h6></span>
        </div>
    </div>
        <div class="contenedorContenido">
<!--TARJETA DE ELEMENTOS-->
            <div class="row">
                <div class="col s10 offset-s1 "><!--class="col s12 m6"-->
                    <div class="card grey lighten-5 center">
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
                <form id="FormCrearBitacora" class="col s12">
                    <div>
                        <?php
                        foreach ($select as $registro) {
                        ?>
                        <div class="col s4">
                            <label for="" class="labelModificado active">Conteo <?php echo $registro['Elem_Nombre']; ?></label>
                            <input placeholder="" type="text" class="inputModificadoCrear" name="<?php echo $registro['Elem_Nombre']; ?>" id="<?php echo $registro['Elem_Nombre']; ?>">
                        </div>
                        <?php
                        }
                        ?>
                        <input placeholder="" type="hidden" name="codAmbiente" value="<?php echo $condicion;?>">
                        <input placeholder="" type="hidden" name="usuario" value="<?php echo $_SESSION['cod_usu'];?>">
                        <input placeholder="" type="hidden" name="fecha" value="<?php echo date('Y-m-d');?>">
                        <input placeholder="" type="hidden" name="hora" value="<?php echo date('H:i:s');?>">
                    </div>
                    <div id="mensaje-error"></div>
                    <div class="row center">
                        <div class="col s4 offset-s4">
                            <button type="button" value="Generar" class="btnFormulario botonModal" onclick="crearBitacora()">Generar</button>
                        </div>
                    </div>
                </form>
            </div>
<!------------------------>
        </div>
    </div>
</body>
</html>