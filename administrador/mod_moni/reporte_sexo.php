<?php
require('config.php');
include('funcion.php');
require("../theme/header_inicio.php");
?>

<?php

conecta();
 echo'<img src="../theme/images/p1.jpg" alt="" width="100%" height="196">';
		$consulta_pacientes = mysql_query("SELECT * FROM paciente");
		$n_pacientes = mysql_num_rows($consulta_pacientes);
		$consulta_nhom = mysql_query("SELECT  COUNT(*) AS numhom
		FROM paciente 
		WHERE sexo='M'");
		$consulta_nmuj = mysql_query("SELECT  COUNT(*) AS nummuj
		FROM paciente 
		WHERE sexo='F'");
		if($n_pacientes>0)
		{
			$total=$n_pacientes;
			$reg_consulta_nhom = mysql_fetch_array($consulta_nhom);
			$nhom=$reg_consulta_nhom['numhom'];
			$reg_consulta_nmuj = mysql_fetch_array($consulta_nmuj);
			$nmuj=$reg_consulta_nmuj['nummuj'];
			$hom=round(($nhom*100)/$total,2);
			$muj=round(($nmuj*100)/$total,2);
			/** Include class */
			include( 'GoogChart.class.php' );
			/** Create chart */
			$chart = new GoogChart();
			// Set graph data
			$data = array
					(
						'HOMBRES  ' .$hom .'%' => $hom,
						'MUJERES '.$muj .'%' => $muj,
					);
			// Set graph colors
			$color = array(
							'#99C754',
							//'#000066',
							'#000033',
							//'#00FF00',
						
					);
			/* # Chart 1 # */
			echo'<div align="center">';
			$graf=('Gráfico de Pacientes según el sexo');
			echo '<h3><span class="texto_centrado">'.$graf.'</span></h3> ';
			echo "<table class='bordered' cellpadding='1' cellspacing='1' border='2' align='center'>";
				echo '<tr class="encab" bgcolor="000066" style="color: #ffffff; align="center">';
				echo '<td>Hombres</td>';
				echo '<td>Mujeres</td>';
				echo '<td>Total De Pacientes</td>';
				echo '</tr>';
			echo '<tr>';
			echo '<td>'.$nhom.'</td>';
				echo '<td>'.$nmuj.'</td>';
			echo '<td>'.$total.'</td>';
			echo '<tr>';
			echo '</table>';
			$chart->setChartAttrs( array(
				'type' => 'pie',
				//'title' => 'Browser market 2008',
				'data' => $data,
				'size' => array(450,150),
				'color' => $color
				));
			// Print chart
			echo $chart;
					///////////////////// datos //////////////////////////////////////////
		// Set multiple graph data
	$dataMultiple = array( 
		'HOMBRES' => array(
			' '  => $hom,
		
			//''.$id_becas_uti. ' ' => $bec_uti,
			
		),
		'MUJERES ' => array(
			//''.$id_becas_est. '' => $bec_est,
			'' => $muj,
		
		
		),
	);

/* # Chart 2 # */
$gra=('Gráfico Estadístico');
echo '<h2>'.$gra.'</h2>';
$chart->setChartAttrs( array(
	'type' => 'bar-vertical',
	//'title' => 'Browser market 2008',
	'data' => $dataMultiple,
	'size' => array( 200,200 ),
	'color' => $color,
	'labelsXY' => true,
	));
// Print chart
echo $chart;
		}
require("../theme/footer_inicio.php");
?>
</div>
