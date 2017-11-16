<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><H6>TIPO LICENCIA </H6></div>
<?php
/************************************************************
****************** Eliminar Registros ***********************
************************************************************/
if(strtolower($_POST["del"]) == "eliminar")
{
	$sqldelexp = "delete from tipolicencia where tipolicencia_id='".(int)$_REQUEST["tipolicencia_id"]."'";
	
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
				
			$sql="update tipolicencia set tipolicencia_nombre=UPPER('".$_REQUEST["tipolicencia_nombre"]."') where tipolicencia_id='".$_REQUEST["tipolicencia_id"]."' ";
			if(mysql_query($sql,$con))
			{
				
					cuadro_mensaje("TIPO LICENCIA ACTUALIZAO CORRECTAMENTE...");
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
<form action="act_tlicencia.php" method="post">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">SELECCIONE TIPO LICENCIA</td>
			<tr>
			<?php
			echo '<td>
				
					<select name="tipolicencia_id" id="tipolicencia_id" >
					';	
					//listamos grupos para componer el select
					$consulta_uoi = mysql_query("SELECT * FROM tipolicencia ORDER BY tipolicencia_id");
					$n_uoi = mysql_num_rows($consulta_uoi);
					echo '<option>SELECCIONE TIPO LICENCIA</option>';
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['tipolicencia_id'].'">'.$reg_consulta_uoi['tipolicencia_nombre'].' </option>';
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
if($_REQUEST["tipolicencia_id"]!="")
{
$result=mysql_query("select * from tipolicencia where tipolicencia_id='".quitar($_REQUEST["tipolicencia_id"])."' ",$con);
if(mysql_num_rows($result) == 1)
{
$tipolicencia_id=mysql_result($result,0,"tipolicencia_id");
$tipolicencia_nombre=mysql_result($result,0,"tipolicencia_nombre");
echo '<br />';
?>

<form name="registro" action="act_tlicencia.php" method="post" enctype="multipart/form-data">
	
	<table width="650" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS TIPO LICENCIA</h3></td>
		</tr>
		<tr>
			<td class="tdatos">CÓDIGO</td>
			<td><input type="text" name="tipolicencia_id" readonly="readonly" style="background-color:#F7D358" value="<?php echo $tipolicencia_id; ?>" size="60" /></td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE TIPO LICENCIA</td>
			<td><input type="text" name="tipolicencia_nombre" value="<?php echo $tipolicencia_nombre; ?>" size="60" /></td>
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
	cuadro_error("TIPO LICENCIA NO ENCONTRADO <b><a href=reg_tlicencia  target=\"_self\">    Ir a Registrar</a></b>");	
}
}
?>

<?php
 echo "<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>
