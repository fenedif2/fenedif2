<?php
    session_start();
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.mysql.php' );
    class clMySql
    {
        private $strServidor;
        private $strBaseDatos;
        private $strUsuario;
        private $strClave;

        //Constructor de la Clase clMySql
        public function __construct()
        {
            $this->strServidor = MYSQL_HOST;
            $this->strBaseDatos = MYSQL_BASEDATOS;
            $this->strUsuario = MYSQL_USUARIO;
            $this->strClave = MYSQL_CLAVE;
        //					$this->$link = "";
        }

        //Abre la coneci�n con la Base de Datos
        public function getStrAbrirConexion()
        {
            if (!($link = mysqli_connect($this->strServidor,$this->strUsuario,$this->strClave,$this->strBaseDatos))) {
                exit();
            }

            return $link;
        }

        //Cierra la Conexi�n con la Base de Datos
        public function getStrCerrarConexion($cn)
        {
            return mysqli_close($cn);
        }


    } // Cierre de la Clase clMySql
?>
