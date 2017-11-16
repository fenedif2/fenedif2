<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><H6>ADAPTACIÓN </H6></div>
<?php
/************************************************************
****************** Eliminar Registros ***********************
************************************************************/
if(strtolower($_POST["del"]) == "eliminar")
{
	$sqldelexp = "delete from adaptacion where adaptacion_id='".(int)$_REQUEST["adaptacion_id"]."'";
	
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
				
			$sql="update adaptacion set adaptacion_nombre=UPPER('".$_REQUEST["adaptacion_nombre"]."') where adaptacion_id='".$_REQUEST["adaptacion_id"]."' ";
			if(mysql_query($sql,$con))
			{
				
					cuadro_mensaje("ADAPTACIÓN ACTUALIZADO CORRECTAMENTE...");
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
<form action="act_adaptacion.php" method="post">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">SELECCIONE CADAPTACIÓN</td>
			<tr>
			<?php
			echo '<td>
				
					<select name="adaptacion_id" id="adaptacion_id" >
					';	
					//listamos grupos para componer el select
					$consulta_uoi = mysql_query("SELECT * FROM adaptacion ORDER BY adaptacion_id");
					$n_uoi = mysql_num_rows($consulta_uoi);
					echo '<option>SELECCIONE ADAPTACIÓN</option>';
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['adaptacion_id'].'">'.$reg_consulta_uoi['adaptacion_nombre'].' </option>';
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
if($_REQUEST["adaptacion_id"]!="")
{
$result=mysql_query("select * from adaptacion where adaptacion_id='".quitar($_REQUEST["adaptacion_id"])."' ",$con);
if(mysql_num_rows($result) == 1)
{
$adaptacion_id=mysql_result($result,0,"adaptacion_id");
$adaptacion_nombre=mysql_result($result,0,"adaptacion_nombre");
echo '<br />';
?>

<form name="registro" action="act_adaptacion.php" method="post" enctype="multipart/form-data">
	
	<table width="650" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS ADAPTACIÓN</h3></td>
		</tr>
		<tr>
			<td class="tdatos">CÓDIGO</td>
			<td><input type="text" name="adaptacion_id" readonly="readonly" style="background-color:#F7D358" value="<?php echo $adaptacion_id; ?>" size="60" /></td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE ADAPTACIÓN</td>
			<td><input type="text" name="adaptacion_nombre" value="<?php echo $adaptacion_nombre; ?>" size="60" /></td>
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
	cuadro_error("ADAPTACIÓN NO ENCONTRADO <b><a href=reg_adaptacion.php  target=\"_self\">    Ir a Registrar</a></b>");	
}
}
?>

<?php
 echo "<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>
