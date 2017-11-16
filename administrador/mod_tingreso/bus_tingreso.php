<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><h5>CONSULTAR TIPO INGRESO</h5></div>
<div id="centercontent">
<div align="center">
<table>
<td>
<form action="bus_tingreso.php">
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
<form action="bus_tingreso.php">
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
	case'tipocontrato_id':
	$resultado=mysql_query("select * from tipocontrato where tipocontrato_id='".quitar($_REQUEST["tipocontrato_id"])."'  ",$con);

	if(mysql_num_rows($resultado) == 1)
	{
		$tipocontrato_id=mysql_result($resultado,0,"tipocontrato_id");
		$tipocontrato_nombre=mysql_result($resultado,0,"tipocontrato_nombre");
		
	}
	break;
	case'pnombre':
	$resultado=mysql_query("select tipocontrato.* from tipocontrato where tipocontrato_nombre like '".strtoupper($_REQUEST["pnombre"])."%'",$con);
	break;
	case'todos':
	$resultado=mysql_query("select tipocontrato.* from tipocontrato");
	break;
}

if(mysql_num_rows($resultado)>0)
{
	if($_REQUEST["busqueda"]=="tipocontrato_id")
	{
		?>
		
		<form action="../mod_impresion/imp_tingreso.php" method="post"  target="_blank">
		<br />
		<table width="500" align="center"  class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS TIPO INGRESO</h3></td>
		</tr>
		<tr>
			<td>1.REGISTRO TIPO INGRESO</td>
		</tr>
		<tr>
			<td class="tdatos">PESO:</td>
			<td class="dtabla">
			 <input type="hidden" name="tipocontrato_id" value="<?php echo $tipocontrato_id; ?>"><?php echo $tipocontrato_id; ?></input></td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE PESO</td>
			<td class="dtabla">
			<input type="hidden" name="tipocontrato_nombre" value="<?php echo $tipocontrato_nombre; ?>"><?php echo $tipocontrato_nombre; ?></input></td>
		</tr>
		<?php 
		echo '<tr>
			<td colspan="2" align="center" class="cdato">
			<input type="button" value="Eliminar" onclick="location.href='."'".'elim_tingreso.php?tipocontrato_id=tipocontrato_id&tipocontrato_id='.$tipocontrato_id."'".'">
			<input type="button" value="Actualizar Datos" onclick="location.href='."'".'act_tingreso.php?tipocontrato_id=tipocontrato_id&tipocontrato_id='.$tipocontrato_id."'".'">
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
			$noRegistros = 50; //Registros por página
			$pagina = 1; //Por default, página = 1
			if($_GET["pagina"]) //Si hay página por ?pagina=valor, lo asigna
    		$pagina = $_GET["pagina"];	
			$sel_agrup = mysql_query("select tipocontrato.* from tipocontrato LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
			$num_agrup = mysql_num_rows($sel_agrup);
			echo'<br>';echo'<br>';echo'<br>';
			$sSQL = "SELECT count(*) FROM tipocontrato"; //Cuento el total de registros
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
        					echo "<a href=\"bus_tingreso.php?busqueda=todos&pagina=".$i."\">  <font color=#000080><b>$i</b></font></p></a>";
						$vehiculo="";
				 }	
			?>
					<table width="500" align="center" class="tabla">
					<tr>
						<td class="tdatos">ELIMINAR</td>
						<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">NOMBRE TIPO INGRESO</td>
						
					</tr>
			<?php
			for($i=0;$i<$num_agrup;$i++)
					{
					$registro_agrup= mysql_fetch_array($sel_agrup);
					echo "<tr>
					<td class=\"tdatos\"><a href=\"elim_tingreso.php?busqueda=tipocontrato_id&tipocontrato_id=".$registro_agrup["tipocontrato_id"]."\"><img src=../theme/images/user-delete-2.ico></a></td>
					<td class=\"tdatos\"><a href=\"bus_tingreso.php?busqueda=tipocontrato_id&tipocontrato_id=".$registro_agrup["tipocontrato_id"]."\">".$registro_agrup["tipocontrato_id"]."</a></td>
					<td class=\"cdato\">".$registro_agrup["tipocontrato_nombre"]."</td>";
					
					}
				
				}
			else
			{
					?>
					<table width="500" align="center" class="tabla">
					<tr>
						<td class="tdatos">ELIMINAR</td>
						<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">NOMBRE TIPO INGRESO</td>
						
														
					</tr>
			<?php
				while ($row=mysql_fetch_assoc($resultado))
				{
					echo "<tr>
					<td class=\"tdatos\"><a href=\"elim_tingreso.php?busqueda=tipocontrato_id&tipocontrato_id=".$row["tipocontrato_id"]."\"><img src=../theme/images/user-delete-2.ico></a></td>
					<td class=\"tdatos\"><a href=\"bus_tingreso.php?busqueda=tipocontrato_id&tipocontrato_id=".$row["tipocontrato_id"]."\">".$row["tipocontrato_id"]."</a></td>
					<td class=\"cdato\">".$row["tipocontrato_nombre"]."</td>";
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
			cuadro_error("Pesos: <b>".$_REQUEST["tipocontrato_nombre"]."</b> No Registrado  <b><a href=reg_tingreso.php target=\"_self\">Registrar?</a></b>"); ///colocar un enlace para registrar a la persona
		}
}	
echo "<br><br>";
require("../theme/footer_inicio.php");
?>