<?php
//Exportar datos de php a Excel
header("Content-Type: application/vnd.ms-excel");
header('Content-type: application/vnd.ms-excel;charset=utf8_decode()');
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=list_usuariop.xls");
?>
<HTML LANG="es">
<TITLE>::. Exportacion de Datos .::</TITLE>
</head>
<body>
<?php
include('funciones.php');
require('config.php');
conecta();
//$coord = $_GET['p1'];
$sql = "SELECT DISTINCT tusuario.*,
tipoidentificacion.tipoidentificacion_nombre,genero.genero_nombre,estadocivil.estadocivil_nombre,thijos.hijos_descripcion,
formaconocer.formaconocer_nombre,testadocf.estcfdescripcion,t_seguro.experiencia_nombre AS tseguro,tiposeguro.tiposeguro_nombre,
tparroquia.pardescripcion,tipoparroquia.tipoparroquia_nombre,t_licencia.experiencia_nombre AS licencia,tipolicencia.tipolicencia_nombre,
t_vehiculo.experiencia_nombre AS vehiculo,t_adaptacion.experiencia_nombre AS adaptacion,t_federacion.experiencia_nombre AS federacion,
asociacion.asociacion_nombre,etnia.etnia_nombre,`tprovincia`.`prodescripcion`,`tpuesto`.`descripcion`,
tipodiscapacidad.tipodiscapacidad_nombre,partesafectadas.partesafectadas_nombre,
nivelavance.nivelavance_nombre,origendeficiencia.origendeficiencia_nombre,tporcentaje.tporcentaje_descripcion,
YEAR(CURDATE())-YEAR(`fecha_nac`)  AS `edad_actual`,tfnecesaria.formacion_descripcion,tnivel.tnivel_descripcion,tniveledu.tniveledu_descripcion
FROM
	tusuario
LEFT JOIN
	tipoidentificacion ON tusuario.tipoidentificacion_id=tipoidentificacion.tipoidentificacion_id
LEFT JOIN
	genero ON tusuario.genero=genero.genero_id
LEFT JOIN
	estadocivil ON tusuario.id_estado_civil=estadocivil.estadocivil_id
LEFT JOIN
	thijos ON tusuario.num_hijos=thijos.hijos_id
LEFT JOIN
	formaconocer ON tusuario.forma_conocer=formaconocer.formaconocer_id
LEFT JOIN
	testadocf ON tusuario.estado=testadocf.estcfcodigo
LEFT JOIN
	experiencia AS t_seguro ON tusuario.seguro=t_seguro.experiencia_id
LEFT JOIN
	tiposeguro ON tusuario.tipo_seguro=tiposeguro.tiposeguro_id
LEFT JOIN
	tparroquia ON tusuario.parcodigo=tparroquia.parcodigo
LEFT JOIN
	`tcanton` ON tparroquia.`cancodigo`=`tcanton`.`cancodigo`
LEFT JOIN
	`tprovincia` ON `tcanton`.`procodigo`=`tprovincia`.`procodigo`		
LEFT JOIN
	tipoparroquia ON tusuario.sector=tipoparroquia.tipoparroquia_id
LEFT JOIN
	experiencia AS t_licencia ON tusuario.licencia=t_licencia.experiencia_id
LEFT JOIN
	tipolicencia ON tusuario.tlicencia=tipolicencia.tipolicencia_id
LEFT JOIN
	experiencia AS t_vehiculo ON tusuario.vehiculo=t_vehiculo.experiencia_id
LEFT JOIN
	experiencia AS t_adaptacion ON tusuario.adaptacion_vehiculo=t_adaptacion.experiencia_id
LEFT JOIN
	experiencia AS t_federacion ON tusuario.federacion=t_federacion.experiencia_id
LEFT JOIN
	asociacion ON tusuario.tfederacion=asociacion.asociacion_id
LEFT JOIN
	etnia ON tusuario.etnia_id=etnia.etnia_id
LEFT JOIN
	`tpuesto` ON `tusuario`.`foto`=`tpuesto`.`id_puesto`


LEFT JOIN
			`tusuario_discapacidad` ON `tusuario`.`id_usuario`=`tusuario_discapacidad`.`id_usuario`
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
	`tformacionu` ON `tusuario`.`id_usuario`=`tformacionu`.`id_usuario`
LEFT JOIN
			tfnecesaria ON tformacionu.tfnecesaria_id =tfnecesaria.tfnecesaria_id
LEFT JOIN
			tnivel ON tformacionu.tnivel_id=tnivel.tnivel_id 
LEFT JOIN
			tniveledu ON tformacionu.tniveledu_id=tniveledu.tniveledu_id		
WHERE
tusuario.tusuario_id='2' order by apellido_paterno
";
$result=mysql_query($sql);
 
?>
 
