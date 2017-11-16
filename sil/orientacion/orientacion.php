<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    	include_once( CLASS_PATH . "class.clinterfaz.php" );
    	include_once( CLASS_PATH . "class.clorientacion.php" );
		include_once( CLASS_PATH . "class.clcformativa.php" );
		include_once( CLASS_PATH . "class.clsubtformacion.php" );
	  	$interfaz = new clInterfaz();
    	$orientacion = new clOrientacion();
		$strResultado = "";
		
    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
			$orientacion->setStrCodigo($_REQUEST["strCodigo"]);
			$orientacion->setStrLectura("");
			$orientacion->setStrEtiqueta("INGRESAR TIPO ORIENTACIÓN ");
		    $orientacion->setStrNombreBoton("btnGuardar");
	        $orientacion->setStrValorBoton("Guardar");
			$orientacion->setStrNombreBotons("btnSiguiente");
	        $orientacion->setStrValorBotons("Siguiente");
			$orientacion->setStrNombreBotona("btnAnterior");
	        $orientacion->setStrValorBotona("Anterior");
	        $strResultado .= $orientacion->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			$strResultado .= $orientacion->getStrListar();
            break;
        case( $_REQUEST["btnGuardar"] == "Guardar" ):  
			$orientacion->setStrCodigo($_POST["strCodigo"]);
			$orientacion->setstrEpersonales($_POST["lsEpersonales"]);          
            $orientacion->setStrObservacionesep($_POST["strObservacionesep"]);
			$orientacion->setstrEprofesionales($_POST["lsEprofesional"]);          
            $orientacion->setStrObservacionespro($_POST["strObservacionespro"]);
            $orientacion->setstrAespectativas($_POST["lsAespectativas"]);          
            $orientacion->setStrObservacionesae($_POST["strObservacionesae"]);
			$orientacion->setstrMotivacion($_POST["lsMotivacion"]);          
            $orientacion->setStrObservacionesmot($_POST["strObservacionesmot"]);
			$orientacion->setstrHabilidades($_POST["lsHabilidades"]);          
            $orientacion->setStrObservacioneshab($_POST["strObservacioneshab"]);
            $orientacion->setstrEmpleabilidad($_POST["lsEmpleabilidad"]);          
            $orientacion->setStrObservacionesemp($_POST["strObservacionesemp"]);
			$orientacion->setstrIndependencia($_POST["lsIndependencia"]);          
            $orientacion->setStrObservacionesind($_POST["strObservacionesind"]);
			$orientacion->setstrTransporte($_POST["lsTransporte"]);          
            $orientacion->setStrObservacionestra($_POST["strObservacionestra"]);
			$orientacion->setstrEntorno($_POST["lsEntorno"]);          
            $orientacion->setStrObservacionesent($_POST["strObservacionesent"]);
			$orientacion->setstrEspacial($_POST["lsEspacial"]);          
            $orientacion->setStrObservacionesesp($_POST["strObservacionesesp"]);
			
            if($orientacion->getStrIngresar())
		   {
              	$valor=$orientacion->getStrCodigo();
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".ORIENTACION_URL."orientacion.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            $strResultado .= $orientacion->getStrListar().'<br>';
            break;
			case( $_REQUEST["btnSiguiente"] == "Siguiente" ):  
				$orientacion->setStrCodigo($_POST["strCodigo"]);
			   	$valor=$orientacion->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".COMPETENCIAS_URL."competencias.php?btnNuevo=Nuevo&strCodigo=".$valor."");
 	       break;
		   case( $_REQUEST["btnAnterior"] == "Anterior" ):            
            	$orientacion->setStrCodigo($_POST["strCodigo"]);
        	   	$valor=$orientacion->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".FORMACIONII_URL."formacionii.php?btnNuevo=Nuevo&strCodigo=".$valor."");
           
            break;
			case( $_REQUEST["btnEditar"] == "Actualizar" ):
					$orientacion->setStrCodigo($_POST["strCodigo"]);
					$orientacion->setstrEpersonales($_POST["lsEpersonales"]);          
		            $orientacion->setStrObservacionesep($_POST["strObservacionesep"]);
					$orientacion->setstrEprofesionales($_POST["lsEprofesional"]);          
		            $orientacion->setStrObservacionespro($_POST["strObservacionespro"]);
		            $orientacion->setstrAespectativas($_POST["lsAespectativas"]);          
		            $orientacion->setStrObservacionesae($_POST["strObservacionesae"]);
					$orientacion->setstrMotivacion($_POST["lsMotivacion"]);          
		            $orientacion->setStrObservacionesmot($_POST["strObservacionesmot"]);
					$orientacion->setstrHabilidades($_POST["lsHabilidades"]);          
		            $orientacion->setStrObservacioneshab($_POST["strObservacioneshab"]);
		            $orientacion->setstrEmpleabilidad($_POST["lsEmpleabilidad"]);          
		            $orientacion->setStrObservacionesemp($_POST["strObservacionesemp"]);
					$orientacion->setstrIndependencia($_POST["lsIndependencia"]);          
		            $orientacion->setStrObservacionesind($_POST["strObservacionesind"]);
					$orientacion->setstrTransporte($_POST["lsTransporte"]);          
		            $orientacion->setStrObservacionestra($_POST["strObservacionestra"]);
					$orientacion->setstrEntorno($_POST["lsEntorno"]);          
		            $orientacion->setStrObservacionesent($_POST["strObservacionesent"]);
					$orientacion->setstrEspacial($_POST["lsEspacial"]);          
		            $orientacion->setStrObservacionesesp($_POST["strObservacionesesp"]);
					
					$valor=$orientacion->getStrCodigo();
			 		$v=$orientacion->getStrBuscaros($valor);
		            if($orientacion->getStrActualizar())
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
		            else
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';
		
		            header("Location:".ORIENTACION_URL."orientacion.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
		            $orientacion->setStrCodigo($_REQUEST["strCodigo"]);
		            $orientacion->setStrEtiqueta("ACTUALIZAR TIPO ORIENTACIÓN ");
		            $orientacion->setStrNombreBoton("btnEditar");
		            $orientacion->setStrValorBoton("Actualizar");
		
		            if($orientacion->getStrBuscar())
		                $strResultado .= $orientacion->getStrFormulario();
		            else {
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
		                $strResultado .= $orientacion->getStrListar();
		            }
            break;
			case( $_REQUEST["btnEliminar"] == "Eliminar" ):
	            $orientacion->setStrCodigo($_REQUEST["strCodigo"]);
	            
				$valor=$orientacion->getStrCodigo();
			 	$v=$orientacion->getStrBuscaros($valor);
	            if ($orientacion->getStrBuscar())
	                if($orientacion->getStrEliminar())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
	
	     			header("Location:".ORIENTACION_URL."orientacion.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $orientacion->setStrCodigo($_REQUEST["strCodigo"]);
            if ($orientacion->getStrBuscar())
                $strResultado .= $orientacion->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $orientacion->getStrListar().'<br>';
                }
            break;
			case( $_REQUEST["btnBuscar"] == "Subtformacion" ):
            $Subtformacion = new clSubtformacion();
            $orientacion->setStrTformacion($_REQUEST["strCodigoTformacion"]);
            $strResultado .= print($Subtformacion->getStrListar($orientacion->getStrTformacion(), $orientacion->getStrSubtformacion()));
            exit;
			 case( $_REQUEST["btnBuscar"] == "Subtformaciond" ):            
            $Subtformaciond = new clSubtformaciond();
            $orientacion->setStrSubtformacion($_REQUEST["strCodigoTformaciond"]);
            $strResultado = print($Subtformaciond->getStrListar($orientacion->getStrSubtformacion(), $orientacion->getStrSubtformaciond()));
            exit;
      
        default:
            $strResultado .= $orientacion->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>