<?php
require("configuracion.php");
require("funciones.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><h6>RESPONSABLE DE BRIGADA</h6></div>
<?php
if (strtolower($_REQUEST["acc"])=="registrar")
{
	
	
		
		$strCedula=$_REQUEST["respbrigada_cedula"];
		$nombre_usuario=$_REQUEST["nombres"];
		$apellido_usuario=$_REQUEST["apellidos"];
		$telefono_usuario=$_REQUEST["telefono"];
		$profesion_usuario=$_REQUEST["profesion"];
		$email_usuario=$_REQUEST["email"];
		$clave=$_REQUEST["clave"];
function validarCI($strCedula,&$error_clave)
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
						$error_clave = "Cedula Correcta";
						 return true;
						}else
						{
						$error_clave = "Cedula Incorrecta";
						return false;
						}
					}
					else
					{
						$error_clave = "Este Nro de Cedula no corresponde a ninguna provincia del ecuador";
						return false;
					}
				}
					else
						{
						$error_clave = "Es un Numero y tiene solo".$total_caracteres;
						return false;
						}
		}
			else
				{
				$error_clave = "Esta Cedula no corresponde a un Nro de Cedula de Ecuador";
				return false;
				}
	}
}
function validar_clave($clave,&$error_clave)
	{
		   if(strlen($clave) < 6){
		      $error_clave = "La clave debe tener al menos 6 caracteres";
		      return false;
		   }
		   if(strlen($clave) > 16){
		      $error_clave = "La clave no puede tener más de 16 caracteres";
		      return false;
		   }
		   if (!preg_match('`[a-z]`',$clave)){
		      $error_clave = "La clave debe tener al menos una letra minúscula";
		      return false;
		   }
		   if (!preg_match('`[A-Z]`',$clave)){
		      $error_clave = "La clave debe tener al menos una letra mayúscula";
		      return false;
		   }
		   if (!preg_match('`[0-9]`',$clave)){
		      $error_clave = "La clave debe tener al menos un caracter numérico";
		      return false;
		   }
		   $error_clave = "";
		   return true;
	}
function comprobar_nombre($nombre_usuario,&$error_clave)
	{ 
		   if (ereg("^[a-zA-Z\-_ ]{4,20}$", $nombre_usuario)) 
		   { 
		      $error_clave ="El nombre de usuario $nombre_usuario es correcto<br>"; 
		      return true; 
		   } else { 
		       $error_clave = "El nombre de usuario $nombre_usuario no es válido<br>"; 
		      return false; 
		   } 
	}
function comprobar_apellido($apellido_usuario,&$error_clave)
	{ 
		   if (ereg("^[a-zA-Z\-_ ]{4,20}$", $apellido_usuario)) 
		   { 
		      $error_clave ="El Apellido de usuario $nombre_usuario es correcto<br>"; 
		      return true; 
		   } else { 
		       $error_clave = "El Apellido de usuario $nombre_usuario no es válido<br>"; 
		      return false; 
		   } 
	}	
function comprobar_profesion($profesion_usuario,&$error_clave)
	{ 
		   if (ereg("^[a-zA-Z\-_ ]{4,100}$", $profesion_usuario)) 
		   { 
		      $error_clave ="La Profesión de usuario $profesion_usuario es correcto<br>"; 
		      return true; 
		   } else { 
		       $error_clave = "La Profesión de usuario $profesion_usuario no es válido<br>"; 
		      return false; 
		   } 
	}		
function comprobar_email($email_usuario,&$error_email)
	{ 
		if (filter_var($email_usuario, FILTER_VALIDATE_EMAIL)) 
			{
	    		$error_email = "Esta dirección de correo ($email_a) es válida.";
	    		return true; 
			}
			else
			{
    			$error_email =  "Esta dirección de correo ($email_b) no es válida.";
				return false; 
			}
	}	
function comprobar_telefono($telefono_usuario,&$error_clave)
	{ 
		   if (ereg("^[0-9]{9,20}$",$telefono_usuario)) 
		   { 
		      $error_clave ="El Teléfono de usuario $telefono_usuario es correcto<br>"; 
		      return true; 
		   } else { 
		       $error_clave = "El Teléfono de usuario $telefono_usuario no es válido<br>"; 
		      return false; 
		   } 
	}		
