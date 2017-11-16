<?php
$bd_host="97.74.31.5";
$bd_usuario="fenedif2";
$bd_pass="kJwyArt#35gSned";
$bd_base="fenedif2";
session_start();
$con = mysql_connect($bd_host,$bd_usuario,$bd_pass);
mysql_select_db($bd_base,$con);
?>	
<form action="grafico_usuariosd.php">
	<input type="hidden" name="busqueda" value="sucursal_id">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">SELECCIONE SUCURSAL</td>
			<tr>
			<?php
			echo '<td>
				
					<select name="sucursal_id" id="sucursal_id" >
					';	
					//listamos grupos para componer el select
					$consulta_brigada = mysql_query("SELECT * FROM sucursal");
					$n_brigada = mysql_num_rows($consulta_brigada);
					echo '<option value="20">SELECCIONE DISCAPACIDAD POR SUCURSAL</option>';
					for($d=0;$d<$n_brigada;$d++)
					{
					$reg_consulta_brigada = mysql_fetch_array($consulta_brigada);
					echo '<option value="'.$reg_consulta_brigada['sucursal_id'].'">'.$reg_consulta_brigada['sucursal_nombre'].'</option>';
					}
				echo '	
				</select>
			
			</td>';
			?>
			<td><input type="submit" value="Buscar"></td>
			</tr>
		</tr>
		
	</table>
</form>			
<!DOCTYPE html>
<html lang="es">
<head>
<title>SISTEMA DE INSERCION LABORAL</title>
<meta charset="utf-8">
<link rel="stylesheet" href="estilo.css">
<script src="js/jquery.min.js"></script>
<script src="js/highcharts/js/highcharts.js"></script>
<script src="js/highcharts/js/themes/grid.js"></script>
<script src="js/highcharts/js/modules/exporting.js"></script>
</head>
<body>

	<div class="contendor">
		<div id="consulta">
			<h2>Tipo Discapacidad</h2><hr>
			<table>
			<thead>
				<tr>
					<th>Tipo Discapacida</th>
					<th>Cantidad</th>
					<th>Porcentaje</th>
					<th>Total</th>
				</tr>
				
			</thead>
			<tbody>
			<?php
			
			$sucursal_id=$_REQUEST["sucursal_id"];
			$consulta_brigada = mysql_query("SELECT * FROM sucursal where sucursal_id=$sucursal_id");
			$reg_consulta_brigada = mysql_fetch_array($consulta_brigada);
			$n_genero = mysql_num_rows($consulta_brigada);
			
			if($sucursal_id !="")
			{
				echo $reg_consulta_brigada['sucursal_nombre'];
				$consulta_genero = mysql_query("
				SELECT d.tipodiscapacidad_nombre ,COUNT(d.tipodiscapacidad_id) as total FROM tipodiscapacidad d, tusuario_discapacidad tu,tusuario t,sucursal s 
WHERE d.tipodiscapacidad_id= tu.id_tipo_discapacidad and tu.id_usuario=t.id_usuario and t.id_sucursal=s.sucursal_id and t.id_sucursal='$sucursal_id' GROUP BY d.tipodiscapacidad_id
					");
				
			}
				else
				{
				ECHO $sucursal_id;
				$consulta_genero = mysql_query("
				SELECT d.tipodiscapacidad_nombre ,COUNT(d.tipodiscapacidad_id) as total FROM tipodiscapacidad d, tusuario_discapacidad tu WHERE d.tipodiscapacidad_id= tu.id_tipo_discapacidad  GROUP BY d.tipodiscapacidad_id
					");
				}
			
			
			$c=0;
			$a=0;
			$total=0;
			$n_genero = mysql_num_rows($consulta_genero);
					for($d=0;$d<$n_genero;$d++)
					{
					$reg_consulta_genero = mysql_fetch_array($consulta_genero);
					$categoria[$c] = $reg_consulta_genero["tipodiscapacidad_nombre"];
				$datos[$c] = $reg_consulta_genero["total"];  
				$total = $total + $reg_consulta_genero["total"];
				$c++;
					
					}
			
			for ($j=0;$j<=$c-1;$j++)
			{
				$a++;
				echo "<tr><td>".$categoria[$j];
				echo "</td><td>".$datos[$j];
				echo "</td><td>".number_format((($datos[$j]/$total)*100), 1, ',', '')."%";
				$por[$j]= round( ($datos[$j]/$total)*100, 1);
				if ($j==0) 
				{
					echo "</td><td rowspan=".$c.">".$total."</td></tr>";
				}
			}
		
			mysql_close($con);	  
			?>
			</tbody>
			</table>
		</div>
		
		<script type="text/javascript">
		$(function () {
			var colors = Highcharts.getOptions().colors,
			categories = [<?php for($y=0;$y<=$c-1;$y++){ echo "'".$categoria[$y]."',";}?>	],
			
			name = 'GÉNERO',
			data = [
			<?php for($x=0;$x<=$c-1;$x++){?>	
			{
				y: <?php echo $por[$x] ?>,
				color: colors[<?php echo $x?>],                   
			}, 
			<?php }?>	   
			];
			function setChart(name, categories, data, color) {
				chart.xAxis[0].setCategories(categories, false);
				chart.series[0].remove(false);
				chart.addSeries({
					name: name,
					data: data,
					color: color || 'white'
				}, false);
				chart.redraw();
			}
			var chart = $('#grafica').highcharts({
				chart: {
					type: 'column'
				},
				title: {
					text: 'Porcentajae Discapacidad'
				},
				xAxis: {
					categories: categories
				},
				credits: {
					enabled: false
				},
				plotOptions: {
					column: {
						cursor: 'pointer',
						point: {
							events: {
								click: function() {
									var drilldown = this.drilldown;
									if (drilldown) { 
										setChart(drilldown.name, drilldown.categories, drilldown.data, drilldown.color);
									} else { 
										setChart(name, categories, data);
									}
								}
							}
						},
						dataLabels: {
							enabled: true,
							color: colors[0],
							style: {
								fontWeight: 'bold'
							},
							formatter: function() {
								return this.y +' %';
							},
						}
					}
				},
				series: [{
					name: name,
					data: data,
					color: 'white'
				}],
				exporting: {
					enabled: true
				}
			})
			.highcharts(); 
		});
		</script>
		<div id="grafica"></div>
	</div>
</body>
</html>
