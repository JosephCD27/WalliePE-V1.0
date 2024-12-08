
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar rOl</title>
    <link rel="stylesheet" href="../../CSS_N/generalModales.css">
    <link rel="stylesheet" href="../../MATERIALIZE/css/materialize.min.css">
    <script type="text/javascript" src="../../JS/jquery-3.7.1.js"></script>
    <script type="text/javascript" src="../../MATERIALIZE/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../JS/scriptMaterialize.js"></script>
</head>
<body>
    <div class="row">
        <p class="tituloModal">Editar Elemento</p>
        <form class="tarjetaModalEditar" id="form_editar" method="POST">
            <div class="row">
                <div class="col s6">
                    <label for="" class="labelModificado active">Nombre del Elemento</label>
                    <input type="hidden" name="fecha" class="inputModificado" value="<?php echo $Elem_FechaReg;?>">
                    <input type="hidden" name="upd_cod" value="<?php echo $Elem_Cod;?>">
                    <input type="hidden" name="camp_pk" value="Elem_Cod">
                    <input placeholder="Nombre" name="upd_nom" id="Elem_Nombre" type="text" class="inputModificadoEditar" value="<?php echo $Elem_Nombre;?>">
                </div>
                <div class="col s6">
                    <label for="" class="labelModificado active">Marca</label>
                    <input placeholder="Marca" name="upd_marca" id="Elem_Marca" type="text" class="inputModificadoEditar" value="<?php echo $Elem_Marca;?>">
                </div>
                <div class="col s6">
                    <label for="" class="labelModificado active">Serial</label>
                    <input placeholder="Serial" name="upd_ser" id="Elem_Serial" type="text" class="inputModificadoEditar" value="<?php echo $Elem_Serial;?>">
                </div>
                <div class="col s6">
                <label>Tipo Elemento</label>
                    <select name="upd_tipo" id="tipo">
                    <?php
                    echo $option_tipo;
                    ?>
                    </select>
                </div>

                <div class="col s6">
                <label>Ambiente asignado</label>
                    <select name="upd_amb" id="Amb_Cod">
                    <?php
                    echo $option_ambiente;
                    ?>
                    </select>
                </div>
                <div class="mensaje_error"></div>
            </div>
            <div class="centrarBoton">
                <button type="button" class="btnFormulario botonModal" onclick="consultaEditar()">Editar</button>
            </div>
        </form>
    </div>
    
    <script type="text/javascript" src="../../JS/scriptMaterialize.js"></script>
</body>
</html>