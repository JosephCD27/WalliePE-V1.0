<tbody>
<?php
    if (!isset($dato_vacio)) {
        foreach ($dato as $valor) {
            if ($valor['Est_Cod'] == 1) {
                //nombre tipo elemento
                $tabla_nom = "tipo_elemento";
                $campo = "Tipo_Cod";
                $condicion = $valor["Tipo_Cod"];
                $tipo = new classCRUD();
                $info_tipo = $tipo->selectBD($tabla_nom, null, $campo, $condicion);

                //referencia ambiente
                $tabla_nom = "ambientes";
                $campo = "Amb_Cod";
                $condicion = $valor["Amb_Cod"];
                $ambiente = new classCRUD();
                $info_amb = $ambiente->selectBD($tabla_nom, null, $campo, $condicion);
                ?>
                <tr>
                    <td class="center"><?php echo $valor["Elem_Cod"]; ?></td>
                    <td class="center"><?php echo $valor["Elem_Nombre"]; ?></td>
                    <td class="center"><?php echo $valor["Elem_Marca"]; ?></td>
                    <td class="center"><?php echo $info_tipo[0]["Tipo_Nombre"]; ?></td>
                    <td class="center"><?php echo $info_amb[0]["Amb_Ref"]; ?></td>
                    <td class="opciones">
                        <div class="center">
                            <a class="modal-trigger darken-4 tooltipped" data-position="top" data-tooltip="Detalle" href="#modalCrudElemento" onclick="detalleElemento('detalle','<?php echo $valor['Elem_Cod']?>','Elem_Cod')"><i class="fa-solid fa-eye fa-xl" style="color: #FED354;"></i></a>
                            <?php if (tienePermisoModulo(28)) : ?>
                                <a class="modal-trigger tooltipped" data-position="top" data-tooltip="Editar" href="#modalCrudElemento" onclick="editarElemento('editar','<?php echo $valor['Elem_Cod']?>','Elem_Cod')"><i class="fa-solid fa-pen-to-square fa-xl" style="color: #3DB2F5;"></i></a>
                            <?php endif; ?>
                            <?php if (tienePermisoModulo(34)) : ?>
                                <a class="modal-trigger tooltipped" data-position="top" data-tooltip="Eliminar" href="#modalCrudElemento" onclick="eliminarElemento('eliminar','<?php echo $valor['Elem_Cod']?>','Elem_Cod')"><i class="fa-solid fa-trash fa-xl" style="color: #F83F3F;"></i></a>
                            <?php endif; ?>
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


                    
                    
