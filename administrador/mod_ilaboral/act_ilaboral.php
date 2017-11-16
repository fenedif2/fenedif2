<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><H6>INTERÉS LABORAL </H6></div>
<?php
/************************************************************
****************** Eliminar Registros ***********************
************************************************************/
if(strtolower($_POST["del"]) == "eliminar")
{
	$sqldelexp = "delete from intereslaboral where intereslaboral_id='".(int)$_REQUEST["intereslaboral_id"]."'";
	
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
				
			$sql="update intereslaboral set intereslaboral_nombre=UPPER('".$_REQUEST["intereslaboral_nombre"]."') where intereslaboral_id='".$_REQUEST["intereslaboral_id"]."' ";
			if(mysql_query($sql,$con))
			{
				
					cuadro_mensaje("INTERÉS LABORAL ACTUALIZAO CORRECTAMENTE...");
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
<form action="act_ilaboral.php" method="post">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">SELECCIONE INTERÉS LABORAL</td>
			<tr>
			<?php
			echo '<td>
				
					<select name="intereslaboral_id" id="intereslaboral_id" >
					';	
					//listamos grupos para componer el select
					$consulta_uoi = mysql_query("SELECT * FROM intereslaboral ORDER BY intereslaboral_id");
					$n_uoi = mysql_num_rows($consulta_uoi);
					echo '<option>SELECCIONE INTERÉS LABORAL</option>';
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['intereslaboral_id'].'">'.$reg_consulta_uoi['intereslaboral_nombre'].' </option>';
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
if($_REQUEST["intereslaboral_id"]!="")
{
$result=mysql_query("select * from intereslaboral where intereslaboral_id='".quitar($_REQUEST["intereslaboral_id"])."' ",$con);
if(mysql_num_rows($result) == 1)
{
$intereslaboral_id=mysql_result($result,0,"intereslaboral_id");
$intereslaboral_nombre=mysql_result($result,0,"intereslaboral_nombre");
echo '<br />';
?>

<form name="registro" action="act_ilaboral.php" method="post" enctype="multipart/form-data">
	
	<table width="650" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS INTERÉS LABORAL</h3></td>
		</tr>
		<tr>
			<td class="tdatos">CÓDIGO</td>
			<td><input type="text" name="intereslaboral_id" readonly="readonly" style="background-color:#F7D358" value="<?php echo $intereslaboral_id; ?>" size="60" /></td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE INTERÉS LABORAL</td>
			<td><input type="text" name="intereslaboral_nombre" value="<?php echo $intereslaboral_nombre; ?>" size="60" /></td>
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
	cuadro_error("INTERÉS LABORAL NO ENCONTRADO <b><a href=reg_ilaboral.php  target=\"_self\">    Ir a Registrar</a></b>");	
}
}
?>

<?php
 echo "<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>
