<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><H6>ESTADO DISCAPACIDAD </H6></div>
<?php
/************************************************************
****************** Eliminar Registros ***********************
************************************************************/
if(strtolower($_POST["del"]) == "eliminar")
{
	$sqldelexp = "delete from estadodiscapacidad where estadodiscapacidad_id='".(int)$_REQUEST["estadodiscapacidad_id"]."'";
	
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
				
			$sql="update estadodiscapacidad set estadodiscapacidad_nombre=UPPER('".$_REQUEST["estadodiscapacidad_nombre"]."') where estadodiscapacidad_id='".$_REQUEST["estadodiscapacidad_id"]."' ";
			if(mysql_query($sql,$con))
			{
				
					cuadro_mensaje("ESTADO DISCAPACIDAD ACTUALIZAO CORRECTAMENTE...");
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
<form action="act_estadodiscapacidad.php" method="post">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">SELECCIONE CESTADO DISCAPACIDAD</td>
			<tr>
			<?php
			echo '<td>
				
					<select name="estadodiscapacidad_id" id="estadodiscapacidad_id" >
					';	
					//listamos grupos para componer el select
					$consulta_uoi = mysql_query("SELECT * FROM estadodiscapacidad ORDER BY estadodiscapacidad_id");
					$n_uoi = mysql_num_rows($consulta_uoi);
					echo '<option>SELECCIONE ESTADO DISCAPACIDAD</option>';
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['estadodiscapacidad_id'].'">'.$reg_consulta_uoi['estadodiscapacidad_nombre'].' </option>';
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
if($_REQUEST["estadodiscapacidad_id"]!="")
{
$result=mysql_query("select * from estadodiscapacidad where estadodiscapacidad_id='".quitar($_REQUEST["estadodiscapacidad_id"])."' ",$con);
if(mysql_num_rows($result) == 1)
{
$estadodiscapacidad_id=mysql_result($result,0,"estadodiscapacidad_id");
$estadodiscapacidad_nombre=mysql_result($result,0,"estadodiscapacidad_nombre");
echo '<br />';
?>

<form name="registro" action="act_estadodiscapacidad.php" method="post" enctype="multipart/form-data">
	
	<table width="650" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS ESTADO DISCAPACIDAD</h3></td>
		</tr>
		<tr>
			<td class="tdatos">CÓDIGO</td>
			<td><input type="text" name="estadodiscapacidad_id" readonly="readonly" style="background-color:#F7D358" value="<?php echo $estadodiscapacidad_id; ?>" size="60" /></td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE ESTADO DISCAPACIDAD</td>
			<td><input type="text" name="estadodiscapacidad_nombre" value="<?php echo $estadodiscapacidad_nombre; ?>" size="60" /></td>
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
	cuadro_error("ESTADO DISCAPACIDAD NO ENCONTRADO <b><a href=reg_estadodiscapacidad.php  target=\"_self\">    Ir a Registrar</a></b>");	
}
}
?>

<?php
 echo "<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>
