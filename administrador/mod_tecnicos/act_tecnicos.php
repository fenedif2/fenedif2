<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><H6>ACTUALIZAR DATOS TÉCNICO </H6></div>
<?php
/************************************************************
****************** Eliminar Registros ***********************
************************************************************/
if(strtolower($_POST["del"]) == "eliminar")
{
	$sqldelexp = "delete from tecnico where tecnico_id='".$_REQUEST["tecnico_id"]."'";
	
	if(  mysql_query($sqldelexp, $con)  )
	{
			cuadro_mensaje("Datos Eliminados Correctamente...");
			 			echo "<br><br><br><br><br>";
						require("../theme/footer_inicio.php");
						exit;
			
	}
	
}

/************************************************************
****************** Editar Registros ***********************
************************************************************/
if (strtolower($_REQUEST["acc"])=="guardar")
{
				
			$sql="update tecnico set tecnico_nombres=UPPER('".$_REQUEST["tecnico_nombres"]."'),tecnico_apellidos=UPPER('".$_REQUEST["tecnico_apellidos"]."'),
			ttecnico_id=UPPER('".$_REQUEST["ttecnico"]."'),profesion=UPPER('".$_REQUEST["profesion"]."'),
			brigada_id=UPPER('".$_REQUEST["brigada"]."'),cargo=UPPER('".$_REQUEST["cargo"]."') where tecnico_id='".$_REQUEST["tecnico_id"]."' ";
			if(mysql_query($sql,$con))
			{
					cuadro_mensaje("Técnico actualizado correctamente...");
					 echo "<br><br><br><br><br>";
					require("../theme/footer_inicio.php");
					exit;
						
			}
			else
			{
			cuadro_error(mysql_error());
			}
		//////////////

		
}

?>
<form action="act_tecnicos.php" method="post">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">SELECCIONAR TÉCNICO</td>
			<tr>
			<?php
			echo '<td>
				
					<select name="tecnico_id" id="tecnico_id" >
					';	
					//listamos grupos para componer el select
					$consulta_uoi = mysql_query("SELECT * FROM tecnico ORDER BY tecnico_apellidos");
					$n_uoi = mysql_num_rows($consulta_uoi);
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['tecnico_id'].'">'.$reg_consulta_uoi['tecnico_apellidos'].'  '.$reg_consulta_uoi['tecnico_nombres'].'  </option>';
					}
				echo '	
				</select>
			
			</td>';
			?>
			<td><input type="submit" value="Buscar"></td>
			</tr>
		</tr>
	</table>
</form>
<?php
//busqueda en la base de datos
if($_REQUEST["tecnico_id"]!="")
{
$result=mysql_query("select * from tecnico where tecnico_id='".quitar($_REQUEST["tecnico_id"])."' ",$con);
if(mysql_num_rows($result) == 1)
{
$tecnico_id=mysql_result($result,0,"tecnico_id");
$tecnico_nombres=mysql_result($result,0,"tecnico_nombres");
$tecnico_apellidos=mysql_result($result,0,"tecnico_apellidos");
$ttecnico=mysql_result($result,0,"ttecnico_id");
$profesion=mysql_result($result,0,"profesion");
$brigada=mysql_result($result,0,"brigada_id");
$cargo=mysql_result($result,0,"cargo");
echo '<br />';
?>

<form name="registro" action="act_tecnicos.php" method="post" enctype="multipart/form-data">
	
	<table width="650" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS DEL TÉCNICO</h3></td>
		</tr>
		<tr>
			<td class="tdatos">CÉDULA/LOGIN</td>
			<td><input type="text" name="tecnico_id" readonly="readonly" value="<?php echo $tecnico_id; ?>" size="60" /></td>
		</tr>	
		<tr>
			<td class="tdatos">NOMBRES</td>
			<td><input type="text" name="tecnico_nombres" value="<?php echo $tecnico_nombres; ?>" size="60" /></td>
		</tr>
		<tr>
			<td class="tdatos">APELLIDOS</td>
			<td><input type="text" name="tecnico_apellidos" value="<?php echo $tecnico_apellidos; ?>" size="60" /></td>
		</tr>	
		<tr>
			<td class="tdatos">TIPO TÉCNICO</td>
			<?php
			echo '<td>
				
					<select name="ttecnico" id="ttecnico" >';
					$consulta_uoi = mysql_query("SELECT * FROM ttecnico where ttecnico_id ='$ttecnico'");
					$n_uoi = mysql_num_rows($consulta_uoi);
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['ttecnico_id'].'">'.$reg_consulta_uoi['ttecnico_nombre'].' </option>';
					$consulta_uoi = mysql_query("SELECT * FROM ttecnico ORDER BY ttecnico_nombre");
					$n_uoi = mysql_num_rows($consulta_uoi);
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['ttecnico_id'].'">'.$reg_consulta_uoi['ttecnico_nombre'].' </option>';
					}
				echo '	
				</select>
			
			</td>';
			?>
		</tr>
		<tr>
			<td class="tdatos">PROFESIÓN</td>
			<td class="dtabla"><input type="text" name="profesion" value="<?php echo $profesion ?>" size="40" /></td>
		</tr>	
		<tr>
		<td class="tdatos">BRIGADA</td>
			<?php
			echo '<td>
				
					<select name="brigada" id="brigada" >';
					$consulta_for = mysql_query("SELECT * FROM brigada where brigada_id='$brigada'");
					$reg_consulta_for = mysql_fetch_array($consulta_for);
					echo '<option value="'.$reg_consulta_for['brigada_id'].'">'.$reg_consulta_for['brigada_nombre'].' </option>';
					$consulta_uoi = mysql_query("SELECT * FROM brigada ORDER BY brigada_nombre");
					$n_uoi = mysql_num_rows($consulta_uoi);
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['brigada_id'].'">'.$reg_consulta_uoi['brigada_nombre'].' </option>';
					}
				echo '	
				</select>
			
			</td>';
			?>
		</tr>
		<tr>
			<td class="tdatos">CARGO</td>
			<td class="dtabla"><input type="text" name="cargo" value="<?php echo $cargo ?>" size="40" /></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="acc" value="Guardar">    
			&nbsp; 
		<input type="submit" name="del" value="Eliminar" onclick="confirmation();"></td>
		</tr>
	</table>
</form>
<?php
}else{
	echo "<br>";
	cuadro_error("TIPO DE COORDINADOR No Encontrado <b><a href=reg_unes.php  target=\"_self\">    Ir a Registrar</a></b>");	
}
}
?>

<?php
 echo "<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>
