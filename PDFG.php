 <?php
require('fpdf/fpdf.php');
class PDF extends FPDF
{
function Header()
{ 
    // Logo
    //(ruta,posicionx,posiciony,alto,ancho,tipo,link)
    $mysqli = new mysqli ('localhost','root','','ultratumba');
    $mysqli->set_charset("utf8");
    //------------------------MANDAR A LLAMAR EL LOGO DE LA BD--------------------------------
    $consulta_logo="SELECT * FROM gobierno";
    $result=$mysqli -> query($consulta_logo);
    $mostrar=mysqli_fetch_array($result);
    if (empty($mostrar)){
        $this->Image('img/panteon.png',180,17,20,20);
       }
    else{
        if(isset($mostrar)){
            $image=$mostrar['nombre_logo'];
            $ruta="img/".$image;
           $this->Image($ruta,180,17,20,20);
        }
        else{
            $this->Image('img/panteon.png',180,17,20,20);
        }
        
    }
  
    //----------------------------------------------------------------------------------------
    //$this->Image('panteon.png',180,17,20,20,'png');
    // Arial bold 15
    ///-----------VARIABLES---------------------------------------------------
    $Desde0=$_GET['Desde0'];
    $Hasta0=$_GET['Hasta0'];
    $Panteon="Administrador y gestor de espacios de panteón";
    $Desde0=$Desde0;
    $Hasta0=$Hasta0;
    $fechaactual=getdate();
    $Consulta=date("d") . " del " . date("m") . " de " . date("Y");
    if(empty($Desde0) and empty($Hasta0)){           
              $Desde0="";                     
              $Hasta0="";                              
        }
    ///-----------------------------------------------------------------------
    ////LINEA
    $this->SetDrawColor(61,174,233);
    $this->SetLineWidth(1);
    $this->Line($this->GetX()+190,$this->GetY()+4,10,$this->GetY()+4);

    $this->SetFont('Arial','B',14);
    // Movernos a la derecha
    $this->Cell(10);
    // Título
    $this->Cell(34,30,'REPORTE DE VENTAS',0,0,'C');
    
    
    // Salto de línea
    $this->Ln(20);
    ///NOMBRE DEL PANTEON
    $this->SetFont('Arial','',10);
    $this->Cell(50,5,utf8_decode($Panteon));
    $this->Ln(5);
    ////LINEA
    $this->SetDrawColor(61,174,233);
    $this->SetLineWidth(1);
    $this->Line($this->GetX()+190,$this->GetY()+4,10,$this->GetY()+4);
    $this->Ln(7);
    ////RANGO DE FECHAS
    $this->SetFont('Arial','',10);
    $this->Cell(50,5,utf8_decode("Fecha de consulta: ".$Consulta));
    $this->Ln(7);
    $this->SetFont('Arial','',10);
    $this->Cell(50,5,utf8_decode("Fecha inicial: ".$Desde0));
    $this->Ln(7);
    $this->SetFont('Arial','',10);
    $this->Cell(50,5,utf8_decode("Fecha final: ".$Hasta0));
    $this->Ln(7);
}

// Pie de página
function Footer()
   {
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
    }
}
   

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',9);
$pdf->SetFillColor(11,63,71);
$pdf->SetTextColor(255,255,255);

$pdf->Cell(15,8,utf8_decode('Nº'),1,0,'C',1);
$pdf->Cell(47,8,utf8_decode('Comprador'),1,0,'C',1);
$pdf->Cell(20,8,'Fecha',1,0,'C',1);
$pdf->Cell(30,8,utf8_decode('Número de recibo'),1,0,'C',1);
$pdf->Cell(25,8,"Id de difunto",1,0,'C',1);
$pdf->Cell(30,8,utf8_decode('Ubicación'),1,0,'C',1);
$pdf->Cell(25,8,utf8_decode("Usuario"),1,1,'C',1);
$pdf->SetTextColor(0,0,0);

$mysqli = new mysqli ('localhost','root','','ultratumba');
$mysqli->set_charset("utf8");
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor(40,40,40);
$pdf->SetDrawColor(255,255,255);
//------------------------------------------------------------------------------------------
//=======================================VALIDAR DATOS=====================================
$mysqli = new mysqli ('localhost','root','','ultratumba');
$mysqli->set_charset("utf8");
$Desde0=$_GET['Desde0'];
$Hasta0=$_GET['Hasta0'];
if(empty($Desde0) and empty($Hasta0)){
              $Desde0="";                     
              $Hasta0="";                              
}

//---------------------------------------------------------------------------------------------
$fecha_c="SELECT DISTINCT v.id,v.nombre_c,v.ape_pa,v.ape_ma,v.fecha, v.num_recibo,
                      v.id_difunto,d.ubicacion,v.usuario FROM ventas v, difuntos d 
                      WHERE v.id_difunto = d.id AND v.fecha BETWEEN '$Desde0' AND '$Hasta0' ORDER BY v.fecha";
//----------------------------------------------------------
$i=1;
$res_fech=$mysqli -> query($fecha_c);
while ($row = mysqli_fetch_assoc($res_fech)){
    if ($i%2==0)
    { 
        $pdf->SetFillColor(255,255,255);
    }
    else{
        $pdf->SetFillColor(240,240,240);
    }
	$pdf->Cell(15,8,utf8_decode($row["id"]),1,0,'C',1);
	$pdf->Cell(47,8,utf8_decode($row["nombre_c"])." ".utf8_decode($row["ape_pa"])." ".utf8_decode($row["ape_ma"]),1,0,'C',1);
	$pdf->Cell(20,8,utf8_decode($row["fecha"]),1,0,'C',1);
	$pdf->Cell(30,8,utf8_decode($row["num_recibo"]),1,0,'C',1);
	$pdf->Cell(25,8,utf8_decode($row["id_difunto"]),1,0,'C',1);
	$pdf->Cell(30,8,utf8_decode($row["ubicacion"]),1,0,'C',1);
    $pdf->Cell(25,8,utf8_decode($row["usuario"]),1,1,'C',1);
    $i++;
}
$pdf->Close();
$pdf->Output('I','Reporte_ventas.pdf');

?>

 