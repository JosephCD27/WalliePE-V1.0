<?php
include("../../Model/CRUD_Conexion.php");

if (isset($_GET['navbar'])) {
    header("location:../View/listarAmbientes.php");
}
// -------------------------------------------Mostrar ambientes---------------------------------------------
$tabla_nom1="ambientes";
if (isset($_POST['btn_buscar'])) {
    $tabla_nom2 = null;
    $campo = $_POST["opciones"];
    $condicion = $_POST["condicion"];
    $parametros = null;
    $consultaInner= null;

    $listar_ambienteBitacora = new classCRUD();
    $dato = $listar_ambienteBitacora->selectBD($tabla_nom1,$parametros,$campo,$condicion);
    include "../View/selectBitacora.php";
}else{
    $tabla_nom2 = null;
    $campo = $_POST["opciones"]??null;
    $condicion = $_POST["condicion"]??null;
    $parametros = null;
    $consultaInner= null;

    $listar_ambienteBitacora = new classCRUD();
    $dato = $listar_ambienteBitacora->selectBD($tabla_nom1,$parametros,$campo,$condicion);
}

// -------------------------------Mostrar opciones de bitacora---------------------------------------------

if (isset($_GET['btn_ambiente'])) {
    $campo = $_GET["campo"];
    $condicion = $_GET["codigo"];

    $consulta = new classCRUD();
    $bitacora = $consulta->selectBD("bitacora",null,$campo,$condicion);

    $resultado=$consulta->selectBD("ambientes",null,$campo,$condicion);
    $amb_cod=$resultado[0]["Amb_Cod"];
    $referencia=$resultado[0]["Amb_Ref"];


    include("../View/bitacoraAmbiente.php");
}

// -------------------------------Mostrar detalle de una bitacora---------------------------------------------

if(isset($_GET['btn_detalle'])){
    $codigo = $_GET["valor"];
    $campo = $_GET["campo"];

    $detalle = new classCRUD();
    $info=$detalle->selectBD("bitacora",null,$campo,$codigo);

    $pc_ini = $info[0]["bit_ini_computadores"];
    $pc_fin = ($info[0]["bit_fin_computadores"] != null)? $info[0]["bit_fin_computadores"] : " - ";

    $mouse_ini = $info[0]["bit_ini_mouses"];
    $mouse_fin = ($info[0]["bit_fin_mouses"] != null)? $info[0]["bit_fin_mouses"] : " - ";

    $cargador_ini = $info[0]["bit_ini_cargadores"];
    $cargador_fin = ($info[0]["bit_fin_cargadores"] != null)? $info[0]["bit_fin_cargadores"] : " - ";

    $proyector_ini = $info[0]["bit_ini_proyector"];
    $proyector_fin = ($info[0]["bit_fin_proyector"] != null)? $info[0]["bit_fin_proyector"] : " - ";

    $aire_ini = $info[0]["bit_ini_aire"];
    $aire_fin = ($info[0]["bit_fin_aire"] != null)? $info[0]["bit_fin_aire"] : " - ";

    $mesas_ini = $info[0]["bit_ini_mesas"];
    $mesas_fin = ($info[0]["bit_fin_mesas"] != null)? $info[0]["bit_fin_mesas"] : " - ";

    $hora_final=($info[0]["bit_hora_fin"] != null)? $info[0]["bit_hora_fin"] : " - " ;
    $conteo_final=($info[0]["bit_conteo_final"] != null)? $info[0]["bit_conteo_final"] : " - " ;

    $cod_usu = $info[0]["fk_usu_doc"];
    $usu=$detalle->selectBD("usuario",null,"Usu_Id",$cod_usu);
    
    $usuario = $usu[0]["Usu_Nombre"]." ".$usu[0]["Usu_Apellido"];
    include ("../View/detalleBitacora.php");
 }

// ---------------------------Formulario para Registrar---------------------------------

