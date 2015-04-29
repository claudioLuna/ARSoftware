<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/arsoftware/utiles/headerAdmin.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/arsoftware/utiles/configSitio.php");		
include_once($docRootSitio."modelo/Consulta.php");
require('fpdf/fpdf.php'); 

$consulta = new Consulta();
$usuario = $_SESSION["nombreUsuario"];

$curso=$_POST['busqueda'];
$datos = $consulta->listarNetbookCurso($offset,$limit,$campoOrder,$order,$_POST['busqueda'],$_POST['campoBusqueda']);
class PDF extends FPDF
{

//Cabecera de página
function Header()
{
    //Arial bold 15
    $this->SetFont('Arial','B',15);
    //Movernos a la derecha
    $this->SetY(15);
	$this->Cell(19);
	
	//$this->SetFillColor(236,235,236);	
	
	$this->Cell(150,7,'INFORME ORDEN CORTE',1,0,'C'); 
    //Salto de línea
    $this->Ln(15);
}

//Pie de página
function Footer()
{
    //Posición: a 1,5 cm del final
    $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

//Creación del objeto de la clase heredada
$pdf=new PDF();
$pdf->AliasNbPages();
ob_end_clean(); 
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$pdf->SetFont('Arial','B',16);
$pdf->SetXY(60,45); 
$pdf->Cell(90,10,'ORDEN DE CORTE',0,0,'C'); 

/////////////////////////////////////////////////Orden Corte///////////////////7

//CONTENIDO
	$pos_y = 55;                         // 4 MAS DE LA CABECERA
    $pdf->SetFont('Arial','B',8);			//defino letra
    $pdf->SetXY(5,$pos_y);					//posicion margen izquiero (x) margen superio (y)
	$pdf->SetFillColor(236,235,236);			//color de fondo de la fila
    $pdf->Cell(100,4,'NUMERO DE ORDEN' ,1,0,'L',1);	//valor de la fila
	$pdf->SetFont('Arial','',10);
	$pdf->SetFillColor(236,235,236);			////color de fondo de la 2 fila
	$pdf->Cell(100,4,$_GET['Orden'] ,1,0,'C',1);		//valor de la 2 fila
    $pos_y+=4;

    $pdf->SetFont('Arial','B',8);
    $pdf->SetXY(5,$pos_y);
	$pdf->SetFillColor(999,999,999);
    $pdf->Cell(100,4,'MODELO DE PRENDA' ,1,0,'L',1);
	$pdf->SetFont('Arial','',10);
	$pdf->SetFillColor(999,999,999);
	$pdf->Cell(100,4,$_ordenes['modeloprenda'] ,1,0,'C',1);
    $pos_y+=4;

    $pdf->SetFont('Arial','B',8);
    $pdf->SetXY(5,$pos_y);
    $pdf->SetFillColor(236,235,236);
	$pdf->Cell(100,4,'CLIENTE' ,1,0,'L',1);
	$pdf->SetFont('Arial','',10);
	$pdf->SetFillColor(236,235,236);
    $pdf->Cell(100,4,$_ordenes['entidad'] ,1,0,'C',1);
	$pos_y+=4;

    $pdf->SetFont('Arial','B',8);
    $pdf->SetXY(5,$pos_y);
    $pdf->SetFillColor(999,999,999);
	$pdf->Cell(100,4,'FECHA EMISION' ,1,0,'L',1);
	$pdf->SetFont('Arial','',10);
	$pdf->SetFillColor(999,999,999);
    $pdf->Cell(100,4, $_ordenes['fechaemision'] ,1,0,'C',1);
	$pos_y+=4;

    $pdf->SetFont('Arial','B',8);
    $pdf->SetXY(5,$pos_y);
    $pdf->SetFillColor(236,235,236);
	$pdf->Cell(100,4,'FECHA RECEPCION' ,1,0,'L',1);
	$pdf->SetFont('Arial','',10);
	$pdf->SetFillColor(236,235,236);
    $pdf->Cell(100,4, $_ordenes['fecharecepcion'] ,1,0,'C',1);
	$pos_y+=4;

    $pdf->SetFont('Arial','B',8);
    $pdf->SetXY(5,$pos_y);
    $pdf->SetFillColor(999,999,999);
	$pdf->Cell(100,4,'SUCURSAL' ,1,0,'L',1);
	$pdf->SetFont('Arial','',10);
	$pdf->SetFillColor(999,999,999);
    $pdf->Cell(100,4, $_ordenes['sucursal'] ,1,0,'C',1);
	$pos_y+=4;

    $pdf->SetFont('Arial','B',8);
    $pdf->SetXY(5,$pos_y);
    $pdf->SetFillColor(236,235,236);
	$pdf->Cell(100,4,'ESTADO' ,1,0,'L',1);
	$pdf->SetFont('Arial','',10);
    $pdf->SetFillColor(236,235,236);
	$pdf->Cell(100,4, $_ordenes['estado'] ,1,0,'C',1);
	$pos_y+=4;

    $pdf->SetFont('Arial','B',8);
    $pdf->SetXY(5,$pos_y);
	$pdf->SetFillColor(999,999,999);
    $pdf->Cell(100,4,'OBSERVACION' ,1,0,'L',1);
	$pdf->SetFont('Arial','',10);
	$pdf->SetFillColor(999,999,999);
	$pdf->Cell(100,4, $_ordenes['observacion'] ,1,0,'C',1);
	$pos_y+=4;

    $pdf->SetFont('Arial','B',8);
    $pdf->SetXY(5,$pos_y);
	$pdf->SetFillColor(236,235,236);
    $pdf->Cell(100,4,'COSTO TOTAL DE AVIOS' ,1,0,'L',1);
	$pdf->SetFont('Arial','',10);
	$pdf->SetFillColor(236,235,236);
	$pdf->Cell(100,4,"$".$aviosusados ,1,0,'C',1);
	$pos_y+=4;

	$pdf->SetFont('Arial','B',8);
    $pdf->SetXY(5,$pos_y);
	$pdf->SetFillColor(999,999,999);
    $pdf->Cell(100,4,'COSTO TOTAL DE BORDADO' ,1,0,'L',1);
	$pdf->SetFont('Arial','',10);
	$pdf->SetFillColor(999,999,999);
	$pdf->Cell(100,4,"$".$valorbordado ,1,0,'C',1);
	$pos_y+=4;

    $pdf->SetFont('Arial','B',8);
    $pdf->SetXY(5,$pos_y);
	$pdf->SetFillColor(236,235,236);
    $pdf->Cell(100,4,'COSTO TOTAL DE CONFECCION' ,1,0,'L',1);
	$pdf->SetFont('Arial','',10);
	$pdf->SetFillColor(236,235,236);
	$pdf->Cell(100,4,"$".$valorconfeccion ,1,0,'C',1);
	$pos_y+=4;

    $pdf->SetFont('Arial','B',8);
    $pdf->SetXY(5,$pos_y);
	$pdf->SetFillColor(999,999,999);
    $pdf->Cell(100,4,'CANTIDAD PRENDAS' ,1,0,'L',1);
	$pdf->SetFont('Arial','',10);
	$pdf->SetFillColor(999,999,999);
	$pdf->Cell(100,4,$prendas ,1,0,'C',1);
	$pos_y+=15;
	$pdf->Output();