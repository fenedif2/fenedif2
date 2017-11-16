<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><H6>Actualizar Datos PROYECTO </H6></div>
<?php
/************************************************************
****************** Eliminar Registros ***********************
************************************************************/
if(strtolower($_POST["del"]) == "eliminar")
{
	$sqldelexp = "delete from agrupamientos where agrupamiento='".$_REQUEST["agrupamiento"]."'";
	
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
				
			$sql="update agrupamientos set nombre='".$_REQUEST["nombre"]."',docente='".$_REQUEST["docente"]."',
			uoi='".$_REQUEST["uoi"]."',inicio='".$_REQUEST["inicio"]."',fin='".$_REQUEST["fin"]."',conv_nombre='".$_REQUEST["conv_nombre"]."',
			investigacion='".$_REQUEST["investigacion"]."' ,unesco='".$_REQUEST["unesco"]."' ,presupuesto='".$_REQUEST["presupuesto"]."',
			solicitado='".$_REQUEST["solicitado"]."',linvestigacion='".$_REQUEST["linvestigacion"]."',fondos='".$_REQUEST["fondos"]."'
			where agrupamiento='".$_REQUEST["agrupamiento"]."' ";
			if(mysql_query($sql,$con))
			{
					cuadro_mensaje("PROYECTO actualizado correctamente...");
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
<form action="act_proy.php" method="post">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">SELECCIONES NOMBRE DE PROYECTO</td>
			<tr>
			<?php
			echo '<td>
				
					<select name="agrupamiento" id="agrupamiento" >
					';	
					//listamos grupos para componer el select
					$consulta_uoi = mysql_query("SELECT * FROM agrupamientos ORDER BY nombre");
					$n_uoi = mysql_num_rows($consulta_uoi);
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['agrupamiento'].'">'.$reg_consulta_uoi['nombre'].'</option>';
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
if($_REQUEST["agrupamiento"]!="")
{
$result=mysql_query("select * from agrupamientos where agrupamiento='".quitar($_REQUEST["agrupamiento"])."' ",$con);
if(mysql_num_rows($result) == 1)
{
$agrupamiento=mysql_result($result,0,"agrupamiento");
$nombre=mysql_result($result,0,"nombre");
$docente=mysql_result($result,0,"docente");
$uoi=mysql_result($result,0,"uoi");
$inicio=mysql_result($result,0,"inicio");
$fin=mysql_result($result,0,"fin");
$conv_nombre=mysql_result($result,0,"conv_nombre");
$investigacion=mysql_result($result,0,"investigacion");
$unesco=mysql_result($result,0,"unesco");
$presupuesto=mysql_result($result,0,"presupuesto");
$solicitado=mysql_result($result,0,"solicitado");
$linvestigacion=mysql_result($result,0,"linvestigacion");
$fondos=mysql_result($result,0,"fondos");
echo '<br />';
?>

<form name="registro" action="act_proy.php" method="post" enctype="multipart/form-data">
	
	<table width="650" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS DEL TIPO DE PROYECTO</h3></td>
		</tr>
		<tr>
			<td class="tdatos">CODIGO DE PROYECTO</td>
			<td class="dtabla"><input type="text" name="agrupamiento" readonly="readonly"  value="<?php echo $agrupamiento?>" size="40" /></td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE DE PROYECTO</td>
			<td class="dtabla"><input type="text" name="nombre" value="<?php echo $nombre ?>" size="40" /></td>
		</tr>
		<tr>
			<td class="tdatos">FUNCIONARIO</td>
			<?php
			echo '<td>
				
					<select name="docente" id="docente" >
					';	
					$consulta_for = mysql_query("select * from docentes where docente ='$docente'");
					$reg_consulta_for = mysql_fetch_array($consulta_for);
					echo '<option value="'.$reg_consulta_for['docente'].'">'.$reg_consulta_for['nombres'].'   '.$reg_consulta_for['apellidos'].'</option>';
					$consulta_docentes = mysql_query("select * from docentes");
					$n_docentes = mysql_num_rows($consulta_docentes);
					for($d=0;$d<$n_docentes;$d++)
						{
							$reg_consulta_docentes = mysql_fetch_array($consulta_docentes);
							echo '<option value="'.$reg_consulta_docentes['docente'].'">'.$reg_consulta_docentes['nombres'].'   '.$reg_consulta_docentes['apellidos'].'</option>';
						}
				echo '	
				</select>
			
			</td>';
			?>  
			  
		</tr>
		<tr>
			<td class="tdatos">UNIDAD OPERATIVA-DEPARTAMENTO</td>
			<?php
			echo '<td>
				
					<select name="uoi" id="uoi" >
					';	
					//listamos grupos para componer el select
					$consulta_for = mysql_query("select * from uoi where id_uoi ='$uoi'");
					$reg_consulta_for = mysql_fetch_array($consulta_for);
					echo '<option value="'.$reg_consulta_for['id_uoi'].'">'.$reg_consulta_for['uoi_nombre'].'</option>';
					$consulta_uoi = mysql_query("SELECT * FROM uoi ORDER BY uoi_nombre");
					$n_uoi = mysql_num_rows($consulta_uoi);
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['id_uoi'].'">'.$reg_consulta_uoi['uoi_nombre'].' </option>';
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
			<td class="tdatos">CONVOCATORIA</td>
			<?php
			echo '<td>
				
					<select name="conv_nombre" id="conv_nombre" >
					';	
					//listamos grupos para componer el select
					$consulta_for = mysql_query("select * from convocatoria where id_convocatoria ='$conv_nombre'");
					$reg_consulta_for = mysql_fetch_array($consulta_for);
					echo '<option value="'.$reg_consulta_for['id_convocatoria'].'">'.$reg_consulta_for['conv_nombre'].'</option>';	
					$consulta_conv = mysql_query("select * from convocatoria");
					$n_conv = mysql_num_rows($consulta_conv);
					for($d=0;$d<$n_conv;$d++)
						{
							$reg_consulta_conv = mysql_fetch_array($consulta_conv);
							echo '<option value="'.$reg_consulta_conv['id_convocatoria'].'">'.$reg_consulta_conv['conv_nombre'].' </option>';
						}
				echo '	
				</select>
			</td>';
			?>
		</tr>	
		<tr>
			<td class="tdatos">TIPO INVESTIGACION</td>
			<?php
			echo '<td>
				
					<select name="investigacion" id="investigacion" >
					';	
					$consulta_for = mysql_query("select * from investigacion where clave ='$investigacion'");
					$reg_consulta_for = mysql_fetch_array($consulta_for);
					echo '<option value="'.$reg_consulta_for['clave'].'">'.$reg_consulta_for['nombre'].'</option>';	
					//listamos grupos para componer el select
					$consulta_conv = mysql_query("select * from investigacion");
					$n_conv = mysql_num_rows($consulta_conv);
					for($d=0;$d<$n_conv;$d++)
						{
							$reg_consulta_conv = mysql_fetch_array($consulta_conv);
							echo '<option value="'.$reg_consulta_conv['clave'].'">'.$reg_consulta_conv['nombre'].' </option>';
						}
				echo '	
				</select>
			</td>';
			?>
		</tr>	
		<tr>
			<td class="tdatos">UNESCO</td>
			<?php
			echo '<td>
				
					<select name="unesco" id="unesco" >
					';	
					$consulta_for = mysql_query("select * from unesco where clave ='$unesco'");
					$reg_consulta_for = mysql_fetch_array($consulta_for);
					echo '<option value="'.$reg_consulta_for['clave'].'">'.$reg_consulta_for['nombre'].'</option>';	
					//listamos grupos para componer el select
					$consulta_conv = mysql_query("select * from unesco");
					$n_conv = mysql_num_rows($consulta_conv);
					for($d=0;$d<$n_conv;$d++)
						{
							$reg_consulta_conv = mysql_fetch_array($consulta_conv);
							echo '<option value="'.$reg_consulta_conv['clave'].'">'.$reg_consulta_conv['nombre'].' </option>';
						}
				echo '	
				</select>
			</td>';
			?>
		</tr>
		<tr>
			<td class="tdatos">PRESUPUESTO</td>
			<td class="dtabla"><input type="text" name="presupuesto" value="<?php echo $presupuesto ?>" size="40" /></td>
		</tr>
		<tr>
			<td class="tdatos">SOLICITADO</td>
			<td class="dtabla"><input type="text" name="solicitado" value="<?php echo $solicitado ?>" size="40" /></td>
		</tr>
		<tr>
			<td class="tdatos">LINEA DE INVESTIGACION</td>
			<?php
			echo '<td>
				
					<select name="linvestigacion" id="linvestigacion" >
					';	
					$consulta_for = mysql_query("select * from linvestigacion where id_linvestigacion ='$linvestigacion'");
					$reg_consulta_for = mysql_fetch_array($consulta_for);
					echo '<option value="'.$reg_consulta_for['id_linvestigacion'].'">'.$reg_consulta_for['linvest_nombre'].'</option>';	
					//listamos grupos para componer el select
					$consulta_linvest = mysql_query("select * from linvestigacion");
					$n_linvest = mysql_num_rows($consulta_linvest);
					for($d=0;$d<$n_linvest;$d++)
						{
						$reg_consulta_linvest = mysql_fetch_array($consulta_linvest);
						echo '<option value="'.$reg_consulta_linvest['id_linvestigacion'].'">'.$reg_consulta_linvest['linvest_nombre'].' </option>';
						}
				echo '	
				</select>
			</td>';
			?>
		</tr>	
		<tr>
			<td class="tdatos">FONDO INTERNACIONAL</td>
			<td class="dtabla"><input type="text" name="fondos" value="<?php echo $fondos ?>" size="40" /></td>
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
	cuadro_error("TIPO DE PROYECTO No Encontrado <b><a href=reg_unes.php  target=\"_self\">    Ir a Registrar</a></b>");	
}
}
?>

<?php
 echo "<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>
