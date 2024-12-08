<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include("../../Model/CRUD_Conexion.php");

$cod_usu = $_SESSION['cod_usu'];
$tabla_nom = "novedad";

if (isset($_GET['navbar'])) {
    header("location:../View/listarNovedad.php");
}

// -------------------------------CONTENIDO MODAL NOVEDADES----------------------------------
//consultar ambiente
if (isset($_POST['btn_ambiente'])) {
    include("../Logic/modalAmbiente.php");
}
//Direccion a crear
if (isset($_POST['btn_crear'])) {
    include("../Logic/modalCrear.php");
}
//Direccion a detalle
if (isset($_GET['btn_detalle'])) {
    include("../Logic/modalDetalle.php");
}
//Direccion a editar
if (isset($_GET['btn_editar'])) {
    include("../Logic/modalEditar.php");
}

// direccion a atender novedad
if (isset($_GET['btn_mod_atender'])) {
    include("../Logic/modalAtender.php");
}

// direccion a finalizar novedad
if (isset($_GET['btn_mod_finalizar'])) {
    $Nov_Cod = $_GET['codigo'];
    $campoPK = $_GET['campo'];

    $parametros = null;
    //saca la info de dase de datos
    $datos = new classCRUD();
    $info = $datos->selectBD($tabla_nom, $parametros, $campoPK, $Nov_Cod);

    include('../View/finalizarNovedad.php');
}
//Direccion a eliminar
if (isset($_GET['btn_eliminar'])) {
    $Nov_Cod = $_GET['Nov_Cod'];
    $campoPK = $_GET['campo'];
    $parametros = null;
    //saca la info de dase de datos
    $datos = new classCRUD();
    $info = $datos->selectBD($tabla_nom, $parametros, $campoPK, $Nov_Cod);

    include('../View/eliminarNovedad.php');
}

//---------------------LISTAR NOVEDADES---------------------------

if (isset($_POST['btn_buscar'])) {

    $campo = $_POST["opciones"];

    $campos_busqueda = explode(",", $campo);

    $condicion = $_POST["condicion"];

    $listar_Novedades = new classCRUD();
    $dato = $listar_Novedades->buscarBD($tabla_nom, null, $campos_busqueda, $condicion);

    if (empty($dato)) {
        $dato_vacio = "si";
    }

    include "../View/selectNovedad.php";
} else {
    $campo = $_POST["opciones"] ?? null;
    $condicion = $_POST["condicion"] ?? null;
    $parametros = null;
    $listar_Novedades = new classCRUD();
    $dato = $listar_Novedades->selectBD($tabla_nom, $parametros, $campo, $condicion);
}

// --------------------REGISTRAR NOVEDADES-------------------------
if (isset($_GET['registrar'])) {
    // Suponiendo que 'checks' es el arreglo que contiene los índices de los checkboxes seleccionados
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verifica si el arreglo 'checks' está presente y no está vacío
        if (isset($_POST['checks']) && !empty($_POST['checks'])) {

            // -------------crear novedad--------------------
            $cod_amb = $_POST['cod_amb'];
            $campos = array(
                'Amb_Cod',
                'Est_Cod',
                'Usu_Id'
            );

            $valores = array(
                $cod_amb,
                3,
                $cod_usu
            );

            // var_dump($valores);
            $consulta = new classCRUD();
            $nov_cod = $consulta->insertBD("novedad", $valores, $campos);

            //--------------asociar elementos a la novedad-------------------
            foreach ($_POST['checks'] as $posicion => $valor) {
                // acceder a los valores de los otros campos relacionados con el checkbox seleccionado
                $elemento = $_POST['cod_elem'][$posicion];
                $tipoNovedad = $_POST['TN'][$posicion];
                $descripcion = $_POST['Desc'][$posicion];

                $campo = array(
                    "Nov_Cod",
                    "Elem_Cod",
                    "Est_Cod",
                    "Nov_Elem_Desc",
                    "TN_Cod"
                );

                $valores = array(
                    $nov_cod,
                    $elemento,
                    9,
                    $descripcion,
                    $tipoNovedad
                );

                $consulta->insertBD("novedad_elemento", $valores, $campo);

                //     //actualiza el estado de los elementos
                //     $upd = array(
                //         "Est_Cod" => 13
                //     );
                //     $consulta->updateBD("elementos", "Elem_Cod", $elemento, $upd);
            }
        }
    }

    echo "Novedad creada Exitosamente";
}
// --------------------ACTUALIZAR NOVEDADES-------------------------
// if (isset($_POST['actualizar'])) {
//     if ($_SERVER["REQUEST_METHOD"] == "POST") {
//         $novedades = new classCRUD();
//         //codigo de la novedad
//         $cod_nov = $_POST["cod_nov"];
        
