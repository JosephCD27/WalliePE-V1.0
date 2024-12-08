<?php
$tabla="Usuario";
$condicion=$_GET['codigo'];
$campo=$_GET['campo'];
$parametros=null;

$registro =  new classCRUD();
$infoU=$registro->selectBD($tabla,$parametros,$campo,$condicion);

$Usu_Id             = $infoU[0]['Usu_Id'];
$Usu_Nombre         = $infoU[0]['Usu_Nombre'];
$Usu_Apellido       = $infoU[0]['Usu_Apellido'];
$Usu_Correo         = $infoU[0]['Usu_Correo'];
$Usu_Telefono       = $infoU[0]['Usu_Telefono'];
$Usu_Contraseña     = $infoU[0]['Usu_Clave'];
$Rol_Cod            = $infoU[0]['Rol_Cod'];

//-----------------------------Rol------------------------------------

$tabla1="rol";
$condicion1=$Rol_Cod;
$campo1="Rol_Cod";
$parametros1=null;

$infoI=$registro->selectBD($tabla1,$parametros1,$campo1,$condicion1);

$Rol_Nombre = $infoI[0]['Rol_Nombre'];


include("../View/detalleUsuario.php");
?>