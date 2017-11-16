<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><h6>ESTADO CIVIL</h6></div>
<?php
if (strtolower($_REQUEST["acc"])=="registrar")
{
		//validaciones 
		if($_REQUEST["tcivil_descripcion"]=="" )
		{
			cuadro_error("Debe llenar el campo del Estado Civil");
		}
			else
			{
	
				$sql="insert into tcivil (tcivil_descripcion) values(UPPER('".$_REQUEST["tcivil_descripcion"]."'))";
							
							if(mysql_query($sql,$con))
							{
									cuadro_mensaje("civil registrado Correctamente...");
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

<form name="registro" action="reg_civil.php" method="post" enctype="multipart/form-data">
	<table width="700" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>ESTADO CIVIL</h3></td>
		</tr>
		<tr>
			<td>1. REGISTRAR ESTADO CIVIL</td>
		</tr>
		<tr>
			<td class="tdatos">Nombre del Estado Civil</td>
			<td class="dtabla"><input type="text" name="tcivil_descripcion" value="<?php echo $_REQUEST["tcivil_descripcion"]; ?>" size="40" /></td>
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