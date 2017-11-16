<?php
require("../mod_configuracion/conexion.php");
include('../funciones.php');
require("../theme/header_inicio.php");
require('../idioma/castellano.php');
echo  "</ div>" ;
echo' <br><br>';
//si hay sesión cargamos código
$coordinador = $_SESSION['usuario_sesion'];
//conecto con MySQL
//recogemos variables
$sesion = $_REQUEST['p1'];
echo '<p class="negrita"><center><font color="Navy">Notas y Avances registrados hasta el momento</font></center></p>';
$sel_act = mysql_query("SELECT avances.avance_id,avances.tecnico_id,avances.expediente_id,avances.fecha,actividades.actividad_nombre,
avances.nota,avances.descripcion,avances.comentario,procesos.proceso_nombre,actividades.estado,
tecnico.tecnico_nombres,tecnico.tecnico_apellidos
FROM avances,actividades,procesos,tecnico
WHERE avances.expediente_id='$sesion' and actividades.actividad_id=avances.actividad_id and tecnico.tecnico_id=actividades.tecnico_id 
and actividades.proceso_id=procesos.proceso_id and actividades.estado='2'");
$num_act = mysql_num_rows($sel_act);
	
	echo'<table align="center"  class="tabla">';
	echo '<tr class="encab">
	<td class="tdatos">Actividad</td>
	<td class="tdatos">Nota</td>
	<td class="tdatos">comentario</td>
	<td class="tdatos">Responsable</td>
	<td class="tdatos">Proceso</td>
	<td class="tdatos">Nombre del archivo</td>
	<td class="tdatos">Archivos</td>
	<td class="tdatos">Estado</td>';
	echo '</tr>';
	for($b=0;$b<$num_act;$b++)
		{
		$reg_act = mysql_fetch_array($sel_act);	
		echo '<td class=\"cdato\">'.$reg_act['actividad_nombre'].'</td>';
		echo '<td>'.$reg_act['nota'].'</td>';
		echo '<td>'.$reg_act['comentario'].'</td>';
		echo '<td>'.$reg_act['tecnico_nombres'].' '.$reg_act['tecnico_apellidos'].'</td>';
		echo '<td>'.$reg_act['proceso_nombre'].'</td>';
		echo '<td>'.$reg_act['descripcion'].'</td>';
		echo '<td class=\"tdatos\" align=center><a href=getfiles.php?avance_id='.$reg_act['avance_id'].'><img src=../theme/images/pdf.ico></a></td>';
		echo '<td><img src="../imgs/terminar.jpg"><font color="#0B3B17" >Actividad Terminada</font></td>';	
		echo '</tr>';									
										
		}
				
	echo'</table>';	
	echo '<br>';								
?>
