<?php
include('funciones.php');
require('config.php');
conecta();
$coord = $_GET['p1'];
;
header("Content-type: application/pdf; charset=utf-8");
require('html2fpdf.php');
$pdf=new HTML2FPDF('P','mm','A4');
/*********** Create PDF ***********************/
    $pdf = new fpdf('P','mm','A4');
	$pdf->AddPage();
    $pdf->SetFont('Arial','B',14);
/***************  Header ***************************/
	$universidad=utf8_decode('SIL');
    $header_uno  = $pdf->Text(10, 15, "FENEDIF");
	$beg_bod = utf8_decode('$usuario_cedula');
    $pdf->Cell(190, 10,$beg_bod,0, 0, 'C');
	//$header_uno .= $pdf->Image("..imagenes/cursos.png", 150, 5);
	$pdf->Cell(190, 20,$header_uno);
	$pdf->Ln();
    $pdf->Cell(190, 10,"");
    $pdf->Ln();
													
/************* f ************************/	
$sel_agrr = mysql_query("SELECT
tauditoria.*,
usuario.usuario_nombres,usuario.usuario_apellidos,sucursal.sucursal_nombre
FROM
	tauditoria
left join
	usuario on tauditoria.usucuenta=usuario.usuario_cedula
left join
	sucursal on usuario.sucursal=sucursal.sucursal_id
where tauditoria.usucuenta='$coord'");	
$num_cla=mysql_num_rows($sel_agrr);
for($c=0;$c<$num_cla;$c++)
	{
		$rstt= mysql_fetch_array($sel_agrr);
$pdf->SetFont('Arial','B',10);
	$camp_id = decode("Formación:");
	$camp_id_value =$rstt["audcodigo"] ;
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,1);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,1);
	$pdf->Ln();		
	$pdf->SetFont('Arial','B',10);
	$camp_id = decode("Nivel Alcanzado:");
	$camp_id_value =$rstt["acccodigo"] ;
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,1);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,1);
	$pdf->Ln();		
}
/************* Footer ************************/	
 $pdf->SetFont('Arial','B',10);
    $pdf->Cell(50, 30,"JEFE DEPARTAMENTO.",0,0,'C');
	$med=utf8_decode('FUNCIONARIO');
    $pdf->Cell(190, 30,"$med",0,0, 'C');
    $pdf->Ln();


    $pdf->Output();
	


	
	
	
	?>