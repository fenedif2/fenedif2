<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
	$noRegistros = 10; //Registros por página
	$pagina = 1; //Por default, página = 1
	if($_GET["pagina"]) //Si hay página por ?pagina=valor, lo asigna
    $pagina = $_GET["pagina"];
	$agrupamiento = $_POST['agrupamiento'];
	//monto un select para listar los alumnos matriculados en el agrupamiento
	$sel_agrup = mysql_query("select  agrupamientos.agrupamiento,agrupamientos.nombre,docentes.nombres,docentes.apellidos
	,investigacion.nombre as investigacion,unesco.nombre as unesco,convocatoria.conv_nombre,
	agrupamientos.inicio,agrupamientos.fin,uoi.uoi_nombre AS uoi,linvestigacion.linvest_nombre as 
linvestigacion,agrupamientos.presupuesto,agrupamientos.solicitado,agrupamientos.fondos,agrupamientos.avance
from agrupamientos,docentes,investigacion,unesco,convocatoria,uoi,linvestigacion
	where agrupamientos.docente=docentes.docente and investigacion.clave=agrupamientos.investigacion and 
unesco.clave=agrupamientos.unesco and convocatoria.id_convocatoria=agrupamientos.conv_nombre and uoi.id_uoi=agrupamientos.uoi and 
linvestigacion.id_linvestigacion=agrupamientos.linvestigacion LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
	$num_agrup = mysql_num_rows($sel_agrup);
	echo'<br>';echo'<br>';echo'<br>';
$sSQL = "SELECT count(*) FROM agrupamientos"; //Cuento el total de registros
				$result = mysql_query($sSQL);
				$row = mysql_fetch_array($result);
				$totalRegistros = $row["count(*)"]; //Almaceno el total en una variable
				
				echo "<p align=center><font color=#000080 align='center'><b>Total registros: ".$totalRegistros."  , Pagina: </b></font>";
 				$noPaginas = $totalRegistros/$noRegistros; //Determino la cantidad de páginas
				for($i=1; $i<$noPaginas+1; $i++)
				 { //Imprimo las páginas
    				if($i == $pagina)
        			echo "<font color=#FF0000><b>$i</b></font>"; //A la página actual no le pongo link
    					else
        					echo "<a href=\"bus_moni.php?busqueda=todos&pagina=".$i."\">  <font color=#000080><b>$i</b></font></p></a>";
						$vehiculo="";
				 }	
?>	
					<table width="500" align="center" class="tabla">
					<tr>
						<td class="tdatos">CODIGO</td>
						<td class="tdatos">NOMNRE PROYECTO</td>
						<td class="tdatos">NOMBRE Y APELLIDO FUNCIONARIO</td>
						<td class="tdatos">TIPO INVESTIGACION</td>
						<td class="tdatos">UNESCO</td>
						<td class="tdatos">CONVOCATORIA</td>
						<td class="tdatos">FECHA INICIO</td>
						<td class="tdatos">FECHA FIN</td>	
						<td class="tdatos">DEPARTAMENTO</td>
						<td class="tdatos">LINEA INVESTIGACION</td>
						<td class="tdatos">PRESUPUESTO</td>
						<td class="tdatos">SOLICITADO</td>
						<td class="tdatos">FONDOS</td>
						<td class="tdatos">PORCENTAJE</td>
						<td class="tdatos">ESTADO</td>
						<td class="tdatos">Archivos</td>
					</tr>
<?php	
		for($i=0;$i<$num_agrup;$i++)
		{
		$registro_agrup= mysql_fetch_array($sel_agrup);
		$f_ini = $registro_agrup['inicio'];
		$f_fin = $registro_agrup['fin'];
		if($i%2==0){echo '<tr class="par">';}else{echo '<tr>';}
		echo '<td>'.$registro_agrup['agrupamiento'].'</td>';
		echo '<td>'.$registro_agrup['nombre'].' </td>';
		echo '<td>'.$registro_agrup['nombres'].'   '.$registro_agrup['apellidos'].'</td>';
		echo '<td>'.$registro_agrup['investigacion'].'</td>';
		echo '<td>'.$registro_agrup['unesco'].'</td>';
		echo '<td>'.$registro_agrup['conv_nombre'].'</td>';
		echo '<td>'.$f_ini.'</td>';
		echo '<td>'.$f_fin.'</td>';
		echo '<td>'.$registro_agrup['uoi'].'</td>';
		echo '<td>'.$registro_agrup['linvestigacion'].'</td>';
		echo '<td>'.$registro_agrup['presupuesto'].'</td>';
		echo '<td>'.$registro_agrup['solicitado'].'</td>';
		echo '<td>'.$registro_agrup['fondos'].'</td>';
		$matriz_presupuesto[]=$registro_agrup['presupuesto'];
		$matriz_cdirectos[]=$registro_agrup['solicitado'];
		$matriz_cindirectos[]=$registro_agrup['fondos'];
	
			if($registro_agrup['avance']>95)
			{
			$porcentaje=$registro_agrup['avance'];
			echo '<td><font color="#00005C" >'.$porcentaje.' % Teminado... </font></td>';
			echo '<td><img src="../imgs/terminar.jpg"><td>';
			}
				else
					{
					$porcentaje=$registro_agrup['avance'];
					echo '<td><font color="#A3000A" >'.$porcentaje.' % En Proceso ...</font></td>';
					echo '<td><img src="../imgs/proceso.jpg"><td>';
					
					}
		


				echo '<span><a href="archivo.php?p1='.$registro_agrup['agrupamiento'].'" title="'.$id_grafico.'"><img src="../imgs/tutoria.png" alt="'.$id_grafico.'"/></a></span>';echo '&nbsp;';
	

	/////////////////// fin porcentaje ////////////////////////
		
	}
   				
	echo '</table>';
	echo '<br /><table class="tablacentrada">';
		echo '<tr class="encab">';
			echo '<td>'."		".'</td>';
			echo '<td>'."		".'</td>';
			echo '<td>'."		".'</td>';
			echo '<td>'."		".'</td>';
			echo '<td>'."		".'</td>';
			echo '<td>'.$id_presu.'</td>';
			echo '<td>'.$id_total_cd.'</td>';
			echo '<td>'.$id_total_ci.'</td>';
						
		echo '</tr>';
	if($num_agrup>0)
		{
		$suma_presupuesto=array_sum($matriz_presupuesto);
		$suma_cdirectos=array_sum($matriz_cdirectos);
		$suma_incdirectos=array_sum($matriz_cindirectos);
		echo '<tr class="encab">'; 
			echo '<td>'."		".'</td>';
			echo '<td>'."		".'</td>';
			echo '<td>'."			".'</td>';
			echo '<td>'."			".'</td>';
			echo '<td>'."			".'</td>';
			echo'<td class="tdatos">PRESUPUESTO</td>';
			echo'<td class="tdatos">SOLICITADO</td>';
			echo'<td class="tdatos">FONDOS</td>';
		echo '</tr>'; 
		echo '<tr class="encab">'; 
			echo '<td>'."		".'</td>';
			echo '<td>'."		".'</td>';
			echo '<td>'."			".'</td>';
			echo '<td>'."			".'</td>';
			echo '<td>'."			".'</td>';
			echo '<td><input type="text" name="txt_presupuesto" maxlength="10" readonly="readonly" style="background-color:#F7D358" id="txt_presupuesto" value="'.round($suma_presupuesto,2).'"/></td>';
			echo '<td><input type="text" name="txt_pagos" maxlength="10" readonly="readonly" style="background-color:#F7D358" id="txt_pagos" value="'.round($suma_cdirectos,2).'"/></td>';
			echo '<td><input type="text" name="txt_indirectos" maxlength="10" readonly="readonly" style="background-color:#F7D358" id="txt_indirectos" value="'.round($suma_incdirectos,2).'"/></td>';
			
		echo '</tr>'; 
		}	
	echo '</table>';	


echo "<br><br>";
require("../theme/footer_inicio.php");
?>