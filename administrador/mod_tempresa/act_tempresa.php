<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><H6>TIPO EMPRESA </H6></div>
<?php
/************************************************************
****************** Eliminar Registros ***********************
************************************************************/
if(strtolower($_POST["del"]) == "eliminar")
{
	$sqldelexp = "delete from tipoempresa where tipoempresa_id='".(int)$_REQUEST["tipoempresa_id"]."'";
	
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
				
			$sql="update tipoempresa set tipoempresa_nombre=UPPER('".$_REQUEST["tipoempresa_nombre"]."') where tipoempresa_id='".$_REQUEST["tipoempresa_id"]."' ";
			if(mysql_query($sql,$con))
			{
				
					cuadro_mensaje("TIPO EMPRESA ACTUALIZAO CORRECTAMENTE...");
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
<form action="act_tempresa.php" method="post">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">SELECCIONE CTIPO EMPRESA</td>
			<tr>
			<?php
			echo '<td>
				
					<select name="tipoempresa_id" id="tipoempresa_id" >
					';	
					//listamos grupos para componer el select
					$consulta_uoi = mysql_query("SELECT * FROM tipoempresa ORDER BY tipoempresa_nombre");
					$n_uoi = mysql_num_rows($consulta_uoi);
					echo '<option>SELECCIONE TIPO EMPRESA</option>';
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['tipoempresa_id'].'">'.$reg_consulta_uoi['tipoempresa_nombre'].' </option>';
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
if($_REQUEST["tipoempresa_id"]!="")
{
$result=mysql_query("select * from tipoempresa where tipoempresa_id='".quitar($_REQUEST["tipoempresa_id"])."' ",$con);
if(mysql_num_rows($result) == 1)
{
$tipoempresa_id=mysql_result($result,0,"tipoempresa_id");
$tipoempresa_nombre=mysql_result($result,0,"tipoempresa_nombre");
echo '<br />';
?>

<form name="registro" action="act_tempresa.php" method="post" enctype="multipart/form-data">
	
	<table width="650" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS TIPO EMPRESA</h3></td>
		</tr>
		<tr>
			<td class="tdatos">CÓDIGO</td>
			<td><input type="text" name="tipoempresa_id" readonly="readonly" style="background-color:#F7D358" value="<?php echo $tipoempresa_id; ?>" size="60" /></td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE TIPO EMPRESA</td>
			<td><input type="text" name="tipoempresa_nombre" value="<?php echo $tipoempresa_nombre; ?>" size="60" /></td>
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
	cuadro_error("TIPO EMPRESA NO ENCONTRADO <b><a href=reg_tempresa.php  target=\"_self\">    Ir a Registrar</a></b>");	
}
}
?>

<?php
 echo "<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>
