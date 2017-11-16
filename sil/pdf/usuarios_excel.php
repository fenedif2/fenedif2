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
	$sel_agr = mysql_query("
SELECT tusuario.*,
tipoidentificacion.tipoidentificacion_nombre,genero.genero_nombre,estadocivil.estadocivil_nombre,thijos.hijos_descripcion,
formaconocer.formaconocer_nombre,testadocf.estcfdescripcion,t_seguro.experiencia_nombre as tseguro,tiposeguro.tiposeguro_nombre,
tparroquia.pardescripcion,tipoparroquia.tipoparroquia_nombre,t_licencia.experiencia_nombre as licencia,tipolicencia.tipolicencia_nombre,
t_vehiculo.experiencia_nombre as vehiculo,t_adaptacion.experiencia_nombre as adaptacion,t_federacion.experiencia_nombre as federacion,
asociacion.asociacion_nombre,etnia.etnia_nombre,sucursal.sucursal_nombre,usuario.usuario_apellidos,testadousuario.estusudescripcion,tpuesto.descripcion
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
left join
	tpuesto on tusuario.foto=tpuesto.id_puesto
where tusuario.id_usuario='$coord'");	
$rst= mysql_fetch_array($sel_agr);

	$nombreape = $rst["apellido_paterno"] ." " . $rst["apellido_materno"]." " . $rst["primer_nombre"]." " . $rst["segundo_nombre"] ;	
/***************  Header ***************************/
	$universidad=utf8_decode('SIL');
    //$header_uno  = $pdf->Text(10, 15, "FENEDIF");
	//$beg_bod = utf8_decode('HOJA DE VIDA');
    //$pdf->Cell(190, 10,$beg_bod,0, 0, 'C');
	$header_uno .= $pdf->Image("logo_hv.png", 10, 15);
	//$pdf->Cell(190, 20,$header_uno);
    $pdf->Cell(190, 10,"");
    $pdf->Ln();
  $beg_bod = utf8_decode('DATOS PERSONALES'); 
   $pdf->Cell(190, 8,$beg_bod,0, 0, 'C');
   $pdf->Ln();	
/**************** ID ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_id = "CODIGO:";
	$camp_id_value =$rst["id_usuario"];
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();	  
/**************** ID ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_id = decode("Número de Cédula:");
	$camp_id_value =$rst["identificacion"];
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();	 
/**************** Profesion ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_id = decode("Profesión:");
	$camp_id_value =$rst["descripcion"];
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();	 
		
  /**************** ID ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_id = decode("N° Carné::");
	$camp_id_value =$rst["num_carne"];
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();	 
  /**************** ID ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_id = decode("Nombres y Apellidos:");
	$camp_id_value =$nombreape ;
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();		
/**************** ID ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_id = decode("Género:");
	$camp_id_value =$rst["genero_nombre"] ;
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();	
/**************** ID ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_id = decode("Estado Civil:");
	$camp_id_value =$rst["estadocivil_nombre"];
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();	
/**************** ID ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_id = decode("Numero de hijos:");
	$camp_id_value =$rst["hijos_descripcion"];
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();			
/**************** ID ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_id = decode("Referido Por:");
	$camp_id_value =$rst["formaconocer_nombre"];
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();		
/**************** ID ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_id = decode("Estado:");
	$camp_id_value =$rst["estcfdescripcion"];
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();		
/**************** ID ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_id = decode("Tiene Seguro:");
	$camp_id_value =$rst["tseguro"];
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();		
/**************** ID ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_id = decode("Tipo Seguro:");
	$camp_id_value =$rst["tiposeguro_nombre"];
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();		
/**************** ID ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_id = decode("Fecha de Ingreso:");
	$camp_id_value =$rst["fecha_ingreso"];
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();		
/**************** ID ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_id = decode("Etnia:");
	$camp_id_value =$rst["etnia_nombre"];
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();	
$pdf->SetFont('Arial','B',14);	
$beg_bod = utf8_decode('DOMICILIO'); 
$pdf->Cell(190, 8,$beg_bod,0, 0, 'C');
$pdf->Ln();		
/**************** ID ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_id = decode("Parroquia:");
	$camp_id_value =$rst["pardescripcion"];
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();		
/**************** ID ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_id = decode("Calle Principal:");
	$camp_id_value =$rst["cprincipal"];
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();	
/**************** ID ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_id = decode("Número:");
	$camp_id_value =$rst["numero"];
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();		
/**************** ID ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_id = decode("transversal:");
	$camp_id_value =$rst["transversal"];
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();	
/**************** ID ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_id = decode("Sector:");
	$camp_id_value =$rst["tipoparroquia_nombre"];
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();		
/**************** ID ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_id = decode("Pasaje:");
	$camp_id_value =$rst["pasaje"];
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();	
/**************** ID ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_id = decode("Barrio:");
	$camp_id_value =$rst["barrio"];
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();		
/**************** ID ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_id = decode("Manzana:");
	$camp_id_value =$rst["manzana"];
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();	
/**************** ID ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_id = decode("Solar:");
	$camp_id_value =$rst["solar"];
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();
/**************** ID ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_id = decode("Observación:");
	$camp_id_value =$rst["observacion"];
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();	
$pdf->Ln();	
$pdf->SetFont('Arial','B',14);	
$beg_bod = utf8_decode('TELEFONOS'); 
$pdf->Cell(190, 8,$beg_bod,0, 0, 'C');
$pdf->Ln();				
/**************** ID ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_id = decode("Fijo:");
	$camp_id_value =$rst["fijo"];
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();		
/**************** ID ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_id = decode("Móvil:");
	$camp_id_value =$rst["movil"];
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();		
/**************** ID ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_id = decode("referido 1:");
	$camp_id_value =$rst["referido1"];
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();		
/**************** ID ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_id = decode("Referido 2:");
	$camp_id_value =$rst["referido2"];
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();	
	/**************** ID ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_id = decode("Email:");
	$camp_id_value =$rst["email"];
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();			
/**************** ID ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_id = decode("Observación telefono:");
	$camp_id_value =$rst["observacion_telefono"];
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();		
/**************** ID ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_id = decode("Tiene Licencia:");
	$camp_id_value =$rst["licencia"];
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();	
/**************** ID ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_id = decode("Tipo Licencia:");
	$camp_id_value =$rst["tipolicencia_nombre"];
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();			
/**************** ID ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_id = decode("Vehiculo:");
	$camp_id_value =$rst["vehiculo"];
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();			
/**************** ID ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_id = decode("Adaptacion:");
	$camp_id_value =$rst["adaptacion"];
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();		
/**************** ID ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_id = decode("Tipo adaptacion:");
	$camp_id_value =$rst["tipo_adaptacion"];
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();		
																		
/************* f ************************/	
$sel_agrr = mysql_query("SELECT
           tformacionu.*,
			tipocf.tipo_descripcion as tipo,tformacion.capacitacion_nombre as tipo_formacion,tformaciond.tformaciond_descripcion as descripcion,tusuario.apellido_materno,
tusuario.apellido_paterno,tusuario.primer_nombre,tusuario.segundo_nombre,
tfnecesaria.formacion_descripcion,tnivel.tnivel_descripcion,tniveledu.tniveledu_descripcion,
tavalizado.avalizado_nombre,pcontable.avalizado_nombre as pcontable,dinformatico.avalizado_nombre as dinformatico,dgrafico.avalizado_nombre as dgrafico,
tdigitacion.tdigitacion_descripcion
			FROM
                        tformacionu
			left join
			tipocf on tformacionu.tipo_id=tipocf.tipocf_id
			left join
			tformacion on tformacionu.tipocf_id =tformacion.capacitacion_id
			left join
			tformaciond on tformacionu.descripcion=tformaciond.tformaciond_id
			left join
			tusuario on tformacionu.id_usuario=tusuario.id_usuario
left join
			tfnecesaria on tformacionu.tfnecesaria_id =tfnecesaria.tfnecesaria_id
left join
			tnivel on tformacionu.tnivel_id=tnivel.tnivel_id 
left join
			tniveledu on tformacionu.tniveledu_id=tniveledu.tniveledu_id 
left join
			tavalizado on tformacionu.tinformaticos_id=tavalizado.avalizado_id
left join
			tavalizado as pcontable on tformacionu.pcontable=pcontable.avalizado_id
left join
			tavalizado as dinformatico on tformacionu.dinformatico=dinformatico.avalizado_id
left join
			tavalizado as dgrafico on tformacionu.dgrafico=dgrafico.avalizado_id
left join
			tdigitacion on tformacionu.vdigitacion=tdigitacion.tdigitacion_id
			where 
			tformacionu.id_usuario='$coord'");	
$num_cla=mysql_num_rows($sel_agrr);
$pdf->SetFont('Arial','B',14);
$beg_bod = utf8_decode('FORMACIÓN'); 
$pdf->Cell(190, 8,$beg_bod,0, 0, 'C');
$pdf->Ln();
for($c=0;$c<$num_cla;$c++)
	{
		$rstt= mysql_fetch_array($sel_agrr);
$pdf->SetFont('Arial','B',10);
	$camp_id = decode("Formación:");
	$camp_id_value =$rstt["formacion_descripcion"] ;
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();		
	$pdf->SetFont('Arial','B',10);
	$camp_id = decode("Nivel Alcanzado:");
	$camp_id_value =$rstt["tnivel_descripcion"] ;
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();		
}
/************* Conocmientos Informaticos ************************/	
$sel_aginf = mysql_query("SELECT
           tformacionu_cinformaticos.*,
			tcinformaticos.tcinformaticos_descripcion,conocimientosminimos.conocimientosminimos_nombre
			FROM
                        tformacionu_cinformaticos
left join
			tcinformaticos on tformacionu_cinformaticos.tcinformatico_id=tcinformaticos.tcinformaticos_id
left join
			conocimientosminimos on tformacionu_cinformaticos.conocimientosminimos_id =conocimientosminimos.conocimientosminimos_id
			
			where 
			tformacionu_cinformaticos.id_usuario='$coord'");	
$num_cla=mysql_num_rows($sel_aginf);
$pdf->SetFont('Arial','B',14);
$beg_bod = utf8_decode('CONOCIMIENTOS INFORMÁTICOS'); 
$pdf->Cell(190, 8,$beg_bod,0, 0, 'C');
$pdf->Ln();
for($c=0;$c<$num_cla;$c++)
	{
		$rstt= mysql_fetch_array($sel_aginf);
$pdf->SetFont('Arial','B',10);
	$camp_id = decode("Conocimientos Informáticos:");
	$camp_id_value =$rstt["tcinformaticos_descripcion"] . ' '.$rstt["conocimientosminimos_nombre"] ;
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();		
	
}
/********datos laborales**********************/
$sel_agr1 = mysql_query("SELECT
         tdatosl.*,
			aiees.experiencia_nombre as aiees,alaborados.tporcentaje_descripcion as alaborados,mfamiliar.tporcentaje_descripcion as mfamiliar,
nhombres.tporcentaje_descripcion as nhombres,nmujeres.tporcentaje_descripcion as nmujeres,cingresos.tporcentaje_descripcion as cingresos,
pcargo.experiencia_nombre as pcargo,cuantos.tporcentaje_descripcion as cuantos,tienei.experiencia_nombre as tienei,tipocontrato.tipocontrato_nombre,
aspiracionsalarial.aspiracionsalarial_nombre,ayudastecnicas.ayudastecnicas_nombre,alaborando.experiencia_nombre as alaborando,insertado.experiencia_nombre as insertado,
tqgarante.tqgarante_descripcion
			FROM
                        tdatosl
			left join
			experiencia as aiees on tdatosl.aiess_id =aiees.experiencia_id
left join
			tporcentaje as alaborados on tdatosl.alaborados_id =alaborados.tporcentaje_id
left join
			tporcentaje as mfamiliar on tdatosl.mfamiliar_id =mfamiliar.tporcentaje_id
left join
			tporcentaje as nhombres on tdatosl.nhombres_id =nhombres.tporcentaje_id
left join
			tporcentaje as nmujeres on tdatosl.nmujeres_id =nmujeres.tporcentaje_id
left join
			tporcentaje as cingresos on tdatosl.cingresos_id =cingresos.tporcentaje_id
left join
			experiencia as pcargo on tdatosl.pcargo_id =pcargo.experiencia_id
left join
			tporcentaje as cuantos on tdatosl.cingresos_id =cuantos.tporcentaje_id
left join
			experiencia as tienei on tdatosl.tienei_id=tienei.experiencia_id
left join
			tipocontrato on tdatosl.tipoi_id=tipocontrato.tipocontrato_id
left join
			aspiracionsalarial on tdatosl.mingreso_id=aspiracionsalarial.aspiracionsalarial_id
left join
			ayudastecnicas on tdatosl.atecnica_id=ayudastecnicas.ayudastecnicas_id
left join
			experiencia as alaborando on tdatosl.alaborando_id=alaborando.experiencia_id
left join
			experiencia as insertado on tdatosl.insertado_id=insertado.experiencia_id
left join
			tqgarante on tdatosl.relacion_id=tqgarante.tqgarante_id
			where 
			tdatosl.id_usuario='$coord'");	
$num_cla=mysql_num_rows($sel_agr1);
$pdf->SetFont('Arial','B',14);
$beg_bod = utf8_decode('DATOS LABORALES'); 
$pdf->Cell(190, 8,$beg_bod,0, 0, 'C');
$pdf->Ln();
for($c=0;$c<$num_cla;$c++)
	{
		$rst1= mysql_fetch_array($sel_agr1);
$pdf->SetFont('Arial','B',10);
	$camp_id = decode("Empresa:");
	$camp_id_value =$rst1["empresa"] ;
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();		
	$pdf->SetFont('Arial','B',10);
	$camp_id = decode("Jefe Inmediato:");
	$camp_id_value =$rst1["jinmediato"] ;
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();	
	$pdf->SetFont('Arial','B',10);
	$camp_id = decode("Cargo:");
	$camp_id_value =$rst1["cargo"] ;
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();			
}
/********TIPO DISCAPACIDAD**********************/
$sel_agr1 = mysql_query("SELECT
tusuario_discapacidad.*,tipodiscapacidad.tipodiscapacidad_nombre,partesafectadas.partesafectadas_nombre,
nivelavance.nivelavance_nombre,origendeficiencia.origendeficiencia_nombre,
tporcentaje.tporcentaje_descripcion,tipoayudaeconomica.tipoayudaeconomica_nombre,
estadodiscapacidad.estadodiscapacidad_nombre,rehabilitacion.experiencia_nombre AS rehabilitacion,
tiposeguro.tiposeguro_nombre,tratamientod.experiencia_nombre AS tratamientod,tratamiento.tratamiento_nombre,horario.horario_nombre
FROM
tusuario_discapacidad
LEFT JOIN
	tipodiscapacidad ON tusuario_discapacidad.id_tipo_discapacidad=tipodiscapacidad.tipodiscapacidad_id
LEFT JOIN
	partesafectadas ON tusuario_discapacidad.id_detalle_tipo_discapacidad=partesafectadas.partesafectadas_id
LEFT JOIN
	nivelavance ON tusuario_discapacidad.nivelavance_id=nivelavance.nivelavance_id
LEFT JOIN
	origendeficiencia ON tusuario_discapacidad.odiscapacidad_id=origendeficiencia.origendeficiencia_id
LEFT JOIN
	tporcentaje ON tusuario_discapacidad.tporcentaje_id=tporcentaje.tporcentaje_id
LEFT JOIN
	tipoayudaeconomica ON tusuario_discapacidad.tipoayudaeconomica_id=tipoayudaeconomica.tipoayudaeconomica_id
LEFT JOIN
	estadodiscapacidad ON tusuario_discapacidad.estadodiscapacidad_id=estadodiscapacidad.estadodiscapacidad_id
LEFT JOIN
	experiencia AS rehabilitacion ON tusuario_discapacidad.crehabilitacion_id=rehabilitacion.experiencia_id
LEFT JOIN
	tiposeguro ON tusuario_discapacidad.tipocentro_id=tiposeguro.tiposeguro_id
LEFT JOIN
	experiencia AS tratamientod ON tusuario_discapacidad.tratamiento_id=tratamientod.experiencia_id
LEFT JOIN
	tratamiento ON tusuario_discapacidad.ttratamiento_id=tratamiento.tratamiento_id
LEFT JOIN
	horario ON tusuario_discapacidad.thorario_id=horario.horario_id
WHERE 
	tusuario_discapacidad.id_usuario='$coord'");	
$num_cla=mysql_num_rows($sel_agr1);
$pdf->SetFont('Arial','B',14);
$beg_bod = utf8_decode('TIPO DISCAPACIDAD'); 
$pdf->Cell(190, 8,$beg_bod,0, 0, 'C');
$pdf->Ln();
for($c=0;$c<$num_cla;$c++)
	{
		$rst1= mysql_fetch_array($sel_agr1);
$pdf->SetFont('Arial','B',10);
	$camp_id = decode("Tipo Discapacidad:");
	$camp_id_value =$rst1["tipodiscapacidad_nombre"] ;
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();		
	$pdf->SetFont('Arial','B',10);
	$camp_id = decode("Partes Afectadas:");
	$camp_id_value =$rst1["partesafectadas_nombre"] ;
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();	
	$pdf->SetFont('Arial','B',10);
	$camp_id = decode("Nivel de Avance:");
	$camp_id_value =$rst1["nivelavance_nombre"] ;
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();	
	
}	
/********TIPO FORMACIONII**********************/
$sel_agr1 = mysql_query("SELECT tformacionii.*,
			institucion.institucion_nombre,capacitadosil.experiencia_nombre AS capacitado_sil,centro_formativo.nombre AS centro_formativo,
		tcursocf.nombre AS nombre_curso
			FROM
                        tformacionii
			LEFT JOIN
			institucion ON tformacionii.institucion_id=institucion.institucion_id
			LEFT JOIN
			experiencia AS capacitadosil ON tformacionii.capacitado_id=capacitadosil.experiencia_id
			LEFT JOIN
			centro_formativo ON tformacionii.centroformativo_id=centro_formativo.id_centro_formativo
	
			LEFT JOIN
			tcursocf ON tformacionii.cursos_id=tcursocf.id_tcursocf
			WHERE 
			tformacionii.id_usuario='$coord'");	
$num_cla=mysql_num_rows($sel_agr1);
$pdf->SetFont('Arial','B',14);
$beg_bod = utf8_decode('CAPACITACIÓN RECIBIDA'); 
$pdf->Cell(190, 8,$beg_bod,0, 0, 'C');
$pdf->Ln();
for($c=0;$c<$num_cla;$c++)
	{
		$rst1= mysql_fetch_array($sel_agr1);
$pdf->SetFont('Arial','B',10);
	$camp_id = decode("Nombre del Curso:");
	$camp_id_value =$rst1["ncurso"] ;
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();		
	$pdf->SetFont('Arial','B',10);
	$camp_id = decode("Duración:");
	$camp_id_value =$rst1["duracion"] ;
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();	
	
}	
/********TIPO DISCAPACIDAD**********************/
$sel_agr1 = mysql_query("SELECT
         tdatosl.*,
			aiees.experiencia_nombre AS aiees,alaborados.tporcentaje_descripcion AS alaborados,mfamiliar.tporcentaje_descripcion AS mfamiliar,
nhombres.tporcentaje_descripcion AS nhombres,nmujeres.tporcentaje_descripcion AS nmujeres,cingresos.tporcentaje_descripcion AS cingresos,
pcargo.experiencia_nombre AS pcargo,cuantos.tporcentaje_descripcion AS cuantos,tienei.experiencia_nombre AS tienei,tipocontrato.tipocontrato_nombre,
aspiracionsalarial.aspiracionsalarial_nombre,ayudastecnicas.ayudastecnicas_nombre,alaborando.experiencia_nombre AS alaborando,insertado.experiencia_nombre AS insertado,
tqgarante.tqgarante_descripcion
			FROM
                        tdatosl
			LEFT JOIN
			experiencia AS aiees ON tdatosl.aiess_id =aiees.experiencia_id
LEFT JOIN
			tporcentaje AS alaborados ON tdatosl.alaborados_id =alaborados.tporcentaje_id
LEFT JOIN
			tporcentaje AS mfamiliar ON tdatosl.mfamiliar_id =mfamiliar.tporcentaje_id
LEFT JOIN
			tporcentaje AS nhombres ON tdatosl.nhombres_id =nhombres.tporcentaje_id
LEFT JOIN
			tporcentaje AS nmujeres ON tdatosl.nmujeres_id =nmujeres.tporcentaje_id
LEFT JOIN
			tporcentaje AS cingresos ON tdatosl.cingresos_id =cingresos.tporcentaje_id
LEFT JOIN
			experiencia AS pcargo ON tdatosl.pcargo_id =pcargo.experiencia_id
LEFT JOIN
			tporcentaje AS cuantos ON tdatosl.cingresos_id =cuantos.tporcentaje_id
LEFT JOIN
			experiencia AS tienei ON tdatosl.tienei_id=tienei.experiencia_id
LEFT JOIN
			tipocontrato ON tdatosl.tipoi_id=tipocontrato.tipocontrato_id
LEFT JOIN
			aspiracionsalarial ON tdatosl.mingreso_id=aspiracionsalarial.aspiracionsalarial_id
LEFT JOIN
			ayudastecnicas ON tdatosl.atecnica_id=ayudastecnicas.ayudastecnicas_id
LEFT JOIN
			experiencia AS alaborando ON tdatosl.alaborando_id=alaborando.experiencia_id
LEFT JOIN
			experiencia AS insertado ON tdatosl.insertado_id=insertado.experiencia_id
LEFT JOIN
			tqgarante ON tdatosl.relacion_id=tqgarante.tqgarante_id
			WHERE 
			tdatosl.id_usuario='$coord'");	
$num_cla=mysql_num_rows($sel_agr1);
$pdf->SetFont('Arial','B',14);
$beg_bod = utf8_decode('EXPERIENCIA LABORAL'); 
$pdf->Cell(190, 8,$beg_bod,0, 0, 'C');
$pdf->Ln();
for($c=0;$c<$num_cla;$c++)
	{
		$rst1= mysql_fetch_array($sel_agr1);
$pdf->SetFont('Arial','B',10);
	$camp_id = decode("Empresa:");
	$camp_id_value =$rst1["empresa"] ;
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();		
	$pdf->SetFont('Arial','B',10);
	$camp_id = decode("Jefe Inmediato:");
	$camp_id_value =$rst1["jinmediato"] ;
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();	
	$pdf->SetFont('Arial','B',10);
	$camp_id = decode("Cargo:");
	$camp_id_value =$rst1["cargo"] ;
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();	
	$pdf->SetFont('Arial','B',10);
	$camp_id = decode("Teléfono:");
	$camp_id_value =$rst1["telefono"] ;
	//$pdf->Cell(50,10,''.decode($id_usuario).'',0,0,'L');
	$pdf->Cell(50, 8,$camp_id,0);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_id_value,0);
	$pdf->Ln();			
}	
/************* Footer ************************/	
 	$pdf->SetFont('Arial','B',10);
    $pdf->Cell(50, 30,"RESPONSABLE.",0,0,'C');
	$pdf->Cell(190, 30,"$med",0,0, 'C');
    $pdf->Ln();
    $pdf->Output();
	


	
	
	
	?>