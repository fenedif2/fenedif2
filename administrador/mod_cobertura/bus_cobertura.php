<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><h5>CONSULTAR COBERTURA</h5></div>
<div id="centercontent">
<div align="center">
<table>
<td>
<form action="bus_cobertura.php">
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
<form action="bus_cobertura.php">
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
	case'cobertura_id':
	$resultado=mysql_query("select * from cobertura where cobertura_id='".quitar($_REQUEST["cobertura_id"])."'  ",$con);

	if(mysql_num_rows($resultado) == 1)
	{
		$cobertura_id=mysql_result($resultado,0,"cobertura_id");
		$cobertura_nombre=mysql_result($resultado,0,"cobertura_nombre");
		
	}
	break;
	case'pnombre':
	$resultado=mysql_query("select cobertura.* from cobertura where cobertura_nombre like '".strtoupper($_REQUEST["pnombre"])."%'",$con);
	break;
	case'todos':
	$resultado=mysql_query("select cobertura.* from cobertura");
	break;
}

if(mysql_num_rows($resultado)>0)
{
	if($_REQUEST["busqueda"]=="cobertura_id")
	{
		?>
		
		<form action="../mod_impresion/imp_cobertura.php" method="post"  target="_blank">
		<br />
		<table width="500" align="center"  class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS COBERTURA</h3></td>
		</tr>
		<tr>
			<td>1.REGISTRO COBERTURA</td>
		</tr>
		<tr>
			<td class="tdatos">COBERTURA:</td>
			<td class="dtabla">
			 <input type="hidden" name="cobertura_id" value="<?php echo $cobertura_id; ?>"><?php echo $cobertura_id; ?></input></td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE COBERTURA</td>
			<td class="dtabla">
			<input type="hidden" name="cobertura_nombre" value="<?php echo $cobertura_nombre; ?>"><?php echo $cobertura_nombre; ?></input></td>
		</tr>
		<?php 
		echo '<tr>
			<td colspan="2" align="center" class="cdato">
			<input type="button" value="Eliminar" onclick="location.href='."'".'elim_cobertura.php?cobertura_id=cobertura_id&cobertura_id='.$cobertura_id."'".'">
			<input type="button" value="Actualizar Datos" onclick="location.href='."'".'act_cobertura.php?cobertura_id=cobertura_id&cobertura_id='.$cobertura_id."'".'">
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
			$sel_agrup = mysql_query("select cobertura.* from cobertura LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
			$num_agrup = mysql_num_rows($sel_agrup);
			echo'<br>';echo'<br>';echo'<br>';
			$sSQL = "SELECT count(*) FROM cobertura"; //Cuento el total de registros
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
        					echo "<a href=\"bus_cobertura.php?busqueda=todos&pagina=".$i."\">  <font color=#000080><b>$i</b></font></p></a>";
						$vehiculo="";
				 }	
			?>
					<table width="500" align="center" class="tabla">
					<tr>
						<td class="tdatos">ELIMINAR</td>
						<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">NOMBRE COBERTURA</td>
						
					</tr>
			<?php
			for($i=0;$i<$num_agrup;$i++)
					{
					$registro_agrup= mysql_fetch_array($sel_agrup);
					echo "<tr>
					<td class=\"tdatos\"><a href=\"elim_cobertura.php?busqueda=cobertura_id&cobertura_id=".$registro_agrup["cobertura_id"]."\"><img src=../theme/images/user-delete-2.ico></a></td>
					<td class=\"tdatos\"><a href=\"bus_cobertura.php?busqueda=cobertura_id&cobertura_id=".$registro_agrup["cobertura_id"]."\">".$registro_agrup["cobertura_id"]."</a></td>
					<td class=\"cdato\">".$registro_agrup["cobertura_nombre"]."</td>";
					
					}
				
				}
			else
			{
					?>
					<table width="500" align="center" class="tabla">
					<tr>
						<td class="tdatos">ELIMINAR</td>
						<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">NOMBRE COBERTURA</td>
						
														
					</tr>
			<?php
				while ($row=mysql_fetch_assoc($resultado))
				{
					echo "<tr>
					<td class=\"tdatos\"><a href=\"elim_cobertura.php?busqueda=cobertura_id&cobertura_id=".$row["cobertura_id"]."\"><img src=../theme/images/user-delete-2.ico></a></td>
					<td class=\"tdatos\"><a href=\"bus_cobertura.php?busqueda=cobertura_id&cobertura_id=".$row["cobertura_id"]."\">".$row["cobertura_id"]."</a></td>
					<td class=\"cdato\">".$row["cobertura_nombre"]."</td>";
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
			cuadro_error("Pesos: <b>".$_REQUEST["cobertura_nombre"]."</b> No Registrado  <b><a href=reg_cobertura.php target=\"_self\">Registrar?</a></b>"); ///colocar un enlace para registrar a la persona
		}
}	
echo "<br><br>";
require("../theme/footer_inicio.php");
?>