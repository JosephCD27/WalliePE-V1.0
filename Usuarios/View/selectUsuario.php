<tbody>
    <?php
    if (!isset($dato_vacio)) {
        foreach ($dato as $valor) {
            if ($valor['Est_Cod']== 1) {
                ?>
                    <tr>
                        <td class="center"><?php echo $valor["Usu_Id"];?></td>
                        <td class="center"><?php echo $valor["Usu_Nombre"];?></td>
                        <td class="center"><?php echo $valor["Usu_Apellido"];?></td>
                        <td class="center"><?php echo $valor["Usu_Telefono"];?></td>
                        <td>
                            <div class="center">
                                <a class="modal-trigger darken-4 tooltipped" data-position="top" data-tooltip="Detalle" href="#modalCrudUsuario" onclick="detalleUsuario('detalle','<?php echo $valor['Usu_Id']?>','Usu_Id')"><i class="fa-solid fa-eye fa-xl" style="color: #FED354;"></i></a>
                                <?php if (tienePermisoModulo(24)) : ?>   
                                    <a class="modal-trigger tooltipped" data-position="top" data-tooltip="Editar" href="#modalCrudUsuario" onclick="editarUsuario('editar','<?php echo $valor['Usu_Id']?>','Usu_Id')"><i class="fa-solid fa-pen-to-square fa-xl" style="color: #3DB2F5;"></i></a>
                                <?php endif; ?>
                                <?php if (tienePermisoModulo(30)) : ?>   
                                    <a class="modal-trigger tooltipped" data-position="top" data-tooltip="Eliminar" href="#modalCrudUsuario" onclick="eliminarUsuario('eliminar','<?php echo $valor['Usu_Id']?>','Usu_Id')"><i class="fa-solid fa-trash fa-xl" style="color: #F83F3F;"></i></a>                                <?php endif; ?>
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