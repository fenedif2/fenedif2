<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <link rel="shortcut icon" href="../theme/images/user.ico">
 
<title>SISTEMA DE INSERCIÓN LABORAL</title>
	<!--*********** cambio de hojas de estilo ***************-->
    <link rel="stylesheet" href="../theme/css/style.css" type="text/css">
    <script language="javascript" src="js/jquery-1.2.6.min.js"></script>

    <!-- ************** Menu ********************************-->
    <link rel="stylesheet" type="text/css" href="../theme/css/superfish.css" media="screen">
	<!-- Select's -->
    <script type="text/javascript" src="../theme/js/jQuery.js"></script>
	<!--   Slide   -->
	<script type="text/javascript" src="../theme/slide/slide.js"></script>
	<script type="text/javascript" src="../theme/js/funciones.js"></script>
	<script src="../theme/js/prototype.js" type="text/javascript"></script>
	<script src="../theme/js/effects.js" type="text/javascript"></script>
	<script src="../theme/js/scriptaculous.js" type="text/javascript"></script>
	<script src="../theme/js/rico.js" type="text/javascript"></script>
	<script src="../theme/js/litbox.js" type="text/javascript"></script>
	<script src="../theme/js/litboxflash.js" type="text/javascript"></script>
    <!-- ************** Menu ********************************-->
    <script type="text/javascript" src="../theme/js/hoverIntent.js"></script>
	<script type="text/javascript" src="../theme/js/superfish.js"></script>
</head>
	<?php 
	$_SESSION['usuario_sesion'] =$_GET['usuario'];
	//echo $_SESSION['usuario_sesion'];
	if($_SESSION["tipousuario"]=="1")	{$tipo = "SUPERADMINISTRADOR";}else if($_SESSION["tipo"]=="2") { $tipo="Funcionario";}

	?>
<html>
<body>

<table id="header" width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="1">
        <div style="position:absolute; width:302px; top:30px; background:url(../theme/images/cn-bg1.gif);">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
  
</table>
        </div>
       <div id="slogan">
       	<div style="position:absolute; top:-50px; left:-300px; margin-left:-150px; width:681px; height:25px; font-size:px; color:#000; font-family:'Courier New', Courier, monospace;">
       	 <img src="../images/logo_tixi.png" >
       	</div>	
       <div style="position:absolute; top:-10px; left:-10px; margin-left:-150px; width:681px; height:25px; font-size:px; color:#000; font-family:'Courier New', Courier, monospace;">
       	<H2><FONT COLOR="#07007A"><FONT COLOR="#FFFFFF">SISTEMA DE INTEGRACIÓN LABORAL</H2>
       	</div>	
       <div style="position:absolute; top:80px; left:250px; margin-left:-150px; width:681px; height:25px; font-size:px; color:#000; font-family:'Courier New', Courier, monospace;">
      	<marquee direction="left" width="100%" scrollamount="20" LOOP=1 BEHAVIOR=SLIDE>
    	<H5><FONT COLOR="#07007A"><FONT COLOR="#FFFFFF"><?php echo "Bienvenid@ ".$tipo." ".$_SESSION["nombre"]. ":: "; 
function get_real_ip()
{
    	
     if (isset($_SERVER["HTTP_CLIENT_IP"]))
        {
            return $_SERVER["HTTP_CLIENT_IP"];
        }
        elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
        {
            return $_SERVER["HTTP_X_FORWARDED_FOR"];
        }
       elseif (isset($_SERVER["HTTP_X_FORWARDED"]))
        {
            return $_SERVER["HTTP_X_FORWARDED"];
        }
        elseif (isset($_SERVER["HTTP_FORWARDED_FOR"]))
        {
            return $_SERVER["HTTP_FORWARDED_FOR"];
        }
        elseif (isset($_SERVER["HTTP_FORWARDED"]))
        {
            return $_SERVER["HTTP_FORWARDED"];
        }
        else
        {
            return $_SERVER["REMOTE_ADDR"];
        }
 
    }
