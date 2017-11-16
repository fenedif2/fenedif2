<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><H6>TIPO DISCAPACIDAD </H6></div>
<?php
/************************************************************
****************** Eliminar Registros ***********************
************************************************************/
if(strtolower($_POST["del"]) == "eliminar")
{
	$sqldelexp = "delete from tipodiscapacidad where tipodiscapacidad_id='".(int)$_REQUEST["tipodiscapacidad_id"]."'";
	
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
				
			$sql="update tipodiscapacidad set tipodiscapacidad_nombre=UPPER('".$_REQUEST["tipodiscapacidad_nombre"]."') where tipodiscapacidad_id='".$_REQUEST["tipodiscapacidad_id"]."' ";
			if(mysql_query($sql,$con))
			{
				
					cuadro_mensaje("TIPO DISCAPACIDAD ACTUALIZAO CORRECTAMENTE...");
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
<form action="act_tdiscapacidad.php" method="post">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">SELECCIONE CTIPO DISCAPACIDAD</td>
			<tr>
			<?php
			echo '<td>
				
					<select name="tipodiscapacidad_id" id="tipodiscapacidad_id" >
					';	
					//listamos grupos para componer el select
					$consulta_uoi = mysql_query("SELECT * FROM tipodiscapacidad ORDER BY tipodiscapacidad_id");
					$n_uoi = mysql_num_rows($consulta_uoi);
					echo '<option>SELECCIONE TIPO DISCAPACIDAD</option>';
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['tipodiscapacidad_id'].'">'.$reg_consulta_uoi['tipodiscapacidad_nombre'].' </option>';
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
if($_REQUEST["tipodiscapacidad_id"]!="")
{
$result=mysql_query("select * from tipodiscapacidad where tipodiscapacidad_id='".quitar($_REQUEST["tipodiscapacidad_id"])."' ",$con);
if(mysql_num_rows($result) == 1)
{
$tipodiscapacidad_id=mysql_result($result,0,"tipodiscapacidad_id");
$tipodiscapacidad_nombre=mysql_result($result,0,"tipodiscapacidad_nombre");
echo '<br />';
?>

<form name="registro" action="act_tdiscapacidad.php" method="post" enctype="multipart/form-data">
	
	<table width="650" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS TIPO DISCAPACIDAD</h3></td>
		</tr>
		<tr>
			<td class="tdatos">CÓDIGO</td>
			<td><input type="text" name="tipodiscapacidad_id" readonly="readonly" style="background-color:#F7D358" value="<?php echo $tipodiscapacidad_id; ?>" size="60" /></td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE TIPO DISCAPACIDAD</td>
			<td><input type="text" name="tipodiscapacidad_nombre" value="<?php echo $tipodiscapacidad_nombre; ?>" size="60" /></td>
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
	cuadro_error("TIPO DISCAPACIDAD NO ENCONTRADO <b><a href=reg_tdiscapacidad.php  target=\"_self\">    Ir a Registrar</a></b>");	
}
}
?>

<?php
 echo "<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>
