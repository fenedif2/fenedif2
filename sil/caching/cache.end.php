<?php
// Generamos el nuevo archivo cache
$fp = @fopen($cachefile, 'w');

// guardamos el contenido del buffer
@fwrite($fp, ob_get_contents());
@fclose($fp);
ob_end_flush();
?>