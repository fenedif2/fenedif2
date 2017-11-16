<?php
include('../funciones.php');
require('../config.php');
require('../idioma/'.$idioma.'');
conecta();
include('class.ezpdf.php');
$pdf = & new Cezpdf('letter','landscape');
// Se inicializa el contador de paginas en 1 y se especifica en que lugar se va a imprimir
$pdf->ezStartPageNumbers(500,18,10,'','Pagina : {PAGENUM} de {TOTALPAGENUM}',1);
// coloca una linea arriba y abajo de todas las paginas
$fechs = date("d/m/y");
$all = $pdf->openObject();
$pdf->saveState();
$pdf->setStrokeColor(0,0,0,1);
$pdf->line(20,30,750,30);
$pdf->line(20,585,750,585);
$pdf->Image('logo_200.jpg',20,5); 
$pdf->addText(20,590,10,'Universidad Tecnológica Indoamérica');
$pdf->addText(490,590,10,'Centro de Investigación,Innovación y Desarrollo CIID-UTI');
$pdf->addText(20,18,10,$fechs);
$pdf->restoreState();
$pdf->closeObject();
// termina las lineas
$pdf->addObject($all,'all');
//--------
//
$queEmp = "select alumnado.codigo,alumnado.nombre,alumnado.apellidos,tinvestigador.nombre_ti,alumnado.facultad,alumnado.permanente,alumnado.formacion,alumnado.sueldo,alumnado.direccion1,alumnado.telef1,alumnado.telef2,alumnado.nacionalidad,alumnado.mail from alumnado,tinvestigador where alumnado.tinvestigador=tinvestigador.clave ";
$resEmp = mysql_query($queEmp) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);

$ixx = 0;
while($datatmp = mysql_fetch_assoc($resEmp)) { 
	$ixx = $ixx+1;
	$data[] = array_merge($datatmp, array('num'=>$ixx));
}
$titles = array(
				'num'=>'<b>Num</b>',
				'nombre'=>'<b>Nombres</b>',
				'apellidos'=>'<b>Apellidos</b>',
				'mail'=>'<b>Extensión</b>',
				'formacion'=>'<b>Unidad Operativa de Investigación</b>',
				'telef1'=>'<b>Sueldo</b>',
				'facultad'=>'<b>Carrera</b>',
				'nombre_ti'=>'<b>Tipo de Investigador/a</b>',
				'sueldo'=>'<b>Valor Hora</b>',
				'permanente'=>'<b>Esporádico Permanente</b>',
			);
$options = array(
				'shadeCol'=>array(0.9,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>700
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