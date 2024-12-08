<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Novedad</title>
    <script type="text/javascript" src="../../JS/scriptElementos.js"></script>
    <script type="text/javascript" src="../../JS/jquery-3.7.1.js"></script>
    <script type="text/javascript" src="../../MATERIALIZE/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../JS/scriptMaterialize.js"></script>
    <script type="text/javascript" src="../../CSS_N/generalModales.css"></script>
<style>
    .tituloModal{
    margin: 0 auto;
    margin-top: 5px;
    margin-bottom: 5px;
    text-align: center;
    font-size: 1.2rem;
    color:  #5745C4;
    font-weight: bold;
    border-radius: 8px;
    border: 2px solid #7C6DD8;
    padding: 10px; /* Espaciado interno para que el texto no quede pegado al borde */
    background-color: #ffff !important; 
}

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
    <p class="tituloModal">Finalizar novedad</p>
            <div class="row center">
                <div class="col s12">
                    <span class="flow-text center confirmacion"><h5>¿Estas seguro que deseas Finalizar esta Novedad (<?php echo $Nov_Cod;?>)?</h5></span>
                    <p>Antes de finalizarla por favor verifica que has recibido todos los elementos reportados</p>
                </div>
            </div>
            <div class="row contenedorBotones">
                <div class="col s12 offset-s4">
                    <form action="../Controller/controllerNovedades.php" method="post">
                        <input type="hidden" name="Nov_finalizar" value="<?php echo $Nov_Cod;?>">
                        <input type="hidden" name="Nov_campo" value="Nov_Cod">
                        <input type="submit" id="si" value="Finalizar" name="finalizar" class="btnEliminarElementos btn botonConfirmarEliminar">
                        <div class="col s2">
                            <a href="" class="btnEliminarElementos btn botonCancelarEliminar" id="no">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>
</html>