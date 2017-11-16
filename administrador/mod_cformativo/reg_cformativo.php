<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><H6>CENTRO FORMATIVO</H6></div>
<?php
if (strtolower($_REQUEST["acc"])=="registrar")
{
		//validaciones 
		if($_REQUEST["tipocformativo_nombre"]=="" )
		{
			cuadro_error("DEBE LLENAR EL CAMPO CENTRO FORMATIVO");
		}
			else
			{
	
				$sql="insert into tipocformativo (tipocformativo_nombre) values(UPPER('".$_REQUEST["tipocformativo_nombre"]."'))";
							
							if(mysql_query($sql,$con))
							{
									cuadro_mensaje("CENTRO FORMATIVO REGISTRADO CORRECTAMENTE...");
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

<form name="registro" action="reg_cformativo.php" method="post" enctype="multipart/form-data">
	<table width="700" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>CENTRO FORMATIVO</h3></td>
		</tr>
		<tr>
			<td>1.REGISTRAR CENTRO FORMATIVO</td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE CENTRO FORMATIVO</td>
			<td class="dtabla"><input type="text" name="tipocformativo_nombre" value="<?php echo $_REQUEST["tipocformativo_nombre"]; ?>" size="40" /></td>
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