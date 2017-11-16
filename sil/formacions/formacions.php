<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    	include_once( CLASS_PATH . "class.clinterfaz.php" );
    	include_once( CLASS_PATH . "class.clformacions.php" );
		$interfaz = new clInterfaz();
    	$formacions = new clformacions();
		$strResultado = "";
		
    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
			$formacions->setStrCodigo($_REQUEST["strCodigo"]);
			$formacions->setStrLectura("");
			$formacions->setStrEtiqueta("EDUCACIÓN");
		    $formacions->setStrNombreBoton("btnGuardar");
	        $formacions->setStrValorBoton("Guardar");
			$formacions->setStrNombreBotons("btnSiguiente");
	        $formacions->setStrValorBotons("Siguiente");
			$formacions->setStrNombreBotona("btnAnterior");
	        $formacions->setStrValorBotona("Anterior");
	        $strResultado .= $formacions->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			$strResultado .= $formacions->getStrListar();
			$strResultado .= $formacions->getStrListarcinformaticos();
            break;
        case( $_REQUEST["btnGuardar"] == "Guardar" ):            
            $formacions->setStrTformacion($_POST["lsTformacion"]);          
            $formacions->setStrSubtformacion($_POST["lsSubtformacion"]);
			$formacions->setStrSubtformaciond($_POST["lsSubtformaciond"]);
			$formacions->setStrCodigo($_POST["strCodigo"]); 
			
			$formacions->setStrNombre($_POST["strNombre"]);
			$formacions->setStrTfnecesaria($_POST["lsTfnecesaria"]);
			$formacions->setStrTnivel($_POST["lsTnivel"]);
			$formacions->setStrTniveledu($_POST["lsTniveledu"]);
			$formacions->setstrCinformatico($_POST["lsCinformatico"]);
			$formacions->setstrCinformaticos($_POST["strcinformaticos"]);
			$formacions->setstrCminimos($_POST["lsCminimos"]);
			$formacions->setstrOtross($_POST["strOtross"]);
			$formacions->setstrPcontables($_POST["lspcontable"]);
			$formacions->setstrDinformaticos($_POST["lsdinformatico"]);
			$formacions->setstrDgraficos($_POST["lsdgrafico"]);
			$formacions->setstrVdigitacion($_POST["lsdigitacion"]);
			
			
            if($formacions->getStrIngresar())
		   {
		   		//$formaciona->getStrIngresarcinformaticos();
               $valor=$formacions->getStrCodigo();
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".FORMACIONS_URL."formacions.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            $strResultado .= $formacions->getStrListar().'<br>';
            break;
            
			case( $_REQUEST["btnSiguiente"] == "Siguiente" ):            
            	$formacions->setStrCodigo($_POST["strCodigo"]); 
				//$formaciona->getStrIngresarcinformaticos();
               	$valor=$formacions->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".FORMACIONII_URL."formacionii.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            break;
            case( $_REQUEST["btnAnterior"] == "Anterior" ):            
            	$formacions->setStrCodigo($_POST["strCodigo"]);
        	   	$valor=$formacions->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".PERSONAD_URL."personad.php?btnNuevo=Nuevo&strCodigo=".$valor."");
           
            break;
			case( $_REQUEST["btnEditar"] == "Actualizar" ):
			$formacions->setStrCodigo($_POST["strCodigo"]);
			$formacions->setStrTformacion($_POST["lsTformacion"]);          
            $formacions->setStrSubtformacion($_POST["lsSubtformacion"]);
			$formacions->setStrSubtformaciond($_POST["lsSubtformaciond"]);
			$formacions->setStrCodigo($_POST["strCodigo"]); 
			$formacions->setStrNombre($_POST["strNombre"]);
			$formacions->setStrTfnecesaria($_POST["lsTfnecesaria"]);
			$formacions->setStrTnivel($_POST["lsTnivel"]);
			$formacions->setStrTniveledu($_POST["lsTniveledu"]);
			$formacions->setstrCinformatico($_POST["lsCinformatico"]);
			$formacions->setstrCinformaticos($_POST["strcinformaticos"]);
			$formacions->setstrCminimos($_POST["lsCminimos"]);
			$formacions->setstrOtross($_POST["strOtross"]);
			$formacions->setstrPcontables($_POST["lspcontable"]);
			$formacions->setstrDinformaticos($_POST["lsdinformatico"]);
			$formacions->setstrDgraficos($_POST["lsdgrafico"]);
			$formacions->setstrVdigitacion($_POST["lsdigitacion"]);
		            if($formacions->getStrActualizar())
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
		            else
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';
		
		            $strResultado .= '<meta http-equiv="Refresh" content="0;url=../formacions/formacions.php">';
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
		            $formacions->setStrCodigo($_REQUEST["strCodigo"]);
		            $formacions->setStrEtiqueta("ACTUALIZAR ÁREA FORMATIVA ");
		            $formacions->setStrNombreBoton("btnEditar");
		            $formacions->setStrValorBoton("Actualizar");
		
		            if($formacions->getStrBuscar())
		                $strResultado .= $formacions->getStrFormulario();
		            else {
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
		                $strResultado .= $formacions->getStrListar();
		            }
            break;
			case( $_REQUEST["btnEliminar"] == "Eliminar" ):
	            $formacions->setStrCodigo($_REQUEST["strCodigo"]);
	            if ($formacions->getStrBuscar())
	                if($formacions->getStrEliminar())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
	
	     			$strResultado .= '<meta http-equiv="Refresh" content="0;url=../formacions/formacions.php">';
            break;
			case( $_REQUEST["btnEliminar"] == "Eliminarcinformaticos" ):
	            $formacions->setStrCodigo($_REQUEST["strCodigo"]);
	            if ($formacions->getStrBuscarcinformaticos())
	                if($formacions->getStrEliminarcinformaticos())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">OPERACIÓN CANCELADA: NO SE PUEDE ELIMINAR [ ÁREA FORMATIVA]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
	
	     			$strResultado .= '<meta http-equiv="Refresh" content="0;url=../formacions/formacions.php">';
            break;
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $formacions->setStrCodigo($_REQUEST["strCodigo"]);
            if ($formacions->getStrBuscar())
                $strResultado .= $formacions->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $formacions->getStrListar().'<br>';
                }
            break;
			
			 //Cuando cambia el Nivel
        case( $_REQUEST["btnBuscar"] == "nivel" ):
            $nivel = new clTnivel();
            $formacions->setStrTfnecesaria($_REQUEST["strCodigotfnecesaria"]);
            $strResultado .= print($nivel->getStrListar($formacions->getStrTfnecesaria(), $formacions->getStrTnivel()));
            exit;

        //Cuando cambia el combo del Canton
     	case( $_REQUEST["btnBuscar"] == "niveledu" ):
            $niveledu = new clTniveledu();
            $formacions->setStrTfnecesaria($_REQUEST["strCodigotfnecesaria"]);
            $strResultado .= print($niveledu->getStrListar($formacions->getStrTfnecesaria(), $formacions->getStrTniveledu()));
            exit;

        case( $_REQUEST["btnBuscar"] == "Subtcurso" ):
            $Subtformaciona = new clSubtformacion();
            $formacions->setstrTcurso($_REQUEST["strCodigoTcurso"]);
			$strResultado .= print($Subtformacion->getStrListar($formacions->getstrTcurso(), $formacions->getStrSubtformacion()));
           
		    exit;
		case( $_REQUEST["btnBuscar"] == "Subtformaciond" ):            
            $Subtformaciond = new clSubtformaciond();
			
            $formacions->setStrSubtformacion($_REQUEST["strCodigoTformaciond"]);
            $strResultado = print($Subtformaciond->getStrListar($formacions->getStrSubtformacion(), $formacions->getStrSubtformaciond()));
            exit;
        case( $_REQUEST["btnBuscar"] == "Subtformacion" ):
            $Subtformaciona = new clSubtformacion();
            $formacions->setStrTformacion($_REQUEST["strCodigoTformacion"]);
            $strResultado .= print($Subtformacion->getStrListar($formacions->getStrTformacion(), $formacions->getStrSubtformacion()));
            exit;
			 case( $_REQUEST["btnBuscar"] == "Subtformaciond" ):            
            $Subtformaciond = new clSubtformaciond();
            $formacions->setStrSubtformacion($_REQUEST["strCodigoTformaciond"]);
            $strResultado = print($Subtformaciond->getStrListar($formacions->getStrSubtformacion(), $formacions->getStrSubtformaciond()));
            exit;    
      
        default:
            $strResultado .= $formacions->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>