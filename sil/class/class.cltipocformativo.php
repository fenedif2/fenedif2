<?php	
    include_once( CLASS_PATH . "class.clquery.php" );

    class clTipocformativo
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
        $ProcedimientoAlmacenado = sprintf("CALL splistartipocformativo();");
        $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
        $resultado = $query->getStrSqlSelect();
        $retval = "";

        if( count($resultado) > 0 ) {
            $retval .= '<option value="">Seleccione&nbsp; Tipo Centro Formativo</option>';
            foreach( $resultado as $rst):
                if ($rst["tipocformativo_id"] == $p )
                    $retval .= '<option value="'. $rst["tipocformativo_id"] .'" selected="selected">'.$rst["tipocformativo_nombre"] .'</option>';
                else
                    $retval .= '<option value="'. $rst["tipocformativo_id"] .'">'.$rst["tipocformativo_nombre"] .'</option>';
            endforeach;
        }
        else
            $retval .= '<option value="">Seleccione&nbsp; Tipo Centro Formativo</option>';

        return $retval;
    }
    }
?>