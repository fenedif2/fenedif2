<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
require("../theme/funcion.php");
$sesion = $_REQUEST['p1'];
$fecha_ing = date('Y-m-d');

//extraigo nombre del día
$dia_ing=extrae_dia_mysql($fecha_ing);
$mes_ing=extrae_mes_ingles($fecha_ing);
$anyo_ing=substr($fecha_ing,0,4);
$nombre_dia_ing=date('D',mktime(0,0,0,$mes_ing,$dia_ing,$anyo_ing));
$numero_dia = nombre_dia_a_numero($nombre_dia_ing);
$nombre_dia=encuentra_dia($numero_dia-1);

$fecha_esp = cambia_fecha_a_esp($fecha_ing);

//si venimos de realizar algún registro
$registro=$_POST['registro'];
switch($registro)
	{
	//casos
	case 'not':
	$actividad=$_POST['actividad'];
	$descripcion=$_POST['descripcion'];
	echo '<br /><span class="texto_centrado"> '.$id_inf_not.' '.$actividad.' ('.$descripcion.')</span>';
	$numero=$_POST['numero'];
	echo '<ol class="negrita">';
	for($l=0;$l<$numero;$l++)
		{
		$nota[$l] = $_POST['nota_'.$l.''];
		$codigo[$l] = $_POST['cod_'.$l.''];
		$coment[$l] = $_POST['com_'.$l.''];
		$nom[$l] = $_POST['nom_'.$l.''];
		$ape[$l] = $_POST['ape_'.$l.''];
		if(isset($nota[$l]) && $nota[$l] != '')
			{
			$ins_not=mysql_query("insert into notas values('','$codigo[$l]','$sesion','$fecha_ing','$actividad','$nota[$l]','$descripcion','$coment[$l]')");
			echo '<li>'.$ape[$l].', '.$nom[$l].' '.$nota[$l].' '.$coment[$l].'</li>';
			}
		}
	echo '</ol>';
	echo '<br /><a href="#" onclick="pdf()" title="'.$id_pdf.'"><img src="imgs/informe.png" alt="'.$id_pdf.'" /></a>';
	break;
	
	case 'obs':
	echo '<br /><span class="texto_centrado"> '.$id_inf_obs.'</span>';
	$numero=$_POST['numero'];
	echo '<ol class="negrita">';
	for($l=0;$l<$numero;$l++)
		{
		$codigo[$l] = $_POST['cod_'.$l.''];
		$observ[$l] = $_POST['com_'.$l.''];
		$nom[$l] = $_POST['nom_'.$l.''];
		$ape[$l] = $_POST['ape_'.$l.''];
		if(isset($observ[$l]) && $observ[$l] != '')
			{
			$ins_observ=mysql_query("insert into observaciones values('','$codigo[$l]','$sesion','$observ[$l]','$fecha_ing')");
			echo '<li>'.$ape[$l].', '.$nom[$l].' '.$observ[$l].'</li>';
			}
		}
	echo '</ol>';
	break;
	}//fin switch registro

echo '<br/><span class="negrita">'.$id_agr.' '.$sesion.'. '.$id_fecha.': '.$nombre_dia.', '.$fecha_esp.'</span>';

