<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
    if(!(isset($_SESSION["usuario"])))
    header( "Location:". INICIO_URL );
    include_once( CLASS_PATH . "class.clinterfaz.php" );
    include_once( CLASS_PATH . "class.cltdirempresa.php" );
	include_once( CLASS_PATH . "class.clempresas.php" );
    $interfaz = new clInterfaz();
    $tdirempresa = new clTdirempresa();
    $empresas = new clEmpresas();
    $strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
            $tdirempresa->setStrLectura("");
            $tdirempresa->setStrCodigo($_REQUEST["strCodigo"]);
			$tdirempresa->setStrEtiqueta("DIRECCIÓN DE LA EMPRESA");
            $tdirempresa->setStrNombreBoton("btnGuardar");
            $tdirempresa->setStrValorBoton("Guardar");
			$tdirempresa->setStrNombreBotons("btnSiguiente");
            $tdirempresa->setStrValorBotons("Siguiente");
			$tdirempresa->setStrNombreBotona("btnAnterior");
	        $tdirempresa->setStrValorBotona("Anterior");
            $tdirempresa->setStrFechaIngreso(date("Y-m-d"));
			$strResultado .= $tdirempresa->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			$strResultado .= $tdirempresa->getStrListar();
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ): 
        	$tdirempresa->setStrCodigo($_POST["strCodigo"]);          
            $tdirempresa->setStrParroquia($_POST["lsParroquia"]);
			$tdirempresa->setStrSucursal($_POST["lsSucursal"]);
			$tdirempresa->setStrCprincipal($_POST["strCprincipal"]);
			$tdirempresa->setStrNumero($_POST["strNumero"]);
			$tdirempresa->setStrTransversal($_POST["strTransversal"]);
			$tdirempresa->setStrSector($_POST["lsSector"]);
			$tdirempresa->setStrPasaje($_POST["strPasaje"]);
			$tdirempresa->setStrBarrio($_POST["strBarrio"]);
			$tdirempresa->setStrManzana($_POST["strManzana"]);
			$tdirempresa->setStrSolar($_POST["strSolar"]);
			$tdirempresa->setStrObservacion($_POST["strObservacion"]);
			$tdirempresa->setStrFijo($_POST["strFijo"]);
			$tdirempresa->setStrFijo2($_POST["strFijo2"]);
			$tdirempresa->setStrFax($_POST["StrFax"]);
			
			
	       if($tdirempresa->getStrIngresar())
		   {
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	$valor=$tdirempresa->getStrCodigo();
            	header("Location:".TDIREMPRESA_URL."tdirempresa.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            //$strResultado .= $tdirempresa->getStrListar().'<br>';
            break;
			case( $_REQUEST["btnSiguiente"] == "Siguiente" ): 
				$tdirempresa->setStrCodigo($_POST["strCodigo"]);
				$valor=$tdirempresa->getStrCodigo();
        	     $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	 
            	header("Location:".TCONTACTOEMP_URL."tcontactoemp.php?btnNuevo=Nuevo&strCodigo=".$valor."");
             break;
			  case( $_REQUEST["btnAnterior"] == "Anterior" ):            
            	$tdirempresa->setStrCodigo($_POST["strCodigo"]);
        	   	$valor=$tdirempresa->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".EMPRESAS_URL."empresas.php?btnNuevo=Nuevo&strCodigo=".$valor."");
           
            break;
			 case( $_REQUEST["btnEditar"] == "Actualizar" ):
			$tdirempresa->setStrCodigo($_POST["strCodigo"]); 
			$tdirempresa->setStrParroquia($_POST["lsParroquia"]);
			$tdirempresa->setStrSucursal($_POST["lsSucursal"]);
			$tdirempresa->setStrCprincipal($_POST["strCprincipal"]);
			$tdirempresa->setStrNumero($_POST["strNumero"]);
			$tdirempresa->setStrTransversal($_POST["strTransversal"]);
			$tdirempresa->setStrSector($_POST["lsSector"]);
			$tdirempresa->setStrPasaje($_POST["strPasaje"]);
			$tdirempresa->setStrBarrio($_POST["strBarrio"]);
			$tdirempresa->setStrManzana($_POST["strManzana"]);
			$tdirempresa->setStrSolar($_POST["strSolar"]);
			$tdirempresa->setStrObservacion($_POST["strObservacion"]);
			$tdirempresa->setStrFijo($_POST["strFijo"]);
			$tdirempresa->setStrFijo2($_POST["strFijo2"]);
			$tdirempresa->setStrFax($_POST["StrFax"]);
			
			 $valor=$tdirempresa->getStrCodigo();
			 $v=$tdirempresa->getStrBuscaremp($valor);
			if($tdirempresa->getStrActualizar())
                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';
			
            	header("Location:".TDIREMPRESA_URL."tdirempresa.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
            $tdirempresa->setStrCodigo($_REQUEST["strCodigo"]);
            $tdirempresa->setStrEtiqueta("ACTUALIZAR EMPRESA");
            $tdirempresa->setStrNombreBoton("btnEditar");
            $tdirempresa->setStrValorBoton("Actualizar");

            if($tdirempresa->getStrBuscar())
                $strResultado .= $tdirempresa->getStrFormulario();
            else {
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
                $strResultado .= $tdirempresa->getStrListar();
            }

            break;
            case( $_REQUEST["btnEliminar"] == "Eliminar" ):
            $tdirempresa->setStrCodigo($_REQUEST["strCodigo"]);
            
            $valor=$tdirempresa->getStrCodigo();
			 $v=$tdirempresa->getStrBuscaremp($valor);
            if ($tdirempresa->getStrBuscar())
                if($tdirempresa->getStrEliminar())
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
                else
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';

            header("Location:".TDIREMPRESA_URL."tdirempresa.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
			
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $tdirempresa->setStrCodigo($_REQUEST["strCodigo"]);
            if ($tdirempresa->getStrBuscar())
                $strResultado .= $tdirempresa->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $tdirempresa->getStrListar().'<br>';
                }
            break;
     //Cuando cambia el combo de la Provincia
        case( $_REQUEST["btnBuscar"] == "Canton" ):
            $canton = new clCanton();
            $tdirempresa->setStrProvincia($_REQUEST["strCodigoProvincia"]);
            $strResultado .= print($canton->getStrListar($tdirempresa->getStrProvincia(), $tdirempresa->getStrCanton()));
            exit;

        //Cuando cambia el combo del Canton
        case( $_REQUEST["btnBuscar"] == "Parroquia" ):            
            $parroquia = new clParroquia();
            $tdirempresa->setStrCanton($_REQUEST["strCodigoCanton"]);
            $strResultado = print($parroquia->getStrListar($tdirempresa->getStrCanton(), $tdirempresa->getStrParroquia()));
            exit;
  
        default:
            $strResultado .= $tdirempresa->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>