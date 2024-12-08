<tbody>
    <?php
    if (!isset($dato_vacio)) {
        foreach ($dato as $valor) {
    ?>
            <tr>
                <td class="center"><?php echo $valor["Amb_Cod"];?></td>
                <td class="center"><?php echo $valor["Amb_Ref"];?></td>
                <td class="center"><?php echo $valor["Amb_Desc"];?></td>
                <td>
                    <div class="center">
                        <a class="modal-trigger darken-4 tooltipped" data-position="top" data-tooltip="Detalle" href="#modalCrudAmbientes" onclick="detalleAmbientes('detalle','<?php echo $valor['Amb_Cod']?>','Amb_Cod')"><i class="fa-solid fa-eye fa-xl" style="color: #FED354;"></i></a>
                        <?php if (tienePermisoModulo(29)) : ?>
                            <a class="modal-trigger tooltipped" data-position="top" data-tooltip="Editar" href="#modalCrudAmbientes" onclick="editarAmbientes('editar','<?php echo $valor['Amb_Cod']?>','Amb_Cod')"><i class="fa-solid fa-pen-to-square fa-xl" style="color: #3DB2F5;"></i></a>
                        <?php endif; ?>
                        <?php if (tienePermisoModulo(33)) : ?>
                            <a class="modal-trigger tooltipped" data-position="top" data-tooltip="Eliminar" href="#modalCrudAmbientes" onclick="eliminarAmbientes('eliminar','<?php echo $valor['Amb_Cod']?>','Amb_Cod')"><i class="fa-solid fa-trash fa-xl" style="color: #F83F3F;"></i></a>
                        <?php endif; ?>
                    </div>
                </td>
            </tr>
    <?php
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
