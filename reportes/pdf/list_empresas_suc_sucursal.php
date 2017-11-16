<?php
//Exportar datos de php a Excel
header("Content-Type: application/vnd.ms-excel");
header('Content-type: application/vnd.ms-excel;charset=utf8_decode()');
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=list_empresas_todos.xls");
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
$sucursal=$_GET['p1'];
$estado=$_GET['p2'];
$ini=$_GET['p3'];
$fin=$_GET['p4'];

$sql = "
SELECT 
tempresa.*,
tactividad.tactividad_descripcion,parqueadero.experiencia_nombre as parqueadero,transporte.experiencia_nombre as transporte,
tipocformativo.tipocformativo_nombre,poseeweb.experiencia_nombre as poseeweb,testadousuario.estusudescripcion,sucursal.sucursal_nombre,
tdirempresa.cprincipal,tdirempresa.transversal,tdirempresa.fijo,tdirempresa.fijo2,tdirempresa.fax,
tcontactoemp.nombre_emp,tcontactoemp.cargo_emp,tcontactoemp.celular_emp,tcontactoemp.email_emp
FROM
	tempresa
left join
	tactividad on tempresa.actividad_id=tactividad.tactividad_id
left join
	experiencia as parqueadero on tempresa.parqueadero=parqueadero.experiencia_id
left join
	experiencia as transporte on tempresa.transporte=transporte.experiencia_id
left join
	tipocformativo on tempresa.id_tipo_empresa=tipocformativo.tipocformativo_id
left join
	experiencia as poseeweb on tempresa.poseesitio=poseeweb.experiencia_id
left join
	testadousuario on tempresa.estado=testadousuario.estusucodigo
left join
	sucursal on tempresa.id_sucursal=sucursal.sucursal_id
left join
	tdirempresa on tempresa.id_empresa=tdirempresa.id_empresa
left join
	tcontactoemp on tempresa.id_empresa=tcontactoemp.tempresa_id
where 
tempresa.id_sucursal='$sucursal'
";
$result=mysql_query($sql);
 
?>
 
<TABLE BORDER=1 align="center" CELLPADDING=1 CELLSPACING=1>
<TR>
						<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">FECHA</td>
						<td class="tdatos">TIPO ACTIVIDAD</td>
						<td class="tdatos">TIPO EMPRESA</td>
						<td class="tdatos">EMPRESA</td>
						<td class="tdatos">CALLE PRINCIPAL</td>
						<td class="tdatos">TRANSVERSAL</td>
						<td class="tdatos">T. FIJO1</td>
						<td class="tdatos">T. FIJO2</td>
						<td class="tdatos">FAX</td>
						<td class="tdatos">NOMBRE CONTACTO EMPRESA</td>
						<td class="tdatos">CARGO CONTACTO</td>
						<td class="tdatos">CELULAR CONTACTO</td>
						<td class="tdatos">EMAIL-CONTACTO</td>
						<td class="tdatos">SUCURSAL</td>
	
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
<td>&nbsp;%s&nbsp;</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s&nbsp;</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s&nbsp;</td>
<td>&nbsp;%s</td>
</tr>"

,$row["id_empresa"],$row["fecha_ingreso"],$row["tactividad_descripcion"],$row["tipocformativo_nombre"],$row["nombre"],
$row["sucursal_nombre"],  $row["cprincipal"],$row["transversal"],$row["fijo"],$row["fijo2"],$row["fax"],
$row["nombre_emp"],$row["cargo_emp"],$row["email_emp"],$row["sucursal_nombre"]

);
		
}
mysql_free_result($result);

?>
</table>
</body>
</html>