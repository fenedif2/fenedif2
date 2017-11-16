<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><h6>AUDITORÍA USUARIOS INGRESADOS AL SISTEMA</h6></div>
<div id="centercontent">
<div align="center">
<table>
<td>
<form action="bus_auditoria.php">
	<input type="hidden" name="busqueda" value="usuario_cedula">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">SELECCIONE USUARIO</td>
			<tr>
			<?php
			echo '<td>
				
					<select name="usuario_cedula" id="usuario_cedula" >
					';	
					//listamos grupos para componer el select
					$consulta_brigada = mysql_query("SELECT * FROM usuario");
					$n_brigada = mysql_num_rows($consulta_brigada);
					echo '<option>SELECCIONE USUARIO</option>';
					for($d=0;$d<$n_brigada;$d++)
					{
					$reg_consulta_brigada = mysql_fetch_array($consulta_brigada);
					echo '<option value="'.$reg_consulta_brigada['usuario_cedula'].'">'.$reg_consulta_brigada['usuario_nombres'].' '.$reg_consulta_brigada['usuario_apellidos'].'</option>';
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
	case'usuario_cedula':
	$usuario_cedula=$_REQUEST["usuario_cedula"];
	echo '<td><p class="centrado">
	<a target="_blank" href="../pdf/list_audit.php?p1='.$usuario_cedula.'" title="'.$id_excel.'"><img src="../imgs/excel_img.png" alt="'.$id_excel.'" /></a>
	</a></p></td>';
	
	$noRegistros = 50; //Registros por página
	$pagina = 1; //Por default, página = 1
	if($_GET["pagina"]) //Si hay página por ?pagina=valor, lo asigna
    $pagina = $_GET["pagina"];
	$agrupamiento = $_POST['agrupamiento'];
	//monto un select para listar los alumnos matriculados en el agrupamiento
		$sel_agrup = mysql_query("SELECT
tauditoria.*,
usuario.usuario_nombres,usuario.usuario_apellidos,sucursal.sucursal_nombre
FROM
	tauditoria
left join
	usuario on tauditoria.usucuenta=usuario.usuario_cedula
left join
	sucursal on usuario.sucursal=sucursal.sucursal_id
where tauditoria.usucuenta='$usuario_cedula'
		 LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
		$num_agrup = mysql_num_rows($sel_agrup);
		echo'<br>';echo'<br>';echo'<br>';
		$sSQL = "SELECT count(*) FROM tauditoria where tauditoria.usucuenta='$usuario_cedula'"; //Cuento el total de registros
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
        					echo "<a href=\"bus_auditoria.php?busqueda=sucursal_id&sucursal_id=".$sucursal_id."&pagina=".$i."\">  <font color=#000080><b>$i</b></font></a>";
						$vehiculo="";
				 }	
?>	
					<table width="500" align="center" class="tabla">
					<tr>
						<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">ACCIÓN </td>
						<td class="tdatos">TABLA</td>
						<td class="tdatos">DESCRIPCIÓN</td>
						<td class="tdatos">FECHA</td>
						<td class="tdatos">NOMBRES y APELLIDOS</td>
						<td class="tdatos">SUCURSAL</td>
						
						
					</tr>
					<?php	
					for($i=0;$i<$num_agrup;$i++)
					{
						$registro_agrup= mysql_fetch_array($sel_agrup);
						if($i%2==0){echo '<tr class="par">';}else{echo '<tr>';}
						echo '<td>'.$registro_agrup['audcodigo'].'</td>';
						echo '<td>'.$registro_agrup['acccodigo'].' </td>';
						echo '<td>'.$registro_agrup['audtabla'].'</td>';
						echo '<td>'.$registro_agrup['auddescripcion'].' </td>';
						echo '<td>'.$registro_agrup['audfecha'].'</td>';
						echo '<td>'.$registro_agrup['usuario_nombres'].'  '.$registro_agrup['usuario_apellidos'].'</td>';
						echo '<td>'.$registro_agrup['sucursal_nombre'].' </td>';
					
						}
	
		
	break;
	
}
}
else 
{
	echo '<td><p class="centrado">
	<a target="_blank" href="../pdf/list_audit1.php" title="'.$id_excel.'"><img src="../imgs/excel_img.png" alt="'.$id_excel.'" /></a>
	</a></p></td>';
	$expedienteced=$_REQUEST["brigada"];
	$noRegistros = 200; //Registros por página
	$pagina = 1; //Por default, página = 1
	if($_GET["pagina"]) //Si hay página por ?pagina=valor, lo asigna
    $pagina = $_GET["pagina"];
	$agrupamiento = $_POST['agrupamiento'];
	//monto un select para listar los alumnos matriculados en el agrupamiento
		$sel_agrup = mysql_query("SELECT
tauditoria.*,
usuario.usuario_nombres,usuario.usuario_apellidos,sucursal.sucursal_nombre
FROM
	tauditoria
left join
	usuario on tauditoria.usucuenta=usuario.usuario_cedula
left join
	sucursal on usuario.sucursal=sucursal.sucursal_id
		 LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
		$num_agrup = mysql_num_rows($sel_agrup);
		echo'<br>';echo'<br>';echo'<br>';
		$sSQL = "SELECT count(*) FROM tauditoria"; //Cuento el total de registros
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
        					echo "<a href=\"bus_auditoria.php?pagina=".$i."\">  <font color=#000080><b>$i</b></font></a>";
						$vehiculo="";
				 }	
?>	
					<table width="500" align="center" class="tabla">
					<tr>
						<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">ACCIÓN </td>
						<td class="tdatos">TABLA</td>
						<td class="tdatos">DESCRIPCIÓN</td>
						<td class="tdatos">FECHA----------      </td>
						<td class="tdatos">NOMBRES APELLIDOS</td>
						<td class="tdatos">SUCURSAL</td>
						
						
					</tr>
					<?php	
					for($i=0;$i<$num_agrup;$i++)
					{
						$registro_agrup= mysql_fetch_array($sel_agrup);
						if($i%2==0){echo '<tr class="par">';}else{echo '<tr>';}
						echo '<td>'.$registro_agrup['audcodigo'].'</td>';
						echo '<td>'.$registro_agrup['acccodigo'].' </td>';
						echo '<td>'.$registro_agrup['audtabla'].'</td>';
						echo '<td>'.$registro_agrup['auddescripcion'].' </td>';
						echo '<td>'.$registro_agrup['audfecha'].'</td>';
						echo '<td>'.$registro_agrup['usuario_nombres'].'  '.$registro_agrup['usuario_apellidos'].'</td>';
						echo '<td>'.$registro_agrup['sucursal_nombre'].' </td>';
						
							
						}
	
}
echo '</table>';

echo"<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>