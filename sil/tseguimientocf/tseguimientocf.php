<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
    if(!(isset($_SESSION["usuario"])))
    header( "Location:". INICIO_URL );
    include_once( CLASS_PATH . "class.clinterfaz.php" );
    include_once( CLASS_PATH . "class.cltseguimientocf.php" );
	  
    $interfaz = new clInterfaz();
    $tseguimientocf = new clTseguimientocf();
    
    $strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
			$tseguimientocf->setStrCodigo($_REQUEST["strCodigo"]);
            $tseguimientocf->setStrLectura("");
            $tseguimientocf->setStrEtiqueta("INGRESAR SEGUIMIENTO");
            $tseguimientocf->setStrNombreBoton("btnGuardar");
            $tseguimientocf->setStrValorBoton("Guardar");
			$tseguimientocf->setStrNombreBotona("btnAnterior");
	        $tseguimientocf->setStrValorBotona("Anterior");
            $tseguimientocf->setStrFechaInicio(date("Y-m-d"));
            $strResultado .= $tseguimientocf->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			$strResultado .= $tseguimientocf->getStrListar();
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ):            
            $tseguimientocf->setStrNombre($_POST["strNombre"]);
			$tseguimientocf->setstrFechaInicio($_POST["dtFechai"]);
			$tseguimientocf->setstrContacto($_POST["strContacto"]);
			$tseguimientocf->setstrAsunto($_POST["strAsunto"]);
			$tseguimientocf->setStrCodigo($_POST["strCodigo"]);
			
			
	       if($tseguimientocf->getStrIngresar())
		   {
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            		$valor=$tseguimientocf->getStrCodigo();
            		header("Location:".TSEGUIMIENTOCF_URL."tseguimientocf.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            $strResultado .= $tseguimientocf->getStrListar().'<br>';
            break;
			 case( $_REQUEST["btnEditar"] == "Actualizar" ):
			$tseguimientocf->setStrCodigo($_POST["strCodigo"]);
			$tseguimientocf->setstrFechaInicio($_POST["dtFechai"]);
			$tseguimientocf->setstrContacto($_POST["strContacto"]);
			$tseguimientocf->setstrAsunto($_POST["strAsunto"]);
			
			$valor=$tseguimientocf->getStrCodigo();
			$v=$tseguimientocf->getStrBuscartscf($valor);
            if($tseguimientocf->getStrActualizar())
                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';

            header("Location:".TSEGUIMIENTOCF_URL."tseguimientocf.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
            $tseguimientocf->setStrCodigo($_REQUEST["strCodigo"]);
            $tseguimientocf->setStrEtiqueta("ACTUALIZAR SEGUIMIENTO");
            $tseguimientocf->setStrNombreBoton("btnEditar");
            $tseguimientocf->setStrValorBoton("Actualizar");

            if($tseguimientocf->getStrBuscar())
                $strResultado .= $tseguimientocf->getStrFormulario();
            else {
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
                $strResultado .= $tseguimientocf->getStrListar();
            }
            break;
			case( $_REQUEST["btnAnterior"] == "Anterior" ):            
            	$tseguimientocf->setStrCodigo($_POST["strCodigo"]);
        	   	$valor=$tseguimientocf->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".TCURSOCF_URL."tcursocf.php?btnNuevo=Nuevo&strCodigo=".$valor."");
           
         	break; 
            case( $_REQUEST["btnEliminar"] == "Eliminar" ):
	            $tseguimientocf->setStrCodigo($_REQUEST["strCodigo"]);
				$valor=$tseguimientocf->getStrCodigo();
			$v=$tseguimientocf->getStrBuscartscf($valor);
	            if ($tseguimientocf->getStrBuscar())
	                if($tseguimientocf->getStrEliminar())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
	
	            header("Location:".TSEGUIMIENTOCF_URL."tseguimientocf.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
			
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $tseguimientocf->setStrCodigo($_REQUEST["strCodigo"]);
            if ($tseguimientocf->getStrBuscar())
                $strResultado .= $tseguimientocf->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $tseguimientocf->getStrListar().'<br>';
                }
            break;
      //Cuando cambia el combo de la Provincia
        
       
  
        default:
            $strResultado .= $tseguimientocf->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>