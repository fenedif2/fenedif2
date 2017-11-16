<?php
session_start();
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><h6>MONITOREO EMPRESAS</h6></div>
<div id="centercontent">
<div align="center">
<table>
<td>
<form action="bus_empresasucursal.php">
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
<form action="bus_empresasucursal.php">
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
<form action="bus_empresasucursal.php">
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
	<a target="_blank" href="../pdf/list_empresas_suc_todos.php?p1='.$sucursal.'
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
tempresa.*,
tactividad.tactividad_descripcion,parqueadero.experiencia_nombre as parqueadero,transporte.experiencia_nombre as transporte,
tipocformativo.tipocformativo_nombre,poseeweb.experiencia_nombre as poseeweb,testadousuario.estusudescripcion,sucursal.sucursal_nombre,
tdirempresa.cprincipal,tdirempresa.transversal,tdirempresa.fijo,tdirempresa.fijo2,tdirempresa.fax,
tcontactoemp.nombre_emp,tcontactoemp.cargo_emp,tcontactoemp.celular_emp,tcontactoemp.email_emp
FROM
	tempresa
left join
	tactividad on tempresa.actividad_id=tactividad.tactividad_id
left join
	experiencia as parqueadero on tempresa.parqueadero=parqueadero.experiencia_id
left join
	experiencia as transporte on tempresa.transporte=transporte.experiencia_id
left join
	tipocformativo on tempresa.id_tipo_empresa=tipocformativo.tipocformativo_id
left join
	experiencia as poseeweb on tempresa.poseesitio=poseeweb.experiencia_id
left join
	testadousuario on tempresa.estado=testadousuario.estusucodigo
left join
	sucursal on tempresa.id_sucursal=sucursal.sucursal_id
left join
	tdirempresa on tempresa.id_empresa=tdirempresa.id_empresa
left join
	tcontactoemp on tempresa.id_empresa=tcontactoemp.tempresa_id
where 
tempresa.id_sucursal='$sucursal' and tempresa.fecha_ingreso >='$ini' and  tempresa.fecha_ingreso <='$fin'
		 LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
		$num_agrup = mysql_num_rows($sel_agrup);
		echo'<br>';echo'<br>';echo'<br>';
		$sSQL = "SELECT count(*)
FROM
	tempresa
left join
	tactividad on tempresa.actividad_id=tactividad.tactividad_id
left join
	experiencia as parqueadero on tempresa.parqueadero=parqueadero.experiencia_id
left join
	experiencia as transporte on tempresa.transporte=transporte.experiencia_id
left join
	tipocformativo on tempresa.id_tipo_empresa=tipocformativo.tipocformativo_id
left join
	experiencia as poseeweb on tempresa.poseesitio=poseeweb.experiencia_id
left join
	testadousuario on tempresa.estado=testadousuario.estusucodigo
left join
	sucursal on tempresa.id_sucursal=sucursal.sucursal_id
left join
	tdirempresa on tempresa.id_empresa=tdirempresa.id_empresa
left join
	tcontactoemp on tempresa.id_empresa=tcontactoemp.tempresa_id
where 
tempresa.id_sucursal='$sucursal' and tempresa.fecha_ingreso >='$ini' and  tempresa.fecha_ingreso <='$fin'"; //Cuento el total de registros
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
        					echo "<a href=\"bus_empresasucursal.php?busqueda=todos&sucursal_id=".$sucursal."&ini=".$ini."&fin=".$fin."&pagina=".$i."\">  <font color=#000080><b>$i</b></font></a>";
						$vehiculo="";
				 }	
