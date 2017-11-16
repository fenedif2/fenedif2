<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><H6>ACTUALIZAR TIPO DE TÉCNICO </H6></div>
<?php
/************************************************************
****************** Eliminar Registros ***********************
************************************************************/
if(strtolower($_POST["del"]) == "eliminar")
{
	$sqldelexp = "delete from ttecnico where ttecnico_id='".(int)$_REQUEST["ttecnico_id"]."'";
	
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
				
			$sql="update ttecnico set ttecnico_nombre=UPPER('".$_REQUEST["ttecnico_nombre"]."') where ttecnico_id='".$_REQUEST["ttecnico_id"]."' ";
			if(mysql_query($sql,$con))
			{
				
					cuadro_mensaje("Tipo de Técnico actualizado correctamente...");
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
<form action="act_ttecnico.php" method="post">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">SELECCIONE EL TIPO DE TÉCNICO</td>
			<tr>
			<?php
			echo '<td>
				
					<select name="ttecnico_id" id="ttecnico_id" >
					';	
					//listamos grupos para componer el select
					$consulta_uoi = mysql_query("SELECT * FROM ttecnico ORDER BY ttecnico_nombre");
					$n_uoi = mysql_num_rows($consulta_uoi);
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['ttecnico_id'].'">'.$reg_consulta_uoi['ttecnico_nombre'].' </option>';
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
if($_REQUEST["ttecnico_id"]!="")
{
$result=mysql_query("select * from ttecnico where ttecnico_id='".quitar($_REQUEST["ttecnico_id"])."' ",$con);
if(mysql_num_rows($result) == 1)
{
$ttecnico_id=mysql_result($result,0,"ttecnico_id");
$ttecnico_nombre=mysql_result($result,0,"ttecnico_nombre");
echo '<br />';
?>

<form name="registro" action="act_ttecnico.php" method="post" enctype="multipart/form-data">
	
	<table width="650" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS DEL TIPO DE TÉCNICO</h3></td>
		</tr>
		<tr>
			<td class="tdatos">CÓDIGO</td>
			<td><input type="text" name="ttecnico_id" readonly="readonly" value="<?php echo $ttecnico_id; ?>" size="60" /></td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE DEL TIPO DE TÉCNICO</td>
			<td><input type="text" name="ttecnico_nombre" value="<?php echo $ttecnico_nombre; ?>" size="60" /></td>
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
	cuadro_error("Tipo de Técnico No Encontrado <b><a href=reg_uoi.php  target=\"_self\">    Ir a Registrar</a></b>");	
}
}
?>

<?php
 echo "<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>
