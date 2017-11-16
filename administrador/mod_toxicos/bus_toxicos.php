<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><h5>CONSULTAR TÓXICOS</h5></div>
<div id="centercontent">
<div align="center">
<table>
<td>
<form action="bus_toxicos.php">
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
<form action="bus_toxicos.php">
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
	case'tcondicionesa_id':
	$resultado=mysql_query("select * from tcondicionesa where tcondicionesa_id='".quitar($_REQUEST["tcondicionesa_id"])."'  ",$con);

	if(mysql_num_rows($resultado) == 1)
	{
		$tcondicionesa_id=mysql_result($resultado,0,"tcondicionesa_id");
		$tcondicionesa_descripcion=mysql_result($resultado,0,"tcondicionesa_descripcion");
		
	}
	break;
	case'pnombre':
	$resultado=mysql_query("select tcondicionesa.* from tcondicionesa where tcondicionesa_descripcion like '".strtoupper($_REQUEST["pnombre"])."%'",$con);
	break;
	case'todos':
	$resultado=mysql_query("select tcondicionesa.* from tcondicionesa");
	break;
}

if(mysql_num_rows($resultado)>0)
{
	if($_REQUEST["busqueda"]=="tcondicionesa_id")
	{
		?>
		
		<form action="../mod_impresion/imp_toxicos.php" method="post"  target="_blank">
		<br />
		<table width="500" align="center"  class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS TÓXICOS</h3></td>
		</tr>
		<tr>
			<td>1. REGISTRO DE TÓXICOS</td>
		</tr>
		<tr>
			<td class="tdatos">Tóxicos:</td>
			<td class="dtabla">
			 <input type="hidden" name="tcondicionesa_id" value="<?php echo $tcondicionesa_id; ?>"><?php echo $tcondicionesa_id; ?></input></td>
		</tr>
		<tr>
			<td class="tdatos">Nombre Tóxicos:</td>
			<td class="dtabla">
			<input type="hidden" name="tcondicionesa_descripcion" value="<?php echo $tcondicionesa_descripcion; ?>"><?php echo $tcondicionesa_descripcion; ?></input></td>
		</tr>
		<?php 
		echo '<tr>
			<td colspan="2" align="center" class="cdato">
			<input type="button" value="Eliminar" onclick="location.href='."'".'elim_toxicos.php?tcondicionesa_id=tcondicionesa_id&tcondicionesa_id='.$tcondicionesa_id."'".'">
			<input type="button" value="Actualizar Datos" onclick="location.href='."'".'act_toxicos.php?tcondicionesa_id=tcondicionesa_id&tcondicionesa_id='.$tcondicionesa_id."'".'">
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
			$sel_agrup = mysql_query("select tcondicionesa.* from tcondicionesa LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
			$num_agrup = mysql_num_rows($sel_agrup);
			echo'<br>';echo'<br>';echo'<br>';
			$sSQL = "SELECT count(*) FROM tcondicionesa"; //Cuento el total de registros
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
        					echo "<a href=\"bus_toxicos.php?busqueda=todos&pagina=".$i."\">  <font color=#000080><b>$i</b></font></p></a>";
						$vehiculo="";
				 }	
			?>
					<table width="500" align="center" class="tabla">
					<tr>
						<td class="tdatos">ELIMINAR</td>
						<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">NOMNRE TÓXICOS</td>
						
					</tr>
			<?php
			for($i=0;$i<$num_agrup;$i++)
					{
					$registro_agrup= mysql_fetch_array($sel_agrup);
					echo "<tr>
					<td class=\"tdatos\"><a href=\"elim_toxicos.php?busqueda=tcondicionesa_id&tcondicionesa_id=".$registro_agrup["tcondicionesa_id"]."\"><img src=../theme/images/user-delete-2.ico></a></td>
					<td class=\"tdatos\"><a href=\"bus_toxicos.php?busqueda=tcondicionesa_id&tcondicionesa_id=".$registro_agrup["tcondicionesa_id"]."\">".$registro_agrup["tcondicionesa_id"]."</a></td>
					<td class=\"cdato\">".$registro_agrup["tcondicionesa_descripcion"]."</td>";
					
					}
				
				}
			else
			{
					?>
					<table width="500" align="center" class="tabla">
					<tr>
						<td class="tdatos">ELIMINAR</td>
						<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">NOMNRE TÓXICOS</td>
						
														
					</tr>
			<?php
				while ($row=mysql_fetch_assoc($resultado))
				{
					echo "<tr>
					<td class=\"tdatos\"><a href=\"elim_toxicos.php?busqueda=tcondicionesa_id&tcondicionesa_id=".$row["tcondicionesa_id"]."\"><img src=../theme/images/user-delete-2.ico></a></td>
					<td class=\"tdatos\"><a href=\"bus_toxicos.php?busqueda=tcondicionesa_id&tcondicionesa_id=".$row["tcondicionesa_id"]."\">".$row["tcondicionesa_id"]."</a></td>
					<td class=\"cdato\">".$row["tcondicionesa_descripcion"]."</td>";
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
			cuadro_error("Tóxicos: <b>".$_REQUEST["tcondicionesa_descripcion"]."</b> No Registrado  <b><a href=reg_toxicos.php target=\"_self\">Registrar?</a></b>"); ///colocar un enlace para registrar a la persona
		}
}	
echo "<br><br>";
require("../theme/footer_inicio.php");
?>