echo '<p class="centrado">';
$sel_agr = mysql_query("select * from agrupamientos where agrupamiento = '$sesion'");
		$num_agr = mysql_num_rows($sel_agr);
		for($agr=0;$agr<$num_agr;$agr++)
			{
			$reg_agr = mysql_fetch_array($sel_agr);
			echo '<br /><span class="negrita">'.$reg_agr['nombre'].'</span><br />';
			$date1=date("Y-m-d");
			$date2=$reg_agr['fin'];
			$s = strtotime($date2)-strtotime($date1);
			$d = intval($s/86400);
			$s -= $d*86400;
			$h = intval($s/3600);
			$s -= $h*3600;
			$m = intval($s/60);
			$s -= $m*60;
 			$dif= (($d*24)+$h).hrs." ".$m."min";
			$dif2= $d.$space.dias." ".$h.hrs." ".$m."min";
			if($dif2>0)
			{
				echo "<font color='#ff0000'>LE FALTA  $dif2 PARA TERMINAR EL PROYECTO</font>"; 
			}
else {
	echo "<font color='#ff0000'><blink>SU TIEMPO A TERMINADO ACÉRQUESE  DE URGENCIA AL DEPARTAMENTO DE INVESTIGACION</blink></font>"; 
}
		

echo $dias;
////////////////////////////////////////// avnce del proyecto //////////////////////////
	//comprobamos si el docente no tiene actividades específicas por período////
	$sel_per_act = mysql_query("select * from actividades where agrupamiento = '$sesion' and periodo != '*'");
	$num_per_act = mysql_num_rows($sel_per_act);
	if($num_per_act >= 0)
	{
		$sel_alum = mysql_query("select matricula.codigo,alumnado.nombre,alumnado.apellidos from alumnado,matricula where matricula.agrupamiento='$sesion' and matricula.codigo=alumnado.codigo order by alumnado.apellidos,alumnado.nombre");
		$num_alum = mysql_num_rows($sel_alum);
		echo '<br /><br /><table class="tablacentrada"><tr><td>Avance del Proyecto</td><td> Porcentaje</td></tr>';
	for($al=0;$al<$num_alum;$al++)
		{
		$reg_alum = mysql_fetch_array($sel_alum);
		$alu_post=$reg_alum['codigo'];
		$nom_post=$reg_alum['nombre'];
		$ape_post=$reg_alum['apellidos'];
		$sel_activ = mysql_query("select * from actividades where agrupamiento = '$sesion' ");
		$num_activ = mysql_num_rows($sel_activ);
		if($num_activ>0)
			{
			for($a=0;$a<$num_activ;$a++)
				{
				$reg_activ = mysql_fetch_array($sel_activ);
				$actividad = $reg_activ['actividad'];
 				$pond = $reg_activ['ponderacion'];
				$sel_not = mysql_query("select notas.nota from notas,periodos where notas.codigo='$alu_post' and notas.agrupamiento='$sesion' and notas.actividad='$actividad'");
				$num_not = mysql_num_rows($sel_not);
			if($num_not>0)
				{
				$sel_notas = mysql_query("select avg(notas.nota) from notas,periodos where notas.codigo='$alu_post' and notas.agrupamiento='$sesion' and notas.actividad='$actividad'");
				$num_notas = mysql_num_rows($sel_notas);		
				$reg_notas = mysql_fetch_array($sel_notas);
				$nota_media = $reg_notas['avg(notas.nota)'];
				$matriz_nota_media_pond[]=$nota_media*$pond/100;
				$prom=(($nota_media*$pond/100)+$prom);		
				}		
			}//fin for actividades
		$count =  count($matriz_nota_media_pond);
		if($count > 0)
			{
			$suma_nota_media = array_sum($matriz_nota_media_pond);
			
			//veremos si hay nota de recuperación
			$sel_recu = mysql_query("select nota,periodo from recuperaciones where codigo ='$alu_post' and agrupamiento = '$sesion'");
			$num_recu = mysql_num_rows($sel_recu);
			if($num_recu>0)
				{
				//echo '<td class="justificado">'.$ape_post.', '.$nom_post.'</td><td>'.round($suma_nota_media,2).'';
				
				for($r=0;$r<$num_recu;$r++)
					{
					$reg_recu=mysql_fetch_array($sel_recu);
					echo ' (R'.$reg_recu['periodo'].': '.$reg_recu['nota'].')';
					}
				echo '</td></tr>';
				}
			else
				{
				$reg_recu = mysql_fetch_array($sel_recu);
			
				}
			unset($matriz_nota_media_pond);
			
			}
		else
			{
			//echo '<td class="justificado">'.$ape_post.', '.$nom_post.'</td><td>'.$id_no_calif.'</td></tr>';
			}	
		}
		

	}//fin for alumnos
	if($num_alum>0)
	{
		$promedio=$prom/$num_alum;
		$porcentaje=$promedio*10;
	}
	else 
	{
		$promedio=0;
	}
	
	if($porcentaje>95)
	{
		echo '<td><font color="#00005C" >'.$porcentaje.' % Teminado... </font></td>';
		echo '<td><img src="imgs/terminar.jpg"><td>';	
		
	}
	else
		{
		echo '<td><font color="#A3000A" >'.$porcentaje.' % En Proceso ...</font></td>';
		echo '<td><img src="imgs/proceso.jpg"><td>';
		
		}
	echo '</table>';
	

		}

			
			
			
/////////////////////////////fin de  vance/////////////////////////////////////////////
			
			}

