<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ver Tipo de Documento</title>
</head>
<body>
    <table class="highlight tabla">
        <tbody>
            <?php
                foreach ($dato as $valor) {
                    ?>
                      <tr>
                          <td class="center"><?php echo $valor["Docu_Cod"];?></td>
                          <td class="center"><?php echo $valor["Docu_Nom"];?></td>
                          <td class="center"><?php echo $valor["Docu_des"];?></td>
                          <td>
                              <div class="center">
                                  <a class="modal-trigger btn blue tooltipped" data-position="top" data-tooltip="Editar" href="#modalCrudDocu" onclick="editarDocu('editar','<?php echo $valor['Docu_Cod']?>','Docu_Cod')"><i class="material-icons">border_color</i></a>
                                  <a class="modal-trigger btn red tooltipped" data-position="top" data-tooltip="Eliminar" href="#modalCrudDocu" onclick="eliminarDocu('eliminar','<?php echo $valor['Docu_Cod']?>','Docu_Cod')"><i class="material-icons">cancel</i></a>
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