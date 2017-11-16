<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><H5>ACTUALIZAR GÉNERO</H5></div>
<?php
/************************************************************
****************** Eliminar Registros ***********************
************************************************************/
if(strtolower($_POST["del"]) == "eliminar")
{
	$sqldelexp = "delete from genero where genero_id='".(int)$_REQUEST["genero_id"]."'";
	
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
				
			$sql="update genero set genero_nombre=UPPER('".$_REQUEST["genero_nombre"]."') where genero_id='".$_REQUEST["genero_id"]."' ";
			if(mysql_query($sql,$con))
			{
				
					cuadro_mensaje("Tipo de Género actualizado correctamente...");
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
<form action="act_genero.php" method="post">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">Seleccione el tipo de Género</td>
			<tr>
			<?php
			echo '<td>
				
					<select name="genero_id" id="genero_id" >
					';	
					//listamos grupos para componer el select
					$consulta_uoi = mysql_query("SELECT * FROM genero ORDER BY genero_nombre");
					$n_uoi = mysql_num_rows($consulta_uoi);
					echo '<option>SELECCIONE GÉNERO</option>';
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['genero_id'].'">'.$reg_consulta_uoi['genero_nombre'].' </option>';
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
if($_REQUEST["genero_id"]!="")
{
$result=mysql_query("select * from genero where genero_id='".quitar($_REQUEST["genero_id"])."' ",$con);
if(mysql_num_rows($result) == 1)
{
$genero_id=mysql_result($result,0,"genero_id");
$genero_nombre=mysql_result($result,0,"genero_nombre");
echo '<br />';
?>

<form name="registro" action="act_genero.php" method="post" enctype="multipart/form-data">
	
	<table width="650" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS DEL TIPO DE GENERO</h3></td>
		</tr>
		<tr>
			<td class="tdatos">Codigo</td>
			<td><input type="text" name="genero_id" readonly="readonly" style="background-color:#F7D358" value="<?php echo $genero_id; ?>" size="60" /></td>
		</tr>
		<tr>
			<td class="tdatos">Nombre del tipo de Género</td>
			<td><input type="text" name="genero_nombre" value="<?php echo $genero_nombre; ?>" size="60" /></td>
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
	cuadro_error("Tipo de Género No Encontrado <b><a href=reg_uoi.php  target=\"_self\">    Ir a Registrar</a></b>");	
}
}
?>

<?php
 echo "<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>
