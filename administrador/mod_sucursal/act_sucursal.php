<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><H6>SUCURSAL </H6></div>
<?php
/************************************************************
****************** Eliminar Registros ***********************
************************************************************/
if(strtolower($_POST["del"]) == "eliminar")
{
	$sqldelexp = "delete from sucursal where sucursal_id='".(int)$_REQUEST["sucursal_id"]."'";
	
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
				
			$sql="update sucursal set sucursal_nombre=UPPER('".$_REQUEST["sucursal_nombre"]."') where sucursal_id='".$_REQUEST["sucursal_id"]."' ";
			if(mysql_query($sql,$con))
			{
				
					cuadro_mensaje("SUCURSAL ACTUALIZADO CORRECTAMENTE...");
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
<form action="act_sucursal.php" method="post">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">SELECCIONE CSUCURSAL</td>
			<tr>
			<?php
			echo '<td>
				
					<select name="sucursal_id" id="sucursal_id" >
					';	
					//listamos grupos para componer el select
					$consulta_uoi = mysql_query("SELECT * FROM sucursal ORDER BY sucursal_id");
					$n_uoi = mysql_num_rows($consulta_uoi);
					echo '<option>SELECCIONE SUCURSAL</option>';
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['sucursal_id'].'">'.$reg_consulta_uoi['sucursal_nombre'].' </option>';
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
if($_REQUEST["sucursal_id"]!="")
{
$result=mysql_query("select * from sucursal where sucursal_id='".quitar($_REQUEST["sucursal_id"])."' ",$con);
if(mysql_num_rows($result) == 1)
{
$sucursal_id=mysql_result($result,0,"sucursal_id");
$sucursal_nombre=mysql_result($result,0,"sucursal_nombre");
echo '<br />';
?>

<form name="registro" action="act_sucursal.php" method="post" enctype="multipart/form-data">
	
	<table width="650" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS SUCURSAL</h3></td>
		</tr>
		<tr>
			<td class="tdatos">CÓDIGO</td>
			<td><input type="text" name="sucursal_id" readonly="readonly" style="background-color:#F7D358" value="<?php echo $sucursal_id; ?>" size="60" /></td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE SUCURSAL</td>
			<td><input type="text" name="sucursal_nombre" value="<?php echo $sucursal_nombre; ?>" size="60" /></td>
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
	cuadro_error("SUCURSAL NO ENCONTRADO <b><a href=reg_sucursal.php  target=\"_self\">    Ir a Registrar</a></b>");	
}
}
?>

<?php
 echo "<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>
