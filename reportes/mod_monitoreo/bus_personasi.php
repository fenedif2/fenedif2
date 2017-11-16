<?php
session_start();
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><h6>PERSONAS INSERTADAS</h6></div>
<div id="centercontent">
<div align="center">
<table>
<td>
<form action="bus_personasi.php">
	<input type="hidden" name="busqueda" value="todos">
	<table align="center" class="tabla">
		<tr>
				
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
			
		</tr>
				
			</tr>
	</table>
</form>	
<br/>
<form action="bus_personasi.php">
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
<form action="bus_personasi.php">
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
                   DISTINCT  tusuariocontratacion.*, `tusuariocontratacion`.`fecha_ingreso` AS fingreso,
		     tusuario.*,tpuesto.descripcion,testadocontratacion.contratacion_descripcion,tmrechazo.descripcion_mrechazo,
tempresa.nombre,sucursal.sucursal_nombre,tipodiscapacidad.tipodiscapacidad_nombre,partesafectadas.partesafectadas_nombre,
nivelavance.nivelavance_nombre,origendeficiencia.origendeficiencia_nombre,tporcentaje.tporcentaje_descripcion,
YEAR(CURDATE())-YEAR(`fecha_nac`)  AS `edad_actual`,tfnecesaria.formacion_descripcion,tnivel.tnivel_descripcion,tniveledu.tniveledu_descripcion
			FROM
                          tusuariocontratacion
LEFT JOIN
			tusuario ON tusuariocontratacion.id_usuario_puesto=tusuario.id_usuario
			
LEFT JOIN
			tpuesto_empresa  ON tusuariocontratacion.id_puestoempresa=tpuesto_empresa.id_puestoempresa
LEFT JOIN
			tempresa  ON tpuesto_empresa.id_empresa=tempresa.id_empresa
LEFT JOIN
			sucursal  ON tempresa.id_sucursal=sucursal.sucursal_id
LEFT JOIN
			tpuesto  ON tpuesto_empresa.id_puesto=tpuesto.id_puesto
LEFT JOIN
			testadocontratacion  ON tusuariocontratacion.id_estadocontratacion=testadocontratacion.id_estadocontratacion
LEFT JOIN
			tmrechazo  ON tusuariocontratacion.id_mrechazo=tmrechazo.id_mrechazo
LEFT JOIN
			`tusuario_discapacidad` ON tusuariocontratacion.`id_usuario_puesto`=`tusuario_discapacidad`.`id_usuario`
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
	`tformacionu` ON `tusuariocontratacion`.`id_usuario_puesto`=`tformacionu`.`id_usuario`
LEFT JOIN
			tfnecesaria ON tformacionu.tfnecesaria_id =tfnecesaria.tfnecesaria_id
LEFT JOIN
			tnivel ON tformacionu.tnivel_id=tnivel.tnivel_id 
LEFT JOIN
			tniveledu ON tformacionu.tniveledu_id=tniveledu.tniveledu_id 	
						
WHERE 	tusuariocontratacion.`id_estadocontratacion`=1	 and tempresa.id_sucursal='$sucursal' and tusuariocontratacion.fecha_ingreso>='$ini' and tusuariocontratacion.fecha_ingreso<='$fin'
		 LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
		$num_agrup = mysql_num_rows($sel_agrup);
		echo'<br>';echo'<br>';echo'<br>';
		$sSQL = "SELECT count(*) FROM tusuariocontratacion
		LEFT JOIN
			tusuario ON tusuariocontratacion.id_usuario_puesto=tusuario.id_usuario
		LEFT JOIN
			tpuesto_empresa  ON tusuariocontratacion.id_puestoempresa=tpuesto_empresa.id_puestoempresa
		LEFT JOIN
			tempresa  ON tpuesto_empresa.id_empresa=tempresa.id_empresa
						
