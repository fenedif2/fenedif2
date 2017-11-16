<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><h6>CONSULAT DE PROYECTO</h6></div>
<div id="centercontent">
<div align="center">
<table>
<td>
<form action="bus_proy.php">
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
<form action="bus_proy.php">
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
	case'agrupamiento':
	$resultado=mysql_query("select agrupamientos.agrupamiento,agrupamientos.nombre,docentes.nombres,docentes.apellidos,uoi.uoi_nombre AS uoi,
agrupamientos.inicio,agrupamientos.fin,convocatoria.conv_nombre,investigacion.nombre as investigacion
,unesco.nombre as unesco,agrupamientos.presupuesto,agrupamientos.solicitado,linvestigacion.linvest_nombre as linvestigacion,agrupamientos.fondos from agrupamientos,docentes,uoi,convocatoria,investigacion,unesco,linvestigacion where docentes.docente=agrupamientos.docente and uoi.id_uoi=agrupamientos.uoi	and convocatoria.id_convocatoria=agrupamientos.conv_nombre and investigacion.clave=agrupamientos.investigacion and unesco.clave=agrupamientos.unesco  and linvestigacion.id_linvestigacion=agrupamientos.linvestigacion and agrupamiento='".quitar($_REQUEST["agrupamiento"])."'  ",$con );

	if(mysql_num_rows($resultado) == 1)
	{
	$agrupamiento=mysql_result($resultado,0,"agrupamiento");
	$nombre=mysql_result($resultado,0,"nombre");
	$nombres=mysql_result($resultado,0,"nombres");
	$apellidos=mysql_result($resultado,0,"apellidos");
	$uoi=mysql_result($resultado,0,"uoi");
	$inicio=mysql_result($resultado,0,"inicio");
	$fin=mysql_result($resultado,0,"fin");
	$conv_nombre=mysql_result($resultado,0,"conv_nombre");
	$investigacion=mysql_result($resultado,0,"investigacion");
	$unesco=mysql_result($resultado,0,"unesco");
	$presupuesto=mysql_result($resultado,0,"presupuesto");
	$solicitado=mysql_result($resultado,0,"solicitado");
	$linvestigacion=mysql_result($resultado,0,"linvestigacion");
	$fondos=mysql_result($resultado,0,"fondos");
		
	}
	break;
	case'pnombres':
	$resultado=mysql_query("select * from agrupamientos where nombres like '".strtoupper($_REQUEST["pnombres"])."' ",$con);
	break;
	case'todos':
	$resultado=mysql_query("select agrupamientos.agrupamiento,agrupamientos.nombre,docentes.nombres,docentes.apellidos,uoi.uoi_nombre AS uoi,
							agrupamientos.inicio,agrupamientos.fin,convocatoria.conv_nombre,investigacion.nombre as investigacion
							,unesco.nombre as unesco,agrupamientos.presupuesto,agrupamientos.solicitado,linvestigacion.linvest_nombre as 
							linvestigacion,agrupamientos.fondos from agrupamientos,docentes,uoi,convocatoria,investigacion,unesco,linvestigacion 
							where docentes.docente=agrupamientos.docente and uoi.id_uoi=agrupamientos.uoi	and 
							convocatoria.id_convocatoria=agrupamientos.conv_nombre and investigacion.clave=agrupamientos.investigacion and 
							unesco.clave=agrupamientos.unesco  and linvestigacion.id_linvestigacion=agrupamientos.linvestigacion order by 
							docentes.apellidos ASC");
	break;
}

if(mysql_num_rows($resultado)>0)
{
	if($_REQUEST["busqueda"]=="agrupamiento")
	{
		?>
		
		<form action="../mod_impresion/imp_proy.php" method="post"  target="_blank">
		<br />
		<table width="500" align="center"  class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS DE TIPO DE COORDINADOR</h3></td>
		</tr>
		<tr>
			<td>PROYECTO</td>
		</tr>
		<tr>
			<td class="tdatos">CODIGO DE PROYECTO</td>
			<td class="dtabla"><input type="text" name="agrupamiento" readonly="readonly"  value="<?php echo $agrupamiento?>" size="40" /></td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE PROYECTO:</td>
			<td class="dtabla">
			<input type="hidden" name="nombre" value="<?php echo $nombre; ?>"><?php echo $nombre; ?></input></td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRE COORDINADOR:</td>
			<td class="dtabla">
			<input type="hidden" name="nombres" value="<?php echo $nombres; ?>"><?php echo $nombres; ?></input></td>
		</tr>	
		<tr>
			<td class="tdatos">APELLIDOS COORDINADOR:</td>
			<td class="dtabla">
			<input type="hidden" name="apellidos" value="<?php echo $apellidos; ?>"><?php echo $apellidos; ?></input></td>
		</tr>
		<tr>
			<td class="tdatos">DEPARTAMENTO</td>	
			<td class="dtabla">
			<input type="hidden" name="uoi" value="<?php echo $uoi; ?>"><?php echo $uoi; ?></input></td>
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
			<td class="tdatos">CONVOCATORIA</td>
			<td class="dtabla">
			<input type="hidden" name="conv_nombre" value="<?php echo $conv_nombre; ?>"><?php echo $conv_nombre; ?></input></td>
		</tr>	
		<tr>
			<td class="tdatos">TIPO INVESTIGACION</td>
			<td class="dtabla">
			<input type="hidden" name="investigacion" value="<?php echo $investigacion; ?>"><?php echo $investigacion; ?></input></td>
		</tr>	
		<tr>
			<td class="tdatos">UNESCO</td>
			<td class="dtabla">
			<input type="hidden" name="unesco" value="<?php echo $unesco; ?>"><?php echo $unesco; ?></input></td>
		</tr>	
		<tr>
			<td class="tdatos">PRESUPUESTO</td>
			<td class="dtabla">
			<input type="hidden" name="presupuesto" value="<?php echo $presupuesto; ?>"><?php echo $presupuesto; ?></input></td>
		</tr>
		<tr>
			<td class="tdatos">SOLICITADO</td>
			<td class="dtabla">
			<input type="hidden" name="solicitado" value="<?php echo $solicitado; ?>"><?php echo $solicitado; ?></input></td>
		</tr>	
		<tr>
			<td class="tdatos">LINEA INVESTIGACION</td>
			<td class="dtabla">
			<input type="hidden" name="linvestigacion" value="<?php echo $linvestigacion; ?>"><?php echo $linvestigacion; ?></input></td>
		</tr>	
		<tr>
			<td class="tdatos">FONDO INTERNACIONAL</td>
			<td class="dtabla">
			<input type="hidden" name="fondos" value="<?php echo $fondos; ?>"><?php echo $fondos; ?></input></td>
		</tr>		
		<?php 
		echo '<tr>
			<td colspan="2" align="center" class="cdato">
			<input type="button" value="Eliminar" onclick="location.href='."'".'elim_proy.php?agrupamiento=agrupamiento&agrupamiento='.$agrupamiento."'".'">
			<input type="button" value="Actualizar Datos" onclick="location.href='."'".'act_proy.php?agrupamiento=agrupamiento&agrupamiento='.$agrupamiento."'".'">
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
						<td class="tdatos">NOMNRE PROYECTO</td>
						<td class="tdatos">NOMBRE FUNCIONARIO</td>
						<td class="tdatos">APELLIDO FUNCIONARIO</td>
						<td class="tdatos">DEPARTAMENTO</td>
						<td class="tdatos">FECHA INICIO</td>
						<td class="tdatos">FECHA FIN</td>
						<td class="tdatos">CONVOCATORIA</td>
						<td class="tdatos">TIPO INVESTIGACION</td>
						<td class="tdatos">UNESCO</td>
						<td class="tdatos">PRESUPUESTO</td>
						<td class="tdatos">SOLICITADO</td>
						<td class="tdatos">LINEA INVESTIGACION</td>
						<td class="tdatos">FONDOS</td>
					</tr>
			<?php
			$noRegistros = 10; //Registros por página
			$pagina = 1; //Por default, página = 1
			if($_GET["pagina"]) //Si hay página por ?pagina=valor, lo asigna
    		$pagina = $_GET["pagina"];
			$sSQL = "select agrupamientos.agrupamiento,agrupamientos.nombre,docentes.nombres,docentes.apellidos,uoi.uoi_nombre AS uoi,
agrupamientos.inicio,agrupamientos.fin,convocatoria.conv_nombre,investigacion.nombre as investigacion
,unesco.nombre as unesco,agrupamientos.presupuesto,agrupamientos.solicitado,linvestigacion.linvest_nombre as linvestigacion,agrupamientos.fondos from agrupamientos,docentes,uoi,convocatoria,investigacion,unesco,linvestigacion where docentes.docente=agrupamientos.docente and uoi.id_uoi=agrupamientos.uoi	and convocatoria.id_convocatoria=agrupamientos.conv_nombre and investigacion.clave=agrupamientos.investigacion and unesco.clave=agrupamientos.unesco  and linvestigacion.id_linvestigacion=agrupamientos.linvestigacion order by docentes.apellidos ASC
			 LIMIT ".($pagina-1)*$noRegistros.",$noRegistros";
			$result = mysql_query($sSQL) or die(mysql_error());
			while ($row=mysql_fetch_assoc($result))
				{
					echo "<tr>
					<td class=\"tdatos\"><a href=\"elim_proy.php?agrupamiento=".$row["agrupamiento"]."\"><img src=../theme/images/user-delete-2.ico></a></td>
					<td class=\"tdatos\"><a href=\"bus_proy.php?busqueda=agrupamiento&agrupamiento=".$row["agrupamiento"]."\">".$row["agrupamiento"]."</a></td>
					<td class=\"cdato\">".$row["nombre"]." </td>
					<td class=\"cdato\">".$row["nombres"]."</td>
					<td class=\"cdato\">".$row["apellidos"]."</td>
					<td class=\"cdato\">".$row["uoi"]."</td>
					<td class=\"cdato\">".$row["inicio"]."</td>
					<td class=\"cdato\">".$row["fin"]."</td>
					<td class=\"cdato\">".$row["conv_nombre"]."</td>
					<td class=\"cdato\">".$row["investigacion"]."</td>
					<td class=\"cdato\">".$row["unesco"]."</td>
					<td class=\"cdato\">".$row["presupuesto"]."</td>
					<td class=\"cdato\">".$row["solicitado"]."</td>
					<td class=\"cdato\">".$row["linvestigacion"]."</td>
					<td class=\"cdato\">".$row["fondos"]."</td>
					";
				$vehiculo="";
				
				}
				$sSQL = "SELECT count(*) FROM agrupamientos"; //Cuento el total de registros
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
        					echo "<a href=\"bus_proy.php?busqueda=todos&pagina=".$i."\">  <font color=#000080><b>$i</b></font></a>";
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
						<td class="tdatos">NOMNRE PROYECTO</td>
						<td class="tdatos">NOMBRE FUNCIONARIO</td>
						<td class="tdatos">APELLIDO FUNCIONARIO</td>
						<td class="tdatos">DEPARTAMENTO</td>
						<td class="tdatos">FECHA INICIO</td>
						<td class="tdatos">FECHA FIN</td>
						<td class="tdatos">CONVOCATORIA</td>
						<td class="tdatos">TIPO INVESTIGACION</td>
						<td class="tdatos">UNESCO</td>
						<td class="tdatos">PRESUPUESTO</td>
						<td class="tdatos">SOLICITADO</td>
						<td class="tdatos">LINEA INVESTIGACION</td>
						<td class="tdatos">FONDOS</td>
														
					</tr>
			<?php
				while ($row=mysql_fetch_assoc($resultado))
				{
					echo "<tr>
					<td class=\"tdatos\"><a href=\"elim_proy.php?agrupamiento=".$row["agrupamiento"]."\"><img src=../theme/images/user-delete-2.ico></a></td>
					<td class=\"tdatos\"><a href=\"bus_proy.php?busqueda=agrupamiento&agrupamiento=".$row["agrupamiento"]."\">".$row["agrupamiento"]."</a></td>
					<td class=\"cdato\">".$row["nombre"]." </td>
					<td class=\"cdato\">".$row["nombres"]."</td>
					<td class=\"cdato\">".$row["apellidos"]."</td>
					<td class=\"cdato\">".$row["uoi"]."</td>
					<td class=\"cdato\">".$row["inicio"]."</td>
					<td class=\"cdato\">".$row["fin"]."</td>
					<td class=\"cdato\">".$row["conv_nombre"]."</td>
					<td class=\"cdato\">".$row["investigacion"]."</td>
					<td class=\"cdato\">".$row["unesco"]."</td>
					<td class=\"cdato\">".$row["presupuesto"]."</td>
					<td class=\"cdato\">".$row["solicitado"]."</td>
					<td class=\"cdato\">".$row["linvestigacion"]."</td>
					<td class=\"cdato\">".$row["fondos"]."</td>
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