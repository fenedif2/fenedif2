<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    	include_once( CLASS_PATH . "class.clinterfaz.php" );
    	include_once( CLASS_PATH . "class.cldisponibilidadl.php" );
		
	  	$interfaz = new clInterfaz();
    	$disponibilidadl = new clDisponibilidadl();
		$strResultado = "";
		
    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
			$disponibilidadl->setStrCodigo($_REQUEST["strCodigo"]);
			$disponibilidadl->setStrLectura("");
			$disponibilidadl->setStrEtiqueta("INGRESAR DISPONIBILIDAD LABORAL");
		    $disponibilidadl->setStrNombreBoton("btnGuardar");
	        $disponibilidadl->setStrValorBoton("Guardar");
			$disponibilidadl->setStrNombreBotons("btnSiguiente");
	        $disponibilidadl->setStrValorBotons("Siguiente");
			$disponibilidadl->setStrNombreBotona("btnAnterior");
	        $disponibilidadl->setStrValorBotona("Anterior");
	        $strResultado .= $disponibilidadl->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			$strResultado .=  $disponibilidadl->getStrListar();
				$strResultado .= '<br><br><br><br>';
			$strResultado .=  $disponibilidadl->getStrListardias();
            break;
        case( $_REQUEST["btnGuardar"] == "Guardar" ):            
            	$disponibilidadl->setStrJornada($_POST["lsJornada"]);
				$disponibilidadl->setStrSalarial($_POST["lsSalarial"]);
			 	$disponibilidadl->setStrDias($_POST["strdias"]);
				$disponibilidadl->setStrDviajar($_POST["lsDviajar"]);
				$disponibilidadl->setStrDresidencia($_POST["lsDresidencia"]);
				$disponibilidadl->setStrContratacion($_POST["lsContratacion"]);
				$disponibilidadl->setStrIlaboral($_POST["lsIlaboral"]);
				$disponibilidadl->setStrObservacion($_POST["strObservacion"]);
				$disponibilidadl->setStrCodigo($_POST["strCodigo"]);
            if($disponibilidadl->getStrIngresar())
		   {
               	$valor=$disponibilidadl->getStrCodigo();
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".DISPONIBILIDADL_URL."disponibilidadl.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            $strResultado .= $disponibilidadl->getStrListar().'<br>';
            break;
			case( $_REQUEST["btnSiguiente"] == "Siguiente" ):            
            	$disponibilidadl->setStrCodigo($_POST["strCodigo"]);
               	$valor=$disponibilidadl->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".INTERESLABORAL_URL."intereslaboral.php?btnNuevo=Nuevo&strCodigo=".$valor."");
			break;
			case( $_REQUEST["btnAnterior"] == "Anterior" ):            
            	$disponibilidadl->setStrCodigo($_POST["strCodigo"]);
        	   	$valor=$disponibilidadl->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".PERSONADS_URL."personads.php?btnNuevo=Nuevo&strCodigo=".$valor."");
           
            break;
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $disponibilidadl->setStrCodigo($_REQUEST["strCodigo"]);
            if ($disponibilidadl->getStrBuscar())
                $strResultado .= $disponibilidadl->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $disponibilidadl->getStrListar().'<br>';
                }
            break;
			
			case( $_REQUEST["btnEditar"] == "Actualizar" ):
					$disponibilidadl->setStrCodigo($_POST["strCodigo"]);
					$disponibilidadl->setStrJornada($_POST["lsJornada"]);
					$disponibilidadl->setStrSalarial($_POST["lsSalarial"]);
				 	$disponibilidadl->setStrDviajar($_POST["lsDviajar"]);
					$disponibilidadl->setStrDresidencia($_POST["lsDresidencia"]);
					$disponibilidadl->setStrContratacion($_POST["lsContratacion"]);
					$disponibilidadl->setStrIlaboral($_POST["lsIlaboral"]);
					$disponibilidadl->setStrObservacion($_POST["strObservacion"]);
					
					 $valor=$disponibilidadl->getStrCodigo();
			 		$v=$disponibilidadl->getStrBuscardls($valor);
		            if($disponibilidadl->getStrActualizar())
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
		            else
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';
		
		           header("Location:".DISPONIBILIDADL_URL."disponibilidadl.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
			case( $_REQUEST["btnEliminar"] == "Eliminar" ):
	            $disponibilidadl->setStrCodigo($_REQUEST["strCodigo"]);
				$valor=$disponibilidadl->getStrCodigo();
			 		$v=$disponibilidadl->getStrBuscardls($valor);
	            if ($disponibilidadl->getStrBuscar())
	                if($disponibilidadl->getStrEliminar())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
	
	     			header("Location:".DISPONIBILIDADL_URL."disponibilidadl.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
            case( $_REQUEST["btnEliminar"] == "Eliminardias" ):
	            $disponibilidadl->setStrCodigo($_REQUEST["strCodigo"]);
				$valor=$disponibilidadl->getStrCodigo();
			 		$v=$disponibilidadl->getStrBuscardlsdias($valor);
	            if ($disponibilidadl->getStrBuscardias())
	                if($disponibilidadl->getStrEliminardias())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
	
	     			header("Location:".DISPONIBILIDADL_URL."disponibilidadl.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
		            $disponibilidadl->setStrCodigo($_REQUEST["strCodigo"]);
		            $disponibilidadl->setStrEtiqueta("ACTUALIZAR DISPONIBILIDAD LABORAL");
		            $disponibilidadl->setStrNombreBoton("btnEditar");
		            $disponibilidadl->setStrValorBoton("Actualizar");
		
		            if($disponibilidadl->getStrBuscar())
		                $strResultado .= $disponibilidadl->getStrFormulario();
		            else {
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
		                $strResultado .= $disponibilidadl->getStrListar();
		            }
            break;
       
        default:
            $strResultado .= $disponibilidadl->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>