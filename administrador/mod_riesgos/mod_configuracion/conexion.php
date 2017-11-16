<?php 
session_start();
require("configuracion.php");
$con = mysql_connect($bd_host,$bd_usuario,$bd_pass);
mysql_select_db($bd_base,$con);
require("funciones.php");
if ($_SESSION["login"]!="")
{
    $result = mysql_query("SELECT * FROM docentes WHERE docente='".$_SESSION["login"]."' and clave='".$_SESSION["password"]."'",$con);
    if (mysql_num_rows($result) == 1){
       $_SESSION["tipo"]=mysql_result($result,0,"rol");
	   $_SESSION["nombre"]=mysql_result($result,0,"nombres");
	   $_SESSION["usuario_sesion"]=mysql_result($result,0,"docente");
	  } else
    {
        header("Location:login.php");
		exit;
    }
} else
{
 	header("Location:login.php");
	exit;
}
?> 