<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    	include_once( CLASS_PATH . "class.clinterfaz.php" );
    	include_once( CLASS_PATH . "class.clpersonad.php" );
	  	include_once( CLASS_PATH . "class.clpersonad.php" );
     	$interfaz = new clInterfaz();
    	$personad = new clPersonad();
		$strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
			$personad->setStrCodigo($_REQUEST["strCodigo"]);
			$personad->setStrLectura("");
			$personad->setStrEtiqueta("PARIENTES CON DISCAPACIDAD");
		    $personad->setStrNombreBoton("btnGuardar");
	        $personad->setStrValorBoton("Guardar");
			$personad->setStrNombreBotons("btnSiguiente");
	        $personad->setStrValorBotons("Siguiente");
			$personad->setStrNombreBotona("btnAnterior");
	        $personad->setStrValorBotona("Anterior");
			$strResultado .= $personad->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			$strResultado .= $personad->getStrListar();
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ):            
            $personad->setStrCodigo($_POST["strCodigo"]);
			$personad->setStrPdiscapacidad($_POST["lsPdiscapacidad"]);
			$personad->setStrNdiscapacidad($_POST["lsNdiscapacidad"]);
			$personad->setStrParentezco($_POST["lsParentezco"]);
			$personad->setStrTdiscapacidadp($_POST["lsTdiscapacidadp"]);
			
			if($personad->getStrIngresar())
		   {
               $valor=$personad->getStrCodigo();
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".PERSONAD_URL."personad.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            $strResultado .= $personad->getStrListar().'<br>';
            break;
			case( $_REQUEST["btnSiguiente"] == "Siguiente" ):            
            	$personad->setStrCodigo($_POST["strCodigo"]);
			    $valor=$personad->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".FORMACIONA_URL."formaciona.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            break;
			case( $_REQUEST["btnAnterior"] == "Anterior" ):            
            	$personad->setStrCodigo($_POST["strCodigo"]);
        	   	$valor=$personad->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".DISCAPACIDAD_URL."discapacidad.php?btnNuevo=Nuevo&strCodigo=".$valor."");
           
            break;
			case( $_REQUEST["btnEditar"] == "Actualizar" ):
			$personad->setStrCodigo($_POST["strCodigo"]);
            
			$personad->setStrPdiscapacidad($_POST["lsPdiscapacidad"]);
			$personad->setStrNdiscapacidad($_POST["lsNdiscapacidad"]);
			$personad->setStrParentezco($_POST["lsParentezco"]);
			$personad->setStrTdiscapacidadp($_POST["lsTdiscapacidadp"]);
			
			$valor=$personad->getStrCodigo();
			$v=$personad->getStrBuscarpds($valor);		
		            if($personad->getStrActualizar())
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
		            else
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';
		
		            header("Location:".PERSONAD_URL."personad.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
		            $personad->setStrCodigo($_REQUEST["strCodigo"]);
		            $personad->setStrEtiqueta("Actualizar&nbsp; Forma de Discapacidad");
		            $personad->setStrNombreBoton("btnEditar");
		            $personad->setStrValorBoton("Actualizar");
		
		            if($personad->getStrBuscar())
		                $strResultado .= $personad->getStrFormulario();
		            else {
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
		                $strResultado .= $personad->getStrListar();
		            }
            break;
			case( $_REQUEST["btnEliminar"] == "Eliminar" ):
	            $personad->setStrCodigo($_REQUEST["strCodigo"]);
	            $valor=$personad->getStrCodigo();
			$v=$personad->getStrBuscarpds($valor);	
	            if ($personad->getStrBuscar())
	                if($personad->getStrEliminar())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
	
	     			header("Location:".PERSONAD_URL."personad.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $personad->setStrCodigo($_REQUEST["strCodigo"]);
            if ($personad->getStrBuscar())
                $strResultado .= $personad->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $personad->getStrListar().'<br>';
                }
            break;
			case( $_REQUEST["btnBuscar"] == "pafectadas" ):
            $pafectadas = new clPafectadas();
            $personad->setStrTpersonad($_REQUEST["strCodigoTpersonad"]);
            $strResultado .= print($pafectadas->getStrListar($personad->getStrTpersonad(), $personad->getStrPafectadas()));
            exit;
			//Cuando cambia el combo del Canton
        	case( $_REQUEST["btnBuscar"] == "tnivelavance" ):            
            $tnivelavance = new clTnivelavance();
            $personad->setStrPafectadas($_REQUEST["strCodigoPafectadas"]);
            $strResultado = print($tnivelavance->getStrListar($personad->getStrPafectadas(), $personad->getStrTnivelavance()));
            exit;
      	
        default:
            $strResultado .= $personad->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>