<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    include_once( CLASS_PATH . "class.clinterfaz.php" );
    include_once( CLASS_PATH . "class.clcompetencias.php" );
	
	
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
    $competencias = new clCompetencias();
    
    $strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
			$competencias->setStrCodigo($_REQUEST["strCodigo"]);
            $competencias->setStrLectura("");
            $competencias->setStrEtiqueta("INGRESAR COMPETENCIAS");
            $competencias->setStrNombreBoton("btnGuardar");
            $competencias->setStrValorBoton("Guardar");
			$competencias->setStrNombreBotons("btnSiguiente");
            $competencias->setStrValorBotons("Siguiente");
            $competencias->setStrNombreBotona("btnAnterior");
	        $competencias->setStrValorBotona("Anterior");
            //$competencias->setStrFechaInicio(date("Y-m-d"));
			//$competencias->setStrFechaFin(date("Y-m-d"));
            $strResultado .= $competencias->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			$strResultado .= $competencias->getStrListar();
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ):            
            $competencias->setstrHcomunicativas($_POST["lsHcomunicativas"]);
			$competencias->setstrHsociales($_POST["lsHsociales"]);
			$competencias->setstrTequipo($_POST["lsTequipo"]);
			$competencias->setstrIniciativa($_POST["lsIniciativa"]);
			$competencias->setstrObservacionesini($_POST["strObservacionesini"]);
			$competencias->setstrAdaptacion($_POST["lsAdaptacion"]);
			$competencias->setstrObservacionesada($_POST["strObservacionesada"]);
			$competencias->setstrResponsabilidad($_POST["lsResponsabilidad"]);
			$competencias->setstrObservacionesres($_POST["strObservacionesres"]);
			$competencias->setstrInterpersonales($_POST["lsInterpersonales"]);
			$competencias->setstrObservacionesper($_POST["strObservacionesper"]);
			$competencias->setstrDerivacion($_POST["lsDerivacion"]);
			$competencias->setstrObservacionesder($_POST["strObservacionesder"]);
			$competencias->setstrDerivacionint($_POST["lsDerivacionint"]);
			$competencias->setstrDerivacionext($_POST["lsDerivacionext"]);
			$competencias->setStrCodigo($_POST["strCodigo"]);
			
			
	       if($competencias->getStrIngresar())
		   {
               	$valor=$competencias->getStrCodigo();
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".COMPETENCIAS_URL."competencias.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            $strResultado .= $competencias->getStrListar().'<br>';
            break;
			case( $_REQUEST["btnSiguiente"] == "Siguiente" ):            
            	$competencias->setStrCodigo($_POST["strCodigo"]);
			   	$valor=$competencias->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".EMPLEOF_URL."empleof.php?btnNuevo=Nuevo&strCodigo=".$valor."");
             break;
			case( $_REQUEST["btnAnterior"] == "Anterior" ):            
            	$competencias->setStrCodigo($_POST["strCodigo"]);
        	   	$valor=$competencias->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".ORIENTACION_URL."orientacion.php?btnNuevo=Nuevo&strCodigo=".$valor."");
             break; 
			 case( $_REQUEST["btnEditar"] == "Actualizar" ):
			$competencias->setStrCodigo($_POST["strCodigo"]); 
			$competencias->setstrHcomunicativas($_POST["lsHcomunicativas"]);
			$competencias->setstrHsociales($_POST["lsHsociales"]);
			$competencias->setstrTequipo($_POST["lsTequipo"]);
			$competencias->setstrIniciativa($_POST["lsIniciativa"]);
			$competencias->setstrObservacionesini($_POST["strObservacionesini"]);
			$competencias->setstrAdaptacion($_POST["lsAdaptacion"]);
			$competencias->setstrObservacionesada($_POST["strObservacionesada"]);
			$competencias->setstrResponsabilidad($_POST["lsResponsabilidad"]);
			$competencias->setstrObservacionesres($_POST["strObservacionesres"]);
			$competencias->setstrInterpersonales($_POST["lsInterpersonales"]);
			$competencias->setstrObservacionesper($_POST["strObservacionesper"]);
			$competencias->setstrDerivacion($_POST["lsDerivacion"]);
			$competencias->setstrObservacionesder($_POST["strObservacionesder"]);
			$competencias->setstrDerivacionint($_POST["lsDerivacionint"]);
			$competencias->setstrDerivacionext($_POST["lsDerivacionext"]);
			
			
            if($competencias->getStrActualizar())
                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';

            	$valor=$competencias->getStrCodigo();
			 	$v=$competencias->getStrBuscaru($valor);
            	$strResultado .= '<meta http-equiv="Refresh" content="0;url=../competencias/competencias.php?btnNuevo=Nuevo&strCodigo='.$v.'">';	
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
            $competencias->setStrCodigo($_REQUEST["strCodigo"]);
            $competencias->setStrEtiqueta("ACTUALIZAR COMPETENCIAS");
            $competencias->setStrNombreBoton("btnEditar");
            $competencias->setStrValorBoton("Actualizar");

            if($competencias->getStrBuscar())
                $strResultado .= $competencias->getStrFormulario();
            else {
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
                $strResultado .= $competencias->getStrListar();
            }
            break;
            case( $_REQUEST["btnEliminar"] == "Eliminar" ):
	            $competencias->setStrCodigo($_REQUEST["strCodigo"]);
	            $valor=$competencias->getStrCodigo();
			 	$v=$competencias->getStrBuscaru($valor);
	            if ($competencias->getStrBuscar())
	                if($competencias->getStrEliminar())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar Competencia [Competencias]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
	
	          
            	$strResultado .= '<meta http-equiv="Refresh" content="0;url=../competencias/competencias.php?btnNuevo=Nuevo&strCodigo='.$v.'">';	
            break;
			
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $competencias->setStrCodigo($_REQUEST["strCodigo"]);
            if ($competencias->getStrBuscar())
                $strResultado .= $competencias->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $competencias->getStrListar().'<br>';
                }
            break;
      //Cuando cambia el combo de la Provincia
        case( $_REQUEST["btnBuscar"] == "Canton" ):
            $canton = new clCanton();
            $competencias->setStrProvincia($_REQUEST["strCodigoProvincia"]);
            $strResultado .= print($canton->getStrListar($competencias->getStrProvincia(), $competencias->getStrCanton()));
            exit;

        //Cuando cambia el combo del Canton
        case( $_REQUEST["btnBuscar"] == "Parroquia" ):            
            $parroquia = new clParroquia();
            $competencias->setStrCanton($_REQUEST["strCodigoCanton"]);
            $strResultado = print($parroquia->getStrListar($competencias->getStrCanton(), $competencias->getStrParroquia()));
            exit;
        case( $_REQUEST["btnBuscar"] == "Subtcurso" ):
            $Subtformacion = new clSubtformacion();
            $competencias->setstrTcurso($_REQUEST["strCodigoTcurso"]);
			$strResultado .= print($Subtformacion->getStrListar($competencias->getstrTcurso(), $competencias->getStrSubtformacion()));
           
		    exit;
		case( $_REQUEST["btnBuscar"] == "Subtformaciond" ):            
            $Subtformaciond = new clSubtformaciond();
			
            $competencias->setStrSubtformacion($_REQUEST["strCodigoTformaciond"]);
            $strResultado = print($Subtformaciond->getStrListar($competencias->getStrSubtformacion(), $competencias->getStrSubtformaciond()));
            exit;
  
        default:
            $strResultado .= $competencias->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>