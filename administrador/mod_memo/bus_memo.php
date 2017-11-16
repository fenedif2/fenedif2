<?php
require("../mod_configuracion/conexion.php");
require("../theme/header_inicio.php");
?>
<br />
<div class="titulo"><h6>CONSULTA DE MEMORÁNDUM</h6></div>
<div id="centercontent">
<div align="center">
<table>
<td>
<form action="bus_memo.php">
		<input type="hidden" name="busqueda" value="pnombre">
		<table class="tabla">
		<tr>
			<td colspan="2" align="center">INGRESE NOMBRE</td>
		</tr>
		<tr>
			<td><input type="text" name="pnombre" value="<?php echo $_REQUEST["pnombre"]; ?>" size="20"></td>
			<td><input type="submit" value="Buscar"></td>
		</tr>
		</table>
</form>
</td>
<td>
<form action="bus_memo.php">
		<input type="hidden" name="busqueda" value="todos">
		<table class="tabla">
		<tr>
			<td colspan="2" align="center">Todos.</td>
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

//////////////////////////  descargar archivo ////////////////////////////////////////////////



/////////////////////////////////////////////////////////////////////////////////////////////
if($_REQUEST["busqueda"]!="")
{
switch($_REQUEST["busqueda"])
{
	case'memo_id':
	$resultado=mysql_query("select * from memo where memo_id='".quitar($_REQUEST["memo_id"])."'  ",$con);

	if(mysql_num_rows($resultado) == 1)
	{
		$memo_id=mysql_result($resultado,0,"memo_id");
		$memo_nombre=mysql_result($resultado,0,"memo_nombre");
		
	}
	break;
	case'id_memo':
	 echo pasos;
		
	break;
	case'pnombre':
	$resultado=mysql_query("select * from memo where memo_nombre like '".strtoupper($_REQUEST["pnombre"])."' ",$con);
	break;
		case'todos':
	$resultado=mysql_query("select * from memo");
	break;
}

if(mysql_num_rows($resultado)>0)
{
	if($_REQUEST["busqueda"]=="memo_id")
	{
		?>
		
		<form action="../mod_impresion/imp_memo.php" method="post"  target="_blank">
		<br />
		<table width="500" align="center"  class="tabla">
		<tr>
			<td class="tdatos" colspan="2" align="center"><h3>DATOS DE MEMORÁNDUM</h3></td>
		</tr>
		<tr>
			<td>1. REGISTRO DE MEMORÁNDUM</td>
		</tr>
		<tr>
			<td class="tdatos">Código Memorándum:</td>
			<td class="dtabla">
			 <input type="hidden" name="memo_id" value="<?php echo $memo_id; ?>"><?php echo $memo_id; ?></input></td>
		</tr>
		<tr>
			<td class="tdatos">Nombre Memorándum:</td>
			<td class="dtabla">
			<input type="hidden" name="memo_nombre" value="<?php echo $memo_nombre; ?>"><?php echo $memo_nombre; ?></input></td>
		</tr>
		<?php 
		echo '<tr>
			<td colspan="2" align="center" class="cdato">
			<input type="button" value="Eliminar" onclick="location.href='."'".'elim_memo.php?memo_id=memo_id&memo_id='.$memo_id."'".'">
			<input type="button" value="Actualizar Datos" onclick="location.href='."'".'act_memo.php?memo_id=memo_id&memo_id='.$memo_id."'".'">
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
						<td class="tdatos">NOMNRE DE MEMORÁNDUM</td>
						<td class="tdatos">FECHA</td>
						<td class="tdatos">DESCARGAR</td>
					</tr>
			<?php
				while ($row=mysql_fetch_assoc($resultado))
				{
					echo "<tr>
					<td class=\"tdatos\"><a href=\"elim_memo.php?busqueda=memo_id&memo_id=".$row["memo_id"]."\"><img src=../theme/images/user-delete-2.ico></a></td>
					<td class=\"tdatos\"><a href=\"bus_memo.php?busqueda=memo_id&memo_id=".$row["memo_id"]."\">".$row["memo_id"]."</a></td>
					<td class=\"cdato\">".$row["memo_nombre"]."</td>
					<td class=\"cdato\">".$row["fecha"]."</td>
					<td class=\"tdatos\" align=center><a href=\"getfiles.php?memo_id=".$row["memo_id"]."\"><img src=../theme/images/pdf.ico></a></td>
					";
				$vehiculo="";
				
				}
				}
			else
			{
					?>
					<table width="500" align="center" class="tabla">
					<tr>
						<td class="tdatos">ELIMINAR</td>
						<td class="tdatos">CÓDIGO</td>
						<td class="tdatos">NOMNRE DE MEMORÁNDUM</td>
						<td class="tdatos">FECHA</td>
						<td class="tdatos">DESCARGAR</td>
					</tr>
			<?php
				while ($row=mysql_fetch_assoc($resultado))
				{
					echo "<tr>
					<td class=\"tdatos\"><a href=\"elim_memo.php?busqueda=memo_id&memo_id=".$row["memo_id"]."\"><img src=../theme/images/user-delete-2.ico></a></td>
					<td class=\"tdatos\"><a href=\"bus_memo.php?busqueda=memo_id&memo_id=".$row["memo_id"]."\">".$row["memo_id"]."</a></td>
					<td class=\"cdato\">".$row["memo_nombre"]."</td>
					<td class=\"cdato\">".$row["fecha"]."</td>
					<td class=\"tdatos\" align=center><a href=\"getfiles.php?memo_id=".$row["memo_id"]."\"><img src=../theme/images/pdf.ico></a></td>
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
			cuadro_error("memo: <b>".$_REQUEST["memo_nombre"]."</b> No Registrado  <b><a href=reg_memo.php target=\"_self\">Registrar?</a></b>"); ///colocar un enlace para registrar a la persona
		}
}	
echo "<br><br>";
require("../theme/footer_inicio.php");
?>