<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><H6>COBERTURA </H6></div>
<?php
/************************************************************
****************** Eliminar Registros ***********************
************************************************************/
if(strtolower($_POST["del"]) == "eliminar")
{
	$sqldelexp = "delete from cobertura where cobertura_id='".(int)$_REQUEST["cobertura_id"]."'";
	
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
				
			$sql="update cobertura set cobertura_nombre=UPPER('".$_REQUEST["cobertura_nombre"]."') where cobertura_id='".$_REQUEST["cobertura_id"]."' ";
			if(mysql_query($sql,$con))
			{
				
					cuadro_mensaje("COBERTURA ACTUALIZAO CORRECTAMENTE...");
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
<form action="act_cobertura.php" method="post">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">SELECCIONE COBERTURA</td>
			<tr>
			<?php
			echo '<td>
				
					<select name="cobertura_id" id="cobertura_id" >
					';	
					//listamos grupos para componer el select
					$consulta_uoi = mysql_query("SELECT * FROM cobertura ORDER BY cobertura_id");
					$n_uoi = mysql_num_rows($consulta_uoi);
					echo '<option>SELECCIONE COBERTURA</option>';
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['cobertura_id'].'">'.$reg_consulta_uoi['cobertura_nombre'].' </option>';
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
if($_REQUEST["cobertura_id"]!="")
{
$result=mysql_query("select * from cobertura where cobertura_id='".quitar($_REQUEST["cobertura_id"])."' ",$con);
if(mysql_num_rows($result) == 1)
{
$cobertura_id=mysql_result($result,0,"cobertura_id");
$cobertura_nombre=mysql_result($result,0,"cobertura_nombre");
echo '<br />';
?>

<form name="registro" action="act_cobertura.php" method="post" enctype="multipart/form-data">
	
	<table width="650" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS COBERTURA</h3></td>
		</tr>
		<tr>
			<td class="tdatos">CÓDIGO</td>
			<td><input type="text" name="cobertura_id" readonly="readonly" style="background-color:#F7D358" value="<?php echo $cobertura_id; ?>" size="60" /></td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE COBERTURA</td>
			<td><input type="text" name="cobertura_nombre" value="<?php echo $cobertura_nombre; ?>" size="60" /></td>
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
	cuadro_error("COBERTURA NO ENCONTRADO <b><a href=reg_cobertura.php  target=\"_self\">    Ir a Registrar</a></b>");	
}
}
?>

<?php
 echo "<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>
