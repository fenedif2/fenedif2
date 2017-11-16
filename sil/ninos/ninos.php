<?php include('../caching/cache.start.php'); ?>

<?php
  session_start();
  header('Content-Type: text/html; charset=ISO-8859-1');
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    include_once( CLASS_PATH . "class.clinterfaz.php" );
    include_once( CLASS_PATH . "class.clninos.php" );

    $interfaz = new clInterfaz();
    $ninos = new clNinos();
    
    $strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
			$ninos->setStrLectura("");
            $ninos->setStrSucursal($_SESSION["usuario"]["suc"]);
			$ninos->setStrTusuario("1");
            $ninos->setStrEtiqueta("INGRESO&nbsp;NIÑOS Y ADOLESCENTES");
            $ninos->setStrNombreBoton("btnGuardar");
            $ninos->setStrValorBoton("Guardar");
            $ninos->setStrFechaNacimiento(date("Y-m-d"));
			$ninos->setStrFechaIngreso(date("Y-m-d"));
			$ninos->setStrNombreBotons("btnSiguiente");
	        $ninos->setStrValorBotons("Siguiente");
            $strResultado .= $ninos->getStrFormulario();
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ): 
        	$ninos->setStrCodigo($_POST["strCodigo"]);          
            $ninos->setstrFoto($_POST["strFoto"]);
            $ninos->setstrIdentificacion($_POST["lsIdentificacion"]);
			$ninos->setstrIdentificaciont($_POST["strIdentificaciont"]);
			$ninos->setStrNcarne($_POST["StrNcarne"]); 
			$ninos->setStrApaterno($_POST["StrApaterno"]);
			$ninos->setStrAmaterno($_POST["StrAmaterno"]); 
			$ninos->setStrPnombre($_POST["StrPnombre"]);
			$ninos->setStrSnombre($_POST["StrSnombre"]);
			$ninos->setStrGenero($_POST["lsGenero"]);
			$ninos->setStrEcivil($_POST["lsEcivil"]);
			$ninos->setStrFechaNacimiento($_POST["dtFecha"]);
			$ninos->setStrNhijos($_POST["lsNhijos"]);
			$ninos->setStrFconocer($_POST["lsFconocer"]);
			$ninos->setStrEstado($_POST["lsEstado"]);
			$ninos->setStrTseguro($_POST["lsTseguro"]);
			$ninos->setStrTiposeguro($_POST["lsTiposeguro"]);
			$ninos->setStrFechaIngreso($_POST["dtFechaIngreso"]);
			$ninos->setStrEtnia($_POST["lsEtnia"]);
			$ninos->setStrParroquia($_POST["lsParroquia"]);
			$ninos->setStrCprincipal($_POST["strCprincipal"]);
			$ninos->setStrNumero($_POST["strNumero"]);
			$ninos->setStrTransversal($_POST["strTransversal"]);
			$ninos->setStrSector($_POST["lsSector"]);
			$ninos->setStrPasaje($_POST["strPasaje"]);
			$ninos->setStrBarrio($_POST["strBarrio"]);
			$ninos->setStrManzana($_POST["strManzana"]);
			$ninos->setStrSolar($_POST["strSolar"]);
			$ninos->setStrObservacion($_POST["strObservacion"]);
			$ninos->setStrFijo($_POST["strFijo"]);
			$ninos->setStrMovil($_POST["strMovil"]);
			$ninos->setStrReferido1($_POST["StrReferido1"]);
			$ninos->setStrReferido2($_POST["StrReferido2"]);
			$ninos->setStrEmail($_POST["strEmail"]);
			$ninos->setStrObservaciond($_POST["strObservaciond"]);
			$ninos->setStrTlicencia($_POST["lsTlicencia"]);
			$ninos->setStrTipolicencia($_POST["lsTipolicencia"]);
			$ninos->setStrVehiculo($_POST["lsVehiculo"]);
			$ninos->setStrAdaptacion($_POST["lsAdaptacion"]);
			$ninos->setStrTadaptacion($_POST["strTadaptacion"]);
			$ninos->setStrTfederacion($_POST["lsTfederacion"]);
			$ninos->setStrTipofederacion($_POST["lsTipofederacion"]);
			$ninos->setStrAsociacion($_POST["strAsociacion"]);
	       if($ninos->getStrIngresar())
		   {
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
               $valor=$ninos->getStrBuscarr();
            	header("Location:".AYUDAST_URL."ayudast.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            //$strResultado .= $ninos->getStrListar().'<br>';
            break;
			/*case( $_REQUEST["btnSiguiente"] == "Siguiente" ):            
            	$ninos->setStrCodigo($_POST["strCodigo"]);
        		$valor=$ninos->getStrBuscarr();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".AYUDAST_URL."ayudast.php?btnNuevo=Nuevo&strCodigo=".$valor."");*/
            break;
			 case( $_REQUEST["btnEditar"] == "Actualizar" ):
			$ninos->setStrCodigo($_POST["strCodigo"]); 
			$ninos->setstrFoto($_POST["strFoto"]);
            $ninos->setstrIdentificacion($_POST["lsIdentificacion"]);
			$ninos->setstrIdentificaciont($_POST["strIdentificaciont"]);
			$ninos->setStrNcarne($_POST["StrNcarne"]); 
			$ninos->setStrApaterno($_POST["StrApaterno"]);
			$ninos->setStrAmaterno($_POST["StrAmaterno"]); 
			$ninos->setStrPnombre($_POST["StrPnombre"]);
			$ninos->setStrSnombre($_POST["StrSnombre"]);
			$ninos->setStrGenero($_POST["lsGenero"]);
			$ninos->setStrEcivil($_POST["lsEcivil"]);
			$ninos->setStrFechaNacimiento($_POST["dtFecha"]);
			$ninos->setStrNhijos($_POST["lsNhijos"]);
			$ninos->setStrFconocer($_POST["lsFconocer"]);
			$ninos->setStrEstado($_POST["lsEstado"]);
			$ninos->setStrTseguro($_POST["lsTseguro"]);
			$ninos->setStrTiposeguro($_POST["lsTiposeguro"]);
			$ninos->setStrFechaIngreso($_POST["dtFechaIngreso"]);
			$ninos->setStrEtnia($_POST["lsEtnia"]);
			$ninos->setStrParroquia($_POST["lsParroquia"]);
			
			$ninos->setStrCprincipal($_POST["strCprincipal"]);
			$ninos->setStrNumero($_POST["strNumero"]);
			$ninos->setStrTransversal($_POST["strTransversal"]);
			$ninos->setStrSector($_POST["lsSector"]);
			$ninos->setStrPasaje($_POST["strPasaje"]);
			$ninos->setStrBarrio($_POST["strBarrio"]);
			$ninos->setStrManzana($_POST["strManzana"]);
			$ninos->setStrSolar($_POST["strSolar"]);
			$ninos->setStrObservacion($_POST["strObservacion"]);
			$ninos->setStrFijo($_POST["strFijo"]);
			$ninos->setStrMovil($_POST["strMovil"]);
			$ninos->setStrReferido1($_POST["StrReferido1"]);
			$ninos->setStrReferido2($_POST["StrReferido2"]);
			$ninos->setStrEmail($_POST["strEmail"]);
			$ninos->setStrObservaciond($_POST["strObservaciond"]);
			$ninos->setStrTlicencia($_POST["lsTlicencia"]);
			$ninos->setStrTipolicencia($_POST["lsTipolicencia"]);
			$ninos->setStrVehiculo($_POST["lsVehiculo"]);
			$ninos->setStrAdaptacion($_POST["lsAdaptacion"]);
			$ninos->setStrTadaptacion($_POST["strTadaptacion"]);
			$ninos->setStrTfederacion($_POST["lsTfederacion"]);
			$ninos->setStrTipofederacion($_POST["lsTipofederacion"]);
			$ninos->setStrAsociacion($_POST["strAsociacion"]);
            if($ninos->getStrActualizar())
                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
			
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';

            $strResultado .= $ninos->getStrListar().'<br>';
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
            $ninos->setStrCodigo($_REQUEST["strCodigo"]);
            $ninos->setStrEtiqueta("ACTUALIZAR CIUDADNO");
            $ninos->setStrNombreBoton("btnEditar");
            $ninos->setStrValorBoton("Actualizar");

            if($ninos->getStrBuscar())
                $strResultado .= $ninos->getStrFormulario();
            else {
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
                $strResultado .= $ninos->getStrListar();
            }
            break;
            case( $_REQUEST["btnEliminar"] == "Eliminar" ):
            $ninos->setStrCodigo($_REQUEST["strCodigo"]);
            if ($ninos->getStrBuscar())
                if($ninos->getStrEliminar())
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
                else
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar Usuario [ Niños/Adolecentes ]</span>';
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';

            $strResultado .= $ninos->getStrListar().'<br>';
            break;
			
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $ninos->setStrCodigo($_REQUEST["strCodigo"]);
            if ($ninos->getStrBuscar())
                $strResultado .= $ninos->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $ninos->getStrListar().'<br>';
                }
            break;
     //Cuando cambia el combo de la Provincia
        case( $_REQUEST["btnBuscar"] == "Canton" ):
            $canton = new clCanton();
            $ninos->setStrProvincia($_REQUEST["strCodigoProvincia"]);
            $strResultado .= print($canton->getStrListar($ninos->getStrProvincia(), $ninos->getStrCanton()));
            exit;

        //Cuando cambia el combo del Canton
        case( $_REQUEST["btnBuscar"] == "Parroquia" ):            
            $parroquia = new clParroquia();
            $ninos->setStrCanton($_REQUEST["strCodigoCanton"]);
            $strResultado = print($parroquia->getStrListar($ninos->getStrCanton(), $ninos->getStrParroquia()));
            exit;
  
        default:
            $strResultado .= $ninos->getStrListar().'<br>';
			
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>
<?php include('../caching/cache.end.php'); ?>