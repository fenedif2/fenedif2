<?php	
require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
include_once( CLASS_PATH . "class.clquery.php" );

class clcentroformativo {
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

    public function getStrListar($p) {
    	$query = new clQuery();
        //Nombre Procedimientos Almacenados
        $cf=$_SESSION["usuario"]["suc"];
        $ProcedimientoAlmacenado = sprintf("CALL splistarcformativo('%s');","$cf");
        $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
        $resultado = $query->getStrSqlSelect();
        $retval = "";

        
        if( count($resultado) > 0 ) {
            $retval .= '<option value="">Seleccione&nbsp;Centro Formativo</option>';
            foreach( $resultado as $rst):
                if ($rst["id_centro_formativo"] == $p )
                    $retval .= '<option value="'. $rst["id_centro_formativo"] .'" selected="selected">'.$rst["nombre"] .'</option>';
                else
                    $retval .= '<option value="'. $rst["id_centro_formativo"] .'">'.$rst["nombre"] .'</option>';
            endforeach;
        }
        else
            $retval .= '<option value="">Seleccione&nbsp;Centro Formativo</option>';

        return $retval;
    }
}
?>