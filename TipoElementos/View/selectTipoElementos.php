<tbody>
    <?php
    if (!isset($dato_vacio)) {
        foreach ($dato as $valor) {
    ?>
            <tr>
                <td class="center"><?php echo $valor["Tipo_Cod"];?></td>
                <td class="center"><?php echo $valor["Tipo_Nombre"];?></td>
                <td class="center"><?php echo $valor["Tipo_Desc"];?></td>
                <td>
                    <div class="center">
                    <?php if (tienePermisoModulo(41)) : ?>
                            <a class="modal-trigger tooltipped" data-position="top" data-tooltip="Editar" href="#modalCrudTipoElementos" onclick="editarTipoElementos('editar','<?php echo $valor['Tipo_Cod']?>','Tipo_Cod')"><i class="fa-solid fa-pen-to-square fa-xl" style="color: #3DB2F5;"></i></a>
                        <?php endif; ?>
                        <?php if (tienePermisoModulo(42)) : ?>
                            <a class="modal-trigger tooltipped" data-position="top" data-tooltip="Eliminar" href="#modalCrudTipoElementos" onclick="eliminarTipoElementos('eliminar','<?php echo $valor['Tipo_Cod']?>','Tipo_Cod')"><i class="fa-solid fa-trash fa-xl" style="color: #F83F3F;"></i></a>
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
