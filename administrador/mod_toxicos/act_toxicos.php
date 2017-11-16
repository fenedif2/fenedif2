<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><H6>ACTUALIZAR TÓXICOS </H6></div>
<?php
/************************************************************
****************** Eliminar Registros ***********************
************************************************************/
if(strtolower($_POST["del"]) == "eliminar")
{
	$sqldelexp = "delete from tcondicionesa where tcondicionesa_id='".(int)$_REQUEST["tcondicionesa_id"]."'";
	
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
				
			$sql="update tcondicionesa set tcondicionesa_descripcion=UPPER('".$_REQUEST["tcondicionesa_descripcion"]."') where tcondicionesa_id='".$_REQUEST["tcondicionesa_id"]."' ";
			if(mysql_query($sql,$con))
			{
				
					cuadro_mensaje("TÓXICOS ACTUALIZAO CORRECTAMENTE...");
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
<form action="act_toxicos.php" method="post">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">SELECCIONE TÓXICO</td>
			<tr>
			<?php
			echo '<td>
				
					<select name="tcondicionesa_id" id="tcondicionesa_id" >
					';	
					//listamos grupos para componer el select
					$consulta_uoi = mysql_query("SELECT * FROM tcondicionesa ORDER BY tcondicionesa_descripcion");
					$n_uoi = mysql_num_rows($consulta_uoi);
					echo '<option>SELECCIONE TÓXICO</option>';
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['tcondicionesa_id'].'">'.$reg_consulta_uoi['tcondicionesa_descripcion'].' </option>';
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
if($_REQUEST["tcondicionesa_id"]!="")
{
$result=mysql_query("select * from tcondicionesa where tcondicionesa_id='".quitar($_REQUEST["tcondicionesa_id"])."' ",$con);
if(mysql_num_rows($result) == 1)
{
$tcondicionesa_id=mysql_result($result,0,"tcondicionesa_id");
$tcondicionesa_descripcion=mysql_result($result,0,"tcondicionesa_descripcion");
echo '<br />';
?>

<form name="registro" action="act_toxicos.php" method="post" enctype="multipart/form-data">
	
	<table width="650" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS TÓXICO</h3></td>
		</tr>
		<tr>
			<td class="tdatos">Código</td>
			<td><input type="text" name="tcondicionesa_id" readonly="readonly" style="background-color:#F7D358" value="<?php echo $tcondicionesa_id; ?>" size="60" /></td>
		</tr>
		<tr>
			<td class="tdatos">Nombre Tóxico</td>
			<td><input type="text" name="tcondicionesa_descripcion" value="<?php echo $tcondicionesa_descripcion; ?>" size="60" /></td>
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
	cuadro_error("TÓXICOS No Encontrado <b><a href=reg_toxicos.php  target=\"_self\">    Ir a Registrar</a></b>");	
}
}
?>

<?php
 echo "<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>
