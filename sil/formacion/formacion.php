<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    	include_once( CLASS_PATH . "class.clinterfaz.php" );
    	include_once( CLASS_PATH . "class.clformacion.php" );
		include_once( CLASS_PATH . "class.clcformativo.php" );
	  	$interfaz = new clInterfaz();
    	$formacion = new clFormacion();
		$strResultado = "";
		
    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
			$formacion->setStrCodigo($_REQUEST["strCodigo"]);
			$formacion->setStrLectura("");
			$formacion->setStrEtiqueta("Educación");
		    $formacion->setStrNombreBoton("btnGuardar");
	        $formacion->setStrValorBoton("Guardar");

			
	        $strResultado .= $formacion->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			//$strResultado .= $formacion->getStrListar();
            break;
        case( $_REQUEST["btnGuardar"] == "Guardar" ):            
            $formacion->setStrTformacion($_POST["lsTformacion"]);          
            $formacion->setStrSubtformacion($_POST["lsSubtformacion"]);
			$formacion->setStrSubtformaciond($_POST["lsSubtformaciond"]);
			$formacion->setStrCodigo($_POST["strCodigo"]); 
			
			$formacion->setStrNombre($_POST["strNombre"]);
			$formacion->setStrTfnecesaria($_POST["lsTfnecesaria"]);
			$formacion->setStrTnivel($_POST["lsTnivel"]);
			$formacion->setStrTniveledu($_POST["lsTniveledu"]);
			$formacion->setstrCinformatico($_POST["lsCinformatico"]);
			$formacion->setstrCinformaticos($_POST["strcinformaticos"]);
			$formacion->setstrCminimos($_POST["lsCminimos"]);
			$formacion->setstrOtross($_POST["strOtross"]);
			$formacion->setstrPcontables($_POST["lspcontable"]);
			$formacion->setstrDinformaticos($_POST["lsdinformatico"]);
			$formacion->setstrDgraficos($_POST["lsdgrafico"]);
			$formacion->setstrVdigitacion($_POST["lsdigitacion"]);
			
			
			
            if($formacion->getStrIngresar())
		   {
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            $strResultado .= $formacion->getStrListar().'<br>';
            break;
			case( $_REQUEST["btnEditar"] == "Actualizar" ):
					 $formacion->setStrPerfil($_POST["lsPerfil"]);
					$formacion->setStrCodigo($_POST["strCodigo"]);
		            if($formacion->getStrActualizar())
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
		            else
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';
		
		            $strResultado .= '<meta http-equiv="Refresh" content="0;url=../cformativo/cformativo.php">';
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
		            $formacion->setStrCodigo($_REQUEST["strCodigo"]);
		            $formacion->setStrEtiqueta("Actualizar&nbsp; Perfil de Centro Formativo");
		            $formacion->setStrNombreBoton("btnEditar");
		            $formacion->setStrValorBoton("Actualizar");
		
		            if($formacion->getStrBuscar())
		                $strResultado .= $formacion->getStrFormulario();
		            else {
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
		                $strResultado .= $formacion->getStrListar();
		            }
            break;
			case( $_REQUEST["btnEliminar"] == "Eliminar" ):
	            $formacion->setStrCodigo($_REQUEST["strCodigo"]);
	            if ($formacion->getStrBuscar())
	                if($formacion->getStrEliminar())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
	
	     			$strResultado .= '<meta http-equiv="Refresh" content="0;url=../cformativo/cformativo.php">';
            break;
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $formacion->setStrCodigo($_REQUEST["strCodigo"]);
            if ($formacion->getStrBuscar())
                $strResultado .= $formacion->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $formacion->getStrListar().'<br>';
                }
            break;
			
			 //Cuando cambia el Nivel
        case( $_REQUEST["btnBuscar"] == "nivel" ):
            $nivel = new clTnivel();
            $formacion->setStrTfnecesaria($_REQUEST["strCodigotfnecesaria"]);
            $strResultado .= print($nivel->getStrListar($formacion->getStrTfnecesaria(), $formacion->getStrTnivel()));
            exit;

        //Cuando cambia el combo del Canton
     	case( $_REQUEST["btnBuscar"] == "niveledu" ):
            $niveledu = new clTniveledu();
            $formacion->setStrTfnecesaria($_REQUEST["strCodigotfnecesaria"]);
            $strResultado .= print($niveledu->getStrListar($formacion->getStrTfnecesaria(), $formacion->getStrTniveledu()));
            exit;

        case( $_REQUEST["btnBuscar"] == "Subtcurso" ):
            $Subtformacion = new clSubtformacion();
            $formacion->setstrTcurso($_REQUEST["strCodigoTcurso"]);
			$strResultado .= print($Subtformacion->getStrListar($formacion->getstrTcurso(), $formacion->getStrSubtformacion()));
           
		    exit;
		case( $_REQUEST["btnBuscar"] == "Subtformaciond" ):            
            $Subtformaciond = new clSubtformaciond();
			
            $formacion->setStrSubtformacion($_REQUEST["strCodigoTformaciond"]);
            $strResultado = print($Subtformaciond->getStrListar($formacion->getStrSubtformacion(), $formacion->getStrSubtformaciond()));
            exit;
        case( $_REQUEST["btnBuscar"] == "Subtformacion" ):
            $Subtformacion = new clSubtformacion();
            $formacion->setStrTformacion($_REQUEST["strCodigoTformacion"]);
            $strResultado .= print($Subtformacion->getStrListar($formacion->getStrTformacion(), $formacion->getStrSubtformacion()));
            exit;
			 case( $_REQUEST["btnBuscar"] == "Subtformaciond" ):            
            $Subtformaciond = new clSubtformaciond();
            $formacion->setStrSubtformacion($_REQUEST["strCodigoTformaciond"]);
            $strResultado = print($Subtformaciond->getStrListar($formacion->getStrSubtformacion(), $formacion->getStrSubtformaciond()));
            exit;    
      
        default:
            $strResultado .= $formacion->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>