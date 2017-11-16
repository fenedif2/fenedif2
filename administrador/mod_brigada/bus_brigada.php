<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo">CONSULTA BRIGADA</div>
<div id="centercontent">
<div align="center">
<table>
<td>
<form action="bus_brigada.php">
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
<form action="bus_brigada.php">
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
	case'brigada_id':
	$resultado=mysql_query("select * from brigada where brigada_id='".quitar($_REQUEST["brigada_id"])."'  ",$con);

	if(mysql_num_rows($resultado) == 1)
	{
		$brigada_id=mysql_result($resultado,0,"brigada_id");
		$brigada_nombre=mysql_result($resultado,0,"brigada_nombre");
		
	}
	break;
	case'pnombre':
	$resultado=mysql_query("select * from brigada where brigada_nombre like '".strtoupper($_REQUEST["pnombre"])."' ",$con);
	break;
	case'apellidop':
	$resultado=mysql_query("select * from paciente where apellidop like '".strtoupper($_REQUEST["apellidop"])."' order by ced desc",$con);
	break;
	case'todos':
	$resultado=mysql_query("select * from brigada");
	break;
	case'ambato':
	$resultado=mysql_query("SELECT * FROM paciente WHERE extension='AMBATO' ORDER BY apellidop");
	break;
	case'quito':
	$resultado=mysql_query("SELECT * FROM paciente WHERE extension='QUITO' ORDER BY apellidop");
	break;	
}

if(mysql_num_rows($resultado)>0)
{
	if($_REQUEST["busqueda"]=="brigada_id")
	{
		?>
		
		<form action="../mod_impresion/imp_brigada.php" method="post"  target="_blank">
		<br />
		<table width="500" align="center"  class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS DE brigada</h3></td>
		</tr>
		<tr>
			<td>1. REGISTRO DE BRIGADA</td>
		</tr>
		<tr>
			<td class="tdatos">Código brigada:</td>
			<td class="dtabla">
			 <input type="hidden" name="brigada_id" value="<?php echo $brigada_id; ?>"><?php echo $brigada_id; ?></input></td>
		</tr>
		<tr>
			<td class="tdatos">Nombre brigada:</td>
			<td class="dtabla">
			<input type="hidden" name="brigada_nombre" value="<?php echo $brigada_nombre; ?>"><?php echo $brigada_nombre; ?></input></td>
		</tr>
		<?php 
		echo '<tr>
			<td colspan="2" align="center" class="cdato">
			<input type="button" value="Eliminar" onclick="location.href='."'".'elim_brigada.php?brigada_id=brigada_id&brigada_id='.$brigada_id."'".'">
			<input type="button" value="Actualizar Datos" onclick="location.href='."'".'act_brigada.php?brigada_id=brigada_id&brigada_id='.$brigada_id."'".'">
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
						<td class="tdatos">NOMNRE DE LA BRIGADA</td>
					</tr>
			<?php
				while ($row=mysql_fetch_assoc($resultado))
				{
					echo "<tr>
					<td class=\"tdatos\"><a href=\"elim_brigada.php?busqueda=brigada_id&brigada_id=".$row["brigada_id"]."\"><img src=../theme/images/user-delete-2.ico></a></td>
					<td class=\"tdatos\"><a href=\"bus_brigada.php?busqueda=brigada_id&brigada_id=".$row["brigada_id"]."\">".$row["brigada_id"]."</a></td>
					<td class=\"cdato\">".$row["brigada_nombre"]."</td>";
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
						<td class="tdatos">NOMNRE DE brigada..</td>
						
														
					</tr>
			<?php
				while ($row=mysql_fetch_assoc($resultado))
				{
					echo "<tr>
					<td class=\"tdatos\"><a href=\"elim_brigada.php?busqueda=brigada_id&brigada_id=".$row["brigada_id"]."\"><img src=../theme/images/user-delete-2.ico></a></td>
					<td class=\"tdatos\"><a href=\"bus_brigada.php?busqueda=brigada_id&brigada_id=".$row["brigada_id"]."\">".$row["brigada_id"]."</a></td>
					<td class=\"cdato\">".$row["brigada_nombre"]."</td>";
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
			cuadro_error("brigada: <b>".$_REQUEST["brigada_nombre"]."</b> No Registrado  <b><a href=reg_brigada.php target=\"_self\">Registrar?</a></b>"); ///colocar un enlace para registrar a la persona
		}
}	
echo "<br><br>";
require("../theme/footer_inicio.php");
?>