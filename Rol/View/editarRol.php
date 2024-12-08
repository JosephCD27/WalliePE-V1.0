<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar rol</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> <!-- materialize css -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!--iconos -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="../../CSS_N/generalModales.css">
</head>
<body>
    <div class="row">
        <p class="tituloModal">Editar rol</p>
        <form class="tarjetaModalEditar" id="form_editar" method="POST">
            <div class="row">
                <div class="input-field col s5 offset-s3">
                    <input type="hidden" name="upd_cod" value="<?php echo $Rol_Cod;?>">
                    <input type="hidden" name="camp_pk" value="Rol_Cod">
                    <input placeholder="Nombre" id="Rol_Nombre" name="upd_nom" type="text" class="inputModificadoEditar" value="<?php echo $Rol_Nombre;?>">
                    <label for="" class="labelModificado active">Nombre de rol</label>
                </div>
                <div class="input-field col s5 offset-s3">
                    <textarea placeholder="Describe el rol" id="Rol_Desc" name="upd_des" type="text" class="textarea_Modificado_Editar" value="<?php echo $Rol_Desc;?>"><?php echo $Rol_Desc;?></textarea>
                    <label for="" class="labelModificado active">Descripcion de rol</label>
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