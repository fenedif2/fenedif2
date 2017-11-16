<?php
session_start();
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><h6>MONITOREO EMPRESAS VISITADAS</h6></div>
<div id="centercontent">
<div align="center">
<table>
<td>
<form action="bus_empresa.php">
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
<form action="bus_empresa.php">
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
<form action="bus_empresa.php">
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
	<a target="_blank" href="../pdf/list_empresas_todos.php?p1='.$sucursal.'
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
                       tseguimientoemp.*,
			tempresa.nombre,sucursal.sucursal_nombre
			
			FROM
                           tseguimientoemp
INNER JOIN
			tempresa on tseguimientoemp.id_empresa=tempresa.id_empresa
INNER JOIN
			sucursal on tempresa.id_sucursal=sucursal.sucursal_id
where 
			tempresa.id_sucursal='$sucursal' and tseguimientoemp.fecha >='$ini' and  tseguimientoemp.fecha <='$fin'
			and tseguimientoemp.asunto LIKE  'V%'
		 LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
		$num_agrup = mysql_num_rows($sel_agrup);
		echo'<br>';echo'<br>';echo'<br>';
		$sSQL = "SELECT count(*)
                 
			
			FROM
                           tseguimientoemp
INNER JOIN
			tempresa on tseguimientoemp.id_empresa=tempresa.id_empresa
INNER JOIN
			sucursal on tempresa.id_sucursal=sucursal.sucursal_id
where 
			tempresa.id_sucursal='$sucursal' and tseguimientoemp.fecha >='$ini' and  tseguimientoemp.fecha <='$fin' and
			tseguimientoemp.asunto LIKE  'V%'"; //Cuento el total de registros
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
        					echo "<a href=\"bus_empresa.php?busqueda=todos&sucursal_id=".$sucursal."&ini=".$ini."&fin=".$fin."&pagina=".$i."\">  <font color=#000080><b>$i</b></font></a>";
						$vehiculo="";
				 }	
?>	
					<table width="500" align="center" class="tabla">
					<tr>
						<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">FECHA</td>
						<td class="tdatos">CONTACTO</td>
						<td class="tdatos">ASUNTO</td>
						<td class="tdatos">EMPRESA</td>
						<td class="tdatos">SUCURSAL</td>
						
						
						
					</tr>
					<?php	
					for($i=0;$i<$num_agrup;$i++)
					{
						$registro_agrup= mysql_fetch_array($sel_agrup);
						if($i%2==0){echo '<tr class="par">';}else{echo '<tr>';}
						echo '<td>'.$registro_agrup['id_seguimientoemp'].'</td>';
						echo '<td>'.$registro_agrup['fecha'].' </td>';
						echo '<td>'.$registro_agrup['contacto'].' '.$registro_agrup['apellido_materno'].' '.$registro_agrup['primer_nombre'].' '.$registro_agrup['segundo_nombre'].'</td>';
						echo '<td>'.$registro_agrup['asunto'].' </td>';
						echo '<td>'.$registro_agrup['nombre'].'</td>';
						echo '<td>'.$registro_agrup['sucursal_nombre'].'</td>';
							
						
						}
	
		
	break;
	case'sucursal':
		$ini=$_REQUEST["ini"];
		$fin=$_REQUEST["fin"];
		$sucursal=$_REQUEST["sucursal_id"];
	
	echo '<td><p class="centrado">
	<a target="_blank" href="../pdf/list_empresas_sucursal.php?p1='.$sucursal.'
	" title="'.$id_excel.'"><img src="../imgs/excel_img.png" alt="'.$id_excel.'" /></a>
	
	</a></p></td>';
	
	$noRegistros = 50; //Registros por página
	$pagina = 1; //Por default, página = 1
	if($_GET["pagina"]) //Si hay página por ?pagina=valor, lo asigna
    $pagina = $_GET["pagina"];
	//monto un select para listar los alumnos matriculados en el agrupamiento
		$sel_agrup = mysql_query("SELECT
                       tseguimientoemp.*,
			tempresa.nombre,sucursal.sucursal_nombre
			
			FROM
                           tseguimientoemp
INNER JOIN
			tempresa on tseguimientoemp.id_empresa=tempresa.id_empresa
INNER JOIN
			sucursal on tempresa.id_sucursal=sucursal.sucursal_id
where 
			tempresa.id_sucursal='$sucursal' 
			and tseguimientoemp.asunto LIKE  'V%'
		 LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
		$num_agrup = mysql_num_rows($sel_agrup);
		echo'<br>';echo'<br>';echo'<br>';
		$sSQL = "SELECT count(*)
                 
			
			FROM
                           tseguimientoemp
INNER JOIN
			tempresa on tseguimientoemp.id_empresa=tempresa.id_empresa
INNER JOIN
			sucursal on tempresa.id_sucursal=sucursal.sucursal_id
where 
			tempresa.id_sucursal='$sucursal' and
			tseguimientoemp.asunto LIKE  'V%'"; //Cuento el total de registros
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
        					echo "<a href=\"bus_empresa.php?busqueda=todos&sucursal_id=".$sucursal."&pagina=".$i."\">  <font color=#000080><b>$i</b></font></a>";
						$vehiculo="";
				 }	
