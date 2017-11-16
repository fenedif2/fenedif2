<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    	include_once( CLASS_PATH . "class.clinterfaz.php" );
    	include_once( CLASS_PATH . "class.cldiscapacidad.php" );
	  	$interfaz = new clInterfaz();
    	$discapacidad = new clDiscapacidad();
		$strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
			$discapacidad->setStrCodigo($_REQUEST["strCodigo"]);
			$discapacidad->setStrLectura("");
			$discapacidad->setStrEtiqueta("INGRESAR TIPO DISCAPACIDAD");
		    $discapacidad->setStrNombreBoton("btnGuardar");
	        $discapacidad->setStrValorBoton("Guardar");
			$discapacidad->setStrNombreBotons("btnSiguiente");
	        $discapacidad->setStrValorBotons("Siguiente");
			$discapacidad->setStrNombreBotona("btnAnterior");
	        $discapacidad->setStrValorBotona("Anterior");
			$discapacidad->setStrFechaIngreso(date("Y-m-d"));
	        $strResultado .= $discapacidad->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			$strResultado .= $discapacidad->getStrListar();
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ):            
            $discapacidad->setStrCodigo($_POST["strCodigo"]);
            $discapacidad->setStrTdiscapacidad($_POST["lsTdiscapacidad"]);
			$discapacidad->setStrPafectadas($_POST["lsPafectadas"]);
			$discapacidad->setStrTnivelavance($_POST["lsTnivelavance"]);
			$discapacidad->setStrObservaciones($_POST["strObservaciones"]);
			$discapacidad->setStrPdiscapacidad($_POST["lsPdiscapacidad"]);
			$discapacidad->setStrNdiscapacidad($_POST["lsNdiscapacidad"]);
			$discapacidad->setStrParentezco($_POST["lsParentezco"]);
			$discapacidad->setStrTdiscapacidadp($_POST["lsTdiscapacidadp"]);
			
			$discapacidad->setStrOdiscapacidad($_POST["lsOdiscapacidad"]);
			$discapacidad->setStrDiagnostico($_POST["strDiagnostico"]);
			$discapacidad->setStrObservacionorigen($_POST["strObservacionorigen"]);
			$discapacidad->setStrTporcentaje($_POST["lsTporcentaje"]);
			$discapacidad->setStrFechaIngreso($_POST["dtFechaIngreso"]);
			$discapacidad->setStrTayuda($_POST["lsTayuda"]);
			$discapacidad->setStrTayudaeconomica($_POST["lsTayudaeconomica"]);
			$discapacidad->setStrEstadod($_POST["lsEstadod"]);
			$discapacidad->setStrAtecnicas($_POST["lsAtecnicas"]);
			$discapacidad->setStrCrehabilitacion($_POST["lsCrehabilitacion"]);
			$discapacidad->setStrTipocentro($_POST["lsTipocentro"]);
			$discapacidad->setStrTratamiento($_POST["lsTratamiento"]);
			$discapacidad->setStrTratamientod($_POST["lsTratamientod"]);
			$discapacidad->setStrThorario($_POST["lsThorario"]);
			$discapacidad->setStrObservacionc($_POST["strObservacionc"]);
			
            if($discapacidad->getStrIngresar())
		   {
               $valor=$discapacidad->getStrCodigo();
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".DISCAPACIDAD_URL."discapacidad.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            $strResultado .= $discapacidad->getStrListar().'<br>';
            break;
			case( $_REQUEST["btnSiguiente"] == "Siguiente" ):            
            	$discapacidad->setStrCodigo($_POST["strCodigo"]);
                $valor=$discapacidad->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".PERSONAD_URL."personad.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            break;
			case( $_REQUEST["btnAnterior"] == "Anterior" ):            
            	$discapacidad->setStrCodigo($_POST["strCodigo"]);
        	   	$valor=$discapacidad->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".AYUDAST_URL."ayudast.php?btnNuevo=Nuevo&strCodigo=".$valor."");
           
            break;
			 case( $_REQUEST["btnEditar"] == "Actualizar" ):
			$discapacidad->setStrCodigo($_POST["strCodigo"]);
            $discapacidad->setStrTdiscapacidad($_POST["lsTdiscapacidad"]);
			$discapacidad->setStrPafectadas($_POST["lsPafectadas"]);
			$discapacidad->setStrTnivelavance($_POST["lsTnivelavance"]);
			$discapacidad->setStrObservaciones($_POST["strObservaciones"]);
			$discapacidad->setStrPdiscapacidad($_POST["lsPdiscapacidad"]);
			$discapacidad->setStrNdiscapacidad($_POST["lsNdiscapacidad"]);
			$discapacidad->setStrParentezco($_POST["lsParentezco"]);
			$discapacidad->setStrTdiscapacidadp($_POST["lsTdiscapacidadp"]);
			$discapacidad->setStrOdiscapacidad($_POST["lsOdiscapacidad"]);
			$discapacidad->setStrDiagnostico($_POST["strDiagnostico"]);
			$discapacidad->setStrObservacionorigen($_POST["strObservacionorigen"]);
			$discapacidad->setStrTporcentaje($_POST["lsTporcentaje"]);
			$discapacidad->setStrFechaIngreso($_POST["dtFechaIngreso"]);
			$discapacidad->setStrTayuda($_POST["lsTayuda"]);
			$discapacidad->setStrTayudaeconomica($_POST["lsTayudaeconomica"]);
			$discapacidad->setStrEstadod($_POST["lsEstadod"]);
			$discapacidad->setStrAtecnicas($_POST["lsAtecnicas"]);
			$discapacidad->setStrCrehabilitacion($_POST["lsCrehabilitacion"]);
			$discapacidad->setStrTipocentro($_POST["lsTipocentro"]);
			$discapacidad->setStrTratamiento($_POST["lsTratamiento"]);
			$discapacidad->setStrTratamientod($_POST["lsTratamientod"]);
			$discapacidad->setStrThorario($_POST["lsThorario"]);
			$discapacidad->setStrObservacionc($_POST["strObservacionc"]);
			
			$valor=$discapacidad->getStrCodigo();
			$v=$discapacidad->getStrBuscards($valor);			
		            if($discapacidad->getStrActualizar())
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
		            else
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';
		
		            $strResultado .= '<meta http-equiv="Refresh" content="0;url=../ninos/ninos.php">';
			header("Location:".DISCAPACIDAD_URL."discapacidad.php?btnNuevo=Nuevo&strCodigo=".$v."");		
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
		            $discapacidad->setStrCodigo($_REQUEST["strCodigo"]);
		            $discapacidad->setStrEtiqueta("Actualizar&nbsp; Forma de Discapacidad");
		            $discapacidad->setStrNombreBoton("btnEditar");
		            $discapacidad->setStrValorBoton("Actualizar");
		
		            if($discapacidad->getStrBuscar())
		                $strResultado .= $discapacidad->getStrFormulario();
		            else {
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
		                $strResultado .= $discapacidad->getStrListar();
		            }
            break;
			case( $_REQUEST["btnEliminar"] == "Eliminar" ):
	            $discapacidad->setStrCodigo($_REQUEST["strCodigo"]);
				$valor=$discapacidad->getStrCodigo();
			$v=$discapacidad->getStrBuscards($valor);	
	            if ($discapacidad->getStrBuscar())
	                if($discapacidad->getStrEliminar())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
	
	     			header("Location:".DISCAPACIDAD_URL."discapacidad.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $discapacidad->setStrCodigo($_REQUEST["strCodigo"]);
            if ($discapacidad->getStrBuscar())
                $strResultado .= $discapacidad->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $discapacidad->getStrListar().'<br>';
                }
            break;
			case( $_REQUEST["btnBuscar"] == "pafectadas" ):
            $pafectadas = new clPafectadas();
            $discapacidad->setStrTdiscapacidad($_REQUEST["strCodigoTdiscapacidad"]);
            $strResultado .= print($pafectadas->getStrListar($discapacidad->getStrTdiscapacidad(), $discapacidad->getStrPafectadas()));
            exit;
			//Cuando cambia el combo del Canton
        	case( $_REQUEST["btnBuscar"] == "tnivelavance" ):            
            $tnivelavance = new clTnivelavance();
            $discapacidad->setStrPafectadas($_REQUEST["strCodigoPafectadas"]);
            $strResultado = print($tnivelavance->getStrListar($discapacidad->getStrPafectadas(), $discapacidad->getStrTnivelavance()));
            exit;
      	
        default:
            $strResultado .= $discapacidad->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>