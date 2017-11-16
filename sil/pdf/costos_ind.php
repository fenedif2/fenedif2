<?php
include('../funciones.php');
require('../config.php');
require('../idioma/'.$idioma.'');
conecta();
include('class.ezpdf.php');
$pdf = & new Cezpdf('letter','landscape');
$coord = $_GET['p1'];
// Se inicializa el contador de paginas en 1 y se especifica en que lugar se va a imprimir
$pdf->ezStartPageNumbers(500,18,10,'','Pagina : {PAGENUM} de {TOTALPAGENUM}',1);
// coloca una linea arriba y abajo de todas las paginas
$fechs = date("d/m/y");
$all = $pdf->openObject();
$pdf->saveState();
$pdf->setStrokeColor(0,0,0,1);
$pdf->line(20,30,750,30);
$pdf->line(20,585,750,585);
$pdf->addJpegFromFile('../imgs/utis.jpg',5,540,30);
$pdf->addText(20,590,10,'Universidad Tecnológica Indoamérica');
$pdf->addText(490,590,10,'Centro de Investigación,Innovación y Desarrollo CIID-UTI');
$pdf->addText(20,18,10,$fechs);
$pdf->restoreState();
$pdf->closeObject();
// termina las lineas
$pdf->addObject($all,'all');
//--------
//
$queEmp = "SELECT * from cindirectos ORDER BY codigo";
$resEmp = mysql_query($queEmp) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);

$ixx = 0;
while($datatmp = mysql_fetch_assoc($resEmp)) { 
	$ixx = $ixx+1;
	$data[] = array_merge($datatmp, array('num'=>$ixx));
}
$titles = array(
				'codigo'=>'<b>Código</b>',
				'concepto'=>'<b>Concepto</b>',
				'vpresupuestado'=>'<b>Valor Presupuestado</b>',
				'vreal'=>'<b>Valor real </b>',
			);
$options = array(
				'shadeCol'=>array(0.9,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>750
			);



$pdf->ezTable($data, $titles, '', $options);
//
//
if (isset($d) && $d){
    $pdfcode = $pdf->ezOutput();
    $pdfcode = str_replace('\n','\n<br>',htmlspecialchars($pdfcode));
    echo '<html><body>';
    echo trim($pdfcode);
    echo '</body></html>';
} else {
    $pdf->ezStream();
}
?> 