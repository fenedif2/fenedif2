<?php
session_start();
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><h6>MONITOREO USUARIOS</h6></div>
<div id="centercontent">
<div align="center">
<table>
<td>
<form action="bus_monitoreo.php">
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
<form action="bus_monitoreo.php">
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
<form action="bus_monitoreo.php">
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
<form action="bus_monitoreo.php">
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
	<a target="_blank" href="../pdf/list_usuario_todos.php?p1='.$sucursal_id.'&p2='.$estado.'
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
		$sel_agrup = mysql_query("SELECT
tusuario.*,
tipoidentificacion.tipoidentificacion_nombre,genero.genero_nombre,estadocivil.estadocivil_nombre,thijos.hijos_descripcion,
formaconocer.formaconocer_nombre,testadocf.estcfdescripcion,t_seguro.experiencia_nombre as tseguro,tiposeguro.tiposeguro_nombre,
tparroquia.pardescripcion,tipoparroquia.tipoparroquia_nombre,t_licencia.experiencia_nombre as licencia,tipolicencia.tipolicencia_nombre,
t_vehiculo.experiencia_nombre as vehiculo,t_adaptacion.experiencia_nombre as adaptacion,t_federacion.experiencia_nombre as federacion,
asociacion.asociacion_nombre,etnia.etnia_nombre
FROM
	tusuario
left join
	tipoidentificacion on tusuario.tipoidentificacion_id=tipoidentificacion.tipoidentificacion_id
left join
	genero on tusuario.genero=genero.genero_id
left join
	estadocivil on tusuario.id_estado_civil=estadocivil.estadocivil_id
left join
	thijos on tusuario.num_hijos=thijos.hijos_id
left join
	formaconocer on tusuario.forma_conocer=formaconocer.formaconocer_id
left join
	testadocf on tusuario.estado=testadocf.estcfcodigo
left join
	experiencia as t_seguro on tusuario.seguro=t_seguro.experiencia_id
left join
	tiposeguro on tusuario.tipo_seguro=tiposeguro.tiposeguro_id
left join
	tparroquia on tusuario.parcodigo=tparroquia.parcodigo
left join
	tipoparroquia on tusuario.sector=tipoparroquia.tipoparroquia_id
left join
	experiencia as t_licencia on tusuario.licencia=t_licencia.experiencia_id
left join
	tipolicencia on tusuario.tlicencia=tipolicencia.tipolicencia_id
left join
	experiencia as t_vehiculo on tusuario.vehiculo=t_vehiculo.experiencia_id
left join
	experiencia as t_adaptacion on tusuario.adaptacion_vehiculo=t_adaptacion.experiencia_id
left join
	experiencia as t_federacion on tusuario.federacion=t_federacion.experiencia_id
left join
	asociacion on tusuario.tfederacion=asociacion.asociacion_id
left join
	etnia on tusuario.etnia_id=etnia.etnia_id
where 
tusuario.id_sucursal='$sucursal_id' and tusuario.estado='$estado' and tusuario.fecha_ingreso>='$ini' and tusuario.fecha_ingreso<='$fin '
		 LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
		$num_agrup = mysql_num_rows($sel_agrup);
		echo'<br>';echo'<br>';echo'<br>';
		$sSQL = "SELECT count(*) FROM
	tusuario
left join
	tipoidentificacion on tusuario.tipoidentificacion_id=tipoidentificacion.tipoidentificacion_id
left join
	genero on tusuario.genero=genero.genero_id
left join
	estadocivil on tusuario.id_estado_civil=estadocivil.estadocivil_id
left join
	thijos on tusuario.num_hijos=thijos.hijos_id
left join
	formaconocer on tusuario.forma_conocer=formaconocer.formaconocer_id
left join
	testadocf on tusuario.estado=testadocf.estcfcodigo
left join
	experiencia as t_seguro on tusuario.seguro=t_seguro.experiencia_id
left join
	tiposeguro on tusuario.tipo_seguro=tiposeguro.tiposeguro_id
left join
	tparroquia on tusuario.parcodigo=tparroquia.parcodigo
left join
	tipoparroquia on tusuario.sector=tipoparroquia.tipoparroquia_id
left join
	experiencia as t_licencia on tusuario.licencia=t_licencia.experiencia_id
left join
	tipolicencia on tusuario.tlicencia=tipolicencia.tipolicencia_id
left join
	experiencia as t_vehiculo on tusuario.vehiculo=t_vehiculo.experiencia_id
left join
	experiencia as t_adaptacion on tusuario.adaptacion_vehiculo=t_adaptacion.experiencia_id
left join
	experiencia as t_federacion on tusuario.federacion=t_federacion.experiencia_id
left join
	asociacion on tusuario.tfederacion=asociacion.asociacion_id
left join
	etnia on tusuario.etnia_id=etnia.etnia_id
where 
tusuario.id_sucursal='$sucursal_id' and tusuario.estado='$estado' and tusuario.fecha_ingreso>='$ini' and tusuario.fecha_ingreso<='$fin '"; //Cuento el total de registros
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
        					echo "<a href=\"bus_monitoreo.php?busqueda=todos&sucursal_id=".$sucursal_id."
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
						<td class="tdatos">FIJO</td>
						<td class="tdatos">OBSERVACIÓN TELÉFONO</td>
						<td class="tdatos">TIENE LICENCIA</td>
						<td class="tdatos">TIPO LICENCIA</td>
						<td class="tdatos">VEHÍCULO</td>
						<td class="tdatos">ADAPTACIÓN</td>
						<td class="tdatos">TIPO ADAPTACIÓN</td>	
						<td class="tdatos">FEDERACIÓN</td>
						<td class="tdatos">TIPO FEDERACION</td>
						<td class="tdatos">ASOCIACIÓN</td>
						
						
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
		
						
						}
	break;
	
	case'sucursal':
				$sucursal_id=$_REQUEST["sucursal_id"];
		$estado=$_REQUEST["estado"];
		$ini=$_REQUEST["ini"];
		$fin=$_REQUEST["fin"];
	echo '<td><p class="centrado">
	<a target="_blank" href="../pdf/list_usuario_sucursal.php?p1='.$sucursal_id.'
	
	" title="'.$id_excel.'"><img src="../imgs/excel_img.png" alt="'.$id_excel.'" /></a>
	
	</a></p></td>';
	
	$noRegistros = 100; //Registros por página
	$pagina = 1; //Por default, página = 1
	if($_GET["pagina"]) //Si hay página por ?pagina=valor, lo asigna
    $pagina = $_GET["pagina"];
	$agrupamiento = $_POST['agrupamiento'];
	//monto un select para listar los alumnos matriculados en el agrupamiento
		$sel_agrup = mysql_query("SELECT
tusuario.*,
tipoidentificacion.tipoidentificacion_nombre,genero.genero_nombre,estadocivil.estadocivil_nombre,thijos.hijos_descripcion,
formaconocer.formaconocer_nombre,testadocf.estcfdescripcion,t_seguro.experiencia_nombre as tseguro,tiposeguro.tiposeguro_nombre,
tparroquia.pardescripcion,tipoparroquia.tipoparroquia_nombre,t_licencia.experiencia_nombre as licencia,tipolicencia.tipolicencia_nombre,
t_vehiculo.experiencia_nombre as vehiculo,t_adaptacion.experiencia_nombre as adaptacion,t_federacion.experiencia_nombre as federacion,
asociacion.asociacion_nombre,etnia.etnia_nombre
FROM
	tusuario
left join
	tipoidentificacion on tusuario.tipoidentificacion_id=tipoidentificacion.tipoidentificacion_id
left join
	genero on tusuario.genero=genero.genero_id
left join
	estadocivil on tusuario.id_estado_civil=estadocivil.estadocivil_id
left join
	thijos on tusuario.num_hijos=thijos.hijos_id
left join
	formaconocer on tusuario.forma_conocer=formaconocer.formaconocer_id
left join
	testadocf on tusuario.estado=testadocf.estcfcodigo
left join
	experiencia as t_seguro on tusuario.seguro=t_seguro.experiencia_id
left join
	tiposeguro on tusuario.tipo_seguro=tiposeguro.tiposeguro_id
left join
	tparroquia on tusuario.parcodigo=tparroquia.parcodigo
left join
	tipoparroquia on tusuario.sector=tipoparroquia.tipoparroquia_id
left join
	experiencia as t_licencia on tusuario.licencia=t_licencia.experiencia_id
left join
	tipolicencia on tusuario.tlicencia=tipolicencia.tipolicencia_id
left join
	experiencia as t_vehiculo on tusuario.vehiculo=t_vehiculo.experiencia_id
left join
	experiencia as t_adaptacion on tusuario.adaptacion_vehiculo=t_adaptacion.experiencia_id
left join
	experiencia as t_federacion on tusuario.federacion=t_federacion.experiencia_id
left join
	asociacion on tusuario.tfederacion=asociacion.asociacion_id
left join
	etnia on tusuario.etnia_id=etnia.etnia_id
where 
tusuario.id_sucursal='$sucursal_id' 
		 LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
		$num_agrup = mysql_num_rows($sel_agrup);
		echo'<br>';echo'<br>';echo'<br>';
		$sSQL = "SELECT count(*) FROM
	tusuario
left join
	tipoidentificacion on tusuario.tipoidentificacion_id=tipoidentificacion.tipoidentificacion_id
left join
	genero on tusuario.genero=genero.genero_id
left join
	estadocivil on tusuario.id_estado_civil=estadocivil.estadocivil_id
left join
	thijos on tusuario.num_hijos=thijos.hijos_id
left join
	formaconocer on tusuario.forma_conocer=formaconocer.formaconocer_id
left join
	testadocf on tusuario.estado=testadocf.estcfcodigo
left join
	experiencia as t_seguro on tusuario.seguro=t_seguro.experiencia_id
left join
	tiposeguro on tusuario.tipo_seguro=tiposeguro.tiposeguro_id
left join
	tparroquia on tusuario.parcodigo=tparroquia.parcodigo
left join
	tipoparroquia on tusuario.sector=tipoparroquia.tipoparroquia_id
left join
	experiencia as t_licencia on tusuario.licencia=t_licencia.experiencia_id
left join
	tipolicencia on tusuario.tlicencia=tipolicencia.tipolicencia_id
left join
	experiencia as t_vehiculo on tusuario.vehiculo=t_vehiculo.experiencia_id
left join
	experiencia as t_adaptacion on tusuario.adaptacion_vehiculo=t_adaptacion.experiencia_id
left join
	experiencia as t_federacion on tusuario.federacion=t_federacion.experiencia_id
left join
	asociacion on tusuario.tfederacion=asociacion.asociacion_id
left join
	etnia on tusuario.etnia_id=etnia.etnia_id
where 
tusuario.id_sucursal='$sucursal_id'"; //Cuento el total de registros
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
        					echo "<a href=\"bus_monitoreo.php?busqueda=sucursal&sucursal_id=".$sucursal_id."
        					
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
						<td class="tdatos">FIJO</td>
						<td class="tdatos">OBSERVACIÓN TELÉFONO</td>
						<td class="tdatos">TIENE LICENCIA</td>
						<td class="tdatos">TIPO LICENCIA</td>
						<td class="tdatos">VEHÍCULO</td>
						<td class="tdatos">ADAPTACIÓN</td>
						<td class="tdatos">TIPO ADAPTACIÓN</td>	
						<td class="tdatos">FEDERACIÓN</td>
						<td class="tdatos">TIPO FEDERACION</td>
						<td class="tdatos">ASOCIACIÓN</td>
						
						
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
		
						
						}
		
	break;
	case'estado':
				$sucursal_id=$_REQUEST["sucursal_id"];
		$estado=$_REQUEST["estado"];
		$ini=$_REQUEST["ini"];
		$fin=$_REQUEST["fin"];
	echo '<td><p class="centrado">
	<a target="_blank" href="../pdf/list_usuario_estado.php?p2='.$estado.'
	" title="'.$id_excel.'"><img src="../imgs/excel_img.png" alt="'.$id_excel.'" /></a>
	
	</a></p></td>';
	
	$noRegistros = 100; //Registros por página
	$pagina = 1; //Por default, página = 1
	if($_GET["pagina"]) //Si hay página por ?pagina=valor, lo asigna
    $pagina = $_GET["pagina"];
	$agrupamiento = $_POST['agrupamiento'];
	//monto un select para listar los alumnos matriculados en el agrupamiento
		$sel_agrup = mysql_query("SELECT
tusuario.*,
tipoidentificacion.tipoidentificacion_nombre,genero.genero_nombre,estadocivil.estadocivil_nombre,thijos.hijos_descripcion,
formaconocer.formaconocer_nombre,testadocf.estcfdescripcion,t_seguro.experiencia_nombre as tseguro,tiposeguro.tiposeguro_nombre,
tparroquia.pardescripcion,tipoparroquia.tipoparroquia_nombre,t_licencia.experiencia_nombre as licencia,tipolicencia.tipolicencia_nombre,
t_vehiculo.experiencia_nombre as vehiculo,t_adaptacion.experiencia_nombre as adaptacion,t_federacion.experiencia_nombre as federacion,
asociacion.asociacion_nombre,etnia.etnia_nombre
FROM
	tusuario
left join
	tipoidentificacion on tusuario.tipoidentificacion_id=tipoidentificacion.tipoidentificacion_id
left join
	genero on tusuario.genero=genero.genero_id
left join
	estadocivil on tusuario.id_estado_civil=estadocivil.estadocivil_id
left join
	thijos on tusuario.num_hijos=thijos.hijos_id
left join
	formaconocer on tusuario.forma_conocer=formaconocer.formaconocer_id
left join
	testadocf on tusuario.estado=testadocf.estcfcodigo
left join
	experiencia as t_seguro on tusuario.seguro=t_seguro.experiencia_id
left join
	tiposeguro on tusuario.tipo_seguro=tiposeguro.tiposeguro_id
left join
	tparroquia on tusuario.parcodigo=tparroquia.parcodigo
left join
	tipoparroquia on tusuario.sector=tipoparroquia.tipoparroquia_id
left join
	experiencia as t_licencia on tusuario.licencia=t_licencia.experiencia_id
left join
	tipolicencia on tusuario.tlicencia=tipolicencia.tipolicencia_id
left join
	experiencia as t_vehiculo on tusuario.vehiculo=t_vehiculo.experiencia_id
left join
	experiencia as t_adaptacion on tusuario.adaptacion_vehiculo=t_adaptacion.experiencia_id
left join
	experiencia as t_federacion on tusuario.federacion=t_federacion.experiencia_id
left join
	asociacion on tusuario.tfederacion=asociacion.asociacion_id
left join
	etnia on tusuario.etnia_id=etnia.etnia_id
where 
tusuario.estado='$estado' 
		 LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
		$num_agrup = mysql_num_rows($sel_agrup);
		echo'<br>';echo'<br>';echo'<br>';
		$sSQL = "SELECT count(*) FROM
	tusuario
left join
	tipoidentificacion on tusuario.tipoidentificacion_id=tipoidentificacion.tipoidentificacion_id
left join
	genero on tusuario.genero=genero.genero_id
left join
	estadocivil on tusuario.id_estado_civil=estadocivil.estadocivil_id
left join
	thijos on tusuario.num_hijos=thijos.hijos_id
left join
	formaconocer on tusuario.forma_conocer=formaconocer.formaconocer_id
left join
	testadocf on tusuario.estado=testadocf.estcfcodigo
left join
	experiencia as t_seguro on tusuario.seguro=t_seguro.experiencia_id
left join
	tiposeguro on tusuario.tipo_seguro=tiposeguro.tiposeguro_id
left join
	tparroquia on tusuario.parcodigo=tparroquia.parcodigo
left join
	tipoparroquia on tusuario.sector=tipoparroquia.tipoparroquia_id
left join
	experiencia as t_licencia on tusuario.licencia=t_licencia.experiencia_id
left join
	tipolicencia on tusuario.tlicencia=tipolicencia.tipolicencia_id
left join
	experiencia as t_vehiculo on tusuario.vehiculo=t_vehiculo.experiencia_id
left join
	experiencia as t_adaptacion on tusuario.adaptacion_vehiculo=t_adaptacion.experiencia_id
left join
	experiencia as t_federacion on tusuario.federacion=t_federacion.experiencia_id
left join
	asociacion on tusuario.tfederacion=asociacion.asociacion_id
left join
	etnia on tusuario.etnia_id=etnia.etnia_id
where 
tusuario.estado='$estado'"; //Cuento el total de registros
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
        					echo "<a href=\"bus_monitoreo.php?busqueda=estado&estado=".$estado."
        					
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
						<td class="tdatos">FIJO</td>
						<td class="tdatos">OBSERVACIÓN TELÉFONO</td>
						<td class="tdatos">TIENE LICENCIA</td>
						<td class="tdatos">TIPO LICENCIA</td>
						<td class="tdatos">VEHÍCULO</td>
						<td class="tdatos">ADAPTACIÓN</td>
						<td class="tdatos">TIPO ADAPTACIÓN</td>	
						<td class="tdatos">FEDERACIÓN</td>
						<td class="tdatos">TIPO FEDERACION</td>
						<td class="tdatos">ASOCIACIÓN</td>
						
						
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
		
						
						}
		
	break;
	case'rangofechas':
		$sucursal_id=$_REQUEST["sucursal_id"];
		$estado=$_REQUEST["estado"];
		$ini1=$_REQUEST["ini1"];
		$ffin=$_REQUEST["ffin"];
	echo '<td><p class="centrado">
	<a target="_blank" href="../pdf/list_usuario_fechas.php?p3='.$ini1.'
	&p4='.$ffin.'
	" title="'.$id_excel.'"><img src="../imgs/excel_img.png" alt="'.$id_excel.'" /></a>
	
	</a></p></td>';
	
	$noRegistros = 100; //Registros por página
	$pagina = 1; //Por default, página = 1
	if($_GET["pagina"]) //Si hay página por ?pagina=valor, lo asigna
    $pagina = $_GET["pagina"];
	$agrupamiento = $_POST['agrupamiento'];
	//monto un select para listar los alumnos matriculados en el agrupamiento
		$sel_agrup = mysql_query("SELECT
tusuario.*,
tipoidentificacion.tipoidentificacion_nombre,genero.genero_nombre,estadocivil.estadocivil_nombre,thijos.hijos_descripcion,
formaconocer.formaconocer_nombre,testadocf.estcfdescripcion,t_seguro.experiencia_nombre as tseguro,tiposeguro.tiposeguro_nombre,
tparroquia.pardescripcion,tipoparroquia.tipoparroquia_nombre,t_licencia.experiencia_nombre as licencia,tipolicencia.tipolicencia_nombre,
t_vehiculo.experiencia_nombre as vehiculo,t_adaptacion.experiencia_nombre as adaptacion,t_federacion.experiencia_nombre as federacion,
asociacion.asociacion_nombre,etnia.etnia_nombre
FROM
	tusuario
left join
	tipoidentificacion on tusuario.tipoidentificacion_id=tipoidentificacion.tipoidentificacion_id
left join
	genero on tusuario.genero=genero.genero_id
left join
	estadocivil on tusuario.id_estado_civil=estadocivil.estadocivil_id
left join
	thijos on tusuario.num_hijos=thijos.hijos_id
left join
	formaconocer on tusuario.forma_conocer=formaconocer.formaconocer_id
left join
	testadocf on tusuario.estado=testadocf.estcfcodigo
left join
	experiencia as t_seguro on tusuario.seguro=t_seguro.experiencia_id
left join
	tiposeguro on tusuario.tipo_seguro=tiposeguro.tiposeguro_id
left join
	tparroquia on tusuario.parcodigo=tparroquia.parcodigo
left join
	tipoparroquia on tusuario.sector=tipoparroquia.tipoparroquia_id
left join
	experiencia as t_licencia on tusuario.licencia=t_licencia.experiencia_id
left join
	tipolicencia on tusuario.tlicencia=tipolicencia.tipolicencia_id
left join
	experiencia as t_vehiculo on tusuario.vehiculo=t_vehiculo.experiencia_id
left join
	experiencia as t_adaptacion on tusuario.adaptacion_vehiculo=t_adaptacion.experiencia_id
left join
	experiencia as t_federacion on tusuario.federacion=t_federacion.experiencia_id
left join
	asociacion on tusuario.tfederacion=asociacion.asociacion_id
left join
	etnia on tusuario.etnia_id=etnia.etnia_id
where 
tusuario.fecha_ingreso>='$ini1' and tusuario.fecha_ingreso<='$ffin '
		 LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
		$num_agrup = mysql_num_rows($sel_agrup);
		echo'<br>';echo'<br>';echo'<br>';
		$sSQL = "SELECT count(*) FROM
	tusuario
left join
	tipoidentificacion on tusuario.tipoidentificacion_id=tipoidentificacion.tipoidentificacion_id
left join
	genero on tusuario.genero=genero.genero_id
left join
	estadocivil on tusuario.id_estado_civil=estadocivil.estadocivil_id
left join
	thijos on tusuario.num_hijos=thijos.hijos_id
left join
	formaconocer on tusuario.forma_conocer=formaconocer.formaconocer_id
left join
	testadocf on tusuario.estado=testadocf.estcfcodigo
left join
	experiencia as t_seguro on tusuario.seguro=t_seguro.experiencia_id
left join
	tiposeguro on tusuario.tipo_seguro=tiposeguro.tiposeguro_id
left join
	tparroquia on tusuario.parcodigo=tparroquia.parcodigo
left join
	tipoparroquia on tusuario.sector=tipoparroquia.tipoparroquia_id
left join
	experiencia as t_licencia on tusuario.licencia=t_licencia.experiencia_id
left join
	tipolicencia on tusuario.tlicencia=tipolicencia.tipolicencia_id
left join
	experiencia as t_vehiculo on tusuario.vehiculo=t_vehiculo.experiencia_id
left join
	experiencia as t_adaptacion on tusuario.adaptacion_vehiculo=t_adaptacion.experiencia_id
left join
	experiencia as t_federacion on tusuario.federacion=t_federacion.experiencia_id
left join
	asociacion on tusuario.tfederacion=asociacion.asociacion_id
left join
	etnia on tusuario.etnia_id=etnia.etnia_id
where 
tusuario.fecha_ingreso>='$ini1' and tusuario.fecha_ingreso<='$ffin '"; //Cuento el total de registros
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
        					echo "<a href=\"bus_monitoreo.php?busqueda=rangofechas&ini1=".$ini1."
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
						<td class="tdatos">FIJO</td>
						<td class="tdatos">OBSERVACIÓN TELÉFONO</td>
						<td class="tdatos">TIENE LICENCIA</td>
						<td class="tdatos">TIPO LICENCIA</td>
						<td class="tdatos">VEHÍCULO</td>
						<td class="tdatos">ADAPTACIÓN</td>
						<td class="tdatos">TIPO ADAPTACIÓN</td>	
						<td class="tdatos">FEDERACIÓN</td>
						<td class="tdatos">TIPO FEDERACION</td>
						<td class="tdatos">ASOCIACIÓN</td>
						
						
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
		
						
						}
		
	break;	
}
}
else 
{
	echo '<td><p class="centrado">
	<a target="_blank" href="../pdf/list_usuario.php" title="'.$id_excel.'"><img src="../imgs/excel_img.png" alt="'.$id_excel.'" /></a>
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
formaconocer.formaconocer_nombre,testadocf.estcfdescripcion,t_seguro.experiencia_nombre as tseguro,tiposeguro.tiposeguro_nombre,
tparroquia.pardescripcion,tipoparroquia.tipoparroquia_nombre,t_licencia.experiencia_nombre as licencia,tipolicencia.tipolicencia_nombre,
t_vehiculo.experiencia_nombre as vehiculo,t_adaptacion.experiencia_nombre as adaptacion,t_federacion.experiencia_nombre as federacion,
asociacion.asociacion_nombre,etnia.etnia_nombre
FROM
	tusuario
left join
	tipoidentificacion on tusuario.tipoidentificacion_id=tipoidentificacion.tipoidentificacion_id
left join
	genero on tusuario.genero=genero.genero_id
left join
	estadocivil on tusuario.id_estado_civil=estadocivil.estadocivil_id
left join
	thijos on tusuario.num_hijos=thijos.hijos_id
left join
	formaconocer on tusuario.forma_conocer=formaconocer.formaconocer_id
left join
	testadocf on tusuario.estado=testadocf.estcfcodigo
left join
	experiencia as t_seguro on tusuario.seguro=t_seguro.experiencia_id
left join
	tiposeguro on tusuario.tipo_seguro=tiposeguro.tiposeguro_id
left join
	tparroquia on tusuario.parcodigo=tparroquia.parcodigo
left join
	tipoparroquia on tusuario.sector=tipoparroquia.tipoparroquia_id
left join
	experiencia as t_licencia on tusuario.licencia=t_licencia.experiencia_id
left join
	tipolicencia on tusuario.tlicencia=tipolicencia.tipolicencia_id
left join
	experiencia as t_vehiculo on tusuario.vehiculo=t_vehiculo.experiencia_id
left join
	experiencia as t_adaptacion on tusuario.adaptacion_vehiculo=t_adaptacion.experiencia_id
left join
	experiencia as t_federacion on tusuario.federacion=t_federacion.experiencia_id
left join
	asociacion on tusuario.tfederacion=asociacion.asociacion_id
left join
	etnia on tusuario.etnia_id=etnia.etnia_id
		 LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
		$num_agrup = mysql_num_rows($sel_agrup);
		echo'<br>';echo'<br>';echo'<br>';
		$sSQL = "SELECT count(*) FROM tusuario"; //Cuento el total de registros
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
        					echo "<a href=\"bus_monitoreo.php?pagina=".$i."\">  <font color=#000080><b>$i</b></font></a>";
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
						<td class="tdatos">FIJO</td>
						<td class="tdatos">OBSERVACIÓN TELÉFONO</td>
						<td class="tdatos">TIENE LICENCIA</td>
						<td class="tdatos">TIPO LICENCIA</td>
						<td class="tdatos">VEHÍCULO</td>
						<td class="tdatos">ADAPTACIÓN</td>
						<td class="tdatos">TIPO ADAPTACIÓN</td>	
						<td class="tdatos">FEDERACIÓN</td>
						<td class="tdatos">TIPO FEDERACION</td>
						<td class="tdatos">ASOCIACIÓN</td>
						
						
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
							
						}
	
}
echo '</table>';

echo"<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>