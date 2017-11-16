<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><h6>FINANCIAMIENTO</h6></div>
<?php
if (strtolower($_REQUEST["acc"])=="registrar")
{
		//validaciones 
		if($_REQUEST["tfinanciamiento_descripcion"]=="" )
		{
			cuadro_error("DEBE LLENAR EL CAMPO FINANCIAMIENTO");
		}
			else
			{
	
				$sql="insert into tfinanciamiento (tfinanciamiento_descripcion) values(UPPER('".$_REQUEST["tfinanciamiento_descripcion"]."'))";
							
							if(mysql_query($sql,$con))
							{
									cuadro_mensaje("FINANCIAMIENTO REGISTRADO CORRECTAMENTE...");
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

<form name="registro" action="reg_financiamiento.php" method="post" enctype="multipart/form-data">
	<table width="700" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>TIPO DE FINANCIAMIENTO</h3></td>
		</tr>
		<tr>
			<td>1. REGISTRAR FINANCIAMIENTO</td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE FINANCIAMIENTO</td>
			<td class="dtabla"><input type="text" name="tfinanciamiento_descripcion" value="<?php echo $_REQUEST["tfinanciamiento_descripcion"]; ?>" size="40" /></td>
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