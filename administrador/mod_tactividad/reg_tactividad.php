<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><H6>TIPO ACTIVIDAD</H6></div>
<?php
if (strtolower($_REQUEST["acc"])=="registrar")
{
		//validaciones 
		if($_REQUEST["tactividad_descripcion"]=="" )
		{
			cuadro_error("DEBE LLENAR EL CAMPO TIPO ACTIVIDAD");
		}
			else
			{
	
				$sql="insert into tactividad (tactividad_descripcion) values(UPPER('".$_REQUEST["tactividad_descripcion"]."'))";
							
							if(mysql_query($sql,$con))
							{
									cuadro_mensaje("TIPO ACTIVIDAD REGISTRADO CORRECTAMENTE...");
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

<form name="registro" action="reg_tactividad.php" method="post" enctype="multipart/form-data">
	<table width="700" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>TIPO ACTIVIDAD</h3></td>
		</tr>
		<tr>
			<td>1.REGISTRAR TIPO ACTIVIDAD</td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE TIPO ACTIVIDAD</td>
			<td class="dtabla"><input type="text" name="tactividad_descripcion" value="<?php echo $_REQUEST["tactividad_descripcion"]; ?>" size="40" /></td>
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