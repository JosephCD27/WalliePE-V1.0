<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle Elemento</title>
    <link rel="stylesheet" href="../../CSS_N/generalModales.css">
    <link rel="stylesheet" href="../../MATERIALIZE/css/materialize.min.css">
    <script type="text/javascript" src="../../JS/jquery-3.7.1.js"></script>
    <script type="text/javascript" src="../../MATERIALIZE/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../JS/scriptMaterialize.js"></script>
</head>
<body>
    <div class="row">
        <p class="tituloModal">Detalle del Elemento</p>
        <form class="tarjetaModalEditar" method="POST">
            <div class="row">
                <div class="col s6">
                    <label for="" class="labelModificado active">Marca</label>
                    <input readonly placeholder="Marca" name="det_id" type="text" class="inputModificadoEditar" id="disabled" value="<?php echo $Elem_Cod;?>">
                </div>
                <div class="col s6">
                    <label for="" class="labelModificado active">Nombre del Elemento</label>
                    <input readonly placeholder="Nombre" name="det_nom" type="text" class="inputModificadoEditar" id="disabled" value="<?php echo $Elem_Nombre;?>">
                </div>
                <div class="col s6">
                    <label for="" class="labelModificado active">Marca</label>
                    <input readonly placeholder="Marca" name="det_marca" type="text" class="inputModificadoEditar" id="disabled" value="<?php echo $Elem_Marca;?>">
                </div>
                <div class="col s6">
                    <label for="" class="labelModificado active">Serial</label>
                    <input readonly placeholder="Serial" name="det_ser" type="text" class="inputModificadoEditar" id="disabled" value="<?php echo $Elem_Serial;?>">
                </div>
                <div class="col s6">
                    <label for="" class="labelModificado active">Fecha de Registro</label>
                    <input readonly placeholder="Fecha" name="det_fecha" type="text" class="inputModificadoEditar" id="disabled" value="<?php echo $Elem_FechaReg;?>">
                </div>
                <div class="col s6">
                    <label for="" class="labelModificado active">Tipo Elemento</label>
                    <input readonly placeholder="tipo" name="det_tipo" type="text" class="inputModificadoEditar" id="disabled" value="<?php echo $tipo_nom;?>">
                </div>
                <div class="col s6">
                    <label for="" class="labelModificado active">Ambiente asignado</label>
                    <input readonly placeholder="ambiente" name="det_amb" type="text" class="inputModificadoEditar" id="disabled" value="<?php echo $amb_nom;?>">
                </div>
            </div>
        </form>
    </div>
</body>
</html>