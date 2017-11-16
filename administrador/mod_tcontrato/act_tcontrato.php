<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><H6>ACTUALIZAR TIPO DE CONTRATO </H6></div>
<?php
/************************************************************
****************** Eliminar Registros ***********************
************************************************************/
if(strtolower($_POST["del"]) == "eliminar")
{
	$sqldelexp = "delete from tcontrato where tcontrato_id='".(int)$_REQUEST["tcontrato_id"]."'";
	
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
				
			$sql="update tcontrato set tcontrato_nombre=UPPER('".$_REQUEST["tcontrato_nombre"]."') where tcontrato_id='".$_REQUEST["tcontrato_id"]."' ";
			if(mysql_query($sql,$con))
			{
				
					cuadro_mensaje("Tipo de Contrato actualizado correctamente...");
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
<form action="act_tcontrato.php" method="post">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">SELECCIONE EL TIPO DE CONTRATO</td>
			<tr>
			<?php
			echo '<td>
				
					<select name="tcontrato_id" id="tcontrato_id" >
					';	
					//listamos grupos para componer el select
					$consulta_uoi = mysql_query("SELECT * FROM tcontrato ORDER BY tcontrato_nombre");
					$n_uoi = mysql_num_rows($consulta_uoi);
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['tcontrato_id'].'">'.$reg_consulta_uoi['tcontrato_nombre'].' </option>';
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
if($_REQUEST["tcontrato_id"]!="")
{
$result=mysql_query("select * from tcontrato where tcontrato_id='".quitar($_REQUEST["tcontrato_id"])."' ",$con);
if(mysql_num_rows($result) == 1)
{
$tcontrato_id=mysql_result($result,0,"tcontrato_id");
$tcontrato_nombre=mysql_result($result,0,"tcontrato_nombre");
echo '<br />';
?>

<form name="registro" action="act_tcontrato.php" method="post" enctype="multipart/form-data">
	
	<table width="650" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS DEL TIPO DE CONTRATO</h3></td>
		</tr>
		<tr>
			<td class="tdatos">CÓDIGO</td>
			<td><input type="text" name="tcontrato_id" readonly="readonly" value="<?php echo $tcontrato_id; ?>" size="60" /></td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE DEL TIPO DE CONTRATO</td>
			<td><input type="text" name="tcontrato_nombre" value="<?php echo $tcontrato_nombre; ?>" size="60" /></td>
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
	cuadro_error("Tipo de Contrato No Encontrado <b><a href=reg_uoi.php  target=\"_self\">    Ir a Registrar</a></b>");	
}
}
?>

<?php
 echo "<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>
