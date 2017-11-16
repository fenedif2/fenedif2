<?php

/*el menú lateral es un trozo de código que carga en el panel de administración. Desde él se pueden realizar todas las acciones. Es una lista de enlaces desplegables con las funciones de script.aculo.us que nos mostrarán el contenido solicitado*/

$dia=date('d');
$mes=date('m');
$anyo=date('Y');

echo '
<div id="menu_doc">
	<table class="tablacentrada"><tr><td><input size="16" class="naranja" type="text" id="autorelleno" name="texto_auto" /><div id="lista_opciones" class="autorelleno"></div><script>new Ajax.Autocompleter(\'autorelleno\', \'lista_opciones\', \'busca_alum.php\', {method: \'post\', paramName: \'value\', minChars: 1});</script><a href="#" onclick="abreFicha1(\''.date('Y-m-d').'\')" title="'.$id_verficha.'"><img src="imgs/ficha_peq.png" alt="'.$id_verficha.'"</a></td></tr></table>
	<ul>
	<li><a href="#" onclick="cargaInicio(\''.$dia.'\',\''.$mes.'\',\''.$anyo.'\')">'.$id_inicio.'</a></li>
	<li><a href="#" onclick="miraPerfil(\''.$usuario_activo.'\')">'.$id_misdatos.'</a></li>
	<li><a href="#" onclick="miraObjetivos(\''.$usuario_activo.'\')">Mis Objetivos</a></li>
	<li><a href="#" onclick="miraActividades(\''.$usuario_activo.'\')">'.$id_misactividades.'</a></li>
	<li><a href="#" onclick="miraHorario(\''.$usuario_activo.'\')">'.$id_mihorario.'</a></li>

	<li>
	<a href="#" title="'.$id_contraer.'" onclick="new Effect.Fade(\'misagr\'),new Effect.Fade(\'img_agr\')">
	<img style="display:none" id="img_agr" src="imgs/menos.png"/>
	</a>
	<a href="#" onclick="new Effect.Appear(\'misagr\'),new Effect.Appear(\'img_agr\')"> '.$id_misagr.'</a>
	</li>
		<ul style="display:none" id="misagr">';
		$sel_agr = mysql_query("select * from agrupamientos where docente = '$usuario_activo'");
		$num_agr = mysql_num_rows($sel_agr);
		for($agr=0;$agr<$num_agr;$agr++)
			{
			$reg_agr = mysql_fetch_array($sel_agr);
			echo '<li><a href="pdf/listado.php?agr='.$reg_agr['agrupamiento'].'" target="_blank"><img src="imgs/informe_peq.png" /></a><a href="#" onclick="miraAgrup(\''.$reg_agr['agrupamiento'].'\')">'.$reg_agr['nombre'].'</a></li>';
			}
		echo '
		</ul>

	<li>
	<a href="#" title="'.$id_contraer.'" onclick="new Effect.Fade(\'misrec\'),new Effect.Fade(\'img_rec\')">
	<img style="display:none" id="img_rec" src="imgs/menos.png"/>
	</a>
	<a href="#" onclick="new Effect.Appear(\'misrec\'),new Effect.Appear(\'img_agr\')"> '.$id_misrec.'</a>
	</li>
		<ul style="display:none" id="misrec">';
		
		echo '
		<li><a href="#" onclick="abredoc()">Facturas</a></li>
		</ul>
	<li>
	<a href="#" title="'.$id_contraer.'" onclick="new Effect.Fade(\'misinformes\'),new Effect.Fade(\'img_doc\')">
	<img style="display:none" id="img_doc" src="imgs/menos.png"/>
	</a>
	<a href="#" onclick="new Effect.Appear(\'misinformes\'),new Effect.Appear(\'img_doc\')"> '.$id_misinformes.'</a>
	</li>
		<ul style="display:none" id="misinformes">
		<li><a href="#" onclick="informe(\'asi\')">'.$id_inf_asi.'</a></li>
		<li><a href="#" onclick="informe(\'not\')">'.$id_inf_not.'</a></li>
		
		
		<li><a href="#" onclick="informe(\'tar\')">'.$id_inf_tar.'</a></li>
		<li><a href="#" onclick="informe(\'bol\')">'.$id_inf_bol.'</a></li>

		<li><a href="#" onclick="informe(\'cla\')">'.$id_inf_cla.'</a></li>
		
		</ul>

	<li><a href="#" onclick="miraMensajes()">'.$id_mismensajes.'</a></li>
	
</ul>
<br /><p class="centrado"><a href="https://skydrive.live.com/redir?resid=9FB77926FC8B08C2!124" title="'.$id_ayuda.'" target="_blank"><img src="imgs/ayuda.png" alt="'.$id_ayuda.'" /></a>&nbsp;&nbsp;<a href="salir.php" title="'.$id_descon.'"><img src="imgs/salir.png" alt="'.$id_descon.'" /></a>';

if($_SESSION['rol_sesion'] == 'admin')
	{
	echo '&nbsp;&nbsp;<a href="#" title="'.$id_admin.'" onclick="abreAdmin()"><img src="imgs/admin.png" alt="'.$id_admin.'"/></a>';
	}
echo '</div>';

?>
