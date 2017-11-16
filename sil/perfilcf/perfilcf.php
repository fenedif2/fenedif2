<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    	include_once( CLASS_PATH . "class.clinterfaz.php" );
    	include_once( CLASS_PATH . "class.clperfilcf.php" );
		include_once( CLASS_PATH . "class.clcformativo.php" );
	  	$interfaz = new clInterfaz();
    	$perfilcf = new clPerfilcf();
		$strResultado = "";
		
    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
			$perfilcf->setStrCodigo($_REQUEST["strCodigo"]);
			$perfilcf->setStrLectura("");
			$perfilcf->setStrEtiqueta("INGRESAR PERFIL");
		    $perfilcf->setStrNombreBoton("btnGuardar");
	        $perfilcf->setStrValorBoton("Guardar");
			 $perfilcf->setStrNombreBotons("btnSiguiente");
	        $perfilcf->setStrValorBotons("Siguiente");
			$perfilcf->setStrNombreBotona("btnAnterior");
	        $perfilcf->setStrValorBotona("Anterior");
	        $strResultado .= $perfilcf->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			$strResultado .= $perfilcf->getStrListar();
            break;
        case( $_REQUEST["btnGuardar"] == "Guardar" ):            
            $perfilcf->setStrPerfil($_POST["lsPerfil"]);
			$perfilcf->setStrCodigo($_POST["strCodigo"]);
            if($perfilcf->getStrIngresar())
		   {
		   		$valor=$perfilcf->getStrCodigo();
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".PERFILCF_URL."perfilcf.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            $strResultado .= $perfilcf->getStrListar().'<br>';
            break;
			case( $_REQUEST["btnAnterior"] == "Anterior" ):            
            	$perfilcf->setStrCodigo($_POST["strCodigo"]);
        	   	$valor=$perfilcf->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".ACCESIBILIDADCF_URL."accesibilidadcf.php?btnNuevo=Nuevo&strCodigo=".$valor."");
           
         	break; 
			case( $_REQUEST["btnSiguiente"] == "Siguiente" ):            
            $perfilcf->setStrCodigo($_POST["strCodigo"]);
          
		   		$valor=$perfilcf->getStrCodigo();
               //$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".AFORMATIVACF_URL."aformativacf.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            break;
			case( $_REQUEST["btnEditar"] == "Actualizar" ):
					 $perfilcf->setStrPerfil($_POST["lsPerfil"]);
					$perfilcf->setStrCodigo($_POST["strCodigo"]);
					
					$valor=$perfilcf->getStrCodigo();
			 		$v=$perfilcf->getStrBuscarpcf($valor);
		            if($perfilcf->getStrActualizar())
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
		            else
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';
		
		            header("Location:".PERFILCF_URL."perfilcf.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
		            $perfilcf->setStrCodigo($_REQUEST["strCodigo"]);
		            $perfilcf->setStrEtiqueta("ACTUALIZAR PERFIL");
		            $perfilcf->setStrNombreBoton("btnEditar");
		            $perfilcf->setStrValorBoton("Actualizar");
		
		            if($perfilcf->getStrBuscar())
		                $strResultado .= $perfilcf->getStrFormulario();
		            else {
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
		                $strResultado .= $perfilcf->getStrListar();
		            }
            break;
			case( $_REQUEST["btnEliminar"] == "Eliminar" ):
	            $perfilcf->setStrCodigo($_REQUEST["strCodigo"]);
				$valor=$perfilcf->getStrCodigo();
			 		$v=$perfilcf->getStrBuscarpcf($valor);
	            if ($perfilcf->getStrBuscar())
	                if($perfilcf->getStrEliminar())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
	
	     			header("Location:".PERFILCF_URL."perfilcf.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $perfilcf->setStrCodigo($_REQUEST["strCodigo"]);
            if ($perfilcf->getStrBuscar())
                $strResultado .= $perfilcf->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $perfilcf->getStrListar().'<br>';
                }
            break;
      
        default:
            $strResultado .= $perfilcf->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>