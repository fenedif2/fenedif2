<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    include_once( CLASS_PATH . "class.clinterfaz.php" );
    include_once( CLASS_PATH . "class.clterapia.php" );

    $interfaz = new clInterfaz();
    $terapia = new clTerapia();
    
    $strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
            $terapia->setStrLectura("");
            //$terapia->setStrSucursal($_SESSION["usuario"]["suc"]);
            $terapia->setStrEtiqueta("INGRESO  ATENCIÓN PSICOTERAPÉUTICA");
            $terapia->setStrNombreBoton("btnGuardar");
            $terapia->setStrValorBoton("Guardar");
			$terapia->setStrFechai(date("Y-m-d"));
			$terapia->setStrFechae(date("Y-m-d"));
            $terapia->setStrFechaNacimiento(date("Y-m-d"));
			$terapia->setStrFechaIngreso(date("Y-m-d"));
            $strResultado .= $terapia->getStrFormulario();
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ): 
        	//$terapia->setStrCodigo($_POST["strCodigo"]);          
            $terapia->setstrFechai($_POST["dtFechai"]);
            $terapia->setstrResponsable($_POST["strResponsable"]);
			$terapia->setstrCargo($_POST["strCargo"]);
			$terapia->setStrFechae($_POST["dtFechae"]); 
			$terapia->setStrLevaluacion($_POST["strLevaluacion"]);
			$terapia->setStrSolicitadop($_POST["strSolicitadop"]); 
			$terapia->setStrNapellidos($_POST["strNapellidos"]);
			$terapia->setStrFechaNacimiento($_POST["dtFecha"]);
			$terapia->setStrLnacimiento($_POST["strLnacimiento"]);
			$terapia->setStrDirecciond($_POST["strDirecciond"]);
			$terapia->setStrIngresoec($_POST["strIngresoec"]);
			$terapia->setStrIngresoem($_POST["strIngresoem"]);
			$terapia->setStrGenero($_POST["lsGenero"]);
			$terapia->setStrEcivil($_POST["lsEcivil"]);
			$terapia->setStrTfnecesaria($_POST["lsTfnecesaria"]);
			$terapia->setStrOcupacion($_POST["strOcupacion"]);
			$terapia->setStrFechaIngreso($_POST["dtFechaIngreso"]);
			$terapia->setStrCelular($_POST["strCelular"]);
			$terapia->setStrConvencional($_POST["strConvencional"]);
			$terapia->setStrUsuario($_POST["strUsuario"]);
			$terapia->setStrFamiliar($_POST["strFamiliar"]);
			$terapia->setStrEmpresa($_POST["strEmpresa"]);
			$terapia->setStrEquiposil($_POST["strEquiposil"]);
			$terapia->setStrOtrosr($_POST["strOtrosr"]);
			$terapia->setStrNombrer($_POST["strNombrer"]);
			$terapia->setstrEntrevista($_POST["strEntrevista"]);
			$terapia->setStrConsulta($_POST["strConsulta"]);
			$terapia->setStrRentrevista($_POST["strRentrevista"]);
			$terapia->setStrEvaluacionp($_POST["strEvaluacionp"]);
			$terapia->setStrIniciopt($_POST["strIniciopt"]);
			$terapia->setStrAntecedentesr($_POST["strAntecedentesr"]);
			$terapia->setStrAnamesis($_POST["strAnamesis"]);
			$terapia->setStrComposicionf($_POST["strComposicionf"]);
			$terapia->setStrPropia($_POST["strPropia"]);
			$terapia->setStrAlquilada($_POST["strAlquilada"]);
			$terapia->setStrPrestada($_POST["strPrestada"]);
			$terapia->setStrVfamiliar($_POST["strVfamiliar"]);
			$terapia->setStrVotros($_POST["strVotros"]);
			$terapia->setStrApotable($_POST["strApotable"]);
			$terapia->setStrAlcantarillado($_POST["strAlcantarillado"]);
			$terapia->setStrElectricidad($_POST["strElectricidad"]);
			$terapia->setStrTelefoniaf($_POST["strTelefoniaf"]);
			$terapia->setstrTransportep($_POST["strTransportep"]);
			$terapia->setStrCorreoe($_POST["strCorreoe"]);
			$terapia->setStrViasa($_POST["strViasa"]);
			$terapia->setStrProcedencia($_POST["strProcedencia"]);
			$terapia->setStrCantidad($_POST["strCantidad"]);
			$terapia->setStrCantidadg($_POST["strCantidadg"]);
			$terapia->setStrResultadose($_POST["strResultadose"]);
			$terapia->setStrReactivosa($_POST["strReactivosa"]);
			$terapia->setStrResultadosra($_POST["strResultadosra"]);
			$terapia->setStrEvaluacionindi($_POST["strEvaluacionindi"]);
			$terapia->setStrEvaluacionfami($_POST["strEvaluacionfami"]);
			$terapia->setStrEvaluacionpsico($_POST["strEvaluacionpsico"]);
			$terapia->setStrEvaluacionsocial($_POST["strEvaluacionsocial"]);
			$terapia->setStrEvaluacionocup($_POST["strEvaluacionocup"]);
			$terapia->setStrPersonales($_POST["strPersonales"]);
			$terapia->setStrPsicosociales($_POST["strPsicosociales"]);
			$terapia->setStrTransversales($_POST["strTransversales"]);
			$terapia->setStrAfortalecer($_POST["strAfortalecer"]);
			$terapia->setStrAtencionp($_POST["strAtencionp"]);
			$terapia->setStrAtencions($_POST["strAtencions"]);
			$terapia->setStrDescripciond($_POST["strDescripciond"]);
			$terapia->setStrPronostico($_POST["strPronostico"]);
			$terapia->setStrConcluciones($_POST["strConcluciones"]);
			$terapia->setStrRecomendaciones($_POST["strRecomendaciones"]);
	       if($terapia->getStrIngresar())
		   {
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            //$strResultado .= $terapia->getStrListar().'<br>';
            break;
			 case( $_REQUEST["btnEditar"] == "Actualizar" ):
			$terapia->setStrCodigo($_POST["strCodigo"]);          
            $terapia->setstrFechai($_POST["dtFechai"]);
            $terapia->setstrResponsable($_POST["strResponsable"]);
			$terapia->setstrCargo($_POST["strCargo"]);
			$terapia->setStrFechae($_POST["dtFechae"]); 
			$terapia->setStrLevaluacion($_POST["strLevaluacion"]);
			$terapia->setStrSolicitadop($_POST["strSolicitadop"]); 
			$terapia->setStrNapellidos($_POST["strNapellidos"]);
			$terapia->setStrFechaNacimiento($_POST["dtFecha"]);
			$terapia->setStrLnacimiento($_POST["strLnacimiento"]);
			$terapia->setStrDirecciond($_POST["strDirecciond"]);
			$terapia->setStrIngresoec($_POST["strIngresoec"]);
			$terapia->setStrIngresoem($_POST["strIngresoem"]);
			$terapia->setStrGenero($_POST["lsGenero"]);
			$terapia->setStrEcivil($_POST["lsEcivil"]);
			$terapia->setStrTfnecesaria($_POST["lsTfnecesaria"]);
			$terapia->setStrOcupacion($_POST["strOcupacion"]);
			$terapia->setStrFechaIngreso($_POST["dtFechaIngreso"]);
			$terapia->setStrCelular($_POST["strCelular"]);
			$terapia->setStrConvencional($_POST["strConvencional"]);
			$terapia->setStrUsuario($_POST["strUsuario"]);
			$terapia->setStrFamiliar($_POST["strFamiliar"]);
			$terapia->setStrEmpresa($_POST["strEmpresa"]);
			$terapia->setStrEquiposil($_POST["strEquiposil"]);
			$terapia->setStrOtrosr($_POST["strOtrosr"]);
			$terapia->setStrNombrer($_POST["strNombrer"]);
			$terapia->setstrEntrevista($_POST["strEntrevista"]);
			$terapia->setStrConsulta($_POST["strConsulta"]);
			$terapia->setStrRentrevista($_POST["strRentrevista"]);
			$terapia->setStrEvaluacionp($_POST["strEvaluacionp"]);
			$terapia->setStrIniciopt($_POST["strIniciopt"]);
			$terapia->setStrAntecedentesr($_POST["strAntecedentesr"]);
			$terapia->setStrAnamesis($_POST["strAnamesis"]);
			$terapia->setStrComposicionf($_POST["strComposicionf"]);
			$terapia->setStrPropia($_POST["strPropia"]);
			$terapia->setStrAlquilada($_POST["strAlquilada"]);
			$terapia->setStrPrestada($_POST["strPrestada"]);
			$terapia->setStrVfamiliar($_POST["strVfamiliar"]);
			$terapia->setStrVotros($_POST["strVotros"]);
			$terapia->setStrApotable($_POST["strApotable"]);
			$terapia->setStrAlcantarillado($_POST["strAlcantarillado"]);
			$terapia->setStrElectricidad($_POST["strElectricidad"]);
			$terapia->setStrTelefoniaf($_POST["strTelefoniaf"]);
			$terapia->setstrTransportep($_POST["strTransportep"]);
			$terapia->setStrCorreoe($_POST["strCorreoe"]);
			$terapia->setStrViasa($_POST["strViasa"]);
			$terapia->setStrProcedencia($_POST["strProcedencia"]);
			$terapia->setStrCantidad($_POST["strCantidad"]);
			$terapia->setStrCantidadg($_POST["strCantidadg"]);
			$terapia->setStrResultadose($_POST["strResultadose"]);
			$terapia->setStrReactivosa($_POST["strReactivosa"]);
			$terapia->setStrResultadosra($_POST["strResultadosra"]);
			$terapia->setStrEvaluacionindi($_POST["strEvaluacionindi"]);
			$terapia->setStrEvaluacionfami($_POST["strEvaluacionfami"]);
			$terapia->setStrEvaluacionpsico($_POST["strEvaluacionpsico"]);
			$terapia->setStrEvaluacionsocial($_POST["strEvaluacionsocial"]);
			$terapia->setStrEvaluacionocup($_POST["strEvaluacionocup"]);
			$terapia->setStrPersonales($_POST["strPersonales"]);
			$terapia->setStrPsicosociales($_POST["strPsicosociales"]);
			$terapia->setStrTransversales($_POST["strTransversales"]);
			$terapia->setStrAfortalecer($_POST["strAfortalecer"]);
			$terapia->setStrAtencionp($_POST["strAtencionp"]);
			$terapia->setStrAtencions($_POST["strAtencions"]);
			$terapia->setStrDescripciond($_POST["strDescripciond"]);
			$terapia->setStrPronostico($_POST["strPronostico"]);
			$terapia->setStrConcluciones($_POST["strConcluciones"]);
			$terapia->setStrRecomendaciones($_POST["strRecomendaciones"]);
            if($terapia->getStrActualizar())
                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';

            $strResultado .= $terapia->getStrListar().'<br>';
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
            $terapia->setStrCodigo($_REQUEST["strCodigo"]);
            $terapia->setStrEtiqueta("ACTUALIZAR PSICOTERAPÉUTICA");
            $terapia->setStrNombreBoton("btnEditar");
            $terapia->setStrValorBoton("Actualizar");

            if($terapia->getStrBuscar())
                $strResultado .= $terapia->getStrFormulario();
            else {
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
                $strResultado .= $terapia->getStrListar();
            }
            break;
            case( $_REQUEST["btnEliminar"] == "Eliminar" ):
            $terapia->setStrCodigo($_REQUEST["strCodigo"]);
            if ($terapia->getStrBuscar())
                if($terapia->getStrEliminar())
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
                else
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar  [ REGISTRO]</span>';
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';

            $strResultado .= $terapia->getStrListar().'<br>';
            break;
			
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $terapia->setStrCodigo($_REQUEST["strCodigo"]);
            if ($terapia->getStrBuscar())
                $strResultado .= $terapia->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $terapia->getStrListar().'<br>';
                }
            break;
     //Cuando cambia el combo de la Provincia
        case( $_REQUEST["btnBuscar"] == "Canton" ):
            $canton = new clCanton();
            $terapia->setStrProvincia($_REQUEST["strCodigoProvincia"]);
            $strResultado .= print($canton->getStrListar($terapia->getStrProvincia(), $terapia->getStrCanton()));
            exit;

        //Cuando cambia el combo del Canton
        case( $_REQUEST["btnBuscar"] == "Parroquia" ):            
            $parroquia = new clParroquia();
            $terapia->setStrCanton($_REQUEST["strCodigoCanton"]);
            $strResultado = print($parroquia->getStrListar($terapia->getStrCanton(), $terapia->getStrParroquia()));
            exit;
  
        default:
            $strResultado .= $terapia->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>