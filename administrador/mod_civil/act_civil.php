<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><H6>ACTUALIZAR ESTADO CIVIL </H6></div>
<?php
/************************************************************
****************** Eliminar Registros ***********************
************************************************************/
if(strtolower($_POST["del"]) == "eliminar")
{
	$sqldelexp = "delete from tcivil where tcivil_id='".(int)$_REQUEST["tcivil_id"]."'";
	
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
				
			$sql="update tcivil set tcivil_descripcion=UPPER('".$_REQUEST["tcivil_descripcion"]."') where tcivil_id='".$_REQUEST["tcivil_id"]."' ";
			if(mysql_query($sql,$con))
			{
				
					cuadro_mensaje("Estado Civil actualizado correctamente...");
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
<form action="act_civil.php" method="post">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">Seleccione el Estado Civil</td>
			<tr>
			<?php
			echo '<td>
				
					<select name="tcivil_id" id="tcivil_id" >
					';	
					//listamos grupos para componer el select
					$consulta_uoi = mysql_query("SELECT * FROM tcivil ORDER BY tcivil_descripcion");
					$n_uoi = mysql_num_rows($consulta_uoi);
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['tcivil_id'].'">'.$reg_consulta_uoi['tcivil_descripcion'].' </option>';
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
if($_REQUEST["tcivil_id"]!="")
{
$result=mysql_query("select * from tcivil where tcivil_id='".quitar($_REQUEST["tcivil_id"])."' ",$con);
if(mysql_num_rows($result) == 1)
{
$tcivil_id=mysql_result($result,0,"tcivil_id");
$tcivil_descripcion=mysql_result($result,0,"tcivil_descripcion");
echo '<br />';
?>

<form name="registro" action="act_civil.php" method="post" enctype="multipart/form-data">
	
	<table width="650" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS DEL ESTADO CIVIL</h3></td>
		</tr>
		<tr>
			<td class="tdatos">Codigo</td>
			<td><input type="text" name="tcivil_id" readonly="readonly" value="<?php echo $tcivil_id; ?>" size="60" /></td>
		</tr>
		<tr>
			<td class="tdatos">Nombre del Estado Civil</td>
			<td><input type="text" name="tcivil_descripcion" value="<?php echo $tcivil_descripcion; ?>" size="60" /></td>
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
	cuadro_error("Estado Civil No Encontrado <b><a href=reg_civil.php  target=\"_self\">    Ir a Registrar</a></b>");	
}
}
?>

<?php
 echo "<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>
