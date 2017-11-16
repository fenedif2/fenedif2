<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    	include_once( CLASS_PATH . "class.clinterfaz.php" );
    	include_once( CLASS_PATH . "class.clintereslaborals.php" );
     	$interfaz = new clInterfaz();
    	$intereslaborals = new clIntereslaborals();
		$strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
			$intereslaborals->setStrCodigo($_REQUEST["strCodigo"]);
			$intereslaborals->setStrLectura("");
			$intereslaborals->setStrEtiqueta("Ingresar Interés Laboral");
		    $intereslaborals->setStrNombreBoton("btnGuardar");
	        $intereslaborals->setStrValorBoton("Guardar");
			$intereslaborals->setStrNombreBotons("btnSiguiente");
	        $intereslaborals->setStrValorBotons("Siguiente");
			$intereslaborals->setStrNombreBotona("btnAnterior");
	        $intereslaborals->setStrValorBotona("Anterior");
			$strResultado .= $intereslaborals->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			$strResultado .= $intereslaborals->getStrListar();
            break;
	       case( $_REQUEST["btnGuardar"] == "Guardar" ):            
            $intereslaborals->setStrCodigo($_POST["strCodigo"]);
        	$intereslaborals->setStrIntereslaboral($_POST["lsIntereslaboral"]);
			;
			
            if($intereslaborals->getStrIngresar())
		   {
              	$valor=$intereslaborals->getStrCodigo();
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".INTERESLABORALS_URL."intereslaborals.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            $strResultado .= $intereslaborals->getStrListar().'<br>';
            break;
            case( $_REQUEST["btnSiguiente"] == "Siguiente" ):            
            	$intereslaborals->setStrCodigo($_POST["strCodigo"]);
        	   	$valor=$intereslaborals->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".DATOSLS_URL."datosls.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            break;
            case( $_REQUEST["btnAnterior"] == "Anterior" ):            
            	$intereslaborals->setStrCodigo($_POST["strCodigo"]);
        	   	$valor=$intereslaborals->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".DISPONIBILIDADLS_URL."disponibilidadls.php?btnNuevo=Nuevo&strCodigo=".$valor."");
           
            break;
			 case( $_REQUEST["btnEditar"] == "Actualizar" ):
			$intereslaborals->setStrCodigo($_POST["strCodigo"]);
        	$intereslaborals->setStrIntereslaboral($_POST["lsIntereslaboral"]);
        	
        	$valor=$intereslaborals->getStrCodigo();
			$v=$intereslaborals->getStrBuscarils($valor);
			if($intereslaborals->getStrActualizar())
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
		            else
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';
		
		            header("Location:".INTERESLABORALS_URL."intereslaborals.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
		            $intereslaborals->setStrCodigo($_REQUEST["strCodigo"]);
		            $intereslaborals->setStrEtiqueta("Actualizar&nbsp; Interés Laboral");
		            $intereslaborals->setStrNombreBoton("btnEditar");
		            $intereslaborals->setStrValorBoton("Actualizar");
		
		            if($intereslaborals->getStrBuscar())
		                $strResultado .= $intereslaborals->getStrFormulario();
		            else {
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
		                $strResultado .= $intereslaborals->getStrListar();
		            }
            break;
			case( $_REQUEST["btnEliminar"] == "Eliminar" ):
	            $intereslaborals->setStrCodigo($_REQUEST["strCodigo"]);
				
				$valor=$intereslaborals->getStrCodigo();
			$v=$intereslaborals->getStrBuscarils($valor);
	            if ($intereslaborals->getStrBuscar())
	                if($intereslaborals->getStrEliminar())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
	
	     			 header("Location:".INTERESLABORALS_URL."intereslaborals.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $intereslaborals->setStrCodigo($_REQUEST["strCodigo"]);
            if ($intereslaborals->getStrBuscar())
                $strResultado .= $intereslaborals->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $intereslaborals->getStrListar().'<br>';
                }
            break;
			case( $_REQUEST["btnBuscar"] == "pafectadas" ):
            $pafectadas = new clPafectadas();
            $intereslaborals->setStrTintereslaborals($_REQUEST["strCodigoTintereslaboral"]);
            $strResultado .= print($pafectadas->getStrListar($intereslaborals->getStrTintereslaboral(), $intereslaborals->getStrPafectadas()));
            exit;
			//Cuando cambia el combo del Canton
        	case( $_REQUEST["btnBuscar"] == "tnivelavance" ):            
            $tnivelavance = new clTnivelavance();
            $intereslaborals->setStrPafectadas($_REQUEST["strCodigoPafectadas"]);
            $strResultado = print($tnivelavance->getStrListar($intereslaborals->getStrPafectadas(), $intereslaborals->getStrTnivelavance()));
            exit;
      	
        default:
            $strResultado .= $intereslaborals->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>