<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><h6>PROYECTO</h6></div>
<?php
if (strtolower($_REQUEST["acc"])=="registrar")
{
		//validaciones 
		if($_REQUEST["agrupamiento"]=="" )
		{
				
			cuadro_error("Debe llenar el campo del PROYECTO");
			//echo $_REQUEST["uoi"];
			//echo $_REQUEST["investigacion"];
			//echo $_REQUEST["unesco"];
			
		}
			else
			{
				$sql="insert into agrupamientos (agrupamiento,nombre,docente,uoi,inicio,fin,conv_nombre,investigacion,unesco,
				presupuesto,solicitado,linvestigacion,fondos) values
				('".$_REQUEST["agrupamiento"]."','".$_REQUEST["nombre"]."','".$_REQUEST["docente"]."','".$_REQUEST["uoi"]."',
				'".$_REQUEST["inicio"]."','".$_REQUEST["fin"]."','".$_REQUEST["conv_nombre"]."','".$_REQUEST["investigacion"]."',
				'".$_REQUEST["unesco"]."','".$_REQUEST["presupuesto"]."','".$_REQUEST["solicitado"]."','".$_REQUEST["linvestigacion"]."','".$_REQUEST["fondos"]."')";
							
							if(mysql_query($sql,$con))
							{
									cuadro_mensaje("PROYECTO registrado Correctamente...");
					 				echo "<br><br><br><br><br>";
									require("../theme/footer_inicio.php");
									exit;
							}
								else
								{
									cuadro_error(mysql_error());
								}
						
			}//sino hay imagen asigna una por defecto
							//donde se llevan los datos a la BD
							
		
}
?>

<form name="registro" action="reg_proy.php" method="post" enctype="multipart/form-data">
	<table width="700" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>PROYECTO</h3></td>
		</tr>
		<tr>
			<td>1. REGISTRAR PROYECTO</td>
		</tr>
		<tr>
			<td class="tdatos">CODIGO DDE PROYECTO</td>
			<td class="dtabla"><input type="text" name="agrupamiento" value="<?php echo $_REQUEST["agrupamiento"]; ?>" size="40" /></td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE DE PROYECTO</td>
			<td class="dtabla"><input type="text" name="nombre" value="<?php echo $_REQUEST["nombre"]; ?>" size="40" /></td>
		</tr>
		<tr>
			<td class="tdatos">FUNCIONARIO</td>
			<?php
			echo '<td>
				
					<select name="docente" id="docente" >
					';	
					//listamos grupos para componer el select
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
						    <td class="dtabla"><input size="30" id="inicio" name="inicio" value="<?php echo $_REQUEST["inicio"]; ?>"> <button id="f_btn1">...</button><br /></td>
						
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
						    <td class="dtabla"><input size="30" id="fin" name="fin" value="<?php echo $_REQUEST["fin"]; ?>"> <button id="f_btn">...</button><br /></td>
						
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
			<td class="dtabla"><input type="text" name="presupuesto" value="<?php echo $_REQUEST["presupuesto"]; ?>" size="40" /></td>
		</tr>
		<tr>
			<td class="tdatos">SOLICITADO</td>
			<td class="dtabla"><input type="text" name="solicitado" value="<?php echo $_REQUEST["solicitado"]; ?>" size="40" /></td>
		</tr>	
		<tr>
			<td class="tdatos">LINEA DE INVESTIGACION</td>
			<?php
			echo '<td>
				
					<select name="linvestigacion" id="linvestigacion" >
					';	
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
			<td class="dtabla"><input type="text" name="fondos" value="<?php echo $_REQUEST["fondos"]; ?>" size="40" /></td>
		</tr>			
		<tr>
			<td colspan="2" align="center"><input type="submit" name="acc" value="Registrar">
			<input name="Restablecer" type="reset" value="Limpiar" /></td>
		</tr>
	</table>
</form>
<?php
require("../theme/footer_inicio.php");
?>