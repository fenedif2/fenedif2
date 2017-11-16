<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
    if(!(isset($_SESSION["usuario"])))
    header( "Location:". INICIO_URL );
    include_once( CLASS_PATH . "class.clinterfaz.php" );
    include_once( CLASS_PATH . "class.cldfunciones.php" );
	  
    $interfaz = new clInterfaz();
    $dfunciones = new cldfunciones();
    
    $strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
			$dfunciones->setStrLectura("");
            $dfunciones->setStrCodigo($_REQUEST["strCodigo"]);
			$dfunciones->setStrEtiqueta("DESCRIPCIÓN DE FUNCIONES");
            $dfunciones->setStrNombreBoton("btnGuardar");
            $dfunciones->setStrValorBoton("Guardar");
			$dfunciones->setStrNombreBotona("btnAnterior");
	        $dfunciones->setStrValorBotona("Anterior");
            $strResultado .= $dfunciones->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			$strResultado .= $dfunciones->getStrListar();
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ):            
            $dfunciones->setstrDescripcionf($_POST["strDescripcionf"]);
			$dfunciones->setstrSueldo($_POST["lsSueldo"]);
			$dfunciones->setstrBeneficios($_POST["strBeneficios"]);
			$dfunciones->setstrAccesibilidad($_POST["lsAccesibilidad"]);
			$dfunciones->setstrAvisual($_POST["lsAvisual"]);
			$dfunciones->setstrObservacionav($_POST["strObservacionav"]);
			$dfunciones->setstrCauditiva($_POST["lsCauditiva"]);
			$dfunciones->setstrObservacionca($_POST["strObservacionca"]);
			$dfunciones->setstrCverbal($_POST["lsCverbal"]);
			$dfunciones->setstrObservacioncv($_POST["strObservacioncv"]);
			$dfunciones->setstrExpresiono($_POST["lsExpresiono"]);
			$dfunciones->setstrObservacioneo($_POST["strObservacioneo"]);
			$dfunciones->setstrAfinidadm($_POST["lsAfinidadm"]);
			$dfunciones->setstrObservacionam($_POST["strObservacionam"]);
			$dfunciones->setstrDesplasamiento($_POST["lsDesplasamiento"]);
			$dfunciones->setstrObservacionde($_POST["strObservacionde"]); 
			$dfunciones->setstrAccesot($_POST["lsAcccesot"]);
			$dfunciones->setstrObservacionat($_POST["strObservacionat"]);
			$dfunciones->setstrManejod($_POST["lsManejod"]);
			$dfunciones->setstrObservacionmd($_POST["strObservacionmd"]);
			$dfunciones->setstrCondicionesam($_POST["lsCondicionesam"]);
			$dfunciones->setstrObservacioncam($_POST["lsObservacioncam"]);
			$dfunciones->setstrTemperatura($_POST["lsTemperatura"]);
			$dfunciones->setstrRuido($_POST["lsRuido"]);
			$dfunciones->setstrHumedad($_POST["lsHumedad"]);
			$dfunciones->setstrAirea($_POST["lsAirea"]);
			$dfunciones->setstrVibraciones($_POST["lsVibraciones"]);
			$dfunciones->setstrIluminacion($_POST["lsIluminacion"]);
			$dfunciones->setstrObservaciones($_POST["strObservaciones"]);
			$dfunciones->setstrIndependencia($_POST["lsIndependencia"]);
			$dfunciones->setstrCadaptacion($_POST["lsCadaptacion"]);
			$dfunciones->setstrAprendizaje($_POST["lsAprendizaje"]);
			$dfunciones->setstrHabilidades($_POST["lsHabilidades"]);
			$dfunciones->setstrTolerancia($_POST["lsTolerancia"]);
			$dfunciones->setstrObservacionescomp($_POST["strObservacionescomp"]);
			$dfunciones->setstrCpesos($_POST["lsCpesos"]);
			$dfunciones->setstrPesos($_POST["lsPesos"]);
			$dfunciones->setstrRealizare($_POST["lsRealizare"]);
			$dfunciones->setstrManipulacion($_POST["lsManipulacion"]);
			$dfunciones->setstrMaquinaria($_POST["lsMaquinaria"]);
			$dfunciones->setstrMovilidad($_POST["lsMovilidad"]);
			
			$dfunciones->setstrPosicion($_POST["lsPosicion"]);
			$dfunciones->setstrTrabajo($_POST["lsTrabajo"]);
			$dfunciones->setstrAtension($_POST["lsAtension"]);
			$dfunciones->setstrExpresion($_POST["lsExpresion"]);
			$dfunciones->setstrTension($_POST["lsTension"]);
			$dfunciones->setstrTrabajocond($_POST["lsTrabajocond"]);
			$dfunciones->setstrSeguridad($_POST["lsSeguridad"]);
			$dfunciones->setstrObservaciontrab($_POST["strObservaciontrab"]);
			$dfunciones->setStrCodigo($_POST["strCodigo"]);
			
			
	       if($dfunciones->getStrIngresar())
		   {
		   		$valor=$dfunciones->getStrCodigo();
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            header("Location:".DFUNCIONES_URL."dfunciones.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            break;
			 case( $_REQUEST["btnAnterior"] == "Anterior" ):            
            	$dfunciones->setStrCodigo($_POST["strCodigo"]);
        	   	$valor=$dfunciones->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".THORARIOEMP_URL."thorarioemp.php?btnNuevo=Nuevo&strCodigo=".$valor."");
         	break; 
			 case( $_REQUEST["btnEditar"] == "Actualizar" ):
				 $dfunciones->setStrCodigo($_POST["strCodigo"]);
			 $dfunciones->setstrDescripcionf($_POST["strDescripcionf"]);
			$dfunciones->setstrSueldo($_POST["lsSueldo"]);
			$dfunciones->setstrBeneficios($_POST["strBeneficios"]);
			$dfunciones->setstrAccesibilidad($_POST["lsAccesibilidad"]);
			$dfunciones->setstrAvisual($_POST["lsAvisual"]);
			$dfunciones->setstrObservacionav($_POST["strObservacionav"]);
			$dfunciones->setstrCauditiva($_POST["lsCauditiva"]);
			$dfunciones->setstrObservacionca($_POST["strObservacionca"]);
			$dfunciones->setstrCverbal($_POST["lsCverbal"]);
			$dfunciones->setstrObservacioncv($_POST["strObservacioncv"]);
			$dfunciones->setstrExpresiono($_POST["lsExpresiono"]);
			$dfunciones->setstrObservacioneo($_POST["strObservacioneo"]);
			$dfunciones->setstrAfinidadm($_POST["lsAfinidadm"]);
			$dfunciones->setstrObservacionam($_POST["strObservacionam"]);
			$dfunciones->setstrDesplasamiento($_POST["lsDesplasamiento"]);
			$dfunciones->setstrObservacionde($_POST["strObservacionde"]); 
			$dfunciones->setstrAccesot($_POST["lsAcccesot"]);
			$dfunciones->setstrObservacionat($_POST["strObservacionat"]);
			$dfunciones->setstrManejod($_POST["lsManejod"]);
			$dfunciones->setstrObservacionmd($_POST["strObservacionmd"]);
			$dfunciones->setstrCondicionesam($_POST["lsCondicionesam"]);
			$dfunciones->setstrObservacioncam($_POST["lsObservacioncam"]);
			$dfunciones->setstrTemperatura($_POST["lsTemperatura"]);
			$dfunciones->setstrRuido($_POST["lsRuido"]);
			$dfunciones->setstrHumedad($_POST["lsHumedad"]);
			$dfunciones->setstrAirea($_POST["lsAirea"]);
			$dfunciones->setstrVibraciones($_POST["lsVibraciones"]);
			$dfunciones->setstrIluminacion($_POST["lsIluminacion"]);
			$dfunciones->setstrObservaciones($_POST["strObservaciones"]);
			$dfunciones->setstrIndependencia($_POST["lsIndependencia"]);
			$dfunciones->setstrCadaptacion($_POST["lsCadaptacion"]);
			$dfunciones->setstrAprendizaje($_POST["lsAprendizaje"]);
			$dfunciones->setstrHabilidades($_POST["lsHabilidades"]);
			$dfunciones->setstrTolerancia($_POST["lsTolerancia"]);
			$dfunciones->setstrObservacionescomp($_POST["strObservacionescomp"]);
			$dfunciones->setstrCpesos($_POST["lsCpesos"]);
			$dfunciones->setstrPesos($_POST["lsPesos"]);
			$dfunciones->setstrRealizare($_POST["lsRealizare"]);
			$dfunciones->setstrManipulacion($_POST["lsManipulacion"]);
			$dfunciones->setstrMaquinaria($_POST["lsMaquinaria"]);
			$dfunciones->setstrMovilidad($_POST["lsMovilidad"]);
			
			$dfunciones->setstrPosicion($_POST["lsPosicion"]);
			$dfunciones->setstrTrabajo($_POST["lsTrabajo"]);
			$dfunciones->setstrAtension($_POST["lsAtension"]);
			$dfunciones->setstrExpresion($_POST["lsExpresion"]);
			$dfunciones->setstrTension($_POST["lsTension"]);
			$dfunciones->setstrTrabajocond($_POST["lsTrabajocond"]);
			$dfunciones->setstrSeguridad($_POST["lsSeguridad"]);
			$dfunciones->setstrObservaciontrab($_POST["strObservaciontrab"]);
			
			$valor=$dfunciones->getStrCodigo();
			$v=$dfunciones->getStrBuscardfuncemp($valor);
			
            if($dfunciones->getStrActualizar())
                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';

            header("Location:".DFUNCIONES_URL."dfunciones.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
            $dfunciones->setStrCodigo($_REQUEST["strCodigo"]);
            $dfunciones->setStrEtiqueta("ACTUALIZAR DESCRIPCIÓN DE FUNCIONES");
            $dfunciones->setStrNombreBoton("btnEditar");
            $dfunciones->setStrValorBoton("Actualizar");

            if($dfunciones->getStrBuscar())
                $strResultado .= $dfunciones->getStrFormulario();
            else {
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
                $strResultado .= $dfunciones->getStrListar();
            }
            break;
            case( $_REQUEST["btnEliminar"] == "Eliminar" ):
	            $dfunciones->setStrCodigo($_REQUEST["strCodigo"]);
	            
	            $valor=$dfunciones->getStrCodigo();
				$v=$dfunciones->getStrBuscardfuncemp($valor);
	            if ($dfunciones->getStrBuscar())
	                if($dfunciones->getStrEliminar())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
	
	           header("Location:".DFUNCIONES_URL."dfunciones.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
			
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $dfunciones->setStrCodigo($_REQUEST["strCodigo"]);
            if ($dfunciones->getStrBuscar())
                $strResultado .= $dfunciones->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $dfunciones->getStrListar().'<br>';
                }
            break;
      //Cuando cambia el combo de la Provincia
        
       
  
        default:
            $strResultado .= $dfunciones->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>