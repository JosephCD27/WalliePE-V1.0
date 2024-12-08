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
        <p class="tituloModal">Crear rol</p>
        <form class="tarjetaModalCrear" id="form_crear" method="POST">
            <div class="row">
                <div class="col s4 offset-s4">
                    <label for="Rol_Nombre" class="labelModificado active">Nombre del Rol</label>
                    <input placeholder="Nombre" type="text" class="inputModificadoCrear" name="Rol_Nombre" id="Rol_Nombre" required>
                </div>
                <div class="col s4 offset-s4">
                    <label for="Rol_Desc" class="labelModificado active">Descripcion del Rol</label>
                    <textarea placeholder="descripcion" type="text" class="textarea_Modificado_Crear" name="Rol_Desc" id="Rol_Desc" required></textarea>
                </div>
                <div class="mensaje_error"></div>
            </div>
            <div class="centrarBoton">
                <input type="hidden" name="tabla_nom" value="rol">
                <button type="button" class="btnFormulario botonModal" onclick="consultaCrear()">Registrar</button>
            </div>
        </form>
    </div>
</body>
</html>