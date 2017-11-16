<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo">REGISTRO BRIGADA</div>
<?php
if (strtolower($_REQUEST["acc"])=="registrar")
{
	$nombre_brigada=$_REQUEST["brigada_nombre"];
	function comprobar_brigada($nombre_brigada,&$error_clave)
	{ 
		   if (ereg("^[a-zA-Z\-_ ]{4,50}$", $nombre_brigada)) 
		   { 
		      $error_clave ="El Nombre de la Brigada $nombre_brigada es correcto"; 
		      return true; 
		   } else { 
		       $error_clave = "El Nombre de la Brigada $nombre_brigada es incorrecto"; 
		      return false; 
		   } 
	}
if (comprobar_brigada($nombre_brigada,$error_encontrado))
	{
			$sql="insert into brigada(brigada_nombre) values (UPPER('".$_REQUEST["brigada_nombre"]."'))";
							
							if(mysql_query($sql,$con))
							{
									cuadro_mensaje("brigada Registrado Correctamente...");
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

}

?>
<form name="registro" action="reg_brigada.php" method="post" enctype="multipart/form-data">
	<table width="700" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>BRIGADA</h3></td>
		</tr>
		<tr>
			<td>1. REGISTRAR BRIGADA</td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE DE LA BRIGADA</td>
			<td class="dtabla"><input type="text" name="brigada_nombre" value="<?php echo $_REQUEST["brigada_nombre"]; ?>" size="40" /></td>
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