
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar rOl</title>
    <link rel="stylesheet" href="../../css/editarRol.css">
    <link rel="stylesheet" href="../../css/listarRol.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> <!-- materialize css -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!--iconos -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>
<div class="row">
        <span class="flow-text center titulo2"><h5>Editar Tipo de Documento</h5></span>
        <div class="container contenedorCrear">
            <form class="col s6 offset-s3" action="../Controller/controllerDocu.php" method="POST">
                <div class="row">
                    <div class="input-field col s12">
                        <input type="hidden" name="upd_cod" value="<?php echo $Docu_Cod;?>">
                        <input type="hidden" name="camp_pk" value="Docu_Cod">
                        <input placeholder="Nombre" name="upd_nom" type="text" class="inputModificado" value="<?php echo $Docu_Nom;?>">
                        <label for="" class="labelModificado active">Nombre de Tipo de Documento</label>
                    </div>
                    <div class="input-field col s12">
                        <input placeholder="Describe el Tipo de Documento" name="upd_des" type="text" class="inputModificado" value="<?php echo $Docu_des;?>">
                        <label for="" class="labelModificado active">Descripcion de Tipo de Documento</label>
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