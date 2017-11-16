<?php
$bd_host="97.74.31.5";
$bd_usuario="fenedif2";
$bd_pass="kJwyArt#35gSned";
$bd_base="fenedif2";
session_start();
$con = mysql_connect($bd_host,$bd_usuario,$bd_pass);
mysql_select_db($bd_base,$con);
?>
<br />
<div class="titulo"><h6>MINITOREO USUARIOS</h6></div>
<div id="centercontent">
<div align="center">
<table>
<td>
<form action="bus_uc.php">
	<input type="hidden" name="busqueda" value="tipo_curso_id">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">SELECCIONE TIPO CURSO</td>
			<tr>
			<?php
			echo '<td>
				
					<select name="tipo_curso_id" id="tipo_curso_id" >
					';	
					//listamos grupos para componer el select
					$consulta_brigada = mysql_query("SELECT * FROM tipocurso");
					$n_brigada = mysql_num_rows($consulta_brigada);
					echo '<option>SELECCIONE TIPO CURSO</option>';
					for($d=0;$d<$n_brigada;$d++)
					{
					$reg_consulta_brigada = mysql_fetch_array($consulta_brigada);
					echo '<option value="'.$reg_consulta_brigada['tipo_curso_id'].'">'.$reg_consulta_brigada['tipo'].'</option>';
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
	case'tipo_curso_id':
	$tipo_curso_id=$_REQUEST["tipo_curso_id"];
	echo '<td><p class="centrado"> 
		<a target="_blank" href="grafico_uc.php" title="'.$id_grafico.'"><img src="../imgs/grafico_img.png" alt="'.$id_grafico.'" /></a>
	<a target="_blank" href="expedientes_excel.php" title="'.$id_pdf.'" >
	<img src="../imgs/excel_img.png" alt="'.$id_excel.'" />
	</a></p></td>';
	
	$noRegistros = 50; //Registros por página
	$pagina = 1; //Por default, página = 1
	if($_GET["pagina"]) //Si hay página por ?pagina=valor, lo asigna
    $pagina = $_GET["pagina"];
	$agrupamiento = $_POST['agrupamiento'];
	//monto un select para listar los alumnos matriculados en el agrupamiento
		$sel_agrup = mysql_query("SELECT
                    DISTINCT tusuariocurso.*,
		     tusuario.*,tipodiscapacidad_nombre,tcursocf.nombre,tipocurso.tipo_descripcion,genero.genero_nombre,tipocurso.tipo_curso_id
			
			FROM
                          tusuariocurso
left join
			tusuario on tusuariocurso.id_usuario=tusuario.id_usuario
left join
			tusuario_discapacidad on tusuario.id_usuario=tusuario_discapacidad.id_usuario
left join
			tipodiscapacidad  on tusuario_discapacidad.id_tipo_discapacidad=tipodiscapacidad.tipodiscapacidad_id
left join
			tcursocf  on tusuariocurso.id_curso=tcursocf.id_tcursocf
left join
			tipocurso  on tcursocf.tipo_curso=tipocurso.tipo_curso_id
left join
			genero  on tusuario.genero=genero.genero_id
where tipocurso.tipo_curso_id='$tipo_curso_id'
		 LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
		$num_agrup = mysql_num_rows($sel_agrup);
		echo'<br>';echo'<br>';echo'<br>';
		$sSQL = "SELECT count(*) FROM tusuario where tusuario.id_sucursal=$sucursal_id"; //Cuento el total de registros
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
        					echo "<a href=\"bus_uc.php?busqueda=sucursal_id&sucursal_id=".$sucursal_id."&pagina=".$i."\">  <font color=#000080><b>$i</b></font></a>";
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
	case'brigada':
	$expedienteced=$_REQUEST["brigada"];
		echo '<td><p class="centrado"> 
		<a target="_blank" href="grafico_usuarios.php" title="'.$id_grafico.'"><img src="../imgs/grafico_img.png" alt="'.$id_grafico.'" /></a>
	<a target="_blank" href="expedientes_excel.php" title="'.$id_pdf.'" >
	<img src="../imgs/excel_img.png" alt="'.$id_excel.'" />
	</a></p></td>';
	$noRegistros = 10; //Registros por página
	$pagina = 1; //Por default, página = 1
	if($_GET["pagina"]) //Si hay página por ?pagina=valor, lo asigna
    $pagina = $_GET["pagina"];
	$agrupamiento = $_POST['agrupamiento'];
	//monto un select para listar los alumnos matriculados en el agrupamiento
		$sel_agrup = mysql_query("select  expediente.expediente_id,expediente.expediente_nombre,expediente.expediente_codigo,expediente.expediente_cedula,
expediente.expediente_nombre as funcionario,respbrigada.nombres,respbrigada.apellidos,
expediente.expediente_sector,expediente.expediente_superficie,expediente.respbrigada_id,respbrigada.brigada_id
		,memo.memo_nombre,expediente.inicio,expediente.fin,brigada.brigada_nombre,expediente.avance,tprovincia.opcion as provincia,tcanton.opcion as canton,tparroquia.opcion as parroquia
		from expediente,respbrigada,memo,brigada,tprovincia,tcanton,tparroquia
		where expediente.respbrigada_id=respbrigada.respbrigada_id and 
		expediente.memo_id=memo.memo_id and respbrigada.brigada_id=brigada.brigada_id and
		expediente.provincia=tprovincia.id and expediente.canton=tcanton.id and expediente.parroquia=tparroquia.id and
respbrigada.brigada_id=$expedienteced
		 LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
		$num_agrup = mysql_num_rows($sel_agrup);
		echo'<br>';echo'<br>';echo'<br>';
		$sSQL = "SELECT count(*) FROM expediente"; //Cuento el total de registros
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
        					echo "<a href=\"bus_uc.php?busqueda=todos&pagina=".$i."\">  <font color=#000080><b>$i</b></font></p></a>";
						$vehiculo="";
				 }	
?>	
					<table width="500" align="center" class="tabla">
					<tr>
						<td class="tdatos">CODIGO</td>
						<td class="tdatos">EXPEDIENTE</td>
						<td class="tdatos">CÉDULA</td>
						<td class="tdatos">BENEFICIARIO</td>
						<td class="tdatos">NOMBRE Y APELLIDO RESPONSABLE</td>
						<td class="tdatos">PROVINCIA</td>
						<td class="tdatos">CANTON</td>
						<td class="tdatos">PARROQUIA</td>
						<td class="tdatos">MEMORÁNDUM</td>
						<td class="tdatos">FECHA INICIO</td>
						<td class="tdatos">FECHA FIN</td>	
						<td class="tdatos">BRIGADA</td>
						<td class="tdatos">PORCENTAJE</td>
						<td class="tdatos">ESTADO</td>
						<td class="tdatos">ARCHIVOS</td>
					</tr>
					<?php	
					for($i=0;$i<$num_agrup;$i++)
					{
					$registro_agrup= mysql_fetch_array($sel_agrup);
					$f_ini = $registro_agrup['inicio'];
					$f_fin = $registro_agrup['fin'];
					if($i%2==0){echo '<tr class="par">';}else{echo '<tr>';}
					echo '<td>'.$registro_agrup['expediente_id'].'</td>';
					echo '<td>'.$registro_agrup['expediente_codigo'].' </td>';
					echo '<td>'.$registro_agrup['expediente_cedula'].' </td>';
					echo '<td>'.$registro_agrup['funcionario'].' </td>';
					echo '<td>'.$registro_agrup['nombres'].'   '.$registro_agrup['apellidos'].'</td>';
					echo '<td>'.$registro_agrup['provincia'].' </td>';
					echo '<td>'.$registro_agrup['canton'].' </td>';
					echo '<td>'.$registro_agrup['parroquia'].' </td>';
					echo '<td>'.$registro_agrup['memo_nombre'].'</td>';
					echo '<td>'.$f_ini.'</td>';
					echo '<td>'.$f_fin.'</td>';
					echo '<td>'.$registro_agrup['brigada_nombre'].'</td>';
							
						$expediente_id=$registro_agrup['expediente_id'];
						$respbrigada=$registro_agrup['respbrigada_id'];
						$sel_act = mysql_query("SELECT procesos.proceso_id,procesos.proceso_nombre,procesos.avance,procesos.estado,procesos.expediente_id,respbrigada.nombres,respbrigada.apellidos,
						expediente.expediente_nombre,procesos.inicio,procesos.fin,brigada.brigada_nombre FROM procesos,expediente,respbrigada,brigada WHERE 
						expediente.respbrigada_id ='$respbrigada' and procesos.expediente_id='$expediente_id' AND 
						expediente.expediente_id = procesos.expediente_id 
						and respbrigada.respbrigada_id=procesos.respbrigada_id and
						respbrigada.brigada_id=brigada.brigada_id");
						$num_act = mysql_num_rows($sel_act);
						for($b=0;$b<$num_act;$b++)
							{
							$reg_act = mysql_fetch_array($sel_act);	
								$avan=$reg_act['avance'];
								$prom[]=($avan);	
							}//fin de for
							$suma_nota_media = array_sum($prom);
							$porcentaje=$suma_nota_media/$num_act;
						if($porcentaje>95)
						{
						
						echo '<td><font color="#00005C" >'.$porcentaje.' % Teminado... </font></td>';
						echo '<td><img src="../imgs/terminar.jpg"><td>';
						}
							else
								{
									;
									echo '<td><font color="#A3000A" >'.$porcentaje.' % En Proceso ...</font></td>';
									echo '<td><img src="../imgs/proceso.jpg"><td>';
								}
					
			
			
							echo '<span><a href="archivo.php?p1='.$registro_agrup['expediente_id'].'" title="'.$id_grafico.'"><img src="../imgs/tutoria.png" alt="'.$id_grafico.'"/></a></span>';echo '&nbsp;';
						}
	
		
	break;
}
}
else 
{
	echo '<td><p class="centrado"> 
		<a target="_blank" href="grafico_usuarios.php" title="'.$id_grafico.'"><img src="../imgs/grafico_img.png" alt="'.$id_grafico.'" /></a>
	<a target="_blank" href="expedientes_excel.php" title="'.$id_pdf.'" >
	<img src="../imgs/excel_img.png" alt="'.$id_excel.'" />
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
        					echo "<a href=\"bus_uc.php?pagina=".$i."\">  <font color=#000080><b>$i</b></font></a>";
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