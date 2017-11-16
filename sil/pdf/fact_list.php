<?php
session_start();
//incluimos funciones,configuración e idioma
include('../funciones.php');
require('../config.php');
require('../idioma/'.$idioma.'');
header("Content-Type: text/html; charset=UTF-8"); 
//si hay sesión cargamos código
if (isset($_SESSION['usuario_sesion']))
{
$docente = $_SESSION['usuario_sesion'];
$agrupamiento = $_GET['p1'];
$coordinador = $_GET['p2'];
//conecto con MySQL
conecta();

//compruebo agrupamiento
require('html2fpdf.php');
$pdf=new HTML2FPDF('P','mm','A4');
$pdf->pgwidth = 180;
$pdf->SetMargins(20,5,20);
$pdf->AddPage();
$pdf->Cell(40,10,''.decode($utinvetigacion).'');
$pdf->Ln(5);
$pdf->Ln(5);
$pdf->Image('../imgs/universidad.jpg',175,5,30); 
$sel_claves = mysql_query("SELECT  agrupamientos.agrupamiento,agrupamientos.nombre,docentes.nombres,docentes.apellidos,docentes.formacion
,docentes.facultad,agrupamientos.investigacion,agrupamientos.unesco,agrupamientos.fac_pagos,
agrupamientos.uoi,agrupamientos.presupuesto,agrupamientos.cdirectos,agrupamientos.cindirectos,agrupamientos.inversion,
agrupamientos.linvestigacion,agrupamientos.extencion FROM agrupamientos,docentes
	WHERE agrupamientos.docente=docentes.docente AND agrupamientos.agrupamiento='$agrupamiento'");
$num_cla=mysql_num_rows($sel_claves);
if(mysql_num_rows($sel_claves)>0)
{
$reg_claves = mysql_fetch_array($sel_claves);
$extension = $reg_claves['extencion'];
$nombres=$reg_claves['nombres'];
$apellidos=$reg_claves['apellidos'];
$formacion=$reg_claves['formacion'];
$facultad=$reg_claves['facultad'];
$uoi=$reg_claves['uoi'];
$nombre=$reg_claves['nombre'];
$linvestigacion=$reg_claves['linvestigacion'];
$investigacion=$reg_claves['investigacion'];
$texto="El informe final deberá ser entregado en formato de artículo científico para la Revista CienciAmérica (Véase Anexos 1 y 2). ";
$pdf->Ln(5);	
$pdf->Cell(40,10,'Proyecto:' .decode($extension).'');
$pdf->Ln(5);	
$pdf->Cell(40,10,''.decode($nombres).'  '.decode($apellidos).'');
$pdf->Ln(5);	
$pdf->Cell(40,10,''.decode($id_coordinvest).'');
$pdf->Ln(5);	
$pdf->Cell(40,10,'' .decode($extension).'');
$pdf->Ln(5);
$pdf->Cell(40,10,'Email:' );
$pdf->Ln(5);
$pdf->Ln(5);
$pdf->Cell(40,10,'1.	DATOS GENERALES' );
$pdf->Ln(10);
$pdf->Cell(40,10,' o Facultad:' .decode($formacion).'');
$pdf->Ln(5);
$pdf->Cell(40,10,' o Carrera:' .decode($facultad).'');
$pdf->Ln(5);
$pdf->Cell(40,10,' o' .decode($id_uoi).':' .decode($uoi).'');
$pdf->Ln(5);
$pdf->Cell(40,10,' o'.decode($id_cei).'' );
$pdf->Ln(5);
$pdf->Cell(40,10,' o	Centro de Posgrado:' );
$pdf->Ln(8);
$html_11='
	<td border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"1\" align=\"left\">
o'.decode($id_tpi).':'.decode($nombre).'
	</td>';
$pdf->WriteHTML($html_11);
$pdf->Ln(5);
$html_11='
	<td border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"1\" align=\"left\">
o Coordinador (a) del Proyecto:  '.decode($nombres).'  '.decode($apellidos).'
	</td>';
$pdf->WriteHTML($html_11);
$pdf->Ln(5);
$html_11='
	<td border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"1\" align=\"left\">
o'.decode($id_linvestigacionu).': '.decode($linvestigacion).'
	</td>';
$pdf->WriteHTML($html_11);
$pdf->Ln(5);
$html_11='
	<td border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"1\" align=\"left\">
o'.decode($id_linvestigacionc).':
	</td>';
$pdf->WriteHTML($html_11);
$pdf->Ln(5);
$html_11='
	<td border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"1\" align=\"left\">
o'.decode($id_linvestigacionsc).':
	</td>';
$pdf->WriteHTML($html_11);
$pdf->Ln(5);
$html_11='
	<td border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"1\" align=\"left\">
o'.decode($id_investigacion).':'.decode($investigacion).'
	</td>';
$pdf->WriteHTML($html_11);
$pdf->Ln(5);
$pdf->Cell(40,10,'2.	INFORME FINAL DEL PROYECTO' );
$pdf->Ln(8);
$html_11='
<td border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"1\" align=\"left\">
'.decode($texto).' 
</td>';
$pdf->WriteHTML($html_11);
$pdf->Ln(5);
$pdf->Cell(40,10,'3.	INFORME PRESUPUESTARIO DEL PROYECTO' );
$pdf->Ln(5);
$pdf->Cell(40,10,'Tabla 1. Resumen de los gastos del proyecto.' );
$pdf->Ln(5);
$sel_fact = mysql_query("SELECT * FROM facturas WHERE agrupamiento ='$agrupamiento'");
$num_fact=mysql_num_rows($sel_fact);

$html_1='
<br />
<table border=\'1\'>
<tr>
<th>Actividad</th><th>Factura</th><th>Fecha</th><th>Ruc</th><th>Monto de la Factura</th>
</tr>';
$pdf->WriteHTML($html_1);	
if($num_fact>0)
{
for($c=0;$c<$num_fact;$c++)
	{
	$reg_fact = mysql_fetch_array($sel_fact);
	$actividad = $reg_fact['actividad'];
	$factura = $reg_fact['factura'];
	$fecha = $reg_fact['fecha'];
	$ruc = $reg_fact['ruc'];	
	$vtotal = $reg_fact['vtotal'];	
	
	$html_2='
		<tr>
		<td align=\'justify\' width=\'20%\'>'.decode($actividad).'</td>
		<td align=\'center\' width=\'20%\'>'.decode($factura).'</td>
		<td align=\'center\' width=\'20%\'>'.decode($fecha).'</td>
		<td align=\'center\' width=\'20%\'>'.decode($ruc).'</td>
		<td align=\'center\' width=\'20%\'>'.decode($vtotal).'</td>
		</tr>';
		$pdf->WriteHTML($html_2);			
		}
}
	$html_3='</table>';
	$pdf->WriteHTML($html_3);	
	
////////////////////////////// presupuesto  /////////////////////////	
$pdf->Ln(8);
$html_11='
<td border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"1\" align=\"left\">
'.decode("Tabla 2. Presupuesto solicitado y ejecutado del proyecto. En casos en que no se haya ejecutado más del 10% del presupuesto solicitado, el coordinador deberá presentar una justificación.").' 
</td>';
$pdf->WriteHTML($html_11);

$pdf->Ln(5);
$html_1='
<br />
<table border=\'1\'>
<tr>
<th>Partida</th><th>Presupuesto solicitado</th><th>Presupuesto Ejecutado</th><th>Justificación (de ser requerida)</th>
</tr>';
$pdf->WriteHTML($html_1);
	
$sel_cl = mysql_query("SELECT  agrupamientos.agrupamiento,agrupamientos.nombre,docentes.nombres,docentes.apellidos,docentes.formacion
,docentes.facultad,agrupamientos.investigacion,agrupamientos.unesco,agrupamientos.fac_pagos,
agrupamientos.uoi,agrupamientos.solicitado,agrupamientos.cdirectos,agrupamientos.cindirectos,agrupamientos.inversion,
agrupamientos.linvestigacion,agrupamientos.extencion FROM agrupamientos,docentes
	WHERE agrupamientos.docente=docentes.docente AND agrupamientos.agrupamiento='$agrupamiento'");
$num_c=mysql_num_rows($sel_cl);
for($m=0;$m<$num_c;$m++)
	{
	$reg_fa = mysql_fetch_array($sel_cl);
	$solicitado = $reg_fa['solicitado'];
	$inver = $reg_fa['inversion'];
	
	
	
	$html_2='
		<tr>
		<td align=\'justify\' width=\'20%\'> </td>
		<td align=\'center\' width=\'20%\'>'.decode($solicitado).'</td>
		<td align=\'center\' width=\'20%\'>'.decode($inver).'</td>
		<td align=\'justify\' width=\'40%\'> </td>
		</tr>';
		$pdf->WriteHTML($html_2);			
		}
	$html_3='</table>';
	$pdf->WriteHTML($html_3);		
$pdf->Output();
}//fin if
}//fin hay sesión

?>