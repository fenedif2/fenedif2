<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
    if(!(isset($_SESSION["usuario"])))
    header( "Location:". INICIO_URL );
    include_once( CLASS_PATH . "class.clinterfaz.php" );
    include_once( CLASS_PATH . "class.clempresas.php" );

    $interfaz = new clInterfaz();
    $empresas = new clEmpresas();
    
    $strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
            $empresas->setStrLectura("");
            $empresas->setStrSucursal($_SESSION["usuario"]["suc"]);
			$empresas->setStrEtiqueta("DATOS DE LA EMPRESA");
            $empresas->setStrNombreBoton("btnGuardar");
            $empresas->setStrValorBoton("Guardar");
			$empresas->setStrNombreBotons("btnSiguiente");
            $empresas->setStrValorBotons("Siguiente");
            $empresas->setStrFechaIngreso(date("Y-m-d"));
			
            $strResultado .= $empresas->getStrFormulario();
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ): 
        	$empresas->setStrCodigo($_POST["strCodigo"]);          
            $empresas->setstrNempresa($_POST["strNempresa"]);
            $empresas->setstrTactividad($_POST["lsTactividad"]);
			$empresas->setstrRuc($_POST["strRuc"]);
			$empresas->setStrParqueadero($_POST["lsParqueadero"]); 
			$empresas->setStrAtransporte($_POST["lsAtransporte"]);
			$empresas->setStrNempleados($_POST["strNempleados"]); 
			$empresas->setStrCdiscapacidad($_POST["strCdiscapacidad"]);
			$empresas->setStrCuantos($_POST["strCuantos"]);
			$empresas->setStrTipoempresa($_POST["lsTipoempresa"]);
			$empresas->setStrPoseeweb($_POST["lsPoseeweb"]);
			$empresas->setStrSitioweb($_POST["StrSitioweb"]);
			$empresas->setStrObservaciones($_POST["StrObservaciones"]);
			$empresas->setStrEstado($_POST["lsEstado"]);
			$empresas->setStrFechaIngreso($_POST["dtFechaIngreso"]);
			$empresas->setStrParroquia($_POST["lsParroquia"]);
			$empresas->setStrSucursal($_POST["lsSucursal"]);
			$empresas->setStrCprincipal($_POST["strCprincipal"]);
			$empresas->setStrNumero($_POST["strNumero"]);
			$empresas->setStrTransversal($_POST["strTransversal"]);
			$empresas->setStrSector($_POST["lsSector"]);
			$empresas->setStrPasaje($_POST["strPasaje"]);
			$empresas->setStrBarrio($_POST["strBarrio"]);
			$empresas->setStrManzana($_POST["strManzana"]);
			$empresas->setStrSolar($_POST["strSolar"]);
			$empresas->setStrObservacion($_POST["strObservacion"]);
			$empresas->setStrFijo($_POST["strFijo"]);
			$empresas->setStrFijo2($_POST["strFijo2"]);
			$empresas->setStrFax($_POST["StrFax"]);
			
			
	       if($empresas->getStrIngresar())
		   {
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	 $valor=$empresas->getStrBuscarr();
            	header("Location:".TDIREMPRESA_URL."tdirempresa.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            //$strResultado .= $empresas->getStrListar().'<br>';
            break;
			/*case( $_REQUEST["btnSiguiente"] == "Siguiente" ): 
        			$empresas->setStrCodigo($_POST["strCodigo"]);   
				 	$valor=$empresas->getStrBuscarr();      
                 	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	   	header("Location:".TDIREMPRESA_URL."tdirempresa.php?btnNuevo=Nuevo&strCodigo=".$valor."");
             break;*/
			 case( $_REQUEST["btnEditar"] == "Actualizar" ):
			$empresas->setStrCodigo($_POST["strCodigo"]); 
			$empresas->setstrNempresa($_POST["strNempresa"]);
            $empresas->setstrTactividad($_POST["lsTactividad"]);
			$empresas->setstrRuc($_POST["strRuc"]);
			$empresas->setStrParqueadero($_POST["lsParqueadero"]); 
			$empresas->setStrAtransporte($_POST["lsAtransporte"]);
			$empresas->setStrNempleados($_POST["strNempleados"]); 
			$empresas->setStrCdiscapacidad($_POST["strCdiscapacidad"]);
			$empresas->setStrCuantos($_POST["strCuantos"]);
			$empresas->setStrTipoempresa($_POST["lsTipoempresa"]);
			$empresas->setStrPoseeweb($_POST["lsPoseeweb"]);
			$empresas->setStrSitioweb($_POST["StrSitioweb"]);
			$empresas->setStrObservaciones($_POST["StrObservaciones"]);
			$empresas->setStrEstado($_POST["lsEstado"]);
			$empresas->setStrFechaIngreso($_POST["dtFechaIngreso"]);
			$empresas->setStrParroquia($_POST["lsParroquia"]);
			$empresas->setStrSucursal($_POST["lsSucursal"]);
			$empresas->setStrCprincipal($_POST["strCprincipal"]);
			$empresas->setStrNumero($_POST["strNumero"]);
			$empresas->setStrTransversal($_POST["strTransversal"]);
			$empresas->setStrSector($_POST["lsSector"]);
			$empresas->setStrPasaje($_POST["strPasaje"]);
			$empresas->setStrBarrio($_POST["strBarrio"]);
			$empresas->setStrManzana($_POST["strManzana"]);
			$empresas->setStrSolar($_POST["strSolar"]);
			$empresas->setStrObservacion($_POST["strObservacion"]);
			$empresas->setStrFijo($_POST["strFijo"]);
			$empresas->setStrFijo2($_POST["strFijo2"]);
			$empresas->setStrFax($_POST["StrFax"]);
            if($empresas->getStrActualizar())
			{
                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
           		
			}
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';
			$empresas->setStrCodigo($_POST["strCodigo"]);   
			$valor=$empresas->getStrCodigo(); 
            $strResultado .= $empresas->getStrListarr($valor).'<br>';
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
            $empresas->setStrCodigo($_REQUEST["strCodigo"]);
            $empresas->setStrEtiqueta("ACTUALIZAR EMPRESA");
            $empresas->setStrNombreBoton("btnEditar");
            $empresas->setStrValorBoton("Actualizar");

            if($empresas->getStrBuscar())
                $strResultado .= $empresas->getStrFormulario();
            else {
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
                $strResultado .= $empresas->getStrListar();
            }
            break;
            case( $_REQUEST["btnEliminar"] == "Eliminar" ):
            $empresas->setStrCodigo($_REQUEST["strCodigo"]);
            if ($empresas->getStrBuscar())
                if($empresas->getStrEliminar())
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
                else
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';

            $strResultado .= $empresas->getStrListar().'<br>';
            break;
			
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $empresas->setStrCodigo($_REQUEST["strCodigo"]);
            if ($empresas->getStrBuscar())
                $strResultado .= $empresas->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $empresas->getStrListar().'<br>';
                }
            break;
     //Cuando cambia el combo de la Provincia
        case( $_REQUEST["btnBuscar"] == "Canton" ):
            $canton = new clCanton();
            $empresas->setStrProvincia($_REQUEST["strCodigoProvincia"]);
            $strResultado .= print($canton->getStrListar($empresas->getStrProvincia(), $empresas->getStrCanton()));
            exit;

        //Cuando cambia el combo del Canton
        case( $_REQUEST["btnBuscar"] == "Parroquia" ):            
            $parroquia = new clParroquia();
            $empresas->setStrCanton($_REQUEST["strCodigoCanton"]);
            $strResultado = print($parroquia->getStrListar($empresas->getStrCanton(), $empresas->getStrParroquia()));
            exit;
  
        default:
            $strResultado .= $empresas->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>