<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    include_once( CLASS_PATH . "class.clinterfaz.php" );
    include_once( CLASS_PATH . "class.cltampliacion.php" );
    include_once( CLASS_PATH . "class.clestadotampliacion.php" );
	include_once( CLASS_PATH . "class.cltipotampliacion.php" );
	include_once( CLASS_PATH . "class.clcobertura.php" );
	include_once( CLASS_PATH . "class.clexperiencia.php" );
	include_once( CLASS_PATH . "class.clprovincia.php" );
    include_once( CLASS_PATH . "class.clcanton.php" );
    include_once( CLASS_PATH . "class.clparroquia.php" );
	include_once( CLASS_PATH . "class.clsucursal.php" );
	include_once( CLASS_PATH . "class.clsector.php" );

    $interfaz = new clInterfaz();
    $tampliacion = new clTampliacion();
    
    $strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
            $tampliacion->setStrLectura("");
            $tampliacion->setStrSucursal($_SESSION["usuario"]["suc"]);
            $tampliacion->setStrEtiqueta("INGRESO AMPLIACIÓN DE NEGOCIO");
            $tampliacion->setStrNombreBoton("btnGuardar");
            $tampliacion->setStrValorBoton("Guardar");
            $tampliacion->setStrFechaNacimiento(date("Y-m-d"));
            $strResultado .= $tampliacion->getStrFormulario();
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ):            
            $tampliacion->setStrTusuario($_POST["lsTusuario"]);
            $tampliacion->setstrTnegocio($_POST["strTnegocio"]);
            $tampliacion->setstrTsectorp($_POST["lsTsectorp"]);
			$tampliacion->setstrCapacitacion($_POST["lsCapacitacion"]);
			$tampliacion->setstrInstitucion($_POST["strInstitucion"]); 
			$tampliacion->setstrConocimiento($_POST["strConocimiento"]);
			$tampliacion->setstrEspacio($_POST["lsEspacio"]); 
			$tampliacion->setstrIngreso($_POST["lsIngreso"]);
			$tampliacion->setstrTcontable($_POST["lsTcontable"]);
			$tampliacion->setstrTcontabilidad($_POST["lsTcontabilidad"]);
			$tampliacion->setstrTdtiempo($_POST["lsTdtiempo"]);
			$tampliacion->setstrTfnegocio($_POST["lsTfnegocio"]);
			$tampliacion->setStrParroquia($_POST["lsParroquia"]);
			$tampliacion->setstrTfinanciamiento($_POST["lsTfinanciamiento"]);
			$tampliacion->setstrTaportado($_POST["lsTaportado"]);
			$tampliacion->setstrTgarante($_POST["lsTgarante"]);
			$tampliacion->setStrSector($_POST["lsSector"]);
			$tampliacion->setstrTqgarante($_POST["lsTqgarante"]);
			$tampliacion->setStrFechaNacimiento($_POST["dtFecha"]);
	       if($tampliacion->getStrIngresar())
		   {
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            $strResultado .= $tampliacion->getStrListar().'<br>';
            break;
			 case( $_REQUEST["btnEditar"] == "Actualizar" ):
			$tampliacion->setStrCodigo($_POST["strCodigo"]);          
             $tampliacion->setStrTusuario($_POST["lsTusuario"]);
            $tampliacion->setstrTnegocio($_POST["strTnegocio"]);
            $tampliacion->setstrTsectorp($_POST["lsTsectorp"]);
			$tampliacion->setstrCapacitacion($_POST["lsCapacitacion"]);
			$tampliacion->setstrInstitucion($_POST["strInstitucion"]); 
			$tampliacion->setstrConocimiento($_POST["strConocimiento"]);
			$tampliacion->setstrEspacio($_POST["lsEspacio"]); 
			$tampliacion->setstrIngreso($_POST["lsIngreso"]);
			$tampliacion->setstrTcontable($_POST["lsTcontable"]);
			$tampliacion->setstrTcontabilidad($_POST["lsTcontabilidad"]);
			$tampliacion->setstrTdtiempo($_POST["lsTdtiempo"]);
			$tampliacion->setstrTfnegocio($_POST["lsTfnegocio"]);
			$tampliacion->setStrParroquia($_POST["lsParroquia"]);
			$tampliacion->setstrTfinanciamiento($_POST["lsTfinanciamiento"]);
			$tampliacion->setstrTaportado($_POST["lsTaportado"]);
			$tampliacion->setstrTgarante($_POST["lsTgarante"]);
			$tampliacion->setStrSector($_POST["lsSector"]);
			$tampliacion->setstrTqgarante($_POST["lsTqgarante"]);
			$tampliacion->setStrFechaNacimiento($_POST["dtFecha"]);
            if($tampliacion->getStrActualizar())
                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';

            $strResultado .= $tampliacion->getStrListar().'<br>';
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
            $tampliacion->setStrCodigo($_REQUEST["strCodigo"]);
            $tampliacion->setStrEtiqueta("ACTUALIZAR AMPLIACIÓN DE NEGOCIO");
            $tampliacion->setStrNombreBoton("btnEditar");
            $tampliacion->setStrValorBoton("Actualizar");

            if($tampliacion->getStrBuscar())
                $strResultado .= $tampliacion->getStrFormulario();
            else {
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
                $strResultado .= $tampliacion->getStrListar();
            }
            break;
            case( $_REQUEST["btnEliminar"] == "Eliminar" ):
            $tampliacion->setStrCodigo($_REQUEST["strCodigo"]);
            if ($tampliacion->getStrBuscar())
                if($tampliacion->getStrEliminar())
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
                else
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';

            $strResultado .= $tampliacion->getStrListar().'<br>';
            break;
			
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $tampliacion->setStrCodigo($_REQUEST["strCodigo"]);
            if ($tampliacion->getStrBuscar())
                $strResultado .= $tampliacion->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $tampliacion->getStrListar().'<br>';
                }
            break;
     //Cuando cambia el combo de la Provincia
        case( $_REQUEST["btnBuscar"] == "Canton" ):
            $canton = new clCanton();
            $tampliacion->setStrProvincia($_REQUEST["strCodigoProvincia"]);
            $strResultado .= print($canton->getStrListar($tampliacion->getStrProvincia(), $tampliacion->getStrCanton()));
            exit;

        //Cuando cambia el combo del Canton
        case( $_REQUEST["btnBuscar"] == "Parroquia" ):            
            $parroquia = new clParroquia();
            $tampliacion->setStrCanton($_REQUEST["strCodigoCanton"]);
            $strResultado = print($parroquia->getStrListar($tampliacion->getStrCanton(), $tampliacion->getStrParroquia()));
            exit;
  
        default:
            $strResultado .= $tampliacion->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>