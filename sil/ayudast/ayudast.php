<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    	include_once( CLASS_PATH . "class.clinterfaz.php" );
    	include_once( CLASS_PATH . "class.clayudast.php" );
	  	$interfaz = new clInterfaz();
    	$ayudast = new clAyudast();
		$strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
			$ayudast->setStrCodigo($_REQUEST["strCodigo"]);
			$ayudast->setStrLectura("");
			$ayudast->setStrEtiqueta("Ingresar Ayudas Técnicas");
		    $ayudast->setStrNombreBoton("btnGuardar");
	        $ayudast->setStrValorBoton("Guardar");
			$ayudast->setStrNombreBotons("btnSiguiente");
	        $ayudast->setStrValorBotons("Siguiente");
			$ayudast->setStrNombreBotona("btnAnterior");
	        $ayudast->setStrValorBotona("Anterior");
			$strResultado .= $ayudast->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			$strResultado .= $ayudast->getStrListar();
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ):            
            $ayudast->setStrCodigo($_POST["strCodigo"]);
        	$ayudast->setStrAtecnicas($_POST["lsAtecnicas"]);
			;
			
            if($ayudast->getStrIngresar())
		   {
               $valor=$ayudast->getStrCodigo();
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".AYUDAST_URL."ayudast.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            $strResultado .= $ayudast->getStrListar().'<br>';
            break;
			case( $_REQUEST["btnSiguiente"] == "Siguiente" ):            
            	$ayudast->setStrCodigo($_POST["strCodigo"]);
        	   	$valor=$ayudast->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".DISCAPACIDAD_URL."discapacidad.php?btnNuevo=Nuevo&strCodigo=".$valor."");
           
            break;
			case( $_REQUEST["btnAnterior"] == "Anterior" ):            
            	$ayudast->setStrCodigo($_POST["strCodigo"]);
        	   	$valor=$ayudast->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".NINOS_URL."ninos.php?btnNuevo=Nuevo&strCodigo=".$valor."");
           
            break;
			 case( $_REQUEST["btnEditar"] == "Actualizar" ):
			$ayudast->setStrCodigo($_POST["strCodigo"]);
        	$ayudast->setStrAtecnicas($_POST["lsAtecnicas"]);
			
			$valor=$ayudast->getStrCodigo();
			 	$v=$ayudast->getStrBuscarpd($valor);
			if($ayudast->getStrActualizar())
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
		            else
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';
		
		            header("Location:".AYUDAST_URL."ayudast.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
		            $ayudast->setStrCodigo($_REQUEST["strCodigo"]);
		            $ayudast->setStrEtiqueta("Actualizar&nbsp; Forma de Ayuda Técnica");
		            $ayudast->setStrNombreBoton("btnEditar");
		            $ayudast->setStrValorBoton("Actualizar");
		
		            if($ayudast->getStrBuscar())
		                $strResultado .= $ayudast->getStrFormulario();
		            else {
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
		                $strResultado .= $ayudast->getStrListar();
		            }
            break;
			case( $_REQUEST["btnEliminar"] == "Eliminar" ):
	            $ayudast->setStrCodigo($_REQUEST["strCodigo"]);
	            
	            $valor=$ayudast->getStrCodigo();
			 	$v=$ayudast->getStrBuscarpd($valor);
	            if ($ayudast->getStrBuscar())
	                if($ayudast->getStrEliminar())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
	
	     			 header("Location:".AYUDAST_URL."ayudast.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $ayudast->setStrCodigo($_REQUEST["strCodigo"]);
            if ($ayudast->getStrBuscar())
                $strResultado .= $ayudast->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $ayudast->getStrListar().'<br>';
                }
            break;
			case( $_REQUEST["btnBuscar"] == "pafectadas" ):
            $pafectadas = new clPafectadas();
            $ayudast->setStrTayudast($_REQUEST["strCodigoTayudast"]);
            $strResultado .= print($pafectadas->getStrListar($ayudast->getStrTayudast(), $ayudast->getStrPafectadas()));
            exit;
			//Cuando cambia el combo del Canton
        	case( $_REQUEST["btnBuscar"] == "tnivelavance" ):            
            $tnivelavance = new clTnivelavance();
            $ayudast->setStrPafectadas($_REQUEST["strCodigoPafectadas"]);
            $strResultado = print($tnivelavance->getStrListar($ayudast->getStrPafectadas(), $ayudast->getStrTnivelavance()));
            exit;
      	
        default:
            $strResultado .= $ayudast->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>