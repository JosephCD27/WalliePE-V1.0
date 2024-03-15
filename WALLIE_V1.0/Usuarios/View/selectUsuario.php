<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ver Usuarioes</title>
</head>
<body>
    <table class="highlight tabla">
        <tbody>
            <?php
                foreach ($dato as $valor) {
                    ?>
                      <tr>
                          <td class="center"><?php echo $valor["Usu_Id"];?></td>
                          <td class="center"><?php echo $valor["Usu_Nombre"];?></td>
                          <td class="center"><?php echo $valor["Usu_Apellido"];?></td>
                          <td class="center"><?php echo $valor["Usu_Telefono"];?></td>
                          <td>
                              <div class="center">
                                  <a class="modal-trigger btn blue tooltipped" data-position="top" data-tooltip="Editar" href="#modalCrudUsuario" onclick="editarUsuario('editar','<?php echo $valor['Usu_Id']?>','Usu_Id')"><i class="material-icons">border_color</i></a>
                                  <a class="modal-trigger btn red tooltipped" data-position="top" data-tooltip="Eliminar" href="#modalCrudUsuario" onclick="eliminarUsuario('eliminar','<?php echo $valor['Usu_Id']?>','Usu_Id')"><i class="material-icons">cancel</i></a>
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