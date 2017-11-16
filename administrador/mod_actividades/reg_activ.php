<?php
require("../mod_configuracion/conexion.php");
include('../funciones.php');
require("../theme/header_inicio.php");
require('../idioma/castellano.php');
//si hay sesión cargamos código
$num_agr = mysql_num_rows($sel_agr);
//$respbrigada = $_SESSION['usuario_sesion'];
//recogemos la información cargando la variable
$agr_post=$_REQUEST['p1'];
$sel_agr = mysql_query("select * from expediente where expediente_id = '$agr_post'");
$reg_agr = mysql_fetch_array($sel_agr);
$respbrigada=$reg_agr['respbrigada_id'];
$respbrigada_id=$reg_agr['respbrigada_id'];
$proceso_id=$_POST['p4'];
$actividad=$_POST['p3'];
echo'<br>
<form action="reg_activ.php" method="post">
	
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">Seleccione el Expediente</td>
			<tr>
			<td>
				
					<select name="p1" id="p1" >
					';	
					//listamos grupos para componer el select
					$sel_agr = mysql_query("select * from expediente");
					$num_agr = mysql_num_rows($sel_agr);
					echo '<option>Seleccione Expedinete</option>';
					for($agr=0;$agr<$num_agr;$agr++)
					{
					$reg_agr = mysql_fetch_array($sel_agr);
					echo '<option value="'.$reg_agr['expediente_id'].'">'.$reg_agr['expediente_nombre'].'-->'.$reg_agr['expediente_codigo'].'</option>';
					}
				echo '	
				</select>
			
			</td>
			<td><input type="submit" value="Buscar"></td>
			</tr>
		</tr>
	</table>
</form>';


