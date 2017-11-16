<?php
//Exportar datos de php a Excel
header('Content-type: application/vnd.ms-excel;charset=utf8_decode()');
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=expediente.xls");
?>
<HTML LANG="es">
<TITLE>::. Exportacion de Datos .::</TITLE>
</head>
<body>
<?php
require("../mod_configuracion/conexion.php");

$id_uoi = $_GET['cedula'];

$sql = "select  expediente.expediente_id,expediente.expediente_nombre,expediente.expediente_codigo,expediente.expediente_cedula,
expediente.expediente_nombre as funcionario,respbrigada.nombres,respbrigada.apellidos,
expediente.expediente_sector,expediente.expediente_superficie,expediente.respbrigada_id,respbrigada.brigada_id
		,memo.memo_nombre,expediente.inicio,expediente.fin,brigada.brigada_nombre,expediente.avance,tprovincia.opcion as provincia,tcanton.opcion as canton,tparroquia.opcion as parroquia
		from expediente,respbrigada,memo,brigada,tprovincia,tcanton,tparroquia
		where expediente.respbrigada_id=respbrigada.respbrigada_id and 
		expediente.memo_id=memo.memo_id and respbrigada.brigada_id=brigada.brigada_id and
		expediente.provincia=tprovincia.id and expediente.canton=tcanton.id and expediente.parroquia=tparroquia.id ";
$result=mysql_query($sql);
 
?>
 
<TABLE BORDER=1 align="center" CELLPADDING=1 CELLSPACING=1>
<TR>
 	<td>CODIGO</td>
	<td>EXPEDIENTE</td>
	<td>CEDULA</td>
	<td>BENEFICIARIO</td>
	<td>NOMBRE Y APELLIDOS RESPONSABLE</td>
	<td>PROVINCIA</td>
	<td>CANTON</td>
	<td>PARROQUIA</td>
	<td>SECTOR</td>
	<td>SUPERFICIE</td>
	<td>MEMORANDUM</td>
	<td>FECHA INICIO</td>
	<td>FECHA FIN</td>
	<td>BRIGADA</td>
	<td>AVANCE</td>
</TR>
<?php
while($row = mysql_fetch_array($result)) 
{
$nomb=utf8_decode($row["nombres"]);
$apell=utf8_decode($row["apellidos"]);
printf("<tr>
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
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>

</tr>"
,utf8_decode($row["expediente_id"]),utf8_decode($row["expediente_codigo"]),utf8_decode($row["expediente_cedula"]),
utf8_decode($row["funcionario"]),"$nomb $apell",$row["provincia"],utf8_decode($row["canton"]),utf8_decode($row["parroquia"]),
utf8_decode($row["expediente_sector"]),$row["expediente_superficie"],$row["memo_nombre"],utf8_decode($row["inicio"]),
utf8_decode($row["fin"]),utf8_decode($row["brigada_nombre"]),utf8_decode($row["avance"]));
		
}
mysql_free_result($result);

?>
</table>
</body>
</html>