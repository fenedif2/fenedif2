<?php

session_start();

//incluimos funciones,configuración e idioma
include('funciones.php');
require('config.php');
require('idioma/'.$idioma.'');


//conectamos con MySQL
conecta();

//comprobamos usuario y clave
if (isset($_POST['txt_login']) && isset($_POST['pwd_clave']))
	{
	$usuario = $_POST['txt_login'];
	$clave = $_POST['pwd_clave'];
	$clave_crip = crypt($clave,'crackmaster');
	$sel_usuario = mysql_query("select * from docentes where docente = '$usuario' and clave = '$clave_crip'");
	 
	 if(mysql_num_rows($sel_usuario) > 0)
	 	{
	 	$reg_usuario = mysql_fetch_array($sel_usuario);
	 	$nombre = $reg_usuario['nombres'];
	 	$apellidos = $reg_usuario['apellidos'];
		$email = $reg_usuario['email'];
		$formacion = $reg_usuario['formacion'];
	 	$web = $reg_usuario['web'];
		$rol = $reg_usuario['rol'];
			if($rol == '0') $perfil = 'doc';
			if($rol == '1') $perfil = 'admin';
	 		 	
	 	$_SESSION['usuario_sesion'] = $usuario;
	 	$_SESSION['rol_sesion'] = $perfil;
		$_SESSION['nombre_sesion']=$nombre;
		$_SESSION['apellidos_sesion']=$apellidos;
		$_SESSION['formacion_sesion']=$formacion;
	 	}
	else
		{
		echo '<p class="centradomedio">'.$mensaje_error.'</p>';
		}
	}

/*

*/

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo 'Gestión de Proyectos: '.$nombre_centro.''; ?></title>
<link href="index.css" rel="stylesheet" type="text/css" />
<script src="js/prototype.js" type="text/javascript"></script>
<script src="js/effects.js" type="text/javascript"></script>
<script src="js/scriptaculous.js" type="text/javascript"></script>
<script src="js/funciones.js" type="text/javascript" ></script>
<script src="js/rico.js" type="text/javascript"></script>
<script src="js/litbox.js" type="text/javascript"></script>
<script src="js/litboxflash.js" type="text/javascript"></script>

</head>
<?php
$sel_citas = mysql_query("select * from agenda where docente = '".$_SESSION['usuario_sesion']."' and tipo = 'p' and fecha >= now()");
if(mysql_num_rows($sel_citas)>0)
	{
	echo '<body onload="cargaInicio('.date('d').','.date('m').','.date('Y').');new LITBox(\'cita_aviso.php\', {type:\'window\', overlay:true, height:700, width:300, resizable:true});">';
	}
else
	{
	echo '<body onload="cargaInicio('.date('d').','.date('m').','.date('Y').');">';
	}

$usuario_activo = $_SESSION['usuario_sesion'];

if (isset($_SESSION['usuario_sesion']))
{
echo '<div id="contenedor">';
echo '<div id="header">';
//echo '<center><img src="imgs/logo_t.png" /></center>';
$nombre=$_SESSION['nombre_sesion'];
$apellidos=$_SESSION['apellidos_sesion'];
$formacion=$_SESSION['formacion_sesion'];
echo '<span class="blanco"><img src="imgs/usuario.png" /><a href="'.$web.'" target="_blank">'.$nombre.' '.$apellidos.'</a> ( '.$formacion.' )</span>';
echo '<span id="cargando" /><img src="imgs/cargando.gif" title="'.$id_cargando.'" /></span>';


echo '</div>';

echo '<div id="left">';
echo '<div id="calendario">';
//require('calendario.php');	
echo '</div>';
require('menu.php');
echo '<div id="parche">';
echo '</div>';
echo '</div>';

echo '<div id="center">';

echo '</div>';

////////////////////////////////////////////////////////////////////////
////////mantener esta nota//////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////
echo '<div id="footer">';
echo '<br/>';
echo ' SIMONS 2.0 es software libre bajo licencia GNU General Public License';
echo '<br />';
echo ' SISTEMA DE INFORMACIÓN PARA MONITOREO Y SEGUIMIENTO DE PROYECTOS DE INVESTIGACIÓN';
echo '<br />';
echo '</div>';
echo '</div>';
////////////////////////////////////////////////////////////////////////
//////////fin nota a mantener//////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////
}//fin de if sesión
?>

</body>
</html>