?>	
					<table width="500" align="center" class="tabla">
					<tr>
						<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">FECHA</td>
						<td class="tdatos">TIPO ACTIVIDAD</td>
						<td class="tdatos">TIPO EMPRESA</td>
						<td class="tdatos">EMPRESA</td>
						<td class="tdatos">CALLE PRINCIPAL</td>
						<td class="tdatos">TRANSVERSAL</td>
						<td class="tdatos">T. FIJO1</td>
						<td class="tdatos">T. FIJO2</td>
						<td class="tdatos">FAX</td>
						<td class="tdatos">NOMBRE CONTACTO EMPRESA</td>
						<td class="tdatos">CARGO CONTACTO</td>
						<td class="tdatos">CELULAR CONTACTO</td>
						<td class="tdatos">EMAIL-CONTACTO</td>
						<td class="tdatos">SUCURSAL</td>
						
						
						
					</tr>
					<?php	
					for($i=0;$i<$num_agrup;$i++)
					{
						$registro_agrup= mysql_fetch_array($sel_agrup);
						if($i%2==0){echo '<tr class="par">';}else{echo '<tr>';}
						echo '<td>'.$registro_agrup['id_empresa'].'</td>';
						echo '<td>'.$registro_agrup['fecha_ingreso'].' </td>';
						echo '<td>'.$registro_agrup['tactividad_descripcion'].'</td>';
						echo '<td>'.$registro_agrup['tipocformativo_nombre'].' </td>';
						echo '<td>'.$registro_agrup['nombre'].'</td>';
						echo '<td>'.$registro_agrup['cprincipal'].' </td>';
						echo '<td>'.$registro_agrup['transversal'].'</td>';
						echo '<td>'.$registro_agrup['fijo'].' </td>';
						echo '<td>'.$registro_agrup['fijo2'].'</td>';
						echo '<td>'.$registro_agrup['fax'].' </td>';
						echo '<td>'.$registro_agrup['nombre_emp'].'</td>';
						echo '<td>'.$registro_agrup['cargo_emp'].' </td>';
						echo '<td>'.$registro_agrup['celular_emp'].'</td>';
						echo '<td>'.$registro_agrup['email_emp'].'</td>';
						echo '<td>'.$registro_agrup['sucursal_nombre'].'</td>';
							
						
						}
	
		
	break;
	case'sucursal':
		$ini=$_REQUEST["ini"];
		$fin=$_REQUEST["fin"];
		$sucursal=$_REQUEST["sucursal_id"];
	
	echo '<td><p class="centrado">
	<a target="_blank" href="../pdf/list_empresas_suc_sucursal.php?p1='.$sucursal.'
	" title="'.$id_excel.'"><img src="../imgs/excel_img.png" alt="'.$id_excel.'" /></a>
	
	</a></p></td>';
	
	$noRegistros = 50; //Registros por página
	$pagina = 1; //Por default, página = 1
	if($_GET["pagina"]) //Si hay página por ?pagina=valor, lo asigna
    $pagina = $_GET["pagina"];
	//monto un select para listar los alumnos matriculados en el agrupamiento
		$sel_agrup = mysql_query("SELECT 
tempresa.*,
tactividad.tactividad_descripcion,parqueadero.experiencia_nombre as parqueadero,transporte.experiencia_nombre as transporte,
tipocformativo.tipocformativo_nombre,poseeweb.experiencia_nombre as poseeweb,testadousuario.estusudescripcion,sucursal.sucursal_nombre,
tdirempresa.cprincipal,tdirempresa.transversal,tdirempresa.fijo,tdirempresa.fijo2,tdirempresa.fax,
tcontactoemp.nombre_emp,tcontactoemp.cargo_emp,tcontactoemp.celular_emp,tcontactoemp.email_emp
FROM
	tempresa
left join
	tactividad on tempresa.actividad_id=tactividad.tactividad_id
left join
	experiencia as parqueadero on tempresa.parqueadero=parqueadero.experiencia_id
left join
	experiencia as transporte on tempresa.transporte=transporte.experiencia_id
left join
	tipocformativo on tempresa.id_tipo_empresa=tipocformativo.tipocformativo_id
left join
	experiencia as poseeweb on tempresa.poseesitio=poseeweb.experiencia_id
left join
	testadousuario on tempresa.estado=testadousuario.estusucodigo
left join
	sucursal on tempresa.id_sucursal=sucursal.sucursal_id
left join
	tdirempresa on tempresa.id_empresa=tdirempresa.id_empresa
left join
	tcontactoemp on tempresa.id_empresa=tcontactoemp.tempresa_id
where 
tempresa.id_sucursal='$sucursal'
		 LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
		$num_agrup = mysql_num_rows($sel_agrup);
		echo'<br>';echo'<br>';echo'<br>';
		$sSQL = "SELECT count(*)
FROM
	tempresa
left join
	tactividad on tempresa.actividad_id=tactividad.tactividad_id
left join
	experiencia as parqueadero on tempresa.parqueadero=parqueadero.experiencia_id
left join
	experiencia as transporte on tempresa.transporte=transporte.experiencia_id
left join
	tipocformativo on tempresa.id_tipo_empresa=tipocformativo.tipocformativo_id
left join
	experiencia as poseeweb on tempresa.poseesitio=poseeweb.experiencia_id
left join
	testadousuario on tempresa.estado=testadousuario.estusucodigo
left join
	sucursal on tempresa.id_sucursal=sucursal.sucursal_id
left join
	tdirempresa on tempresa.id_empresa=tdirempresa.id_empresa
left join
	tcontactoemp on tempresa.id_empresa=tcontactoemp.tempresa_id
where 
tempresa.id_sucursal='$sucursal'"; //Cuento el total de registros
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
        					echo "<a href=\"bus_empresasucursal.php?busqueda=sucursal&sucursal_id=".$sucursal."&pagina=".$i."\">  <font color=#000080><b>$i</b></font></a>";
						$vehiculo="";
				 }	
