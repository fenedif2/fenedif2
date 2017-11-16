<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
    if(!(isset($_SESSION["usuario"])))
    header( "Location:". INICIO_URL );
    include_once( CLASS_PATH . "class.clinterfaz.php" );
    include_once( CLASS_PATH . "class.clsustitutos.php" );

    $interfaz = new clInterfaz();
    $sustitutos = new clSustitutos();
    
    $strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
            $sustitutos->setStrLectura("");
            $sustitutos->setStrSucursal($_SESSION["usuario"]["suc"]);
			$sustitutos->setStrTusuario("2");
            $sustitutos->setStrEtiqueta("INGRESO&nbsp;SUSTITUTO");
            $sustitutos->setStrNombreBoton("btnGuardar");
            $sustitutos->setStrValorBoton("Guardar");
			$sustitutos->setStrNombreBotons("btnSiguiente");
            $sustitutos->setStrValorBotons("Siguiente");
            $sustitutos->setStrFechaNacimiento(date("Y-m-d"));
			$sustitutos->setStrFechaIngreso(date("Y-m-d"));
            $strResultado .= $sustitutos->getStrFormulario();
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ): 
        	//$sustitutos->setStrCodigo($_POST["strCodigo"]);          
            $sustitutos->setstrFoto($_POST["strFoto"]);
            $sustitutos->setstrIdentificacion($_POST["lsIdentificacion"]);
			$sustitutos->setstrIdentificaciont($_POST["strIdentificaciont"]);
			$sustitutos->setStrNcarne($_POST["StrNcarne"]); 
			$sustitutos->setStrApaterno($_POST["StrApaterno"]);
			$sustitutos->setStrAmaterno($_POST["StrAmaterno"]); 
			$sustitutos->setStrPnombre($_POST["StrPnombre"]);
			$sustitutos->setStrSnombre($_POST["StrSnombre"]);
			$sustitutos->setStrGenero($_POST["lsGenero"]);
			$sustitutos->setStrEcivil($_POST["lsEcivil"]);
			$sustitutos->setStrFechaNacimiento($_POST["dtFecha"]);
			$sustitutos->setStrNhijos($_POST["lsNhijos"]);
			$sustitutos->setStrFconocer($_POST["lsFconocer"]);
			$sustitutos->setStrEstado($_POST["lsEstado"]);
			$sustitutos->setStrTseguro($_POST["lsTseguro"]);
			$sustitutos->setStrTiposeguro($_POST["lsTiposeguro"]);
			$sustitutos->setStrFechaIngreso($_POST["dtFechaIngreso"]);
			$sustitutos->setStrEtnia($_POST["lsEtnia"]);
			$sustitutos->setStrParroquia($_POST["lsParroquia"]);
			$sustitutos->setStrCprincipal($_POST["strCprincipal"]);
			$sustitutos->setStrNumero($_POST["strNumero"]);
			$sustitutos->setStrTransversal($_POST["strTransversal"]);
			$sustitutos->setStrSector($_POST["lsSector"]);
			$sustitutos->setStrPasaje($_POST["strPasaje"]);
			$sustitutos->setStrBarrio($_POST["strBarrio"]);
			$sustitutos->setStrManzana($_POST["strManzana"]);
			$sustitutos->setStrSolar($_POST["strSolar"]);
			$sustitutos->setStrObservacion($_POST["strObservacion"]);
			$sustitutos->setStrFijo($_POST["strFijo"]);
			$sustitutos->setStrMovil($_POST["strMovil"]);
			$sustitutos->setStrReferido1($_POST["StrReferido1"]);
			$sustitutos->setStrReferido2($_POST["StrReferido2"]);
			$sustitutos->setStrEmail($_POST["strEmail"]);
			$sustitutos->setStrObservaciond($_POST["strObservaciond"]);
			$sustitutos->setStrTlicencia($_POST["lsTlicencia"]);
			$sustitutos->setStrTipolicencia($_POST["lsTipolicencia"]);
			$sustitutos->setStrVehiculo($_POST["lsVehiculo"]);
			$sustitutos->setStrAdaptacion($_POST["lsAdaptacion"]);
			$sustitutos->setStrTadaptacion($_POST["strTadaptacion"]);
			$sustitutos->setStrTfederacion($_POST["lsTfederacion"]);
			$sustitutos->setStrTipofederacion($_POST["lsTipofederacion"]);
			$sustitutos->setStrAsociacion($_POST["strAsociacion"]);
	       if($sustitutos->getStrIngresar())
		   {
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	 $valor=$sustitutos->getStrBuscarr();
            	header("Location:".DISPONIBILIDADLS_URL."disponibilidadls.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            //$strResultado .= $pdiscapacidad->getStrListar().'<br>';
            break;
			/*case( $_REQUEST["btnSiguiente"] == "Siguiente" ): 
        	$sustitutos->setStrCodigo($_POST["strCodigo"]);          
           
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	 $valor=$sustitutos->getStrBuscarr();
            	header("Location:".DISPONIBILIDADLS_URL."disponibilidadls.php?btnNuevo=Nuevo&strCodigo=".$valor."");*/
             break;
			 case( $_REQUEST["btnEditar"] == "Actualizar" ):
			$sustitutos->setStrCodigo($_POST["strCodigo"]); 
			$sustitutos->setstrFoto($_POST["strFoto"]);
            $sustitutos->setstrIdentificacion($_POST["lsIdentificacion"]);
			$sustitutos->setstrIdentificaciont($_POST["strIdentificaciont"]);
			$sustitutos->setStrNcarne($_POST["StrNcarne"]); 
			$sustitutos->setStrApaterno($_POST["StrApaterno"]);
			$sustitutos->setStrAmaterno($_POST["StrAmaterno"]); 
			$sustitutos->setStrPnombre($_POST["StrPnombre"]);
			$sustitutos->setStrSnombre($_POST["StrSnombre"]);
			$sustitutos->setStrGenero($_POST["lsGenero"]);
			$sustitutos->setStrEcivil($_POST["lsEcivil"]);
			$sustitutos->setStrFechaNacimiento($_POST["dtFecha"]);
			$sustitutos->setStrNhijos($_POST["lsNhijos"]);
			$sustitutos->setStrFconocer($_POST["lsFconocer"]);
			$sustitutos->setStrEstado($_POST["lsEstado"]);
			$sustitutos->setStrTseguro($_POST["lsTseguro"]);
			$sustitutos->setStrTiposeguro($_POST["lsTiposeguro"]);
			$sustitutos->setStrFechaIngreso($_POST["dtFechaIngreso"]);
			$sustitutos->setStrEtnia($_POST["lsEtnia"]);
			$sustitutos->setStrParroquia($_POST["lsParroquia"]);
			
			$sustitutos->setStrCprincipal($_POST["strCprincipal"]);
			$sustitutos->setStrNumero($_POST["strNumero"]);
			$sustitutos->setStrTransversal($_POST["strTransversal"]);
			$sustitutos->setStrSector($_POST["lsSector"]);
			$sustitutos->setStrPasaje($_POST["strPasaje"]);
			$sustitutos->setStrBarrio($_POST["strBarrio"]);
			$sustitutos->setStrManzana($_POST["strManzana"]);
			$sustitutos->setStrSolar($_POST["strSolar"]);
			$sustitutos->setStrObservacion($_POST["strObservacion"]);
			$sustitutos->setStrFijo($_POST["strFijo"]);
			$sustitutos->setStrMovil($_POST["strMovil"]);
			$sustitutos->setStrReferido1($_POST["StrReferido1"]);
			$sustitutos->setStrReferido2($_POST["StrReferido2"]);
			$sustitutos->setStrEmail($_POST["strEmail"]);
			$sustitutos->setStrObservaciond($_POST["strObservaciond"]);
			$sustitutos->setStrTlicencia($_POST["lsTlicencia"]);
			$sustitutos->setStrTipolicencia($_POST["lsTipolicencia"]);
			$sustitutos->setStrVehiculo($_POST["lsVehiculo"]);
			$sustitutos->setStrAdaptacion($_POST["lsAdaptacion"]);
			$sustitutos->setStrTadaptacion($_POST["strTadaptacion"]);
			$sustitutos->setStrTfederacion($_POST["lsTfederacion"]);
			$sustitutos->setStrTipofederacion($_POST["lsTipofederacion"]);
			$sustitutos->setStrAsociacion($_POST["strAsociacion"]);
            if($sustitutos->getStrActualizar())
                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';

            $strResultado .= $sustitutos->getStrListar().'<br>';
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
            $sustitutos->setStrCodigo($_REQUEST["strCodigo"]);
            $sustitutos->setStrEtiqueta("Actualizar&nbsp;Ciudadano");
            $sustitutos->setStrNombreBoton("btnEditar");
            $sustitutos->setStrValorBoton("Actualizar");

            if($sustitutos->getStrBuscar())
                $strResultado .= $sustitutos->getStrFormulario();
            else {
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
                $strResultado .= $sustitutos->getStrListar();
            }
            break;
            case( $_REQUEST["btnEliminar"] == "Eliminar" ):
            $sustitutos->setStrCodigo($_REQUEST["strCodigo"]);
            if ($sustitutos->getStrBuscar())
                if($sustitutos->getStrEliminar())
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
                else
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';

            $strResultado .= $sustitutos->getStrListar().'<br>';
            break;
			
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $sustitutos->setStrCodigo($_REQUEST["strCodigo"]);
            if ($sustitutos->getStrBuscar())
                $strResultado .= $sustitutos->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $sustitutos->getStrListar().'<br>';
                }
            break;
     //Cuando cambia el combo de la Provincia
        case( $_REQUEST["btnBuscar"] == "Canton" ):
            $canton = new clCanton();
            $sustitutos->setStrProvincia($_REQUEST["strCodigoProvincia"]);
            $strResultado .= print($canton->getStrListar($sustitutos->getStrProvincia(), $sustitutos->getStrCanton()));
            exit;

        //Cuando cambia el combo del Canton
        case( $_REQUEST["btnBuscar"] == "Parroquia" ):            
            $parroquia = new clParroquia();
            $sustitutos->setStrCanton($_REQUEST["strCodigoCanton"]);
            $strResultado = print($parroquia->getStrListar($sustitutos->getStrCanton(), $sustitutos->getStrParroquia()));
            exit;
  
        default:
            $strResultado .= $sustitutos->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>