//         // Obtener todos los elementos actuales
//         $elementosActuales = $novedades->selectBD("novedad_elemento", null, "Nov_Cod", $cod_nov);
//         $elementosActualesIds = array_column($elementosActuales, 'Elem_Cod');
        
//         // Elementos seleccionados en el formulario
//         $elementosSeleccionados = $_POST['checks'] ?? array();
        
//         // Desactivar elementos que no están seleccionados
//         foreach ($elementosActuales as $elementoActual) {
//             if (!in_array($elementoActual['Elem_Cod'], $elementosSeleccionados)) {
//                 // Cambiar el estado del elemento a 'anulado'
//                 $arreglo = array("Est_Cod" => "8");
//                 $novedades->updateBD("novedad_elemento", "Elem_Cod", $elementoActual['Elem_Cod'], $arreglo);
//             }
//         }
        
//         // Insertar o actualizar los elementos seleccionados
//         foreach ($elementosSeleccionados as $posicion => $valor) {
//             $elemento = $_POST['cod_elem'][$posicion];
//             $tipoNovedad = $_POST['TN'][$posicion];
//             $descripcion = $_POST['Desc'][$posicion];
            
//             // Verificar si el elemento ya existe para actualizarlo
//             if (in_array($elemento, $elementosActualesIds)) {
//                 // Actualizar el elemento existente
//                 $upd = array(
//                     "Nov_Elem_Desc" => $descripcion,
//                     "TN_Cod" => $tipoNovedad,
//                     "Est_Cod" => "9" // Cambiar el estado a 'activo'
//                 );
//                 $novedades->updateBD("novedad_elemento", "Elem_Cod", $elemento, $upd);
//             } else {
//                 // Insertar el nuevo elemento
//                 $valores = array(
//                     $cod_nov,
//                     $elemento,
//                     "9",
//                     $descripcion,
//                     $tipoNovedad
//                 );
//                 $campo = array(
//                     "Nov_Cod",
//                     "Elem_Cod",
//                     "Est_Cod",
//                     "Nov_Elem_Desc",
//                     "TN_Cod"
//                 );
//                 $novedades->insertBD("novedad_elemento", $valores, $campo);
//             }
//         }
//     }

//     // Redireccionar al usuario a la lista de novedades
//     header("location:../View/listarNovedad.php");
// }

// --------------------ELIMINAR NOVEDADES-------------------------

if (isset($_GET['borrar'])) {
    // -----------------------------anular Novedad-----------------------------
    $Nov_Cod = $_POST['Nov_delete'];
    $del_campo = $_POST['Nov_campo'];

    $arreglo = array(
        'Est_Cod' => 8
    );

    $anular_Nov = new classCRUD();
    $anular_Nov->updateBD("novedad", $del_campo, $Nov_Cod, $arreglo);

    // --------------------anular elementos asociados Novedad-------------------


    $Nov_Cod = $_POST['Nov_delete'];
    $del_campo = $_POST['Nov_campo'];

    $arreglo = array(
        'Est_Cod' => 8
    );

    $anular_Nov = new classCRUD();
    $anular_Nov->updateBD("novedad_elemento", $del_campo, $Nov_Cod, $arreglo);

    echo "Novedad anulada exitosamente";

}

// --------------------ATENDER ELEMENTO-------------------------
if (isset($_POST['atender'])) {

    // cambiar el estado de la novedad cuando hay elementos en mantenimiento
    $elemento_pos = $_POST['indice'];
    $nov_cod = $_POST['nov_cod'];

    $arreglo = array(
        "Est_Cod" => 5
    );

    $atender = new classCRUD();
    $atender->updateBD("novedad", "Nov_Cod", $nov_cod, $arreglo);

    //codigo del de la asociacion
    $nov_elem_cod = $_POST['cod_elem'][$elemento_pos];

    //consultar el codigo del elemento
    $elemento = $atender->selectBD("novedad_elemento", null, "Nov_Elem_Cod", $nov_elem_cod);

    // actualiza el estado del elemento en la asociación de la novedad
    $arreglo = array(
        "Est_Cod" => 10
    );
    $atender->updateBD("novedad_elemento", "Nov_Elem_Cod", $nov_elem_cod, $arreglo);

    //actualiza el estado del elemento de forma Global
    $upd = array(
        "Est_Cod" => 10
    );
    $atender->updateBD("elementos", "Elem_Cod", $elemento[0]['Elem_Cod'], $upd);

    header("location:../View/listarNovedad.php");
}
// --------------------ENTREGAR ELEMENTO-------------------------