?>	
					<table width="500" align="center" class="tabla">
					<tr>
						<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">FECHA</td>
						<td class="tdatos">TIPO ACTIVIDAD</td>
						<td class="tdatos">TIPO EMPRESA</td>
						<td class="tdatos">EMPRESA</td>
						<td class="tdatos">CALLE PRINCIPAL</td>
						<td class="tdatos">TRANSVERSAL</td>
						<td class="tdatos">T. FIJO1</td>
						<td class="tdatos">T. FIJO2</td>
						<td class="tdatos">FAX</td>
						<td class="tdatos">NOMBRE CONTACTO EMPRESA</td>
						<td class="tdatos">CARGO CONTACTO</td>
						<td class="tdatos">CELULAR CONTACTO</td>
						<td class="tdatos">EMAIL-CONTACTO</td>
						<td class="tdatos">SUCURSAL</td>
						
						
						
					</tr>
					<?php	
					for($i=0;$i<$num_agrup;$i++)
					{
						$registro_agrup= mysql_fetch_array($sel_agrup);
						if($i%2==0){echo '<tr class="par">';}else{echo '<tr>';}
						echo '<td>'.$registro_agrup['id_empresa'].'</td>';
						echo '<td>'.$registro_agrup['fecha_ingreso'].' </td>';
						echo '<td>'.$registro_agrup['tactividad_descripcion'].'</td>';
						echo '<td>'.$registro_agrup['tipocformativo_nombre'].' </td>';
						echo '<td>'.$registro_agrup['nombre'].'</td>';
						echo '<td>'.$registro_agrup['cprincipal'].' </td>';
						echo '<td>'.$registro_agrup['transversal'].'</td>';
						echo '<td>'.$registro_agrup['fijo'].' </td>';
						echo '<td>'.$registro_agrup['fijo2'].'</td>';
						echo '<td>'.$registro_agrup['fax'].' </td>';
						echo '<td>'.$registro_agrup['nombre_emp'].'</td>';
						echo '<td>'.$registro_agrup['cargo_emp'].' </td>';
						echo '<td>'.$registro_agrup['celular_emp'].'</td>';
						echo '<td>'.$registro_agrup['email_emp'].'</td>';
						echo '<td>'.$registro_agrup['sucursal_nombre'].'</td>';
							
						
						}
	
	break;
	case'rangofechas':
		$ini1=$_REQUEST["ini1"];
	$ffin=$_REQUEST["ffin"];
	$sucursal=$_REQUEST["sucursal_id"];
	
	echo '<td><p class="centrado">
	<a target="_blank" href="../pdf/list_empresas_suc_fechas.php?p3='.$ini1.'
	&p4='.$ffin.'
	" title="'.$id_excel.'"><img src="../imgs/excel_img.png" alt="'.$id_excel.'" /></a>
	
	</a></p></td>';
	$noRegistros = 50; //Registros por página
	$pagina = 1; //Por default, página = 1
	if($_GET["pagina"]) //Si hay página por ?pagina=valor, lo asigna
    $pagina = $_GET["pagina"];
	//monto un select para listar los alumnos matriculados en el agrupamiento
		$sel_agrup = mysql_query("SELECT 
tempresa.*,
tactividad.tactividad_descripcion,parqueadero.experiencia_nombre as parqueadero,transporte.experiencia_nombre as transporte,
tipocformativo.tipocformativo_nombre,poseeweb.experiencia_nombre as poseeweb,testadousuario.estusudescripcion,sucursal.sucursal_nombre,
tdirempresa.cprincipal,tdirempresa.transversal,tdirempresa.fijo,tdirempresa.fijo2,tdirempresa.fax,
tcontactoemp.nombre_emp,tcontactoemp.cargo_emp,tcontactoemp.celular_emp,tcontactoemp.email_emp
FROM
	tempresa
left join
	tactividad on tempresa.actividad_id=tactividad.tactividad_id
left join
	experiencia as parqueadero on tempresa.parqueadero=parqueadero.experiencia_id
left join
	experiencia as transporte on tempresa.transporte=transporte.experiencia_id
left join
	tipocformativo on tempresa.id_tipo_empresa=tipocformativo.tipocformativo_id
left join
	experiencia as poseeweb on tempresa.poseesitio=poseeweb.experiencia_id
left join
	testadousuario on tempresa.estado=testadousuario.estusucodigo
left join
	sucursal on tempresa.id_sucursal=sucursal.sucursal_id
left join
	tdirempresa on tempresa.id_empresa=tdirempresa.id_empresa
left join
	tcontactoemp on tempresa.id_empresa=tcontactoemp.tempresa_id
where 
tempresa.fecha_ingreso >='$ini1' and  tempresa.fecha_ingreso <='$ffin'
		 LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
		$num_agrup = mysql_num_rows($sel_agrup);
		echo'<br>';echo'<br>';echo'<br>';
		$sSQL = "SELECT count(*)
FROM
	tempresa
left join
	tactividad on tempresa.actividad_id=tactividad.tactividad_id
left join
	experiencia as parqueadero on tempresa.parqueadero=parqueadero.experiencia_id
left join
	experiencia as transporte on tempresa.transporte=transporte.experiencia_id
left join
	tipocformativo on tempresa.id_tipo_empresa=tipocformativo.tipocformativo_id
left join
	experiencia as poseeweb on tempresa.poseesitio=poseeweb.experiencia_id
left join
	testadousuario on tempresa.estado=testadousuario.estusucodigo
left join
	sucursal on tempresa.id_sucursal=sucursal.sucursal_id
left join
	tdirempresa on tempresa.id_empresa=tdirempresa.id_empresa
left join
	tcontactoemp on tempresa.id_empresa=tcontactoemp.tempresa_id
where 
tempresa.fecha_ingreso >='$ini1' and  tempresa.fecha_ingreso <='$ffin'"; //Cuento el total de registros
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
        					echo "<a href=\"bus_empresasucursal.php?busqueda=rangofechas&ini1=".$ini1."&ffin=".$ffin."&pagina=".$i."\">  <font color=#000080><b>$i</b></font></a>";
						$vehiculo="";
				 }	