echo '<br/><div class="titulo"><h5>Registro de Actividades</h5></div>';
switch($_REQUEST['accion'])
{
case 'registro':
//recogemos variables de formulario
$respbrigada=$_REQUEST['txt_doc'];
//nombre de actividad y ponderación
$activ = $_POST['activ'];
$pond = $_REQUEST['ponderacion'];
$expediente_id=$_REQUEST['txt_agr'];
$tec=$_REQUEST['per'];
$objet=$_POST['objet'];
$tactiv=$_REQUEST['tactiv'];
$finicio=$_REQUEST['ini'];
$ffin=$_REQUEST['fin'];
$fini=$_REQUEST['finicio'];
$ff=$_REQUEST['ffin'];
$sel_act1 = mysql_query("select actividades.actividad_nombre,actividades.expediente_id,actividades.ponderacion,expediente.expediente_id,procesos.estado 
from actividades,expediente,procesos where 
expediente.respbrigada_id = '$respbrigada' and expediente.expediente_id = actividades.expediente_id AND expediente.expediente_id='$expediente_id'  
and procesos.proceso_id=actividades.proceso_id and procesos.estado=1 and actividades.proceso_id='$objet'");
$num_act1 = mysql_num_rows($sel_act1);

if($num_act1 == 0)
	{
	//echo '<p class="negrita">'.$id_noactiv.'</p>';
	}
	else
		{
	
		for($b=0;$b<$num_act1;$b++)
			{
			$reg_act1 = mysql_fetch_array($sel_act1);
			
			$matriz_vt[]=$reg_act1['ponderacion'];
			
			}
			
			if($matriz_vt<>0)
					{
						$suma_vt=array_sum($matriz_vt)+$pond;
					}
			//fin de for
		}


//echo '<td><input type="text" name="txt_vt" maxlength="10" readonly="readonly" style="background-color:#F7D358" id="txt_valorhora" value="'.round($suma_vt,2).'"/></td>';
if($suma_vt<=100)
{
	
	
		$reg_activ ="insert into actividades (actividad_nombre,expediente_id,ponderacion,tecnico_id,proceso_id,tactividad_id)
		values('$activ','$expediente_id','$pond','$tec','$objet','$tactiv')";
	//$sql="insert into investigacion (clave,nombre) values(UPPER('".$_REQUEST["clave"]."'),UPPER('".$_REQUEST["nombre"]."'))";
	if(mysql_query($reg_activ,$con))
		{
		
		cuadro_error(mysql_error());
		
		}
		else
			{
			echo '<p class="negrita"><center><font color="Navy">Actividad Registrada correctamente...........</font></center></p>';
			echo '<meta http-equiv="Refresh" content="0;url=reg_activ.php?p1='.$expediente_id.'">';
			}
	
		
	
	
}
else 
{
	echo '<p class="negrita"><center><font color="Navy">La suma de las actividades solo debe ser de 100 %</font></center></p>';
	echo '<p class="negrita"><center><font color="Navy">Total:</font></center>
	<center><font color="Navy">'.round($suma_vt,2).'</font></center></p>';
	echo '<meta http-equiv="Refresh" content="0;url=reg_activ.php?p1='.$expediente_id.'">';
}
//grabamos en la base de datos

		
break;
case 'elimina':
$agrup_eli = $_REQUEST['agrup_eli'];
$activ_eli = $_REQUEST['activ_eli'];
echo $activ_eli;
//eliminamos la actividad
$borra_act = mysql_query("delete from actividades where actividad_id= '$activ_eli' and expediente_id = '$agrup_eli'");
$borra_not = mysql_query("delete from notas where actividad = '$activ_eli' and expediente_id = '$agrup_eli'");
if($borra_act)
		{
		echo '<p class="negrita"><center><font color="Navy">Actividad Eliminada correctamente</font></center></p>';
		echo '<meta http-equiv="Refresh" content="0;url=reg_activ.php?p1='.$agrup_eli.'">';
		}
	else
		{
		echo '<p class="negrita"><center><font color="Navy">'.$id_error_editar.'</font></center></p>';
		echo '<meta http-equiv="Refresh" content="0;url=reg_activ.php?p1='.$agrup_eli.'">';
		}
break;
case 'edita':
	$actividad_id=$_REQUEST['actividad_id'];
	$consulta_activ = mysql_query("SELECT * FROM actividades WHERE actividad_id='$actividad_id'");
	$registro_activ = mysql_fetch_array($consulta_activ);
	echo '<span class="negrita"><center><font color="Navy">'.$id_editar.' '.$id_datos.' '.$id_de.' '.$actividad_id.'</font></center></span>';
	echo '</p>';
	echo '<p class="texto_centrado">'.$id_texto_edi_doc.'</p><br />';
$result=mysql_query("select * from actividades where actividad_id='".$_REQUEST["actividad_id"]."' ",$con);
if(mysql_num_rows($result) == 1)
{
$actividad_id=mysql_result($result,0,"actividad_id");
$actividad_nombre=mysql_result($result,0,"actividad_nombre");
$expediente=mysql_result($result,0,"expediente_id");
$ponderacion=mysql_result($result,0,"ponderacion");
$tecnico=mysql_result($result,0,"tecnico_id");
$proceso=mysql_result($result,0,"proceso_id");
$tactividad=mysql_result($result,0,"tactividad_id");
$finicio=mysql_result($result,0,"finicio");
$ffin=mysql_result($result,0,"ffin");
echo '<br />';
?>
<form name="registro" action="reg_activ.php" method="post" enctype="multipart/form-data">
	
	<table width="650" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS DE LA ACTIVIDAD REGISTRADA</h3></td>
		</tr>
		<input type="text" name="actividad_id" style="visibility:hidden" readonly="readonly"  value="<?php echo $actividad_id?>" size="40" />
		<input type="text" name="expediente_id" style="visibility:hidden" readonly="readonly"  value="<?php echo $expediente_id?>" size="40" />
		<tr>
			<td class="tdatos">NOMBRE DE LA ACTIVIDAD</td>
			<td class="dtabla"><input type="text" name="actividad_nombre" value="<?php echo $actividad_nombre ?>" size="40" /></td>
		</tr>
		<tr>
			<td class="tdatos">PONDERACIÓN EN %</td>
			<?php
			echo '<td>
				
					<select name="ponderacion" id="ponderacion" >
					';	
					echo '<option>'.$ponderacion.'</option>';
					for($i=1;$i<=100;$i++)
							{
								echo '<option>'.$i.'</option>';
							}
				echo '	
				</select>
			</td>';
			?>  
		</tr>
		<tr>
			<td class="tdatos">FUNCIONARIO RESPONSABLE:</td>
			<?php
			echo '<td>
				
					<select name="tecnico" id="tecnico" >
					';	
					//listamos grupos para componer el select
					$consulta_for = mysql_query("select * from tecnico where tecnico_id='$tecnico'");
					$reg_consulta_for = mysql_fetch_array($consulta_for);
					echo '<option value="'.$reg_consulta_for['tecnico_id'].'">'.$reg_consulta_for['tecnico_nombres'].' '.$reg_consulta_for['tecnico_apellidos'].'</option>';
					$sel_objet = mysql_query("SELECT * FROM tecnico");
					for($p=0;$p<mysql_num_rows($sel_objet);$p++)
						{
						$reg_objet = mysql_fetch_array($sel_objet);
						echo '<option value="'.$reg_objet['tecnico_id'].'">'.$reg_objet['tecnico_nombres'].'   '.$reg_consulta_for['tecnico_apellidos'].'</option>';
						}
				echo '	
				</select>
			
			</td>';
			?>
		</tr>	
		<tr>
			<td class="tdatos">ELIGE UN PROCESO:</td>
			<?php
			echo '<td>
				
					<select name="proceso" id="proceso" >
					';	
					//listamos grupos para componer el select
					$consulta_for = mysql_query("select * from procesos where proceso_id='$proceso'");
					$reg_consulta_for = mysql_fetch_array($consulta_for);
					echo '<option value="'.$reg_consulta_for['proceso_id'].'">'.$reg_consulta_for['proceso_nombre'].'</option>';
					$sel_objet = mysql_query("SELECT * FROM procesos WHERE expediente_id='$expediente_id'");
					for($p=0;$p<mysql_num_rows($sel_objet);$p++)
						{
						$reg_objet = mysql_fetch_array($sel_objet);
						echo '<option value="'.$reg_objet['proceso_id'].'">'.$reg_objet['proceso_nombre'].'</option>';
						}
				echo '	
				</select>
			
			</td>';
			?>
		</tr>	
		<tr>
			<td class="tdatos">ELIGE UN TIPO DE ACTIVIDAD AL QUE PERTENECE :</td>
			<?php
			echo '<td>
				
					<select name="tactividad" id="tactividad" >
					';	
					//listamos grupos para componer el select
					$consulta_for = mysql_query("SELECT * FROM tactividad where tactividad_id='$tactividad'");
					$reg_consulta_for = mysql_fetch_array($consulta_for);
					echo '<option value="'.$reg_consulta_for['tactividad_id'].'">'.$reg_consulta_for['tactividad_nombre'].'</option>';
					$sel_objet = mysql_query("SELECT * FROM tactividad");
					for($p=0;$p<mysql_num_rows($sel_objet);$p++)
						{
						$reg_objet = mysql_fetch_array($sel_objet);
						echo '<option value="'.$reg_objet['tactividad_id'].'">'.$reg_objet['tactividad_nombre'].'</option>';
						}
				echo '	
				</select>
			
			</td>';
			?>
		</tr>	
		<tr>	
		<td  class="tdatos">FECHA INICIO</td>
			
				<html>
						  <head>
						    <title>Dynarch Calendar -- Simple popup calendar</title>
						    <script src="../theme/js/jscal2.js"></script>
						    <script src="../theme/js/lang/en.js"></script>
						    <link rel="stylesheet" type="text/css" href="../theme/css/jscal2.css" />
						    <link rel="stylesheet" type="text/css" href="../theme/css/border-radius.css" />
						    <link rel="stylesheet" type="text/css" href="../theme/css/steel/steel.css" />
						  </head>
						  <body>
						    <td class="dtabla"><input size="30" id="finicio" name="finicio" value="<?php echo $finicio?>"> <button id="f_btn1">...</button><br /></td>
						
						    <script type="text/javascript">//<![CDATA[
						      Calendar.setup({
						        inputField : "finicio",
						        trigger    : "f_btn1",
						        onSelect   : function() { this.hide() },
						        showTime   : 12,
						        dateFormat : "%Y-%m-%d"
						      });
						    //]]></script>
						  </body>
					</html>
		</tr>	
		<tr>
			<td  class="tdatos">FECHA FIN</td>
			
				<html>
						  <head>
						    <title>Dynarch Calendar -- Simple popup calendar</title>
						    <script src="../theme/js/jscal2.js"></script>
						    <script src="../theme/js/lang/en.js"></script>
						    <link rel="stylesheet" type="text/css" href="../theme/css/jscal2.css" />
						    <link rel="stylesheet" type="text/css" href="../theme/css/border-radius.css" />
						    <link rel="stylesheet" type="text/css" href="../theme/css/steel/steel.css" />
						  </head>
						  <body>
						    <td class="dtabla"><input size="30" id="ffin" name="ffin" value="<?php echo $ffin ?>"> <button id="f_btn">...</button><br /></td>
						
						    <script type="text/javascript">//<![CDATA[
						      Calendar.setup({
						        inputField : "ffin",
						        trigger    : "f_btn",
						        onSelect   : function() { this.hide() },
						        showTime   : 12,
						        dateFormat : "%Y-%m-%d"
						      });
						    //]]></script>
						  </body>
					</html>
		</tr>	
		<tr>
			<td colspan="2" align="center"><input type="image" src="../imgs/guardar.png" name="accion" value="guarda"></td>    
			&nbsp; 
			</tr>
	</table>
</form>


<?php
echo '<br>';
}
break;
case 'guarda':
	$actividad_id= $_POST['actividad_id'];
	$actividad_nombre = $_POST['actividad_nombre'];
	$agr= $_POST['expediente_id'];
	$pond = $_POST['ponderacion'];
	$tecnico=$_POST['tecnico'];
	$objet=$_POST['proceso'];
	$tactiv=$_POST['tactividad'];
	$finicio=$_POST['finicio'];
	$ffin=$_POST['ffin'];
	//hacemos el update
	$consulta_actualiza = mysql_query("update actividades set actividad_nombre='$actividad_nombre',ponderacion='$pond',proceso_id='$objet',
	tactividad_id='$tactiv',finicio='$finicio',ffin='$ffin' where actividad_id = '$actividad_id'");
		//$consulta_actualizar = mysql_query("update notas set actividad='$activ'");
		if($consulta_actualiza)
		{
		echo '<p class="negrita"><center><font color="Navy">'.$id_datos_conv_edit.'</font></center></p>';
		echo '<meta http-equiv="Refresh" content="0;url=reg_activ.php?p1='.$agr.'">';
		}
	else
		{
		echo '<p class="negrita"><center><font color="Navy">'.$id_error_editar.'</font></center></p>';
		echo '<meta http-equiv="Refresh" content="0;url=reg_activ.php?p1='.$agr.'">';
		}
	break;
}//fin switch($accion)
if($agr_post)
{
echo '<div align="center"><font color="Navy"><h3>'.$id_misactividades.'</h3></font></div>';
//echo '<div align="center"><font color="Navy"><h3>'.$reg_agr['expediente_nombre'].'</h3></font></div>';
echo '<p><center><font color="Navy">'.$id_texto_actividades.'</font></center></p>';
//presento formulario para registrar actividad
echo '<p class="negrita"><center><font color="Navy">'.$id_reg_activ.'</font></center></p>
<div id="centercontent">
<div align="center">';
echo '<form name="registro" action="reg_activ.php" method="post" enctype="multipart/form-data">';
	echo '<p>'.$id_nom_activ.': <input id="activ" name="activ" maxlength="200" size="100"</p>';
	//seleccionamos expediente
////////////////////////////////////////////////////////////////////////////////
$sel_agr = mysql_query("select expediente_id,respbrigada_id,expediente_nombre,inicio,fin from expediente where expediente_id='$agr_post'");
$sel_procesos = mysql_query("SELECT * FROM procesos WHERE expediente_id='$agr_post' and estado=1");
$sel_activ = mysql_query("select * from actividades  where expediente_id='$agr_post' order by actividades_id desc limit 1 ");
$num_activ = mysql_num_rows($sel_activ);
	$num_agr = mysql_num_rows($sel_agr);
	if($num_agr==0) 
	{
		echo '<p class="negrita"><center><font color="Navy">'.$id_noagrup.'</font></center></p>';
	}
	else
	{
	echo '<p class="negrita"><font color="Navy">'.$id_agr_activ.'</font></p>';
	echo '<table class="tablacentrada"><tr><td><table><tr>';
	for($a=0;$a<$num_agr;$a++)
		{
		$reg_agr = mysql_fetch_array($sel_agr);
		$agr = $reg_agr['expediente_id'];
		$doc = $reg_agr['respbrigada_id'];
		$nombre = $reg_agr['nombre'];
		if($num_activ==0)
					{
					$date1=$reg_agr['inicio'];
					$date2=$reg_agr['fin'];
					}
					else 
					{
						$reg_activ = mysql_fetch_array($sel_activ);
						$date1=$reg_activ ['ffin'];
						$date2=$reg_agr['fin'];
					}
		echo '<td><input type="text" name="txt_agr" maxlength="30" id="txt_agr" style="visibility:hidden" readonly="readonly" style="background-color:#F7D358" value="'.$agr.'"/></td>';	
		echo '<td><input type="text" name="txt_doc" maxlength="30" id="txt_doc" style="visibility:hidden" readonly="readonly" style="background-color:#F7D358" value="'.$doc.'"/></td>';
		
		///////////////// calculo de periodos ////////////////////////////////////
			//$date1=date("Y-m-d");
			//$date2=$reg_agr['fin'];
			$s = strtotime($date2)-strtotime($date1);
			$d = intval($s/86400);
			$s -= $d*86400;
			$h = intval($s/3600);
			$s -= $h*3600;
			$m = intval($s/60);
			$s -= $m*60;
 			$dif= (($d*24)+$h).hrs." ".$m."min";
			$dif2= $d.$space.$space.dias." ".$h.hrs." ".$m."min";
			$difmes= round($d/90);
			if($dif2>0)
			{
				echo '<br>';	
				echo "<font color='#ff0000'>LE FALTA  $dif2 PARA TERMINAR EL PROYECTO</font>"; 
				echo '<br>';
			}
else {
	echo "<font color='#ff0000'><blink>SU TIEMPO A TERMINADO ACÉRQUESE  DE URGENCIA AL DEPARTAMENTO DEL MUNICIPIO</blink></font>"; 
}
		
		//////////////////////////////////////////////////////////////////////////
		
		}//fin for
	echo '</tr></table></td></tr><tr>
	<td><input type="text" name="finicio" maxlength="30" id="finicio" style="visibility:hidden" readonly="readonly" style="background-color:#F7D358" value="'.$date1.'"/>
	<td><input type="text" name="ffin" maxlength="30" id="ffin" style="visibility:hidden" readonly="readonly" style="background-color:#F7D358" value="'.$date2.'"/>';
	?>
	<tr>
			<td class="tdatos">PONDERACION EN %</td>
			<?php
				echo '<td>
					<select name="ponderacion" id="ponderacion">';
						for($i=1;$i<=100;$i++)
							{
								echo '<option>'.$i.'</option>';
							}
					echo '</select>
				</td>';
			?>  
			  
		</tr>
		<tr>
			<td class="tdatos">ELIGE UN PROCESO</td>
			
				<td>
			
					<select id="objet" name="objet"> 
				<?php		
					echo '<option selected="selected">Escoja Un Procesos</option>';
					$sel_objet = mysql_query("SELECT * FROM procesos WHERE expediente_id='$agr_post' and estado=1");
					for($p=0;$p<mysql_num_rows($sel_objet);$p++)
						{
						$reg_objet = mysql_fetch_array($sel_objet);
						echo '<option value="'.$reg_objet['proceso_id'].'">'.$reg_objet['proceso_nombre'].'</option>';
						}
					echo '</select>
				</td>';
			?> 
		</tr>	
		<tr>
			<td class="tdatos">RESPONSABLE ACTIVIDAD</td>
			<?php
				echo '<td>
					<select id="per" name="per">';
					echo '<option selected="selected">Escoja Un Responsable</option>';
					$sel_alum = mysql_query("select tecnico.tecnico_id,tecnico.tecnico_nombres,tecnico.tecnico_apellidos,asignacion.tecnico_id,
asignacion.expediente_id
from tecnico,asignacion where asignacion.expediente_id='$agr_post' and asignacion.tecnico_id=tecnico.tecnico_id ");
					$num_alum = mysql_num_rows($sel_alum);
					for($d=0;$d<$num_alum;$d++)
						{
						$reg_alum=mysql_fetch_array($sel_alum);
						echo '<option value="'.$reg_alum['tecnico_id'].'">'.$reg_alum['tecnico_nombres'].'   '.$reg_alum['tecnico_apellidos'].'</option>';
						}
					echo '</select>
				</td>';
			?>  
			  
		</tr>			
		<tr>
			<td class="tdatos">TIPO DE ACTIVIDAD:</td>
			<?php
				echo '<td>
					<select id="tactiv" name="tactiv">';
					echo '<option selected="selected">Escoja Tipo de Actividad</option>';
					$sel_objet = mysql_query("SELECT * FROM tactividad");
					for($p=0;$p<mysql_num_rows($sel_objet);$p++)
						{
						$reg_objet = mysql_fetch_array($sel_objet);
						echo '<option value="'.$reg_objet['tactividad_id'].'">'.$reg_objet['tactividad_nombre'].'</option>';
						}
					echo '</select>
				</td>';
			?>  
			  
		</tr>	
	<?php
	echo '<tr>
			<td colspan="2" align="center"><input type="image" src="../imgs/guardar.png" name="accion" value="registro"></td> 
		</tr>';
	echo '<tr><td>';
	//echo '<a href="#" title="'.$id_guardar.'" onclick="registraActividad1()"><img src="../imgs/guardar.png" alt="'.$id_guardar.'" /></a>';
	//echo '<a href="#" title="'.$id_cancelar.'" onclick="oculta(\'oculto\')"><img src="../imgs/cancelar.png" alt="'.$id_cancelar.'" /></a>';
	echo '</td></tr>';
	
	echo '</table><br /></div>';
	}//fin de else (sí que hay expediente)
echo '</form>';
//consultamos las actividades ya registradas
$sel_act = mysql_query("select DISTINCT actividades.actividad_id,actividades.actividad_nombre,actividades.estado,expediente.expediente_nombre,actividades.ponderacion,
tecnico.tecnico_nombres,tecnico.tecnico_apellidos,procesos.proceso_nombre,tactividad.tactividad_nombre
from actividades,expediente,tactividad,procesos,tecnico,asignacion
 where 
expediente.respbrigada_id = '$respbrigada' and expediente.expediente_id = actividades.expediente_id AND expediente.expediente_id='$agr_post'  
and actividades.tactividad_id=tactividad.tactividad_id and actividades.proceso_id=procesos.proceso_id and 
actividades.tecnico_id=tecnico.tecnico_id and 
actividades.tecnico_id=asignacion.tecnico_id and tecnico.tecnico_id=asignacion.tecnico_id");
$num_act = mysql_num_rows($sel_act);
if($num_act == 0)
	{
	echo '<p class="negrita"><center><font color="Navy">'.$id_noagrup.'</font></center></p>';
	}
else
	{
	echo '<p class="negrita"><center><font color="Navy">Procesos registrados hasta el momento</font></center></p>
	<table align="center"  class="tabla">';
	echo '<tr>';
		echo '<td class="tdatos">ELIMINAR</td>
		<td class="tdatos">EDITAR</td>
		<td class="tdatos">ACTIVIDAD</td>
		<td class="tdatos">PONDERACIÓN %</td>
		<td class="tdatos">PROCESOS</td>
		<td class="tdatos">TIPO DE ACTIVIDAD</td>
		<td class="tdatos">RESPONSABLE</td>
		<td class="tdatos">ESTADO</td>';
	echo '</tr>';
	for($b=0;$b<$num_act;$b++)
		{
		$reg_act = mysql_fetch_array($sel_act);
		echo '<td class="centrado"><a href=reg_activ.php?accion=elimina&activ_eli='.$reg_act['actividad_id'].'&agrup_eli='.$reg_act['expediente_id'].'><img src="../imgs/borra_peq.png" alt="'.$id_eliminar.'" /></a></td>';
		//ecco'<td class=\"tdatos\"><a href=\"elim_proy.php?expediente_id=".$row["expediente_id"]."\"><img src=../theme/images/user-delete-2.ico></a></td>';
		echo '<td><a href=reg_activ.php?accion=edita&actividad_id='.$reg_act['actividad_id'].' title="'.$id_editar.'"><img src="../imgs/edita.png" alt="'.$id_editar.'" />
			</a></td>';
		echo '<td>'.$reg_act['actividad_nombre'].'</td>';
		echo '<td>'.$reg_act['ponderacion'].'</td>';
		echo '<td>'.$reg_act['proceso_nombre'].'</td>';
		echo '<td>'.$reg_act['tactividad_nombre'].'</td>';
		echo '<td>'.$reg_act['tecnico_nombres'].'  '.$reg_act['tecnico_apellidos'].'</td>';
		$mat_pd[]=$reg_act['ponderacion'];
		//no parece recomendable andar cambiando el nombre a las actividades
		//echo '<a href="#" title="'.$id_edita_act.'" id="actividad_'.$b.'" onclick="editaActividad(\'actividad_'.$b.'\',\'actividad\',\''.$actividad_r.'\',\''.$expediente_id_r.'\')">'.$actividad_r.'</a>';
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
				echo '</td>';
		echo '</td>';
		echo '<td class="justificado">';
		
		echo '</td>';
		echo '</tr>';
		}//fin de for
		
	echo '</table><br />';
	$sel_act1 = mysql_query("select actividades.actividad_nombre,actividades.expediente_id,actividades.ponderacion,actividades.tecnico_id,expediente.expediente_id,procesos.estado 
from actividades,expediente,procesos where 
	expediente.respbrigada_id = '$respbrigada' and expediente.expediente_id = actividades.expediente_id AND expediente.expediente_id='$agr_post'  
	and procesos.proceso_id=actividades.proceso_id and procesos.estado=1");
	$num_act1 = mysql_num_rows($sel_act1);
if($num_act1 == 0)
	{
	//echo '<p class="negrita">'.$id_noactiv.'</p>';
	}
	else
		{
	
		for($b=0;$b<$num_act1;$b++)
			{
			$reg_act1 = mysql_fetch_array($sel_act1);
			
			$matriz_vt[]=$reg_act1['ponderacion'];
			
			}
			
			if($matriz_vt<>0)
					{
						$suma_vt=array_sum($matriz_vt)+$pond;
					}
			//fin de for
		}


//echo '<td><input type="text" name="txt_vt" maxlength="10" readonly="readonly" style="background-color:#F7D358" id="txt_valorhora" value="'.round($suma_vt,2).'"/></td>';
if($suma_vt<=101)
{
echo '<p class="negrita"><center><font color="Navy">Suma Poderacion:'.$suma_vt.'</font></center></p>';
	
}
	

	}//fin de else (sí que hay actividades registradas)
	
	}
?>

