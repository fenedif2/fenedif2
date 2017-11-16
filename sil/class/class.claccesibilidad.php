<?php	
    include_once( CLASS_PATH . "class.clquery.php" );

    class clAccesibilidad
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
        $ProcedimientoAlmacenado = sprintf("CALL splistaraccesibilidad();");
        $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
        $resultado = $query->getStrSqlSelect();
        $retval = "";

        if( count($resultado) > 0 ) {
            $retval .= '<option value="">Seleccione&nbsp; Accesibilidad</option>';
            foreach( $resultado as $rst):
                if ($rst["adaptacion_id"] == $p )
                    $retval .= '<option value="'. $rst["adaptacion_id"] .'" selected="selected">'.$rst["adaptacion_nombre"] .'</option>';
                else
                    $retval .= '<option value="'. $rst["adaptacion_id"] .'">'.$rst["adaptacion_nombre"] .'</option>';
            endforeach;
        }
        else
            $retval .= '<option value="">Seleccione&nbsp; Accesibilidad</option>';

        return $retval;
    }
    }
?>