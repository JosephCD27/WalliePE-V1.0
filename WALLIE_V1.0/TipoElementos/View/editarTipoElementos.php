
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar tipo de elemento</title>
    <link rel="stylesheet" href="../../css/editarRol.css">
    <link rel="stylesheet" href="../../css/listarRol.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> <!-- materialize css -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!--iconos -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>
<div class="row">
        <span class="flow-text center titulo2"><h5>Editar tipo de elemento</h5></span>
        <div class="container contenedorCrear">
            <form class="col s6 offset-s3" action="../Controller/controllerTipoElementos.php" method="POST">
                <div class="row">
                    <div class="input-field col s12">
                        <input type="hidden" name="upd_cod" value="<?php echo $Tipo_Cod;?>">
                        <input type="hidden" name="camp_pk" value="Tipo_Cod">
                        <input placeholder="Nombre" name="upd_nom" type="text" class="inputModificado" value="<?php echo $tipoElementos_Nombre;?>">
                        <label for="" class="labelModificado active">Nombre del tipo elemento</label>
                    </div>
                    <div class="input-field col s12">
                        <input placeholder="Describe el elemento" name="upd_des" type="text" class="inputModificado" value="<?php echo $tipoElementos_Desc;?>">
                        <label for="" class="labelModificado active">Descripcion del tipo elementol</label>
                    </div>
                    <div class="col s12">
                        <input type="submit" class="btnFormulario" name="actualizar" value="Editar">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>