<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    include_once( CLASS_PATH . "class.clinterfaz.php" );
    include_once( CLASS_PATH . "class.cltagenda.php" );
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
    $tagenda = new clTagenda();
    
    $strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
            $tagenda->setStrLectura("");
            $tagenda->setStrEtiqueta("Ingreso&nbsp;Centro Fromativo");
            $tagenda->setStrNombreBoton("btnGuardar");
            $tagenda->setStrValorBoton("Guardar");
            $tagenda->setStrFechaNacimiento(date("Y-m-d"));
            $strResultado .= $tagenda->getStrFormulario();
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ):            
            $tagenda->setStrNombre($_POST["strNombre"]);
            $tagenda->setStrResponsable($_POST["strResponsable"]);
            $tagenda->setStrContacto($_POST["strContacto"]);
			$tagenda->setStrEstado($_POST["lsEstado"]);
			$tagenda->setStrEmail($_POST["strEmail"]); 
			$tagenda->setStrTelefonos($_POST["strTelefonos"]);
			$tagenda->setStrNestudiantes($_POST["strNestudiantes"]); 
			$tagenda->setStrNestudiantesd($_POST["strNestudiantesd"]);
			$tagenda->setStrTipocformativo($_POST["lsTipocformativo"]);
			$tagenda->setStrCobertura($_POST["lsCobertura"]);
			$tagenda->setStrExperiencia($_POST["lsExperiencia"]);
			$tagenda->setStrObservacion($_POST["strObservacion"]);
			$tagenda->setStrParroquia($_POST["lsParroquia"]);
			$tagenda->setStrSucursal($_POST["lsSucursal"]);
			$tagenda->setStrCprincipal($_POST["strCprincipal"]);
			$tagenda->setStrNumero($_POST["strNumero"]);
			$tagenda->setStrTransversal($_POST["strTransversal"]);
			$tagenda->setStrSector($_POST["lsSector"]);
			$tagenda->setStrPasaje($_POST["strPasaje"]);
			$tagenda->setStrBarrio($_POST["strBarrio"]);
			$tagenda->setStrManzana($_POST["strManzana"]);
			$tagenda->setStrSolar($_POST["strSolar"]);
			$tagenda->setStrFijo($_POST["strFijo"]);
			$tagenda->setStrMovil($_POST["strMovil"]);
			$tagenda->setStrFax($_POST["strFax"]);
			$tagenda->setStrObservaciond($_POST["strObservaciond"]);
			$tagenda->setStrFechaNacimiento($_POST["dtFecha"]);
	       if($tagenda->getStrIngresar())
		   {
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            $strResultado .= $tagenda->getStrListar().'<br>';
            break;
			 case( $_REQUEST["btnEditar"] == "Actualizar" ):
			$tagenda->setStrCodigo($_POST["strCodigo"]);          
            $tagenda->setStrNombre($_POST["strNombre"]);
            $tagenda->setStrResponsable($_POST["strResponsable"]);
            $tagenda->setStrContacto($_POST["strContacto"]);
			$tagenda->setStrEstado($_POST["lsEstado"]);
			$tagenda->setStrEmail($_POST["strEmail"]); 
			$tagenda->setStrTelefonos($_POST["strTelefonos"]);
			$tagenda->setStrNestudiantes($_POST["strNestudiantes"]); 
			$tagenda->setStrNestudiantesd($_POST["strNestudiantesd"]);
			$tagenda->setStrTipocformativo($_POST["lsTipocformativo"]);
			$tagenda->setStrCobertura($_POST["lsCobertura"]);
			$tagenda->setStrExperiencia($_POST["lsExperiencia"]);
			$tagenda->setStrObservacion($_POST["strObservacion"]);
			$tagenda->setStrParroquia($_POST["lsParroquia"]);
			$tagenda->setStrSucursal($_POST["lsSucursal"]);
			$tagenda->setStrCprincipal($_POST["strCprincipal"]);
			$tagenda->setStrNumero($_POST["strNumero"]);
			$tagenda->setStrTransversal($_POST["strTransversal"]);
			$tagenda->setStrSector($_POST["lsSector"]);
			$tagenda->setStrPasaje($_POST["strPasaje"]);
			$tagenda->setStrBarrio($_POST["strBarrio"]);
			$tagenda->setStrManzana($_POST["strManzana"]);
			$tagenda->setStrSolar($_POST["strSolar"]);
			$tagenda->setStrFijo($_POST["strFijo"]);
			$tagenda->setStrMovil($_POST["strMovil"]);
			$tagenda->setStrFax($_POST["strFax"]);
			$tagenda->setStrObservaciond($_POST["strObservaciond"]);
			$tagenda->setStrFechaNacimiento($_POST["dtFecha"]);
            if($tagenda->getStrActualizar())
                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';

            $strResultado .= $tagenda->getStrListar().'<br>';
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
            $tagenda->setStrCodigo($_REQUEST["strCodigo"]);
            $tagenda->setStrEtiqueta("Actualizar&nbsp;Centro Formativo");
            $tagenda->setStrNombreBoton("btnEditar");
            $tagenda->setStrValorBoton("Actualizar");

            if($tagenda->getStrBuscar())
                $strResultado .= $tagenda->getStrFormulario();
            else {
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
                $strResultado .= $tagenda->getStrListar();
            }
            break;
            case( $_REQUEST["btnEliminar"] == "Eliminar" ):
            $tagenda->setStrCodigo($_REQUEST["strCodigo"]);
            if ($tagenda->getStrBuscar())
                if($tagenda->getStrEliminar())
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
                else
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';

            $strResultado .= $tagenda->getStrListar().'<br>';
            break;
			
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $tagenda->setStrCodigo($_REQUEST["strCodigo"]);
            if ($tagenda->getStrBuscar())
                $strResultado .= $tagenda->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $tagenda->getStrListar().'<br>';
                }
            break;
     //Cuando cambia el combo de la Provincia
        case( $_REQUEST["btnBuscar"] == "Canton" ):
            $canton = new clCanton();
            $tagenda->setStrProvincia($_REQUEST["strCodigoProvincia"]);
            $strResultado .= print($canton->getStrListar($tagenda->getStrProvincia(), $tagenda->getStrCanton()));
            exit;

        //Cuando cambia el combo del Canton
        case( $_REQUEST["btnBuscar"] == "Parroquia" ):            
            $parroquia = new clParroquia();
            $tagenda->setStrCanton($_REQUEST["strCodigoCanton"]);
            $strResultado = print($parroquia->getStrListar($tagenda->getStrCanton(), $tagenda->getStrParroquia()));
            exit;
  
        default:
            $strResultado .= $tagenda->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>