<tbody>
    <?php
    if (!isset($dato_vacio)) {
        foreach ($dato as $valor) {
    ?>
            <tr>
                <td class="center"><?php echo $valor["id_permiso"];?></td>
                <td class="center"><?php echo $valor["per_nombre"];?></td>
                <td class="center"><?php echo $valor["per_descripcion"];?></td>
                <td>
                    <div class="center">
                    <?php if (tienePermisoModulo(26)) : ?>  
                        <a class="modal-trigger tooltipped" data-position="top" data-tooltip="Editar" href="#modalCrudPermiso" onclick="editarPermiso('editar','<?php echo $valor['id_permiso']?>','id_permiso')"><i class="fa-solid fa-pen-to-square fa-xl" style="color: #3DB2F5;"></i></a>
                    <?php endif; ?> 
                    <?php if (tienePermisoModulo(32)) : ?> 
                        <a class="modal-trigger tooltipped" data-position="top" data-tooltip="Eliminar" href="#modalCrudPermiso" onclick="eliminarPermiso('eliminar','<?php echo $valor['id_permiso']?>','id_permiso')"><i class="fa-solid fa-trash fa-xl" style="color: #F83F3F;"></i></a>
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
