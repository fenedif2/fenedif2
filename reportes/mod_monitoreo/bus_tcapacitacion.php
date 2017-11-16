<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><h6>CAPACITACIÓN</h6></div>
<div id="centercontent">
<div align="center">
<table>
<td>
<form action="bus_tcapacitacion.php">
	<input type="hidden" name="busqueda" value="todos">
	<table align="center" class="tabla">
		<tr>
				
			
			<tr>
			<?php
			echo '<td>
				
					<select name="tipocurso" id="tipocurso" >
					';	
					//listamos grupos para componer el select
					$consulta_brigada = mysql_query("select * from tipocurso");
					$n_brigada = mysql_num_rows($consulta_brigada);
					echo '<option>SELECCIONE TIPO CAPACITACIÓN</option>';
					for($d=0;$d<$n_brigada;$d++)
					{
					$reg_consulta_brigada = mysql_fetch_array($consulta_brigada);
					echo '<option value="'.$reg_consulta_brigada['tipo_curso_id'].'">'.$reg_consulta_brigada['tipo_descripcion'].'</option>';
					}
				echo '	
				</select>
			
			</td>';
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
<form action="bus_tcapacitacion.php">
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
<form action="bus_tcapacitacion.php">
	<input type="hidden" name="busqueda" value="tipocurso">
	
		<td>
							
			<?php
			echo '<td>
				
					<select name="tipocurso" id="tipocurso" >
					';	
					//listamos grupos para componer el select
					$consulta_brigada = mysql_query("select * from tipocurso");
					$n_brigada = mysql_num_rows($consulta_brigada);
					echo '<option>SELECCIONE TIPO CAPACITACIÓN</option>';
					for($d=0;$d<$n_brigada;$d++)
					{
					$reg_consulta_brigada = mysql_fetch_array($consulta_brigada);
					echo '<option value="'.$reg_consulta_brigada['tipo_curso_id'].'">'.$reg_consulta_brigada['tipo_descripcion'].'</option>';
					}
				echo '	
				</select>
			
			</td>';
			?>
		<td><input type="submit" value="Buscar"></td>
	</td>

</form>	
<form action="bus_tcapacitacion.php">
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
	$tipocurso=$_REQUEST["tipocurso"];
	
	echo '<td><p class="centrado">
	<a target="_blank" href="../pdf/list_tcapacitacion_todos.php?p1='.$sucursal.'&p2='.$tipocurso.'
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
                   tcursocf.*,tipocurso.tipo_descripcion,
                   centro_formativo.nombre AS nombre_centroformativo,sucursal.sucursal_nombre,tformacion.capacitacion_nombre
FROM
                          tcursocf
LEFT JOIN
			tipocurso  ON tcursocf.tipo_curso=tipocurso.tipo_curso_id
LEFT JOIN
	centro_formativo ON tcursocf.id_centro_formativo=centro_formativo.id_centro_formativo
LEFT JOIN
	sucursal ON centro_formativo.sucursal=sucursal.sucursal_id
LEFT JOIN
			tformacion ON tcursocf.edu_formal=tformacion.capacitacion_id	

where tipocurso.tipo_curso_id='$tipocurso' and centro_formativo.sucursal='$sucursal'
and  fecha_inicio BETWEEN '$ini' AND '$fin'
		 LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
		$num_agrup = mysql_num_rows($sel_agrup);
		echo'<br>';echo'<br>';echo'<br>';
		$sSQL = "SELECT count(*) FROM tcursocf
LEFT JOIN
			tipocurso  ON tcursocf.tipo_curso=tipocurso.tipo_curso_id
LEFT JOIN
	centro_formativo ON tcursocf.id_centro_formativo=centro_formativo.id_centro_formativo
LEFT JOIN
	sucursal ON centro_formativo.sucursal=sucursal.sucursal_id
LEFT JOIN
			tformacion ON tcursocf.edu_formal=tformacion.capacitacion_id
