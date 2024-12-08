<?php
$tabla="elementos";
$condicion=$_GET['codigo'];
$campo=$_GET['campo'];
$parametros=null;

$registro=  new classCRUD();
$info=$registro->selectBD($tabla,$parametros,$campo,$condicion);

include("../View/detallesAmbientes.php");
?>