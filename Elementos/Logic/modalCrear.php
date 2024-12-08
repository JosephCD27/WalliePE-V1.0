<?php
// ----------------select para asignar un tipo de elemento------------------------------------------------
$tabla_nom = "tipo_elemento";
$campo = $_POST["opciones"] ?? null;
$condicion = $_POST["condicion"] ?? null;
$parametros = null;
$option_tipo = "<option class='center' name='tipos' value='defecto'>--seleccionar--</option>";

$listar_tipo = new classCRUD();
$datos = $listar_tipo->selectBD($tabla_nom, $parametros, $campo, $condicion);

foreach ($datos as $valor) {
    $option_tipo .= "<option class='center' name='tipos' value='{$valor["Tipo_Cod"]}'>{$valor["Tipo_Nombre"]}</option>";
}

// ----------------select para asignar un ambiente------------------------------------------------
$tabla_nom = "ambientes";
$campo = $_POST["opciones"] ?? null;
$condicion = $_POST["condicion"] ?? null;
$parametros = null;
$option_ambiente = "<option class='center' name='ambientes' value='defecto'>--seleccionar--</option>";

$listar_ambientes = new classCRUD();
$datos = $listar_ambientes->selectBD($tabla_nom, $parametros, $campo, $condicion);

foreach ($datos as $valor) {
    $option_ambiente .= "<option class='center' name='ambientes' value='{$valor["Amb_Cod"]}'>{$valor["Amb_Ref"]}</option>";
}

include('../View/crearElementos.php');
?>
