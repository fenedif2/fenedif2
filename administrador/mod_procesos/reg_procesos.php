<?php
require("../mod_configuracion/conexion.php");
include('../funciones.php');
require("../theme/header_inicio.php");
require('../idioma/castellano.php');
//si hay sesión cargamos código
//recogemos la información cargando la variable
$agr_post=$_REQUEST['p1'];
$sel_agr = mysql_query("select * from expediente where expediente_id = '$agr_post'");
$reg_agr = mysql_fetch_array($sel_agr);
$respbrigada=$reg_agr['respbrigada_id'];
$respbrigada_id=$reg_agr['respbrigada_id'];
echo'<br>
<form action="reg_procesos.php" method="post">
	
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">Seleccione el Expediente</td>
			<tr>
			<td>
				
					<select name="p1" id="p1" >
					';	
					//listamos grupos para componer el select
					$sel_agr = mysql_query("SELECT expediente.*,respbrigada.respbrigada_cedula FROM expediente
						left join
						respbrigada on expediente.respbrigada_id=respbrigada.respbrigada_id
						");
					$num_agr = mysql_num_rows($sel_agr);
					for($agr=0;$agr<$num_agr;$agr++)
					{
					$reg_agr = mysql_fetch_array($sel_agr);
					echo '<option value="'.$reg_agr['expediente_id'].'">['.$reg_agr['expediente_codigo'].']-> '.$reg_agr['expediente_nombre'].'</option>';
					}
				echo '	
				</select>
			
			</td>
			<td><input type="submit" value="Buscar"></td>
			</tr>
		</tr>
	</table>
</form>';

echo '<br/><div class="titulo"><h5>REGISTRO DE PROCESOS</h5></div>';

if (strtolower($_REQUEST["accion"])=="registrar")
{
//recogemos variables de formulario
$proceso = $_POST['proceso_nombre'];
$expediente_id=$_REQUEST['expediente_id'];
$inicio=$_REQUEST['ini'];
$fin=$_REQUEST['fin'];
$finicio=$_REQUEST['finicio'];
$ffin=$_REQUEST['ffin'];
$coord=$_REQUEST['coord'];

//VERIFICAMOS QUE SE SELECCIONO ALGUN ARCHIVO
			
			

	function check_in_range($start_date, $end_date, $evaluame)
		{
		    $start_ts = strtotime($start_date);
		    $end_ts = strtotime($end_date);
		    $user_ts = strtotime($evaluame);
		    return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
		}
	if (check_in_range($finicio,$ffin,$inicio) and check_in_range($finicio,$ffin,$fin))	
	{
										
	//$reg_activ = mysql_query("insert into Procesos values('','$objet','$expediente_id',' ','$per')");
		$sql = "INSERT INTO procesos (proceso_nombre,expediente_id,respbrigada_id,inicio,fin) VALUES
		('$proceso','$expediente_id','$coord','$inicio','$fin')";
		
		if(mysql_query($sql,$con))
							{
				
									
										cuadro_mensaje("Proceso Registrado Correctamente...");
					 				echo "<br><br><br><br><br>";
									echo '<meta http-equiv="Refresh" content="0;url=reg_procesos.php?respbrigada_id='.$coord.'&p1='.$expediente_id.'">?';
									exit;
										
									
									
							}
								else
								{
									cuadro_error(mysql_error());
									echo '<meta http-equiv="Refresh" content="0;url=reg_procesos.php?respbrigada_id='.$coord.'&p1='.$expediente_id.'">?';
								
								}
	}	
	else
 	{
	//echo'<td colspan="2" align="center"><input type="image" src="../imgs/guardar.png" name="accion" value="registrar"></td> 
	cuadro_mensaje("Fechas fuera de rango");
	//echo'<meta http-equiv="Refresh" content="0;url=reg_procesos.php>?respbrigada_id='.$coord.'&p1='.$expediente_id.'';
	
echo '<meta http-equiv="Refresh" content="0;url=reg_procesos.php?respbrigada_id='.$coord.'&p1='.$expediente_id.'">?';
	}		
	
}
if (strtolower($_REQUEST["accion"])=="elimina")
{

$agrup_eli = $_REQUEST['agrup_eli'];
$activ_eli = $_REQUEST['activ_eli'];
//eliminamos la actividad
$borra_act = mysql_query("delete from procesos where proceso_id= '$activ_eli' and expediente_id = '$agrup_eli'");
$borra_not = mysql_query("delete from actividades where Procesos = '$activ_eli' and expediente_id = '$agrup_eli'");
if($borra_act)
		{
		echo '<p class="negrita"><center><font color="Navy">Proceso Eliminado correctamente</font></center></p>';
		echo '<meta http-equiv="Refresh" content="0;url=reg_procesos.php?p1='.$agrup_eli.'">';
		}
	else
		{
		echo '<p class="negrita"><center><font color="Navy">'.$id_error_editar.'</font></center></p>';
		echo '<meta http-equiv="Refresh" content="0;url=reg_procesos.php?p1='.$agrup_eli.'">';
		}
}
if (strtolower($_REQUEST["accion"])=="edita")
{
	$id=$_REQUEST['proceso_id'];
	$consulta_activ = mysql_query("SELECT * FROM procesos WHERE proceso_id='$id'");
	$registro_activ = mysql_fetch_array($consulta_activ);
	echo '<span class="negrita"><center><font color="Navy">'.$id_editar.' '.$id_datos.' '.$id_de.' '.$id.'</font></center></span>';
	echo '</p>';
	echo '<p class="texto_centrado">Aquí puedes cambiar los datos del proceso registrado , no podra cambiar el codigo del Expediente.</p><br />';
$result=mysql_query("select * from procesos where proceso_id='".$_REQUEST["proceso_id"]."' ",$con);
if(mysql_num_rows($result) == 1)
{
$proceso_id=mysql_result($result,0,"proceso_id");
$proceso_nombre=mysql_result($result,0,"proceso_nombre");
$expediente_id=mysql_result($result,0,"expediente_id");
$ini=mysql_result($result,0,"inicio");
$fin=mysql_result($result,0,"fin");
$responsable=mysql_result($result,0,"respbrigada_id");
$estado=mysql_result($result,0,"estado");
echo '<br />';
?>
<form name="registro" action="reg_procesos.php" method="post" enctype="multipart/form-data">
	
	<table width="650" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS DEL PROCESO REGISTRADO</h3></td>
		</tr>
		<input type="text" name="proceso_id" style="visibility:hidden" readonly="readonly"  value="<?php echo $proceso_id?>" size="40" />
		<input type="text" name="expediente_id" style="visibility:hidden" readonly="readonly"  value="<?php echo $expediente_id?>" size="40" />
		<tr>
			<td class="tdatos">NOMBRE PROCESO</td>
			<td class="dtabla"><input type="text" name="proceso_nombre" value="<?php echo $proceso_nombre ?>" size="40" /></td>
		</tr>
		<tr>
			<td class="tdatos">FUNCIONARIO RESPONSABLE DEL PROCESO</td>
			<?php
			echo '<td>
				
					<select name="responsable" id="responsable" >
					';	
					$consulta_for = mysql_query("select * from respbrigada where respbrigada_id ='$responsable'");
					$reg_consulta_for = mysql_fetch_array($consulta_for);
					echo '<option value="'.$reg_consulta_for['respbrigada_id'].'">'.$reg_consulta_for['nombres'].'   '.$reg_consulta_for['apellidos'].'</option>';
					$consulta_respbrigada = mysql_query("select * from respbrigada");
					$n_respbrigada = mysql_num_rows($consulta_respbrigada);
					for($d=0;$d<$n_respbrigada;$d++)
						{
							$reg_consulta_respbrigada = mysql_fetch_array($consulta_respbrigada);
							echo '<option value="'.$reg_consulta_respbrigada['respbrigada_id'].'">'.$reg_consulta_respbrigada['nombres'].'   '.$reg_consulta_respbrigada['apellidos'].'</option>';
						}
				echo '	
				</select>
			
			</td>';
			?>  
			  
		</tr>	
		<tr>
			<td class="tdatos">ESTADO</td>
			<?php
			echo '<td>
				
					<select name="estado" id="estado" >
					';	
					echo '<option>'.$estado.'</option>';
					echo '<option value=1>Activar</option>';
					echo '<option value=0>Desactivar</option>';
					
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
						    <td class="dtabla"><input size="30" id="ini" name="ini" value="<?php echo $ini?>"> <button id="f_btn1">...</button><br /></td>
						    <script type="text/javascript">//<![CDATA[
						      Calendar.setup({
						        inputField : "ini",
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
						    <td class="dtabla"><input size="30" id="fin" name="fin" value="<?php echo $fin ?>"> <button id="f_btn">...</button><br /></td>
						
						    <script type="text/javascript">//<![CDATA[
						      Calendar.setup({
						        inputField : "fin",
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
}
//////////////////////// problema y soluciones /////////////////////////////////////////////
if (strtolower($_REQUEST["accion"])=="editar")
{
	$proceso_id=$_REQUEST['proceso_id'];
	$consulta_activ = mysql_query("SELECT * FROM procesos WHERE proceso_id='$proceso_id'");
	$registro_activ = mysql_fetch_array($consulta_activ);
	echo '<span class="negrita"><center><font color="Navy">'.$id_editar.' '.$id_datos.' '.$id_de.' '.$id.'</font></center></span>';
	echo '</p>';
	$result=mysql_query("select * from procesos where proceso_id='".$_REQUEST["proceso_id"]."' ",$con);
if(mysql_num_rows($result) == 1)
{
$proceso_id=mysql_result($result,0,"proceso_id");
$objetivo=mysql_result($result,0,"objetivo");
$expediente_id=mysql_result($result,0,"expediente_id");
$inicio=mysql_result($result,0,"inicio");
$fin=mysql_result($result,0,"fin");
$responsable=mysql_result($result,0,"respbrigada_id");
$secuencia=mysql_result($result,0,"secuencia");
$estado=mysql_result($result,0,"estado");
$problemas=mysql_result($result,0,"problemas");
$soluciones=mysql_result($result,0,"soluciones");
echo '<br />';
?>
<form name="registro" action="reg_procesos.php" method="post" enctype="multipart/form-data">
	
	<table width="650" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>REGISTRO DE PROBLEMAS Y SOLUCIONES</h3></td>
		</tr>
		<input type="text" name="proceso_id" style="visibility:hidden" readonly="readonly"  value="<?php echo $proceso_id?>" size="40" />
		<input type="text" name="expediente_id" style="visibility:hidden" readonly="readonly"  value="<?php echo $expediente_id?>" size="40" />
		<tr>
			<td class="tdatos">PROBLEMAS</td>
			<td class="dtabla">
				<textarea name="problemas" rows="6" cols="60" id="problemas" /> <?php echo $problemas ?> </textarea>
			</td>
		</tr>
		<tr>
			<td class="tdatos">SOLUCIONES</td>
			<td class="dtabla">
				<textarea name="soluciones" rows="6" cols="60" id="soluciones" /> <?php echo $soluciones ?> </textarea>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="image" src="../imgs/guardar.png" name="accion" value="guardar"></td>    
			&nbsp; 
		</tr>
	</table>
</form>


<?php
echo '<br>';
}
}

if (strtolower($_REQUEST["accion"])=="guardar")
{
	$proceso_id= $_POST['proceso_id'];
	$objetivo = $_POST['objetivo'];
	$agr= $_POST['expediente_id'];
	$per=$_POST['periodo'];
	$doc=$_REQUEST['responsable'];
	$inicio=$_REQUEST['inicio'];
	$fin=$_REQUEST['fin'];
	$secuencia=$_REQUEST['secuencia'];
	$estado=$_REQUEST['estado'];
	$problemas=$_REQUEST['problemas'];
	$soluciones=$_REQUEST['soluciones'];
	//hacemos el update
	$consulta_actualiza = mysql_query("update objetivos set problemas='$problemas',soluciones='$soluciones' where proceso_id='$proceso_id'");
		//$consulta_actualizar = mysql_query("update notas set actividad='$activ'");
		if($consulta_actualiza)
		{
		echo '<p class="negrita"><center><font color="Navy">Problemas y Soluciones registrados</font></center></p>';
		echo '<meta http-equiv="Refresh" content="0;url=reg_procesos.php?p1='.$agr.'">';
		}
	else
		{
		echo '<p class="negrita"><center><font color="Navy">'.$id_error_editar.'</font></center></p>';
		echo '<meta http-equiv="Refresh" content="0;url=reg_procesos.php?p1='.$agr.'">';
		}

}//fin switch($accion)

/////////////////////////////////////////////////////////////////////////////////////////
if (strtolower($_REQUEST["accion"])=="guarda")
{
	$proceso_id= $_POST['proceso_id'];
	$proceso_nombre = $_POST['proceso_nombre'];
	$agr= $_POST['expediente_id'];
	$doc=$_REQUEST['responsable'];
	$inicio=$_REQUEST['ini'];
	$fin=$_REQUEST['fin'];
	$estado=$_REQUEST['estado'];
	
	//hacemos el update
	$consulta_actualiza = mysql_query("update procesos set proceso_nombre='$proceso_nombre',respbrigada_id='$doc',inicio='$inicio',fin='$fin',estado='$estado' where proceso_id='$proceso_id'");
		//$consulta_actualizar = mysql_query("update notas set actividad='$activ'");
		if($consulta_actualiza)
		{
		echo '<p class="negrita"><center><font color="Navy">Datos actualizados</font></center></p>';
		echo '<meta http-equiv="Refresh" content="0;url=reg_procesos.php?p1='.$agr.'">';
		}
	else
		{
		echo '<p class="negrita"><center><font color="Navy">'.$id_error_editar.'</font></center></p>';
		echo '<meta http-equiv="Refresh" content="0;url=reg_procesos.php?p1='.$agr.'">';
		}

}//fin switch($accion)
if($agr_post)
{
echo '<div align="center"><font color="Navy"><h3>Mis Procesos</h3></font></div>';
echo '<div align="center"><font color="Navy"><h3>'.$reg_agr['nombre'].'</h3></font></div>';
echo '<p><center><font color="Navy">'.$id_texto_Procesos.'</font></center></p>';
//presento formulario para registrar actividad
echo '<p class="negrita"><center><font color="Navy">Registrar un Proceso</font></center></p>
<div id="centercontent">
<div align="center">';
echo '<form name="registro" action="reg_procesos.php" method="post" onsubmit="return validar()" enctype="multipart/form-data">';
	echo '<p>'.$id_nom_objetivo .': <input id="proceso_nombre" name="proceso_nombre" maxlength="200" size="100"</p>';
	//seleccionamos expediente
	////////////////////////////////////////////////////////////////////////////////
	$sel_agr = mysql_query("
	select expediente.expediente_id,expediente.expediente_nombre,expediente.respbrigada_id,expediente.inicio,expediente.fin,respbrigada.nombres,
respbrigada.apellidos 
from 
	expediente
left join
	respbrigada on expediente.respbrigada_id=respbrigada.respbrigada_id
WHERE
   expediente.expediente_id='$agr_post'");
	$num_agr = mysql_num_rows($sel_agr);
	$sel_proc = mysql_query("select * from procesos  where expediente_id='$agr_post' order by proceso_id desc limit 1");
	$num_proc = mysql_num_rows($sel_proc);
	echo $num_proc;
	if($num_agr==0) 
	{
		echo '<p class="negrita"><center><font color="Navy">'.$id_noagrup.'</font></center></p>';
	}
		else
		{
			echo '<p class="negrita"><font color="Navy">'.$id_agr_objet.'</font></p>';
			echo '<table class="tablacentrada"><tr><td><table><tr>';
			for($a=0;$a<$num_agr;$a++)
			{
				$reg_agr = mysql_fetch_array($sel_agr);
				$agr = $reg_agr['expediente_id'];
				$coord=$reg_agr['respbrigada_id'];
				$nombre = $reg_agr['expediente_nombre'];
				
				echo '<td><input type="text" name="expediente_id" maxlength="30" id="expediente_id" style="visibility:hidden" readonly="readonly" style="background-color:#F7D358" value="'.$agr.'"/></td>';	
				echo '<td><input type="text" name="coord" maxlength="30" id="coord" style="visibility:hidden" readonly="readonly" style="background-color:#F7D358" value="'.$coord.'"/></td>';	
				///////////////// calculo de periodos ////////////////////////////////////
					if($num_proc==0)
					{
					$date1=$reg_agr['inicio'];
					$date2=$reg_agr['fin'];
					}
					else 
					{
						$reg_proc = mysql_fetch_array($sel_proc);
						$date1=$reg_proc['fin'];
						$date2=$reg_agr['fin'];
					}
					$s = strtotime($date2)-strtotime($date1);
					$d = intval($s/86400);
					$s -= $d*86400;
					$h = intval($s/3600);
					$s -= $h*3600;
					$m = intval($s/60);
					$s -= $m*60;
		 			//$dif= (($d*24)+$h).hrs." ".$m."min";
					//$dif2= $d.$space.$space.dias." ".$h.hrs." ".$m."min";
					$difmes= round($d/90);
					$mes=$difmes*3;
					if($mes>0)
					{
						//echo '<font color=#ff0000>LE FALTA  $dif2  PARA TERMINAR EL PROYECTO \n</font><br>'; 
						echo "<font color='#ff0000'>SU PROCESO TIENE  $mes  MESES</font>"; 
						//echo '<input type="text" name="txt_trim" maxlength="5" size="2" readonly="readonly" style="background-color:#F7D358" id="txt_trim" value="'.$difmes.'"/>';
					}
				}//fin for
	echo '</tr></table></td></tr><tr>
	<td><input type="text" name="finicio" maxlength="30" id="finicio" style="visibility:hidden" readonly="readonly" style="background-color:#F7D358" value="'.$date1.'"/>
	<td><input type="text" name="ffin" maxlength="30" id="ffin" style="visibility:hidden" readonly="readonly" style="background-color:#F7D358" value="'.$date2.'"/>';
	?>;
		<tr>
			<td class="tdatos">RESPONSABLE DE PROCESO</td>
			<?php
			echo '<td>
				
					<select name="responsable" id="responsable" readonly="readonly" style="background-color:#F7D358">
					';	
					//listamos grupos para componer el select
					$consulta_respbrigada = mysql_query("select * from respbrigada where respbrigada_id='$coord'");
					$n_respbrigada = mysql_num_rows($consulta_respbrigada);
					for($d=0;$d<$n_respbrigada;$d++)
						{
							$reg_consulta_respbrigada = mysql_fetch_array($consulta_respbrigada);
							echo '<li><option value="'.$reg_consulta_respbrigada['respbrigada_id'].'">'.$reg_consulta_respbrigada['nombres'].'   '.$reg_consulta_respbrigada['apellidos'].'</option></li>';
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
						    <td class="dtabla"><input size="30" id="ini" name="ini" value="<?php echo $_REQUEST["inicio"]; ?>"> <button id="f_btn1">...</button><br /></td>
						
						    <script type="text/javascript">//<![CDATA[
						      Calendar.setup({
						        inputField : "ini",
						        trigger    : "f_btn1",
						        onSelect   : function() { this.hide() },
						        showTime   : 12,
						        dateFormat : "%Y-%m-%d"
						      });
						    //]]></script>
						  </body>
					</html>
						<td  class="tdatos"><?php echo $date1; ?></td>
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
						    <td class="dtabla"><input size="30" id="fin" name="fin" value="<?php echo $_REQUEST["fin"]; ?>"> <button id="f_btn">...</button><br /></td>
						
						    <script type="text/javascript">//<![CDATA[
						      Calendar.setup({
						        inputField : "fin",
						        trigger    : "f_btn",
						        onSelect   : function() { this.hide() },
						        showTime   : 12,
						        dateFormat : "%Y-%m-%d"
						      });
						    //]]></script>
						  </body>
					</html>
				<td  class="tdatos"><?php echo $date2; ?></td>
		</tr>
	
		<input type="text" name="band" style="visibility:hidden" readonly="readonly"  value="<?php echo 1?>" size="40" />			
				
	<?php
	echo '<tr>
			<td colspan="2" align="center"><input type="image" src="../imgs/guardar.png" name="accion" value="registrar" onclick="valida_envia()"></td> 
		</tr>';
	echo '<tr><td>';
	//echo '<a href="#" title="'.$id_guardar.'" onclick="registraActividad1()"><img src="../imgs/guardar.png" alt="'.$id_guardar.'" /></a>';
	//echo '<a href="#" title="'.$id_cancelar.'" onclick="oculta(\'oculto\')"><img src="../imgs/cancelar.png" alt="'.$id_cancelar.'" /></a>';
	echo '</td></tr>';
	
	echo '</table><br /></div>';
	}//fin de else (sí que hay expediente)
echo '</form>';

//consultamos los procesos registrados
$sel_act = mysql_query("SELECT procesos.proceso_id,procesos.proceso_nombre,procesos.avance,procesos.estado,procesos.expediente_id,respbrigada.nombres,respbrigada.apellidos,
expediente.expediente_nombre,procesos.inicio,procesos.fin,brigada.brigada_nombre FROM procesos,expediente,respbrigada,brigada WHERE 
expediente.respbrigada_id = '$respbrigada' and procesos.expediente_id='$agr_post' AND 
expediente.expediente_id = procesos.expediente_id 
and respbrigada.respbrigada_id=procesos.respbrigada_id and
respbrigada.brigada_id=brigada.brigada_id");
$num_act = mysql_num_rows($sel_act);
if($num_act == 0)
	{
	echo '<p class="negrita"><center><font color="Navy">'.$id_noagrup.'</font></center></p>';
	}
else
	{
		
	echo '<p class="negrita"><center><font color="Navy">Procesos registrados hasta el momento</font></center></p>
	<table align="center"  class="tabla">';
	echo '<tr class="encab">';
	echo '<td class="tdatos">'.$id_eliminar.'</td>
	<td class="tdatos">EDITAR</td>
	<td class="tdatos">PROCESOS</td>
	<td class="tdatos">RESPONSABLE DEL PROCESO</td>
	<td class="tdatos">FECHA INICIO</td>
	<td class="tdatos">FECHA FIN</td>
	<td class="tdatos">BRIGADA</td>
	<td class="tdatos">AVANCE PROCESO</td>
	<td class="tdatos">ESTADO</td>
	<td class="tdatos">MENSAJE</td>
	<td class="tdatos">HISTÓRICO</td>
	<td class="tdatos">ESTADO</td>';
	echo '</tr>';
	for($b=0;$b<$num_act;$b++)
		{
		$reg_act = mysql_fetch_array($sel_act);	
		echo '<td class="centrado"><a href=reg_procesos.php?accion=elimina&activ_eli='.$reg_act['proceso_id'].'&agrup_eli='.$reg_act['expediente_id'].'><img src="../imgs/borra_peq.png" alt="'.$id_eliminar.'" /></a></td>';
		//ecco'<td class=\"tdatos\"><a href=\"elim_proy.php?expediente_id=".$row["expediente_id"]."\"><img src=../theme/images/user-delete-2.ico></a></td>';
		echo '<td><a href=reg_procesos.php?accion=edita&proceso_id='.$reg_act['proceso_id'].' title="'.$id_editar.'"><img src="../imgs/edita.png" alt="'.$id_editar.'" />
			</a></td>';
			
		echo '<td class=\"cdato\">'.$reg_act['proceso_nombre'].'</td>';
		echo '<td>'.$reg_act['nombres'].' '.$reg_act['apellidos'].'</td>';
		echo '<td>'.$reg_act['inicio'].'</td>';
		echo '<td>'.$reg_act['fin'].'</td>';
		echo '<td>'.$reg_act['brigada_nombre'].'</td>';
		echo '<td>'.$reg_act['avance'].'</td>';
		$avan=$reg_act['avance'];
		$prom[]=($avan);	
		/////////////////// estado /////////////////////////////////////////////////
		if($reg_act['estado']==1)
					{
						echo '<td><img src="../imgs/aprobado.ico"><td>';	
						echo '<font color="#8A0808" >PROCESO ACTIVAO</font>';	
					}
		if($reg_act['estado']==2)
			{
				echo '<td><img src="../imgs/terminar.jpg"><td>';
				echo '<font color="#0B3B17" >PROCESO TERMINADO</font>';	
			}				
			
		if($reg_act['estado']==3)
			{
				echo '<td><img src="../imgs/revisar.ico"><td>';
				echo '<font color="#0B3B17" >EN PROCESO</font>';	
			}							
									
		if($reg_act['estado']==0)
				{
				 echo '<td><img src="../imgs/proceso.ico"><td>';
				 echo '<font color="#0B3B17" >PROCESO INACTIVO</font>';
				}							
										
		if($reg_act['estado']==1)
		{
		 	$date1=date("Y-m-d");
			$date2=$reg_act['fin'];
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
	
				echo "<td>LE FALTA  $dif2 PARA TERMINAR EL PROYECTO</td>"; 
				echo '<td><img src="../imgs/proceso.jpg"><td>';
		
			}
			else 
			{
				echo "<td><font color='#ff0000'><blink>SU TIEMPO A TERMINADO COMUNIQUECE CON EL RESPONSABLE DE BRIGADA</blink></font></td>"; 
				echo '<td><a href=reg_procesos.php?accion=editar&id='.$reg_act['id'].' title="'.$id_editar.'"><img src="../imgs/evaluar.ico" alt="'.$id_editar.'" /></a></td>';
			}
		 }
else 
{
	echo "<td>procesos sin novedades</td>"; 	
	echo '<td><img src="../imgs/clave.png"><font color="#0B3B17" ></font></td>';
}				
							
////////////////////////// fin estado /////////////////////////////////////////
		//echo '<td>'.$reg_act['estado'].'</td>';
		echo '</td>';
		echo '</tr>';
		
		}//fin de for
		$suma_nota_media = array_sum($prom);
		$porcentaje=$suma_nota_media/$num_act;
			if($porcentaje>95)
			{
				$consulta_actualiza = mysql_query("update expediente set avance='$porcentaje' where expediente_id = '$agr_post'");
			echo '<p><font color="#A3000A" ><center>Proyecto terminado '.$porcentaje.' % Terminado ...<img src="../imgs/terminar.jpg"></center></font></p>';
			
			
			
			}
				else 
					{
						$consulta_actualiza = mysql_query("update expediente set avance='$porcentaje' where expediente_id = '$agr_post'");	
					echo '<p><font color="#A3000A" ><center> Porcentaje de Expediente '.$porcentaje.' % En Proceso ...<img src="../imgs/proceso.jpg"></center></font></p>';
					
	
					}		
		
	echo '</table><br />';
	

	}//fin de else (sí que hay actividades registradas)
	
	}
?>

