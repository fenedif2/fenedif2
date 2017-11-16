<?php	
    include_once( CLASS_PATH . "class.clquery.php" );

    class clTipoUsuario
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


        public function getStrListar($t)
        {
            $query = new clQuery();

            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL splistartipousuario();");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();
            $retval = "";
            if( count($resultado) > 0 ) {
                $retval .= '<select name="lsTipoUsuario" id="lsTipoUsuario" class="combobox">';
                $retval .= '<option value="">Seleccione Tipo</option>';
                foreach( $resultado as $rst):
                    if($rst["tipusucodigo"] == $t )
                        $retval .= '<option value="'. $rst["tipusucodigo"] .'" selected="selected">'. $rst["tipusudescripcion"] .'</option>';
                    else
                        $retval .= '<option value="'. $rst["tipusucodigo"] .'">'. $rst["tipusudescripcion"] .'</option>';
                endforeach;
                $retval .= "</select>";
            }

            return $retval;
        }
    }
?>