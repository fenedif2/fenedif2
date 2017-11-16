<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><H6>ADAPTACIÓN</H6></div>
<?php
if (strtolower($_REQUEST["acc"])=="registrar")
{
		//validaciones 
		if($_REQUEST["adaptacion_nombre"]=="" )
		{
			cuadro_error("DEBE LLENAR EL CAMPO ADAPTACIÓN");
		}
			else
			{
	
				$sql="insert into adaptacion (adaptacion_nombre) values(UPPER('".$_REQUEST["adaptacion_nombre"]."'))";
							
							if(mysql_query($sql,$con))
							{
									cuadro_mensaje("ADAPTACIÓN REGISTRADO CORRECTAMENTE...");
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

<form name="registro" action="reg_adaptacion.php" method="post" enctype="multipart/form-data">
	<table width="700" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>ADAPTACIÓN</h3></td>
		</tr>
		<tr>
			<td>1.REGISTRAR ADAPTACIÓN</td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE ADAPTACIÓN</td>
			<td class="dtabla"><input type="text" name="adaptacion_nombre" value="<?php echo $_REQUEST["adaptacion_nombre"]; ?>" size="40" /></td>
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