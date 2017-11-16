<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><H6>TIPO ACTIVIDAD </H6></div>
<?php
/************************************************************
****************** Eliminar Registros ***********************
************************************************************/
if(strtolower($_POST["del"]) == "eliminar")
{
	$sqldelexp = "delete from tactividad where tactividad_id='".(int)$_REQUEST["tactividad_id"]."'";
	
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
				
			$sql="update tactividad set tactividad_descripcion=UPPER('".$_REQUEST["tactividad_descripcion"]."') where tactividad_id='".$_REQUEST["tactividad_id"]."' ";
			if(mysql_query($sql,$con))
			{
				
					cuadro_mensaje("TIPO ACTIVIDAD ACTUALIZAO CORRECTAMENTE...");
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
<form action="act_tactividad.php" method="post">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">SELECCIONE TIPO ACTIVIDAD</td>
			<tr>
			<?php
			echo '<td>
				
					<select name="tactividad_id" id="tactividad_id" >
					';	
					//listamos grupos para componer el select
					$consulta_uoi = mysql_query("SELECT * FROM tactividad ORDER BY tactividad_id");
					$n_uoi = mysql_num_rows($consulta_uoi);
					echo '<option>SELECCIONE TIPO ACTIVIDAD</option>';
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['tactividad_id'].'">'.$reg_consulta_uoi['tactividad_descripcion'].' </option>';
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
if($_REQUEST["tactividad_id"]!="")
{
$result=mysql_query("select * from tactividad where tactividad_id='".quitar($_REQUEST["tactividad_id"])."' ",$con);
if(mysql_num_rows($result) == 1)
{
$tactividad_id=mysql_result($result,0,"tactividad_id");
$tactividad_descripcion=mysql_result($result,0,"tactividad_descripcion");
echo '<br />';
?>

<form name="registro" action="act_tactividad.php" method="post" enctype="multipart/form-data">
	
	<table width="650" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS TIPO ACTIVIDAD</h3></td>
		</tr>
		<tr>
			<td class="tdatos">CÓDIGO</td>
			<td><input type="text" name="tactividad_id" readonly="readonly" style="background-color:#F7D358" value="<?php echo $tactividad_id; ?>" size="60" /></td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE TIPO ACTIVIDAD</td>
			<td><input type="text" name="tactividad_descripcion" value="<?php echo $tactividad_descripcion; ?>" size="60" /></td>
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
	cuadro_error("TIPO ACTIVIDAD NO ENCONTRADO <b><a href=reg_tactividad.php  target=\"_self\">    Ir a Registrar</a></b>");	
}
}
?>

<?php
 echo "<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>