<TABLE BORDER=1 align="center" CELLPADDING=1 CELLSPACING=1>
<TR>
						<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">TIPO IDENTIFICACIÓN</td>
						<td class="tdatos">NOMBRES Y APELLIDOS</td>
						<td class="tdatos">GÉNERO</td>
						<td class="tdatos">ESTADO CIVIL</td>
						<td class="tdatos">FECHA NACIMIENTO</td>
						<td class="tdatos">NÚMERO DE HIJOS</td>
						<td class="tdatos">FORMA DE CONOCER</td>
						<td class="tdatos">ESTADO</td>
						<td class="tdatos">TIENE SEGURO</td>
						<td class="tdatos">TIPO SEGURO</td>	
						<td class="tdatos">FECHA DE INGRESO</td>
						<td class="tdatos">ÉTNIA</td>
						<td class="tdatos">PARROQUIA</td>
						<td class="tdatos">CALLE PRINCIPAL</td>
						<td class="tdatos">NÚMERO</td>	
						<td class="tdatos">TRANSVERSAL</td>
						<td class="tdatos">SECTOR</td>
						<td class="tdatos">PASAJE</td>
						<td class="tdatos">BARRIO</td>
						<td class="tdatos">MANZANA</td>
						<td class="tdatos">SOLAR</td>
						<td class="tdatos">OBSERVACIÓN</td>	
						<td class="tdatos">FIJO</td>
						<td class="tdatos">MÓVIL</td>
						<td class="tdatos">REFERIDO 1</td>
						<td class="tdatos">REFERIDO 2</td>
						<td class="tdatos">EMAIL</td>	
						<td class="tdatos">OBSERVACIÓN TELÉFONO</td>
						<td class="tdatos">TIENE LICENCIA</td>
						<td class="tdatos">TIPO LICENCIA</td>
						<td class="tdatos">VEHÍCULO</td>
						<td class="tdatos">ADAPTACIÓN</td>
						<td class="tdatos">TIPO ADAPTACIÓN</td>	
						<td class="tdatos">FEDERACIÓN</td>
						<td class="tdatos">TIPO FEDERACION</td>
						<td class="tdatos">ASOCIACIÓN</td>
						<td class="tdatos">PROVINCIA</td>
						<td class="tdatos">PROFESIÓN</td>
						<td class="tdatos">TIPO DISCAPACIDAD</td>
						<td class="tdatos">PARTES AFECTADAS</td>
						<td class="tdatos">NIVEL AVANCE</td>
						<td class="tdatos">ORIGEN DEFICIENCIA</td>
						<td class="tdatos">PORCENTAJE</td>
						<td class="tdatos">FORMACION </td>
						<td class="tdatos">NIVEL FORMACION </td>
						<td class="tdatos">NIVEL EDUCACION </td>
						<td class="tdatos">EDAD</td>
	
</TR>

<?php
while($row = mysql_fetch_array($result)) 
{
printf("<tr>
<td>&nbsp;%s</td>
<td>&nbsp;%s&nbsp;</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s&nbsp;</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s&nbsp;</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s&nbsp;</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s&nbsp;</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s&nbsp;</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s&nbsp;</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s&nbsp;</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s&nbsp;</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s&nbsp;</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
</tr>"

,$row["id_usuario"],$row["identificacion"],$row["apellido_paterno"].' '.$row["apellido_materno"] .' '. $row["primer_nombre"].' '. $row["segundo_nombre"]
,$row["genero_nombre"],$row["estadocivil_nombre"],
$row["fecha_nac"],$row["hijos_descripcion"],$row["formaconocer_nombre"],$row["estcfdescripcion"],$row["tseguro"],
$row["tiposeguro_nombre"],$row["fecha_ingreso"],$row["etnia_nombre"],$row["pardescripcion"],$row["cprincipal"],
$row["numero"],$row["transversal"],$row["tipoparroquia_nombre"],$row["pasaje"],$row["barrio"],
$row["manzana"],$row["solar"],$row["observacion"],$row["fijo"],$row["movil"],
$row["referido1"],$row["referido2"],$row["email"],$row["observacion_telefono"],$row["licencia"],
$row["tipolicencia_nombre"],$row["vehiculo"],$row["adaptacion"],$row["tipo_adaptacion"],$row["federacion"],
$row["asociacion_nombre"],$row["asociacion"],$row["prodescripcion"],$row["descripcion"],$row["tipodiscapacidad_nombre"],
$row["partesafectadas_nombre"],$row["nivelavance_nombre"],$row["origendeficiencia_nombre"],$row["tporcentaje_descripcion"],$row["formacion_descripcion"],
$row["tnivel_descripcion"],$row["tniveledu_descripcion"],$row["edad_actual"]

);
		
}
mysql_free_result($result);

?>
</table>
</body>
</html>