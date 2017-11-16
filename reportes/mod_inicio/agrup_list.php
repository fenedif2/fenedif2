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
$fecha_ing = date('Y-m-d');

//extraigo nombre del día
$dia_ing=extrae_dia_mysql($fecha_ing);
$mes_ing=extrae_mes_ingles($fecha_ing);
$anyo_ing=substr($fecha_ing,0,4);
$nombre_dia_ing=date('D',mktime(0,0,0,$mes_ing,$dia_ing,$anyo_ing));
$numero_dia = nombre_dia_a_numero($nombre_dia_ing);
$nombre_dia=encuentra_dia($numero_dia-1);

$fecha_esp = cambia_fecha_a_esp($fecha_ing);

echo'
<form action="agrup_list.php" method="post">
	
	<table align="center" class="tabla">
	<td><input type="text" name="p4" maxlength="30" id="p4" style="visibility:hidden" readonly="readonly" style="background-color:#F7D358" value="not"/>	
		<tr>
			<td colspan="2" align="center">Seleccione el Proyecto</td>
			<tr>
			<td>
				
					<select name="p1" id="p1" >
					';	
					//listamos grupos para componer el select
					$sel_agr = mysql_query("select * from agrupamientos where docente = '$docente'");
					$num_agr = mysql_num_rows($sel_agr);
					for($agr=0;$agr<$num_agr;$agr++)
					{
					$reg_agr = mysql_fetch_array($sel_agr);
					echo '<option value="'.$reg_agr['agrupamiento'].'">'.$reg_agr['nombre'].'</option>';
					}
				echo '	
				</select>
			
			</td>
			<td><input type="submit" value="Buscar"></td>
			</tr>
		</tr>
	</table>
</form>';

//si venimos de realizar algún registro
if (strtolower($_REQUEST["acc"])=="guardar")
{
	$id=$_POST["id"];
	$id_eva=$_POST["id_eva"];
	$nota= $_POST['nota'];
	$codigo= $_POST['codigo'];
	$com= $_POST['com'];
	$estado= $_POST['estado'];
	$consulta_actualiza = mysql_query("update notas set fecha='$fecha_ing',nota='$nota',comentario='$com' where id = '$id'");
	if($consulta_actualiza)
							{
									cuadro_mensaje("NOTA Registrado Correctamente...");
									$consulta_actualiza = mysql_query("update actividades set estado='$estado' where id='$id_eva'");
					 				echo "<br><br><br><br><br>";
									require("../theme/footer_inicio.php");
									exit;
							}
								else
								{
									cuadro_error(mysql_error());
									echo $id;
								}
	

}
/////////////////////////// fin gradar ////////////////////////////////////////////////////////////////////////////////////
if (strtolower($_REQUEST["acc"])=="evaluar")
{
	$codigo= $_REQUEST['resp'];
	$id=$_REQUEST['activ_eli'];
	$id_eva=$_REQUEST['activ'];
echo '<form name="registro" action="agrup_list.php" method="post" enctype="multipart/form-data"">
			<td><input type="text" name="id" maxlength="30" id="id" style="visibility:hidden" readonly="readonly" style="background-color:#F7D358" value="'.$id.'"/>	
			<td><input type="text" name="id_eva" maxlength="30" id="id_eva" style="visibility:hidden" readonly="readonly" style="background-color:#F7D358" value="'.$id_eva.'"/>	
			<td><input type="text" name="agrupamiento" maxlength="30" id="agrupamiento" style="visibility:hidden" readonly="readonly" style="background-color:#F7D358" value="'.$agrupamiento.'"/>			
			<td><input type="text" name="codigo" maxlength="30" id="codigo" style="visibility:hidden" readonly="readonly" style="background-color:#F7D358" value="'.$codigo.'"/>	
			<td><input type="text" name="coment" maxlength="30" id="coment" style="visibility:hidden" readonly="readonly" style="background-color:#F7D358" value="'.$coment.'"/>	
	<table width="700" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>EVALUAR ACTIVIDAD</h3></td>
		</tr>
		<tr>
			<td class="tdatos">Nota</td>
			<td><select name="nota" id="nota">';
						for($i=0;$i<11;$i++)
						{
						echo '<option>'.$i.'</option>';
						}
				echo '</select>
			
		</tr>
		<tr>
			<td  class="tdatos">COMENTARIO EVALUACION</td>
			<td class="dtabla"><textarea id="com" name="com" columns="20" rows="3"></textarea></td>
	
		</tr>
		<tr>
			<td class="tdatos">Estado de Actividad</td>
			<td>
				
					<select name="estado" id="estado" >
					';	
					echo '<option>Selecciona Estado de Actividad</option>';
					echo '<option value=0>Evaluar Actividad</option>';
					echo '<option value=2>Actividad Terminada</option>';
				echo '	
				</select>
			
			</td>
		</tr>			
		<tr>
			<td colspan="2" align="center"><input type="submit" name="acc" value="guardar">
			<input name="Restablecer" type="reset" value="Limpiar" /></td>
		</tr>
	</table>
</form>	';
}

