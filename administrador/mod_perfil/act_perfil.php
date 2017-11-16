<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<div class="titulo"><h5>ACTUALIZAR PERFIL</h5></div>
<?php
/************************************************************
****************** Eliminar Registros ***********************
************************************************************/
if(strtolower($_POST["del"]) == "eliminar")
{
	$sqldelexp = "delete from tipousuario where tipousuario_id='".(int)$_REQUEST["tipousuario_id"]."'";
	
	if(  mysql_query($sqldelexp,$con)  )
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
				
			$sql="update tipousuario set tipousuario_nombre=UPPER('".$_REQUEST["tipousuario_nombre"]."') where tipousuario_id='".$_REQUEST["tipousuario_id"]."' ";
			if(mysql_query($sql,$con))
			{
				
					cuadro_mensaje("Perfil actualizado correctamente...");
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
<form action="act_perfil.php" method="post">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">SELECCIONE EL NOMBRE DEL PERFIL</td>
			<tr>
			<?php
			echo '<td>
				   
					<select name="tipousuario_id" id="tipousuario_id" >
					';	
					//listamos grupos para componer el select
					$consulta_uoi = mysql_query("SELECT * FROM tipousuario ORDER BY tipousuario_id");
					$n_uoi = mysql_num_rows($consulta_uoi);
					echo '<option>SELECCIONE UN PERFIL</option>';
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['tipousuario_id'].'">'.$reg_consulta_uoi['tipousuario_nombre'].' </option>';
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
if($_REQUEST["tipousuario_id"]!="")
{
$result=mysql_query("select * from tipousuario where tipousuario_id='".quitar($_REQUEST["tipousuario_id"])."' ",$con);
if(mysql_num_rows($result) == 1)
{
$tipousuario_id=mysql_result($result,0,"tipousuario_id");
$tipousuario_nombre=mysql_result($result,0,"tipousuario_nombre");
echo '<br />';
?>

<form name="registro" action="act_perfil.php" method="post" enctype="multipart/form-data">
	
	<table width="650" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS DEL PERFIL</h3></td>
		</tr>
		<tr>
			<td class="tdatos">Código</td>
			<td><input type="text" name="tipousuario_id" readonly="readonly" style="background-color:#F7D358" value="<?php echo $tipousuario_id; ?>" size="60" /></td>
		</tr>
		<tr>
			<td class="tdatos">Nombre del Perfil</td>
			<td><input type="text" name="tipousuario_nombre" value="<?php echo $tipousuario_nombre; ?>" size="60" /></td>
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
	cuadro_error("Perfil No Encontrado <b><a href=reg_perfil.php  target=\"_self\">Ir a Registrar</a></b>");	
}
}
?>

<?php
 echo "<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>
