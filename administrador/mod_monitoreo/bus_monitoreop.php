<?php
session_start();
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><h6>MONITOREO PERSONAS CON DISCAPACIDAD</h6></div>
<div id="centercontent">
<div align="center">
<table>
<td>
<form action="bus_monitoreop.php">
	<input type="hidden" name="busqueda" value="todos">
	<table align="center" class="tabla">
		<tr>
			<?php
			echo '<td>
				
					<select name="sucursal_id" id="sucursal_id" >
					';	
					//listamos grupos para componer el select
					$consulta_brigada = mysql_query("SELECT * FROM sucursal");
					$n_brigada = mysql_num_rows($consulta_brigada);
					echo '<option>SELECCIONE SUCURSAL</option>';
					for($d=0;$d<$n_brigada;$d++)
					{
					$reg_consulta_brigada = mysql_fetch_array($consulta_brigada);
					echo '<option value="'.$reg_consulta_brigada['sucursal_id'].'">'.$reg_consulta_brigada['sucursal_nombre'].'</option>';
					}
				echo '	
				</select>
			
			</td>';
			?>
			<?php
			echo '<td>
				
					<select name="estado" id="estado" >
					';	
					//listamos grupos para componer el select
					$consulta_brigada = mysql_query("select * from testadousuario");
					$n_brigada = mysql_num_rows($consulta_brigada);
					echo '<option>SELECCIONE ESTADO</option>';
					for($d=0;$d<$n_brigada;$d++)
					{
					$reg_consulta_brigada = mysql_fetch_array($consulta_brigada);
					echo '<option value="'.$reg_consulta_brigada['estusucodigo'].'">'.$reg_consulta_brigada['estusudescripcion'].'</option>';
					}
				echo '	
				</select>
			
			</td>';
			?>
			
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
						    <td class="dtabla"><input size="30" id="fin" name="fin" value="<?php echo $fin?>"> <button id="f_btn">...</button><br /></td>
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
					<td><input type="submit" value="Buscar"></td>
		
			
	
				
		</tr>
	</table>
</form>	
<br/>

<form action="bus_monitoreop.php">
	<input type="hidden" name="busqueda" value="sucursal">
	<table align="center" class="tabla">
		<td>
			<?php
			echo '<td>
				
					<select name="sucursal_id" id="sucursal_id" >
					';	
					//listamos grupos para componer el select
					$consulta_brigada = mysql_query("SELECT * FROM sucursal");
					$n_brigada = mysql_num_rows($consulta_brigada);
					echo '<option>SELECCIONE SUCURSAL</option>';
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
	</td>

</form>	

<form action="bus_monitoreop.php">
	<input type="hidden" name="busqueda" value="estado">
	
		<td>
							
			<?php
			echo '<td>
				
					<select name="estado" id="estado" >
					';	
					//listamos grupos para componer el select
					$consulta_brigada = mysql_query("select * from testadousuario");
					$n_brigada = mysql_num_rows($consulta_brigada);
					echo '<option>SELECCIONE ESTADO</option>';
					for($d=0;$d<$n_brigada;$d++)
					{
					$reg_consulta_brigada = mysql_fetch_array($consulta_brigada);
					echo '<option value="'.$reg_consulta_brigada['estusucodigo'].'">'.$reg_consulta_brigada['estusudescripcion'].'</option>';
					}
				echo '	
				</select>
			
			</td>';
			?>
		<td><input type="submit" value="Buscar"></td>
	</td>

</form>	
<form action="bus_monitoreop.php">
	<input type="hidden" name="busqueda" value="tfnecesaria">
	
		<td>
							
			<?php
			echo '<td>
				
					<select name="tfnecesaria" id="tfnecesaria" >
					';	
					//listamos grupos para componer el select
					$consulta_brigada = mysql_query("select * from tfnecesaria");
					$n_brigada = mysql_num_rows($consulta_brigada);
					echo '<option>TIPO DE FORMACION</option>';
					for($d=0;$d<$n_brigada;$d++)
					{
					$reg_consulta_brigada = mysql_fetch_array($consulta_brigada);
					echo '<option value="'.$reg_consulta_brigada['tfnecesaria_id'].'">'.$reg_consulta_brigada['formacion_descripcion'].'</option>';
					}
				echo '	
				</select>
			
			</td>';
			?>
		<td><input type="submit" value="Buscar"></td>
	</td>

</form>	
<form action="bus_monitoreop.php">
	<input type="hidden" name="busqueda" value="tipodiscapacidad">
	
		<td>
							
			<?php
			echo '<td>
				
					<select name="tipodiscapacidad" id="tipodiscapacidad" >
					';	
					//listamos grupos para componer el select
					$consulta_brigada = mysql_query("select * from tipodiscapacidad");
					$n_brigada = mysql_num_rows($consulta_brigada);
					echo '<option>TIPO DISCAPACIDAD</option>';
					for($d=0;$d<$n_brigada;$d++)
					{
					$reg_consulta_brigada = mysql_fetch_array($consulta_brigada);
					echo '<option value="'.$reg_consulta_brigada['tipodiscapacidad_id'].'">'.$reg_consulta_brigada['tipodiscapacidad_nombre'].'</option>';
					}
				echo '	
				</select>
			
			</td>';
			?>
		<td><input type="submit" value="Buscar"></td>
	</td>

</form>	
<form action="bus_monitoreop.php">
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
		$sucursal_id=$_REQUEST["sucursal_id"];
		$estado=$_REQUEST["estado"];
		$ini=$_REQUEST["ini"];
		$fin=$_REQUEST["fin"];
	echo '<td><p class="centrado">
	<a target="_blank" href="../pdf/list_usuariop_todos.php?p1='.$sucursal_id.'&p2='.$estado.'
	&p3='.$ini.'
	&p4='.$fin.'
	" title="'.$id_excel.'"><img src="../imgs/excel_img.png" alt="'.$id_excel.'" /></a>
	</a></p></td>';
	
	$noRegistros = 100; //Registros por página
	$pagina = 1; //Por default, página = 1
	if($_GET["pagina"]) //Si hay página por ?pagina=valor, lo asigna
    $pagina = $_GET["pagina"];
	$agrupamiento = $_POST['agrupamiento'];
	//monto un select para listar los alumnos matriculados en el agrupamiento
		$sel_agrup = mysql_query("SELECT DISTINCT tusuario.*,
tipoidentificacion.tipoidentificacion_nombre,genero.genero_nombre,estadocivil.estadocivil_nombre,thijos.hijos_descripcion,
formaconocer.formaconocer_nombre,testadocf.estcfdescripcion,t_seguro.experiencia_nombre AS tseguro,tiposeguro.tiposeguro_nombre,
tparroquia.pardescripcion,tipoparroquia.tipoparroquia_nombre,t_licencia.experiencia_nombre AS licencia,tipolicencia.tipolicencia_nombre,
t_vehiculo.experiencia_nombre AS vehiculo,t_adaptacion.experiencia_nombre AS adaptacion,t_federacion.experiencia_nombre AS federacion,
asociacion.asociacion_nombre,etnia.etnia_nombre,`tprovincia`.`prodescripcion`,`tpuesto`.`descripcion`,
tipodiscapacidad.tipodiscapacidad_nombre,partesafectadas.partesafectadas_nombre,
nivelavance.nivelavance_nombre,origendeficiencia.origendeficiencia_nombre,tporcentaje.tporcentaje_descripcion,
YEAR(CURDATE())-YEAR(`fecha_nac`)  AS `edad_actual`,tfnecesaria.formacion_descripcion,tnivel.tnivel_descripcion,tniveledu.tniveledu_descripcion
FROM
	tusuario
LEFT JOIN
	tipoidentificacion ON tusuario.tipoidentificacion_id=tipoidentificacion.tipoidentificacion_id
LEFT JOIN
	genero ON tusuario.genero=genero.genero_id
LEFT JOIN
	estadocivil ON tusuario.id_estado_civil=estadocivil.estadocivil_id
LEFT JOIN
	thijos ON tusuario.num_hijos=thijos.hijos_id
LEFT JOIN
	formaconocer ON tusuario.forma_conocer=formaconocer.formaconocer_id
LEFT JOIN
	testadocf ON tusuario.estado=testadocf.estcfcodigo
LEFT JOIN
	experiencia AS t_seguro ON tusuario.seguro=t_seguro.experiencia_id
LEFT JOIN
	tiposeguro ON tusuario.tipo_seguro=tiposeguro.tiposeguro_id
LEFT JOIN
	tparroquia ON tusuario.parcodigo=tparroquia.parcodigo
LEFT JOIN
	`tcanton` ON tparroquia.`cancodigo`=`tcanton`.`cancodigo`
LEFT JOIN
	`tprovincia` ON `tcanton`.`procodigo`=`tprovincia`.`procodigo`		
LEFT JOIN
	tipoparroquia ON tusuario.sector=tipoparroquia.tipoparroquia_id
LEFT JOIN
	experiencia AS t_licencia ON tusuario.licencia=t_licencia.experiencia_id
LEFT JOIN
	tipolicencia ON tusuario.tlicencia=tipolicencia.tipolicencia_id
LEFT JOIN
	experiencia AS t_vehiculo ON tusuario.vehiculo=t_vehiculo.experiencia_id
LEFT JOIN
	experiencia AS t_adaptacion ON tusuario.adaptacion_vehiculo=t_adaptacion.experiencia_id
LEFT JOIN
	experiencia AS t_federacion ON tusuario.federacion=t_federacion.experiencia_id
LEFT JOIN
	asociacion ON tusuario.tfederacion=asociacion.asociacion_id
LEFT JOIN
	etnia ON tusuario.etnia_id=etnia.etnia_id
LEFT JOIN
	`tpuesto` ON `tusuario`.`foto`=`tpuesto`.`id_puesto`


LEFT JOIN
			`tusuario_discapacidad` ON `tusuario`.`id_usuario`=`tusuario_discapacidad`.`id_usuario`
LEFT JOIN
	tipodiscapacidad ON tusuario_discapacidad.id_tipo_discapacidad=tipodiscapacidad.tipodiscapacidad_id
LEFT JOIN
	partesafectadas ON tusuario_discapacidad.id_detalle_tipo_discapacidad=partesafectadas.partesafectadas_id
LEFT JOIN
	nivelavance ON tusuario_discapacidad.nivelavance_id=nivelavance.nivelavance_id
LEFT JOIN
	origendeficiencia ON tusuario_discapacidad.odiscapacidad_id=origendeficiencia.origendeficiencia_id
LEFT JOIN
	tporcentaje ON tusuario_discapacidad.tporcentaje_id=tporcentaje.tporcentaje_id
LEFT JOIN
	`tformacionu` ON `tusuario`.`id_usuario`=`tformacionu`.`id_usuario`
LEFT JOIN
			tfnecesaria ON tformacionu.tfnecesaria_id =tfnecesaria.tfnecesaria_id
LEFT JOIN
			tnivel ON tformacionu.tnivel_id=tnivel.tnivel_id 
LEFT JOIN
			tniveledu ON tformacionu.tniveledu_id=tniveledu.tniveledu_id 

where 
tusuario.tusuario_id='2' and tusuario.id_sucursal='$sucursal_id' and 
tusuario.estado='$estado' and tusuario.fecha_ingreso>='$ini' and tusuario.fecha_ingreso<='$fin ' order by apellido_paterno
		 LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
		$num_agrup = mysql_num_rows($sel_agrup);
		echo'<br>';echo'<br>';echo'<br>';
		$sSQL = "SELECT count(*) 
FROM
	tusuario


where 
tusuario.tusuario_id='2'and tusuario.id_sucursal='$sucursal_id' and tusuario.estado='$estado' and tusuario.fecha_ingreso>='$ini' and tusuario.fecha_ingreso<='$fin '"; //Cuento el total de registros
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
        					echo "<a href=\"bus_monitoreop.php?busqueda=todos&sucursal_id=".$sucursal_id."
        					&estado=".$estado."
        					&ini=".$ini."
        					&fin=".$fin."
        					&pagina=".$i."\">  <font color=#000080><b>$i</b></font></a>";
						$vehiculo="";
				 }	
