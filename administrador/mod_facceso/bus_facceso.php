<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><h5>CONSULTAR FORMA ACCESO</h5></div>
<div id="centercontent">
<div align="center">
<table>
<td>
<form action="bus_facceso.php">
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
<form action="bus_facceso.php">
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
	case'formaacceso_id':
	$resultado=mysql_query("select * from formaacceso where formaacceso_id='".quitar($_REQUEST["formaacceso_id"])."'  ",$con);

	if(mysql_num_rows($resultado) == 1)
	{
		$formaacceso_id=mysql_result($resultado,0,"formaacceso_id");
		$formaacceso_nombre=mysql_result($resultado,0,"formaacceso_nombre");
		
	}
	break;
	case'pnombre':
	$resultado=mysql_query("select formaacceso.* from formaacceso where formaacceso_nombre like '".strtoupper($_REQUEST["pnombre"])."%'",$con);
	break;
	case'todos':
	$resultado=mysql_query("select formaacceso.* from formaacceso");
	break;
}

if(mysql_num_rows($resultado)>0)
{
	if($_REQUEST["busqueda"]=="formaacceso_id")
	{
		?>
		
		<form action="../mod_impresion/imp_facceso.php" method="post"  target="_blank">
		<br />
		<table width="500" align="center"  class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS FORMA ACCESO</h3></td>
		</tr>
		<tr>
			<td>1.REGISTRO FORMA ACCESO</td>
		</tr>
		<tr>
			<td class="tdatos">FORMA ACCESO:</td>
			<td class="dtabla">
			 <input type="hidden" name="formaacceso_id" value="<?php echo $formaacceso_id; ?>"><?php echo $formaacceso_id; ?></input></td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE FORMA ACCESO</td>
			<td class="dtabla">
			<input type="hidden" name="formaacceso_nombre" value="<?php echo $formaacceso_nombre; ?>"><?php echo $formaacceso_nombre; ?></input></td>
		</tr>
		<?php 
		echo '<tr>
			<td colspan="2" align="center" class="cdato">
			<input type="button" value="Eliminar" onclick="location.href='."'".'elim_facceso.php?formaacceso_id=formaacceso_id&formaacceso_id='.$formaacceso_id."'".'">
			<input type="button" value="Actualizar Datos" onclick="location.href='."'".'act_facceso.php?formaacceso_id=formaacceso_id&formaacceso_id='.$formaacceso_id."'".'">
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
			$sel_agrup = mysql_query("select formaacceso.* from formaacceso LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
			$num_agrup = mysql_num_rows($sel_agrup);
			echo'<br>';echo'<br>';echo'<br>';
			$sSQL = "SELECT count(*) FROM formaacceso"; //Cuento el total de registros
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
        					echo "<a href=\"bus_facceso.php?busqueda=todos&pagina=".$i."\">  <font color=#000080><b>$i</b></font></p></a>";
						$vehiculo="";
				 }	
			?>
					<table width="500" align="center" class="tabla">
					<tr>
						<td class="tdatos">ELIMINAR</td>
						<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">NOMBRE FORMA ACCESO</td>
						
					</tr>
			<?php
			for($i=0;$i<$num_agrup;$i++)
					{
					$registro_agrup= mysql_fetch_array($sel_agrup);
					echo "<tr>
					<td class=\"tdatos\"><a href=\"elim_facceso.php?busqueda=formaacceso_id&formaacceso_id=".$registro_agrup["formaacceso_id"]."\"><img src=../theme/images/user-delete-2.ico></a></td>
					<td class=\"tdatos\"><a href=\"bus_facceso.php?busqueda=formaacceso_id&formaacceso_id=".$registro_agrup["formaacceso_id"]."\">".$registro_agrup["formaacceso_id"]."</a></td>
					<td class=\"cdato\">".$registro_agrup["formaacceso_nombre"]."</td>";
					
					}
				
				}
			else
			{
					?>
					<table width="500" align="center" class="tabla">
					<tr>
						<td class="tdatos">ELIMINAR</td>
						<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">NOMBRE FORMA ACCESO</td>
						
														
					</tr>
			<?php
				while ($row=mysql_fetch_assoc($resultado))
				{
					echo "<tr>
					<td class=\"tdatos\"><a href=\"elim_facceso.php?busqueda=formaacceso_id&formaacceso_id=".$row["formaacceso_id"]."\"><img src=../theme/images/user-delete-2.ico></a></td>
					<td class=\"tdatos\"><a href=\"bus_facceso.php?busqueda=formaacceso_id&formaacceso_id=".$row["formaacceso_id"]."\">".$row["formaacceso_id"]."</a></td>
					<td class=\"cdato\">".$row["formaacceso_nombre"]."</td>";
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
			cuadro_error("Pesos: <b>".$_REQUEST["formaacceso_nombre"]."</b> No Registrado  <b><a href=reg_facceso.php target=\"_self\">Registrar?</a></b>"); ///colocar un enlace para registrar a la persona
		}
}	
echo "<br><br>";
require("../theme/footer_inicio.php");
?>