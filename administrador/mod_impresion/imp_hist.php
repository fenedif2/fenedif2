<?php
?>
<?php
require_once("classpdf/fpdf.php");

/*********** Create PDF ***********************/
    $pdf = new fpdf('P','mm','A4');
	$pdf->AddPage();
    $pdf->SetFont('Arial','B',14);
/***************  Header ***************************/
	$universidad=utf8_decode('Universidad Tecnólogica indoamérica');
	$medico=utf8_decode('Dispensario Médico');
    $header_uno  = $pdf->Text(10, 15, "$universidad");
	$header_uno .= $pdf->text(10, 20, "$medico");
	//$header_uno .= 	$pdf->text(10, 25, "Ciudad");
	//$header_uno .= $pdf->text(10, 30, "Tels");
	$header_uno .= $pdf->Image("../theme/images/uti.jpg", 150, 5);
	$pdf->Cell(190, 20,$header_uno);
	$pdf->Ln();
    $pdf->Cell(190, 10,"");
    $pdf->Ln();
/*************** Cuerpo del documento **************/
    $beg_bod = "Constancia del Historial";
    $pdf->Cell(190, 10,$beg_bod,0, 0, 'C');
    $pdf->Ln();
	$pdf->Image("../theme/images/header_logo.jpg", 30, 60, 150, 130); 
/**************** Campo dni_historial ****************/	
    $pdf->SetFont('Arial','B',10);
    $dni_historial=utf8_decode('Código Expediente:');
	$camp_dni_historial_value = $_POST["dni_historial"];
	$pdf->Cell(70, 8,$dni_historial,1);
	$pdf->SetFont("Times");
	$pdf->Cell(120, 8,$camp_dni_historial_value,1);
	$pdf->Ln();
/**************** Fecha Consulta ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_fec_gen_hist = "Fecha Consulta:";
	$camp_fec_gen_hist_value = $_POST["fec_gen_hist"];
	$pdf->Cell(70, 8,$camp_fec_gen_hist,1);
	$pdf->SetFont("Times");
	$pdf->Cell(120, 8,$camp_fec_gen_hist_value,1);
	$pdf->Ln(); 
/**************** Campo cedula ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_ced = "Cedula:";
	$camp_ced_value = $_POST["ced_pac"];
	$pdf->Cell(70, 8,$camp_ced,1);
	$pdf->SetFont("Times");
	$pdf->Cell(120, 8,$camp_ced_value,1);
	$pdf->Ln();
/**************** Campo nombres ****************/
    $pdf->SetFont('Arial','B',10);		
	$camp_nombre = "Nombres:";
    $camp_pnombre_value = $_POST["pnombre"];
	$camp_snombre_value = $_POST["snombre"];
	$pdf->Cell(70, 8,$camp_nombre,1);
	$pdf->SetFont("Times");
	$nombres=$camp_pnombre_value . "   ". $camp_snombre_value;
	$pdf->Cell(120, 8,$nombres,1);
	$pdf->Ln();
/**************** Campo Apllidos ****************/	
    $pdf->SetFont('Arial','B',10);		
	$camp_apellidos = "Apellidos:";
    $camp_apellidop_value = $_POST["apellidop"];
	$camp_apellidom_value = $_POST["apellidom"];
	$pdf->Cell(70, 8,$camp_apellidos,1);
	$pdf->SetFont("Times");
	$apellidos=$camp_apellidop_value  . "   ". $camp_apellidom_value;
	$pdf->Cell(120, 8,$apellidos,1);
	$pdf->Ln();
/**************** Campo Edad ****************/	
	$pdf->SetFont('Arial','B',10);	
	$camp_edad = "Edad:";
	$camp_edad_value = $_POST["edad"];
    $pdf->Cell(70, 8,$camp_edad,1);
    $pdf->SetFont("Times");
	$pdf->Cell(120, 8,$camp_edad_value,1);
	$pdf->Ln();
/****************  Fecha Nac  ****************/	
	$pdf->SetFont('Arial','B',10);	
	$camp_fec_nac = "Fecha de nacimiento:";
	$camp_fec_nac_value = $_POST["fec_nac"];
    $pdf->Cell(70, 8,$camp_fec_nac,1);
    $pdf->SetFont("Times");
	$pdf->Cell(120, 8,$camp_fec_nac_value,1);
	$pdf->Ln();
/**************** Campo Sexo ****************/	
    $pdf->SetFont('Arial','B',10);	
    $camp_sexo = "Sexo:";
    $camp_sexo_value = $_POST["sexo"];
    $pdf->Cell(70, 8,$camp_sexo,1);
    $pdf->SetFont("Times");
	$pdf->Cell(120, 8,$camp_sexo_value,1);
	$pdf->Ln();
/**************** En caso necesario llamar a ****************/		
    $pdf->SetFont('Arial','B',10);
	$camp_llamar= "En caso necesario llamar a :";
    $camp_llamar_value = $_POST["llamar"];
    $pdf->Cell(70, 8,$camp_llamar,1);
    $pdf->SetFont("Times");
	$pdf->Cell(120, 8,$camp_llamar_value,1);
	$pdf->Ln();
