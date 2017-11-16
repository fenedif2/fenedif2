<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><h6>RIESGOS SANITARIOS</h6></div>
<?php
if (strtolower($_REQUEST["acc"])=="registrar")
{
		//validaciones 
		if($_REQUEST["triesgos_descripcion"]=="" )
		{
			cuadro_error("Debe llenar el campo del RIESGOS SANITARIOS");
		}
			else
			{
	
				$sql="insert into triesgos (triesgos_descripcion) values(UPPER('".$_REQUEST["triesgos_descripcion"]."'))";
							
							if(mysql_query($sql,$con))
							{
									cuadro_mensaje("RIESGOS SANITARIOS registrado Correctamente...");
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

<form name="registro" action="reg_riesgos.php" method="post" enctype="multipart/form-data">
	<table width="700" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>RIESGOS SANITARIOS</h3></td>
		</tr>
		<tr>
			<td>1. REGISTRAR RIESGOS SANITARIOS</td>
		</tr>
		<tr>
			<td class="tdatos">Nombre de RIESGOS SANITARIOS</td>
			<td class="dtabla"><input type="text" name="triesgos_descripcion" value="<?php echo $_REQUEST["triesgos_descripcion"]; ?>" size="40" /></td>
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