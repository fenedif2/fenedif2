<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    include_once( CLASS_PATH . "class.clinterfaz.php" );
    include_once( CLASS_PATH . "class.cltrequisitoscu.php" );

	
	
    

    $interfaz = new clInterfaz();
    $trequisitoscu = new cltrequisitoscu();
    
    $strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
			$trequisitoscu->setStrCodigo($_REQUEST["strCodigo"]);
            $trequisitoscu->setStrLectura("");
            $trequisitoscu->setStrEtiqueta("INGRESAR REQUISITOS");
            $trequisitoscu->setStrNombreBoton("btnGuardar");
            $trequisitoscu->setStrValorBoton("Guardar");
			$trequisitoscu->setStrNombreBotons("btnSiguiente");
            $trequisitoscu->setStrValorBotons("Siguiente");
			$trequisitoscu->setStrNombreBotona("btnAnterior");
	        $trequisitoscu->setStrValorBotona("Anterior");
            $strResultado .= $trequisitoscu->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			$strResultado .= $trequisitoscu->getStrListar();
            
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ):            
           	$trequisitoscu->setstrLaborando($_POST["lsLaborando"]);
			$trequisitoscu->setstrEdadminima($_POST["lsEdadminima"]);
			$trequisitoscu->setstrEdadmaxima($_POST["lsEdadmaxima"]);
			$trequisitoscu->setstrDiscapacidad($_POST["strdiscapacidad"]);
			$trequisitoscu->setstrCprevios($_POST["strCprevios"]);
			$trequisitoscu->setStrCodigo($_POST["strCodigo"]);
			 if($trequisitoscu->getStrIngresar())
		   {
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	$valor=$trequisitoscu->getStrCodigo();
				header("Location:".TREQUISITOSCU_URL."trequisitoscu.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            $strResultado .= $trequisitoscu->getStrListar().'<br>';
        break;
		case( $_REQUEST["btnSiguiente"] == "Siguiente" ): 
        		$trequisitoscu->setStrCodigo($_POST["strCodigo"]);          
                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	$valor=$trequisitoscu->getStrCodigo();
            	header("Location:".THORARIOCU_URL."thorariocu.php?btnNuevo=Nuevo&strCodigo=".$valor."");
         break;
			 case( $_REQUEST["btnAnterior"] == "Anterior" ):            
            	$trequisitoscu->setStrCodigo($_POST["strCodigo"]);
        	   	$valor=$trequisitoscu->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".TFORMACIONRCU_URL."tformacionrcu.php?btnNuevo=Nuevo&strCodigo=".$valor."");
           
            break; 
		case( $_REQUEST["btnEditar"] == "Actualizar" ):
			$trequisitoscu->setstrLaborando($_POST["lsLaborando"]);
			$trequisitoscu->setstrEdadminima($_POST["lsEdadminima"]);
			$trequisitoscu->setstrEdadmaxima($_POST["lsEdadmaxima"]);
			$trequisitoscu->setstrDiscapacidad($_POST["strdiscapacidad"]);
			$trequisitoscu->setstrCprevios($_POST["strCprevios"]);
			$trequisitoscu->setStrCodigo($_POST["strCodigo"]);
			
			$valor=$trequisitoscu->getStrCodigo();
			$v=$trequisitoscu->getStrBuscartrcu($valor);
			if($trequisitoscu->getStrActualizar())
                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';

            header("Location:".TREQUISITOSCU_URL."trequisitoscu.php?btnNuevo=Nuevo&strCodigo=".$v."");
			
        break;
		case( $_REQUEST["btnActualizar"] == "Actualizar" ):
           $trequisitoscu->setStrCodigo($_REQUEST["strCodigo"]);
            $trequisitoscu->setStrEtiqueta("ACTUALIZAR REQUISITOS");
            $trequisitoscu->setStrNombreBoton("btnEditar");
            $trequisitoscu->setStrValorBoton("Actualizar");

            if($trequisitoscu->getStrBuscar())
                $strResultado .= $trequisitoscu->getStrFormulario();
            else {
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
                $strResultado .= $trequisitoscu->getStrListar();
            }
        break;
        case( $_REQUEST["btnEliminar"] == "Eliminar" ):
	      $trequisitoscu->setStrCodigo($_REQUEST["strCodigo"]);
	      
	      	$valor=$trequisitoscu->getStrCodigo();
			$v=$trequisitoscu->getStrBuscartrcu($valor);
	            if ($trequisitoscu->getStrBuscar())
	                if($trequisitoscu->getStrEliminar())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
	
	            header("Location:".TREQUISITOSCU_URL."trequisitoscu.php?btnNuevo=Nuevo&strCodigo=".$v."");
        break;
			
       	case( $_REQUEST["btnDetalle"] == "Detalle" ):
			 $trequisitoscu->setStrCodigo($_REQUEST["strCodigo"]);
            if ($trequisitoscu->getStrBuscar())
                $strResultado .= $trequisitoscu->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $trequisitoscu->getStrListar().'<br>';
                }
         
        break;
      //Cuando cambia el combo de la Provincia
        case( $_REQUEST["btnBuscar"] == "Canton" ):
            $canton = new clCanton();
            $trequisitoscu->setStrProvincia($_REQUEST["strCodigoProvincia"]);
            $strResultado .= print($canton->getStrListar($trequisitoscu->getStrProvincia(), $trequisitoscu->getStrCanton()));
            exit;

        //Cuando cambia el combo del Canton
        case( $_REQUEST["btnBuscar"] == "Parroquia" ):            
            $parroquia = new clParroquia();
            $trequisitoscu->setStrCanton($_REQUEST["strCodigoCanton"]);
            $strResultado = print($parroquia->getStrListar($trequisitoscu->getStrCanton(), $trequisitoscu->getStrParroquia()));
            exit;
        case( $_REQUEST["btnBuscar"] == "Subtcurso" ):
            $Subtformacion = new clSubtformacion();
            $trequisitoscu->setstrTcurso($_REQUEST["strCodigoTcurso"]);
			$strResultado .= print($Subtformacion->getStrListar($trequisitoscu->getstrTcurso(), $trequisitoscu->getStrSubtformacion()));
           
		    exit;
		case( $_REQUEST["btnBuscar"] == "Subtformaciond" ):            
            $Subtformaciond = new clSubtformaciond();
			
            $trequisitoscu->setStrSubtformacion($_REQUEST["strCodigoTformaciond"]);
            $strResultado = print($Subtformaciond->getStrListar($trequisitoscu->getStrSubtformacion(), $trequisitoscu->getStrSubtformaciond()));
            exit;
  
        default:
            $strResultado .= $trequisitoscu->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>