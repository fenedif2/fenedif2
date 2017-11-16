<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
    if(!(isset($_SESSION["usuario"])))
    header( "Location:". INICIO_URL );
    include_once( CLASS_PATH . "class.clinterfaz.php" );
    include_once( CLASS_PATH . "class.cltformacionremp.php" );
	
	
    

    $interfaz = new clInterfaz();
    $tformacionremp = new cltformacionremp();
    
    $strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
			$tformacionremp->setStrCodigo($_REQUEST["strCodigo"]);
            $tformacionremp->setStrLectura("");
            $tformacionremp->setStrEtiqueta("INGRESO FORMACIÓN REQUERIDA");
            $tformacionremp->setStrNombreBoton("btnGuardar");
            $tformacionremp->setStrValorBoton("Guardar");
			$tformacionremp->setStrNombreBotons("btnSiguiente");
            $tformacionremp->setStrValorBotons("Siguiente");
			$tformacionremp->setStrNombreBotona("btnAnterior");
	        $tformacionremp->setStrValorBotona("Anterior");
            
            $strResultado .= $tformacionremp->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			$strResultado .= $tformacionremp->getStrListar();
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ):    
			$tformacionremp->setStrNombre($_POST["strNombre"]);
			$tformacionremp->setStrTfnecesaria($_POST["lsTfnecesaria"]);
			$tformacionremp->setStrTnivel($_POST["lsTnivel"]);
			$tformacionremp->setStrTniveledu($_POST["lsTniveledu"]);
			$tformacionremp->setstrCinformatico($_POST["lsCinformatico"]);
			$tformacionremp->setstrCinformaticos($_POST["strcinformaticos"]);
			$tformacionremp->setstrCminimos($_POST["lsCminimos"]);
			$tformacionremp->setstrOtross($_POST["strOtross"]);
			$tformacionremp->setstrPcontables($_POST["lspcontable"]);
			$tformacionremp->setstrDinformaticos($_POST["lsdinformatico"]);
			$tformacionremp->setstrDgraficos($_POST["lsdgrafico"]);
			$tformacionremp->setstrVdigitacion($_POST["lsdigitacion"]);
			$tformacionremp->setStrCodigo($_POST["strCodigo"]); 
		    if($tformacionremp->getStrIngresar())
			   {
			   		$valor=$tformacionremp->getStrCodigo();
	               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
	            	//$valor=$tformacionremp->getStrCodigo();
	            	header("Location:".TFORMACIONREMP_URL."tformacionremp.php?btnNuevo=Nuevo&strCodigo=".$valor."");
	            }else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

                
      	break;
       	case( $_REQUEST["btnSiguiente"] == "Siguiente" ):            
           	$tformacionremp->setStrCodigo($_POST["strCodigo"]);
		   	$valor=$tformacionremp->getStrCodigo();
               //$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".TREQUISITOSEMP_URL."trequisitosemp.php?btnNuevo=Nuevo&strCodigo=".$valor."");
	        //$strResultado .= $apuesto->getStrListar().'<br>';
          break;
          case( $_REQUEST["btnAnterior"] == "Anterior" ):            
            	$tformacionremp->setStrCodigo($_POST["strCodigo"]);
        	   	$valor=$tformacionremp->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".APUESTO_URL."apuesto.php?btnNuevo=Nuevo&strCodigo=".$valor."");
           
            break; 
		case( $_REQUEST["btnEditar"] == "Actualizar" ):
			$tformacionremp->setStrNombre($_POST["strNombre"]);
			$tformacionremp->setStrTfnecesaria($_POST["lsTfnecesaria"]);
			$tformacionremp->setStrTnivel($_POST["lsTnivel"]);
			$tformacionremp->setStrTniveledu($_POST["lsTniveledu"]);
			$tformacionremp->setstrCinformatico($_POST["lsCinformatico"]);
			$tformacionremp->setstrCinformaticos($_POST["strcinformaticos"]);
			$tformacionremp->setstrCminimos($_POST["lsCminimos"]);
			$tformacionremp->setstrOtross($_POST["strOtross"]);
			$tformacionremp->setstrPcontables($_POST["lspcontable"]);
			$tformacionremp->setstrDinformaticos($_POST["lsdinformatico"]);
			$tformacionremp->setstrDgraficos($_POST["lsdgrafico"]);
			$tformacionremp->setstrVdigitacion($_POST["lsdigitacion"]);
			$tformacionremp->setStrCodigo($_POST["strCodigo"]); 
			 if($tformacionremp->getStrActualizar())
                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';
			$valor=$tformacionremp->getStrCodigo();
			$v=$tformacionremp->getStrBuscarempform($valor);
            $strResultado .= '<meta http-equiv="Refresh" content="0;url=../tformacionremp/tformacionremp.php?btnNuevo=Nuevo&strCodigo='.$v.'">';	
		
        break;
		case( $_REQUEST["btnActualizar"] == "Actualizar" ):
			$tformacionremp->setStrCodigo($_REQUEST["strCodigo"]);
            $tformacionremp->setStrEtiqueta("ACTUALIZAR FORMACIÓN REQUERIDA");
            $tformacionremp->setStrNombreBoton("btnEditar");
            $tformacionremp->setStrValorBoton("Actualizar");

            if($tformacionremp->getStrBuscar())
                $strResultado .= $tformacionremp->getStrFormulario();
            else {
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
                $strResultado .= $tformacionremp->getStrListar();
            }
        
        break;
        case( $_REQUEST["btnEliminar"] == "Eliminar" ):
	       	$tformacionremp->setStrCodigo($_REQUEST["strCodigo"]);
	       	$valor=$tformacionremp->getStrCodigo();
			$v=$tformacionremp->getStrBuscarempform($valor);
			   if ($tformacionremp->getStrBuscar())
	                if($tformacionremp->getStrEliminar())
					{
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                	
	                }
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
				
	        	
            	$strResultado .= '<meta http-equiv="Refresh" content="0;url=../tformacionremp/tformacionremp.php?btnNuevo=Nuevo&strCodigo='.$v.'">';	
            
        break;
		case( $_REQUEST["btnDetalle"] == "Detalle" ):
		  $tformacionremp->setStrCodigo($_REQUEST["strCodigo"]);
            if ($tformacionremp->getStrBuscar())
                $strResultado .= $tformacionremp->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $tformacionremp->getStrListar().'<br>';
                }
        
        break;
      //Cuando cambia el Nivel
        case( $_REQUEST["btnBuscar"] == "nivel" ):
            $nivel = new clTnivel();
            $tformacionremp->setStrTfnecesaria($_REQUEST["strCodigotfnecesaria"]);
            $strResultado .= print($nivel->getStrListar($tformacionremp->getStrTfnecesaria(), $tformacionremp->getStrTnivel()));
            exit;

        //Cuando cambia el combo del Canton
     case( $_REQUEST["btnBuscar"] == "niveledu" ):
            $niveledu = new clTniveledu();
            $tformacionremp->setStrTfnecesaria($_REQUEST["strCodigotfnecesaria"]);
            $strResultado .= print($niveledu->getStrListar($tformacionremp->getStrTfnecesaria(), $tformacionremp->getStrTniveledu()));
            exit;

        case( $_REQUEST["btnBuscar"] == "Subtcurso" ):
            $Subtformacion = new clSubtformacion();
            $tformacionremp->setstrTcurso($_REQUEST["strCodigoTcurso"]);
			$strResultado .= print($Subtformacion->getStrListar($tformacionremp->getstrTcurso(), $tformacionremp->getStrSubtformacion()));
           
		    exit;
		case( $_REQUEST["btnBuscar"] == "Subtformaciond" ):            
            $Subtformaciond = new clSubtformaciond();
			
            $tformacionremp->setStrSubtformacion($_REQUEST["strCodigoTformaciond"]);
            $strResultado = print($Subtformaciond->getStrListar($tformacionremp->getStrSubtformacion(), $tformacionremp->getStrSubtformaciond()));
            exit;
  
        default:
            $strResultado .= $tformacionremp->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>