echo '<br>';
echo '<br/><p class="centrado">Proyecto '.$sesion.'. '.$id_fecha.': '.$nombre_dia.', '.$fecha_esp.'</p>';

echo '<p class="centrado">';
$sel_agr = mysql_query("select * from agrupamientos where agrupamiento = '$sesion'");
		$num_agr = mysql_num_rows($sel_agr);
	for($agr=0;$agr<$num_agr;$agr++)
			{
			$reg_agr = mysql_fetch_array($sel_agr);
			echo '<br /><span class="negrita">'.$reg_agr['nombre'].'</span><br />';
			$date1=date("Y-m-d");
			$date2=$reg_agr['fin'];
			$s = strtotime($date2)-strtotime($date1);
			$d = intval($s/86400);
			$s -= $d*86400;
			$h = intval($s/3600);
			$s -= $h*3600;
			$m = intval($s/60);
			$s -= $m*60;
 			$dif= (($d*24)+$h).hrs." ".$m."min";
			$dif2= $d.$space.dias." ".$h.hrs." ".$m."min";
			if($dif2>0)
			{
				echo '<br>';	
				echo "<font color='#ff0000'>LE FALTA  $dif2 PARA TERMINAR EL PROYECTO</font>"; 
				echo '<br>';
			}
else 
{
	echo "<font color='#ff0000'><blink>SU TIEMPO A TERMINADO ACÉRQUESE  DE URGENCIA AL DEPARTAMENTO DEL MUNICIPIO</blink></font>"; 
	
}
	

//echo $dias;
////////////////////////////////////////// avnce del proyecto //////////////////////////
	//comprobamos si el docente no tiene actividades específicas por período////
	$sel_activ= mysql_query("select actividades.id,actividades.actividad,actividades.agrupamiento,actividades.ponderacion,
actividades.objetivos,actividades.tactividad,actividades.finicio,actividades.ffin from actividades,objetivos 
where actividades.agrupamiento = '$sesion' and actividades.objetivos=objetivos.id and objetivos.estado=1");

	$num_act = mysql_num_rows($sel_activ);
	if($num_act>= 0)
	{
		
		for($al=0;$al<$num_act;$al++)
		{
				
			$reg_activ = mysql_fetch_array($sel_activ);
			$actividad = $reg_activ['id'];
			$ponderacion = $reg_activ['ponderacion'];
			$sel_notas = mysql_query("select avg(notas.nota) from notas where notas.agrupamiento='$sesion' and notas.actividad='$actividad'");
			
			$num_notas = mysql_num_rows($sel_notas);
			$reg_notas = mysql_fetch_array($sel_notas);
			$nota_media = $reg_notas['avg(notas.nota)'];
			$prom[]=($nota_media*$ponderacion);	
			//echo $prom;	
		}//fin for actividades
			if($num_act>0)
			{
				$suma_nota_media = array_sum($prom);
				$porcentaje=$suma_nota_media/10;
				
			}
			else 
			{
				$promedio=0;
			}
	
			if($porcentaje>95)
			{
				$objet = $reg_activ['objetivos'];	
				$consulta_actualiza = mysql_query("update objetivos set avance='$porcentaje' where id = '$objet'");
				$consulta_actualiza = mysql_query("update objetivos set estado=2 where id = '$objet'");
				$sel_sec = mysql_query("select * from objetivos where agrupamiento='$sesion' and id='$objet'");
				$reg_sec = mysql_fetch_array($sel_sec);
				$sec = $reg_sec['secuencia'];//1
				$consulta_sig = mysql_query("SELECT ( SELECT id FROM objetivos WHERE secuencia >$sec ORDER BY id ASC LIMIT 1 ) AS siguiente");
				if($consulta_sig !=null)
				{
				$reg_sig = mysql_fetch_array($consulta_sig);
				$sig = $reg_sig['siguiente'];
				$est=1;
				$consulta_actualiza = mysql_query("update objetivos set estado='$est' where id = '$sig'");
				echo $sig;
				}
				
				echo '<br>';
				echo '<td><font color="#00005C" >'.$porcentaje.' % Teminado... </font></td>';
				
				echo '<td><img src="../imgs/terminar.jpg"><td>';	
				
			}
			else
				{
				$objet = $reg_activ['objetivos'];	
				$consulta_actualiza = mysql_query("update objetivos set avance='$porcentaje' where id = '$objet'");	
				echo '<br>';
				echo '<td><font color="#A3000A" >'.$porcentaje.' % En Proceso ...</font></td>';
				echo '<td><img src="../imgs/proceso.jpg"><td>';
				
				}
			echo '</table>';
	

		}

			
			
			
/////////////////////////////fin de  vance/////////////////////////////////////////////
			
			}

echo '</p><br />';
echo '<p class="centrado">';
//echo '<a href="#" onclick="miraAgrup(\''.$sesion.'\')">'.$id_inf_not.'</a>&nbsp;';
//echo '<a href="#" onclick="abreAgrup1(\''.$sesion.'\')">'.$id_inf_obs.'</a>&nbsp;';
echo '</p><br />';

$accion = $_REQUEST['p4'];
$id=$_POST['p44'];
//$sesion=$_POST['p']
//$accion = $_POST['p5'];

switch($accion)
{
//las calificaciones
case 'not':
echo'<form name="registro" action="agrup_list.php" method="post" enctype="multipart/form-data">';
//con un bucle listamos
$sel_act = mysql_query("select DISTINCT actividades.id,actividades.actividad,actividades.agrupamiento,actividades.ponderacion,actividades.periodo,
			extencion.ext_nombre as tactiv,objetivos.objetivo as objetivos,actividades.finicio,actividades.estado,actividades.ffin,alumnado.nombre,alumnado.apellidos
			from actividades,agrupamientos,extencion,objetivos,alumnado,matricula
			 where 
			agrupamientos.docente = '$docente' and agrupamientos.agrupamiento = actividades.agrupamiento AND agrupamientos.agrupamiento='$sesion'  
			and actividades.tactividad=extencion.id_extencion and actividades.objetivos=objetivos.id and actividades.periodo=alumnado.codigo and 
			actividades.periodo=matricula.codigo and alumnado.codigo=matricula.codigo and objetivos.estado=1
			order by actividades.agrupamiento,actividades.actividad"); 
$num_act = mysql_num_rows($sel_act);
	echo '<p class="negrita"><center><font color="Navy">Evaluar Actividades</font></center></p>
	<table align="center"  class="tabla">';
		echo'<td class="tdatos">'.$id_activ.'</td>
		<td class="tdatos">Tipo de Actividad</td>
		<td class="tdatos">Procesos</td>
		<td class="tdatos">Responsable</td>
		<td class="tdatos">Fecha inicio</td>
		<td class="tdatos">Fecha fin</td>
		<td class="tdatos">Estado</td>';
	echo '</tr>';
	for($b=0;$b<$num_act;$b++)
		{
		$reg_act = mysql_fetch_array($sel_act);
		//echo '<td class="centrado"><a href=agrup_list.php?acc=evaluar&activ_eli='.$reg_act['id'].'&agrup_eli='.$reg_act['agrupamiento'].'&resp='.$reg_act['periodo'].' ><img src="../imgs/evaluar.ico" alt="'.$id_eliminar.'" /></a></td>';
		//ecco'<td class=\"tdatos\"><a href=\"elim_proy.php?agrupamiento=".$row["agrupamiento"]."\"><img src=../theme/images/user-delete-2.ico></a></td>';
		echo'</a></td>';
		echo '<td>'.$reg_act['actividad'].'</td>';
		echo '<td>'.$reg_act['tactiv'].'</td>';
		echo '<td>'.$reg_act['objetivos'].'</td>';
		echo '<td>'.$reg_act['nombre'].'  '.$reg_act['apellidos'].'</td>';
		echo '<td>'.$reg_act['finicio'].'</td>';
		echo '<td>'.$reg_act['ffin'].'</td>';
		if($reg_act['estado']==0)
					{
						echo '<td><img src="../imgs/redactar.png"><font color="#8A0808" >Evaluar Actividad</td>';	
					}
		if($reg_act['estado']==1)
			{
				echo '<td><img src="../imgs/revisar.ico"><font color="#0B3B17" >Revisar Actividad </font></td>';	
			}				
			
		if($reg_act['estado']==2)
			{
				echo '<td><img src="../imgs/terminar.jpg"><font color="#0B3B17" >Actividad Terminada</font></td>';	
			}							
									
		$mat_pd[]=$reg_act['ponderacion'];
		
		//no parece recomendable andar cambiando el nombre a las actividades
		//echo '<a href="#" title="'.$id_edita_act.'" id="actividad_'.$b.'" onclick="editaActividad(\'actividad_'.$b.'\',\'actividad\',\''.$actividad_r.'\',\''.$agrupamiento_r.'\')">'.$actividad_r.'</a>';
		
		echo '</td>';
		echo '<td class="justificado">';
		
		echo '</td>';
		echo '</tr>';
		}//fin de for
	echo'</table><br />';
echo '</form>';
break;
case 'elimina':
$borra_not = mysql_query("delete from notas where id = '$id'");
break;
}//fin switch
/////////////////////// listamos notas ////////////////////////////////////////////////////////////////
//consultamos los procesos registrados






$sel_act = mysql_query("SELECT notas.id,notas.codigo,notas.agrupamiento,notas.fecha,actividades.actividad,actividades.id as activ,
notas.nota,notas.descripcion,notas.comentario,objetivos.objetivo,actividades.estado,
alumnado.nombre,alumnado.apellidos
FROM notas,actividades,objetivos,alumnado
WHERE notas.agrupamiento='$sesion' and actividades.id=notas.actividad and alumnado.codigo=actividades.periodo 
and actividades.objetivos=objetivos.id and actividades.estado='1'");
$num_act = mysql_num_rows($sel_act);
	
	echo '<p class="negrita"><center><font color="Navy">Notas y Avances registrados hasta el momento</font></center></p>
	<table align="center"  class="tabla">';
	echo '<tr class="encab">';
	echo '<td class="tdatos">Evaluar</td>
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
		if($reg_act['nota']==0)
		{
		echo '<td class="centrado"><a href=agrup_list.php?acc=evaluar&activ_eli='.$reg_act['id'].'&activ='.$reg_act['activ'].'&agrup_eli='.$reg_act['agrupamiento'].'&resp='.$reg_act['codigo'].' ><img src="../imgs/evaluar.ico" alt="'.$id_eliminar.'" /></a></td>';	
		}
		else
		{
			echo '<td class="centrado"><img src="../imgs/clave.png" alt="'.$id_eliminar.'" /></a></td>';	
		}
		//echo '<td class="centrado"><a href=agrup_list.php?acc=evaluar&activ_eli='.$reg_act['id'].'&activ='.$reg_act['activ'].'&agrup_eli='.$reg_act['agrupamiento'].'&resp='.$reg_act['codigo'].' ><img src="../imgs/evaluar.ico" alt="'.$id_eliminar.'" /></a></td>';
		echo '<td class=\"cdato\">'.$reg_act['actividad'].'</td>';
		echo '<td>'.$reg_act['nota'].'</td>';
		echo '<td>'.$reg_act['comentario'].'</td>';
		echo '<td>'.$reg_act['nombre'].' '.$reg_act['apellidos'].'</td>';
		echo '<td>'.$reg_act['objetivo'].'</td>';
		echo '<td>'.$reg_act['descripcion'].'</td>';
		echo '<td class=\"tdatos\" align=center><a href=getfiles.php?id='.$reg_act['id'].'><img src=../theme/images/pdf.ico></a></td>';
		echo '<td><img src="../imgs/revisar.ico"><font color="#0B3B17" >Revisar Actividad </font></td>';
		echo '</tr>';									
										
		}
	echo'</table>';	
	
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
