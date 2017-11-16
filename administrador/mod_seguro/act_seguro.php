<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<div class="titulo"><H6>ACTUALIZAR SEGURO</H6></div>
<?php
/************************************************************
****************** Eliminar Registros ***********************
************************************************************/
if(strtolower($_POST["del"]) == "eliminar")
{
	$sqldelexp = "delete from tiposeguro where tiposeguro_id='".(int)$_REQUEST["tiposeguro_id"]."'";
	
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
				
			$sql="update tiposeguro set tiposeguro_nombre=UPPER('".$_REQUEST["tiposeguro_nombre"]."') where tiposeguro_id='".$_REQUEST["tiposeguro_id"]."' ";
			if(mysql_query($sql,$con))
			{
				
					cuadro_mensaje("SEGURO ACTUALIZADO CORRECTAMENTE...");
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
<form action="act_seguro.php" method="post">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">SELECCIONE TIPO SEGURO</td>
			<tr>
			<?php
			echo '<td>
				
					<select name="tiposeguro_id" id="tiposeguro_id" >
					';	
					//listamos grupos para componer el select
					$consulta_uoi = mysql_query("SELECT * FROM tiposeguro ORDER BY tiposeguro_nombre");
					$n_uoi = mysql_num_rows($consulta_uoi);
					echo '<option>SELECCIONE TIPO SEGURO</option>';
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['tiposeguro_id'].'">'.$reg_consulta_uoi['tiposeguro_nombre'].' </option>';
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
if($_REQUEST["tiposeguro_id"]!="")
{
$result=mysql_query("select * from tiposeguro where tiposeguro_id='".quitar($_REQUEST["tiposeguro_id"])."' ",$con);
if(mysql_num_rows($result) == 1)
{
$tiposeguro_id=mysql_result($result,0,"tiposeguro_id");
$tiposeguro_nombre=mysql_result($result,0,"tiposeguro_nombre");
echo '<br />';
?>

<form name="registro" action="act_seguro.php" method="post" enctype="multipart/form-data">
	
	<table width="650" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS DEL SEGURO</h3></td>
		</tr>
		<tr>
			<td class="tdatos">Código</td>
			<td><input type="text" name="tiposeguro_id" readonly="readonly" style="background-color:#F7D358" value="<?php echo $tiposeguro_id; ?>" size="60" /></td>
		</tr>
		<tr>
			<td class="tdatos">Tipo Seguro</td>
			<td><input type="text" name="tiposeguro_nombre" value="<?php echo $tiposeguro_nombre; ?>" size="60" /></td>
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
	cuadro_error("SEGURO No Encontrado <b><a href=reg_seguro.php  target=\"_self\">    Ir a Registrar</a></b>");	
}
}
?>

<?php
 echo "<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>
