<?php

session_start();

//si acabamos de subir el paquete, debemos configurarlo

if (file_exists('instalacion1/index.php'))
	{
	$self = str_replace( '/index.php','', strtolower( $_SERVER['PHP_SELF'] ) ). '/';
	header("Location: http://" . $_SERVER['HTTP_HOST'] . $self . "instalacion/index.php" );
	exit();
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SISTEMA DE INSERCIÓN LABORAL </title>
<link href="index.css" rel="stylesheet" type="text/css" />
<script src="js/prototype.js" type="text/javascript"></script>
<script src="js/scriptaculous.js" type="text/javascript"></script>
<script type="text/javascript">
function carga(){
new Effect.Appear(document.getElementById('login'));
new Effect.Appear(document.getElementById('licencia'));
}
</script>
<script type="text/javascript">
var navegador = navigator.appName
if (navegador == "Microsoft Internet Explorer")
	{
	alert('SIL 2.0 no funciona con este navegador. Se recomienda el uso de Firefox 2.0');
	}
</script>
</head>
<body onload="carga()" style="background:url(images/bkg_main.png) repeat-y top center; min-height:500px;position:relative;margin:auto;">
<br />
<br />
<br />
<br />
<br />
<div id="logo">
<br />
<img src="imgs/logo_tixi.png" />
<br />
</span>
<br />
</div>
<div id="entrada">
<form action="mod_configuracion/login.php" method="post">
<span id="login" style="color: #ffffff">
 Nombre: <input type="text" name="usuario"  />
Clave: <input type="password" name="password"  />
<input type="submit" value="Entrar" />
</span>
</form>
</div>

<h4><CENTER>SISTEMA DE INSERCIÓN LABORAL ADMINISTRADOR</CENTER></h4>

<br />
<br />
<br />
<br />
<p>
</body>
</html>
