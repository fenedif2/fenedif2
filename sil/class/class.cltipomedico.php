<?php	
    include_once( CLASS_PATH . "class.clquery.php" );

    class clTipoMedico
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
            $ProcedimientoAlmacenado = sprintf("CALL splistartipomedico();");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();
            $retval = "";
            if( count($resultado) > 0 ) {
//                $retval .= '<select name="lsTipoMedico" id="lsTipoMedico" class="combobox">';
                $retval .= '<option value="">Seleccione Especialidad</option>';
                foreach( $resultado as $rst):
                    if($rst["tipmedcodigo"] == $e )
                        $retval .= '<option value="'. $rst["tipmedcodigo"] .'" selected="selected">'. $rst["tipmeddescripcion"] .'</option>';
                    else
                        $retval .= '<option value="'. $rst["tipmedcodigo"] .'">'. $rst["tipmeddescripcion"] .'</option>';
                endforeach;
//                $retval .= "</select>";
            }

            return $retval;
        }
    }
?>