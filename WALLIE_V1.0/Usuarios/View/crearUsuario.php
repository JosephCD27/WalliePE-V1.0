<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear rol</title>
    <link rel="stylesheet" href="../../CSS/crearRol.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> <!-- materialize css -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!--iconos -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>
    <div class="row">
        <span class="flow-text center titulo2"><h5>Crear Usuario</h5></span>
        <div class="container contenedorCrear">
            <form class="col s6 offset-s3" method="POST">
                <div class="row">
                    <div class="input-field col s12">
                        <input placeholder="Docuemnto" type="text" class="inputModificado" name="Usu_Id">
                        <label for="" class="labelModificado active">Numero de documento</label>
                    </div>
                    <div class="input-field col s12">
                        <input placeholder="Nombre" type="text" class="inputModificado" name="Usu_Nombre">
                        <label for="" class="labelModificado active">Nombre</label>
                    </div>
                    <div class="input-field col s12">
                        <input placeholder="Apellido" type="text" class="inputModificado" name="Usu_Apellido">
                        <label for="" class="labelModificado active">Apellido</label>
                    </div>
                    <div class="input-field col s12">
                        <input placeholder="Correo" type="Email" class="inputModificado" name="Usu_Correo">
                        <label for="" class="labelModificado active">Correo</label>
                    </div>
                    <div class="input-field col s12">
                        <input placeholder="Telefono" type="text" class="inputModificado" name="Usu_Telefono">
                        <label for="" class="labelModificado active">Telefono</label>
                    </div>
                    <div class="input-field col s12">
                        <input placeholder="Contraseña" type="text" class="inputModificado" name="Usu_Contraseña">
                        <label for="" class="labelModificado active">Contraseña</label>
                    </div>
                    <div>
                        <select>
                            <?php
                                $tabla_nom = "Rol";
                                $campo = $_POST["opciones"]??null;
                                $condicion = $_POST["condicion"]??null;
                                $listar_Usuarios = new classCRUD();
                                $datos = $listar_Usuarios->selectBD($tabla_nom,$campo,$condicion);

                                foreach ($datos as $valor) {
                                    ?>
                                    <option class="center" name="Rol" value=<?php echo $valor["Rol_Nombre"];?>><?php echo $valor["Rol_Nombre"];?></option>
                                    <?php
                                }

                            ?>
                        </select>
                    </div>
                    <div class="col s12">
                        <input type="hidden"  name="tabla_nom" value="Usuario">
                        <input type="submit" class="btnFormulario" name="registrar" onclick="consultaCrear()" value="Registrar">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>