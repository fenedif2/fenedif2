<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><h6>REGISTRO MEMORÁNDUM</h6> </div>
<?php
if (strtolower($_REQUEST["acc"])=="registrar")
{
		//validaciones 
		if($_REQUEST["memo_nombre"]=="" )
		{
			cuadro_error("Debe llenar el campo del nombre de la memorándum");
		}
			else
			{
					
			///////////////// registrar archivo ///////////////////////////////////////
			
			function filesize_format($bytes,$format='',$force ='')
			{
				$bytes=(float)$bytes;
				if ($bytes <1024)
				{
					$numero=number_format($bytes, 0, '.', ',');
					return array($numero,"B");
				}
				if ($bytes <1048576)
				{
					$numero=number_format($bytes/1024, 2, '.', ',');
					return array($numero,"KBs");
				}
				if ($bytes>= 1048576){
					$numero=number_format($bytes/1048576, 2, '.', ',');
					return array($numero,"MB");
				}
			}
//VERIFICAMOS QUE SE SELECCIONO ALGUN ARCHIVO
			if(sizeof($_FILES)==0)
			{
				echo "No se puede subir el archivo";
				exit();
			}
			
			else {
				

// EN ESTA VARIABLE ALMACENAMOS EL NOMBRE TEMPORAL QU SE LE ASIGNO ESTE NOMBRE ES GENERADO POR EL SERVIDOR
// ASI QUE SI NUESTRO ARCHIVO SE LLAMA foto.jpg el tmp_name no sera foto.jpg sino un nombre como SI12349712983.tmp por decir un ejemplo
$archivo = $_FILES["archivo"]["tmp_name"];
//Definimos un array para almacenar el tama�o del archivo
$tamanio=array();
//OBTENEMOS EL TAMA�O DEL ARCHIVO
$tamanio = $_FILES["archivo"]["size"];
//OBTENEMOS EL TIPO MIME DEL ARCHIVO
$tipo = $_FILES["archivo"]["type"];
//OBTENEMOS EL NOMBRE REAL DEL ARCHIVO AQUI SI SERIA foto.jpg
$nombre_archivo = $_FILES["archivo"]["name"];
//PARA HACERNOS LA VIDA MAS FACIL EXTRAEMOS LOS DATOS DEL REQUEST
extract($_REQUEST);
//VERIFICAMOS DE NUEVO QUE SE SELECCIONO ALGUN ARCHIVO
if ( file_exists($archivo))
{
	//ABRIMOS EL ARCHIVO EN MODO SOLO LECTURA
	// VERIFICAMOS EL TA�ANO DEL ARCHIVO
	$fp = fopen($archivo, "rb");
	//LEEMOS EL CONTENIDO DEL ARCHIVO
	
	$contenido = fread($fp,$tamanio);
	$contenido = addslashes($contenido);
	fclose($fp);
	
	//CON LA FUNCION addslashes AGREGAMOS UN \ A CADA COMILLA SIMPLE ' PORQUE DE OTRA MANERA
	//NOS MARCARIA ERROR A LA HORA DE REALIZAR EL INSERT EN NUESTRA TABLA
	
	//CERRAMOS EL ARCHIVO
	
	// VERIFICAMOS EL TA�ANO DEL ARCHIVO
	if ($tamanio<1048576)
	{
		//HACEMOS LA CONVERSION PARA PODER GUARDAR SI EL TAMA�O ESTA EN b � MB
		$tamanio=filesize_format($tamanio);
	}
	$sql = "INSERT INTO memo (memo_nombre,nombre_archivo,fecha,contenido,tamanio,tamanio_unidad, tipo ) VALUES
	(UPPER('".$_REQUEST["memo_nombre"]."'),'$nombre_archivo','".$_REQUEST["fecha"]."','$contenido','{$tamanio[0]}','{$tamanio[1]}', '$tipo')";

     if(mysql_query($sql,$con))
							{
									cuadro_mensaje("memorándum Registrado Correctamente...");
					 				echo "<br><br><br><br><br>";
									require("../theme/footer_inicio.php");
									exit;
							}
								else
								{
									cuadro_error(mysql_error());
								}
	
	}
	else{
	
		cuadro_error("SELECCIONE UN ARCHIVO");
		}


}
			
			/////////////////////////////////////////////////////////////////////////		
	
						
			}//sino hay imagen asigna una por defecto
							//donde se llevan los datos a la BD
							
		
}
?>

<form name="registro" action="reg_memo.php" method="post" enctype="multipart/form-data">
	<table width="700" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>MEMORÁNDUM</h3></td>
		</tr>
		<tr>
			<td>1. REGISTRAR MEMORÁNDUM</td>
		</tr>
		<tr>
			<td class="tdatos">MEMORÁNDUM</td>
			<td class="dtabla"><input type="text" name="memo_nombre" value="<?php echo $_REQUEST["memo_nombre"]; ?>" size="40" /></td>
		</tr>
		<tr>
			<td  class="tdatos">FECHA MEMORÁNDUM</td>
			
				<html>
						  <head>
						    <title>Dynarch Calendar -- Simple popup calendar</title>
						    <script src="../theme/js/jscal2.js"></script>
						    <script src="../theme/js/lang/en.js"></script>
						    <link rel="stylesheet" type="text/css" href="../theme/css/jscal2.css" />
						    <link rel="stylesheet" type="text/css" href="../theme/css/border-radius.css" />
						    <link rel="stylesheet" type="text/css" href="../theme/css/steel/steel.css" />
						  </head>
						  <body>
						    <td class="dtabla"><input size="30" id="fecha" name="fecha" value="<?php echo $_REQUEST["fecha"]; ?>"> <button id="f_btn1">...</button><br /></td>
						
						    <script type="text/javascript">//<![CDATA[
						      Calendar.setup({
						        inputField : "fecha",
						        trigger    : "f_btn1",
						        onSelect   : function() { this.hide() },
						        showTime   : 12,
						        dateFormat : "%Y-%m-%d"
						      });
						    //]]></script>
						  </body>
					</html>
		</tr>
		<tr>
			<td class="tdatos">SUBIR PDF</td>
			<td class="dtabla"><input type="file" name="archivo" value="<?php echo $_REQUEST["archivo"]; ?>" size="40" /></td>
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