?>	
					<table width="500" align="center" class="tabla">
					<tr>
			<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">TIPO IDENTIFICACIÓN</td>
						<td class="tdatos">NOMBRES Y APELLIDOS</td>
						<td class="tdatos">GÉNERO</td>
						<td class="tdatos">ESTADO CIVIL</td>
						<td class="tdatos">FECHA NACIMIENTO</td>
						<td class="tdatos">NÚMERO DE HIJOS</td>
						<td class="tdatos">FORMA DE CONOCER</td>
						<td class="tdatos">ESTADO</td>
						<td class="tdatos">TIENE SEGURO</td>
						<td class="tdatos">TIPO SEGURO</td>	
						<td class="tdatos">FECHA DE INGRESO</td>
						<td class="tdatos">ÉTNIA</td>
						<td class="tdatos">PARROQUIA</td>
						<td class="tdatos">CALLE PRINCIPAL</td>
						<td class="tdatos">NÚMERO</td>	
						<td class="tdatos">TRANSVERSAL</td>
						<td class="tdatos">SECTOR</td>
						<td class="tdatos">PASAJE</td>
						<td class="tdatos">BARRIO</td>
						<td class="tdatos">MANZANA</td>
						<td class="tdatos">SOLAR</td>
						<td class="tdatos">OBSERVACIÓN</td>	
						<td class="tdatos">FIJO</td>
						<td class="tdatos">MÓVIL</td>
						<td class="tdatos">REFERIDO 1</td>
						<td class="tdatos">REFERIDO 2</td>
						<td class="tdatos">EMAIL</td>	
						<td class="tdatos">OBSERVACIÓN TELÉFONO</td>
						<td class="tdatos">TIENE LICENCIA</td>
						<td class="tdatos">TIPO LICENCIA</td>
						<td class="tdatos">VEHÍCULO</td>
						<td class="tdatos">ADAPTACIÓN</td>
						<td class="tdatos">TIPO ADAPTACIÓN</td>	
						<td class="tdatos">FEDERACIÓN</td>
						<td class="tdatos">TIPO FEDERACION</td>
						<td class="tdatos">ASOCIACIÓN</td>
						<td class="tdatos">PROVINCIA</td>
						<td class="tdatos">PROFESIÓN</td>
						
						<td class="tdatos">TIPO DISCAPACIDAD</td>
						<td class="tdatos">PARTES AFECTADAS</td>
						<td class="tdatos">NIVEL AVANCE</td>
						<td class="tdatos">ORIGEN DEFICIENCIA</td>
						<td class="tdatos">PORCENTAJE</td>
						<td class="tdatos">FORMACION </td>
						<td class="tdatos">NIVEL FORMACION </td>
						<td class="tdatos">NIVEL EDUCACION </td>
						<td class="tdatos">EDAD</td>
					</tr>
					<?php	
					for($i=0;$i<$num_agrup;$i++)
					{
						$registro_agrup= mysql_fetch_array($sel_agrup);
						if($i%2==0){echo '<tr class="par">';}else{echo '<tr>';}
								echo '<td>'.$registro_agrup['id_usuario'].'</td>';
						echo '<td>'.$registro_agrup['identificacion'].' </td>';
						echo '<td>'.$registro_agrup['apellido_paterno'].' '.$registro_agrup['apellido_materno'].' '.$registro_agrup['primer_nombre'].' '.$registro_agrup['segundo_nombre'].'</td>';
						echo '<td>'.$registro_agrup['genero_nombre'].' </td>';
						echo '<td>'.$registro_agrup['estadocivil_nombre'].'</td>';
						echo '<td>'.$registro_agrup['fecha_nac'].' </td>';
						echo '<td>'.$registro_agrup['hijos_descripcion'].' </td>';
						echo '<td>'.$registro_agrup['formaconocer_nombre'].' </td>';
						echo '<td>'.$registro_agrup['estcfdescripcion'].'</td>';
						echo '<td>'.$registro_agrup['tseguro'].' </td>';
						echo '<td>'.$registro_agrup['tiposeguro_nombre'].'</td>';
						echo '<td>'.$registro_agrup['fecha_ingreso'].' </td>';
						echo '<td>'.$registro_agrup['etnia_nombre'].' </td>';
						echo '<td>'.$registro_agrup['pardescripcion'].' </td>';
						echo '<td>'.$registro_agrup['cprincipal'].'</td>';
						echo '<td>'.$registro_agrup['numero'].' </td>';
						echo '<td>'.$registro_agrup['transversal'].'</td>';
						echo '<td>'.$registro_agrup['tipoparroquia_nombre'].' </td>';
						echo '<td>'.$registro_agrup['pasaje'].' </td>';
						echo '<td>'.$registro_agrup['barrio'].' </td>';
						echo '<td>'.$registro_agrup['manzana'].'</td>';
						echo '<td>'.$registro_agrup['solar'].' </td>';
						echo '<td>'.$registro_agrup['observacion'].'</td>';
						echo '<td>'.$registro_agrup['fijo'].' </td>';
						echo '<td>'.$registro_agrup['movil'].' </td>';
						echo '<td>'.$registro_agrup['referido1'].' </td>';
						echo '<td>'.$registro_agrup['referido2'].'</td>';
						echo '<td>'.$registro_agrup['email'].' </td>';
						echo '<td>'.$registro_agrup['observacion_telefono'].'</td>';
						echo '<td>'.$registro_agrup['licencia'].' </td>';
						echo '<td>'.$registro_agrup['tipolicencia_nombre'].'</td>';
						echo '<td>'.$registro_agrup['vehiculo'].' </td>';
						echo '<td>'.$registro_agrup['adaptacion'].' </td>';
						echo '<td>'.$registro_agrup['tipo_adaptacion'].' </td>';
						echo '<td>'.$registro_agrup['federacion'].'</td>';
						echo '<td>'.$registro_agrup['asociacion_nombre'].' </td>';
						echo '<td>'.$registro_agrup['asociacion'].'</td>';
						echo '<td>'.$registro_agrup['prodescripcion'].'</td>';
						echo '<td>'.$registro_agrup['descripcion'].'</td>';	
						
						echo '<td>'.$registro_agrup['tipodiscapacidad_nombre'].'</td>';
						echo '<td>'.$registro_agrup['partesafectadas_nombre'].'</td>';
						echo '<td>'.$registro_agrup['nivelavance_nombre'].'</td>';
						echo '<td>'.$registro_agrup['origendeficiencia_nombre'].'</td>';
						echo '<td>'.$registro_agrup['tporcentaje_descripcion'].'</td>';
						echo '<td>'.$registro_agrup['formacion_descripcion'].'</td>';
						echo '<td>'.$registro_agrup['tnivel_descripcion'].'</td>';
						echo '<td>'.$registro_agrup['tniveledu_descripcion'].'</td>';
						echo '<td>'.$registro_agrup['edad_actual'].'</td>';					
						}
	break;
	
	case'sucursal':
				$sucursal_id=$_REQUEST["sucursal_id"];
		$estado=$_REQUEST["estado"];
		$ini=$_REQUEST["ini"];
		$fin=$_REQUEST["fin"];
	echo '<td><p class="centrado">
	<a target="_blank" href="../pdf/list_usuariop_sucursal.php?p1='.$sucursal_id.'
	
	" title="'.$id_excel.'"><img src="../imgs/excel_img.png" alt="'.$id_excel.'" /></a>
	
	</a></p></td>';
	
	$noRegistros = 100; //Registros por página
	$pagina = 1; //Por default, página = 1
	if($_GET["pagina"]) //Si hay página por ?pagina=valor, lo asigna
    $pagina = $_GET["pagina"];
	$agrupamiento = $_POST['agrupamiento'];
	//monto un select para listar los alumnos matriculados en el agrupamiento
		$sel_agrup = mysql_query("SELECT DISTINCT tusuario.*,
tipoidentificacion.tipoidentificacion_nombre,genero.genero_nombre,estadocivil.estadocivil_nombre,thijos.hijos_descripcion,
formaconocer.formaconocer_nombre,testadocf.estcfdescripcion,t_seguro.experiencia_nombre AS tseguro,tiposeguro.tiposeguro_nombre,
tparroquia.pardescripcion,tipoparroquia.tipoparroquia_nombre,t_licencia.experiencia_nombre AS licencia,tipolicencia.tipolicencia_nombre,
t_vehiculo.experiencia_nombre AS vehiculo,t_adaptacion.experiencia_nombre AS adaptacion,t_federacion.experiencia_nombre AS federacion,
asociacion.asociacion_nombre,etnia.etnia_nombre,`tprovincia`.`prodescripcion`,`tpuesto`.`descripcion`,
tipodiscapacidad.tipodiscapacidad_nombre,partesafectadas.partesafectadas_nombre,
nivelavance.nivelavance_nombre,origendeficiencia.origendeficiencia_nombre,tporcentaje.tporcentaje_descripcion,
YEAR(CURDATE())-YEAR(`fecha_nac`)  AS `edad_actual`,tfnecesaria.formacion_descripcion,tnivel.tnivel_descripcion,tniveledu.tniveledu_descripcion
FROM
	tusuario
LEFT JOIN
	tipoidentificacion ON tusuario.tipoidentificacion_id=tipoidentificacion.tipoidentificacion_id
LEFT JOIN
	genero ON tusuario.genero=genero.genero_id
LEFT JOIN
	estadocivil ON tusuario.id_estado_civil=estadocivil.estadocivil_id
LEFT JOIN
	thijos ON tusuario.num_hijos=thijos.hijos_id
LEFT JOIN
	formaconocer ON tusuario.forma_conocer=formaconocer.formaconocer_id
LEFT JOIN
	testadocf ON tusuario.estado=testadocf.estcfcodigo
LEFT JOIN
	experiencia AS t_seguro ON tusuario.seguro=t_seguro.experiencia_id
LEFT JOIN
	tiposeguro ON tusuario.tipo_seguro=tiposeguro.tiposeguro_id
LEFT JOIN
	tparroquia ON tusuario.parcodigo=tparroquia.parcodigo
LEFT JOIN
	`tcanton` ON tparroquia.`cancodigo`=`tcanton`.`cancodigo`
LEFT JOIN
	`tprovincia` ON `tcanton`.`procodigo`=`tprovincia`.`procodigo`		
LEFT JOIN
	tipoparroquia ON tusuario.sector=tipoparroquia.tipoparroquia_id
LEFT JOIN
	experiencia AS t_licencia ON tusuario.licencia=t_licencia.experiencia_id
LEFT JOIN
	tipolicencia ON tusuario.tlicencia=tipolicencia.tipolicencia_id
LEFT JOIN
	experiencia AS t_vehiculo ON tusuario.vehiculo=t_vehiculo.experiencia_id
LEFT JOIN
	experiencia AS t_adaptacion ON tusuario.adaptacion_vehiculo=t_adaptacion.experiencia_id
LEFT JOIN
	experiencia AS t_federacion ON tusuario.federacion=t_federacion.experiencia_id
LEFT JOIN
	asociacion ON tusuario.tfederacion=asociacion.asociacion_id
LEFT JOIN
	etnia ON tusuario.etnia_id=etnia.etnia_id
LEFT JOIN
	`tpuesto` ON `tusuario`.`foto`=`tpuesto`.`id_puesto`


LEFT JOIN
			`tusuario_discapacidad` ON `tusuario`.`id_usuario`=`tusuario_discapacidad`.`id_usuario`
LEFT JOIN
	tipodiscapacidad ON tusuario_discapacidad.id_tipo_discapacidad=tipodiscapacidad.tipodiscapacidad_id
LEFT JOIN
	partesafectadas ON tusuario_discapacidad.id_detalle_tipo_discapacidad=partesafectadas.partesafectadas_id
LEFT JOIN
	nivelavance ON tusuario_discapacidad.nivelavance_id=nivelavance.nivelavance_id
LEFT JOIN
	origendeficiencia ON tusuario_discapacidad.odiscapacidad_id=origendeficiencia.origendeficiencia_id
LEFT JOIN
	tporcentaje ON tusuario_discapacidad.tporcentaje_id=tporcentaje.tporcentaje_id
LEFT JOIN
	`tformacionu` ON `tusuario`.`id_usuario`=`tformacionu`.`id_usuario`
LEFT JOIN
			tfnecesaria ON tformacionu.tfnecesaria_id =tfnecesaria.tfnecesaria_id
LEFT JOIN
			tnivel ON tformacionu.tnivel_id=tnivel.tnivel_id 
LEFT JOIN
			tniveledu ON tformacionu.tniveledu_id=tniveledu.tniveledu_id 

where 
tusuario.tusuario_id='2'and tusuario.id_sucursal='$sucursal_id' order by apellido_paterno
		 LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
		$num_agrup = mysql_num_rows($sel_agrup);
		echo'<br>';echo'<br>';echo'<br>';
		$sSQL = "SELECT count(*) 
FROM
	tusuario
LEFT JOIN
	tipoidentificacion ON tusuario.tipoidentificacion_id=tipoidentificacion.tipoidentificacion_id
LEFT JOIN
	genero ON tusuario.genero=genero.genero_id
LEFT JOIN
	estadocivil ON tusuario.id_estado_civil=estadocivil.estadocivil_id
LEFT JOIN
	thijos ON tusuario.num_hijos=thijos.hijos_id
LEFT JOIN
	formaconocer ON tusuario.forma_conocer=formaconocer.formaconocer_id
LEFT JOIN
	testadocf ON tusuario.estado=testadocf.estcfcodigo
LEFT JOIN
	experiencia AS t_seguro ON tusuario.seguro=t_seguro.experiencia_id
LEFT JOIN
	tiposeguro ON tusuario.tipo_seguro=tiposeguro.tiposeguro_id
LEFT JOIN
	tparroquia ON tusuario.parcodigo=tparroquia.parcodigo
LEFT JOIN
	`tcanton` ON tparroquia.`cancodigo`=`tcanton`.`cancodigo`
LEFT JOIN
	`tprovincia` ON `tcanton`.`procodigo`=`tprovincia`.`procodigo`		
LEFT JOIN
	tipoparroquia ON tusuario.sector=tipoparroquia.tipoparroquia_id
LEFT JOIN
	experiencia AS t_licencia ON tusuario.licencia=t_licencia.experiencia_id
LEFT JOIN
	tipolicencia ON tusuario.tlicencia=tipolicencia.tipolicencia_id
LEFT JOIN
	experiencia AS t_vehiculo ON tusuario.vehiculo=t_vehiculo.experiencia_id
LEFT JOIN
	experiencia AS t_adaptacion ON tusuario.adaptacion_vehiculo=t_adaptacion.experiencia_id
LEFT JOIN
	experiencia AS t_federacion ON tusuario.federacion=t_federacion.experiencia_id
LEFT JOIN
	asociacion ON tusuario.tfederacion=asociacion.asociacion_id
LEFT JOIN
	etnia ON tusuario.etnia_id=etnia.etnia_id
LEFT JOIN
	`tpuesto` ON `tusuario`.`foto`=`tpuesto`.`id_puesto`


LEFT JOIN
			`tusuario_discapacidad` ON `tusuario`.`id_usuario`=`tusuario_discapacidad`.`id_usuario`
LEFT JOIN
	tipodiscapacidad ON tusuario_discapacidad.id_tipo_discapacidad=tipodiscapacidad.tipodiscapacidad_id
LEFT JOIN
	partesafectadas ON tusuario_discapacidad.id_detalle_tipo_discapacidad=partesafectadas.partesafectadas_id
LEFT JOIN
	nivelavance ON tusuario_discapacidad.nivelavance_id=nivelavance.nivelavance_id
LEFT JOIN
	origendeficiencia ON tusuario_discapacidad.odiscapacidad_id=origendeficiencia.origendeficiencia_id
LEFT JOIN
	tporcentaje ON tusuario_discapacidad.tporcentaje_id=tporcentaje.tporcentaje_id
LEFT JOIN
	`tformacionu` ON `tusuario`.`id_usuario`=`tformacionu`.`id_usuario`
LEFT JOIN
			tfnecesaria ON tformacionu.tfnecesaria_id =tfnecesaria.tfnecesaria_id
LEFT JOIN
			tnivel ON tformacionu.tnivel_id=tnivel.tnivel_id 
LEFT JOIN
			tniveledu ON tformacionu.tniveledu_id=tniveledu.tniveledu_id 

where 
tusuario.tusuario_id='2'and tusuario.id_sucursal='$sucursal_id '"; //Cuento el total de registros
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
        					echo "<a href=\"bus_monitoreop.php?busqueda=sucursal&sucursal_id=".$sucursal_id."
        					
        					&pagina=".$i."\">  <font color=#000080><b>$i</b></font></a>";
						$vehiculo="";
				 }	
