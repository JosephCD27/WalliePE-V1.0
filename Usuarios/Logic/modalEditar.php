<?php

$Usu_Id=$_GET['Usu_Id'];
$campoPK=$_GET['campo'];
$parametros=null;
//saca la info de dase de datos
$datos=new classCRUD();
$info=$datos->selectBD($tabla_nom,$parametros,$campoPK,$Usu_Id);
/*$info1=$datos->selectBD("Rol",$parametros,null,null);
$info2=$datos->selectBD("tipo_documento",$parametros,null,null);

$Rol_Nombre=$info1[0]["Rol_Nombre"];
$Docu_Nom=$info2[0]["Docu_Nom"];*/
$Docu_Cod=$info[0]["Docu_Cod"];
$Usu_Nombre=$info[0]["Usu_Nombre"];
$Usu_Apellido=$info[0]["Usu_Apellido"];
$Usu_Correo=$info[0]["Usu_Correo"];
$Usu_Telefono=$info[0]["Usu_Telefono"];
$Usu_Contraseña=$info[0]["Usu_Clave"];
$Rol_Cod=$info[0]["Rol_Cod"];

// ----------------select para editar el tipo de documento------------------------------------------------

$tabla_nom="tipo_documento";
$option_doc="";

$lista_tipos=new classCRUD();
$valores=$lista_tipos->selectBD($tabla_nom,null,null,null);

foreach ($valores as $valor) {
    $selected=($valor["Docu_Cod"] == $Docu_Cod)?"selected":"";
    $option_doc.="<option class='center' name='documentos' value='{$valor["Docu_Cod"]}' $selected>{$valor["Docu_Nom"]}</option>";
}
// ----------------------select para editar el Rol--------------------------------------------------------

$tabla_nom="rol";
$option_rol="";

$lista_roles=new classCRUD();
$valores=$lista_roles->selectBD($tabla_nom,null,null,null);

foreach ($valores as $rol) {
    $selected=($rol["Rol_Cod"] == $Rol_Cod)?"selected":"";
    $option_rol.="<option class='center' name='roles' value='{$rol["Rol_Cod"]}' $selected>{$rol["Rol_Nombre"]}</option>";
}

include('../View/editarUsuario.php');

?>