where tipocurso.tipo_curso_id='$tipocurso' and centro_formativo.sucursal='$sucursal'
and  fecha_inicio BETWEEN '$ini' AND '$fin'"; //Cuento el total de registros
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
        					echo "<a href=\"bus_tcapacitacion.php?busqueda=todos
        					&tipocurso=".$tipocurso."
        					&sucursal_id=".$sucursal."
        					&ini=".$ini."&fin=".$fin."&pagina=".$i."\">  <font color=#000080><b>$i</b></font></a>";
						$vehiculo="";
				 }	
?>	
					<table width="500" align="center" class="tabla">
					<tr>
						<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">FECHA INICIO</td>
						<td class="tdatos">FECHA FIN</td>
						<td class="tdatos">NÚMERO ALUMNOS</td>
						<td class="tdatos">NÚMERO HORAS</td>
						<td class="tdatos">INSTRUCTOR</td>
						<td class="tdatos">NOMBRE CURSO</td>
						<td class="tdatos">FORMACIÓN</td>
						<td class="tdatos">CLASE</td>
						<td class="tdatos">SUCURSAL</td>
						
						
						
					</tr>
					<?php	
					for($i=0;$i<$num_agrup;$i++)
					{
						$registro_agrup= mysql_fetch_array($sel_agrup);
						if($i%2==0){echo '<tr class="par">';}else{echo '<tr>';}
						echo '<td>'.$registro_agrup['id_tcursocf'].'</td>';
						echo '<td>'.$registro_agrup['fecha_inicio'].' </td>';
						echo '<td>'.$registro_agrup['fecha_fin'].' </td>';
						echo '<td>'.$registro_agrup['num_alumnos'].' </td>';
						echo '<td>'.$registro_agrup['num_horas'].' </td>';
						echo '<td>'.$registro_agrup['instructor'].'</td>';
						echo '<td>'.$registro_agrup['nombre'].'</td>';
						echo '<td>'.$registro_agrup['tipo_descripcion'].'</td>';
						echo '<td>'.$registro_agrup['capacitacion_nombre'].'</td>';
						echo '<td>'.$registro_agrup['sucursal_nombre'].'</td>';
							
						
						}
	
		
	break;
	case'sucursal':
		$ini=$_REQUEST["ini"];
	$fin=$_REQUEST["fin"];
	$sucursal=$_REQUEST["sucursal_id"];
	$tipocurso=$_REQUEST["tipocurso"];
	
	echo '<td><p class="centrado">
	<a target="_blank" href="../pdf/list_tcapacitacion_sucursal.php?p1='.$sucursal.'
	" title="'.$id_excel.'"><img src="../imgs/excel_img.png" alt="'.$id_excel.'" /></a>
	</a></p></td>';
	
	$noRegistros = 50; //Registros por página
	$pagina = 1; //Por default, página = 1
	if($_GET["pagina"]) //Si hay página por ?pagina=valor, lo asigna
    $pagina = $_GET["pagina"];
	//monto un select para listar los alumnos matriculados en el agrupamiento
		$sel_agrup = mysql_query("SELECT
                   tcursocf.*,tipocurso.tipo_descripcion,
                   centro_formativo.nombre AS nombre_centroformativo,sucursal.sucursal_nombre,tformacion.capacitacion_nombre
FROM
                          tcursocf
LEFT JOIN
			tipocurso  ON tcursocf.tipo_curso=tipocurso.tipo_curso_id
LEFT JOIN
	centro_formativo ON tcursocf.id_centro_formativo=centro_formativo.id_centro_formativo
LEFT JOIN
	sucursal ON centro_formativo.sucursal=sucursal.sucursal_id
LEFT JOIN
			tformacion ON tcursocf.edu_formal=tformacion.capacitacion_id	

where centro_formativo.sucursal='$sucursal'

		 LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
		$num_agrup = mysql_num_rows($sel_agrup);
		echo'<br>';echo'<br>';echo'<br>';
		$sSQL = "SELECT count(*) FROM tcursocf
LEFT JOIN
			tipocurso  ON tcursocf.tipo_curso=tipocurso.tipo_curso_id
LEFT JOIN
	centro_formativo ON tcursocf.id_centro_formativo=centro_formativo.id_centro_formativo
LEFT JOIN
	sucursal ON centro_formativo.sucursal=sucursal.sucursal_id
LEFT JOIN
			tformacion ON tcursocf.edu_formal=tformacion.capacitacion_id
where centro_formativo.sucursal='$sucursal'"; //Cuento el total de registros
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
        					echo "<a href=\"bus_tcapacitacion.php?busqueda=sucursal&sucursal_id=".$sucursal."&pagina=".$i."\">  <font color=#000080><b>$i</b></font></a>";
							//echo "<a href=\"bus_tcapacitacion.php?pagina=".$i."\">  <font color=#000080><b>$i</b></font></a>";
						$vehiculo="";
				 }	
