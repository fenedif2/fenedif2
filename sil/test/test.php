<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
    if(!(isset($_SESSION["usuario"])))
    header( "Location:". INICIO_URL );
    include_once( CLASS_PATH . "class.clinterfaz.php" );
    include_once( CLASS_PATH . "class.cltest.php" );
	  
    $interfaz = new clInterfaz();
    $test = new clTest();
    
    $strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
			$test->setStrCodigo($_REQUEST["strCodigo"]);
            $test->setStrLectura("");
            $test->setStrEtiqueta("Ingreso&nbsp;Seguimiento");
            $test->setStrNombreBoton("btnGuardar");
            $test->setStrValorBoton("Guardar");
            $test->setStrFechaInicio(date("Y-m-d"));
            $strResultado .= $test->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			$strResultado .= $test->getStrListar();
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ):            
            $test->setStrNombre($_POST["strNombre"]);
			$test->setstrFechaInicio($_POST["dtFechai"]);
			$test->setstrContacto($_POST["strContacto"]);
			$test->setstrAsunto($_POST["strAsunto"]);
			$test->setStrCodigo($_POST["strCodigo"]);
			
			
	       if($test->getStrIngresar())
		   {
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            $strResultado .= $test->getStrListar().'<br>';
            break;
			 case( $_REQUEST["btnEditar"] == "Actualizar" ):
			$test->setStrCodigo($_POST["strCodigo"]);
			$test->setstrFechaInicio($_POST["dtFechai"]);
			$test->setstrContacto($_POST["strContacto"]);
			$test->setstrAsunto($_POST["strAsunto"]);
			
			
            if($test->getStrActualizar())
                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';

            $strResultado .= $test->getStrListar().'<br>';
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
            $test->setStrCodigo($_REQUEST["strCodigo"]);
            $test->setStrEtiqueta("Actualizar&nbsp;Seguimiento");
            $test->setStrNombreBoton("btnEditar");
            $test->setStrValorBoton("Actualizar");

            if($test->getStrBuscar())
                $strResultado .= $test->getStrFormulario();
            else {
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
                $strResultado .= $test->getStrListar();
            }
            break;
            case( $_REQUEST["btnEliminar"] == "Eliminar" ):
	            $test->setStrCodigo($_REQUEST["strCodigo"]);
	            if ($test->getStrBuscar())
	                if($test->getStrEliminar())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
	
	            $strResultado .= $test->getStrListar().'<br>';
            break;
			
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $test->setStrCodigo($_REQUEST["strCodigo"]);
            if ($test->getStrBuscar())
                $strResultado .= $test->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $test->getStrListar().'<br>';
                }
            break;
      //Cuando cambia el combo de la Provincia
        
       
  
        default:
            $strResultado .= $test->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>