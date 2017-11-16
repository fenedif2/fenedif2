<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    include_once( CLASS_PATH . "class.clinterfaz.php" );
    include_once( CLASS_PATH . "class.clterapeutico.php" );

    $interfaz = new clInterfaz();
    $terapeutico = new clterapeutico();
    
    $strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
            $terapeutico->setStrLectura("");
            
            $terapeutico->setStrEtiqueta("DECISIONES SOBRE EL TRATAMIENTO PSICOTERAPÉUTICO");
            $terapeutico->setStrNombreBoton("btnGuardar");
            $terapeutico->setStrValorBoton("Guardar");
 		    $strResultado .= $terapeutico->getStrFormulario();
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ): 
        	$terapeutico->setstrTartamientop($_POST["lsTartamientop"]);
            $terapeutico->setstrTratamientoi($_POST["lsTratamientoi"]);
			$terapeutico->setstrTratamientor($_POST["lsTratamientor"]);
						
			
	       if($terapeutico->getStrIngresar())
		   {
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            //$strResultado .= $terapeutico->getStrListar().'<br>';
            break;
			 case( $_REQUEST["btnEditar"] == "Actualizar" ):
			$terapeutico->setStrCodigo($_POST["strCodigo"]);          
            $terapeutico->setstrTartamientop($_POST["lsTartamientop"]);
            $terapeutico->setstrTratamientoi($_POST["lsTratamientoi"]);
			$terapeutico->setstrTratamientor($_POST["lsTratamientor"]);
			
		
            if($terapeutico->getStrActualizar())
                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';

            $strResultado .= $terapeutico->getStrListar().'<br>';
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
            $terapeutico->setStrCodigo($_REQUEST["strCodigo"]);
            $terapeutico->setStrEtiqueta("Actualizar&nbsp;Ciudadano");
            $terapeutico->setStrNombreBoton("btnEditar");
            $terapeutico->setStrValorBoton("Actualizar");

            if($terapeutico->getStrBuscar())
                $strResultado .= $terapeutico->getStrFormulario();
            else {
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
                $strResultado .= $terapeutico->getStrListar();
            }
            break;
            case( $_REQUEST["btnEliminar"] == "Eliminar" ):
            $terapeutico->setStrCodigo($_REQUEST["strCodigo"]);
            if ($terapeutico->getStrBuscar())
                if($terapeutico->getStrEliminar())
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
                else
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';

            $strResultado .= $terapeutico->getStrListar().'<br>';
            break;
			
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $terapeutico->setStrCodigo($_REQUEST["strCodigo"]);
            if ($terapeutico->getStrBuscar())
                $strResultado .= $terapeutico->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $terapeutico->getStrListar().'<br>';
                }
            break;
     //Cuando cambia el combo de la Provincia
        
        default:
            $strResultado .= $terapeutico->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>