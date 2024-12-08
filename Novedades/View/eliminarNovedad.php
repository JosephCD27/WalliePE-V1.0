<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Novedad</title>
    <script type="text/javascript" src="../../JS/scriptNovedades.js"></script>
    <script type="text/javascript" src="../../JS/jquery-3.7.1.js"></script>
    <script type="text/javascript" src="../../MATERIALIZE/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../JS/scriptMaterialize.js"></script>
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
                    <span class="flow-text center confirmacion"><h5>¿Estas seguro que deseas eliminar este reporte de Novedad <?php echo $Nov_Cod;?>?</h5></span>
                </div>
            </div>
            <div class="row contenedorBotones">
                <div class="col s12 offset-s4">
                    <form id="form_eliminar" method="post">
                        <input type="hidden" name="Nov_delete" value="<?php echo $Nov_Cod;?>">
                        <input type="hidden" name="Nov_campo" value="Nov_Cod">
                        <button type="button" id="si" onclick="consultaEliminar()" class="btnEliminarElementos btn botonConfirmarEliminar">Eliminar</button>
                        <div class="col s2">
                            <a href="" class="btnEliminarElementos  btn botonCancelarEliminar" id="no">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>
</html>