date_default_timezone_set("America/Guayaquil" ) ; 
$tiempo = getdate(time()); 
$dia = $tiempo['wday']; 
$dia_mes=$tiempo['mday']; 
$mes = $tiempo['mon']; 
$year = $tiempo['year']; 
$hora= $tiempo['hours']; 
$minutos = $tiempo['minutes']; 
$segundos = $tiempo['seconds']; 
switch ($dia){ 
case "1": $dia_nombre="Lunes"; break; 
case "2": $dia_nombre="Martes"; break; 
case "3": $dia_nombre="Mi&eacute;rcoles"; break; 
case "4": $dia_nombre="Jueves"; break; 
case "5": $dia_nombre="Viernes"; break; 
case "6": $dia_nombre="S&aacute;bado"; break; 
case "0": $dia_nombre="Domingo"; break; 
} 
switch($mes){ 
case "1": $mes_nombre="Enero"; break; 
case "2": $mes_nombre="Febrero"; break; 
case "3": $mes_nombre="Marzo"; break; 
case "4": $mes_nombre="Abril"; break; 
case "5": $mes_nombre="Mayo"; break; 
case "6": $mes_nombre="Junio"; break; 
case "7": $mes_nombre="Julio"; break; 
case "8": $mes_nombre="Agosto"; break; 
case "9": $mes_nombre="Septiembre"; break; 
case "10": $mes_nombre="Octubre"; break; 
case "11": $mes_nombre="Noviembre"; break; 
case "12": $mes_nombre="Diciembre"; break; 
} 
echo $dia_nombre." ".$dia_mes." de ".$mes_nombre." de ".$year;   
  
  
    
		 ?> </FONT></H5>
  </marquee></div>
  
</div>
 <img src="../images/bkg_header.png" ></td>
      <td class="hbg">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>

<?php
if($tipo == "SUPERADMINISTRADOR")
	{
		echo '<div id="menu">
	<table width="650" align="center" class="tabla">
		<tr>
			<td>
		
			<ul>
			<li>
			<a href="#" title="Enrollar" onclick="new Effect.Fade(\'inicio\'),new Effect.Fade(\'img_inicio\')">
				<img style="display:none" id="img_inicio" src="../imgs/menos.png"/>
			</a>
			<a href="#" onclick="new Effect.Appear(\'inicio\'),new Effect.Appear(\'img_inicio\')"><img src="../theme/images/btninicio.png" style="border: 0px none;"></a>
			</li>
			<ul style="display:none" id="inicio">
				<li><a href="../mod_inicio/index.php"><img src="../theme/images/inicio.ico" style="border: 0px none;">Inicio</a></li>
				<li><a href="../mod_configuracion/salir.php"><img src="../theme/images/salir.ico" style="border: 0px none;">Salir</a></li>
			</ul>	
		
		</td>	
			<td>
				<a href="#" title="Enrollar" onclick="new Effect.Fade(\'monitoreo\'),new Effect.Fade(\'img_monitoreo\')">
				<img style="display:none" id="img_monitoreo" src="../imgs/menos.png"/>
				</a>
				<a href="#" onclick="new Effect.Appear(\'monitoreo\'),new Effect.Appear(\'img_monitoreo\')"><img src="../theme/images/monitoreo.png" style="border: 0px none;"></a>
				</li>
				<ul style="display:none" id="monitoreo">
					<li><a href="../mod_monitoreo/bus_monitoreon.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">NIÑOS Y ADOLESCENTES</a></li>
					<li><a href="../mod_monitoreo/bus_monitoreop.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">PERSONA CON DISCAPACIDAD</a></li>
					<li><a href="../mod_monitoreo/bus_monitoreos.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">SUSTITUTOS</a></li>
					<li><a href="../mod_monitoreo/bus_empresa.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Empresas visitadas</a></li>
					<li><a href="../mod_monitoreo/bus_empresasucursal.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Empresas sucursal</a></li>
					<li><a href="../mod_monitoreo/bus_personasi.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Personas Insertadas</a></li>
					<li><a href="../mod_monitoreo/bus_tcapacitacion.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Tipo Capacitación</a></li>
					<li><a href="../mod_monitoreo/bus_consolidado.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Consolidado</a></li>
					<li><a target="_blank" href="../mod_monitoreo/grafico_sucursal.php"><img src="../theme/images/insert-chart-pie.png" style="border: 0px none;">Gráfico Sucursal</a></li>
					<li><a target="_blank" href="../mod_monitoreo/grafico_usuarios.php"><img src="../theme/images/insert-chart-pie.png" style="border: 0px none;">Gráfico Género</a></li>
					<li><a target="_blank" href="../mod_monitoreo/grafico_usuariosd.php"><img src="../theme/images/insert-chart-pie.png" style="border: 0px none;">Tipos Discapacidad</a></li>
					<li><a target="_blank" href="../mod_monitoreo/grafico_fconocer.php"><img src="../theme/images/insert-chart-pie.png" style="border: 0px none;">Forma Conocer</a></li>
					<li><a target="_blank" href="../mod_monitoreo/grafico_tempresa.php"><img src="../theme/images/insert-chart-pie.png" style="border: 0px none;">Tipo Empresa</a></li>
					<li><a target="_blank" href="../mod_monitoreo/grafico_empresa.php"><img src="../theme/images/insert-chart-pie.png" style="border: 0px none;">Empresa por Sucursal</a></li>
					<li><a target="_blank" href="../mod_monitoreo/grafico_consolidado.php"><img src="../theme/images/insert-chart-pie.png" style="border: 0px none;">Estadístico Consolidado</a></li>
					
				</ul>
			</td>
	</tr>																								
</table>	
	</div>';
	
	}
