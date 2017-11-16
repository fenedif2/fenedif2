<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    	include_once( CLASS_PATH . "class.clinterfaz.php" );
    	include_once( CLASS_PATH . "class.cltformacioncf.php" );
		include_once( CLASS_PATH . "class.clcformativa.php" );
		include_once( CLASS_PATH . "class.clsubtformacion.php" );
	  	$interfaz = new clInterfaz();
    	$tformacioncf = new clTformacioncf();
		$strResultado = "";
		
    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
			$tformacioncf->setStrCodigo($_REQUEST["strCodigo"]);
			$tformacioncf->setStrLectura("");
			$tformacioncf->setStrEtiqueta("INGRESAR TIPO FORMACIÓN");
		    $tformacioncf->setStrNombreBoton("btnGuardar");
	        $tformacioncf->setStrValorBoton("Guardar");
			$tformacioncf->setStrNombreBotons("btnSiguiente");
	        $tformacioncf->setStrValorBotons("Siguiente");
			$tformacioncf->setStrNombreBotona("btnAnterior");
	        $tformacioncf->setStrValorBotona("Anterior");
	        $strResultado .= $tformacioncf->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			$strResultado .= $tformacioncf->getStrListar();
            break;
        case( $_REQUEST["btnGuardar"] == "Guardar" ):  
			$tformacioncf->setStrTformacion($_POST["lsTformacion"]);          
            $tformacioncf->setStrSubtformacion($_POST["lsSubtformacion"]);
			$tformacioncf->setStrSubtformaciond($_POST["lsSubtformaciond"]);
			$tformacioncf->setStrCodigo($_POST["strCodigo"]);
            if($tformacioncf->getStrIngresar())
		   {
               	$valor=$tformacioncf->getStrCodigo();
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".TFORMACIONCF_URL."tformacioncf.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            $strResultado .= $tformacioncf->getStrListar().'<br>';
            break;
			case( $_REQUEST["btnAnterior"] == "Anterior" ):            
            	$tformacioncf->setStrCodigo($_POST["strCodigo"]);
        	   	$valor=$tformacioncf->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".AFORMATIVACF_URL."aformativacf.php?btnNuevo=Nuevo&strCodigo=".$valor."");
           
         	break; 
			case( $_REQUEST["btnSiguiente"] == "Siguiente" ):  
				$tformacioncf->setStrCodigo($_POST["strCodigo"]);
                $valor=$tformacioncf->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".TCURSOCF_URL."tcursocf.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            break;
			case( $_REQUEST["btnEditar"] == "Actualizar" ):
					$tformacioncf->setStrTformacion($_POST["lsTformacion"]);          
            		$tformacioncf->setStrSubtformacion($_POST["lsSubtformacion"]);
					$tformacioncf->setStrSubtformaciond($_POST["lsSubtformaciond"]);
					$tformacioncf->setStrCodigo($_POST["strCodigo"]);
					
					$valor=$tformacioncf->getStrCodigo();
			 		$v=$tformacioncf->getStrBuscartfcf($valor);
		            if($tformacioncf->getStrActualizar())
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
		            else
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';
		
		            header("Location:".TFORMACIONCF_URL."tformacioncf.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
		            $tformacioncf->setStrCodigo($_REQUEST["strCodigo"]);
		            $tformacioncf->setStrEtiqueta("ACTUALIZAR TIPO FORMACIÓN");
		            $tformacioncf->setStrNombreBoton("btnEditar");
		            $tformacioncf->setStrValorBoton("Actualizar");
		
		            if($tformacioncf->getStrBuscar())
		                $strResultado .= $tformacioncf->getStrFormulario();
		            else {
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
		                $strResultado .= $tformacioncf->getStrListar();
		            }
            break;
			case( $_REQUEST["btnEliminar"] == "Eliminar" ):
	            $tformacioncf->setStrCodigo($_REQUEST["strCodigo"]);
				
				$valor=$tformacioncf->getStrCodigo();
			 	$v=$tformacioncf->getStrBuscartfcf($valor);
	            if ($tformacioncf->getStrBuscar())
	                if($tformacioncf->getStrEliminar())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
	
	     			header("Location:".TFORMACIONCF_URL."tformacioncf.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $tformacioncf->setStrCodigo($_REQUEST["strCodigo"]);
            if ($tformacioncf->getStrBuscar())
                $strResultado .= $tformacioncf->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $tformacioncf->getStrListar().'<br>';
                }
            break;
			case( $_REQUEST["btnBuscar"] == "Subtformacion" ):
            $Subtformacion = new clSubtformacion();
            $tformacioncf->setStrTformacion($_REQUEST["strCodigoTformacion"]);
            $strResultado .= print($Subtformacion->getStrListar($tformacioncf->getStrTformacion(), $tformacioncf->getStrSubtformacion()));
            exit;
			 case( $_REQUEST["btnBuscar"] == "Subtformaciond" ):            
            $Subtformaciond = new clSubtformaciond();
            $tformacioncf->setStrSubtformacion($_REQUEST["strCodigoTformaciond"]);
            $strResultado = print($Subtformaciond->getStrListar($tformacioncf->getStrSubtformacion(), $tformacioncf->getStrSubtformaciond()));
            exit;
      
        default:
            $strResultado .= $tformacioncf->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>