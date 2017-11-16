<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
    if(!(isset($_SESSION["usuario"])))
    header( "Location:". INICIO_URL );
    include_once( CLASS_PATH . "class.clinterfaz.php" );
    include_once( CLASS_PATH . "class.clempleof.php" );
	  
    $interfaz = new clInterfaz();
    $empleof = new clEmpleof();
    
    $strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
			$empleof->setStrCodigo($_REQUEST["strCodigo"]);
            $empleof->setStrLectura("");
            $empleof->setStrEtiqueta("INGRESAR SEGUIMIENTO");
            $empleof->setStrNombreBoton("btnGuardar");
            $empleof->setStrValorBoton("Guardar");
            $empleof->setStrFechaInicio(date("Y-m-d"));
			$empleof->setStrNombreBotona("btnAnterior");
	        $empleof->setStrValorBotona("Anterior");
            $strResultado .= $empleof->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			$strResultado .= $empleof->getStrListar();
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ):            
            $empleof->setstrFechaInicio($_POST["dtFechai"]);
			$empleof->setstrTipo($_POST["lsTipo"]);
			$empleof->setstrObservacion($_POST["strObservacion"]);
			$empleof->setStrCodigo($_POST["strCodigo"]);
			
			
	       if($empleof->getStrIngresar())
		   {
              $valor=$empleof->getStrCodigo();
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".EMPLEOF_URL."empleof.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            $strResultado .= $empleof->getStrListar().'<br>';
            break;
			 case( $_REQUEST["btnEditar"] == "Actualizar" ):
				 $empleof->setStrCodigo($_POST["strCodigo"]);
				$empleof->setstrFechaInicio($_POST["dtFechai"]);
				$empleof->setstrTipo($_POST["lsTipo"]);
				$empleof->setstrObservacion($_POST["strObservacion"]);
				
            if($empleof->getStrActualizar())
                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';

            	$valor=$empleof->getStrCodigo();
			 	$v=$empleof->getStrBuscaremp($valor);
            	$strResultado .= '<meta http-equiv="Refresh" content="0;url=../empleof/empleof.php?btnNuevo=Nuevo&strCodigo='.$v.'">';	
            break;
			case( $_REQUEST["btnAnterior"] == "Anterior" ):            
            	$empleof->setStrCodigo($_POST["strCodigo"]);
        	   	$valor=$empleof->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".COMPETENCIAS_URL."competencias.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            break; 
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
            $empleof->setStrCodigo($_REQUEST["strCodigo"]);
            $empleof->setStrEtiqueta("ACTUALIZAR SEGUIMIENTO");
            $empleof->setStrNombreBoton("btnEditar");
            $empleof->setStrValorBoton("Actualizar");

            if($empleof->getStrBuscar())
                $strResultado .= $empleof->getStrFormulario();
            else {
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
                $strResultado .= $empleof->getStrListar();
            }
            break;
             case( $_REQUEST["btnEliminar"] == "Eliminar" ):
	            $empleof->setStrCodigo($_REQUEST["strCodigo"]);
				 $valor=$empleof->getStrCodigo();
			 	$v=$empleof->getStrBuscaremp($valor);
	            if ($empleof->getStrBuscar())
	                if($empleof->getStrEliminar())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar Competencia [Competencias]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
	
	            
            	$strResultado .= '<meta http-equiv="Refresh" content="0;url=../empleof/empleof.php?btnNuevo=Nuevo&strCodigo='.$v.'">';	
            break;
			
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $empleof->setStrCodigo($_REQUEST["strCodigo"]);
            if ($empleof->getStrBuscar())
                $strResultado .= $empleof->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $empleof->getStrListar().'<br>';
                }
            break;
      //Cuando cambia el combo de la Provincia
        
       
  
        default:
            $strResultado .= $empleof->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>