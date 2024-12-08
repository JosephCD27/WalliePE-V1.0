<?php
    session_start();
    $_SESSION['cod_usu'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>detalle bitacora</title>
    <link type="text/css" rel="stylesheet" href="../../MATERIALIZE/css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" href="../../CSS_N/generalModales.css">
</head>
<body>
    <div class="row">
        <p class="tituloModal">Bitacora</p>
        <span class="right"><h6>Ambiente <?php echo $condicion;?></h6></span>
        <form id="FormCrearBitacora" class="col s12 tarjetaModalEditar">
            <div>
                <div class="col s6">
                    <label for="" class="labelModificado active">Instructor</label>
                    <input placeholder="" type="text" class="inputModificadoEditar" name="a" value="<?php echo $usuario; ?>" readonly>
                </div>
                <div class="col s6">
                    <label for="" class="labelModificado active">Horas: Inicio - Fin</label>
                    <input placeholder="" type="text" class="inputModificadoEditar" name="h" value="<?php echo $info[0]["bit_hora_inicio"]." / ".$hora_final; ?>" readonly>
                </div>
            </div>
            <div>
                <div class="col s4">
                    <label for="" class="labelModificado active">Fecha</label>
                    <input placeholder="" type="text" class="inputModificadoEditar" name="b" value="<?php echo $info[0]["bit_fecha"]; ?>" readonly>
                </div>
                <div class="col s4">
                    <label for="" class="labelModificado active">Conteo: Inicial - Final</label>
                    <input placeholder="" type="text" class="inputModificadoEditar" name="b" value="<?php echo $info[0]["bit_conteo_inicial"]." / ".$conteo_final; ?>" readonly>
                </div>
                <div class="col s4">
                    <label for="" class="labelModificado active">Estado</label>
                    <input placeholder="" type="text" class="inputModificadoEditar" name="b" value="<?php echo $info[0]["bit_estado"]; ?>" readonly>
                </div>
            </div>
            <div>
                <div class="col s4">
                    <label for="" class="labelModificado active">Conteo computadores</label>
                    <input placeholder="" type="text" class="inputModificadoEditar" name="a" value="<?php echo $pc_ini." / ".$pc_fin; ?>" readonly>
                </div>
                <div class="col s4">
                    <label for="" class="labelModificado active">Conteo cargadores</label>
                    <input placeholder="" type="text" class="inputModificadoEditar" name="b" value="<?php echo $cargador_ini." / ".$cargador_fin; ?>" readonly>
                </div>

                <div class="col s4">
                    <label for="" class="labelModificado active">Conteo mouses</label>
                    <input placeholder="" type="text" class="inputModificadoEditar" name="h" value="<?php echo $mouse_ini." / ".$mouse_fin; ?>" readonly>
                </div>

                <div class="col s4">
                    <label for="" class="labelModificado active">Conteo video beam</label>
                    <input placeholder="" type="text" class="inputModificadoEditar" name="h" value="<?php echo $proyector_ini." / ".$proyector_fin; ?>" readonly>
                </div>

                <div class="col s4">
                    <label for="" class="labelModificado active">Conteo aire acondicionado</label>
                    <input placeholder="" type="text" class="inputModificadoEditar" name="h" value="<?php echo $aire_ini." / ".$aire_fin; ?>" readonly>
                </div>
                <div class="col s4">
                    <label for="" class="labelModificado active">Conteo mesas</label>
                    <input placeholder="" type="text" class="inputModificadoEditar" name="h" value="<?php echo $mesas_ini." / ".$mesas_fin; ?>" readonly>
                </div>

                <input placeholder="" type="hidden" name="codAmbiente" value="<?php echo $condicion;?>">
                <input placeholder="" type="hidden" name="usuario" value="<?php echo $_SESSION['cod_usu'];?>">
                <input placeholder="" type="hidden" name="fecha" value="<?php echo date('Y-m-d');?>">
                <input placeholder="" type="hidden" name="hora" value="<?php echo date('H:i:s');?>">
            </div>
        </form>
    </div>
</body>
</html>