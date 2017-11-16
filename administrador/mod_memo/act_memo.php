<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><h6>ACTUALIZAR DATOS DEL MEMORÁNDUM</h6> </div>
<?php
/************************************************************
****************** Eliminar Registros ***********************
************************************************************/
if(strtolower($_POST["del"]) == "eliminar")
{
	$sqldelexp = "delete from memo where memo_id='".(int)$_REQUEST["memo_id"]."'";
	
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
				
			$sql="update memo set memo_nombre=UPPER('".$_REQUEST["memo_nombre"]."') where memo_id='".$_REQUEST["memo_id"]."' ";
			if(mysql_query($sql,$con))
			{
				
					cuadro_mensaje("memorándum actualizado correctamente...");
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
<form action="act_memo.php" method="post">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">Seleccione el nombre de la memo</td>
			<tr>
			<?php
			echo '<td>
				
					<select name="memo_id" id="memo_id" >
					';	
					//listamos grupos para componer el select
					$consulta_memo = mysql_query("SELECT * FROM memo ORDER BY memo_nombre");
					$n_memo = mysql_num_rows($consulta_memo);
					for($d=0;$d<$n_memo;$d++)
					{
					$reg_consulta_memo = mysql_fetch_array($consulta_memo);
					echo '<option value="'.$reg_consulta_memo['memo_id'].'">'.$reg_consulta_memo['memo_nombre'].' </option>';
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
if($_REQUEST["memo_id"]!="")
{
$result=mysql_query("select * from memo where memo_id='".quitar($_REQUEST["memo_id"])."' ",$con);
if(mysql_num_rows($result) == 1)
{
$memo_id=mysql_result($result,0,"memo_id");
$memo_nombre=mysql_result($result,0,"memo_nombre");
echo '<br />';
?>

<form name="registro" action="act_memo.php" method="post" enctype="multipart/form-data">
	
	<table width="650" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS DEL MEMORÁNDUM</h3></td>
		</tr>
		<tr>
			<td class="tdatos">CÓDIGO</td>
			<td><input type="text" name="memo_id" readonly="readonly" value="<?php echo $memo_id; ?>" size="60" /></td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE DEL MEMORÁNDUM</td>
			<td><input type="text" name="memo_nombre" value="<?php echo $memo_nombre; ?>" size="60" /></td>
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
	cuadro_error("Memorándum No Encontrado <b><a href=reg_memo.php  target=\"_self\">    Ir a Registrar</a></b>");	
}
}
?>

<?php
 echo "<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>