?>	
					<table width="500" align="center" class="tabla">
					<tr>
						<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">FECHA INICIO</td>
						<td class="tdatos">FECHA FIN</td>
						<td class="tdatos">NÚMERO ALUMNOS</td>
						<td class="tdatos">NÚMERO HORAS</td>
						<td class="tdatos">INSTRUCTOR</td>
						<td class="tdatos">NOMBRE CURSO</td>
						<td class="tdatos">FORMACIÓN</td>
						<td class="tdatos">CLASE</td>
						<td class="tdatos">SUCURSAL</td>
						
						
						
					</tr>
					<?php	
					for($i=0;$i<$num_agrup;$i++)
					{
						$registro_agrup= mysql_fetch_array($sel_agrup);
						if($i%2==0){echo '<tr class="par">';}else{echo '<tr>';}
						echo '<td>'.$registro_agrup['id_tcursocf'].'</td>';
						echo '<td>'.$registro_agrup['fecha_inicio'].' </td>';
						echo '<td>'.$registro_agrup['fecha_fin'].' </td>';
						echo '<td>'.$registro_agrup['num_alumnos'].' </td>';
						echo '<td>'.$registro_agrup['num_horas'].' </td>';
						echo '<td>'.$registro_agrup['instructor'].'</td>';
						echo '<td>'.$registro_agrup['nombre'].'</td>';
						echo '<td>'.$registro_agrup['tipo_descripcion'].'</td>';
						echo '<td>'.$registro_agrup['capacitacion_nombre'].'</td>';
						echo '<td>'.$registro_agrup['sucursal_nombre'].'</td>';
							
						
						}
	
	break;
	case'tipocurso':
		$ini=$_REQUEST["ini"];
	$fin=$_REQUEST["fin"];
	$sucursal=$_REQUEST["sucursal_id"];
	$tipocurso=$_REQUEST["tipocurso"];
	
	echo '<td><p class="centrado">
	<a target="_blank" href="../pdf/list_tcapacitacion_tcurso.php?p2='.$tipocurso.'
	" title="'.$id_excel.'"><img src="../imgs/excel_img.png" alt="'.$id_excel.'" /></a>
	</a></p></td>';
	
	$noRegistros = 50; //Registros por página
	$pagina = 1; //Por default, página = 1
	if($_GET["pagina"]) //Si hay página por ?pagina=valor, lo asigna
    $pagina = $_GET["pagina"];
	//monto un select para listar los alumnos matriculados en el agrupamiento
		$sel_agrup = mysql_query("SELECT
                   tcursocf.*,tipocurso.tipo_descripcion,
                   centro_formativo.nombre AS nombre_centroformativo,sucursal.sucursal_nombre,tformacion.capacitacion_nombre
FROM
                          tcursocf
LEFT JOIN
			tipocurso  ON tcursocf.tipo_curso=tipocurso.tipo_curso_id
LEFT JOIN
	centro_formativo ON tcursocf.id_centro_formativo=centro_formativo.id_centro_formativo
LEFT JOIN
	sucursal ON centro_formativo.sucursal=sucursal.sucursal_id
LEFT JOIN
			tformacion ON tcursocf.edu_formal=tformacion.capacitacion_id	

where tipocurso.tipo_curso_id='$tipocurso' 
		 LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
		$num_agrup = mysql_num_rows($sel_agrup);
		echo'<br>';echo'<br>';echo'<br>';
		$sSQL = "SELECT 
                      count(*)
			
			FROM
                          tcursocf
LEFT JOIN
			tipocurso  ON tcursocf.tipo_curso=tipocurso.tipo_curso_id
LEFT JOIN
	centro_formativo ON tcursocf.id_centro_formativo=centro_formativo.id_centro_formativo
LEFT JOIN
	sucursal ON centro_formativo.sucursal=sucursal.sucursal_id
LEFT JOIN
			tformacion ON tcursocf.edu_formal=tformacion.capacitacion_id	
where tipocurso.tipo_curso_id='$tipocurso'"; //Cuento el total de registros
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
        					echo "<a href=\"bus_tcapacitacion.php?busqueda=tipocurso&tipocurso=".$tipocurso."&pagina=".$i."\"><font color=#000080><b>$i</b></font></a>";
						$vehiculo="";
				 }	
