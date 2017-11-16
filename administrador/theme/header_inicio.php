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
	<?php if($_SESSION["tipousuario"]=="1")	{$tipo = "SUPERADMINISTRADOR";}else if($_SESSION["tipo"]=="2") { $tipo="Funcionario";}

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
				<a href="#" title="Enrollar" onclick="new Effect.Fade(\'perfil\'),new Effect.Fade(\'img_perfil\')">
				<img style="display:none" id="img_perfil" src="../imgs/menos.png"/>
				</a>
				<a href="#" onclick="new Effect.Appear(\'perfil\'),new Effect.Appear(\'img_perfil\')"><img src="../theme/images/btnperfil.png" style="border: 0px none;"></a>
				</li>
				<ul style="display:none" id="perfil">
				<li><a href="../mod_perfil/reg_perfil.php"><img src="../theme/images/nuevo.png" style="border: 0px none;">Agregar</a></li>
				<li><a href="../mod_perfil/act_perfil.php"><img src="../theme/images/edit.png" style="border: 0px none;">Editar</a></li>
				<li><a href="../mod_perfil/bus_perfil.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Buscar</a></li>
				</ul>
			</td>
			<td>
				<a href="#" title="Enrollar" onclick="new Effect.Fade(\'genero\'),new Effect.Fade(\'img_genero\')">
				<img style="display:none" id="img_genero" src="../imgs/menos.png"/>
				</a>
				<a href="#" onclick="new Effect.Appear(\'genero\'),new Effect.Appear(\'img_genero\')"><img src="../theme/images/genero.png" style="border: 0px none;"></a>
				</li>
				<ul style="display:none" id="genero">
				<li><a href="../mod_genero/reg_genero.php"><img src="../theme/images/nuevo.png" style="border: 0px none;">Agregar</a></li>
				<li><a href="../mod_genero/act_genero.php"><img src="../theme/images/edit.png" style="border: 0px none;">Editar</a></li>
				<li><a href="../mod_genero/bus_genero.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Buscar</a></li>
				</ul>
			</td>
			<td>
				<a href="#" title="Enrollar" onclick="new Effect.Fade(\'lproyecto\'),new Effect.Fade(\'img_lproyecto\')">
				<img style="display:none" id="img_lproyecto" src="../imgs/menos.png"/>
				</a>
				<a href="#" onclick="new Effect.Appear(\'lproyecto\'),new Effect.Appear(\'img_lproyecto\')"><img src="../theme/images/etnica.png" style="border: 0px none;"></a>
				</li>
				<ul style="display:none" id="lproyecto">
					<li><a href="../mod_etnica/reg_etnica.php"><img src="../theme/images/nuevo.png" style="border: 0px none;">Agregar</a></li>
					<li><a href="../mod_etnica/act_etnica.php"><img src="../theme/images/edit.png" style="border: 0px none;">Editar</a></li>
					<li><a href="../mod_etnica/bus_etnica.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Buscar</a></li>
				</ul>	
			</td>
			<td>
				<a href="#" title="Enrollar" onclick="new Effect.Fade(\'temperatura\'),new Effect.Fade(\'img_temperatura\')">
				<img style="display:none" id="img_temperatura" src="../imgs/menos.png"/>
				</a>
				<a href="#" onclick="new Effect.Appear(\'temperatura\'),new Effect.Appear(\'img_temperatura\')"><img src="../theme/images/temperatura.png" style="border: 0px none;"></a>
				</li>
				<ul style="display:none" id="temperatura">
					<li><a href="../mod_temperatura/reg_temperatura.php"><img src="../theme/images/nuevo.png" style="border: 0px none;">Agregar</a></li>
					<li><a href="../mod_temperatura/act_temperatura.php"><img src="../theme/images/edit.png" style="border: 0px none;">Editar</a></li>
					<li><a href="../mod_temperatura/bus_temperatura.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Buscar</a></li>
				</ul>	
			</td>
			<td>
				<a href="#" title="Enrollar" onclick="new Effect.Fade(\'toxicos\'),new Effect.Fade(\'img_toxicos\')">
				<img style="display:none" id="img_toxicos" src="../imgs/menos.png"/>
				</a>
				<a href="#" onclick="new Effect.Appear(\'toxicos\'),new Effect.Appear(\'img_toxicos\')"><img src="../theme/images/toxicos.png" style="border: 0px none;"></a>
				</li>
				<ul style="display:none" id="toxicos">
					<li><a href="../mod_toxicos/reg_toxicos.php"><img src="../theme/images/nuevo.png" style="border: 0px none;">Agregar</a></li>
					<li><a href="../mod_toxicos/act_toxicos.php"><img src="../theme/images/edit.png" style="border: 0px none;">Editar</a></li>
					<li><a href="../mod_toxicos/bus_toxicos.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Buscar</a></li>
				</ul>	
			</td>
		</tr>
		<tr>	
			<td>
				<a href="#" title="Enrollar" onclick="new Effect.Fade(\'tptoyecto\'),new Effect.Fade(\'img_tptoyecto\')">
				<img style="display:none" id="img_tptoyecto" src="../imgs/menos.png"/>
				</a>
				<a href="#" onclick="new Effect.Appear(\'tptoyecto\'),new Effect.Appear(\'img_tptoyecto\')"><img src="../theme/images/seguro.png" style="border: 0px none;"></a>
				</li>
				<ul style="display:none" id="tptoyecto">
					<li><a href="../mod_seguro/reg_seguro.php"><img src="../theme/images/nuevo.png" style="border: 0px none;">Agregar</a></li>
					<li><a href="../mod_seguro/act_seguro.php"><img src="../theme/images/edit.png" style="border: 0px none;">Editar</a></li>
					<li><a href="../mod_seguro/bus_seguro.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Buscar</a></li>
				</ul>	
			</td>
			<td>
				<a href="#" title="Enrollar" onclick="new Effect.Fade(\'financiamiento\'),new Effect.Fade(\'img_financiamiento\')">
				<img style="display:none" id="img_financiamiento" src="../imgs/menos.png"/>
				</a>
				<a href="#" onclick="new Effect.Appear(\'financiamiento\'),new Effect.Appear(\'img_financiamiento\')"><img src="../theme/images/financiamiento.png" style="border: 0px none;"></a>
				</li>
				<ul style="display:none" id="financiamiento">
				<li><a href="../mod_financiamiento/reg_financiamiento.php"><img src="../theme/images/nuevo.png" style="border: 0px none;">Agregar</a></li>
				<li><a href="../mod_financiamiento/act_financiamiento.php"><img src="../theme/images/edit.png" style="border: 0px none;">Editar</a></li>
				<li><a href="../mod_financiamiento/bus_financiamiento.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Buscar</a></li>
				</ul>
			</td>
			<td>
				<a href="#" title="Enrollar" onclick="new Effect.Fade(\'usuario\'),new Effect.Fade(\'img_usuario\')">
				<img style="display:none" id="img_usuario" src="../imgs/menos.png"/>
				</a>
				<a href="#" onclick="new Effect.Appear(\'usuario\'),new Effect.Appear(\'img_usuario\')"><img src="../theme/images/usuarios.png" style="border: 0px none;"></a>
				</li>
				<ul style="display:none" id="usuario">
					<li><a href="../mod_usuario/reg_usuario.php"><img src="../theme/images/nuevo.png" style="border: 0px none;">Agregar</a></li>
					<li><a href="../mod_usuario/act_usuario.php"><img src="../theme/images/edit.png" style="border: 0px none;">Editar</a></li>
					<li><a href="../mod_usuario/bus_usuario.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Buscar</a></li>
				</ul>
			</td>
			<td>
				<a href="#" title="Enrollar" onclick="new Effect.Fade(\'pesos\'),new Effect.Fade(\'img_pesos\')">
				<img style="display:none" id="img_pesos" src="../imgs/menos.png"/>
				</a>
				<a href="#" onclick="new Effect.Appear(\'pesos\'),new Effect.Appear(\'img_pesos\')"><img src="../theme/images/pesos.png" style="border: 0px none;"></a>
				</li>
				<ul style="display:none" id="pesos">
					<li><a href="../mod_pesos/reg_pesos.php"><img src="../theme/images/nuevo.png" style="border: 0px none;">Agregar</a></li>
					<li><a href="../mod_pesos/act_pesos.php"><img src="../theme/images/edit.png" style="border: 0px none;">Editar</a></li>
					<li><a href="../mod_pesos/bus_pesos.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Buscar</a></li>
				</ul>
			</td>	
			<td>
				<a href="#" title="Enrollar" onclick="new Effect.Fade(\'tcargo\'),new Effect.Fade(\'img_tcargo\')">
				<img style="display:none" id="img_tcargo" src="../imgs/menos.png"/>
				</a>
				<a href="#" onclick="new Effect.Appear(\'tcargo\'),new Effect.Appear(\'img_tcargo\')"><img src="../theme/images/tcargo.png" style="border: 0px none;"></a>
				</li>
				<ul style="display:none" id="tcargo">
					<li><a href="../mod_tcargo/reg_tcargo.php"><img src="../theme/images/nuevo.png" style="border: 0px none;">Agregar</a></li>
					<li><a href="../mod_tcargo/act_tcargo.php"><img src="../theme/images/edit.png" style="border: 0px none;">Editar</a></li>
					<li><a href="../mod_tcargo/bus_tcargo.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Buscar</a></li>
				</ul>
			</td>
			<td>
				<a href="#" title="Enrollar" onclick="new Effect.Fade(\'ccargo\'),new Effect.Fade(\'img_ccargo\')">
				<img style="display:none" id="img_ccargo" src="../imgs/menos.png"/>
				</a>
				<a href="#" onclick="new Effect.Appear(\'ccargo\'),new Effect.Appear(\'img_ccargo\')"><img src="../theme/images/ccargo.png" style="border: 0px none;"></a>
				</li>
				<ul style="display:none" id="ccargo">
					<li><a href="../mod_ccargo/reg_ccargo.php"><img src="../theme/images/nuevo.png" style="border: 0px none;">Agregar</a></li>
					<li><a href="../mod_ccargo/act_ccargo.php"><img src="../theme/images/edit.png" style="border: 0px none;">Editar</a></li>
					<li><a href="../mod_ccargo/bus_ccargo.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Buscar</a></li>
				</ul>
			</td>
	</tr>
	<tr>
			<td>
				<a href="#" title="Enrollar" onclick="new Effect.Fade(\'tpuesto\'),new Effect.Fade(\'img_tpuesto\')">
				<img style="display:none" id="img_tpuesto" src="../imgs/menos.png"/>
				</a>
				<a href="#" onclick="new Effect.Appear(\'tpuesto\'),new Effect.Appear(\'img_tpuesto\')"><img src="../theme/images/tpuesto.png" style="border: 0px none;"></a>
				</li>
				<ul style="display:none" id="tpuesto">
					<li><a href="../mod_tpuesto/reg_tpuesto.php"><img src="../theme/images/nuevo.png" style="border: 0px none;">Agregar</a></li>
					<li><a href="../mod_tpuesto/act_tpuesto.php"><img src="../theme/images/edit.png" style="border: 0px none;">Editar</a></li>
					<li><a href="../mod_tpuesto/bus_tpuesto.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Buscar</a></li>
				</ul>
						
			</td>
			<td>
				<a href="#" title="Enrollar" onclick="new Effect.Fade(\'tempresa\'),new Effect.Fade(\'img_tempresa\')">
				<img style="display:none" id="img_tempresa" src="../imgs/menos.png"/>
				</a>
				<a href="#" onclick="new Effect.Appear(\'tempresa\'),new Effect.Appear(\'img_tempresa\')"><img src="../theme/images/tempresa.png" style="border: 0px none;"></a>
				</li>
				<ul style="display:none" id="tempresa">
					<li><a href="../mod_tempresa/reg_tempresa.php"><img src="../theme/images/nuevo.png" style="border: 0px none;">Agregar</a></li>
					<li><a href="../mod_tempresa/act_tempresa.php"><img src="../theme/images/edit.png" style="border: 0px none;">Editar</a></li>
					<li><a href="../mod_tempresa/bus_tempresa.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Buscar</a></li>
				</ul>
			</td>
			<td>
				<a href="#" title="Enrollar" onclick="new Effect.Fade(\'tactividad\'),new Effect.Fade(\'img_tactividad\')">
				<img style="display:none" id="img_tactividad" src="../imgs/menos.png"/>
				</a>
				<a href="#" onclick="new Effect.Appear(\'tactividad\'),new Effect.Appear(\'img_tactividad\')"><img src="../theme/images/tactividad.png" style="border: 0px none;"></a>
				</li>
				<ul style="display:none" id="tactividad">
					<li><a href="../mod_tactividad/reg_tactividad.php"><img src="../theme/images/nuevo.png" style="border: 0px none;">Agregar</a></li>
					<li><a href="../mod_tactividad/act_tactividad.php"><img src="../theme/images/edit.png" style="border: 0px none;">Editar</a></li>
					<li><a href="../mod_tactividad/bus_tactividad.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Buscar</a></li>
				</ul>
			</td>
			<td>
					<a href="#" title="Enrollar" onclick="new Effect.Fade(\'tjornada\'),new Effect.Fade(\'img_tjornada\')">
				<img style="display:none" id="img_tjornada" src="../imgs/menos.png"/>
				</a>
				<a href="#" onclick="new Effect.Appear(\'tjornada\'),new Effect.Appear(\'img_civil\')"><img src="../theme/images/tjornada.png" style="border: 0px none;"></a>
				</li>
				<ul style="display:none" id="tjornada">
					<li><a href="../mod_tjornada/reg_tjornada.php"><img src="../theme/images/nuevo.png" style="border: 0px none;">Agregar</a></li>
					<li><a href="../mod_tjornada/act_tjornada.php"><img src="../theme/images/edit.png" style="border: 0px none;">Editar</a></li>
					<li><a href="../mod_tjornada/bus_tjornada.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Buscar</a></li>
				</ul>
			</td>
			<td>
				<a href="#" title="Enrollar" onclick="new Effect.Fade(\'nivel\'),new Effect.Fade(\'img_nivel\')">
				<img style="display:none" id="img_nivel" src="../imgs/menos.png"/>
				</a>
				<a href="#" onclick="new Effect.Appear(\'nivel\'),new Effect.Appear(\'img_nivel\')"><img src="../theme/images/nivel.png" style="border: 0px none;"></a>
				</li>
				<ul style="display:none" id="nivel">
					<li><a href="../mod_nivel/reg_nivel.php"><img src="../theme/images/nuevo.png" style="border: 0px none;">Agregar</a></li>
					<li><a href="../mod_nivel/act_nivel.php"><img src="../theme/images/edit.png" style="border: 0px none;">Editar</a></li>
					<li><a href="../mod_nivel/bus_nivel.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Buscar</a></li>
				</ul>
			</td>
			<td>
				<a href="#" title="Enrollar" onclick="new Effect.Fade(\'ilaboral\'),new Effect.Fade(\'img_ilaboral\')">
				<img style="display:none" id="img_ilaboral" src="../imgs/menos.png"/>
				</a>
				<a href="#" onclick="new Effect.Appear(\'ilaboral\'),new Effect.Appear(\'img_ilaboral\')"><img src="../theme/images/ilaboral.png" style="border: 0px none;"></a>
				</li>
				<ul style="display:none" id="ilaboral">
					<li><a href="../mod_ilaboral/reg_ilaboral.php"><img src="../theme/images/nuevo.png" style="border: 0px none;">Agregar</a></li>
					<li><a href="../mod_ilaboral/act_ilaboral.php"><img src="../theme/images/edit.png" style="border: 0px none;">Editar</a></li>
					<li><a href="../mod_ilaboral/bus_ilaboral.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Buscar</a></li>
				</ul>
			</td>
	</tr>
	<tr>
			<td>
				<a href="#" title="Enrollar" onclick="new Effect.Fade(\'tingreso\'),new Effect.Fade(\'img_tingreso\')">
				<img style="display:none" id="img_tingreso" src="../imgs/menos.png"/>
				</a>
				<a href="#" onclick="new Effect.Appear(\'tingreso\'),new Effect.Appear(\'img_tingreso\')"><img src="../theme/images/tingreso.png" style="border: 0px none;"></a>
				</li>
				<ul style="display:none" id="tingreso">
					<li><a href="../mod_tingreso/reg_tingreso.php"><img src="../theme/images/nuevo.png" style="border: 0px none;">Agregar</a></li>
					<li><a href="../mod_tingreso/act_tingreso.php"><img src="../theme/images/edit.png" style="border: 0px none;">Editar</a></li>
					<li><a href="../mod_tingreso/bus_tingreso.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Buscar</a></li>
				</ul>
						
			</td>
			<td>
				<a href="#" title="Enrollar" onclick="new Effect.Fade(\'asalarial\'),new Effect.Fade(\'img_asalarial\')">
				<img style="display:none" id="img_civil" src="../imgs/menos.png"/>
				</a>
				<a href="#" onclick="new Effect.Appear(\'asalarial\'),new Effect.Appear(\'img_asalarial\')"><img src="../theme/images/asalarial.png" style="border: 0px none;"></a>
				</li>
				<ul style="display:none" id="asalarial">
					<li><a href="../mod_asalarial/reg_asalarial.php"><img src="../theme/images/nuevo.png" style="border: 0px none;">Agregar</a></li>
					<li><a href="../mod_asalarial/act_asalarial.php"><img src="../theme/images/edit.png" style="border: 0px none;">Editar</a></li>
					<li><a href="../mod_asalarial/bus_asalarial.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Buscar</a></li>
				</ul>
			</td>
			<td>
				<a href="#" title="Enrollar" onclick="new Effect.Fade(\'tseguimiento\'),new Effect.Fade(\'img_tseguimiento\')">
				<img style="display:none" id="img_tseguimiento" src="../imgs/menos.png"/>
				</a>
				<a href="#" onclick="new Effect.Appear(\'tseguimiento\'),new Effect.Appear(\'img_tseguimiento\')"><img src="../theme/images/tseguimiento.png" style="border: 0px none;"></a>
				</li>
				<ul style="display:none" id="tseguimiento">
					<li><a href="../mod_tseguimiento/reg_tseguimiento.php"><img src="../theme/images/nuevo.png" style="border: 0px none;">Agregar</a></li>
					<li><a href="../mod_tseguimiento/act_tseguimiento.php"><img src="../theme/images/edit.png" style="border: 0px none;">Editar</a></li>
					<li><a href="../mod_tseguimiento/bus_tseguimiento.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Buscar</a></li>
				</ul>
			</td>
			<td>
					<a href="#" title="Enrollar" onclick="new Effect.Fade(\'hcomunicativas\'),new Effect.Fade(\'img_hcomunicativas\')">
				<img style="display:none" id="img_hcomunicativas" src="../imgs/menos.png"/>
				</a>
				<a href="#" onclick="new Effect.Appear(\'hcomunicativas\'),new Effect.Appear(\'img_hcomunicativas\')"><img src="../theme/images/hcomunicativas.png" style="border: 0px none;"></a>
				</li>
				<ul style="display:none" id="hcomunicativas">
					<li><a href="../mod_hcomunicativas/reg_hcomunicativas.php"><img src="../theme/images/nuevo.png" style="border: 0px none;">Agregar</a></li>
					<li><a href="../mod_hcomunicativas/act_hcomunicativas.php"><img src="../theme/images/edit.png" style="border: 0px none;">Editar</a></li>
					<li><a href="../mod_hcomunicativas/bus_hcomunicativas.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Buscar</a></li>
				</ul>
			</td>
			<td>
				<a href="#" title="Enrollar" onclick="new Effect.Fade(\'tdigitacion\'),new Effect.Fade(\'img_tdigitacion\')">
				<img style="display:none" id="img_tdigitacion" src="../imgs/menos.png"/>
				</a>
				<a href="#" onclick="new Effect.Appear(\'tdigitacion\'),new Effect.Appear(\'img_tdigitacion\')"><img src="../theme/images/tdigitacion.png" style="border: 0px none;"></a>
				</li>
				<ul style="display:none" id="tdigitacion">
					<li><a href="../mod_tdigitacion/reg_tdigitacion.php"><img src="../theme/images/nuevo.png" style="border: 0px none;">Agregar</a></li>
					<li><a href="../mod_tdigitacion/act_tdigitacion.php"><img src="../theme/images/edit.png" style="border: 0px none;">Editar</a></li>
					<li><a href="../mod_tdigitacion/bus_tdigitacion.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Buscar</a></li>
				</ul>
			</td>
			<td>
				<a href="#" title="Enrollar" onclick="new Effect.Fade(\'tparentesco\'),new Effect.Fade(\'img_tparentesco\')">
				<img style="display:none" id="img_tparentesco" src="../imgs/menos.png"/>
				</a>
				<a href="#" onclick="new Effect.Appear(\'tparentesco\'),new Effect.Appear(\'img_tparentesco\')"><img src="../theme/images/tparentesco.png" style="border: 0px none;"></a>
				</li>
				<ul style="display:none" id="tparentesco">
					<li><a href="../mod_tparentesco/reg_tparentesco.php"><img src="../theme/images/nuevo.png" style="border: 0px none;">Agregar</a></li>
					<li><a href="../mod_tparentesco/act_tparentesco.php"><img src="../theme/images/edit.png" style="border: 0px none;">Editar</a></li>
					<li><a href="../mod_tparentesco/bus_tparentesco.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Buscar</a></li>
				</ul>
			</td>
	</tr>	
 	<tr>
			<td>
				<a href="#" title="Enrollar" onclick="new Effect.Fade(\'tdiscapacidad\'),new Effect.Fade(\'img_tdiscapacidad\')">
				<img style="display:none" id="img_tdiscapacidad" src="../imgs/menos.png"/>
				</a>
				<a href="#" onclick="new Effect.Appear(\'tdiscapacidad\'),new Effect.Appear(\'img_tdiscapacidad\')"><img src="../theme/images/tdiscapacidad.png" style="border: 0px none;"></a>
				</li>
				<ul style="display:none" id="tdiscapacidad">
					<li><a href="../mod_tdiscapacidad/reg_tdiscapacidad.php"><img src="../theme/images/nuevo.png" style="border: 0px none;">Agregar</a></li>
					<li><a href="../mod_tdiscapacidad/act_tdiscapacidad.php"><img src="../theme/images/edit.png" style="border: 0px none;">Editar</a></li>
					<li><a href="../mod_tdiscapacidad/bus_tdiscapacidad.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Buscar</a></li>
				</ul>
						
			</td>
			<td>
				<a href="#" title="Enrollar" onclick="new Effect.Fade(\'horario\'),new Effect.Fade(\'img_horario\')">
				<img style="display:none" id="img_horario" src="../imgs/menos.png"/>
				</a>
				<a href="#" onclick="new Effect.Appear(\'horario\'),new Effect.Appear(\'img_horario\')"><img src="../theme/images/horario.png" style="border: 0px none;"></a>
				</li>
				<ul style="display:none" id="horario">
					<li><a href="../mod_horario/reg_horario.php"><img src="../theme/images/nuevo.png" style="border: 0px none;">Agregar</a></li>
					<li><a href="../mod_horario/act_horario.php"><img src="../theme/images/edit.png" style="border: 0px none;">Editar</a></li>
					<li><a href="../mod_horario/bus_horario.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Buscar</a></li>
				</ul>
			</td>
			<td>
				<a href="#" title="Enrollar" onclick="new Effect.Fade(\'tlicencia\'),new Effect.Fade(\'img_tlicencia\')">
				<img style="display:none" id="img_tlicencia" src="../imgs/menos.png"/>
				</a>
				<a href="#" onclick="new Effect.Appear(\'tlicencia\'),new Effect.Appear(\'img_tlicencia\')"><img src="../theme/images/tlicencia.png" style="border: 0px none;"></a>
				</li>
				<ul style="display:none" id="tlicencia">
					<li><a href="../mod_tlicencia/reg_tlicencia.php"><img src="../theme/images/nuevo.png" style="border: 0px none;">Agregar</a></li>
					<li><a href="../mod_tlicencia/act_tlicencia.php"><img src="../theme/images/edit.png" style="border: 0px none;">Editar</a></li>
					<li><a href="../mod_tlicencia/bus_tlicencia.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Buscar</a></li>
				</ul>
			</td>
			<td>
					<a href="#" title="Enrollar" onclick="new Effect.Fade(\'tsector\'),new Effect.Fade(\'img_tsector\')">
				<img style="display:none" id="img_tsector" src="../imgs/menos.png"/>
				</a>
				<a href="#" onclick="new Effect.Appear(\'tsector\'),new Effect.Appear(\'img_tsector\')"><img src="../theme/images/tsector.png" style="border: 0px none;"></a>
				</li>
				<ul style="display:none" id="tsector">
					<li><a href="../mod_tsector/reg_tsector.php"><img src="../theme/images/nuevo.png" style="border: 0px none;">Agregar</a></li>
					<li><a href="../mod_tsector/act_tsector.php"><img src="../theme/images/edit.png" style="border: 0px none;">Editar</a></li>
					<li><a href="../mod_tsector/bus_tsector.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Buscar</a></li>
				</ul>
			</td>
			<td>
				<a href="#" title="Enrollar" onclick="new Effect.Fade(\'fconocer\'),new Effect.Fade(\'img_fconocer\')">
				<img style="display:none" id="img_fconocer" src="../imgs/menos.png"/>
				</a>
				<a href="#" onclick="new Effect.Appear(\'fconocer\'),new Effect.Appear(\'img_fconocer\')"><img src="../theme/images/fconocer.png" style="border: 0px none;"></a>
				</li>
				<ul style="display:none" id="fconocer">
					<li><a href="../mod_fconocer/reg_fconocer.php"><img src="../theme/images/nuevo.png" style="border: 0px none;">Agregar</a></li>
					<li><a href="../mod_fconocer/act_fconocer.php"><img src="../theme/images/edit.png" style="border: 0px none;">Editar</a></li>
					<li><a href="../mod_fconocer/bus_fconocer.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Buscar</a></li>
				</ul>
			</td>
			<td>
				<a href="#" title="Enrollar" onclick="new Effect.Fade(\'ecivil\'),new Effect.Fade(\'img_ecivil\')">
				<img style="display:none" id="img_ecivil" src="../imgs/menos.png"/>
				</a>
				<a href="#" onclick="new Effect.Appear(\'ecivil\'),new Effect.Appear(\'img_ecivil\')"><img src="../theme/images/ecivil.png" style="border: 0px none;"></a>
				</li>
				<ul style="display:none" id="ecivil">
					<li><a href="../mod_ecivil/reg_ecivil.php"><img src="../theme/images/nuevo.png" style="border: 0px none;">Agregar</a></li>
					<li><a href="../mod_ecivil/act_ecivil.php"><img src="../theme/images/edit.png" style="border: 0px none;">Editar</a></li>
					<li><a href="../mod_ecivil/bus_ecivil.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Buscar</a></li>
				</ul>
			</td>
	</tr>	
	<tr>
			<td>
				<a href="#" title="Enrollar" onclick="new Effect.Fade(\'tidentificacion\'),new Effect.Fade(\'img_tidentificacion\')">
				<img style="display:none" id="img_tidentificacion" src="../imgs/menos.png"/>
				</a>
				<a href="#" onclick="new Effect.Appear(\'tidentificacion\'),new Effect.Appear(\'img_tidentificacion\')"><img src="../theme/images/tidentificacion.png" style="border: 0px none;"></a>
				</li>
				<ul style="display:none" id="tidentificacion">
					<li><a href="../mod_tidentificacion/reg_tidentificacion.php"><img src="../theme/images/nuevo.png" style="border: 0px none;">Agregar</a></li>
					<li><a href="../mod_tidentificacion/act_tidentificacion.php"><img src="../theme/images/edit.png" style="border: 0px none;">Editar</a></li>
					<li><a href="../mod_tidentificacion/bus_tidentificacion.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Buscar</a></li>
				</ul>
						
			</td>
			<td>
				<a href="#" title="Enrollar" onclick="new Effect.Fade(\'aformativa\'),new Effect.Fade(\'img_aformativa\')">
				<img style="display:none" id="img_aformativa" src="../imgs/menos.png"/>
				</a>
				<a href="#" onclick="new Effect.Appear(\'aformativa\'),new Effect.Appear(\'img_aformativa\')"><img src="../theme/images/aformativa.png" style="border: 0px none;"></a>
				</li>
				<ul style="display:none" id="aformativa">
					<li><a href="../mod_aformativa/reg_aformativa.php"><img src="../theme/images/nuevo.png" style="border: 0px none;">Agregar</a></li>
					<li><a href="../mod_aformativa/act_aformativa.php"><img src="../theme/images/edit.png" style="border: 0px none;">Editar</a></li>
					<li><a href="../mod_aformativa/bus_aformativa.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Buscar</a></li>
				</ul>
			</td>
			<td>
					<a href="#" title="Enrollar" onclick="new Effect.Fade(\'cformativo\'),new Effect.Fade(\'img_cformativo\')">
				<img style="display:none" id="img_cformativo" src="../imgs/menos.png"/>
				</a>
				<a href="#" onclick="new Effect.Appear(\'cformativo\'),new Effect.Appear(\'img_cformativo\')"><img src="../theme/images/cformativo.png" style="border: 0px none;"></a>
				</li>
				<ul style="display:none" id="cformativo">
					<li><a href="../mod_cformativo/reg_cformativo.php"><img src="../theme/images/nuevo.png" style="border: 0px none;">Agregar</a></li>
					<li><a href="../mod_cformativo/act_cformativo.php"><img src="../theme/images/edit.png" style="border: 0px none;">Editar</a></li>
					<li><a href="../mod_cformativo/bus_cformativo.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Buscar</a></li>
				</ul>
			</td>
			<td>
				<a href="#" title="Enrollar" onclick="new Effect.Fade(\'cobertura\'),new Effect.Fade(\'img_cobertura\')">
				<img style="display:none" id="img_cobertura" src="../imgs/menos.png"/>
				</a>
				<a href="#" onclick="new Effect.Appear(\'cobertura\'),new Effect.Appear(\'img_cobertura\')"><img src="../theme/images/cobertura.png" style="border: 0px none;"></a>
				</li>
				<ul style="display:none" id="cobertura">
					<li><a href="../mod_cobertura/reg_cobertura.php"><img src="../theme/images/nuevo.png" style="border: 0px none;">Agregar</a></li>
					<li><a href="../mod_cobertura/act_cobertura.php"><img src="../theme/images/edit.png" style="border: 0px none;">Editar</a></li>
					<li><a href="../mod_cobertura/bus_cobertura.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Buscar</a></li>
				</ul>
			</td>
			<td>
				<a href="#" title="Enrollar" onclick="new Effect.Fade(\'facceso\'),new Effect.Fade(\'img_facceso\')">
				<img style="display:none" id="img_facceso" src="../imgs/menos.png"/>
				</a>
				<a href="#" onclick="new Effect.Appear(\'facceso\'),new Effect.Appear(\'img_facceso\')"><img src="../theme/images/facceso.png" style="border: 0px none;"></a>
				</li>
				<ul style="display:none" id="facceso">
					<li><a href="../mod_facceso/reg_facceso.php"><img src="../theme/images/nuevo.png" style="border: 0px none;">Agregar</a></li>
					<li><a href="../mod_facceso/act_facceso.php"><img src="../theme/images/edit.png" style="border: 0px none;">Editar</a></li>
					<li><a href="../mod_facceso/bus_facceso.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Buscar</a></li>
				</ul>
			</td>
	</tr>
	<tr>
			<td>
				<a href="#" title="Enrollar" onclick="new Effect.Fade(\'estadodiscapacidad\'),new Effect.Fade(\'img_estadodiscapacidad\')">
				<img style="display:none" id="img_estadodiscapacidad" src="../imgs/menos.png"/>
				</a>
				<a href="#" onclick="new Effect.Appear(\'estadodiscapacidad\'),new Effect.Appear(\'img_estadodiscapacidad\')"><img src="../theme/images/estadodiscapacidad.png" style="border: 0px none;"></a>
				</li>
				<ul style="display:none" id="estadodiscapacidad">
					<li><a href="../mod_estadodiscapacidad/reg_estadodiscapacidad.php"><img src="../theme/images/nuevo.png" style="border: 0px none;">Agregar</a></li>
					<li><a href="../mod_estadodiscapacidad/act_estadodiscapacidad.php"><img src="../theme/images/edit.png" style="border: 0px none;">Editar</a></li>
					<li><a href="../mod_estadodiscapacidad/bus_estadodiscapacidad.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Buscar</a></li>
				</ul>
						
			</td>
			<td>
				<a href="#" title="Enrollar" onclick="new Effect.Fade(\'origendeficiencia\'),new Effect.Fade(\'img_origendeficiencia\')">
				<img style="display:none" id="img_origendeficiencia" src="../imgs/menos.png"/>
				</a>
				<a href="#" onclick="new Effect.Appear(\'origendeficiencia\'),new Effect.Appear(\'img_origendeficiencia\')"><img src="../theme/images/origendeficiencia.png" style="border: 0px none;"></a>
				</li>
				<ul style="display:none" id="origendeficiencia">
					<li><a href="../mod_origendeficiencia/reg_origendeficiencia.php"><img src="../theme/images/nuevo.png" style="border: 0px none;">Agregar</a></li>
					<li><a href="../mod_origendeficiencia/act_origendeficiencia.php"><img src="../theme/images/edit.png" style="border: 0px none;">Editar</a></li>
					<li><a href="../mod_origendeficiencia/bus_origendeficiencia.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Buscar</a></li>
				</ul>
			</td>
			<td>
				<a href="#" title="Enrollar" onclick="new Effect.Fade(\'adaptacion\'),new Effect.Fade(\'img_adaptacion\')">
				<img style="display:none" id="img_adaptacion" src="../imgs/menos.png"/>
				</a>
				<a href="#" onclick="new Effect.Appear(\'adaptacion\'),new Effect.Appear(\'img_adaptacion\')"><img src="../theme/images/adaptacion.png" style="border: 0px none;"></a>
				</li>
				<ul style="display:none" id="adaptacion">
					<li><a href="../mod_adaptacion/reg_adaptacion.php"><img src="../theme/images/nuevo.png" style="border: 0px none;">Agregar</a></li>
					<li><a href="../mod_adaptacion/act_adaptacion.php"><img src="../theme/images/edit.png" style="border: 0px none;">Editar</a></li>
					<li><a href="../mod_adaptacion/bus_adaptacion.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Buscar</a></li>
				</ul>
			</td>
			<td>
					<a href="#" title="Enrollar" onclick="new Effect.Fade(\'ayudastecnicas\'),new Effect.Fade(\'img_ayudastecnicas\')">
				<img style="display:none" id="img_ayudastecnicas" src="../imgs/menos.png"/>
				</a>
				<a href="#" onclick="new Effect.Appear(\'ayudastecnicas\'),new Effect.Appear(\'img_ayudastecnicas\')"><img src="../theme/images/ayudastecnicas.png" style="border: 0px none;"></a>
				</li>
				<ul style="display:none" id="ayudastecnicas">
					<li><a href="../mod_ayudastecnicas/reg_ayudastecnicas.php"><img src="../theme/images/nuevo.png" style="border: 0px none;">Agregar</a></li>
					<li><a href="../mod_ayudastecnicas/act_ayudastecnicas.php"><img src="../theme/images/edit.png" style="border: 0px none;">Editar</a></li>
					<li><a href="../mod_ayudastecnicas/bus_ayudastecnicas.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Buscar</a></li>
				</ul>
			</td>
			
			<td>
				<a href="#" title="Enrollar" onclick="new Effect.Fade(\'sucursal\'),new Effect.Fade(\'img_sucursal\')">
				<img style="display:none" id="img_sucursal" src="../imgs/menos.png"/>
				</a>
				<a href="#" onclick="new Effect.Appear(\'sucursal\'),new Effect.Appear(\'img_sucursal\')"><img src="../theme/images/sucursal.png" style="border: 0px none;"></a>
				</li>
				<ul style="display:none" id="sucursal">
					<li><a href="../mod_sucursal/reg_sucursal.php"><img src="../theme/images/nuevo.png" style="border: 0px none;">Agregar</a></li>
					<li><a href="../mod_sucursal/act_sucursal.php"><img src="../theme/images/edit.png" style="border: 0px none;">Editar</a></li>
					<li><a href="../mod_sucursal/bus_sucursal.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Buscar</a></li>
				</ul>
			</td>
			<td>
				<a href="#" title="Enrollar" onclick="new Effect.Fade(\'monitoreo\'),new Effect.Fade(\'img_monitoreo\')">
				<img style="display:none" id="img_monitoreo" src="../imgs/menos.png"/>
				</a>
				<a href="#" onclick="new Effect.Appear(\'monitoreo\'),new Effect.Appear(\'img_monitoreo\')"><img src="../theme/images/monitoreo.png" style="border: 0px none;"></a>
				</li>
				<ul style="display:none" id="monitoreo">
					<li><a href="../mod_monitoreo/bus_auditoria.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Auditoría</a></li>
					<li><a href="../mod_monitoreo/bus_monitoreon.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">NIÑOS Y ADOLESCENTES</a></li>
					<li><a href="../mod_monitoreo/bus_monitoreop.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">PERSONA CON DISCAPACIDAD</a></li>
					<li><a href="../mod_monitoreo/bus_monitoreos.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">SUSTITUTOS</a></li>
					<li><a href="../mod_monitoreo/bus_monitoreo.php"><img src="../theme/images/edit-find.png" style="border: 0px none;">Buscar Usuario</a></li>
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
	
}		

