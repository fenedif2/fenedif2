<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><h6>TÉCNICOS</h6></div>
<?php
if (strtolower($_REQUEST["acc"])=="registrar")
{
	$strCedula=$_REQUEST["tecnico_id"];
	$nombre_usuario=$_REQUEST["tecnico_nombres"];
	$apellido_usuario=$_REQUEST["tecnico_apellidos"];
	$profesion_usuario=$_REQUEST["profesion"];
	$cargo_usuario=$_REQUEST["cargo"];
function validarCI($strCedula,&$error_clave)
	{
		if(is_null($strCedula) || empty($strCedula))
		{//compruebo si que el numero enviado es vacio o null
		
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
function comprobar_cargo($cargo_usuario,&$error_clave)
	{ 
		   if (ereg("^[a-zA-Z\-_ ]{4,100}$", $cargo_usuario)) 
		   { 
		      $error_clave ="El Cargo del Técnico $cargo_usuario es correcto<br>"; 
		      return true; 
		   } else { 
		       $error_clave = "El Cargo del Técnico$cargo_usuario no es válido<br>"; 
		      return false; 
		   } 
	}		
				
if (validarCI($strCedula,$error_encontrado))
	{
		
      		if (comprobar_nombre($nombre_usuario, $error_encontrado))
			      	{
			     		if (comprobar_apellido($apellido_usuario,$error_encontrado))
					      	{
						     	if (comprobar_profesion($profesion_usuario,$error_profesion))
									{
											      	if (comprobar_cargo($cargo_usuario,$error_cargo))
											      	{
												      					
												      		$clave_familia = rand(10000,99999);	
															$inserta_clave_familia = mysql_query("insert into acceso_tecnicos values ('".$_REQUEST["tecnico_id"]."','$clave_familia')");		
															$sql="insert into tecnico (tecnico_id,tecnico_nombres,tecnico_apellidos,ttecnico_id,
															profesion,brigada_id,cargo,clave) values
															(UPPER('".$_REQUEST["tecnico_id"]."'),UPPER('".$_REQUEST["tecnico_nombres"]."'),UPPER('".$_REQUEST["tecnico_apellidos"]."'),UPPER('".$_REQUEST["ttecnico"]."'),
															UPPER('".$_REQUEST["profesion"]."'),UPPER('".$_REQUEST["brigada"]."'),UPPER('".$_REQUEST["cargo"]."'),
															'".$clave_familia."')";
							
															if(mysql_query($sql,$con))
															{
																	cuadro_mensaje("TÉCNICO registrado Correctamente...");
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
											      		cuadro_error("$error_cargo");
											   			}		
								}
									else
										{
										cuadro_error("$error_profesion..");
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
    	 cuadro_error("cedula no valida: " . $error_encontrado);
   		}
	
		//validaciones 
	
		
}
?>

<form name="registro" action="reg_tecnicos.php" method="post" enctype="multipart/form-data">
	<table width="700" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>TÉCNICOS</h3></td>
		</tr>
		<tr>
			<td>1. REGISTRAR TÉCNICOS</td>
		</tr>
		<tr>
			<td class="tdatos">LOGIN/CÉDULA</td>
			<td class="dtabla"><input type="text" name="tecnico_id" value="<?php echo $_REQUEST["tecnico_id"]; ?>" size="40" /></td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRES</td>
			<td class="dtabla"><input type="text" name="tecnico_nombres" value="<?php echo $_REQUEST["tecnico_nombres"]; ?>" size="40" /></td>
		</tr>
		<tr>
			<td class="tdatos">APELLIDOS</td>
			<td class="dtabla"><input type="text" name="tecnico_apellidos" value="<?php echo $_REQUEST["tecnico_apellidos"]; ?>" size="40" /></td>
		</tr>
		<tr>
			<td class="tdatos">TIPO TÉCNICO</td>
			<?php
			echo '<td>
				
					<select name="ttecnico" id="ttecnico" >
					';	
					//listamos grupos para componer el select
					$consulta_uoi = mysql_query("SELECT * FROM ttecnico ORDER BY ttecnico_nombre");
					$n_uoi = mysql_num_rows($consulta_uoi);
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['ttecnico_id'].'">'.$reg_consulta_uoi['ttecnico_nombre'].' </option>';
					}
				echo '	
				</select>
			
			</td>';
			?>
		</tr>
		<tr>
			<td class="tdatos">PROFESIÓN</td>
			<td class="dtabla"><input type="text" name="profesion" value="<?php echo $_REQUEST["profesion"]; ?>" size="40" /></td>
		</tr>
		<tr>
			<td class="tdatos">BRIGADA</td>
			<?php
			echo '<td>
				
					<select name="brigada" id="brigada" >
					';	
					//listamos grupos para componer el select
					$consulta_uoi = mysql_query("SELECT * FROM brigada ORDER BY brigada_nombre");
					$n_uoi = mysql_num_rows($consulta_uoi);
					for($d=0;$d<$n_uoi;$d++)
					{
					$reg_consulta_uoi = mysql_fetch_array($consulta_uoi);
					echo '<option value="'.$reg_consulta_uoi['brigada_id'].'">'.$reg_consulta_uoi['brigada_nombre'].' </option>';
					}
				echo '	
				</select>
			
			</td>';
			?>
		</tr>
		<tr>
			<td class="tdatos">CARGO</td>
			<td class="dtabla"><input type="text" name="cargo" value="<?php echo $_REQUEST["cargo"]; ?>" size="40" /></td>
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