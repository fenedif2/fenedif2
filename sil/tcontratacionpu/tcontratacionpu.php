<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    include_once( CLASS_PATH . "class.clinterfaz.php" );
	include_once( CLASS_PATH . "class.cltcontratacionpu.php" );
	include_once( CLASS_PATH . "class.cltformacioncf.php" );


    $interfaz = new clInterfaz();
    $tcontratacionpu = new clTcontratacionpu;
    $strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
			$tcontratacionpu->setStrCodigo($_REQUEST["strCodigo"]);
			$tcontratacionpu->setstrFechaInicio($_REQUEST["dtFecha"]);
			$tcontratacionpu->setstrFechaFin($_REQUEST["dtFechaf"]);
            $tcontratacionpu->setStrLectura("");
            $tcontratacionpu->setStrEtiqueta("Ingreso&nbsp;Horario");
            $tcontratacionpu->setStrNombreBoton("btnGuardar");
			$tcontratacionpu->setStrNombreBotonb("btnBuscar");
            $tcontratacionpu->setStrValorBoton("Guardar");
			$tcontratacionpu->setStrValorBotonb("Buscar");
            $strResultado .= $tcontratacionpu->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			$strResultado .= $tcontratacionpu->getStrListar();
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ):            
            $tcontratacionpu->setstrusuarioscu($_POST["strusuarioscu"]);
			$tcontratacionpu->setStrCodigo($_POST["strCodigo"]);
			$tcontratacionpu->setstrestadocontrat($_POST["strtcontratacion"]);
			$tcontratacionpu->setstrmrechazo($_POST["lsMrechazo"]);
			
			
	       if($tcontratacionpu->getStrIngresar())
		   	{
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
           		$valor=$tcontratacionpu->getStrCodigo();
				header("Location:".TCONTRATACIONPU_URL."tcontratacionpu.php?btnBuscar=Buscar&strCodigo=".$valor."");
		    }
            else
				{
				 $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';	
				}
			$valor=$tcontratacionpu->getStrCodigo();
				header("Location:".TCONTRATACIONPU_URL."tcontratacionpu.php?btnBuscar=Buscar&strCodigo=".$valor."");
         break;
		  case( $_REQUEST["btnBuscar"] == "Buscar" ):            
            $tcontratacionpu->setStrCodigo($_REQUEST["strCodigo"]);
			$tcontratacionpu->setStrEtiqueta("Ingreso&nbsp;Horario");
            $tcontratacionpu->setStrNombreBoton("btnGuardar");
			$tcontratacionpu->setStrNombreBotonb("btnBuscar");
            $tcontratacionpu->setStrValorBoton("Guardar");
			$tcontratacionpu->setStrValorBotonb("Buscar");
			$tcontratacionpu->setStrNombreBotonanterior("btnAnterior");
	        $tcontratacionpu->setStrValorBotonanterior("Anterior");
	       	$strResultado .= $tcontratacionpu->getStrListarb();
	       	$strResultado .= '<br>';
	       	$strResultado .= $tcontratacionpu->getStrListar();
         break;
		 case( $_REQUEST["btnEditar"] == "Actualizar" ):
			 	$tcontratacionpu->setStrDias($_POST["strdias"]);
				$tcontratacionpu->setStrHorainicio($_POST["lsHorainicio"]);
				$tcontratacionpu->setStrHorafin($_POST["lsHorafin"]);
				$tcontratacionpu->setStrCodigo($_POST["strCodigo"]);
			    if($tcontratacionpu->getStrActualizar())
                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
            	else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';

            $strResultado .= $tcontratacionpu->getStrListar();
            break;
		case( $_REQUEST["btnAnterior"] == "Anterior" ):            
            	$tcontratacionpu->setStrCodigo($_POST["strCodigo"]);
        	   	$valor=$tcontratacionpu->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".TSEGUIMIENTOPU_URL."tseguimientopu.php?btnBuscar=Buscar&strCodigo=".$valor."");
           
         	break; 	
		case( $_REQUEST["btnActualizar"] == "Actualizar" ):
            $tcontratacionpu->setStrCodigo($_REQUEST["strCodigo"]);
            $tcontratacionpu->setStrEtiqueta("Actualizar&nbsp;Horario");
            $tcontratacionpu->setStrNombreBoton("btnEditar");
            $tcontratacionpu->setStrValorBoton("Actualizar");

            if($tcontratacionpu->getStrBuscar())
                $strResultado .= $tcontratacionpu->getStrFormulario();
            else {
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
                $strResultado .= $tcontratacionpu->getStrListar();
            }
           break;
          case( $_REQUEST["btnEliminar"] == "Eliminar" ):
	            $tcontratacionpu->setStrCodigo($_REQUEST["strCodigo"]);
			  
			  	$valor=$tcontratacionpu->getStrCodigo();
				$v=$tcontratacionpu->getStrBuscartcemp($valor);
	            if ($tcontratacionpu->getStrBuscar())
	                if($tcontratacionpu->getStrEliminar())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
	
	           header("Location:".TCONTRATACIONPU_URL."tcontratacionpu.php?btnBuscar=Buscar&strCodigo=".$v."");
            break;
			
        case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $tcontratacionpu->setStrCodigo($_REQUEST["strCodigo"]);
            if ($tcontratacionpu->getStrBuscar())
                $strResultado .= $tcontratacionpu->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $tcontratacionpu->getStrListar().'<br>';
                }
            break;
      //Cuando cambia el combo de la Provincia
        
  
        default:
			$strResultado .= $tcontratacionpu->getStrListar().'<br>';;
  
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>