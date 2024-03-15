<?php
    $nombre=$_GET['nom_Usu'];
    $apellido=$_GET['ape_Usu'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.js"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" href="../css/pantallaPrincipal.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!--iconos -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>
<!----<div class="parent" onmouseover="showDiv2()" onmouseout="hideDiv2()">
    <div id="div1">Contenido del Div 1</div>
    <div id="div2">Contenido del Div 2</div>
  </div>---->

    <div class="row">
<!----animacion usuario logeado ---------------------------->
        <div>
            <div class="col s4 offset-s2 contenedorUsuarioIngresado">
                <div class="item tres usuarioIngresado">
                <p>Bienvenid@ <?php echo $nombre." ".$apellido;?></p>
                </div>
            </div>
        </div>
<!----imagen wallie ---------------------------->
        <div class="col s6 contenedorImg">
            <div class="row">
                <img src="../img/L2.png" alt="">
            </div>
        </div>
<!----lado derecho ---------------------------->
        <div class="col s6 contenedorTarjetas"><!--lado derecho -->
            <div class="row">
            <div class="parent" onmouseover="showDiv2()" onmouseout="hideDiv2()">
                <div class="col s4 offset-s2 tarjetas" id="div1">
                    <i class="material-icons medium">account_circle</i>
                    <p>Usuarios</p>
                </div>
                <div class="col s4 offset-s2 tarjetas" id="div2">
                    <p>Usuarios</p> 
                    <!-- <div class="col 2 centrarCrear">
                        <i class="small material-icons green-text text-accent-3">add_circle</i>
                        <a class="modal-trigger" href="#modalCrudRol" onclick="crearUsuario('crear')">Crear usuario</a>
                    </div> -->
                    <div class="col 2 centrarCrear">
                        <i class="small material-icons pink-text text-lighten-2">remove_red_eye</i>
                        <a class="modal-trigger" href="../Usuarios/View/listarUsuario.php" >Listar usuarios</a>
                    </div>
                </div>
            </div>
                

            <div class="parent" onmouseover="showDivRol1()" onmouseout="hideDivRol2()">
            <div class="col s4 tarjetas" id="rol1">
                    <i class="material-icons medium">settings</i>
                    <p>Roles</p>
                </div>
                <div class="col s4 tarjetas" id="rol2">
                    <p>Roles</p> 
                    <!-- <div class="col 2 centrarCrear">
                        <i class="small material-icons green-text text-accent-3">add_circle</i>
                        <a class="modal-trigger"  href="#modalCrudRol" onclick="crearRol('crear')">Crear rol</a>
                    </div> -->
                    <div class="col 2 centrarCrear">
                        <i class="small material-icons pink-text text-lighten-2">remove_red_eye</i>
                        <a class="modal-trigger" href="../Rol/View/listarRol.php" >Listar roles</a>
                    </div>
                </div>
            </div>
            </div>
            <div class="row">
                <a href="../TipoElementos/View/listarTipoElementos.php"><div class="col s4 offset-s2 tarjetas ">
                    <i class="material-icons medium">desktop_windows</i>
                    <p>Tipos de Elementos</p>
                </div></a>

                <div class="col s4 tarjetas">
                    <i class="material-icons medium">business</i>
                    <p>Bloques</p>
                </div>
            </div>
            <div class="row">
                <div class="col s4 offset-s2 tarjetas ">
                    <i class="material-icons medium">dashboard</i>
                    <p>Ambientes</p>
                </div>

                <div class="col s4 tarjetas">
                    <i class="material-icons medium">settings</i>
                    <p>Permisos</p>
                </div>
            </div>
            <div class="row">
                <a href="../Tipo Documento/View/listarDocu.php"><div class="col s4 offset-s2 tarjetas ">
                    <i class="material-icons medium">content_paste</i>
                    <p>Tipo de documento</p>
                </div></a>

                <div class="col s4 tarjetas">
                    <i class="material-icons medium">info</i>
                    <p>otra cosa</p>
                </div>
            </div>
        </div>

    </div>



    <script src="../JS/scriptRoles.js"></script>
    <script src="../JS/jquery-3.7.1.js"></script>
    <script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
    <!-- <script type="text/javascript" src="../materialize/js/materialize.js"></script> -->
    <script type="text/javascript" src="../JS/scriptMaterialize.js"></script>
  <script>
    function showDiv2() {
      document.getElementById('div1').style.display = 'none';
      document.getElementById('div2').style.display = 'block';
    }

    function hideDiv2() {
      document.getElementById('div1').style.display = 'block';
      document.getElementById('div2').style.display = 'none';
    }

    function showDivRol1() {
      document.getElementById('rol1').style.display = 'none';
      document.getElementById('rol2').style.display = 'block';
    }

    function hideDivRol2() {
      document.getElementById('rol1').style.display = 'block';
      document.getElementById('rol2').style.display = 'none';
    }
  </script>
</body>
</html>