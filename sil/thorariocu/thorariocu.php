<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    include_once( CLASS_PATH . "class.clinterfaz.php" );
	include_once( CLASS_PATH . "class.clthorariocu.php" );
	include_once( CLASS_PATH . "class.cltformacioncf.php" );


    $interfaz = new clInterfaz();
    $thorariocu = new clThorariocu();
    $strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
			$thorariocu->setStrCodigo($_REQUEST["strCodigo"]);
            $thorariocu->setStrLectura("");
            $thorariocu->setStrEtiqueta("INGRESAR HORARIO");
            $thorariocu->setStrNombreBoton("btnGuardar");
            $thorariocu->setStrValorBoton("Guardar");
			$thorariocu->setStrNombreBotons("btnSiguiente");
            $thorariocu->setStrValorBotons("Siguiente");
			$thorariocu->setStrNombreBotona("btnAnterior");
	        $thorariocu->setStrValorBotona("Anterior");
            $strResultado .= $thorariocu->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			$strResultado .= $thorariocu->getStrListar();
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ):            
            $thorariocu->setStrDias($_POST["strdias"]);
			$thorariocu->setStrHorainicio($_POST["lsHorainicio"]);
			$thorariocu->setStrHorafin($_POST["lsHorafin"]);
			$thorariocu->setStrCodigo($_POST["strCodigo"]);
			
	       if($thorariocu->getStrIngresar())
		   	{
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	$valor=$thorariocu->getStrCodigo();
				header("Location:".THORARIOCU_URL."thorariocu.php?btnNuevo=Nuevo&strCodigo=".$valor."");
			}
            else
				{
				 $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';	
				}
			$strResultado .= $thorariocu->getStrListar();
         break;
		 case( $_REQUEST["btnSiguiente"] == "Siguiente" ): 
        		$thorariocu->setStrCodigo($_POST["strCodigo"]);          
                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	$valor=$thorariocu->getStrCodigo();
            	header("Location:".TASIGNACIONCU_URL."tasignacioncu.php?btnNuevo=Nuevo&strCodigo=".$valor."");
         break;
		 case( $_REQUEST["btnAnterior"] == "Anterior" ):            
            	$thorariocu->setStrCodigo($_POST["strCodigo"]);
        	   	$valor=$thorariocu->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".TREQUISITOSCU_URL."trequisitoscu.php?btnNuevo=Nuevo&strCodigo=".$valor."");
           
         break; 
		 case( $_REQUEST["btnEditar"] == "Actualizar" ):
			 	$thorariocu->setStrDias($_POST["strdias"]);
				$thorariocu->setStrHorainicio($_POST["lsHorainicio"]);
				$thorariocu->setStrHorafin($_POST["lsHorafin"]);
				$thorariocu->setStrCodigo($_POST["strCodigo"]);
				
				$valor=$thorariocu->getStrCodigo();
				$v=$thorariocu->getStrBuscarthcu($valor);
			    if($thorariocu->getStrActualizar())
                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
            	else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';

            header("Location:".THORARIOCU_URL."thorariocu.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
		case( $_REQUEST["btnActualizar"] == "Actualizar" ):
            $thorariocu->setStrCodigo($_REQUEST["strCodigo"]);
            $thorariocu->setStrEtiqueta("ACTUALIZAR HORARIO");
            $thorariocu->setStrNombreBoton("btnEditar");
            $thorariocu->setStrValorBoton("Actualizar");

            if($thorariocu->getStrBuscar())
                $strResultado .= $thorariocu->getStrFormulario();
            else {
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
                $strResultado .= $thorariocu->getStrListar();
            }
           break;
          case( $_REQUEST["btnEliminar"] == "Eliminar" ):
	            $thorariocu->setStrCodigo($_REQUEST["strCodigo"]);
	            
	            $valor=$thorariocu->getStrCodigo();
				$v=$thorariocu->getStrBuscarthcu($valor);
	            if ($thorariocu->getStrBuscar())
	                if($thorariocu->getStrEliminar())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
	
	            header("Location:".THORARIOCU_URL."thorariocu.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
			
        case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $thorariocu->setStrCodigo($_REQUEST["strCodigo"]);
            if ($thorariocu->getStrBuscar())
                $strResultado .= $thorariocu->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $thorariocu->getStrListar().'<br>';
                }
            break;
      //Cuando cambia el combo de la Provincia
        
  
        default:
			$strResultado .= $thorariocu->getStrListar().'<br>';;
  
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>