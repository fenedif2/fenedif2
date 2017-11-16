<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><H6>FORMA ACCESO </H6></div>
<?php
/************************************************************
****************** Eliminar Registros ***********************
************************************************************/
if(strtolower($_POST["del"]) == "eliminar")
{
	$sqldelexp = "delete from formaacceso where formaacceso_id='".(int)$_REQUEST["formaacceso_id"]."'";
	
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
				
			$sql="update formaacceso set formaacceso_nombre=UPPER('".$_REQUEST["formaacceso_nombre"]."') where formaacceso_id='".$_REQUEST["formaacceso_id"]."' ";
			if(mysql_query($sql,$con))
			{
				
					cuadro_mensaje("FORMA ACCESO ACTUALIZAO CORRECTAMENTE...");
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
<form action="act_facceso.php" method="post">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">SELECCIONE CFORMA ACCESO</td>
			<tr>
			<?php
			echo '<td>
				
					<select name="formaacceso_id" id="formaacceso_id" >
					';	
					//listamos grupos para componer el select
					$consulta_uoi = mysql_query("SELECT * FROM formaacceso ORDER BY formaacceso_id");
					$n_uoi = mysql_num_rows($consulta_uoi);
					echo '<option>SELECCIONE FORMA ACCESO</option>';
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['formaacceso_id'].'">'.$reg_consulta_uoi['formaacceso_nombre'].' </option>';
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
if($_REQUEST["formaacceso_id"]!="")
{
$result=mysql_query("select * from formaacceso where formaacceso_id='".quitar($_REQUEST["formaacceso_id"])."' ",$con);
if(mysql_num_rows($result) == 1)
{
$formaacceso_id=mysql_result($result,0,"formaacceso_id");
$formaacceso_nombre=mysql_result($result,0,"formaacceso_nombre");
echo '<br />';
?>

<form name="registro" action="act_facceso.php" method="post" enctype="multipart/form-data">
	
	<table width="650" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS FORMA ACCESO</h3></td>
		</tr>
		<tr>
			<td class="tdatos">CÓDIGO</td>
			<td><input type="text" name="formaacceso_id" readonly="readonly" style="background-color:#F7D358" value="<?php echo $formaacceso_id; ?>" size="60" /></td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE FORMA ACCESO</td>
			<td><input type="text" name="formaacceso_nombre" value="<?php echo $formaacceso_nombre; ?>" size="60" /></td>
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
	cuadro_error("FORMA ACCESO NO ENCONTRADO <b><a href=reg_facceso.php  target=\"_self\">    Ir a Registrar</a></b>");	
}
}
?>

<?php
 echo "<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>
