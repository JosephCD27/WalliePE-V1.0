<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar ambientes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> <!-- materialize css -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="../../CSS_N/generalModales.css">
</head>
<body>
    <div class="row">
        <p class="tituloModal">Editar Ambiente</p>
        <form class="tarjetaModalEditar" id="form_editar" method="POST">
            <div class="row">
                <div class="input-field col s4 offset-s4">
                    <input type="hidden" name="upd_cod" value="<?php echo $Amb_Cod;?>">
                    <input type="hidden" name="camp_pk" value="Amb_Cod">
                    <input placeholder="Nombre" id="Amb_Ref" name="upd_nom" type="text" class="inputModificadoEditar" value="<?php echo $Ambiente_Ref;?>">
                    <label for="" class="labelModificado active">Referencia de ambiente</label>
                </div>
                <div class="input-field col s4 offset-s4">
                    <textarea placeholder="Describe el elemento" id="Amb_Desc" name="upd_des" type="text" class="textarea_Modificado_Editar" value="<?php echo $Ambiente_Desc;?>"><?php echo $Ambiente_Desc;?></textarea>
                    <label for="" class="labelModificado active">Descripcion de ambiente</label>
                </div>
                <div class="mensaje_error"></div>
            </div>
            <div class="centrarBoton">
                <button type="button" class="btnFormulario botonModal" onclick="consultaEditar()">Editar</button>
             </div>
        </form>
    </div>
</body>
</html>