<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><h6>CONSULTA DATOS DEL RESPONSABLE DE BRIGADA</h6></div>
<div id="centercontent">
<div align="center">
<table>
<td>
<form action="bus_respbrigada.php">
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
<form action="bus_respbrigada.php">
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
	case'respbrigada_cedula':
	$resultado=mysql_query("select respbrigada.respbrigada_cedula,respbrigada.nombres,respbrigada.apellidos,respbrigada.email,brigada.brigada_nombre,
respbrigada.telefono,respbrigada.profesion,rol.rol_nombre 
from respbrigada,brigada,rol
where 
brigada.brigada_id=respbrigada.brigada_id and 
rol.rol_id=respbrigada.rol and respbrigada_cedula='".quitar($_REQUEST["respbrigada_cedula"])."'  ",$con);

	if(mysql_num_rows($resultado) == 1)
	{
		$respbrigada_cedula=mysql_result($resultado,0,"respbrigada_cedula");
		$nombres=mysql_result($resultado,0,"nombres");
		$apellidos=mysql_result($resultado,0,"apellidos");
		$email=mysql_result($resultado,0,"email");
		$brigada=mysql_result($resultado,0,"brigada_nombre");
		$telefono=mysql_result($resultado,0,"telefono");
		$profesion=mysql_result($resultado,0,"profesion");
		$rol=mysql_result($resultado,0,"rol_nombre");
		
	}
	break;
	case'pnombres':
	$resultado=mysql_query("select respbrigada.respbrigada_cedula,respbrigada.nombres,respbrigada.apellidos,respbrigada.email,brigada.brigada_nombre,
respbrigada.telefono,respbrigada.profesion,rol.rol_nombre 
from respbrigada,brigada,rol
where 
brigada.brigada_id=respbrigada.brigada_id and 
rol.rol_id=respbrigada.rol and nombres like '".strtoupper($_REQUEST["pnombres"])."' ",$con);
	break;
	case'todos':
	$resultado=mysql_query("select respbrigada.respbrigada_cedula,respbrigada.nombres,respbrigada.apellidos,respbrigada.email,brigada.brigada_nombre,
respbrigada.telefono,respbrigada.profesion,rol.rol_nombre 
from respbrigada,brigada,rol
where 
brigada.brigada_id=respbrigada.brigada_id and 
rol.rol_id=respbrigada.rol");
	break;
}

if(mysql_num_rows($resultado)>0)
{
	if($_REQUEST["busqueda"]=="respbrigada_cedula")
	{
		?>
		
		<form action="../mod_impresion/imp_respbrigada.php" method="post"  target="_blank">
		<br />
		<table width="500" align="center"  class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS DEL RESPONSABLE DE BRIGADA</h3></td>
		</tr>
		<tr>
			<td>1. REGISTRO DEL RESPONSABLE DE BRIGADA</td>
		</tr>
		<tr>
			<td class="tdatos">LOGIN/CEDULA:</td>
			<td class="dtabla">
			 <input type="hidden" name="respbrigada_cedula" value="<?php echo $respbrigada_cedula; ?>"><?php echo $respbrigada_cedula; ?></input></td>
		</tr>
		<tr>
			<td class="tdatos">NOMBRES:</td>
			<td class="dtabla">
			<input type="hidden" name="nombres" value="<?php echo $nombres; ?>"><?php echo $nombres; ?></input></td>
		</tr>
		<tr>
			<td class="tdatos">APELLIDOS:</td>
			<td class="dtabla">
			<input type="hidden" name="apellidos" value="<?php echo $apellidos; ?>"><?php echo $apellidos; ?></input></td>
		</tr>
		<tr>
			<td class="tdatos">EMAIL</td>
			<td class="dtabla">
			<input type="hidden" name="email" value="<?php echo $email; ?>"><?php echo $email; ?></input></td>
		</tr>
		<tr>
			<td class="tdatos">BRIGADA</td>
			<td class="dtabla">
			<input type="hidden" name="brigada" value="<?php echo $brigada; ?>"><?php echo $brigada; ?></input></td>
		</tr>
		<tr>
			<td class="tdatos">TELEFONO</td>	
			<td class="dtabla">
			<input type="hidden" name="telefono" value="<?php echo $telefono; ?>"><?php echo $telefono; ?></input></td>
		</tr>
		<tr>
			<td class="tdatos">PROFESIÓN</td>	
			<td class="dtabla">
			<input type="hidden" name="profesion" value="<?php echo $profesion; ?>"><?php echo $profesion; ?></input></td>
		</tr>
		<tr>
			<td class="tdatos">ROL</td>	
			<td class="dtabla">
			<input type="hidden" name="rol" value="<?php echo $rol; ?>"><?php echo $rol; ?></input></td>
		</tr>
		<?php 
		echo '<tr>
			<td colspan="2" align="center" class="cdato">
			<input type="button" value="Eliminar" onclick="location.href='."'".'elim_respbrigada.php?respbrigada_cedula=respbrigada_cedula&respbrigada_cedula='.$respbrigada_cedula."'".'">
			<input type="button" value="Actualizar Datos" onclick="location.href='."'".'act_respbrigada.php?respbrigada_cedula=respbrigada_cedula&respbrigada_cedula='.$respbrigada_cedula."'".'">
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
						<td class="tdatos">EMAIL</td>
						<td class="tdatos">BIGADA</td>
						<td class="tdatos">TELEFONO</td>
						<td class="tdatos">PROFESION</td>
						<td class="tdatos">ROL</td>
					</tr>
			<?php
			$noRegistros = 10; //Registros por página
			$pagina = 1; //Por default, página = 1
			if($_GET["pagina"]) //Si hay página por ?pagina=valor, lo asigna
    		$pagina = $_GET["pagina"];
			$sSQL = "select respbrigada.respbrigada_cedula,respbrigada.nombres,respbrigada.apellidos,respbrigada.email,brigada.brigada_nombre,
respbrigada.telefono,respbrigada.profesion,rol.rol_nombre 
from respbrigada,brigada,rol
where 
brigada.brigada_id=respbrigada.brigada_id and 
rol.rol_id=respbrigada.rol
			 LIMIT ".($pagina-1)*$noRegistros.",$noRegistros";
			$result = mysql_query($sSQL) or die(mysql_error());
			while ($row=mysql_fetch_assoc($result))
				{
					echo "<tr>
					<td class=\"tdatos\"><a href=\"elim_respbrigada.php?respbrigada_cedula=".$row["respbrigada_cedula"]."\"><img src=../theme/images/user-delete-2.ico></a></td>
					<td class=\"tdatos\"><a href=\"bus_respbrigada.php?busqueda=respbrigada_cedula&respbrigada_cedula=".$row["respbrigada_cedula"]."\">".$row["respbrigada_cedula"]."</a></td>
					<td class=\"cdato\">".$row["nombres"]." </td>
					<td class=\"cdato\">".$row["apellidos"]."</td>
					<td class=\"cdato\">".$row["email"]."</td>
					<td class=\"cdato\">".$row["brigada_nombre"]."</td>
					<td class=\"cdato\">".$row["telefono"]."</td>
					<td class=\"cdato\">".$row["profesion"]."</td>
					<td class=\"cdato\">".$row["rol_nombre"]."</td>
					";
				$vehiculo="";
				
				}
				$sSQL = "SELECT count(*) FROM respbrigada"; //Cuento el total de registros
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
        					echo "<a href=\"bus_respbrigada.php?busqueda=todos&pagina=".$i."\">  <font color=#000080><b>$i</b></font></a>";
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
						<td class="tdatos">NOMNRES</td>
						<td class="tdatos">APELLIDOS</td>
						<td class="tdatos">EMAIL</td>
						<td class="tdatos">BRIGADA</td>
						<td class="tdatos">TELEFONO</td>
						<td class="tdatos">PROFESION</td>
						<td class="tdatos">ROL</td>
														
					</tr>
			<?php
				while ($row=mysql_fetch_assoc($resultado))
				{
					echo "<tr>
					<td class=\"tdatos\"><a href=\"elim_respbrigada.php?respbrigada_cedula=".$row["respbrigada_cedula"]."\"><img src=../theme/images/user-delete-2.ico></a></td>
					<td class=\"tdatos\"><a href=\"bus_respbrigada.php?busqueda=respbrigada_cedula&respbrigada_cedula=".$row["respbrigada_cedula"]."\">".$row["respbrigada_cedula"]."</a></td>
					<td class=\"cdato\">".$row["nombres"]." </td>
					<td class=\"cdato\">".$row["apellidos"]."</td>
					<td class=\"cdato\">".$row["email"]."</td>
					<td class=\"cdato\">".$row["brigada_nombre"]."</td>
					<td class=\"cdato\">".$row["telefono"]."</td>
					<td class=\"cdato\">".$row["profesion"]."</td>
					<td class=\"cdato\">".$row["rol_nombre"]."</td>
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
			cuadro_error("TIPO DE respbrigada_cedula: <b>".$_REQUEST["nombres"]."</b> No Registrado  <b><a href=reg_respbrigada.php target=\"_self\">Registrar?</a></b>"); ///colocar un enlace para registrar a la persona
		}
}	
echo "<br><br>";
require("../theme/footer_inicio.php");
?>