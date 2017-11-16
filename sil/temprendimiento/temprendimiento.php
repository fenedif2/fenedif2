<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    include_once( CLASS_PATH . "class.clinterfaz.php" );
    include_once( CLASS_PATH . "class.cltemprendimiento.php" );
    include_once( CLASS_PATH . "class.clestadotemprendimiento.php" );
	include_once( CLASS_PATH . "class.cltipotemprendimiento.php" );
	include_once( CLASS_PATH . "class.clcobertura.php" );
	include_once( CLASS_PATH . "class.clexperiencia.php" );
	include_once( CLASS_PATH . "class.clprovincia.php" );
    include_once( CLASS_PATH . "class.clcanton.php" );
    include_once( CLASS_PATH . "class.clparroquia.php" );
	include_once( CLASS_PATH . "class.clsucursal.php" );
	include_once( CLASS_PATH . "class.clsector.php" );

    $interfaz = new clInterfaz();
    $temprendimiento = new clTemprendimiento();
    
    $strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
            $temprendimiento->setStrLectura("");
            $temprendimiento->setStrSucursal($_SESSION["usuario"]["suc"]);
            $temprendimiento->setStrEtiqueta("INGRESO EMPRENDIMIENTO");
            $temprendimiento->setStrNombreBoton("btnGuardar");
            $temprendimiento->setStrValorBoton("Guardar");
            $temprendimiento->setStrFechaNacimiento(date("Y-m-d"));
            $strResultado .= $temprendimiento->getStrFormulario();
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ):            
            $temprendimiento->setStrTusuario($_POST["lsTusuario"]);
            $temprendimiento->setstrTnegocio($_POST["strTnegocio"]);
            $temprendimiento->setstrTsectorp($_POST["lsTsectorp"]);
			$temprendimiento->setstrCapacitacion($_POST["lsCapacitacion"]);
			$temprendimiento->setstrInstitucion($_POST["strInstitucion"]); 
			$temprendimiento->setstrConocimiento($_POST["strConocimiento"]);
			$temprendimiento->setstrEspacio($_POST["lsEspacio"]); 
			$temprendimiento->setstrIngreso($_POST["lsIngreso"]);
			$temprendimiento->setstrTcontable($_POST["lsTcontable"]);
			$temprendimiento->setstrTcontabilidad($_POST["lsTcontabilidad"]);
			$temprendimiento->setstrTdtiempo($_POST["lsTdtiempo"]);
			$temprendimiento->setstrTfnegocio($_POST["lsTfnegocio"]);
			$temprendimiento->setStrParroquia($_POST["lsParroquia"]);
			$temprendimiento->setstrTfinanciamiento($_POST["lsTfinanciamiento"]);
			$temprendimiento->setstrTaportado($_POST["lsTaportado"]);
			$temprendimiento->setstrTgarante($_POST["lsTgarante"]);
			$temprendimiento->setStrSector($_POST["lsSector"]);
			$temprendimiento->setstrTqgarante($_POST["lsTqgarante"]);
			$temprendimiento->setStrFechaNacimiento($_POST["dtFecha"]);
			$temprendimiento->setStrTproduccion($_POST["lsTproduccion"]);
			$temprendimiento->setStrNtrabajador($_POST["strNtrabajador"]);
			$temprendimiento->setStrTmaquinaria($_POST["lsTmaquinaria"]);
			$temprendimiento->setStrmaquinaria($_POST["strmaquinaria"]);
			$temprendimiento->setStrTformacion($_POST["lsTformacion"]);
			$temprendimiento->setStrformacion($_POST["strformacion"]);
			$temprendimiento->setStrTfamilia($_POST["lsTfamilia"]);
			$temprendimiento->setStrfamilia($_POST["strfamilia"]);
			$temprendimiento->setStrTcliente($_POST["strtcliente"]);
			$temprendimiento->setStrTruc($_POST["lsTruc"]);
			$temprendimiento->setStrTproducto($_POST["strtproducto"]);
			$temprendimiento->setStrproduccion($_POST["lsproduccion"]);
			$temprendimiento->setStrTfplanteado($_POST["lstfplanteado"]);
			$temprendimiento->setStrTantiguedadn($_POST["lstantiguedadn"]);
			$temprendimiento->setStrTventas($_POST["lstventas"]);
			$temprendimiento->setStrtelefono($_POST["strTelefono"]);
			$temprendimiento->setStrmail($_POST["strmail"]);
			$temprendimiento->setStrtcompleto($_POST["strtcompleto"]);
			$temprendimiento->setStrtparcial($_POST["strtparcial"]);
			$temprendimiento->setStrtrequerido($_POST["lstrequerido"]);
			$temprendimiento->setStrrequerido($_POST["strrequerido"]);
			$temprendimiento->setStrtdeclaraciones($_POST["lstdeclaraciones"]);
			$temprendimiento->setStrtmarca($_POST["lstmarca"]);
			$temprendimiento->setStrmarca($_POST["strmarca"]);
			$temprendimiento->setStrtclientes($_POST["strtclientes"]);
			$temprendimiento->setStrtcapital($_POST["lstcapital"]);
			$temprendimiento->setStrtcredito($_POST["lstcredito"]);
			$temprendimiento->setStrtipocredito($_POST["lstipocredito"]);
			$temprendimiento->setStrtretrasado($_POST["lstretrasado"]);
			$temprendimiento->setStrretrasado($_POST["strretrasado"]);
			$temprendimiento->setStrtpuntual($_POST["lstpuntual"]);
			$temprendimiento->setStrtdeudas($_POST["lstdeudas"]);
			$temprendimiento->setStrtdeudasquien($_POST["lstdeudasquien"]);
	       if($temprendimiento->getStrIngresar())
		   {
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            $strResultado .= $temprendimiento->getStrListar().'<br>';
            break;
			 case( $_REQUEST["btnEditar"] == "Actualizar" ):
			$temprendimiento->setStrCodigo($_POST["strCodigo"]);          
            $temprendimiento->setStrTusuario($_POST["lsTusuario"]);
            $temprendimiento->setstrTnegocio($_POST["strTnegocio"]);
            $temprendimiento->setstrTsectorp($_POST["lsTsectorp"]);
			$temprendimiento->setstrCapacitacion($_POST["lsCapacitacion"]);
			$temprendimiento->setstrInstitucion($_POST["strInstitucion"]); 
			$temprendimiento->setstrConocimiento($_POST["strConocimiento"]);
			$temprendimiento->setstrEspacio($_POST["lsEspacio"]); 
			$temprendimiento->setstrIngreso($_POST["lsIngreso"]);
			$temprendimiento->setstrTcontable($_POST["lsTcontable"]);
			$temprendimiento->setstrTcontabilidad($_POST["lsTcontabilidad"]);
			$temprendimiento->setstrTdtiempo($_POST["lsTdtiempo"]);
			$temprendimiento->setstrTfnegocio($_POST["lsTfnegocio"]);
			$temprendimiento->setStrParroquia($_POST["lsParroquia"]);
			$temprendimiento->setstrTfinanciamiento($_POST["lsTfinanciamiento"]);
			$temprendimiento->setstrTaportado($_POST["lsTaportado"]);
			$temprendimiento->setstrTgarante($_POST["lsTgarante"]);
			$temprendimiento->setStrSector($_POST["lsSector"]);
			$temprendimiento->setstrTqgarante($_POST["lsTqgarante"]);
			$temprendimiento->setStrFechaNacimiento($_POST["dtFecha"]);
			$temprendimiento->setStrTproduccion($_POST["lsTproduccion"]);
			$temprendimiento->setStrNtrabajador($_POST["strNtrabajador"]);
			$temprendimiento->setStrTmaquinaria($_POST["lsTmaquinaria"]);
			$temprendimiento->setStrmaquinaria($_POST["strmaquinaria"]);
			$temprendimiento->setStrTformacion($_POST["lsTformacion"]);
			$temprendimiento->setStrformacion($_POST["strformacion"]);
			$temprendimiento->setStrTfamilia($_POST["lsTfamilia"]);
			$temprendimiento->setStrfamilia($_POST["strfamilia"]);
			$temprendimiento->setStrTcliente($_POST["strtcliente"]);
			$temprendimiento->setStrTruc($_POST["lsTruc"]);
			$temprendimiento->setStrTproducto($_POST["strtproducto"]);
			$temprendimiento->setStrproduccion($_POST["lsproduccion"]);
			$temprendimiento->setStrTfplanteado($_POST["lstfplanteado"]);
			$temprendimiento->setStrTantiguedadn($_POST["lstantiguedadn"]);
			$temprendimiento->setStrTventas($_POST["lstventas"]);
			$temprendimiento->setStrtelefono($_POST["strTelefono"]);
			$temprendimiento->setStrmail($_POST["strmail"]);
			$temprendimiento->setStrtcompleto($_POST["strtcompleto"]);
			$temprendimiento->setStrtparcial($_POST["strtparcial"]);
			$temprendimiento->setStrtrequerido($_POST["lstrequerido"]);
			$temprendimiento->setStrrequerido($_POST["strrequerido"]);
			$temprendimiento->setStrtdeclaraciones($_POST["lstdeclaraciones"]);
			$temprendimiento->setStrtmarca($_POST["lstmarca"]);
			$temprendimiento->setStrmarca($_POST["strmarca"]);
			$temprendimiento->setStrtclientes($_POST["strtclientes"]);
			$temprendimiento->setStrtcapital($_POST["lstcapital"]);
			$temprendimiento->setStrtcredito($_POST["lstcredito"]);
			$temprendimiento->setStrtipocredito($_POST["lstipocredito"]);
			$temprendimiento->setStrtretrasado($_POST["lstretrasado"]);
			$temprendimiento->setStrretrasado($_POST["strretrasado"]);
			$temprendimiento->setStrtpuntual($_POST["lstpuntual"]);
			$temprendimiento->setStrtdeudas($_POST["lstdeudas"]);
			$temprendimiento->setStrtdeudasquien($_POST["lstdeudasquien"]);
			
            if($temprendimiento->getStrActualizar())
                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';

            $strResultado .= $temprendimiento->getStrListar().'<br>';
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
            $temprendimiento->setStrCodigo($_REQUEST["strCodigo"]);
            $temprendimiento->setStrEtiqueta("ACTUALIZAR EMPRENDIMIENTO");
            $temprendimiento->setStrNombreBoton("btnEditar");
            $temprendimiento->setStrValorBoton("Actualizar");

            if($temprendimiento->getStrBuscar())
                $strResultado .= $temprendimiento->getStrFormulario();
            else {
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
                $strResultado .= $temprendimiento->getStrListar();
            }
            break;
            case( $_REQUEST["btnEliminar"] == "Eliminar" ):
            $temprendimiento->setStrCodigo($_REQUEST["strCodigo"]);
            if ($temprendimiento->getStrBuscar())
                if($temprendimiento->getStrEliminar())
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
                else
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';

            $strResultado .= $temprendimiento->getStrListar().'<br>';
            break;
			
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $temprendimiento->setStrCodigo($_REQUEST["strCodigo"]);
            if ($temprendimiento->getStrBuscar())
                $strResultado .= $temprendimiento->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $temprendimiento->getStrListar().'<br>';
                }
            break;
     //Cuando cambia el combo de la Provincia
        case( $_REQUEST["btnBuscar"] == "Canton" ):
            $canton = new clCanton();
            $temprendimiento->setStrProvincia($_REQUEST["strCodigoProvincia"]);
            $strResultado .= print($canton->getStrListar($temprendimiento->getStrProvincia(), $temprendimiento->getStrCanton()));
            exit;

        //Cuando cambia el combo del Canton
        case( $_REQUEST["btnBuscar"] == "Parroquia" ):            
            $parroquia = new clParroquia();
            $temprendimiento->setStrCanton($_REQUEST["strCodigoCanton"]);
            $strResultado = print($parroquia->getStrListar($temprendimiento->getStrCanton(), $temprendimiento->getStrParroquia()));
            exit;
  
        default:
            $strResultado .= $temprendimiento->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>