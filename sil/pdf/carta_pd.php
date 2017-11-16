<?php
session_start();
//incluimos funciones,configuración e idioma
include('../funciones.php');
require('../config.php');
require('../idioma/'.$idioma.'');
//si hay sesión cargamos código
if (isset($_SESSION['usuario_sesion'])&$_SESSION['usuario_sesion']=='ramon')
{

//conecto con MySQL
conecta();



//selecciono alumnos
$sel_alum = mysql_query("select * from alumnado order by grupo,apellidos,nombre");

require('html2fpdf.php');
$pdf=new HTML2FPDF('P','mm','A4');
$pdf->pgwidth = 180;
$pdf->SetMargins(20,20,20);
$pdf->AddPage();

$n = mysql_num_rows($sel_alum);
for($a=0;$a<$n;$a++)
	{
	$reg_sel_alum = mysql_fetch_array($sel_alum);
	$nombre = $reg_sel_alum['nombre'];
	$apellidos = $reg_sel_alum['apellidos'];
	$direccion1 = $reg_sel_alum['direccion1'];
	$direccion2 = $reg_sel_alum['direccion2'];
	$tutor1 = $reg_sel_alum['tutor1'];
	$tutor2 = $reg_sel_alum['tutor2'];
	$grupo = $reg_sel_alum['grupo'];
		
	if($tutor2=='ND')
		{
		$tutor2 = '';
		}
	//solamente hay una dirección en la base de datos
	if($direccion2 == '' || $direccion2 == 'ND')
			{
	

//texto
$texto='
<b>Estimada familia:</b><br/>
Para el presente curso académico 2008-2009, las profesoras Elena Díaz Pedroche, Esther Díaz Pedroche y Montse Díaz Pedroche ponen a su disposición la posibilidad de mantenerles informados sobre la marcha académica (calificaciones, faltas de asistencia, informes, boletines, etcétera) de sus hijos e hijas a través de Internet. Con ello, pretendemos ofrecerles información actualizada e instantánea sobre las actividades de sus hijos e hijas en nuestras clases. Además, gracias a este servicio, en cualquier momento podremos remitirles por correspondencia o en mano cualquier boletín o informe totalmente actualizado.<br/><br>

Para que esto sea posible, necesitamos su autorización por escrito para disponer de los siguientes datos de sus hijos e hijas:<br/><br/>
<ul>
<li>Nombre y apellidos</li>
<li>Domicilio y tutores legales</li>
<li>Teléfono</li>
<li>Fotografía</li>
</ul>

Por tanto, les remitimos esta carta para que, si lo estiman oportuno, autoricen a que estos datos de sus hijos e hijas (más los académicos del curso 2008-2009 referentes a nuestras asignaturas) se hallen en nuestro registro, tal y como establece la Ley.<br/><br/>

<p>Autorización</p>
<p>En conformidad con la Ley Orgánica 15/1999 de
13 de diciembre de
Protección de Datos de Carácter Personal (LOPD),
'.$tutor1.' '.$tutor2.' da/damos mi/nuestra conformidad para que los datos académicos de mi hijo/a correspondientes al curso académico 2008-2009 y a las materias de las profesoras Elena Díaz Pedroche, Esther Díaz Pedroche y Montse Díaz Pedroche figuren en un fichero automatizado (SIESTTA), el cual será procesado exclusivamente para las siguientes
finalidades: información a familias y gestión docente. Los datos personales recogidos son los imprescindibles
para poder prestar el servicio requerido por el Usuario.</p>

      <p>Los datos de carácter personal
serán tratados con el grado de
protección adecuado, según el Real Decreto
994/1999 de 11 de junio,
tomándose las medidas de seguridad necesarias para evitar su
alteración, pérdida, tratamiento o acceso no
autorizado por parte de
terceros que lo puedan utilizar para finalidades distintas para las que
han sido solicitados al Usuario.</p>
      <p>El Usuario podrá ejercer sus derechos de
oposición, acceso, rectificación y cancelación, en
cumplimiento de lo establecido en la LOPD mediante comunicación
a Elena Díaz Pedroche, Esther Díaz Pedroche o Montse Díaz Pedroche, profesoras del I.E.S. Fernando de Mena, sito en Socuéllamos (Ciudad Real).</p>

<p>'.$tutor1.'   '.$tutor2.'</p>

<br/><br/>

<p>En Socuéllamos, a ____ de Octubre de 2008</p>

';

$strContent="
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
<title>SIESTTA 2.0</title>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=uft-8\" />
</head>
<body>
<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"2\" align=\"left\">
<tr>
<td>".decode($nombre_centro)."<br />".decode($dir_centro)."<br />Tel.:".$telefono_centro." Fax: ".$fax_centro."</td>
<td><img src=\"logo.jpg\" width=\"130\" height=\"65\" alt=\"\" /></td>
</tr>
<tr>
<td>Alumn@: ".decode($nombre)." ".decode($apellidos)."</td>
<td></td>
</tr>
<tr>
<td>Grupo: ".decode($grupo)."</td>
<td></td>
</tr>
</table>
<br />
<table align=\"right\">
<tr><td>".decode($tutor1)."<br />".decode($tutor2)."<br />".decode($direccion1)."</td></tr>
</table>
<br />
<div text-align=\"justify\">
".decode($texto)."
</div>
</body>
</html>
";
$pdf->WriteHTML($strContent);
			}//fin 1 sola dirección
		else
			{
$strContent="
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
<title>Correspondencia</title>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=uft-8\" />
</head>
<br /><br />
<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"2\" align=\"left\">
<tr>
<td>".decode($nombre_centro)."<br />".decode($dir_centro)."<br />Tel.:".$telefono_centro." Fax: ".$fax_centro."</td>
<td><img src=\"logo.jpg\" width=\"130\" height=\"65\" alt=\"\" /></td>
</tr>
<tr>
<td>Alumn@: ".decode($nombre)." ".decode($apellidos)."</td>
<td></td>
</tr>
<tr>
<td>Grupo: ".decode($grupo)."</td>
<td></td>
</tr>
</table>
<br />
<table align=\"right\">
<tr><td>".decode($tutor1)."<br />".decode($direccion1)."</td></tr>
</table>
<br />
<div text-align=\"justify\">
".decode($texto)."
</div>
<body>
</body>
</html>
";
$strContent2="
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
<title>Correspondencia</title>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=uft-8\" />
</head>
<br /><br />
<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"2\" align=\"left\">
<tr>
<td>".decode($nombre_centro)."<br />".decode($dir_centro)."<br />Tel.:".$telefono_centro." Fax: ".$fax_centro."</td>
<td><img src=\"logo.jpg\" width=\"130\" height=\"65\" alt=\"\" /></td>
</tr>
<tr>
<td>Alumn@: ".decode($nombre)." ".decode($apellidos)."</td>
<td></td>
</tr>
<tr>
<td>Grupo: ".decode($grupo)."</td>
<td></td>
</tr>
</table>
<br />
<table align=\"right\">
<tr><td>".decode($tutor2)."<br />".decode($direccion2)."</td></tr>
</table>
<br />
<div text-align=\"justify\">
".decode($texto)."
</div>
<body>
</body>
</html>
";
$pdf->WriteHTML($strContent);
$pdf->AddPage();
$pdf->WriteHTML($strContent2);
			}//fin 2 direcciones
	
	if(($n-$a) > 1)
		{ 
		$pdf->AddPage();
		}
	}
$pdf->Output();

}//fin hay sesión

?>


