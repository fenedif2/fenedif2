<?php	
require_once( $_SERVER['DOCUMENT_ROOT'] . '/sil/config/config.configurar.php' );
include_once( CLASS_PATH . "class.clquery.php" );

class clParroquia {
    private $strCodigo;
    private $strDescripcion;

    public function __construct() {
        $this->strCodigo = "";
        $this->strDescripcion = "";
    }

    // Funciones Get y Set de la Clase clLogin
    public function getStrCodigo() {
        return $this->strCodigo;
    }

    public function setStrCodigo($c) {
        $this->strCodigo = $c;
    }

    public function getStrDescripcion() {
        return $this->strDescripcion;
    }

    public function setStrDescripcion($d) {
        $this->strDescripcion = $d;
    }

    public function getStrListar($c, $p) {
        $query = new clQuery();

        //Nombre Procedimientos Almacenados
        $ProcedimientoAlmacenado = sprintf("CALL splistarparroquias('%s');", $c);
        $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
        $resultado = $query->getStrSqlSelect();
        $retval = "";
        if( count($resultado) > 0 ) {
            $retval .= '<option value="">Seleccione Parroquia</option>';
            foreach( $resultado as $rst):
                if ($rst["parcodigo"] == $p )
                    $retval .= '<option value="'. $rst["parcodigo"] .'" selected="selected">'. $rst["pardescripcion"] .'</option>';
                else
                    $retval .= '<option value="'. $rst["parcodigo"] .'">'. $rst["pardescripcion"] .'</option>';
            endforeach;
            $retval .= "</select>";
        }
        else {
            $retval .= '<option value="">Seleccione Parroquia</option>';
        }
        return $retval;
    }
}
?>