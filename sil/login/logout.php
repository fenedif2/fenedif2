<?php
 	session_start();
 	require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.mysql.php' );
    include_once( CLASS_PATH . "class.clquery.php" );
    
    $query = new clQuery();
    //Nombre Procedimientos Almacenados [Auditoria]
    $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'S', 'tusuario', 'Salir del Sistema');
    $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
    $query->getStrSqlInsertUpdateDelete();
	 $ProcedimientoAlmacenado = sprintf("CALL spactualizarloginss('%s');", $_SESSION["usuario"]["cuenta"]);
                    $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
                    $query->getStrSqlInsertUpdateDelete();
					
    session_destroy();
    header( "Location:". INICIO_URL ."?btnpagina=pagina-publico-inicio" );
?>