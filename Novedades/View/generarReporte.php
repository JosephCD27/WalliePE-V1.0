<?php
    date_default_timezone_set('America/Bogota');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>generar PDF</title>
    <link rel="stylesheet" href="../../CSS_N/generalModales.css">
</head>
    <body>
        <div class="row">
            <p class="tituloModal">Generar Informe</p>
            <div id="FormPDF">
            <form action="../Controller/controllerNovedades.php" method="POST" class="tarjetaModalCrear" id="formPDF">
                <div class="col s6">
                    <label>Fecha Inicio</label>
                    <?php echo '<input type="date" name="fechaIni" class="inputModificadoCrear" value="' . date("Y-m-d") . '">'; ?>
                </div>
                <div class="col s6">
                    <label>Fecha Fin</label>
                    <?php echo '<input type="date" name="fechaFin" class="inputModificadoCrear" value="' . date("Y-m-d") . '">'; ?>
                </div>
                <div class="col s6">
                    <label>Estado</label>
                    <select name="Estado" >
                        <option value="0">Todos</option>
                        <?php
                            foreach ($Est as $E) {
                                if (($E['Est_Cod']==3)||($E['Est_Cod']==4)||($E['Est_Cod']==5)||($E['Est_Cod']==6)||($E['Est_Cod']==7)||($E['Est_Cod']==8)) {
                                Echo "<option value=".$E['Est_Cod'].">".$E['Est_Nombre']."</option>";
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="col s6">
                    <label>Referencia de ambiente</label>
                    <input type="text" name="referenciaAmbiente" class="inputModificadoCrear">
                </div>
                <div class="col s6">
                    <label>Instructores</label>
                    <select name="instructor" >
                        <option value="0">Todos</option>
                        <?php
                            $instructores = $CRUD->selectBD('usuario', null, 'Rol_Cod', 6);
                            foreach ($instructores as $instructor) {
                                echo "<option value=".$instructor['Usu_Id'].">".$instructor['Usu_Nombre']." ".$instructor['Usu_Apellido']."</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="centrarBoton">
                    <!--<input type="submit" value="Generar Reporte" id="btnGPDF"class="btnFormulario" onclick="GenerarPDF()" name="Generar">-->
                    <input type="submit" value="Generar reporte" id="btnGPDF" class="btnFormulario botonModal" name="btn_Generar">
                </div>
            </form>
        </div>
        <script type="text/javascript" src="../../JS/jquery-3.7.1.js"></script>
        <script type="text/javascript" src="../../MATERIALIZE/js/materialize.min.js"></script>
        <!-- <script type="text/javascript" src="../materialize/js/materialize.js"></script> -->
        <script type="text/javascript" src="../../JS/scriptMaterialize.js"></script>
        <script>
            $(document).ready(function(){
                $('.tooltipped').tooltip();
            });

            $(document).ready(function(){
                $('select').formSelect();
            });
        </script>
    </body>
</html>