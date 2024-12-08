<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Novedad</title>
    <link rel="stylesheet" href="../../CSS_N/generalModales.css">
    <script type="text/javascript" src="../../JS/scriptElementos.js"></script>
    <script type="text/javascript" src="../../JS/jquery-3.7.1.js"></script>
    <script type="text/javascript" src="../../MATERIALIZE/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../JS/scriptMaterialize.js"></script>
</head>
<body>
    <div class="row">
        <p class="tituloModal">Editar novedad</p>
            <form class="tarjetaModalEditar" id="form_apd" action="../Controller/controllerNovedades.php" method="POST">
                <div class="form_parte1">
                    <div class="ambiente">
                        <label>Ambiente</label>
                        <input type="text" name="ambiente_nov" class="inputModificadoEditar" value="<?php echo $amb_nom;?>" readonly>
                        <input type="text" hidden name="cod_amb" value="<?php echo $cod_amb; ?>">
                    </div>
                </div>
                <div class="row">
                    <?php
                    // Verifica que el parámetro Nov_Cod esté establecido
                    $cod_nov = isset($_GET["Nov_Cod"]) ? $_GET["Nov_Cod"] : null;
                    ?>

                    <input type="text" hidden name="cod_nov" value="<?php echo $cod_nov; ?>">

                    <?php
                    foreach ($listado as $indice => $valorListado) {

                        $reportado = $listar_Novedades->selectBD("novedad_elemento", null, null, null);

                        // Cargar elementos asociados a la novedad
                        $elementos = $listar_Novedades->selectBD("novedad_elemento", null, "Nov_Cod", $cod_nov);

                        // Validación de elementos no anulados y checkeados
                        $esElementoAsociado = false;
                        $elementoSeleccionado = null;
                        foreach ($elementos as $elemento) {
                            if ($elemento['Elem_Cod'] == $valorListado['Elem_Cod'] && $elemento['Nov_Elem_Estado'] != "Anulado") {
                                $esElementoAsociado = true;
                                $elementoSeleccionado = $elemento;
                                break;
                            }
                        }
                    
                        // Cargar selects y mantener el seleccionado en la novedad
                        $opciones_TN = "";
                        $datos = $listar_Novedades->selectBD("tipo_novedad", null, null, null);
                        foreach ($datos as $valorTipoNovedad) {
                            $selected = ($elementoSeleccionado && $valorTipoNovedad["TN_Cod"] == $elementoSeleccionado["TN_Cod"]) ? "selected" : "";
                            $opciones_TN .= "<option class='center' value='{$valorTipoNovedad["TN_Cod"]}' {$selected}>{$valorTipoNovedad["TN_Nom"]}</option>";
                        }

                    // HTML para los campos de entrada
                    ?>
                    <div class="novedad col s12">
                        <!-- Checks -->
                        <div class="check col s2">
                            <label>
                                <input type="checkbox" class="filled-in inputModificadoEditar" class="filled-in" name="checks[<?php echo $indice; ?>]" id="check<?php echo $indice; ?>" <?php echo $esElementoAsociado ? 'checked' : ''; ?>/>
                                <span>Reportar</span>
                            </label>
                        </div>
                        <!-- Elementos -->
                        <div class="col s3">
                            <input type="text" class="inputModificadoEditar"  name="elemento[<?php echo $indice; ?>]" value="<?php echo $valorListado["Elem_Nombre"]; ?>" readonly>
                            <input type="hidden" name="cod_elem[<?php echo $indice; ?>]" value="<?php echo $valorListado["Elem_Cod"]; ?>">
                        </div>
                        <!-- Novedad -->
                        <div class="col s3">
                            <label>Tipo de Novedad</label>
                            <select name="TN[<?php echo $indice; ?>]">
                                <?php echo $opciones_TN; ?>
                            </select>
                        </div>
                        <!-- Descripción -->
                        <div class="col s4">
                            <label for="comentario">Describe la novedad:</label>
                            <textarea class="Textarea_Modificado_Crear" id="icon_prefix2" name="Desc[<?php echo $indice; ?>]" rows="3" cols="20"><?php echo $esElementoAsociado ? $elementoSeleccionado['Nov_Elem_Desc'] : ''; ?></textarea>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="centrarBoton">
                    <input type="hidden"  name="tabla_nom" value="Novedad">
                    <input type="submit"  class="btnFormulario botonModal" name="actualizar" value="Modificar">
                </div>  
            </form>
    </div>
    <script type="text/javascript" src="../../JS/scriptElementos.js"></script>
    <script type="text/javascript" src="../../JS/scriptMaterialize.js"></script>
</body>
</html>