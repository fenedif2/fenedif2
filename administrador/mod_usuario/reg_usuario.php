<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><h6>USUARIO</h6></div>
<?php
if (strtolower($_REQUEST["acc"])=="registrar")
{
		$strCedula=$_REQUEST["usuario_cedula"];
		$nombre_usuario=$_REQUEST["usuario_nombres"];
		$apellido_usuario=$_REQUEST["usuario_apellidos"];
		$usuario_correo_usuario=$_REQUEST["usuario_correo"];
		$usuario_password=$_REQUEST["usuario_password"];
function validarCI($strCedula,&$error_usuario_password)
	{
		if(is_null($strCedula) || empty($strCedula))
		{//compruebo si que el numero enviado es vacio o null
		echo "Por Favor Ingrese la Cedula"; 
		}else
		{//caso contrario sigo el proceso
		if(is_numeric($strCedula))
			{ 
				$total_caracteres=strlen($strCedula);// se suma el total de caracteres
				if($total_caracteres==10)
				{//compruebo que tenga 10 digitos la cedula
					$nro_region=substr($strCedula, 0,2);//extraigo los dos primeros caracteres de izq a der
					if($nro_region>=1 && $nro_region<=24)
					{// compruebo a que region pertenece esta cedula//
						$ult_digito=substr($strCedula, -1,1);//extraigo el ultimo digito de la cedula
						//extraigo los valores pares//
						$valor2=substr($strCedula, 1, 1);
						$valor4=substr($strCedula, 3, 1);
						$valor6=substr($strCedula, 5, 1);
						$valor8=substr($strCedula, 7, 1);
						$suma_pares=($valor2 + $valor4 + $valor6 + $valor8);
						//extraigo los valores impares//
						$valor1=substr($strCedula, 0, 1);
						$valor1=($valor1 * 2);
						if($valor1>9)
						{
							 $valor1=($valor1 - 9); 
						}
						$valor3=substr($strCedula, 2, 1);
						$valor3=($valor3 * 2);
						if($valor3>9)
						{
							 $valor3=($valor3 - 9); 
						}
						$valor5=substr($strCedula, 4, 1);
						$valor5=($valor5 * 2);
						if($valor5>9){ $valor5=($valor5 - 9); }else{ }
						$valor7=substr($strCedula, 6, 1);
						$valor7=($valor7 * 2);
						if($valor7>9)
						{
							 $valor7=($valor7 - 9); 
						}
						$valor9=substr($strCedula, 8, 1);
						$valor9=($valor9 * 2);
						if($valor9>9)
						{
							 $valor9=($valor9 - 9); 
						}
						$suma_impares=($valor1 + $valor3 + $valor5 + $valor7 + $valor9);
						$suma=($suma_pares + $suma_impares);
						$dis=substr($suma, 0,1);//extraigo el primer numero de la suma
						$dis=(($dis + 1)* 10);//luego ese numero lo multiplico x 10, consiguiendo asi la decena inmediata superior
						$digito=($dis - $suma);
						if($digito==10){ $digito='0'; }else{ }//si la suma nos resulta 10, el decimo digito es cero
						if ($digito==$ult_digito)
						{//comparo los digitos final y ultimo
						$error_usuario_password = "Cedula Correcta";
						 return true;
						}else
						{
						$error_usuario_password = "Cedula Incorrecta";
						return false;
						}
					}
					else
					{
						$error_usuario_password = "Este Nro de Cedula no corresponde a ninguna provincia del ecuador";
						return false;
					}
				}
					else
						{
						$error_usuario_password = "Es un Numero y tiene solo".$total_caracteres;
						return false;
						}
		}
			else
				{
				$error_usuario_password = "Esta Cedula no corresponde a un Nro de Cedula de Ecuador";
				return false;
				}
	}
}
function validar_usuario_password($usuario_password,&$error_usuario_password)
	{
		   if(strlen($usuario_password) < 6){
		      $error_usuario_password = "La usuario_password debe tener al menos 6 caracteres";
		      return false;
		   }
		   if(strlen($usuario_password) > 16){
		      $error_usuario_password = "La usuario_password no puede tener más de 16 caracteres";
		      return false;
		   }
		   if (!preg_match('`[a-z]`',$usuario_password)){
		      $error_usuario_password = "La usuario_password debe tener al menos una letra minúscula";
		      return false;
		   }
		   if (!preg_match('`[A-Z]`',$usuario_password)){
		      $error_usuario_password = "La usuario_password debe tener al menos una letra mayúscula";
		      return false;
		   }
		   if (!preg_match('`[0-9]`',$usuario_password)){
		      $error_usuario_password = "La usuario_password debe tener al menos un caracter numérico";
		      return false;
		   }
		   $error_usuario_password = "";
		   return true;
	}
function comprobar_nombre($nombre_usuario,&$error_usuario_password)
	{ 
		   if (ereg("^[a-zA-Z\-_ ]{4,20}$", $nombre_usuario)) 
		   { 
		      $error_usuario_password ="El nombre de usuario $nombre_usuario es correcto<br>"; 
		      return true; 
		   } else { 
		       $error_usuario_password = "El nombre de usuario $nombre_usuario no es válido<br>"; 
		      return false; 
		   } 
	}
function comprobar_apellido($apellido_usuario,&$error_usuario_password)
	{ 
		   if (ereg("^[a-zA-Z\-_ ]{4,20}$", $apellido_usuario)) 
		   { 
		      $error_usuario_password ="El Apellido de usuario $nombre_usuario es correcto<br>"; 
		      return true; 
		   } else { 
		       $error_usuario_password = "El Apellido de usuario $nombre_usuario no es válido<br>"; 
		      return false; 
		   } 
	}	
function comprobar_usuario_correo($usuario_correo_usuario,&$error_usuario_correo)
	{ 
		if (filter_var($usuario_correo_usuario, FILTER_VALIDATE_EMAIL)) 
			{
	    		$error_usuario_correo = "Esta dirección de correo ($usuario_correo_a) es válida.";
	    		return true; 
			}
			else
			{
    			$error_usuario_correo =  "Esta dirección de correo ($usuario_correo_b) no es válida.";
				return false; 
			}
	}	
		
if (validarCI($strCedula,$error_encontrado))
	{
		if (validar_usuario_password($_POST["usuario_password"], $error_encontrado))
		{
      		if (comprobar_nombre($nombre_usuario, $error_encontrado))
			      	{
			     		if (comprobar_apellido($apellido_usuario,$error_encontrado))
					      	{
						      	if (comprobar_usuario_correo($usuario_correo_usuario,$error_usuario_correo))
							      	{
								      	
										      	
											      		
												      			$doc_cla=md5($_REQUEST["usuario_password"]);	
																$sql="insert into usuario (usuario_cedula,usuario_nombres,usuario_apellidos,usuario_password,
																usuario_correo,tipousuario_id,sucursal,estusucodigo) values
																(UPPER('".$_REQUEST["usuario_cedula"]."'),UPPER('".$_REQUEST["usuario_nombres"]."'),UPPER('".$_REQUEST["usuario_apellidos"]."'),
																'".$doc_cla ."',UPPER('".$_REQUEST["usuario_correo"]."'),UPPER('".$_REQUEST["tipousuario"]."'),UPPER('".$_REQUEST["sucursal"]."'),
																UPPER('".$_REQUEST["estusucodigo"]."'))";
																			
																	if(mysql_query($sql,$con))
																	{
																			
																			cuadro_mensaje("Usuario registrado Correctamente...");
															 				echo "<br><br><br><br><br>";
																			require("../theme/footer_inicio.php");
																			exit;
																	}
																		else
																		{
																			cuadro_error(mysql_error());
																		}
											     
												 
											   		
									   			
						   			}
							   			else
							   			{
							      		cuadro_error("$error_usuario_correo");
							   			}	
						   	}
					   			else
					   			{
					      		cuadro_error("$error_encontrado");
					   			}
				 
			   		}
			   			else
			   			{
			      		cuadro_error(" $error_encontrado");
			   			}
			
			
   		}
   			else
   				{
      			cuadro_error("PASSWORD NO VÁLIDO: " . $error_encontrado);
  				}
      
      
   	}
   		else
   		{
    	 cuadro_error("cedula no valida: " . $error_encontrado);
   		}
}
?>

