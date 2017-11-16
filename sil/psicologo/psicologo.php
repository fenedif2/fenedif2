<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    include_once( CLASS_PATH . "class.clinterfaz.php" );
    include_once( CLASS_PATH . "class.clpsicologo.php" );

    $interfaz = new clInterfaz();
    $psicologo = new clPsicologo();
    
    $strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
            $psicologo->setStrLectura("");
            $psicologo->setStrEtiqueta("INFORME PSICOLÓGICO");
            $psicologo->setStrNombreBoton("btnGuardar");
            $psicologo->setStrValorBoton("Guardar");
            $psicologo->setStrFechai(date("Y-m-d"));
			$psicologo->setStrFechae(date("Y-m-d"));
			$psicologo->setStrFechan(date("Y-m-d"));
			$psicologo->setStrFechaIngreso(date("Y-m-d"));
            $strResultado .= $psicologo->getStrFormulario();
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ): 
        	$psicologo->setstrFechai($_POST["dtFechai"]);
            $psicologo->setstrResponsable($_POST["StrResponsable"]);
            $psicologo->setstrCargo($_POST["StrCargo"]);
			$psicologo->setStrFechae($_POST["dtFechae"]); 
			$psicologo->setStrLevaluacion($_POST["StrLevaluacion"]);
			$psicologo->setStrSolicitado($_POST["StrSolicitado"]); 
			$psicologo->setStrNombresape($_POST["StrNombresape"]);
			$psicologo->setStrFechan($_POST["dtFechan"]);
			$psicologo->setStrpc($_POST["StrPc"]);
			$psicologo->setStrLnacimiento($_POST["StrLnacimiento"]);
			$psicologo->setStrDireccion($_POST["StrDireccion"]);
			$psicologo->setStrEc($_POST["StrEc"]);
			$psicologo->setStrEm($_POST["StrEm"]);
			$psicologo->setStrGenero($_POST["lsGenero"]);
			$psicologo->setStrEcivil($_POST["lsEcivil"]);
			$psicologo->setStrTfnecesaria($_POST["lsTfnecesaria"]);
			$psicologo->setStrOcupacion($_POST["strOcupacion"]);
     		$psicologo->setStrFechaIngreso($_POST["dtFechaIngreso"]);
			$psicologo->setStrCelular($_POST["strCelular"]);
			$psicologo->setStrConvencional($_POST["strConvencional"]);
			$psicologo->setStrMconsulta($_POST["strMconsulta"]);
			$psicologo->setStrRentrevista($_POST["strRentrevista"]);
			$psicologo->setStrRaplicados($_POST["strRaplicados"]);
			$psicologo->setStrReactivosa($_POST["strReactivosa"]);
			$psicologo->setStrDintegral($_POST["strDintegral"]);
			$psicologo->setStrConcluciones($_POST["strConcluciones"]);
			$psicologo->setStrRecomendaciones($_POST["strRecomendaciones"]);
	       if($psicologo->getStrIngresar())
		   {
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            //$strResultado .= $psicologo->getStrListar().'<br>';
            break;
			 case( $_REQUEST["btnEditar"] == "Actualizar" ):
			$psicologo->setStrCodigo($_POST["strCodigo"]);          
            $psicologo->setstrFechai($_POST["dtFechai"]);
            $psicologo->setstrResponsable($_POST["StrResponsable"]);
            $psicologo->setstrCargo($_POST["StrCargo"]);
			$psicologo->setStrFechae($_POST["dtFechae"]); 
			$psicologo->setStrLevaluacion($_POST["StrLevaluacion"]);
			$psicologo->setStrSolicitado($_POST["StrSolicitado"]); 
			$psicologo->setStrNombresape($_POST["StrNombresape"]);
			$psicologo->setStrFechan($_POST["dtFechan"]);
			$psicologo->setStrpc($_POST["StrPc"]);
			$psicologo->setStrLnacimiento($_POST["StrLnacimiento"]);
			$psicologo->setStrDireccion($_POST["StrDireccion"]);
			$psicologo->setStrEc($_POST["StrEc"]);
			$psicologo->setStrEm($_POST["StrEm"]);
			$psicologo->setStrGenero($_POST["lsGenero"]);
			$psicologo->setStrEcivil($_POST["lsEcivil"]);
			$psicologo->setStrTfnecesaria($_POST["lsTfnecesaria"]);
			$psicologo->setStrOcupacion($_POST["strOcupacion"]);
     		$psicologo->setStrFechaIngreso($_POST["dtFechaIngreso"]);
			$psicologo->setStrCelular($_POST["strCelular"]);
			$psicologo->setStrConvencional($_POST["strConvencional"]);
			$psicologo->setStrMconsulta($_POST["strMconsulta"]);
			$psicologo->setStrRentrevista($_POST["strRentrevista"]);
			$psicologo->setStrRaplicados($_POST["strRaplicados"]);
			$psicologo->setStrReactivosa($_POST["strReactivosa"]);
			$psicologo->setStrDintegral($_POST["strDintegral"]);
			$psicologo->setStrConcluciones($_POST["strConcluciones"]);
			$psicologo->setStrRecomendaciones($_POST["strRecomendaciones"]);
			
			 $valor=$psicologo->getStrCodigo();
			 
            if($psicologo->getStrActualizar())
                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';

            header("Location:".PSICOLOGO_URL."psicologo.php?btnActualizar=Actualizar&strCodigo=".$valor."");
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
            $psicologo->setStrCodigo($_REQUEST["strCodigo"]);
            $psicologo->setStrEtiqueta("ACTUALIZAR PSICOLOGÍA");
            $psicologo->setStrNombreBoton("btnEditar");
            $psicologo->setStrValorBoton("Actualizar");

            if($psicologo->getStrBuscar())
                $strResultado .= $psicologo->getStrFormulario();
            else {
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
                $strResultado .= $psicologo->getStrListar();
            }
            break;
            case( $_REQUEST["btnEliminar"] == "Eliminar" ):
            $psicologo->setStrCodigo($_REQUEST["strCodigo"]);
            if ($psicologo->getStrBuscar())
                if($psicologo->getStrEliminar())
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
                else
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';

            $strResultado .= $psicologo->getStrListar().'<br>';
            break;
			
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $psicologo->setStrCodigo($_REQUEST["strCodigo"]);
            if ($psicologo->getStrBuscar())
                $strResultado .= $psicologo->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $psicologo->getStrListar().'<br>';
                }
            break;
     //Cuando cambia el combo de la Provincia
        case( $_REQUEST["btnBuscar"] == "Canton" ):
            $canton = new clCanton();
            $psicologo->setStrProvincia($_REQUEST["strCodigoProvincia"]);
            $strResultado .= print($canton->getStrListar($psicologo->getStrProvincia(), $psicologo->getStrCanton()));
            exit;

        //Cuando cambia el combo del Canton
        case( $_REQUEST["btnBuscar"] == "Parroquia" ):            
            $parroquia = new clParroquia();
            $psicologo->setStrCanton($_REQUEST["strCodigoCanton"]);
            $strResultado = print($parroquia->getStrListar($psicologo->getStrCanton(), $psicologo->getStrParroquia()));
            exit;
  
        default:
            $strResultado .= $psicologo->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>