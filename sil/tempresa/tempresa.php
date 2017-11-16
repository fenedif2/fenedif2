<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    include_once( CLASS_PATH . "class.clinterfaz.php" );
    include_once( CLASS_PATH . "class.cltempresa.php" );
    include_once( CLASS_PATH . "class.clestadocformativo.php" );
	include_once( CLASS_PATH . "class.cltipocformativo.php" );
	include_once( CLASS_PATH . "class.clcobertura.php" );
	include_once( CLASS_PATH . "class.clexperiencia.php" );
	include_once( CLASS_PATH . "class.clprovincia.php" );
    include_once( CLASS_PATH . "class.clcanton.php" );
    include_once( CLASS_PATH . "class.clparroquia.php" );
	include_once( CLASS_PATH . "class.clsucursal.php" );
	include_once( CLASS_PATH . "class.clsector.php" );

    $interfaz = new clInterfaz();
    $tempresa = new clTempresa();
    
    $strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
            $tempresa->setStrLectura("");
            $tempresa->setStrEtiqueta("INGRESO EMPRESA");
            $tempresa->setStrNombreBoton("btnGuardar");
            $tempresa->setStrValorBoton("Guardar");
            $tempresa->setStrFechaNacimiento(date("Y-m-d"));
            $strResultado .= $tempresa->getStrFormulario();
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ):            
            $tempresa->setStrNombre($_POST["strNombre"]);
            $tempresa->setStrResponsable($_POST["strResponsable"]);
            $tempresa->setStrContacto($_POST["strContacto"]);
			$tempresa->setStrEstado($_POST["lsEstado"]);
			$tempresa->setStrEmail($_POST["strEmail"]); 
			$tempresa->setStrTelefonos($_POST["strTelefonos"]);
			$tempresa->setStrNestudiantes($_POST["strNestudiantes"]); 
			$tempresa->setStrNestudiantesd($_POST["strNestudiantesd"]);
			$tempresa->setStrTipocformativo($_POST["lsTipocformativo"]);
			$tempresa->setStrCobertura($_POST["lsCobertura"]);
			$tempresa->setStrExperiencia($_POST["lsExperiencia"]);
			$tempresa->setStrObservacion($_POST["strObservacion"]);
			$tempresa->setStrParroquia($_POST["lsParroquia"]);
			$tempresa->setStrSucursal($_POST["lsSucursal"]);
			$tempresa->setStrCprincipal($_POST["strCprincipal"]);
			$tempresa->setStrNumero($_POST["strNumero"]);
			$tempresa->setStrTransversal($_POST["strTransversal"]);
			$tempresa->setStrSector($_POST["lsSector"]);
			$tempresa->setStrPasaje($_POST["strPasaje"]);
			$tempresa->setStrBarrio($_POST["strBarrio"]);
			$tempresa->setStrManzana($_POST["strManzana"]);
			$tempresa->setStrSolar($_POST["strSolar"]);
			$tempresa->setStrFijo($_POST["strFijo"]);
			$tempresa->setStrMovil($_POST["strMovil"]);
			$tempresa->setStrFax($_POST["strFax"]);
			$tempresa->setStrObservaciond($_POST["strObservaciond"]);
			$tempresa->setStrFechaNacimiento($_POST["dtFecha"]);
	       if($tempresa->getStrIngresar())
		   {
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            $strResultado .= $tempresa->getStrListar().'<br>';
            break;
			 case( $_REQUEST["btnEditar"] == "Actualizar" ):
			$tempresa->setStrCodigo($_POST["strCodigo"]);          
            $tempresa->setStrNombre($_POST["strNombre"]);
            $tempresa->setStrResponsable($_POST["strResponsable"]);
            $tempresa->setStrContacto($_POST["strContacto"]);
			$tempresa->setStrEstado($_POST["lsEstado"]);
			$tempresa->setStrEmail($_POST["strEmail"]); 
			$tempresa->setStrTelefonos($_POST["strTelefonos"]);
			$tempresa->setStrNestudiantes($_POST["strNestudiantes"]); 
			$tempresa->setStrNestudiantesd($_POST["strNestudiantesd"]);
			$tempresa->setStrTipocformativo($_POST["lsTipocformativo"]);
			$tempresa->setStrCobertura($_POST["lsCobertura"]);
			$tempresa->setStrExperiencia($_POST["lsExperiencia"]);
			$tempresa->setStrObservacion($_POST["strObservacion"]);
			$tempresa->setStrParroquia($_POST["lsParroquia"]);
			$tempresa->setStrSucursal($_POST["lsSucursal"]);
			$tempresa->setStrCprincipal($_POST["strCprincipal"]);
			$tempresa->setStrNumero($_POST["strNumero"]);
			$tempresa->setStrTransversal($_POST["strTransversal"]);
			$tempresa->setStrSector($_POST["lsSector"]);
			$tempresa->setStrPasaje($_POST["strPasaje"]);
			$tempresa->setStrBarrio($_POST["strBarrio"]);
			$tempresa->setStrManzana($_POST["strManzana"]);
			$tempresa->setStrSolar($_POST["strSolar"]);
			$tempresa->setStrFijo($_POST["strFijo"]);
			$tempresa->setStrMovil($_POST["strMovil"]);
			$tempresa->setStrFax($_POST["strFax"]);
			$tempresa->setStrObservaciond($_POST["strObservaciond"]);
			$tempresa->setStrFechaNacimiento($_POST["dtFecha"]);
            if($tempresa->getStrActualizar())
                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';

            $strResultado .= $tempresa->getStrListar().'<br>';
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
            $tempresa->setStrCodigo($_REQUEST["strCodigo"]);
            $tempresa->setStrEtiqueta("ACTUALIZAR EMPRESA");
            $tempresa->setStrNombreBoton("btnEditar");
            $tempresa->setStrValorBoton("Actualizar");

            if($tempresa->getStrBuscar())
                $strResultado .= $tempresa->getStrFormulario();
            else {
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
                $strResultado .= $tempresa->getStrListar();
            }
            break;
            case( $_REQUEST["btnEliminar"] == "Eliminar" ):
            $tempresa->setStrCodigo($_REQUEST["strCodigo"]);
            if ($tempresa->getStrBuscar())
                if($tempresa->getStrEliminar())
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
                else
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';

            $strResultado .= $tempresa->getStrListar().'<br>';
            break;
			
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $tempresa->setStrCodigo($_REQUEST["strCodigo"]);
            if ($tempresa->getStrBuscar())
                $strResultado .= $tempresa->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $tempresa->getStrListar().'<br>';
                }
            break;
     //Cuando cambia el combo de la Provincia
        case( $_REQUEST["btnBuscar"] == "Canton" ):
            $canton = new clCanton();
            $tempresa->setStrProvincia($_REQUEST["strCodigoProvincia"]);
            $strResultado .= print($canton->getStrListar($tempresa->getStrProvincia(), $tempresa->getStrCanton()));
            exit;

        //Cuando cambia el combo del Canton
        case( $_REQUEST["btnBuscar"] == "Parroquia" ):            
            $parroquia = new clParroquia();
            $tempresa->setStrCanton($_REQUEST["strCodigoCanton"]);
            $strResultado = print($parroquia->getStrListar($tempresa->getStrCanton(), $tempresa->getStrParroquia()));
            exit;
  
        default:
            $strResultado .= $tempresa->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>