?>	
					<table width="500" align="center" class="tabla">
					<tr>
						<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">FECHA</td>
						<td class="tdatos">CONTACTO</td>
						<td class="tdatos">ASUNTO</td>
						<td class="tdatos">EMPRESA</td>
						<td class="tdatos">SUCURSAL</td>
						
						
						
					</tr>
					<?php	
					for($i=0;$i<$num_agrup;$i++)
					{
						$registro_agrup= mysql_fetch_array($sel_agrup);
						if($i%2==0){echo '<tr class="par">';}else{echo '<tr>';}
						echo '<td>'.$registro_agrup['id_seguimientoemp'].'</td>';
						echo '<td>'.$registro_agrup['fecha'].' </td>';
						echo '<td>'.$registro_agrup['contacto'].' '.$registro_agrup['apellido_materno'].' '.$registro_agrup['primer_nombre'].' '.$registro_agrup['segundo_nombre'].'</td>';
						echo '<td>'.$registro_agrup['asunto'].' </td>';
						echo '<td>'.$registro_agrup['nombre'].'</td>';
						echo '<td>'.$registro_agrup['sucursal_nombre'].'</td>';
							
						
						}
	
	break;
	case'rangofechas':
		$ini1=$_REQUEST["ini1"];
	$ffin=$_REQUEST["ffin"];
	$sucursal=$_REQUEST["sucursal_id"];
	
	echo '<td><p class="centrado">
	<a target="_blank" href="../pdf/list_empresas_fechas.php?p3='.$ini1.'
	&p4='.$ffin.'
	" title="'.$id_excel.'"><img src="../imgs/excel_img.png" alt="'.$id_excel.'" /></a>
	
	</a></p></td>';
	
	$noRegistros = 50; //Registros por página
	$pagina = 1; //Por default, página = 1
	if($_GET["pagina"]) //Si hay página por ?pagina=valor, lo asigna
    $pagina = $_GET["pagina"];
	//monto un select para listar los alumnos matriculados en el agrupamiento
		$sel_agrup = mysql_query("SELECT
                       tseguimientoemp.*,
			tempresa.nombre,sucursal.sucursal_nombre
			
			FROM
                           tseguimientoemp
INNER JOIN
			tempresa on tseguimientoemp.id_empresa=tempresa.id_empresa
INNER JOIN
			sucursal on tempresa.id_sucursal=sucursal.sucursal_id
where 
			tseguimientoemp.fecha >='$ini1' and  tseguimientoemp.fecha <='$ffin'
			and tseguimientoemp.asunto LIKE  'V%'
		 LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
		$num_agrup = mysql_num_rows($sel_agrup);
		echo'<br>';echo'<br>';echo'<br>';
		$sSQL = "SELECT count(*)
                 
			
			FROM
                           tseguimientoemp
INNER JOIN
			tempresa on tseguimientoemp.id_empresa=tempresa.id_empresa
INNER JOIN
			sucursal on tempresa.id_sucursal=sucursal.sucursal_id
where 
			tseguimientoemp.fecha >='$ini1' and  tseguimientoemp.fecha <='$ffin' and
			tseguimientoemp.asunto LIKE  'V%'"; //Cuento el total de registros
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
        					echo "<a href=\"bus_empresa.php?busqueda=rangofechas&ini1=".$ini1."&ffin=".$ffin."&pagina=".$i."\">  <font color=#000080><b>$i</b></font></a>";
						$vehiculo="";
				 }	