?>	
					<table width="500" align="center" class="tabla">
					<tr>
					<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">TIPO IDENTIFICACIÓN</td>
						<td class="tdatos">NOMBRES Y APELLIDOS</td>
						<td class="tdatos">GÉNERO</td>
						<td class="tdatos">ESTADO CIVIL</td>
						<td class="tdatos">FECHA NACIMIENTO</td>
						<td class="tdatos">NÚMERO DE HIJOS</td>
						<td class="tdatos">FORMA DE CONOCER</td>
						<td class="tdatos">ESTADO</td>
						<td class="tdatos">TIENE SEGURO</td>
						<td class="tdatos">TIPO SEGURO</td>	
						<td class="tdatos">FECHA DE INGRESO</td>
						<td class="tdatos">ÉTNIA</td>
						<td class="tdatos">PARROQUIA</td>
						<td class="tdatos">CALLE PRINCIPAL</td>
						<td class="tdatos">NÚMERO</td>	
						<td class="tdatos">TRANSVERSAL</td>
						<td class="tdatos">SECTOR</td>
						<td class="tdatos">PASAJE</td>
						<td class="tdatos">BARRIO</td>
						<td class="tdatos">MANZANA</td>
						<td class="tdatos">SOLAR</td>
						<td class="tdatos">OBSERVACIÓN</td>	
						<td class="tdatos">FIJO</td>
						<td class="tdatos">MÓVIL</td>
						<td class="tdatos">REFERIDO 1</td>
						<td class="tdatos">REFERIDO 2</td>
						<td class="tdatos">EMAIL</td>	
						<td class="tdatos">OBSERVACIÓN TELÉFONO</td>
						<td class="tdatos">TIENE LICENCIA</td>
						<td class="tdatos">TIPO LICENCIA</td>
						<td class="tdatos">VEHÍCULO</td>
						<td class="tdatos">ADAPTACIÓN</td>
						<td class="tdatos">TIPO ADAPTACIÓN</td>	
						<td class="tdatos">FEDERACIÓN</td>
						<td class="tdatos">TIPO FEDERACION</td>
						<td class="tdatos">ASOCIACIÓN</td>
						<td class="tdatos">PROVINCIA</td>
						<td class="tdatos">PROFESIÓN</td>
						
						<td class="tdatos">TIPO DISCAPACIDAD</td>
						<td class="tdatos">PARTES AFECTADAS</td>
						<td class="tdatos">NIVEL AVANCE</td>
						<td class="tdatos">ORIGEN DEFICIENCIA</td>
						<td class="tdatos">PORCENTAJE</td>
						<td class="tdatos">FORMACION </td>
						<td class="tdatos">NIVEL FORMACION </td>
						<td class="tdatos">NIVEL EDUCACION </td>
						<td class="tdatos">EDAD</td>
					</tr>
					<?php	
					for($i=0;$i<$num_agrup;$i++)
					{
						$registro_agrup= mysql_fetch_array($sel_agrup);
						if($i%2==0){echo '<tr class="par">';}else{echo '<tr>';}
						echo '<td>'.$registro_agrup['id_usuario'].'</td>';
						echo '<td>'.$registro_agrup['identificacion'].' </td>';
						echo '<td>'.$registro_agrup['apellido_paterno'].' '.$registro_agrup['apellido_materno'].' '.$registro_agrup['primer_nombre'].' '.$registro_agrup['segundo_nombre'].'</td>';
						echo '<td>'.$registro_agrup['genero_nombre'].' </td>';
						echo '<td>'.$registro_agrup['estadocivil_nombre'].'</td>';
						echo '<td>'.$registro_agrup['fecha_nac'].' </td>';
						echo '<td>'.$registro_agrup['hijos_descripcion'].' </td>';
						echo '<td>'.$registro_agrup['formaconocer_nombre'].' </td>';
						echo '<td>'.$registro_agrup['estcfdescripcion'].'</td>';
						echo '<td>'.$registro_agrup['tseguro'].' </td>';
						echo '<td>'.$registro_agrup['tiposeguro_nombre'].'</td>';
						echo '<td>'.$registro_agrup['fecha_ingreso'].' </td>';
						echo '<td>'.$registro_agrup['etnia_nombre'].' </td>';
						echo '<td>'.$registro_agrup['pardescripcion'].' </td>';
						echo '<td>'.$registro_agrup['cprincipal'].'</td>';
						echo '<td>'.$registro_agrup['numero'].' </td>';
						echo '<td>'.$registro_agrup['transversal'].'</td>';
						echo '<td>'.$registro_agrup['tipoparroquia_nombre'].' </td>';
						echo '<td>'.$registro_agrup['pasaje'].' </td>';
						echo '<td>'.$registro_agrup['barrio'].' </td>';
						echo '<td>'.$registro_agrup['manzana'].'</td>';
						echo '<td>'.$registro_agrup['solar'].' </td>';
						echo '<td>'.$registro_agrup['observacion'].'</td>';
						echo '<td>'.$registro_agrup['fijo'].' </td>';
						echo '<td>'.$registro_agrup['movil'].' </td>';
						echo '<td>'.$registro_agrup['referido1'].' </td>';
						echo '<td>'.$registro_agrup['referido2'].'</td>';
						echo '<td>'.$registro_agrup['email'].' </td>';
						echo '<td>'.$registro_agrup['observacion_telefono'].'</td>';
						echo '<td>'.$registro_agrup['licencia'].' </td>';
						echo '<td>'.$registro_agrup['tipolicencia_nombre'].'</td>';
						echo '<td>'.$registro_agrup['vehiculo'].' </td>';
						echo '<td>'.$registro_agrup['adaptacion'].' </td>';
						echo '<td>'.$registro_agrup['tipo_adaptacion'].' </td>';
						echo '<td>'.$registro_agrup['federacion'].'</td>';
						echo '<td>'.$registro_agrup['asociacion_nombre'].' </td>';
						echo '<td>'.$registro_agrup['asociacion'].'</td>';
						echo '<td>'.$registro_agrup['prodescripcion'].'</td>';
						echo '<td>'.$registro_agrup['descripcion'].'</td>';	
						
						echo '<td>'.$registro_agrup['tipodiscapacidad_nombre'].'</td>';
						echo '<td>'.$registro_agrup['partesafectadas_nombre'].'</td>';
						echo '<td>'.$registro_agrup['nivelavance_nombre'].'</td>';
						echo '<td>'.$registro_agrup['origendeficiencia_nombre'].'</td>';
						echo '<td>'.$registro_agrup['tporcentaje_descripcion'].'</td>';
						echo '<td>'.$registro_agrup['formacion_descripcion'].'</td>';
						echo '<td>'.$registro_agrup['tnivel_descripcion'].'</td>';
						echo '<td>'.$registro_agrup['tniveledu_descripcion'].'</td>';
						echo '<td>'.$registro_agrup['edad_actual'].'</td>';
						}
		
	break;
	case'estado':
				$sucursal_id=$_REQUEST["sucursal_id"];
		$estado=$_REQUEST["estado"];
		$ini=$_REQUEST["ini"];
		$fin=$_REQUEST["fin"];
	echo '<td><p class="centrado">
	<a target="_blank" href="../pdf/list_usuariop_estado.php?p2='.$estado.'
	" title="'.$id_excel.'"><img src="../imgs/excel_img.png" alt="'.$id_excel.'" /></a>
	
	</a></p></td>';
	
	$noRegistros = 100; //Registros por página
	$pagina = 1; //Por default, página = 1
	if($_GET["pagina"]) //Si hay página por ?pagina=valor, lo asigna
    $pagina = $_GET["pagina"];
	$agrupamiento = $_POST['agrupamiento'];
	//monto un select para listar los alumnos matriculados en el agrupamiento
		$sel_agrup = mysql_query("SELECT DISTINCT tusuario.*,
tipoidentificacion.tipoidentificacion_nombre,genero.genero_nombre,estadocivil.estadocivil_nombre,thijos.hijos_descripcion,
formaconocer.formaconocer_nombre,testadocf.estcfdescripcion,t_seguro.experiencia_nombre AS tseguro,tiposeguro.tiposeguro_nombre,
tparroquia.pardescripcion,tipoparroquia.tipoparroquia_nombre,t_licencia.experiencia_nombre AS licencia,tipolicencia.tipolicencia_nombre,
t_vehiculo.experiencia_nombre AS vehiculo,t_adaptacion.experiencia_nombre AS adaptacion,t_federacion.experiencia_nombre AS federacion,
asociacion.asociacion_nombre,etnia.etnia_nombre,`tprovincia`.`prodescripcion`,`tpuesto`.`descripcion`,
tipodiscapacidad.tipodiscapacidad_nombre,partesafectadas.partesafectadas_nombre,
nivelavance.nivelavance_nombre,origendeficiencia.origendeficiencia_nombre,tporcentaje.tporcentaje_descripcion,
YEAR(CURDATE())-YEAR(`fecha_nac`)  AS `edad_actual`,tfnecesaria.formacion_descripcion,tnivel.tnivel_descripcion,tniveledu.tniveledu_descripcion
FROM
	tusuario
LEFT JOIN
	tipoidentificacion ON tusuario.tipoidentificacion_id=tipoidentificacion.tipoidentificacion_id
LEFT JOIN
	genero ON tusuario.genero=genero.genero_id
LEFT JOIN
	estadocivil ON tusuario.id_estado_civil=estadocivil.estadocivil_id
LEFT JOIN
	thijos ON tusuario.num_hijos=thijos.hijos_id
LEFT JOIN
	formaconocer ON tusuario.forma_conocer=formaconocer.formaconocer_id
LEFT JOIN
	testadocf ON tusuario.estado=testadocf.estcfcodigo
LEFT JOIN
	experiencia AS t_seguro ON tusuario.seguro=t_seguro.experiencia_id
LEFT JOIN
	tiposeguro ON tusuario.tipo_seguro=tiposeguro.tiposeguro_id
LEFT JOIN
	tparroquia ON tusuario.parcodigo=tparroquia.parcodigo
LEFT JOIN
	`tcanton` ON tparroquia.`cancodigo`=`tcanton`.`cancodigo`
LEFT JOIN
	`tprovincia` ON `tcanton`.`procodigo`=`tprovincia`.`procodigo`		
LEFT JOIN
	tipoparroquia ON tusuario.sector=tipoparroquia.tipoparroquia_id
LEFT JOIN
	experiencia AS t_licencia ON tusuario.licencia=t_licencia.experiencia_id
LEFT JOIN
	tipolicencia ON tusuario.tlicencia=tipolicencia.tipolicencia_id
LEFT JOIN
	experiencia AS t_vehiculo ON tusuario.vehiculo=t_vehiculo.experiencia_id
LEFT JOIN
	experiencia AS t_adaptacion ON tusuario.adaptacion_vehiculo=t_adaptacion.experiencia_id
LEFT JOIN
	experiencia AS t_federacion ON tusuario.federacion=t_federacion.experiencia_id
LEFT JOIN
	asociacion ON tusuario.tfederacion=asociacion.asociacion_id
LEFT JOIN
	etnia ON tusuario.etnia_id=etnia.etnia_id
LEFT JOIN
	`tpuesto` ON `tusuario`.`foto`=`tpuesto`.`id_puesto`


LEFT JOIN
			`tusuario_discapacidad` ON `tusuario`.`id_usuario`=`tusuario_discapacidad`.`id_usuario`
LEFT JOIN
	tipodiscapacidad ON tusuario_discapacidad.id_tipo_discapacidad=tipodiscapacidad.tipodiscapacidad_id
LEFT JOIN
	partesafectadas ON tusuario_discapacidad.id_detalle_tipo_discapacidad=partesafectadas.partesafectadas_id
LEFT JOIN
	nivelavance ON tusuario_discapacidad.nivelavance_id=nivelavance.nivelavance_id
LEFT JOIN
	origendeficiencia ON tusuario_discapacidad.odiscapacidad_id=origendeficiencia.origendeficiencia_id
LEFT JOIN
	tporcentaje ON tusuario_discapacidad.tporcentaje_id=tporcentaje.tporcentaje_id
LEFT JOIN
	`tformacionu` ON `tusuario`.`id_usuario`=`tformacionu`.`id_usuario`
LEFT JOIN
			tfnecesaria ON tformacionu.tfnecesaria_id =tfnecesaria.tfnecesaria_id
LEFT JOIN
			tnivel ON tformacionu.tnivel_id=tnivel.tnivel_id 
LEFT JOIN
			tniveledu ON tformacionu.tniveledu_id=tniveledu.tniveledu_id 

where 
tusuario.tusuario_id='2'and tusuario.estado='$estado' order by apellido_paterno
		 LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
		$num_agrup = mysql_num_rows($sel_agrup);
		echo'<br>';echo'<br>';echo'<br>';
		$sSQL = "SELECT count(*) 
FROM
	tusuario
LEFT JOIN
	tipoidentificacion ON tusuario.tipoidentificacion_id=tipoidentificacion.tipoidentificacion_id
LEFT JOIN
	genero ON tusuario.genero=genero.genero_id
LEFT JOIN
	estadocivil ON tusuario.id_estado_civil=estadocivil.estadocivil_id
LEFT JOIN
	thijos ON tusuario.num_hijos=thijos.hijos_id
LEFT JOIN
	formaconocer ON tusuario.forma_conocer=formaconocer.formaconocer_id
LEFT JOIN
	testadocf ON tusuario.estado=testadocf.estcfcodigo
LEFT JOIN
	experiencia AS t_seguro ON tusuario.seguro=t_seguro.experiencia_id
LEFT JOIN
	tiposeguro ON tusuario.tipo_seguro=tiposeguro.tiposeguro_id
LEFT JOIN
	tparroquia ON tusuario.parcodigo=tparroquia.parcodigo
LEFT JOIN
	`tcanton` ON tparroquia.`cancodigo`=`tcanton`.`cancodigo`
LEFT JOIN
	`tprovincia` ON `tcanton`.`procodigo`=`tprovincia`.`procodigo`		
LEFT JOIN
	tipoparroquia ON tusuario.sector=tipoparroquia.tipoparroquia_id
LEFT JOIN
	experiencia AS t_licencia ON tusuario.licencia=t_licencia.experiencia_id
LEFT JOIN
	tipolicencia ON tusuario.tlicencia=tipolicencia.tipolicencia_id
LEFT JOIN
	experiencia AS t_vehiculo ON tusuario.vehiculo=t_vehiculo.experiencia_id
LEFT JOIN
	experiencia AS t_adaptacion ON tusuario.adaptacion_vehiculo=t_adaptacion.experiencia_id
LEFT JOIN
	experiencia AS t_federacion ON tusuario.federacion=t_federacion.experiencia_id
LEFT JOIN
	asociacion ON tusuario.tfederacion=asociacion.asociacion_id
LEFT JOIN
	etnia ON tusuario.etnia_id=etnia.etnia_id
LEFT JOIN
	`tpuesto` ON `tusuario`.`foto`=`tpuesto`.`id_puesto`


LEFT JOIN
			`tusuario_discapacidad` ON `tusuario`.`id_usuario`=`tusuario_discapacidad`.`id_usuario`
LEFT JOIN
	tipodiscapacidad ON tusuario_discapacidad.id_tipo_discapacidad=tipodiscapacidad.tipodiscapacidad_id
LEFT JOIN
	partesafectadas ON tusuario_discapacidad.id_detalle_tipo_discapacidad=partesafectadas.partesafectadas_id
LEFT JOIN
	nivelavance ON tusuario_discapacidad.nivelavance_id=nivelavance.nivelavance_id
LEFT JOIN
	origendeficiencia ON tusuario_discapacidad.odiscapacidad_id=origendeficiencia.origendeficiencia_id
LEFT JOIN
	tporcentaje ON tusuario_discapacidad.tporcentaje_id=tporcentaje.tporcentaje_id
LEFT JOIN
	`tformacionu` ON `tusuario`.`id_usuario`=`tformacionu`.`id_usuario`
LEFT JOIN
			tfnecesaria ON tformacionu.tfnecesaria_id =tfnecesaria.tfnecesaria_id
LEFT JOIN
			tnivel ON tformacionu.tnivel_id=tnivel.tnivel_id 
LEFT JOIN
			tniveledu ON tformacionu.tniveledu_id=tniveledu.tniveledu_id 

where 
tusuario.tusuario_id='2'and tusuario.estado='$estado'"; //Cuento el total de registros
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
        					echo "<a href=\"bus_monitoreop.php?busqueda=estado&estado=".$estado."
        					
        					&pagina=".$i."\">  <font color=#000080><b>$i</b></font></a>";
						$vehiculo="";
				 }	
