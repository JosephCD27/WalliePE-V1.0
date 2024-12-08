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
    <style>
       .botonModal {
            color: #ffff;
            font-weight: bold;
            margin-top: 20px;
            height: 50px !important;
            width: 100% !important;
            background-color: #5745C4;
            border-color: #7C6DD8;
            border-radius: 5px;
            justify-content: center;
        }
        .botonModal:hover, .botonModal:focus{
            background-color: #7C6DD8;
        }
    </style>
</head>
<body>
    <div class="row">
        <p class="tituloModal">Revision de novedad</p>
            <form  class="tarjetaModalEditar"  method="POST" id="form_atender">
                <div class="form_parte1">
                    <div class="novedad_basico">
                        <div class="col s4">
                            <label>Ambiente</label>
                            <input type="text" class="inputModificadoEditar" name="ambiente_nov" value="<?php echo $amb_nom;?>" readonly>
                        </div>
                        <div class="col s4">
                            <label>Usuario</label>
                            <input type="text" class="inputModificadoEditar" name="Usuario" value="<?php echo $usu_nom;?>" readonly> 
                        </div>
                        <div class="col s4">
                            <label>Fecha</label>
                            <input type="text" class="inputModificadoEditar" name="fecha" value="<?php echo $nov_fecha;?>" readonly>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row elementos_reportados">
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
                        <div class="novedad col s12" id="grupo_<?php echo $indice; ?>">
                            <form id="form_atender_<?php echo $indice; ?>">
                                <!-- codigo de la novedad -->
                                    <input type="hidden" name="nov_cod" value="<?php echo $nov_cod;?>">
                                <!-- --------------elementos-------------- -->
                                <div class="col s4">
                                    <label>Elemento</label>
                                    <input type="text" class="inputModificadoEditar" name="elemento[<?php echo $indice; ?>]" value="<?php echo $elem_nom;?>" readonly>

                                    <!-- codigo del elemento asociado a la novedad-->
                                    <input type="hidden" name="cod_elem[<?php echo $indice; ?>]" value="<?php echo $valor["Nov_Elem_Cod"];?>">

                                    <!-- codigo del elemento-->
                                    <input type="hidden" name="cod_elem_puro[<?php echo $indice; ?>]" value="<?php echo $valor["Elem_Cod"];?>">
                                </div>
                                <!-- --------------novedad-------------- -->
                                <div class="col s4">
                                    <label>Tipo novedad</label>
                                    <input type="text" class="inputModificadoEditar" name="tipo[<?php echo $indice; ?>]" value="<?php echo $tipo_nom;?>" readonly>
                                </div>
                                <!-- --------------Estado-------------- -->
                                <div class="col s4">
                                    <label>Estado</label>
                                    <input type="text" class="inputModificadoEditar"  name="estado[<?php echo $indice; ?>]" value="<?php echo $est_nom;?>" readonly>
                                </div>
                                <!-- --------------descripcion-------------- -->
                                <div class="col s4">
                                    <label for="comentario">descripcion:</label>
                                    <textarea id="icon_prefix2"  class="textarea_Modificado_Editar" name="Desc[<?php echo $indice; ?>]" rows="3" cols="20" readonly><?php echo $valor['Nov_Elem_Desc'];?></textarea>
                                </div>
                                <!-- --------------acción-------------- -->
                                <?php if ($est_nom == "En espera") { ?>
                                    <!-- Filtro para la logina -->
                                    <input type="hidden" class="inputModificadoEditar" name="atender" value="atender">

                                    <!-- boton para atender el elemento -->
                                     <div class="row">
                                        <div class="col s12">
                                            <button type="button" class="botonModal" data-indice="<?php echo $indice; ?>" onclick="atenderElemento(this)">Atender</button>
                                        </div>
                                     </div>

                                <?php }else if ($est_nom == "Mantenimiento") { ?>
                                    <!-- Filtro para la logina -->
                                    <input type="hidden" name="por_entregar" value="por_entregar">

                                    <!-- boton para finalizar atención -->
                                     <div class="row">
                                        <div class="col s12">
                                            <button type="button" class="botonModal" data-indice="<?php echo $indice; ?>" onclick="terminarElemento(this)">Entregar</button>
                                        </div>
                                     </div>

                                <?php } ?>
                            </form>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
    </div>
</body>
</html>