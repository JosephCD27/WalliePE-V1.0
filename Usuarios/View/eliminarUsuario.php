<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar rol</title>
    <link rel="stylesheet" href="../../MATERIALIZE/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!--iconos -->
    <script type="text/javascript" src="../../JS/jquery-3.7.1.js"></script>
    <script type="text/javascript" src="../../MATERIALIZE/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../JS/scriptMaterialize.js"></script>
    <link rel="stylesheet" href="../../CSS_N/generalModales.css">  
    <style>
        .botonConfirmarEliminar{
            background-color: red;
        }
        .botonCancelarEliminar{
            background-color: greenyellow;
        }
    </style>
</head>
<body>
<div class="contenedorEliminarElemento">
    <p class="tituloModal">Eliminar elemento</p>
            <div class="row">
                <div class="col s12">
                    <span class="flow-text center confirmacion"><h5>¿Estas seguro que deseas eliminar el Usuario <?php echo $Usu_Id;?>?</h5></span>
                </div>
            </div>
            <div class="row contenedorBotones">
                <div class="col s12 offset-s4">
                    <form id="form_eliminar" method="post">
                        <input type="hidden" name="Usu_delete" value="<?php echo $Usu_Id;?>">
                        <input type="hidden" name="Usu_campo" value="Usu_Id">
                        <button type="button" id="si" onclick="consultaEliminar()" class="btnEliminarElementos btn botonConfirmarEliminar">Eliminar</button>
                        <div class="col s2">
                            <a href="" class="btnEliminarElementos btn botonCancelarEliminar" id="no">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>
</html>