?>	
					<table width="500" align="center" class="tabla">
					<tr>
					<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">TIPO IDENTIFICACIÓN</td>
						<td class="tdatos">NOMBRES Y APELLIDOS</td>
						<td class="tdatos">GÉNERO</td>
						<td class="tdatos">ESTADO CIVIL</td>
						<td class="tdatos">FECHA NACIMIENTO</td>
						<td class="tdatos">NÚMERO DE HIJOS</td>
						<td class="tdatos">FORMA DE CONOCER</td>
						<td class="tdatos">ESTADO</td>
						<td class="tdatos">TIENE SEGURO</td>
						<td class="tdatos">TIPO SEGURO</td>	
						<td class="tdatos">FECHA DE INGRESO</td>
						<td class="tdatos">ÉTNIA</td>
						<td class="tdatos">PARROQUIA</td>
						<td class="tdatos">CALLE PRINCIPAL</td>
						<td class="tdatos">NÚMERO</td>	
						<td class="tdatos">TRANSVERSAL</td>
						<td class="tdatos">SECTOR</td>
						<td class="tdatos">PASAJE</td>
						<td class="tdatos">BARRIO</td>
						<td class="tdatos">MANZANA</td>
						<td class="tdatos">SOLAR</td>
						<td class="tdatos">OBSERVACIÓN</td>	
						<td class="tdatos">FIJO</td>
						<td class="tdatos">MÓVIL</td>
						<td class="tdatos">REFERIDO 1</td>
						<td class="tdatos">REFERIDO 2</td>
						<td class="tdatos">EMAIL</td>	
						<td class="tdatos">OBSERVACIÓN TELÉFONO</td>
						<td class="tdatos">TIENE LICENCIA</td>
						<td class="tdatos">TIPO LICENCIA</td>
						<td class="tdatos">VEHÍCULO</td>
						<td class="tdatos">ADAPTACIÓN</td>
						<td class="tdatos">TIPO ADAPTACIÓN</td>	
						<td class="tdatos">FEDERACIÓN</td>
						<td class="tdatos">TIPO FEDERACION</td>
						<td class="tdatos">ASOCIACIÓN</td>
						<td class="tdatos">PROVINCIA</td>
						<td class="tdatos">PROFESIÓN</td>
						
						<td class="tdatos">TIPO DISCAPACIDAD</td>
						<td class="tdatos">PARTES AFECTADAS</td>
						<td class="tdatos">NIVEL AVANCE</td>
						<td class="tdatos">ORIGEN DEFICIENCIA</td>
						<td class="tdatos">PORCENTAJE</td>
						<td class="tdatos">FORMACION </td>
						<td class="tdatos">NIVEL FORMACION </td>
						<td class="tdatos">NIVEL EDUCACION </td>
						<td class="tdatos">EDAD</td>
						
					</tr>
					<?php	
					for($i=0;$i<$num_agrup;$i++)
					{
						$registro_agrup= mysql_fetch_array($sel_agrup);
						if($i%2==0){echo '<tr class="par">';}else{echo '<tr>';}
								echo '<td>'.$registro_agrup['id_usuario'].'</td>';
						echo '<td>'.$registro_agrup['identificacion'].' </td>';
						echo '<td>'.$registro_agrup['apellido_paterno'].' '.$registro_agrup['apellido_materno'].' '.$registro_agrup['primer_nombre'].' '.$registro_agrup['segundo_nombre'].'</td>';
						echo '<td>'.$registro_agrup['genero_nombre'].' </td>';
						echo '<td>'.$registro_agrup['estadocivil_nombre'].'</td>';
						echo '<td>'.$registro_agrup['fecha_nac'].' </td>';
						echo '<td>'.$registro_agrup['hijos_descripcion'].' </td>';
						echo '<td>'.$registro_agrup['formaconocer_nombre'].' </td>';
						echo '<td>'.$registro_agrup['estcfdescripcion'].'</td>';
						echo '<td>'.$registro_agrup['tseguro'].' </td>';
						echo '<td>'.$registro_agrup['tiposeguro_nombre'].'</td>';
						echo '<td>'.$registro_agrup['fecha_ingreso'].' </td>';
						echo '<td>'.$registro_agrup['etnia_nombre'].' </td>';
						echo '<td>'.$registro_agrup['pardescripcion'].' </td>';
						echo '<td>'.$registro_agrup['cprincipal'].'</td>';
						echo '<td>'.$registro_agrup['numero'].' </td>';
						echo '<td>'.$registro_agrup['transversal'].'</td>';
						echo '<td>'.$registro_agrup['tipoparroquia_nombre'].' </td>';
						echo '<td>'.$registro_agrup['pasaje'].' </td>';
						echo '<td>'.$registro_agrup['barrio'].' </td>';
						echo '<td>'.$registro_agrup['manzana'].'</td>';
						echo '<td>'.$registro_agrup['solar'].' </td>';
						echo '<td>'.$registro_agrup['observacion'].'</td>';
						echo '<td>'.$registro_agrup['fijo'].' </td>';
						echo '<td>'.$registro_agrup['movil'].' </td>';
						echo '<td>'.$registro_agrup['referido1'].' </td>';
						echo '<td>'.$registro_agrup['referido2'].'</td>';
						echo '<td>'.$registro_agrup['email'].' </td>';
						echo '<td>'.$registro_agrup['observacion_telefono'].'</td>';
						echo '<td>'.$registro_agrup['licencia'].' </td>';
						echo '<td>'.$registro_agrup['tipolicencia_nombre'].'</td>';
						echo '<td>'.$registro_agrup['vehiculo'].' </td>';
						echo '<td>'.$registro_agrup['adaptacion'].' </td>';
						echo '<td>'.$registro_agrup['tipo_adaptacion'].' </td>';
						echo '<td>'.$registro_agrup['federacion'].'</td>';
						echo '<td>'.$registro_agrup['asociacion_nombre'].' </td>';
						echo '<td>'.$registro_agrup['asociacion'].'</td>';
						echo '<td>'.$registro_agrup['prodescripcion'].'</td>';
						echo '<td>'.$registro_agrup['descripcion'].'</td>';	
						
						echo '<td>'.$registro_agrup['tipodiscapacidad_nombre'].'</td>';
						echo '<td>'.$registro_agrup['partesafectadas_nombre'].'</td>';
						echo '<td>'.$registro_agrup['nivelavance_nombre'].'</td>';
						echo '<td>'.$registro_agrup['origendeficiencia_nombre'].'</td>';
						echo '<td>'.$registro_agrup['tporcentaje_descripcion'].'</td>';
						echo '<td>'.$registro_agrup['formacion_descripcion'].'</td>';
						echo '<td>'.$registro_agrup['tnivel_descripcion'].'</td>';
						echo '<td>'.$registro_agrup['tniveledu_descripcion'].'</td>';
						echo '<td>'.$registro_agrup['edad_actual'].'</td>';
						}
		
	break;
	case'rangofechas':
		$sucursal_id=$_REQUEST["sucursal_id"];
		$estado=$_REQUEST["estado"];
		$ini=$_REQUEST["ini1"];
		$fin=$_REQUEST["ffin"];
	echo '<td><p class="centrado">
	<a target="_blank" href="../pdf/list_usuariop_fechas.php?p3='.$ini.'
	&p4='.$fin.'
	" title="'.$id_excel.'"><img src="../imgs/excel_img.png" alt="'.$id_excel.'" /></a>
	
	</a></p></td>';
	
	$noRegistros = 100; //Registros por página
	$pagina = 1; //Por default, página = 1
	if($_GET["pagina"]) //Si hay página por ?pagina=valor, lo asigna
    $pagina = $_GET["pagina"];
	$agrupamiento = $_POST['agrupamiento'];
	//monto un select para listar los alumnos matriculados en el agrupamiento
		$sel_agrup = mysql_query("SELECT DISTINCT tusuario.*,
tipoidentificacion.tipoidentificacion_nombre,genero.genero_nombre,estadocivil.estadocivil_nombre,thijos.hijos_descripcion,
formaconocer.formaconocer_nombre,testadocf.estcfdescripcion,t_seguro.experiencia_nombre AS tseguro,tiposeguro.tiposeguro_nombre,
tparroquia.pardescripcion,tipoparroquia.tipoparroquia_nombre,t_licencia.experiencia_nombre AS licencia,tipolicencia.tipolicencia_nombre,
t_vehiculo.experiencia_nombre AS vehiculo,t_adaptacion.experiencia_nombre AS adaptacion,t_federacion.experiencia_nombre AS federacion,
asociacion.asociacion_nombre,etnia.etnia_nombre,`tprovincia`.`prodescripcion`,`tpuesto`.`descripcion`,
tipodiscapacidad.tipodiscapacidad_nombre,partesafectadas.partesafectadas_nombre,
nivelavance.nivelavance_nombre,origendeficiencia.origendeficiencia_nombre,tporcentaje.tporcentaje_descripcion,
YEAR(CURDATE())-YEAR(`fecha_nac`)  AS `edad_actual`,tfnecesaria.formacion_descripcion,tnivel.tnivel_descripcion,tniveledu.tniveledu_descripcion
FROM
	tusuario
LEFT JOIN
	tipoidentificacion ON tusuario.tipoidentificacion_id=tipoidentificacion.tipoidentificacion_id
LEFT JOIN
	genero ON tusuario.genero=genero.genero_id
LEFT JOIN
	estadocivil ON tusuario.id_estado_civil=estadocivil.estadocivil_id
LEFT JOIN
	thijos ON tusuario.num_hijos=thijos.hijos_id
LEFT JOIN
	formaconocer ON tusuario.forma_conocer=formaconocer.formaconocer_id
LEFT JOIN
	testadocf ON tusuario.estado=testadocf.estcfcodigo
LEFT JOIN
	experiencia AS t_seguro ON tusuario.seguro=t_seguro.experiencia_id
LEFT JOIN
	tiposeguro ON tusuario.tipo_seguro=tiposeguro.tiposeguro_id
LEFT JOIN
	tparroquia ON tusuario.parcodigo=tparroquia.parcodigo
LEFT JOIN
	`tcanton` ON tparroquia.`cancodigo`=`tcanton`.`cancodigo`
LEFT JOIN
	`tprovincia` ON `tcanton`.`procodigo`=`tprovincia`.`procodigo`		
LEFT JOIN
	tipoparroquia ON tusuario.sector=tipoparroquia.tipoparroquia_id
LEFT JOIN
	experiencia AS t_licencia ON tusuario.licencia=t_licencia.experiencia_id
LEFT JOIN
	tipolicencia ON tusuario.tlicencia=tipolicencia.tipolicencia_id
LEFT JOIN
	experiencia AS t_vehiculo ON tusuario.vehiculo=t_vehiculo.experiencia_id
LEFT JOIN
	experiencia AS t_adaptacion ON tusuario.adaptacion_vehiculo=t_adaptacion.experiencia_id
LEFT JOIN
	experiencia AS t_federacion ON tusuario.federacion=t_federacion.experiencia_id
LEFT JOIN
	asociacion ON tusuario.tfederacion=asociacion.asociacion_id
LEFT JOIN
	etnia ON tusuario.etnia_id=etnia.etnia_id
LEFT JOIN
	`tpuesto` ON `tusuario`.`foto`=`tpuesto`.`id_puesto`


LEFT JOIN
			`tusuario_discapacidad` ON `tusuario`.`id_usuario`=`tusuario_discapacidad`.`id_usuario`
LEFT JOIN
	tipodiscapacidad ON tusuario_discapacidad.id_tipo_discapacidad=tipodiscapacidad.tipodiscapacidad_id
LEFT JOIN
	partesafectadas ON tusuario_discapacidad.id_detalle_tipo_discapacidad=partesafectadas.partesafectadas_id
LEFT JOIN
	nivelavance ON tusuario_discapacidad.nivelavance_id=nivelavance.nivelavance_id
LEFT JOIN
	origendeficiencia ON tusuario_discapacidad.odiscapacidad_id=origendeficiencia.origendeficiencia_id
LEFT JOIN
	tporcentaje ON tusuario_discapacidad.tporcentaje_id=tporcentaje.tporcentaje_id
LEFT JOIN
	`tformacionu` ON `tusuario`.`id_usuario`=`tformacionu`.`id_usuario`
LEFT JOIN
			tfnecesaria ON tformacionu.tfnecesaria_id =tfnecesaria.tfnecesaria_id
LEFT JOIN
			tnivel ON tformacionu.tnivel_id=tnivel.tnivel_id 
LEFT JOIN
			tniveledu ON tformacionu.tniveledu_id=tniveledu.tniveledu_id 
where 
tusuario.tusuario_id='2' and tusuario.fecha_ingreso>='$ini' and tusuario.fecha_ingreso<='$fin ' order by apellido_paterno
		 LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
		$num_agrup = mysql_num_rows($sel_agrup);
		echo'<br>';echo'<br>';echo'<br>';
		$sSQL = "SELECT count(*) 
FROM
	tusuario
LEFT JOIN
	tipoidentificacion ON tusuario.tipoidentificacion_id=tipoidentificacion.tipoidentificacion_id
LEFT JOIN
	genero ON tusuario.genero=genero.genero_id
LEFT JOIN
	estadocivil ON tusuario.id_estado_civil=estadocivil.estadocivil_id
LEFT JOIN
	thijos ON tusuario.num_hijos=thijos.hijos_id
LEFT JOIN
	formaconocer ON tusuario.forma_conocer=formaconocer.formaconocer_id
LEFT JOIN
	testadocf ON tusuario.estado=testadocf.estcfcodigo
LEFT JOIN
	experiencia AS t_seguro ON tusuario.seguro=t_seguro.experiencia_id
LEFT JOIN
	tiposeguro ON tusuario.tipo_seguro=tiposeguro.tiposeguro_id
LEFT JOIN
	tparroquia ON tusuario.parcodigo=tparroquia.parcodigo
LEFT JOIN
	`tcanton` ON tparroquia.`cancodigo`=`tcanton`.`cancodigo`
LEFT JOIN
	`tprovincia` ON `tcanton`.`procodigo`=`tprovincia`.`procodigo`		
LEFT JOIN
	tipoparroquia ON tusuario.sector=tipoparroquia.tipoparroquia_id
LEFT JOIN
	experiencia AS t_licencia ON tusuario.licencia=t_licencia.experiencia_id
LEFT JOIN
	tipolicencia ON tusuario.tlicencia=tipolicencia.tipolicencia_id
LEFT JOIN
	experiencia AS t_vehiculo ON tusuario.vehiculo=t_vehiculo.experiencia_id
LEFT JOIN
	experiencia AS t_adaptacion ON tusuario.adaptacion_vehiculo=t_adaptacion.experiencia_id
LEFT JOIN
	experiencia AS t_federacion ON tusuario.federacion=t_federacion.experiencia_id
LEFT JOIN
	asociacion ON tusuario.tfederacion=asociacion.asociacion_id
LEFT JOIN
	etnia ON tusuario.etnia_id=etnia.etnia_id
LEFT JOIN
	`tpuesto` ON `tusuario`.`foto`=`tpuesto`.`id_puesto`


LEFT JOIN
			`tusuario_discapacidad` ON `tusuario`.`id_usuario`=`tusuario_discapacidad`.`id_usuario`
LEFT JOIN
	tipodiscapacidad ON tusuario_discapacidad.id_tipo_discapacidad=tipodiscapacidad.tipodiscapacidad_id
LEFT JOIN
	partesafectadas ON tusuario_discapacidad.id_detalle_tipo_discapacidad=partesafectadas.partesafectadas_id
LEFT JOIN
	nivelavance ON tusuario_discapacidad.nivelavance_id=nivelavance.nivelavance_id
LEFT JOIN
	origendeficiencia ON tusuario_discapacidad.odiscapacidad_id=origendeficiencia.origendeficiencia_id
LEFT JOIN
	tporcentaje ON tusuario_discapacidad.tporcentaje_id=tporcentaje.tporcentaje_id
LEFT JOIN
	`tformacionu` ON `tusuario`.`id_usuario`=`tformacionu`.`id_usuario`
LEFT JOIN
			tfnecesaria ON tformacionu.tfnecesaria_id =tfnecesaria.tfnecesaria_id
LEFT JOIN
			tnivel ON tformacionu.tnivel_id=tnivel.tnivel_id 
LEFT JOIN
			tniveledu ON tformacionu.tniveledu_id=tniveledu.tniveledu_id 

where 
tusuario.tusuario_id='2' and tusuario.fecha_ingreso>='$ini' and tusuario.fecha_ingreso<='$fin '"; //Cuento el total de registros
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
        					echo "<a href=\"bus_monitoreop.php?busqueda=rangofechas&ini1=".$ini1."
        					&ffin=".$ffin."
        					&pagina=".$i."\">  <font color=#000080><b>$i</b></font></a>";
						$vehiculo="";
				 }	
