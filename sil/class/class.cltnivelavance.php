<?php	
require_once( $_SERVER['DOCUMENT_ROOT'] . '/sil/config/config.configurar.php' );
include_once( CLASS_PATH . "class.clquery.php" );

class clTnivelavance {
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
        $ProcedimientoAlmacenado = sprintf("CALL splistartavancenivel('%s');", $c);
        $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
        $resultado = $query->getStrSqlSelect();
        $retval = "";
        if( count($resultado) > 0 ) {
            $retval .= '<option value="">Seleccione</option>';
            foreach( $resultado as $rst):
                if ($rst["nivelavance_id"] == $p )
                    $retval .= '<option value="'. $rst["nivelavance_id"] .'" selected="selected">'. $rst["nivelavance_nombre"] .'</option>';
                else
                    $retval .= '<option value="'. $rst["nivelavance_id"] .'">'. $rst["nivelavance_nombre"] .'</option>';
            endforeach;
            $retval .= "</select>";
        }
        else {
            $retval .= '<option value="">Seleccione</option>';
        }
        return $retval;
    }
}
?>