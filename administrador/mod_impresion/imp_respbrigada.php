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
    $header_uno  = $pdf->Text(10, 40, "$universidad");
	//$header_uno .= 	$pdf->text(10, 25, "Ciudad");
	//$header_uno .= $pdf->text(10, 30, "Tels");
	$header_uno .= $pdf->Image("../theme/images/logo_tixi.jpg", 120, 5);
	$header_uno .= $pdf->Image("../theme/images/escudoe.jpg", 10, 5);
	$pdf->Cell(190, 20,$header_uno);
	$pdf->Ln();
    $pdf->Cell(190, 10,"");
    $pdf->Ln();
/*************** Cuerpo del documento **************/
    $beg_bod = utf8_decode('RESPONSABLE DE BRIGADA');
    $pdf->Cell(190, 10,$beg_bod,0, 0, 'C');
    $pdf->Ln();
	
	  
/**************** Campo cedula ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_ced = "CEDULA:";
	$camp_ced_value = $_POST["respbrigada_cedula"];
	$pdf->Cell(50, 8,$camp_ced,1);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_ced_value,1);
	$pdf->Ln();
/**************** Campo apellido paterno ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_apellidop = "NOMBRES:";
	$camp_apellidop_value = $_POST["nombres"];
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
/**************** APELLIDOS ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_apellidop = "EMAIL:";
	$camp_apellidop_value = $_POST["email"];
	$pdf->Cell(50, 8,$camp_apellidop,1);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_apellidop_value,1);
	$pdf->Ln();
/**************** brigada ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_apellidop = "BRIGADA:";
	$camp_apellidop_value = $_POST["brigada"];
	$pdf->Cell(50, 8,$camp_apellidop,1);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_apellidop_value,1);
	$pdf->Ln();
/**************** APELLIDOS ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_apellidop = "TELEFONO:";
	$camp_apellidop_value = $_POST["telefono"];
	$pdf->Cell(50, 8,$camp_apellidop,1);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_apellidop_value,1);
	$pdf->Ln();	
/**************** APELLIDOS ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_apellidop = "PROFESION:";
	$camp_apellidop_value = $_POST["profesion"];
	$pdf->Cell(50, 8,$camp_apellidop,1);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_apellidop_value,1);
	$pdf->Ln();	
/**************** APELLIDOS ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_apellidop = "ROL:";
	$camp_apellidop_value = $_POST["rol"];
	$pdf->Cell(50, 8,$camp_apellidop,1);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_apellidop_value,1);
	$pdf->Ln();		
/************* Footer ************************/	

    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(50, 30,"JEFE BRIGADA.",0,0,'C');
	$med=utf8_decode('TECNICO');
    $pdf->Cell(190, 30,"$med",0,0, 'C');
    $pdf->Ln();


    $pdf->Output();
	
	
	
	?>