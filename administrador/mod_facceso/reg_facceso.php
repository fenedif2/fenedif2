<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><H6>FORMA ACCESO</H6></div>
<?php
if (strtolower($_REQUEST["acc"])=="registrar")
{
		//validaciones 
		if($_REQUEST["formaacceso_nombre"]=="" )
		{
			cuadro_error("DEBE LLENAR EL CAMPO FORMA ACCESO");
		}
			else
			{
	
				$sql="insert into formaacceso (formaacceso_nombre) values(UPPER('".$_REQUEST["formaacceso_nombre"]."'))";
							
							if(mysql_query($sql,$con))
							{
									cuadro_mensaje("FORMA ACCESO REGISTRADO CORRECTAMENTE...");
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

<form name="registro" action="reg_facceso.php" method="post" enctype="multipart/form-data">
	<table width="700" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>FORMA ACCESO</h3></td>
		</tr>
		<tr>
			<td>1.REGISTRAR FORMA ACCESO</td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE FORMA ACCESO</td>
			<td class="dtabla"><input type="text" name="formaacceso_nombre" value="<?php echo $_REQUEST["formaacceso_nombre"]; ?>" size="40" /></td>
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