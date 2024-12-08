<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar permiso</title>
    <link rel="stylesheet" href="../../CSS_N/generalModales.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> <!-- materialize css -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!--iconos -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>
    <div class="row">
        <p class="tituloModal">Editar rol</p>
        <form class="tarjetaModalEditar" id="form_editar" method="POST">
            <div class="row">
                <div class="input-field col s5 offset-s3">
                    <input type="hidden" name="upd_cod" value="<?php echo $id_permiso;?>">
                    <input type="hidden" name="camp_pk" value="id_permiso">
                    <input placeholder="Nombre" name="upd_nom" type="text" class="inputModificadoEditar" value="<?php echo $per_nombre;?>"  id="per_nombre" required>
                    <label for="" class="labelModificado active">Nombre del permiso</label>
                </div>
                <div class="input-field col s5 offset-s3">
                    <textarea placeholder="Describe el permiso" name="upd_des" type="text" class="textarea_Modificado_Editar" value="<?php echo $per_descripcion;?>" id="per_descripcion" required><?php echo $per_descripcion;?></textarea>
                    <label for="" class="labelModificado active">Descripción del permiso</label>
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
