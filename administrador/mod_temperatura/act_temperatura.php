<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><H6>ACTUALIZAR TEMPERATURA</H6></div>
<?php
/************************************************************
****************** Eliminar Registros ***********************
************************************************************/
if(strtolower($_POST["del"]) == "eliminar")
{
	$sqldelexp = "delete from temperatura where temperatura_id='".$_REQUEST["temperatura_id"]."'";
	
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
				
			$sql="update temperatura set temperatura_nombre=UPPER('".$_REQUEST["temperatura_nombre"]."') where temperatura_id='".$_REQUEST["temperatura_id"]."' ";
			if(mysql_query($sql,$con))
			{
				
					cuadro_mensaje("TEMPERATURA ACTUALIZADO CORRECTAMENTE...");
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
<form action="act_temperatura.php" method="post">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">SELECCIONE TEMPERATURA</td>
			<tr>
			<?php
			echo '<td>
				
					<select name="temperatura_id" id="temperatura_id" >
					';	
					//listamos grupos para componer el select
					$consulta_uoi = mysql_query("SELECT * FROM temperatura ORDER BY temperatura_nombre");
					$n_uoi = mysql_num_rows($consulta_uoi);
					echo '<option>SELECCIONE TEMPERATURA</option>';
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['temperatura_id'].'">'.$reg_consulta_uoi['temperatura_nombre'].' </option>';
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
if($_REQUEST["temperatura_id"]!="")
{
$result=mysql_query("select * from temperatura where temperatura_id='".quitar($_REQUEST["temperatura_id"])."' ",$con);
if(mysql_num_rows($result) == 1)
{
$temperatura_id=mysql_result($result,0,"temperatura_id");
$temperatura_nombre=mysql_result($result,0,"temperatura_nombre");
echo '<br />';
?>

<form name="registro" action="act_temperatura.php" method="post" enctype="multipart/form-data">
	
	<table width="650" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS DEL TIPO DE  TRABAJADOR/FUNCIONARIO</h3></td>
		</tr>
		<tr>
			<td class="tdatos">Código</td>
			<td><input type="text" name="temperatura_id" readonly="readonly" style="background-color:#F7D358" value="<?php echo $temperatura_id; ?>" size="60" /></td>
		</tr>
		<tr>
			<td class="tdatos">Nombre Temperatura</td>
			<td><input type="text" name="temperatura_nombre" value="<?php echo $temperatura_nombre; ?>" size="60" /></td>
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
	cuadro_error("Temperatura Encontrado <b><a href=reg_temperatura.php  target=\"_self\">    Ir a Registrar</a></b>");	
}
}
?>

<?php
 echo "<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>