if (validarCI($strCedula,$error_encontrado))
	{
		if (validar_clave($_POST["clave"], $error_encontrado))
		{
      		if (comprobar_nombre($nombre_usuario, $error_encontrado))
			      	{
			     		if (comprobar_apellido($apellido_usuario,$error_encontrado))
					      	{
						      	if (comprobar_email($email_usuario,$error_email))
							      	{
								      	if (comprobar_telefono($telefono_usuario,$error_telefono))
									      	{
										      	if (comprobar_profesion($profesion_usuario,$error_profesion))
											      	{
											      		
												      			$doc_cla=$_REQUEST["clave"];	
																$doc_cla_crip = crypt($doc_cla,'crackmaster');
																$sql="insert into respbrigada (respbrigada_cedula,clave,nombres,apellidos,email,brigada_id,telefono,profesion,rol) values
																(UPPER('".$_REQUEST["respbrigada_cedula"]."'),'".$doc_cla_crip ."',UPPER('".$_REQUEST["nombres"]."'),UPPER('".$_REQUEST["apellidos"]."'),UPPER('".$_REQUEST["email"]."'),
																UPPER('".$_REQUEST["brigada"]."'),UPPER('".$_REQUEST["telefono"]."'),UPPER('".$_REQUEST["profesion"]."'),
																UPPER('".$_REQUEST["rol"]."'))";
																			
																	if(mysql_query($sql,$con))
																	{
																			
																			cuadro_mensaje("Responsable de Brigada registrado Correctamente...");
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
											      		cuadro_error("$error_profesion");
											   			}		
									   		}
									   			else
									   			{
									      		cuadro_error("$error_telefono");
									   			}		
						   			}
							   			else
							   			{
							      		cuadro_error("$error_email");
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

<form name="registro" action="reg_respbrigada.php" method="post" enctype="multipart/form-data">
	<table width="700" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>RESPONSABLE DE BRIGADA</h3></td>
		</tr>
		<tr>
			<td>1. REGISTRAR DATOS DEL RESPONSABLE DE BRIGADA</td>
		</tr>
		<tr>
			<td class="tdatos">CÉDULA</td>
			<td class="dtabla"><input type="text" name="respbrigada_cedula" value="<?php echo $_REQUEST["respbrigada_cedula"]; ?>" size="40" /></td>
		</tr>
		<tr>
			<td class="tdatos">CLAVE</td>
			<td class="dtabla"><input type="text" name="clave" value="<?php echo $_REQUEST["clave"]; ?>" size="40" /></td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE</td>
			<td class="dtabla"><input type="text" name="nombres" value="<?php echo $_REQUEST["nombres"]; ?>" size="40" /></td>
		</tr>
		<tr>
			<td class="tdatos">APELLIDOS</td>
			<td class="dtabla"><input type="text" name="apellidos" value="<?php echo $_REQUEST["apellidos"]; ?>" size="40" /></td>
		</tr>
		<tr>
			<td class="tdatos">E-MAIL</td>
			<td class="dtabla"><input type="text" name="email" value="<?php echo $_REQUEST["email"]; ?>" size="40" /></td>
		</tr>	
		<tr>
			<td class="tdatos">BRIGADA</td>
			<?php
			echo '<td>
				
					<select name="brigada" id="brigada" >
					';	
					//listamos grupos para componer el select
					$consulta_brigada = mysql_query("SELECT * FROM brigada ORDER BY brigada_nombre");
					$n_brigada = mysql_num_rows($consulta_brigada);
					for($d=0;$d<$n_brigada;$d++)
					{
					$reg_consulta_brigada = mysql_fetch_array($consulta_brigada);
					echo '<option value="'.$reg_consulta_brigada['brigada_id'].'">'.$reg_consulta_brigada['brigada_nombre'].' </option>';
					}
				echo '	
				</select>
			
			</td>';
			?>
		</tr>	
		<tr>
			<td class="tdatos">TÉLEFONO</td>
			<td class="dtabla"><input type="text" name="telefono" value="<?php echo $_REQUEST["telefono"]; ?>" size="40" /></td>
		</tr>
		<tr>
			<td class="tdatos">PROFESIÓN</td>
			<td class="dtabla"><input type="text" name="profesion" value="<?php echo $_REQUEST["profesion"]; ?>" size="40" /></td>
		</tr>
		<tr>
			<td class="tdatos">TIPO USUARIO</td>
			<?php
			echo '<td>
				
					<select name="rol" id="rol" >
					';	
					//listamos grupos para componer el select
					$consulta_brigada = mysql_query("SELECT * FROM rol ORDER BY rol_nombre");
					$n_brigada = mysql_num_rows($consulta_brigada);
					for($d=0;$d<$n_brigada;$d++)
					{
					$reg_consulta_brigada = mysql_fetch_array($consulta_brigada);
					echo '<option value="'.$reg_consulta_brigada['rol_id'].'">'.$reg_consulta_brigada['rol_nombre'].' </option>';
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