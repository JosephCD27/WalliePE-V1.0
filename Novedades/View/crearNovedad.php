<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Novedad</title>
    <link rel="stylesheet" href="../../CSS_N/generalModales.css">
</head>
<body>
    <div class="row">
        <p class="tituloModal">Crear Novedad</p>
        <form class="tarjetaModalCrear" id="form_crear" method="POST">
            <div class="form_parte1">
                <div class="ambiente col s3">
                    <label>Ambiente</label>
                    <input type="text" name="ambiente_nov" class="inputModificadoCrear" value="<?php echo $nom_amb;?>" readonly>
                    <input type="text" hidden name="cod_amb" value="<?php echo $cod_amb; ?>">
                    <br><br>
                </div>
            </div>
            <div class="row">
                    <?php
                    foreach ($elementos as $indice => $valor) {
                        if ($valor['Est_Cod']==1) {
                            // consulta todos los elementos que tengan novedad
                            $reportado = new classCRUD();
                            $info = $reportado->selectBD("novedad_elemento", null, null, null);

                            // crea un arreglo con los codigo que de los elemtos que tengan estado diferente a "'Anulado'"
                            $elementos_reportados = [];
                            foreach ($info as $elem) {
                                //Estado del elemento
                                $est_info=$reportado->selectBD("estado",null,"Est_Cod",$elem["Est_Cod"]);
                                $est_nom=$est_info[0]["Est_Nombre"];

                                if ($est_nom !== 'Anulada' && $est_nom !== 'Entregado') {
                                    $elementos_reportados[] = $elem['Elem_Cod'];
                                }
                            }

                            // Verificar si el código actual está en el arreglo de reportados y no está anulado
                            if (!in_array($valor['Elem_Cod'], $elementos_reportados)) {
                                // Si no está reportado o anulado, muestra el registro
                    ?>  
                            <div class="novedad col s12">
                                <!-- --------------checks-------------- -->
                                <div class="check col s2">
                                    <label>
                                        <label for="comentario">Selecciona</label>
                                        <input type="checkbox" class="filled-in" class="inputModificadoCrear"  name="checks[<?php echo $indice; ?>]" id="check<?php echo $indice; ?>"/>
                                        <span>Reportar</span>
                                    </label>
                                </div>
                                <!-- --------------elementos-------------- -->
                                <div class="col s3">
                                    <label for="comentario">Elemento</la>
                                    <input type="text" class="inputModificadoCrear" name="elemento[<?php echo $indice; ?>]" value="<?php echo $valor["Elem_Nombre"];?>" readonly>
                                    <input type="hidden" name="cod_elem[<?php echo $indice; ?>]" value="<?php echo $valor["Elem_Cod"];?>">
                                </div>
                                <!-- --------------novedad-------------- -->
                                <div class="col s3">
                                    <label>Tipo de Novedad</label>
                                    <select name="TN[<?php echo $indice; ?>]">
                                        <?php echo $opciones_TN; ?>
                                    </select>
                                </div>
                                <!-- --------------descripcion-------------- -->
                                <div class="col s4">
                                    <label for="comentario">Describe la novedad</label>
                                    <textarea id="icon_prefix2" class="Textarea_Modificado_Crear" name="Desc[<?php echo $indice; ?>]" rows="3" cols="20"></textarea>
                                </div>
                            </div>
                <?php
                        }
                    } // Fin del if
                } // Fin del foreach
                ?>
            </div>
            <div id="mensaje-error"></div>
            <div class="centrarBoton">
                <input type="hidden"  name="tabla_nom" value="Novedad">
                <button type="button" class="btnFormulario botonModal" onclick="consultaCrear()">Registrar</button>
            </div>
        </form>
    </div>
    <!-- -----scripts--------- -->
    <script type="text/javascript" src="../../JS/scriptNovedades.js"></script>
    <script type="text/javascript" src="../../JS/jquery-3.7.1.js"></script>
    <script type="text/javascript" src="../../MATERIALIZE/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../JS/scriptMaterialize.js"></script>
</body>
</html>