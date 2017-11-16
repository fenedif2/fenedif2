<?php
session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
    


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
//$pdf->addJpegFromFile('../imgs/utis.jpg',5,540,30);
$pdf->addText(20,590,10,'Universidad Tecnológica Indoamérica');
$pdf->addText(490,590,10,'Centro de Investigación,Innovación y Desarrollo CIID-UTI');
$pdf->addText(20,18,10,$fechs);
$pdf->restoreState();
$pdf->closeObject();
// termina las lineas
$pdf->addObject($all,'all');
//--------
//
$queEmp = "SELECT tusuario.*,
tipoidentificacion.tipoidentificacion_nombre,genero.genero_nombre,estadocivil.estadocivil_nombre,thijos.hijos_descripcion,
formaconocer.formaconocer_nombre,testadocf.estcfdescripcion,t_seguro.experiencia_nombre as tseguro,tiposeguro.tiposeguro_nombre,
tparroquia.pardescripcion,tipoparroquia.tipoparroquia_nombre,t_licencia.experiencia_nombre as licencia,tipolicencia.tipolicencia_nombre,
t_vehiculo.experiencia_nombre as vehiculo,t_adaptacion.experiencia_nombre as adaptacion,t_federacion.experiencia_nombre as federacion,
asociacion.asociacion_nombre,etnia.etnia_nombre,sucursal.sucursal_nombre,usuario.usuario_apellidos,testadousuario.estusudescripcion
FROM
	tusuario
left join
	tipoidentificacion on tusuario.tipoidentificacion_id=tipoidentificacion.tipoidentificacion_id
left join
	genero on tusuario.genero=genero.genero_id
left join
	estadocivil on tusuario.id_estado_civil=estadocivil.estadocivil_id
left join
	thijos on tusuario.num_hijos=thijos.hijos_id
left join
	formaconocer on tusuario.forma_conocer=formaconocer.formaconocer_id
left join
	testadocf on tusuario.estado=testadocf.estcfcodigo
left join
	experiencia as t_seguro on tusuario.seguro=t_seguro.experiencia_id
left join
	tiposeguro on tusuario.tipo_seguro=tiposeguro.tiposeguro_id
left join
	tparroquia on tusuario.parcodigo=tparroquia.parcodigo
left join
	tipoparroquia on tusuario.sector=tipoparroquia.tipoparroquia_id
left join
	experiencia as t_licencia on tusuario.licencia=t_licencia.experiencia_id
left join
	tipolicencia on tusuario.tlicencia=tipolicencia.tipolicencia_id
left join
	experiencia as t_vehiculo on tusuario.vehiculo=t_vehiculo.experiencia_id
left join
	experiencia as t_adaptacion on tusuario.adaptacion_vehiculo=t_adaptacion.experiencia_id
left join
	experiencia as t_federacion on tusuario.federacion=t_federacion.experiencia_id
left join
	asociacion on tusuario.tfederacion=asociacion.asociacion_id
left join
	etnia on tusuario.etnia_id=etnia.etnia_id
left join
	sucursal on tusuario.id_sucursal=sucursal.sucursal_id
left join
	usuario on tusuario.usuario=usuario.usuario_cedula
left join
	testadousuario on tusuario.estado=testadousuario.estusucodigo
where tusuario.id_usuario='$coord'";
$resEmp = mysql_query($queEmp) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);

$ixx = 0;
while($datatmp = mysql_fetch_assoc($resEmp)) { 
	$ixx = $ixx+1;
	$data[] = array_merge($datatmp, array('num'=>$ixx));
}
$titles = array(
				'id_usuario'=>'<b>Num</b>',
				
				
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