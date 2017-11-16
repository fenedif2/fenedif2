<?php
require("../mod_configuracion/conexion.php");
include('../funciones.php');
require("../theme/header_inicio.php");
require('../idioma/castellano.php');
//si hay sesión cargamos código
$docente = $_SESSION['usuario_sesion'];
$num_agr = mysql_num_rows($sel_agr);
$docentes = $_SESSION['usuario_sesion'];
//recogemos la información cargando la variable
$agr_post=$_REQUEST['p1'];
$sel_agr = mysql_query("select * from expediente where expediente_id = '$agr_post'");
$reg_agr = mysql_fetch_array($sel_agr);
$id=$_POST['p4'];
$actividad=$_POST['p3'];
echo'<br>
<form action="reg_mactiv.php" method="post">
	
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">Seleccione el Expediente</td>
			<tr>
			<td>
				
					<select name="p1" id="p1" >
					';	
					//listamos grupos para componer el select
					$sel_agr = mysql_query("select * from expediente where respbrigada_id = '$docente'");
					$num_agr = mysql_num_rows($sel_agr);
					for($agr=0;$agr<$num_agr;$agr++)
					{
					$reg_agr = mysql_fetch_array($sel_agr);
					echo '<option value="'.$reg_agr['expediente_id'].'">'.$reg_agr['expediente_cedula'].'-->'.$reg_agr['expediente_nombre'].'</option>';
					}
				echo '	
				</select>
			
			</td>
			<td><input type="submit" value="Buscar"></td>
			</tr>
		</tr>
	</table>
</form>';

echo '<br/><div class="titulo"><h5>Analisis de Procesos</h5></div>';




