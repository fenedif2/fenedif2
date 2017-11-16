<?php
//Exportar datos de php a Excel
header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-type:   application/x-msexcel; charset=utf-8");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=list_usuarios.xls");
?>
<HTML LANG="es">
<TITLE>::. Exportacion de Datos .::</TITLE>
</head>
<body>
<?php
include('funciones.php');
require('config.php');
conecta();
$sql = "
SELECT
tusuario.*,
tipoidentificacion.tipoidentificacion_nombre,genero.genero_nombre,estadocivil.estadocivil_nombre,thijos.hijos_descripcion,
formaconocer.formaconocer_nombre,testadocf.estcfdescripcion,t_seguro.experiencia_nombre as tseguro,tiposeguro.tiposeguro_nombre,
tparroquia.pardescripcion,tipoparroquia.tipoparroquia_nombre,t_licencia.experiencia_nombre as licencia,tipolicencia.tipolicencia_nombre,
t_vehiculo.experiencia_nombre as vehiculo,t_adaptacion.experiencia_nombre as adaptacion,t_federacion.experiencia_nombre as federacion,
asociacion.asociacion_nombre,etnia.etnia_nombre
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
where 
tusuario.tusuario_id='3'

";
$result=mysql_query($sql);

?>
 
<TABLE BORDER=1 align="center" CELLPADDING=1 CELLSPACING=1>
<TR>
						<td>CÓDIGO</td>
						<td>TIPO IDENTIFICACIÓN</td>
						<td>NOMBRES Y APELLIDOS</td>
						<td>GÉNERO</td>
						<td>ESTADO CIVIL</td>
						<td>FECHA NACIMIENTO</td>
						<td>NÚMERO DE HIJOS</td>
						<td>FORMA DE CONOCER</td>
						<td>ESTADO</td>
						<td>TIENE SEGURO</td>
						<td>TIPO SEGURO</td>	
						<td>FECHA DE INGRESO</td>
						<td>ÉTNIA</td>
						<td>PARROQUIA</td>
						<td>CALLE PRINCIPAL</td>
						<td>NÚMERO</td>	
						<td>TRANSVERSAL</td>
						<td>SECTOR</td>
						<td>PASAJE</td>
						<td>BARRIO</td>
						<td>MANZANA</td>
						<td>SOLAR</td>
						<td>OBSERVACIÓN</td>	
						<td>FIJO</td>
						<td>MÓVIL</td>
						<td>REFERIDO 1</td>
						<td>REFERIDO 2</td>
						<td>EMAIL</td>	
						<td>OBSERVACIÓN TELÉFONO</td>
						<td>TIENE LICENCIA</td>
						<td>TIPO LICENCIA</td>
						<td>VEHÍCULO</td>
						<td>ADAPTACIÓN</td>
						<td>TIPO ADAPTACIÓN</td>	
						<td class="tdatos">FEDERACIÓN</td>
						<td class="tdatos">TIPO FEDERACION</td>
						<td class="tdatos">ASOCIACIÓN</td>
	
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

</tr>"

,$row["id_usuario"],$row["identificacion"],$row["apellido_paterno"].' '.$row["apellido_materno"] .' '. $row["primer_nombre"].' '. $row["segundo_nombre"]
,$row["genero_nombre"],$row["estadocivil_nombre"],
$row["fecha_nac"],$row["hijos_descripcion"],$row["formaconocer_nombre"],
$row["estcfdescripcion"],$row["tseguro"],$row["tiposeguro_nombre"],$row["fecha_ingreso"],
$row["etnia_nombre"],$row["pardescripcion"],$row["cprincipal"],$row["numero"],
$row["transversal"],$row["tipoparroquia_nombre"],$row["pasaje"],$row["barrio"],
$row["manzana"],$row["solar"],$row["observacion"],$row["fijo"],
$row["movil"],$row["referido1"],$row["referido2"],$row["email"],
$row["observacion_telefono"],$row["licencia"],$row["tipolicencia_nombre"],$row["vehiculo"],
$row["adaptacion"],$row["tipo_adaptacion"],$row["federacion"],$row["asociacion_nombre"],
$row["asociacion"]

);
		
}
mysql_free_result($result);

?>
</table>
</body>
</html>