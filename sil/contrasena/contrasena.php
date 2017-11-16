<?php
  session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
      if(!(isset($_SESSION["usuario"])))
         header( "Location:". INICIO_URL );

	include_once( CLASS_PATH . "class.clinterfaz.php" );
	include_once( CLASS_PATH . "class.clcontrasena.php" );
		
	$interfaz = new clInterfaz();		
	$contrasena = new clContrasena();

	$strResultado = "";			        
	switch( true )
		{	

                  case( $_REQUEST["btnActualizar"] == "Actualizar" ):
                        $contrasena->setStrUsuario($_SESSION["usuario"]["cuenta"]);
                        $contrasena->setStrNuevaContrasena($_POST["strNuevaContrasena"]);
                        if($contrasena->getStrActualizar())
                                $strResultado = '<img src="'. IMAGENES_PATH .'/correcto.gif" title="Correcto" width="17px" height="17px" /> <span class="resultadocorrecto">Informaci&oacute;n actualizada correctamente</span>';
                        else
                                $strResultado = '<img src="'. IMAGENES_PATH .'/incorrecto.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci�n cancelada. error interno intente nuevamente</span>';

                        $contrasena->setStrEtiqueta("Cambiar Contrase&ntilde;a");
                        $contrasena->setStrNombreBoton("btnActualizar");
                        $contrasena->setStrValorBoton("Actualizar");

                        $strResultado .= $contrasena->getStrFormulario().'<br>';
                        break;
                
                    case( $_REQUEST["btnBuscar"] == "ContrasenaActual" ):
                            $contrasena->setStrUsuario($_SESSION["usuario"]["cuenta"]);
                            $contrasena->setStrContrasenaActual($_REQUEST["strNumeroContrasenaActual"]);
                            if($contrasena->getStrBuscar())
                                $strResultado .= "<input id='strCampoContrasenaActual' name='strCampoContrasenaActual' type='hidden' value='1' />".'<img src="'. IMAGENES_PATH .'/check.png" title="Correcto" width="16px" height="16px" /> <span class="resultadocorrecto">Informaci&oacute;n&nbsp;Correcta</span>';
                            else
                                $strResultado .= "<input id='strCampoContrasenaActual' name='strCampoContrasenaActual' type='hidden' />".'<img src="'. IMAGENES_PATH .'/error.gif" title="Error" width="13px" height="14px" /> <span class="resultadoincorrecto">Informaci&oacute;n&nbsp;incorrecta</span>';
                            $strResultado .= print($strResultado);
                            exit;

                    case( $_REQUEST["btnBuscar"] == "NuevaContrasena" ):
                            $contrasena->setStrConfirmarContrasena($_REQUEST["strNumeroConfirmarContrasena"]);
                            $contrasena->setStrNuevaContrasena($_REQUEST["strNumeroNuevaContrasena"]);
                            if($_REQUEST["strNumeroConfirmarContrasena"] != "")
                                if($_REQUEST["strNumeroNuevaContrasena"] == $_REQUEST["strNumeroConfirmarContrasena"])
                                    $strResultado = "<input id='strCampoNuevaContrasena' name='strCampoNuevaContrasena' type='hidden' value='1' /><input id='strCampoConfirmarContrasena' name='strCampoConfirmarContrasena' type='hidden' value='1' />".'<img src="'. IMAGENES_PATH .'/check.png" title="Correcto" width="16px" height="16px" /> <span class="resultadocorrecto">Informaci&oacute;n&nbsp;Correcta</span>';

                                else
                                    $strResultado .= "<input id='strCampoNuevaContrasena' name='strCampoNuevaContrasena' type='hidden' /><input id='strCampoConfirmarContrasena' name='strCampoConfirmarContrasena' type='hidden' />".'<img src="'. IMAGENES_PATH .'/error.gif" title="Error" width="13px" height="14px" /> <span class="resultadoincorrecto">Nueva&nbsp;Contrase&ntilde;a&nbsp;&ne;&nbsp;Confirmar&nbsp;Contrase&ntilde;a</span>';

                            $strResultado .= print($strResultado);
                            exit;

                    case( $_REQUEST["btnBuscar"] == "ConfirmarContrasena" ):
                            $contrasena->setStrConfirmarContrasena($_REQUEST["strNumeroConfirmarContrasena"]);
                            $contrasena->setStrNuevaContrasena($_REQUEST["strNumeroNuevaContrasena"]);
                            if($_REQUEST["strNumeroNuevaContrasena"] != "")
                                if($_REQUEST["strNumeroNuevaContrasena"] == $_REQUEST["strNumeroConfirmarContrasena"])
                                    $strResultado = "<input id='strCampoNuevaContrasena' name='strCampoNuevaContrasena' type='hidden' value='1' /><input id='strCampoConfirmarContrasena' name='strCampoConfirmarContrasena' type='hidden' value='1' />".'<img src="'. IMAGENES_PATH .'/check.png" title="Correcto" width="16px" height="16px" /> <span class="resultadocorrecto">Informaci&oacute;n&nbsp;Correcta</span>';

                                else
                                    $strResultado .= "<input id='strCampoNuevaContrasena' name='strCampoNuevaContrasena' type='hidden' /><input id='strCampoConfirmarContrasena' name='strCampoConfirmarContrasena' type='hidden' />".'<img src="'. IMAGENES_PATH .'/error.gif" title="Error" width="13px" height="14px" /> <span class="resultadoincorrecto">Nueva&nbsp;Contrase&ntilde;a&nbsp;&ne;&nbsp;Confirmar&nbsp;Contrase&ntilde;a</span>';

                            $strResultado .= print($strResultado);
                            exit;

                default:
                        //$contrasena->setStrSede($_SESSION["usuario"]["sede"]);
                        $contrasena->setStrEtiqueta("Cambiar Contrase&ntilde;a");
                        $contrasena->setStrNombreBoton("btnActualizar");
                        $contrasena->setStrValorBoton("Actualizar");
                        $strResultado .= $contrasena->getStrFormulario();
                        break;	 
    }

    $interfaz->setStrCentro('<br>'.$strResultado);
    echo $interfaz->getStrInterfaz();	
?>