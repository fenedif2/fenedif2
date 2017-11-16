<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><H6>FORMA CONOCER </H6></div>
<?php
/************************************************************
****************** Eliminar Registros ***********************
************************************************************/
if(strtolower($_POST["del"]) == "eliminar")
{
	$sqldelexp = "delete from formaconocer where formaconocer_id='".(int)$_REQUEST["formaconocer_id"]."'";
	
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
				
			$sql="update formaconocer set formaconocer_nombre=UPPER('".$_REQUEST["formaconocer_nombre"]."') where formaconocer_id='".$_REQUEST["formaconocer_id"]."' ";
			if(mysql_query($sql,$con))
			{
				
					cuadro_mensaje("FORMA CONOCER ACTUALIZAO CORRECTAMENTE...");
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
<form action="act_fconocer.php" method="post">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">SELECCIONE FORMA CONOCER</td>
			<tr>
			<?php
			echo '<td>
				
					<select name="formaconocer_id" id="formaconocer_id" >
					';	
					//listamos grupos para componer el select
					$consulta_uoi = mysql_query("SELECT * FROM formaconocer ORDER BY formaconocer_id");
					$n_uoi = mysql_num_rows($consulta_uoi);
					echo '<option>SELECCIONE FORMA CONOCER</option>';
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['formaconocer_id'].'">'.$reg_consulta_uoi['formaconocer_nombre'].' </option>';
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
if($_REQUEST["formaconocer_id"]!="")
{
$result=mysql_query("select * from formaconocer where formaconocer_id='".quitar($_REQUEST["formaconocer_id"])."' ",$con);
if(mysql_num_rows($result) == 1)
{
$formaconocer_id=mysql_result($result,0,"formaconocer_id");
$formaconocer_nombre=mysql_result($result,0,"formaconocer_nombre");
echo '<br />';
?>

<form name="registro" action="act_fconocer.php" method="post" enctype="multipart/form-data">
	
	<table width="650" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS FORMA CONOCER</h3></td>
		</tr>
		<tr>
			<td class="tdatos">CÓDIGO</td>
			<td><input type="text" name="formaconocer_id" readonly="readonly" style="background-color:#F7D358" value="<?php echo $formaconocer_id; ?>" size="60" /></td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE FORMA CONOCER</td>
			<td><input type="text" name="formaconocer_nombre" value="<?php echo $formaconocer_nombre; ?>" size="60" /></td>
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
	cuadro_error("FORMA CONOCER NO ENCONTRADO <b><a href=reg_fconocer.php  target=\"_self\">    Ir a Registrar</a></b>");	
}
}
?>

<?php
 echo "<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>
