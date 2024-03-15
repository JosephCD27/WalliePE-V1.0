<?php //no lo quites para optimizar, se cae todo :c
    include "../Controller/controllerUsuarios.php";
?> 
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <title>Ver roles</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../../MATERIALIZE/css/materialize.min.css"  media="screen,projection"/>


    <link rel="stylesheet" href="../../CSS/listarRol.css">
</head>
<body>
    <div class="container">
        <div class="fondoForm">
            <div class="col s12">
            <span class="center titulo1"><h5>Usuarios</h5></span>
                <div class="row tituloContenedorFiltro">
                    <div class="col s12">
                        <br><span class="flow-text left titulo1"><h6>Buscar por:</h6></span>
                    </div>
                </div>
                <div class="contenedorFiltro">
                    <form method="post">
                        <div>
                            <div class="input-field col s12">
                                <select id="opciones" name="opciones">
                                    <option value="Usu_Id">Documento</option>
                                    <option value="Usu_Nombre">Nombre</option>
                                    <option value="Usu_Apellido">Apellido</option>
                                </select>  
                            </div>
                        </div>
                        <div>
                            <div class="input-field">
                                <input placeholder="Escribe" id="a" name="condicion" type="text" class="validate inputModificado" OnKeyUp="buscarUsuario(this.value, document.getElementById('opciones').value)">
                                <label for="a" class="labelModificado">buscar</label>
                            </div>
                        </div>
                        <div class="crear">
                            <a class="modal-trigger btn green tooltipped" data-position="top" data-tooltip="Crear" href="#modalCrudUsuario" onclick="crearUsuario('crear')"><i class=" material-icons">add_circle</i></a>
                        </div>
                    </form>
                </div>
                <div>

                </div>
                <div class="contenedor_lista">
                    <table class="highlight tabla centered">
                        <thead>
                                <th>Documento</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Número</th>
                                <th>Opciones</th>
                        </thead>
                    </table>
                    <div id="tblUsuario" class="lista">
                            <?php
                                include("selectUsuario.php");
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!----------------- inicio Modal del CRUD ---------------------------------------->
    <div id="modalCrudUsuario" class="modal modal-fixed-footer">
        <div class="modal-content">
            <!--Contenido-->
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat"><i class="material-icons">close</i></a>
        </div>
    </div>
    <!----------------- final Modal del CRUD ---------------------------------------->




            <div class="fixed-action-btn">
                <a class="btn-floating btn-large red ">
                    <i class="large material-icons ">mode_edit</i>
                </a>
                <ul>
                    <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
                    <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
                    <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
                    <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
                </ul>
            </div>
    <script>

    </script>

    <!-----------------Conexiones con archivos de JavaScript----------------------------->
    <script type="text/javascript" src="../../JS/scriptUsuarios.js"></script>
    <script type="text/javascript" src="../../JS/jquery-3.7.1.js"></script>
    <script type="text/javascript" src="../../MATERIALIZE/js/materialize.min.js"></script>
    <!-- <script type="text/javascript" src="../materialize/js/materialize.js"></script> -->
    <script type="text/javascript" src="../../JS/scriptMaterialize.js"></script>
    <script>
        $(document).ready(function(){
            $('.tooltipped').tooltip();
        });
    </script>
</body>
</html>