if (isset($_POST['por_entregar'])) {
    $atender = new classCRUD();

    $elemento_pos = $_POST['indice'];
    $nov_cod = $_POST['nov_cod'];

    // cambiar el estado del elemento
    $nov_elem_cod = $_POST['cod_elem'][$elemento_pos];
    $cod_elem = $_POST['cod_elem_puro'][$elemento_pos];

    $arreglo = array(
        "Est_Cod" => 11
    );
    $atender->updateBD("novedad_elemento", "Nov_Elem_Cod", $nov_elem_cod, $arreglo);

    //actualiza el estado de los elementos
    $upd = array(
        "Est_Cod" => 1
    );
    $atender->updateBD("elementos", "Elem_Cod", $cod_elem, $upd);

    // validacion de estado atendido
    $elementos = $atender->selectBD("novedad_elemento", null, "Nov_Cod", $nov_cod);
    $estado = true;
    foreach ($elementos as $posicion => $valor) {
        //Estado del elemento
        $est_info = $atender->selectBD("estado", null, "Est_Cod", $valor["Est_Cod"]);
        $est_nom = $est_info[0]["Est_Nombre"];

        if ($est_nom != "Entregado") {
            $estado = false;
        }
    }

    if ($estado == true) {
        $arreglo = array(
            "Est_Cod" => 6
        );
        $atender->updateBD("novedad", "Nov_Cod", $nov_cod, $arreglo);
    }

    // header("location:../View/listarNovedad.php");
}

if (isset($_POST['finalizar'])) {

    $nov_cod = $_POST['Nov_finalizar'];

    $arreglo = array(
        "Est_Cod" => 7
    );

    $finalizar = new classCRUD();
    $finalizar->updateBD("novedad", "Nov_Cod", $nov_cod, $arreglo);

    header("location:../View/listarNovedad.php");
}

//-----------------------------REPORTES-----------------------------//

if (isset($_POST["btn_pdf"])) {

    $CRUD = new classCRUD();
    $Est = $CRUD->selectBD('estado', null, null, null);
    include("../View/generarReporte.php");
}

if (isset($_POST["btn_Generar"])) {

    $Condiciones = array();
    $join = null;

    if (isset($_POST['fechaIni'])) {
        $FechaINI = $_POST["fechaIni"];
        $FI = "Nov_Fecha >= '" . $FechaINI . "'";
        $Condiciones[] = $FI;
    }
    if (isset($_POST['fechaFin'])) {
        $FechaFIN = $_POST["fechaFin"];
        $FF = "Nov_Fecha <= '" . $FechaFIN . "'";
        $Condiciones[] = $FF;
    }
    if (isset($_POST['referenciaAmbiente']) && $_POST['referenciaAmbiente'] != '') {
        $referenciaAmbiente = $_POST["referenciaAmbiente"];
        $RA = "Amb_Ref = '" . $referenciaAmbiente . "'";
        $Condiciones[] = $RA;

        $join = array(
            'tablaJoin' => 'ambientes', // Nombre de la tabla con la que quieres hacer JOIN
            'on' => 'novedad.Amb_Cod = ambientes.Amb_Cod' // Condición para el JOIN
        );
    }
    if (isset($_POST['Estado'])) {
        $Estado = $_POST["Estado"];
        if ($Estado != "0") {
            $EN = "Est_Cod = '" . $Estado . "'";
            $Condiciones[] = $EN;
        }
    }
    if (isset($_POST['instructor'])) {
        $instructor = $_POST["instructor"];
        if ($instructor != "0") {
            $IN = "Usu_Id = '" . $instructor . "'";
            $Condiciones[] = $IN;
        }
    }
    if (isset($_POST['sinDescripcion'])) {
        $sinDescripcion = $_POST["sinDescripcion"];
        if ($sinDescripcion == "0") {
            $SD = "Nov_Descripcion IS NOT NULL AND Nov_Descripcion != ''";
            $Condiciones[] = $SD;
        }
    }

    $CNX = new classCRUD();
    $DTS = $CNX->selectPDFBD('novedad', null, $Condiciones, $join);

    $DTS_query = http_build_query(array('Datos' => $DTS));
    header("Location: ../../Reportes/fpdf/PruebaV.php?" . $DTS_query);
}
?>
