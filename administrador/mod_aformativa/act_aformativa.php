<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><H6>ÁREA FORMATIVA </H6></div>
<?php
/************************************************************
****************** Eliminar Registros ***********************
************************************************************/
if(strtolower($_POST["del"]) == "eliminar")
{
	$sqldelexp = "delete from areaformativa where areaformativa_id='".(int)$_REQUEST["areaformativa_id"]."'";
	
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
				
			$sql="update areaformativa set areaformativa_nombre=UPPER('".$_REQUEST["areaformativa_nombre"]."') where areaformativa_id='".$_REQUEST["areaformativa_id"]."' ";
			if(mysql_query($sql,$con))
			{
				
					cuadro_mensaje("ÁREA FORMATIVA ACTUALIZAO CORRECTAMENTE...");
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
<form action="act_aformativa.php" method="post">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">SELECCIONE CÁREA FORMATIVA</td>
			<tr>
			<?php
			echo '<td>
				
					<select name="areaformativa_id" id="areaformativa_id" >
					';	
					//listamos grupos para componer el select
					$consulta_uoi = mysql_query("SELECT * FROM areaformativa ORDER BY areaformativa_id");
					$n_uoi = mysql_num_rows($consulta_uoi);
					echo '<option>SELECCIONE ÁREA FORMATIVA</option>';
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['areaformativa_id'].'">'.$reg_consulta_uoi['areaformativa_nombre'].' </option>';
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
if($_REQUEST["areaformativa_id"]!="")
{
$result=mysql_query("select * from areaformativa where areaformativa_id='".quitar($_REQUEST["areaformativa_id"])."' ",$con);
if(mysql_num_rows($result) == 1)
{
$areaformativa_id=mysql_result($result,0,"areaformativa_id");
$areaformativa_nombre=mysql_result($result,0,"areaformativa_nombre");
echo '<br />';
?>

<form name="registro" action="act_aformativa.php" method="post" enctype="multipart/form-data">
	
	<table width="650" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS ÁREA FORMATIVA</h3></td>
		</tr>
		<tr>
			<td class="tdatos">CÓDIGO</td>
			<td><input type="text" name="areaformativa_id" readonly="readonly" style="background-color:#F7D358" value="<?php echo $areaformativa_id; ?>" size="60" /></td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE ÁREA FORMATIVA</td>
			<td><input type="text" name="areaformativa_nombre" value="<?php echo $areaformativa_nombre; ?>" size="60" /></td>
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
	cuadro_error("ÁREA FORMATIVA NO ENCONTRADO <b><a href=reg_aformativa.php  target=\"_self\">    Ir a Registrar</a></b>");	
}
}
?>

<?php
 echo "<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>
