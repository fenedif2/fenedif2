<?php
//    require_once( $_SERVER['DOCUMENT_ROOT'] . '/unidadmedica/config/config.configurar.php' );
//    include_once( CLASS_PATH . "class.clinterfaz.php" );
//    include_once( CLASS_PATH . "class.cllogin.php" );
//
//    $interfaz = new clInterfaz();
//    $login = new clLogin();
//
//    $strCheck = "";
//
//    if ($_POST["btnLogin"] == 'Ingresar')
//    {
//        $login->setStrCuenta($_POST["strUsuario"]);
//        $login->setStrClave($_POST["strClave"]);
//        if(!($login->getStrCheckLogin()))
//            $strCheck = $login->getStrFormulario().'<img src="'. IMAGENES_PATH .'/error.gif" title="Error" width="16px" height="16px" /> <span class="camporequerido">Usuario y/o Clave incorrecto <br>y/o Usuario inactivo</span>';
//        else
//            $strCheck = $login->getStrInformacionUsuario();
//    }
//    else
//        $strCheck = $login->getStrFormulario();
//
//    $interfaz->setStrCentro($strCheck);
//    echo $interfaz->getStrInterfaz();

?>