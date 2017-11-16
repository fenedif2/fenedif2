<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><h6>TIPO DE TÉCNICO</h6></div>
<?php
if (strtolower($_REQUEST["acc"])=="registrar")
{
	$nombre_tecnico=$_REQUEST["ttecnico_nombre"];
	function comprobar_tecnico($nombre_tecnico,&$error_clave)
	{ 
		   if (ereg("^[a-zA-Z\-_ ]{4,50}$",$nombre_tecnico)) 
		   { 
		      $error_clave ="El Nombre del Técnico $nombre_tecnico es correcto"; 
		      return true; 
		   } else { 
		       $error_clave = "El Nombre del Técnico $nombre_tecnico es incorrecto"; 
		      return false; 
		   } 
	}
	
	if (comprobar_tecnico($nombre_tecnico,$error_encontrado))
	{
			$sql="insert into ttecnico (ttecnico_nombre) values(UPPER('".$_REQUEST["ttecnico_nombre"]."'))";
							
							if(mysql_query($sql,$con))
							{
									cuadro_mensaje("tipo de Técnico registrado Correctamente...");
					 				echo "<br><br><br><br><br>";
									require("../theme/footer_inicio.php");
									exit;
							}
								else
								{
									cuadro_error(mysql_error());
								}
   	}
   		else
   		{
    	 cuadro_error($error_encontrado);
   		}		
	
		//validaciones 
		//validaciones 
		
							
		
}
?>

<form name="registro" action="reg_ttecnico.php" method="post" enctype="multipart/form-data">
	<table width="700" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>TIPO DE TÉCNICO</h3></td>
		</tr>
		<tr>
			<td>1. REGISTRAR TIPO DE TÉCNICO</td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE DEL TIPO DE TÉCNICO</td>
			<td class="dtabla"><input type="text" name="ttecnico_nombre" value="<?php echo $_REQUEST["ttecnico_nombre"]; ?>" size="40" /></td>
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