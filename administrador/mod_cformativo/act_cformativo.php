<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><H6>CENTRO FORMATIVO </H6></div>
<?php
/************************************************************
****************** Eliminar Registros ***********************
************************************************************/
if(strtolower($_POST["del"]) == "eliminar")
{
	$sqldelexp = "delete from tipocformativo where tipocformativo_id='".(int)$_REQUEST["tipocformativo_id"]."'";
	
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
				
			$sql="update tipocformativo set tipocformativo_nombre=UPPER('".$_REQUEST["tipocformativo_nombre"]."') where tipocformativo_id='".$_REQUEST["tipocformativo_id"]."' ";
			if(mysql_query($sql,$con))
			{
				
					cuadro_mensaje("CENTRO FORMATIVO ACTUALIZAO CORRECTAMENTE...");
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
<form action="act_cformativo.php" method="post">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">SELECCIONE CCENTRO FORMATIVO</td>
			<tr>
			<?php
			echo '<td>
				
					<select name="tipocformativo_id" id="tipocformativo_id" >
					';	
					//listamos grupos para componer el select
					$consulta_uoi = mysql_query("SELECT * FROM tipocformativo ORDER BY tipocformativo_id");
					$n_uoi = mysql_num_rows($consulta_uoi);
					echo '<option>SELECCIONE CENTRO FORMATIVO</option>';
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['tipocformativo_id'].'">'.$reg_consulta_uoi['tipocformativo_nombre'].' </option>';
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
if($_REQUEST["tipocformativo_id"]!="")
{
$result=mysql_query("select * from tipocformativo where tipocformativo_id='".quitar($_REQUEST["tipocformativo_id"])."' ",$con);
if(mysql_num_rows($result) == 1)
{
$tipocformativo_id=mysql_result($result,0,"tipocformativo_id");
$tipocformativo_nombre=mysql_result($result,0,"tipocformativo_nombre");
echo '<br />';
?>

<form name="registro" action="act_cformativo.php" method="post" enctype="multipart/form-data">
	
	<table width="650" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS CENTRO FORMATIVO</h3></td>
		</tr>
		<tr>
			<td class="tdatos">CÓDIGO</td>
			<td><input type="text" name="tipocformativo_id" readonly="readonly" style="background-color:#F7D358" value="<?php echo $tipocformativo_id; ?>" size="60" /></td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE CENTRO FORMATIVO</td>
			<td><input type="text" name="tipocformativo_nombre" value="<?php echo $tipocformativo_nombre; ?>" size="60" /></td>
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
	cuadro_error("CENTRO FORMATIVO NO ENCONTRADO <b><a href=reg_cformativo.php  target=\"_self\">    Ir a Registrar</a></b>");	
}
}
?>

<?php
 echo "<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>
