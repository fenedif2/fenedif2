<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><h5>CONSULTAR USUARIO</h5></div>
<div id="centercontent">
<div align="center">
<table>
<td>
<form action="bus_usuario.php">
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
<form action="bus_usuario.php">
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
	case'usuario_id':
	$resultado=mysql_query("SELECT usuario.*,
    tipousuario.tipousuario_nombre,sucursal.sucursal_nombre,testadousuario.estusudescripcion
  	FROM
    usuario
    INNER JOIN tipousuario ON
    usuario.tipousuario_id = tipousuario.tipousuario_id
	INNER JOIN sucursal ON
	usuario.sucursal=sucursal.sucursal_id
	INNER JOIN testadousuario on
	usuario.estusucodigo=testadousuario.estusucodigo where usuario_id='".quitar($_REQUEST["usuario_id"])."'  ",$con);

	if(mysql_num_rows($resultado) == 1)
	{
		$usuario_id=mysql_result($resultado,0,"usuario_id");
		$usuario_cedula=mysql_result($resultado,0,"usuario_cedula");
		$usuario_nombres=mysql_result($resultado,0,"usuario_nombres");
		$usuario_apellidos=mysql_result($resultado,0,"usuario_apellidos");
		
	}
	break;
	case'pnombre':
	$resultado=mysql_query("SELECT usuario.*,
    tipousuario.tipousuario_nombre,sucursal.sucursal_nombre,testadousuario.estusudescripcion
  	FROM
    usuario
    INNER JOIN tipousuario ON
    usuario.tipousuario_id = tipousuario.tipousuario_id
	INNER JOIN sucursal ON
	usuario.sucursal=sucursal.sucursal_id
	INNER JOIN testadousuario on
	usuario.estusucodigo=testadousuario.estusucodigo where usuario_nombres like '".$_REQUEST["pnombre"]."%'",$con)
	 
	;
	
	break;
	case'todos':
	$resultado=mysql_query("SELECT usuario.*,
    tipousuario.tipousuario_nombre,sucursal.sucursal_nombre,testadousuario.estusudescripcion
  	FROM
    usuario
    INNER JOIN tipousuario ON
    usuario.tipousuario_id = tipousuario.tipousuario_id
	INNER JOIN sucursal ON
	usuario.sucursal=sucursal.sucursal_id
	INNER JOIN testadousuario on
	usuario.estusucodigo=testadousuario.estusucodigo");
	break;
}

if(mysql_num_rows($resultado)>0)
{
	if($_REQUEST["busqueda"]=="usuario_id")
	{
		?>
		
		<form action="../mod_impresion/imp_usuario.php" method="post"  target="_blank">
		<br />
		<table width="500" align="center"  class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS USUARIO</h3></td>
		</tr>
		<tr>
			<td>1. REGISTRO DE USUARIO</td>
		</tr>
		<tr>
			<td class="tdatos">Usuario:</td>
			<td class="dtabla">
			 <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>"><?php echo $usuario_id; ?></input></td>
		</tr>
		<tr>
			<td class="tdatos">Cédula:</td>
			<td class="dtabla">
			 <input type="hidden" name="usuario_cedula" value="<?php echo $usuario_cedula; ?>"><?php echo $usuario_id; ?></input></td>
		</tr>
		<tr>
			<td class="tdatos">Nombre Usuario:</td>
			<td class="dtabla">
			<input type="hidden" name="usuario_nombres" value="<?php echo $usuario_nombres; ?>"><?php echo $usuario_nombres; ?></input></td>
		</tr>
		<tr>
			<td class="tdatos">Apellidos Usuario:</td>
			<td class="dtabla">
			<input type="hidden" name="usuario_apellidos" value="<?php echo $usuario_apellidos; ?>"><?php echo $usuario_nombres; ?></input></td>
		</tr>
		<?php 
		echo '<tr>
			<td colspan="2" align="center" class="cdato">
			<input type="button" value="Eliminar" onclick="location.href='."'".'elim_usuario.php?usuario_id=usuario_id&usuario_id='.$usuario_id."'".'">
			<input type="button" value="Actualizar Datos" onclick="location.href='."'".'act_usuario.php?usuario_id=usuario_id&usuario_id='.$usuario_id."'".'">
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
			$noRegistros = 20; //Registros por página
			$pagina = 1; //Por default, página = 1
			if($_GET["pagina"]) //Si hay página por ?pagina=valor, lo asigna
    		$pagina = $_GET["pagina"];	
			$sel_agrup = mysql_query("SELECT usuario.*,
    tipousuario.tipousuario_nombre,sucursal.sucursal_nombre,testadousuario.estusudescripcion
  	FROM
    usuario
    INNER JOIN tipousuario ON
    usuario.tipousuario_id = tipousuario.tipousuario_id
	INNER JOIN sucursal ON
	usuario.sucursal=sucursal.sucursal_id
	INNER JOIN testadousuario on
	usuario.estusucodigo=testadousuario.estusucodigo order by usuario.usuario_id LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
			$num_agrup = mysql_num_rows($sel_agrup);
			echo'<br>';echo'<br>';echo'<br>';
			$sSQL = "SELECT count(*) FROM usuario"; //Cuento el total de registros
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
        					echo "<a href=\"bus_usuario.php?busqueda=todos&pagina=".$i."\">  <font color=#000080> <b>$i</b></font></a>";
						$vehiculo="";
				 }	
			?>
					<table width="500" align="center" class="tabla">
					<tr>
						<td class="tdatos">ELIMINAR</td>
						<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">CÉDULA</td>
						<td class="tdatos">NOMNRES Y APELLIDOS</td>
						<td class="tdatos">CORREO</td>
						<td class="tdatos">TIPO USUARIO</td>
						<td class="tdatos">SUCURSAL</td>
						<td class="tdatos">ESTADO USUARIO</td>
						<td class="tdatos">ESTADO CONEXION</td>
						<td class="tdatos">DETALLE CONEXION</td>
						
					</tr>
			<?php
			for($i=0;$i<$num_agrup;$i++)
					{
					$registro_agrup= mysql_fetch_array($sel_agrup);
					echo "<tr>
					<td class=\"tdatos\"><a href=\"elim_usuario.php?busqueda=usuario_id&usuario_id=".$registro_agrup["usuario_id"]."\"><img src=../theme/images/user-delete-2.ico></a></td>
					<td class=\"tdatos\"><a href=\"bus_usuario.php?busqueda=usuario_id&usuario_id=".$registro_agrup["usuario_id"]."\">".$registro_agrup["usuario_id"]."</a></td>
					<td class=\"cdato\">".$registro_agrup["usuario_cedula"]."</td>
					<td class=\"cdato\">".$registro_agrup["usuario_nombres"]." ".$registro_agrup["usuario_apellidos"]."</td>
					<td class=\"cdato\">".$registro_agrup["usuario_correo"]."</td>
					<td class=\"cdato\">".$registro_agrup["tipousuario_nombre"]."</td>
					<td class=\"cdato\">".$registro_agrup["sucursal_nombre"]."</td>
					<td class=\"cdato\">".$registro_agrup["estusudescripcion"]."</td>
					
					"
					;
					if($registro_agrup["usuario_estado"]==1)
						{
						echo "<td><img src=../imgs/cero.png></td>";
						echo "<td class=\"cdato\">DESCONECTADO</td>";
						}
							else
								{
								echo "<td><img src=../imgs/uno.png></td>";
								echo "<td class=\"cdato\" ><FONT COLOR=red>CONECTADO</FONT></td>";
								}
							
								
						}
					
				}
			else
			{
					$noRegistros = 20; //Registros por página
			$pagina = 1; //Por default, página = 1
			if($_GET["pagina"]) //Si hay página por ?pagina=valor, lo asigna
    		$pagina = $_GET["pagina"];	
			$sel_agrup = mysql_query("SELECT usuario.*,
    tipousuario.tipousuario_nombre,sucursal.sucursal_nombre,testadousuario.estusudescripcion
  	FROM
    usuario
    INNER JOIN tipousuario ON
    usuario.tipousuario_id = tipousuario.tipousuario_id
	INNER JOIN sucursal ON
	usuario.sucursal=sucursal.sucursal_id
	INNER JOIN testadousuario on
	usuario.estusucodigo=testadousuario.estusucodigo order by usuario.usuario_id LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
			$num_agrup = mysql_num_rows($sel_agrup);
			echo'<br>';echo'<br>';echo'<br>';
			$sSQL = "SELECT count(*) FROM usuario"; //Cuento el total de registros
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
        					echo "<a href=\"bus_usuario.php?busqueda=todos&pagina=".$i."\">  <font color=#000080> <b>$i</b></font></a>";
						$vehiculo="";
				 }	
			?>
					<table width="500" align="center" class="tabla">
					<tr>
						<td class="tdatos">ELIMINAR</td>
						<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">CÉDULA</td>
						<td class="tdatos">NOMNRES Y APELLIDOS</td>
						<td class="tdatos">CORREO</td>
						<td class="tdatos">TIPO USUARIO</td>
						<td class="tdatos">SUCURSAL</td>
						<td class="tdatos">ESTADO USUARIO</td>
						<td class="tdatos">ESTADO CONEXION</td>
						
					</tr>
			<?php
			for($i=0;$i<$num_agrup;$i++)
					{
					$registro_agrup= mysql_fetch_array($sel_agrup);
					echo "<tr>
					<td class=\"tdatos\"><a href=\"elim_usuario.php?busqueda=usuario_id&usuario_id=".$registro_agrup["usuario_id"]."\"><img src=../theme/images/user-delete-2.ico></a></td>
					<td class=\"tdatos\"><a href=\"bus_usuario.php?busqueda=usuario_id&usuario_id=".$registro_agrup["usuario_id"]."\">".$registro_agrup["usuario_id"]."</a></td>
					<td class=\"cdato\">".$registro_agrup["usuario_cedula"]."</td>
					<td class=\"cdato\">".$registro_agrup["usuario_nombres"]." ".$registro_agrup["usuario_apellidos"]."</td>
					<td class=\"cdato\">".$registro_agrup["usuario_correo"]."</td>
					<td class=\"cdato\">".$registro_agrup["tipousuario_nombre"]."</td>
					<td class=\"cdato\">".$registro_agrup["sucursal_nombre"]."</td>
					<td class=\"cdato\">".$registro_agrup["estusudescripcion"]."</td>
					
					"
					;
					if($registro_agrup["usuario_estado"]==1)
						{
						echo "<td><img src=../imgs/cero.png><td>";
						
						}
							else
								{
								echo "<td><img src=../imgs/uno.png><td>";
								}
							
								
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
			cuadro_error("Usuario: <b>".$_REQUEST["usuario_nombres"]."</b> No Registrado  <b><a href=reg_usuario.php target=\"_self\">Registrar?</a></b>"); ///colocar un enlace para registrar a la persona
		}
}	
echo "<br><br>";
require("../theme/footer_inicio.php");
?>