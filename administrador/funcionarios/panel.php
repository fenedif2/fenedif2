<?php
session_start();
//incluimos funciones,configuración e idioma
require("conexion.php");
include('../funciones.php');
require('../idioma/castellano.php');
require("config.php");
//conectamos con MySQL
echo $_POST['numero'];
//comprobamos usuario y clave
if (isset($_POST['numero']) && isset($_POST['clave']))
	{
	$familia = $_POST['numero'];
	$clave = $_POST['clave'];
	$sel_familia = mysql_query("select * from familias where codigo = '$familia' and clave = '$clave'");
	 
	 if(mysql_num_rows($sel_familia) > 0)
	 	{
	 	$sel_datos = mysql_query("select * from alumnado where codigo = '$familia'");
		$reg_datos = mysql_fetch_array($sel_datos);
		$formacion= $reg_datos['facultad'];
	 	$nombre = $reg_datos['nombre'];
	 	$apellidos = $reg_datos['apellidos'];
	 	$grupo = $reg_datos['grupo']; 
		$f_nac = $reg_datos['f_nac'];
		$f_nac_esp = cambia_fecha_a_esp($f_nac);	 	
	 	$_SESSION['familia_sesion'] = $familia;
	 	$_SESSION['grupo_sesion'] = $grupo;
		$_SESSION['formacion_sesion']=$formacion;
		$_SESSION['nombre_sesion']=$nombre;
		$_SESSION['apellidos_sesion']=$apellidos;
		$_SESSION['fnac_sesion']=$f_nac_esp;
		}
	else
		{
		echo '<p class="centradomedio">'.$mensaje_error.'</p>';
		}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo 'SIMONS 2.0: '.$nombre_centro.''; ?></title>
<link href="index.css" rel="stylesheet" type="text/css" />
 <link rel="stylesheet" href="style.css" type="text/css">
<script type="text/javascript">
</script>
</head>
<body>
<?php

$familia_activo = $_SESSION['familia_sesion'];

if (isset($_SESSION['familia_sesion']))
{
echo '<div id="header">';
//vamos a cargar la foto y algunos datos principales del alumno
if(file_exists('../admin/fotos_al/'.$familia_activo.'.jpg'))
	{
	$imagen = '../admin/fotos_al/'.$familia_activo.'.jpg';
	}
else
	{
	$imagen = '../admin/fotos_al/nofoto.jpg';
	}
echo '<table><tr><td><img id="foto" alt="Foto" src="'.$imagen.'" /></td>';
echo '<td>'.$nombre_centro.'<br />'.$dir_centro.'<br />';
echo '<br />'.$id_titulo.': '.$_SESSION['formacion_sesion'].'';
echo '<br />'.$id_nom.': '.$_SESSION['nombre_sesion'].' ';
echo '_   ';
echo '   '.$id_ape.': '.$_SESSION['apellidos_sesion'].'';
echo '<br />'.$id_fna.': '.$_SESSION['fnac_sesion'].'';
echo '<br /><a href="../salir.php" title="'.$id_descon.'"><img id="salir" src="../imgs/salir.png" alt="'.$id_descon.'" /></a>';
echo '</td></tr></table>';
//al otro lado, el textarea para enviar mensajes a los docentes
if (strtolower($_REQUEST["acc"])=="guardar")
{
	$actividad=$_POST["actividad"];
	$sesion = $_POST['agrupamiento'];
	$codigo= $_POST['codigo'];
	$com= $_POST['com'];
	$estado= $_POST['estado'];

function filesize_format($bytes,$format='',$force ='')
			{
				$bytes=(float)$bytes;
				if ($bytes <1024)
				{
					$numero=number_format($bytes, 0, '.', ',');
					return array($numero,"B");
				}
				if ($bytes <1048576)
				{
					$numero=number_format($bytes/1024, 2, '.', ',');
					return array($numero,"KBs");
				}
				if ($bytes>= 1048576){
					$numero=number_format($bytes/1048576, 2, '.', ',');
					return array($numero,"MB");
				}
			}
//VERIFICAMOS QUE SE SELECCIONO ALGUN ARCHIVO
			if(sizeof($_FILES)==0)
			{
				echo "No se puede subir el archivo";
				exit();
			}
			
			else {
				

// EN ESTA VARIABLE ALMACENAMOS EL NOMBRE TEMPORAL QU SE LE ASIGNO ESTE NOMBRE ES GENERADO POR EL SERVIDOR
// ASI QUE SI NUESTRO ARCHIVO SE LLAMA foto.jpg el tmp_name no sera foto.jpg sino un nombre como SI12349712983.tmp por decir un ejemplo
$archivo = $_FILES["archivo"]["tmp_name"];
//Definimos un array para almacenar el tama�o del archivo
$tamanio=array();
//OBTENEMOS EL TAMA�O DEL ARCHIVO
$tamanio = $_FILES["archivo"]["size"];
//OBTENEMOS EL TIPO MIME DEL ARCHIVO
$tipo = $_FILES["archivo"]["type"];
//OBTENEMOS EL NOMBRE REAL DEL ARCHIVO AQUI SI SERIA foto.jpg
$nombre_archivo = $_FILES["archivo"]["name"];
//PARA HACERNOS LA VIDA MAS FACIL EXTRAEMOS LOS DATOS DEL REQUEST
extract($_REQUEST);
//VERIFICAMOS DE NUEVO QUE SE SELECCIONO ALGUN ARCHIVO
if ( file_exists($archivo))
{
	//ABRIMOS EL ARCHIVO EN MODO SOLO LECTURA
	// VERIFICAMOS EL TA�ANO DEL ARCHIVO
	$fp = fopen($archivo, "rb");
	//LEEMOS EL CONTENIDO DEL ARCHIVO
	
	$contenido = fread($fp,$tamanio);
	$contenido = addslashes($contenido);
	fclose($fp);
	
	//CON LA FUNCION addslashes AGREGAMOS UN \ A CADA COMILLA SIMPLE ' PORQUE DE OTRA MANERA
	//NOS MARCARIA ERROR A LA HORA DE REALIZAR EL INSERT EN NUESTRA TABLA
	
	//CERRAMOS EL ARCHIVO
	
	// VERIFICAMOS EL TA�ANO DEL ARCHIVO
	if ($tamanio<1048576)
	{
		//HACEMOS LA CONVERSION PARA PODER GUARDAR SI EL TAMA�O ESTA EN b � MB
		$tamanio=filesize_format($tamanio);
	}
	$inserta_notas = mysql_query("insert into notas values ('','$codigo','$sesion','','$actividad','',
	'$nombre_archivo','$com','$contenido','{$tamanio[0]}','{$tamanio[1]}', '$tipo')");	
	
	if($inserta_notas)
							{
									echo '<span class="negrita">Evidencia Registrada correctamente</span>';
									$consulta_actualiza = mysql_query("update actividades set estado='$estado' where id='$actividad'");
					 				echo "<br><br><br><br><br>";
									exit;
							}
								else
								{
										echo '<span class="negrita">Error</span>';
								}
	
	}
	}
}
echo '</div>';
//echo '<div id="top">';
//aquí voy a poner los avisos
//echo '</div>';
echo '<div id="center">';
$accion = $_GET['accion'];
$agrup = $_GET['agrupamiento'];
//si acabo de llegar
if(!$accion)
	{
	echo '<p class="centrado">'.$id_resumen.'</p>';
	echo '<table style="margin:auto;">';
	echo '<tr class="encab">';
	echo '<td>'.$id_inf_Bol.'</td>';
	echo '<td>'.$id_mat.'</td>';
	echo '<td>'.$id_calificacion.'<br />'.$nombre_per.'</td>';
	echo '<td>'.$id_tareas.'</td>';
	echo '<td>'.$id_inf_exa.'</td>';
	echo '</tr>';
	//vamos materia por materia
	$sel_materias = mysql_query("select agrupamientos.nombre,agrupamientos.agrupamiento from agrupamientos,matricula where matricula.codigo = '$familia_activo' and matricula.agrupamiento = agrupamientos.agrupamiento");
	for($m=0;$m<(mysql_num_rows($sel_materias));$m++)
		{
		if($m%2==0){echo '<tr class="par">';}else{echo '<tr class="impar">';}
		$reg_materia = mysql_fetch_array($sel_materias);
		$agrupamiento = $reg_materia['agrupamiento'];
		echo '<td class="centrado">';
		echo '<a title="'.$id_gen_bol.'" href="../pdf/ficha_pdf.php?p1='.$familia_activo.'&p2='.$agrupamiento.'&p3=boletin&p4='.$_SESSION['nombre_sesion'].'&p5='.$_SESSION['apellidos_sesion'].'" target="_blank"><img src="../imgs/informe.png" alt="'.$id_gen_bol.'" /></a>';
		echo '</td>';
		echo '<td>'.$reg_materia['nombre'].'</td>';
		echo '<td class="centrado">';
////////////////////notas ////////////////////////////////////////////////////////////////////////////////////////////////////
		//colocamos el aviso por si hoy se ha registrado alguna nota
		$sel_not_hoy = mysql_query("select nota from notas where codigo='$familia_activo' and agrupamiento='$agrupamiento' ");
		if(mysql_num_rows($sel_not_hoy)>0)
			{
			echo '<img src="../imgs/nuevo.gif" alt="'.$id_hay_notas_hoy.'" title="'.$id_hay_notas_hoy.'" />';
			echo '&nbsp;';
			echo '&nbsp;';
			}
		//fin aviso
			$sel_activ= mysql_query("select actividades.id,actividades.actividad,actividades.agrupamiento,actividades.ponderacion,
actividades.objetivos,actividades.tactividad,actividades.finicio,actividades.ffin from actividades,objetivos 
where actividades.agrupamiento = '$agrupamiento' and actividades.objetivos=objetivos.id ");

	$num_act = mysql_num_rows($sel_activ);
	if($num_act>= 0)
	{
		
		for($al=0;$al<$num_act;$al++)
		{
				
			$reg_activ = mysql_fetch_array($sel_activ);
			$actividad = $reg_activ['id'];
			$ponderacion = $reg_activ['ponderacion'];
			$sel_notas = mysql_query("select avg(notas.nota) from notas where notas.agrupamiento='$agrupamiento' and notas.actividad='$actividad'");
			
			$num_notas = mysql_num_rows($sel_notas);
			$reg_notas = mysql_fetch_array($sel_notas);
			$nota_media = $reg_notas['avg(notas.nota)'];
			$prom[]=($nota_media*$ponderacion);	
			//echo $prom;	
		}//fin for actividades
			if($num_act>0)
			{
				$consulta_proc = mysql_query("select * from objetivos where agrupamiento='$agrupamiento'");
				$num_proc = mysql_num_rows($consulta_proc);
				if($num_proc>0)
				{
				$suma_nota_media = array_sum($prom)/$num_proc;
				$porcentaje=$suma_nota_media/10;
				$consulta_actualiza = mysql_query("update agrupamientos set avance='$porcentaje' where agrupamiento = '$agrupamiento'");
				}	
		
				
			}
			else 
			{
				$promedio=0;
			}
	
			if($porcentaje>95)
			{
			
				
	
			echo '<font color="#A3000A" >'.$porcentaje.' % Terminado ...</font><img src="../imgs/terminar.jpg">';	
				
			}
			else
				{
				

				echo '<font color="#A3000A" >'.$porcentaje.' % En Proceso ...</font><img src="../imgs/proceso.jpg">';
				
				}
		
	

		}
		
		//fin notas
		echo '<td>';//asistencia

///////////////////////tareas/////////////////////////////////////////////////////////////////////////////////////
		//colocamos el aviso por si hay tareas pendientes
		$sel_tar_pend = mysql_query("select DISTINCT actividades.id,actividades.actividad,actividades.agrupamiento,actividades.ponderacion,actividades.periodo,
			extencion.ext_nombre as tactiv,objetivos.objetivo as objetivos,actividades.finicio,actividades.estado,actividades.ffin,alumnado.nombre,alumnado.apellidos
			from actividades,agrupamientos,extencion,objetivos,alumnado,matricula
			 where 
			actividades.periodo = '$familia_activo' and agrupamientos.agrupamiento = actividades.agrupamiento AND agrupamientos.agrupamiento='$agrupamiento'  
			and actividades.tactividad=extencion.id_extencion and actividades.objetivos=objetivos.id and actividades.periodo=alumnado.codigo and 
			actividades.periodo=matricula.codigo and alumnado.codigo=matricula.codigo 
			order by actividades.agrupamiento,actividades.actividad");
		
		if(mysql_num_rows($sel_tar_pend)>0 )
			{
			echo '<img src="../imgs/nuevo.gif" alt="'.$id_tareas_pendientes.'" title="'.$id_tareas_pendientes.'" />';
			echo '&nbsp;';
			echo '&nbsp;';
			}
		//fin aviso
		//veamos las individuales
		$sel_tar = mysql_query("select DISTINCT actividades.id,actividades.actividad,actividades.agrupamiento,actividades.ponderacion,actividades.periodo,
			extencion.ext_nombre as tactiv,objetivos.objetivo as objetivos,actividades.finicio,actividades.estado,actividades.ffin,alumnado.nombre,alumnado.apellidos
			from actividades,agrupamientos,extencion,objetivos,alumnado,matricula
			 where 
			actividades.periodo = '$familia_activo' and agrupamientos.agrupamiento = actividades.agrupamiento AND agrupamientos.agrupamiento='$agrupamiento'  
			and actividades.tactividad=extencion.id_extencion and actividades.objetivos=objetivos.id and actividades.periodo=alumnado.codigo and 
			actividades.periodo=matricula.codigo and alumnado.codigo=matricula.codigo 
			order by actividades.agrupamiento,actividades.actividad");
		//ahora las generales
		//$sel_tar_gen = mysql_query("select agenda.id from agenda,horario where horario.sesion = '$agrupamiento' and horario.franja = agenda.franja and horario.dia = agenda.dia and agenda.tipo = 't'");
		echo '<a class="ver" href="panel.php?accion=tareas&agrupamiento='.$agrupamiento.'" title="'.$id_todas_tareas.'">'.(mysql_num_rows($sel_tar)).'</a>';
		echo '</td>';//fin tareas
		echo '<td class="centrado">';//observaciones
		//exámenes
		$sel_exam = mysql_query("select * from notas where notas.agrupamiento='$agrupamiento'");
		if(mysql_num_rows($sel_exam)>0 )
			{
			echo '<img src="../imgs/nuevo.gif" alt="'.$id_tareas_pendientes.'" title="'.$id_tareas_pendientes.'" />';
			echo '&nbsp;';
			echo '&nbsp;';
			}
		echo '<a class="ver" href="panel.php?accion=exam&agrupamiento='.$agrupamiento.'" title="'.$id_todos_exam.'">'.mysql_num_rows($sel_exam).'</a>';
		echo '</td>';//fin exámenes
		echo '</tr>';
		}
	echo '</table><br />';
	}//fin no hay accion
switch($accion)
	{
	
	//las notas
	case 'notas':
	$sel_materia = mysql_query("select nombre from agrupamientos where agrupamiento='$agrup'");
	$reg_materia = mysql_fetch_array($sel_materia);
	echo '<br /><p class="centrado">'.$id_inf_not.' ('.$reg_materia['nombre'].')</p>';
	//resumen de evaluaciones
	echo '<table style="margin:auto;">';
	echo '<tr class="encab">';
	echo '<td>'.$id_periodo.'</td><td>'.$id_calificacion.'</td><td>'.$id_recupera.'</td>';
	$sel_per = mysql_query("select * from periodos");
	$num_per = mysql_num_rows($sel_per);
	for($p=0;$p<$num_per;$p++)
		{
		$reg_per = mysql_fetch_array($sel_per);
		if($p%2==0){echo '<tr class="par">';}else{echo '<tr class="impar">';}
		echo '<td>'.$reg_per['nombre'].'</td>';
		$fecha_ini = $reg_per['inicio'];
		$fecha_fin = $reg_per['fin'];
		$sel_activ = mysql_query("select * from actividades where agrupamiento = '$agrup'");
		$num_activ = mysql_num_rows($sel_activ);
		for($a=0;$a<$num_activ;$a++)
			{
			$reg_activ = mysql_fetch_array($sel_activ);
			$activ = $reg_activ['actividad'];
			$pond = $reg_activ['ponderacion'];
			$sel_notas = mysql_query("select avg(nota) from notas where codigo='$familia_activo' and agrupamiento='$agrup' and actividad='$activ' and fecha between '$fecha_ini' and '$fecha_fin'");
			$hay_nota=mysql_num_rows($sel_notas);
			if($hay_nota>0)
				{
				$reg_nota = mysql_fetch_array($sel_notas);
				$nota_media = $reg_nota['avg(nota)'];
				$nota_pond = ($nota_media*$pond)/100;
				$matriz_notas_pond[]=$nota_pond;
				}
			}
			if(count($matriz_notas_pond)>0)
				{
				$nota_media = array_sum($matriz_notas_pond);
				$nota_media_red = round($nota_media,2);
				echo '<td class="centrado">'.$nota_media_red.'</td>';
				$sel_rec=mysql_query("select * from recuperaciones where codigo='$familia_activo' and agrupamiento='$agrup' and periodo='".$reg_per['periodo']."'");
				echo '<td class="centrado">';

				if(mysql_num_rows($sel_rec)>0)
					{
					$reg_rec=mysql_fetch_array($sel_rec);
					$nota_rec=$reg_rec['nota'];
					echo $nota_rec;
					echo '</td>';
					}
				else
					{
					echo '</td>';
					}
				}
		echo '</tr>';
		unset($matriz_notas_pond);
		}//fin for resumen de evaluaciones
	echo '</table>';

	$sel_notas = mysql_query("select * from notas where codigo='$familia_activo' and agrupamiento='$agrup' order by fecha desc, actividad");
	$num_notas = mysql_num_rows($sel_notas);
	if($num_notas>0)
		{
		echo '<br /><table style="margin:auto;">';
		echo '<tr class="encab">';
		echo '<td>'.$id_fecha.'</td><td>'.$id_descripcion.'</td><td>'.$id_nota.'</td><td>'.$id_activ.'</td><td>'.$id_coment.'</td>';
		echo '</tr>';
		for($n=0;$n<$num_notas;$n++)
			{
			if($n%2==0){echo '<tr class="par">';}else{echo '<tr class="impar">';}
			$reg_notas = mysql_fetch_array($sel_notas);
			$id = $reg_notas['id'];
			$fecha = $reg_notas['fecha'];
			$fecha_esp = cambia_fecha_a_esp($fecha);
			$descripcion = $reg_notas['descripcion'];
			$nota = $reg_notas['nota'];
			$actividad = $reg_notas['actividad'];
			$comentario = $reg_notas['comentario'];
			if($comentario == ''){$comentario = $id_no_coment;}
			echo '<td>';
			echo $fecha_esp;
			echo '</td>';
			echo '<td>';
			echo $descripcion;
			echo '</td>';
			echo '<td>';
			echo $nota;
			echo '</td>';
			echo '<td>';
			echo $actividad;
			echo '</td>';
			echo '<td>';
			echo $comentario;
			echo '</td>';
			echo '</tr>';
			}
		echo '</table>';
		echo '<br /><p class="centrado"><a title="'.$id_pdf.'" href="../pdf/ficha_pdf.php?p1='.$familia_activo.'&p2='.$agrup.'&p3='.$accion.'&p4='.$_SESSION['nombre_sesion'].'&p5='.$_SESSION['apellidos_sesion'].'" target="_blank"><img src="../imgs/informe.png" alt="'.$id_pdf.'" /></a></p>';
		echo '<p class="centrado"><a href="panel.php">'.$id_volver.'</a></p>';
		}
	else
		{
		echo '<br /><p class="centrado">'.$id_no_calif.'</p>';
		echo '<p class="centrado"><a href="panel.php">'.$id_volver.'</a></p>';
		}
	break;//fin de notas
	
	case 'faltas'://las faltas
	$sel_mes_faltas = mysql_query("select distinct month(fecha),year(fecha) from asistencia where agrupamiento = '$agrup' and codigo = '$familia_activo' and dato <> 'a' order by fecha asc");
	$num_mes_faltas = mysql_num_rows($sel_mes_faltas);
	if($num_mes_faltas>0)
		{
		$sel_materia = mysql_query("select nombre from agrupamientos where agrupamiento='$agrup'");
		$reg_materia = mysql_fetch_array($sel_materia);
		echo '<br/><p class="centrado">'.$id_inf_asi.' ('.$reg_materia['nombre'].')</p>';
		echo '<br /><table style="margin:auto;">';
		echo '<tr>';
		echo '<td>'.$id_mes.'</td>';
		for($d=0;$d<31;$d++)
			{
			$dia = $d + 1;
			echo '<td class="centrado">'.$dia.'</td>';
			}
		echo '</tr>';	
		for($fa=0;$fa<$num_mes_faltas;$fa++)
			{
			$reg_mes_faltas=mysql_fetch_array($sel_mes_faltas);
			$mes_faltas=$reg_mes_faltas['month(fecha)'];
			$anyo_faltas=$reg_mes_faltas['year(fecha)'];
			$name_mes = date('M',mktime(0,0,0,$mes_faltas+1,0,0));
			$nombre_mes = nombre_mes($name_mes);			
			if($fa%2==0)echo '<tr class="par">';else echo '<tr class="impar">';
			echo '<td>'.$nombre_mes.'</td>';
			for($d=0;$d<31;$d++)
				{
				$dia = $d + 1;
				$nombre_dia_ing = date('D', mktime(0, 0, 0, $mes_faltas, $dia, $anyo_faltas));
				$numero_dia = nombre_dia_a_numero($nombre_dia_ing);
				if($numero_dia == '6' || $numero_dia == '7')
					{
					echo '<td class="naranja"></td>';
					}
				else
					{
					$fecha_consulta = ''.$anyo_faltas.'-'.$mes_faltas.'-'.$dia.'';
					$sel_falta = mysql_query("select dato,hini from asistencia where agrupamiento='$agrup' and codigo = '$familia_activo' and fecha = '$fecha_consulta' and dato <> 'a'");
					if(mysql_num_rows($sel_falta)>0)
						{
						echo '<td class="centrado">';
						for($f=0;$f<(mysql_num_rows($sel_falta));$f++)
							{
							$reg_falta = mysql_fetch_array($sel_falta);
							$horafalta=$reg_falta['hini'];
							echo '<a href="#" title="'.$horafalta.'">'.$reg_falta['dato'].'</a>';
							}
						echo '</td>';
						}
					else
						{
						echo '<td></td>';
						}
					}
				}
				echo '</tr>';		
			}//fin de for
		echo '</table>';
		echo '<br /><p class="centrado"><a title="'.$id_pdf.'" href="../pdf/ficha_pdf.php?p1='.$familia_activo.'&p2='.$agrup.'&p3='.$accion.'&p4='.$_SESSION['nombre_sesion'].'&p5='.$_SESSION['apellidos_sesion'].'" target="_blank"><img src="../imgs/informe.png" alt="'.$id_pdf.'" /></a></p>';
		echo '<p class="centrado"><a href="panel.php">'.$id_volver.'</a></p>';
		}
	else
		{
		$sel_materia = mysql_query("select nombre from agrupamientos where agrupamiento='$agrup'");
		$reg_materia = mysql_fetch_array($sel_materia);
		echo '<br /><p class="centrado">'.$id_no_asi.' ('.$reg_materia['nombre'].')</p>';
		echo '<p class="centrado"><a href="panel.php">'.$id_volver.'</a></p>';
		}
	break;//fin de faltas

	case 'tareas'://tareas
	$sel_materia = mysql_query("select nombre from agrupamientos where agrupamiento='$agrup'");
	$reg_materia = mysql_fetch_array($sel_materia);
	echo '<br/><p class="centrado">('.$reg_materia['nombre'].')</p>';
$sel_act = mysql_query("select DISTINCT actividades.id,actividades.actividad,actividades.agrupamiento,actividades.ponderacion,actividades.periodo,
			extencion.ext_nombre as tactiv,objetivos.objetivo as objetivos,actividades.finicio,actividades.estado,actividades.ffin,alumnado.nombre,alumnado.apellidos
			from actividades,agrupamientos,extencion,objetivos,alumnado,matricula
			 where 
			actividades.periodo = '$familia_activo' and agrupamientos.agrupamiento = actividades.agrupamiento AND agrupamientos.agrupamiento='$agrup'  
			and actividades.tactividad=extencion.id_extencion and actividades.objetivos=objetivos.id and actividades.periodo=alumnado.codigo and 
			actividades.periodo=matricula.codigo and alumnado.codigo=matricula.codigo 
			order by actividades.agrupamiento,actividades.actividad"); 
$num_act = mysql_num_rows($sel_act);
	echo '<p class="negrita"><center><font color="Navy"><h3>SUBIR EVIDENCIAS</h3></font></center></p>
	<table align="center"  class="tabla">';
	echo '<tr>';
		echo '<td class="tdatos">Evaluar</td>';
		echo '<td class="tdatos">'.$id_activ.'</td>
		<td class="tdatos">Tipo de Actividad</td>
		<td class="tdatos">Procesos</td>
		<td class="tdatos">Responsable</td>
		<td class="tdatos">Fecha inicio</td>
		<td class="tdatos">Fecha fin</td>
		<td class="tdatos">Estado</td>';
	echo '</tr>';
	for($b=0;$b<$num_act;$b++)
		{
		$reg_act = mysql_fetch_array($sel_act);
		echo'</a></td>';
	if($reg_act['estado']==0)
					{
						echo '<td class="centrado"><a href=panel.php?accion=evaluar&activ_eli='.$reg_act['id'].'&agrup_eli='.$reg_act['agrupamiento'].'&resp='.$reg_act['periodo'].' ><img src="../imgs/evaluar.ico" alt="'.$id_eliminar.'" /></a></td>';
					}
		if($reg_act['estado']==1)
			{
				echo '<td class="centrado"><a href=panel.php?accion=evaluar&activ_eli='.$reg_act['id'].'&agrup_eli='.$reg_act['agrupamiento'].'&resp='.$reg_act['periodo'].' ><img src="../imgs/evaluar.ico" alt="'.$id_eliminar.'" /></a></td>';
			}				
			
		if($reg_act['estado']==2)
			{
				echo '<td><img src="../imgs/clave.png"><font color="#0B3B17" ></font></td>';	
			}					
		
		echo '<td>'.$reg_act['actividad'].'</td>';
		echo '<td>'.$reg_act['tactiv'].'</td>';
		echo '<td>'.$reg_act['objetivos'].'</td>';
		echo '<td>'.$reg_act['nombre'].'  '.$reg_act['apellidos'].'</td>';
		echo '<td>'.$reg_act['finicio'].'</td>';
		echo '<td>'.$reg_act['ffin'].'</td>';
		if($reg_act['estado']==0)
					{
						echo '<td><img src="../imgs/redactar.png"><font color="#8A0808" >Subir Evidencias</td>';	
					}
		if($reg_act['estado']==1)
			{
				echo '<td><img src="../imgs/revisar.ico"><font color="#0B3B17" >Revisar y Subir Evidencias </font></td>';	
			}				
			
		if($reg_act['estado']==2)
			{
				echo '<td><img src="../imgs/terminar.jpg"><font color="#0B3B17" >Actividad Terminada</font></td>';	
			}							
		echo '</td>';
		echo '<td class="justificado">';
		echo '</td>';
		echo '</tr>';
		}//fin de for
	echo'</table><br />';

	echo '</table>';
	echo '<br /><p class="centrado"><a href="panel.php">'.$id_volver.'</a></p>';
///////////////////////////// tareas en procesos /////////////////////////////////////////////////////////
	$sel_materia = mysql_query("select nombre from agrupamientos where agrupamiento='$agrup'");
$sel_act = mysql_query("SELECT notas.id,notas.codigo,notas.agrupamiento,notas.fecha,actividades.actividad,
notas.nota,notas.descripcion,notas.comentario,objetivos.objetivo,actividades.estado,
alumnado.nombre,alumnado.apellidos
FROM notas,actividades,objetivos,alumnado
WHERE notas.agrupamiento='$agrup' and actividades.id=notas.actividad and alumnado.codigo=actividades.periodo 
and actividades.objetivos=objetivos.id and notas.codigo='$familia_activo'");
$num_act = mysql_num_rows($sel_act);
	
	echo '<p class="negrita"><center><font color="Navy"><h3>ACTIVIDADES PENDIENTES POR SER EVALUADOS</h3></font></center></p>
	<table align="center"  class="tabla">';
	echo '<tr class="encab">
	<td class="tdatos">Actividad</td>
	<td class="tdatos">Nota</td>
	<td class="tdatos">comentario</td>
	<td class="tdatos">Responsable</td>
	<td class="tdatos">Proceso</td>
	<td class="tdatos">nombre del archivo</td>
	<td class="tdatos">Manual de proceso</td>
	<td class="tdatos">Estado</td>';
	echo '</tr>';
	for($b=0;$b<$num_act;$b++)
		{
		$reg_act = mysql_fetch_array($sel_act);	
		//ecco'<td class=\"tdatos\"><a href=\"elim_proy.php?agrupamiento=".$row["agrupamiento"]."\"><img src=../theme/images/user-delete-2.ico></a></td>';
		echo '<td class=\"cdato\">'.$reg_act['actividad'].'</td>';
		echo '<td>'.$reg_act['nota'].'</td>';
		echo '<td>'.$reg_act['comentario'].'</td>';
		echo '<td>'.$reg_act['nombre'].' '.$reg_act['apellidos'].'</td>';
		echo '<td>'.$reg_act['objetivo'].'</td>';
		echo '<td>'.$reg_act['descripcion'].'</td>';
		echo '<td class=\"tdatos\" align=center><a href=getfiles.php?id='.$reg_act['id'].'><img src=../theme/images/pdf.ico></a></td>';
if($reg_act['estado']==0)
					{
						echo '<td><img src="../imgs/redactar.png"><font color="#8A0808" >Evaluar Actividad</td>';	
					}
		if($reg_act['estado']==1)
			{
				echo '<td><img src="../imgs/revisar.ico"><font color="#0B3B17" >Revisar y Subir Evidencias</font></td>';	
			}				
			
		if($reg_act['estado']==2)
			{
				echo '<td><img src="../imgs/terminar.jpg"><font color="#0B3B17" >Actividad Terminada</font></td>';	
			}								
		echo '</tr>';									
										
		}

	echo'</table><br />';
	echo '</table>';
//////////////////////////////////// fin tares en procesos //////////////////////////////////////////////
	break;//fin de tareas
	case 'evaluar'://evaluar
	$actividad=$_REQUEST["activ_eli"];
	$agrupamiento=$_REQUEST['agrup_eli'];
	$codigo= $_REQUEST['resp'];
echo' <br><br>';
echo '<form name="registro" action="panel.php" method="post" enctype="multipart/form-data"">
			<td><input type="text" name="actividad" maxlength="30" id="actividad" style="visibility:hidden" readonly="readonly" style="background-color:#F7D358" value="'.$actividad.'"/>	
			<td><input type="text" name="agrupamiento" maxlength="30" id="agrupamiento" style="visibility:hidden" readonly="readonly" style="background-color:#F7D358" value="'.$agrupamiento.'"/>			
			<td><input type="text" name="codigo" maxlength="30" id="codigo" style="visibility:hidden" readonly="readonly" style="background-color:#F7D358" value="'.$codigo.'"/>	
			<table width="700" align="center" class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>EVALUAR ACTIVIDAD</h3></td>
		</tr>
		<tr>
			<td  class="tdatos">COMENTARIO EVIDENCIA</td>
			<td class="dtabla"><textarea id="com" name="com" columns="20" rows="3"></textarea></td>
		</tr>
		<tr>
			<td class="tdatos">SUBIR EVIDENCIA</td>
			<td class="dtabla"><input type="file" name="archivo" value="archivo" size="40" /></td>
		</tr>
		<tr>
			<td class="tdatos">Estado de Actividad</td>
			<td>
				
					<select name="estado" id="estado" >
					';	
					echo '<option>Selecciona Estado de Actividad</option>';
					echo '<option value=1>Revisar Actividad</option>';
					echo '	
				</select>
			
			</td>
		</tr>			
		<tr>
			<td colspan="3" align="center"><input type="submit" name="acc" value="guardar">
			<input name="Restablecer" type="reset" value="Limpiar" /></td>
			<br /><p class="centrado"><a href="panel.php">'.$id_volver.'</a></p>
		</tr>
	</table>
</form>	';
	
	break;//fin evaluaciones
	case 'observaciones'://observaciones
	
	$sel_obs = mysql_query("select * from observaciones where codigo='$familia_activo' and agrupamiento='$agrup' order by fecha desc");
	$num_obs = mysql_num_rows($sel_obs);
	if($num_obs>0)
		{
		$sel_materia = mysql_query("select nombre from agrupamientos where agrupamiento='$agrup'");
		$reg_materia = mysql_fetch_array($sel_materia);
		echo '<br/><p class="centrado">'.$id_inf_obs.' ('.$reg_materia['nombre'].')</p>';
		echo '<br /><table style="margin:auto;">';
		echo '<tr class="encab">';
		echo '<td>'.$id_obs.'</td><td>'.$id_fecha_reg.'</td>';
		echo '</tr>';
		for($o=0;$o<$num_obs;$o++)
			{
			$reg_obs = mysql_fetch_array($sel_obs);
			$id = $reg_obs['id'];
			$observacion = $reg_obs['observacion'];
			$fecha_reg = $reg_obs['fecha'];
			$fecha_reg_esp = cambia_fecha_a_esp($fecha_reg);
			if($o%2==0){echo '<tr class="par">';}else{echo '<tr class="impar">';}
			echo '<td>';
			echo $observacion;
			echo '</td>';
			echo '<td class="centrado">';		
			echo $fecha_reg_esp;
			echo '</td>';
			echo '</tr>';
			}
		echo '</table>';
		echo '<br /><p class="centrado"><a title="'.$id_pdf.'" href="../pdf/ficha_pdf.php?p1='.$familia_activo.'&p2='.$agrup.'&p3=obs&p4='.$_SESSION['nombre_sesion'].'&p5='.$_SESSION['apellidos_sesion'].'" target="_blank"><img src="../imgs/informe.png" alt="'.$id_pdf.'" /></a></p>';
		echo '<p class="centrado"><a href="panel.php">'.$id_volver.'</a></p>';
		}
	else
		{
		$sel_materia = mysql_query("select nombre from agrupamientos where agrupamiento='$agrup'");
		$reg_materia = mysql_fetch_array($sel_materia);
		echo '<br /><p class="centrado">'.$id_no_obs.' ('.$reg_materia['nombre'].')</p>';
		echo '<p class="centrado"><a href="panel.php">'.$id_volver.'</a></p>';
		}
	break;//fin de observaciones

	case 'exam'://exámenes
	$sel_act = mysql_query("SELECT notas.id,notas.codigo,notas.agrupamiento,notas.fecha,actividades.actividad,
notas.nota,notas.descripcion,notas.comentario,objetivos.objetivo,actividades.estado,
alumnado.nombre,alumnado.apellidos
FROM notas,actividades,objetivos,alumnado
WHERE notas.agrupamiento='$agrup' and actividades.id=notas.actividad and alumnado.codigo=actividades.periodo 
and actividades.objetivos=objetivos.id and notas.codigo='$familia_activo'");
$num_act = mysql_num_rows($sel_act);
	
	echo '<p class="negrita"><center><font color="Navy">Notas y Avances registrados hasta el momento</font></center></p>
	<table align="center"  class="tabla">';
	echo '<tr class="encab">';
	echo'<td class="tdatos">Actividad</td>
	<td class="tdatos">Nota</td>
	<td class="tdatos">comentario</td>
	<td class="tdatos">Responsable</td>
	<td class="tdatos">Proceso</td>
	<td class="tdatos">nombre del archivo</td>
	<td class="tdatos">Manual de proceso</td>';
	echo '</tr>';
	for($b=0;$b<$num_act;$b++)
		{
		$reg_act = mysql_fetch_array($sel_act);	
		echo '<td class=\"cdato\">'.$reg_act['actividad'].'</td>';
		echo '<td>'.$reg_act['nota'].'</td>';
		echo '<td>'.$reg_act['comentario'].'</td>';
		echo '<td>'.$reg_act['nombre'].' '.$reg_act['apellidos'].'</td>';
		echo '<td>'.$reg_act['objetivo'].'</td>';
		echo '<td>'.$reg_act['descripcion'].'</td>';
		echo '<td class=\"tdatos\" align=center><a href=getfiles.php?id='.$reg_act['id'].'><img src=../theme/images/pdf.ico></a></td>';
		echo '</tr>';									
										
		}
	echo '</table>';
	echo '<br /><p class="centrado"><a href="panel.php">'.$id_volver.'</a></p>';
	break;//fin de exámenes

	case 'mensajes'://mensajes
	//si vengo de pulsar eliminar
	/*$id_elimen = $_GET['id'];
	if($id_elimen)
		{
		mysql_query("update mensajes set ocultorec = '1' where id='$id_elimen'");
		}*/
	//fin eliminar
	$sel_materia = mysql_query("select nombre from agrupamientos where agrupamiento='$agrup'");
	$reg_materia = mysql_fetch_array($sel_materia);
	echo '<br /><p class="centrado">'.$id_recibidos.' ('.$reg_materia['nombre'].')</p>';
	//selecciono los mensajes
	$sel_men = mysql_query("select mensajes.id,mensajes.fecha,mensajes.mensaje from mensajes,agrupamientos where mensajes.destinatario = '*f' and mensajes.remitente = agrupamientos.docente and mensajes.ocultorec='0' and agrupamientos.agrupamiento = '$agrup' or mensajes.destinatario = '$agrup' and mensajes.remitente = agrupamientos.docente and mensajes.ocultorec='0' and agrupamientos.agrupamiento = '$agrup' or mensajes.destinatario = '$familia_activo' and mensajes.remitente = agrupamientos.docente and mensajes.ocultorec='0' and agrupamientos.agrupamiento = '$agrup'");
	if(mysql_num_rows($sel_men)>0)
		{
		echo '<table style="margin:auto;">';
		echo '<tr class="encab">';
		//echo '<td class="centrado">'.$id_accion.'</td>';
		echo '<td>'.$id_fecha.'</td>';
		echo '<td>'.$id_texto.'</td>';
		echo '</tr>';
		$num_men = mysql_num_rows($sel_men);
		for($m=0;$m<$num_men;$m++)
			{
			$reg_men = mysql_fetch_array($sel_men);
			$id_men = $reg_men['id'];
			$fecha_men = $reg_men['fecha'];
			$fecha_men_esp = cambia_fecha_a_esp($fecha_men);
			$men = $reg_men['mensaje'];
			if($m%2==0){echo '<tr class="par">';}else{echo '<tr class="impar">';}
			//echo '<td class="centrado"><a href="#" onclick="javascript:eliMen(\'mensajes\',\''.$agrup.'\',\''.$id_men.'\')" title="'.$id_eliminar.'"><img src="../imgs/borra_peq.png" alt="'.$id_eliminar.'" /></a></td>';
			echo '<td class="centrado">'.$fecha_men_esp.'</td>';
			echo '<td>'.$men.'</td>';
			echo '</tr>';
			}//fin for mensajes
		echo '</table><br />';
		}//fin hay mensajes
	else
		{
		echo '<br /><p class="centrado">'.$id_nomensajes_rec.'</p><br />';
		}
	//veamos si hay que enviar un mensaje
	$texto_men = $_POST['cajatexto'];
	$destin_men = $_POST['list_mat'];
	if($texto_men && $destin_men)
		{
		$asunto=''.$_SESSION['nombre_sesion'].' '.$_SESSION['apellidos_sesion'].' ('.$_SESSION['grupo_sesion'].')';
		$hoy = date('Y-m-d');
		if($destin_men != '*')
			{	
			
			$env_men = mysql_query("insert into mensajes values('','$familia_activo','$destin_men','$asunto','$texto_men','0','0','$hoy','f','0','0')");
			if($env_men) {echo '<p class="centrado">'.$id_mensaje_enviado.'</p>';} else {echo '<p class="centrado">'.$id_mensaje_no_enviado.'</p>';}
			}//fin mensaje para un docente
		else
			{
			$sel_materias = mysql_query("select agrupamientos.nombre,agrupamientos.agrupamiento from agrupamientos,matricula where matricula.codigo = '$familia_activo' and matricula.agrupamiento = agrupamientos.agrupamiento");
			for($m=0;$m<(mysql_num_rows($sel_materias));$m++)
				{
				$reg_materias=mysql_fetch_array($sel_materias);
				$materia_men=$reg_materias['nombre'];
				$agrupamiento_men=$reg_materias['agrupamiento'];
				$sel_doc=mysql_query("select docente from agrupamientos where agrupamiento='$agrupamiento_men'");
				$reg_doc=mysql_fetch_array($sel_doc);
				$doc_men=$reg_doc['docente'];
				$env_men = mysql_query("insert into mensajes values('','$familia_activo','$doc_men','$asunto','$texto_men','0','0','$hoy','f','0','0')");
				if($env_men) {echo '<p class="centrado">'.$id_mensaje_enviado.' ('.$materia_men.')</p>';} else {echo '<p class="centrado">'.$id_mensaje_no_enviado.' ('.$materia_men.')</p>';}
				}//fin for materias
			}//fin mensaje para todos
		}//fin de envío del mensaje

	//ahora el espacio para enviar un mensaje
	echo '<p class="centrado">'.$id_redactar.'</p>';
	echo '<form name="mensaje" method="post">';
	echo '<p class="centrado">';
	echo ''.$id_destinatario.': ';
	echo '<select name="list_mat">';
	echo '<option value="0">'.$id_elige_doc.'</option>';
	echo '<option value="*">'.$id_todos_doc.'</option>';
	$sel_materias = mysql_query("select agrupamientos.nombre,agrupamientos.agrupamiento from agrupamientos,matricula where matricula.codigo = '$familia_activo' and matricula.agrupamiento = agrupamientos.agrupamiento");
	for($m=0;$m<(mysql_num_rows($sel_materias));$m++)
		{
		$reg_materias=mysql_fetch_array($sel_materias);
		$materia_men=$reg_materias['nombre'];
		$agrupamiento_men=$reg_materias['agrupamiento'];
		$sel_doc=mysql_query("select docente from agrupamientos where agrupamiento='$agrupamiento_men'");
		$reg_doc=mysql_fetch_array($sel_doc);
		$doc_men=$reg_doc['docente'];
		echo '<option value="'.$doc_men.'">'.$materia_men.'</option>';
		}//fin for materias
	echo '</select>';
	echo '<br /><br />';
	echo '<textarea rows="5" cols="40" name="cajatexto"></textarea>';
	echo '<br /><br />';
	echo '<a href="#" onclick="enviaMen(\''.$agrup.'\')" title="'.$id_enviar.'"><img src="../imgs/envia_mail.png" alt="'.$id_enviar.'" /></a>';
	echo '</p>';		
	echo '</form>';
	echo '<br /><p class="centrado"><a href="panel.php">'.$id_volver.'</a></p>';
	break;//fin de mensajes

	}//fin de switch
echo '</div>';
echo '<div id="footer">';
echo '<br/>';

echo '<br />';
echo ' SISTEMA DE INFORMACIÓN PARA MONITOREO Y GESTIÓN DE PROCESOS';
echo '<br />';
echo '</div>';
echo '</div>';
}

?>

</body>
</html>