if(isset($_GET['btn_registrar'])){
    $amb_cod=$_GET['valor'];
    $condicion = $_GET["valor"];
    $campo = $_GET["campo"];

    $tablas=[
        "ambientes",
        "elementos",
        "tipo_elemento"
    ];

    $primarias=[
        "ambientes.Amb_Cod=elementos.Amb_Cod",
        "tipo_elemento.Tipo_Cod=elementos.Tipo_Cod"
    ];

    $campos=[
        "Amb_Ref",
        "tipo_elemento.tipo_desc",
        "elementos.Elem_Nombre",
        "elementos.Est_Cod",
        "count(Elem_Cod) as cantElementos"
    ];

    $condicionWhere=" WHERE ambientes.Amb_Cod = '$condicion'
  AND elementos.Est_Cod = 1
  AND elementos.Elem_Nombre IN ('Cargador', 'Computador', 'Mouse', 'VideoBeam', 'AireAcondicionado', 'Mesa')
GROUP BY Amb_Ref, elementos.Elem_Nombre
HAVING COUNT(*) > 0;";

    $listar_detalleBitacora = new classCRUD();
    $select = $listar_detalleBitacora->segundoInnerJoin($tablas,$primarias,$campos,$condicionWhere);

    include ("../View/registrarBitacora.php");
}

if (isset($_GET['btn_crear'])) {
    //Asignacion de valores traidos del formulario registrar bitacora
    $tabla_nom = "bitacora";
    $codAmbiente = $_POST['codAmbiente'];
    $usuarioLogin = $_POST['usuario'];
    $fechaRegistro = $_POST['fecha'];
    $horaRegistro = $_POST['hora'];
    $arregloConteoElementos = array();
    
    $estado="Iniciada";

    //suma la cantidad de elementos ingresados en el arreglo $arregloConteoElemento
   

    //arreglos que se envian a la funcion en el model que inserta
    $campos=array(
        'bit_fecha',
        'bit_hora_inicio',
        'fk_usu_doc',
        'Amb_Cod',
        'bit_estado'
    );

        

    $valores=array(
        $fechaRegistro,
        $horaRegistro ,
        $usuarioLogin,
        $codAmbiente,
        $estado
    );

    if (isset($_POST['Mouse'])) {
        $arregloConteoElementos['Mouses'] = $_POST['Mouse'];
        $valores[] = $arregloConteoElementos['Mouses'];
        $campos[] = "bit_ini_mouses";
    }
    if (isset($_POST['Computador'])) {
        $arregloConteoElementos['Computadores'] = $_POST['Computador'];    
        $valores[] = $arregloConteoElementos['Computadores'];    
        $campos[] = "bit_ini_computadores";
    }
    if (isset ($_POST['Cargador'])) {
        $arregloConteoElementos['Cargadores'] = $_POST['Cargador'] ;    
        $valores[] = $arregloConteoElementos['Cargadores'] ;    
        $campos[] = "bit_ini_cargadores";
    }
    if (isset($_POST['VideoBeam'])) {
        $arregloConteoElementos['VideoBeam'] = $_POST['VideoBeam'];
        $valores[] = $arregloConteoElementos['VideoBeam'];
        $campos[] = "bit_ini_proyector";
    }

    if (isset ($_POST['AireAcondicionado'])) {
        $arregloConteoElementos['Aire'] = $_POST['AireAcondicionado'] ;    
        $valores[] = $arregloConteoElementos['Aire'] ;    
        $campos[] = "bit_ini_aire";
    }
    if (isset ($_POST['Mesa'])) {
        $arregloConteoElementos['Mesas'] = $_POST['Mesa'] ;    
        $valores[] = $arregloConteoElementos['Mesas'] ;    
        $campos[] = "bit_ini_mesas";
    }

    $sumaTotalConteo = 0;
    foreach ($arregloConteoElementos as $value) {
        $sumaTotalConteo += $value;
        
    }
    $valores[]=$sumaTotalConteo;
    $campos[] = "bit_conteo_inicial";

    $crear_bitacora=new classCRUD();
    $a = $crear_bitacora->insertBD($tabla_nom,$valores,$campos);

    echo "Bitacora regisrada correctamente.";
}

// -----------------------historial ambiente-------------------------------

if (isset($_POST["btn_historial"])) {
    $campo = $_POST["campo"];
    $condicion = $_POST["ambiente"];

    $consulta = new classCRUD();
    $bitacora = $consulta->selectBD("bitacora",null,$campo,$condicion);

    $resultado=$consulta->selectBD("ambientes",null,$campo,$condicion);
    $amb_cod=$resultado[0]["Amb_Cod"];
    $referencia=$resultado[0]["Amb_Ref"];

    include("../View/historialAmbiente.php");
}

