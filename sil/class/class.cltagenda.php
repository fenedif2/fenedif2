<?php	
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.validaciones.php' );
    include_once( CLASS_PATH . "class.clquery.php" );
    include_once( CLASS_PATH . "class.clpaginacion.php" ); 
	include("config.inc.php");   
    class clTagenda
    {
       
        public function __construct()
        {
				
           
        }
  
       public function getStrListar()
        {
   
            

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            Agenda<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Listado Eventos</legend>
                       ';
            $retval .= '
                        <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                            <tr>
                               ';
			$retval .= '
			<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
<title>Calendario en PHP con eventos</title>
<meta http-equiv="PRAGMA" content="NO-CACHE" />
<meta http-equiv="EXPIRES" content="-1" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="vtip.js"></script>
<script type="text/javascript">
$(document).ready(function(){
setTimeout(function() {$(#mensaje).fadeOut(fast);}, 3000);
});
</script>
<style>
#agenda{margin:10px;width:700px;margin:0 auto}
#agenda h1{text-align:left;margin:0;font-size:1em;color:#312c2b}
#agenda h2{text-align:left;margin:0;font-size:1em;color:#969696}
#agenda table.calendario {margin:10px auto;width:100%;border:1px dotted #ccc;font-size:12px;}
.calendario th {border:1px dotted #ccc;font-weight:bold;background:#666;color:white;padding:10px 5px;}
.calendario td{padding:10px 5px;text-align:center;border:1px dotted #ccc;width:100px;white-space:pre-line;}
.calendario td p{margin:5px;font-size:12px;border:1px solid #ccc;text-align:left;padding:5px}
.calendario td.desactivada {background:#dcdcdc;}
.calendario td.activa {background:#ffffff;}
.calendario td.evento {background:#312c2b;color:white}
.calendario td.hoy{font-weight:bold}
.calendario form{margin:5px 0 !important}
.calendario input.text{border:1px dotted #ccc;background:white;width:200px !important}
.calendario input.enviar{border:1px dotted #ccc;background:white;width:70px !important;background:#ccc;margin:0 0 0 10px;}
.calendario td img{vertical-align:middle;float:right;border:0;width:16px;height:16px}
.vtip{cursor:pointer;}
.verde{font-size:100% !important;font-weight:bold;color:green;}
.rojo{font-size:100% !important;font-weight:bold;color:red;}
</style>
</head>
<body>
<div id="agenda">	';	
include("config.inc.php");
$mostrar="";
function fecha ($valor)
{
$timer = explode(" ",$valor);
$fecha = explode("-",$timer[0]);
$fechex = $fecha[2]."/".$fecha[1]."/".$fecha[0];
return $fechex;
}
if (isset($_POST["guardarevento"])=="Si")
{
$q1="insert into tcalendario (fecha,evento,hora,sucursal) values ('".$_POST["fecha"]."','".strip_tags($_POST["titulo"])."','".strip_tags($_POST["hora"])."','".$_SESSION["usuario"]["suc"]."')";
mysql_select_db($dbname);
if ($r1=mysql_query($q1)) $mostrar="<p class='ok' id='mensaje'>Evento guardado correctamente.</p>";
else $mostrar= "<p class='error' id='mensaje'>Se ha producido un error guardando el evento.</p>";
}
if (isset($_GET["borrarevento"]))
{
$q1="delete from tcalendario where id='".$_GET["borrarevento"]."' limit 1";
mysql_select_db($dbname);
if ($r1=mysql_query($q1)) $mostrar="<p class='ok' id='mensaje'>Evento eliminado correctamente.</p>";
else $mostrar="<p class='error' id='mensaje'>Se ha producido un error eliminando el evento.</p>";
}
if (isset($_POST["addevent"])=="Si")
{
$q1="insert into tcalendario (fecha,evento,hora) values ('".$_POST["fechas"]."','".$_POST["titulos"]."','".$_POST["horas"]."')";
mysql_select_db($dbname);
if ($r1=mysql_query($q1)) $mostrar="<p class='ok' id='mensaje'>Evento guardado correctamente.</p>";
else $mostrar="<p class='error' id='mensaje'>Se ha producido un error guardando el evento.</p>";
}
if (!isset($_GET["fecha"]))
{
$mesactual=intval(date("m"));
if ($mesactual<10) $elmes="0".$mesactual;
else $elmes=$mesactual;
$elanio=date("Y");
}
else
{
$cortefecha=explode("-",$_GET["fecha"]);
$mesactual=intval($cortefecha[1]);
if ($mesactual<10) $elmes="0".$mesactual;
else $elmes=$mesactual;
$elanio=$cortefecha[0];
}
$primeromes=date("N",mktime(0,0,0,$mesactual,1,$elanio));
if (!isset($_GET["mes"])) $hoy=date("Y-m-d");
else $hoy=$_GET["ano"]."-".$_GET["mes"]."-01";
if (($elanio % 4 == 0) && (($elanio % 100 != 0) || ($elanio % 400 == 0))) $dias=array("","31","29","31","30","31","30","31","31","30","31","30","31");
else $dias=array("","31","28","31","30","31","30","31","31","30","31","30","31");
$ides=array();
$eventos=array();
$titulos=array();
$horas=array();
$q1="select * from tcalendario where month(fecha)='".$elmes."' and year(fecha)='".$elanio."' and sucursal= '".$_SESSION["usuario"]["suc"]."' ";
mysql_select_db($dbname);
$r1=mysql_query($q1);
if ($f1=mysql_fetch_array($r1))
{
$h=0;
do
{
$ides[$h]=$f1["id"];
$eventos[$h]=$f1["fecha"];
$titulos[$h]=$f1["evento"];
$horas[$h]=$f1["hora"];
$h+=1;
}
while($f1=mysql_fetch_array($r1));
}
$meses=array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
$diasantes=$primeromes-1;
$diasdespues=42;
$tope=$dias[$mesactual]+$diasantes;
if ($tope%7!=0) $totalfilas=intval(($tope/7)+1);
else $totalfilas=intval(($tope/7));
$retval .= $mostrar;
$retval .= "<script>function mostrar(cual) {if (document.getElementById(cual).style.display=='block') {document.getElementById(cual).style.display='none';} else {document.getElementById(cual).style.display='block'} }</script>";
$retval .= "<table class='calendario' cellspacing='0' cellpadding='0'>";
$retval .= "<tr><th>L</th><th>M</th><th>M</th><th>J</th><th>V</th><th>S</th><th>D</th></tr><tr>";
$j=1;
$filita=0;
function buscarevento($fecha,$eventos,$titulos,$horas)
{
$clave=array_search($fecha,$eventos,true);
return $titulos[$clave];
}
for ($i=1;$i<=$diasdespues;$i++)
{
if ($filita<$totalfilas)
{
if ($i>=$primeromes && $i<=$tope)
{
$retval .= "<td";
if ($j<10) $dd="0".$j;else $dd=$j;
$compuesta=$elanio."-$elmes-$dd";
if (count($eventos)>0 && in_array($compuesta,$eventos,true)) 
	{$retval .= " class=' evento";$noagregar=true;}
	else 
		{$retval .= " class='activa";$noagregar=false;}
if ($hoy==$compuesta) $retval .= " hoy";
if ($noagregar==false) $retval .= "'>$j<a href='javascript:mostrar(\"evento$j\")' 
title='Crear un Evento el ".fecha($compuesta)."' class='vtip'>
<img src='add.png' /></a>
<form id='evento$j' method='post' action='".$_SERVER["PHP_SELF"]."' style='display:none'>
<input type='text' name='titulo' class='text' />
<input type='text' name='hora' class='text' />
<input type='Submit' name='Enviar' value='Guardar' class='enviar' />
<input type='hidden' name='guardarevento' value='Si' />
<input type='hidden' name='fecha' value='$compuesta' /></form>";
else $retval .= "'>$j<a href='javascript:mostrar(\"evento$j\")' title='Agregar un Evento el ".fecha($compuesta)."' class='vtip'>
<img src='add.png' /></a>
<form id='evento$j' method='post' action='".$_SERVER["PHP_SELF"]."' style='display:none'>
<input type='text' name='titulos' class='text' />
<input type='text' name='horas' class='text' />
<input type='Submit' name='Enviar' value='Guardar' class='enviar' />
<input type='hidden' name='addevent' value='Si' />
<input type='hidden' name='fechas' value='$compuesta' /></form>";
$sqlevent="select * from tcalendario where fecha='".$compuesta."' and sucursal= '".$_SESSION["usuario"]["suc"]."' order by id";
					mysql_select_db($strBaseDatos);
					$revent=mysql_query($sqlevent);
					while($rowevent=mysql_fetch_array($revent))
					{
						$retval .= "<p>$rowevent[evento] $rowevent[hora]
						<a href='".$_SERVER["PHP_SELF"]."?borrarevento=".$rowevent["id"]."' 
						onClick=\"return confirm('¿Confirmas la eliminación del Evento?')\"
						title='Eliminar este Evento del ".fecha($compuesta)."' 
						class='vtip'><img src='delete.png' /></a></p>";
					}
					
					$retval .= "</td>";
					$j+=1;
				}
				else $retval .= "<td class='desactivada'> </td>";
				if ($i==7 || $i==14 || $i==21 || $i==28 || $i==35 || $i==42) {$retval .= "<tr>";$filita+=1;}
				}
			}
			$mesanterior=date("Y-m-d",mktime(0,0,0,$mesactual-1,01,$elanio));
			$messiguiente=date("Y-m-d",mktime(0,0,0,$mesactual+1,01,$elanio));
			$retval .= "<legend class=etiquetaborde><p>Calendario de Eventos para: ".$meses[$mesactual]." de ".$elanio."</p></legend>";
            $retval .= "<p>« <a href='".$_SERVER["PHP_SELF"]."?fecha=$mesanterior'>Mes Anterior</a> - <a href='".$_SERVER["PHP_SELF"]."?fecha=$messiguiente'>Mes Siguiente</a> »</p>";
            $retval .= '<tr><td colspan="12" align="center"></td></tr>';
            $retval .= '</table>';
            $retval .= '</fieldset>';
            return $retval;

		   
        }

public function getStrDetallePersona()
        {
		}

        
    }
?>