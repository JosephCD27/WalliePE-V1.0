<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../../materialize/css/materialize.min.css"  media="screen,projection"/>
    
    <link rel="stylesheet" href="../../css/login.css">
</head>
<body>
    <div class="cuadrados">
        <div class="c1"></div>
        <div class="c2"></div>
    </div>
    <div class="gridLogin">
        <div class="tarjForm">
            <form id="login_usuario" method="POST">
                <h1 class="titulo">Wallie</h1>
                <div class="inputContainer">
                    <input type="text" placeholder="Documento" id="documento" name="documento">
                </div>
                <div class="inputContainer">
                    <input type="password" placeholder="Contraseña" id="password" name="password">
                </div>

                <input type="hidden" id="campo_doc" name="campo_doc" value="Usu_Id">
                <button type="button" onclick="consultaUsuario()">Ingresar</button>
            </form>
        </div>
        <div class="imgLogin">
            <img src="../../img/L1-t.png" alt="">
        </div>
        <div class="footerAyuda">
            <footer>
                <div class="iconoHerramienta">
                    <div class="fixed-action-btn">
                        <a class="btn-floating btn-large red">
                          <i class="large material-icons">settings</i>
                        </a>
                        <ul>
                          <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
                          <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
                          <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
                          <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!----------------- inicio Modal del login---------------------------------------->
    <div id="modal_Login" class="modal modal-fixed-footer">
        <div class="modal-content">
            <!--Contenido-->
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat"><i class="material-icons">close</i></a>
        </div>
    </div>
    <!----------------- final Modal del login ---------------------------------------->

    <!-----------------Conexiones con archivos de JavaScript----------------------------->
    <script src="../../JS/scriptLogin.js"></script>
    <script src="../../JS/jquery-3.7.1.js"></script>
    <script type="text/javascript" src="../../materialize/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../materialize/js/materialize.js"></script>
    <script type="text/javascript" src="../../JS/scriptMaterialize.js"></script>
    <script>
        $(document).ready(function(){
            $('.tooltipped').tooltip();
        });
    </script>
</body>
</html>