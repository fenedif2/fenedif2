<?php
//Exportar datos de php a Excel
header("Content-Type: application/vnd.ms-excel");
header('Content-type: application/vnd.ms-excel;charset=utf8_decode()');
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=list_tcapacitacion_todos.xls");
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
$tipocurso=$_GET['p2'];
$ini=$_GET['p3'];
$fin=$_GET['p4'];

$sql = "
SELECT
                   tcursocf.*,tipocurso.tipo_descripcion,
                   centro_formativo.nombre AS nombre_centroformativo,sucursal.sucursal_nombre,tformacion.capacitacion_nombre
FROM
                          tcursocf
LEFT JOIN
			tipocurso  ON tcursocf.tipo_curso=tipocurso.tipo_curso_id
LEFT JOIN
	centro_formativo ON tcursocf.id_centro_formativo=centro_formativo.id_centro_formativo
LEFT JOIN
	sucursal ON centro_formativo.sucursal=sucursal.sucursal_id
LEFT JOIN
			tformacion ON tcursocf.edu_formal=tformacion.capacitacion_id	
where tipocurso.tipo_curso_id='$tipocurso' and centro_formativo.sucursal='$sucursal'
and fecha_inicio BETWEEN '$ini' AND '$fin'
";
$result=mysql_query($sql);
 
?>
 
<TABLE BORDER=1 align="center" CELLPADDING=1 CELLSPACING=1>
<TR>
						<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">FECHA INICIO</td>
						<td class="tdatos">FECHA FIN</td>
						<td class="tdatos">NÚMERO ALUMNOS</td>
						<td class="tdatos">NÚMERO HORAS</td>
						<td class="tdatos">INSTRUCTOR</td>
						<td class="tdatos">NOMBRE CURSO</td>
						<td class="tdatos">FORMACIÓN</td>
						<td class="tdatos">CLASE</td>
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
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
</tr>"

,$row["id_tcursocf"],$row["fecha_inicio"],$row["fecha_fin"],$row["num_alumnos"],
$row["num_horas"],$row["instructor"],$row["nombre"],$row["tipo_descripcion"],$row["capacitacion_nombre"],
$row["sucursal_nombre"]

);
		
}
mysql_free_result($result);

?>
</table>
</body>
</html>