?>	
					<table width="500" align="center" class="tabla">
					<tr>
						<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">FECHA</td>
						<td class="tdatos">CONTACTO</td>
						<td class="tdatos">ASUNTO</td>
						<td class="tdatos">EMPRESA</td>
						<td class="tdatos">SUCURSAL</td>
						
						
						
					</tr>
					<?php	
					for($i=0;$i<$num_agrup;$i++)
					{
						$registro_agrup= mysql_fetch_array($sel_agrup);
						if($i%2==0){echo '<tr class="par">';}else{echo '<tr>';}
						echo '<td>'.$registro_agrup['id_seguimientoemp'].'</td>';
						echo '<td>'.$registro_agrup['fecha'].' </td>';
						echo '<td>'.$registro_agrup['contacto'].' '.$registro_agrup['apellido_materno'].' '.$registro_agrup['primer_nombre'].' '.$registro_agrup['segundo_nombre'].'</td>';
						echo '<td>'.$registro_agrup['asunto'].' </td>';
						echo '<td>'.$registro_agrup['nombre'].'</td>';
						echo '<td>'.$registro_agrup['sucursal_nombre'].'</td>';
							
						
						}
	
	break;
}
}
else 
{
	echo '<td><p class="centrado">
	<a target="_blank" href="../pdf/list_empresa_todos.php?p1='.$sucursal_id.'&p2='.$estado.'
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
                       tseguimientoemp.*,
			tempresa.nombre,sucursal.sucursal_nombre
			
			FROM
                           tseguimientoemp
INNER JOIN
			tempresa on tseguimientoemp.id_empresa=tempresa.id_empresa
INNER JOIN
			sucursal on tempresa.id_sucursal=sucursal.sucursal_id
where tseguimientoemp.asunto LIKE  'V%'
		 LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
		$num_agrup = mysql_num_rows($sel_agrup);
		echo'<br>';echo'<br>';echo'<br>';
		$sSQL = "SELECT
                      count(*)
			
			FROM
                           tseguimientoemp
INNER JOIN
			tempresa on tseguimientoemp.id_empresa=tempresa.id_empresa
INNER JOIN
			sucursal on tempresa.id_sucursal=sucursal.sucursal_id
where tseguimientoemp.asunto LIKE  'V%'
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
        					echo "<a href=\"bus_empresa.php?pagina=".$i."\">  <font color=#000080><b>$i</b></font></a>";
						$vehiculo="";
				 }	
?>	
					<table width="500" align="center" class="tabla">
					<tr>
						<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">FECHA</td>
						<td class="tdatos">CONTACTO</td>
						<td class="tdatos">ASUNTO</td>
						<td class="tdatos">EMPRESA</td>
						<td class="tdatos">SUCURSAL</td>
						
						
						
					</tr>
					<?php	
					for($i=0;$i<$num_agrup;$i++)
					{
						$registro_agrup= mysql_fetch_array($sel_agrup);
						if($i%2==0){echo '<tr class="par">';}else{echo '<tr>';}
						echo '<td>'.$registro_agrup['id_seguimientoemp'].'</td>';
						echo '<td>'.$registro_agrup['fecha'].' </td>';
						echo '<td>'.$registro_agrup['contacto'].' '.$registro_agrup['apellido_materno'].' '.$registro_agrup['primer_nombre'].' '.$registro_agrup['segundo_nombre'].'</td>';
						echo '<td>'.$registro_agrup['asunto'].' </td>';
						echo '<td>'.$registro_agrup['nombre'].'</td>';
						echo '<td>'.$registro_agrup['sucursal_nombre'].'</td>';
							
						
						}
}
echo '</table>';

echo"<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>