<?php	
    include_once( CLASS_PATH . "class.clquery.php" );

    class clEstadoMedico
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
            $ProcedimientoAlmacenado = sprintf("CALL splistarestadomedico();");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();
            $retval = "";
            if( count($resultado) > 0 ) {
                $retval .= '<select name="lsEstadoMedico" id="lsEstadoMedico" class="combobox">';
                $retval .= '<option value="">Seleccione Estado</option>';
                foreach( $resultado as $rst):
                    if($rst["estmedcodigo"] == $e )
                        $retval .= '<option value="'. $rst["estmedcodigo"] .'" selected="selected">'. $rst["estmeddescripcion"] .'</option>';
                    else
                        $retval .= '<option value="'. $rst["estmedcodigo"] .'">'. $rst["estmeddescripcion"] .'</option>';
                endforeach;
                $retval .= "</select>";
            }

            return $retval;
        }
    }
?>