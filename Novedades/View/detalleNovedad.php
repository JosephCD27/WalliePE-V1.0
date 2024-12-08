<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Novedad</title>
    <script type="text/javascript" src="../../JS/scriptElementos.js"></script>
    <script type="text/javascript" src="../../JS/jquery-3.7.1.js"></script>
    <script type="text/javascript" src="../../MATERIALIZE/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../JS/scriptMaterialize.js"></script>
    <link rel="stylesheet" href="../../CSS_N/generalModales.css">
</head>
<body>
    <div class="row">
        <p class="tituloModal">Detalle Novedad</p>
        <form class="tarjetaModalEditar" method="POST">
            <div class="form_parte1">
                <div class="novedad_basico">
                    <div class="col s4">
                        <label>Ambiente</label>
                        <input type="text" name="ambiente_nov" class="inputModificadoEditar"  id="disabled" value="<?php echo $amb_nom;?>" readonly>
                    </div>
                    <div class="col s4">
                        <label>Usuario</label>
                        <input type="text" name="Usuario" class="inputModificadoEditar" id="disabled"  value="<?php echo $usu_nom;?>" readonly> 
                    </div>
                    <div class="col s4">
                        <label>Fecha</label>
                        <input type="text" name="fecha" class="inputModificadoEditar" id="disabled" value="<?php echo $nov_fecha;?>" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                    <?php
                    foreach ($elementos as $indice => $valor) {
                        $consulta=new classCRUD();

                        //Estado del elemento
                        $est_info=$consulta->selectBD("estado",null,"Est_Cod",$valor["Est_Cod"]);
                        $est_nom=$est_info[0]["Est_Nombre"];

                        if ($est_nom != "Anulado") {

                            //nombre del elemento
                            $elem_info=$consulta->selectBD("elementos",null,"Elem_Cod",$valor["Elem_Cod"]);
                            $elem_nom=$elem_info[0]["Elem_Nombre"];
                            //tipo de novedad
                            $tipo_info=$consulta->selectBD("tipo_novedad",null,"TN_Cod",$valor["TN_Cod"]);
                            $tipo_nom=$tipo_info[0]["TN_Nom"];
                    ?>
                            <div class="novedad">
                                <!-- --------------elementos-------------- -->
                                <div class="col s4">
                                    <label for="comentario">Elemento:</label>
                                    <input type="text" name="elemento[<?php echo $indice; ?>]" class="inputModificadoEditar" id="disabled" value="<?php echo $elem_nom;?>" readonly>
                                </div>
                                <!-- --------------novedad-------------- -->
                                <div class="col s4">
                                    <label for="comentario">Tipo novedad:</label>
                                    <input type="text" name="tipo[<?php echo $indice; ?>]" class="inputModificadoEditar" id="disabled" value="<?php echo $tipo_nom;?>" readonly>
                                </div>
                                <!-- --------------Estado-------------- -->
                                <div class="col s4">
                                    <label for="comentario">Estado:</label>
                                    <input type="text" name="estado[<?php echo $indice; ?>]" class="inputModificadoEditar" id="disabled" value="<?php echo $est_nom;?>" readonly>

                                </div>
                                <!-- --------------descripcion-------------- -->
                                <div class="col s12">
                                    <label for="comentario">Descripcion:</label>
                                    <textarea id="icon_prefix2"  name="Desc[<?php echo $indice; ?>]" class="textarea_Modificado_Editar" id="disabled" rows="3" cols="20" readonly><?php echo $valor['Nov_Elem_Desc'];?></textarea>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
        </form>
    </div>
</body>
</html>