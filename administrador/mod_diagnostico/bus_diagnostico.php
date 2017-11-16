<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><h6>CONSULTA DE DIAGNOSTICO</h6></div>
<div id="centercontent">
<div align="center">
<table>
<td>
<form action="bus_diagnostico.php">
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
<form action="bus_diagnostico.php">
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
	case'tdiagnostico_id':
	$resultado=mysql_query("select * from tdiagnostico where tdiagnostico_id='".quitar($_REQUEST["tdiagnostico_id"])."'  ",$con);

	if(mysql_num_rows($resultado) == 1)
	{
		$tdiagnostico_id=mysql_result($resultado,0,"tdiagnostico_id");
		$tdiagnostico_descripcion=mysql_result($resultado,0,"tdiagnostico_descripcion");
		
	}
	break;
	case'pnombre':
	$resultado=mysql_query("select * from tdiagnostico where tdiagnostico_descripcion like '".strtoupper($_REQUEST["pnombre"])."' ",$con);
	break;
	case'apellidop':
	$resultado=mysql_query("select * from paciente where apellidop like '".strtoupper($_REQUEST["apellidop"])."' order by ced desc",$con);
	break;
	case'todos':
	$resultado=mysql_query("select * from tdiagnostico");
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
	if($_REQUEST["busqueda"]=="tdiagnostico_id")
	{
		?>
		
		<form action="../mod_impresion/imp_linvest.php" method="post"  target="_blank">
		<br />
		<table width="500" align="center"  class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS DE DIAGNOSTICO</h3></td>
		</tr>
		<tr>
			<td>1. REGISTRO DE DIAGNOSTICO</td>
		</tr>
		<tr>
			<td class="tdatos">Código:</td>
			<td class="dtabla">
			 <input type="hidden" name="tdiagnostico_id" value="<?php echo $tdiagnostico_id; ?>"><?php echo $tdiagnostico_id; ?></input></td>
		</tr>
		<tr>
			<td class="tdatos">Nombre DIAGNOSTICO:</td>
			<td class="dtabla">
			<input type="hidden" name="tdiagnostico_descripcion" value="<?php echo $tdiagnostico_descripcion; ?>"><?php echo $tdiagnostico_descripcion; ?></input></td>
		</tr>
		<?php 
		echo '<tr>
			<td colspan="2" align="center" class="cdato">
			<input type="button" value="Eliminar" onclick="location.href='."'".'elim_etnica.php?tdiagnostico_id=tdiagnostico_id&tdiagnostico_id='.$tdiagnostico_id."'".'">
			<input type="button" value="Actualizar Datos" onclick="location.href='."'".'act_linvest.php?tdiagnostico_id=tdiagnostico_id&tdiagnostico_id='.$tdiagnostico_id."'".'">
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
						<td class="tdatos">NOMNRE DE DIAGNOSTICO</td>
					</tr>
			<?php
				while ($row=mysql_fetch_assoc($resultado))
				{
					echo "<tr>
					<td class=\"tdatos\"><a href=\"elim_diagnostico.php?busqueda=tdiagnostico_id&tdiagnostico_id=".$row["tdiagnostico_id"]."\"><img src=../theme/images/user-delete-2.ico></a></td>
					<td class=\"tdatos\"><a href=\"bus_diagnostico.php?busqueda=tdiagnostico_id&tdiagnostico_id=".$row["tdiagnostico_id"]."\">".$row["tdiagnostico_id"]."</a></td>
					<td class=\"cdato\">".$row["tdiagnostico_descripcion"]."</td>";
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
						<td class="tdatos">NOMNRE DE DIAGNOSTICO..</td>
						
														
					</tr>
			<?php
				while ($row=mysql_fetch_assoc($resultado))
				{
					echo "<tr>
					<td class=\"tdatos\"><a href=\"elim_diagnostico.php?busqueda=tdiagnostico_id&tdiagnostico_id=".$row["tdiagnostico_id"]."\"><img src=../theme/images/user-delete-2.ico></a></td>
					<td class=\"tdatos\"><a href=\"bus_diagnostico.php?busqueda=tdiagnostico_id&tdiagnostico_id=".$row["tdiagnostico_id"]."\">".$row["tdiagnostico_id"]."</a></td>
					<td class=\"cdato\">".$row["tdiagnostico_descripcion"]."</td>";
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
			cuadro_error("DIAGNOSTICO: <b>".$_REQUEST["tdiagnostico_descripcion"]."</b> No Registrado  <b><a href=reg_uoi.php target=\"_self\">Registrar?</a></b>"); ///colocar un enlace para registrar a la persona
		}
}	
echo "<br><br>";
require("../theme/footer_inicio.php");
?>