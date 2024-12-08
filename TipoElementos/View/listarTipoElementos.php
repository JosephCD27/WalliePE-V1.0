<?php
    session_start();
    $modulos = $_SESSION['permisos'];

    function tienePermisoModulo($permiso) {
        global $modulos;
        if ($modulos) {
            foreach ($modulos as $valores) {
                $permisos = explode(',', $valores['permisos']);

                if (in_array($permiso, $permisos)) {
                    return true;
                }
            }
        }
        return false;
    }

    include "../Controller/controllerTipoElementos.php";
?> 
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <title>Tipo de elemento</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/fontawesome.min.css" integrity="sha512-xXkCeYSSuCWpUAhDUIWJdCI9xm0uzrOVuONuGIx7NTRHwTFSCDS3WwNqlSEeNDK2TJggwgsfdDUpb05c7XK2yA==" crossorigin="anonymous" />
    <link type="text/css" rel="stylesheet" href="../../MATERIALIZE/css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" href="../../DataTables/datatables.min.css">
    <link rel="stylesheet" href="../../CSS_N/generalListar.css">
</head>
<body>
<?php include("../../Navbar/View/navbar.php"); ?>
<!--<a class="modal-trigger btn green tooltipped" data-position="top" data-tooltip="Crear" href="#modalCrudTipoElementos" onclick="crearTipoElementos('crear')"><i class=" material-icons">add_circle</i></a>-->
    <div class="content-container">
        <div id="particles-js"></div> <!-- le da el estilo de las particulas al fondo-->
        <div class="container">
            <div class="fondo">
                <p class="titulo">Tipo de elementos</p>
                <?php if (tienePermisoModulo(40)) : ?>
                    <div class="dt-container crear">
                        <a class="modal-trigger tooltipped" data-position="top" data-tooltip="Crear" href="#modalCrudTipoElementos" onclick="crearTipoElementos('crear')"><i class="fa-solid fa-circle-plus fa-2xl" style="color: #7AE7B4;"></i></a>
                    </div>
                <?php endif; ?>
                <table class="table highlight display"  id="identificadorDataTables">
                    <thead>
                        <tr>
                            <th class="center">Codigo</th>
                            <th class="center">Nombre</th>
                            <th class="center">Descripción</th>
                            <th class="center">Acciones</th>
                        </tr>
                    </thead>
                    <div id="tblTipo" class="lista">
                        <?php
                        include("selectTipoElementos.php");
                        ?>
                    </div>
                </table>
            </div>
        </div>
    </div>


    <!----------------- inicio Modal del CRUD ---------------------------------------->
    <div id="modalCrudTipoElementos" class="modal">
        <div class="modal-content">
            <!--Contenido-->
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat"><i class="fa-solid fa-xmark fa-xl"></i></a>
        </div>
    </div>
    <!----------------- final Modal del CRUD ---------------------------------------->


<!-----------------Conexiones con archivos de JavaScript----------------------------->
    <script type="text/javascript" src="../../JS/scriptTipoElementos.js"></script>
<!-- JQUERY SCRIPT-->
    <script type="text/javascript" src="../../JS/jquery-3.7.1.js"></script>
<!-- DATATABLES SCRIPT -->
    <script type="text/javascript" src="../../DataTables/datatables.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#identificadorDataTables').DataTable({
                //dom organiza la posicion de todo en la tabla
                dom: '<"justify-content-between"lfB>rtip',
                //boton para descarga de archivos
                buttons: [
                    {
                        extend: "excelHtml5",
                        text: "<i class='fa-solid fa-file-excel fa-xl' style='color: #FFFF;'></i>",
                        titleAttr: "Exportar a Excel",
                        className: "btn"
                    },
                    {
                        extend: "pdfHtml5",
                        text: "<i class='fa-solid fa-file-pdf fa-xl' style='color: #FFFF;'></i>",
                        titleAttr: "Exportar a pdf",
                        className: "btn"
                    }
                ],
                //lista en el select la cantidad de registros que se quiere visualizar por pagina
                lengthMenu: [5, 10, 25, 50],
                
                columnDefs: [
                    { className: 'dt-center', targets: '_all' },
                    { width: '2%' } //cambia tamaño de columnas
                ],
                //cantidad de registros iniciales que se muestran por pagina
                pageLength: 3,
                //cambia el lenguaje del contenido
                /*language: {
                    url: '//cdn.datatables.net/plug-ins/2.0.8/i18n/es-ES.json'
                }*/
       language: {
            processing: "Procesando...",
            search: "Filtro de busqueda:",
            lengthMenu: "Cant. registros _MENU_ ",
            info: "Mostrando desde _START_ hasta _END_ de _TOTAL_ registros",
            infoEmpty: "Mostrando 0 hasta 0 de 0 registros",
            infoFiltered: "(filtrado de _MAX_ registros en total)",
            infoPostFix: "",
            loadingRecords: "Cargando registros...",
            zeroRecords: "No se encontraron registros que coincidan con su busqueda",
            emptyTable: "No hay registros en la tabla",
            /*
            paginate: {
                first: "Primero",
                previous: "Anterior",
                next: "Siguiente",
                last: "Último"
            },
            */
            aria: {
                sortAscending: ": activar para ordenar la columna ascendente",
                sortDescending: ": activar para ordenar la columna descendente"
            }
        },
            });
        });
    </script>
<!-- PARTICLES.JS-MASTER SCRIPT-->
    <script src="../../particles.js-master/demo/js/lib/particles.js"></script>
    <script src="../../particles.js-master/demo/js/lib/app.js"></script>
    <script src="../../particles.js-master/demo/js/lib/stats.js"></script>
<!--INICIO MATERIALIZE SCRIPT-->    
    <script type="text/javascript" src="../../MATERIALIZE/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../JS/scriptMaterialize.js"></script>
<!--FONTAWESOME ICONOS SCRIPT--> 
    <script src="https://kit.fontawesome.com/b78e465c40.js" crossorigin="anonymous"></script>
</body>
</html>