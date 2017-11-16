<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
    if(!(isset($_SESSION["usuario"])))
    header( "Location:". INICIO_URL );
    include_once( CLASS_PATH . "class.clinterfaz.php" );
    include_once( CLASS_PATH . "class.clapuesto.php" );
	  
    $interfaz = new clInterfaz();
    $apuesto = new clApuesto();
    
    $strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
			$apuesto->setStrLectura("");
            $apuesto->setStrCodigo($_REQUEST["strCodigo"]);
			$apuesto->setStrEtiqueta("ANÁLISIS");
            $apuesto->setStrNombreBoton("btnGuardar");
            $apuesto->setStrValorBoton("Guardar");
			$apuesto->setStrNombreBotons("btnSiguiente");
            $apuesto->setStrValorBotons("Siguiente");
			$apuesto->setStrNombreBotona("btnAnterior");
	        $apuesto->setStrValorBotona("Anterior");
            $strResultado .= $apuesto->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			$strResultado .= $apuesto->getStrListar();
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ):            
            $apuesto->setstrAtecnico($_POST["strAtecnico"]);
			$apuesto->setstrPtecnico($_POST["strPtecnico"]);
			$apuesto->setstrTipopuesto($_POST["lsTipopuesto"]);
			$apuesto->setstrLtrabajo($_POST["strLtrabajo"]);
			$apuesto->setstrNvacantes($_POST["lsNvacantes"]);
			$apuesto->setstrCategoriac($_POST["Categoriac"]);
			$apuesto->setstrTipocargo($_POST["lsTipc"]);
			$apuesto->setstrComputador($_POST["strComputador"]);
			$apuesto->setstrInstrumento($_POST["strInstrumento"]);
			$apuesto->setstrMaquinaria($_POST["strMaquinaria"]);
			$apuesto->setstrVehiculo($_POST["strVehiculo"]);
			$apuesto->setstrDfunciones($_POST["strDfunciones"]);
			$apuesto->setstrVehiculod($_POST["strVehiculod"]);
			$apuesto->setStrCodigo($_POST["strCodigo"]);
			
			
	       if($apuesto->getStrIngresar())
		   {
		   		$valor=$apuesto->getStrCodigo();
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".APUESTO_URL."apuesto.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            //$strResultado .= $apuesto->getStrListar().'<br>';
            break;
			case( $_REQUEST["btnSiguiente"] == "Siguiente" ):            
            $apuesto->setStrCodigo($_POST["strCodigo"]);
		   	$valor=$apuesto->getStrCodigo();
               //$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".TFORMACIONREMP_URL."tformacionremp.php?btnNuevo=Nuevo&strCodigo=".$valor."");
	        //$strResultado .= $apuesto->getStrListar().'<br>';
            break;
            case( $_REQUEST["btnAnterior"] == "Anterior" ):            
            	$apuesto->setStrCodigo($_POST["strCodigo"]);
        	   	$valor=$apuesto->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".TCONTACTOEMP_URL."tcontactoemp.php?btnNuevo=Nuevo&strCodigo=".$valor."");
           
            break; 
			 case( $_REQUEST["btnEditar"] == "Actualizar" ):
			$apuesto->setStrCodigo($_POST["strCodigo"]);
			$apuesto->setstrAtecnico($_POST["strAtecnico"]);
			$apuesto->setstrPtecnico($_POST["strPtecnico"]);
			$apuesto->setstrTipopuesto($_POST["lsTipopuesto"]);
			$apuesto->setstrLtrabajo($_POST["strLtrabajo"]);
			$apuesto->setstrNvacantes($_POST["lsNvacantes"]);
			$apuesto->setstrCategoriac($_POST["Categoriac"]);
			$apuesto->setstrTipocargo($_POST["lsTipc"]);
			$apuesto->setstrComputador($_POST["strComputador"]);
			$apuesto->setstrInstrumento($_POST["strInstrumento"]);
			$apuesto->setstrMaquinaria($_POST["strMaquinaria"]);
			$apuesto->setstrVehiculo($_POST["strVehiculo"]);
			$apuesto->setstrDfunciones($_POST["strDfunciones"]);
			$apuesto->setstrVehiculod($_POST["strVehiculod"]);
			
			$valor=$apuesto->getStrCodigo();
			$v=$apuesto->getStrBuscarempuesto($valor);
		    if($apuesto->getStrActualizar())
			{
                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
				
			}
		    else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';

            	
            	header("Location:".APUESTO_URL."apuesto.php?btnNuevo=Nuevo&strCodigo=".$v."");	
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
            $apuesto->setStrCodigo($_REQUEST["strCodigo"]);
            $apuesto->setStrEtiqueta("ANÁLISIS PUESTO");
            $apuesto->setStrNombreBoton("btnEditar");
            $apuesto->setStrValorBoton("Actualizar");

            if($apuesto->getStrBuscar())
                $strResultado .= $apuesto->getStrFormulario();
            else {
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
                $strResultado .= $apuesto->getStrListar();
            }
            break;
            case( $_REQUEST["btnEliminar"] == "Eliminar" ):
	            $apuesto->setStrCodigo($_REQUEST["strCodigo"]);
	            
				$valor=$apuesto->getStrCodigo();
			$v=$apuesto->getStrBuscarempuesto($valor);
	            if ($apuesto->getStrBuscar())
	                if($apuesto->getStrEliminar())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
	
	            header("Location:".APUESTO_URL."apuesto.php?btnNuevo=Nuevo&strCodigo=".$v."");	
            break;
			
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $apuesto->setStrCodigo($_REQUEST["strCodigo"]);
            if ($apuesto->getStrBuscar())
                $strResultado .= $apuesto->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $apuesto->getStrListar().'<br>';
                }
            break;
      //Cuando cambia el combo de la Provincia
        
       
  
        default:
            $strResultado .= $apuesto->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>