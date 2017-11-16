<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
    if(!(isset($_SESSION["usuario"])))
    header( "Location:". INICIO_URL );
    include_once( CLASS_PATH . "class.clinterfaz.php" );
    include_once( CLASS_PATH . "class.cltcontactoemp.php" );

    $interfaz = new clInterfaz();
    $tcontactoemp = new clTcontactoemp();
    
    $strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
            $tcontactoemp->setStrLectura("");
            $tcontactoemp->setStrCodigo($_REQUEST["strCodigo"]);
			$tcontactoemp->setStrEtiqueta("CONTACTO DE LA EMPRESA");
            $tcontactoemp->setStrNombreBoton("btnGuardar");
            $tcontactoemp->setStrValorBoton("Guardar");
			$tcontactoemp->setStrNombreBotons("btnSiguiente");
            $tcontactoemp->setStrValorBotons("Siguiente");
			$tcontactoemp->setStrNombreBotona("btnAnterior");
	        $tcontactoemp->setStrValorBotona("Anterior");
            $tcontactoemp->setStrFechaIngreso(date("Y-m-d"));
			$tcontactoemp->setStrFechas(date("Y-m-d"));
            $strResultado .= $tcontactoemp->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			$strResultado .= $tcontactoemp->getStrListar();
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ): 
        	$tcontactoemp->setStrCodigo($_POST["strCodigo"]);          
           	$tcontactoemp->setStrNcontacto($_POST["StrNcontacto"]);
			$tcontactoemp->setStrCargo($_POST["StrCargo"]);
			$tcontactoemp->setStrCelular($_POST["StrCelular"]);
			$tcontactoemp->setStrFaxcont($_POST["StrFaxcont"]);
			$tcontactoemp->setStrEmail($_POST["strEmail"]);
			$tcontactoemp->setStrCsil($_POST["lsCsil"]);
			$tcontactoemp->setStrSensibilizacion($_POST["lsSensibilizacion"]);
			$tcontactoemp->setStrFechas($_POST["dtFechas"]);
			$tcontactoemp->setStrObservacionemp($_POST["strObservacionemp"]);
			
	       if($tcontactoemp->getStrIngresar())
		   {
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	$valor=$tcontactoemp->getStrCodigo();
            	header("Location:".TCONTACTOEMP_URL."tcontactoemp.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            //$strResultado .= $tcontactoemp->getStrListar().'<br>';
            break;
			case( $_REQUEST["btnSiguiente"] == "Siguiente" ): 
        		$tcontactoemp->setStrCodigo($_POST["strCodigo"]);          
                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	$valor=$tcontactoemp->getStrCodigo();
            	header("Location:".APUESTO_URL."apuesto.php?btnNuevo=Nuevo&strCodigo=".$valor."");
              break;
			 case( $_REQUEST["btnAnterior"] == "Anterior" ):            
            	$tcontactoemp->setStrCodigo($_POST["strCodigo"]);
        	   	$valor=$tcontactoemp->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".TDIREMPRESA_URL."tdirempresa.php?btnNuevo=Nuevo&strCodigo=".$valor."");
           
            break; 
			 case( $_REQUEST["btnEditar"] == "Actualizar" ):
			$tcontactoemp->setStrCodigo($_POST["strCodigo"]);          
           	$tcontactoemp->setStrNcontacto($_POST["StrNcontacto"]);
			$tcontactoemp->setStrCargo($_POST["StrCargo"]);
			$tcontactoemp->setStrCelular($_POST["StrCelular"]);
			$tcontactoemp->setStrFaxcont($_POST["StrFaxcont"]);
			$tcontactoemp->setStrEmail($_POST["strEmail"]);
			$tcontactoemp->setStrCsil($_POST["lsCsil"]);
			$tcontactoemp->setStrSensibilizacion($_POST["lsSensibilizacion"]);
			$tcontactoemp->setStrFechas($_POST["dtFechas"]);
			$tcontactoemp->setStrObservacionemp($_POST["strObservacionemp"]);
			
			 $valor=$tcontactoemp->getStrCodigo();
			 $v=$tcontactoemp->getStrBuscaremp($valor);
            if($tcontactoemp->getStrActualizar())
                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';

           
            header("Location:".TCONTACTOEMP_URL."tcontactoemp.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
            $tcontactoemp->setStrCodigo($_REQUEST["strCodigo"]);
            $tcontactoemp->setStrEtiqueta("ACTUALIZAR CONTACTO");
            $tcontactoemp->setStrNombreBoton("btnEditar");
            $tcontactoemp->setStrValorBoton("Actualizar");

            if($tcontactoemp->getStrBuscar())
                $strResultado .= $tcontactoemp->getStrFormulario();
            else {
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
                $strResultado .= $tcontactoemp->getStrListar();
            }
            break;
            case( $_REQUEST["btnEliminar"] == "Eliminar" ):
            $tcontactoemp->setStrCodigo($_REQUEST["strCodigo"]);
            
             $valor=$tcontactoemp->getStrCodigo();
			 $v=$tcontactoemp->getStrBuscaremp($valor);
            if ($tcontactoemp->getStrBuscar())
                if($tcontactoemp->getStrEliminar())
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
                else
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';

             header("Location:".TCONTACTOEMP_URL."tcontactoemp.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
			
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $tcontactoemp->setStrCodigo($_REQUEST["strCodigo"]);
            if ($tcontactoemp->getStrBuscar())
                $strResultado .= $tcontactoemp->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $tcontactoemp->getStrListar().'<br>';
                }
            break;
     //Cuando cambia el combo de la Provincia
        case( $_REQUEST["btnBuscar"] == "Canton" ):
            $canton = new clCanton();
            $tcontactoemp->setStrProvincia($_REQUEST["strCodigoProvincia"]);
            $strResultado .= print($canton->getStrListar($tcontactoemp->getStrProvincia(), $tcontactoemp->getStrCanton()));
            exit;

        //Cuando cambia el combo del Canton
        case( $_REQUEST["btnBuscar"] == "Parroquia" ):            
            $parroquia = new clParroquia();
            $tcontactoemp->setStrCanton($_REQUEST["strCodigoCanton"]);
            $strResultado = print($parroquia->getStrListar($tcontactoemp->getStrCanton(), $tcontactoemp->getStrParroquia()));
            exit;
  
        default:
            $strResultado .= $tcontactoemp->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>