<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    	include_once( CLASS_PATH . "class.clinterfaz.php" );
    	include_once( CLASS_PATH . "class.cldatosl.php" );
		include_once( CLASS_PATH . "class.clcformativa.php" );
		include_once( CLASS_PATH . "class.clsubaformativa.php" );
	  	$interfaz = new clInterfaz();
    	$datosl = new clDatosl();
		$strResultado = "";
		
    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
			$datosl->setStrCodigo($_REQUEST["strCodigo"]);
			$datosl->setStrLectura("");
			$datosl->setStrEtiqueta("INGRESAR DATOS LABORALES");
		    $datosl->setStrFechai(date("Y-m-d"));
			$datosl->setStrFechaf(date("Y-m-d"));
			$datosl->setStrNombreBoton("btnGuardar");
	        $datosl->setStrValorBoton("Guardar");
			$datosl->setStrNombreBotons("btnSiguiente");
	        $datosl->setStrValorBotons("Siguiente");
			$datosl->setStrNombreBotona("btnAnterior");
	        $datosl->setStrValorBotona("Anterior");
	        $strResultado .= $datosl->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			$strResultado .= $datosl->getStrListar();
			$strResultado .= '<br><br><br><br>';
			$strResultado .= $datosl->getStrListarc();
            break;
		 case( $_REQUEST["btnGuardar"] == "Guardar" ):            
            		$datosl->setStrAiees($_POST["lsAiees"]);
					$datosl->setStrAlaborados($_POST["lsAlaborados"]);
					$datosl->setStrMfamiliar($_POST["lsMfamiliar"]);
					$datosl->setStrNhombres($_POST["lsNhombres"]);
					$datosl->setStrNmujeres($_POST["lsNmujeres"]);
					$datosl->setStrCingresos($_POST["lsCingresos"]);
					$datosl->setStrPcargo($_POST["lsPcargo"]);
					$datosl->setStrCuantos($_POST["lsCuantos"]);
					$datosl->setStrEdades($_POST["StrEdades"]);
					$datosl->setStrTienei($_POST["lsTienei"]);
					$datosl->setStrTipoi($_POST["lsTipoi"]);
					$datosl->setStrMingreso($_POST["lsMingreso"]);
					$datosl->setStrObservaciones($_POST["StrObservaciones"]);
					$datosl->setStrAtecnicas($_POST["lsAtecnicas"]);
					$datosl->setStrEmpresa($_POST["StrEmpresa"]);
					$datosl->setStrJinmediato($_POST["StrJinmediato"]);
					$datosl->setStrCargo($_POST["StrCargo"]);
					$datosl->setStrTelefono($_POST["StrTelefono"]);
					$datosl->setStrAlaborando($_POST["lsAlaborando"]);
					$datosl->setStrInsertado($_POST["lsInsertado"]);
					$datosl->setStrFechai($_POST["dtFechai"]);
					$datosl->setStrFechaf($_POST["dtFechaf"]);
					$datosl->setStrMsalida($_POST["StrMsalida"]);
					$datosl->setStrFprincipales($_POST["StrFprincipales"]);
					$datosl->setStrObservacion($_POST["StrObservacion"]);
					$datosl->setStrNombrer($_POST["StrNombrer"]);
					$datosl->setStrTelefonor($_POST["StrTelefonor"]);
					$datosl->setStrRelacion($_POST["lsRelacion"]);
					$datosl->setStrCodigo($_POST["strCodigo"]);
            if($datosl->getStrIngresar())
		   {
		   		$valor=$datosl->getStrCodigo();
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".DATOSL_URL."datosl.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            $strResultado .= $datosl->getStrListar().'<br>';
            break;	
          case( $_REQUEST["btnSiguiente"] == "Siguiente" ):            
            		$datosl->setStrCodigo($_POST["strCodigo"]);
           		$valor=$datosl->getStrCodigo();
               //$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".FORMACIONA_URL."formaciona.php?btnNuevo=Nuevo&strCodigo=".$valor."");
               break;	
		case( $_REQUEST["btnAnterior"] == "Anterior" ):            
            	$datosl->setStrCodigo($_POST["strCodigo"]);
        	   	$valor=$datosl->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".INTERESLABORAL_URL."intereslaboral.php?btnNuevo=Nuevo&strCodigo=".$valor."");
           
        break;	      
        case( $_REQUEST["btnEditar"] == "Actualizar" ):
					$datosl->setStrAiees($_POST["lsAiees"]);
					$datosl->setStrAlaborados($_POST["lsAlaborados"]);
					$datosl->setStrMfamiliar($_POST["lsMfamiliar"]);
					$datosl->setStrNhombres($_POST["lsNhombres"]);
					$datosl->setStrNmujeres($_POST["lsNmujeres"]);
					$datosl->setStrCingresos($_POST["lsCingresos"]);
					$datosl->setStrPcargo($_POST["lsPcargo"]);
					$datosl->setStrCuantos($_POST["lsCuantos"]);
					$datosl->setStrEdades($_POST["StrEdades"]);
					$datosl->setStrTienei($_POST["lsTienei"]);
					$datosl->setStrTipoi($_POST["lsTipoi"]);
					$datosl->setStrMingreso($_POST["lsMingreso"]);
					$datosl->setStrObservaciones($_POST["StrObservaciones"]);
					$datosl->setStrAtecnicas($_POST["lsAtecnicas"]);
					$datosl->setStrEmpresa($_POST["StrEmpresa"]);
					$datosl->setStrJinmediato($_POST["StrJinmediato"]);
					$datosl->setStrCargo($_POST["StrCargo"]);
					$datosl->setStrTelefono($_POST["StrTelefono"]);
					$datosl->setStrAlaborando($_POST["lsAlaborando"]);
					$datosl->setStrInsertado($_POST["lsInsertado"]);
					$datosl->setStrFechai($_POST["dtFechai"]);
					$datosl->setStrFechaf($_POST["dtFechaf"]);
					$datosl->setStrMsalida($_POST["StrMsalida"]);
					$datosl->setStrFprincipales($_POST["StrFprincipales"]);
					$datosl->setStrObservacion($_POST["StrObservacion"]);
					$datosl->setStrNombrer($_POST["StrNombrer"]);
					$datosl->setStrTelefonor($_POST["StrTelefonor"]);
					$datosl->setStrRelacion($_POST["lsRelacion"]);
					$datosl->setStrCodigo($_POST["strCodigo"]);
					
					$valor=$datosl->getStrCodigo();
			 		$v=$datosl->getStrBuscardls($valor);
		            if($datosl->getStrActualizar())
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
		            else
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';
		
		           	 header("Location:".DATOSL_URL."datosl.php?btnNuevo=Nuevo&strCodigo=".$v."");	
            break;    
        	case( $_REQUEST["btnActualizar"] == "Actualizar" ):
            	$datosl->setStrCodigo($_REQUEST["strCodigo"]);
            	$datosl->setStrEtiqueta("ACTUALIZAR DATOS LABORALES");
            	$datosl->setStrNombreBoton("btnEditar");
            	$datosl->setStrValorBoton("Actualizar");
            	if($datosl->getStrBuscar())
                	$strResultado .= $datosl->getStrFormulario();
            		else 
            			{
                			$strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
                			$strResultado .= $datosl->getStrListar();
            			}
			break; 
			case( $_REQUEST["btnEliminar"] == "Eliminar" ):
	            $datosl->setStrCodigo($_REQUEST["strCodigo"]);
	            	$valor=$datosl->getStrCodigo();
			 		$v=$datosl->getStrBuscardl($valor);
            		
	            if ($datosl->getStrBuscar())
					{
					   if($datosl->getStrEliminar())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
	           		$strResultado .= '<meta http-equiv="Refresh" content="0;url=../datosl/datosl.php?btnNuevo=Nuevo&strCodigo='.$v.'">';	
					}
			    else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
					
	     			$strResultado .= '<meta http-equiv="Refresh" content="0;url=../datosl/datosl.php?btnNuevo=Nuevo&strCodigo='.$v.'">';
            break;
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $datosl->setStrCodigo($_REQUEST["strCodigo"]);
            if ($datosl->getStrBuscar())
                $strResultado .= $datosl->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $datosl->getStrListar().'<br>';
                }
            break;
			case( $_REQUEST["btnBuscar"] == "Subarea" ):
            $subaformativa = new clSubaformativa();
            $datosl->setStrAformativa($_REQUEST["strCodigoAformativa"]);
            $strResultado .= print($subaformativa->getStrListar($datosl->getStrAformativa(), $datosl->getStrSubaformativa()));
            exit;
      
        default:
            $strResultado .= $datosl->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>