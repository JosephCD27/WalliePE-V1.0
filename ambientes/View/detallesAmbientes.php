<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle Elemento</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> <!-- materialize css -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="../../CSS_N/generalModales.css">
    <link rel="stylesheet" href="../../CSS_N/generalListar.css">
</head>
<body>
<div class="row">
    <p class="tituloModal">Elementos del ambiente</p>
        <br>
        <table class="table highlight">
            <thead>
                <tr>
                    <th class="center">Codigo</th>
                    <th class="center">Nombre</th>
                    <th class="center">Marca</th>
                    <th class="center">Serial</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($info as $valor) {
                        if ($valor['Est_Cod']==1) {
                ?>
                            <tr>
                                <td class="center"><?php echo $valor["Elem_Cod"];?></td>
                                <td class="center"><?php echo $valor["Elem_Nombre"];?></td>
                                <td class="center"><?php echo $valor["Elem_Marca"];?></td>
                                <td class="center"><?php echo $valor["Elem_Serial"];?></td>
                            </tr>
                <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
    <script type="text/javascript" src="../../JS/jquery-3.7.1.js"></script>
    <script type="text/javascript" src="../../MATERIALIZE/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../JS/scriptMaterialize.js"></script>
</body>
</html>