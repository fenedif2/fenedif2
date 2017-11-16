<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    include_once( CLASS_PATH . "class.clinterfaz.php" );
	include_once( CLASS_PATH . "class.cltasignacioncu.php" );
	include_once( CLASS_PATH . "class.cltformacioncf.php" );


    $interfaz = new clInterfaz();
    $tasignacioncu = new clTasignacioncu();
    $strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
			$tasignacioncu->setStrCodigo($_REQUEST["strCodigo"]);
			$tasignacioncu->setstrFechaInicio($_REQUEST["dtFecha"]);
			$tasignacioncu->setstrFechaFin($_REQUEST["dtFechaf"]);
            $tasignacioncu->setStrLectura("");
            $tasignacioncu->setStrEtiqueta("Ingreso&nbsp;Busqueda Usuarios para asignación de Curso");
            $tasignacioncu->setStrNombreBoton("btnGuardar");
			$tasignacioncu->setStrNombreBotonb("btnBuscar");
            $tasignacioncu->setStrValorBoton("Guardar");
            $tasignacioncu->setStrNombreBotons("btnSiguiente");
            $tasignacioncu->setStrValorBotons("Siguiente");
			$tasignacioncu->setStrNombreBotona("btnAnterior");
	        $tasignacioncu->setStrValorBotona("Anterior");
			$tasignacioncu->setStrValorBotonb("Buscar");
            $strResultado .= $tasignacioncu->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			$strResultado .= $tasignacioncu->getStrListar();
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ):            
            $tasignacioncu->setstrusuarioscu($_POST["strusuarioscu"]);
			$tasignacioncu->setStrCodigo($_POST["strCodigo"]);
			
	       if($tasignacioncu->getStrIngresar())
		   	{
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	$valor=$tasignacioncu->getStrCodigo();
				header("Location:".TASIGNACIONCU_URL."tasignacioncu.php?btnNuevo=Nuevo&strCodigo=".$valor."");
			}
            else
				{
				 $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';	
				}
			$strResultado .= $tasignacioncu->getStrListar();
         break;
		 case( $_REQUEST["btnAnterior"] == "Anterior" ):            
            	$tasignacioncu->setStrCodigo($_POST["strCodigo"]);
        	   	$valor=$tasignacioncu->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".THORARIOCU_URL."thorariocu.php?btnNuevo=Nuevo&strCodigo=".$valor."");
           
         break; 
		  case( $_REQUEST["btnBuscar"] == "Buscar" ):            
            $tasignacioncu->setStrCodigo($_REQUEST["strCodigo"]);
			$tasignacioncu->setstrFechaInicio($_REQUEST["dtFecha"]);
			$tasignacioncu->setstrFechaFin($_REQUEST["dtFechaf"]);
			 $tasignacioncu->setStrEtiqueta("Ingreso&nbsp;Horario");
            $tasignacioncu->setStrNombreBoton("btnGuardar");
			$tasignacioncu->setStrNombreBotonb("btnBuscar");
            $tasignacioncu->setStrValorBoton("Guardar");
			$tasignacioncu->setStrValorBotonb("Buscar");
	       	$strResultado .= $tasignacioncu->getStrListarb();
         break;
		 case( $_REQUEST["btnEditar"] == "Actualizar" ):
			 	$tasignacioncu->setStrDias($_POST["strdias"]);
				$tasignacioncu->setStrHorainicio($_POST["lsHorainicio"]);
				$tasignacioncu->setStrHorafin($_POST["lsHorafin"]);
				$tasignacioncu->setStrCodigo($_POST["strCodigo"]);
			    if($tasignacioncu->getStrActualizar())
                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
            	else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';

            $strResultado .= $tasignacioncu->getStrListar();
            break;
		case( $_REQUEST["btnActualizar"] == "Actualizar" ):
            $tasignacioncu->setStrCodigo($_REQUEST["strCodigo"]);
            $tasignacioncu->setStrEtiqueta("Actualizar&nbsp;Horario");
            $tasignacioncu->setStrNombreBoton("btnEditar");
            $tasignacioncu->setStrValorBoton("Actualizar");

            if($tasignacioncu->getStrBuscar())
                $strResultado .= $tasignacioncu->getStrFormulario();
            else {
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
                $strResultado .= $tasignacioncu->getStrListar();
            }
           break;
          case( $_REQUEST["btnEliminar"] == "Eliminar" ):
	            $tasignacioncu->setStrCodigo($_REQUEST["strCodigo"]);
			  
			  	$valor=$tasignacioncu->getStrCodigo();
				$v=$tasignacioncu->getStrBuscartacu($valor);
	            if ($tasignacioncu->getStrBuscar())
	                if($tasignacioncu->getStrEliminar())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
	
	           header("Location:".TASIGNACIONCU_URL."tasignacioncu.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
			
        case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $tasignacioncu->setStrCodigo($_REQUEST["strCodigo"]);
            if ($tasignacioncu->getStrBuscar())
                $strResultado .= $tasignacioncu->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $tasignacioncu->getStrListar().'<br>';
                }
            break;
      //Cuando cambia el combo de la Provincia
        
  
        default:
			$strResultado .= $tasignacioncu->getStrListar().'<br>';;
  
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>