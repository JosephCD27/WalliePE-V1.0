<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar rol</title>
    <link rel="stylesheet" href="../../css/eliminarRol.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> <!-- materialize css -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!--iconos -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>
<div class="contenedorEliminarElemento">
            <div class="row">
                <div class="col s12">
                    <span class="flow-text center confirmacion"><h5>¿Estas seguro que deseas eliminar el rol <?php echo $Rol_Nombre;?>?</h5></span>
                </div>
            </div>
            <div class="row contenedorBotones">
                <div class="col s2 offset-s4">
                    <form action="../Controller/controllerRol.php" method="post">
                        <input type="hidden" name="rol_delete" value="<?php echo $Rol_Cod;?>">
                        <input type="hidden" name="rol_campo" value="Rol_Cod">
                        <input type="submit" id="si" value="Eliminar" name="borrar" class="btnEliminarElementos">
                    </form>
                </div>
                <div class="col s2">
                    <a href="" class="btnEliminarElementos" id="no">Cancelar</a>
                </div>
            </div>
        </div>
</body>
</html>