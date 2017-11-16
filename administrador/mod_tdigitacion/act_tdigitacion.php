<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><H6>TIPO DIGITACIÓN</H6></div>
<?php
/************************************************************
****************** Eliminar Registros ***********************
************************************************************/
if(strtolower($_POST["del"]) == "eliminar")
{
	$sqldelexp = "delete from tdigitacion where tdigitacion_id='".(int)$_REQUEST["tdigitacion_id"]."'";
	
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
				
			$sql="update tdigitacion set tdigitacion_descripcion=UPPER('".$_REQUEST["tdigitacion_descripcion"]."') where tdigitacion_id='".$_REQUEST["tdigitacion_id"]."' ";
			if(mysql_query($sql,$con))
			{
				
					cuadro_mensaje("TIPO DIGITACIÓN ACTUALIZAO CORRECTAMENTE...");
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
<form action="act_tdigitacion.php" method="post">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">SELECCIONE TIPO DIGITACIÓN</td>
			<tr>
			<?php
			echo '<td>
				
					<select name="tdigitacion_id" id="tdigitacion_id" >
					';	
					//listamos grupos para componer el select
					$consulta_uoi = mysql_query("SELECT * FROM tdigitacion ORDER BY tdigitacion_id");
					$n_uoi = mysql_num_rows($consulta_uoi);
					echo '<option>SELECCIONE TIPO DIGITACIÓN</option>';
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['tdigitacion_id'].'">'.$reg_consulta_uoi['tdigitacion_descripcion'].' </option>';
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
if($_REQUEST["tdigitacion_id"]!="")
{
$result=mysql_query("select * from tdigitacion where tdigitacion_id='".quitar($_REQUEST["tdigitacion_id"])."' ",$con);
if(mysql_num_rows($result) == 1)
{
$tdigitacion_id=mysql_result($result,0,"tdigitacion_id");
$tdigitacion_descripcion=mysql_result($result,0,"tdigitacion_descripcion");
echo '<br />';
?>

<form name="registro" action="act_tdigitacion.php" method="post" enctype="multipart/form-data">
	
	<table width="650" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS TIPO DIGITACIÓN</h3></td>
		</tr>
		<tr>
			<td class="tdatos">CÓDIGO</td>
			<td><input type="text" name="tdigitacion_id" readonly="readonly" style="background-color:#F7D358" value="<?php echo $tdigitacion_id; ?>" size="60" /></td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE TIPO DIGITACIÓN</td>
			<td><input type="text" name="tdigitacion_descripcion" value="<?php echo $tdigitacion_descripcion; ?>" size="60" /></td>
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
	cuadro_error("TIPO DIGITACIÓN NO ENCONTRADO <b><a href=reg_tdigitacion.php  target=\"_self\">    Ir a Registrar</a></b>");	
}
}
?>

<?php
 echo "<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>