<form name="registro" action="reg_usuario.php" method="post" enctype="multipart/form-data">
	<table width="700" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>USUARIO</h3></td>
		</tr>
		<tr>
			<td>1. REGISTRAR DATOS DEL USUARIO</td>
		</tr>
		<tr>
			<td class="tdatos">CÉDULA</td>
			<td class="dtabla"><input type="text" name="usuario_cedula" value="<?php echo $_REQUEST["usuario_cedula"]; ?>" size="40" /></td>
		</tr>
		<tr>
			<td class="tdatos">PASSWORD</td>
			<td class="dtabla"><input type="text" name="usuario_password" value="<?php echo $_REQUEST["usuario_password"]; ?>" size="40" /></td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE</td>
			<td class="dtabla"><input type="text" name="usuario_nombres" value="<?php echo $_REQUEST["usuario_nombres"]; ?>" size="40" /></td>
		</tr>
		<tr>
			<td class="tdatos">APELLIDOS</td>
			<td class="dtabla"><input type="text" name="usuario_apellidos" value="<?php echo $_REQUEST["usuario_apellidos"]; ?>" size="40" /></td>
		</tr>
		<tr>
			<td class="tdatos">E-MAIL</td>
			<td class="dtabla"><input type="text" name="usuario_correo" value="<?php echo $_REQUEST["usuario_correo"]; ?>" size="40" /></td>
		</tr>	
		<tr>
			<td class="tdatos">TIPO USUARIO</td>
			<?php
			echo '<td>
				
					<select name="tipousuario" id="tipousuario" >
					';	
					//listamos grupos para componer el select
					$consulta_tipousuario = mysql_query("SELECT * FROM tipousuario ORDER BY tipousuario_nombre");
					$n_tipousuario = mysql_num_rows($consulta_tipousuario);
					for($d=0;$d<$n_tipousuario;$d++)
					{
					$reg_consulta_tipousuario = mysql_fetch_array($consulta_tipousuario);
					echo '<option value="'.$reg_consulta_tipousuario['tipousuario_id'].'">'.$reg_consulta_tipousuario['tipousuario_nombre'].' </option>';
					}
				echo '	
				</select>
			
			</td>';
			?>
		</tr>	
		<tr>
			<td class="tdatos">SUCURSAL</td>
			<?php
			echo '<td>
				
					<select name="sucursal" id="sucursal" >
					';	
					//listamos grupos para componer el select
					$consulta_brigada = mysql_query("SELECT * FROM sucursal ORDER BY sucursal_nombre");
					$n_brigada = mysql_num_rows($consulta_brigada);
					for($d=0;$d<$n_brigada;$d++)
					{
					$reg_consulta_brigada = mysql_fetch_array($consulta_brigada);
					echo '<option value="'.$reg_consulta_brigada['sucursal_id'].'">'.$reg_consulta_brigada['sucursal_nombre'].' </option>';
					}
				echo '	
				</select>
			
			</td>';
			?>
		</tr>
		<tr>
			<td class="tdatos">ESTADO USUARIO</td>
			<?php
			echo '<td>
				
					<select name="estusucodigo" id="estusucodigo" >
					';	
					//listamos grupos para componer el select
					$consulta_brigada = mysql_query("SELECT * FROM testadousuario ORDER BY estusucodigo");
					$n_brigada = mysql_num_rows($consulta_brigada);
					for($d=0;$d<$n_brigada;$d++)
					{
					$reg_consulta_brigada = mysql_fetch_array($consulta_brigada);
					echo '<option value="'.$reg_consulta_brigada['estusucodigo'].'">'.$reg_consulta_brigada['estusudescripcion'].' </option>';
					}
				echo '	
				</select>
			
			</td>';
			?>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="acc" value="Registrar">
			<input name="Restablecer" type="reset" value="Limpiar" /></td>
		</tr>
	</table>
</form>
<?php
require("../theme/footer_inicio.php");
?>