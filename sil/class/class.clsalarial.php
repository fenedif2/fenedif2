<?php	
    include_once( CLASS_PATH . "class.clquery.php" );

    class clSalarial
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
        $ProcedimientoAlmacenado = sprintf("CALL splistarsalarial();");
        $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
        $resultado = $query->getStrSqlSelect();
        $retval = "";

        if( count($resultado) > 0 ) {
            $retval .= '<option value="">Seleccione&nbsp; </option>';
            foreach( $resultado as $rst):
                if ($rst["aspiracionsalarial_id"] == $p )
                    $retval .= '<option value="'. $rst["aspiracionsalarial_id"] .'" selected="selected">'.$rst["aspiracionsalarial_nombre"] .'</option>';
                else
                    $retval .= '<option value="'. $rst["aspiracionsalarial_id"] .'">'.$rst["aspiracionsalarial_nombre"] .'</option>';
            endforeach;
        }
        else
            $retval .= '<option value="">Seleccione&nbsp; </option>';

        return $retval;
    }
    }
?>