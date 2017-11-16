<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><H6>TIPO SEGUIMIENTO</H6></div>
<?php
if (strtolower($_REQUEST["acc"])=="registrar")
{
		//validaciones 
		if($_REQUEST["ttipo_nombre"]=="" )
		{
			cuadro_error("DEBE LLENAR EL CAMPO TIPO SEGUIMIENTO");
		}
			else
			{
	
				$sql="insert into ttipo (ttipo_nombre) values(UPPER('".$_REQUEST["ttipo_nombre"]."'))";
							
							if(mysql_query($sql,$con))
							{
									cuadro_mensaje("TIPO SEGUIMIENTO REGISTRADO CORRECTAMENTE...");
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

<form name="registro" action="reg_tseguimiento.php" method="post" enctype="multipart/form-data">
	<table width="700" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>TIPO SEGUIMIENTO</h3></td>
		</tr>
		<tr>
			<td>1.REGISTRAR TIPO SEGUIMIENTO</td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE TIPO SEGUIMIENTO</td>
			<td class="dtabla"><input type="text" name="ttipo_nombre" value="<?php echo $_REQUEST["ttipo_nombre"]; ?>" size="40" /></td>
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