?>	
					<table width="500" align="center" class="tabla">
					<tr>
						<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">FECHA</td>
						<td class="tdatos">TIPO ACTIVIDAD</td>
						<td class="tdatos">TIPO EMPRESA</td>
						<td class="tdatos">EMPRESA</td>
						<td class="tdatos">CALLE PRINCIPAL</td>
						<td class="tdatos">TRANSVERSAL</td>
						<td class="tdatos">T. FIJO1</td>
						<td class="tdatos">T. FIJO2</td>
						<td class="tdatos">FAX</td>
						<td class="tdatos">NOMBRE CONTACTO EMPRESA</td>
						<td class="tdatos">CARGO CONTACTO</td>
						<td class="tdatos">CELULAR CONTACTO</td>
						<td class="tdatos">EMAIL-CONTACTO</td>
						<td class="tdatos">SUCURSAL</td>
						
						
						
					</tr>
					<?php	
					for($i=0;$i<$num_agrup;$i++)
					{
						$registro_agrup= mysql_fetch_array($sel_agrup);
						if($i%2==0){echo '<tr class="par">';}else{echo '<tr>';}
						echo '<td>'.$registro_agrup['id_empresa'].'</td>';
						echo '<td>'.$registro_agrup['fecha_ingreso'].' </td>';
						echo '<td>'.$registro_agrup['tactividad_descripcion'].'</td>';
						echo '<td>'.$registro_agrup['tipocformativo_nombre'].' </td>';
						echo '<td>'.$registro_agrup['nombre'].'</td>';
						echo '<td>'.$registro_agrup['cprincipal'].' </td>';
						echo '<td>'.$registro_agrup['transversal'].'</td>';
						echo '<td>'.$registro_agrup['fijo'].' </td>';
						echo '<td>'.$registro_agrup['fijo2'].'</td>';
						echo '<td>'.$registro_agrup['fax'].' </td>';
						echo '<td>'.$registro_agrup['nombre_emp'].'</td>';
						echo '<td>'.$registro_agrup['cargo_emp'].' </td>';
						echo '<td>'.$registro_agrup['celular_emp'].'</td>';
						echo '<td>'.$registro_agrup['email_emp'].'</td>';
						echo '<td>'.$registro_agrup['sucursal_nombre'].'</td>';
							
						
						}
	
	break;
}
}
else 
{
	echo '<td><p class="centrado">
	<a target="_blank" href="../pdf/list_empresas_sucursal_todos.php?p1='.$sucursal_id.'&p2='.$estado.'
	&p3='.$ini.'
	&p4='.$fin.'
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
tempresa.*,
tactividad.tactividad_descripcion,parqueadero.experiencia_nombre as parqueadero,transporte.experiencia_nombre as transporte,
tipocformativo.tipocformativo_nombre,poseeweb.experiencia_nombre as poseeweb,testadousuario.estusudescripcion,sucursal.sucursal_nombre,
tdirempresa.cprincipal,tdirempresa.transversal,tdirempresa.fijo,tdirempresa.fijo2,tdirempresa.fax,
tcontactoemp.nombre_emp,tcontactoemp.cargo_emp,tcontactoemp.celular_emp,tcontactoemp.email_emp
FROM
	tempresa
left join
	tactividad on tempresa.actividad_id=tactividad.tactividad_id
left join
	experiencia as parqueadero on tempresa.parqueadero=parqueadero.experiencia_id
left join
	experiencia as transporte on tempresa.transporte=transporte.experiencia_id
left join
	tipocformativo on tempresa.id_tipo_empresa=tipocformativo.tipocformativo_id
left join
	experiencia as poseeweb on tempresa.poseesitio=poseeweb.experiencia_id
left join
	testadousuario on tempresa.estado=testadousuario.estusucodigo
left join
	sucursal on tempresa.id_sucursal=sucursal.sucursal_id
left join
	tdirempresa on tempresa.id_empresa=tdirempresa.id_empresa
left join
	tcontactoemp on tempresa.id_empresa=tcontactoemp.tempresa_id
		 LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
		$num_agrup = mysql_num_rows($sel_agrup);
		echo'<br>';echo'<br>';echo'<br>';
		$sSQL = "SELECT
                      count(*) FROM
	tempresa
left join
	tactividad on tempresa.actividad_id=tactividad.tactividad_id
left join
	experiencia as parqueadero on tempresa.parqueadero=parqueadero.experiencia_id
left join
	experiencia as transporte on tempresa.transporte=transporte.experiencia_id
left join
	tipocformativo on tempresa.id_tipo_empresa=tipocformativo.tipocformativo_id
left join
	experiencia as poseeweb on tempresa.poseesitio=poseeweb.experiencia_id
left join
	testadousuario on tempresa.estado=testadousuario.estusucodigo
left join
	sucursal on tempresa.id_sucursal=sucursal.sucursal_id
left join
	tdirempresa on tempresa.id_empresa=tdirempresa.id_empresa
left join
	tcontactoemp on tempresa.id_empresa=tcontactoemp.tempresa_id
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
        					echo "<a href=\"bus_empresasucursal.php?pagina=".$i."\">  <font color=#000080><b>$i</b></font></a>";
						$vehiculo="";
				 }	
