<?php
//Exportar datos de php a Excel
header("Content-Type: application/vnd.ms-excel");
header('Content-type: application/vnd.ms-excel;charset=utf8_decode()');
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=auditoria.xls");
?>
<HTML LANG="es">
<TITLE>::. Exportacion de Datos .::</TITLE>
</head>
<body>
<?php
include('funciones.php');
require('config.php');
conecta();
$sql = "SELECT
tauditoria.*,
usuario.usuario_nombres,usuario.usuario_apellidos,sucursal.sucursal_nombre
FROM
	tauditoria
left join
	usuario on tauditoria.usucuenta=usuario.usuario_cedula
left join
	sucursal on usuario.sucursal=sucursal.sucursal_id";
$result=mysql_query($sql);
 
?>
 
<TABLE BORDER=1 align="center" CELLPADDING=1 CELLSPACING=1>
<TR>
 	<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">ACCIÓN </td>
						<td class="tdatos">TABLA</td>
						<td class="tdatos">DESCRIPCIÓN</td>
						<td class="tdatos">FECHA</td>
						<td class="tdatos">NOMBRES</td>
						<td class="tdatos">APELLIDOS</td>
						<td class="tdatos">SUCURSAL</td>
</TR>
<?php
while($row = mysql_fetch_array($result)) {
printf("<tr>
<td>&nbsp;%s</td>
<td>&nbsp;%s&nbsp;</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
</tr>"
,$row["audcodigo"],$row["acccodigo"],$row["audtabla"],$row["auddescripcion"],
$row["audfecha"],$row["usuario_nombres"],$row["usuario_apellidos"],$row["sucursal_nombre"]);
		
}
mysql_free_result($result);

?>
</table>
</body>
</html>