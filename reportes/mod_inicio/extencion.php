<?php
session_start();
//incluimos funciones,configuración e idioma
include('../funciones.php');
require('../config.php');
require('../idioma/'.$idioma.'');
//si hay sesión cargamos código
if (isset($_SESSION['usuario_sesion']) && $_SESSION['rol_sesion'] == 'Administrador')
{
//conecto con MySQL
conecta();
//recogemos la información cargando la variable
$accion=$_POST['p1'];
$invest=$_POST['p2'];
/*las acciones que se pueden llevar a cabo con los docentes en el plano de la administración son:
	- Listado/Edición de docentes ($accion='li')
	- Registro masivo de docentes mediante carga de archivo CSV ($accion='rm')
	- Agregar un docente ($accion='agrega')
	- Eliminar un docente ($accion='edita')*/
//montamos un switch para llevar a cabo las acciones
switch($accion)
	{
	//agregamos extencion
	case 'agrega':
	//presentamos formulario
	echo '<br /><span class="negrita">'.$id_agregar.' '.$id_un.' Tipo de '.$id_extencion.'</span><br />';
	echo '<br /><p class="texto_centrado">'.$id_texto_extencion.'</p><br />';
	echo '<form name="guardaext" id="guardaext">';
		echo '<table class="tablacentrada">';
			echo '<tr class="encab">';
					echo '<td>'.$id_ext.'</td>';
				echo '</tr>';
			echo '<tr>';
				echo '<td class="centrado"><input type="text" name="txt_nombre" size="20" maxlength="20" id="txt_nombre" value=""/></td>';
			echo '</tr>';
	echo '<td>';
	echo '</table>';
	echo '<p><a href="#" onclick="extGuarda()" title="'.$id_guardar.'">';
	echo '<img src="../imgs/guardar.png" alt="'.$id_guardar.'" />';
	echo '</a></p>';
	echo '</form>';
	break;

	//grabamos la extencion
	case 'grabaext':
	//cargamos variables pasadas
	$ext_nom=$_POST['txt_nombre'];

	//encriptamos clave y registramos
	$inserta_conv = mysql_query("insert into extencion values('','$ext_nom')");
	if ($inserta_conv)
		{
		echo '<br /><br /><span class="texto_centrado">'.$id_ins.'</span>';
		}
	else
		{
		echo '<br /><br /><span class="negrita">'.$id_error_ins.'</span>';
		}
	break;
	
	case 'li':
	echo '<br /><span class="negrita">'.$id_list_edi.' '.$id_de.' Tipo de  '.$id_extencion.'</span><br />';
	echo '<br /><p class="texto_centrado">'.$id_texto_li_ext.'</p><br />';
	
	//vamos a consultar y a listar en una tabla
	echo '<table class="tablacentrada" id="tabla">';
		echo '<tr class="encab">';
				echo '<td>'.$id_cla.'</td>';
				echo '<td>'.$id_ext.'</td>';
			
		echo '</tr>';
	$consulta_tinvest = mysql_query("SELECT * FROM extencion ORDER BY id_extencion");
	//monto bucle y listo
	$n_invest = mysql_num_rows($consulta_tinvest);
	for($i=0;$i<$n_invest;$i++)
		{
		$registro_invest = mysql_fetch_array($consulta_tinvest);
		if($i%2==0){echo '<tr class="par">';}else{echo '<tr>';}	
		echo '<td>';
		echo '
			<a href="#" onclick="extSolicitaEdita(\''.$registro_invest['id_extencion'].'\')" title="'.$id_editar.'">
			<img src="../imgs/edita.png" alt="'.$id_editar.'" />
			</a>
			';
			echo $registro_invest['id_extencion'];
			echo '</a>';
		echo '</td>';
		echo '<td>'.$registro_invest['ext_nombre'].'</td>';
		echo '</tr>';
		}
	echo '</table>';
	echo '<p><a id="eliminar" href="#" onclick="extBorraTodos()" title="'.$id_elim_todos.'">';
	echo '<img src="../imgs/eliminatodos.png" alt="'.$id_elim_todos.'" /></a></p>';
	
	break;
	//elimina todo
	case 'eliminatodo':
	$borratodos = mysql_query("delete from extencion ");
	if($borratodos)
		{
		echo '<br /><br /><span class="texto_centrado">'.$id_eli.'</span>';
		}
	else
		{
		echo '<br /><br /><span class="negrita">'.$id_borra_error.'</span>';
		}
	break;
	//editamos
	case 'edita':
	$consulta_ext= mysql_query("select * from extencion where id_extencion = '$invest'");
	$registro_ext = mysql_fetch_array($consulta_ext);
	$nom_ext=$registro_ext['ext_nombre'];
	echo '<br /><span class="negrita">'.$id_editar.' '.$id_datos.' '.$id_de.' Código:'.$invest.' Nombre:'.$nom_ext.' </span><br />';
	echo '<br /><p><a href="#" id="eliminar" onclick="extElimina(\''.$invest.'\')" title="'.$id_eliminar.'"><img src="../imgs/eliminar.png" alt="'.$id_eliminar.'"></a>';
	echo '</p>';
	echo '<p class="texto_centrado">'.$id_texto_edi_ext.'</p><br />';
	//seleccionamos los datos del docente
	$consulta_datos = mysql_query("select * from extencion where id_extencion = '$invest'");
	$registro_datos = mysql_fetch_array($consulta_datos);
	//presentamos un formulario y los inputs con los valores existentes en la base de datos
	echo '<form name="edita" id="edita">';
	echo '<table class="tablacentrada">';
		echo '<tr class="encab">';
				echo '<td>'.$id_cla.'</td>';
				echo '<td>'.$id_ext.'</td>';
		
		echo '</tr>';
		echo '<tr>';
			echo '<td><input type="text" name="txt_cla" maxlength="10" id="txt_cla" readonly="readonly" style="background-color:#F7D358" value="'.$registro_datos['id_extencion'].'"/></td>';
			echo '<td><input type="text" name="txt_extencion" maxlength="20" id="txt_extencion" value="'.$registro_datos['ext_nombre'].'"</td>';
		echo '</tr>';
	echo '<a href="#" onclick="extEdita(\''.$invest.'\')" title="'.$id_guardar.'">';
	echo '<img src="../imgs/guardar.png" alt="'.$id_guardar.'" />';
	echo '</a>';
	echo '</form>';
	break;
	//eliminamos
	case 'elimina':
	$consulta_elimina = mysql_query("delete from extencion where id_extencion = '$invest'");
	if($consulta_elimina)
		{
		echo '<span class="texto_centrado">'.$id_ext_eliminado.'</span>';
		}
	break;
	//guardamos los datos editados
	case 'guarda':
	$doc_nom=$_POST['txt_extencion'];

	//hacemos el update
		$consulta_actualiza = mysql_query("update extencion set ext_nombre='$doc_nom' where id_extencion = '$invest'");
		if($consulta_actualiza)
		{
		echo '<br /><span class="texto_centrado">'.$id_datos_ext_edit.'</span>';
		
		}
	else
		{
		echo '<br /><br /><span class="negrita">'.$id_error_editar.'</span>';
		}
	break;
	

	}//fin switch

}//fin hay sesión
?>


