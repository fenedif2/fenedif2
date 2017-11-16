<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><h6>TRATAMIENTO DEL AGUA</h6></div>
<?php
if (strtolower($_REQUEST["acc"])=="registrar")
{
		//validaciones 
		if($_REQUEST["ttratamiento_descripcion"]=="" )
		{
			cuadro_error("Debe llenar el campo del TRATAMIENTO DEL AGUA");
		}
			else
			{
	
				$sql="insert into ttratamiento (ttratamiento_descripcion) values(UPPER('".$_REQUEST["ttratamiento_descripcion"]."'))";
							
							if(mysql_query($sql,$con))
							{
									cuadro_mensaje("TRATAMIENTO DEL AGUA registrado Correctamente...");
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

<form name="registro" action="reg_tratamiento.php" method="post" enctype="multipart/form-data">
	<table width="700" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>TRATAMIENTO DEL AGUA</h3></td>
		</tr>
		<tr>
			<td>1. REGISTRAR TRATAMIENTO DEL AGUA</td>
		</tr>
		<tr>
			<td class="tdatos">Nombre de TRATAMIENTO DEL AGUA</td>
			<td class="dtabla"><input type="text" name="ttratamiento_descripcion" value="<?php echo $_REQUEST["ttratamiento_descripcion"]; ?>" size="40" /></td>
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