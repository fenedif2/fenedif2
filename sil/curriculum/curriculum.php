<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
    if(!(isset($_SESSION["usuario"])))
    header( "Location:". INICIO_URL );
    include_once( CLASS_PATH . "class.clinterfaz.php" );
    include_once( CLASS_PATH . "class.clcurriculum.php" );
	  
    $interfaz = new clInterfaz();
    $curriculum = new clCurriculum();
    
    $strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
			$curriculum->setStrCodigo($_REQUEST["strCodigo"]);
            $curriculum->setStrLectura("");
            $curriculum->setStrEtiqueta("Ingreso&nbsp;Seguimiento");
            $curriculum->setStrNombreBoton("btnGuardar");
            $curriculum->setStrValorBoton("Guardar");
            $curriculum->setStrFechaInicio(date("Y-m-d"));
            $strResultado .= $curriculum->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			$strResultado .= $curriculum->getStrListar();
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ):            
            $curriculum->setStrNombre($_POST["strNombre"]);
			$curriculum->setstrFechaInicio($_POST["dtFechai"]);
			$curriculum->setstrContacto($_POST["strContacto"]);
			$curriculum->setstrAsunto($_POST["strAsunto"]);
			$curriculum->setStrCodigo($_POST["strCodigo"]);
			
			
	       if($curriculum->getStrIngresar())
		   {
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            $strResultado .= $curriculum->getStrListar().'<br>';
            break;
			 case( $_REQUEST["btnEditar"] == "Actualizar" ):
			$curriculum->setStrCodigo($_POST["strCodigo"]);
			$curriculum->setstrFechaInicio($_POST["dtFechai"]);
			$curriculum->setstrContacto($_POST["strContacto"]);
			$curriculum->setstrAsunto($_POST["strAsunto"]);
			
			
            if($curriculum->getStrActualizar())
                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';

            $strResultado .= $curriculum->getStrListar().'<br>';
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
            $curriculum->setStrCodigo($_REQUEST["strCodigo"]);
            $curriculum->setStrEtiqueta("Actualizar&nbsp;Seguimiento");
            $curriculum->setStrNombreBoton("btnEditar");
            $curriculum->setStrValorBoton("Actualizar");

            if($curriculum->getStrBuscar())
                $strResultado .= $curriculum->getStrFormulario();
            else {
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
                $strResultado .= $curriculum->getStrListar();
            }
            break;
            case( $_REQUEST["btnEliminar"] == "Eliminar" ):
	            $curriculum->setStrCodigo($_REQUEST["strCodigo"]);
	            if ($curriculum->getStrBuscar())
	                if($curriculum->getStrEliminar())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
	
	            $strResultado .= $curriculum->getStrListar().'<br>';
            break;
			
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $curriculum->setStrCodigo($_REQUEST["strCodigo"]);
            if ($curriculum->getStrBuscar())
                $strResultado .= $curriculum->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $curriculum->getStrListar().'<br>';
                }
            break;
      //Cuando cambia el combo de la Provincia
        
       
  
        default:
            $strResultado .= $curriculum->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>