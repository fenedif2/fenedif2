<?php
require("configuracion.php");
require("funciones.php");
session_start();
$_SESSION=array();

if ($_POST["usuario"]){
	$conn_bd = mysql_connect($bd_host,$bd_usuario,$bd_pass) or die("Error en la conexión a la base de datos");
	mysql_select_db($bd_base, $conn_bd);
	$usuario = $_POST['usuario'];
	$tusuario = 1;
	$_SESSION['usuario_sesion'] =$usuario;
	$clave = $_POST['password'];
	$clave_crip = md5($clave);
		$sql="SELECT * FROM usuario WHERE usuario_cedula='".htmlentities($_POST["usuario"])."'  
		and tipousuario_id='".$tusuario."'  AND usuario.estusucodigo = 'A' and usuario_password='".$clave_crip."'";
	$result = mysql_query($sql,$conn_bd);
	if (mysql_num_rows($result)==1)
	{
		$_SESSION["login"]=mysql_result($result,0,"usuario_cedula");
		$_SESSION["password"]=mysql_result($result,0,"usuario_password");
		$_SESSION["nombre"]=mysql_result($result,0,"usuario_nombres");
		$_SESSION["tipousuario"]=mysql_result($result,0,"tipousuario_id");
		$_SESSION['usuario_sesion'] =mysql_result($result,0,"usuario_cedula");
	 	$_SESSION['rol_sesion'] = $perfil;
		$_SESSION['nombre_sesion']=$nombre;
		$_SESSION['apellidos_sesion']=$apellidos;
		$_SESSION['formacion_sesion']=$formacion;
		header("Location: ../mod_inicio/index.php");
	}else
	{
		?>
        <script type="text/javascript">
		alert("\tUsuario o Password incorrecto \n \t Favor de verificar los datos...¡OH YA TIENE ABIERTO UNA SESION!");
		window.location = "../index.php";
		</script>
		<?php 
    }
}
?>		
	