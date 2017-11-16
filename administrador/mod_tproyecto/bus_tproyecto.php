<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><h6>CONSULTA TIPO DE PROYECTO</h6></div>
<div id="centercontent">
<div align="center">
<table>
<td>
<form action="bus_tproyecto.php">
		<input type="hidden" name="busqueda" value="ptproyecto_nombre">
		<table class="tabla">
		<tr>
			<td colspan="2" align="center">Ingrese tproyecto_nombre</td>
		</tr>
		<tr>
			<td><input type="text" name="ptproyecto_nombre" value="<?php echo $_REQUEST["ptproyecto_nombre"]; ?>" size="20"></td>
			<td><input type="submit" value="Buscar"></td>
		</tr>
		</table>
</form>
</td>
<td>
<form action="bus_tproyecto.php">
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
	case'tproyecto_id':
	$resultado=mysql_query("select * from tproyecto where tproyecto_id='".quitar($_REQUEST["tproyecto_id"])."'  ",$con);

	if(mysql_num_rows($resultado) == 1)
	{
		$tproyecto_id=mysql_result($resultado,0,"tproyecto_id");
		$tproyecto_nombre=mysql_result($resultado,0,"tproyecto_nombre");
		
	}
	break;
	case'ptproyecto_nombre':
	$resultado=mysql_query("select * from tproyecto where tproyecto_nombre like '".strtoupper($_REQUEST["ptproyecto_nombre"])."' ",$con);
	break;
	case'apellidop':
	$resultado=mysql_query("select * from paciente where apellidop like '".strtoupper($_REQUEST["apellidop"])."' order by ced desc",$con);
	break;
	case'todos':
	$resultado=mysql_query("select * from tproyecto");
	break;
}

if(mysql_num_rows($resultado)>0)
{
	if($_REQUEST["busqueda"]=="tproyecto_id")
	{
		?>
		
		<form action="../mod_impresion/imp_tproyecto.php" method="post"  target="_blank">
		<br />
		<table width="500" align="center"  class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS DE TIPO DE PROYECTO</h3></td>
		</tr>
		<tr>
			<td>1. REGISTRO DE TIPO DE PROYECTO</td>
		</tr>
		<tr>
			<td class="tdatos">Código:</td>
			<td class="dtabla">
			 <input type="hidden" name="tproyecto_id" value="<?php echo $tproyecto_id; ?>"><?php echo $tproyecto_id; ?></input></td>
		</tr>
		<tr>
			<td class="tdatos">tproyecto_nombre TIPO DE PROYECTO:</td>
			<td class="dtabla">
			<input type="hidden" name="tproyecto_nombre" value="<?php echo $tproyecto_nombre; ?>"><?php echo $tproyecto_nombre; ?></input></td>
		</tr>
		<?php 
		echo '<tr>
			<td colspan="2" align="center" class="cdato">
			<input type="button" value="Eliminar" onclick="location.href='."'".'elim_tproyecto.php?tproyecto_id=tproyecto_id&tproyecto_id='.$tproyecto_id."'".'">
			<input type="button" value="Actualizar Datos" onclick="location.href='."'".'act_tproyecto.php?tproyecto_id=tproyecto_id&tproyecto_id='.$tproyecto_id."'".'">
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
						<td class="tdatos">NOMNRE DE TIPO DE PROYECTO</td>
					</tr>
			<?php
				while ($row=mysql_fetch_assoc($resultado))
				{
					echo "<tr>
					<td class=\"tdatos\"><a href=\"elim_tproyecto.php?tproyecto_id=".$row["tproyecto_id"]."\"><img src=../theme/images/user-delete-2.ico></a></td>
					<td class=\"tdatos\"><a href=\"bus_tproyecto.php?busqueda=tproyecto_id&tproyecto_id=".$row["tproyecto_id"]."\">".$row["tproyecto_id"]."</a></td>
					<td class=\"cdato\">".$row["tproyecto_nombre"]."</td>";
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
						<td class="tdatos">NOMNRE DE TIPO DE PROYECTO..</td>
						
														
					</tr>
			<?php
				while ($row=mysql_fetch_assoc($resultado))
				{
					echo "<tr>
					<td class=\"tdatos\"><a href=\"elim_tproyecto.php?tproyecto_id=".$row["tproyecto_id"]."\"><img src=../theme/images/user-delete-2.ico></a></td>
					<td class=\"tdatos\"><a href=\"bus_tproyecto.php?busqueda=tproyecto_id&tproyecto_id=".$row["tproyecto_id"]."\">".$row["tproyecto_id"]."</a></td>
					<td class=\"cdato\">".$row["tproyecto_nombre"]."</td>";
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
			cuadro_error("TIPO DE PROYECTO: <b>".$_REQUEST["tproyecto_nombre"]."</b> No Registrado  <b><a href=reg_uoi.php target=\"_self\">Registrar?</a></b>"); ///colocar un enlace para registrar a la persona
		}
}	
echo "<br><br>";
require("../theme/footer_inicio.php");
?>