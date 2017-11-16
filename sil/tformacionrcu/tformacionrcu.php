<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
    if(!(isset($_SESSION["usuario"])))
    header( "Location:". INICIO_URL );
    include_once( CLASS_PATH . "class.clinterfaz.php" );
    include_once( CLASS_PATH . "class.cltformacionrcu.php" );
	
	
    

    $interfaz = new clInterfaz();
    $tformacionrcu = new clTformacionrcu();
    
    $strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
			$tformacionrcu->setStrCodigo($_REQUEST["strCodigo"]);
            $tformacionrcu->setStrLectura("");
            $tformacionrcu->setStrEtiqueta("INGRESAR FORMACIÓN REQUERIDA ");
            $tformacionrcu->setStrNombreBoton("btnGuardar");
            $tformacionrcu->setStrValorBoton("Guardar");
			$tformacionrcu->setStrNombreBotons("btnSiguiente");
            $tformacionrcu->setStrValorBotons("Siguiente");
            
            $strResultado .= $tformacionrcu->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			$strResultado .= $tformacionrcu->getStrListar();
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ):    
			$tformacionrcu->setStrNombre($_POST["strNombre"]);
			$tformacionrcu->setStrTfnecesaria($_POST["lsTfnecesaria"]);
			$tformacionrcu->setStrTnivel($_POST["lsTnivel"]);
			$tformacionrcu->setStrTniveledu($_POST["lsTniveledu"]);
			$tformacionrcu->setstrCinformatico($_POST["lsCinformatico"]);
			$tformacionrcu->setstrCinformaticos($_POST["strcinformaticos"]);
			$tformacionrcu->setstrCminimos($_POST["lsCminimos"]);
			$tformacionrcu->setstrOtross($_POST["strOtross"]);
			$tformacionrcu->setstrPcontables($_POST["lspcontable"]);
			$tformacionrcu->setstrDinformaticos($_POST["lsdinformatico"]);
			$tformacionrcu->setstrDgraficos($_POST["lsdgrafico"]);
			$tformacionrcu->setstrVdigitacion($_POST["lsdigitacion"]);
			$tformacionrcu->setStrCodigo($_POST["strCodigo"]); 
			
		    if($tformacionrcu->getStrIngresar())
			   {
			   	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
	            $valor=$tformacionrcu->getStrCodigo();
				header("Location:".TFORMACIONRCU_URL."tformacionrcu.php?btnNuevo=Nuevo&strCodigo=".$valor."");
	            }else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            $strResultado .= $tformacionrcu->getStrListar().'<br>';       
       break;
	   case( $_REQUEST["btnSiguiente"] == "Siguiente" ): 
        		$tformacionrcu->setStrCodigo($_POST["strCodigo"]);          
                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	$valor=$tformacionrcu->getStrCodigo();
            	header("Location:".TREQUISITOSCU_URL."trequisitoscu.php?btnNuevo=Nuevo&strCodigo=".$valor."");
        break;
		case( $_REQUEST["btnEditar"] == "Actualizar" ):
			$tformacionrcu->setStrNombre($_POST["strNombre"]);
			$tformacionrcu->setStrTfnecesaria($_POST["lsTfnecesaria"]);
			$tformacionrcu->setStrTnivel($_POST["lsTnivel"]);
			$tformacionrcu->setStrTniveledu($_POST["lsTniveledu"]);
			$tformacionrcu->setstrCinformatico($_POST["lsCinformatico"]);
			$tformacionrcu->setstrCinformaticos($_POST["strcinformaticos"]);
			$tformacionrcu->setstrCminimos($_POST["lsCminimos"]);
			$tformacionrcu->setstrOtross($_POST["strOtross"]);
			$tformacionrcu->setstrPcontables($_POST["lspcontable"]);
			$tformacionrcu->setstrDinformaticos($_POST["lsdinformatico"]);
			$tformacionrcu->setstrDgraficos($_POST["lsdgrafico"]);
			$tformacionrcu->setstrVdigitacion($_POST["lsdigitacion"]);
			$tformacionrcu->setStrCodigo($_POST["strCodigo"]); 
			
			$valor=$tformacionrcu->getStrCodigo();
			 $v=$tformacionrcu->getStrBuscartfcu($valor);
			 if($tformacionrcu->getStrActualizar())
                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
            else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';

             header("Location:".TFORMACIONRCU_URL."tformacionrcu.php?btnNuevo=Nuevo&strCodigo=".$v."");
		
        break;
		case( $_REQUEST["btnActualizar"] == "Actualizar" ):
			$tformacionrcu->setStrCodigo($_REQUEST["strCodigo"]);
            $tformacionrcu->setStrEtiqueta("ACTUALIZAR FORMACIÓN REQUERIDA ");
            $tformacionrcu->setStrNombreBoton("btnEditar");
            $tformacionrcu->setStrValorBoton("Actualizar");

            if($tformacionrcu->getStrBuscar())
                $strResultado .= $tformacionrcu->getStrFormulario();
            else {
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
                $strResultado .= $tformacionrcu->getStrListar();
            }
        
        break;
        case( $_REQUEST["btnEliminar"] == "Eliminar" ):
	       $tformacionrcu->setStrCodigo($_REQUEST["strCodigo"]);
	       $valor=$tformacionrcu->getStrCodigo();
			 $v=$tformacionrcu->getStrBuscartfcu($valor);
	            if ($tformacionrcu->getStrBuscar())
	                if($tformacionrcu->getStrEliminar())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
	
	           header("Location:".TFORMACIONRCU_URL."tformacionrcu.php?btnNuevo=Nuevo&strCodigo=".$v."");
        break;
		case( $_REQUEST["btnDetalle"] == "Detalle" ):
		  $tformacionrcu->setStrCodigo($_REQUEST["strCodigo"]);
            if ($tformacionrcu->getStrBuscar())
                $strResultado .= $tformacionrcu->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $tformacionrcu->getStrListar().'<br>';
                }
        
        break;
      //Cuando cambia el Nivel
        case( $_REQUEST["btnBuscar"] == "nivel" ):
            $nivel = new clTnivel();
            $tformacionrcu->setStrTfnecesaria($_REQUEST["strCodigotfnecesaria"]);
            $strResultado .= print($nivel->getStrListar($tformacionrcu->getStrTfnecesaria(), $tformacionrcu->getStrTnivel()));
            exit;

        //Cuando cambia el combo del Canton
     case( $_REQUEST["btnBuscar"] == "niveledu" ):
            $niveledu = new clTniveledu();
            $tformacionrcu->setStrTfnecesaria($_REQUEST["strCodigotfnecesaria"]);
            $strResultado .= print($niveledu->getStrListar($tformacionrcu->getStrTfnecesaria(), $tformacionrcu->getStrTniveledu()));
            exit;

        case( $_REQUEST["btnBuscar"] == "Subtcurso" ):
            $Subtformacion = new clSubtformacion();
            $tformacionrcu->setstrTcurso($_REQUEST["strCodigoTcurso"]);
			$strResultado .= print($Subtformacion->getStrListar($tformacionrcu->getstrTcurso(), $tformacionrcu->getStrSubtformacion()));
           
		    exit;
		case( $_REQUEST["btnBuscar"] == "Subtformaciond" ):            
            $Subtformaciond = new clSubtformaciond();
			
            $tformacionrcu->setStrSubtformacion($_REQUEST["strCodigoTformaciond"]);
            $strResultado = print($Subtformaciond->getStrListar($tformacionrcu->getStrSubtformacion(), $tformacionrcu->getStrSubtformaciond()));
            exit;
  
        default:
            $strResultado .= $tformacionrcu->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>