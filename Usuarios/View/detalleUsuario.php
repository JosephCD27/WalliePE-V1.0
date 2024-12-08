<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle Elemento</title>
    <link rel="stylesheet" href="../../CSS_N/generalModales.css">
</head>
<body>
<div class="row">
        <span class="flow-text center titulo2"><h5>Detalles del Usuario</h5></span>
        <br>
        <form class="col s12" action="../Controller/controllerElementos.php" method="POST">
                <div class="row">
                    <div class="col s6">
                        <label for="" class="labelModificado active">Id</label>
                        <input readonly placeholder="Marca" name="det_id" type="text" class="inputModificadoEditar" value="<?php echo $Usu_Id;?>">
                    </div>
                    <div class="col s6">
                        <label for="" class="labelModificado active">Nombre del usuario</label>
                        <input readonly placeholder="Nombre" name="det_nom" type="text" class="inputModificadoEditar" value="<?php echo $Usu_Nombre;?>">
                    </div>
                    <div class="col s6">
                        <label for="" class="labelModificado active">Apellido del usuario</label>
                        <input readonly placeholder="Marca" name="det_marca" type="text" class="inputModificadoEditar" value="<?php echo $Usu_Apellido;?>">
                    </div>
                    <div class="col s6">
                        <label for="" class="labelModificado active">Correo</label>
                        <input readonly placeholder="Serial" name="det_ser" type="text" class="inputModificadoEditar" value="<?php echo $Usu_Correo;?>">
                    </div>
                    <div class="col s6">
                        <label for="" class="labelModificado active">Telefono</label>
                        <input readonly placeholder="Fecha" name="det_fecha" type="text" class="inputModificadoEditar" value="<?php echo $Usu_Telefono;?>">
                    </div>
                    <div class="col s6">
                        <label for="" class="labelModificado active">Contraseña</label>
                        <input readonly placeholder="Fecha" name="det_fecha" type="text" class="inputModificadoEditar" value="<?php echo $Usu_Contraseña;?>">
                    </div>
                    <div class="col s6">
                        <label for="" class="labelModificado active">Rol</label>
                        <input readonly placeholder="Rol" name="det_fecha" type="text" class="inputModificadoEditar" value="<?php echo $Rol_Nombre;?>">
                    </div>
                </div>
            </form>
    </div>
</body>
</html>