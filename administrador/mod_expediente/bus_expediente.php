<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><h6>CONSULA DE EXPEDIENTE</h6></div>
<div id="centercontent">
<div align="center">
<table>
<td>
<form action="bus_expediente.php">
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
<form action="bus_expediente.php">
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
	case'expediente_id':
	$resultado=mysql_query("select expediente.expediente_id,expediente.expediente_codigo,
expediente.expediente_cedula,expediente.expediente_nombre,respbrigada.nombres,respbrigada.apellidos,expediente.inicio,expediente.fin,
memo.memo_nombre,brigada.brigada_nombre ,tcanton.opcion as canton,tparroquia.opcion as parroquia,expediente_sector,expediente_superficie
from 
expediente
left join
	respbrigada on expediente.respbrigada_id=respbrigada.respbrigada_id
left join
	memo on expediente.memo_id=memo.memo_id
left join
	brigada on respbrigada.brigada_id=brigada.brigada_id
left join
	tcanton on expediente.canton=tcanton.id
left join
	tparroquia on expediente.parroquia=tparroquia.id

	 where expediente_id='".quitar($_REQUEST["expediente_id"])."'  ",$con );

	if(mysql_num_rows($resultado) == 1)
	{
	$expediente_id=mysql_result($resultado,0,"expediente_id");
	$expediente_codigo=mysql_result($resultado,0,"expediente_codigo");
	$expediente_cedula=mysql_result($resultado,0,"expediente_cedula");
	$expediente_nombre=mysql_result($resultado,0,"expediente_nombre");
	$canton=mysql_result($resultado,0,"canton");
	$paroquia=mysql_result($resultado,0,"parroquias");
	$expediente_sector=mysql_result($resultado,0,"expediente_sector");
	$expediente_superficie=mysql_result($resultado,0,"expediente_superficie");
	$nombres=mysql_result($resultado,0,"nombres");
	$apellidos=mysql_result($resultado,0,"apellidos");
	$inicio=mysql_result($resultado,0,"inicio");
	$fin=mysql_result($resultado,0,"fin");
	$brigada=mysql_result($resultado,0,"brigada_nombre");
	$memo_nombre=mysql_result($resultado,0,"memo_nombre");
	
		
	}
	break;
	case'pnombres':
	$resultado=mysql_query("select expediente.expediente_id,expediente.expediente_codigo,
expediente.expediente_cedula,expediente.expediente_nombre,respbrigada.nombres,respbrigada.apellidos,expediente.inicio,expediente.fin,
memo.memo_nombre,brigada.brigada_nombre ,tcanton.opcion as canton,tparroquia.opcion as parroquia,expediente_sector,expediente_superficie
from 
expediente
left join
	respbrigada on expediente.respbrigada_id=respbrigada.respbrigada_id
left join
	memo on expediente.memo_id=memo.memo_id
left join
	brigada on respbrigada.brigada_id=brigada.brigada_id
left join
	tcanton on expediente.canton=tcanton.id
left join
	tparroquia on expediente.parroquia=tparroquia.id
	 where nombres like '".strtoupper($_REQUEST["pnombres"])."' ",$con);
	break;
	case'todos':
	$resultado=mysql_query("select expediente.expediente_id,expediente.expediente_codigo,
expediente.expediente_cedula,expediente.expediente_nombre,respbrigada.nombres,respbrigada.apellidos,expediente.inicio,expediente.fin,
memo.memo_nombre,brigada.brigada_nombre ,tcanton.opcion as canton,tparroquia.opcion as parroquia,expediente_sector,expediente_superficie
from 
expediente
left join
	respbrigada on expediente.respbrigada_id=respbrigada.respbrigada_id
left join
	memo on expediente.memo_id=memo.memo_id
left join
	brigada on respbrigada.brigada_id=brigada.brigada_id
left join
	tcanton on expediente.canton=tcanton.id
left join
	tparroquia on expediente.parroquia=tparroquia.id");
	break;
}

if(mysql_num_rows($resultado)>0)
{
	if($_REQUEST["busqueda"]=="expediente_id")
	{
		?>
		
		<form action="../mod_impresion/imp_expediente.php" method="post"  target="_blank">
		<br />
		<table width="500" align="center"  class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS DEL EXPEDIENTE</h3></td>
		</tr>
		<tr>
			<td>EXPEDIENTE</td>
		</tr>
		<tr>
			<td class="tdatos">CODIGO DE EXPEDIENTE</td>
			<td class="dtabla"><input type="text" name="expediente_id" readonly="readonly"  value="<?php echo $expediente_id?>" size="40" /></td>
		</tr>
		<tr>
			<td class="tdatos">EXPEDIENTE:</td>
			<td class="dtabla">
			<input type="hidden" name="expediente_codigo" value="<?php echo $expediente_codigo; ?>"><?php echo $expediente_codigo; ?></input></td>
		</tr>
		<tr>
			<td class="tdatos">CÉDULA:</td>
			<td class="dtabla">
			<input type="hidden" name="expediente_cedula" value="<?php echo $expediente_cedula; ?>"><?php echo $expediente_cedula; ?></input></td>
		</tr>
		<tr>
			<td class="tdatos">BENEFICIARIO:</td>
			<td class="dtabla">
			<input type="hidden" name="expediente_nombre" value="<?php echo $expediente_nombre; ?>"><?php echo $expediente_nombre; ?></input></td>
		</tr>
		<tr>
			<td class="tdatos">CANTÓN:</td>
			<td class="dtabla">
			<input type="hidden" name="canton" value="<?php echo $canton; ?>"><?php echo $canton; ?></input></td>
		</tr>
				<tr>
			<td class="tdatos">PARROQUIA:</td>
			<td class="dtabla">
			<input type="hidden" name="parroquia" value="<?php echo $parroquia; ?>"><?php echo $parroquia; ?></input></td>
		</tr>
		<tr>
			<td class="tdatos">SECTOR:</td>
			<td class="dtabla">
			<input type="hidden" name="expediente_sector" value="<?php echo $expediente_sector; ?>"><?php echo $expediente_sector; ?></input></td>
		</tr>	
		<tr>
			<td class="tdatos">SUPERFICIE:</td>
			<td class="dtabla">
			<input type="hidden" name="expediente_superficie" value="<?php echo $expediente_superficie; ?>"><?php echo $expediente_superficie; ?></input></td>
		</tr>	
		<tr>
			<td class="tdatos">RESPONSABLE DE BRIGADA:</td>
			<td class="dtabla">
			<input type="hidden" name="nombres" value="<?php echo $nombres; ?>"><?php echo $nombres; ?></input></td>
		</tr>
		<tr>
			<td class="tdatos">FECHA INICIO</td>	
			<td class="dtabla">
			<input type="hidden" name="inicio" value="<?php echo $inicio; ?>"><?php echo $inicio; ?></input></td>
		</tr>
		<tr>
			<td class="tdatos">FECHA FIN</td>	
			<td class="dtabla">
			<input type="hidden" name="fin" value="<?php echo $fin; ?>"><?php echo $fin; ?></input></td>
		</tr>	
		<tr>
			<td class="tdatos">BRIGADA</td>
			<td class="dtabla">
			<input type="hidden" name="brigada" value="<?php echo $brigada; ?>"><?php echo $brigada; ?></input></td>
		</tr>	
		<tr>
			<td class="tdatos">MEMORÁNDUM</td>
			<td class="dtabla">
			<input type="hidden" name="memo_nombre" value="<?php echo $memo_nombre; ?>"><?php echo $memo_nombre; ?></input></td>
		</tr>	
		<?php 
		echo '<tr>
			<td colspan="2" align="center" class="cdato">
			<input type="button" value="Eliminar" onclick="location.href='."'".'elim_expediente.php?expediente_id=expediente_id&expediente_id='.$expediente_id."'".'">
			<input type="button" value="Actualizar Datos" onclick="location.href='."'".'act_expediente.php?expediente_id=expediente_id&expediente_id='.$expediente_id."'".'">
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
						<td class="tdatos">EXPEDIENTE</td>
						<td class="tdatos">CEDULA</td>
						<td class="tdatos">BENEFICIARIO</td>
						<td class="tdatos">CANTON</td>
						<td class="tdatos">PARROQUIA</td>
						<td class="tdatos">SECTOR</td>
						<td class="tdatos">SUPERFICIE</td>
						<td class="tdatos">RESPONSABLE BRIGADA</td>
						<td class="tdatos">FECHA INICIO</td>
						<td class="tdatos">FECHA FIN</td>
						<td class="tdatos">BRIGADA</td>
						<td class="tdatos">MEMORÁNDUM</td>
						
					</tr>
			<?php
			$noRegistros = 10; //Registros por página
			$pagina = 1; //Por default, página = 1
			if($_GET["pagina"]) //Si hay página por ?pagina=valor, lo asigna
    		$pagina = $_GET["pagina"];
			$sSQL = "select expediente.expediente_id,expediente.expediente_codigo,
expediente.expediente_cedula,expediente.expediente_nombre,respbrigada.nombres,respbrigada.apellidos,expediente.inicio,expediente.fin,
memo.memo_nombre,brigada.brigada_nombre ,tcanton.opcion as canton,tparroquia.opcion as parroquia,expediente_sector,expediente_superficie
from 
expediente
left join
	respbrigada on expediente.respbrigada_id=respbrigada.respbrigada_id
left join
	memo on expediente.memo_id=memo.memo_id
left join
	brigada on respbrigada.brigada_id=brigada.brigada_id
left join
	tcanton on expediente.canton=tcanton.id
left join
	tparroquia on expediente.parroquia=tparroquia.id
			 LIMIT ".($pagina-1)*$noRegistros.",$noRegistros";
			$result = mysql_query($sSQL) or die(mysql_error());
			while ($row=mysql_fetch_assoc($result))
				{
					echo "<tr>
					<td class=\"tdatos\"><a href=\"elim_expediente.php?expediente_id=".$row["expediente_id"]."\"><img src=../theme/images/user-delete-2.ico></a></td>
					<td class=\"tdatos\"><a href=\"bus_expediente.php?busqueda=expediente_id&expediente_id=".$row["expediente_id"]."\">".$row["expediente_id"]."</a></td>
					<td class=\"cdato\">".$row["expediente_codigo"]." </td>
					<td class=\"cdato\">".$row["expediente_cedula"]." </td>
					<td class=\"cdato\">".$row["expediente_nombre"]." </td>
					<td class=\"cdato\">".$row["canton"]." </td>
					<td class=\"cdato\">".$row["parroquia"]." </td>
					<td class=\"cdato\">".$row["expediente_sector"]." </td>
					<td class=\"cdato\">".$row["expediente_superficie"]." </td>
					<td class=\"cdato\">".$row["nombres"]."  ".$row["apellidos"]."</td>
					<td class=\"cdato\">".$row["inicio"]."</td>
					<td class=\"cdato\">".$row["fin"]."</td>
					<td class=\"cdato\">".$row["brigada_nombre"]."</td>
					<td class=\"cdato\">".$row["memo_nombre"]."</td>
					
				
					";
				$vehiculo="";
				
				}
				$sSQL = "SELECT count(*) FROM expediente"; //Cuento el total de registros
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
        					echo "<a href=\"bus_expediente.php?busqueda=todos&pagina=".$i."\">  <font color=#000080><b>$i</b></font></a>";
						$vehiculo="";
				 }
				}//fin todos
			else
			{
					?>
					<table width="500" align="center" class="tabla">
					<tr>
						<td class="tdatos">ELIMINAR</td>
						<td class="tdatos">CODIGO</td>
						<td class="tdatos">EXPEDIENTE</td>
						<td class="tdatos">CEDULA</td>
						<td class="tdatos">BENEFICIARIO</td>
						<td class="tdatos">CANTON</td>
						<td class="tdatos">PARROQUIA</td>
						<td class="tdatos">SECTOR</td>
						<td class="tdatos">SUPERFICIE</td>
						<td class="tdatos">RESPONSABLE BRIGADA</td>
						<td class="tdatos">FECHA INICIO</td>
						<td class="tdatos">FECHA FIN</td>
						<td class="tdatos">BRIGADA</td>
						<td class="tdatos">MEMORÁNDUM</td>
																				
					</tr>
			<?php
				while ($row=mysql_fetch_assoc($resultado))
				{
					echo "<tr>
					<td class=\"tdatos\"><a href=\"elim_expediente.php?expediente_id=".$row["expediente_id"]."\"><img src=../theme/images/user-delete-2.ico></a></td>
					<td class=\"tdatos\"><a href=\"bus_expediente.php?busqueda=expediente_id&expediente_id=".$row["expediente_id"]."\">".$row["expediente_id"]."</a></td>
					<td class=\"cdato\">".$row["expediente_codigo"]." </td>
					<td class=\"cdato\">".$row["expediente_cedula"]." </td>
					<td class=\"cdato\">".$row["expediente_nombre"]." </td>
					<td class=\"cdato\">".$row["canton"]." </td>
					<td class=\"cdato\">".$row["parroquias"]." </td>
					<td class=\"cdato\">".$row["expediente_sector"]." </td>
					<td class=\"cdato\">".$row["expediente_superficie"]." </td>
					<td class=\"cdato\">".$row["nombres"]."  ".$row["apellidos"]."</td>
					<td class=\"cdato\">".$row["inicio"]."</td>
					<td class=\"cdato\">".$row["fin"]."</td>
					<td class=\"cdato\">".$row["brigada_nombre"]."</td>
					<td class=\"cdato\">".$row["memo_nombre"]."</td>
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
			cuadro_error("TIPO DE COORDINADOR: <b>".$_REQUEST["nombres"]."</b> No Registrado  <b><a href=reg_coord.php target=\"_self\">Registrar?</a></b>"); ///colocar un enlace para registrar a la persona
		}
}	
echo "<br><br>";
require("../theme/footer_inicio.php");
?>