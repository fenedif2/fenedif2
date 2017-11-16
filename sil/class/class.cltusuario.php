<?php	
    include_once( CLASS_PATH . "class.clquery.php" );

    class clTusuario
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
        $sucursal=$_SESSION["usuario"]["suc"];
		$ProcedimientoAlmacenado = sprintf("CALL splistartusuario('%s');","$sucursal");
        $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
        $resultado = $query->getStrSqlSelect();
        $retval = "";

        if( count($resultado) > 0 ) {
            $retval .= '<option value="">Seleccione&nbsp;Usuario</option>';
            foreach( $resultado as $rst):
                if ($rst["id_usuario"] == $p )
                    $retval .= '<option value="'. $rst["id_usuario"] .'" selected="selected">'.$rst["identificacion"] .' </option>';
                else
                    $retval .= '<option value="'. $rst["id_usuario"] .'">'.$rst["apellido_paterno"] .' '.$rst["apellido_materno"] .' '.$rst["primer_nombre"] .' '.$rst["segundo_nombre"] .'-->['.$rst["identificacion"] .']</option>';
            endforeach;
        }
        else
            $retval .= '<option value="">Seleccione&nbsp;Usuario</option>';

        return $retval;
    }
    }
?>