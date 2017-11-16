<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    	include_once( CLASS_PATH . "class.clinterfaz.php" );
    	include_once( CLASS_PATH . "class.cldatosls.php" );
		include_once( CLASS_PATH . "class.clcformativa.php" );
		include_once( CLASS_PATH . "class.clsubaformativa.php" );
	  	$interfaz = new clInterfaz();
    	$datosls = new clDatosls();
		$strResultado = "";
		
    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
			$datosls->setStrCodigo($_REQUEST["strCodigo"]);
			$datosls->setStrLectura("");
			$datosls->setStrEtiqueta("Ingresar Datos Laborales");
		    $datosls->setStrFechai(date("Y-m-d"));
			$datosls->setStrFechaf(date("Y-m-d"));
			$datosls->setStrNombreBoton("btnGuardar");
	        $datosls->setStrValorBoton("Guardar");
			$datosls->setStrNombreBotons("btnSiguiente");
	        $datosls->setStrValorBotons("Siguiente");
			$datosls->setStrNombreBotona("btnAnterior");
	        $datosls->setStrValorBotona("Anterior");
	        $strResultado .= $datosls->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			$strResultado .= $datosls->getStrListar();
			$strResultado .= '<br><br><br><br>';
			$strResultado .= $datosls->getStrListarc();
            break;
		 case( $_REQUEST["btnGuardar"] == "Guardar" ):            
            		$datosls->setStrAiees($_POST["lsAiees"]);
					$datosls->setStrAlaborados($_POST["lsAlaborados"]);
					$datosls->setStrMfamiliar($_POST["lsMfamiliar"]);
					$datosls->setStrNhombres($_POST["lsNhombres"]);
					$datosls->setStrNmujeres($_POST["lsNmujeres"]);
					$datosls->setStrCingresos($_POST["lsCingresos"]);
					$datosls->setStrPcargo($_POST["lsPcargo"]);
					$datosls->setStrCuantos($_POST["lsCuantos"]);
					$datosls->setStrEdades($_POST["StrEdades"]);
					$datosls->setStrTienei($_POST["lsTienei"]);
					$datosls->setStrTipoi($_POST["lsTipoi"]);
					$datosls->setStrMingreso($_POST["lsMingreso"]);
					$datosls->setStrObservaciones($_POST["StrObservaciones"]);
					$datosls->setStrAtecnicas($_POST["lsAtecnicas"]);
					$datosls->setStrEmpresa($_POST["StrEmpresa"]);
					$datosls->setStrJinmediato($_POST["StrJinmediato"]);
					$datosls->setStrCargo($_POST["StrCargo"]);
					$datosls->setStrTelefono($_POST["StrTelefono"]);
					$datosls->setStrAlaborando($_POST["lsAlaborando"]);
					$datosls->setStrInsertado($_POST["lsInsertado"]);
					$datosls->setStrFechai($_POST["dtFechai"]);
					$datosls->setStrFechaf($_POST["dtFechaf"]);
					$datosls->setStrMsalida($_POST["StrMsalida"]);
					$datosls->setStrFprincipales($_POST["StrFprincipales"]);
					$datosls->setStrObservacion($_POST["StrObservacion"]);
					$datosls->setStrNombrer($_POST["StrNombrer"]);
					$datosls->setStrTelefonor($_POST["StrTelefonor"]);
					$datosls->setStrRelacion($_POST["lsRelacion"]);
					$datosls->setStrCodigo($_POST["strCodigo"]);
            if($datosls->getStrIngresar())
		   {
		   		$valor=$datosls->getStrCodigo();
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".DATOSLS_URL."datosls.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            $strResultado .= $datosls->getStrListar().'<br>';
            break;	
			case( $_REQUEST["btnSiguiente"] == "Siguiente" ):            
            		$datosls->setStrCodigo($_POST["strCodigo"]);
               		$valor=$datosls->getStrCodigo();
               		$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            		header("Location:".FORMACIONA_URL."formaciona.php?btnNuevo=Nuevo&strCodigo=".$valor."");
           break;	
		   case( $_REQUEST["btnAnterior"] == "Anterior" ):            
            	$datosls->setStrCodigo($_POST["strCodigo"]);
        	   	$valor=$datosls->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".INTERESLABORALS_URL."intereslaborals.php?btnNuevo=Nuevo&strCodigo=".$valor."");
           
            break;
        case( $_REQUEST["btnEditar"] == "Actualizar" ):
					$datosls->setStrAiees($_POST["lsAiees"]);
					$datosls->setStrAlaborados($_POST["lsAlaborados"]);
					$datosls->setStrMfamiliar($_POST["lsMfamiliar"]);
					$datosls->setStrNhombres($_POST["lsNhombres"]);
					$datosls->setStrNmujeres($_POST["lsNmujeres"]);
					$datosls->setStrCingresos($_POST["lsCingresos"]);
					$datosls->setStrPcargo($_POST["lsPcargo"]);
					$datosls->setStrCuantos($_POST["lsCuantos"]);
					$datosls->setStrEdades($_POST["StrEdades"]);
					$datosls->setStrTienei($_POST["lsTienei"]);
					$datosls->setStrTipoi($_POST["lsTipoi"]);
					$datosls->setStrMingreso($_POST["lsMingreso"]);
					$datosls->setStrObservaciones($_POST["StrObservaciones"]);
					$datosls->setStrAtecnicas($_POST["lsAtecnicas"]);
					$datosls->setStrEmpresa($_POST["StrEmpresa"]);
					$datosls->setStrJinmediato($_POST["StrJinmediato"]);
					$datosls->setStrCargo($_POST["StrCargo"]);
					$datosls->setStrTelefono($_POST["StrTelefono"]);
					$datosls->setStrAlaborando($_POST["lsAlaborando"]);
					$datosls->setStrInsertado($_POST["lsInsertado"]);
					$datosls->setStrFechai($_POST["dtFechai"]);
					$datosls->setStrFechaf($_POST["dtFechaf"]);
					$datosls->setStrMsalida($_POST["StrMsalida"]);
					$datosls->setStrFprincipales($_POST["StrFprincipales"]);
					$datosls->setStrObservacion($_POST["StrObservacion"]);
					$datosls->setStrNombrer($_POST["StrNombrer"]);
					$datosls->setStrTelefonor($_POST["StrTelefonor"]);
					$datosls->setStrRelacion($_POST["lsRelacion"]);
					$datosls->setStrCodigo($_POST["strCodigo"]);
					
					$valor=$datosls->getStrCodigo();
			 		$v=$datosls->getStrBuscardls($valor);
		            if($datosls->getStrActualizar())
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
		            else
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';
		
		            header("Location:".DATOSLS_URL."datosls.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;    
        	case( $_REQUEST["btnActualizar"] == "Actualizar" ):
            	$datosls->setStrCodigo($_REQUEST["strCodigo"]);
            	$datosls->setStrEtiqueta("Actualizar&nbsp;Datos Laborales");
            	$datosls->setStrNombreBoton("btnEditar");
            	$datosls->setStrValorBoton("Actualizar");
            	if($datosls->getStrBuscar())
                	$strResultado .= $datosls->getStrFormulario();
            		else 
            			{
                			$strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
                			$strResultado .= $datosls->getStrListar();
            			}
			break; 
			case( $_REQUEST["btnEliminar"] == "Eliminar" ):
	            $datosls->setStrCodigo($_REQUEST["strCodigo"]);
	            $valor=$datosls->getStrCodigo();
			 	$v=$datosls->getStrBuscardls($valor);
	            if ($datosls->getStrBuscar())
	                if($datosls->getStrEliminar())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
	
	     			header("Location:".DATOSLS_URL."datosls.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $datosls->setStrCodigo($_REQUEST["strCodigo"]);
            if ($datosls->getStrBuscar())
                $strResultado .= $datosls->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $datosls->getStrListar().'<br>';
                }
            break;
			case( $_REQUEST["btnBuscar"] == "Subarea" ):
            $subaformativa = new clSubaformativa();
            $datosls->setStrAformativa($_REQUEST["strCodigoAformativa"]);
            $strResultado .= print($subaformativa->getStrListar($datosls->getStrAformativa(), $datosls->getStrSubaformativa()));
            exit;
      
        default:
            $strResultado .= $datosls->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>