<?php
session_start();
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><h6>CONSOLIDADO</h6></div>
<div id="centercontent">
<div align="center">
<table>
<td>
<form action="bus_consolidado.php">
	<input type="hidden" name="busqueda" value="rangofechas">
	<td>
		<td colspan="2" align="center">Fecha Inicio</td>
			
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
						    <td class="dtabla"><input size="30" id="ini1" name="ini1" value="<?php echo $ini1?>"> <button id="f_btn11">...</button><br /></td>
						    <script type="text/javascript">//<![CDATA[
						      Calendar.setup({
						        inputField : "ini1",
						        trigger    : "f_btn11",
						        onSelect   : function() { this.hide() },
						        showTime   : 12,
						        dateFormat : "%Y-%m-%d"
						      });
						    //]]></script>
						  </body>
					</html>
			
			<td colspan="2" align="center">Fecha Fin</td>
			
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
						    <td class="dtabla"><input size="30" id="ffin" name="ffin" value="<?php echo $ffin?>"> <button id="f_btn22">...</button><br /></td>
						    <script type="text/javascript">//<![CDATA[
						      Calendar.setup({
						        inputField : "ffin",
						        trigger    : "f_btn22",
						        onSelect   : function() { this.hide() },
						        showTime   : 12,
						        dateFormat : "%Y-%m-%d"
						      });
						    //]]></script>
						  </body>
					</html>
					<td><input type="submit" value="Buscar"></td>
		
			
	
				
		</td>
	</table>
</form>	
</td>
<td>

</td>
<td>	

</table>
</div>
<br />
<div align="center">
<?php

if($_REQUEST["busqueda"]!="")
{
switch($_REQUEST["busqueda"])
{
	case'todos':
	$ini=$_REQUEST["ini"];
	$fin=$_REQUEST["fin"];
	$sucursal=$_REQUEST["sucursal_id"];
	
	echo '<td><p class="centrado">
	<a target="_blank" href="../pdf/list_personasi_todos.php?p1='.$sucursal.'
	&p3='.$ini.'
	&p4='.$fin.'
	" title="'.$id_excel.'"><img src="../imgs/excel_img.png" alt="'.$id_excel.'" /></a>
	</a></p></td>';
	
	$noRegistros = 50; //Registros por página
	$pagina = 1; //Por default, página = 1
	if($_GET["pagina"]) //Si hay página por ?pagina=valor, lo asigna
    $pagina = $_GET["pagina"];
	//monto un select para listar los alumnos matriculados en el agrupamiento
		$sel_agrup = mysql_query("SELECT 
                      distinct tusuariocontratacion.*,
		     tusuario.*,tpuesto.descripcion,testadocontratacion.contratacion_descripcion,tmrechazo.descripcion_mrechazo,
tempresa.nombre,tdirempresa.fijo as fijoempresa,tdirempresa.fijo2 as fijo2empresa,sucursal.sucursal_nombre,genero.genero_nombre
			
			FROM
                          tusuariocontratacion
left join
			tusuario on tusuariocontratacion.id_usuario_puesto=tusuario.id_usuario
left join
			tpuesto_empresa  on tusuariocontratacion.id_puestoempresa=tpuesto_empresa.id_puestoempresa
left join
			tempresa  on tpuesto_empresa.id_empresa=tempresa.id_empresa
left join
			tdirempresa  on tempresa.id_empresa=tdirempresa.id_empresa
left join
			tpuesto  on tpuesto_empresa.id_puesto=tpuesto.id_puesto
left join
			testadocontratacion  on tusuariocontratacion.id_estadocontratacion=testadocontratacion.id_estadocontratacion
left join
			tmrechazo  on tusuariocontratacion.id_mrechazo=tmrechazo.id_mrechazo
left join
			sucursal  on tempresa.id_sucursal=sucursal.sucursal_id
left join
			genero  on tusuario.genero=genero.genero_id
			
where 
			tempresa.id_sucursal='$sucursal' and tusuariocontratacion.fecha_ingreso>='$ini' and tusuariocontratacion.fecha_ingreso<='$fin'
		 LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
		$num_agrup = mysql_num_rows($sel_agrup);
		echo'<br>';echo'<br>';echo'<br>';
		$sSQL = "SELECT 
                      count(*)
			
			FROM
                          tusuariocontratacion
left join
			tusuario on tusuariocontratacion.id_usuario_puesto=tusuario.id_usuario
left join
			tpuesto_empresa  on tusuariocontratacion.id_puestoempresa=tpuesto_empresa.id_puestoempresa
left join
			tempresa  on tpuesto_empresa.id_empresa=tempresa.id_empresa
left join
			tdirempresa  on tempresa.id_empresa=tdirempresa.id_empresa
left join
			tpuesto  on tpuesto_empresa.id_puesto=tpuesto.id_puesto
left join
			testadocontratacion  on tusuariocontratacion.id_estadocontratacion=testadocontratacion.id_estadocontratacion
left join
			tmrechazo  on tusuariocontratacion.id_mrechazo=tmrechazo.id_mrechazo
left join
			sucursal  on tempresa.id_sucursal=sucursal.sucursal_id
			
where 
			tempresa.id_sucursal='$sucursal' and tusuariocontratacion.fecha_ingreso>='$ini' and tusuariocontratacion.fecha_ingreso<='$fin' "; //Cuento el total de registros
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
        					echo "<a href=\"bus_consolidado.php?busqueda=todos&ini=".$ini."&fin=".$fin."&pagina=".$i."\">  <font color=#000080><b>$i</b></font></a>";
						$vehiculo="";
				 }	
?>	
					<table width="500" align="center" class="tabla">
					<tr>
						<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">FECHA</td>
						<td class="tdatos">NOMBRE</td>
						<td class="tdatos">EMPRESA</td>
						<td class="tdatos">TELÉFONO EMPRESA</td>
						<td class="tdatos">GÉNERO</td>
						<td class="tdatos">SUCURSAL</td>
						
						
						
					</tr>
					<?php	
					for($i=0;$i<$num_agrup;$i++)
					{
						$registro_agrup= mysql_fetch_array($sel_agrup);
						if($i%2==0){echo '<tr class="par">';}else{echo '<tr>';}
						echo '<td>'.$registro_agrup['id_usuario_contratacion'].'</td>';
						echo '<td>'.$registro_agrup['fecha_ingreso'].' </td>';
						echo '<td>'.$registro_agrup['contacto'].' '.$registro_agrup['apellido_materno'].' '.$registro_agrup['primer_nombre'].' '.$registro_agrup['segundo_nombre'].'</td>';
						echo '<td>'.$registro_agrup['nombre'].'</td>';
						echo '<td>'.$registro_agrup['fijoempresa'].'</td>';
						echo '<td>'.$registro_agrup['genero_nombre'].'</td>';
						echo '<td>'.$registro_agrup['sucursal_nombre'].'</td>';
							
						
						}
	
	break;
	case'rangofechas':
	$ini1=$_REQUEST["ini1"];
	$ffin=$_REQUEST["ffin"];
	$sucursal=$_REQUEST["sucursal_id"];
	
	echo '<td><p class="centrado">
	<a target="_blank" href="../pdf/list_consolidado_fechas.php?p3='.$ini1.'
	&p4='.$ffin.'
	" title="'.$id_excel.'"><img src="../imgs/excel_img.png" alt="'.$id_excel.'" /></a>
	</a></p></td>';
	

	
	break;
}
}

echo '</table>';

echo"<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>