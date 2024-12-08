<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar rOl</title>
    <link rel="stylesheet" href="../../CSS_N/generalModales.css">
    <link rel="stylesheet" href="../../MATERIALIZE/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" src="../../JS/jquery-3.7.1.js"></script>
    <script type="text/javascript" src="../../MATERIALIZE/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../JS/scriptMaterialize.js"></script>
</head>
</head>
<body>
    <div class="row">
        <p class="tituloModal">Editar Usuario</p>
        <form class="tarjetaModalEditar" id="form_editar" method="POST">
            <div class="row">
                <div class="col s6">
                    <label>Seleccionar Rol</label>
                    <select name="upd_rol"  id="Rol_Cod">
                        <?php
                        echo $option_rol;
                        ?>
                    </select>
                </div>
                <div class="col s6">
                    <label>Seleccionar Documento</label>
                    <select name="upd_tdoc" id="Docu_Cod">
                        <?php
                        echo $option_doc;
                        ?>
                    </select>
                </div>
                <div class="col s6">
                    <label for="" class="labelModificado active">Nombre del Usuario</label>
                    <input type="hidden" name="upd_id" id="Usu_Id" value="<?php echo $Usu_Id;?>">
                    <input type="hidden" name="camp_pk" value="Usu_id">
                    <input placeholder="Nombre" id="Usu_Nombre" name="upd_nom" type="text" class="inputModificadoEditar" value="<?php echo $Usu_Nombre;?>">
                </div>
                <div class="col s6">
                    <label for="" class="labelModificado active">Apellido del Usuario</label>
                    <input placeholder="Apellido" id="Usu_Apellido" name="upd_ape" type="text" class="inputModificadoEditar" value="<?php echo $Usu_Apellido;?>">
                </div>
                <div class="col s6">
                    <label for="" class="labelModificado active">Correo del Usuario</label>
                    <input placeholder="Correo" id="Usu_Correo" name="upd_cor" type="Email" class="inputModificadoEditar" value="<?php echo $Usu_Correo;?>">
                </div>
                <div class="col s6">
                    <label for="" class="labelModificado active">Telefono del Usuario</label>
                    <input placeholder="Telefono" id="Usu_Telefono" name="upd_tel" type="number" class="inputModificadoEditar" value="<?php echo $Usu_Telefono;?>">
                </div>
                <div class="col s6">
                    <label for="" class="labelModificado active">Contraseña del Usuario</label>
                    <input placeholder="Contraseña" id="Usu_Clave" name="upd_con" type="text" class="inputModificadoEditar" value="<?php echo $Usu_Contraseña;?>">
                </div>
                <div class="mensaje_error"></div>
            </div>
            <div class="centrarBoton">
                <button type="button" class="btnFormulario botonModal" onclick="consultaEditar()">Editar</button>
            </div>
        </form>
    </div>
    <script type="text/javascript" src="../../JS/scriptMaterialize.js"></script>
</body>
</html>