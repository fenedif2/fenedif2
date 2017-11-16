<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><H6>ACTUALIZAR AUTO IDENTIFICACIÓN ÉTNICA </H6></div>
<?php
/************************************************************
****************** Eliminar Registros ***********************
************************************************************/
if(strtolower($_POST["del"]) == "eliminar")
{
	$sqldelexp = "delete from etnia where etnia_id='".(int)$_REQUEST["etnia_id"]."'";
	
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
				
			$sql="update etnia set etnia_nombre=UPPER('".$_REQUEST["etnia_nombre"]."') where etnia_id='".$_REQUEST["etnia_id"]."' ";
			if(mysql_query($sql,$con))
			{
				
					cuadro_mensaje("AUTO IDENTIFICACIÓN ÉTNICA ACTUALIZAO CORRECTAMENTE...");
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
<form action="act_etnica.php" method="post">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">SELECCIONE AUTOIDENTIFICACIÓN ÉTNICA</td>
			<tr>
			<?php
			echo '<td>
				
					<select name="etnia_id" id="etnia_id" >
					';	
					//listamos grupos para componer el select
					$consulta_uoi = mysql_query("SELECT * FROM etnia ORDER BY etnia_nombre");
					$n_uoi = mysql_num_rows($consulta_uoi);
					echo '<option>SELECCIONE ÉTNIA</option>';
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['etnia_id'].'">'.$reg_consulta_uoi['etnia_nombre'].' </option>';
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
if($_REQUEST["etnia_id"]!="")
{
$result=mysql_query("select * from etnia where etnia_id='".quitar($_REQUEST["etnia_id"])."' ",$con);
if(mysql_num_rows($result) == 1)
{
$etnia_id=mysql_result($result,0,"etnia_id");
$etnia_nombre=mysql_result($result,0,"etnia_nombre");
echo '<br />';
?>

<form name="registro" action="act_etnica.php" method="post" enctype="multipart/form-data">
	
	<table width="650" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS DEL AUTO IDENTIFICACIÓN ÉTNICA</h3></td>
		</tr>
		<tr>
			<td class="tdatos">CÓDIGO</td>
			<td><input type="text" name="etnia_id" readonly="readonly" style="background-color:#F7D358" value="<?php echo $etnia_id; ?>" size="60" /></td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE AUTO IDENTIFICACÓON ÉTNICA</td>
			<td><input type="text" name="etnia_nombre" value="<?php echo $etnia_nombre; ?>" size="60" /></td>
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
	cuadro_error("AUTO IDENTIFICACIÓN ÉTNICA NO ENCONTRADO <b><a href=reg_etnica.php  target=\"_self\">    Ir a Registrar</a></b>");	
}
}
?>

<?php
 echo "<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>
