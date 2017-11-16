<?php
//Exportar datos de php a Excel
header('Content-type: application/vnd.ms-excel;charset=utf8_decode()');
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=proyectos.xls");
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
$ext = $_GET['p1'];
$sql = "SELECT agrupamientos.agrupamiento,agrupamientos.extencion,
	agrupamientos.nombre,docentes.nombres,docentes.apellidos,agrupamientos.uoi,
	agrupamientos.inicio,agrupamientos.fin,agrupamientos.fin,
	agrupamientos.conv_nombre,agrupamientos.investigacion,agrupamientos.unesco,
	agrupamientos.presupuesto,agrupamientos.solicitado,agrupamientos.linvestigacion 
	FROM agrupamientos,docentes WHERE docentes.docente=agrupamientos.docente AND agrupamientos.extencion='$ext' ORDER BY agrupamiento ASC";
$result=mysql_query($sql);
 
?>
 
<TABLE BORDER=1 align="center" CELLPADDING=1 CELLSPACING=1>
<TR>
 	<td>Código</td>
	<td>Extención</td>
	<td>Nombre Proyecto</td>
	<td>Coordinador</td>
	<td>Unidad Operativa de Investigación</td>
	<td>Inicio (aa-mm-dd)</td>
	<td>Fin (aa-mm-dd)</td>
	<td>Convocatorias</td>
	<td>Tipo de investigacion</td>
	<td>Unesco</td>
	<td>Presupuesto</td>
	<td>Solicitado</td>
	<td>Línea de Investigación</td>
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

</tr>"
,utf8_decode($row["agrupamiento"]),utf8_decode($row["extencion"]),utf8_decode($row["nombre"]),"$nomb $apell",utf8_decode($row["uoi"]),
$row["inicio"],$row["fin"],utf8_decode($row["conv_nombre"]),utf8_decode($row["investigacion"]),
utf8_decode($row["unesco"]),$row["presupuesto"],$row["solicitado"],utf8_decode($row["linvestigacion"]));
		
}
mysql_free_result($result);

?>
</table>
</body>
</html>