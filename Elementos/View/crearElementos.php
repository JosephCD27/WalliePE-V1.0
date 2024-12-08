<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear rol</title>
    <link rel="stylesheet" href="../../CSS_N/generalModales.css">
    <link rel="stylesheet" href="../../MATERIALIZE/css/materialize.min.css">
    <script type="text/javascript" src="../../JS/jquery-3.7.1.js"></script>
    <script type="text/javascript" src="../../MATERIALIZE/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../JS/scriptMaterialize.js"></script>
</head>
<body>
    <div class="row">
        <p class="tituloModal">Crear elemento</p>
        <form class="tarjetaModalCrear" id="form_crear">
            <div class="row">
                <div class="col s6">
                    <label for="" class="labelModificado active">Modelo</label>
                    <input placeholder="Nombre" type="text" class="inputModificadoCrear" id="Elem_Nombre" name="Elem_Nombre">
                </div>
                <div class="col s6">
                    <label for="" class="labelModificado active">Marca</label>
                    <input placeholder="Marca" type="text" class="inputModificadoCrear" id="Elem_Marca" name="Elem_Marca">
                </div>
                <div class="col s6">
                    <label for="" class="labelModificado active">Serial</label>
                    <input placeholder="Serial" type="text" class="inputModificadoCrear" id="Elem_Serial" name="Elem_Serial">
                </div>
                <div class="col s6">
                    <label>Tipo Elemento</label>
                    <select name="tipo" id="tipo">
                        <?php
                        echo $option_tipo;
                        ?>
                    </select>
                </div>
                <div class="col s6">
                    <label>Ambiente asignado</label>
                    <select name="Amb_Cod" id="Amb_Cod">
                        <?php
                        echo $option_ambiente;
                        ?>
                    </select>
                </div>
                <div class="mensaje_error"></div>
            </div>
            <div class="centrarBoton">
                <button type="button" class="btnFormulario botonModal" onclick="consultaCrear()">Registrar</button>
            </div>
        </form>
    </div>
    <script type="text/javascript" src="../../JS/scriptMaterialize.js"></script>
</body>
</html>