?>	
					<table width="500" align="center" class="tabla">
					<tr>
				<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">TIPO IDENTIFICACIÓN</td>
						<td class="tdatos">NOMBRES Y APELLIDOS</td>
						<td class="tdatos">GÉNERO</td>
						<td class="tdatos">ESTADO CIVIL</td>
						<td class="tdatos">FECHA NACIMIENTO</td>
						<td class="tdatos">NÚMERO DE HIJOS</td>
						<td class="tdatos">FORMA DE CONOCER</td>
						<td class="tdatos">ESTADO</td>
						<td class="tdatos">TIENE SEGURO</td>
						<td class="tdatos">TIPO SEGURO</td>	
						<td class="tdatos">FECHA DE INGRESO</td>
						<td class="tdatos">ÉTNIA</td>
						<td class="tdatos">PARROQUIA</td>
						<td class="tdatos">CALLE PRINCIPAL</td>
						<td class="tdatos">NÚMERO</td>	
						<td class="tdatos">TRANSVERSAL</td>
						<td class="tdatos">SECTOR</td>
						<td class="tdatos">PASAJE</td>
						<td class="tdatos">BARRIO</td>
						<td class="tdatos">MANZANA</td>
						<td class="tdatos">SOLAR</td>
						<td class="tdatos">OBSERVACIÓN</td>	
						<td class="tdatos">FIJO</td>
						<td class="tdatos">MÓVIL</td>
						<td class="tdatos">REFERIDO 1</td>
						<td class="tdatos">REFERIDO 2</td>
						<td class="tdatos">EMAIL</td>	
						<td class="tdatos">OBSERVACIÓN TELÉFONO</td>
						<td class="tdatos">TIENE LICENCIA</td>
						<td class="tdatos">TIPO LICENCIA</td>
						<td class="tdatos">VEHÍCULO</td>
						<td class="tdatos">ADAPTACIÓN</td>
						<td class="tdatos">TIPO ADAPTACIÓN</td>	
						<td class="tdatos">FEDERACIÓN</td>
						<td class="tdatos">TIPO FEDERACION</td>
						<td class="tdatos">ASOCIACIÓN</td>
						<td class="tdatos">PROVINCIA</td>
						<td class="tdatos">PROFESIÓN</td>
						
						<td class="tdatos">TIPO DISCAPACIDAD</td>
						<td class="tdatos">PARTES AFECTADAS</td>
						<td class="tdatos">NIVEL AVANCE</td>
						<td class="tdatos">ORIGEN DEFICIENCIA</td>
						<td class="tdatos">PORCENTAJE</td>
						<td class="tdatos">FORMACION </td>
						<td class="tdatos">NIVEL FORMACION </td>
						<td class="tdatos">NIVEL EDUCACION </td>
						<td class="tdatos">EDAD</td>
					</tr>
					<?php	
					for($i=0;$i<$num_agrup;$i++)
					{
						$registro_agrup= mysql_fetch_array($sel_agrup);
						if($i%2==0){echo '<tr class="par">';}else{echo '<tr>';}
								echo '<td>'.$registro_agrup['id_usuario'].'</td>';
						echo '<td>'.$registro_agrup['identificacion'].' </td>';
						echo '<td>'.$registro_agrup['apellido_paterno'].' '.$registro_agrup['apellido_materno'].' '.$registro_agrup['primer_nombre'].' '.$registro_agrup['segundo_nombre'].'</td>';
						echo '<td>'.$registro_agrup['genero_nombre'].' </td>';
						echo '<td>'.$registro_agrup['estadocivil_nombre'].'</td>';
						echo '<td>'.$registro_agrup['fecha_nac'].' </td>';
						echo '<td>'.$registro_agrup['hijos_descripcion'].' </td>';
						echo '<td>'.$registro_agrup['formaconocer_nombre'].' </td>';
						echo '<td>'.$registro_agrup['estcfdescripcion'].'</td>';
						echo '<td>'.$registro_agrup['tseguro'].' </td>';
						echo '<td>'.$registro_agrup['tiposeguro_nombre'].'</td>';
						echo '<td>'.$registro_agrup['fecha_ingreso'].' </td>';
						echo '<td>'.$registro_agrup['etnia_nombre'].' </td>';
						echo '<td>'.$registro_agrup['pardescripcion'].' </td>';
						echo '<td>'.$registro_agrup['cprincipal'].'</td>';
						echo '<td>'.$registro_agrup['numero'].' </td>';
						echo '<td>'.$registro_agrup['transversal'].'</td>';
						echo '<td>'.$registro_agrup['tipoparroquia_nombre'].' </td>';
						echo '<td>'.$registro_agrup['pasaje'].' </td>';
						echo '<td>'.$registro_agrup['barrio'].' </td>';
						echo '<td>'.$registro_agrup['manzana'].'</td>';
						echo '<td>'.$registro_agrup['solar'].' </td>';
						echo '<td>'.$registro_agrup['observacion'].'</td>';
						echo '<td>'.$registro_agrup['fijo'].' </td>';
						echo '<td>'.$registro_agrup['movil'].' </td>';
						echo '<td>'.$registro_agrup['referido1'].' </td>';
						echo '<td>'.$registro_agrup['referido2'].'</td>';
						echo '<td>'.$registro_agrup['email'].' </td>';
						echo '<td>'.$registro_agrup['observacion_telefono'].'</td>';
						echo '<td>'.$registro_agrup['licencia'].' </td>';
						echo '<td>'.$registro_agrup['tipolicencia_nombre'].'</td>';
						echo '<td>'.$registro_agrup['vehiculo'].' </td>';
						echo '<td>'.$registro_agrup['adaptacion'].' </td>';
						echo '<td>'.$registro_agrup['tipo_adaptacion'].' </td>';
						echo '<td>'.$registro_agrup['federacion'].'</td>';
						echo '<td>'.$registro_agrup['asociacion_nombre'].' </td>';
						echo '<td>'.$registro_agrup['asociacion'].'</td>';
						echo '<td>'.$registro_agrup['prodescripcion'].'</td>';
						echo '<td>'.$registro_agrup['descripcion'].'</td>';	
						
						echo '<td>'.$registro_agrup['tipodiscapacidad_nombre'].'</td>';
						echo '<td>'.$registro_agrup['partesafectadas_nombre'].'</td>';
						echo '<td>'.$registro_agrup['nivelavance_nombre'].'</td>';
						echo '<td>'.$registro_agrup['origendeficiencia_nombre'].'</td>';
						echo '<td>'.$registro_agrup['tporcentaje_descripcion'].'</td>';
						echo '<td>'.$registro_agrup['formacion_descripcion'].'</td>';
						echo '<td>'.$registro_agrup['tnivel_descripcion'].'</td>';
						echo '<td>'.$registro_agrup['tniveledu_descripcion'].'</td>';
						echo '<td>'.$registro_agrup['edad_actual'].'</td>';				
						}
		
	break;
	case'tipodiscapacidad':
		$tipodiscapacidad_id=$_REQUEST["tipodiscapacidad"];
		$estado=$_REQUEST["estado"];
		$ini=$_REQUEST["ini1"];
		$fin=$_REQUEST["ffin"];
	echo '<td><p class="centrado">
	<a target="_blank" href="../pdf/list_usuariop_tdiscapacidad.php?p1='.$tipodiscapacidad_id.'
	" title="'.$id_excel.'"><img src="../imgs/excel_img.png" alt="'.$id_excel.'" /></a>
	
	</a></p></td>';
	
	$noRegistros = 100; //Registros por página
	$pagina = 1; //Por default, página = 1
	if($_GET["pagina"]) //Si hay página por ?pagina=valor, lo asigna
    $pagina = $_GET["pagina"];
	$agrupamiento = $_POST['agrupamiento'];
	//monto un select para listar los alumnos matriculados en el agrupamiento
		$sel_agrup = mysql_query("SELECT DISTINCT tusuario.*,
tipoidentificacion.tipoidentificacion_nombre,genero.genero_nombre,estadocivil.estadocivil_nombre,thijos.hijos_descripcion,
formaconocer.formaconocer_nombre,testadocf.estcfdescripcion,t_seguro.experiencia_nombre AS tseguro,tiposeguro.tiposeguro_nombre,
tparroquia.pardescripcion,tipoparroquia.tipoparroquia_nombre,t_licencia.experiencia_nombre AS licencia,tipolicencia.tipolicencia_nombre,
t_vehiculo.experiencia_nombre AS vehiculo,t_adaptacion.experiencia_nombre AS adaptacion,t_federacion.experiencia_nombre AS federacion,
asociacion.asociacion_nombre,etnia.etnia_nombre,`tprovincia`.`prodescripcion`,`tpuesto`.`descripcion`,
tipodiscapacidad.tipodiscapacidad_nombre,partesafectadas.partesafectadas_nombre,
nivelavance.nivelavance_nombre,origendeficiencia.origendeficiencia_nombre,tporcentaje.tporcentaje_descripcion,
YEAR(CURDATE())-YEAR(`fecha_nac`)  AS `edad_actual`,tfnecesaria.formacion_descripcion,tnivel.tnivel_descripcion,tniveledu.tniveledu_descripcion
FROM
	tusuario
LEFT JOIN
	tipoidentificacion ON tusuario.tipoidentificacion_id=tipoidentificacion.tipoidentificacion_id
LEFT JOIN
	genero ON tusuario.genero=genero.genero_id
LEFT JOIN
	estadocivil ON tusuario.id_estado_civil=estadocivil.estadocivil_id
LEFT JOIN
	thijos ON tusuario.num_hijos=thijos.hijos_id
LEFT JOIN
	formaconocer ON tusuario.forma_conocer=formaconocer.formaconocer_id
LEFT JOIN
	testadocf ON tusuario.estado=testadocf.estcfcodigo
LEFT JOIN
	experiencia AS t_seguro ON tusuario.seguro=t_seguro.experiencia_id
LEFT JOIN
	tiposeguro ON tusuario.tipo_seguro=tiposeguro.tiposeguro_id
LEFT JOIN
	tparroquia ON tusuario.parcodigo=tparroquia.parcodigo
LEFT JOIN
	`tcanton` ON tparroquia.`cancodigo`=`tcanton`.`cancodigo`
LEFT JOIN
	`tprovincia` ON `tcanton`.`procodigo`=`tprovincia`.`procodigo`		
LEFT JOIN
	tipoparroquia ON tusuario.sector=tipoparroquia.tipoparroquia_id
LEFT JOIN
	experiencia AS t_licencia ON tusuario.licencia=t_licencia.experiencia_id
LEFT JOIN
	tipolicencia ON tusuario.tlicencia=tipolicencia.tipolicencia_id
LEFT JOIN
	experiencia AS t_vehiculo ON tusuario.vehiculo=t_vehiculo.experiencia_id
LEFT JOIN
	experiencia AS t_adaptacion ON tusuario.adaptacion_vehiculo=t_adaptacion.experiencia_id
LEFT JOIN
	experiencia AS t_federacion ON tusuario.federacion=t_federacion.experiencia_id
LEFT JOIN
	asociacion ON tusuario.tfederacion=asociacion.asociacion_id
LEFT JOIN
	etnia ON tusuario.etnia_id=etnia.etnia_id
LEFT JOIN
	`tpuesto` ON `tusuario`.`foto`=`tpuesto`.`id_puesto`


LEFT JOIN
			`tusuario_discapacidad` ON `tusuario`.`id_usuario`=`tusuario_discapacidad`.`id_usuario`
LEFT JOIN
	tipodiscapacidad ON tusuario_discapacidad.id_tipo_discapacidad=tipodiscapacidad.tipodiscapacidad_id
LEFT JOIN
	partesafectadas ON tusuario_discapacidad.id_detalle_tipo_discapacidad=partesafectadas.partesafectadas_id
LEFT JOIN
	nivelavance ON tusuario_discapacidad.nivelavance_id=nivelavance.nivelavance_id
LEFT JOIN
	origendeficiencia ON tusuario_discapacidad.odiscapacidad_id=origendeficiencia.origendeficiencia_id
LEFT JOIN
	tporcentaje ON tusuario_discapacidad.tporcentaje_id=tporcentaje.tporcentaje_id
LEFT JOIN
	`tformacionu` ON `tusuario`.`id_usuario`=`tformacionu`.`id_usuario`
LEFT JOIN
			tfnecesaria ON tformacionu.tfnecesaria_id =tfnecesaria.tfnecesaria_id
LEFT JOIN
			tnivel ON tformacionu.tnivel_id=tnivel.tnivel_id 
LEFT JOIN
			tniveledu ON tformacionu.tniveledu_id=tniveledu.tniveledu_id 
WHERE
tusuario.tusuario_id='2' AND `tusuario_discapacidad`.`id_tipo_discapacidad`='$tipodiscapacidad_id' order by apellido_paterno
		 LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
		$num_agrup = mysql_num_rows($sel_agrup);
		echo'<br>';echo'<br>';echo'<br>';
		$sSQL = "SELECT count(*) 
FROM
	tusuario
LEFT JOIN
	tipoidentificacion ON tusuario.tipoidentificacion_id=tipoidentificacion.tipoidentificacion_id
LEFT JOIN
	genero ON tusuario.genero=genero.genero_id
LEFT JOIN
	estadocivil ON tusuario.id_estado_civil=estadocivil.estadocivil_id
LEFT JOIN
	thijos ON tusuario.num_hijos=thijos.hijos_id
LEFT JOIN
	formaconocer ON tusuario.forma_conocer=formaconocer.formaconocer_id
LEFT JOIN
	testadocf ON tusuario.estado=testadocf.estcfcodigo
LEFT JOIN
	experiencia AS t_seguro ON tusuario.seguro=t_seguro.experiencia_id
LEFT JOIN
	tiposeguro ON tusuario.tipo_seguro=tiposeguro.tiposeguro_id
LEFT JOIN
	tparroquia ON tusuario.parcodigo=tparroquia.parcodigo
LEFT JOIN
	`tcanton` ON tparroquia.`cancodigo`=`tcanton`.`cancodigo`
LEFT JOIN
	`tprovincia` ON `tcanton`.`procodigo`=`tprovincia`.`procodigo`		
LEFT JOIN
	tipoparroquia ON tusuario.sector=tipoparroquia.tipoparroquia_id
LEFT JOIN
	experiencia AS t_licencia ON tusuario.licencia=t_licencia.experiencia_id
LEFT JOIN
	tipolicencia ON tusuario.tlicencia=tipolicencia.tipolicencia_id
LEFT JOIN
	experiencia AS t_vehiculo ON tusuario.vehiculo=t_vehiculo.experiencia_id
LEFT JOIN
	experiencia AS t_adaptacion ON tusuario.adaptacion_vehiculo=t_adaptacion.experiencia_id
LEFT JOIN
	experiencia AS t_federacion ON tusuario.federacion=t_federacion.experiencia_id
LEFT JOIN
	asociacion ON tusuario.tfederacion=asociacion.asociacion_id
LEFT JOIN
	etnia ON tusuario.etnia_id=etnia.etnia_id
LEFT JOIN
	`tpuesto` ON `tusuario`.`foto`=`tpuesto`.`id_puesto`


LEFT JOIN
			`tusuario_discapacidad` ON `tusuario`.`id_usuario`=`tusuario_discapacidad`.`id_usuario`
LEFT JOIN
	tipodiscapacidad ON tusuario_discapacidad.id_tipo_discapacidad=tipodiscapacidad.tipodiscapacidad_id
LEFT JOIN
	partesafectadas ON tusuario_discapacidad.id_detalle_tipo_discapacidad=partesafectadas.partesafectadas_id
LEFT JOIN
	nivelavance ON tusuario_discapacidad.nivelavance_id=nivelavance.nivelavance_id
LEFT JOIN
	origendeficiencia ON tusuario_discapacidad.odiscapacidad_id=origendeficiencia.origendeficiencia_id
LEFT JOIN
	tporcentaje ON tusuario_discapacidad.tporcentaje_id=tporcentaje.tporcentaje_id
LEFT JOIN
	`tformacionu` ON `tusuario`.`id_usuario`=`tformacionu`.`id_usuario`
LEFT JOIN
			tfnecesaria ON tformacionu.tfnecesaria_id =tfnecesaria.tfnecesaria_id
LEFT JOIN
			tnivel ON tformacionu.tnivel_id=tnivel.tnivel_id 
LEFT JOIN
			tniveledu ON tformacionu.tniveledu_id=tniveledu.tniveledu_id
WHERE
tusuario.tusuario_id='2' AND `tusuario_discapacidad`.`id_tipo_discapacidad`='$tipodiscapacidad_id'
"; //Cuento el total de registros
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
        					echo "<a href=\"bus_monitoreop.php?busqueda=tipodiscapacidad&tipodiscapacidad=".$tipodiscapacidad_id."
        					&pagina=".$i."\">  <font color=#000080><b>$i</b></font></a>";
						$vehiculo="";
				 }	
