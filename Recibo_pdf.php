<?php

require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    $this->Image('Logotipo-Recibo.jpg',155,3,50,40,'jpg');
    // Arial bold 15

    $this->SetFont('Arial','B',18);
    // Movernos a la derecha

    $this->Cell(60);
    // Título

    $this->Cell(70,10,'Recibo de Compra',0,0);
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8

    $this->SetFont('Arial','I',8);
    // Número de página
    
    $this->Cell(0,10,'Recibo '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$ubica=$_GET['variable1'];

require 'conexion_recibo.php';
$consulta = "SELECT * FROM 'ventas' WHERE ubicacion = '$ubica'";
$resultado = $mysqli->query($consulta);
$consulta2 = "SELECT * FROM 'fosas' WHERE ubicacion = '$ubica'";
$resultado2 = $mysqli->query($consulta2);



$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

while($row = $resultado->fetch_assoc()){
   

    $pdf->cell(70,10,'Ubicacion de la tumba: ',1,0,false);

    $pdf->cell(15,10,$ubica,1,1,'C',false);

    $pdf->cell(150,10,'Comprador',1,1,'C',false);

    $pdf->cell(15,10,'ID',1,0,'C',0);

    $pdf->cell(90,10,'Nombre completo',1,0,'C',false);

    $pdf->cell(45,10,'Folio de Recibo',1,1,false);

    $pdf->cell(15,10,$row['id'],1,0,'C',0);

    $pdf->cell(30,10,$row['nombre_c'],1,0,'C',0);

    $pdf->cell(30,10,$row['ape_pa'],1,0,'C',0);

    $pdf->cell(30,10,$row['ape_ma'],1,0,'C',0);

    $pdf->cell(45,10,$row['num_recibo'],1,1,'C',0);

    $pdf->cell(15,10,' ',0,1,'C',false);

 

    $pdf->cell(30,10,' ',0,1,'C',0);

    $pdf->cell(15,10,'Datos Adicionales',0,1,false);

    $pdf->cell(30,10,'Domicilio: ',1,0,'C',false);

    $pdf->cell(45,10,$row['colonia'],1,1,'C',0);

    $pdf->cell(30,10,'Calle: ',1,0,'C',false);

    $pdf->cell(45,10,$row['calle'],1,1,'C',0);

    $pdf->cell(30,10,'Numero: ',1,0,'C',false);

    $pdf->cell(45,10,$row['numero'],1,1,'C',0);

    $pdf->cell(30,10,'Fecha: ',1,0,'C',false);

    $pdf->cell(45,10,$row['fecha'],1,1,'C',0);

    
  
}



while($row = $resultado2->fetch_assoc()){
    $pdf->cell(30,10," ",0,1,'C');
    $pdf->cell(30,10," ",0,1,'C');

    $pdf->cell(50,10,'Estado de la fosa: ',0,0,'C');
    $pdf->cell(30,10,$row['estado'],0,1,'C');
    $pdf->cell(30,10," ",0,1,'C');
    $pdf->cell(30,10," ",0,1,'C');
    $pdf->cell(30,10," ",0,1,'C');
    $pdf->cell(30,10," ",0,1,'C');
    $pdf->cell(30,10," ",0,1,'C');
    $pdf->cell(30,10," ",0,1,'C');
    $pdf->cell(30,10," ",0,1,'C');

    $pdf->cell(50,10,'                       ',0,0,false);
    $pdf->cell(50,10,'____________________________',0,1,false);
    $pdf->cell(50,10,'                                                  Firma y sello',0,1,false);
   

  
}



$pdf->Output();
?>


