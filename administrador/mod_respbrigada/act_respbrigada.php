<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><H6>ACTUALIZAR DATOS DEL RESPONSABLE DEL BRIGADA</H6></div>
<?php
/************************************************************
****************** Eliminar Registros ***********************
************************************************************/
if(strtolower($_POST["del"]) == "eliminar")
{
	$sqldelexp = "delete from respbrigada where respbrigada_cedula='".$_REQUEST["respbrigada_cedula"]."'";
	
	if(  mysql_query($sqldelexp, $con)  )
	{
			cuadro_mensaje("Datos Eliminados Correctamente...");
			 			echo "<br><br><br><br><br>";
						require("../theme/header_inicio.php");
						exit;
			
	}
	
}

/************************************************************
****************** Editar Registros ***********************
************************************************************/
if (strtolower($_REQUEST["acc"])=="guardar")
{
			$doc_cla=$_REQUEST["clave"];	
			$doc_cla_crip = crypt($doc_cla,'crackmaster');
			$sql="update respbrigada set clave='".$doc_cla_crip."',nombres=UPPER('".$_REQUEST["nombres"]."'),apellidos=UPPER('".$_REQUEST["apellidos"]."'),
			email=UPPER('".$_REQUEST["email"]."'),brigada_id=UPPER('".$_REQUEST["brigada"]."'),telefono=UPPER('".$_REQUEST["telefono"]."'),
			profesion=UPPER('".$_REQUEST["profesion"]."'),rol=UPPER('".$_REQUEST["rol"]."') 
			where respbrigada_cedula='".$_REQUEST["respbrigada_cedula"]."'";
			if(mysql_query($sql,$con))
			{
					cuadro_mensaje("Responsable de Brigada actualizado correctamente...");
					 echo "<br><br><br><br><br>";
					
					exit;
						
			}
			else
			{
			cuadro_error(mysql_error());
			}
		//////////////

		
}

?>
<form action="act_respbrigada.php" method="post">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">SELECCIONE EL RESPONSABLE DE BRIGADA</td>
			<tr>
			<?php
			echo '<td>
				
					<select name="respbrigada" id="respbrigada" >
					';	
					//listamos grupos para componer el select
					$consulta_uoi = mysql_query("SELECT * FROM respbrigada ORDER BY apellidos");
					$n_uoi = mysql_num_rows($consulta_uoi);
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['respbrigada_cedula'].'">'.$reg_consulta_uoi['apellidos'].'  '.$reg_consulta_uoi['nombres'].'  </option>';
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
if($_REQUEST["respbrigada"]!="")
{
$result=mysql_query("select * from respbrigada where respbrigada_cedula='".quitar($_REQUEST["respbrigada"])."' ",$con);
if(mysql_num_rows($result) == 1)
{
$respbrigada_cedula=mysql_result($result,0,"respbrigada_cedula");
$clave=mysql_result($result,0,"clave");
$nombres=mysql_result($result,0,"nombres");
$apellidos=mysql_result($result,0,"apellidos");
$email=mysql_result($result,0,"email");
$brigada=mysql_result($result,0,"brigada_id");
$telefono=mysql_result($result,0,"telefono");
$profesion=mysql_result($result,0,"profesion");
$tfuncionario=mysql_result($result,0,"tfuncionario_id");
$tcontrato=mysql_result($result,0,"tcontrato_id");
$rol=mysql_result($result,0,"rol");
echo '<br />';
?>

<form name="registro" action="act_respbrigada.php" method="post" enctype="multipart/form-data">
	
	<table width="650" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS DEL RESPONSABLE DE BRIGADA</h3></td>
		</tr>
		<tr>
			<td class="tdatos">CÉDULA</td>
			<td><input type="text" name="respbrigada_cedula" readonly="readonly" value="<?php echo $respbrigada_cedula; ?>" size="60" /></td>
		</tr>	
		<tr>
			<td class="tdatos">CLAVE</td>
			<td><input type="password" name="clave" value="<?php echo $clave ?>" size="45"></td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRES</td>
			<td><input type="text" name="nombres" value="<?php echo $nombres; ?>" size="60" /></td>
		</tr>
		<tr>
			<td class="tdatos">APELLIDOS</td>
			<td><input type="text" name="apellidos" value="<?php echo $apellidos; ?>" size="60" /></td>
		</tr>	
		<tr>
			<td class="tdatos">EMAIL</td>
			<td class="dtabla"><input type="text" name="email" value="<?php echo $email ?>" size="40" /></td>
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
			<td class="tdatos">TELEFONO</td>
			<td class="dtabla"><input type="text" name="telefono" value="<?php echo $telefono ?>" size="40" /></td>
		</tr>
		<tr>
			<td class="tdatos">PROFESION</td>
			<td class="dtabla"><input type="text" name="profesion" value="<?php echo $profesion ?>" size="40" /></td>
		</tr>
		<tr>
			<td class="tdatos">TIPO USUARIO</td>
			<?php
			echo '<td>
				
					<select name="rol" id="rol" >';
					$consulta_uoi = mysql_query("SELECT * FROM rol where rol_id ='$rol'");
					$n_uoi = mysql_num_rows($consulta_uoi);
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['rol_id'].'">'.$reg_consulta_uoi['rol_nombre'].' </option>';
					$consulta_uoi = mysql_query("SELECT * FROM rol ORDER BY rol_nombre");
					$n_uoi = mysql_num_rows($consulta_uoi);
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['rol_id'].'">'.$reg_consulta_uoi['rol_nombre'].' </option>';
					}
				echo '	
				</select>
			
			</td>';
			?>
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
	cuadro_error("Responsable de Brigada no Encontrado<b><a href=reg_respbrigada.php  target=\"_self\">    Ir a Registrar</a></b>");	
}
}
?>

<?php
 echo "<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>
