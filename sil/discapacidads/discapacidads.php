<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    	include_once( CLASS_PATH . "class.clinterfaz.php" );
    	include_once( CLASS_PATH . "class.cldiscapacidads.php" );
	  	
     	$interfaz = new clInterfaz();
    	$discapacidads = new clDiscapacidads();
		$strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
			$discapacidads->setStrCodigo($_REQUEST["strCodigo"]);
			$discapacidads->setStrLectura("");
			$discapacidads->setStrEtiqueta("INGRESAR TIPO DISCAPACIDAD");
		    $discapacidads->setStrNombreBoton("btnGuardar");
	        $discapacidads->setStrValorBoton("Guardar");
			 $discapacidads->setStrNombreBotons("btnSiguiente");
	        $discapacidads->setStrValorBotons("Siguiente");
			$discapacidads->setStrNombreBotona("btnAnterior");
	        $discapacidads->setStrValorBotona("Anterior");
			$discapacidads->setStrFechaIngreso(date("Y-m-d"));
	        $strResultado .= $discapacidads->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			$strResultado .= $discapacidads->getStrListar();
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ):            
            $discapacidads->setStrCodigo($_POST["strCodigo"]);
            $discapacidads->setStrTdiscapacidad($_POST["lsTdiscapacidad"]);
			$discapacidads->setStrPafectadas($_POST["lsPafectadas"]);
			$discapacidads->setStrTnivelavance($_POST["lsTnivelavance"]);
			$discapacidads->setStrObservaciones($_POST["strObservaciones"]);
			$discapacidads->setStrPdiscapacidad($_POST["lsPdiscapacidad"]);
			$discapacidads->setStrNdiscapacidad($_POST["lsNdiscapacidad"]);
			$discapacidads->setStrParentezco($_POST["lsParentezco"]);
			$discapacidads->setStrTdiscapacidadp($_POST["lsTdiscapacidadp"]);
			
			$discapacidads->setStrOdiscapacidad($_POST["lsOdiscapacidad"]);
			$discapacidads->setStrDiagnostico($_POST["strDiagnostico"]);
			$discapacidads->setStrObservacionorigen($_POST["strObservacionorigen"]);
			$discapacidads->setStrTporcentaje($_POST["lsTporcentaje"]);
			$discapacidads->setStrFechaIngreso($_POST["dtFechaIngreso"]);
			$discapacidads->setStrTayuda($_POST["lsTayuda"]);
			$discapacidads->setStrTayudaeconomica($_POST["lsTayudaeconomica"]);
			$discapacidads->setStrEstadod($_POST["lsEstadod"]);
			$discapacidads->setStrAtecnicas($_POST["lsAtecnicas"]);
			$discapacidads->setStrCrehabilitacion($_POST["lsCrehabilitacion"]);
			$discapacidads->setStrTipocentro($_POST["lsTipocentro"]);
			$discapacidads->setStrTratamiento($_POST["lsTratamiento"]);
			$discapacidads->setStrTratamientod($_POST["lsTratamientod"]);
			$discapacidads->setStrThorario($_POST["lsThorario"]);
			$discapacidads->setStrObservacionc($_POST["strObservacionc"]);
			
            if($discapacidads->getStrIngresar())
		   {
               $valor=$discapacidads->getStrCodigo();
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".DISCAPACIDADS_URL."discapacidads.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            $strResultado .= $discapacidads->getStrListar().'<br>';
            break;
			case( $_REQUEST["btnSiguiente"] == "Siguiente" ):            
            $discapacidads->setStrCodigo($_POST["strCodigo"]);
            
               $valor=$discapacidads->getStrCodigo();
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".PERSONADS_URL."personads.php?btnNuevo=Nuevo&strCodigo=".$valor."");
             break;
             case( $_REQUEST["btnAnterior"] == "Anterior" ):            
            	$discapacidads->setStrCodigo($_POST["strCodigo"]);
        	   	$valor=$discapacidads->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".AYUDASTS_URL."ayudasts.php?btnNuevo=Nuevo&strCodigo=".$valor."");
           
            break;
			 case( $_REQUEST["btnEditar"] == "Actualizar" ):
			$discapacidads->setStrCodigo($_POST["strCodigo"]);
            $discapacidads->setStrTdiscapacidad($_POST["lsTdiscapacidad"]);
			$discapacidads->setStrPafectadas($_POST["lsPafectadas"]);
			$discapacidads->setStrTnivelavance($_POST["lsTnivelavance"]);
			$discapacidads->setStrObservaciones($_POST["strObservaciones"]);
			$discapacidads->setStrPdiscapacidad($_POST["lsPdiscapacidad"]);
			$discapacidads->setStrNdiscapacidad($_POST["lsNdiscapacidad"]);
			$discapacidads->setStrParentezco($_POST["lsParentezco"]);
			$discapacidads->setStrTdiscapacidadp($_POST["lsTdiscapacidadp"]);
			$discapacidads->setStrOdiscapacidad($_POST["lsOdiscapacidad"]);
			$discapacidads->setStrDiagnostico($_POST["strDiagnostico"]);
			$discapacidads->setStrObservacionorigen($_POST["strObservacionorigen"]);
			$discapacidads->setStrTporcentaje($_POST["lsTporcentaje"]);
			$discapacidads->setStrFechaIngreso($_POST["dtFechaIngreso"]);
			$discapacidads->setStrTayuda($_POST["lsTayuda"]);
			$discapacidads->setStrTayudaeconomica($_POST["lsTayudaeconomica"]);
			$discapacidads->setStrEstadod($_POST["lsEstadod"]);
			$discapacidads->setStrAtecnicas($_POST["lsAtecnicas"]);
			$discapacidads->setStrCrehabilitacion($_POST["lsCrehabilitacion"]);
			$discapacidads->setStrTipocentro($_POST["lsTipocentro"]);
			$discapacidads->setStrTratamiento($_POST["lsTratamiento"]);
			$discapacidads->setStrTratamientod($_POST["lsTratamientod"]);
			$discapacidads->setStrThorario($_POST["lsThorario"]);
			$discapacidads->setStrObservacionc($_POST["strObservacionc"]);
			$valor=$discapacidads->getStrCodigo();
			$v=$discapacidads->getStrBuscards($valor);		
		            if($discapacidads->getStrActualizar())
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
		            else
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';
		
		            header("Location:".DISCAPACIDADS_URL."discapacidads.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
		            $discapacidads->setStrCodigo($_REQUEST["strCodigo"]);
		            $discapacidads->setStrEtiqueta("ACTUALIZAR FORMA DISCAPACIDAD");
		            $discapacidads->setStrNombreBoton("btnEditar");
		            $discapacidads->setStrValorBoton("Actualizar");
		
		            if($discapacidads->getStrBuscar())
		                $strResultado .= $discapacidads->getStrFormulario();
		            else {
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
		                $strResultado .= $discapacidads->getStrListar();
		            }
            break;
			case( $_REQUEST["btnEliminar"] == "Eliminar" ):
	            $discapacidads->setStrCodigo($_REQUEST["strCodigo"]);
				$valor=$discapacidads->getStrCodigo();
				$v=$discapacidads->getStrBuscards($valor);	
	            if ($discapacidads->getStrBuscar())
	                if($discapacidads->getStrEliminar())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
	
	     			header("Location:".DISCAPACIDADS_URL."discapacidads.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $discapacidads->setStrCodigo($_REQUEST["strCodigo"]);
            if ($discapacidads->getStrBuscar())
                $strResultado .= $discapacidads->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $discapacidads->getStrListar().'<br>';
                }
            break;
			case( $_REQUEST["btnBuscar"] == "pafectadas" ):
            $pafectadas = new clPafectadas();
            $discapacidads->setStrTdiscapacidad($_REQUEST["strCodigoTdiscapacidad"]);
            $strResultado .= print($pafectadas->getStrListar($discapacidads->getStrTdiscapacidad(), $discapacidads->getStrPafectadas()));
            exit;
			//Cuando cambia el combo del Canton
        	case( $_REQUEST["btnBuscar"] == "tnivelavance" ):            
            $tnivelavance = new clTnivelavance();
            $discapacidads->setStrPafectadas($_REQUEST["strCodigoPafectadas"]);
            $strResultado = print($tnivelavance->getStrListar($discapacidads->getStrPafectadas(), $discapacidads->getStrTnivelavance()));
            exit;
      	
        default:
            $strResultado .= $discapacidads->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>