<?php 
session_start();
require("configuracion.php");
$con = mysql_connect($bd_host,$bd_usuario,$bd_pass);
mysql_select_db($bd_base,$con);
?> 