<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    	include_once( CLASS_PATH . "class.clinterfaz.php" );
    	include_once( CLASS_PATH . "class.clayudasts.php" );
	  	$interfaz = new clInterfaz();
    	$ayudasts = new clAyudasts();
		$strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
			$ayudasts->setStrCodigo($_REQUEST["strCodigo"]);
			$ayudasts->setStrLectura("");
			$ayudasts->setStrEtiqueta("INGRESAR AYUDAS TÉCNICAS");
		    $ayudasts->setStrNombreBoton("btnGuardar");
	        $ayudasts->setStrValorBoton("Guardar");
			$ayudasts->setStrNombreBotons("btnSiguiente");
	        $ayudasts->setStrValorBotons("Siguiente");
			$ayudasts->setStrNombreBotona("btnAnterior");
	        $ayudasts->setStrValorBotona("Anterior");
			$strResultado .= $ayudasts->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			$strResultado .= $ayudasts->getStrListar();
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ):            
            $ayudasts->setStrCodigo($_POST["strCodigo"]);
        	$ayudasts->setStrAtecnicas($_POST["lsAtecnicas"]);
			;
			
            if($ayudasts->getStrIngresar())
		   {
               $valor=$ayudasts->getStrCodigo();
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".AYUDASTS_URL."ayudasts.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            //$strResultado .= $ayudasts->getStrListar().'<br>';
            break;
			
			case( $_REQUEST["btnSiguiente"] == "Siguiente" ):            
            	$ayudasts->setStrCodigo($_POST["strCodigo"]);
        		$ayudasts->setStrAtecnicas($_POST["lsAtecnicas"]);
			;   $valor=$ayudasts->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".DISCAPACIDADS_URL."discapacidads.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            break;
            case( $_REQUEST["btnAnterior"] == "Anterior" ):            
            	$ayudasts->setStrCodigo($_POST["strCodigo"]);
        	   	$valor=$ayudasts->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".PDISCAPACIDAD_URL."pdiscapacidad.php?btnNuevo=Nuevo&strCodigo=".$valor."");
           
            break;
			 case( $_REQUEST["btnEditar"] == "Actualizar" ):
				$ayudasts->setStrAtecnicas($_POST["lsAtecnicas"]);
				  
				 $ayudasts->setStrCodigo($_POST["strCodigo"]);
				 $valor=$ayudasts->getStrCodigo();
			 	$v=$ayudasts->getStrBuscarpd($valor);
			if($ayudasts->getStrActualizar())
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
		            else
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';
		
		            header("Location:".AYUDASTS_URL."ayudasts.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
		            $ayudasts->setStrCodigo($_REQUEST["strCodigo"]);
		            $ayudasts->setStrEtiqueta("ACTUALIZAR FORMA AYUDAS TÉCNICAS");
		            $ayudasts->setStrNombreBoton("btnEditar");
		            $ayudasts->setStrValorBoton("Actualizar");
		
		            if($ayudasts->getStrBuscar())
		                $strResultado .= $ayudasts->getStrFormulario();
		            else {
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
		                $strResultado .= $ayudasts->getStrListar();
		            }
            break;
			case( $_REQUEST["btnEliminar"] == "Eliminar" ):
	            $ayudasts->setStrCodigo($_REQUEST["strCodigo"]);
	          	 $valor=$ayudasts->getStrCodigo();
			 	$v=$ayudasts->getStrBuscarpd($valor);
				
	            if ($ayudasts->getStrBuscar())
	                if($ayudasts->getStrEliminar())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
	
	     			header("Location:".AYUDASTS_URL."ayudasts.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $ayudasts->setStrCodigo($_REQUEST["strCodigo"]);
            if ($ayudasts->getStrBuscar())
                $strResultado .= $ayudasts->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $ayudasts->getStrListar().'<br>';
                }
            break;
			case( $_REQUEST["btnBuscar"] == "pafectadas" ):
            $pafectadas = new clPafectadas();
            $ayudasts->setStrTayudasts($_REQUEST["strCodigoTayudasts"]);
            $strResultado .= print($pafectadas->getStrListar($ayudasts->getStrTayudasts(), $ayudasts->getStrPafectadas()));
            exit;
			//Cuando cambia el combo del Canton
        	case( $_REQUEST["btnBuscar"] == "tnivelavance" ):            
            $tnivelavance = new clTnivelavance();
            $ayudasts->setStrPafectadas($_REQUEST["strCodigoPafectadas"]);
            $strResultado = print($tnivelavance->getStrListar($ayudasts->getStrPafectadas(), $ayudasts->getStrTnivelavance()));
            exit;
      	
        default:
            $strResultado .= $ayudasts->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>