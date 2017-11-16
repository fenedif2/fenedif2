<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><H6>ACTUALIZAR FINANCIAMIENTO</H6></div>
<?php
/************************************************************
****************** Eliminar Registros ***********************
************************************************************/
if(strtolower($_POST["del"]) == "eliminar")
{
	$sqldelexp = "delete from tfinanciamiento where tfinanciamiento_id='".$_REQUEST["tfinanciamiento_id"]."'";
	
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
				
			$sql="update tfinanciamiento set tfinanciamiento_descripcion=UPPER('".$_REQUEST["tfinanciamiento_descripcion"]."') where tfinanciamiento_id='".$_REQUEST["tfinanciamiento_id"]."' ";
			if(mysql_query($sql,$con))
			{
				
					cuadro_mensaje("FINANCIAMIENTO ACTUALIZADO CORRECTAMENTE...");
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
<form action="act_financiamiento.php" method="post">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">SELECCIONE FINANCIAMIENTO</td>
			<tr>
			<?php
			echo '<td>
				
					<select name="tfinanciamiento_id" id="tfinanciamiento_id" >
					';	
					//listamos grupos para componer el select
					$consulta_uoi = mysql_query("SELECT * FROM tfinanciamiento ORDER BY tfinanciamiento_descripcion");
					$n_uoi = mysql_num_rows($consulta_uoi);
					echo '<option>SELECCIONE FINANCIAMIENTO</option>';
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['tfinanciamiento_id'].'">'.$reg_consulta_uoi['tfinanciamiento_descripcion'].' </option>';
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
if($_REQUEST["tfinanciamiento_id"]!="")
{
$result=mysql_query("select * from tfinanciamiento where tfinanciamiento_id='".quitar($_REQUEST["tfinanciamiento_id"])."' ",$con);
if(mysql_num_rows($result) == 1)
{
$tfinanciamiento_id=mysql_result($result,0,"tfinanciamiento_id");
$tfinanciamiento_descripcion=mysql_result($result,0,"tfinanciamiento_descripcion");
echo '<br />';
?>

<form name="registro" action="act_financiamiento.php" method="post" enctype="multipart/form-data">
	
	<table width="650" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS FINANCIAMIENTO</h3></td>
		</tr>
		<tr>
			<td class="tdatos">CÓDIGO</td>
			<td><input type="text" name="tfinanciamiento_id" readonly="readonly" style="background-color:#F7D358" value="<?php echo $tfinanciamiento_id; ?>" size="60" /></td>
		</tr>
		<tr>
			<td class="tdatos">MONTO FINANCIAMIENTO</td>
			<td><input type="text" name="tfinanciamiento_descripcion" value="<?php echo $tfinanciamiento_descripcion; ?>" size="60" /></td>
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
	cuadro_error("Temperatura Encontrado <b><a href=reg_financiamiento.php  target=\"_self\">    Ir a Registrar</a></b>");	
}
}
?>

<?php
 echo "<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>
