<?php	
    include_once( CLASS_PATH . "class.clquery.php" );

    class clTformacion
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


         public function getStrListar($p) {
        $query = new clQuery();

        //Nombre Procedimientos Almacenados
        $ProcedimientoAlmacenado = sprintf("CALL splistartformacion();");
        $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
        $resultado = $query->getStrSqlSelect();
        $retval = "";

        if( count($resultado) > 0 ) {
            $retval .= '<option value="">Seleccione&nbsp;Tipo Formación</option>';
            foreach( $resultado as $rst):
                if ($rst["tipocf_id"] == $p )
                    $retval .= '<option value="'. $rst["tipocf_id"] .'" selected="selected">'.$rst["tipo_descripcion"] .'</option>';
                else
                    $retval .= '<option value="'. $rst["tipocf_id"] .'">'.$rst["tipo_descripcion"] .'</option>';
            endforeach;
        }
        else
            $retval .= '<option value="">Seleccione&nbsp;Tipo Formación</option>';

        return $retval;
    }
    }
?>