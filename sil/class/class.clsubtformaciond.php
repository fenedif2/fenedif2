<?php	
require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
include_once( CLASS_PATH . "class.clquery.php" );

class clSubtformaciond {
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

 public function getStrListar($p, $c) {
        $query = new clQuery();

        //Nombre Procedimientos Almacenados
        $ProcedimientoAlmacenado = sprintf("CALL splistarsubtformaciond('%s');", $p);
        $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
        $resultado = $query->getStrSqlSelect();
        $retval = "";
        
        if( count($resultado) > 0 ) {
//							$retval .= '<select name="lsCanton" id="lsCanton">';
            $retval .= '<option value="">Seleccione Descripción</option>';
            foreach( $resultado as $rst):
                if ($rst["tformaciond_id"] == $c )
                    $retval .= '<option value="'. $rst["tformaciond_id"] .'" selected="selected">'. $rst["tformaciond_descripcion"] .'</option>';
                else
                    $retval .= '<option value="'. $rst["tformaciond_id"] .'">'. $rst["tformaciond_descripcion"] .'</option>';
            endforeach;
//							$retval .= "</select>";
        }
        else {
//							$retval .= '<select name="lsCanton" id="lsCanton">';
            $retval .= '<option value="">Seleccione Descripción</option>';
//							$retval .= "</select>";							
        }

        return $retval;
    }
    


}
?>