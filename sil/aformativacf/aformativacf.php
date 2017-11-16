<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    	include_once( CLASS_PATH . "class.clinterfaz.php" );
    	include_once( CLASS_PATH . "class.claformativacf.php" );
		include_once( CLASS_PATH . "class.clcformativa.php" );
		include_once( CLASS_PATH . "class.clsubaformativa.php" );
	  	$interfaz = new clInterfaz();
    	$aformativacf = new clAformativacf();
		$strResultado = "";
		
    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
			$aformativacf->setStrCodigo($_REQUEST["strCodigo"]);
			$aformativacf->setStrLectura("");
			$aformativacf->setStrEtiqueta("INGRESAR ÁREA FORMATIVA");
		    $aformativacf->setStrNombreBoton("btnGuardar");
	        $aformativacf->setStrValorBoton("Guardar");
			$aformativacf->setStrNombreBotons("btnSiguiente");
	        $aformativacf->setStrValorBotons("Siguiente");
			$aformativacf->setStrNombreBotona("btnAnterior");
	        $aformativacf->setStrValorBotona("Anterior");
	        $strResultado .= $aformativacf->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			$strResultado .= $aformativacf->getStrListar();
            break;
        case( $_REQUEST["btnEditar"] == "Actualizar" ):
					$aformativacf->setStrCodigo($_POST["strCodigo"]);
					$aformativacf->setStrSubaformativa($_POST["lsSubaformativa"]);
					
					$valor=$aformativacf->getStrCodigo();
			 		$v=$aformativacf->getStrBuscarafcf($valor);
					if($aformativacf->getStrActualizar())
		            {
					  $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
					}
		            else
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';
		
		            header("Location:".AFORMATIVACF_URL."aformativacf.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;    
        case( $_REQUEST["btnActualizar"] == "Actualizar" ):
		            $aformativacf->setStrCodigo($_REQUEST["strCodigo"]);
		            $aformativacf->setStrEtiqueta("ACTUALIZAR ÁREA FORMATIVA");
		            $aformativacf->setStrNombreBoton("btnEditar");
		            $aformativacf->setStrValorBoton("Actualizar");
		
		            if($aformativacf->getStrBuscar())
		                $strResultado .= $aformativacf->getStrFormulario();
		            else {
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
		                $strResultado .= $aformativacf->getStrListar();
		            }
            break;    
        case( $_REQUEST["btnGuardar"] == "Guardar" ):            
            $aformativacf->setStrSubaformativa($_POST["lsSubaformativa"]);
			$aformativacf->setStrCodigo($_POST["strCodigo"]);
            if($aformativacf->getStrIngresar())
		   {
               	$valor=$aformativacf->getStrCodigo();
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".AFORMATIVACF_URL."aformativacf.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            $strResultado .= $aformativacf->getStrListar().'<br>';
            break;
			case( $_REQUEST["btnAnterior"] == "Anterior" ):            
            	$aformativacf->setStrCodigo($_POST["strCodigo"]);
        	   	$valor=$aformativacf->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".PERFILCF_URL."perfilcf.php?btnNuevo=Nuevo&strCodigo=".$valor."");
           
         	break; 
			case( $_REQUEST["btnSiguiente"] == "Siguiente" ):            
           		$aformativacf->setStrCodigo($_POST["strCodigo"]);
               	$valor=$aformativacf->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".TFORMACIONCF_URL."tformacioncf.php?btnNuevo=Nuevo&strCodigo=".$valor."");
           break;
			case( $_REQUEST["btnEliminar"] == "Eliminar" ):
	            $aformativacf->setStrCodigo($_REQUEST["strCodigo"]);
				
				$valor=$aformativacf->getStrCodigo();
			 		$v=$aformativacf->getStrBuscarafcf($valor);
	            if ($aformativacf->getStrBuscar())
	                if($aformativacf->getStrEliminar())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
	
	     			header("Location:".AFORMATIVACF_URL."aformativacf.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $aformativacf->setStrCodigo($_REQUEST["strCodigo"]);
            if ($aformativacf->getStrBuscar())
                $strResultado .= $aformativacf->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $aformativacf->getStrListar().'<br>';
                }
            break;
			case( $_REQUEST["btnBuscar"] == "Subarea" ):
            $subaformativa = new clSubaformativa();
            $aformativacf->setStrAformativa($_REQUEST["strCodigoAformativa"]);
            $strResultado .= print($subaformativa->getStrListar($aformativacf->getStrAformativa(), $aformativacf->getStrSubaformativa()));
            exit;
      
        default:
            $strResultado .= $aformativacf->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>