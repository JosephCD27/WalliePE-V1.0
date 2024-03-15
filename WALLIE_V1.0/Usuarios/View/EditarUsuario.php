
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar rOl</title>
    <link rel="stylesheet" href="../../CSS/editarRol.css">
    <link rel="stylesheet" href="../../CSS/listarRol.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> <!-- materialize css -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!--iconos -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>
<div class="row">
        <span class="flow-text center titulo2"><h5>Editar Usuario</h5></span>
        <div class="container contenedorCrear">
            <form class="col s6 offset-s3" action="../Controller/controllerUsuarios.php" method="POST">
                <div class="row">
                    <div class="input-field col s12">
                        <input type="hidden" name="upd_id" value="<?php echo $Usu_Id;?>">
                        <input type="hidden" name="camp_pk" value="Usu_id">
                        <input placeholder="Nombre" name="upd_nom" type="text" class="inputModificado" value="<?php echo $Usu_Nombre;?>">
                        <label for="" class="labelModificado active">Nombre del Usuario</label>
                    </div>
                    <div class="input-field col s12">
                        <input placeholder="Apellido" name="upd_ape" type="text" class="inputModificado" value="<?php echo $Usu_Apellido;?>">
                        <label for="" class="labelModificado active">Apellido del Usuario</label>
                    </div>
                    <div class="input-field col s12">
                        <input placeholder="Correo" name="upd_cor" type="Email" class="inputModificado" value="<?php echo $Usu_Correo;?>">
                        <label for="" class="labelModificado active">Correo del Usuario</label>
                    </div>
                    <div class="input-field col s12">
                        <input placeholder="Telefono" name="upd_tel" type="number" class="inputModificado" value="<?php echo $Usu_Telefono;?>">
                        <label for="" class="labelModificado active">Telefono del Usuario</label>
                    </div>
                    <div class="input-field col s12">
                        <input placeholder="Contraseña" name="upd_con" type="text" class="inputModificado" value="<?php echo $Usu_Contraseña;?>">
                        <label for="" class="labelModificado active">Contraseña del Usuario</label>
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