<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    include_once( CLASS_PATH . "class.clinterfaz.php" );
include_once( CLASS_PATH . "class.clreporte.php" );
include_once( CLASS_PATH . "class.clespecialidadmedico.php" );

$interfaz = new clInterfaz();
$reporte = new clReporte();

$strResultado = "";

//$tipo = strtolower($_SESSION["usuario"]["tipo"]);
if(isset($_REQUEST["btnreporte-acceso"]))
    $tipo = $_REQUEST["btnreporte-acceso"];
else
    $tipo = $_REQUEST["btnreporteacceso"];


switch( $tipo ){
    //Administrador - Formulario
    case  "2": case "s": case "t": case "m": case "e": case "r":
            $strResultado .= $reporte->getStrFormularioReportes();
    break;

   //Administrador - Formulario - Reporte Listado Pacientes
    case "ap": case "sp": case "tp": case "mp": case "ep": case "rp":
            $strResultado .= $reporte->getStrListadoPacientes();
    break;

    //Administrador - Formulario - Reporte Listado Medicos
    case "am": case "sm": case "tm": case "mm": case "em": case "rm":
            $strResultado .= $reporte->getStrListadoMedicos();
    break; 

    //Administrador - Formulario - Reporte Listado Precios
    case "ac": case "sc": case "tc": case "mc": case "ec": case "rc":
            $strResultado .= $reporte->getStrListadoPrecios();
    break;

    //Administrador - Formulario - Reporte Listado Usuarios
    case "au": //case "ru": case "su": case "lu":
            $strResultado .= $reporte->getStrListadoUsuarios();
    break;

//Administrador - Formulario - Numero factura - Paciente
    case "anf": case "2hpp":  case "snf": case "shpp":  case "tnf": case "thpp":
             $reporte->setStrNumeroHistoriaClinicaPaciente($_POST["lsPaciente"]);
             $reporte->setStrNumeroFactura($_POST["strNumeroFactura"]);

            switch ($tipo) {
                case "anf": case "snf":  case "tnf":
                    $reporte->setStrEtiqueta("N&uacute;mero&nbsp;Factura");
                break;
                case "2hpp":  case "shpp": case "thpp":
                    $reporte->setStrEtiqueta("Historial&nbsp;Pagos&nbsp;Paciente");
                break;                
            }
            $reporte->setStrNombreBoton("Aceptar");
            $reporte->setStrValorBoton("Aceptar");
            $strResultado .= $reporte->getStrFormularioNumeroFacturaHistorialPagosPaciente($tipo);
    break;

//Visualizacion en formato PDF - Numero Factura - Historial pagos Paciente
    case "anf_pdf": case "2hpp_pdf": case "snf_pdf": case "shpp_pdf": case "tnf_pdf": case "thpp_pdf":
            $reporte->setStrNumeroHistoriaClinicaPaciente($_POST["lsPaciente"]);
            if ((int) $_POST["strNumeroFactura"]== 0)
                $reporte->setStrNumeroFactura("-1");
            else
                $reporte->setStrNumeroFactura($_POST["strNumeroFactura"]);

            switch ($tipo) {
                case "anf_pdf": case "snf_pdf": case "tnf_pdf":
                    $strResultado .= $reporte->getStrRptFactura();
                break;
                case "2hpp_pdf": case "shpp_pdf": case "thpp_pdf":
                    $strResultado .= $reporte->getStrRptHistorialPagosPaciente();
                break;                
            }

    break;

    //Administrador - Formulario - Recaudacion por Medico
    case "arm": case "aapm": case "ahcpm": case "srm": case "sapm": case "shcpm": case "trm": case "mapm": case "mhcpm": case "eapm": case "ehcpm":
            $reporte->setStrFechaInicio(date("Y-m-d"));
            $reporte->setStrFechaFin(date("Y-m-d"));
            switch ($tipo) {
                case "arm": case "srm": case "trm":
                    $reporte->setStrEtiqueta("Recaudaci&oacute;n&nbsp;por&nbsp;M&eacute;dico");
                break;
                case "aapm": case "sapm": case "mapm": case "eapm":
                    $reporte->setStrEtiqueta("Atenci&oacute;n&nbsp;Paciente&nbsp;por&nbsp;M&eacute;dico");
                break;
                case "ahcpm": case "shcpm": case "mhcpm": case "ehcpm":
                    $reporte->setStrEtiqueta("Historia&nbsp;Cl&iacute;nica&nbsp;Paciente&nbsp;por&nbsp;M&eacute;dico");
                break;
            }
            $reporte->setStrNombreBoton("Aceptar");
            $reporte->setStrValorBoton("Aceptar");
            $strResultado .= $reporte->getStrFormularioRecaudacionAtencionHistoriaClinicaMedico($tipo);
    break;

    //Visualizacion en formato PDF - Recaudacion por Medico
    case "arm_pdf": case "aapm_pdf": case "ahcpm_pdf": case "srm_pdf": case "sapm_pdf": case "shcpm_pdf": case "trm_pdf": case "mapm_pdf": case "mhcpm_pdf": case "eapm_pdf": case "ehcpm_pdf":
            $reporte->setStrTipoMedico($_POST["lsTipoMedico"]);
            $reporte->setStrEspecialidadMedico($_POST["lsMedico"]);
            $reporte->setStrNumeroHistoriaClinicaPaciente($_POST["lsPaciente"]);
            $reporte->setStrFechaInicio($_POST["dtFechaInicio"]);
            $reporte->setStrFechaFin($_POST["dtFechaFin"]);
           
             switch ($tipo) {
                case "arm_pdf": case "srm_pdf": case "trm_pdf":
                    $strResultado .= $reporte->getStrRptRecaudacionMedico();
                break;
                case "aapm_pdf": case "sapm_pdf": case "mapm_pdf": case "eapm_pdf":
                    $strResultado .= $reporte->getStrRptAtencionPacienteMedico();
                break;
                case "ahcpm_pdf": case "shcpm_pdf": case "mhcpm_pdf":  case "ehcpm_pdf":
                    $strResultado .= $reporte->getStrRptHistoriaClinicaPacienteMedico();
                break;
            }
    break;

 //Administrador - Formulario - Recaudacion por Servicio
    case "ars": case "aaps": case "ahcps":  case "srs": case "saps": case "shcps": case "trs": case "maps": case "mhcps": case "eaps": case "ehcps":
            $reporte->setStrFechaInicio(date("Y-m-d"));
            $reporte->setStrFechaFin(date("Y-m-d"));
            switch ($tipo) {
                case "ars": case "srs": case "trs":
                    $reporte->setStrEtiqueta("Recaudaci&oacute;n&nbsp;por&nbsp;Servicio");
                break;
                case "aaps": case "saps": case "maps": case "eaps":
                    $reporte->setStrEtiqueta("Atenci&oacute;n&nbsp;Paciente&nbsp;por&nbsp;Servicio");
                break;
                case "ahcps":  case "shcps": case "mhcps": case "ehcps":
                    $reporte->setStrEtiqueta("Historia&nbsp;Cl&iacute;nica&nbsp;Paciente&nbsp;por&nbsp;Servicios");
                break;
            }           
            $reporte->setStrNombreBoton("Aceptar");
            $reporte->setStrValorBoton("Aceptar");
            $strResultado .= $reporte->getStrFormularioRecaudacionAtencionHistoriaClinicaServicio($tipo);
    break;

//Visualizacion en formato PDF - Recaudacion por Servicio
    case "ars_pdf": case "aaps_pdf": case "ahcps_pdf": case "srs_pdf": case "saps_pdf": case "shcps_pdf": case "trs_pdf":  case "maps_pdf": case "mhcps_pdf":   case "eaps_pdf": case "ehcps_pdf":
            $reporte->setStrTipoMedico($_POST["lsTipoMedico"]);
            $reporte->setStrEspecialidadMedico($_POST["lsMedico"]);
            $reporte->setStrNumeroHistoriaClinicaPaciente($_POST["lsPaciente"]);
            $reporte->setStrFechaInicio($_POST["dtFechaInicio"]);
            $reporte->setStrFechaFin($_POST["dtFechaFin"]);
            switch ($tipo) {
                case "ars_pdf": case "srs_pdf": case "trs_pdf":
                    $strResultado .= $reporte->getStrRptRecaudacionServicio();
                break;
                case "aaps_pdf": case "saps_pdf": case "maps_pdf": case "eaps_pdf":
                    $strResultado .= $reporte->getStrRptAtencionPacienteServicio();
                break;

                case "ahcps_pdf":  case "shcps_pdf": case "mhcps_pdf":  case "ehcps_pdf":
                    $strResultado .= $reporte->getStrRptHistoriaClinicaPacienteServicio();
                break;
            }
            
    break;

//Administrador - Formulario - Recaudacion General
    case "arg": case "aapg": case "ahcpg": case "srg": case "sapg": case "shcpg": case "trg": case "mapg": case "mhcpg": case "eapg": case "ehcpg":  case "rrg":case "rapg": case "rhcpg":
            $reporte->setStrFechaInicio(date("Y-m-d"));
            $reporte->setStrFechaFin(date("Y-m-d"));
             switch ($tipo) {
                case "arg": case "srg": case "trg": case "rrg":
                    $reporte->setStrEtiqueta("Recaudaci&oacute;n&nbsp;General");
                break;
                case "aapg": case "sapg": case "mapg": case "eapg": case "rapg":
                    $reporte->setStrEtiqueta("Atenci&oacute;n&nbsp;Paciente&nbsp;General");
                break;
                case "ahcpg":  case "shcpg": case "mhcpg":  case "ehcpg":  case "rhcpg":
                    $reporte->setStrEtiqueta("Historia&nbsp;Cl&iacute;nica&nbsp;Paciente&nbsp;General");
                break;
            }   
            $reporte->setStrNombreBoton("Aceptar");
            $reporte->setStrValorBoton("Aceptar");
            $strResultado .= $reporte->getStrFormularioRecaudacionAtencionHistoriaClinicaGeneral($tipo);
    break;

//Visualizacion en formato PDF - Recaudacion General
    case "arg_pdf": case "aapg_pdf": case "ahcpg_pdf":  case "srg_pdf": case "sapg_pdf": case "shcpg_pdf":  case "trg_pdf": case "mapg_pdf": case "mhcpg_pdf": case "eapg_pdf": case "ehcpg_pdf": case "rrg_pdf": case "rapg_pdf": case "rhcpg_pdf":
            $reporte->setStrTipoMedico($_POST["lsTipoMedico"]);
            $reporte->setStrEspecialidadMedico($_POST["lsMedico"]);
            $reporte->setStrNumeroHistoriaClinicaPaciente($_POST["lsPaciente"]);
            $reporte->setStrFechaInicio($_POST["dtFechaInicio"]);
            $reporte->setStrFechaFin($_POST["dtFechaFin"]);
            switch ($tipo) {
                case "arg_pdf": case "srg_pdf": case "trg_pdf": case "rrg_pdf":
                    $strResultado .= $reporte->getStrRptRecaudacionGeneral();
                break;
                case "aapg_pdf":  case "sapg_pdf": case "mapg_pdf": case "eapg_pdf": case "rapg_pdf":
                    $strResultado .= $reporte->getStrRptAtencionPacienteGeneral();
                break;
                case "ahcpg_pdf": case "shcpg_pdf": case "mhcpg_pdf": case "ehcpg_pdf": case "rhcpg_pdf":
                    $strResultado .= $reporte->getStrRptHistoriaClinicaPacienteGeneral();
                break;
            }
            
    break;


//Administrador - Formulario - Auditoria
    case "aa":
            $reporte->setStrFechaInicio(date("Y-m-d"));
            $reporte->setStrFechaFin(date("Y-m-d"));
            switch ($tipo) {
                case "aa":
                    $reporte->setStrEtiqueta("Auditoria");
                break;               
            }
            $reporte->setStrNombreBoton("Aceptar");
            $reporte->setStrValorBoton("Aceptar");
            $strResultado .= $reporte->getStrFormularioAuditoria($tipo);
    break;

    //Visualizacion en formato PDF - Recaudacion por Medico
    case "aa_pdf":
            $reporte->setStrUsuario($_POST["lsUsuario"]);
            $reporte->setStrFechaInicio($_POST["dtFechaInicio"]);
            $reporte->setStrFechaFin($_POST["dtFechaFin"]);

             switch ($tipo) {
                case "aa_pdf":
                    $strResultado .= $reporte->getStrRptAuditoria();
                break;
            }
    break;

    case "EspecialidadMedico":
        $especialidadmedico = new clEspecialidadMedico();
        $reporte->setStrTipoMedico($_REQUEST["strCodigoTipoMedico"]);
        $strResultado .= print($especialidadmedico->getStrListarMedicosEspecialidad($reporte->getStrTipoMedico(), $reporte->getStrEspecialidadMedico()));
    exit;

    //Para descargas los archivos creados
    case "descargar":
                if (is_file(ARCHIVOS_PATH.$_REQUEST['descargararchivo'])){
                    header('Content-type: application/force-download');
                    header('Content-Disposition: attachment; filename="'.$_REQUEST["descargararchivo"].'"');
                    header("Content-Transfer-Encoding: binary");
                    header('Content-Length: '.filesize(ARCHIVOS_PATH.$_REQUEST["descargararchivo"]));
                    readfile(ARCHIVOS_PATH.$_REQUEST["descargararchivo"]);
                }else{
                    $strResultado .= '<br><br><br><br><img src="'. IMAGENES_PATH .'/error.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada <br> No existe el Archivo'. $_REQUEST['descargararchivo'] .' <br> y/o Error interno. Intente nuevamente</span>';
                    $strResultado .= $reporte->getStrFormularioAdministrador();
                }
    exit;

    default:
            $strResultado .= '<br><br><br><br><img src="'. IMAGENES_PATH .'/error.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada <br> No tiene acceso a reportes <br> y/o Error interno. Intente nuevamente</span>';
    break;

}

$interfaz->setStrCentro($strResultado);
echo $interfaz->getStrInterfaz();
?>