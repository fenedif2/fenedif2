<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    include_once( CLASS_PATH . "class.clinterfaz.php" );
    include_once( CLASS_PATH . "class.clpterapeutico.php" );

	

    $interfaz = new clInterfaz();
    $pterapeutico = new clPterapuetico();
    
    $strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
            $pterapeutico->setStrLectura("");
            $pterapeutico->setStrEtiqueta("DECISIONES SOBRE EL TRATAMIENTO PSICOTERAPÉUTICO");
            $pterapeutico->setStrNombreBoton("btnGuardar");
            $pterapeutico->setStrValorBoton("Guardar");
            
            $strResultado .= $pterapeutico->getStrFormulario();
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ):   
			$pterapeutico->setStrTusuario($_POST["lsTusuario"]);         
            $pterapeutico->setStrTratamientop($_POST["lsTratamientop"]);
			$pterapeutico->setStrTratamientoi($_POST["lsTratamientoi"]);
			$pterapeutico->setStrTratamientor($_POST["lsTratamientor"]);
			$pterapeutico->setStrCual($_POST["strCual"]);
			$pterapeutico->setStrIndividual($_POST["strIndividual"]);
			$pterapeutico->setStrPareja($_POST["strPareja"]);
			$pterapeutico->setStrFamiliar($_POST["strFamiliar"]);
			$pterapeutico->setStrGrupal($_POST["strGrupal"]);
			$pterapeutico->setStrInstitucional($_POST["strInstitucional"]);
			$pterapeutico->setStrProceso($_POST["strProceso"]);
            
	       if($pterapeutico->getStrIngresar())
		   {
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            $strResultado .= $pterapeutico->getStrListar().'<br>';
            break;
			 case( $_REQUEST["btnEditar"] == "Actualizar" ):
			$pterapeutico->setStrCodigo($_POST["strCodigo"]); 	 
			$pterapeutico->setStrTusuario($_POST["lsTusuario"]);         
            $pterapeutico->setStrTratamientop($_POST["lsTratamientop"]);
			$pterapeutico->setStrTratamientoi($_POST["lsTratamientoi"]);
			$pterapeutico->setStrTratamientor($_POST["lsTratamientor"]);
			$pterapeutico->setStrCual($_POST["strCual"]);
			$pterapeutico->setStrIndividual($_POST["strIndividual"]);
			$pterapeutico->setStrPareja($_POST["strPareja"]);
			$pterapeutico->setStrFamiliar($_POST["strFamiliar"]);
			$pterapeutico->setStrGrupal($_POST["strGrupal"]);
			$pterapeutico->setStrInstitucional($_POST["strInstitucional"]);
			$pterapeutico->setStrProceso($_POST["strProceso"]);
            if($pterapeutico->getStrActualizar())
                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';

            $strResultado .= $pterapeutico->getStrListar().'<br>';
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
            $pterapeutico->setStrCodigo($_REQUEST["strCodigo"]);
            $pterapeutico->setStrEtiqueta("ACTUALIZAR PSICOTERAPÉUTICO");
            $pterapeutico->setStrNombreBoton("btnEditar");
            $pterapeutico->setStrValorBoton("Actualizar");

            if($pterapeutico->getStrBuscar())
                $strResultado .= $pterapeutico->getStrFormulario();
            else {
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
                $strResultado .= $pterapeutico->getStrListar();
            }
            break;
            case( $_REQUEST["btnEliminar"] == "Eliminar" ):
            $pterapeutico->setStrCodigo($_REQUEST["strCodigo"]);
            if ($pterapeutico->getStrBuscar())
                if($pterapeutico->getStrEliminar())
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
                else
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';

            $strResultado .= $pterapeutico->getStrListar().'<br>';
            break;
			
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $pterapeutico->setStrCodigo($_REQUEST["strCodigo"]);
            if ($pterapeutico->getStrBuscar())
                $strResultado .= $pterapeutico->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $pterapeutico->getStrListar().'<br>';
                }
            break;
     //Cuando cambia el combo de la Provincia
        case( $_REQUEST["btnBuscar"] == "Canton" ):
            $canton = new clCanton();
            $pterapeutico->setStrProvincia($_REQUEST["strCodigoProvincia"]);
            $strResultado .= print($canton->getStrListar($pterapeutico->getStrProvincia(), $pterapeutico->getStrCanton()));
            exit;

        //Cuando cambia el combo del Canton
        case( $_REQUEST["btnBuscar"] == "Parroquia" ):            
            $parroquia = new clParroquia();
            $pterapeutico->setStrCanton($_REQUEST["strCodigoCanton"]);
            $strResultado = print($parroquia->getStrListar($pterapeutico->getStrCanton(), $pterapeutico->getStrParroquia()));
            exit;
  
        default:
            $strResultado .= $pterapeutico->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>