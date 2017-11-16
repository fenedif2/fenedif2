<?php
//Exportar datos de php a Excel
header('Content-type: application/vnd.ms-excel;charset=utf8_decode()');
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=costos.xls");
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
$sql = "SELECT * from cindirectos ORDER BY codigo ASC ";
$result=mysql_query($sql);
$cod=utf8_decode("Código") 
?>
 
<TABLE BORDER=1 align="center" CELLPADDING=1 CELLSPACING=1>
<TR>
 	<td>Código</td>
	<td>Concepto</td>
	<td>Valor Presupuestado</td>
	<td>Valor Real</td>
	
</TR>
<?php
while($row = mysql_fetch_array($result)) 
{
printf("<tr>
<td>&nbsp;%s</td>
<td>&nbsp;%s&nbsp;</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
</tr>"
,utf8_decode($row["codigo"]),utf8_decode($row["concepto"]),utf8_decode($row["vpresupuestado"]),utf8_decode($row["vreal"])
);
		
}
mysql_free_result($result);

?>
</table>
</body>
</html>