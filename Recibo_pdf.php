<?php
//Se inicia la sesión
require('fpdf/fpdf.php');
date_default_timezone_set('America/Mexico_City');

$time = time();

session_start();

$mysqli = new mysqli('localhost', 'root', '', 'ultratumba');
$mysqli->set_charset("utf8");


class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    

    $this->Image('Logotipo-Recibo.jpg',5,8,50,40,'jpg');
    $this->Image('linea.jpg',3,40,205,40,'jpg');
    

    // Arial bold 15

    
    // Movernos a la derecha

    $this->Cell(60);
    // Título
    $this->SetFont('courier', 'U', 20);
    //$this->Cell(70,10,'Recibo de Compra',0,0);
    $this->Cell(60, 50, 'Recibo de Compra', 0, 0, 'C');

    // Salto de línea
    
    $this->SetFont('Arial','B',15);
    $this->Cell(60, 40,'Fecha:', 0, 0, 'C');
    $this->Cell(-7, 40,date("d-m-Y"), 0, 0, 'C');
    $this->Cell(-50, 52,'Hora:', 0, 0, 'C');
    $this->Cell(95, 52,date("h:i:s"), 0, 0, 'C');
    
    

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

$difunto_id=$_GET['variable1'];
$ubica=$_GET['variable2'];


$query = "SELECT * FROM `ventas` WHERE id_difunto = '$difunto_id'";
$resul=mysqli_query($mysqli, $query);
$row= mysqli_fetch_assoc($resul);


$query2 = "SELECT * FROM `fosas` WHERE ubicacion = '$ubica'";
$result2 = mysqli_query($mysqli,$query2);
$row2= mysqli_fetch_assoc($result2);


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

$pdf->cell(70,10," ",0,1,'C');
$pdf->cell(70,10," ",0,1,'C');
$pdf->cell(70,10," ",0,1,'C');
$pdf->cell(70,10," ",0,1,'C');

$pdf->cell(95,10,utf8_decode('Ubicación de la tumba: '),1,0,false);

$pdf->cell(95,10,$ubica,1,1,'C',false);

$pdf->cell(190,10,'Datos del Comprador',1,1,'C',false);

$pdf->cell(15,10,'ID',1,0,'C',0);

$pdf->cell(120,10,'Nombre completo',1,0,'C',false);

$pdf->cell(55,10,'Folio de Recibo',1,1,false);

$pdf->cell(15,10,$row['id'],1,0,'C',0);

$pdf->cell(40,10,$row['nombre_c'],1,0,'C',0);

$pdf->cell(40,10,$row['ape_pa'],1,0,'C',0);

$pdf->cell(40,10,$row['ape_ma'],1,0,'C',0);

$pdf->cell(55,10,$row['num_recibo'],1,1,'C',0);





$pdf->cell(30,10,' ',0,1,'C',0);

$pdf->cell(15,10,'Datos Adicionales',0,1,false);

$pdf->cell(95,10,'Colonia: ',1,0,'L',false);

$pdf->cell(95,10,$row['colonia'],1,1,'L',0);

$pdf->cell(95,10,'Calle: ',1,0,'L',false);

$pdf->cell(95,10,$row['calle'],1,1,'L',0);

$pdf->cell(95,10,utf8_decode('Número: '),1,0,'L',false);

$pdf->cell(95,10,$row['numero'],1,1,'L',0);

$pdf->cell(95,10,'Referencia: ',1,0,'L',false);

$pdf->cell(95,10,$row['referencia'],1,1,'L',0);






$pdf->cell(95,10,'Estado de la Fosa: ',1,0,'L');
$pdf->cell(95,10,$row2['estado'],1,1,'L');
$pdf->cell(30,10," ",0,1,'C');
$pdf->cell(30,10," ",0,1,'C');
$pdf->cell(30,10," ",0,1,'C');
$pdf->cell(30,10," ",0,1,'C');
$pdf->cell(30,10," ",0,1,'C');



$pdf->cell(50,10,'                       ',0,0,false);
$pdf->cell(50,10,'____________________________',0,1,false);
$pdf->cell(50,10,'                                                  Firma y sello',0,1,false);



$pdf->Output();
?>