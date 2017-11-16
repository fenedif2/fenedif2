<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><h6>TIPO DE CONTRATO</h6></div>
<?php
if (strtolower($_REQUEST["acc"])=="registrar")
{
		//validaciones 
		if($_REQUEST["tcontrato_nombre"]=="" )
		{
			cuadro_error("Debe llenar el campo del Tipo de Contrato");
		}
			else
			{
	
				$sql="insert into tcontrato (tcontrato_nombre) values(UPPER('".$_REQUEST["tcontrato_nombre"]."'))";
							
							if(mysql_query($sql,$con))
							{
									cuadro_mensaje("tipo de Contrato registrado Correctamente...");
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

<form name="registro" action="reg_tcontrato.php" method="post" enctype="multipart/form-data">
	<table width="700" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>TIPO DE CONTRATO</h3></td>
		</tr>
		<tr>
			<td>1. REGISTRAR TIPO DE CONTRATO</td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE DEL TIPO DE CONTRATO</td>
			<td class="dtabla"><input type="text" name="tcontrato_nombre" value="<?php echo $_REQUEST["tcontrato_nombre"]; ?>" size="40" /></td>
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