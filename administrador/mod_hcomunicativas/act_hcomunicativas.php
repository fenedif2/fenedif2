<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><H6>HABILIDADES COMUNICATIVAS </H6></div>
<?php
/************************************************************
****************** Eliminar Registros ***********************
************************************************************/
if(strtolower($_POST["del"]) == "eliminar")
{
	$sqldelexp = "delete from habilidadescomunicativas where habilidadescomunicativas_id='".(int)$_REQUEST["habilidadescomunicativas_id"]."'";
	
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
				
			$sql="update habilidadescomunicativas set habilidadescomunicativas_nombre=UPPER('".$_REQUEST["habilidadescomunicativas_nombre"]."') where habilidadescomunicativas_id='".$_REQUEST["habilidadescomunicativas_id"]."' ";
			if(mysql_query($sql,$con))
			{
				
					cuadro_mensaje("HABILIDADES COMUNICATIVAS ACTUALIZADO CORRECTAMENTE...");
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
<form action="act_hcomunicativas.php" method="post">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">SELECCIONE HABILIDADES COMUNICATIVAS</td>
			<tr>
			<?php
			echo '<td>
				
					<select name="habilidadescomunicativas_id" id="habilidadescomunicativas_id" >
					';	
					//listamos grupos para componer el select
					$consulta_uoi = mysql_query("SELECT * FROM habilidadescomunicativas ORDER BY habilidadescomunicativas_id");
					$n_uoi = mysql_num_rows($consulta_uoi);
					echo '<option>SELECCIONE HABILIDADES COMUNICATIVAS</option>';
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['habilidadescomunicativas_id'].'">'.$reg_consulta_uoi['habilidadescomunicativas_nombre'].' </option>';
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
if($_REQUEST["habilidadescomunicativas_id"]!="")
{
$result=mysql_query("select * from habilidadescomunicativas where habilidadescomunicativas_id='".quitar($_REQUEST["habilidadescomunicativas_id"])."' ",$con);
if(mysql_num_rows($result) == 1)
{
$habilidadescomunicativas_id=mysql_result($result,0,"habilidadescomunicativas_id");
$habilidadescomunicativas_nombre=mysql_result($result,0,"habilidadescomunicativas_nombre");
echo '<br />';
?>

<form name="registro" action="act_hcomunicativas.php" method="post" enctype="multipart/form-data">
	
	<table width="650" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS HABILIDADES COMUNICATIVAS</h3></td>
		</tr>
		<tr>
			<td class="tdatos">CÓDIGO</td>
			<td><input type="text" name="habilidadescomunicativas_id" readonly="readonly" style="background-color:#F7D358" value="<?php echo $habilidadescomunicativas_id; ?>" size="60" /></td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE HABILIDADES COMUNICATIVAS</td>
			<td><input type="text" name="habilidadescomunicativas_nombre" value="<?php echo $habilidadescomunicativas_nombre; ?>" size="60" /></td>
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
	cuadro_error("HABILIDADES COMUNICATIVAS NO ENCONTRADO <b><a href=reg_hcomunicativas.php  target=\"_self\">    Ir a Registrar</a></b>");	
}
}
?>

<?php
 echo "<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>
