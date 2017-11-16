<?php 
session_start();
require("configuracion.php");
$con = mysql_connect($bd_host,$bd_usuario,$bd_pass);
mysql_select_db($bd_base,$con);
require("funciones.php");
if ($_SESSION["login"]!="")
{
    $result = mysql_query("SELECT * FROM usuario WHERE usuario_cedula='".$_SESSION["login"]."' and usuario_password='".$_SESSION["password"]."'",$con);
    if (mysql_num_rows($result) == 1){
       $_SESSION["tipo"]=mysql_result($result,0,"tipousuario_id");
	   $_SESSION["nombre"]=mysql_result($result,0,"usuario_nombres");
	   $_SESSION["usuario_sesion"]=mysql_result($result,0,"usuario_cedula");
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