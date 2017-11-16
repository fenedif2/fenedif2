<?php
//Exportar datos de php a Excel
header("Content-Type: application/vnd.ms-excel");
header('Content-type: application/vnd.ms-excel;charset=utf8_decode()');
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=docentes.xls");
?>
<HTML LANG="es">
<TITLE>::. Exportacion de Datos .::</TITLE>
</head>
<body>
<?php
include('../funciones.php');
require('../config.php');
require('../idioma/'.$idioma.'');
conecta();
$id_uoi = $_GET['p1'];
$sql = "SELECT * FROM docentes WHERE formacion='$id_uoi' ORDER BY docente ASC";
$result=mysql_query($sql);

?>
 
<TABLE BORDER=1 align="center" CELLPADDING=1 CELLSPACING=1>
<TR>
 	<td>Código</td>
	<td>Nombres</td>
	<td>Apellidos</td>
	<td>Extención</td>
	<td>Unidad Operativa de Investigación</td>
	<td>Sueldo</td>
	<td>Carrera</td>
	<td>Tipo de Investigador/a</td>
	<td>Valor Hora</td>
	<td>Esporádico Permanente</td>
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
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
</tr>"
,$row["docente"],$row["nombres"],$row["apellidos"],$row["email"],
$row["formacion"],$row["telef1"],$row["facultad"],$row["tinvestigador"],
$row["sueldo"],$row["permanente"]);
		
}
mysql_free_result($result);

?>
</table>
</body>
</html>