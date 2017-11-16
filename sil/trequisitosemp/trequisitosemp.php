<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    include_once( CLASS_PATH . "class.clinterfaz.php" );
    include_once( CLASS_PATH . "class.cltrequisitosemp.php" );
    $interfaz = new clInterfaz();
    $trequisitosemp = new cltrequisitosemp();
    
    $strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
			$trequisitosemp->setStrCodigo($_REQUEST["strCodigo"]);
            $trequisitosemp->setStrLectura("");
            $trequisitosemp->setStrEtiqueta("INGRESO REQUISITOS");
            $trequisitosemp->setStrNombreBoton("btnGuardar");
            $trequisitosemp->setStrValorBoton("Guardar");
			$trequisitosemp->setStrNombreBotons("btnSiguiente");
            $trequisitosemp->setStrValorBotons("Siguiente");
			$trequisitosemp->setStrNombreBotona("btnAnterior");
	        $trequisitosemp->setStrValorBotona("Anterior");
            $strResultado .= $trequisitosemp->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			$strResultado .= $trequisitosemp->getStrListar();
            
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ):            
           	$trequisitosemp->setstrLaborando($_POST["lsLaborando"]);
			$trequisitosemp->setstrEdadminima($_POST["lsEdadminima"]);
			$trequisitosemp->setstrEdadmaxima($_POST["lsEdadmaxima"]);
			$trequisitosemp->setstrDiscapacidad($_POST["strdiscapacidad"]);
			$trequisitosemp->setstrCprevios($_POST["strCprevios"]);
			$trequisitosemp->setStrCodigo($_POST["strCodigo"]);
			 if($trequisitosemp->getStrIngresar())
		   {
               	$valor=$trequisitosemp->getStrCodigo();
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".TREQUISITOSEMP_URL."trequisitosemp.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            $strResultado .= $trequisitosemp->getStrListar().'<br>';
        break;
        
        case( $_REQUEST["btnSiguiente"] == "Siguiente" ):            
           	$trequisitosemp->setStrCodigo($_POST["strCodigo"]);
		   	$valor=$trequisitosemp->getStrCodigo();
               //$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".THORARIOEMP_URL."thorarioemp.php?btnNuevo=Nuevo&strCodigo=".$valor."");
	        //$strResultado .= $apuesto->getStrListar().'<br>';
          break;
          case( $_REQUEST["btnAnterior"] == "Anterior" ):            
            	$trequisitosemp->setStrCodigo($_POST["strCodigo"]);
        	   	$valor=$trequisitosemp->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".TFORMACIONREMP_URL."tformacionremp.php?btnNuevo=Nuevo&strCodigo=".$valor."");
           
            break; 
		case( $_REQUEST["btnEditar"] == "Actualizar" ):
			$trequisitosemp->setStrCodigo($_POST["strCodigo"]);
			$trequisitosemp->setstrLaborando($_POST["lsLaborando"]);
			$trequisitosemp->setstrEdadminima($_POST["lsEdadminima"]);
			$trequisitosemp->setstrEdadmaxima($_POST["lsEdadmaxima"]);
			$trequisitosemp->setstrDiscapacidad($_POST["strdiscapacidad"]);
			$trequisitosemp->setstrCprevios($_POST["strCprevios"]);
			
			$valor=$trequisitosemp->getStrCodigo();
			$v=$trequisitosemp->getStrBuscartremp($valor);
			if($trequisitosemp->getStrActualizar())
                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';

           header("Location:".TREQUISITOSEMP_URL."trequisitosemp.php?btnNuevo=Nuevo&strCodigo=".$v."");
			
        break;
		case( $_REQUEST["btnActualizar"] == "Actualizar" ):
           $trequisitosemp->setStrCodigo($_REQUEST["strCodigo"]);
            $trequisitosemp->setStrEtiqueta("ACTUASLIZAR REQUISITOS");
            $trequisitosemp->setStrNombreBoton("btnEditar");
            $trequisitosemp->setStrValorBoton("Actualizar");

            if($trequisitosemp->getStrBuscar())
                $strResultado .= $trequisitosemp->getStrFormulario();
            else {
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
                $strResultado .= $trequisitosemp->getStrListar();
            }
        break;
        case( $_REQUEST["btnEliminar"] == "Eliminar" ):
	      $trequisitosemp->setStrCodigo($_REQUEST["strCodigo"]);
	      
	      $valor=$trequisitosemp->getStrCodigo();
			$v=$trequisitosemp->getStrBuscartremp($valor);
	            if ($trequisitosemp->getStrBuscar())
	                if($trequisitosemp->getStrEliminar())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
	
	            header("Location:".TREQUISITOSEMP_URL."trequisitosemp.php?btnNuevo=Nuevo&strCodigo=".$v."");
        break;
			
       	case( $_REQUEST["btnDetalle"] == "Detalle" ):
			 $trequisitosemp->setStrCodigo($_REQUEST["strCodigo"]);
            if ($trequisitosemp->getStrBuscar())
                $strResultado .= $trequisitosemp->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $trequisitosemp->getStrListar().'<br>';
                }
         
        break;
      //Cuando cambia el combo de la Provincia
        case( $_REQUEST["btnBuscar"] == "Canton" ):
            $canton = new clCanton();
            $trequisitosemp->setStrProvincia($_REQUEST["strCodigoProvincia"]);
            $strResultado .= print($canton->getStrListar($trequisitosemp->getStrProvincia(), $trequisitosemp->getStrCanton()));
            exit;

        //Cuando cambia el combo del Canton
        case( $_REQUEST["btnBuscar"] == "Parroquia" ):            
            $parroquia = new clParroquia();
            $trequisitosemp->setStrCanton($_REQUEST["strCodigoCanton"]);
            $strResultado = print($parroquia->getStrListar($trequisitosemp->getStrCanton(), $trequisitosemp->getStrParroquia()));
            exit;
        case( $_REQUEST["btnBuscar"] == "Subtcurso" ):
            $Subtformacion = new clSubtformacion();
            $trequisitosemp->setstrTcurso($_REQUEST["strCodigoTcurso"]);
			$strResultado .= print($Subtformacion->getStrListar($trequisitosemp->getstrTcurso(), $trequisitosemp->getStrSubtformacion()));
           
		    exit;
		case( $_REQUEST["btnBuscar"] == "Subtformaciond" ):            
            $Subtformaciond = new clSubtformaciond();
			
            $trequisitosemp->setStrSubtformacion($_REQUEST["strCodigoTformaciond"]);
            $strResultado = print($Subtformaciond->getStrListar($trequisitosemp->getStrSubtformacion(), $trequisitosemp->getStrSubtformaciond()));
            exit;
  
        default:
            $strResultado .= $trequisitosemp->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>