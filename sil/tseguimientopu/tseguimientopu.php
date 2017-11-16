<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    include_once( CLASS_PATH . "class.clinterfaz.php" );
	include_once( CLASS_PATH . "class.cltseguimientopu.php" );
	include_once( CLASS_PATH . "class.cltformacioncf.php" );


    $interfaz = new clInterfaz();
    $tseguimientopu = new clTseguimientopu;
    $strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
			$tseguimientopu->setStrCodigo($_REQUEST["strCodigo"]);
			$tseguimientopu->setstrFechaInicio($_REQUEST["dtFecha"]);
			$tseguimientopu->setstrFechaFin($_REQUEST["dtFechaf"]);
            $tseguimientopu->setStrLectura("");
            $tseguimientopu->setStrEtiqueta("INGRESO SEGUIMIENTO PUESTO");
            $tseguimientopu->setStrNombreBoton("btnGuardar");
			$tseguimientopu->setStrNombreBotonb("btnBuscar");
            $tseguimientopu->setStrValorBoton("Guardar");
			$tseguimientopu->setStrValorBotonb("Buscar");
			$tseguimientopu->setStrNombreBotonanterior("btnAnterior");
	        $tseguimientopu->setStrValorBotonanterior("Anterior");
			$tseguimientopu->setStrNombreBotons("btnSiguiente");
            $tseguimientopu->setStrValorBotons("Siguiente");
            $strResultado .= $tseguimientopu->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			$strResultado .= $tseguimientopu->getStrListar();
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ):            
            $tseguimientopu->setstrusuarioscu($_POST["strusuarioscu"]);
			$tseguimientopu->setStrCodigo($_POST["strCodigo"]);
			$tseguimientopu->setstrestadopu($_POST["lsEstadopu"]);
			$tseguimientopu->setstrFechaInicio($_POST["dtFecha"]);
			
	       if($tseguimientopu->getStrIngresar())
		   	{
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	$valor=$tseguimientopu->getStrCodigo();
				header("Location:".TSEGUIMIENTOPU_URL."tseguimientopu.php?btnBuscar=Buscar&strCodigo=".$valor."");
            
			}
            else
				{
				 $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	$valor=$tseguimientopu->getStrCodigo();
				header("Location:".TSEGUIMIENTOPU_URL."tseguimientopu.php?btnBuscar=Buscar&strCodigo=".$valor."");
				}
			
         break;
		  case( $_REQUEST["btnSiguiente"] == "Siguiente" ):            
            	$tseguimientopu->setStrCodigo($_POST["strCodigo"]);
				$valor=$tseguimientopu->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".TCONTRATACIONPU_URL."tcontratacionpu.php?btnBuscar=Buscar&strCodigo=".$valor."");
            break;
		  case( $_REQUEST["btnBuscar"] == "Buscar" ):            
            $tseguimientopu->setStrCodigo($_REQUEST["strCodigo"]);
			$tseguimientopu->setStrEtiqueta("INGRESO SEGUIMIENTO PUESTO");
            $tseguimientopu->setStrNombreBoton("btnGuardar");
			$tseguimientopu->setStrNombreBotonb("btnBuscar");
			$tseguimientopu->setStrNombreBotonanterior("btnAnterior");
	        $tseguimientopu->setStrValorBotonanterior("Anterior");
			$tseguimientopu->setStrNombreBotons("btnSiguiente");
            $tseguimientopu->setStrValorBotons("Siguiente");
            $tseguimientopu->setStrValorBoton("Guardar");
			$tseguimientopu->setStrValorBotonb("Buscar");
	       	$strResultado .= $tseguimientopu->getStrListarb();
	       	$strResultado .= '<br>';
	       	$strResultado .= $tseguimientopu->getStrListar();
         break;
         case( $_REQUEST["btnAnterior"] == "Anterior" ):            
            	$tseguimientopu->setStrCodigo($_POST["strCodigo"]);
        	   	$valor=$tseguimientopu->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".TASIGNACIONPU_URL."tasignacionpu.php?btnNuevo=Nuevo&strCodigo=".$valor."");
           
         	break; 
		 case( $_REQUEST["btnEditar"] == "Actualizar" ):
			 	$tseguimientopu->setStrDias($_POST["strdias"]);
				$tseguimientopu->setStrHorainicio($_POST["lsHorainicio"]);
				$tseguimientopu->setStrHorafin($_POST["lsHorafin"]);
				$tseguimientopu->setStrCodigo($_POST["strCodigo"]);
			    if($tseguimientopu->getStrActualizar())
                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
            	else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';

            $strResultado .= $tseguimientopu->getStrListar();
            break;
		case( $_REQUEST["btnActualizar"] == "Actualizar" ):
            $tseguimientopu->setStrCodigo($_REQUEST["strCodigo"]);
            $tseguimientopu->setStrEtiqueta("ACTUALIZAR SEGUIMIENTO PUESTO");
            $tseguimientopu->setStrNombreBoton("btnEditar");
            $tseguimientopu->setStrValorBoton("Actualizar");

            if($tseguimientopu->getStrBuscar())
                $strResultado .= $tseguimientopu->getStrFormulario();
            else {
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
                $strResultado .= $tseguimientopu->getStrListar();
            }
           break;
          case( $_REQUEST["btnEliminar"] == "Eliminar" ):
	            $tseguimientopu->setStrCodigo($_REQUEST["strCodigo"]);
			  
			  	$valor=$tseguimientopu->getStrCodigo();
				$v=$tseguimientopu->getStrBuscarteemp($valor);
	            if ($tseguimientopu->getStrBuscar())
	                if($tseguimientopu->getStrEliminar())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
	
	            header("Location:".TSEGUIMIENTOPU_URL."tseguimientopu.php?btnBuscar=Buscar&strCodigo=".$v."");
            break;
			
        case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $tseguimientopu->setStrCodigo($_REQUEST["strCodigo"]);
            if ($tseguimientopu->getStrBuscar())
                $strResultado .= $tseguimientopu->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $tseguimientopu->getStrListar().'<br>';
                }
            break;
      //Cuando cambia el combo de la Provincia
        
  
        default:
			$strResultado .= $tseguimientopu->getStrListar().'<br>';;
  
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>