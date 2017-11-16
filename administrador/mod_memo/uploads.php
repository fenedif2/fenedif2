<?php
session_start();
//incluimos funciones,configuración e idioma
include('../funciones.php');
require('../config.php');
require('../idioma/'.$idioma.'');
echo  "<div style='height:500px; overflow:scroll'>" ; 
echo  "</ div>" ;

//si hay sesión cargamos código 
if (isset($_SESSION['usuario_sesion']) && $_SESSION['rol_sesion'] == 'admin')
{
//conecto con MySQL
conecta();
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
	$fecha_ini_ing = cambia_fecha_a_ing($txt_fec2);
	$qry = "INSERT INTO memo (memo_nombre,nombre_archivo,fecha,contenido,tamanio,tamanio_unidad, tipo ) VALUES
	('$txt_memo','$nombre_archivo','$fecha_ini_ing','$contenido','{$tamanio[0]}','{$tamanio[1]}', '$tipo')";


	//NOS CONECAMOS A LA BASE DE DATOS
	//REMPLAZEN SUS VALOS POR LOS MIOS
	//mysql_connect("localhost","root","sistemas") or die("No se pudo conectar a la base de datos");
	
	//SELECCIONAMOS LA BASE DE DATOS CON LA CUAL VAMOS A TRABAJAR CAMBIEN EL VALOR POR LA SUYA
	//mysql_select_db("uti");
	
	//EJECUTAMOS LA CONSULTA
	mysql_query($qry) or die("Query: $qry <br />Error: ".mysql_error());
	
	//CERRAMOS LA CONEXION
	mysql_close();
	//NOTIFICAMOS AL USUARIO QUE EL ARCHVO SE HA ENVIADO O REDIRIGIMOS A OTRO LADO ETC.
	//echo "Archivo Agregado Correctamente<br>";
	//echo '<a href="form.html">Subir Otro Archivo</a><br > ';
	echo '<meta http-equiv="Refresh" content="0;url=panel.php">';
	}
	else{
		//ABRIMOS EL ARCHIVO EN MODO SOLO LECTURA
	// VERIFICAMOS EL TA�ANO DEL ARCHIVO
	$fp = fopen($archivo, "rb");
	//LEEMOS EL CONTENIDO DEL ARCHIVO
	
	
	$contenido = addslashes($contenido);
	
	//CON LA FUNCION addslashes AGREGAMOS UN \ A CADA COMILLA SIMPLE ' PORQUE DE OTRA MANERA
	//NOS MARCARIA ERROR A LA HORA DE REALIZAR EL INSERT EN NUESTRA TABLA
	
	//CERRAMOS EL ARCHIVO
	
	// VERIFICAMOS EL TA�ANO DEL ARCHIVO
	if ($tamanio <1048576)
	{
		//HACEMOS LA CONVERSION PARA PODER GUARDAR SI EL TAMA�O ESTA EN b � MB
		$tamanio=filesize_format($tamanio);
	}
	$fecha_ini_ing = cambia_fecha_a_ing($txt_fec2);
	$qry = "INSERT INTO memo (memo_nombre,nombre_archivo,fecha,contenido,tamanio,tamanio_unidad, tipo ) VALUES
	('$txt_memo','$nombre_archivo','$fecha_ini_ing','$contenido','{$tamanio[0]}','{$tamanio[1]}', '$tipo')";

	//NOS CONECAMOS A LA BASE DE DATOS
	//REMPLAZEN SUS VALOS POR LOS MIOS
	//mysql_connect("localhost","root","sistemas") or die("No se pudo conectar a la base de datos");
	
	//SELECCIONAMOS LA BASE DE DATOS CON LA CUAL VAMOS A TRABAJAR CAMBIEN EL VALOR POR LA SUYA
	//mysql_select_db("uti");
	
	//EJECUTAMOS LA CONSULTA
	mysql_query($qry) or die("Query: $qry <br />Error: ".mysql_error());
	
	//CERRAMOS LA CONEXION
	mysql_close();
	//NOTIFICAMOS AL USUARIO QUE EL ARCHVO SE HA ENVIADO O REDIRIGIMOS A OTRO LADO ETC.
	//echo "Archivo Agregado Correctamente<br>";
	//echo '<a href="form.html">Subir Otro Archivo</a><br > ';
	//echo '<meta http-equiv="Refresh" content="0;url=panel.php">';
	
		}


}

	
}
 ?>
