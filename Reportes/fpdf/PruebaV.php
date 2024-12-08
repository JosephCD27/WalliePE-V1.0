<?php
   session_start();
   require('fpdf.php');
  
  
class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {
      //include '../../recursos/Recurso_conexion_bd.php';//llamamos a la conexion BD

      //$consulta_info = $conexion->query(" select *from hotel ");//traemos datos de la empresa desde BD
      //$dato_info = $consulta_info->fetch_object();
      $this->Image('../../IMG/LogoWallie.jpg', 85, 5, 40); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(45); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
      $this->Cell(110, 15, utf8_decode(''), 0, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(3); // Salto de línea
      $this->SetTextColor(103); //color

      /* NOMBRE */
      $this->Cell(60);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(70, 10, utf8_decode("Usuario : ".$_SESSION["nombreUsuario"]." ".$_SESSION["apellidoUsuario"]), 0, 0, 'C', 0);
      $this->Ln(5);
      /*
      // TELEFONO 
      $this->Cell(110);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(59, 10, utf8_decode("Teléfono : "), 0, 0, '', 0);
      $this->Ln(5);

      // COREEO 
      $this->Cell(110);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Correo : "), 0, 0, '', 0);
      $this->Ln(5);

      // TELEFONO 
      $this->Cell(110);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Sucursal : "), 0, 0, '', 0);
      $this->Ln(10);
*/
      // TITULO DE LA TABLA 
      //color
      $this->SetTextColor(228, 100, 0);
      $this->Cell(50); // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(100, 20, utf8_decode("REPORTE DE NOVEDADES "), 0, 1, 'C', 0);
      $this->Ln(7);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(228, 100, 0); //colorFondo
      $this->SetTextColor(255, 255, 255); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 8);
      $this->Cell(10, 8, utf8_decode('N°'), 1, 0, 'C', 1);
      $this->Cell(14, 8, utf8_decode('CODIGO'), 1, 0, 'C', 1);
      $this->Cell(18, 8, utf8_decode('ESTADO'), 1, 0, 'C', 1);
      $this->Cell(20, 8, utf8_decode('USUARIO'), 1, 0, 'C', 1);
      $this->Cell(18, 8, utf8_decode('AMBIENTE'), 1, 0, 'C', 1);
      $this->Cell(24, 8, utf8_decode('DISPOSITIVO'), 1, 0, 'C', 1);
      $this->Cell(50, 8, utf8_decode('DESCRIPCION'), 1, 0, 'C', 1);
      $this->Cell(15, 8, utf8_decode('HORA'), 1, 0, 'C', 1);
      $this->Cell(18, 8, utf8_decode('FECHA'), 1, 1, 'C', 1);
   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(355, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}

//include '../../recursos/Recurso_conexion_bd.php';
//require '../../funciones/CortarCadena.php';
/* CONSULTA INFORMACION DEL HOSPEDAJE */
//$consulta_info = $conexion->query(" select *from hotel ");
//$dato_info = $consulta_info->fetch_object();

$pdf = new PDF();
$pdf->AddPage(); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 7);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

/*$consulta_reporte_alquiler = $conexion->query("  ");*/

/*while ($datos_reporte = $consulta_reporte_alquiler->fetch_object()) {      
   }*/
$i = $i + 1;
/* TABLA */
if (isset($_GET["Datos"])) {

   include("../../Model/CRUD_Conexion.php");

   $DATOS=$_GET["Datos"];
   $Numero=1;
   foreach ($DATOS as $A) {
      $N=new classCRUD();
      $X=$N->selectBD('novedad_elemento',null,'Nov_Cod',$A['Nov_Cod']);
      $W=$N->selectBD('estado',Null,'Est_Cod',$A['Est_Cod']);
      foreach ($X as $x) {
         foreach ($W as $w) {
               
            
            $J=$N->selectBD('elementos',null,'Elem_Cod',$x['Elem_Cod']);

         

            $Z=$N->selectBD('usuario',null,'Usu_Id',$A['Usu_Id']);
            
            $S=$N->selectBD('ambientes',null,'Amb_Cod',$A['Amb_Cod']);
            
            $X=$N->selectBD('ambientes',null,'Amb_Cod',$A['Amb_Cod']);
         
            $pdf->Cell(10, 8, utf8_decode($Numero), 1, 0, 'C', 0);
            $pdf->Cell(14, 8, utf8_decode($A['Nov_Cod']), 1, 0, 'C', 0);
            $pdf->Cell(18, 8, utf8_decode($w['Est_Nombre']), 1, 0, 'C', 0);

            foreach ($Z as $z) {
            $pdf->Cell(20, 8, utf8_decode($z['Usu_Nombre']), 1, 0, 'C', 0); //." ".$z['Usu_Apellido']
            }
            foreach ($S as $s) {
            $pdf->Cell(18, 8, utf8_decode($s['Amb_Ref']), 1, 0, 'C', 0);
            }
            
            $pdf->Cell(24, 8, utf8_decode($J[0]['Elem_Nombre']." | ".$J[0]['Elem_Serial']), 1, 0, 'C', 0);
            $pdf->Cell(50, 8, utf8_decode($x['Nov_Elem_Desc']), 1, 0, 'C', 0);   
            $pdf->Cell(15, 8, utf8_decode($A['Nov_Hora']), 1, 0, 'C', 0);
            $pdf->Cell(18, 8, utf8_decode($A['Nov_Fecha']), 1, 1, 'C', 0);

            $Numero++;
         }
      }   
   }
}else {
   
   $pdf->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
   $pdf->Cell(45); // Movernos a la derecha
   $pdf->SetTextColor(0, 0, 0); //color
   $pdf->Cell(110, 15, utf8_decode('No hay datos que coincidan con sus criterios'), 0, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
   $pdf->Ln(3); // Salto de línea
   $pdf->SetTextColor(103); //color

}

$pdf->Output('Prueba.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)
