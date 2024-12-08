<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicia sesion</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../../materialize/css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" href="../../CSS_N/login.css">
</head>
<body>
    <div class="content-container">
    <div id="particles-js"></div> <!-- le da el estilo de las particulas al fondo      col s12 offset-s7 m5 l4 xl4-->
        <div class="contenedor" id="contenedorLogin">
            <div class="row contenedorInputs">
                <div class="col s6 offset-s7 imagenLogo center">
                    <span><img src="../../IMG/logoLetras.png" alt=""></span>
                </div>
                <form id="login_usuario" method="POST">
                    <div class="col s6 offset-s7">
                        <input  type="text" placeholder="Documento" id="documento" name="documento">
                    </div>  
                    <div class="col s6 offset-s7">
                        <input type="password" placeholder="Contraseña" id="password" name="password">
                    </div>
                    <div class="col s6 offset-s7 olvideContrasena">
                        <a href="">Olvide mi contraseña</a>
                    </div>
                    <div class="col s6 offset-s7 boton">
                        <input type="hidden" id="campo_doc" name="campo_doc" value="Usu_Id">
                        <button id="boton" class="btn" type="button" onclick="consultaUsuario()">Ingresar</button>
                    </div>  
                </form>
            </div>
        </div>
    </div>

<!-- MODAL CRUD LOGIN-->
    <div id="modal_Login" class="modal">
        <div class="modal-content"><!-- contenido--></div>
        <div class="modal-footer">
            <a href="#!" class="modal-close  blue lighten-2 btn-flat"><i class="material-icons">close</i></a>
        </div>
    </div>
<!-- FIN MODAL-->


    <script src="../../JS/scriptLogin.js"></script>
<!-- JQuery SCRIPT-->
    <script src="../../JS/jquery-3.7.1.js"></script>
<!-- PARTICLES.JS-MASTER SCRIPT-->
    <script src="../../particles.js-master/demo/js/lib/login/particles.js"></script>
    <script src="../../particles.js-master/demo/js/lib/login/app.js"></script>
    <script src="../../particles.js-master/demo/js/lib/login/stats.js"></script>
<!--MATERIALIZE SCRIPT-->    
    <script type="text/javascript" src="../../materialize/js/materialize.js"></script>
    <script type="text/javascript" src="../../JS/scriptMaterialize.js"></script>

</body>






















<!--
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
                <button id="boton" type="button" onclick="consultaUsuario()">Ingresar</button>
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


    <div id="modal_Login" class="modal">
        <div class="modal-content">
     
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close  blue lighten-2 btn-flat"><i class="material-icons">close</i></a>
        </div>
    </div>



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
-->