<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    include_once( CLASS_PATH . "class.clinterfaz.php" );
    include_once( CLASS_PATH . "class.clvfamiliares.php" );

    $interfaz = new clInterfaz();
    $vfamiliares = new clvfamiliares();
    
    $strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
            $vfamiliares->setStrLectura("");
            //$vfamiliares->setStrSucursal($_SESSION["usuario"]["suc"]);
            $vfamiliares->setStrEtiqueta("VISITA FAMILIAR");
            $vfamiliares->setStrNombreBoton("btnGuardar");
            $vfamiliares->setStrValorBoton("Guardar");
            $vfamiliares->setStrFechaNacimiento(date("Y-m-d"));
			//$vfamiliares->setStrFechaIngreso(date("Y-m-d"));
            $strResultado .= $vfamiliares->getStrFormulario();
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ): 
        	//$vfamiliares->setStrCodigo($_POST["strCodigo"]);          
            $vfamiliares->setstrNapellidos($_POST["strNapellidos"]);
            $vfamiliares->setstrVisitaa($_POST["strVisitaa"]);
			$vfamiliares->setstrVisitab($_POST["strVisitab"]);
			$vfamiliares->setStrVisitac($_POST["strVisitac"]); 
			$vfamiliares->setStrVisitamf($_POST["strVisitamf"]);
			$vfamiliares->setStrLlegada($_POST["strLlegada"]); 
			$vfamiliares->setStrSalida($_POST["strSalida"]);
			$vfamiliares->setStrTiempov($_POST["strTiempov"]);
			$vfamiliares->setStrFechaNacimiento($_POST["dtFecha"]);
			$vfamiliares->setStrObjetivov($_POST["strObjetivov"]);
			$vfamiliares->setStrVisitanh($_POST["strVisitanh"]);
			$vfamiliares->setStrVarones($_POST["strVarones"]);
			$vfamiliares->setStrVaronesn($_POST["strVaronesn"]);
			$vfamiliares->setStrVaronesp($_POST["strVaronesp"]);
			$vfamiliares->setStrMujeres($_POST["strMujeres"]);
			$vfamiliares->setStrMujeresn($_POST["strMujeresn"]);
			$vfamiliares->setStrMujeresp($_POST["strMujeresp"]);
			$vfamiliares->setStrPadre($_POST["strPadre"]);
			$vfamiliares->setStrMadre($_POST["strMadre"]);
			$vfamiliares->setStrHijosc($_POST["strHijosc"]);
			$vfamiliares->setStrOtrosq($_POST["strOtrosq"]);
			$vfamiliares->setStrDirecciond($_POST["strDirecciond"]);
			$vfamiliares->setStrZona($_POST["strZona"]);
	    if($vfamiliares->getStrIngresar())
		   {
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            //$strResultado .= $vfamiliares->getStrListar().'<br>';
            break;
			 case( $_REQUEST["btnEditar"] == "Actualizar" ):
			$vfamiliares->setStrCodigo($_POST["strCodigo"]);          
            $vfamiliares->setstrNapellidos($_POST["strNapellidos"]);
            $vfamiliares->setstrVisitaa($_POST["strVisitaa"]);
			$vfamiliares->setstrVisitab($_POST["strVisitab"]);
			$vfamiliares->setStrVisitac($_POST["strVisitac"]); 
			$vfamiliares->setStrVisitamf($_POST["strVisitamf"]);
			$vfamiliares->setStrLlegada($_POST["strLlegada"]); 
			$vfamiliares->setStrSalida($_POST["strSalida"]);
			$vfamiliares->setStrTiempov($_POST["strTiempov"]);
			$vfamiliares->setStrFechaNacimiento($_POST["dtFecha"]);
			$vfamiliares->setStrObjetivov($_POST["strObjetivov"]);
			$vfamiliares->setStrVisitanh($_POST["strVisitanh"]);
			$vfamiliares->setStrVarones($_POST["strVarones"]);
			$vfamiliares->setStrVaronesn($_POST["strVaronesn"]);
			$vfamiliares->setStrVaronesp($_POST["strVaronesp"]);
			$vfamiliares->setStrMujeres($_POST["strMujeres"]);
			$vfamiliares->setStrMujeresn($_POST["strMujeresn"]);
			$vfamiliares->setStrMujeresp($_POST["strMujeresp"]);
			$vfamiliares->setStrPadre($_POST["strPadre"]);
			$vfamiliares->setStrMadre($_POST["strMadre"]);
			$vfamiliares->setStrHijosc($_POST["strHijosc"]);
			$vfamiliares->setStrOtrosq($_POST["strOtrosq"]);
			$vfamiliares->setStrDirecciond($_POST["strDirecciond"]);
			$vfamiliares->setStrZona($_POST["strZona"]);
            if($vfamiliares->getStrActualizar())
                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';

            $strResultado .= $vfamiliares->getStrListar().'<br>';
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
            $vfamiliares->setStrCodigo($_REQUEST["strCodigo"]);
            $vfamiliares->setStrEtiqueta("ACTUALIZAR VISITA FAMILIAR ");
            $vfamiliares->setStrNombreBoton("btnEditar");
            $vfamiliares->setStrValorBoton("Actualizar");

            if($vfamiliares->getStrBuscar())
                $strResultado .= $vfamiliares->getStrFormulario();
            else {
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
                $strResultado .= $vfamiliares->getStrListar();
            }
            break;
            case( $_REQUEST["btnEliminar"] == "Eliminar" ):
            $vfamiliares->setStrCodigo($_REQUEST["strCodigo"]);
            if ($vfamiliares->getStrBuscar())
                if($vfamiliares->getStrEliminar())
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
                else
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';

            $strResultado .= $vfamiliares->getStrListar().'<br>';
            break;
			
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $vfamiliares->setStrCodigo($_REQUEST["strCodigo"]);
            if ($vfamiliares->getStrBuscar())
                $strResultado .= $vfamiliares->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $vfamiliares->getStrListar().'<br>';
                }
            break;
     //Cuando cambia el combo de la Provincia
        case( $_REQUEST["btnBuscar"] == "Canton" ):
            $canton = new clCanton();
            $vfamiliares->setStrProvincia($_REQUEST["strCodigoProvincia"]);
            $strResultado .= print($canton->getStrListar($vfamiliares->getStrProvincia(), $vfamiliares->getStrCanton()));
            exit;

        //Cuando cambia el combo del Canton
        case( $_REQUEST["btnBuscar"] == "Parroquia" ):            
            $parroquia = new clParroquia();
            $vfamiliares->setStrCanton($_REQUEST["strCodigoCanton"]);
            $strResultado = print($parroquia->getStrListar($vfamiliares->getStrCanton(), $vfamiliares->getStrParroquia()));
            exit;
  
        default:
            $strResultado .= $vfamiliares->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>