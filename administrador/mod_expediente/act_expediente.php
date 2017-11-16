<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><H6>ACTUALIZAR DATOS DEL EXPEDIENTE</H6></div>
<?php
/************************************************************
****************** Eliminar Registros ***********************
************************************************************/
if(strtolower($_POST["del"]) == "eliminar")
{
	$sqldelexp = "delete from expediente where expediente_id='".$_REQUEST["expediente_id"]."'";
	
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
				
			$sql="update expediente set expediente_nombre=UPPER('".$_REQUEST["expediente_nombre"]."'),canton=UPPER('".$_REQUEST["canton"]."'),parroquia=UPPER('".$_REQUEST["parroquia"]."'),
			expediente_sector=UPPER('".$_REQUEST["expediente_sector"]."'),expediente_superficie=UPPER('".$_REQUEST["expediente_superficie"]."'),
			respbrigada_id=UPPER('".$_REQUEST["respbrigada"]."'),
			inicio=UPPER('".$_REQUEST["inicio"]."'),fin=UPPER('".$_REQUEST["fin"]."'),memo_id=UPPER('".$_REQUEST["memo"]."')			
			where expediente_id='".$_REQUEST["expediente_id"]."' ";
			if(mysql_query($sql,$con))
			{
					cuadro_mensaje("Expediente actualizado correctamente...");
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
<form action="act_expediente.php" method="post">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">SELECCIONES NOMBRE DE EXPEDIENTE</td>
			<tr>
			<?php
			echo '<td>
				
					<select name="expediente_id" id="expediente_id" >
					';	
					//listamos grupos para componer el select
					$consulta_departamento = mysql_query("SELECT * FROM expediente ORDER BY expediente_id");
					$n_departamento = mysql_num_rows($consulta_departamento);
					for($d=0;$d<$n_departamento;$d++)
					{
					$reg_consulta_departamento = mysql_fetch_array($consulta_departamento);
					echo '<option value="'.$reg_consulta_departamento['expediente_id'].'">'.$reg_consulta_departamento['expediente_nombre'].'</option>';
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
if($_REQUEST["expediente_id"]!="")
{
$result=mysql_query("select * from expediente where expediente_id='".quitar($_REQUEST["expediente_id"])."' ",$con);
if(mysql_num_rows($result) == 1)
{
$expediente_id=mysql_result($result,0,"expediente_id");
$expediente_codigo=mysql_result($result,0,"expediente_codigo");
$expediente_cedula=mysql_result($result,0,"expediente_cedula");
$expediente_nombre=mysql_result($result,0,"expediente_nombre");
$canton=mysql_result($result,0,"canton");
$parroquia=mysql_result($result,0,"parroquia");
$expediente_sector=mysql_result($result,0,"expediente_sector");
$expediente_superficie=mysql_result($result,0,"expediente_superficie");
$respbrigada=mysql_result($result,0,"respbrigada_id");
$inicio=mysql_result($result,0,"inicio");
$fin=mysql_result($result,0,"fin");
$memo=mysql_result($result,0,"memo_id");
$avance=mysql_result($result,0,"avance");
echo '<br />';
?>

<form name="registro" action="act_expediente.php" method="post" enctype="multipart/form-data">
	
	<table width="650" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS DEL TIPO DE EXPEDIENTE</h3></td>
		</tr>
		<tr>
			<td class="tdatos">CÓDIGO DE EXPEDIENTE</td>
			<td class="dtabla"><input type="text" name="expediente_id" readonly="readonly"  value="<?php echo $expediente_id?>" size="40" /></td>
		</tr>
		<tr>
			<td class="tdatos">EXPEDIENTE</td>
			<td class="dtabla"><input type="text" name="expediente_codigo" readonly="readonly"  value="<?php echo $expediente_codigo?>" size="40" /></td>
		</tr>
		<tr>
			<td class="tdatos">CÉDULA</td>
			<td class="dtabla"><input type="text" name="expediente_cedula" readonly="readonly"  value="<?php echo $expediente_cedula?>" size="40" /></td>
		</tr>
		<tr>
			<td class="tdatos">BENEFICIARIO</td>
			<td class="dtabla"><input type="text" name="expediente_nombre" value="<?php echo $expediente_nombre ?>" size="40" /></td>
		</tr>
		<tr>
			<td class="tdatos">CANTON</td>
			<?php
			echo '<td>
				
					<select name="canton" id="canton" >
					';	
					$consulta_for = mysql_query("select * from lista_estados where id ='$canton'");
					$reg_consulta_for = mysql_fetch_array($consulta_for);
					echo '<option value="'.$reg_consulta_for['id'].'">'.$reg_consulta_for['opcion'].'</option>';
					$consulta_respbrigadaes = mysql_query("select * from lista_estados");
					$n_respbrigadaes = mysql_num_rows($consulta_respbrigadaes);
					for($d=0;$d<$n_respbrigadaes;$d++)
						{
							$reg_consulta_respbrigadaes = mysql_fetch_array($consulta_respbrigadaes);
							echo '<option value="'.$reg_consulta_respbrigadaes['id'].'">'.$reg_consulta_respbrigadaes['opcion'].'</option>';
						}
				echo '	
				</select>
			
			</td>';
			?>  
			  
		</tr>
		<tr>
			<td class="tdatos">PARROQUIA</td>
			<?php
			echo '<td>
				
					<select name="parroquia" id="parroquia" >
					';	
					$consulta_for = mysql_query("select * from lista_parroquias where id ='$parroquia'");
					$reg_consulta_for = mysql_fetch_array($consulta_for);
					echo '<option value="'.$reg_consulta_for['id'].'">'.$reg_consulta_for['opcion'].'</option>';
					$consulta_respbrigadaes = mysql_query("select * from lista_parroquias");
					$n_respbrigadaes = mysql_num_rows($consulta_respbrigadaes);
					for($d=0;$d<$n_respbrigadaes;$d++)
						{
							$reg_consulta_respbrigadaes = mysql_fetch_array($consulta_respbrigadaes);
							echo '<option value="'.$reg_consulta_respbrigadaes['id'].'">'.$reg_consulta_respbrigadaes['opcion'].'</option>';
						}
				echo '	
				</select>
			
			</td>';
			?>  
			  
		</tr>
		<tr>
			<td class="tdatos">SECTOR</td>
			<td class="dtabla"><input type="text" name="expediente_sector" value="<?php echo $expediente_sector ?>" size="40" /></td>
		</tr>
		<tr>
			<td class="tdatos">SUPERFICIE</td>
			<td class="dtabla"><input type="text" name="expediente_superficie" value="<?php echo $expediente_superficie ?>" size="40" /></td>
		</tr>
		<tr>
			<td class="tdatos">RESPONSABLE DE BRIGADA</td>
			<?php
			echo '<td>
				
					<select name="respbrigada" id="respbrigada" >
					';	
					$consulta_for = mysql_query("select * from respbrigada where respbrigada_id ='$respbrigada'");
					$reg_consulta_for = mysql_fetch_array($consulta_for);
					echo '<option value="'.$reg_consulta_for['respbrigada_id'].'">'.$reg_consulta_for['nombres'].'   '.$reg_consulta_for['apellidos'].'</option>';
					$consulta_respbrigadaes = mysql_query("select * from respbrigada");
					$n_respbrigadaes = mysql_num_rows($consulta_respbrigadaes);
					for($d=0;$d<$n_respbrigadaes;$d++)
						{
							$reg_consulta_respbrigadaes = mysql_fetch_array($consulta_respbrigadaes);
							echo '<option value="'.$reg_consulta_respbrigadaes['respbrigada_id'].'">'.$reg_consulta_respbrigadaes['nombres'].'   '.$reg_consulta_respbrigadaes['apellidos'].'</option>';
						}
				echo '	
				</select>
			
			</td>';
			?>  
			  
		</tr>
		<tr>
		<td  class="tdatos">FECHA INICIO</td>
			
				<html>
						  <head>
						    <title>Dynarch Calendar -- Simple popup calendar</title>
						    <script src="../theme/js/jscal2.js"></script>
						    <script src="../theme/js/lang/en.js"></script>
						    <link rel="stylesheet" type="text/css" href="../theme/css/jscal2.css" />
						    <link rel="stylesheet" type="text/css" href="../theme/css/border-radius.css" />
						    <link rel="stylesheet" type="text/css" href="../theme/css/steel/steel.css" />
						  </head>
						  <body>
						    <td class="dtabla"><input size="30" id="inicio" name="inicio" value="<?php echo $inicio?>"> <button id="f_btn1">...</button><br /></td>
						
						    <script type="text/javascript">//<![CDATA[
						      Calendar.setup({
						        inputField : "inicio",
						        trigger    : "f_btn1",
						        onSelect   : function() { this.hide() },
						        showTime   : 12,
						        dateFormat : "%Y-%m-%d"
						      });
						    //]]></script>
						  </body>
					</html>
		</tr>	
		<tr>
			<td  class="tdatos">FECHA FIN</td>
			
				<html>
						  <head>
						    <title>Dynarch Calendar -- Simple popup calendar</title>
						    <script src="../theme/js/jscal2.js"></script>
						    <script src="../theme/js/lang/en.js"></script>
						    <link rel="stylesheet" type="text/css" href="../theme/css/jscal2.css" />
						    <link rel="stylesheet" type="text/css" href="../theme/css/border-radius.css" />
						    <link rel="stylesheet" type="text/css" href="../theme/css/steel/steel.css" />
						  </head>
						  <body>
						    <td class="dtabla"><input size="30" id="fin" name="fin" value="<?php echo $fin ?>"> <button id="f_btn">...</button><br /></td>
						
						    <script type="text/javascript">//<![CDATA[
						      Calendar.setup({
						        inputField : "fin",
						        trigger    : "f_btn",
						        onSelect   : function() { this.hide() },
						        showTime   : 12,
						        dateFormat : "%Y-%m-%d"
						      });
						    //]]></script>
						  </body>
					</html>
		</tr>	
		<tr>
			<td class="tdatos">MEMORÁNDUM</td>
			<?php
			echo '<td>
				
					<select name="memo" id="memo" >
					';	
					//listamos grupos para componer el select
					$consulta_for = mysql_query("select * from memo where memo_id ='$memo'");
					$reg_consulta_for = mysql_fetch_array($consulta_for);
					echo '<option value="'.$reg_consulta_for['memo_id'].'">'.$reg_consulta_for['memo_nombre'].'</option>';	
					$consulta_conv = mysql_query("select * from memo");
					$n_conv = mysql_num_rows($consulta_conv);
					for($d=0;$d<$n_conv;$d++)
						{
							$reg_consulta_conv = mysql_fetch_array($consulta_conv);
							echo '<option value="'.$reg_consulta_conv['memo_id'].'">'.$reg_consulta_conv['memo_nombre'].' </option>';
						}
				echo '	
				</select>
			</td>';
			?>
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
	cuadro_error("TIPO DE Expediente No Encontrado <b><a href=reg_expediente.php  target=\"_self\">    Ir a Registrar</a></b>");	
}
}
?>

<?php
 echo "<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>
