<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ver roles</title>
</head>
<body>
    <table class="highlight tabla">
        <tbody>
            <?php
                foreach ($dato as $valor) {
                    ?>
                      <tr>
                          <td class="center"><?php echo $valor["Rol_Cod"];?></td>
                          <td class="center"><?php echo $valor["Rol_Nombre"];?></td>
                          <td class="center"><?php echo $valor["Rol_Desc"];?></td>
                          <td>
                              <div class="center">
                                  <a class="modal-trigger btn blue tooltipped" data-position="top" data-tooltip="Editar" href="#modalCrudRol" onclick="editarRol('editar','<?php echo $valor['Rol_Cod']?>','Rol_Cod')"><i class="material-icons">border_color</i></a>
                                  <a class="modal-trigger btn red tooltipped" data-position="top" data-tooltip="Eliminar" href="#modalCrudRol" onclick="eliminarRol('eliminar','<?php echo $valor['Rol_Cod']?>','Rol_Cod')"><i class="material-icons">cancel</i></a>
                              </div>
                          </td>
                      </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
</body>
</html>
<?php
?>