// --------------------------cambiar ambiente------------------------------

if (isset($_GET["btn_cambiar"])) {

    $ambiente_ref = new classCRUD();
    $resultado=$ambiente_ref->selectBD("ambientes",null,$campo,$condicion);
    $referencia=$resultado[0]["Amb_Ref"];

    include("../View/cambiarAmbiente.php");
}

if (isset($_POST["cambiar"])) {
    header("location:../View/listarAmbientes.php");
}

//-----------------------------FINALIZAR BITACORA---------------------------//

    if (isset($_POST["btn_finalizar"])) {
        $BC=$_POST["valor"];
        $CBC=$_POST["campo2"];

        $amb_cod=$_POST['ambiente'];
        $condicion = $_POST["ambiente"];
        $campo = $_POST['campo1'];

        $tablas=[
            "ambientes",
            "elementos",
            "tipo_elemento"
        ];

        $primarias=[
            "ambientes.Amb_Cod=elementos.Amb_Cod",
            "tipo_elemento.Tipo_Cod=elementos.Tipo_Cod"
        ];

        $campos=[
            "Amb_Ref",
            "tipo_elemento.tipo_desc",
            "elementos.Elem_Nombre",
            "elementos.Est_Cod",
            "count(Elem_Cod) as cantElementos"
        ];

        $condicionWhere=" WHERE ambientes.Amb_Cod = '$condicion'
  AND elementos.Est_Cod = 1
  AND elementos.Elem_Nombre IN ('Cargador', 'Computador', 'Mouse', 'VideoBeam', 'AireAcondicionado', 'Mesa')
GROUP BY Amb_Ref, elementos.Elem_Nombre
HAVING COUNT(*) > 0;";

        $listar_detalleBitacora = new classCRUD();
        $select = $listar_detalleBitacora->segundoInnerJoin($tablas,$primarias,$campos,$condicionWhere);
        
        $BI=$listar_detalleBitacora->selectBD("bitacora",null,$CBC,$BC);
        include("../View/finalizarBitacora.php");
        
    }

    //---------------------TERMINAR BITACORA-------------------------//

    if ((isset($_POST['btn_terminar']))&& ($_POST['btn_terminar']==='terminar')) {
        
        $TN='bitacora';
        $FF=$_POST['FechaF'];
        $HF=$_POST['HoraF'];
        $CodBF=$_POST['CodB'];
        $CodA=$_POST['CodA'];
        $ACE = array();
        $ACE['Computadores'] = $_POST['Computador'];
        $ACE['Cargadores'] = $_POST['Cargador'] ;
        $ACE['Mouses'] = $_POST['Mouse'];
        $ACE['VideoBeam'] = $_POST['VideoBeam'];
        $ACE['Aire'] = $_POST['AireAcondicionado'] ;
        $ACE['Mesa'] = $_POST['Mesa'];
        $estado ="Finalizada";

        $SCF=0;

        foreach ($ACE as $value) {
            $SCF += $value;
        }

        $PosVal = array(
            'bit_fecha_fin'=>$FF,
            'bit_hora_fin'=>$HF,
            'bit_conteo_final'=>$SCF,
            'bit_fin_computadores'=>$ACE['Computadores'],
            'bit_fin_cargadores'=>$ACE['Cargadores'],
            'bit_fin_mouses'=>$ACE['Mouses'],
            'bit_fin_proyector'=>$ACE['VideoBeam'],
            'bit_fin_aire'=>$ACE['Aire'],
            'bit_fin_mesas'=>$ACE['Mesa'],
            'bit_estado'=> $estado
        );

        $CRUD= new classCRUD();
        /*echo '<script type="text/javascript">setTimeout(function() {window.location.href = "../Controller/controllerBitacora.php?btn_ambientes=ambiente&codigo=<?php echo $CodA; ?>&campo=Amb_Cod";}, 3000);</script>';*/
        $UP=$CRUD->updateBD('bitacora','Bita_Cod',$CodBF,$PosVal);

        
             // Asegúrate de asignar el valor correcto a $CodA aquí
            echo "<script type='text/javascript'>
            setTimeout(function() {
            window.location.href = '../Controller/controllerBitacora.php?btn_ambientes=ambiente&codigo=$CodA&campo=Amb_Cod';
            }, 3000);
            </script>";


    }
?>