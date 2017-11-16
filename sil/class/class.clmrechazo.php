<?php	
    include_once( CLASS_PATH . "class.clquery.php" );

    class clMrechazo
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
        $ProcedimientoAlmacenado = sprintf("CALL splistarmrechazo();");
        $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
        $resultado = $query->getStrSqlSelect();
        $retval = "";

        if( count($resultado) > 0 ) {
            $retval .= '<option value="">Seleccione&nbsp Motivo Rechazo</option>';
            foreach( $resultado as $rst):
                if ($rst["id_mrechazo"] == $p )
                    $retval .= '<option value="'. $rst["id_mrechazo"] .'" selected="selected">'.$rst["descripcion_mrechazo"] .'</option>';
                else
                    $retval .= '<option value="'. $rst["id_mrechazo"] .'">'.$rst["descripcion_mrechazo"] .'</option>';
            endforeach;
        }
        else
            $retval .= '<option value="">Seleccione&nbsp Motivo Rechazo</option>';

        return $retval;
    }
    }
?>