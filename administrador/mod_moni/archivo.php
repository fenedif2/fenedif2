<?php
require("../mod_configuracion/conexion.php");
include('../funciones.php');
require("../theme/header_inicio.php");
require('../idioma/castellano.php');
echo  "</ div>" ;
echo' <br><br>';
//si hay sesión cargamos código
$docente = $_SESSION['usuario_sesion'];
//conecto con MySQL
//recogemos variables
$sesion = $_REQUEST['p1'];
echo '<p class="negrita"><center><font color="Navy">Notas y Avances registrados hasta el momento</font></center></p>';
$sel_act = mysql_query("SELECT notas.id,notas.codigo,notas.agrupamiento,notas.fecha,actividades.actividad,
notas.nota,notas.descripcion,notas.comentario,objetivos.objetivo,actividades.estado,
alumnado.nombre,alumnado.apellidos
FROM notas,actividades,objetivos,alumnado
WHERE notas.agrupamiento='$sesion' and actividades.id=notas.actividad and alumnado.codigo=actividades.periodo 
and actividades.objetivos=objetivos.id and actividades.estado='2'");
$num_act = mysql_num_rows($sel_act);
	
	echo'<table align="center"  class="tabla">';
	echo '<tr class="encab">
	<td class="tdatos">Actividad</td>
	<td class="tdatos">Nota</td>
	<td class="tdatos">comentario</td>
	<td class="tdatos">Responsable</td>
	<td class="tdatos">Proceso</td>
	<td class="tdatos">nombre del archivo</td>
	<td class="tdatos">Manual de proceso</td>
	<td class="tdatos">Estado</td>';
	echo '</tr>';
	for($b=0;$b<$num_act;$b++)
		{
		$reg_act = mysql_fetch_array($sel_act);	
		echo '<td class=\"cdato\">'.$reg_act['actividad'].'</td>';
		echo '<td>'.$reg_act['nota'].'</td>';
		echo '<td>'.$reg_act['comentario'].'</td>';
		echo '<td>'.$reg_act['nombre'].' '.$reg_act['apellidos'].'</td>';
		echo '<td>'.$reg_act['objetivo'].'</td>';
		echo '<td>'.$reg_act['descripcion'].'</td>';
		echo '<td class=\"tdatos\" align=center><a href=getfiles.php?id='.$reg_act['id'].'><img src=../theme/images/pdf.ico></a></td>';
		echo '<td><img src="../imgs/terminar.jpg"><font color="#0B3B17" >Actividad Terminada</font></td>';	
		echo '</tr>';									
										
		}
				
	echo'</table>';	
	echo '<br>';								
?>
