<?php	
    include_once( CLASS_PATH . "class.clquery.php" );

    class clEstadoUsuario
    {
        private $strCodigo;
        private $strDescripcion;

        public function __construct()
        {
            $this->strCodigo = "";
            $this->strDescripcion = "";
        }

        // Funciones Get y Set de la Clase clLogin
        public function getStrCodigo()
        {
            return $this->strCodigo;
        }

        public function setStrCodigo($c)
        {
            $this->strCodigo = $c;
        }

        public function getStrDescripcion()
        {
            return $this->strDescripcion;
        }

        public function setStrDescripcion($d)
        {
            $this->strDescripcion = $d;
        }


        public function getStrListar($e)
        {
            $query = new clQuery();

            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL splistarestadousuario();");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();
            $retval = "";
            if( count($resultado) > 0 ) {
                $retval .= '<select name="lsEstadoUsuario" id="lsEstadoUsuario" class="combobox">';
                $retval .= '<option value="">Seleccione Estado</option>';
                foreach( $resultado as $rst):
                    if($rst["estusucodigo"] == $e )
                        $retval .= '<option value="'. $rst["estusucodigo"] .'" selected="selected">'. $rst["estusudescripcion"] .'</option>';
                    else
                        $retval .= '<option value="'. $rst["estusucodigo"] .'">'. $rst["estusudescripcion"] .'</option>';
                endforeach;
                $retval .= "</select>";
            }

            return $retval;
        }
    }
?>