echo '</p><br />';
echo '<p class="centrado">';
echo '<a href="#" onclick="miraAgrup(\''.$sesion.'\')">'.$id_inf_not.'</a>&nbsp;';
echo '<a href="#" onclick="abreAgrup1(\''.$sesion.'\')">'.$id_inf_obs.'</a>&nbsp;';
echo '</p><br />';

$accion = $_REQUEST['p4'];
//$accion = $_POST['p4'];
$id=$_POST['p44'];
switch($accion)
{
//las calificaciones
case 'not':
	
echo '<form id="notas" name="notas">';
echo '<table class="tablacentrada"><tr><td>';
echo '<select id="act" onchange="blacklist1()">';
if($_POST['act_post'])
	{
	echo '<option selected="selected">'.$_POST['act_post'].'</option>';
	}
echo '<option value="0">'.$id_elgact.'</option>';
$sel_per = mysql_query("select inicio,fin,periodo from periodos where inicio<'$fecha_ing' and fin>'$fecha_ing'");
$reg_per = mysql_fetch_array($sel_per);
$periodo = $reg_per['periodo'];
$ini_per = $reg_per['inicio'];
$fin_per = $reg_per['fin'];
$sel_act = mysql_query("select actividad from actividades where agrupamiento='$sesion' and periodo = '$periodo' or agrupamiento='$sesion' "); 
$num_act = mysql_num_rows($sel_act);
for($a=0;$a<$num_act;$a++)
	{
	$reg_act=mysql_fetch_array($sel_act);
	echo '<option>'.$reg_act['actividad'].'</option>';
	}
echo '</select>';

echo '&nbsp;';echo '&nbsp;';
$variablephp = "<script> document.write(variablejs) </script>";



echo '<img src="imgs/desc_peq.png" title="'.$id_descripcion.'" alt="'.$id_descripcion.'" /> <input id="desc" size="40" type="text" />';
echo '</td></tr></table>';
echo '<br />';
//selecciono el alumnado del agrupamiento
$sel_alum = mysql_query("select alumnado.codigo,alumnado.nombre,alumnado.apellidos,matricula.codigo,matricula.agrupamiento from alumnado,matricula where matricula.agrupamiento='$sesion' and matricula.codigo=alumnado.codigo order by apellidos, nombre");
$num_alum = mysql_num_rows($sel_alum);
//dividimos en tres bloques la lista
$div=($num_alum/3);
$div_red=round($div,0);
//con un bucle listamos
echo '<table class="tablacentrada">';
echo '<tr>';
echo '<td class="justificado">';
echo '<ul>';
for($n=0;$n<$div_red;$n++)
	{
	$reg_alum=mysql_fetch_array($sel_alum);
	$nom_alum=$reg_alum['nombre'];
	$ape_alum =$reg_alum['apellidos'];
	$cod_alum =$reg_alum['codigo'];

	//voy a contar las veces que se ha calificado la actividad si es que la hemos elegido del select ya
	if($_POST['act_post'])
		{
		$actividad_elegida = $_POST['act_post'];
		$sel_veces = mysql_query("select id from notas where agrupamiento='$sesion' and codigo='$cod_alum' and actividad='$actividad_elegida' and fecha between '$ini_per' and '$fin_per'");
		$num_veces = mysql_num_rows($sel_veces);
		}
		echo '<li><select name="nota_'.$n.'" id="nota_'.$n.'">';
				for($i=0;$i<11;$i++)
				{
				echo '<option>'.$i.'</option>';
				}
		echo '</select>
		<input type="hidden" id="cod_'.$n.'" name="cod_'.$n.'" value="'.$cod_alum.'" /><input type="hidden" id="nom_'.$n.'" name="nom_'.$n.'" value="'.$nom_alum.'" /><input type="hidden" id="ape_'.$n.'" name="ape_'.$n.'" value="'.$ape_alum.'" /> <a href="#" onclick="abreFicha(\''.$cod_alum.'\',\''.$sesion.'\',\''.$fecha_ing.'\',\''.$hini.'\',\''.$accion.'\')" title="'.$id_verficha.'"> '.$ape_alum.'</a>, <a href="#" title="'.$id_foto.'" onclick="new LITBox(\'carga_foto_al.php?usuario='.$cod_alum.'\', {type:\'window\', overlay:true, height:190, width:120, resizable:false});">'.$nom_alum.'</a>&nbsp;'.$num_veces.'&nbsp;<a href="#" onclick="muestraComent(\''.$n.'\')" title="'.$id_coment.'"  ><img src="imgs/obs_peq.png" alt="'.$id_coment.'" /></a></li>';

		echo '<li class="oculto" id="li_'.$n.'">';
		echo '<textarea id="com_'.$n.'" name="com_'.$n.'" columns="20" rows="3"></textarea>';
		echo '&nbsp;';
		echo '<a href="#" onclick="ocultaComent(\''.$n.'\')" title="'.$id_ocultar.'"><img src="imgs/cancelar_peq.png" alt="'.$id_ocultar.'" /></a>';
		echo '</li>';
		
	}
echo '</ul>';
echo '</td>';
echo '<td class="justificado">';
echo '<ul>';
for($n=$div_red;$n<(2*$div_red);$n++)
	{
	$reg_alum=mysql_fetch_array($sel_alum);
	$nom_alum=$reg_alum['nombre'];
	$ape_alum =$reg_alum['apellidos'];
	$cod_alum =$reg_alum['codigo'];

	//voy a contar las veces que se ha calificado la actividad si es que la hemos elegido del select ya
	if($_POST['act_post'])
		{
		$actividad_elegida = $_POST['act_post'];
		$sel_veces = mysql_query("select id from notas where agrupamiento='$sesion' and codigo='$cod_alum' and actividad='$actividad_elegida' and fecha between '$ini_per' and '$fin_per'");
		$num_veces = mysql_num_rows($sel_veces);
		}

				echo '<li><select name="nota_'.$n.'" id="nota_'.$n.'">';
				for($i=0;$i<11;$i++)
				{
				echo '<option>'.$i.'</option>';
				}
				echo '</select>
		<input type="hidden" id="cod_'.$n.'" name="cod_'.$n.'" value="'.$cod_alum.'" /><input type="hidden" id="nom_'.$n.'" name="nom_'.$n.'" value="'.$nom_alum.'" /><input type="hidden" id="ape_'.$n.'" name="ape_'.$n.'" value="'.$ape_alum.'" /> <a href="#" onclick="abreFicha(\''.$cod_alum.'\',\''.$sesion.'\',\''.$fecha_ing.'\',\''.$hini.'\',\''.$accion.'\')" title="'.$id_verficha.'"> '.$ape_alum.'</a>, <a href="#" title="'.$id_foto.'" onclick="new LITBox(\'carga_foto_al.php?usuario='.$cod_alum.'\', {type:\'window\', overlay:true, height:190, width:120, resizable:false});">'.$nom_alum.'</a>&nbsp;'.$num_veces.'&nbsp;<a href="#" onclick="muestraComent(\''.$n.'\')" title="'.$id_coment.'"  ><img src="imgs/obs_peq.png" alt="'.$id_coment.'" /></a></li>';
		echo '<li class="oculto" id="li_'.$n.'">';
		echo '<textarea id="com_'.$n.'" name="com_'.$n.'" columns="20" rows="3"></textarea>';
		echo '&nbsp;';
		echo '<a href="#" onclick="ocultaComent(\''.$n.'\')" title="'.$id_ocultar.'"><img src="imgs/cancelar_peq.png" alt="'.$id_ocultar.'" /></a>';
		echo '</li>';
		
	}
echo '</ul>';
echo '</td>';
echo '<td class="justificado">';
echo '<ul>';
for($n=(2*$div_red);$n<$num_alum;$n++)
	{
	$reg_alum=mysql_fetch_array($sel_alum);
	$nom_alum=$reg_alum['nombre'];
	$ape_alum =$reg_alum['apellidos'];
	$cod_alum =$reg_alum['codigo'];

	//voy a contar las veces que se ha calificado la actividad si es que la hemos elegido del select ya
	if($_POST['act_post'])
		{
		$actividad_elegida = $_POST['act_post'];
		$sel_veces = mysql_query("select id from notas where agrupamiento='$sesion' and codigo='$cod_alum' and actividad='$actividad_elegida' and fecha between '$ini_per' and '$fin_per'");
		$num_veces = mysql_num_rows($sel_veces);
		}
		echo '<li><select name="nota_'.$n.'" id="nota_'.$n.'">';
			for($i=0;$i<11;$i++)
			{
			echo '<option>'.$i.'</option>';
			}
		echo '</select>
		<input type="hidden" id="cod_'.$n.'" name="cod_'.$n.'" value="'.$cod_alum.'" />
		<input type="hidden" id="nom_'.$n.'" name="nom_'.$n.'" value="'.$nom_alum.'" />
		<input type="hidden" id="ape_'.$n.'" name="ape_'.$n.'" value="'.$ape_alum.'" /> <a href="#" onclick="abreFicha(\''.$cod_alum.'\',\''.$sesion.'\',\''.$fecha_ing.'\',\''.$hini.'\',\''.$accion.'\')" title="'.$id_verficha.'"> '.$ape_alum.'</a>, <a href="#" title="'.$id_foto.'" onclick="new LITBox(\'carga_foto_al.php?usuario='.$cod_alum.'\', {type:\'window\', overlay:true, height:190, width:120, resizable:false});">'.$nom_alum.'</a>&nbsp;'.$num_veces.'&nbsp;<a href="#" onclick="muestraComent(\''.$n.'\')" title="'.$id_coment.'"  ><img src="imgs/obs_peq.png" alt="'.$id_coment.'" /></a></li>';
		echo '<li class="oculto" id="li_'.$n.'">';
		echo '<textarea id="com_'.$n.'" name="com_'.$n.'" columns="20" rows="3"></textarea>';
		echo '&nbsp;';
		echo '<a href="#" onclick="ocultaComent(\''.$n.'\')" title="'.$id_ocultar.'"><img src="imgs/cancelar_peq.png" alt="'.$id_ocultar.'" /></a>';
		echo '</li>';
		
	}
echo '</ul>';
echo '</td>';
echo '</tr>';
echo '</table><br />';
echo '<p class="centrado"><a href="#" onclick="grabaNota1(\''.$sesion.'\',\''.$num_alum.'\')" title="'.$id_regnotas.'"><img src="imgs/guardar.png" alt="'.$id_regnotas.'" /></a></p>';
echo '</form>';
break;
}

require("../theme/footer_inicio.php");
?>
