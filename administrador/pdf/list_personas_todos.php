<?php
//Exportar datos de php a Excel
header("Content-Type: application/vnd.ms-excel");
header('Content-type: application/vnd.ms-excel;charset=utf8_decode()');
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=list_persona_todos.xls");
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
$sql = "
SELECT 
                   DISTINCT  tusuariocontratacion.*, `tusuariocontratacion`.`fecha_ingreso` AS fingreso,
		     tusuario.*,tpuesto.descripcion,testadocontratacion.contratacion_descripcion,tmrechazo.descripcion_mrechazo,
tempresa.nombre,sucursal.sucursal_nombre,tipodiscapacidad.tipodiscapacidad_nombre,partesafectadas.partesafectadas_nombre,
nivelavance.nivelavance_nombre,origendeficiencia.origendeficiencia_nombre,tporcentaje.tporcentaje_descripcion,
YEAR(CURDATE())-YEAR(`fecha_nac`)  AS `edad_actual`,tfnecesaria.formacion_descripcion,tnivel.tnivel_descripcion,tniveledu.tniveledu_descripcion
			FROM
                          tusuariocontratacion
LEFT JOIN
			tusuario ON tusuariocontratacion.id_usuario_puesto=tusuario.id_usuario
			
LEFT JOIN
			tpuesto_empresa  ON tusuariocontratacion.id_puestoempresa=tpuesto_empresa.id_puestoempresa
LEFT JOIN
			tempresa  ON tpuesto_empresa.id_empresa=tempresa.id_empresa
LEFT JOIN
			sucursal  ON tempresa.id_sucursal=sucursal.sucursal_id
LEFT JOIN
			tpuesto  ON tpuesto_empresa.id_puesto=tpuesto.id_puesto
LEFT JOIN
			testadocontratacion  ON tusuariocontratacion.id_estadocontratacion=testadocontratacion.id_estadocontratacion
LEFT JOIN
			tmrechazo  ON tusuariocontratacion.id_mrechazo=tmrechazo.id_mrechazo
LEFT JOIN
			`tusuario_discapacidad` ON tusuariocontratacion.`id_usuario_puesto`=`tusuario_discapacidad`.`id_usuario`
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
	`tformacionu` ON `tusuariocontratacion`.`id_usuario_puesto`=`tformacionu`.`id_usuario`
LEFT JOIN
			tfnecesaria ON tformacionu.tfnecesaria_id =tfnecesaria.tfnecesaria_id
LEFT JOIN
			tnivel ON tformacionu.tnivel_id=tnivel.tnivel_id 
LEFT JOIN
			tniveledu ON tformacionu.tniveledu_id=tniveledu.tniveledu_id 					
WHERE 	tusuariocontratacion.`id_estadocontratacion`=1					
";
$result=mysql_query($sql);
 
?>
 
<TABLE BORDER=1 align="center" CELLPADDING=1 CELLSPACING=1>
<TR>
						<td>CÓDIGO</td>
						<td>TFECHA</td>
						<td>APELLIDO PATERNO</td>
						<td>APELLIDO MATERNO</td>
						<td>PRIMER NOMBRE</td>
						<td>SEGUNDO NOMBRE</td>
						<td>EMPRESA</td>
						<td>TELÉFONO EMPRESA</td>
						<td>SUCURSAL</td>
						<td class="tdatos">ESTADO</td>
						<td class="tdatos">DESCRIPCION</td>
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
</tr>"

,$row["id_usuario_contratacion"],$row["fingreso"],$row["apellido_paterno"],$row["apellido_materno"],
$row["primer_nombre"],$row["segundo_nombre"],$row["nombre"],$row["fijo"],
$row["sucursal_nombre"],$row["contratacion_descripcion"],$row["descripcion_mrechazo"],
$row["tipodiscapacidad_nombre"],$row["partesafectadas_nombre"],$row["nivelavance_nombre"],$row["origendeficiencia_nombre"],
$row["tporcentaje_descripcion"],$row["formacion_descripcion"],$row["tnivel_descripcion"],$row["tniveledu_descripcion"],$row["edad_actual"]

);
		
}
mysql_free_result($result);

?>
</table>
</body>
</html>