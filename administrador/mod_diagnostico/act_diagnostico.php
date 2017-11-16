<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><H6>ACTUALIZAR DIAGNOSTICO </H6></div>
<?php
/************************************************************
****************** Eliminar Registros ***********************
************************************************************/
if(strtolower($_POST["del"]) == "eliminar")
{
	$sqldelexp = "delete from tdiagnostico where tdiagnostico_id='".(int)$_REQUEST["tdiagnostico_id"]."'";
	
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
				
			$sql="update tdiagnostico set tdiagnostico_descripcion=UPPER('".$_REQUEST["tdiagnostico_descripcion"]."') where tdiagnostico_id='".$_REQUEST["tdiagnostico_id"]."' ";
			if(mysql_query($sql,$con))
			{
				
					cuadro_mensaje("DIAGNOSTICO actualizado correctamente...");
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
<form action="act_diagnostico.php" method="post">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">Seleccione el DIAGNOSTICO</td>
			<tr>
			<?php
			echo '<td>
				
					<select name="tdiagnostico_id" id="tdiagnostico_id" >
					';	
					//listamos grupos para componer el select
					$consulta_uoi = mysql_query("SELECT * FROM tdiagnostico ORDER BY tdiagnostico_descripcion");
					$n_uoi = mysql_num_rows($consulta_uoi);
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['tdiagnostico_id'].'">'.$reg_consulta_uoi['tdiagnostico_descripcion'].' </option>';
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
if($_REQUEST["tdiagnostico_id"]!="")
{
$result=mysql_query("select * from tdiagnostico where tdiagnostico_id='".quitar($_REQUEST["tdiagnostico_id"])."' ",$con);
if(mysql_num_rows($result) == 1)
{
$tdiagnostico_id=mysql_result($result,0,"tdiagnostico_id");
$tdiagnostico_descripcion=mysql_result($result,0,"tdiagnostico_descripcion");
echo '<br />';
?>

<form name="registro" action="act_diagnostico.php" method="post" enctype="multipart/form-data">
	
	<table width="650" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS DEL DIAGNOSTICO</h3></td>
		</tr>
		<tr>
			<td class="tdatos">Codigo</td>
			<td><input type="text" name="tdiagnostico_id" readonly="readonly" value="<?php echo $tdiagnostico_id; ?>" size="60" /></td>
		</tr>
		<tr>
			<td class="tdatos">Nombre del DIAGNOSTICO</td>
			<td><input type="text" name="tdiagnostico_descripcion" value="<?php echo $tdiagnostico_descripcion; ?>" size="60" /></td>
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
	cuadro_error("DIAGNOSTICO No Encontrado <b><a href=reg_diagnostico.php  target=\"_self\">    Ir a Registrar</a></b>");	
}
}
?>

<?php
 echo "<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>
