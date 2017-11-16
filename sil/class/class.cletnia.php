<?php	
    include_once( CLASS_PATH . "class.clquery.php" );

    class clEtnia
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
        $ProcedimientoAlmacenado = sprintf("CALL splistaretnia();");
        $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
        $resultado = $query->getStrSqlSelect();
        $retval = "";

        if( count($resultado) > 0 ) {
            $retval .= '<option value="">Seleccione&nbsp;Opción</option>';
            foreach( $resultado as $rst):
                if ($rst["etnia_id"] == $p )
                    $retval .= '<option value="'. $rst["etnia_id"] .'" selected="selected">'.$rst["etnia_nombre"] .'</option>';
                else
                    $retval .= '<option value="'. $rst["etnia_id"] .'">'.$rst["etnia_nombre"] .'</option>';
            endforeach;
        }
        else
            $retval .= '<option value="">Seleccione&nbsp;Opción</option>';

        return $retval;
    }
    }
?>