?>	
					<table width="500" align="center" class="tabla">
					<tr>
						<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">TIPO IDENTIFICACIÓN</td>
						<td class="tdatos">NOMBRES Y APELLIDOS</td>
						<td class="tdatos">GÉNERO</td>
						<td class="tdatos">ESTADO CIVIL</td>
						<td class="tdatos">FECHA NACIMIENTO</td>
						<td class="tdatos">NÚMERO DE HIJOS</td>
						<td class="tdatos">FORMA DE CONOCER</td>
						<td class="tdatos">ESTADO</td>
						<td class="tdatos">TIENE SEGURO</td>
						<td class="tdatos">TIPO SEGURO</td>	
						<td class="tdatos">FECHA DE INGRESO</td>
						<td class="tdatos">ÉTNIA</td>
						<td class="tdatos">PARROQUIA</td>
						<td class="tdatos">CALLE PRINCIPAL</td>
						<td class="tdatos">NÚMERO</td>	
						<td class="tdatos">TRANSVERSAL</td>
						<td class="tdatos">SECTOR</td>
						<td class="tdatos">PASAJE</td>
						<td class="tdatos">BARRIO</td>
						<td class="tdatos">MANZANA</td>
						<td class="tdatos">SOLAR</td>
						<td class="tdatos">OBSERVACIÓN</td>	
						<td class="tdatos">FIJO</td>
						<td class="tdatos">MÓVIL</td>
						<td class="tdatos">REFERIDO 1</td>
						<td class="tdatos">REFERIDO 2</td>
						<td class="tdatos">EMAIL</td>	
						<td class="tdatos">OBSERVACIÓN TELÉFONO</td>
						<td class="tdatos">TIENE LICENCIA</td>
						<td class="tdatos">TIPO LICENCIA</td>
						<td class="tdatos">VEHÍCULO</td>
						<td class="tdatos">ADAPTACIÓN</td>
						<td class="tdatos">TIPO ADAPTACIÓN</td>	
						<td class="tdatos">FEDERACIÓN</td>
						<td class="tdatos">TIPO FEDERACION</td>
						<td class="tdatos">ASOCIACIÓN</td>
						<td class="tdatos">PROVINCIA</td>
						<td class="tdatos">PROFESIÓN</td>
						
						<td class="tdatos">TIPO DISCAPACIDAD</td>
						<td class="tdatos">PARTES AFECTADAS</td>
						<td class="tdatos">NIVEL AVANCE</td>
						<td class="tdatos">ORIGEN DEFICIENCIA</td>
						<td class="tdatos">PORCENTAJE</td>
						<td class="tdatos">FORMACION </td>
						<td class="tdatos">NIVEL FORMACION </td>
						<td class="tdatos">NIVEL EDUCACION </td>
						<td class="tdatos">EDAD</td>
					</tr>
					<?php	
					for($i=0;$i<$num_agrup;$i++)
					{
						$registro_agrup= mysql_fetch_array($sel_agrup);
						if($i%2==0){echo '<tr class="par">';}else{echo '<tr>';}
												echo '<td>'.$registro_agrup['id_usuario'].'</td>';
						echo '<td>'.$registro_agrup['identificacion'].' </td>';
						echo '<td>'.$registro_agrup['apellido_paterno'].' '.$registro_agrup['apellido_materno'].' '.$registro_agrup['primer_nombre'].' '.$registro_agrup['segundo_nombre'].'</td>';
						echo '<td>'.$registro_agrup['genero_nombre'].' </td>';
						echo '<td>'.$registro_agrup['estadocivil_nombre'].'</td>';
						echo '<td>'.$registro_agrup['fecha_nac'].' </td>';
						echo '<td>'.$registro_agrup['hijos_descripcion'].' </td>';
						echo '<td>'.$registro_agrup['formaconocer_nombre'].' </td>';
						echo '<td>'.$registro_agrup['estcfdescripcion'].'</td>';
						echo '<td>'.$registro_agrup['tseguro'].' </td>';
						echo '<td>'.$registro_agrup['tiposeguro_nombre'].'</td>';
						echo '<td>'.$registro_agrup['fecha_ingreso'].' </td>';
						echo '<td>'.$registro_agrup['etnia_nombre'].' </td>';
						echo '<td>'.$registro_agrup['pardescripcion'].' </td>';
						echo '<td>'.$registro_agrup['cprincipal'].'</td>';
						echo '<td>'.$registro_agrup['numero'].' </td>';
						echo '<td>'.$registro_agrup['transversal'].'</td>';
						echo '<td>'.$registro_agrup['tipoparroquia_nombre'].' </td>';
						echo '<td>'.$registro_agrup['pasaje'].' </td>';
						echo '<td>'.$registro_agrup['barrio'].' </td>';
						echo '<td>'.$registro_agrup['manzana'].'</td>';
						echo '<td>'.$registro_agrup['solar'].' </td>';
						echo '<td>'.$registro_agrup['observacion'].'</td>';
						echo '<td>'.$registro_agrup['fijo'].' </td>';
						echo '<td>'.$registro_agrup['movil'].' </td>';
						echo '<td>'.$registro_agrup['referido1'].' </td>';
						echo '<td>'.$registro_agrup['referido2'].'</td>';
						echo '<td>'.$registro_agrup['email'].' </td>';
						echo '<td>'.$registro_agrup['observacion_telefono'].'</td>';
						echo '<td>'.$registro_agrup['licencia'].' </td>';
						echo '<td>'.$registro_agrup['tipolicencia_nombre'].'</td>';
						echo '<td>'.$registro_agrup['vehiculo'].' </td>';
						echo '<td>'.$registro_agrup['adaptacion'].' </td>';
						echo '<td>'.$registro_agrup['tipo_adaptacion'].' </td>';
						echo '<td>'.$registro_agrup['federacion'].'</td>';
						echo '<td>'.$registro_agrup['asociacion_nombre'].' </td>';
						echo '<td>'.$registro_agrup['asociacion'].'</td>';
						echo '<td>'.$registro_agrup['prodescripcion'].'</td>';
						echo '<td>'.$registro_agrup['descripcion'].'</td>';	
						
						echo '<td>'.$registro_agrup['tipodiscapacidad_nombre'].'</td>';
						echo '<td>'.$registro_agrup['partesafectadas_nombre'].'</td>';
						echo '<td>'.$registro_agrup['nivelavance_nombre'].'</td>';
						echo '<td>'.$registro_agrup['origendeficiencia_nombre'].'</td>';
						echo '<td>'.$registro_agrup['tporcentaje_descripcion'].'</td>';
						echo '<td>'.$registro_agrup['formacion_descripcion'].'</td>';
						echo '<td>'.$registro_agrup['tnivel_descripcion'].'</td>';
						echo '<td>'.$registro_agrup['tniveledu_descripcion'].'</td>';
						echo '<td>'.$registro_agrup['edad_actual'].'</td>';		
						}
		
	break;		
	case'tfnecesaria':
		$tfnecesaria_id=$_REQUEST["tfnecesaria"];
		$estado=$_REQUEST["estado"];
		$ini=$_REQUEST["ini1"];
		$fin=$_REQUEST["ffin"];
	echo '<td><p class="centrado">
	<a target="_blank" href="../pdf/list_usuariop_tformacion.php?p1='.$tfnecesaria_id.'
	" title="'.$id_excel.'"><img src="../imgs/excel_img.png" alt="'.$id_excel.'" /></a>
	
	</a></p></td>';
	
	$noRegistros = 100; //Registros por página
	$pagina = 1; //Por default, página = 1
	if($_GET["pagina"]) //Si hay página por ?pagina=valor, lo asigna
    $pagina = $_GET["pagina"];
	$agrupamiento = $_POST['agrupamiento'];
	//monto un select para listar los alumnos matriculados en el agrupamiento
		$sel_agrup = mysql_query("SELECT DISTINCT tusuario.*,
tipoidentificacion.tipoidentificacion_nombre,genero.genero_nombre,estadocivil.estadocivil_nombre,thijos.hijos_descripcion,
formaconocer.formaconocer_nombre,testadocf.estcfdescripcion,t_seguro.experiencia_nombre AS tseguro,tiposeguro.tiposeguro_nombre,
tparroquia.pardescripcion,tipoparroquia.tipoparroquia_nombre,t_licencia.experiencia_nombre AS licencia,tipolicencia.tipolicencia_nombre,
t_vehiculo.experiencia_nombre AS vehiculo,t_adaptacion.experiencia_nombre AS adaptacion,t_federacion.experiencia_nombre AS federacion,
asociacion.asociacion_nombre,etnia.etnia_nombre,`tprovincia`.`prodescripcion`,`tpuesto`.`descripcion`,
tipodiscapacidad.tipodiscapacidad_nombre,partesafectadas.partesafectadas_nombre,
nivelavance.nivelavance_nombre,origendeficiencia.origendeficiencia_nombre,tporcentaje.tporcentaje_descripcion,
YEAR(CURDATE())-YEAR(`fecha_nac`)  AS `edad_actual`,tfnecesaria.formacion_descripcion,tnivel.tnivel_descripcion,tniveledu.tniveledu_descripcion
FROM
	tusuario
LEFT JOIN
	tipoidentificacion ON tusuario.tipoidentificacion_id=tipoidentificacion.tipoidentificacion_id
LEFT JOIN
	genero ON tusuario.genero=genero.genero_id
LEFT JOIN
	estadocivil ON tusuario.id_estado_civil=estadocivil.estadocivil_id
LEFT JOIN
	thijos ON tusuario.num_hijos=thijos.hijos_id
LEFT JOIN
	formaconocer ON tusuario.forma_conocer=formaconocer.formaconocer_id
LEFT JOIN
	testadocf ON tusuario.estado=testadocf.estcfcodigo
LEFT JOIN
	experiencia AS t_seguro ON tusuario.seguro=t_seguro.experiencia_id
LEFT JOIN
	tiposeguro ON tusuario.tipo_seguro=tiposeguro.tiposeguro_id
LEFT JOIN
	tparroquia ON tusuario.parcodigo=tparroquia.parcodigo
LEFT JOIN
	`tcanton` ON tparroquia.`cancodigo`=`tcanton`.`cancodigo`
LEFT JOIN
	`tprovincia` ON `tcanton`.`procodigo`=`tprovincia`.`procodigo`		
LEFT JOIN
	tipoparroquia ON tusuario.sector=tipoparroquia.tipoparroquia_id
LEFT JOIN
	experiencia AS t_licencia ON tusuario.licencia=t_licencia.experiencia_id
LEFT JOIN
	tipolicencia ON tusuario.tlicencia=tipolicencia.tipolicencia_id
LEFT JOIN
	experiencia AS t_vehiculo ON tusuario.vehiculo=t_vehiculo.experiencia_id
LEFT JOIN
	experiencia AS t_adaptacion ON tusuario.adaptacion_vehiculo=t_adaptacion.experiencia_id
LEFT JOIN
	experiencia AS t_federacion ON tusuario.federacion=t_federacion.experiencia_id
LEFT JOIN
	asociacion ON tusuario.tfederacion=asociacion.asociacion_id
LEFT JOIN
	etnia ON tusuario.etnia_id=etnia.etnia_id
LEFT JOIN
	`tpuesto` ON `tusuario`.`foto`=`tpuesto`.`id_puesto`
LEFT JOIN
			`tusuario_discapacidad` ON `tusuario`.`id_usuario`=`tusuario_discapacidad`.`id_usuario`
LEFT JOIN
	tipodiscapacidad ON tusuario_discapacidad.id_tipo_discapacidad=tipodiscapacidad.tipodiscapacidad_id
LEFT JOIN
	partesafectadas ON tusuario_discapacidad.id_detalle_tipo_discapacidad=partesafectadas.partesafectadas_id
LEFT JOIN
	nivelavance ON tusuario_discapacidad.nivelavance_id=nivelavance.nivelavance_id
LEFT JOIN
	origendeficiencia ON tusuario_discapacidad.odiscapacidad_id=origendeficiencia.origendeficiencia_id
LEFT JOIN
	tporcentaje ON tusuario_discapacidad.tporcentaje_id=tporcentaje.tporcentaje_id
LEFT JOIN
	`tformacionu` ON `tusuario`.`id_usuario`=`tformacionu`.`id_usuario`
LEFT JOIN
			tfnecesaria ON tformacionu.tfnecesaria_id =tfnecesaria.tfnecesaria_id
LEFT JOIN
			tnivel ON tformacionu.tnivel_id=tnivel.tnivel_id 
LEFT JOIN
			tniveledu ON tformacionu.tniveledu_id=tniveledu.tniveledu_id 		
WHERE
tusuario.tusuario_id='2' AND `tformacionu`.`tfnecesaria_id`='$tfnecesaria_id' order by apellido_paterno
		 LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
		$num_agrup = mysql_num_rows($sel_agrup);
		echo'<br>';echo'<br>';echo'<br>';
		$sSQL = "SELECT count(*) 
FROM
	tusuario
LEFT JOIN
	tipoidentificacion ON tusuario.tipoidentificacion_id=tipoidentificacion.tipoidentificacion_id
LEFT JOIN
	genero ON tusuario.genero=genero.genero_id
LEFT JOIN
	estadocivil ON tusuario.id_estado_civil=estadocivil.estadocivil_id
LEFT JOIN
	thijos ON tusuario.num_hijos=thijos.hijos_id
LEFT JOIN
	formaconocer ON tusuario.forma_conocer=formaconocer.formaconocer_id
LEFT JOIN
	testadocf ON tusuario.estado=testadocf.estcfcodigo
LEFT JOIN
	experiencia AS t_seguro ON tusuario.seguro=t_seguro.experiencia_id
LEFT JOIN
	tiposeguro ON tusuario.tipo_seguro=tiposeguro.tiposeguro_id
LEFT JOIN
	tparroquia ON tusuario.parcodigo=tparroquia.parcodigo
LEFT JOIN
	`tcanton` ON tparroquia.`cancodigo`=`tcanton`.`cancodigo`
LEFT JOIN
	`tprovincia` ON `tcanton`.`procodigo`=`tprovincia`.`procodigo`		
LEFT JOIN
	tipoparroquia ON tusuario.sector=tipoparroquia.tipoparroquia_id
LEFT JOIN
	experiencia AS t_licencia ON tusuario.licencia=t_licencia.experiencia_id
LEFT JOIN
	tipolicencia ON tusuario.tlicencia=tipolicencia.tipolicencia_id
LEFT JOIN
	experiencia AS t_vehiculo ON tusuario.vehiculo=t_vehiculo.experiencia_id
LEFT JOIN
	experiencia AS t_adaptacion ON tusuario.adaptacion_vehiculo=t_adaptacion.experiencia_id
LEFT JOIN
	experiencia AS t_federacion ON tusuario.federacion=t_federacion.experiencia_id
LEFT JOIN
	asociacion ON tusuario.tfederacion=asociacion.asociacion_id
LEFT JOIN
	etnia ON tusuario.etnia_id=etnia.etnia_id
LEFT JOIN
	`tpuesto` ON `tusuario`.`foto`=`tpuesto`.`id_puesto`


LEFT JOIN
			`tusuario_discapacidad` ON `tusuario`.`id_usuario`=`tusuario_discapacidad`.`id_usuario`
LEFT JOIN
	tipodiscapacidad ON tusuario_discapacidad.id_tipo_discapacidad=tipodiscapacidad.tipodiscapacidad_id
LEFT JOIN
	partesafectadas ON tusuario_discapacidad.id_detalle_tipo_discapacidad=partesafectadas.partesafectadas_id
LEFT JOIN
	nivelavance ON tusuario_discapacidad.nivelavance_id=nivelavance.nivelavance_id
LEFT JOIN
	origendeficiencia ON tusuario_discapacidad.odiscapacidad_id=origendeficiencia.origendeficiencia_id
LEFT JOIN
	tporcentaje ON tusuario_discapacidad.tporcentaje_id=tporcentaje.tporcentaje_id
LEFT JOIN
	`tformacionu` ON `tusuario`.`id_usuario`=`tformacionu`.`id_usuario`
LEFT JOIN
			tfnecesaria ON tformacionu.tfnecesaria_id =tfnecesaria.tfnecesaria_id
LEFT JOIN
			tnivel ON tformacionu.tnivel_id=tnivel.tnivel_id 
LEFT JOIN
			tniveledu ON tformacionu.tniveledu_id=tniveledu.tniveledu_id 		
				
WHERE
tusuario.tusuario_id='2' AND `tformacionu`.`tfnecesaria_id`='$tfnecesaria_id'"; //Cuento el total de registros
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
        					echo "<a href=\"bus_monitoreop.php?busqueda=tfnecesaria&tfnecesaria=".$tfnecesaria_id."
        					&pagina=".$i."\">  <font color=#000080><b>$i</b></font></a>";
						$vehiculo="";
				 }	
