<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><h5>CONSULTAR TIPO CARGO</h5></div>
<div id="centercontent">
<div align="center">
<table>
<td>
<form action="bus_tcargo.php">
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
<form action="bus_tcargo.php">
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
	case'tipocargo_id':
	$resultado=mysql_query("select * from tipocargo where tipocargo_id='".quitar($_REQUEST["tipocargo_id"])."'  ",$con);

	if(mysql_num_rows($resultado) == 1)
	{
		$tipocargo_id=mysql_result($resultado,0,"tipocargo_id");
		$tipocargo_nombre=mysql_result($resultado,0,"tipocargo_nombre");
		
	}
	break;
	case'pnombre':
	$resultado=mysql_query("select tipocargo.* from tipocargo where tipocargo_nombre like '".strtoupper($_REQUEST["pnombre"])."%'",$con);
	break;
	case'todos':
	$resultado=mysql_query("select tipocargo.* from tipocargo");
	break;
}

if(mysql_num_rows($resultado)>0)
{
	if($_REQUEST["busqueda"]=="tipocargo_id")
	{
		?>
		
		<form action="../mod_impresion/imp_tcargo.php" method="post"  target="_blank">
		<br />
		<table width="500" align="center"  class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS TIPO CARGO</h3></td>
		</tr>
		<tr>
			<td>1.REGISTRO TIPO CARGO</td>
		</tr>
		<tr>
			<td class="tdatos">PESO:</td>
			<td class="dtabla">
			 <input type="hidden" name="tipocargo_id" value="<?php echo $tipocargo_id; ?>"><?php echo $tipocargo_id; ?></input></td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE PESO</td>
			<td class="dtabla">
			<input type="hidden" name="tipocargo_nombre" value="<?php echo $tipocargo_nombre; ?>"><?php echo $tipocargo_nombre; ?></input></td>
		</tr>
		<?php 
		echo '<tr>
			<td colspan="2" align="center" class="cdato">
			<input type="button" value="Eliminar" onclick="location.href='."'".'elim_tcargo.php?tipocargo_id=tipocargo_id&tipocargo_id='.$tipocargo_id."'".'">
			<input type="button" value="Actualizar Datos" onclick="location.href='."'".'act_tipocargo.php?tipocargo_id=tipocargo_id&tipocargo_id='.$tipocargo_id."'".'">
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
			$sel_agrup = mysql_query("select tipocargo.* from tipocargo LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
			$num_agrup = mysql_num_rows($sel_agrup);
			echo'<br>';echo'<br>';echo'<br>';
			$sSQL = "SELECT count(*) FROM tipocargo"; //Cuento el total de registros
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
        					echo "<a href=\"bus_tcargo.php?busqueda=todos&pagina=".$i."\">  <font color=#000080><b>$i</b></font></p></a>";
						$vehiculo="";
				 }	
			?>
					<table width="500" align="center" class="tabla">
					<tr>
						<td class="tdatos">ELIMINAR</td>
						<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">NOMBRE TIPO CARGO</td>
						
					</tr>
			<?php
			for($i=0;$i<$num_agrup;$i++)
					{
					$registro_agrup= mysql_fetch_array($sel_agrup);
					echo "<tr>
					<td class=\"tdatos\"><a href=\"elim_tcargo.php?busqueda=tipocargo_id&tipocargo_id=".$registro_agrup["tipocargo_id"]."\"><img src=../theme/images/user-delete-2.ico></a></td>
					<td class=\"tdatos\"><a href=\"bus_tcargo.php?busqueda=tipocargo_id&tipocargo_id=".$registro_agrup["tipocargo_id"]."\">".$registro_agrup["tipocargo_id"]."</a></td>
					<td class=\"cdato\">".$registro_agrup["tipocargo_nombre"]."</td>";
					
					}
				
				}
			else
			{
					?>
					<table width="500" align="center" class="tabla">
					<tr>
						<td class="tdatos">ELIMINAR</td>
						<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">NOMBRE TIPO CARGO</td>
						
														
					</tr>
			<?php
				while ($row=mysql_fetch_assoc($resultado))
				{
					echo "<tr>
					<td class=\"tdatos\"><a href=\"elim_tcargo.php?busqueda=tipocargo_id&tipocargo_id=".$row["tipocargo_id"]."\"><img src=../theme/images/user-delete-2.ico></a></td>
					<td class=\"tdatos\"><a href=\"bus_tcargo.php?busqueda=tipocargo_id&tipocargo_id=".$row["tipocargo_id"]."\">".$row["tipocargo_id"]."</a></td>
					<td class=\"cdato\">".$row["tipocargo_nombre"]."</td>";
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
			cuadro_error("Pesos: <b>".$_REQUEST["tipocargo_nombre"]."</b> No Registrado  <b><a href=reg_tcargo.php target=\"_self\">Registrar?</a></b>"); ///colocar un enlace para registrar a la persona
		}
}	
echo "<br><br>";
require("../theme/footer_inicio.php");
?>