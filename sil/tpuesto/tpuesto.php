<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    	include_once( CLASS_PATH . "class.clinterfaz.php" );
    	include_once( CLASS_PATH . "class.cltpuesto.php" );
	  	include_once( CLASS_PATH . "class.clcformativo.php" );
     	$interfaz = new clInterfaz();
    	$tpuesto = new clTpuesto();
		$strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
			$tpuesto->setStrCodigo($_REQUEST["strCodigo"]);
			$tpuesto->setStrLectura("");
			$tpuesto->setStrEtiqueta("PUESTO DISPONIBLE");
		    $tpuesto->setStrNombreBoton("btnGuardar");
	        $tpuesto->setStrValorBoton("Guardar");
	        $strResultado .= $tpuesto->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			$strResultado .= $tpuesto->getStrListar();
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ):            
            $tpuesto->setStrFacceso($_POST["lsFacceso"]);
			$tpuesto->setStrCodigo($_POST["strCodigo"]);
            if($tpuesto->getStrIngresar())
		   {
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            $strResultado .= $tpuesto->getStrListar().'<br>';
            break;
			 case( $_REQUEST["btnEditar"] == "Actualizar" ):
					 $tpuesto->setStrFacceso($_POST["lsFacceso"]);
					$tpuesto->setStrCodigo($_POST["strCodigo"]);
		            if($tpuesto->getStrActualizar())
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
		            else
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';
		
		            $strResultado .= '<meta http-equiv="Refresh" content="0;url=../cformativo/cformativo.php">';
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
		            $tpuesto->setStrCodigo($_REQUEST["strCodigo"]);
		            $tpuesto->setStrEtiqueta("ACTUALIZAR PUESTO DISPONIBLE");
		            $tpuesto->setStrNombreBoton("btnEditar");
		            $tpuesto->setStrValorBoton("Actualizar");
		
		            if($tpuesto->getStrBuscar())
		                $strResultado .= $tpuesto->getStrFormulario();
		            else {
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
		                $strResultado .= $tpuesto->getStrListar();
		            }
            break;
			case( $_REQUEST["btnEliminar"] == "Eliminar" ):
	            $tpuesto->setStrCodigo($_REQUEST["strCodigo"]);
	            if ($tpuesto->getStrBuscar())
	                if($tpuesto->getStrEliminar())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
	
	     			$strResultado .= '<meta http-equiv="Refresh" content="0;url=../cformativo/cformativo.php">';
            break;
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $tpuesto->setStrCodigo($_REQUEST["strCodigo"]);
            if ($tpuesto->getStrBuscar())
                $strResultado .= $tpuesto->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $tpuesto->getStrListar().'<br>';
                }
            break;
      
        default:
            $strResultado .= $tpuesto->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>