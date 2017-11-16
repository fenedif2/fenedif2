<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    	include_once( CLASS_PATH . "class.clinterfaz.php" );
    	include_once( CLASS_PATH . "class.claccesibilidadcf.php" );
		include_once( CLASS_PATH . "class.clcformativo.php" );
	  	$interfaz = new clInterfaz();
    	$accesibilidadcf = new clAccesibilidadcf();
		$strResultado = "";
		
    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
			$accesibilidadcf->setStrCodigo($_REQUEST["strCodigo"]);
			$accesibilidadcf->setStrLectura("");
			$accesibilidadcf->setStrEtiqueta("INGRESAR ACCESIBILIDAD");
		    $accesibilidadcf->setStrNombreBoton("btnGuardar");
	        $accesibilidadcf->setStrValorBoton("Guardar");
			$accesibilidadcf->setStrNombreBotons("btnSiguiente");
	        $accesibilidadcf->setStrValorBotons("Siguiente");
			$accesibilidadcf->setStrNombreBotona("btnAnterior");
	        $accesibilidadcf->setStrValorBotona("Anterior");
	        $strResultado .= $accesibilidadcf->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			$strResultado .=  $accesibilidadcf->getStrListar();
            break;
        case( $_REQUEST["btnGuardar"] == "Guardar" ):            
            $accesibilidadcf->setStrAccesibilidad($_POST["lsAccesibilidad"]);
			$accesibilidadcf->setStrCodigo($_POST["strCodigo"]);
            if($accesibilidadcf->getStrIngresar())
		   {
               $valor=$accesibilidadcf->getStrCodigo();
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".ACCESIBILIDADCF_URL."accesibilidadcf.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            $strResultado .= $accesibilidadcf->getStrListar().'<br>';
            break;
            case( $_REQUEST["btnAnterior"] == "Anterior" ):            
            	$accesibilidadcf->setStrCodigo($_POST["strCodigo"]);
        	   	$valor=$accesibilidadcf->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".FACCESOCF_URL."faccesocf.php?btnNuevo=Nuevo&strCodigo=".$valor."");
           
         	break; 
            case( $_REQUEST["btnSiguiente"] == "Siguiente" ):            
            $accesibilidadcf->setStrCodigo($_POST["strCodigo"]);
            
               $valor=$accesibilidadcf->getStrCodigo();
               //$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".PERFILCF_URL."perfilcf.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            break;
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $accesibilidadcf->setStrCodigo($_REQUEST["strCodigo"]);
            if ($accesibilidadcf->getStrBuscar())
                $strResultado .= $accesibilidadcf->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $accesibilidadcf->getStrListar().'<br>';
                }
            break;
			case( $_REQUEST["btnEditar"] == "Actualizar" ):
					 $accesibilidadcf->setStrAccesibilidad($_POST["lsAccesibilidad"]);
					$accesibilidadcf->setStrCodigo($_POST["strCodigo"]);
					
					$valor=$accesibilidadcf->getStrCodigo();
			 		$v=$accesibilidadcf->getStrBuscaracf($valor);
		            if($accesibilidadcf->getStrActualizar())
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
		            else
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';
		
		           header("Location:".ACCESIBILIDADCF_URL."accesibilidadcf.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
			case( $_REQUEST["btnEliminar"] == "Eliminar" ):
	            $accesibilidadcf->setStrCodigo($_REQUEST["strCodigo"]);
				
				$valor=$accesibilidadcf->getStrCodigo();
			 		$v=$accesibilidadcf->getStrBuscaracf($valor);
	            if ($accesibilidadcf->getStrBuscar())
	                if($accesibilidadcf->getStrEliminar())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
	
	     			header("Location:".ACCESIBILIDADCF_URL."accesibilidadcf.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
		            $accesibilidadcf->setStrCodigo($_REQUEST["strCodigo"]);
		            $accesibilidadcf->setStrEtiqueta("ACTUALIZAR ACCESIBILIDAD");
		            $accesibilidadcf->setStrNombreBoton("btnEditar");
		            $accesibilidadcf->setStrValorBoton("Actualizar");
		
		            if($accesibilidadcf->getStrBuscar())
		                $strResultado .= $accesibilidadcf->getStrFormulario();
		            else {
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
		                $strResultado .= $accesibilidadcf->getStrListar();
		            }
            break;
       
        default:
            $strResultado .= $accesibilidadcf->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>