?>	
					<table width="500" align="center" class="tabla">
					<tr>
						<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">TIPO IDENTIFICACIÓN</td>
						<td class="tdatos">NOMBRES Y APELLIDOS</td>
						<td class="tdatos">GÉNERO</td>
						<td class="tdatos">ESTADO CIVIL</td>
						<td class="tdatos">FECHA NACIMIENTO</td>
						<td class="tdatos">NÚMERO DE HIJOS</td>
						<td class="tdatos">FORMA DE CONOCER</td>
						<td class="tdatos">ESTADO</td>
						<td class="tdatos">TIENE SEGURO</td>
						<td class="tdatos">TIPO SEGURO</td>	
						<td class="tdatos">FECHA DE INGRESO</td>
						<td class="tdatos">ÉTNIA</td>
						<td class="tdatos">PARROQUIA</td>
						<td class="tdatos">CALLE PRINCIPAL</td>
						<td class="tdatos">NÚMERO</td>	
						<td class="tdatos">TRANSVERSAL</td>
						<td class="tdatos">SECTOR</td>
						<td class="tdatos">PASAJE</td>
						<td class="tdatos">BARRIO</td>
						<td class="tdatos">MANZANA</td>
						<td class="tdatos">SOLAR</td>
						<td class="tdatos">OBSERVACIÓN</td>	
						<td class="tdatos">FIJO</td>
						<td class="tdatos">MÓVIL</td>
						<td class="tdatos">REFERIDO 1</td>
						<td class="tdatos">REFERIDO 2</td>
						<td class="tdatos">EMAIL</td>	
						<td class="tdatos">OBSERVACIÓN TELÉFONO</td>
						<td class="tdatos">TIENE LICENCIA</td>
						<td class="tdatos">TIPO LICENCIA</td>
						<td class="tdatos">VEHÍCULO</td>
						<td class="tdatos">ADAPTACIÓN</td>
						<td class="tdatos">TIPO ADAPTACIÓN</td>	
						<td class="tdatos">FEDERACIÓN</td>
						<td class="tdatos">TIPO FEDERACION</td>
						<td class="tdatos">ASOCIACIÓN</td>
						<td class="tdatos">PROVINCIA</td>
						<td class="tdatos">PROFESIÓN</td>
						
						<td class="tdatos">TIPO DISCAPACIDAD</td>
						<td class="tdatos">PARTES AFECTADAS</td>
						<td class="tdatos">NIVEL AVANCE</td>
						<td class="tdatos">ORIGEN DEFICIENCIA</td>
						<td class="tdatos">PORCENTAJE</td>
						<td class="tdatos">FORMACION </td>
						<td class="tdatos">NIVEL FORMACION </td>
						<td class="tdatos">NIVEL EDUCACION </td>
						<td class="tdatos">EDAD</td>
					</tr>
					<?php	
					for($i=0;$i<$num_agrup;$i++)
					{
						$registro_agrup= mysql_fetch_array($sel_agrup);
						if($i%2==0){echo '<tr class="par">';}else{echo '<tr>';}
									echo '<td>'.$registro_agrup['id_usuario'].'</td>';
						echo '<td>'.$registro_agrup['identificacion'].' </td>';
						echo '<td>'.$registro_agrup['apellido_paterno'].' '.$registro_agrup['apellido_materno'].' '.$registro_agrup['primer_nombre'].' '.$registro_agrup['segundo_nombre'].'</td>';
						echo '<td>'.$registro_agrup['genero_nombre'].' </td>';
						echo '<td>'.$registro_agrup['estadocivil_nombre'].'</td>';
						echo '<td>'.$registro_agrup['fecha_nac'].' </td>';
						echo '<td>'.$registro_agrup['hijos_descripcion'].' </td>';
						echo '<td>'.$registro_agrup['formaconocer_nombre'].' </td>';
						echo '<td>'.$registro_agrup['estcfdescripcion'].'</td>';
						echo '<td>'.$registro_agrup['tseguro'].' </td>';
						echo '<td>'.$registro_agrup['tiposeguro_nombre'].'</td>';
						echo '<td>'.$registro_agrup['fecha_ingreso'].' </td>';
						echo '<td>'.$registro_agrup['etnia_nombre'].' </td>';
						echo '<td>'.$registro_agrup['pardescripcion'].' </td>';
						echo '<td>'.$registro_agrup['cprincipal'].'</td>';
						echo '<td>'.$registro_agrup['numero'].' </td>';
						echo '<td>'.$registro_agrup['transversal'].'</td>';
						echo '<td>'.$registro_agrup['tipoparroquia_nombre'].' </td>';
						echo '<td>'.$registro_agrup['pasaje'].' </td>';
						echo '<td>'.$registro_agrup['barrio'].' </td>';
						echo '<td>'.$registro_agrup['manzana'].'</td>';
						echo '<td>'.$registro_agrup['solar'].' </td>';
						echo '<td>'.$registro_agrup['observacion'].'</td>';
						echo '<td>'.$registro_agrup['fijo'].' </td>';
						echo '<td>'.$registro_agrup['movil'].' </td>';
						echo '<td>'.$registro_agrup['referido1'].' </td>';
						echo '<td>'.$registro_agrup['referido2'].'</td>';
						echo '<td>'.$registro_agrup['email'].' </td>';
						echo '<td>'.$registro_agrup['observacion_telefono'].'</td>';
						echo '<td>'.$registro_agrup['licencia'].' </td>';
						echo '<td>'.$registro_agrup['tipolicencia_nombre'].'</td>';
						echo '<td>'.$registro_agrup['vehiculo'].' </td>';
						echo '<td>'.$registro_agrup['adaptacion'].' </td>';
						echo '<td>'.$registro_agrup['tipo_adaptacion'].' </td>';
						echo '<td>'.$registro_agrup['federacion'].'</td>';
						echo '<td>'.$registro_agrup['asociacion_nombre'].' </td>';
						echo '<td>'.$registro_agrup['asociacion'].'</td>';
						echo '<td>'.$registro_agrup['prodescripcion'].'</td>';
						echo '<td>'.$registro_agrup['descripcion'].'</td>';	
						
						echo '<td>'.$registro_agrup['tipodiscapacidad_nombre'].'</td>';
						echo '<td>'.$registro_agrup['partesafectadas_nombre'].'</td>';
						echo '<td>'.$registro_agrup['nivelavance_nombre'].'</td>';
						echo '<td>'.$registro_agrup['origendeficiencia_nombre'].'</td>';
						echo '<td>'.$registro_agrup['tporcentaje_descripcion'].'</td>';
						echo '<td>'.$registro_agrup['formacion_descripcion'].'</td>';
						echo '<td>'.$registro_agrup['tnivel_descripcion'].'</td>';
						echo '<td>'.$registro_agrup['tniveledu_descripcion'].'</td>';
						echo '<td>'.$registro_agrup['edad_actual'].'</td>';		
						}
		
	break;		
}
}
else 
{
	echo '<td><p class="centrado">
	<a target="_blank" href="../pdf/list_usuariop.php" title="'.$id_excel.'"><img src="../imgs/excel_img.png" alt="'.$id_excel.'" /></a>
	</a></p></td>';
	$expedienteced=$_REQUEST["brigada"];
	$noRegistros = 200; //Registros por página
	$pagina = 1; //Por default, página = 1
	if($_GET["pagina"]) //Si hay página por ?pagina=valor, lo asigna
    $pagina = $_GET["pagina"];
	$agrupamiento = $_POST['agrupamiento'];
	//monto un select para listar los alumnos matriculados en el agrupamiento
		$sel_agrup = mysql_query("SELECT
tusuario.*,
tipoidentificacion.tipoidentificacion_nombre,genero.genero_nombre,estadocivil.estadocivil_nombre,thijos.hijos_descripcion,
formaconocer.formaconocer_nombre,testadocf.estcfdescripcion,t_seguro.experiencia_nombre AS tseguro,tiposeguro.tiposeguro_nombre,
tparroquia.pardescripcion,tipoparroquia.tipoparroquia_nombre,t_licencia.experiencia_nombre AS licencia,tipolicencia.tipolicencia_nombre,
t_vehiculo.experiencia_nombre AS vehiculo,t_adaptacion.experiencia_nombre AS adaptacion,t_federacion.experiencia_nombre AS federacion,
asociacion.asociacion_nombre,etnia.etnia_nombre,`tprovincia`.`prodescripcion`,`tpuesto`.`descripcion`,
tipodiscapacidad.tipodiscapacidad_nombre,partesafectadas.partesafectadas_nombre,
nivelavance.nivelavance_nombre,origendeficiencia.origendeficiencia_nombre,tporcentaje.tporcentaje_descripcion,
YEAR(CURDATE())-YEAR(`fecha_nac`)  AS `edad_actual`,tfnecesaria.formacion_descripcion,tnivel.tnivel_descripcion,tniveledu.tniveledu_descripcion
FROM
	tusuario
LEFT JOIN
	tipoidentificacion ON tusuario.tipoidentificacion_id=tipoidentificacion.tipoidentificacion_id
LEFT JOIN
	genero ON tusuario.genero=genero.genero_id
LEFT JOIN
	estadocivil ON tusuario.id_estado_civil=estadocivil.estadocivil_id
LEFT JOIN
	thijos ON tusuario.num_hijos=thijos.hijos_id
LEFT JOIN
	formaconocer ON tusuario.forma_conocer=formaconocer.formaconocer_id
LEFT JOIN
	testadocf ON tusuario.estado=testadocf.estcfcodigo
LEFT JOIN
	experiencia AS t_seguro ON tusuario.seguro=t_seguro.experiencia_id
LEFT JOIN
	tiposeguro ON tusuario.tipo_seguro=tiposeguro.tiposeguro_id
LEFT JOIN
	tparroquia ON tusuario.parcodigo=tparroquia.parcodigo
LEFT JOIN
	`tcanton` ON tparroquia.`cancodigo`=`tcanton`.`cancodigo`
LEFT JOIN
	`tprovincia` ON `tcanton`.`procodigo`=`tprovincia`.`procodigo`		
LEFT JOIN
	tipoparroquia ON tusuario.sector=tipoparroquia.tipoparroquia_id
LEFT JOIN
	experiencia AS t_licencia ON tusuario.licencia=t_licencia.experiencia_id
LEFT JOIN
	tipolicencia ON tusuario.tlicencia=tipolicencia.tipolicencia_id
LEFT JOIN
	experiencia AS t_vehiculo ON tusuario.vehiculo=t_vehiculo.experiencia_id
LEFT JOIN
	experiencia AS t_adaptacion ON tusuario.adaptacion_vehiculo=t_adaptacion.experiencia_id
LEFT JOIN
	experiencia AS t_federacion ON tusuario.federacion=t_federacion.experiencia_id
LEFT JOIN
	asociacion ON tusuario.tfederacion=asociacion.asociacion_id
LEFT JOIN
	etnia ON tusuario.etnia_id=etnia.etnia_id
LEFT JOIN
	`tpuesto` ON `tusuario`.`foto`=`tpuesto`.`id_puesto`


LEFT JOIN
			`tusuario_discapacidad` ON `tusuario`.`id_usuario`=`tusuario_discapacidad`.`id_usuario`
LEFT JOIN
	tipodiscapacidad ON tusuario_discapacidad.id_tipo_discapacidad=tipodiscapacidad.tipodiscapacidad_id
LEFT JOIN
	partesafectadas ON tusuario_discapacidad.id_detalle_tipo_discapacidad=partesafectadas.partesafectadas_id
LEFT JOIN
	nivelavance ON tusuario_discapacidad.nivelavance_id=nivelavance.nivelavance_id
LEFT JOIN
	origendeficiencia ON tusuario_discapacidad.odiscapacidad_id=origendeficiencia.origendeficiencia_id
LEFT JOIN
	tporcentaje ON tusuario_discapacidad.tporcentaje_id=tporcentaje.tporcentaje_id
LEFT JOIN
	`tformacionu` ON `tusuario`.`id_usuario`=`tformacionu`.`id_usuario`
LEFT JOIN
			tfnecesaria ON tformacionu.tfnecesaria_id =tfnecesaria.tfnecesaria_id
LEFT JOIN
			tnivel ON tformacionu.tnivel_id=tnivel.tnivel_id 
LEFT JOIN
			tniveledu ON tformacionu.tniveledu_id=tniveledu.tniveledu_id 		
	

where 
tusuario.tusuario_id='1' order by apellido_paterno
		 LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
		$num_agrup = mysql_num_rows($sel_agrup);
		echo'<br>';echo'<br>';echo'<br>';
		$sSQL = "SELECT
count(*)
FROM
	tusuario
LEFT JOIN
	tipoidentificacion ON tusuario.tipoidentificacion_id=tipoidentificacion.tipoidentificacion_id
LEFT JOIN
	genero ON tusuario.genero=genero.genero_id
LEFT JOIN
	estadocivil ON tusuario.id_estado_civil=estadocivil.estadocivil_id
LEFT JOIN
	thijos ON tusuario.num_hijos=thijos.hijos_id
LEFT JOIN
	formaconocer ON tusuario.forma_conocer=formaconocer.formaconocer_id
LEFT JOIN
	testadocf ON tusuario.estado=testadocf.estcfcodigo
LEFT JOIN
	experiencia AS t_seguro ON tusuario.seguro=t_seguro.experiencia_id
LEFT JOIN
	tiposeguro ON tusuario.tipo_seguro=tiposeguro.tiposeguro_id
LEFT JOIN
	tparroquia ON tusuario.parcodigo=tparroquia.parcodigo
LEFT JOIN
	`tcanton` ON tparroquia.`cancodigo`=`tcanton`.`cancodigo`
LEFT JOIN
	`tprovincia` ON `tcanton`.`procodigo`=`tprovincia`.`procodigo`		
LEFT JOIN
	tipoparroquia ON tusuario.sector=tipoparroquia.tipoparroquia_id
LEFT JOIN
	experiencia AS t_licencia ON tusuario.licencia=t_licencia.experiencia_id
LEFT JOIN
	tipolicencia ON tusuario.tlicencia=tipolicencia.tipolicencia_id
LEFT JOIN
	experiencia AS t_vehiculo ON tusuario.vehiculo=t_vehiculo.experiencia_id
LEFT JOIN
	experiencia AS t_adaptacion ON tusuario.adaptacion_vehiculo=t_adaptacion.experiencia_id
LEFT JOIN
	experiencia AS t_federacion ON tusuario.federacion=t_federacion.experiencia_id
LEFT JOIN
	asociacion ON tusuario.tfederacion=asociacion.asociacion_id
LEFT JOIN
	etnia ON tusuario.etnia_id=etnia.etnia_id
LEFT JOIN
	`tpuesto` ON `tusuario`.`foto`=`tpuesto`.`id_puesto`


LEFT JOIN
			`tusuario_discapacidad` ON `tusuario`.`id_usuario`=`tusuario_discapacidad`.`id_usuario`
LEFT JOIN
	tipodiscapacidad ON tusuario_discapacidad.id_tipo_discapacidad=tipodiscapacidad.tipodiscapacidad_id
LEFT JOIN
	partesafectadas ON tusuario_discapacidad.id_detalle_tipo_discapacidad=partesafectadas.partesafectadas_id
LEFT JOIN
	nivelavance ON tusuario_discapacidad.nivelavance_id=nivelavance.nivelavance_id
LEFT JOIN
	origendeficiencia ON tusuario_discapacidad.odiscapacidad_id=origendeficiencia.origendeficiencia_id
LEFT JOIN
	tporcentaje ON tusuario_discapacidad.tporcentaje_id=tporcentaje.tporcentaje_id
LEFT JOIN
	`tformacionu` ON `tusuario`.`id_usuario`=`tformacionu`.`id_usuario`
LEFT JOIN
			tfnecesaria ON tformacionu.tfnecesaria_id =tfnecesaria.tfnecesaria_id
LEFT JOIN
			tnivel ON tformacionu.tnivel_id=tnivel.tnivel_id 
LEFT JOIN
			tniveledu ON tformacionu.tniveledu_id=tniveledu.tniveledu_id 		
	
where 
tusuario.tusuario_id='2' order by apellido_paterno
"; //Cuento el total de registros
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
        					echo "<a href=\"bus_monitoreop.php?&pagina=".$i."\">  <font color=#000080><b>$i</b></font></a>";
						
						$vehiculo="";
				 }	
?>	
					<table width="500" align="center" class="tabla">
					<tr>
						<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">TIPO IDENTIFICACIÓN</td>
						<td class="tdatos">NOMBRES Y APELLIDOS</td>
						<td class="tdatos">GÉNERO</td>
						<td class="tdatos">ESTADO CIVIL</td>
						<td class="tdatos">FECHA NACIMIENTO</td>
						<td class="tdatos">NÚMERO DE HIJOS</td>
						<td class="tdatos">FORMA DE CONOCER</td>
						<td class="tdatos">ESTADO</td>
						<td class="tdatos">TIENE SEGURO</td>
						<td class="tdatos">TIPO SEGURO</td>	
						<td class="tdatos">FECHA DE INGRESO</td>
						<td class="tdatos">ÉTNIA</td>
						<td class="tdatos">PARROQUIA</td>
						<td class="tdatos">CALLE PRINCIPAL</td>
						<td class="tdatos">NÚMERO</td>	
						<td class="tdatos">TRANSVERSAL</td>
						<td class="tdatos">SECTOR</td>
						<td class="tdatos">PASAJE</td>
						<td class="tdatos">BARRIO</td>
						<td class="tdatos">MANZANA</td>
						<td class="tdatos">SOLAR</td>
						<td class="tdatos">OBSERVACIÓN</td>	
						<td class="tdatos">FIJO</td>
						<td class="tdatos">MÓVIL</td>
						<td class="tdatos">REFERIDO 1</td>
						<td class="tdatos">REFERIDO 2</td>
						<td class="tdatos">EMAIL</td>	
						<td class="tdatos">OBSERVACIÓN TELÉFONO</td>
						<td class="tdatos">TIENE LICENCIA</td>
						<td class="tdatos">TIPO LICENCIA</td>
						<td class="tdatos">VEHÍCULO</td>
						<td class="tdatos">ADAPTACIÓN</td>
						<td class="tdatos">TIPO ADAPTACIÓN</td>	
						<td class="tdatos">FEDERACIÓN</td>
						<td class="tdatos">TIPO FEDERACION</td>
						<td class="tdatos">ASOCIACIÓN</td>
						<td class="tdatos">PROVINCIA</td>
						<td class="tdatos">PROFESIÓN</td>
						
						<td class="tdatos">TIPO DISCAPACIDAD</td>
						<td class="tdatos">PARTES AFECTADAS</td>
						<td class="tdatos">NIVEL AVANCE</td>
						<td class="tdatos">ORIGEN DEFICIENCIA</td>
						<td class="tdatos">PORCENTAJE</td>
						<td class="tdatos">FORMACION </td>
						<td class="tdatos">NIVEL FORMACION </td>
						<td class="tdatos">NIVEL EDUCACION </td>
						<td class="tdatos">EDAD</td>
						
					</tr>
					<?php	
					for($i=0;$i<$num_agrup;$i++)
					{
						$registro_agrup= mysql_fetch_array($sel_agrup);
						if($i%2==0){echo '<tr class="par">';}else{echo '<tr>';}
						echo '<td>'.$registro_agrup['id_usuario'].'</td>';
						echo '<td>'.$registro_agrup['identificacion'].' </td>';
						echo '<td>'.$registro_agrup['apellido_paterno'].' '.$registro_agrup['apellido_materno'].' '.$registro_agrup['primer_nombre'].' '.$registro_agrup['segundo_nombre'].'</td>';
						echo '<td>'.$registro_agrup['genero_nombre'].' </td>';
						echo '<td>'.$registro_agrup['estadocivil_nombre'].'</td>';
						echo '<td>'.$registro_agrup['fecha_nac'].' </td>';
						echo '<td>'.$registro_agrup['hijos_descripcion'].' </td>';
						echo '<td>'.$registro_agrup['formaconocer_nombre'].' </td>';
						echo '<td>'.$registro_agrup['estcfdescripcion'].'</td>';
						echo '<td>'.$registro_agrup['tseguro'].' </td>';
						echo '<td>'.$registro_agrup['tiposeguro_nombre'].'</td>';
						echo '<td>'.$registro_agrup['fecha_ingreso'].' </td>';
						echo '<td>'.$registro_agrup['etnia_nombre'].' </td>';
						echo '<td>'.$registro_agrup['pardescripcion'].' </td>';
						echo '<td>'.$registro_agrup['cprincipal'].'</td>';
						echo '<td>'.$registro_agrup['numero'].' </td>';
						echo '<td>'.$registro_agrup['transversal'].'</td>';
						echo '<td>'.$registro_agrup['tipoparroquia_nombre'].' </td>';
						echo '<td>'.$registro_agrup['pasaje'].' </td>';
						echo '<td>'.$registro_agrup['barrio'].' </td>';
						echo '<td>'.$registro_agrup['manzana'].'</td>';
						echo '<td>'.$registro_agrup['solar'].' </td>';
						echo '<td>'.$registro_agrup['observacion'].'</td>';
						echo '<td>'.$registro_agrup['fijo'].' </td>';
						echo '<td>'.$registro_agrup['movil'].' </td>';
						echo '<td>'.$registro_agrup['referido1'].' </td>';
						echo '<td>'.$registro_agrup['referido2'].'</td>';
						echo '<td>'.$registro_agrup['email'].' </td>';
						echo '<td>'.$registro_agrup['observacion_telefono'].'</td>';
						echo '<td>'.$registro_agrup['licencia'].' </td>';
						echo '<td>'.$registro_agrup['tipolicencia_nombre'].'</td>';
						echo '<td>'.$registro_agrup['vehiculo'].' </td>';
						echo '<td>'.$registro_agrup['adaptacion'].' </td>';
						echo '<td>'.$registro_agrup['tipo_adaptacion'].' </td>';
						echo '<td>'.$registro_agrup['federacion'].'</td>';
						echo '<td>'.$registro_agrup['asociacion_nombre'].' </td>';
						echo '<td>'.$registro_agrup['asociacion'].'</td>';
						echo '<td>'.$registro_agrup['prodescripcion'].'</td>';
						echo '<td>'.$registro_agrup['descripcion'].'</td>';	
						
						echo '<td>'.$registro_agrup['tipodiscapacidad_nombre'].'</td>';
						echo '<td>'.$registro_agrup['partesafectadas_nombre'].'</td>';
						echo '<td>'.$registro_agrup['nivelavance_nombre'].'</td>';
						echo '<td>'.$registro_agrup['origendeficiencia_nombre'].'</td>';
						echo '<td>'.$registro_agrup['tporcentaje_descripcion'].'</td>';
						echo '<td>'.$registro_agrup['formacion_descripcion'].'</td>';
						echo '<td>'.$registro_agrup['tnivel_descripcion'].'</td>';
						echo '<td>'.$registro_agrup['tniveledu_descripcion'].'</td>';
						echo '<td>'.$registro_agrup['edad_actual'].'</td>';
						}
	
}
echo '</table>';

echo"<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>