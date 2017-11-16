<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><H6>ACTUALIZAR RIESGOS SANITARIOS </H6></div>
<?php
/************************************************************
****************** Eliminar Registros ***********************
************************************************************/
if(strtolower($_POST["del"]) == "eliminar")
{
	$sqldelexp = "delete from triesgos where triesgos_id='".(int)$_REQUEST["triesgos_id"]."'";
	
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
				
			$sql="update triesgos set triesgos_descripcion=UPPER('".$_REQUEST["triesgos_descripcion"]."') where triesgos_id='".$_REQUEST["triesgos_id"]."' ";
			if(mysql_query($sql,$con))
			{
				
					cuadro_mensaje("RIESGOS SANITARIOS actualizado correctamente...");
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
<form action="act_riesgos.php" method="post">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">Seleccione el RIESGOS SANITARIOS</td>
			<tr>
			<?php
			echo '<td>
				
					<select name="triesgos_id" id="triesgos_id" >
					';	
					//listamos grupos para componer el select
					$consulta_uoi = mysql_query("SELECT * FROM triesgos ORDER BY triesgos_descripcion");
					$n_uoi = mysql_num_rows($consulta_uoi);
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['triesgos_id'].'">'.$reg_consulta_uoi['triesgos_descripcion'].' </option>';
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
if($_REQUEST["triesgos_id"]!="")
{
$result=mysql_query("select * from triesgos where triesgos_id='".quitar($_REQUEST["triesgos_id"])."' ",$con);
if(mysql_num_rows($result) == 1)
{
$triesgos_id=mysql_result($result,0,"triesgos_id");
$triesgos_descripcion=mysql_result($result,0,"triesgos_descripcion");
echo '<br />';
?>

<form name="registro" action="act_riesgos.php" method="post" enctype="multipart/form-data">
	
	<table width="650" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS DEL RIESGOS SANITARIOS</h3></td>
		</tr>
		<tr>
			<td class="tdatos">Codigo</td>
			<td><input type="text" name="triesgos_id" readonly="readonly" value="<?php echo $triesgos_id; ?>" size="60" /></td>
		</tr>
		<tr>
			<td class="tdatos">Nombre del RIESGOS SANITARIOS</td>
			<td><input type="text" name="triesgos_descripcion" value="<?php echo $triesgos_descripcion; ?>" size="60" /></td>
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
	cuadro_error("RIESGOS SANITARIOS No Encontrado <b><a href=reg_riesgos.php  target=\"_self\">    Ir a Registrar</a></b>");	
}
}
?>

<?php
 echo "<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>
