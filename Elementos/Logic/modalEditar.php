<?php
// ----------------INPUTS------------------------------------------------
$tabla_nom = "elementos";
$Elem_Cod = $_GET['codigo'];
$campoPK = $_GET['campo'];
$parametros = null;

// Saca la información de la base de datos
$datos = new classCRUD();
$info = $datos->selectBD($tabla_nom, $parametros, $campoPK, $Elem_Cod);

$Elem_Serial = $info[0]["Elem_Serial"];
$Elem_Nombre = $info[0]["Elem_Nombre"];
$Elem_Marca = $info[0]["Elem_Marca"];
$Elem_FechaReg = $info[0]["Elem_FechaReg"];
$Tipo_Cod = $info[0]["Tipo_Cod"];
$Amb_Cod = $info[0]["Amb_Cod"];

// ----------------select para editar el tipo de elemento------------------------------------------------
$tabla_nom = "tipo_elemento";
$campo = $_POST["opciones"] ?? null;
$condicion = $_POST["condicion"] ?? null;
$option_tipo = '';

$listar_tipo = new classCRUD();
$datos = $listar_tipo->selectBD($tabla_nom, null, $campo, $condicion);

foreach ($datos as $valor) {
    //filtra el valor seleccionado del registro y lo pone por defecto
    $selected = ($valor["Tipo_Cod"] == $Tipo_Cod) ? "selected" : "";
    //mostrar todas las opciones
    $option_tipo .= "<option class='center' name='tipos' value='{$valor["Tipo_Cod"]}' $selected>{$valor["Tipo_Nombre"]}</option>";
}

// ----------------select para editar el ambiente------------------------------------------------
$tabla_nom = "ambientes";
$option_ambiente = '';

$listar_ambientes = new classCRUD();
$datos = $listar_ambientes->selectBD($tabla_nom, null, $campo, $condicion);

foreach ($datos as $valor) {
    $selected = ($valor["Amb_Cod"] == $Amb_Cod) ? "selected" : "";
    $option_ambiente .= "<option class='center' name='ambientes' value='{$valor["Amb_Cod"]}' $selected>{$valor["Amb_Ref"]}</option>";
}

include('../View/editarElementos.php');
?>
