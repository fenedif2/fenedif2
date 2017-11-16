<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    	include_once( CLASS_PATH . "class.clinterfaz.php" );
    	include_once( CLASS_PATH . "class.cldisponibilidadls.php" );
		include_once( CLASS_PATH . "class.clcformativo.php" );
	  	$interfaz = new clInterfaz();
    	$disponibilidadls = new clDisponibilidadls();
		$strResultado = "";
		
    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
			$disponibilidadls->setStrCodigo($_REQUEST["strCodigo"]);
			$disponibilidadls->setStrLectura("");
			$disponibilidadls->setStrEtiqueta("INGRESAR DISPONIBILIDAD LABORAL");
		    $disponibilidadls->setStrNombreBoton("btnGuardar");
	        $disponibilidadls->setStrValorBoton("Guardar");
			$disponibilidadls->setStrNombreBotons("btnSiguiente");
	        $disponibilidadls->setStrValorBotons("Siguiente");
			$disponibilidadls->setStrNombreBotona("btnAnterior");
	        $disponibilidadls->setStrValorBotona("Anterior");
	        $strResultado .= $disponibilidadls->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			$strResultado .=  $disponibilidadls->getStrListar();
				$strResultado .= '<br><br><br><br>';
			$strResultado .=  $disponibilidadls->getStrListardias();
            break;
        case( $_REQUEST["btnGuardar"] == "Guardar" ):            
            	$disponibilidadls->setStrJornada($_POST["lsJornada"]);
				$disponibilidadls->setStrSalarial($_POST["lsSalarial"]);
			 	$disponibilidadls->setStrDias($_POST["strdias"]);
				$disponibilidadls->setStrDviajar($_POST["lsDviajar"]);
				$disponibilidadls->setStrDresidencia($_POST["lsDresidencia"]);
				$disponibilidadls->setStrContratacion($_POST["lsContratacion"]);
				$disponibilidadls->setStrIlaboral($_POST["lsIlaboral"]);
				$disponibilidadls->setStrObservacion($_POST["strObservacion"]);
				$disponibilidadls->setStrCodigo($_POST["strCodigo"]);
            if($disponibilidadls->getStrIngresar())
		   {
               	$valor=$disponibilidadls->getStrCodigo();
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".DISPONIBILIDADLS_URL."disponibilidadls.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            $strResultado .= $disponibilidadls->getStrListar().'<br>';
            break;
			case( $_REQUEST["btnSiguiente"] == "Siguiente" ):            
            	$disponibilidadls->setStrCodigo($_POST["strCodigo"]);
               	$valor=$disponibilidadls->getStrCodigo();
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".INTERESLABORALS_URL."intereslaborals.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            break;
			case( $_REQUEST["btnAnterior"] == "Anterior" ):            
            	$disponibilidadls->setStrCodigo($_POST["strCodigo"]);
        	   	$valor=$disponibilidadls->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".SUSTITUTOS_URL."sustitutos.php?btnNuevo=Nuevo&strCodigo=".$valor."");
           
            break;
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $disponibilidadls->setStrCodigo($_REQUEST["strCodigo"]);
            if ($disponibilidadls->getStrBuscar())
                $strResultado .= $disponibilidadls->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $disponibilidadls->getStrListar().'<br>';
                }
            break;
			
			case( $_REQUEST["btnEditar"] == "Actualizar" ):
					$disponibilidadls->setStrCodigo($_POST["strCodigo"]);
					$disponibilidadls->setStrJornada($_POST["lsJornada"]);
					$disponibilidadls->setStrSalarial($_POST["lsSalarial"]);
				 	$disponibilidadls->setStrDviajar($_POST["lsDviajar"]);
					$disponibilidadls->setStrDresidencia($_POST["lsDresidencia"]);
					$disponibilidadls->setStrContratacion($_POST["lsContratacion"]);
					$disponibilidadls->setStrIlaboral($_POST["lsIlaboral"]);
					$disponibilidadls->setStrObservacion($_POST["strObservacion"]);
					
					$valor=$disponibilidadls->getStrCodigo();
			 		$v=$disponibilidadls->getStrBuscardls($valor);
		            if($disponibilidadls->getStrActualizar())
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
		            else
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';
		
		            header("Location:".DISPONIBILIDADLS_URL."disponibilidadls.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
			case( $_REQUEST["btnEliminar"] == "Eliminar" ):
	            $disponibilidadls->setStrCodigo($_REQUEST["strCodigo"]);
				$valor=$disponibilidadls->getStrCodigo();
			 		$v=$disponibilidadls->getStrBuscardls($valor);
	            if ($disponibilidadls->getStrBuscar())
	                if($disponibilidadls->getStrEliminar())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
	
	     			header("Location:".DISPONIBILIDADLS_URL."disponibilidadls.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
            case( $_REQUEST["btnEliminar"] == "Eliminardias" ):
	            $disponibilidadls->setStrCodigo($_REQUEST["strCodigo"]);
				
				$valor=$disponibilidadls->getStrCodigo();
			 		$v=$disponibilidadls->getStrBuscardlsdias($valor);
	            if ($disponibilidadls->getStrBuscardias())
	                if($disponibilidadls->getStrEliminardias())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
	
	     			header("Location:".DISPONIBILIDADLS_URL."disponibilidadls.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
		            $disponibilidadls->setStrCodigo($_REQUEST["strCodigo"]);
		            $disponibilidadls->setStrEtiqueta("Actualizar&nbsp; Forma de Accesibilidad");
		            $disponibilidadls->setStrNombreBoton("btnEditar");
		            $disponibilidadls->setStrValorBoton("Actualizar");
		
		            if($disponibilidadls->getStrBuscar())
		                $strResultado .= $disponibilidadls->getStrFormulario();
		            else {
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
		                $strResultado .= $disponibilidadls->getStrListar();
		            }
            break;
       
        default:
            $strResultado .= $disponibilidadls->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>