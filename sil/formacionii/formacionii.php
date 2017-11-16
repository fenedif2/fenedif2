<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    	include_once( CLASS_PATH . "class.clinterfaz.php" );
    	include_once( CLASS_PATH . "class.clformacionii.php" );
		$interfaz = new clInterfaz();
    	$formacionii = new clFormacionii();
		$strResultado = "";
		
    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
			$formacionii->setStrCodigo($_REQUEST["strCodigo"]);
			$formacionii->setStrLectura("");
			$formacionii->setStrEtiqueta("CAPACITACIÓN RECIBIDA");
		    $formacionii->setStrNombreBoton("btnGuardar");
	        $formacionii->setStrValorBoton("Guardar");
			$formacionii->setStrNombreBotons("btnSiguiente");
	        $formacionii->setStrValorBotons("Siguiente");
			$formacionii->setStrNombreBotona("btnAnterior");
	        $formacionii->setStrValorBotona("Anterior");
			$formacionii->setStrFechaIngreso(date("Y-m-d"));
			
	        $strResultado .= $formacionii->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			$strResultado .= $formacionii->getStrListar();
			$strResultado .= '<br><br><br><br>';
			$strResultado .= $formacionii->getStrListarc();
            break;
        case( $_REQUEST["btnGuardar"] == "Guardar" ):            
            $formacionii->setStrNcurso($_POST["strNcurso"]);          
           	$formacionii->setStrInstitucion($_POST["lsInstitucion"]);  
			$formacionii->setStrInstitucionb($_POST["strInstitucion"]);  
			$formacionii->setStrDuracion($_POST["strDuracion"]); 
			$formacionii->setStrFechaIngreso($_POST["dtFechaIngreso"]);
			$formacionii->setStrCapacitacionsil($_POST["lsCapacitadosil"]);
			$formacionii->setStrCformativo($_POST["lsCformativo"]);
			$formacionii->setStrCursos($_POST["lsCursos"]);
			$formacionii->setStrCodigo($_POST["strCodigo"]); 
           if($formacionii->getStrIngresar())
		   {
               	$valor=$formacionii->getStrCodigo();
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".FORMACIONII_URL."formacionii.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            }else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';

            $strResultado .= $formacionii->getStrListar().'<br>';
            break;
			case( $_REQUEST["btnSiguiente"] == "Siguiente" ):            
           		$formacionii->setStrCodigo($_POST["strCodigo"]); 
               	$valor=$formacionii->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".ORIENTACION_URL."orientacion.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            break;
			 case( $_REQUEST["btnAnterior"] == "Anterior" ):            
            	$formacionii->setStrCodigo($_POST["strCodigo"]);
        	   	$valor=$formacionii->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".FORMACIONA_URL."formaciona.php?btnNuevo=Nuevo&strCodigo=".$valor."");
           
            break;
			case( $_REQUEST["btnEditar"] == "Actualizar" ):
					 $formacionii->setStrNcurso($_POST["strNcurso"]);          
           			$formacionii->setStrInstitucion($_POST["lsInstitucion"]);  
					$formacionii->setStrInstitucionb($_POST["strInstitucion"]);  
					$formacionii->setStrDuracion($_POST["strDuracion"]); 
					$formacionii->setStrFechaIngreso($_POST["dtFechaIngreso"]);
					$formacionii->setStrCapacitacionsil($_POST["lsCapacitadosil"]);
					$formacionii->setStrCformativo($_POST["lsCformativo"]);
					$formacionii->setStrCursos($_POST["lsCursos"]);
					$formacionii->setStrCodigo($_POST["strCodigo"]); 
					
					$valor=$formacionii->getStrCodigo();
			 		$v=$formacionii->getStrBuscarfii($valor);
		            if($formacionii->getStrActualizar())
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
		            else
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';
		
		            header("Location:".FORMACIONII_URL."formacionii.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
			case( $_REQUEST["btnActualizar"] == "Actualizar" ):
		            $formacionii->setStrCodigo($_REQUEST["strCodigo"]);
		            $formacionii->setStrEtiqueta("ACTUALIZAR CAPACITACIÓN RECIBIDA");
		            $formacionii->setStrNombreBoton("btnEditar");
		            $formacionii->setStrValorBoton("Actualizar");
		
		            if($formacionii->getStrBuscar())
		                $strResultado .= $formacionii->getStrFormulario();
		            else {
		                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
		                $strResultado .= $formacionii->getStrListar();
		            }
            break;
			case( $_REQUEST["btnEliminar"] == "Eliminar" ):
	            $formacionii->setStrCodigo($_REQUEST["strCodigo"]);
	            $valor=$formacionii->getStrCodigo();
			 		$v=$formacionii->getStrBuscarfii($valor);
	            if ($formacionii->getStrBuscar())
	                if($formacionii->getStrEliminar())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
	
	     			header("Location:".FORMACIONII_URL."formacionii.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
        	case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $formacionii->setStrCodigo($_REQUEST["strCodigo"]);
            if ($formacionii->getStrBuscar())
                $strResultado .= $formacionii->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $formacionii->getStrListar().'<br>';
                }
            break;
			
		//Cuando cambia el combo de la centro Formativo
		
        case( $_REQUEST["btnBuscar"] == "Cursos" ):
            $cursos = new clcursos();
            $formacionii->setStrCformativo($_REQUEST["strCodigocentroformativo"]);
            $strResultado .= print($cursos->getStrListar($formacionii->getStrCformativo(), $formacionii->getStrCursos()));
            exit;
     	
      
        default:
            $strResultado .= $formacionii->getStrListar().'<br>';
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>