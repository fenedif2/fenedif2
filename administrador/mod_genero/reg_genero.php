<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<div class="titulo"><h5>GÉNERO</h5></div>
<?php
if (strtolower($_REQUEST["acc"])=="registrar")
{
		//validaciones 
		if($_REQUEST["genero_nombre"]=="" )
		{
			cuadro_error("Debe llenar el campo del Tipo de Género");
		}
			else
			{
	
				$sql="insert into genero (genero_nombre) values(UPPER('".$_REQUEST["genero_nombre"]."'))";
							
							if(mysql_query($sql,$con))
							{
									cuadro_mensaje("Tipo de Género registrado Correctamente...");
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

<form name="registro" action="reg_genero.php" method="post" enctype="multipart/form-data">
	<table width="700" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>Tipo Género</h3></td>
		</tr>
		<tr>
			<td>1. REGISTRAR GÉNERO</td>
		</tr>
		<tr>
			<td class="tdatos">Nombre de Tipo de Género</td>
			<td class="dtabla"><input type="text" name="genero_nombre" value="<?php echo $_REQUEST["genero_nombre"]; ?>" size="40" /></td>
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