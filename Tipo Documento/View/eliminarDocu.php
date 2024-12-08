<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar rol</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> <!-- materialize css -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!--iconos -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="../../CSS_N/generalModales.css">  
    <style>
.botonConfirmarEliminar{
    background-color: red!important;
}
.botonConfirmarEliminar:hover{
    background-color: #ff000089!important;
}
.botonCancelarEliminar{
    background-color: greenyellow!important;
}
.botonCancelarEliminar:hover{
    background-color: #acff2f9a!important;
}

    </style>
</head>
<body>
<div class="contenedorEliminarElemento">
    <p class="tituloModal">Eliminar elemento</p>
            <div class="row">
                <div class="col s12">
                    <span class="flow-text center confirmacion"><h5>¿Estas seguro que deseas eliminar el Tipo Documento <?php echo $Docu_Nom;?>?</h5></span>
                </div>
            </div>
            <div class="row contenedorBotones">
                <div class="col s12 offset-s4">
                    <form method="post" id="form_eliminar">
                        <input type="hidden" name="Docu_delete" value="<?php echo $Docu_Cod;?>">
                        <input type="hidden" name="Docu_campo" value="Docu_Cod">
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