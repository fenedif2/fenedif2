<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><h6>EXPEDIENTE</h6></div>
<?php
if (strtolower($_REQUEST["acc"])=="registrar")
{
	$strCedula=$_REQUEST["expediente_cedula"];
	$nombre_usuario=$_REQUEST["expediente_nombre"];
		
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
		   if (ereg("^[a-zA-Z\-_ ]{4,100}$", $nombre_usuario)) 
		   { 
		      $error_clave ="El nombre de usuario $nombre_usuario es correcto<br>"; 
		      return true; 
		   } else { 
		       $error_clave = "El nombre de usuario $nombre_usuario no es válido<br>"; 
		      return false; 
		   } 
	}
	
if (validarCI($strCedula,$error_encontrado))
	{
		
      		if (comprobar_nombre($nombre_usuario, $error_encontrado))
			      	{
			     		
						$sql="insert into expediente (expediente_codigo,expediente_cedula,expediente_nombre,
						provincia,canton,parroquia,expediente_sector,expediente_superficie,respbrigada_id,inicio,fin,
						memo_id,avance) values
						(UPPER('".$_REQUEST["expediente_codigo"]."'),UPPER('".$_REQUEST["expediente_cedula"]."'),UPPER('".$_REQUEST["expediente_nombre"]."'),
						UPPER('".$_REQUEST["provincia"]."'),UPPER('".$_REQUEST["cantones"]."'),UPPER('".$_REQUEST["parroquias"]."'),
						UPPER('".$_REQUEST["expediente_sector"]."'),UPPER('".$_REQUEST["expediente_superficie"]."'),UPPER('".$_REQUEST["respbrigada_id"]."'),UPPER('".$_REQUEST["ini"]."'),
						UPPER('".$_REQUEST["fin"]."'),UPPER('".$_REQUEST["memo"]."'),UPPER('".$_REQUEST["avance"]."'))";
							
							if(mysql_query($sql,$con))
							{
									cuadro_mensaje("Expediente registrado Correctamente...");
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
			      		cuadro_error(" $error_encontrado");
			   			}
			
  	}
   		else
   		{
    	 cuadro_error("cedula no valida: " .$error_encontrado);
   		}	
	
		
	
							
		
}
$consulta=mysql_query("SELECT id, opcion FROM tprovincia");
$consultac=mysql_query("SELECT id, opcion FROM tcanton");
?>

<form name="registro" action="reg_expediente.php" method="post" enctype="multipart/form-data">
	<table width="700" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>EXPEDIENTE</h3></td>
		</tr>
		<tr>
			<td>1. REGISTRAR EXPEDIENTE</td>
		</tr>
		<tr>
			<td class="tdatos">CÓDIGO EXPEDIENTE</td>
			<td class="dtabla"><input type="text" name="expediente_codigo" value="<?php echo $_REQUEST["expediente_codigo"]; ?>" size="40" /></td>
		</tr>
		<tr>
			<td class="tdatos">CÉDULA</td>
			<td class="dtabla"><input type="text" name="expediente_cedula" value="<?php echo $_REQUEST["expediente_cedula"]; ?>" size="40" /></td>
		</tr>
		<tr>
			<td class="tdatos">BENEFICIARIO</td>
			<td class="dtabla"><input type="text" name="expediente_nombre" value="<?php echo $_REQUEST["expediente_nombre"]; ?>" size="100" /></td>
		</tr>
		
		<tr>
			
			<td class="tdatos">PROVINCIA</td>
			<?php
		
			echo '<td>

					<select name="provincia" id="provincia" readonly="readonly" style="background-color:#F7D358">';
					
					while($registro=mysql_fetch_row($consulta))
						{
							echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
						}
				echo '	
				</select>
			
			</td>';
		
			?>
		</tr>
		<tr>
		<td class="tdatos">CANTON</td>
			<?php
		
			echo '<td>

					<select name="cantones" id="catones" onChange="cargaContenido(this.id)">';
					
					while($registro=mysql_fetch_row($consultac))
						{
							echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
						}
				echo '	
				</select>
			
			</td>';
		
			?>
		</tr>
		<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>AJAX, Ejemplos: Combos (select) dependientes, codigo fuente - ejemplo</title>
<link rel="stylesheet" type="text/css" href="select_dependientes.css">
<script type="text/javascript" src="select_dependientes.js"></script>
</head>

<body>
		
		<tr>
			
			<td class="tdatos">PARROQUIA</td>
		
				<td id="demoDer">
					<select  name="parroquias" id="parroquias" >
						<option value="0" td class="tdatos">Selecciona opci&oacute;n...</option>
					</select>
				
				
			</td>
		</tr>	
			