if($agr_post)
{
//consultamos las actividades ya registradas
$sel_act = mysql_query("select distinct actividades.actividad_id,actividades.actividad_nombre,actividades.expediente_id,actividades.ponderacion,
procesos.proceso_nombre,tactividad.tactividad_nombre,procesos.inicio as finicio,procesos.fin as ffin
from 
actividades,expediente,procesos,tactividad,respbrigada where 
expediente.respbrigada_id = '$docentes' and expediente.expediente_id = actividades.expediente_id AND expediente.expediente_id='$agr_post' 
and actividades.tactividad_id=tactividad.tactividad_id and actividades.proceso_id=procesos.proceso_id and
respbrigada.respbrigada_id=expediente.respbrigada_id");
$num_act = mysql_num_rows($sel_act);
if($num_act == 0)
	{
	echo '<p class="negrita"><center><font color="Navy">'.$id_noagrup.'</font></center></p>';
	}
else
	{
	echo '<p class="negrita"><center><font color="Navy">'.$id_activ_reg.'</font></center></p>';
	echo '<table  align="center"  class="tabla">';
	echo '<tr class="encab">';
	echo '<td class="tdatos">Numero</td>
	<td class="tdatos">'.$id_activ.'</td>
	<td class="tdatos">Tipo de Actividad</td>
	<td class="tdatos">Simbolo de Flujo</td>
	<td class="tdatos">Fecha inicio</td>
	<td class="tdatos">Fecha fin</td>
	<td class="tdatos">Tiempo</td>';
	echo '<td class="centrado"><img src="../imgs/OPER.png" alt="'.$id_eliminar.'" /></a></td>';
	echo '<td class="centrado"><img src="../imgs/TRAS.png" alt="'.$id_eliminar.'" /></a></td>';
	echo '<td class="centrado"><img src="../imgs/DEMORA.png" alt="'.$id_eliminar.'" /></a></td>';
	echo '<td class="centrado"><img src="../imgs/VER.png" alt="'.$id_eliminar.'" /></a></td>';
	echo '<td class="centrado"><img src="../imgs/ARCH.png" alt="'.$id_eliminar.'" /></a></td>';
	echo '<td class="centrado"><img src="../imgs/CORREC.png" alt="'.$id_eliminar.'" /></a></td>';
	echo '</tr>';
	for($b=1;$b<=$num_act;$b++)
		{
		$reg_act = mysql_fetch_array($sel_act);
		echo '<td class="tdatos">'.$b.'</td>';
		echo '<td class=\"tdatos\">'.$reg_act['actividad_nombre'].'</td>';
		echo '<td class=\"tdatos\">'.$reg_act['tactividad_nombre'].'</td>';
			if( $reg_act['tactiv']==OPERACION)
				{
			echo '<td class="centrado"><img src="../imgs/circle.ico" alt="'.$id_eliminar.'" /></a></td>';
				}
				else 
				{
					if( $reg_act['tactividad_nombre']==TRASLADO)
						{
							echo '<td class="centrado"><img src="../imgs/TRASLADO.ico" alt="'.$id_eliminar.'" /></a></td>';

						}
						else
							{
								if( $reg_act['tactividad_nombre']==DEMORA)
									{
										echo '<td class="centrado"><img src="../imgs/DEMORA.png" alt="'.$id_eliminar.'" /></a></td>';
									}
									else 
									{
										if( $reg_act['tactividad_nombre']==VERIFICACION)
											{
												echo '<td class="centrado"><img src="../imgs/VER.png" alt="'.$id_eliminar.'" /></a></td>';
											}
											else
											{
													if( $reg_act['tactividad_nombre']==ARCHIVO)
													{
														echo '<td class="centrado"><img src="../imgs/ARCH.png" alt="'.$id_eliminar.'" /></a></td>';
													}
													else
													{
														if( $reg_act['tactividad_nombre']==CORRECION)
														{
															echo '<td class="centrado"><img src="../imgs/CORREC.png" alt="'.$id_eliminar.'" /></a></td>';
														}
													}
											}
									}
							}
					
				}
				
		echo '<td class=\"tdatos\">'.$reg_act['finicio'].'</td>';
		echo '<td class=\"tdatos\">'.$reg_act['ffin'].'</td>';
		$date1=$reg_act['finicio'];
		$date2=$reg_act['ffin'];
			$s = strtotime($date2)-strtotime($date1);
			$d = intval($s/86400);
			$s -= $d*86400;
			$h = intval($s/3600);
			$s -= $h*3600;
			$m = intval($s/60);
			$s -= $m*60;
 			$dif= (($d*24)+$h).hrs." ".$m."min";
			$dif1=$dif*60;
			$dif2= $d.$space;
			if($dif2>0)
			{
				echo '<td class=\"tdatos\">'.$dif2.' dias</td>';	
				$mat_pd[]=$dif2;
			}
			
			if( $reg_act['tactividad_nombre']==OPERACION)
				{
					echo '<td class="tdatos"> </a></td>';
					echo ' <td bgcolor="#D8D8D8"></td>';
					echo ' <td bgcolor="#D8D8D8"></td>';
					echo ' <td bgcolor="#D8D8D8"></td>';
					echo ' <td bgcolor="#D8D8D8"></td>';
					echo ' <td bgcolor="#D8D8D8"></td>';
				}
				else 
				{
					if( $reg_act['tactividad_nombre']==TRASLADO)
						{
							echo ' <td bgcolor="#D8D8D8"></td>';	
							echo '<td class="tdatos"> </a></td>';
							echo ' <td bgcolor="#D8D8D8"></td>';
							echo ' <td bgcolor="#D8D8D8"></td>';
							echo ' <td bgcolor="#D8D8D8"></td>';
							echo ' <td bgcolor="#D8D8D8"></td>';

						}
						else
							{
								if( $reg_act['tactividad_nombre']==DEMORA)
									{
										echo ' <td bgcolor="#D8D8D8"></td>';
										echo ' <td bgcolor="#D8D8D8"></td>';	
										echo '<td class="tdatos"> </a></td>';
										echo ' <td bgcolor="#D8D8D8"></td>';
										echo ' <td bgcolor="#D8D8D8"></td>';
										echo ' <td bgcolor="#D8D8D8"></td>';
									}
									else 
									{
										if( $reg_act['tactividad_nombre']==VERIFICACION)
											{
												echo ' <td bgcolor="#D8D8D8"></td>';
												echo ' <td bgcolor="#D8D8D8"></td>';
												echo ' <td bgcolor="#D8D8D8"></td>';	
												echo '<td class="tdatos"> </a></td>';
												echo ' <td bgcolor="#D8D8D8"></td>';
												echo ' <td bgcolor="#D8D8D8"></td>';
											}
											else
											{
													if( $reg_act['tactividad_nombre']==ARCHIVO)
													{
														echo ' <td bgcolor="#D8D8D8"></td>';
														echo ' <td bgcolor="#D8D8D8"></td>';
														echo ' <td bgcolor="#D8D8D8"></td>';
														echo ' <td bgcolor="#D8D8D8"></td>';	
														echo '<td class="tdatos"> </a></td>';
														echo ' <td bgcolor="#D8D8D8"></td>';
													}
													else
													{
														if( $reg_act['tactividad_nombre']==CORRECION)
														{
															echo ' <td bgcolor="#D8D8D8"></td>';
															echo ' <td bgcolor="#D8D8D8"></td>';
															echo ' <td bgcolor="#D8D8D8"></td>';
															echo ' <td bgcolor="#D8D8D8"></td>';
															echo ' <td bgcolor="#D8D8D8"></td>';
															echo '<td class="tdatos"> </a></td>';
														}
													}
											}
									}
							}
					
				}
		
		//no parece recomendable andar cambiando el nombre a las actividades
		//echo '<a href="#" title="'.$id_edita_act.'" id="actividad_'.$b.'" onclick="editaActividad(\'actividad_'.$b.'\',\'actividad\',\''.$actividad_r.'\',\''.$agrupamiento_r.'\')">'.$actividad_r.'</a>';
		
		echo '</td>';
		echo '<td class="justificado">';
		
		echo '</td>';
		echo '</tr>';
		}//fin de for
	$suma_pd=max($mat_pd);	
	echo '<p class="negrita"><center><font color="Navy">El procesos con mayor tiempo es de :'.$suma_pd.' Dias</font></center></p>';
	//echo $suma_pd;
	echo '</table><br />';
	

	}//fin de else (sí que hay actividades registradas)
	
	}
?>

