<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    	include_once( CLASS_PATH . "class.clinterfaz.php" );
    	include_once( CLASS_PATH . "class.clformaciona.php" );
		$interfaz = new clInterfaz();
    	$formaciona = new clformaciona();
		$strResultado = "";
		
    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
			$formaciona->setStrCodigo($_REQUEST["strCodigo"]);
			$formaciona->setStrLectura("");
			$formaciona->setStrEtiqueta("EDUCACIÓN");
		    $formaciona->setStrNombreBoton("btnGuardar");
	        $formaciona->setStrValorBoton("Guardar");
			$formaciona->setStrNombreBotons("btnSiguiente");
	        $formaciona->setStrValorBotons("Siguiente");
			$formaciona->setStrNombreBotona("btnAnterior");
	        $formaciona->setStrValorBotona("Anterior");
	        $strResultado .= $formaciona->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			$strResultado .= $formaciona->getStrListar();
			$strResultado .= $formaciona->getStrListarcinformaticos();
            break;
        case( $_REQUEST["btnGuardar"] == "Guardar" ):            
            $formaciona->setStrTformacion($_POST["lsTformacion"]);          
            $formaciona->setStrSubtformacion($_POST["lsSubtformacion"]);
			$formaciona->setStrSubtformaciond($_POST["lsSubtformaciond"]);
			$formaciona->setStrCodigo($_POST["strCodigo"]); 
			
			$formaciona->setStrNombre($_POST["strNombre"]);
			$formaciona->setStrTfnecesaria($_POST["lsTfnecesaria"]);
			$formaciona->setStrTnivel($_POST["lsTnivel"]);
			$formaciona->setStrTniveledu($_POST["lsTniveledu"]);
			$formaciona->setstrCinformatico($_POST["lsCinformatico"]);
			$formaciona->setstrCinformaticos($_POST["strcinformaticos"]);
			$formaciona->setstrCminimos($_POST["lsCminimos"]);
			$formaciona->setstrOtross($_POST["strOtross"]);
			$formaciona->setstrPcontables($_POST["lspcontable"]);
			$formaciona->setstrDinformaticos($_POST["lsdinformatico"]);
			$formaciona->setstrDgraficos($_POST["lsdgrafico"]);
			$formaciona->setstrVdigitacion($_POST["lsdigitacion"]);
			
			
            if($formaciona->getStrIngresar())
		   {
		   		//$formaciona->getStrIngresarcinformaticos();
               $valor=$formaciona->getStrCodigo();
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".FORMACIONA_URL."formaciona.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            $strResultado .= $formaciona->getStrListar().'<br>';
            break;
            
			case( $_REQUEST["btnSiguiente"] == "Siguiente" ):            
            	$formaciona->setStrCodigo($_POST["strCodigo"]); 
				//$formaciona->getStrIngresarcinformaticos();
               	$valor=$formaciona->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".FORMACIONII_URL."formacionii.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            break;
            case( $_REQUEST["btnAnterior"] == "Anterior" ):            
            	$formaciona->setStrCodigo($_POST["strCodigo"]);
				$valor=$formaciona->getStrCodigo();
				$v=$formaciona->getStrBuscaru($valor);
				if($v==1)
				{
				
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".PERSONAD_URL."personad.php?btnNuevo=Nuevo&strCodigo=".$valor."");
				}
        	   	if($v==2)
				{
				$valor=$formaciona->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".DATOSL_URL."datosl.php?btnNuevo=Nuevo&strCodigo=".$valor."");
				}
           		if($v==3)
				{
					$valor=$formaciona->getStrCodigo();
	               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
	            	header("Location:".DATOSLS_URL."datosls.php?btnNuevo=Nuevo&strCodigo=".$valor."");
				}
            break;
			case( $_REQUEST["btnEditar"] == "Actualizar" ):
			$formaciona->setStrCodigo($_POST["strCodigo"]);
			$formaciona->setStrTformacion($_POST["lsTformacion"]);          
            $formaciona->setStrSubtformacion($_POST["lsSubtformacion"]);
			$formaciona->setStrSubtformaciond($_POST["lsSubtformaciond"]);
			$formaciona->setStrCodigo($_POST["strCodigo"]); 
			$formaciona->setStrNombre($_POST["strNombre"]);
			$formaciona->setStrTfnecesaria($_POST["lsTfnecesaria"]);
			$formaciona->setStrTnivel($_POST["lsTnivel"]);
			$formaciona->setStrTniveledu($_POST["lsTniveledu"]);
			$formaciona->setstrCinformatico($_POST["lsCinformatico"]);
			$formaciona->setstrCinformaticos($_POST["strcinformaticos"]);
			$formaciona->setstrCminimos($_POST["lsCminimos"]);
			$formaciona->setstrOtross($_POST["strOtross"]);
			$formaciona->setstrPcontables($_POST["lspcontable"]);
			$formaciona->setstrDinformaticos($_POST["lsdinformatico"]);
			$formaciona->setstrDgraficos($_POST["lsdgrafico"]);
			$formaciona->setstrVdigitacion($_POST["lsdigitacion"]);
			
			$valor=$formaciona->getStrCodigo();
			$v=$formaciona->getStrBuscarfas($valor);
		            if($formaciona->getStrActualizar())
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
		            else
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';
		
		            header("Location:".FORMACIONA_URL."formaciona.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
		            $formaciona->setStrCodigo($_REQUEST["strCodigo"]);
		            $formaciona->setStrEtiqueta("ACTUALIZAR ÁREA FORMATIVA ");
		            $formaciona->setStrNombreBoton("btnEditar");
		            $formaciona->setStrValorBoton("Actualizar");
		
		            if($formaciona->getStrBuscar())
		                $strResultado .= $formaciona->getStrFormulario();
		            else {
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
		                $strResultado .= $formaciona->getStrListar();
		            }
            break;
			case( $_REQUEST["btnEliminar"] == "Eliminar" ):
	            $formaciona->setStrCodigo($_REQUEST["strCodigo"]);
	            
				$valor=$formaciona->getStrCodigo();
				$v=$formaciona->getStrBuscarfas($valor);
	            if ($formaciona->getStrBuscar())
	                if($formaciona->getStrEliminar())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
	
	     			header("Location:".FORMACIONA_URL."formaciona.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
			case( $_REQUEST["btnEliminar"] == "Eliminarcinformaticos" ):
	            $formaciona->setStrCodigo($_REQUEST["strCodigo"]);
				
				$valor=$formaciona->getStrCodigo();
				$v=$formaciona->getStrBuscarfascinformaticos($valor);
	            if ($formaciona->getStrBuscarcinformaticos())
	                if($formaciona->getStrEliminarcinformaticos())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">OPERACIÓN CANCELADA: NO SE PUEDE ELIMINAR [ ÁREA FORMATIVA]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
	
            	header("Location:".FORMACIONA_URL."formaciona.php?btnNuevo=Nuevo&strCodigo=".$v."");	
            break;
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $formaciona->setStrCodigo($_REQUEST["strCodigo"]);
            if ($formaciona->getStrBuscar())
                $strResultado .= $formaciona->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $formaciona->getStrListar().'<br>';
                }
            break;
			
			 //Cuando cambia el Nivel
        case( $_REQUEST["btnBuscar"] == "nivel" ):
            $nivel = new clTnivel();
            $formaciona->setStrTfnecesaria($_REQUEST["strCodigotfnecesaria"]);
            $strResultado .= print($nivel->getStrListar($formaciona->getStrTfnecesaria(), $formaciona->getStrTnivel()));
            exit;

        //Cuando cambia el combo del Canton
     	case( $_REQUEST["btnBuscar"] == "niveledu" ):
            $niveledu = new clTniveledu();
            $formaciona->setStrTfnecesaria($_REQUEST["strCodigotfnecesaria"]);
            $strResultado .= print($niveledu->getStrListar($formaciona->getStrTfnecesaria(), $formaciona->getStrTniveledu()));
            exit;

        case( $_REQUEST["btnBuscar"] == "Subtcurso" ):
            $Subtformaciona = new clSubtformacion();
            $formaciona->setstrTcurso($_REQUEST["strCodigoTcurso"]);
			$strResultado .= print($Subtformacion->getStrListar($formaciona->getstrTcurso(), $formaciona->getStrSubtformacion()));
           
		    exit;
		case( $_REQUEST["btnBuscar"] == "Subtformaciond" ):            
            $Subtformaciond = new clSubtformaciond();
			
            $formaciona->setStrSubtformacion($_REQUEST["strCodigoTformaciond"]);
            $strResultado = print($Subtformaciond->getStrListar($formaciona->getStrSubtformacion(), $formaciona->getStrSubtformaciond()));
            exit;
        case( $_REQUEST["btnBuscar"] == "Subtformacion" ):
            $Subtformaciona = new clSubtformacion();
            $formaciona->setStrTformacion($_REQUEST["strCodigoTformacion"]);
            $strResultado .= print($Subtformacion->getStrListar($formaciona->getStrTformacion(), $formaciona->getStrSubtformacion()));
            exit;
			 case( $_REQUEST["btnBuscar"] == "Subtformaciond" ):            
            $Subtformaciond = new clSubtformaciond();
            $formaciona->setStrSubtformacion($_REQUEST["strCodigoTformaciond"]);
            $strResultado = print($Subtformaciond->getStrListar($formaciona->getStrSubtformacion(), $formaciona->getStrSubtformaciond()));
            exit;    
      
        default:
            $strResultado .= $formaciona->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>