<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><H6>ACTUALIZAR DATOS USUARIO</H6></div>
<?php
/************************************************************
****************** Eliminar Registros ***********************
************************************************************/
if(strtolower($_POST["del"]) == "eliminar")
{
	$sqldelexp = "delete from usuario where usuario_id='".$_REQUEST["usuario_id"]."'";
	
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
				
			$sql="update usuario set usuario_nombres=UPPER('".$_REQUEST["usuario_nombres"]."'),usuario_apellidos=UPPER('".$_REQUEST["usuario_apellidos"]."'),
			usuario_correo=UPPER('".$_REQUEST["usuario_correo"]."'),tipousuario_id=UPPER('".$_REQUEST["tipousuario_id"]."'),
			sucursal=UPPER('".$_REQUEST["sucursal"]."'),estusucodigo=UPPER('".$_REQUEST["estusucodigo"]."'),usuario_estado=UPPER('".$_REQUEST["usuario_estado"]."')
			where usuario_id='".$_REQUEST["usuario_id"]."' ";
			if(mysql_query($sql,$con))
			{
					cuadro_mensaje("USUARIO ACTUALIZADO CORRECTAMENTE...");
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
<form action="act_usuario.php" method="post">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">SELECCIONE USUARIO</td>
			<tr>
			<?php
			echo '<td>
				
					<select name="usuario" id="usuario" >
					';	
					//listamos grupos para componer el select
					$consulta_uoi = mysql_query("SELECT * FROM usuario ORDER BY usuario_apellidos");
					$n_uoi = mysql_num_rows($consulta_uoi);
					echo '<option>SELECCIONE USUARIO</option>';
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['usuario_id'].'">'.$reg_consulta_uoi['usuario_apellidos'].'  '.$reg_consulta_uoi['usuario_nombres'].'  </option>';
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
if($_REQUEST["usuario"]!="")
{
$result=mysql_query("select * from usuario where usuario_id='".quitar($_REQUEST["usuario"])."' ",$con);
if(mysql_num_rows($result) == 1)
{
$usuario_id=mysql_result($result,0,"usuario_id");
$usuario_cedula=mysql_result($result,0,"usuario_cedula");
$usuario_password=mysql_result($result,0,"usuario_password");
$usuario_nombres=mysql_result($result,0,"usuario_nombres");
$usuario_apellidos=mysql_result($result,0,"usuario_apellidos");
$usuario_correo=mysql_result($result,0,"usuario_correo");
$tipousuario_id=mysql_result($result,0,"tipousuario_id");
$sucursal=mysql_result($result,0,"sucursal");
$estusucodigo=mysql_result($result,0,"estusucodigo");
$usuario_estado=mysql_result($result,0,"usuario_estado");
echo '<br />';
?>

<form name="registro" action="act_usuario.php" method="post" enctype="multipart/form-data">
	
	<table width="650" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS DEL TIPO DE COORDINADOR</h3></td>
		</tr>
		<tr>
			<td class="tdatos">ID</td>
			<td><input type="text" name="usuario_id" readonly="readonly" style="background-color:#F7D358" value="<?php echo $usuario_id; ?>" size="60" /></td>
		</tr>	
		<tr>
			<td class="tdatos">CÉDULA</td>
			<td><input type="text" name="usuario_cedula" readonly="readonly" style="background-color:#F7D358" value="<?php echo $usuario_cedula; ?>" size="60" /></td>
		</tr>	
		<tr>
			<td class="tdatos">NOMBRES</td>
			<td><input type="text" name="usuario_nombres" value="<?php echo $usuario_nombres; ?>" size="60" /></td>
		</tr>
		<tr>
			<td class="tdatos">APELLIDOS</td>
			<td><input type="text" name="usuario_apellidos" value="<?php echo $usuario_apellidos; ?>" size="60" /></td>
		</tr>	
		<tr>
			<td class="tdatos">CORREO</td>
			<td class="dtabla"><input type="text" name="usuario_correo" value="<?php echo $usuario_correo ?>" size="40" /></td>
		</tr>
		<tr>
			<td class="tdatos">TIPO USUARIO</td>
			<?php
			echo '<td>
				
					<select name="tipousuario_id" id="tipousuario_id" >';
					$consulta_uoi = mysql_query("SELECT * FROM tipousuario where tipousuario_id ='$tipousuario_id='");
					$n_uoi = mysql_num_rows($consulta_uoi);
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['tipousuario_id'].'">'.$reg_consulta_uoi['tipousuario_nombre'].' </option>';
					$consulta_uoi = mysql_query("SELECT * FROM tipousuario ORDER BY tipousuario_id");
					$n_uoi = mysql_num_rows($consulta_uoi);
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['tipousuario_id'].'">'.$reg_consulta_uoi['tipousuario_nombre'].' </option>';
					}
				echo '	
				</select>
			
			</td>';
			?>
		</tr>
		
		<tr>
			<td class="tdatos">SUCURSAL</td>
			<?php
			echo '<td>
				
					<select name="sucursal" id="sucursal" >';
					$consulta_uoi = mysql_query("SELECT * FROM sucursal where sucursal_id ='$sucursal'");
					$n_uoi = mysql_num_rows($consulta_uoi);
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['sucursal_id'].'">'.$reg_consulta_uoi['sucursal_nombre'].' </option>';
					$consulta_uoi = mysql_query("SELECT * FROM sucursal ORDER BY sucursal_id");
					$n_uoi = mysql_num_rows($consulta_uoi);
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['sucursal_id'].'">'.$reg_consulta_uoi['sucursal_nombre'].' </option>';
					}
				echo '	
				</select>
			
			</td>';
			?>
		</tr>
		<tr>
			<td class="tdatos">ESTADO USUARIO</td>
			<?php
			echo '<td>
				
					<select name="estusucodigo" id="estusucodigo" >';
					$consulta_for = mysql_query("SELECT * FROM testadousuario where estusucodigo='$estusucodigo'");
					$reg_consulta_for = mysql_fetch_array($consulta_for);
					echo '<option value="'.$reg_consulta_for['estusucodigo'].'">'.$reg_consulta_for['estusudescripcion'].' </option>';
					$consulta_uoi = mysql_query("SELECT * FROM testadousuario ORDER BY estusucodigo");
					$n_uoi = mysql_num_rows($consulta_uoi);
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['estusucodigo'].'">'.$reg_consulta_uoi['estusudescripcion'].' </option>';
					}
				echo '	
				</select>
			
			</td>';
			?>
		</tr>
		<tr>
			<td class="tdatos">ESTADO USUARIO CONEXION</td>
			<?php
			echo '<td>
				
					<select name="usuario_estado" id="usuario_estado" >';
					$consulta_for = mysql_query("SELECT * FROM usuario_estado where conexion_id='$usuario_estado'");
					$reg_consulta_for = mysql_fetch_array($consulta_for);
					echo '<option value="'.$reg_consulta_for['conexion_id'].'">'.$reg_consulta_for['conexion_nombre'].' </option>';
					$consulta_uoi = mysql_query("SELECT * FROM usuario_estado ORDER BY conexion_id");
					$n_uoi = mysql_num_rows($consulta_uoi);
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['conexion_id'].'">'.$reg_consulta_uoi['conexion_nombre'].' </option>';
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
	cuadro_error("TIPO DE COORDINADOR No Encontrado <b><a href=reg_unes.php  target=\"_self\">    Ir a Registrar</a></b>");	
}
}
?>

<?php
 echo "<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>