/**************** Campo Nombre del profesional ****************/			
    $pdf->SetFont('Arial','B',10);
	$camp_nombre_apellido = "Nombre del Profesional:";
    $camp_nombre_apellido_value = $_POST["nombre_apellido"];
    $pdf->Cell(70, 8,$camp_nombre_apellido,1);
    $pdf->SetFont("Times");
	$pdf->Cell(120, 8,$camp_nombre_apellido_value,1);
	$pdf->Ln();
/**************** Motivo de Consulta  ****************/			
    $pdf->SetFont('Arial','B',10);
	$camp_mconsulta = "Motivo de Consulta:";
    $camp_mconsulta_value = $_POST["mconsulta"];
    $pdf->Cell(70, 8,$camp_mconsulta,1);
    $pdf->SetFont("Times");
	$pdf->Cell(120, 8,$camp_mconsulta_value,1);
	$pdf->Ln();
/**************** Enfermedad o problema actual  ****************/			
    $pdf->SetFont('Arial','B',10);
	$camp_enfermedad = "Enfermedad o problema actual:";
    $camp_enfermedad_value = $_POST["enfermedad"];
    $pdf->Cell(70, 8,$camp_enfermedad,1);
    $pdf->SetFont("Times");
	$pdf->Cell(120, 8,$camp_enfermedad_value,1);
	$pdf->Ln();
/**************** Revisión actual de órganos y sistemas  ****************/			
    $pdf->SetFont('Arial','B',10);
    $camp_revision=utf8_decode('Revisión actual de órganos y sistemas:');
	$camp_revision_value = $_POST["revision"];
    $pdf->Cell(70, 8,$camp_revision,1);
    $pdf->SetFont("Times");
	$pdf->Cell(120, 8,$camp_revision_value,1);
	$pdf->Ln();
/**************** Examen Físico ****************/	
    $pdf->SetFont('Arial','B',10);		
	$camp_examen=utf8_decode('Examen Físico:');
    $camp_examen_value = $_POST["examen"];
	$pdf->Cell(70, 8,$camp_examen,1);
	$pdf->SetFont("Times");
	$pdf->Cell(120, 8,$camp_examen_value,1);
	$pdf->Ln();
/**************** Diagnósticos ****************/	
    $pdf->SetFont('Arial','B',10);		
	$camp_diagnostico=utf8_decode('Diagnósticos:');
    $camp_diagnostico_value = $_POST["diagnostico"];
    $camp_presuntivo_value = $_POST["presuntivo"];
	$pdf->Cell(40, 8,$camp_diagnostico,1);
	$camp_cied=utf8_decode('CIE:');
	$pdf->Cell(18, 8,$camp_cied,1);
	$camp_pred=utf8_decode('PRE:');
	$pdf->Cell(18, 8,$camp_pred,1);
	$camp_defd=utf8_decode('DEF:');
	$pdf->Cell(18, 8,$camp_defd,1);
	$camp_presuntivo=utf8_decode('Presuntivo/Definitivo');
	$pdf->Cell(42, 8,$camp_presuntivo,1);
	$camp_ciep=utf8_decode('CIE:');
	$pdf->Cell(18, 8,$camp_ciep,1);
	$camp_prep=utf8_decode('PRE:');
	$pdf->Cell(18, 8,$camp_prep,1);
	$camp_defp=utf8_decode('DEF:');
	$pdf->Cell(18, 8,$camp_defp,1);
	$pdf->Ln();
	$pdf->SetFont("Times");
	$pdf->Cell(40,8,$camp_diagnostico_value,1);
	$camp_cied_value = $_POST["cied"];
	$pdf->Cell(18, 8,$camp_cied_value,1);
	$camp_pred_value = $_POST["pred"];
	$pdf->Cell(18, 8,$camp_pred_value,1);
	$camp_defd_value = $_POST["defd"];
	$pdf->Cell(18, 8,$camp_defd_value,1);
	$pdf->Cell(42,8,$camp_presuntivo_value,1);
	$camp_presuntivo_value = $_POST["presuntivo"];
	$camp_ciep_value = $_POST["ciep"];
	$pdf->Cell(18, 8,$camp_ciep_value,1);
	$camp_prep_value = $_POST["prep"];
	$pdf->Cell(18, 8,$camp_prep_value,1);
	$camp_defp_value = $_POST["defp"];
	$pdf->MultiCell(18, 8,$camp_defp_value,1);
	$pdf->Ln();
/**************** Planes de Diagnóstico,Terapeútico y Educacional ****************/	
    $pdf->SetFont('Arial','B',10);		
	$camp_planes=utf8_decode('Planes de Diagnóstico,Terapeútico y Educacional:');
    $camp_planes_value = $_POST["planes"];
	$pdf->Cell(190, 8,$camp_planes,1);
	$pdf->SetFont("Times");
	$pdf->Ln();
	$pdf->Cell(190, 8,$camp_planes_value,1);
	$pdf->Ln();
/************* Footer ************************/	
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(50, 30,"Estudiante.",0,0,'C');
	$med=utf8_decode('Médico DM-UTI');
    $pdf->Cell(190, 30,"$med",0,0, 'C');
    $pdf->Ln();
    $pdf->Output();
	
	
	
	?>