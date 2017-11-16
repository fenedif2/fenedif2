<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    	include_once( CLASS_PATH . "class.clinterfaz.php" );
    	include_once( CLASS_PATH . "class.clpersonads.php" );
	  	$interfaz = new clInterfaz();
    	$personads = new clPersonads();
		$strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
			$personads->setStrCodigo($_REQUEST["strCodigo"]);
			$personads->setStrLectura("");
			$personads->setStrEtiqueta("PARIENTES CON DISCAPACIDAD");
		    $personads->setStrNombreBoton("btnGuardar");
	        $personads->setStrValorBoton("Guardar");
			$personads->setStrNombreBotons("btnSiguiente");
	        $personads->setStrValorBotons("Siguiente");
			$personads->setStrNombreBotona("btnAnterior");
	        $personads->setStrValorBotona("Anterior");
			$strResultado .= $personads->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			$strResultado .= $personads->getStrListar();
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ):            
            $personads->setStrCodigo($_POST["strCodigo"]);
			$personads->setStrPdiscapacidad($_POST["lsPdiscapacidad"]);
			$personads->setStrNdiscapacidad($_POST["lsNdiscapacidad"]);
			$personads->setStrParentezco($_POST["lsParentezco"]);
			$personads->setStrTdiscapacidadp($_POST["lsTdiscapacidadp"]);
			
			if($personads->getStrIngresar())
		   {
               $valor=$personads->getStrCodigo();
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".PERSONADS_URL."personads.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            $strResultado .= $personads->getStrListar().'<br>';
            break;
            case( $_REQUEST["btnSiguiente"] == "Siguiente" ):            
            	$personads->setStrCodigo($_POST["strCodigo"]);
			    $valor=$personads->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".DISPONIBILIDADL_URL."disponibilidadl.php?btnNuevo=Nuevo&strCodigo=".$valor."");
             break;
			 case( $_REQUEST["btnAnterior"] == "Anterior" ):            
            	$personads->setStrCodigo($_POST["strCodigo"]);
        	   	$valor=$personads->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".DISCAPACIDADS_URL."discapacidads.php?btnNuevo=Nuevo&strCodigo=".$valor."");
           
            break;
			 case( $_REQUEST["btnEditar"] == "Actualizar" ):
			$personads->setStrCodigo($_POST["strCodigo"]);
            
			$personads->setStrPdiscapacidad($_POST["lsPdiscapacidad"]);
			$personads->setStrNdiscapacidad($_POST["lsNdiscapacidad"]);
			$personads->setStrParentezco($_POST["lsParentezco"]);
			$personads->setStrTdiscapacidadp($_POST["lsTdiscapacidadp"]);
			$valor=$personads->getStrCodigo();
			$v=$personads->getStrBuscarpds($valor);
					
		            if($personads->getStrActualizar())
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
		            else
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';
		
		            header("Location:".PERSONADS_URL."personads.php?btnNuevo=Nuevo&strCodigo=".$v."");
		            
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
		            $personads->setStrCodigo($_REQUEST["strCodigo"]);
		            $personads->setStrEtiqueta("ACTUALIZAR PARIENTES DISCAPACIDAD");
		            $personads->setStrNombreBoton("btnEditar");
		            $personads->setStrValorBoton("Actualizar");
		
		            if($personads->getStrBuscar())
		                $strResultado .= $personads->getStrFormulario();
		            else {
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
		                $strResultado .= $personads->getStrListar();
		            }
            break;
			case( $_REQUEST["btnEliminar"] == "Eliminar" ):
	            $personads->setStrCodigo($_REQUEST["strCodigo"]);
				$valor=$personads->getStrCodigo();
				$v=$personads->getStrBuscarpds($valor);
	            if ($personads->getStrBuscar())
	                if($personads->getStrEliminar())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
	
	     			 header("Location:".PERSONADS_URL."personads.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $personads->setStrCodigo($_REQUEST["strCodigo"]);
            if ($personads->getStrBuscar())
                $strResultado .= $personads->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $personads->getStrListar().'<br>';
                }
            break;
			case( $_REQUEST["btnBuscar"] == "pafectadas" ):
            $pafectadas = new clPafectadas();
            $personads->setStrTpersonads($_REQUEST["strCodigoTpersonads"]);
            $strResultado .= print($pafectadas->getStrListar($personads->getStrTpersonads(), $personads->getStrPafectadas()));
            exit;
			//Cuando cambia el combo del Canton
        	case( $_REQUEST["btnBuscar"] == "tnivelavance" ):            
            $tnivelavance = new clTnivelavance();
            $personads->setStrPafectadas($_REQUEST["strCodigoPafectadas"]);
            $strResultado = print($tnivelavance->getStrListar($personads->getStrPafectadas(), $personads->getStrTnivelavance()));
            exit;
      	
        default:
            $strResultado .= $personads->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>