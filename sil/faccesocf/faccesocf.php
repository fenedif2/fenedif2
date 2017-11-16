<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    	include_once( CLASS_PATH . "class.clinterfaz.php" );
    	include_once( CLASS_PATH . "class.clfaccesocf.php" );
	  	include_once( CLASS_PATH . "class.clcformativo.php" );
     	$interfaz = new clInterfaz();
    	$faccesocf = new clFaccesocf();
		$strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
			$faccesocf->setStrCodigo($_REQUEST["strCodigo"]);
			$faccesocf->setStrLectura("");
			$faccesocf->setStrEtiqueta("INGRESAR FORMA ACCESO");
		    $faccesocf->setStrNombreBoton("btnGuardar");
	        $faccesocf->setStrValorBoton("Guardar");
			$faccesocf->setStrNombreBotons("btnSiguiente");
	        $faccesocf->setStrValorBotons("Siguiente");
	        $strResultado .= $faccesocf->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			$strResultado .= $faccesocf->getStrListar();
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ):            
            $faccesocf->setStrFacceso($_POST["lsFacceso"]);
			$faccesocf->setStrCodigo($_POST["strCodigo"]);
            if($faccesocf->getStrIngresar())
		   {
		   		$valor=$faccesocf->getStrCodigo();
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".FACCESOCF_URL."faccesocf.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            $strResultado .= $faccesocf->getStrListar().'<br>';
            break;
			case( $_REQUEST["btnSiguiente"] == "Siguiente" ):            
           		$faccesocf->setStrCodigo($_POST["strCodigo"]);
           		$valor=$faccesocf->getStrCodigo();
               //$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".ACCESIBILIDADCF_URL."accesibilidadcf.php?btnNuevo=Nuevo&strCodigo=".$valor."");
	        break;
			 case( $_REQUEST["btnEditar"] == "Actualizar" ):
					 $faccesocf->setStrFacceso($_POST["lsFacceso"]);
					$faccesocf->setStrCodigo($_POST["strCodigo"]);
					
					$valor=$faccesocf->getStrCodigo();
			 		$v=$faccesocf->getStrBuscarfacf($valor);
		            if($faccesocf->getStrActualizar())
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
		            else
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';
		
		            header("Location:".FACCESOCF_URL."faccesocf.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
		            $faccesocf->setStrCodigo($_REQUEST["strCodigo"]);
		            $faccesocf->setStrEtiqueta("ACTUALIZAR FORMA DE ACCESO");
		            $faccesocf->setStrNombreBoton("btnEditar");
		            $faccesocf->setStrValorBoton("Actualizar");
		
		            if($faccesocf->getStrBuscar())
		                $strResultado .= $faccesocf->getStrFormulario();
		            else {
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
		                $strResultado .= $faccesocf->getStrListar();
		            }
            break;
			case( $_REQUEST["btnEliminar"] == "Eliminar" ):
	            $faccesocf->setStrCodigo($_REQUEST["strCodigo"]);
	            
	            	$valor=$faccesocf->getStrCodigo();
			 		$v=$faccesocf->getStrBuscarfacf($valor);
	            if ($faccesocf->getStrBuscar())
	                if($faccesocf->getStrEliminar())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
	
	     			header("Location:".FACCESOCF_URL."faccesocf.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $faccesocf->setStrCodigo($_REQUEST["strCodigo"]);
            if ($faccesocf->getStrBuscar())
                $strResultado .= $faccesocf->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $faccesocf->getStrListar().'<br>';
                }
            break;
      
        default:
            $strResultado .= $faccesocf->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>