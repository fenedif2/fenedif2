<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );

	include_once( CLASS_PATH . "class.clinterfaz.php" );
	include_once( CLASS_PATH . "class.cltsucursal.php" );
		
	$interfaz = new clInterfaz();		
	$tsucursal = new clTsucursal();

	$strResultado = "";			        
	switch( true )
		{	

                  case( $_REQUEST["btnActualizar"] == "Actualizar" ):
                        $tsucursal->setStrUsuario($_SESSION["usuario"]["cuenta"]);
                        $tsucursal->setStrSucursal($_POST["lsSucursal"]);
                        if($tsucursal->getStrActualizar())
						{
                            	    $strResultado = '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente.</span>';
						 		  	unset($_SESSION["usuario"]["sucursal"]);
						 		  	$_SESSION["usuario"]["suc"]=$_POST["lsSucursal"];
									switch ($_SESSION["usuario"]["suc"]) {
												    case 1:
												        $_SESSION["usuario"]["sucursal"]="PICHINCHA";
												        break;
												     case 2:
												        $_SESSION["usuario"]["sucursal"]="GUAYAS";
												        break;
													 case 3:
												        $_SESSION["usuario"]["sucursal"]="CUENCA";
												        break;	
												      case 4:
												        $_SESSION["usuario"]["sucursal"]="AZUAY";
												        break; 
													 case 5:
												        $_SESSION["usuario"]["sucursal"]="MABÍ";
												        break;	
												      case 6:
												        $_SESSION["usuario"]["sucursal"]="EL ORO";
												        break; 	
												     case 7:
												        $_SESSION["usuario"]["sucursal"]="LOS RÍOS";
												        break;
												     case 8:
												        $_SESSION["usuario"]["sucursal"]="IMBABURA";
												        break;
													 case 9:
												        $_SESSION["usuario"]["sucursal"]="SANTO DOMINGO";
												        break;	
												      case 10:
												        $_SESSION["usuario"]["sucursal"]="ORELLANA SUCUMBÍOS";
												        break; 
													 case 11:
												        $_SESSION["usuario"]["sucursal"]="COTOPAXI";
												        break;	
												      case 12:
												        $_SESSION["usuario"]["sucursal"]="TUNGURAHUA";
												        break; 	
													case 13:
												        $_SESSION["usuario"]["sucursal"]="NAPO";
												        break; 
													case 14:
												        $_SESSION["usuario"]["sucursal"]="CANAR";
												        break;
												     case 15:
												        $_SESSION["usuario"]["sucursal"]="ESMERALDAS";
												        break;
												    case 16:
												        $_SESSION["usuario"]["sucursal"]="BOLIVAR";
												        break;  
													case 17:
												        $_SESSION["usuario"]["sucursal"]="SUCUMBIOS";
												        break;
												     case 18:
												        $_SESSION["usuario"]["sucursal"]="LOJA";
												        break;
												    case 19:
												        $_SESSION["usuario"]["sucursal"]="MORONA SANTIAGO";
												        break; 
												    case 20:
												        $_SESSION["usuario"]["sucursal"]="PASTAZA";
												        break;
												    case 21:
												        $_SESSION["usuario"]["sucursal"]="CHIMBORAZO";
												        break;  
													case 22:
												        $_SESSION["usuario"]["sucursal"]="SANTA ELENA";
												        break;
												     case 23:
												        $_SESSION["usuario"]["sucursal"]="CARCHI";
												        break;
												    case 24:
												        $_SESSION["usuario"]["sucursal"]="ZAMORA CHINCHIPE";
												        break; 
													case 25:
												        $_SESSION["usuario"]["sucursal"]="RIOBAMBA";
												        break;   		         		     		 	     
												}
									
  						//session_start();
						 }
                        else
                                $strResultado = '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci�n cancelada. error interno intente nuevamente</span>';

                        $tsucursal->setStrEtiqueta("Cambiar SIL");
                        $tsucursal->setStrNombreBoton("btnActualizar");
                        $tsucursal->setStrValorBoton("Actualizar");

                        $strResultado .= $tsucursal->getStrFormulario().'<br>';
                        break;
                
                   
                default:
                        //$tsucursal->setStrSede($_SESSION["usuario"]["sede"]);
                        $tsucursal->setStrEtiqueta("Cambiar SIL");
                        $tsucursal->setStrNombreBoton("btnActualizar");
                        $tsucursal->setStrValorBoton("Actualizar");
                        $strResultado .= $tsucursal->getStrFormulario();
                        break;	 
    }

    $interfaz->setStrCentro('<br>'.$strResultado);
    echo $interfaz->getStrInterfaz();	
?>