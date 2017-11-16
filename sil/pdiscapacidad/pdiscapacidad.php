<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
    if(!(isset($_SESSION["usuario"])))
    header( "Location:". INICIO_URL );
    include_once( CLASS_PATH . "class.clinterfaz.php" );
    include_once( CLASS_PATH . "class.clpdiscapacidad.php" );

    $interfaz = new clInterfaz();
    $pdiscapacidad = new clPdiscapacidad();
    
    $strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
            $pdiscapacidad->setStrLectura("");
            $pdiscapacidad->setStrSucursal($_SESSION["usuario"]["suc"]);
			$pdiscapacidad->setStrTusuario("2");
            $pdiscapacidad->setStrEtiqueta("INGRESO&nbsp;CIUDADANO");
            $pdiscapacidad->setStrNombreBoton("btnGuardar");
            $pdiscapacidad->setStrValorBoton("Guardar");
			$pdiscapacidad->setStrNombreBotons("btnSiguiente");
            $pdiscapacidad->setStrValorBotons("Siguiente");
            $pdiscapacidad->setStrFechaNacimiento(date("Y-m-d"));
			$pdiscapacidad->setStrFechaIngreso(date("Y-m-d"));
            $strResultado .= $pdiscapacidad->getStrFormulario();
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ): 
        	//$pdiscapacidad->setStrCodigo($_POST["strCodigo"]);          
            $pdiscapacidad->setstrFoto($_POST["strFoto"]);
            $pdiscapacidad->setstrIdentificacion($_POST["lsIdentificacion"]);
			$pdiscapacidad->setstrIdentificaciont($_POST["strIdentificaciont"]);
			$pdiscapacidad->setStrNcarne($_POST["StrNcarne"]); 
			$pdiscapacidad->setStrApaterno($_POST["StrApaterno"]);
			$pdiscapacidad->setStrAmaterno($_POST["StrAmaterno"]); 
			$pdiscapacidad->setStrPnombre($_POST["StrPnombre"]);
			$pdiscapacidad->setStrSnombre($_POST["StrSnombre"]);
			$pdiscapacidad->setStrGenero($_POST["lsGenero"]);
			$pdiscapacidad->setStrEcivil($_POST["lsEcivil"]);
			$pdiscapacidad->setStrFechaNacimiento($_POST["dtFecha"]);
			$pdiscapacidad->setStrNhijos($_POST["lsNhijos"]);
			$pdiscapacidad->setStrFconocer($_POST["lsFconocer"]);
			$pdiscapacidad->setStrEstado($_POST["lsEstado"]);
			$pdiscapacidad->setStrTseguro($_POST["lsTseguro"]);
			$pdiscapacidad->setStrTiposeguro($_POST["lsTiposeguro"]);
			$pdiscapacidad->setStrFechaIngreso($_POST["dtFechaIngreso"]);
			$pdiscapacidad->setStrEtnia($_POST["lsEtnia"]);
			$pdiscapacidad->setStrParroquia($_POST["lsParroquia"]);
			$pdiscapacidad->setStrCprincipal($_POST["strCprincipal"]);
			$pdiscapacidad->setStrNumero($_POST["strNumero"]);
			$pdiscapacidad->setStrTransversal($_POST["strTransversal"]);
			$pdiscapacidad->setStrSector($_POST["lsSector"]);
			$pdiscapacidad->setStrPasaje($_POST["strPasaje"]);
			$pdiscapacidad->setStrBarrio($_POST["strBarrio"]);
			$pdiscapacidad->setStrManzana($_POST["strManzana"]);
			$pdiscapacidad->setStrSolar($_POST["strSolar"]);
			$pdiscapacidad->setStrObservacion($_POST["strObservacion"]);
			$pdiscapacidad->setStrFijo($_POST["strFijo"]);
			$pdiscapacidad->setStrMovil($_POST["strMovil"]);
			$pdiscapacidad->setStrReferido1($_POST["StrReferido1"]);
			$pdiscapacidad->setStrReferido2($_POST["StrReferido2"]);
			$pdiscapacidad->setStrEmail($_POST["strEmail"]);
			$pdiscapacidad->setStrObservaciond($_POST["strObservaciond"]);
			$pdiscapacidad->setStrTlicencia($_POST["lsTlicencia"]);
			$pdiscapacidad->setStrTipolicencia($_POST["lsTipolicencia"]);
			$pdiscapacidad->setStrVehiculo($_POST["lsVehiculo"]);
			$pdiscapacidad->setStrAdaptacion($_POST["lsAdaptacion"]);
			$pdiscapacidad->setStrTadaptacion($_POST["strTadaptacion"]);
			$pdiscapacidad->setStrTfederacion($_POST["lsTfederacion"]);
			$pdiscapacidad->setStrTipofederacion($_POST["lsTipofederacion"]);
			$pdiscapacidad->setStrAsociacion($_POST["strAsociacion"]);
	       if($pdiscapacidad->getStrIngresar())
		   {
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	 $valor=$pdiscapacidad->getStrBuscarr();
            	header("Location:".AYUDASTS_URL."ayudasts.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            //$strResultado .= $pdiscapacidad->getStrListar().'<br>';
            break;
			/*case( $_REQUEST["btnSiguiente"] == "Siguiente" ): 
        	$pdiscapacidad->setStrCodigo($_POST["strCodigo"]);          
            
	               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
	            	 $valor=$pdiscapacidad->getStrBuscarr();
	            	header("Location:".AYUDASTS_URL."ayudasts.php?btnNuevo=Nuevo&strCodigo=".$valor."");
	            
            break;	*/	
			 case( $_REQUEST["btnEditar"] == "Actualizar" ):
			$pdiscapacidad->setStrCodigo($_POST["strCodigo"]); 
			$pdiscapacidad->setstrFoto($_POST["strFoto"]);
            $pdiscapacidad->setstrIdentificacion($_POST["lsIdentificacion"]);
			$pdiscapacidad->setstrIdentificaciont($_POST["strIdentificaciont"]);
			$pdiscapacidad->setStrNcarne($_POST["StrNcarne"]); 
			$pdiscapacidad->setStrApaterno($_POST["StrApaterno"]);
			$pdiscapacidad->setStrAmaterno($_POST["StrAmaterno"]); 
			$pdiscapacidad->setStrPnombre($_POST["StrPnombre"]);
			$pdiscapacidad->setStrSnombre($_POST["StrSnombre"]);
			$pdiscapacidad->setStrGenero($_POST["lsGenero"]);
			$pdiscapacidad->setStrEcivil($_POST["lsEcivil"]);
			$pdiscapacidad->setStrFechaNacimiento($_POST["dtFecha"]);
			$pdiscapacidad->setStrNhijos($_POST["lsNhijos"]);
			$pdiscapacidad->setStrFconocer($_POST["lsFconocer"]);
			$pdiscapacidad->setStrEstado($_POST["lsEstado"]);
			$pdiscapacidad->setStrTseguro($_POST["lsTseguro"]);
			$pdiscapacidad->setStrTiposeguro($_POST["lsTiposeguro"]);
			$pdiscapacidad->setStrFechaIngreso($_POST["dtFechaIngreso"]);
			$pdiscapacidad->setStrEtnia($_POST["lsEtnia"]);
			$pdiscapacidad->setStrParroquia($_POST["lsParroquia"]);
			
			$pdiscapacidad->setStrCprincipal($_POST["strCprincipal"]);
			$pdiscapacidad->setStrNumero($_POST["strNumero"]);
			$pdiscapacidad->setStrTransversal($_POST["strTransversal"]);
			$pdiscapacidad->setStrSector($_POST["lsSector"]);
			$pdiscapacidad->setStrPasaje($_POST["strPasaje"]);
			$pdiscapacidad->setStrBarrio($_POST["strBarrio"]);
			$pdiscapacidad->setStrManzana($_POST["strManzana"]);
			$pdiscapacidad->setStrSolar($_POST["strSolar"]);
			$pdiscapacidad->setStrObservacion($_POST["strObservacion"]);
			$pdiscapacidad->setStrFijo($_POST["strFijo"]);
			$pdiscapacidad->setStrMovil($_POST["strMovil"]);
			$pdiscapacidad->setStrReferido1($_POST["StrReferido1"]);
			$pdiscapacidad->setStrReferido2($_POST["StrReferido2"]);
			$pdiscapacidad->setStrEmail($_POST["strEmail"]);
			$pdiscapacidad->setStrObservaciond($_POST["strObservaciond"]);
			$pdiscapacidad->setStrTlicencia($_POST["lsTlicencia"]);
			$pdiscapacidad->setStrTipolicencia($_POST["lsTipolicencia"]);
			$pdiscapacidad->setStrVehiculo($_POST["lsVehiculo"]);
			$pdiscapacidad->setStrAdaptacion($_POST["lsAdaptacion"]);
			$pdiscapacidad->setStrTadaptacion($_POST["strTadaptacion"]);
			$pdiscapacidad->setStrTfederacion($_POST["lsTfederacion"]);
			$pdiscapacidad->setStrTipofederacion($_POST["lsTipofederacion"]);
			$pdiscapacidad->setStrAsociacion($_POST["strAsociacion"]);
			
			$v=$pdiscapacidad->getStrCodigo();
            if($pdiscapacidad->getStrActualizar())
                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';

            header("Location:".PDISCAPACIDAD_URL."pdiscapacidad.php?btnActualizar=Actualizar&strCodigo=".$v."");
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
            $pdiscapacidad->setStrCodigo($_REQUEST["strCodigo"]);
            $pdiscapacidad->setStrEtiqueta("Actualizar&nbsp;Persona con Discapacidad");
            $pdiscapacidad->setStrNombreBoton("btnEditar");
            $pdiscapacidad->setStrValorBoton("Actualizar");

            if($pdiscapacidad->getStrBuscar())
                $strResultado .= $pdiscapacidad->getStrFormulario();
            else {
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
                $strResultado .= $pdiscapacidad->getStrListar();
            }
            break;
            case( $_REQUEST["btnEliminar"] == "Eliminar" ):
            $pdiscapacidad->setStrCodigo($_REQUEST["strCodigo"]);
            if ($pdiscapacidad->getStrBuscar())
                if($pdiscapacidad->getStrEliminar())
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
                else
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar Persona con Discapacidad [ Persona Con Discapacidad]</span>';
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';

            $strResultado .= $pdiscapacidad->getStrListar().'<br>';
            break;
			
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $pdiscapacidad->setStrCodigo($_REQUEST["strCodigo"]);
            if ($pdiscapacidad->getStrBuscar())
                $strResultado .= $pdiscapacidad->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $pdiscapacidad->getStrListar().'<br>';
                }
            break;
     //Cuando cambia el combo de la Provincia
        case( $_REQUEST["btnBuscar"] == "Canton" ):
            $canton = new clCanton();
            $pdiscapacidad->setStrProvincia($_REQUEST["strCodigoProvincia"]);
            $strResultado .= print($canton->getStrListar($pdiscapacidad->getStrProvincia(), $pdiscapacidad->getStrCanton()));
            exit;

        //Cuando cambia el combo del Canton
        case( $_REQUEST["btnBuscar"] == "Parroquia" ):            
            $parroquia = new clParroquia();
            $pdiscapacidad->setStrCanton($_REQUEST["strCodigoCanton"]);
            $strResultado = print($parroquia->getStrListar($pdiscapacidad->getStrCanton(), $pdiscapacidad->getStrParroquia()));
            exit;
  
        default:
            $strResultado .= $pdiscapacidad->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>