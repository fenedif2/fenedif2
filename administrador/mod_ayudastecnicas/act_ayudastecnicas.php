<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><H6>AYUDAS TÉCNICAS </H6></div>
<?php
/************************************************************
****************** Eliminar Registros ***********************
************************************************************/
if(strtolower($_POST["del"]) == "eliminar")
{
	$sqldelexp = "delete from ayudastecnicas where ayudastecnicas_id='".(int)$_REQUEST["ayudastecnicas_id"]."'";
	
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
				
			$sql="update ayudastecnicas set ayudastecnicas_nombre=UPPER('".$_REQUEST["ayudastecnicas_nombre"]."') where ayudastecnicas_id='".$_REQUEST["ayudastecnicas_id"]."' ";
			if(mysql_query($sql,$con))
			{
				
					cuadro_mensaje("AYUDAS TÉCNICAS ACTUALIZADO CORRECTAMENTE...");
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
<form action="act_ayudastecnicas.php" method="post">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">SELECCIONE CAYUDAS TÉCNICAS</td>
			<tr>
			<?php
			echo '<td>
				
					<select name="ayudastecnicas_id" id="ayudastecnicas_id" >
					';	
					//listamos grupos para componer el select
					$consulta_uoi = mysql_query("SELECT * FROM ayudastecnicas ORDER BY ayudastecnicas_id");
					$n_uoi = mysql_num_rows($consulta_uoi);
					echo '<option>SELECCIONE AYUDAS TÉCNICAS</option>';
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['ayudastecnicas_id'].'">'.$reg_consulta_uoi['ayudastecnicas_nombre'].' </option>';
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
if($_REQUEST["ayudastecnicas_id"]!="")
{
$result=mysql_query("select * from ayudastecnicas where ayudastecnicas_id='".quitar($_REQUEST["ayudastecnicas_id"])."' ",$con);
if(mysql_num_rows($result) == 1)
{
$ayudastecnicas_id=mysql_result($result,0,"ayudastecnicas_id");
$ayudastecnicas_nombre=mysql_result($result,0,"ayudastecnicas_nombre");
echo '<br />';
?>

<form name="registro" action="act_ayudastecnicas.php" method="post" enctype="multipart/form-data">
	
	<table width="650" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS AYUDAS TÉCNICAS</h3></td>
		</tr>
		<tr>
			<td class="tdatos">CÓDIGO</td>
			<td><input type="text" name="ayudastecnicas_id" readonly="readonly" style="background-color:#F7D358" value="<?php echo $ayudastecnicas_id; ?>" size="60" /></td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE AYUDAS TÉCNICAS</td>
			<td><input type="text" name="ayudastecnicas_nombre" value="<?php echo $ayudastecnicas_nombre; ?>" size="60" /></td>
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
	cuadro_error("AYUDAS TÉCNICAS NO ENCONTRADO <b><a href=reg_ayudastecnicas.php  target=\"_self\">    Ir a Registrar</a></b>");	
}
}
?>

<?php
 echo "<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>
