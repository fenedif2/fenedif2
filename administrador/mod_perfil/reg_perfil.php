<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<div class="titulo"><h5>REGISTRO PERFIL USUARIO</h5></div>
<?php
if (strtolower($_REQUEST["acc"])=="registrar")
{
		//validaciones 
		if($_REQUEST["tipousuario_nombre"]=="" )
		{
			cuadro_error("Debe llenar el campo del nombre del Perfil");
		}
			else
			{
	
				$sql="insert into tipousuario(tipousuario_nombre) values (UPPER('".$_REQUEST["tipousuario_nombre"]."'))";
							
							if(mysql_query($sql,$con))
							{
									cuadro_mensaje("Perfil Registrado Correctamente...");
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
<form name="registro" action="reg_perfil.php" method="post" enctype="multipart/form-data">
	<table width="700" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>Perfil</h3></td>
		</tr>
		<tr>
			<td>1. Registrar Perfil</td>
		</tr>
		<tr>
			<td class="tdatos">Nombre del Perfil</td>
			<td class="dtabla"><input type="text" name="tipousuario_nombre" value="<?php echo $_REQUEST["tipousuario_nombre"]; ?>" size="40" /></td>
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