<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear ambiente</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> <!-- materialize css -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="../../CSS_N/generalModales.css">
</head>
<body>
    <div class="row">
        <p class="tituloModal">Crear ambiente</p>
        <form class="tarjetaModalCrear" method="POST" id="form_crear">
            <div class="row">
                <div class="col s4 offset-s4">
                    <label for="" class="labelModificado active">Referencia del ambiente</label>
                    <input placeholder="Numero de referencia" type="text" class="inputModificadoCrear" name="Amb_Ref" id="Amb_Ref" required>
                </div>
                <div class="col s4 offset-s4">
                    <label for="" class="labelModificado active">Descripcion del ambiente</label>
                    <textarea placeholder="descripcion" type="text" class="textarea_Modificado_Crear" name="Amb_Desc" id="Amb_Desc" required></textarea>
                </div>
                <div class="mensaje_error"></div>
            </div>
            <div class="centrarBoton">
                <input type="hidden"  name="tabla_nom" value="ambientes">
                <button type="button" class="btnFormulario b botonModal" onclick="consultaCrear()">Registrar</button>
            </div>
        </form>
        </div>
    </div>
</body>
</html>