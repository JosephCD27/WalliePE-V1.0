<tbody>
    <?php
    if (!isset($dato_vacio)) {
        foreach ($dato as $valor) {
            if ($valor['Est_Cod'] == 1) {
                ?>
                    <tr>
                        <td class="center"><?php echo $valor["Rol_Cod"];?></td>
                        <td class="center"><?php echo $valor["Rol_Nombre"];?></td>
                        <td class="center"><?php echo $valor["Rol_Desc"];?></td>
                        <td>
                            <div class="center">
                            <?php if (tienePermisoModulo(39)) : ?>
                                <a class="modal-trigger tooltipped" data-position="top" data-tooltip="Modificar Permisos" href="#modalCrudRol" onclick="editarPermisos('editar','permisos','<?php echo $valor['Rol_Cod']?>')"><i class="fa-solid fa-eye fa-xl" style="color: #FED354;"></i></a>
                            <?php endif; ?>  
                            <?php if (tienePermisoModulo(25)) : ?>
                                <a class="modal-trigger tooltipped" data-position="top" data-tooltip="Editar" href="#modalCrudRol" onclick="editarRol('editar','<?php echo $valor['Rol_Cod']?>','Rol_Cod')"><i class="fa-solid fa-pen-to-square fa-xl" style="color: #3DB2F5;"></i></a>
                            <?php endif; ?>  
                            <?php if (tienePermisoModulo(31)) : ?>
                                <a class="modal-trigger tooltipped" data-position="top" data-tooltip="Eliminar" href="#modalCrudRol" onclick="eliminarRol('eliminar','<?php echo $valor['Rol_Cod']?>','Rol_Cod')"><i class="fa-solid fa-trash fa-xl" style="color: #F83F3F;"></i></a>
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