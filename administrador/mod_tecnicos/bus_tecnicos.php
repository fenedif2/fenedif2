<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><h6>CONSULTA TÉCNICO</h6></div>
<div id="centercontent">
<div align="center">
<table>
<td>
<form action="bus_tecnicos.php">
		<input type="hidden" name="busqueda" value="pnombres">
		<table class="tabla">
		<tr>
			<td colspan="2" align="center">Ingrese nombres</td>
		</tr>
		<tr>
			<td><input type="text" name="pnombres" value="<?php echo $_REQUEST["pnombres"]; ?>" size="20"></td>
			<td><input type="submit" value="Buscar"></td>
		</tr>
		</table>
</form>
</td>
<td>
<form action="bus_tecnicos.php">
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
	case'tecnico_id':
	$resultado=mysql_query("select tecnico.tecnico_id,tecnico.tecnico_nombres,tecnico.tecnico_apellidos,ttecnico.ttecnico_nombre,
	tecnico.profesion,brigada.brigada_nombre,tecnico.cargo,tecnico.clave 
from tecnico,ttecnico,brigada 
where tecnico.ttecnico_id=ttecnico.ttecnico_id and
	tecnico.brigada_id=brigada.brigada_id and tecnico.tecnico_id='".quitar($_REQUEST["tecnico_id"])."'  ",$con);

	if(mysql_num_rows($resultado) == 1)
	{
		$tecnico_id=mysql_result($resultado,0,"tecnico_id");
		$nombre=mysql_result($resultado,0,"tecnico_nombres");
		$apellidos=mysql_result($resultado,0,"tecnico_apellidos");
		$ttecnico=mysql_result($resultado,0,"ttecnico_nombre");
		$profesion=mysql_result($resultado,0,"profesion");
		$brigada=mysql_result($resultado,0,"brigada_nombre");
		$cargo=mysql_result($resultado,0,"cargo");
		$clave=mysql_result($resultado,0,"clave");
	}
	break;
	case'pnombres':
	$resultado=mysql_query("select tecnico.tecnico_id,tecnico.tecnico_nombres,tecnico.tecnico_apellidos,ttecnico.ttecnico_nombre,
	tecnico.profesion,brigada.brigada_nombre,tecnico.cargo,tecnico.clave 
from tecnico,ttecnico,brigada 
where tecnico.ttecnico_id=ttecnico.ttecnico_id and
	tecnico.brigada_id=brigada.brigada_id and tecnico.tecnico_nombres like '".strtoupper($_REQUEST["pnombres"])."' ",$con);
	break;
	case'todos':
	$resultado=mysql_query("select * from tecnico order by tecnico_nombres");
	break;
}

if(mysql_num_rows($resultado)>0)
{
	if($_REQUEST["busqueda"]=="tecnico_id")
	{
		?>
		
		<form action="../mod_impresion/imp_tecnicos.php" method="post"  target="_blank">
		<br />
		<table width="500" align="center"  class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS DE TIPO DE TÉCNICO</h3></td>
		</tr>
		<tr>
			<td>1. REGISTRO DE TIPO DE TÉCNICO</td>
		</tr>
		<tr>
			<td class="tdatos">LOGIN:</td>
			<td class="dtabla">
			 <input type="hidden" name="tecnico_id" value="<?php echo $tecnico_id; ?>"><?php echo $tecnico_id; ?></input></td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRES:</td>
			<td class="dtabla">
			<input type="hidden" name="nombre" value="<?php echo $nombre; ?>"><?php echo $nombre; ?></input></td>
		</tr>
		<tr>
			<td class="tdatos">APELLIDOS:</td>
			<td class="dtabla">
			<input type="hidden" name="apellidos" value="<?php echo $apellidos; ?>"><?php echo $apellidos; ?></input></td>
		</tr>
		<tr>
			<td class="tdatos">TIPO TÉCNICO:</td>
			<td class="dtabla">
			<input type="hidden" name="ttecnico" value="<?php echo $ttecnico; ?>"><?php echo $ttecnico; ?></input></td>
		</tr>
		<tr>
			<td class="tdatos">PROFESIÓN</td>	
			<td class="dtabla">
			<input type="hidden" name="profesion" value="<?php echo $profesion; ?>"><?php echo $profesion; ?></input></td>
		</tr>
		<tr>
			<td class="tdatos">BRIGADA</td>	
			<td class="dtabla">
			<input type="hidden" name="brigada" value="<?php echo $brigada; ?>"><?php echo $brigada; ?></input></td>
		</tr>
		<tr>
			<td class="tdatos">CARGO:</td>
			<td class="dtabla">
			<input type="hidden" name="cargo" value="<?php echo $cargo; ?>"><?php echo $cargo; ?></input></td>
		</tr>
		<tr>
			<td class="tdatos">CLAVE:</td>
			<td class="dtabla">
			<input type="hidden" name="clave" value="<?php echo $clave; ?>"><?php echo $clave; ?></input></td>
		</tr>
		<?php 
		echo '<tr>
			<td colspan="2" align="center" class="cdato">
			<input type="button" value="Eliminar" onclick="location.href='."'".'elim_tecnicos.php?tecnico_id=tecnico_id&tecnico_id='.$tecnico_id."'".'">
			<input type="button" value="Actualizar Datos" onclick="location.href='."'".'act_tecnicos.php?tecnico_id=tecnico_id&tecnico_id='.$tecnico_id."'".'">
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
						<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">NOMNRES</td>
						<td class="tdatos">APELLIDOS</td>
						<td class="tdatos">TIPO TÉCNICO</td>
						<td class="tdatos">PROFESIÓN</td>
						<td class="tdatos">BRIGADA</td>
						<td class="tdatos">CARGO</td>
						<td class="tdatos">CLAVE</td>
					</tr>
			<?php
			$noRegistros = 10; //Registros por página
			$pagina = 1; //Por default, página = 1
			if($_GET["pagina"]) //Si hay página por ?pagina=valor, lo asigna
    		$pagina = $_GET["pagina"];
			$sSQL = "select tecnico.tecnico_id,tecnico.tecnico_nombres,tecnico.tecnico_apellidos,ttecnico.ttecnico_nombre,
	tecnico.profesion,brigada.brigada_nombre,tecnico.cargo,tecnico.clave 
from tecnico,ttecnico,brigada 
where tecnico.ttecnico_id=ttecnico.ttecnico_id and
	tecnico.brigada_id=brigada.brigada_id
			LIMIT ".($pagina-1)*$noRegistros.",$noRegistros";
			$result = mysql_query($sSQL) or die(mysql_error());
			
		
			while ($row=mysql_fetch_assoc($result))
				{
										
					echo "<tr>
					
					<td class=\"tdatos\"><a href=\"elim_tecnicos.php?tecnico_id=".$row["tecnico_id"]."\"><img src=../theme/images/user-delete-2.ico></a></td>
					<td class=\"tdatos\"><a href=\"bus_tecnicos.php?busqueda=tecnico_id&tecnico_id=".$row["tecnico_id"]."\">".$row["tecnico_id"]."</a></td>
					<td class=\"cdato\">".$row["tecnico_nombres"]." </td>
					<td class=\"cdato\">".$row["tecnico_apellidos"]."</td>
					<td class=\"cdato\">".$row["ttecnico_nombre"]."</td>
					<td class=\"cdato\">".$row["profesion"]."</td>
					<td class=\"cdato\">".$row["brigada_nombre"]."</td>
					<td class=\"cdato\">".$row["cargo"]."</td>
					<td class=\"cdato\">".$row["clave"]."</td>
					";
				$vehiculo="";
				
				}
				$sSQL = "SELECT count(*) FROM tecnico"; //Cuento el total de registros
				$result = mysql_query($sSQL);
				$row = mysql_fetch_array($result);
				$totalRegistros = $row["count(*)"]; //Almaceno el total en una variable
				echo "<font color=#000080><b>Total registros: ".$totalRegistros."  , Pagina: </b></font>";
 				$noPaginas = $totalRegistros/$noRegistros; //Determino la cantidad de páginas
				for($i=1; $i<$noPaginas+1; $i++)
				 { //Imprimo las páginas
    				if($i == $pagina)
        			echo "<font color=#FF0000><b>$i</b></font>"; //A la página actual no le pongo link
    					else
        					echo "<a href=\"bus_tecnicos.php?busqueda=todos&pagina=".$i."\">  <font color=#000080><b>$i</b></font></a>";
						$vehiculo="";
				 }
				}//fin todos
			else
			{
					?>
					<table width="500" align="center" class="tabla">
					<tr>
			<td class="tdatos">ELIMINAR</td>
						<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">NOMNRES</td>
						<td class="tdatos">APELLIDOS</td>
						<td class="tdatos">TIPO TÉCNICO</td>
						<td class="tdatos">CARRERA</td>
						<td class="tdatos">BRIGADA</td>
						<td class="tdatos">CARGO</td>
						<td class="tdatos">CLAVE</td>
								
					</tr>
			<?php
				while ($row=mysql_fetch_assoc($resultado))
				{
					$nacionalidad=$row["permanente"];	
					switch($nacionalidad)
						{
						case("PER"):
						$nacionalidad="PERMANETE";
						echo'<input type="hidden" name="nacionalidad" value="<?php echo $nacionalidad; ?>"><?php echo $nacionalidad; ?></input>';
						break;
						case("TC"):
						$nacionalidad="TIEMPO COMPLETO";
						echo'<input type="hidden" name="nacionalidad" value="<?php echo $nacionalidad; ?>"><?php echo $nacionalidad; ?></input>';
						break;
						case("MT"):
						$nacionalidad="MEDIO TIEMPO ";
						echo'<input type="hidden" name="nacionalidad" value="<?php echo $nacionalidad; ?>"><?php echo $nacionalidad; ?></input>';
						break;
						case("TP"):
						$nacionalidad="TIEMPO PARCIAL ";
						echo'<input type="hidden" name="nacionalidad" value="<?php echo $nacionalidad; ?>"><?php echo $nacionalidad; ?></input>';
						break;
						case("ES"):
						$nacionalidad="ESPORADICO";
						echo'<input type="hidden" name="nacionalidad" value="<?php echo $nacionalidad; ?>"><?php echo $nacionalidad; ?></input>';
						break;	
						}
					
					echo "<tr>
					
					<td class=\"tdatos\"><a href=\"elim_tecnicos.php?tecnico_id=".$row["tecnico_id"]."\"><img src=../theme/images/user-delete-2.ico></a></td>
					<td class=\"tdatos\"><a href=\"bus_tecnicos.php?busqueda=tecnico_id&tecnico_id=".$row["tecnico_id"]."\">".$row["tecnico_id"]."</a></td>
					<td class=\"cdato\">".$row["nombre"]." </td>
					<td class=\"cdato\">".$row["apellidos"]."</td>
					<td class=\"cdato\">".$row["ttecnico"]."</td>
					<td class=\"cdato\">".$row["facultad"]."</td>
					//<td class=\"cdato\">".$nacionalidad."</td>
					<td class=\"cdato\">".$row["formacion"]."</td>
					<td class=\"cdato\">".$row["mail"]."</td>
					<td class=\"cdato\">".$row["clave"]."</td>
					";
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
			cuadro_error("TIPO DE TECNICO: <b>".$_REQUEST["tecnico_nombres"]."</b> No Registrado  <b><a href=reg_func.php target=\"_self\">Registrar?</a></b>"); ///colocar un enlace para registrar a la persona
		}
}	
echo "<br><br>";
require("../theme/footer_inicio.php");
?>