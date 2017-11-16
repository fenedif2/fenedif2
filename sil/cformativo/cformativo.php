<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    include_once( CLASS_PATH . "class.clinterfaz.php" );
    include_once( CLASS_PATH . "class.clcformativo.php" );
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
    $cformativo = new clCformativo();
    
    $strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
            $cformativo->setStrLectura("");
            $cformativo->setStrSucursal($_SESSION["usuario"]["suc"]);
            $cformativo->setStrEtiqueta("INGRESO CENTRO FORMATIVO");
            $cformativo->setStrNombreBoton("btnGuardar");
            $cformativo->setStrValorBoton("Guardar");
            $cformativo->setStrFechaNacimiento(date("Y-m-d"));
            $strResultado .= $cformativo->getStrFormulario();
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ):            
            $cformativo->setStrNombre($_POST["strNombre"]);
            $cformativo->setStrResponsable($_POST["strResponsable"]);
            $cformativo->setStrContacto($_POST["strContacto"]);
			$cformativo->setStrEstado($_POST["lsEstado"]);
			$cformativo->setStrEmail($_POST["strEmail"]); 
			$cformativo->setStrTelefonos($_POST["strTelefonos"]);
			$cformativo->setStrNestudiantes($_POST["strNestudiantes"]); 
			$cformativo->setStrNestudiantesd($_POST["strNestudiantesd"]);
			$cformativo->setStrTipocformativo($_POST["lsTipocformativo"]);
			$cformativo->setStrCobertura($_POST["lsCobertura"]);
			$cformativo->setStrExperiencia($_POST["lsExperiencia"]);
			$cformativo->setStrObservacion($_POST["strObservacion"]);
			$cformativo->setStrParroquia($_POST["lsParroquia"]);
			
			$cformativo->setStrCprincipal($_POST["strCprincipal"]);
			$cformativo->setStrNumero($_POST["strNumero"]);
			$cformativo->setStrTransversal($_POST["strTransversal"]);
			$cformativo->setStrSector($_POST["lsSector"]);
			$cformativo->setStrPasaje($_POST["strPasaje"]);
			$cformativo->setStrBarrio($_POST["strBarrio"]);
			$cformativo->setStrManzana($_POST["strManzana"]);
			$cformativo->setStrSolar($_POST["strSolar"]);
			$cformativo->setStrFijo($_POST["strFijo"]);
			$cformativo->setStrMovil($_POST["strMovil"]);
			$cformativo->setStrFax($_POST["strFax"]);
			$cformativo->setStrObservaciond($_POST["strObservaciond"]);
			$cformativo->setStrFechaNacimiento($_POST["dtFecha"]);
	       if($cformativo->getStrIngresar())
		   {
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	 $valor=$cformativo->getStrBuscarr();
            	header("Location:".FACCESOCF_URL."faccesocf.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            $strResultado .= $cformativo->getStrListar().'<br>';
            break;
			 case( $_REQUEST["btnEditar"] == "Actualizar" ):
			$cformativo->setStrCodigo($_POST["strCodigo"]);          
            $cformativo->setStrNombre($_POST["strNombre"]);
            $cformativo->setStrResponsable($_POST["strResponsable"]);
            $cformativo->setStrContacto($_POST["strContacto"]);
			$cformativo->setStrEstado($_POST["lsEstado"]);
			$cformativo->setStrEmail($_POST["strEmail"]); 
			$cformativo->setStrTelefonos($_POST["strTelefonos"]);
			$cformativo->setStrNestudiantes($_POST["strNestudiantes"]); 
			$cformativo->setStrNestudiantesd($_POST["strNestudiantesd"]);
			$cformativo->setStrTipocformativo($_POST["lsTipocformativo"]);
			$cformativo->setStrCobertura($_POST["lsCobertura"]);
			$cformativo->setStrExperiencia($_POST["lsExperiencia"]);
			$cformativo->setStrObservacion($_POST["strObservacion"]);
			$cformativo->setStrParroquia($_POST["lsParroquia"]);
			$cformativo->setStrSucursal($_POST["lsSucursal"]);
			$cformativo->setStrCprincipal($_POST["strCprincipal"]);
			$cformativo->setStrNumero($_POST["strNumero"]);
			$cformativo->setStrTransversal($_POST["strTransversal"]);
			$cformativo->setStrSector($_POST["lsSector"]);
			$cformativo->setStrPasaje($_POST["strPasaje"]);
			$cformativo->setStrBarrio($_POST["strBarrio"]);
			$cformativo->setStrManzana($_POST["strManzana"]);
			$cformativo->setStrSolar($_POST["strSolar"]);
			$cformativo->setStrFijo($_POST["strFijo"]);
			$cformativo->setStrMovil($_POST["strMovil"]);
			$cformativo->setStrFax($_POST["strFax"]);
			$cformativo->setStrObservaciond($_POST["strObservaciond"]);
			$cformativo->setStrFechaNacimiento($_POST["dtFecha"]);
			
			$valor=$cformativo->getStrCodigo();
            if($cformativo->getStrActualizar())
                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';

            header("Location:".CFORMATIVO_URL."cformativo.php?btnActualizar=Actualizar&strCodigo=".$valor."");
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
            $cformativo->setStrCodigo($_REQUEST["strCodigo"]);
            $cformativo->setStrEtiqueta("ACTUALIZAR CENTRO FORMATIVO");
            $cformativo->setStrNombreBoton("btnEditar");
            $cformativo->setStrValorBoton("Actualizar");

            if($cformativo->getStrBuscar())
                $strResultado .= $cformativo->getStrFormulario();
            else {
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
                $strResultado .= $cformativo->getStrListar();
            }
            break;
            case( $_REQUEST["btnEliminar"] == "Eliminar" ):
            $cformativo->setStrCodigo($_REQUEST["strCodigo"]);
            if ($cformativo->getStrBuscar())
                if($cformativo->getStrEliminar())
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
                else
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';

            $strResultado .= $cformativo->getStrListar().'<br>';
            break;
			
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $cformativo->setStrCodigo($_REQUEST["strCodigo"]);
            if ($cformativo->getStrBuscar())
                $strResultado .= $cformativo->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $cformativo->getStrListar().'<br>';
                }
            break;
     //Cuando cambia el combo de la Provincia
        case( $_REQUEST["btnBuscar"] == "Canton" ):
            $canton = new clCanton();
            $cformativo->setStrProvincia($_REQUEST["strCodigoProvincia"]);
            $strResultado .= print($canton->getStrListar($cformativo->getStrProvincia(), $cformativo->getStrCanton()));
            exit;

        //Cuando cambia el combo del Canton
        case( $_REQUEST["btnBuscar"] == "Parroquia" ):            
            $parroquia = new clParroquia();
            $cformativo->setStrCanton($_REQUEST["strCodigoCanton"]);
            $strResultado = print($parroquia->getStrListar($cformativo->getStrCanton(), $cformativo->getStrParroquia()));
            exit;
  
        default:
            $strResultado .= $cformativo->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>