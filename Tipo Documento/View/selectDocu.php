<tbody>
    <?php
    if (!isset($dato_vacio)) {
        foreach ($dato as $valor) {
    ?>
            <tr>
                <td class="center"><?php echo $valor["Docu_Cod"];?></td>
                <td class="center"><?php echo $valor["Docu_Nom"];?></td>
                <td class="center"><?php echo $valor["Docu_des"];?></td>
                <td>
                    <div class="center">
                        <?php if (tienePermisoModulo(44)) : ?>
                            <a class="modal-trigger tooltipped" data-position="top" data-tooltip="Editar" href="#modalCrudDocu" onclick="editarDocu('editar','<?php echo $valor['Docu_Cod']?>','Docu_Cod')"><i class="fa-solid fa-pen-to-square fa-xl" style="color: #3DB2F5;"></i></a>
                            <?php endif; ?>    
                        <?php if (tienePermisoModulo(45)) : ?>   
                            <a class="modal-trigger tooltipped" data-position="top" data-tooltip="Eliminar" href="#modalCrudDocu" onclick="eliminarDocu('eliminar','<?php echo $valor['Docu_Cod']?>','Docu_Cod')"><i class="fa-solid fa-trash fa-xl" style="color: #F83F3F;"></i></a>
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