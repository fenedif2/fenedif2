<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><H6>ACTUALIZAR DATOS TIPO DE PROYECTO </H6></div>
<?php
/************************************************************
****************** Eliminar Registros ***********************
************************************************************/
if(strtolower($_POST["del"]) == "eliminar")
{
	$sqldelexp = "delete from tproyecto where tproyecto_id='".$_REQUEST["tproyecto_id"]."'";
	
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
				
			$sql="update tproyecto set tproyecto_nombre=UPPER('".$_REQUEST["tproyecto_nombre"]."') where tproyecto_id='".$_REQUEST["tproyecto_id"]."' ";
			if(mysql_query($sql,$con))
			{
				
					cuadro_mensaje("TIPO DE PROYECTO actualizado correctamente...");
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
<form action="act_tproyecto.php" method="post">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">SELECCIONE TIPO DE PROYECTO</td>
			<tr>
			<?php
			echo '<td>
				
					<select name="tproyecto_id" id="tproyecto_id" >
					';	
					//listamos grupos para componer el select
					$consulta_uoi = mysql_query("SELECT * FROM tproyecto ORDER BY tproyecto_nombre");
					$n_uoi = mysql_num_rows($consulta_uoi);
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['tproyecto_id'].'">'.$reg_consulta_uoi['tproyecto_nombre'].' </option>';
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
if($_REQUEST["tproyecto_id"]!="")
{
$result=mysql_query("select * from tproyecto where tproyecto_id='".quitar($_REQUEST["tproyecto_id"])."' ",$con);
if(mysql_num_rows($result) == 1)
{
$tproyecto_id=mysql_result($result,0,"tproyecto_id");
$tproyecto_nombre=mysql_result($result,0,"tproyecto_nombre");
echo '<br />';
?>

<form name="registro" action="act_tproyecto.php" method="post" enctype="multipart/form-data">
	
	<table width="650" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS DEL TIPO DE PROYECTO</h3></td>
		</tr>
		<tr>
			<td class="tdatos">Codigo</td>
			<td><input type="text" name="tproyecto_id" readonly="readonly" value="<?php echo $tproyecto_id; ?>" size="60" /></td>
		</tr>
		<tr>
			<td class="tdatos">tproyecto_nombre del TIPO DE PROYECTO</td>
			<td><input type="text" name="tproyecto_nombre" value="<?php echo $tproyecto_nombre; ?>" size="60" /></td>
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
	cuadro_error("TIPO DE PROYECTO No Encontrado <b><a href=reg_uoi.php  target=\"_self\">    Ir a Registrar</a></b>");	
}
}
?>

<?php
 echo "<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>
