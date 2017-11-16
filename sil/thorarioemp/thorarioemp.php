<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );
    include_once( CLASS_PATH . "class.clinterfaz.php" );
	include_once( CLASS_PATH . "class.clthorarioemp.php" );
	include_once( CLASS_PATH . "class.cltformacioncf.php" );


    $interfaz = new clInterfaz();
    $thorarioemp = new clthorarioemp();
    $strResultado = "";

    switch( true ) {

        case( $_REQUEST["btnNuevo"] == "Nuevo" ):
			$thorarioemp->setStrCodigo($_REQUEST["strCodigo"]);
            $thorarioemp->setStrLectura("");
            $thorarioemp->setStrEtiqueta("INGRESO HORARIO");
            $thorarioemp->setStrNombreBoton("btnGuardar");
            $thorarioemp->setStrValorBoton("Guardar");
			$thorarioemp->setStrNombreBotons("btnSiguiente");
           	$thorarioemp->setStrValorBotons("Siguiente");
			$thorarioemp->setStrNombreBotona("btnAnterior");
	        $thorarioemp->setStrValorBotona("Anterior");
            $strResultado .= $thorarioemp->getStrFormulario();
			$strResultado .= '<br><br><br><br>';
			$strResultado .= $thorarioemp->getStrListar();
            break;

        case( $_REQUEST["btnGuardar"] == "Guardar" ):            
            $thorarioemp->setStrDias($_POST["strdias"]);
			$thorarioemp->setStrHorainicio($_POST["lsHorainicio"]);
			$thorarioemp->setStrHorafin($_POST["lsHorafin"]);
			$thorarioemp->setStrCodigo($_POST["strCodigo"]);
			
	       if($thorarioemp->getStrIngresar())
		   	{
		   			$valor=$thorarioemp->getStrCodigo();
               $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".THORARIOEMP_URL."thorarioemp.php?btnNuevo=Nuevo&strCodigo=".$valor."");
			}
            else
				{
				 $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Ya existe informaci&oacute;n registra <br>y/o Error interno. Intente nuevamente</span>';	
				}
			$strResultado .= $thorarioemp->getStrListar();
         break;
		 case( $_REQUEST["btnSiguiente"] == "Siguiente" ):            
           	$thorarioemp->setStrCodigo($_POST["strCodigo"]);
		   	$valor=$thorarioemp->getStrCodigo();
               //$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".DFUNCIONES_URL."dfunciones.php?btnNuevo=Nuevo&strCodigo=".$valor."");
	        //$strResultado .= $apuesto->getStrListar().'<br>';
          break;
          case( $_REQUEST["btnAnterior"] == "Anterior" ):            
            	$thorarioemp->setStrCodigo($_POST["strCodigo"]);
        	   	$valor=$thorarioemp->getStrCodigo();
               	$strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n ingresada correctamente</span>';
            	header("Location:".TREQUISITOSEMP_URL."trequisitosemp.php?btnNuevo=Nuevo&strCodigo=".$valor."");
         break; 
		 case( $_REQUEST["btnEditar"] == "Actualizar" ):
			 	$thorarioemp->setStrDias($_POST["strdias"]);
				$thorarioemp->setStrHorainicio($_POST["lsHorainicio"]);
				$thorarioemp->setStrHorafin($_POST["lsHorafin"]);
				$thorarioemp->setStrCodigo($_POST["strCodigo"]);
				
				$valor=$thorarioemp->getStrCodigo();
				$v=$thorarioemp->getStrBuscarthemp($valor);
			    if($thorarioemp->getStrActualizar())
                $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
            	else
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: Error interno. Intente nuevamente</span>';

          header("Location:".THORARIOEMP_URL."thorarioemp.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
		case( $_REQUEST["btnActualizar"] == "Actualizar" ):
            $thorarioemp->setStrCodigo($_REQUEST["strCodigo"]);
            $thorarioemp->setStrEtiqueta("ACTUALIZAR HORARIO");
            $thorarioemp->setStrNombreBoton("btnEditar");
            $thorarioemp->setStrValorBoton("Actualizar");

            if($thorarioemp->getStrBuscar())
                $strResultado .= $thorarioemp->getStrFormulario();
            else {
                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada <br>y/o Error interno. Intente nuevamente</span>';
                $strResultado .= $thorarioemp->getStrListar();
            }
           break;
          case( $_REQUEST["btnEliminar"] == "Eliminar" ):
	            $thorarioemp->setStrCodigo($_REQUEST["strCodigo"]);
	            
	            $valor=$thorarioemp->getStrCodigo();
				$v=$thorarioemp->getStrBuscarthemp($valor);
	            if ($thorarioemp->getStrBuscar())
	                if($thorarioemp->getStrEliminar())
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n eliminada correctamente</span>';
	                else
	                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No se puede eliminar M&eacute;dico [ Historia Cl&iacute;nica]</span>';
	            else
	                $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
	
	           header("Location:".THORARIOEMP_URL."thorarioemp.php?btnNuevo=Nuevo&strCodigo=".$v."");
            break;
			
        case( $_REQUEST["btnDetalle"] == "Detalle" ):
            $thorarioemp->setStrCodigo($_REQUEST["strCodigo"]);
            if ($thorarioemp->getStrBuscar())
                $strResultado .= $thorarioemp->getStrDetallePersona();
            else
                {
                    $strResultado .= '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: No existe informaci&oacute;n registrada</span>';
                    $strResultado .= $thorarioemp->getStrListar().'<br>';
                }
            break;
      //Cuando cambia el combo de la Provincia
        
  
        default:
			$strResultado .= $thorarioemp->getStrListar().'<br>';;
  
            break;

    }

    $interfaz->setStrCentro($strResultado);
    echo $interfaz->getStrInterfaz();
?>