else
{
	echo '<div id="menu">
	<table width="650" align="center" class="tabla">
		<tr>
			<td>
		
			<ul>
			<li>
			<a href="#" title="Enrollar" onclick="new Effect.Fade(\'inicio\'),new Effect.Fade(\'img_inicio\')">
				<img style="display:none" id="img_inicio" src="../imgs/menos.png"/>
			</a>
			<a href="#" onclick="new Effect.Appear(\'inicio\'),new Effect.Appear(\'img_inicio\')"><img src="../theme/images/btninicio.png" style="border: 0px none;"></a>
			</li>
			<ul style="display:none" id="inicio">
				<li><a href="../mod_inicio/index.php"><img src="../theme/images/inicio.ico" style="border: 0px none;">Inicio</a></li>
				<li><a href="../mod_configuracion/salir.php"><img src="../theme/images/salir.ico" style="border: 0px none;">Salir</a></li>
			</ul>	
		
		</td>	
			<td>
				<a href="#" title="Enrollar" onclick="new Effect.Fade(\'monitoreo\'),new Effect.Fade(\'img_monitoreo\')">
				<img style="display:none" id="img_monitoreo" src="../imgs/menos.png"/>
				</a>
				<a href="#" onclick="new Effect.Appear(\'monitoreo\'),new Effect.Appear(\'img_monitoreo\')"><img src="../theme/images/monitoreo.png" style="border: 0px none;"></a>
				</li>
				<ul style="display:none" id="monitoreo">
					<li><a href="../mod_monitoreo/bus_monitoreon.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">NIÑOS Y ADOLESCENTES</a></li>
					<li><a href="../mod_monitoreo/bus_monitoreop.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">PERSONA CON DISCAPACIDAD</a></li>
					<li><a href="../mod_monitoreo/bus_monitoreos.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">SUSTITUTOS</a></li>
					<li><a href="../mod_monitoreo/bus_empresa.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Empresas visitadas</a></li>
					<li><a href="../mod_monitoreo/bus_empresasucursal.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Empresas sucursal</a></li>
					<li><a href="../mod_monitoreo/bus_personasi.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Personas Insertadas</a></li>
					<li><a href="../mod_monitoreo/bus_tcapacitacion.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Tipo Capacitación</a></li>
					<li><a href="../mod_monitoreo/bus_consolidado.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Consolidado</a></li>
					<li><a target="_blank" href="../mod_monitoreo/grafico_sucursal.php"><img src="../theme/images/insert-chart-pie.png" style="border: 0px none;">Gráfico Sucursal</a></li>
					<li><a target="_blank" href="../mod_monitoreo/grafico_usuarios.php"><img src="../theme/images/insert-chart-pie.png" style="border: 0px none;">Gráfico Género</a></li>
					<li><a target="_blank" href="../mod_monitoreo/grafico_usuariosd.php"><img src="../theme/images/insert-chart-pie.png" style="border: 0px none;">Tipos Discapacidad</a></li>
					<li><a target="_blank" href="../mod_monitoreo/grafico_fconocer.php"><img src="../theme/images/insert-chart-pie.png" style="border: 0px none;">Forma Conocer</a></li>
					<li><a target="_blank" href="../mod_monitoreo/grafico_tempresa.php"><img src="../theme/images/insert-chart-pie.png" style="border: 0px none;">Tipo Empresa</a></li>
					<li><a target="_blank" href="../mod_monitoreo/grafico_empresa.php"><img src="../theme/images/insert-chart-pie.png" style="border: 0px none;">Empresa por Sucursal</a></li>
					<li><a target="_blank" href="../mod_monitoreo/grafico_consolidado.php"><img src="../theme/images/insert-chart-pie.png" style="border: 0px none;">Estadístico Consolidado</a></li>
					
				</ul>
			</td>
	</tr>																								
</table>	
	</div>';
	
}		