?>	
					<table width="500" align="center" class="tabla">
					<tr>
						<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">FECHA INICIO</td>
						<td class="tdatos">FECHA FIN</td>
						<td class="tdatos">NÚMERO ALUMNOS</td>
						<td class="tdatos">NÚMERO HORAS</td>
						<td class="tdatos">INSTRUCTOR</td>
						<td class="tdatos">NOMBRE CURSO</td>
						<td class="tdatos">FORMACIÓN</td>
						<td class="tdatos">CLASE</td>
						<td class="tdatos">SUCURSAL</td>
						
						
						
					</tr>
					<?php	
					for($i=0;$i<$num_agrup;$i++)
					{
						$registro_agrup= mysql_fetch_array($sel_agrup);
						if($i%2==0){echo '<tr class="par">';}else{echo '<tr>';}
						echo '<td>'.$registro_agrup['id_tcursocf'].'</td>';
						echo '<td>'.$registro_agrup['fecha_inicio'].' </td>';
						echo '<td>'.$registro_agrup['fecha_fin'].' </td>';
						echo '<td>'.$registro_agrup['num_alumnos'].' </td>';
						echo '<td>'.$registro_agrup['num_horas'].' </td>';
						echo '<td>'.$registro_agrup['instructor'].'</td>';
						echo '<td>'.$registro_agrup['nombre'].'</td>';
						echo '<td>'.$registro_agrup['tipo_descripcion'].'</td>';
						echo '<td>'.$registro_agrup['capacitacion_nombre'].'</td>';
						echo '<td>'.$registro_agrup['sucursal_nombre'].'</td>';
							
						
						}
	break;
	case'rangofechas':
	$ini1=$_REQUEST["ini1"];
	$ffin=$_REQUEST["ffin"];
	$sucursal=$_REQUEST["sucursal_id"];
	$tipocurso=$_REQUEST["tipocurso"];
	
	echo '<td><p class="centrado">
	<a target="_blank" href="../pdf/list_tcapacitacion_fechas.php?p1='.$sucursal.'&p2='.$tipocurso.'
	&p3='.$ini1.'
	&p4='.$ffin.'
	" title="'.$id_excel.'"><img src="../imgs/excel_img.png" alt="'.$id_excel.'" /></a>
	</a></p></td>';
	
	$noRegistros = 50; //Registros por página
	$pagina = 1; //Por default, página = 1
	if($_GET["pagina"]) //Si hay página por ?pagina=valor, lo asigna
    $pagina = $_GET["pagina"];
	//monto un select para listar los alumnos matriculados en el agrupamiento
		$sel_agrup = mysql_query("SELECT
                   tcursocf.*,tipocurso.tipo_descripcion,
                   centro_formativo.nombre AS nombre_centroformativo,sucursal.sucursal_nombre,tformacion.capacitacion_nombre
FROM
                          tcursocf
LEFT JOIN
			tipocurso  ON tcursocf.tipo_curso=tipocurso.tipo_curso_id
LEFT JOIN
	centro_formativo ON tcursocf.id_centro_formativo=centro_formativo.id_centro_formativo
LEFT JOIN
	sucursal ON centro_formativo.sucursal=sucursal.sucursal_id
LEFT JOIN
			tformacion ON tcursocf.edu_formal=tformacion.capacitacion_id	

where fecha_inicio >='$ini1' and fecha_inicio <='$ffin'
		 LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
		$num_agrup = mysql_num_rows($sel_agrup);
		echo'<br>';echo'<br>';echo'<br>';
		$sSQL = "SELECT count(*) FROM tcursocf
LEFT JOIN
			tipocurso  ON tcursocf.tipo_curso=tipocurso.tipo_curso_id
LEFT JOIN
	centro_formativo ON tcursocf.id_centro_formativo=centro_formativo.id_centro_formativo
LEFT JOIN
	sucursal ON centro_formativo.sucursal=sucursal.sucursal_id
LEFT JOIN
			tformacion ON tcursocf.edu_formal=tformacion.capacitacion_id
where fecha_inicio >='$ini1' and fecha_inicio <='$ffin'"; //Cuento el total de registros
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
        					echo "<a href=\"bus_tcapacitacion.php?busqueda=rangofechas&ini1=".$ini1."&ffin=".$ffin."&pagina=".$i."\">  <font color=#000080><b>$i</b></font></a>";
						$vehiculo="";
				 }	
