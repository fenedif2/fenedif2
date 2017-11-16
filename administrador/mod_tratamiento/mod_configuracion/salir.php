<?php 
session_start();
if($_SESSION['familia_sesion'])
	{
	$usuario_a_desconectar = $_SESSION['familia_sesion'];
	}
else
	{
	$usuario_a_desconectar = $_SESSION['usuario_sesion'];
	}

include ('funciones.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
if($_SESSION['familia_sesion'])
	{
	echo '<meta http-equiv="Refresh" content="3; url=investigadores/index.html">';
	}
else
	{
	echo '<meta http-equiv="Refresh" content="3; url=../index.php">';
	}
?>
<title>Desconexi&oacute;n del sistema</title>
<link rel="stylesheet" href="../theme/css/style.css" type="text/css">
    <!-- ************** Menu ********************************-->
    <link rel="stylesheet" type="text/css" href="../theme/css/superfish.css" media="screen">
	<!-- Select's -->
    <script type="text/javascript" src="../theme/js/jQuery.js"></script>
	<!--   Slide   -->
	<script type="text/javascript" src="../theme/slide/slide.js"></script>
	<script type="text/javascript" src="../theme/js/funciones.js"></script>
	
    <!-- ************** Menu ********************************-->
    <script type="text/javascript" src="../theme/js/hoverIntent.js"></script>
	<script type="text/javascript" src="../theme/js/superfish.js"></script>
</head>
<body>

<?php 

	unset($_SESSION);
	$estado_desconexion = session_destroy();
	if (!empty($usuario_a_desconectar))
		{
			if ($estado_desconexion)
			{
			// si estaban conectados y ahora están desconectados
			$mensaje = 'Gracias por usar el sistema "GESTIÓN PARA CONTROL DE PROCESOS DE PROYECTOS"';
			echo '<p class="centradomedio">'.$mensaje.'</p>';
			echo '</body></html>';
			exit;
			}
			else
			{
			// estaban conectados y no se podían desconectar
			$mensaje = 'No podemos desconectarte en estos momentos.';
			echo '<p class="centradomedio">'.$mensaje.'</p>';
			echo '</body></html>';
			exit;
			}
		}
	else
		{
		// si no estaban conectados pero han llegado aquí de alguna manera
		$mensaje = 'No estabas conectad@, as&iacute; que no puedes desconectarte';
		echo '<p class="centradomedio">'.$mensaje.'</p>';
		echo '</body></html>';
		exit;
		}
?>




