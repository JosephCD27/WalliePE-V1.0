<?php

if (isset($_POST['btn_buscar'])) {
    $campo=$_POST["opciones"];

    $campos_busqueda = explode(",",$campo);

    $condicion=$_POST["condicion"];

    $listar_roles=new classCRUD();
    $dato=$listar_roles->buscarBD($tabla_nom,null,$campos_busqueda,$condicion);

    if (empty($dato)) {
        $dato_vacio="si";
    }
    
    include "../View/selectElementos.php";
}else{
    $campo = $_POST["opciones"]??null;
    $condicion = $_POST["condicion"]??null;
    $parametros=null;
    $listar_Elemento = new classCRUD();
    $dato = $listar_Elemento->selectBD($tabla_nom,$parametros,$campo,$condicion);
}

?>