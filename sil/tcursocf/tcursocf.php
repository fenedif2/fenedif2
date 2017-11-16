<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    include_once( CLASS_PATH . "class.clinterfaz.php" );
    include_once( CLASS_PATH . "class.cltcursocf.php" );
	
	
    include_once( CLASS_PATH . "class.clestadocformativo.php" );
	include_once( CLASS_PATH . "class.cltipocformativo.php" );
	include_once( CLASS_PATH . "class.clcobertura.php" );
	include_once( CLASS_PATH . "class.clexperiencia.php" );
	include_once( CLASS_PATH . "class.clprovincia.php" );
    include_once( CLASS_PATH . "class.clcanton.php" );
    include_once( CLASS_PATH . "class.clparroquia.php" );
	include_once( CLASS_PATH . "class.clsucursal.php" );
	include_once( CLASS_PATH . "class.clsector.php" );

    $interfaz = new clInterfaz();
    $tcursocf = new clTcursocf();
    
    $strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
			$tcursocf->setStrCodigo($_REQUEST["strCodigo"]);
            $tcursocf->setStrLectura("");
            $tcursocf->setStrEtiqueta("INGRESAR CURSOS");
            $tcursocf->setStrNombreBoton("btnGuardar");
            $tcursocf->setStrValorBoton("Guardar");
			$tcursocf->setStrNombreBotons("btnSiguiente");
            $tcursocf->setStrValorBotons("Siguiente");
			$tcursocf->setStrNombreBotona("btnAnterior");
	        $tcursocf->setStrValorBotona("Anterior");
            $tcursocf->setStrFechaInicio(date("Y-m-d"));
			$tcursocf->setStrFechaFin(date("Y-m-d"));
            $strResultado .= $tcursocf->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			$strResultado .= $tcursocf->getStrListar();
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ):            
            $tcursocf->setStrNombre($_POST["strNombre"]);
			$tcursocf->setstrCertificado($_POST["lsCertificado"]);
			$tcursocf->setstrAvalidado($_POST["lsAvalizado"]);
			$tcursocf->setstrFechaInicio($_POST["dtFecha"]);
			$tcursocf->setstrFechaFin($_POST["dtFechaf"]);
			$tcursocf->setstrNalumos($_POST["strNalumos"]);
			$tcursocf->setstrCdisponibles($_POST["strCdisponibles"]);
			$tcursocf->setStrNumero($_POST["strNumero"]); 
			$tcursocf->setstrTcurso($_POST["lsTcurso"]);
			$tcursocf->setStrSubtformacion($_POST["lsSubtformacion"]);
			$tcursocf->setStrSubtformaciond($_POST["lsSubtformaciond"]);
			$tcursocf->setstrEmpresa($_POST["lsEmpresa"]); 
			$tcursocf->setstrTasistentes($_POST["strTasistentes"]);
			$tcursocf->setstrNumhombres($_POST["strNumhombres"]);
			$tcursocf->setstrNummujeres($_POST["strNummujeres"]);
			$tcursocf->setstrNombtaller($_POST["strNombtaller"]);
			$tcursocf->setstrApellidof($_POST["strApellidof"]);
			$tcursocf->setstrTcursosil($_POST["lsTcursosil"]);
			$tcursocf->setstrInstructor($_POST["strInstructor"]);
			$tcursocf->setstrLcapacitacion($_POST["strLcapacitacion"]);
			$tcursocf->setStrParroquia($_POST["lsParroquia"]);
			$tcursocf->setStrCprincipal($_POST["strCprincipal"]);
			$tcursocf->setStrNumerod($_POST["strNumerod"]);
			$tcursocf->setStrTransversal($_POST["strTransversal"]);
			$tcursocf->setStrSector($_POST["lsSector"]);
			$tcursocf->setStrPasaje($_POST["strPasaje"]);
			$tcursocf->setStrBarrio($_POST["strBarrio"]);
			$tcursocf->setStrManzana($_POST["strManzana"]);
			$tcursocf->setStrSolar($_POST["strSolar"]);
			$tcursocf->setStrObservacion($_POST["strObservacion"]);
			$tcursocf->setStrCodigo($_POST["strCodigo"]);
			
			
	       if($tcursocf->getStrIngresar())
		   {
               	$valor=$tcursocf->getStrCodigo();
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".TCURSOCF_URL."tcursocf.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            $strResultado .= $tcursocf->getStrListar().'<br>';
            break;
			case( $_REQUEST["btnAnterior"] == "Anterior" ):            
            	$tcursocf->setStrCodigo($_POST["strCodigo"]);
        	   	$valor=$tcursocf->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".TFORMACIONCF_URL."tformacioncf.php?btnNuevo=Nuevo&strCodigo=".$valor."");
           
         	break; 
			case( $_REQUEST["btnSiguiente"] == "Siguiente" ):            
            	$tcursocf->setStrCodigo($_POST["strCodigo"]);
				$valor=$tcursocf->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".TSEGUIMIENTOCF_URL."tseguimientocf.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            break;
			 case( $_REQUEST["btnEditar"] == "Actualizar" ):
			$tcursocf->setStrNombre($_POST["strNombre"]);
			$tcursocf->setstrCertificado($_POST["lsCertificado"]);
			$tcursocf->setstrAvalidado($_POST["lsAvalizado"]);
			$tcursocf->setstrFechaInicio($_POST["dtFecha"]);
			$tcursocf->setstrFechaFin($_POST["dtFechaf"]);
			$tcursocf->setstrNalumos($_POST["strNalumos"]);
			$tcursocf->setstrCdisponibles($_POST["strCdisponibles"]);
			$tcursocf->setStrNumero($_POST["strNumero"]); 
			$tcursocf->setstrTcurso($_POST["lsTcurso"]);
			$tcursocf->setStrSubtformacion($_POST["lsSubtformacion"]);
			$tcursocf->setStrSubtformaciond($_POST["lsSubtformaciond"]);
			$tcursocf->setstrEmpresa($_POST["lsEmpresa"]); 
			$tcursocf->setstrTasistentes($_POST["strTasistentes"]);
			$tcursocf->setstrNumhombres($_POST["strNumhombres"]);
			$tcursocf->setstrNummujeres($_POST["strNummujeres"]);
			$tcursocf->setstrNombtaller($_POST["strNombtaller"]);
			$tcursocf->setstrApellidof($_POST["strApellidof"]);
			$tcursocf->setstrTcursosil($_POST["lsTcursosil"]);
			$tcursocf->setstrInstructor($_POST["strInstructor"]);
			$tcursocf->setstrLcapacitacion($_POST["strLcapacitacion"]);
			$tcursocf->setStrParroquia($_POST["lsParroquia"]);
			$tcursocf->setStrCprincipal($_POST["strCprincipal"]);
			$tcursocf->setStrNumerod($_POST["strNumerod"]);
			$tcursocf->setStrTransversal($_POST["strTransversal"]);
			$tcursocf->setStrSector($_POST["lsSector"]);
			$tcursocf->setStrPasaje($_POST["strPasaje"]);
			$tcursocf->setStrBarrio($_POST["strBarrio"]);
			$tcursocf->setStrManzana($_POST["strManzana"]);
			$tcursocf->setStrSolar($_POST["strSolar"]);
			$tcursocf->setStrObservacion($_POST["strObservacion"]);
			$tcursocf->setStrCodigo($_POST["strCodigo"]);
			
			$valor=$tcursocf->getStrCodigo();
			$v=$tcursocf->getStrBuscartccf($valor);
            if($tcursocf->getStrActualizar())
            {
            		
                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
				
			}
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';

            header("Location:".TCURSOCF_URL."tcursocf.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
            $tcursocf->setStrCodigo($_REQUEST["strCodigo"]);
            $tcursocf->setStrEtiqueta("ACTUALIZAR CURSOS");
            $tcursocf->setStrNombreBoton("btnEditar");
            $tcursocf->setStrValorBoton("Actualizar");

            if($tcursocf->getStrBuscar())
                $strResultado .= $tcursocf->getStrFormulario();
            else {
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
                $strResultado .= $tcursocf->getStrListar();
            }
            break;
            case( $_REQUEST["btnEliminar"] == "Eliminar" ):
	            $tcursocf->setStrCodigo($_REQUEST["strCodigo"]);
				$valor=$tcursocf->getStrCodigo();
			$v=$tcursocf->getStrBuscartccf($valor);
	            if ($tcursocf->getStrBuscar())
	                if($tcursocf->getStrEliminar())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
	
	            header("Location:".TCURSOCF_URL."tcursocf.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
			
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $tcursocf->setStrCodigo($_REQUEST["strCodigo"]);
            if ($tcursocf->getStrBuscar())
                $strResultado .= $tcursocf->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $tcursocf->getStrListar().'<br>';
                }
            break;
      //Cuando cambia el combo de la Provincia
        case( $_REQUEST["btnBuscar"] == "Canton" ):
            $canton = new clCanton();
            $tcursocf->setStrProvincia($_REQUEST["strCodigoProvincia"]);
            $strResultado .= print($canton->getStrListar($tcursocf->getStrProvincia(), $tcursocf->getStrCanton()));
            exit;

        //Cuando cambia el combo del Canton
        case( $_REQUEST["btnBuscar"] == "Parroquia" ):            
            $parroquia = new clParroquia();
            $tcursocf->setStrCanton($_REQUEST["strCodigoCanton"]);
            $strResultado = print($parroquia->getStrListar($tcursocf->getStrCanton(), $tcursocf->getStrParroquia()));
            exit;
        case( $_REQUEST["btnBuscar"] == "Subtcurso" ):
            $Subtformacion = new clSubtformacion();
            $tcursocf->setstrTcurso($_REQUEST["strCodigoTcurso"]);
			$strResultado .= print($Subtformacion->getStrListar($tcursocf->getstrTcurso(), $tcursocf->getStrSubtformacion()));
           
		    exit;
		case( $_REQUEST["btnBuscar"] == "Subtformaciond" ):            
            $Subtformaciond = new clSubtformaciond();
			
            $tcursocf->setStrSubtformacion($_REQUEST["strCodigoTformaciond"]);
            $strResultado = print($Subtformaciond->getStrListar($tcursocf->getStrSubtformacion(), $tcursocf->getStrSubtformaciond()));
            exit;
  
        default:
            $strResultado .= $tcursocf->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>