</body>
</html>
		<tr>
			<td class="tdatos">SECTOR</td>
			<td class="dtabla"><input type="text" name="expediente_sector" value="<?php echo $_REQUEST["expediente_sector"]; ?>" size="40" /></td>
		</tr>
		<tr>
			<td class="tdatos">SUPERFICIE</td>
			<td class="dtabla"><input type="text" name="expediente_superficie" value="<?php echo $_REQUEST["expediente_superficie"]; ?>" size="40" /></td>
		</tr>
		<tr>
			<td class="tdatos">RESPONSABLE DE BRIGADA</td>
			<?php
			echo '<td>
				
					<select name="respbrigada_id" id="respbrigada_id" >
					';	
					//listamos grupos para componer el select
					$consulta_respbrigada = mysql_query("select * from respbrigada");
					$n_respbrigada = mysql_num_rows($consulta_respbrigada);
					for($d=0;$d<$n_respbrigada;$d++)
						{
							$reg_consulta_respbrigada = mysql_fetch_array($consulta_respbrigada);
							echo '<li><option value="'.$reg_consulta_respbrigada['respbrigada_id'].'">'.$reg_consulta_respbrigada['nombres'].'   '.$reg_consulta_respbrigada['apellidos'].'</option></li>';
						}
				echo '	
				</select>
			
			</td>';
			?>  
			  
		</tr>
		<tr>
			<td  class="tdatos">FECHA INICIO</td>
			
				<html>
						  <head>
						    <title>Dynarch Calendar -- Simple popup calendar</title>
						    <script src="../theme/js/jscal2.js"></script>
						    <script src="../theme/js/lang/en.js"></script>
						    <link rel="stylesheet" type="text/css" href="../theme/css/jscal2.css" />
						    <link rel="stylesheet" type="text/css" href="../theme/css/border-radius.css" />
						    <link rel="stylesheet" type="text/css" href="../theme/css/steel/steel.css" />
						  </head>
						  <body>
						    <td class="dtabla"><input size="30" id="ini" name="ini" value="<?php echo $ini?>"> <button id="f_btn1">...</button><br /></td>
						    <script type="text/javascript">//<![CDATA[
						      Calendar.setup({
						        inputField : "ini",
						        trigger    : "f_btn1",
						        onSelect   : function() { this.hide() },
						        showTime   : 12,
						        dateFormat : "%Y-%m-%d"
						      });
						    //]]></script>
						  </body>
					</html>
					
		</tr>
		<tr>
			<td  class="tdatos">FECHA FIN</td>
			
				<html>
						  <head>
						    <title>Dynarch Calendar -- Simple popup calendar</title>
						    <script src="../theme/js/jscal2.js"></script>
						    <script src="../theme/js/lang/en.js"></script>
						    <link rel="stylesheet" type="text/css" href="../theme/css/jscal2.css" />
						    <link rel="stylesheet" type="text/css" href="../theme/css/border-radius.css" />
						    <link rel="stylesheet" type="text/css" href="../theme/css/steel/steel.css" />
						  </head>
						  <body>
						    <td class="dtabla"><input size="30" id="fin" name="fin" value="<?php echo $_REQUEST["fin"]; ?>"> <button id="f_btn">...</button><br /></td>
						
						    <script type="text/javascript">//<![CDATA[
						      Calendar.setup({
						        inputField : "fin",
						        trigger    : "f_btn",
						        onSelect   : function() { this.hide() },
						        showTime   : 12,
						        dateFormat : "%Y-%m-%d"
						      });
						    //]]></script>
						  </body>
					</html>
		</tr>	
		<tr>
			<td class="tdatos">MEMORÁNDUM</td>
			<?php
			echo '<td>
				
					<select name="memo" id="memo" >
					';	
					//listamos grupos para componer el select
					$consulta_conv = mysql_query("select * from memo");
					$n_conv = mysql_num_rows($consulta_conv);
					for($d=0;$d<$n_conv;$d++)
						{
							$reg_consulta_conv = mysql_fetch_array($consulta_conv);
							echo '<option value="'.$reg_consulta_conv['memo_id'].'">'.$reg_consulta_conv['memo_nombre'].' </option>';
						}
				echo '	
				</select>
			</td>';
			?>
		</tr>
		<tr>	
		
			<td class="dtabla"><input type="hidden" name="avance" value="<?php echo $_REQUEST["avance"]; ?>" size="40" /></td>
			
		<tr>
			<td colspan="2" align="center"><input type="submit" name="acc" value="Registrar">
			<input name="Restablecer" type="reset" value="Limpiar" /></td>
		</tr>
	</table>
</form>
<?php


require("../theme/footer_inicio.php");
?>
