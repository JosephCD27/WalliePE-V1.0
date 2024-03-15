<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear tipo de elemento</title>
    <link rel="stylesheet" href="../../css/crearRol.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> <!-- materialize css -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!--iconos -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>
    <div class="row">
        <span class="flow-text center titulo2"><h5>Crear tipo de elemento</h5></span>
        <div class="container contenedorCrear">
            <form class="col s6 offset-s3" method="POST">
                <div class="row">
                    <div class="input-field col s12">
                        <input placeholder="Nombre" type="text" class="inputModificado" name="Tipo_Nombre">
                        <label for="" class="labelModificado active">Nombre del elemento</label>
                    </div>
                    <div class="input-field col s12">
                        <input placeholder="descripcion" type="text" class="inputModificado" name="Tipo_Desc">
                        <label for="" class="labelModificado active">Descripcion del elemento</label>
                    </div>
                    <div class="col s12">
                        <input type="hidden"  name="tabla_nom" value="tipo_elemento">
                        <input type="submit" class="btnFormulario" name="registrar" onclick="consultaCrear()" value="Registrar">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>