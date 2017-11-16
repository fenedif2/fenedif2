<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><H6>TIPO NIVEL </H6></div>
<?php
/************************************************************
****************** Eliminar Registros ***********************
************************************************************/
if(strtolower($_POST["del"]) == "eliminar")
{
	$sqldelexp = "delete from nivel where nivel_id='".(int)$_REQUEST["nivel_id"]."'";
	
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
				
			$sql="update nivel set nivel_nombre=UPPER('".$_REQUEST["nivel_nombre"]."') where nivel_id='".$_REQUEST["nivel_id"]."' ";
			if(mysql_query($sql,$con))
			{
				
					cuadro_mensaje("TIPO NIVEL ACTUALIZAO CORRECTAMENTE...");
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
<form action="act_nivel.php" method="post">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">SELECCIONE TIPO NIVEL</td>
			<tr>
			<?php
			echo '<td>
				
					<select name="nivel_id" id="nivel_id" >
					';	
					//listamos grupos para componer el select
					$consulta_uoi = mysql_query("SELECT * FROM nivel ORDER BY nivel_id");
					$n_uoi = mysql_num_rows($consulta_uoi);
					echo '<option>SELECCIONE TIPO NIVEL</option>';
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['nivel_id'].'">'.$reg_consulta_uoi['nivel_nombre'].' </option>';
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
if($_REQUEST["nivel_id"]!="")
{
$result=mysql_query("select * from nivel where nivel_id='".quitar($_REQUEST["nivel_id"])."' ",$con);
if(mysql_num_rows($result) == 1)
{
$nivel_id=mysql_result($result,0,"nivel_id");
$nivel_nombre=mysql_result($result,0,"nivel_nombre");
echo '<br />';
?>

<form name="registro" action="act_nivel.php" method="post" enctype="multipart/form-data">
	
	<table width="650" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS TIPO NIVEL</h3></td>
		</tr>
		<tr>
			<td class="tdatos">CÓDIGO</td>
			<td><input type="text" name="nivel_id" readonly="readonly" style="background-color:#F7D358" value="<?php echo $nivel_id; ?>" size="60" /></td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE TIPO NIVEL</td>
			<td><input type="text" name="nivel_nombre" value="<?php echo $nivel_nombre; ?>" size="60" /></td>
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
	cuadro_error("TIPO NIVEL NO ENCONTRADO <b><a href=reg_nivel.php  target=\"_self\">    Ir a Registrar</a></b>");	
}
}
?>

<?php
 echo "<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>
