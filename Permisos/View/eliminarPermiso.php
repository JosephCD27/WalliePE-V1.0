<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar permiso</title>
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
            <span class="flow-text center confirmacion"><h5>¿Estás seguro que deseas eliminar el permiso <?php echo $per_nombre;?>?</h5></span>
        </div>
    </div>
    <div class="row contenedorBotones">
        <div class="col s12 offset-s4">
            <form id="form_eliminar" method="POST">
                <input type="hidden" name="permiso_delete" value="<?php echo $id_permiso;?>">
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
