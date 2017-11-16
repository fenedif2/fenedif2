<?php	
require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
include_once( CLASS_PATH . "class.clquery.php" );

class clPafectadas{
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
        $ProcedimientoAlmacenado = sprintf("CALL splistarpafectadas('%s');", $p);
        $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
        $resultado = $query->getStrSqlSelect();
        $retval = "";
        
        if( count($resultado) > 0 ) {
			//$retval .= '<select name="lsPafectadas" id="lsPafectadas">';
            $retval .= '<option value="">Selección</option>';
            foreach( $resultado as $rst):
                if ($rst["partesafectadas_id"] == $c )
                    $retval .= '<option value="'. $rst["partesafectadas_id"] .'" selected="selected">'. $rst["partesafectadas_nombre"] .'</option>';
                else
                    $retval .= '<option value="'. $rst["partesafectadas_id"] .'">'. $rst["partesafectadas_nombre"] .'</option>';
            endforeach;
//							$retval .= "</select>";
        }
        else {
//							$retval .= '<select name="lsCanton" id="lsCanton">';
            $retval .= '<option value="">Selección</option>';
//							$retval .= "</select>";							
        }

        return $retval;
    }
    


}
?>