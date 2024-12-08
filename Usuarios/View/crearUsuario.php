<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear rol</title>
    <link rel="stylesheet" href="../../CSS_N/generalModales.css">
    <link rel="stylesheet" href="../../MATERIALIZE/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" src="../../JS/jquery-3.7.1.js"></script>
    <script type="text/javascript" src="../../MATERIALIZE/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../JS/scriptMaterialize.js"></script>
</head>
<body>
    <div class="row">
        <p class="tituloModal">Crear Usuario</p>
        <form class="tarjetaModalCrear" id="form_crear" method="POST">
            <div class="row">
                <div class="col s6">
                    <label for="" class="labelModificado active">Numero de documento</label>
                    <input placeholder="Documento" type="text" class="inputModificadoCrear" id="Usu_Id" name="Usu_Id">
                </div>
                <div class="col s6">
                    <label>Seleccionar Tipo Documento</label>
                    <select name="Docu_Cod" id="Docu_Cod">
                        <?php
                            $tabla_nom = "tipo_documento";
                            $campo = $_POST["opciones"]??null;
                            $condicion = $_POST["condicion"]??null;
                            $parametros=null;
                            $listar_Usuarios = new classCRUD();
                            $datos = $listar_Usuarios->selectBD($tabla_nom,$parametros,$campo,$condicion);
                            ?>
                            <option class="center" name="Docu_Cod" value="defecto">--seleccionar--</option>
                            <?php
                            foreach ($datos as $valor) {
                                ?>
                                <option class="center" name="Docu_Cod" value=<?php echo $valor["Docu_Cod"];?>><?php echo $valor["Docu_Nom"];?></option>
                                <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="col s6">
                    <label for="" class="labelModificado active">Nombre</label>
                    <input placeholder="Nombre" type="text" class="inputModificadoCrear" id="Usu_Nombre" name="Usu_Nombre">
                </div>
                <div class="col s6">
                    <label for="" class="labelModificado active">Apellido</label>
                    <input placeholder="Apellido" type="text" class="inputModificadoCrear" id="Usu_Apellido" name="Usu_Apellido">
                </div>
                <div class="col s6">
                    <label for="" class="labelModificado active">Correo</label>
                    <input placeholder="Correo" type="Email" class="inputModificadoCrear" id="Usu_Correo" name="Usu_Correo">
                </div>
                <div class="col s6">
                    <label for="" class="labelModificado active">Telefono</label>
                    <input placeholder="Telefono" type="text" class="inputModificadoCrear" id="Usu_Telefono" name="Usu_Telefono">
                </div>
                <div class="col s6">
                    <label for="" class="labelModificado active">Contraseña</label>
                    <input placeholder="Contraseña" type="text" class="inputModificadoCrear" id="Usu_Clave" name="Usu_Clave">
                </div>
                <div class="col s6">
                    <label>Seleccionar Rol</label> 
                    <select name="Rol_Cod" id="Rol_Cod">
                        <?php
                            $tabla_nom = "Rol";
                            $campo = $_POST["opciones"]??null;
                            $condicion = $_POST["condicion"]??null;
                            $parametros=null;
                            $datos = $listar_Usuarios->selectBD($tabla_nom,$parametros,$campo,$condicion);
                            ?>
                                <option class="center" name="Rol_Cod" value="defecto">--seleccionar--</option>
                            <?php
                            foreach ($datos as $valor) {
                                ?>
                                <option class="center" name="Rol_Cod" value=<?php echo $valor["Rol_Cod"];?>><?php echo $valor["Rol_Nombre"];?></option>
                                <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="mensaje_error"></div>
            </div>
            <div class="centrarBoton">
            <input type="hidden"  name="tabla_nom" value="Usuario">
            <button type="button" class="btnFormulario botonModal" onclick="consultaCrear()">Registrar</button>
        </div>
        </form>
    </div>
    <script type="text/javascript" src="../../JS/scriptMaterialize.js"></script>
</body>
</html>