?>	
					<table width="500" align="center" class="tabla">
					<tr>
						<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">FECHA INICIO</td>
						<td class="tdatos">FECHA FIN</td>
						<td class="tdatos">NÚMERO ALUMNOS</td>
						<td class="tdatos">NÚMERO HORAS</td>
						<td class="tdatos">INSTRUCTOR</td>
						<td class="tdatos">NOMBRE CURSO</td>
						<td class="tdatos">FORMACIÓN</td>
						<td class="tdatos">CLASE</td>
						<td class="tdatos">SUCURSAL</td>
						<td class="tdatos">LUGAR CAPACITACION</td>
						
						
					</tr>
					<?php	
					for($i=0;$i<$num_agrup;$i++)
					{
						$registro_agrup= mysql_fetch_array($sel_agrup);
						if($i%2==0){echo '<tr class="par">';}else{echo '<tr>';}
						echo '<td>'.$registro_agrup['id_tcursocf'].'</td>';
						echo '<td>'.$registro_agrup['fecha_inicio'].' </td>';
						echo '<td>'.$registro_agrup['fecha_fin'].' </td>';
						echo '<td>'.$registro_agrup['num_alumnos'].' </td>';
						echo '<td>'.$registro_agrup['num_horas'].' </td>';
						echo '<td>'.$registro_agrup['instructor'].'</td>';
						echo '<td>'.$registro_agrup['nombre'].'</td>';
						echo '<td>'.$registro_agrup['tipo_descripcion'].'</td>';
						echo '<td>'.$registro_agrup['capacitacion_nombre'].'</td>';
						echo '<td>'.$registro_agrup['sucursal_nombre'].'</td>';
						echo '<td>'.$registro_agrup['lugar_imparticion'].'</td>';	
						
						}
	break;
}
}
else 
{
		echo '<td><p class="centrado">
	<a target="_blank" href="../pdf/list_tcapacitacion.php" title="'.$id_excel.'"><img src="../imgs/excel_img.png" alt="'.$id_excel.'" /></a>
	</a></p></td>';
	$expedienteced=$_REQUEST["brigada"];
	$noRegistros = 200; //Registros por página
	$pagina = 1; //Por default, página = 1
	if($_GET["pagina"]) //Si hay página por ?pagina=valor, lo asigna
    $pagina = $_GET["pagina"];
	$agrupamiento = $_POST['agrupamiento'];
	//monto un select para listar los alumnos matriculados en el agrupamiento
		$sel_agrup = mysql_query("SELECT
                   tcursocf.*,tipocurso.tipo_descripcion,
                   centro_formativo.nombre AS nombre_centroformativo,sucursal.sucursal_nombre,tformacion.capacitacion_nombre
FROM
                          tcursocf
LEFT JOIN
			tipocurso  ON tcursocf.tipo_curso=tipocurso.tipo_curso_id
LEFT JOIN
	centro_formativo ON tcursocf.id_centro_formativo=centro_formativo.id_centro_formativo
LEFT JOIN
	sucursal ON centro_formativo.sucursal=sucursal.sucursal_id
LEFT JOIN
			tformacion ON tcursocf.edu_formal=tformacion.capacitacion_id
		 LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
		$num_agrup = mysql_num_rows($sel_agrup);
		echo'<br>';echo'<br>';echo'<br>';
		$sSQL = "SELECT count(*)
			
			FROM
                          tcursocf
LEFT JOIN
			tipocurso  ON tcursocf.tipo_curso=tipocurso.tipo_curso_id
LEFT JOIN
	centro_formativo ON tcursocf.id_centro_formativo=centro_formativo.id_centro_formativo
LEFT JOIN
	sucursal ON centro_formativo.sucursal=sucursal.sucursal_id
LEFT JOIN
			tformacion ON tcursocf.edu_formal=tformacion.capacitacion_id"; //Cuento el total de registros
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
        					echo "<a href=\"bus_tcapacitacion.php?pagina=".$i."\">  <font color=#000080><b>$i</b></font></a>";
						$vehiculo="";
				 }	
?>	
					<table width="500" align="center" class="tabla">
					<tr>
						<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">FECHA INICIO</td>
						<td class="tdatos">FECHA FIN</td>
						<td class="tdatos">NÚMERO ALUMNOS</td>
						<td class="tdatos">NÚMERO HORAS</td>
						<td class="tdatos">INSTRUCTOR</td>
						<td class="tdatos">NOMBRE CURSO</td>
						<td class="tdatos">FORMACIÓN</td>
						<td class="tdatos">CLASE</td>
						<td class="tdatos">SUCURSAL</td>
						<td class="tdatos">LUGAR IMPARTICION</td>
						
						
					</tr>
					<?php	
					for($i=0;$i<$num_agrup;$i++)
					{
						$registro_agrup= mysql_fetch_array($sel_agrup);
						if($i%2==0){echo '<tr class="par">';}else{echo '<tr>';}
						echo '<td>'.$registro_agrup['id_tcursocf'].'</td>';
						echo '<td>'.$registro_agrup['fecha_inicio'].' </td>';
						echo '<td>'.$registro_agrup['fecha_fin'].' </td>';
						echo '<td>'.$registro_agrup['num_alumnos'].' </td>';
						echo '<td>'.$registro_agrup['num_horas'].' </td>';
						echo '<td>'.$registro_agrup['instructor'].'</td>';
						echo '<td>'.$registro_agrup['nombre'].'</td>';
						echo '<td>'.$registro_agrup['tipo_descripcion'].'</td>';
						echo '<td>'.$registro_agrup['capacitacion_nombre'].'</td>';
						echo '<td>'.$registro_agrup['sucursal_nombre'].'</td>';
						echo '<td>'.$registro_agrup['lugar_imparticion'].'</td>';	
						
						}
}
echo '</table>';

echo"<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>