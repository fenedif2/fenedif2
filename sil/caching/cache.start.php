<?php
// Settings
$cachedir = 'cache/'; 	// Directorio donde se guardan los archivos
$cachetime = 85400; 	// Tiempo de duracion de los archivos en cache
$cacheext = 'cache'; 	// Extension para los archivos de cache

// Script a procesar
$cachepage = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$cachefile = $cachedir.md5($cachepage).'.'.$cacheext;

if (@file_exists($cachefile)) {
	$cachelast = @filemtime($cachefile);
} else {
	$cachelast = 0;
}
@clearstatcache();

// Mostramos el archivo si aun no vence
if (time() - $cachetime < $cachelast) {
	@readfile($cachefile);
	exit();
}
ob_start();
?>