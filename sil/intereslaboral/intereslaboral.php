<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    	include_once( CLASS_PATH . "class.clinterfaz.php" );
    	include_once( CLASS_PATH . "class.clintereslaboral.php" );
     	$interfaz = new clInterfaz();
    	$intereslaboral = new clIntereslaboral();
		$strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
			$intereslaboral->setStrCodigo($_REQUEST["strCodigo"]);
			$intereslaboral->setStrLectura("");
			$intereslaboral->setStrEtiqueta("INGRESAR INTERÉS LABORAL");
		    $intereslaboral->setStrNombreBoton("btnGuardar");
	        $intereslaboral->setStrValorBoton("Guardar");
			$intereslaboral->setStrNombreBotons("btnSiguiente");
	        $intereslaboral->setStrValorBotons("Siguiente");
			$intereslaboral->setStrNombreBotona("btnAnterior");
	        $intereslaboral->setStrValorBotona("Anterior");
			$strResultado .= $intereslaboral->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			$strResultado .= $intereslaboral->getStrListar();
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ):            
            $intereslaboral->setStrCodigo($_POST["strCodigo"]);
        	$intereslaboral->setStrIntereslaboral($_POST["lsIntereslaboral"]);
			;
			
            if($intereslaboral->getStrIngresar())
		   {
              $valor=$intereslaboral->getStrCodigo();
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".INTERESLABORAL_URL."intereslaboral.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            $strResultado .= $intereslaboral->getStrListar().'<br>';
            break;
			
			case( $_REQUEST["btnSiguiente"] == "Siguiente" ):            
            	$intereslaboral->setStrCodigo($_POST["strCodigo"]);
        	   	$valor=$intereslaboral->getStrCodigo();
	            // $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            header("Location:".DATOSL_URL."datosl.php?btnNuevo=Nuevo&strCodigo=".$valor."");
             break;
			case( $_REQUEST["btnAnterior"] == "Anterior" ):            
            	$intereslaboral->setStrCodigo($_POST["strCodigo"]);
        	   	$valor=$intereslaboral->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".DISPONIBILIDADL_URL."disponibilidadl.php?btnNuevo=Nuevo&strCodigo=".$valor."");
           
            break;
			 case( $_REQUEST["btnEditar"] == "Actualizar" ):
			$intereslaboral->setStrCodigo($_POST["strCodigo"]);
        	$intereslaboral->setStrIntereslaboral($_POST["lsIntereslaboral"]);
			
			$valor=$intereslaboral->getStrCodigo();
			$v=$intereslaboral->getStrBuscarils($valor);
			if($intereslaboral->getStrActualizar())
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
		            else
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';
		
		           header("Location:".INTERESLABORAL_URL."intereslaboral.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
		            $intereslaboral->setStrCodigo($_REQUEST["strCodigo"]);
		            $intereslaboral->setStrEtiqueta("ACTUALIZAR INTERÉS LABORAL ");
		            $intereslaboral->setStrNombreBoton("btnEditar");
		            $intereslaboral->setStrValorBoton("Actualizar");
		
		            if($intereslaboral->getStrBuscar())
		                $strResultado .= $intereslaboral->getStrFormulario();
		            else {
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
		                $strResultado .= $intereslaboral->getStrListar();
		            }
            break;
			case( $_REQUEST["btnEliminar"] == "Eliminar" ):
	            $intereslaboral->setStrCodigo($_REQUEST["strCodigo"]);
				
				$valor=$intereslaboral->getStrCodigo();
			$v=$intereslaboral->getStrBuscarils($valor);
	            if ($intereslaboral->getStrBuscar())
	                if($intereslaboral->getStrEliminar())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
	
	     			header("Location:".INTERESLABORAL_URL."intereslaboral.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $intereslaboral->setStrCodigo($_REQUEST["strCodigo"]);
            if ($intereslaboral->getStrBuscar())
                $strResultado .= $intereslaboral->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $intereslaboral->getStrListar().'<br>';
                }
            break;
			case( $_REQUEST["btnBuscar"] == "pafectadas" ):
            $pafectadas = new clPafectadas();
            $intereslaboral->setStrTintereslaboral($_REQUEST["strCodigoTintereslaboral"]);
            $strResultado .= print($pafectadas->getStrListar($intereslaboral->getStrTintereslaboral(), $intereslaboral->getStrPafectadas()));
            exit;
			//Cuando cambia el combo del Canton
        	case( $_REQUEST["btnBuscar"] == "tnivelavance" ):            
            $tnivelavance = new clTnivelavance();
            $intereslaboral->setStrPafectadas($_REQUEST["strCodigoPafectadas"]);
            $strResultado = print($tnivelavance->getStrListar($intereslaboral->getStrPafectadas(), $intereslaboral->getStrTnivelavance()));
            exit;
      	
        default:
            $strResultado .= $intereslaboral->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>