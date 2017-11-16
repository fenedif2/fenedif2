<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><h6>CONSULTA DE ESTADI CIVIL</h6></div>
<div id="centercontent">
<div align="center">
<table>
<td>
<form action="bus_civil.php">
		<input type="hidden" name="busqueda" value="pnombre">
		<table class="tabla">
		<tr>
			<td colspan="2" align="center">Ingrese Nombre</td>
		</tr>
		<tr>
			<td><input type="text" name="pnombre" value="<?php echo $_REQUEST["pnombre"]; ?>" size="20"></td>
			<td><input type="submit" value="Buscar"></td>
		</tr>
		</table>
</form>
</td>
<td>
<form action="bus_civil.php">
		<input type="hidden" name="busqueda" value="todos">
		<table class="tabla">
		<tr>
			<td colspan="2" align="center">Todos</td>
		</tr>
		<tr>
			
			<td><input type="submit" value="Buscar"></td>
		</tr>
		</table>
</form>
</td>
<tr>
</table>
</div>
<br />
<div align="center">
<?php
if($_REQUEST["busqueda"]!="")
{
switch($_REQUEST["busqueda"])
{
	case'tcivil_id':
	$resultado=mysql_query("select * from tcivil where tcivil_id='".quitar($_REQUEST["tcivil_id"])."'  ",$con);

	if(mysql_num_rows($resultado) == 1)
	{
		$tcivil_id=mysql_result($resultado,0,"tcivil_id");
		$tcivil_descripcion=mysql_result($resultado,0,"tcivil_descripcion");
		
	}
	break;
	case'pnombre':
	$resultado=mysql_query("select * from tcivil where tcivil_descripcion like '".strtoupper($_REQUEST["pnombre"])."' ",$con);
	break;
	case'apellidop':
	$resultado=mysql_query("select * from paciente where apellidop like '".strtoupper($_REQUEST["apellidop"])."' order by ced desc",$con);
	break;
	case'todos':
	$resultado=mysql_query("select * from tcivil");
	break;
	case'ambato':
	$resultado=mysql_query("SELECT * FROM paciente WHERE extencion='AMBATO' ORDER BY apellidop");
	break;
	case'quito':
	$resultado=mysql_query("SELECT * FROM paciente WHERE extencion='QUITO' ORDER BY apellidop");
	break;	
}

if(mysql_num_rows($resultado)>0)
{
	if($_REQUEST["busqueda"]=="tcivil_id")
	{
		?>
		
		<form action="../mod_impresion/imp_linvest.php" method="post"  target="_blank">
		<br />
		<table width="500" align="center"  class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS DEL ESTADO CIVIL</h3></td>
		</tr>
		<tr>
			<td>1. REGISTRO DEL ESTADO CIVIL</td>
		</tr>
		<tr>
			<td class="tdatos">Código:</td>
			<td class="dtabla">
			 <input type="hidden" name="tcivil_id" value="<?php echo $tcivil_id; ?>"><?php echo $tcivil_id; ?></input></td>
		</tr>
		<tr>
			<td class="tdatos">Nombre del Estado Civil:</td>
			<td class="dtabla">
			<input type="hidden" name="tcivil_descripcion" value="<?php echo $tcivil_descripcion; ?>"><?php echo $tcivil_descripcion; ?></input></td>
		</tr>
		<?php 
		echo '<tr>
			<td colspan="2" align="center" class="cdato">
			<input type="button" value="Eliminar" onclick="location.href='."'".'elim_etnica.php?tcivil_id=tcivil_id&tcivil_id='.$tcivil_id."'".'">
			<input type="button" value="Actualizar Datos" onclick="location.href='."'".'act_linvest.php?tcivil_id=tcivil_id&tcivil_id='.$tcivil_id."'".'">
			&nbsp; <input type="submit" name="imp"  value="" class="imprimir"></td>
		</tr>';
		?>
		</td>
		</table>
		<?php
}
	else ///genera una lista de todos los resultados que encuentra en la base de datos.
		{
			if($_REQUEST["busqueda"]=="todos")
			{
			?>
					<table width="500" align="center" class="tabla">
					<tr>
						<td class="tdatos">ELIMINAR</td>
						<td class="tdatos">CODIGO</td>
						<td class="tdatos">NOMNRE DEL ESTADO CIVIL</td>
					</tr>
			<?php
				while ($row=mysql_fetch_assoc($resultado))
				{
					echo "<tr>
					<td class=\"tdatos\"><a href=\"elim_civil.php?busqueda=tcivil_id&tcivil_id=".$row["tcivil_id"]."\"><img src=../theme/images/user-delete-2.ico></a></td>
					<td class=\"tdatos\"><a href=\"bus_civil.php?busqueda=tcivil_id&tcivil_id=".$row["tcivil_id"]."\">".$row["tcivil_id"]."</a></td>
					<td class=\"cdato\">".$row["tcivil_descripcion"]."</td>";
				$vehiculo="";
				
				}
				}
			else
			{
					?>
					<table width="500" align="center" class="tabla">
					<tr>
						<td class="tdatos">ELIMINAR</td>
						<td class="tdatos">CODIGO</td>
						<td class="tdatos">NOMNRE DEL ESTADO CIVIL..</td>
						
														
					</tr>
			<?php
				while ($row=mysql_fetch_assoc($resultado))
				{
					echo "<tr>
					<td class=\"tdatos\"><a href=\"elim_civil.php?busqueda=tcivil_id&tcivil_id=".$row["tcivil_id"]."\"><img src=../theme/images/user-delete-2.ico></a></td>
					<td class=\"tdatos\"><a href=\"bus_civil.php?busqueda=tcivil_id&tcivil_id=".$row["tcivil_id"]."\">".$row["tcivil_id"]."</a></td>
					<td class=\"cdato\">".$row["tcivil_descripcion"]."</td>";
				$vehiculo="";
				
				}
			}
		}

?>
</table>

</form>
<?php			
	}
		else///mensaje de error cuando no encuentra ningun registro en la base de datos
		{
			echo "<br>";
			cuadro_error("ESTADO CIVIL: <b>".$_REQUEST["tcivil_descripcion"]."</b> No Registrado  <b><a href=reg_uoi.php target=\"_self\">Registrar?</a></b>"); ///colocar un enlace para registrar a la persona
		}
}	
echo "<br><br>";
require("../theme/footer_inicio.php");
?>