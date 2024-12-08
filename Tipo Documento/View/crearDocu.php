<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear rol</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> <!-- materialize css -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!--iconos -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="../../CSS_N/generalModales.css">
</head>
<body>
    <div class="row">
        <p class="tituloModal">Crear Tipo de Documento</p>
        <form class="tarjetaModalCrear" id="form_crear" method="POST">
        <div class="row">
            <div class="col s5 offset-s3">
                    <label for="" class="labelModificado active">Nombre del Tipo de Documento</label>
                    <input placeholder="Nombre" type="text" class="inputModificadoCrear" name="Docu_Nom" id="Docu_Nom">
                </div>
                <div class="col s5 offset-s3">
                    <label for="" class="labelModificado active">Descripcion Tipo de Documento</label>
                    <textarea placeholder="descripcion" type="text" class="textarea_Modificado_Crear" name="Docu_Desc" name="Docu_Desc" id="Docu_Desc"></textarea>
                </div>
                <div class="mensaje_error"></div>
            </div>
            <div class="centrarBoton">
                <input type="hidden"  name="tabla_nom" value="Tipo_Documento">
                <button type="button" class="btnFormulario botonModal" onclick="consultaCrear()">Registrar</button>
            </div>
        </form>
    </div>
</body>
</html>