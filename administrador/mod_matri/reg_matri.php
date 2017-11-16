<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><H6>ASIGNAR FUNCIONARIOS A PROYECTO</H6></div>
<?php
/************************************************************
****************** Eliminar Registros ***********************
************************************************************/
$docente= $_SESSION["login"];
if(strtolower($_POST["del"]) == "eliminar")
{
	$sqldelexp = "delete from agrupamientos where agrupamiento='".$_REQUEST["agrupamiento"]."'";
	
	if(  mysql_query($sqldelexp, $con)  )
	{
			cuadro_mensaje("Datos Eliminados Correctamente...");
			 			echo "<br><br><br><br><br>";
						require("../theme/footer_inicio.php");
						exit;
			
	}
	
}

/************************************************************
****************** Editar Registros ***********************
************************************************************/
if (strtolower($_REQUEST["acc"])=="guardar")
{
				
			$sql="update agrupamientos set nombre='".$_REQUEST["nombre"]."',docente='".$_REQUEST["docente"]."',
			uoi='".$_REQUEST["uoi"]."',inicio='".$_REQUEST["inicio"]."',fin='".$_REQUEST["fin"]."',conv_nombre='".$_REQUEST["conv_nombre"]."',
			investigacion='".$_REQUEST["investigacion"]."' ,unesco='".$_REQUEST["unesco"]."' ,presupuesto='".$_REQUEST["presupuesto"]."',
			solicitado='".$_REQUEST["solicitado"]."',linvestigacion='".$_REQUEST["linvestigacion"]."',fondos='".$_REQUEST["fondos"]."'
			where agrupamiento='".$_REQUEST["agrupamiento"]."' ";
			if(mysql_query($sql,$con))
			{
					cuadro_mensaje("PROYECTO actualizado correctamente...");
					 echo "<br><br><br><br><br>";
					require("../theme/footer_inicio.php");
					exit;
						
			}
			else
			{
			cuadro_error(mysql_error());
			}
		//////////////

		
}
?>
<form action="reg_matri.php" method="post">
	<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">SELECCIONE LOS FUNCIONARIOS QUE CONFORMARAN EL PROYECTO</td>
			<tr>
				<?php
				echo '<td>
					<select multiple class="floatcenter" name="codigo[]" id="codigo" ondblclick="abreFicha()" >
					';	
					//listamos grupos para componer el select
					$sel_alumnos = mysql_query("select codigo,nombre,apellidos,sueldo from alumnado order by apellidos,nombre");
					$num_alumnos = mysql_num_rows($sel_alumnos);
					for($n=0;$n<$num_alumnos;$n++)
						{
						$reg_alumnos = mysql_fetch_array($sel_alumnos);
						//$inserta_matri = mysql_query("insert into matricula values ('','','$n')");
						echo '
						<option value="'.$reg_alumnos['codigo'].'">'.$reg_alumnos['apellidos'].' '.$reg_alumnos['nombre'].'
						</option>';
						}
     				echo '</select>
				</td>
			</tr>
		</tr>
	</table>
<br>	
<table align="center" class="tabla">
		<tr>
			<td colspan="2" align="center">SELECCIONE EL PROYECTO</td>
			<tr>
			<td>';
				
					$sel_agrup = mysql_query("select * from agrupamientos");
					$num_agrup = mysql_num_rows($sel_agrup);
					echo '<select class="floatleft" name="agrupamiento" id="agrupamiento" onchange="matriculaAlumnos()">';
					echo '<option>SELECCIONE UN PROYECTO</option>';
					for($i=0;$i<$num_agrup;$i++)
						{
						$reg_agrup = mysql_fetch_array($sel_agrup);
						echo '<option value="'.$reg_agrup['agrupamiento'].'">'.$reg_agrup['agrupamiento'].'('.$reg_agrup['nombre'].' '.$reg_agrup['docente'].')</option>';
						}
				echo '	
				</select>
			</td>
				<tr>
					<td colspan="2" align="center"><input type="submit" name="acc" value="Asignar funcionarios a proyecto">    
			    </tr>
			</tr>
		</tr>
	</table>	
</form>';

//busqueda en la base de datos
if($_POST["codigo"]!="")
{

if($_POST['agrupamiento'] !="SELECCIONE UN PROYECTO")
 {
	
	$agrupamiento = $_POST['agrupamiento'];
	$alum_matri = $_POST['codigo'];
	$alum_sueldo = $reg_alumnos1['sueldo'];
	//recogemos alumnos
	for ($i=0;$i<count($alum_matri);$i++)
		{ 
		//matriculamos
		$codigo_matri = $alum_matri[$i];
		//$alum_sueldo = $reg_alumnos1['sueldo'];
		$inserta_matri = mysql_query("insert into matricula values ('','$codigo_matri','$agrupamiento','','','','','')");
		
		}
	
	//////////////////////////////////////////////////////////////////////////////////
	

	$sel_alum = mysql_query("select alumnado.nombre,alumnado.apellidos,alumnado.codigo,matricula.codigo,matricula.agrupamiento from alumnado,matricula where alumnado.codigo=matricula.codigo and matricula.agrupamiento='$agrupamiento' order by alumnado.apellidos,alumnado.nombre");
	$num_alum = mysql_num_rows($sel_alum);
	echo '<p class="negrita_cursiva">'.$id_resultado.' '.$id_de.' '.$id_mat_mas.'</p>';
	echo '<table class="tablacentrada">';
	echo '</br>';
	echo '<tr class="encab">';
	echo '<td>'.$id_agr.' '.$agrupamiento.'</td>';
	echo '</tr>';
	for($j=0;$j<$num_alum;$j++)
		{
		$n=$j+1;
		$reg_alum = mysql_fetch_array($sel_alum);
		echo '<tr>';
		echo '<td>'.$n.' '.$reg_alum['nombre'].' '.$reg_alum['apellidos'].'</td>';
		echo '</tr>';
		}
	echo '</table>	
		</tr>
	</table>
</form>';

}else{
	echo "<br>";
	cuadro_error("ESCOJA EL PROYECTO <b><a href=reg_matri.php  target=\"_self\">    Ir a Registrar</a></b>");	
}
}
else 
{
echo "<br>";
	cuadro_error("SELCCIONE LOS FUNCIONARIOS <b><a href=reg_matri.php  target=\"_self\">    Ir a Registrar</a></b>");		
$agrupamiento = $_POST['agrupamiento'];
	$sel_alum = mysql_query("select alumnado.nombre,alumnado.apellidos,alumnado.codigo,matricula.codigo,matricula.agrupamiento 
	from alumnado,matricula where alumnado.codigo=matricula.codigo 
	and matricula.agrupamiento='$agrupamiento' order by alumnado.apellidos,alumnado.nombre");
	$num_alum = mysql_num_rows($sel_alum);
	//echo '<p class="negrita_cursiva">'.$id_resultado.' '.$id_de.' '.$id_mat_mas.'</p>';
	echo '<table align="center" class="tabla">';
	echo '<td colspan="2" align="center">'.$id_agr.' '.$agrupamiento.'</td>';
	
	for($j=0;$j<$num_alum;$j++)
		{
		$n=$j+1;
		$reg_alum = mysql_fetch_array($sel_alum);
		echo '<tr>';
		echo '<td>'.$n.' '.$reg_alum['nombre'].' '.$reg_alum['apellidos'].'</td>';
		
		}	
	echo '</tr>';	
		echo '</table>';	
	
}
?>

<?php
 echo "<br><br><br><br><br>";
require("../theme/footer_inicio.php");
?>