?>	
					<table width="500" align="center" class="tabla">
					<tr>
						<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">FECHA</td>
						<td class="tdatos">TIPO ACTIVIDAD</td>
						<td class="tdatos">TIPO EMPRESA</td>
						<td class="tdatos">EMPRESA</td>
						<td class="tdatos">CALLE PRINCIPAL</td>
						<td class="tdatos">TRANSVERSAL</td>
						<td class="tdatos">T. FIJO1</td>
						<td class="tdatos">T. FIJO2</td>
						<td class="tdatos">FAX</td>
						<td class="tdatos">NOMBRE CONTACTO EMPRESA</td>
						<td class="tdatos">CARGO CONTACTO</td>
						<td class="tdatos">CELULAR CONTACTO</td>
						<td class="tdatos">EMAIL-CONTACTO</td>
						<td class="tdatos">SUCURSAL</td>
						
						
						
					</tr>
					<?php	
					for($i=0;$i<$num_agrup;$i++)
					{
						$registro_agrup= mysql_fetch_array($sel_agrup);
						if($i%2==0){echo '<tr class="par">';}else{echo '<tr>';}
						echo '<td>'.$registro_agrup['id_empresa'].'</td>';
						echo '<td>'.$registro_agrup['fecha_ingreso'].' </td>';
						echo '<td>'.$registro_agrup['tactividad_descripcion'].'</td>';
						echo '<td>'.$registro_agrup['tipocformativo_nombre'].' </td>';
						echo '<td>'.$registro_agrup['nombre'].'</td>';
						echo '<td>'.$registro_agrup['cprincipal'].' </td>';
						echo '<td>'.$registro_agrup['transversal'].'</td>';
						echo '<td>'.$registro_agrup['fijo'].' </td>';
						echo '<td>'.$registro_agrup['fijo2'].'</td>';
						echo '<td>'.$registro_agrup['fax'].' </td>';
						echo '<td>'.$registro_agrup['nombre_emp'].'</td>';
						echo '<td>'.$registro_agrup['cargo_emp'].' </td>';
						echo '<td>'.$registro_agrup['celular_emp'].'</td>';
						echo '<td>'.$registro_agrup['email_emp'].'</td>';
						echo '<td>'.$registro_agrup['sucursal_nombre'].'</td>';
							
						
						}
}
echo '</table>';

echo"<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>