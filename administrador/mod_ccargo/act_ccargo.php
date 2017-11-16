<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><H6>CATEGORÍA CARGO </H6></div>
<?php
/************************************************************
****************** Eliminar Registros ***********************
************************************************************/
if(strtolower($_POST["del"]) == "eliminar")
{
	$sqldelexp = "delete from categoriacargo where categoriacargo_id='".(int)$_REQUEST["categoriacargo_id"]."'";
	
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
				
			$sql="update categoriacargo set categoriacargo_nombre=UPPER('".$_REQUEST["categoriacargo_nombre"]."') where categoriacargo_id='".$_REQUEST["categoriacargo_id"]."' ";
			if(mysql_query($sql,$con))
			{
				
					cuadro_mensaje("CATEGORÍA CARGO ACTUALIZAO CORRECTAMENTE...");
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
<form action="act_ccargo.php" method="post">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">SELECCIONE CATEGORÍA CARGO</td>
			<tr>
			<?php
			echo '<td>
				
					<select name="categoriacargo_id" id="categoriacargo_id" >
					';	
					//listamos grupos para componer el select
					$consulta_uoi = mysql_query("SELECT * FROM categoriacargo ORDER BY categoriacargo_nombre");
					$n_uoi = mysql_num_rows($consulta_uoi);
					echo '<option>SELECCIONE CATEGORÍA CARGO</option>';
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['categoriacargo_id'].'">'.$reg_consulta_uoi['categoriacargo_nombre'].' </option>';
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
if($_REQUEST["categoriacargo_id"]!="")
{
$result=mysql_query("select * from categoriacargo where categoriacargo_id='".quitar($_REQUEST["categoriacargo_id"])."' ",$con);
if(mysql_num_rows($result) == 1)
{
$categoriacargo_id=mysql_result($result,0,"categoriacargo_id");
$categoriacargo_nombre=mysql_result($result,0,"categoriacargo_nombre");
echo '<br />';
?>

<form name="registro" action="act_ccargo.php" method="post" enctype="multipart/form-data">
	
	<table width="650" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS CATEGORÍA CARGO</h3></td>
		</tr>
		<tr>
			<td class="tdatos">CÓDIGO</td>
			<td><input type="text" name="categoriacargo_id" readonly="readonly" style="background-color:#F7D358" value="<?php echo $categoriacargo_id; ?>" size="60" /></td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE CATEGORÍA CARGO</td>
			<td><input type="text" name="categoriacargo_nombre" value="<?php echo $categoriacargo_nombre; ?>" size="60" /></td>
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
	cuadro_error("CATEGORÍA CARGO NO ENCONTRADO <b><a href=reg_ccargo.php  target=\"_self\">    Ir a Registrar</a></b>");	
}
}
?>

<?php
 echo "<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>
