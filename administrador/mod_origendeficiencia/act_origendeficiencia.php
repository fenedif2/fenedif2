<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><H6>ORIGEN DEFICIENCIA </H6></div>
<?php
/************************************************************
****************** Eliminar Registros ***********************
************************************************************/
if(strtolower($_POST["del"]) == "eliminar")
{
	$sqldelexp = "delete from origendeficiencia where origendeficiencia_id='".(int)$_REQUEST["origendeficiencia_id"]."'";
	
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
				
			$sql="update origendeficiencia set origendeficiencia_nombre=UPPER('".$_REQUEST["origendeficiencia_nombre"]."') where origendeficiencia_id='".$_REQUEST["origendeficiencia_id"]."' ";
			if(mysql_query($sql,$con))
			{
				
					cuadro_mensaje("ORIGEN DEFICIENCIA ACTUALIZAO CORRECTAMENTE...");
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
<form action="act_origendeficiencia.php" method="post">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">SELECCIONE CORIGEN DEFICIENCIA</td>
			<tr>
			<?php
			echo '<td>
				
					<select name="origendeficiencia_id" id="origendeficiencia_id" >
					';	
					//listamos grupos para componer el select
					$consulta_uoi = mysql_query("SELECT * FROM origendeficiencia ORDER BY origendeficiencia_id");
					$n_uoi = mysql_num_rows($consulta_uoi);
					echo '<option>SELECCIONE ORIGEN DEFICIENCIA</option>';
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['origendeficiencia_id'].'">'.$reg_consulta_uoi['origendeficiencia_nombre'].' </option>';
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
if($_REQUEST["origendeficiencia_id"]!="")
{
$result=mysql_query("select * from origendeficiencia where origendeficiencia_id='".quitar($_REQUEST["origendeficiencia_id"])."' ",$con);
if(mysql_num_rows($result) == 1)
{
$origendeficiencia_id=mysql_result($result,0,"origendeficiencia_id");
$origendeficiencia_nombre=mysql_result($result,0,"origendeficiencia_nombre");
echo '<br />';
?>

<form name="registro" action="act_origendeficiencia.php" method="post" enctype="multipart/form-data">
	
	<table width="650" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS ORIGEN DEFICIENCIA</h3></td>
		</tr>
		<tr>
			<td class="tdatos">CÓDIGO</td>
			<td><input type="text" name="origendeficiencia_id" readonly="readonly" style="background-color:#F7D358" value="<?php echo $origendeficiencia_id; ?>" size="60" /></td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE ORIGEN DEFICIENCIA</td>
			<td><input type="text" name="origendeficiencia_nombre" value="<?php echo $origendeficiencia_nombre; ?>" size="60" /></td>
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
	cuadro_error("ORIGEN DEFICIENCIA NO ENCONTRADO <b><a href=reg_origendeficiencia.php  target=\"_self\">    Ir a Registrar</a></b>");	
}
}
?>

<?php
 echo "<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>
