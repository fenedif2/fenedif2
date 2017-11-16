<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
    if(!(isset($_SESSION["usuario"])))
    header( "Location:". INICIO_URL );
    include_once( CLASS_PATH . "class.clinterfaz.php" );
    include_once( CLASS_PATH . "class.cltseguimientoemp.php" );
	  
    $interfaz = new clInterfaz();
    $tseguimientoemp = new clTseguimientoemp();
    
    $strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
			$tseguimientoemp->setStrCodigo($_REQUEST["strCodigo"]);
            $tseguimientoemp->setStrLectura("");
            $tseguimientoemp->setStrEtiqueta("INGRESO SEGUIMIENTO");
            $tseguimientoemp->setStrNombreBoton("btnGuardar");
            $tseguimientoemp->setStrValorBoton("Guardar");
            $tseguimientoemp->setStrFechaInicio(date("Y-m-d"));
            $strResultado .= $tseguimientoemp->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			$strResultado .= $tseguimientoemp->getStrListar();
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ):            
            $tseguimientoemp->setStrNombre($_POST["strNombre"]);
			$tseguimientoemp->setstrFechaInicio($_POST["dtFechai"]);
			$tseguimientoemp->setstrContacto($_POST["strContacto"]);
			$tseguimientoemp->setstrAsunto($_POST["strAsunto"]);
			$tseguimientoemp->setStrCodigo($_POST["strCodigo"]);
			
			
	       if($tseguimientoemp->getStrIngresar())
		   {
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            $strResultado .= $tseguimientoemp->getStrListar().'<br>';
            break;
			 case( $_REQUEST["btnEditar"] == "Actualizar" ):
			$tseguimientoemp->setStrCodigo($_POST["strCodigo"]);
			$tseguimientoemp->setstrFechaInicio($_POST["dtFechai"]);
			$tseguimientoemp->setstrContacto($_POST["strContacto"]);
			$tseguimientoemp->setstrAsunto($_POST["strAsunto"]);
			
			
            if($tseguimientoemp->getStrActualizar())
                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';

            $strResultado .= $tseguimientoemp->getStrListar().'<br>';
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
            $tseguimientoemp->setStrCodigo($_REQUEST["strCodigo"]);
            $tseguimientoemp->setStrEtiqueta("Actualizar&nbsp;Seguimiento");
            $tseguimientoemp->setStrNombreBoton("btnEditar");
            $tseguimientoemp->setStrValorBoton("Actualizar");

            if($tseguimientoemp->getStrBuscar())
                $strResultado .= $tseguimientoemp->getStrFormulario();
            else {
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
                $strResultado .= $tseguimientoemp->getStrListar();
            }
            break;
            case( $_REQUEST["btnEliminar"] == "Eliminar" ):
	            $tseguimientoemp->setStrCodigo($_REQUEST["strCodigo"]);
	            if ($tseguimientoemp->getStrBuscar())
	                if($tseguimientoemp->getStrEliminar())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
	
	            $strResultado .= $tseguimientoemp->getStrListar().'<br>';
            break;
			
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $tseguimientoemp->setStrCodigo($_REQUEST["strCodigo"]);
            if ($tseguimientoemp->getStrBuscar())
                $strResultado .= $tseguimientoemp->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $tseguimientoemp->getStrListar().'<br>';
                }
            break;
      //Cuando cambia el combo de la Provincia
        
       
  
        default:
            $strResultado .= $tseguimientoemp->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>