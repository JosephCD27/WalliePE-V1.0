<tbody>
    <?php
    if (!isset($dato_vacio)) {
        foreach ($dato as $valor) {
            //llamar el nombre del estado
            $datos= new classCRUD();
            $info_est=$datos->selectBD("estado",null,'Est_Cod',$valor["Est_Cod"]);
            $estado_nombre=$info_est[0]["Est_Nombre"];
            
            if ($estado_nombre!="Anulada" && $estado_nombre!="Finalizada") {
                // llamar el nombre del ambiente
                $info_amb=$datos->selectBD("ambientes",null,"Amb_Cod",$valor["Amb_Cod"]);
                $amb_ref=$info_amb[0]["Amb_Ref"];

    ?>
                <tr>
                    <td class="center"><?php echo $valor["Nov_Cod"];?></td>
                    <td class="center"><?php echo $amb_ref;?></td>
                    <td class="center"><?php echo $valor["Nov_Hora"];?></td>
                    <td class="center"><?php echo $estado_nombre;?></td>
                    <td>
                        <div class="center">
                            <a class="modal-trigger darken-1 tooltipped" data-position="top" data-tooltip="Detalle" href="#modalCrudNovedad" onclick="detalleNovedad('detalle','<?php echo $valor['Amb_Cod']; ?>','<?php echo $valor['Nov_Cod']?>','Nov_Cod')"><i class="fa-solid fa-eye fa-xl" style="color: #FED354;"></i></a>

                            <!-- validacion de botones -->
                            <?php switch ($estado_nombre) {
                                // si mientras el estado sea 'En Espera' permite modificar la novedad
                                case 'Generada':
                                    if ($_SESSION['cod_usu'] === $valor["Usu_Id"]) {
                                        if (tienePermisoModulo(37)) { // Anular Novedades
                                        ?>
                                        <!-- <a class="modal-trigger btn blue tooltipped" data-position="top" data-tooltip="Editar" href="#modalCrudNovedad" onclick="editarNovedad('editar','<?php echo $valor['Amb_Cod']; ?>','<?php echo $valor['Nov_Cod']?>','Nov_Cod')"><i class="material-icons">border_color</i></a> -->
                                        <a class="modal-trigger accent-4 tooltipped" data-position="top" data-tooltip="Anular" href="#modalCrudNovedad" onclick="eliminarNovedad('eliminar','<?php echo $valor['Nov_Cod']?>','Nov_Cod')"><i class="fa-solid fa-trash fa-xl" style="color: #F83F3F;"></i></a>
                                        <?php
                                        }
                                    }
                                    if (tienePermisoModulo(38)) { // Atender Novedades
                                    ?>
                                        <a class="modal-trigger tooltipped" data-position="top" data-tooltip="Atender" href="#modalCrudNovedad" onclick="modalAtender('atender','<?php echo $valor['Amb_Cod']; ?>','<?php echo $valor['Nov_Cod']?>','Nov_Cod')"><i class="fa-solid fa-pen-to-square fa-xl" style="color: #3DB2F5;"></i></a>
                                        <!-- <a class="modal-trigger btn teal darken-1 tooltipped" data-position="top" data-tooltip="Recibir" href="../Controller/controllerNovedades.php?btn_recibir=a&nov_cod=<?php echo $valor['Nov_Cod']?>&campo=Nov_Cod"><i class="material-icons">done_all</i></a> -->
                                    <?php
                                    }
                                    break;
                                case 'En Atencion':
                                    if (tienePermisoModulo(38)) { // Atender Novedades
                                    ?>
                                        <a class="modal-trigger tooltipped" data-position="top" data-tooltip="Atender" href="#modalCrudNovedad" onclick="modalAtender('atender','<?php echo $valor['Amb_Cod']; ?>','<?php echo $valor['Nov_Cod']?>','Nov_Cod')"><i class="fa-solid fa-pen-to-square fa-xl" style="color: #3DB2F5;"></i></a>
                                    <?php
                                    }
                                    break;
                                case 'Atendida':
                                    if ($_SESSION['cod_usu'] === $valor["Usu_Id"]) {
                                    ?>
                                        <a class="modal-trigger tooltipped" data-position="top" data-tooltip="Finalizar Novedad" href="#modalCrudNovedad" onclick="modalFinalizar('finalizar','<?php echo $valor['Nov_Cod']?>','Nov_Cod')"><i class="fa-solid fa-clipboard-check fa-xl" style="color: #941983;"></i></a>
                                    <?php
                                    }
                                    break;
                            }
                            ?>
                        </div>
                    </td>
                </tr>
            <?php
            }
        }
    } else {
        ?>
        <tr>
            <td><p>No se encontró ningun registro</p></td>
        </tr>
        <?php
    }
    ?>
</tbody>