<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ver tipo de elementos</title>
</head>
<body>
    <table class="highlight tabla">
        <tbody>
            <?php
                foreach ($dato as $valor) {
                    ?>
                      <tr>
                          <td class="center"><?php echo $valor["Tipo_Cod"];?></td>
                          <td class="center"><?php echo $valor["Tipo_Nombre"];?></td>
                          <td class="center"><?php echo $valor["Tipo_Desc"];?></td>
                          <td>
                              <div class="center">
                                  <a class="modal-trigger btn blue tooltipped" data-position="top" data-tooltip="Editar" href="#modalCrudTipoElementos" onclick="editarTipoElementos('editar','<?php echo $valor['Tipo_Cod']?>','Tipo_Cod')"><i class="material-icons">border_color</i></a>
                                  <a class="modal-trigger btn red tooltipped" data-position="top" data-tooltip="Eliminar" href="#modalCrudTipoElementos" onclick="eliminarTipoElementos('eliminar','<?php echo $valor['Tipo_Cod']?>','Tipo_Cod')"><i class="material-icons">cancel</i></a>
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