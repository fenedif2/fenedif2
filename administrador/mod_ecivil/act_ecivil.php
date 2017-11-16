<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><H6>ESTADO CIVIL </H6></div>
<?php
/************************************************************
****************** Eliminar Registros ***********************
************************************************************/
if(strtolower($_POST["del"]) == "eliminar")
{
	$sqldelexp = "delete from estadocivil where estadocivil_id='".(int)$_REQUEST["estadocivil_id"]."'";
	
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
				
			$sql="update estadocivil set estadocivil_nombre=UPPER('".$_REQUEST["estadocivil_nombre"]."') where estadocivil_id='".$_REQUEST["estadocivil_id"]."' ";
			if(mysql_query($sql,$con))
			{
				
					cuadro_mensaje("ESTADO CIVIL ACTUALIZAO CORRECTAMENTE...");
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
<form action="act_ecivil.php" method="post">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">SELECCIONE ESTADO CIVIL</td>
			<tr>
			<?php
			echo '<td>
				
					<select name="estadocivil_id" id="estadocivil_id" >
					';	
					//listamos grupos para componer el select
					$consulta_uoi = mysql_query("SELECT * FROM estadocivil ORDER BY estadocivil_id");
					$n_uoi = mysql_num_rows($consulta_uoi);
					echo '<option>SELECCIONE ESTADO CIVIL</option>';
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['estadocivil_id'].'">'.$reg_consulta_uoi['estadocivil_nombre'].' </option>';
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
if($_REQUEST["estadocivil_id"]!="")
{
$result=mysql_query("select * from estadocivil where estadocivil_id='".quitar($_REQUEST["estadocivil_id"])."' ",$con);
if(mysql_num_rows($result) == 1)
{
$estadocivil_id=mysql_result($result,0,"estadocivil_id");
$estadocivil_nombre=mysql_result($result,0,"estadocivil_nombre");
echo '<br />';
?>

<form name="registro" action="act_ecivil.php" method="post" enctype="multipart/form-data">
	
	<table width="650" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS ESTADO CIVIL</h3></td>
		</tr>
		<tr>
			<td class="tdatos">CÓDIGO</td>
			<td><input type="text" name="estadocivil_id" readonly="readonly" style="background-color:#F7D358" value="<?php echo $estadocivil_id; ?>" size="60" /></td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE ESTADO CIVIL</td>
			<td><input type="text" name="estadocivil_nombre" value="<?php echo $estadocivil_nombre; ?>" size="60" /></td>
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
	cuadro_error("ESTADO CIVIL NO ENCONTRADO <b><a href=reg_ecivil.php  target=\"_self\">    Ir a Registrar</a></b>");	
}
}
?>

<?php
 echo "<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>
