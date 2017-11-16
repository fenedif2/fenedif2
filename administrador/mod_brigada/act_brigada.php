<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo">ACTUALIZAR BRIGADA </div>
<?php
/************************************************************
****************** Eliminar Registros ***********************
************************************************************/
if(strtolower($_POST["del"]) == "eliminar")
{
	$sqldelexp = "delete from brigada where brigada_id='".(int)$_REQUEST["brigada_id"]."'";
	
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
				
			$sql="update brigada set brigada_nombre=UPPER('".$_REQUEST["brigada_nombre"]."') where brigada_id='".$_REQUEST["brigada_id"]."' ";
			if(mysql_query($sql,$con))
			{
				
					cuadro_mensaje("brigada actualizado correctamente...");
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
<form action="act_brigada.php" method="post">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">Seleccione el nombre de la brigada</td>
			<tr>
			<?php
			echo '<td>
				
					<select name="brigada_id" id="brigada_id" >
					';	
					//listamos grupos para componer el select
					$consulta_brigada = mysql_query("SELECT * FROM brigada ORDER BY brigada_nombre");
					$n_brigada = mysql_num_rows($consulta_brigada);
					for($d=0;$d<$n_brigada;$d++)
					{
					$reg_consulta_brigada = mysql_fetch_array($consulta_brigada);
					echo '<option value="'.$reg_consulta_brigada['brigada_id'].'">'.$reg_consulta_brigada['brigada_nombre'].' </option>';
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
if($_REQUEST["brigada_id"]!="")
{
$result=mysql_query("select * from brigada where brigada_id='".quitar($_REQUEST["brigada_id"])."' ",$con);
if(mysql_num_rows($result) == 1)
{
$brigada_id=mysql_result($result,0,"brigada_id");
$brigada_nombre=mysql_result($result,0,"brigada_nombre");
echo '<br />';
?>

<form name="registro" action="act_brigada.php" method="post" enctype="multipart/form-data">
	
	<table width="650" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS DE LA BRIGADA</h3></td>
		</tr>
		<tr>
			<td class="tdatos">CÓDIGO</td>
			<td><input type="text" name="brigada_id" readonly="readonly" value="<?php echo $brigada_id; ?>" size="60" /></td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE DE LA BRIGADA</td>
			<td><input type="text" name="brigada_nombre" value="<?php echo $brigada_nombre; ?>" size="60" /></td>
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
	cuadro_error("Paciente No Encontrado <b><a href=reg_brigada.php  target=\"_self\">    Ir a Registrar</a></b>");	
}
}
?>

<?php
 echo "<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>
