<div align="center">
<?php

require("../mod_configuracion/conexion.php");

$consulta_amb = mysql_query("select * from expediente where avance <95");
$n_amb = mysql_num_rows($consulta_amb);
$consulta_q = mysql_query("select * from expediente where avance >=95");
$n_q = mysql_num_rows($consulta_q);
$consulta_t = mysql_query("select * from expediente");
$n_t = mysql_num_rows($consulta_t);
		if($n_t>0)
		{
			$pendientes=round(($n_amb*100)/$n_t,2);
			$terminados=round(($n_q*100)/$n_t,2);
			echo "<table class='bordered' cellpadding='1' cellspacing='1' border='1' align='center'>";
				echo '<tr class="encab" bgcolor="000066" style="color: #ffffff; align="center">';
					echo '<td><span class="texto_centrado">Total Expediente Pendientes</span></td> ';
					echo '<td><span class="texto_centrado">Total Expedientes Terminados</span></td> ';
					echo '<td><span class="texto_centrado">Total</span></td> ';
				echo '</tr>';
			echo '<tr>';
				echo '<td><span class="texto_centrado" >'.$n_amb.'</span></td> ';
				echo '<td><span class="texto_centrado" >'.$n_q.'</span></td> ';
				echo '<td><span class="texto_centrado" >'.$n_t.'</span></td> ';
			echo '</tr>';
			echo '</table>';
			include( 'GoogChart.class.php' );
			/** Create chart */
			$chart = new GoogChart();
			// Set graph data
			$data = array
					(
						'Pendientes' .$pendientes .'%' => $pendientes,
						'Terminados ' .$terminados .'%' => $terminados,
					);
			// Set graph colors
			$color = array(
							'#99C754',
							'#000066',
							//'#000033',
							'#B40404',
							
						
					);
			/* # Chart 1 # */
			
			$chart->setChartAttrs( array(
				'type' => 'pie',
				//'title' => 'Browser market 2008',
				'data' => $data,
				'size' => array(450,150),
				'color' => $color
				));
			// Print chart
			echo $chart;
///////////////////////////// grafico 2 //////////////////////////////////////////
		// Set multiple graph data
	$dataMultiple = array( 
		'Pendientes' => array(
			'' => $pendientes,
			
			
		),
		'Terminados' => array(
			'' => $terminados,
		
		),
	);

/* # Chart 2 # */
echo '<h3> <br /><span class="texto_centrado">GRAFICO ESTADISTICO</span><br /></h3> ';
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
		
////////////////////////////////////////////////////////////////////////////////
		}
?>
</div>