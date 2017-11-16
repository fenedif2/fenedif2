<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    include_once( CLASS_PATH . "class.clinterfaz.php" );
    include_once( CLASS_PATH . "class.claterapeutica.php" );

    $interfaz = new clInterfaz();
    $aterapeutica = new claterapeutica();
    
    $strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
            $aterapeutica->setStrLectura("");
            //$aterapeutica->setStrSucursal($_SESSION["usuario"]["suc"]);
            $aterapeutica->setStrEtiqueta("DISEÑO DEL PLAN DE ATENCIÓN TERAPÉUTICA");
            $aterapeutica->setStrNombreBoton("btnGuardar");
            $aterapeutica->setStrValorBoton("Guardar");
            $strResultado .= $aterapeutica->getStrFormulario();
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ): 
        	//$aterapeutica->setStrCodigo($_POST["strCodigo"]);   
        	$aterapeutica->setStrTusuario($_POST["lsTusuario"]);       
            $aterapeutica->setstrOterapeuticoa($_POST["strOterapeuticoa"]);
            $aterapeutica->setstrPlana($_POST["strPlana"]);
			$aterapeutica->setstrOterapeuticob($_POST["strOterapeuticob"]);
            $aterapeutica->setstrPlanb($_POST["strPlanb"]);
            $aterapeutica->setstrOterapeuticoc($_POST["strOterapeuticoc"]);
            $aterapeutica->setstrPlanc($_POST["strPlanc"]);
			$aterapeutica->setstrOterapeuticod($_POST["strOterapeuticod"]);
            $aterapeutica->setstrPland($_POST["strPland"]);
			$aterapeutica->setstrOterapeuticoe($_POST["strOterapeuticoe"]);
            $aterapeutica->setstrPlane($_POST["strPlane"]);
            $aterapeutica->setstrOterapeuticof($_POST["strOterapeuticof"]);
            $aterapeutica->setstrPlanf($_POST["strPlanf"]);
          if($aterapeutica->getStrIngresar())
		   {
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            //$strResultado .= $aterapeutica->getStrListar().'<br>';
            break;
			 case( $_REQUEST["btnEditar"] == "Actualizar" ):
			$aterapeutica->setStrCodigo($_POST["strCodigo"]);  
			$aterapeutica->setStrTusuario($_POST["lsTusuario"]); 		         
            $aterapeutica->setstrOterapeuticoa($_POST["strOterapeuticoa"]);
            $aterapeutica->setstrPlana($_POST["strPlana"]);
			$aterapeutica->setstrOterapeuticob($_POST["strOterapeuticob"]);
            $aterapeutica->setstrPlanb($_POST["strPlanb"]);
            $aterapeutica->setstrOterapeuticoc($_POST["strOterapeuticoc"]);
            $aterapeutica->setstrPlanc($_POST["strPlanc"]);
			$aterapeutica->setstrOterapeuticod($_POST["strOterapeuticod"]);
            $aterapeutica->setstrPland($_POST["strPland"]);
			$aterapeutica->setstrOterapeuticoe($_POST["strOterapeuticoe"]);
            $aterapeutica->setstrPlane($_POST["strPlane"]);
            $aterapeutica->setstrOterapeuticof($_POST["strOterapeuticof"]);
            $aterapeutica->setstrPlanf($_POST["strPlanf"]);
			
            if($aterapeutica->getStrActualizar())
                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';

            $strResultado .= $aterapeutica->getStrListar().'<br>';
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
            $aterapeutica->setStrCodigo($_REQUEST["strCodigo"]);
            $aterapeutica->setStrEtiqueta("ACTUALIZAR ATENCIÓN TERAPÉUTICA");
            $aterapeutica->setStrNombreBoton("btnEditar");
            $aterapeutica->setStrValorBoton("Actualizar");

            if($aterapeutica->getStrBuscar())
                $strResultado .= $aterapeutica->getStrFormulario();
            else {
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
                $strResultado .= $aterapeutica->getStrListar();
            }
            break;
            case( $_REQUEST["btnEliminar"] == "Eliminar" ):
            $aterapeutica->setStrCodigo($_REQUEST["strCodigo"]);
            if ($aterapeutica->getStrBuscar())
                if($aterapeutica->getStrEliminar())
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
                else
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';

            $strResultado .= $aterapeutica->getStrListar().'<br>';
            break;
			
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $aterapeutica->setStrCodigo($_REQUEST["strCodigo"]);
            if ($aterapeutica->getStrBuscar())
                $strResultado .= $aterapeutica->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $aterapeutica->getStrListar().'<br>';
                }
            break;
     //Cuando cambia el combo de la Provincia
       case( $_REQUEST["btnBuscar"] == "Parroquia" ):            
            $parroquia = new clParroquia();
            $aterapeutica->setStrCanton($_REQUEST["strCodigoCanton"]);
            $strResultado = print($parroquia->getStrListar($aterapeutica->getStrCanton(), $aterapeutica->getStrParroquia()));
            exit;
  
        default:
            $strResultado .= $aterapeutica->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>