WHERE 	tusuariocontratacion.`id_estadocontratacion`=1	 and tempresa.id_sucursal='$sucursal' and tusuariocontratacion.fecha_ingreso>='$ini' and tusuariocontratacion.fecha_ingreso<='$fin' "; //Cuento el total de registros
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
        					echo "<a href=\"bus_personasi.php?busqueda=todos&ini=".$ini."&fin=".$fin."&pagina=".$i."\">  <font color=#000080><b>$i</b></font></a>";
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
						<td class="tdatos">SUCURSAL</td>
						<td class="tdatos">ESTADO</td>
						<td class="tdatos">DESCRIPCION</td>
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
						echo '<td>'.$registro_agrup['id_usuario_contratacion'].'</td>';
						echo '<td>'.$registro_agrup['fingreso'].' </td>';
						echo '<td>'.$registro_agrup['apellido_paterno'].' '.$registro_agrup['apellido_materno'].' '.$registro_agrup['primer_nombre'].' '.$registro_agrup['segundo_nombre'].'</td>';
						echo '<td>'.$registro_agrup['nombre'].'</td>';
						echo '<td>'.$registro_agrup['fijo'].'</td>';
						echo '<td>'.$registro_agrup['sucursal_nombre'].'</td>';
						echo '<td>'.$registro_agrup['contratacion_descripcion'].'</td>';
						echo '<td>'.$registro_agrup['descripcion_mrechazo'].'</td>';	
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
	$ini=$_REQUEST["ini"];
	$fin=$_REQUEST["fin"];
	$sucursal=$_REQUEST["sucursal_id"];
	
	echo '<td><p class="centrado">
	<a target="_blank" href="../pdf/list_personasi_sucursal.php?p1='.$sucursal.'
	
	" title="'.$id_excel.'"><img src="../imgs/excel_img.png" alt="'.$id_excel.'" /></a>
	</a></p></td>';
	
	$noRegistros = 50; //Registros por página
	$pagina = 1; //Por default, página = 1
	if($_GET["pagina"]) //Si hay página por ?pagina=valor, lo asigna
    $pagina = $_GET["pagina"];
	//monto un select para listar los alumnos matriculados en el agrupamiento
		$sel_agrup = mysql_query("SELECT 
                   DISTINCT  tusuariocontratacion.*, `tusuariocontratacion`.`fecha_ingreso` AS fingreso,
		     tusuario.*,tpuesto.descripcion,testadocontratacion.contratacion_descripcion,tmrechazo.descripcion_mrechazo,
tempresa.nombre,sucursal.sucursal_nombre,tipodiscapacidad.tipodiscapacidad_nombre,partesafectadas.partesafectadas_nombre,
nivelavance.nivelavance_nombre,origendeficiencia.origendeficiencia_nombre,tporcentaje.tporcentaje_descripcion,
YEAR(CURDATE())-YEAR(`fecha_nac`)  AS `edad_actual`,tfnecesaria.formacion_descripcion,tnivel.tnivel_descripcion,tniveledu.tniveledu_descripcion
			FROM
                          tusuariocontratacion
LEFT JOIN
			tusuario ON tusuariocontratacion.id_usuario_puesto=tusuario.id_usuario
			
LEFT JOIN
			tpuesto_empresa  ON tusuariocontratacion.id_puestoempresa=tpuesto_empresa.id_puestoempresa
LEFT JOIN
			tempresa  ON tpuesto_empresa.id_empresa=tempresa.id_empresa
LEFT JOIN
			sucursal  ON tempresa.id_sucursal=sucursal.sucursal_id
LEFT JOIN
			tpuesto  ON tpuesto_empresa.id_puesto=tpuesto.id_puesto
LEFT JOIN
			testadocontratacion  ON tusuariocontratacion.id_estadocontratacion=testadocontratacion.id_estadocontratacion
LEFT JOIN
			tmrechazo  ON tusuariocontratacion.id_mrechazo=tmrechazo.id_mrechazo
LEFT JOIN
			`tusuario_discapacidad` ON tusuariocontratacion.`id_usuario_puesto`=`tusuario_discapacidad`.`id_usuario`
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
	`tformacionu` ON `tusuariocontratacion`.`id_usuario_puesto`=`tformacionu`.`id_usuario`
LEFT JOIN
			tfnecesaria ON tformacionu.tfnecesaria_id =tfnecesaria.tfnecesaria_id
LEFT JOIN
			tnivel ON tformacionu.tnivel_id=tnivel.tnivel_id 
LEFT JOIN
			tniveledu ON tformacionu.tniveledu_id=tniveledu.tniveledu_id 	
						
WHERE 	tusuariocontratacion.`id_estadocontratacion`=1		 and tempresa.id_sucursal='$sucursal' 
		 LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
		$num_agrup = mysql_num_rows($sel_agrup);
		echo'<br>';echo'<br>';echo'<br>';
		$sSQL = "SELECT count(*) FROM tusuariocontratacion
		LEFT JOIN
			tusuario ON tusuariocontratacion.id_usuario_puesto=tusuario.id_usuario
		LEFT JOIN
			tpuesto_empresa  ON tusuariocontratacion.id_puestoempresa=tpuesto_empresa.id_puestoempresa
		LEFT JOIN
			tempresa  ON tpuesto_empresa.id_empresa=tempresa.id_empresa
		WHERE 	tusuariocontratacion.`id_estadocontratacion`=1 and tempresa.id_sucursal='$sucursal' "; //Cuento el total de registros
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
        					echo "<a href=\"bus_personasi.php?busqueda=sucursal&pagina=".$i."\">  <font color=#000080><b>$i</b></font></a>";
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
						<td class="tdatos">SUCURSAL</td>
						<td class="tdatos">ESTADO</td>
						<td class="tdatos">DESCRIPCION</td>
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
						echo '<td>'.$registro_agrup['id_usuario_contratacion'].'</td>';
						echo '<td>'.$registro_agrup['fingreso'].' </td>';
						echo '<td>'.$registro_agrup['apellido_paterno'].' '.$registro_agrup['apellido_materno'].' '.$registro_agrup['primer_nombre'].' '.$registro_agrup['segundo_nombre'].'</td>';
						echo '<td>'.$registro_agrup['nombre'].'</td>';
						echo '<td>'.$registro_agrup['fijo'].'</td>';
						echo '<td>'.$registro_agrup['sucursal_nombre'].'</td>';
						echo '<td>'.$registro_agrup['contratacion_descripcion'].'</td>';
						echo '<td>'.$registro_agrup['descripcion_mrechazo'].'</td>';
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
	$ini1=$_REQUEST["ini1"];
	$ffin=$_REQUEST["ffin"];
	$sucursal=$_REQUEST["sucursal_id"];
	
	echo '<td><p class="centrado">
	<a target="_blank" href="../pdf/list_personasi_fechas.php?p3='.$ini1.'
	&p4='.$ffin.'
	" title="'.$id_excel.'"><img src="../imgs/excel_img.png" alt="'.$id_excel.'" /></a>
	</a></p></td>';
	
	$noRegistros = 50; //Registros por página
	$pagina = 1; //Por default, página = 1
	if($_GET["pagina"]) //Si hay página por ?pagina=valor, lo asigna
    $pagina = $_GET["pagina"];
	//monto un select para listar los alumnos matriculados en el agrupamiento
		$sel_agrup = mysql_query("SELECT 
                   DISTINCT  tusuariocontratacion.*, `tusuariocontratacion`.`fecha_ingreso` AS fingreso,
		     tusuario.*,tpuesto.descripcion,testadocontratacion.contratacion_descripcion,tmrechazo.descripcion_mrechazo,
tempresa.nombre,sucursal.sucursal_nombre,tipodiscapacidad.tipodiscapacidad_nombre,partesafectadas.partesafectadas_nombre,
nivelavance.nivelavance_nombre,origendeficiencia.origendeficiencia_nombre,tporcentaje.tporcentaje_descripcion,
YEAR(CURDATE())-YEAR(`fecha_nac`)  AS `edad_actual`,tfnecesaria.formacion_descripcion,tnivel.tnivel_descripcion,tniveledu.tniveledu_descripcion
			FROM
                          tusuariocontratacion
LEFT JOIN
			tusuario ON tusuariocontratacion.id_usuario_puesto=tusuario.id_usuario
			
LEFT JOIN
			tpuesto_empresa  ON tusuariocontratacion.id_puestoempresa=tpuesto_empresa.id_puestoempresa
LEFT JOIN
			tempresa  ON tpuesto_empresa.id_empresa=tempresa.id_empresa
LEFT JOIN
			sucursal  ON tempresa.id_sucursal=sucursal.sucursal_id
LEFT JOIN
			tpuesto  ON tpuesto_empresa.id_puesto=tpuesto.id_puesto
LEFT JOIN
			testadocontratacion  ON tusuariocontratacion.id_estadocontratacion=testadocontratacion.id_estadocontratacion
LEFT JOIN
			tmrechazo  ON tusuariocontratacion.id_mrechazo=tmrechazo.id_mrechazo
LEFT JOIN
			`tusuario_discapacidad` ON tusuariocontratacion.`id_usuario_puesto`=`tusuario_discapacidad`.`id_usuario`
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
	`tformacionu` ON `tusuariocontratacion`.`id_usuario_puesto`=`tformacionu`.`id_usuario`
LEFT JOIN
			tfnecesaria ON tformacionu.tfnecesaria_id =tfnecesaria.tfnecesaria_id
LEFT JOIN
			tnivel ON tformacionu.tnivel_id=tnivel.tnivel_id 
LEFT JOIN
			tniveledu ON tformacionu.tniveledu_id=tniveledu.tniveledu_id 	
						
WHERE 	tusuariocontratacion.`id_estadocontratacion`=1 and tusuariocontratacion.fecha_ingreso>='$ini1' and tusuariocontratacion.fecha_ingreso<='$ffin'
		 LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
		$num_agrup = mysql_num_rows($sel_agrup);
		echo'<br>';echo'<br>';echo'<br>';
		$sSQL = "SELECT count(*) FROM tusuariocontratacion
		LEFT JOIN
			tusuario ON tusuariocontratacion.id_usuario_puesto=tusuario.id_usuario
		LEFT JOIN
			tpuesto_empresa  ON tusuariocontratacion.id_puestoempresa=tpuesto_empresa.id_puestoempresa
		LEFT JOIN
			tempresa  ON tpuesto_empresa.id_empresa=tempresa.id_empresa
						
WHERE 	tusuariocontratacion.`id_estadocontratacion`=1	 and tusuariocontratacion.fecha_ingreso>='$ini1' and tusuariocontratacion.fecha_ingreso<='$ffin' "; //Cuento el total de registros
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
        					echo "<a href=\"bus_personasi.php?busqueda=rangofechas&ini1=".$ini1."&ffin=".$ffin."&pagina=".$i."\">  <font color=#000080><b>$i</b></font></a>";
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
						<td class="tdatos">SUCURSAL</td>
						<td class="tdatos">ESTADO</td>
						<td class="tdatos">DESCRIPCION</td>
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
						echo '<td>'.$registro_agrup['id_usuario_contratacion'].'</td>';
						echo '<td>'.$registro_agrup['fingreso'].' </td>';
						echo '<td>'.$registro_agrup['apellido_paterno'].' '.$registro_agrup['apellido_materno'].' '.$registro_agrup['primer_nombre'].' '.$registro_agrup['segundo_nombre'].'</td>';
						echo '<td>'.$registro_agrup['nombre'].'</td>';
						echo '<td>'.$registro_agrup['fijo'].'</td>';
						echo '<td>'.$registro_agrup['sucursal_nombre'].'</td>';
						echo '<td>'.$registro_agrup['contratacion_descripcion'].'</td>';
						echo '<td>'.$registro_agrup['descripcion_mrechazo'].'</td>';	
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
	<a target="_blank" href="../pdf/list_personas_todos.php
	" title="'.$id_excel.'"><img src="../imgs/excel_img.png" alt="'.$id_excel.'" /></a>
	</a></p></td>';
	$expedienteced=$_REQUEST["brigada"];
	$noRegistros = 200; //Registros por página
	$pagina = 1; //Por default, página = 1
	if($_GET["pagina"]) //Si hay página por ?pagina=valor, lo asigna
    $pagina = $_GET["pagina"];
	$agrupamiento = $_POST['agrupamiento'];
	//monto un select para listar los alumnos matriculados en el agrupamiento
		$sel_agrup = mysql_query("SELECT 
                   distinct  tusuariocontratacion.*, `tusuariocontratacion`.`fecha_ingreso` AS fingreso,
		     tusuario.*,tpuesto.descripcion,testadocontratacion.contratacion_descripcion,tmrechazo.descripcion_mrechazo,
tempresa.nombre,sucursal.sucursal_nombre,tipodiscapacidad.tipodiscapacidad_nombre,partesafectadas.partesafectadas_nombre,
nivelavance.nivelavance_nombre,origendeficiencia.origendeficiencia_nombre,tporcentaje.tporcentaje_descripcion,
YEAR(CURDATE())-YEAR(`fecha_nac`)  AS `edad_actual`,tfnecesaria.formacion_descripcion,tnivel.tnivel_descripcion,tniveledu.tniveledu_descripcion
			FROM
                          tusuariocontratacion
left join
			tusuario on tusuariocontratacion.id_usuario_puesto=tusuario.id_usuario
			
left join
			tpuesto_empresa  on tusuariocontratacion.id_puestoempresa=tpuesto_empresa.id_puestoempresa
left join
			tempresa  on tpuesto_empresa.id_empresa=tempresa.id_empresa
left join
			sucursal  on tempresa.id_sucursal=sucursal.sucursal_id
left join
			tpuesto  on tpuesto_empresa.id_puesto=tpuesto.id_puesto
left join
			testadocontratacion  on tusuariocontratacion.id_estadocontratacion=testadocontratacion.id_estadocontratacion
left join
			tmrechazo  on tusuariocontratacion.id_mrechazo=tmrechazo.id_mrechazo
LEFT JOIN
			`tusuario_discapacidad` ON tusuariocontratacion.`id_usuario_puesto`=`tusuario_discapacidad`.`id_usuario`
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
	`tformacionu` ON `tusuariocontratacion`.`id_usuario_puesto`=`tformacionu`.`id_usuario`
left join
			tfnecesaria on tformacionu.tfnecesaria_id =tfnecesaria.tfnecesaria_id
left join
			tnivel on tformacionu.tnivel_id=tnivel.tnivel_id 
left join
			tniveledu on tformacionu.tniveledu_id=tniveledu.tniveledu_id 	
						
WHERE 	tusuariocontratacion.`id_estadocontratacion`=1					
		 LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
		$num_agrup = mysql_num_rows($sel_agrup);
		echo'<br>';echo'<br>';echo'<br>';
		$sSQL = "SELECT count(*) FROM tusuariocontratacion
		LEFT JOIN
			tusuario ON tusuariocontratacion.id_usuario_puesto=tusuario.id_usuario
		LEFT JOIN
			tpuesto_empresa  ON tusuariocontratacion.id_puestoempresa=tpuesto_empresa.id_puestoempresa
		LEFT JOIN
			tempresa  ON tpuesto_empresa.id_empresa=tempresa.id_empresa
						
WHERE 	tusuariocontratacion.`id_estadocontratacion`=1		
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
        					echo "<a href=\"bus_personasi.php?pagina=".$i."\">  <font color=#000080><b>$i</b></font></a>";
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
						<td class="tdatos">SUCURSAL</td>
						<td class="tdatos">ESTADO</td>
						<td class="tdatos">DESCRIPCION</td>
						
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
						echo '<td>'.$registro_agrup['id_usuario_contratacion'].'</td>';
						echo '<td>'.$registro_agrup['fingreso'].' </td>';
						echo '<td>'.$registro_agrup['apellido_paterno'].' '.$registro_agrup['apellido_materno'].' '.$registro_agrup['primer_nombre'].' '.$registro_agrup['segundo_nombre'].'</td>';
						echo '<td>'.$registro_agrup['nombre'].'</td>';
						echo '<td>'.$registro_agrup['fijo'].'</td>';
						echo '<td>'.$registro_agrup['sucursal_nombre'].'</td>';
						echo '<td>'.$registro_agrup['contratacion_descripcion'].'</td>';
						echo '<td>'.$registro_agrup['descripcion_mrechazo'].'</td>';
						
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