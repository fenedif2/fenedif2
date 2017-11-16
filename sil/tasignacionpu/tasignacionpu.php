<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    include_once( CLASS_PATH . "class.clinterfaz.php" );
	include_once( CLASS_PATH . "class.cltasignacionpu.php" );
	include_once( CLASS_PATH . "class.cltformacioncf.php" );


    $interfaz = new clInterfaz();
    $tasignacionpu = new clTasignacionpu();
    $strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
			$tasignacionpu->setStrCodigo($_REQUEST["strCodigo"]);
			$tasignacionpu->setstrFechaInicio($_REQUEST["dtFecha"]);
			$tasignacionpu->setstrFechaFin($_REQUEST["dtFechaf"]);
            $tasignacionpu->setStrLectura("");
            $tasignacionpu->setStrEtiqueta("INGRESO ASIGNACIÓN PUESTO");
            $tasignacionpu->setStrNombreBoton("btnGuardar");
			$tasignacionpu->setStrNombreBotonb("btnBuscar");
			$tasignacionpu->setStrNombreBotons("btnSiguiente");
            $tasignacionpu->setStrValorBotons("Siguiente");
            $tasignacionpu->setStrValorBoton("Guardar");
			$tasignacionpu->setStrValorBotonb("Buscar");
            $strResultado .= $tasignacionpu->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			$strResultado .= $tasignacionpu->getStrListar();
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ):            
            $tasignacionpu->setstrusuarioscu($_POST["strusuarioscu"]);
			$tasignacionpu->setStrCodigo($_POST["strCodigo"]);
			
	       if($tasignacionpu->getStrIngresar())
		   	{
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
               $valor=$tasignacionpu->getStrCodigo();
				header("Location:".TASIGNACIONPU_URL."tasignacionpu.php?btnNuevo=Nuevo&strCodigo=".$valor."");
            }
            else
				{
				 $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';	
				}
			$strResultado .= $tasignacionpu->getStrListar();
         break;
		 case( $_REQUEST["btnSiguiente"] == "Siguiente" ):            
            	$tasignacionpu->setStrCodigo($_POST["strCodigo"]);
				$valor=$tasignacionpu->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".TSEGUIMIENTOPU_URL."tseguimientopu.php?btnBuscar=Buscar&strCodigo=".$valor."");
            break;
		  case( $_REQUEST["btnBuscar"] == "Buscar" ):            
            $tasignacionpu->setStrCodigo($_REQUEST["strCodigo"]);
			$tasignacionpu->setstrFechaInicio($_REQUEST["dtFecha"]);
			$tasignacionpu->setstrFechaFin($_REQUEST["dtFechaf"]);
			 $tasignacionpu->setStrEtiqueta("Ingreso&nbsp;Horario");
            $tasignacionpu->setStrNombreBoton("btnGuardar");
			$tasignacionpu->setStrNombreBotonb("btnBuscar");
            $tasignacionpu->setStrValorBoton("Guardar");
			$tasignacionpu->setStrValorBotonb("Buscar");
	       	$strResultado .= $tasignacionpu->getStrListarb();
         break;
		 case( $_REQUEST["btnEditar"] == "Actualizar" ):
			 	$tasignacionpu->setStrDias($_POST["strdias"]);
				$tasignacionpu->setStrHorainicio($_POST["lsHorainicio"]);
				$tasignacionpu->setStrHorafin($_POST["lsHorafin"]);
				$tasignacionpu->setStrCodigo($_POST["strCodigo"]);
			    if($tasignacionpu->getStrActualizar())
                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
            	else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';

            $strResultado .= $tasignacionpu->getStrListar();
            break;
		case( $_REQUEST["btnActualizar"] == "Actualizar" ):
            $tasignacionpu->setStrCodigo($_REQUEST["strCodigo"]);
            $tasignacionpu->setStrEtiqueta("Actualizar&nbsp;Horario");
            $tasignacionpu->setStrNombreBoton("btnEditar");
            $tasignacionpu->setStrValorBoton("Actualizar");

            if($tasignacionpu->getStrBuscar())
                $strResultado .= $tasignacionpu->getStrFormulario();
            else {
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
                $strResultado .= $tasignacionpu->getStrListar();
            }
           break;
          case( $_REQUEST["btnEliminar"] == "Eliminar" ):
	            $tasignacionpu->setStrCodigo($_REQUEST["strCodigo"]);
			  
			  	$valor=$tasignacionpu->getStrCodigo();
				$v=$tasignacionpu->getStrBuscarapemp($valor);
	            if ($tasignacionpu->getStrBuscar())
				{
				     if($tasignacionpu->getStrEliminar())
					 {
	                    
						header("Location:".TASIGNACIONPU_URL."tasignacionpu.php?btnNuevo=Nuevo&strCodigo=".$v."");
	                }
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
	            }
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
						$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
						 
	          header("Location:".TASIGNACIONPU_URL."tasignacionpu.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
			
        case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $tasignacionpu->setStrCodigo($_REQUEST["strCodigo"]);
            if ($tasignacionpu->getStrBuscar())
                $strResultado .= $tasignacionpu->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $tasignacionpu->getStrListar().'<br>';
                }
            break;
      //Cuando cambia el combo de la Provincia
        
  
        default:
			$strResultado .= $tasignacionpu->getStrListar().'<br>';;
  
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>