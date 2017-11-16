<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><h6>CONSULTA TIPO DE TÉCNICO</h6></div>
<div id="centercontent">
<div align="center">
<table>
<td>
<form action="bus_ttecnico.php">
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
<form action="bus_ttecnico.php">
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
	case'ttecnico_id':
	$resultado=mysql_query("select * from ttecnico where ttecnico_id='".quitar($_REQUEST["ttecnico_id"])."'  ",$con);

	if(mysql_num_rows($resultado) == 1)
	{
		$ttecnico_id=mysql_result($resultado,0,"ttecnico_id");
		$ttecnico_nombre=mysql_result($resultado,0,"ttecnico_nombre");
		
	}
	break;
	case'pnombre':
	$resultado=mysql_query("select * from ttecnico where ttecnico_nombre like '".strtoupper($_REQUEST["pnombre"])."' ",$con);
	break;
	case'apellidop':
	$resultado=mysql_query("select * from paciente where apellidop like '".strtoupper($_REQUEST["apellidop"])."' order by ced desc",$con);
	break;
	case'todos':
	$resultado=mysql_query("select * from ttecnico");
	break;
}

if(mysql_num_rows($resultado)>0)
{
	if($_REQUEST["busqueda"]=="ttecnico_id")
	{
		?>
		
		<form action="../mod_impresion/imp_ttecnico.php" method="post"  target="_blank">
		<br />
		<table width="500" align="center"  class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS DE TIPO DE TÉCNICO</h3></td>
		</tr>
		<tr>
			<td>1. REGISTRO DE TIPO DE TÉCNICO</td>
		</tr>
		<tr>
			<td class="tdatos">Código:</td>
			<td class="dtabla">
			 <input type="hidden" name="ttecnico_id" value="<?php echo $ttecnico_id; ?>"><?php echo $ttecnico_id; ?></input></td>
		</tr>
		<tr>
			<td class="tdatos">Nombre de tipo de Técnico:</td>
			<td class="dtabla">
			<input type="hidden" name="ttecnico_nombre" value="<?php echo $ttecnico_nombre; ?>"><?php echo $ttecnico_nombre; ?></input></td>
		</tr>
		<?php 
		echo '<tr>
			<td colspan="2" align="center" class="cdato">
			<input type="button" value="Eliminar" onclick="location.href='."'".'elim_ttecnico.php?ttecnico_id=ttecnico_id&ttecnico_id='.$ttecnico_id."'".'">
			<input type="button" value="Actualizar Datos" onclick="location.href='."'".'act_ttecnico.php?ttecnico_id=ttecnico_id&ttecnico_id='.$ttecnico_id."'".'">
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
						<td class="tdatos">NOMNRE DE TIPO DE TÉCNICO</td>
					</tr>
			<?php
				while ($row=mysql_fetch_assoc($resultado))
				{
					echo "<tr>
					<td class=\"tdatos\"><a href=\"elim_ttecnico.php?busqueda=ttecnico_id&ttecnico_id=".$row["ttecnico_id"]."\"><img src=../theme/images/user-delete-2.ico></a></td>
					<td class=\"tdatos\"><a href=\"bus_ttecnico.php?busqueda=ttecnico_id&ttecnico_id=".$row["ttecnico_id"]."\">".$row["ttecnico_id"]."</a></td>
					<td class=\"cdato\">".$row["ttecnico_nombre"]."</td>";
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
						<td class="tdatos">NOMNRE DE TIPO DE TÉCNICO</td>
						
														
					</tr>
			<?php
				while ($row=mysql_fetch_assoc($resultado))
				{
					echo "<tr>
					<td class=\"tdatos\"><a href=\"elim_ttecnico.php?busqueda=ttecnico_id&ttecnico_id=".$row["ttecnico_id"]."\"><img src=../theme/images/user-delete-2.ico></a></td>
					<td class=\"tdatos\"><a href=\"bus_ttecnico.php?busqueda=ttecnico_id&ttecnico_id=".$row["ttecnico_id"]."\">".$row["ttecnico_id"]."</a></td>
					<td class=\"cdato\">".$row["ttecnico_nombre"]."</td>";
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
			cuadro_error("LINEA DE PROYECTO: <b>".$_REQUEST["ttecnico_nombre"]."</b> No Registrado  <b><a href=reg_uoi.php target=\"_self\">Registrar?</a></b>"); ///colocar un enlace para registrar a la persona
		}
}	
echo "<br><br>";
require("../theme/footer_inicio.php");
?>