<?php include('./caching/cache.start.php'); ?>
<?php
    session_start();
	date_default_timezone_set ( 'America/Guayaquil' );  
    $_SESSION["nombresistema"] = "sil";
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
    //require_once( $_SERVER['DOCUMENT_ROOT'] . '/unidadmedica/config/config.configurar.php' );
    include_once( CLASS_PATH . "class.clinterfaz.php" );
    include_once( CLASS_PATH . "class.cllogin.php" );
    $interfaz = new clInterfaz();
    $login = new clLogin();

    $retval = "";

    if(isset($_SESSION["usuario"]))
        $retval .= $login->getStrInformacionUsuario();

    $interfaz->setStrCentro($retval);
    echo $interfaz->getStrInterfaz();
    
?>
<?php include('./caching/cache.end.php'); ?>
