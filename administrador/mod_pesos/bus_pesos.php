<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><h5>CONSULTAR PESOS</h5></div>
<div id="centercontent">
<div align="center">
<table>
<td>
<form action="bus_pesos.php">
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
<form action="bus_pesos.php">
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
	case'cogerpesos_id':
	$resultado=mysql_query("select * from cogerpesos where cogerpesos_id='".quitar($_REQUEST["cogerpesos_id"])."'  ",$con);

	if(mysql_num_rows($resultado) == 1)
	{
		$cogerpesos_id=mysql_result($resultado,0,"cogerpesos_id");
		$cogerpesos_nombre=mysql_result($resultado,0,"cogerpesos_nombre");
		
	}
	break;
	case'pnombre':
	$resultado=mysql_query("select cogerpesos.* from cogerpesos where cogerpesos_nombre like '".strtoupper($_REQUEST["pnombre"])."%'",$con);
	break;
	case'todos':
	$resultado=mysql_query("select cogerpesos.* from cogerpesos");
	break;
}

if(mysql_num_rows($resultado)>0)
{
	if($_REQUEST["busqueda"]=="cogerpesos_id")
	{
		?>
		
		<form action="../mod_impresion/imp_pesos.php" method="post"  target="_blank">
		<br />
		<table width="500" align="center"  class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS PESOS</h3></td>
		</tr>
		<tr>
			<td>1. REGISTRO PESOS</td>
		</tr>
		<tr>
			<td class="tdatos">PESO:</td>
			<td class="dtabla">
			 <input type="hidden" name="cogerpesos_id" value="<?php echo $cogerpesos_id; ?>"><?php echo $cogerpesos_id; ?></input></td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE PESO</td>
			<td class="dtabla">
			<input type="hidden" name="cogerpesos_nombre" value="<?php echo $cogerpesos_nombre; ?>"><?php echo $cogerpesos_nombre; ?></input></td>
		</tr>
		<?php 
		echo '<tr>
			<td colspan="2" align="center" class="cdato">
			<input type="button" value="Eliminar" onclick="location.href='."'".'elim_pesos.php?cogerpesos_id=cogerpesos_id&cogerpesos_id='.$cogerpesos_id."'".'">
			<input type="button" value="Actualizar Datos" onclick="location.href='."'".'act_cogerpesos.php?cogerpesos_id=cogerpesos_id&cogerpesos_id='.$cogerpesos_id."'".'">
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
			$sel_agrup = mysql_query("select cogerpesos.* from cogerpesos LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
			$num_agrup = mysql_num_rows($sel_agrup);
			echo'<br>';echo'<br>';echo'<br>';
			$sSQL = "SELECT count(*) FROM cogerpesos"; //Cuento el total de registros
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
        					echo "<a href=\"bus_pesos.php?busqueda=todos&pagina=".$i."\">  <font color=#000080><b>$i</b></font></p></a>";
						$vehiculo="";
				 }	
			?>
					<table width="500" align="center" class="tabla">
					<tr>
						<td class="tdatos">ELIMINAR</td>
						<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">NOMBRE PESOS</td>
						
					</tr>
			<?php
			for($i=0;$i<$num_agrup;$i++)
					{
					$registro_agrup= mysql_fetch_array($sel_agrup);
					echo "<tr>
					<td class=\"tdatos\"><a href=\"elim_pesos.php?busqueda=cogerpesos_id&cogerpesos_id=".$registro_agrup["cogerpesos_id"]."\"><img src=../theme/images/user-delete-2.ico></a></td>
					<td class=\"tdatos\"><a href=\"bus_pesos.php?busqueda=cogerpesos_id&cogerpesos_id=".$registro_agrup["cogerpesos_id"]."\">".$registro_agrup["cogerpesos_id"]."</a></td>
					<td class=\"cdato\">".$registro_agrup["cogerpesos_nombre"]."</td>";
					
					}
				
				}
			else
			{
					?>
					<table width="500" align="center" class="tabla">
					<tr>
						<td class="tdatos">ELIMINAR</td>
						<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">NOMBRE PESOS</td>
						
														
					</tr>
			<?php
				while ($row=mysql_fetch_assoc($resultado))
				{
					echo "<tr>
					<td class=\"tdatos\"><a href=\"elim_pesos.php?busqueda=cogerpesos_id&cogerpesos_id=".$row["cogerpesos_id"]."\"><img src=../theme/images/user-delete-2.ico></a></td>
					<td class=\"tdatos\"><a href=\"bus_pesos.php?busqueda=cogerpesos_id&cogerpesos_id=".$row["cogerpesos_id"]."\">".$row["cogerpesos_id"]."</a></td>
					<td class=\"cdato\">".$row["cogerpesos_nombre"]."</td>";
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
			cuadro_error("Pesos: <b>".$_REQUEST["cogerpesos_nombre"]."</b> No Registrado  <b><a href=reg_pesos.php target=\"_self\">Registrar?</a></b>"); ///colocar un enlace para registrar a la persona
		}
}	
echo "<br><br>";
require("../theme/footer_inicio.php");
?>