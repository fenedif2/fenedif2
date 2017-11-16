<?php 
?>
<?php
require_once("classpdf/fpdf.php");
header("Content-type: application/pdf; charset=utf-8");
/*********** Create PDF ***********************/
    $pdf = new fpdf('P','mm','A4');
	$pdf->AddPage();
    $pdf->SetFont('Arial','B',14);
/***************  Header ***************************/
	//$header_uno .= 	$pdf->text(10, 25, "Ciudad");
	//$header_uno .= $pdf->text(10, 30, "Tels");
	$header_uno .= $pdf->Image("../theme/images/logo_tixi.jpg", 120, 5);
	$header_uno .= $pdf->Image("../theme/images/escudoe.jpg", 10, 5);
	$pdf->Cell(190, 20,$header_uno);
	$pdf->Ln();
    $pdf->Cell(190, 10,"");
    $pdf->Ln();
/*************** Cuerpo del documento **************/
    $beg_bod = utf8_decode('TÉCNICOS');
    $pdf->Cell(190, 10,$beg_bod,0, 0, 'C');
    $pdf->Ln();
	
	  
/**************** Campo cedula ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_ced = "CODIGO:";
	$camp_ced_value = $_POST["tecnico_id"];
	$pdf->Cell(50, 8,$camp_ced,1);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_ced_value,1);
	$pdf->Ln();
/**************** Campo apellido paterno ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_apellidop = "NOMBRES:";
	$camp_apellidop_value = $_POST["nombre"];
	$pdf->Cell(50, 8,$camp_apellidop,1);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_apellidop_value,1);
	$pdf->Ln();

/**************** APELLIDOS ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_apellidop = "APELLIDOS:";
	$camp_apellidop_value = $_POST["apellidos"];
	$pdf->Cell(50, 8,$camp_apellidop,1);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_apellidop_value,1);
	$pdf->Ln();
/**************** TIPO TECNICO ****************/	
$pdf->SetFont('Arial','B',10);
	$camp_apellidop = utf8_decode("TIPO TÉCNICO:");
	$camp_apellidop_value = $_POST["ttecnico"];
	$pdf->Cell(50, 8,$camp_apellidop,1);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_apellidop_value,1);
	$pdf->Ln();	
/**************** profesión ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_apellidop = utf8_decode("PROFESIÓN:");
	$camp_apellidop_value = $_POST["profesion"];
	$pdf->Cell(50, 8,$camp_apellidop,1);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_apellidop_value,1);
	$pdf->Ln();	
/**************** BRIGADA ****************/
    $pdf->SetFont('Arial','B',10);
	$camp_apellidop = "BRIGADA:";
	$camp_apellidop_value = $_POST["brigada"];
	$pdf->Cell(50, 8,$camp_apellidop,1);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_apellidop_value,1);
	$pdf->Ln();	
/**************** CARGO****************/
    $pdf->SetFont('Arial','B',10);
	$camp_apellidop = "CARGO:";
	$camp_apellidop_value = $_POST["cargo"];
	$pdf->Cell(50, 8,$camp_apellidop,1);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_apellidop_value,1);
	$pdf->Ln();	
/**************** CLAVE****************/
    $pdf->SetFont('Arial','B',10);
	$camp_apellidop = "CLAVE:";
	$camp_apellidop_value = $_POST["clave"];
	$pdf->Cell(50, 8,$camp_apellidop,1);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_apellidop_value,1);
	$pdf->Ln();		
/************* Footer ************************/	

    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(50, 30,"JEFE BRIGADA.",0,0,'C');
	$med=utf8_decode('TÉCNICO');
    $pdf->Cell(190, 30,"$med",0,0, 'C');
    $pdf->Ln();


    $pdf->Output();
	
	
	
	?>