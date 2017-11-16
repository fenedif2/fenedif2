<?php	
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.validaciones.php' );
include_once( CLASS_PATH . "class.clquery.php" );

class clBusqueda {
    private $strBuscar;
    private $strTipoBuscar;
    private $strTipoBusqueda;
    private $strEtiqueta;
    private $strNombreBoton;
    private $strValorBoton;

    public function __construct() {
        $this->strBuscar = "";
        $this->strTipoBusqueda = "";
        $this->strTipoBuscar = "";
        $this->strEtiqueta = "";
        $this->strNombreBoton = "";
        $this->strValorBoton = "";
    }

    // Funciones Get y Set de la Clase clpersona
    public function getStrBuscar() {
        return $this->strBuscar;
    }

    public function setStrBuscar($b) {
        $this->strBuscar = $b;
    }
    
    public function getStrTipoBuscar() {
        return $this->strTipoBuscar;
    }

    public function setStrTipoBuscar($tb) {
        $this->strTipoBuscar = $tb;
    }

    public function getStrTipoBusqueda() {
        return $this->strTipoBusqueda;
    }

    public function setStrTipoBusqueda($tb) {
        $this->strTipoBusqueda = $tb;
    }

    public function getStrEtiqueta() {
        return $this->strEtiqueta;
    }

    public function setStrEtiqueta($e) {
        $this->strEtiqueta = $e;
    }

    public function getStrNombreBoton() {
        return $this->strNombreBoton;
    }

    public function setStrNombreBoton($nb) {
        $this->strNombreBoton = $nb;
    }

    public function getStrValorBoton() {
        return $this->strValorBoton;
    }

    public function setStrValorBoton($vb) {
        $this->strValorBoton = $vb;
    }

    public function getStrFormulario() {        
        $retval .= '<br><br>';
        $retval .= '
                    <script>
                        $(document).ready(function(){
                            $.metadata.setType( \'attr\', \'validate\' );
                            $(\'#frmgeneral\').validate({
                                    rules:{
                                            strBuscar: { required: true},
                                            lsBuscar: { required: true},
                                            lsTipoBusqueda: { required: true}
                                    },
                                    messages:{
                                            strBuscar: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
                                            lsBuscar: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
                                            lsTipoBusqueda: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"}
                                    }
                            });

                            $("#lsTipoBusqueda").change(function () {
                                $("#lsTipoBusqueda option:selected").each(function () {
                                        var tipobuscar = $(this).val();                                        
                                        $.post( "'. BUSQUEDA_URL .'busqueda.php?btnbusqueda-acceso=tipobusqueda", {
                                                                                                                    strtipobusqueda: tipobuscar
                                                                                                                  },
                                        function(data){
                                                $("#lblBuscarPor").html(data);
                                                $("#lblEtiqueta").html("Informaci&oacute;n:");
                                                $("#strBuscar").val("");
                                    });
                                });
                             });

                            $("#lsBuscar").change(function () {
                                $("#lsBuscar option:selected").each(function () {
                                        var etiquetabuscar = $(this).val();
                                        var tipobuscar = $(\'#lsTipoBusqueda\').val();
                                        $.post( "'. BUSQUEDA_URL .'busqueda.php?btnbusqueda-acceso=buscarpor", {
                                                                                                                    strtipobusqueda: tipobuscar,
                                                                                                                    strbuscarpor: etiquetabuscar
                                                                                                               },
                                        function(data){
                                                $("#lblEtiqueta").html(data);
                                                $("#strBuscar").val("");
                                    });
                                });
                             });

                        });
                    </script>';
       
        $retval .= '<form id="frmgeneral" action="'. BUSQUEDA_URL .'busqueda.php?btnbusqueda-acceso='. $_SESSION["usuario"]["tipo"] .'" method="post">';
        
        $retval .= '<fieldset class="fieldsetPequeno">';
        $retval .= '<legend class="etiquetaborde">
                        B&uacute;squeda.
                    </legend>
                   ';

        $retval .= '
                    <table border="0" width="100%" align="center" cellpadding="1" cellspacing="1">
                            <tr>
                                <td colspan="2" align="center" class="tablatitulo">
                                    '. $this->getStrEtiqueta() .'
                                </td>
                            </tr>

                            <tr class="formulariofila1">
                                <td align="right">Tipo de &nbsp;B&uacute;queda:</td>
                                <td align="left">
                                    '. $this->getStrTipoBusqueda() .'
                                </td>
                            </tr>

                            <tr class="formulariofila1">
                                <td align="right">Buscar&nbsp;por:</td>
                                <td align="left">
                                    <div id="lblBuscarPor">
                                        '. $this->getStrTipoBuscar() .'
                                    </div>
                                </td>
                            </tr>

                            <tr class="formulariofila1">
                                <td align="right"><div id="lblEtiqueta">Informaci&oacute;n:</div></td>
                                <td align="left">
                                    <input class="combobox" id="strBuscar" name="strBuscar" type="text" maxlength="60" value="" />
                                    <input class="combobox" id="btnbusqueda-acceso" name="btnbusqueda-acceso" type="hidden" maxlength="10" value="Buscar" />
                                </td>
                            </tr>

                            <tr class="formulariofila1">
                                <td align="center" colspan="2">
                                    <input type="submit" class="boton" name="'. $this->getStrNombreBoton() .'" value="'. $this->getStrValorBoton() .'" />
                                </td>
                            </tr>
                    </table>';
        $retval .= '</fieldset>';
        $retval .= '</form>';
        return $retval;
    }
    
    public function getStrBusquedaInformacion(){
        $retval = "";
        switch ($this->getStrTipoBusqueda()){
            case "1":
                $retval = $this->getStrBuscarPdicapacidad();
                break;

            case "2":
                $retval = $this->getStrBuscarSustitutos();
                break;

            case "3":
                $retval = $this->getStrBuscarUsuario();
                break;
			case "4":
                $retval = $this->getStrBuscarInformepsicologico();
                break;
			case "5":
                $retval = $this->getStrBuscarPsicoterapeutico();
                break;
			case "6":
                $retval = $this->getStrBuscarPaterapeutica();
                break;	
           case "7":
                $retval = $this->getStrBuscarApsicoterapeutica();
                break;	
		 	case "8":
                $retval = $this->getStrBuscarVfamiliares();
                break;		
			case "9":
                $retval = $this->getStrBuscarEmpresa();
                break;	
			case "10":
                $retval = $this->getStrBuscarCformativo();
                break;	
			case "11":
                $retval = $this->getStrBuscarEmpleo();
                break;	
			case "12":
                $retval = $this->getStrBuscarEmprendimiento();
                break;	
			case "13":
                $retval = $this->getStrBuscarAnegocio();
                break;						
        }
        return $retval;
    }

public function getStrBuscarAnegocio()
    {
    	$query = new clQuery();
            $ProcedimientoAlmacenado = "";
            //Nombre Procedimientos Almacenados

           switch ($this->getStrTipoBuscar())
            {
            	case "1":
                    $ProcedimientoAlmacenado = sprintf("CALL getStrBuscarAnegocionombre('%s');", $this->getStrBuscar());
                    break;	
            	
               
            }

            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $totalregistros = count($resultado);
            if(  $totalregistros > 0 ){
                $i = 0;
                $j = 0;

                foreach( $resultado as $rst):
                    $j = $j + 1;

                     $retval .= '<fieldset class="fieldsetGrande">';
                     $retval .= '<legend class="etiquetaborde">
                                    B&uacute;squedas Ampliación Negocio <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Resultado Datos Ampliación Negocio ( '. $j .' de '. $totalregistros .' )
                                </legend>
                               ';

                     $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                     if ($j == 1)
                         $retval .= '<tr>
                                        <td colspan="4" align="center">
                                            <a href="'. BUSQUEDA_URL .'busqueda.php?btnbusqueda-acceso=a">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> Regresar B&uacute;squedas |</a>
                                        </td>
                                    </tr>
                                    ';
     				$retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["tanegocio_id"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["apellido_paterno"] .' '. $rst["primer_nombre"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["tnegocio"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["tsectorp_descripcion"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["fecha_ingreso"] .'</td>';
                    $retval .= 	'</div></td>';
                  	$retval .= 	'<td align="center"><div class="vtip" title="Actualizar <br> [ codigo = '.$rst["tanegocio_id"] .' ]">';
                    $retval .=  '<a href="'. TAMPLIACION_URL .'tampliacion.php?btnActualizar=Actualizar&strCodigo='. $rst["tanegocio_id"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    if($_SESSION["usuario"]["tipo"]==2 || $_SESSION["usuario"]["tipo"]==1 )
							{
                    $retval .= 	'<td align="center"><div class="vtip" title="Eliminar <br> [ codigo = '.$rst["tanegocio_id"] .' ]">';
                    $retval .=  '<a href="'. TAMPLIACION_URL .'tampliacion.php?btnEliminar=Eliminar&strCodigo='. $rst["tanegocio_id"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    		}
                    $retval .= 	'<td align="center"><div class="vtip" title="Detalle Ampliación de Negocio <br> [ codigo = '.$rst["tanegocio_id"] .' ]">';
                    $retval .=  '<a href="'. TAMPLIACION_URL .'tampliacion.php?btnDetalle=Detalle&strCodigo='. $rst["tanegocio_id"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                   
                    $i = 1 - $i;

                    $retval .= '</table>';
                    $retval .= '</fieldset>';
                    $retval .= '<br>';
                endforeach;
            }else{
                 $retval .= '<fieldset class="fieldsetGrande">';
                $retval .= '<legend class="etiquetaborde">
                                B&uacute;squedas Ampliación Negocio <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Resultado Datos 
                            </legend>
                           ';

                $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                $retval .= '<tr>
                                <td colspan="2" align="center">
                                    <a href="'. BUSQUEDA_URL .'busqueda.php?btnbusqueda-acceso=a">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> Regresar B&uacute;squedas |</a>
                                </td>
                            </tr>
                            ';
                $retval .= '<tr><td colspan="2" align="center"><img src="'. IMAGENES_PATH .'/error.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: <br> Datos no encontrados. No existe informaci&oacute;n</span></tr></td>';
                $retval .= '</table>';
                $retval .= '</fieldset>';
            }

            return $retval;
   }	
public function getStrBuscarEmprendimiento()
    {
    	$query = new clQuery();
            $ProcedimientoAlmacenado = "";
            //Nombre Procedimientos Almacenados

           switch ($this->getStrTipoBuscar())
            {
            	case "1":
                    $ProcedimientoAlmacenado = sprintf("CALL getStrBuscarEmprendimientonombre('%s');", $this->getStrBuscar());
                    break;	
            	
               
            }

            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $totalregistros = count($resultado);
            if(  $totalregistros > 0 ){
                $i = 0;
                $j = 0;

                foreach( $resultado as $rst):
                    $j = $j + 1;

                     $retval .= '<fieldset class="fieldsetGrande">';
                     $retval .= '<legend class="etiquetaborde">
                                    B&uacute;squedas Emprendimiento<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Resultado Datos Emprendimiento ( '. $j .' de '. $totalregistros .' )
                                </legend>
                               ';

                     $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                     if ($j == 1)
                         $retval .= '<tr>
                                        <td colspan="4" align="center">
                                            <a href="'. BUSQUEDA_URL .'busqueda.php?btnbusqueda-acceso=a">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> Regresar B&uacute;squedas |</a>
                                        </td>
                                    </tr>
                                    ';
     				$retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["temprendimiento_id"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["apellido_paterno"] .' '. $rst["primer_nombre"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["tnegocio"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["tsectorp_descripcion"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["fecha_ingreso"] .'</td>';
                    $retval .= 	'</div></td>';
                  	$retval .= 	'<td align="center"><div class="vtip" title="Actualizar <br> [ codigo = '.$rst["temprendimiento_id"] .' ]">';
                    $retval .=  '<a href="'. TEMPRENDIMIENTO_URL .'temprendimiento.php?btnActualizar=Actualizar&strCodigo='. $rst["temprendimiento_id"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    if($_SESSION["usuario"]["tipo"]==2 || $_SESSION["usuario"]["tipo"]==1 )
							{
                    $retval .= 	'<td align="center"><div class="vtip" title="Eliminar <br> [ codigo = '.$rst["temprendimiento_id"] .' ]">';
                    $retval .=  '<a href="'. TEMPRENDIMIENTO_URL .'temprendimiento.php?btnEliminar=Eliminar&strCodigo='. $rst["temprendimiento_id"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
							}
                    $retval .= 	'<td align="center"><div class="vtip" title="Detalle Emprendimiento <br> [ codigo = '.$rst["temprendimiento_id"] .' ]">';
                    $retval .=  '<a href="'. TEMPRENDIMIENTO_URL .'temprendimiento.php?btnDetalle=Detalle&strCodigo='. $rst["temprendimiento_id"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                   
                    $i = 1 - $i;

                    $retval .= '</table>';
                    $retval .= '</fieldset>';
                    $retval .= '<br>';
                endforeach;
            }else{
                 $retval .= '<fieldset class="fieldsetGrande">';
                $retval .= '<legend class="etiquetaborde">
                                B&uacute;squedas Emprendimiento<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Resultado Datos 
                            </legend>
                           ';

                $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                $retval .= '<tr>
                                <td colspan="2" align="center">
                                    <a href="'. BUSQUEDA_URL .'busqueda.php?btnbusqueda-acceso=a">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> Regresar B&uacute;squedas |</a>
                                </td>
                            </tr>
                            ';
                $retval .= '<tr><td colspan="2" align="center"><img src="'. IMAGENES_PATH .'/error.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: <br> Datos no encontrados. No existe informaci&oacute;n</span></tr></td>';
                $retval .= '</table>';
                $retval .= '</fieldset>';
            }

            return $retval;
   }	

public function getStrBuscarEmpleo()
    {
    	$query = new clQuery();
            $ProcedimientoAlmacenado = "";
            //Nombre Procedimientos Almacenados

           switch ($this->getStrTipoBuscar())
            {
            	case "1":
                    $ProcedimientoAlmacenado = sprintf("CALL getStrBuscarEmpleonombre('%s');", $this->getStrBuscar());
                    break;	
            	
               
            }

            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $totalregistros = count($resultado);
            if(  $totalregistros > 0 ){
                $i = 0;
                $j = 0;

                foreach( $resultado as $rst):
                    $j = $j + 1;

                     $retval .= '<fieldset class="fieldsetGrande">';
                     $retval .= '<legend class="etiquetaborde">
                                    B&uacute;squedas Empleo <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Resultado Datos Empleo ( '. $j .' de '. $totalregistros .' )
                                </legend>
                               ';

                     $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                     if ($j == 1)
                         $retval .= '<tr>
                                        <td colspan="4" align="center">
                                            <a href="'. BUSQUEDA_URL .'busqueda.php?btnbusqueda-acceso=a">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> Regresar B&uacute;squedas |</a>
                                        </td>
                                    </tr>
                                    ';
     				 $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["id_empresa"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["nombre"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["num_empleados"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["num_empleados_dis"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["sitio"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["fecha_ingreso"] .'</td>';
                   	$retval .= 	'<td align="center"><div class="vtip" title="Puestos <br> [ codigo = '.$rst["id_empresa"] .' ]">';
					$retval .=  '<a href="'. TPUESTO_URL.'tpuesto.php?btnNuevo=Nuevo&strCodigo='. $rst["id_empresa"] .'"><img src="'. IMAGENES_PATH .'/formativa.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    
					$retval .= 	'<td align="center"><div class="vtip" title="Seguimiento<br> [ codigo = '.$rst["id_empresa"] .' ]">';
					$retval .=  '<a href="'. TSEGUIMIENTOEMP_URL.'tseguimientoemp.php?btnNuevo=Nuevo&strCodigo='. $rst["id_empresa"] .'"><img src="'. IMAGENES_PATH .'/redactar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    
					$retval .= 	'<td align="center"><div class="vtip" title="Actualizar <br> [ codigo = '.$rst["id_empresa"] .' ]">';
                    $retval .=  '<a href="'. EMPRESAS_URL.'empresas.php?btnActualizar=Actualizar&strCodigo='. $rst["id_empresa"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					if($_SESSION["usuario"]["tipo"]==2 || $_SESSION["usuario"]["tipo"]==1 )
							{
                    $retval .= 	'<td align="center"><div class="vtip" title="Eliminar <br> [ codigo = '.$rst["id_empresa"] .' ]">';
                    $retval .=  '<a href="'.EMPRESAS_URL.'empresas.php?btnEliminar=Eliminar&strCodigo='. $rst["id_empresa"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
							}
                    $retval .= 	'<td align="center"><div class="vtip" title="Detalle Centro Formativo <br> [ codigo = '.$rst["id_empresa"] .' ]">';
                    $retval .=  '<a href="'.EMPRESAS_URL.'empresas.php?btnDetalle=Detalle&strCodigo='. $rst["id_empresa"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                   
                    $i = 1 - $i;

                    $retval .= '</table>';
                    $retval .= '</fieldset>';
                    $retval .= '<br>';
                endforeach;
            }else{
                 $retval .= '<fieldset class="fieldsetGrande">';
                $retval .= '<legend class="etiquetaborde">
                                B&uacute;squedas Empleo<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Resultado Datos 
                            </legend>
                           ';

                $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                $retval .= '<tr>
                                <td colspan="2" align="center">
                                    <a href="'. BUSQUEDA_URL .'busqueda.php?btnbusqueda-acceso=a">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> Regresar B&uacute;squedas |</a>
                                </td>
                            </tr>
                            ';
                $retval .= '<tr><td colspan="2" align="center"><img src="'. IMAGENES_PATH .'/error.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: <br> Datos no encontrados. No existe informaci&oacute;n</span></tr></td>';
                $retval .= '</table>';
                $retval .= '</fieldset>';
            }

            return $retval;
   }	

public function getStrBuscarCformativo()
    {
    	$query = new clQuery();
            $ProcedimientoAlmacenado = "";
            //Nombre Procedimientos Almacenados

           switch ($this->getStrTipoBuscar())
            {
            	case "1":
                    $ProcedimientoAlmacenado = sprintf("CALL getStrBuscarCformativoresponsable('%s');", $this->getStrBuscar());
                    break;	
            	case "2":
                    $ProcedimientoAlmacenado = sprintf("CALL getStrBuscarCformativonombre('%s');", $this->getStrBuscar());
                    break;	
               
            }

            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $totalregistros = count($resultado);
            if(  $totalregistros > 0 ){
                $i = 0;
                $j = 0;

                foreach( $resultado as $rst):
                    $j = $j + 1;

                     $retval .= '<fieldset class="fieldsetGrande">';
                     $retval .= '<legend class="etiquetaborde">
                                    B&uacute;squedas Centro Formativo <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Resultado Datos Centro Formativo ( '. $j .' de '. $totalregistros .' )
                                </legend>
                               ';

                     $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                     if ($j == 1)
                         $retval .= '<tr>
                                        <td colspan="4" align="center">
                                            <a href="'. BUSQUEDA_URL .'busqueda.php?btnbusqueda-acceso=a">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> Regresar B&uacute;squedas |</a>
                                        </td>
                                    </tr>
                                    ';
     				$retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["id_centro_formativo"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["nombre"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["responsable"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["email"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["estcfdescripcion"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["fecha_ingreso"] .'</td>';
                   	$retval .= 	'<td align="center"><div class="vtip" title="Forma de Acceso <br> [ codigo = '.$rst["id_centro_formativo"] .' ]">';
					$retval .=  '<a href="'. FACCESOCF_URL.'faccesocf.php?btnNuevo=Nuevo&strCodigo='. $rst["id_centro_formativo"] .'"><img src="'. IMAGENES_PATH .'/acceso.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Accesibilidad <br> [ codigo = '.$rst["id_centro_formativo"] .' ]">';
					$retval .=  '<a href="'. ACCESIBILIDADCF_URL.'accesibilidadcf.php?btnNuevo=Nuevo&strCodigo='. $rst["id_centro_formativo"] .'"><img src="'. IMAGENES_PATH .'/accesibilidad.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Perfil<br> [ codigo = '.$rst["id_centro_formativo"] .' ]">';
					$retval .=  '<a href="'. PERFILCF_URL.'perfilcf.php?btnNuevo=Nuevo&strCodigo='. $rst["id_centro_formativo"] .'"><img src="'. IMAGENES_PATH .'/perfil.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Area Formativa<br> [ codigo = '.$rst["id_centro_formativo"] .' ]">';
					$retval .=  '<a href="'. AFORMATIVACF_URL.'aformativacf.php?btnNuevo=Nuevo&strCodigo='. $rst["id_centro_formativo"] .'"><img src="'. IMAGENES_PATH .'/formativa.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Tipo Formación<br> [ codigo = '.$rst["id_centro_formativo"] .' ]">';
					$retval .=  '<a href="'. TFORMACIONCF_URL.'tformacioncf.php?btnNuevo=Nuevo&strCodigo='. $rst["id_centro_formativo"] .'"><img src="'. IMAGENES_PATH .'/rptstocksucursal.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					
					$retval .= 	'<td align="center"><div class="vtip" title="Cursos<br> [ codigo = '.$rst["id_centro_formativo"] .' ]">';
					$retval .=  '<a href="'. TCURSOCF_URL.'tcursocf.php?btnNuevo=Nuevo&strCodigo='. $rst["id_centro_formativo"] .'"><img src="'. IMAGENES_PATH .'/cursos.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					
					$retval .= 	'<td align="center"><div class="vtip" title="Seguimiento<br> [ codigo = '.$rst["id_centro_formativo"] .' ]">';
					$retval .=  '<a href="'. TSEGUIMIENTOCF_URL.'tseguimientocf.php?btnNuevo=Nuevo&strCodigo='. $rst["id_centro_formativo"] .'"><img src="'. IMAGENES_PATH .'/redactar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    
					$retval .= 	'<td align="center"><div class="vtip" title="Actualizar <br> [ codigo = '.$rst["id_centro_formativo"] .' ]">';
                    $retval .=  '<a href="'. CFORMATIVO_URL .'cformativo.php?btnActualizar=Actualizar&strCodigo='. $rst["id_centro_formativo"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					if($_SESSION["usuario"]["tipo"]==2 || $_SESSION["usuario"]["tipo"]==1 )
							{
                    $retval .= 	'<td align="center"><div class="vtip" title="Eliminar <br> [ codigo = '.$rst["id_centro_formativo"] .' ]">';
                    $retval .=  '<a href="'. CFORMATIVO_URL .'cformativo.php?btnEliminar=Eliminar&strCodigo='. $rst["id_centro_formativo"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
							}
                    $retval .= 	'<td align="center"><div class="vtip" title="Detalle Centro Formativo <br> [ codigo = '.$rst["id_centro_formativo"] .' ]">';
                    $retval .=  '<a href="'. CFORMATIVO_URL .'cformativo.php?btnDetalle=Detalle&strCodigo='. $rst["id_centro_formativo"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                   
                    $i = 1 - $i;

                    $retval .= '</table>';
                    $retval .= '</fieldset>';
                    $retval .= '<br>';
                endforeach;
            }else{
                 $retval .= '<fieldset class="fieldsetGrande">';
                $retval .= '<legend class="etiquetaborde">
                                B&uacute;squedas Centro Formativo<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Resultado Datos 
                            </legend>
                           ';

                $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                $retval .= '<tr>
                                <td colspan="2" align="center">
                                    <a href="'. BUSQUEDA_URL .'busqueda.php?btnbusqueda-acceso=a">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> Regresar B&uacute;squedas |</a>
                                </td>
                            </tr>
                            ';
                $retval .= '<tr><td colspan="2" align="center"><img src="'. IMAGENES_PATH .'/error.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: <br> Datos no encontrados. No existe informaci&oacute;n</span></tr></td>';
                $retval .= '</table>';
                $retval .= '</fieldset>';
            }

            return $retval;
   }	
public function getStrBuscarEmpresa()
    {
    	$query = new clQuery();
            $ProcedimientoAlmacenado = "";
            //Nombre Procedimientos Almacenados

            switch ($this->getStrTipoBuscar())
            {
            	case "1":
                    $ProcedimientoAlmacenado = sprintf("CALL getStrBuscarEmpresaid('%s');", $this->getStrBuscar());
                    break;
               case "2":
                    $ProcedimientoAlmacenado = sprintf("CALL getStrBuscarEmpresanombre('%s');", $this->getStrBuscar());
                    break;
				case "3":
                    $ProcedimientoAlmacenado = sprintf("CALL getStrBuscarEmpresaruc('%s');", $this->getStrBuscar());
                    break;	
            }

            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $totalregistros = count($resultado);
            if(  $totalregistros > 0 ){
                $i = 0;
                $j = 0;

                foreach( $resultado as $rst):
                    $j = $j + 1;

                     $retval .= '<fieldset class="fieldsetGrande">';
                     $retval .= '<legend class="etiquetaborde">
                                    B&uacute;squedas Empresas <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Resultado Datos Empresas ( '. $j .' de '. $totalregistros .' )
                                </legend>
                               ';

                     $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                     if ($j == 1)
                         $retval .= '<tr>
                                        <td colspan="4" align="center">
                                            <a href="'. BUSQUEDA_URL .'busqueda.php?btnbusqueda-acceso=a">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> Regresar B&uacute;squedas |</a>
                                        </td>
                                    </tr>
                                    ';
     				$retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["id_empresa"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["nombre"] .'</td>';
                   	$retval .= 	'<td align="center"><div class="vtip" title="Dirección Empresa <br> [ codigo = '.$rst["id_empresa"] .' ]">';
					 $retval .=  '<a href="'. TDIREMPRESA_URL.'tdirempresa.php?btnNuevo=Nuevo&strCodigo='. $rst["id_empresa"] .'"><img src="'. IMAGENES_PATH .'/accesibilidad.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Contacto Empresa <br> [ codigo = '.$rst["id_empresa"] .' ]">';
					 $retval .=  '<a href="'. TCONTACTOEMP_URL.'tcontactoemp.php?btnNuevo=Nuevo&strCodigo='. $rst["id_empresa"] .'"><img src="'. IMAGENES_PATH .'/accesibilidad.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Analisis del Puesto <br> [ codigo = '.$rst["id_empresa"] .' ]">';
					 $retval .=  '<a href="'. APUESTO_URL.'apuesto.php?btnNuevo=Nuevo&strCodigo='. $rst["id_empresa"] .'"><img src="'. IMAGENES_PATH .'/accesibilidad.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Formación I<br> [ codigo = '.$rst["id_empresa"] .' ]">';
					$retval .=  '<a href="'. TFORMACIONREMP_URL.'tformacionremp.php?btnNuevo=Nuevo&strCodigo='. $rst["id_empresa"] .'"><img src="'. IMAGENES_PATH .'/perfil.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Datos Laborales<br> [ codigo = '.$rst["id_empresa"] .' ]">';
					$retval .=  '<a href="'. TREQUISITOSEMP_URL.'trequisitosemp.php?btnNuevo=Nuevo&strCodigo='. $rst["id_empresa"] .'"><img src="'. IMAGENES_PATH .'/formativa.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                  	$retval .= 	'<td align="center"><div class="vtip" title="Orientacion<br> [ codigo = '.$rst["id_empresa"] .' ]">';
					$retval .=  '<a href="'. THORARIOEMP_URL.'thorarioemp.php?btnNuevo=Nuevo&strCodigo='. $rst["id_empresa"] .'"><img src="'. IMAGENES_PATH .'/rptstocksucursal.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Competencias..<br> [ codigo = '.$rst["id_empresa"] .' ]">';
					$retval .=  '<a href="'. DFUNCIONES_URL.'dfunciones.php?btnNuevo=Nuevo&strCodigo='. $rst["id_empresa"] .'"><img src="'. IMAGENES_PATH .'/cursos.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					/*$retval .= 	'<td align="center"><div class="vtip" title="Empleo y Formación<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. EMPLEOF_URL.'empleof.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/redactar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                   	$retval .= 	'<td align="center"><div class="vtip" title="Curriculom<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. CURRICULUM_URL.'empleof.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/pdf.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Test<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. TEST_URL.'test.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/contactanos.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';*/
                    
					$retval .= 	'<td align="center"><div class="vtip" title="Actualizar <br> [ codigo = '.$rst["id_empresa"] .' ]">';
                    $retval .=  '<a href="'. EMPRESAS_URL .'empresas.php?btnActualizar=Actualizar&strCodigo='. $rst["id_empresa"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    if($_SESSION["usuario"]["tipo"]==2 || $_SESSION["usuario"]["tipo"]==1 )
							{
                    $retval .= 	'<td align="center"><div class="vtip" title="Eliminar <br> [ codigo = '.$rst["id_empresa"] .' ]">';
                    $retval .=  '<a href="'. EMPRESAS_URL .'empresas.php?btnEliminar=Eliminar&strCodigo='. $rst["id_empresa"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
							}
                    $retval .= 	'<td align="center"><div class="vtip" title="Detalle Empresa <br> [ codigo = '.$rst["id_empresa"] .' ]">';
                    $retval .=  '<a href="'. EMPRESAS_URL .'empresas.php?btnDetalle=Detalle&strCodigo='. $rst["id_empresa"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                    $i = 1 - $i;

                    $retval .= '</table>';
                    $retval .= '</fieldset>';
                    $retval .= '<br>';
                endforeach;
            }else{
                 $retval .= '<fieldset class="fieldsetGrande">';
                $retval .= '<legend class="etiquetaborde">
                                B&uacute;squedas Empresas<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Resultado Datos Empresa
                            </legend>
                           ';

                $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                $retval .= '<tr>
                                <td colspan="2" align="center">
                                    <a href="'. BUSQUEDA_URL .'busqueda.php?btnbusqueda-acceso=a">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> Regresar B&uacute;squedas |</a>
                                </td>
                            </tr>
                            ';
                $retval .= '<tr><td colspan="2" align="center"><img src="'. IMAGENES_PATH .'/error.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: <br> Datos no encontrados. No existe informaci&oacute;n</span></tr></td>';
                $retval .= '</table>';
                $retval .= '</fieldset>';
            }

            return $retval;
   }			
public function getStrBuscarVfamiliares()
    {
    	$query = new clQuery();
            $ProcedimientoAlmacenado = "";
            //Nombre Procedimientos Almacenados

            switch ($this->getStrTipoBuscar()){
               case "1":
                    $ProcedimientoAlmacenado = sprintf("CALL getStrBuscarVfamiliaresid('%s');", $this->getStrBuscar());
                    break;
            }

            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $totalregistros = count($resultado);
            if(  $totalregistros > 0 ){
                $i = 0;
                $j = 0;

                foreach( $resultado as $rst):
                    $j = $j + 1;

                     $retval .= '<fieldset class="fieldsetGrande">';
                     $retval .= '<legend class="etiquetaborde">
                                    B&uacute;squedas Visitas Familiares<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Resultado Datos Visitas Familiares ( '. $j .' de '. $totalregistros .' )
                                </legend>
                               ';

                     $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                     if ($j == 1)
                         $retval .= '<tr>
                                        <td colspan="4" align="center">
                                            <a href="'. BUSQUEDA_URL .'busqueda.php?btnbusqueda-acceso=a">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> Regresar B&uacute;squedas |</a>
                                        </td>
                                    </tr>
                                    ';
     				 $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["tvfamiliar_id"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["napellidos"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["visitaa"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["visitab"] .'</td>';
					$retval .= 	'<td align="center">'. $rst["visitac"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["visitamf"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["llegada"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["salida"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["tiempov"] .'</td>'; 
					$retval .= 	'<td align="left">'. $rst["fechan"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["objetivov"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["visitanh"] .'</td>';
					      
					$retval .= 	'<td align="center"><div class="vtip" title="Actualizar <br> [ codigo = '.$rst["tvfamiliar_id"] .' ]">';
                    $retval .=  '<a href="'. VFAMILIARES_URL .'vfamiliares.php?btnActualizar=Actualizar&strCodigo='. $rst["tvfamiliar_id"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    if($_SESSION["usuario"]["tipo"]==2 || $_SESSION["usuario"]["tipo"]==1 )
							{
                    $retval .= 	'<td align="center"><div class="vtip" title="Eliminar <br> [ codigo = '.$rst["tvfamiliar_id"] .' ]">';
                    $retval .=  '<a href="'. VFAMILIARES_URL .'vfamiliares.php?btnEliminar=Eliminar&strCodigo='. $rst["tvfamiliar_id"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
							}
                    $retval .= 	'<td align="center"><div class="vtip" title="Detalle Visitas Familiares <br> [ codigo = '.$rst["tvfamiliar_id"] .' ]">';
                    $retval .=  '<a href="'. VFAMILIARES_URL .'vfamiliares.php?btnDetalle=Detalle&strCodigo='. $rst["tvfamiliar_id"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                   
                    $i = 1 - $i;

                    $retval .= '</table>';
                    $retval .= '</fieldset>';
                    $retval .= '<br>';
                endforeach;
            }else{
                 $retval .= '<fieldset class="fieldsetGrande">';
                $retval .= '<legend class="etiquetaborde">
                                B&uacute;squedas Visitas Familiares<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Resultado Datos Familiares
                            </legend>
                           ';

                $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                $retval .= '<tr>
                                <td colspan="2" align="center">
                                    <a href="'. BUSQUEDA_URL .'busqueda.php?btnbusqueda-acceso=a">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> Regresar B&uacute;squedas |</a>
                                </td>
                            </tr>
                            ';
                $retval .= '<tr><td colspan="2" align="center"><img src="'. IMAGENES_PATH .'/error.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: <br> Datos no encontrados. No existe informaci&oacute;n</span></tr></td>';
                $retval .= '</table>';
                $retval .= '</fieldset>';
            }

            return $retval;
   }			
	
public function getStrBuscarApsicoterapeutica()
    {
    	$query = new clQuery();
            $ProcedimientoAlmacenado = "";
            //Nombre Procedimientos Almacenados

            switch ($this->getStrTipoBuscar()){
               case "1":
                    $ProcedimientoAlmacenado = sprintf("CALL getStrBuscarApsicoterapeutica('%s');", $this->getStrBuscar());
                    break;
            }

            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $totalregistros = count($resultado);
            if(  $totalregistros > 0 ){
                $i = 0;
                $j = 0;

                foreach( $resultado as $rst):
                    $j = $j + 1;

                     $retval .= '<fieldset class="fieldsetGrande">';
                     $retval .= '<legend class="etiquetaborde">
                                    B&uacute;squedas Anteción Psicoterapeutica<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Resultado Datos Anteción Psicoterapeutica ( '. $j .' de '. $totalregistros .' )
                                </legend>
                               ';

                     $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                     if ($j == 1)
                         $retval .= '<tr>
                                        <td colspan="4" align="center">
                                            <a href="'. BUSQUEDA_URL .'busqueda.php?btnbusqueda-acceso=a">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> Regresar B&uacute;squedas |</a>
                                        </td>
                                    </tr>
                                    ';
     				$retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["psicoterapeutico_id"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["fechai"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["responsable"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["cargo"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["fechae"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["levaluacion"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["solicitadop"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["napellidos"] .'</td>';
					
					$retval .= 	'<td align="center"><div class="vtip" title="Actualizar <br> [ codigo = '.$rst["psicoterapeutico_id"] .' ]">';
                    $retval .=  '<a href="'. TERAPIA_URL .'terapia.php?btnActualizar=Actualizar&strCodigo='. $rst["psicoterapeutico_id"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    if($_SESSION["usuario"]["tipo"]==2 || $_SESSION["usuario"]["tipo"]==1 )
							{
                    $retval .= 	'<td align="center"><div class="vtip" title="Eliminar <br> [ codigo = '.$rst["psicoterapeutico_id"] .' ]">';
                    $retval .=  '<a href="'. TERAPIA_URL .'terapia.php?btnEliminar=Eliminar&strCodigo='. $rst["psicoterapeutico_id"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    }
                    $retval .= 	'<td align="center"><div class="vtip" title="Detalle Psicoterapéutica <br> [ codigo = '.$rst["psicoterapeutico_id"] .' ]">';
                    $retval .=  '<a href="'. TERAPIA_URL .'terapia.php?btnDetalle=Detalle&strCodigo='. $rst["psicoterapeutico_id"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';

                   
                    $i = 1 - $i;

                    $retval .= '</table>';
                    $retval .= '</fieldset>';
                    $retval .= '<br>';
                endforeach;
            }else{
                 $retval .= '<fieldset class="fieldsetGrande">';
                $retval .= '<legend class="etiquetaborde">
                                B&uacute;squedas Anteción Psicoterapeutica <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Resultado Datos Anteción Psicoterapeutica
                            </legend>
                           ';

                $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                $retval .= '<tr>
                                <td colspan="2" align="center">
                                    <a href="'. BUSQUEDA_URL .'busqueda.php?btnbusqueda-acceso=a">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> Regresar B&uacute;squedas |</a>
                                </td>
                            </tr>
                            ';
                $retval .= '<tr><td colspan="2" align="center"><img src="'. IMAGENES_PATH .'/error.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: <br> Datos no encontrados. No existe informaci&oacute;n</span></tr></td>';
                $retval .= '</table>';
                $retval .= '</fieldset>';
            }

            return $retval;
   }		
public function getStrBuscarPaterapeutica()
    {
    	$query = new clQuery();
            $ProcedimientoAlmacenado = "";
            //Nombre Procedimientos Almacenados

            switch ($this->getStrTipoBuscar()){
               case "1":
                    $ProcedimientoAlmacenado = sprintf("CALL spbdetalleipaterapeuticaid('%s');", $this->getStrBuscar());
                    break;
            }

            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $totalregistros = count($resultado);
            if(  $totalregistros > 0 ){
                $i = 0;
                $j = 0;

                foreach( $resultado as $rst):
                    $j = $j + 1;

                     $retval .= '<fieldset class="fieldsetGrande">';
                     $retval .= '<legend class="etiquetaborde">
                                    B&uacute;squedas Plan de Atención Terapéutica<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Resultado Datos Plan de Atención Terapéutica ( '. $j .' de '. $totalregistros .' )
                                </legend>
                               ';

                     $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                     if ($j == 1)
                         $retval .= '<tr>
                                        <td colspan="4" align="center">
                                            <a href="'. BUSQUEDA_URL .'busqueda.php?btnbusqueda-acceso=a">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> Regresar B&uacute;squedas |</a>
                                        </td>
                                    </tr>
                                    ';
     				$retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["aterapeutica_id"] .'</td>';
                    $retval .= 	'<td align="center">'. $rst["oterapeuticoa"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["plana"] .'</td>';
                    $retval .= 	'<td align="center">'. $rst["oterapeuticob"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["planb"] .'</td>';
					$retval .= 	'<td align="center">'. $rst["oterapeuticoc"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["planc"] .'</td>';
                   	
					$retval .= 	'<td align="center"><div class="vtip" title="Actualizar <br> [ codigo = '.$rst["aterapeutica_id"] .' ]">';
                    $retval .=  '<a href="'. ATERAPEUTICA_URL.'aterapeutica.php?btnActualizar=Actualizar&strCodigo='. $rst["aterapeutica_id"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					if($_SESSION["usuario"]["tipo"]==2 || $_SESSION["usuario"]["tipo"]==1 )
							{
                    $retval .= 	'<td align="center"><div class="vtip" title="Eliminar <br> [ codigo = '.$rst["aterapeutica_id"] .' ]">';
                    $retval .=  '<a href="'. ATERAPEUTICA_URL .'aterapeutica.php?btnEliminar=Eliminar&strCodigo='. $rst["aterapeutica_id"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
							}
                    $retval .= 	'<td align="center"><div class="vtip" title="Detalle Plan de Atención Terapeútica <br> [ codigo = '.$rst["aterapeutica_id"] .' ]">';
                    $retval .=  '<a href="'. ATERAPEUTICA_URL .'aterapeutica.php?btnDetalle=Detalle&strCodigo='. $rst["aterapeutica_id"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';

                   
                    $i = 1 - $i;

                    $retval .= '</table>';
                    $retval .= '</fieldset>';
                    $retval .= '<br>';
                endforeach;
            }else{
                 $retval .= '<fieldset class="fieldsetGrande">';
                $retval .= '<legend class="etiquetaborde">
                                B&uacute;squedas Plan de Atención Terapéutica<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Resultado Datos Plan de Atención Terapéutica
                            </legend>
                           ';

                $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                $retval .= '<tr>
                                <td colspan="2" align="center">
                                    <a href="'. BUSQUEDA_URL .'busqueda.php?btnbusqueda-acceso=a">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> Regresar B&uacute;squedas |</a>
                                </td>
                            </tr>
                            ';
                $retval .= '<tr><td colspan="2" align="center"><img src="'. IMAGENES_PATH .'/error.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: <br> Datos no encontrados. No existe informaci&oacute;n</span></tr></td>';
                $retval .= '</table>';
                $retval .= '</fieldset>';
            }

            return $retval;
   }	
public function getStrBuscarPsicoterapeutico()
    {
    	$query = new clQuery();
            $ProcedimientoAlmacenado = "";
            //Nombre Procedimientos Almacenados

            switch ($this->getStrTipoBuscar()){
               case "1":
                    $ProcedimientoAlmacenado = sprintf("CALL spbdetalleipsicoterapeuticoid('%s');", $this->getStrBuscar());
                    break;
            }

            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $totalregistros = count($resultado);
            if(  $totalregistros > 0 ){
                $i = 0;
                $j = 0;

                foreach( $resultado as $rst):
                    $j = $j + 1;

                     $retval .= '<fieldset class="fieldsetGrande">';
                     $retval .= '<legend class="etiquetaborde">
                                    B&uacute;squedas Proceso Psicoterapéutico<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Resultado Datos Proceso Psicoterapéutico ( '. $j .' de '. $totalregistros .' )
                                </legend>
                               ';

                     $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                     if ($j == 1)
                         $retval .= '<tr>
                                        <td colspan="4" align="center">
                                            <a href="'. BUSQUEDA_URL .'busqueda.php?btnbusqueda-acceso=a">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> Regresar B&uacute;squedas |</a>
                                        </td>
                                    </tr>
                                    ';
                   $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["psicoterapeutico_id"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["tratamientop"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["tratamientoi"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["tratamientor"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["cual"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["individual"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["pareja"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["familiar"] .'</td>';
                   	
					$retval .= 	'<td align="center"><div class="vtip" title="Actualizar <br> [ codigo = '.$rst["psicoterapeutico_id"] .' ]">';
                    $retval .=  '<a href="'. PTERAPEUTICO_URL .'pterapeutico.php?btnActualizar=Actualizar&strCodigo='. $rst["psicoterapeutico_id"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    if($_SESSION["usuario"]["tipo"]==2 || $_SESSION["usuario"]["tipo"]==1 )
							{
                    $retval .= 	'<td align="center"><div class="vtip" title="Eliminar <br> [ codigo = '.$rst["psicoterapeutico_id"] .' ]">';
                    $retval .=  '<a href="'. PTERAPEUTICO_URL .'pterapeutico.php?btnEliminar=Eliminar&strCodigo='. $rst["psicoterapeutico_id"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
							}
                    $retval .= 	'<td align="center"><div class="vtip" title="Detalle Proceso Psicoterapeútico <br> [ codigo = '.$rst["psicoterapeutico_id"] .' ]">';
                    $retval .=  '<a href="'. PTERAPEUTICO_URL .'pterapeutico.php?btnDetalle=Detalle&strCodigo='. $rst["psicoterapeutico_id"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';

                   
                    $i = 1 - $i;

                    $retval .= '</table>';
                    $retval .= '</fieldset>';
                    $retval .= '<br>';
                endforeach;
            }else{
                 $retval .= '<fieldset class="fieldsetGrande">';
                $retval .= '<legend class="etiquetaborde">
                                B&uacute;squedas Proceso Psicoterapéutico <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Resultado Datos Proceso Psicoterapéutico
                            </legend>
                           ';

                $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                $retval .= '<tr>
                                <td colspan="2" align="center">
                                    <a href="'. BUSQUEDA_URL .'busqueda.php?btnbusqueda-acceso=a">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> Regresar B&uacute;squedas |</a>
                                </td>
                            </tr>
                            ';
                $retval .= '<tr><td colspan="2" align="center"><img src="'. IMAGENES_PATH .'/error.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: <br> Datos no encontrados. No existe informaci&oacute;n</span></tr></td>';
                $retval .= '</table>';
                $retval .= '</fieldset>';
            }

            return $retval;
    }	


	public function getStrBuscarInformepsicologico()
    {
    	$query = new clQuery();
            $ProcedimientoAlmacenado = "";
            //Nombre Procedimientos Almacenados

            switch ($this->getStrTipoBuscar()){
               case "1":
                    $ProcedimientoAlmacenado = sprintf("CALL spbdetalleipsicologicoid('%s');", $this->getStrBuscar());
                    break;
            }

            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $totalregistros = count($resultado);
            if(  $totalregistros > 0 ){
                $i = 0;
                $j = 0;

                foreach( $resultado as $rst):
                    $j = $j + 1;

                     $retval .= '<fieldset class="fieldsetGrande">';
                     $retval .= '<legend class="etiquetaborde">
                                    B&uacute;squedas Informe Psicológico <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Resultado Datos Informe Psicológico( '. $j .' de '. $totalregistros .' )
                                </legend>
                               ';

                     $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                     if ($j == 1)
                         $retval .= '<tr>
                                        <td colspan="4" align="center">
                                            <a href="'. BUSQUEDA_URL .'busqueda.php?btnbusqueda-acceso=a">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> Regresar B&uacute;squedas |</a>
                                        </td>
                                    </tr>
                                    ';
                     $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["apsicologicas_id"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["fechai"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["responsable"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["cargo"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["fechae"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["levaluacion"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["solicitado"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["nombres"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["fechan"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["pc"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["lnacimiento"] .'</td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Actualizar <br> [ codigo = '.$rst["apsicologicas_id"] .' ]">';
                    $retval .=  '<a href="'. PSICOLOGO_URL .'psicologo.php?btnActualizar=Actualizar&strCodigo='. $rst["apsicologicas_id"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					if($_SESSION["usuario"]["tipo"]==2 || $_SESSION["usuario"]["tipo"]==1 )
							{
                    $retval .= 	'<td align="center"><div class="vtip" title="Eliminar <br> [ codigo = '.$rst["apsicologicas_id"] .' ]">';
                    $retval .=  '<a href="'. PSICOLOGO_URL .'psicologo.php?btnEliminar=Eliminar&strCodigo='. $rst["apsicologicas_id"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    		}
                    $retval .= 	'<td align="center"><div class="vtip" title="Detalle Atención Psicológica <br> [ codigo = '.$rst["apsicologicas_id"] .' ]">';
                    $retval .=  '<a href="'. PSICOLOGO_URL .'psicologo.php?btnDetalle=Detalle&strCodigo='. $rst["apsicologicas_id"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';

                   
                    $i = 1 - $i;

                    $retval .= '</table>';
                    $retval .= '</fieldset>';
                    $retval .= '<br>';
                endforeach;
            }else{
                 $retval .= '<fieldset class="fieldsetGrande">';
                $retval .= '<legend class="etiquetaborde">
                                B&uacute;squedas Informe Psicológico<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Resultado Datos Informe Psicológico
                            </legend>
                           ';

                $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                $retval .= '<tr>
                                <td colspan="2" align="center">
                                    <a href="'. BUSQUEDA_URL .'busqueda.php?btnbusqueda-acceso=a">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> Regresar B&uacute;squedas |</a>
                                </td>
                            </tr>
                            ';
                $retval .= '<tr><td colspan="2" align="center"><img src="'. IMAGENES_PATH .'/error.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: <br> Datos no encontrados. No existe informaci&oacute;n</span></tr></td>';
                $retval .= '</table>';
                $retval .= '</fieldset>';
            }

            return $retval;
    	
            
    }

    public function getStrBuscarPdicapacidad()
    {
    	$query = new clQuery();
            $ProcedimientoAlmacenado = "";
            //Nombre Procedimientos Almacenados

            switch ($this->getStrTipoBuscar())
            {
                case "1":
                    $ProcedimientoAlmacenado = sprintf("CALL spbdetallepdiscapacidadcedula('%s');", $this->getStrBuscar());
                    break;
                case "2":
                    $ProcedimientoAlmacenado = sprintf("CALL spbdetallepdiscapacidadapellido('%s');", $this->getStrBuscar());
                    break;
                case "3":
                    $ProcedimientoAlmacenado = sprintf("CALL spbdetallepdiscapacidadid('%s');", $this->getStrBuscar());
                    break;
            }

            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $totalregistros = count($resultado);
            if(  $totalregistros > 0 ){
                $i = 0;
                $j = 0;

                foreach( $resultado as $rst):
                    $j = $j + 1;

                     $retval .= '<fieldset class="fieldsetGrande">';
                     $retval .= '<legend class="etiquetaborde">
                                    B&uacute;squedas Persona con Discapacidad <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Resultado Datos Persona con Discapacidad( '. $j .' de '. $totalregistros .' )
                                </legend>
                               ';

                     $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                     if ($j == 1)
                         $retval .= '<tr>
                                        <td colspan="4" align="center">
                                            <a href="'. BUSQUEDA_URL .'busqueda.php?btnbusqueda-acceso=a">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> Regresar B&uacute;squedas |</a>
                                        </td>
                                    </tr>
                                    ';
                    $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["id_usuario"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["identificacion"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["apellido_paterno"] .' '. $rst["apellido_materno"] .' '. $rst["primer_nombre"] .' '. $rst["segundo_nombre"] .'</td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Discapacidad <br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. AYUDASTS_URL.'ayudasts.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/accesibilidad.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Discapacidad <br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. DISCAPACIDADS_URL.'discapacidads.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/accesibilidad.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Pariente Discapacidad <br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. PERSONADS_URL.'personads.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/accesibilidad.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Disponibilidad Laboral<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. DISPONIBILIDADL_URL.'disponibilidadl.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/acceso.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Interés Laboral<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'.INTERESLABORAL_URL.'intereslaboral.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/acceso.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Formación I<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. FORMACIONA_URL.'formaciona.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/perfil.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Formación II<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. FORMACIONII_URL.'formacionii.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/perfil.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Datos Laborales<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. DATOSL_URL.'datosl.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/formativa.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'</div></td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Orientacion<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. ORIENTACION_URL.'orientacion.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/rptstocksucursal.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Competencias<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. COMPETENCIAS_URL.'competencias.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/cursos.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Empleo y Formación<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. EMPLEOF_URL.'empleof.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/redactar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    /*$retval .= 	'<td align="center"><div class="vtip" title="Curriculom<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. CURRICULUM_URL.'empleof.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/pdf.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Test<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. TEST_URL.'test.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/contactanos.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';*/
                    
					$retval .= 	'<td align="center"><div class="vtip" title="Actualizar <br> [ codigo = '.$rst["id_usuario"] .' ]">';
                    $retval .=  '<a href="'. PDISCAPACIDAD_URL .'pdiscapacidad.php?btnActualizar=Actualizar&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    if($_SESSION["usuario"]["tipo"]==1 || $_SESSION["usuario"]["tipo"]==1 )
							{
                    $retval .= 	'<td align="center"><div class="vtip" title="Eliminar <br> [ codigo = '.$rst["id_usuario"] .' ]">';
                    $retval .=  '<a href="'. PDISCAPACIDAD_URL .'pdiscapacidad.php?btnEliminar=Eliminar&strCodigo='. $rst["id_usuario"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
							}
                    $retval .= 	'<td align="center"><div class="vtip" title="Detalle Persona con Discapacidad <br> [ codigo = '.$rst["id_usuario"] .' ]">';
                    $retval .=  '<a href="'. PDISCAPACIDAD_URL .'pdiscapacidad.php?btnDetalle=Detalle&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                    $i = 1 - $i;

                    $retval .= '</table>';
                    $retval .= '</fieldset>';
                    $retval .= '<br>';
                endforeach;
            }else{
                 $retval .= '<fieldset class="fieldsetGrande">';
                $retval .= '<legend class="etiquetaborde">
                                B&uacute;squedas Persona con Discapacidad<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Resultado Datos Persona con Discapacidad
                            </legend>
                           ';

                $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                $retval .= '<tr>
                                <td colspan="2" align="center">
                                    <a href="'. BUSQUEDA_URL .'busqueda.php?btnbusqueda-acceso=a">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> Regresar B&uacute;squedas |</a>
                                </td>
                            </tr>
                            ';
                $retval .= '<tr><td colspan="2" align="center"><img src="'. IMAGENES_PATH .'/error.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: <br> Datos no encontrados. No existe informaci&oacute;n</span></tr></td>';
                $retval .= '</table>';
                $retval .= '</fieldset>';
            }

            return $retval;
    	
            
    }
        
    public function getStrBuscarSustitutos()
        {
        	$query = new clQuery();
            $ProcedimientoAlmacenado = "";
            //Nombre Procedimientos Almacenados

            switch ($this->getStrTipoBuscar()){
                case "1":
                    $ProcedimientoAlmacenado = sprintf("CALL spbdetallesustitutoscedula('%s');", $this->getStrBuscar());
                    break;
                case "2":
                    $ProcedimientoAlmacenado = sprintf("CALL spbdetallesustitutosapellido('%s');", $this->getStrBuscar());
                    break;
                case "3":
                    $ProcedimientoAlmacenado = sprintf("CALL spbdetallesustitutosid('%s');", $this->getStrBuscar());
                    break;
            }

            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $totalregistros = count($resultado);
            if(  $totalregistros > 0 ){
                $i = 0;
                $j = 0;

                foreach( $resultado as $rst):
                    $j = $j + 1;

                     $retval .= '<fieldset class="fieldsetGrande">';
                     $retval .= '<legend class="etiquetaborde">
                                    B&uacute;squedas Sustitutos<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Resultado Datos Sustitutos ( '. $j .' de '. $totalregistros .' )
                                </legend>
                               ';

                     $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                     if ($j == 1)
                         $retval .= '<tr>
                                        <td colspan="4" align="center">
                                            <a href="'. BUSQUEDA_URL .'busqueda.php?btnbusqueda-acceso=a">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> Regresar B&uacute;squedas |</a>
                                        </td>
                                    </tr>
                                    ';
                    $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["id_usuario"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["identificacion"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["apellido_paterno"] .' '. $rst["apellido_materno"] .' '. $rst["primer_nombre"] .' '. $rst["segundo_nombre"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["email"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["fecha_ingreso"] .'</td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Disponibilidad Laboral<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. DISPONIBILIDADLS_URL.'disponibilidadls.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/acceso.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Interés Laboral<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. INTERESLABORALS_URL.'intereslaborals.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/acceso.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Formación I<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. FORMACIONA_URL.'formaciona.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/perfil.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Formación II<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. FORMACIONII_URL.'formacionii.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/perfil.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Datos Laborales<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. DATOSLS_URL.'datosls.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/formativa.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'</div></td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Orientacion<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. ORIENTACION_URL.'orientacion.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/rptstocksucursal.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Competencias<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. COMPETENCIAS_URL.'competencias.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/cursos.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Empleo y Formación<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. EMPLEOF_URL.'empleof.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/redactar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    /*$retval .= 	'<td align="center"><div class="vtip" title="Curriculom<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. CURRICULUM_URL.'empleof.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/pdf.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Test<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. TEST_URL.'test.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/contactanos.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';*/
                    
					$retval .= 	'<td align="center"><div class="vtip" title="Actualizar <br> [ codigo = '.$rst["id_usuario"] .' ]">';
                    $retval .=  '<a href="'. SUSTITUTOS_URL .'sustitutos.php?btnActualizar=Actualizar&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    if($_SESSION["usuario"]["tipo"]==2 || $_SESSION["usuario"]["tipo"]==1 )
							{
                    $retval .= 	'<td align="center"><div class="vtip" title="Eliminar <br> [ codigo = '.$rst["id_usuario"] .' ]">';
                    $retval .=  '<a href="'. SUSTITUTOS_URL .'sustitutos.php?btnEliminar=Eliminar&strCodigo='. $rst["id_usuario"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    		}
                    $retval .= 	'<td align="center"><div class="vtip" title="Detalle Ciudadano <br> [ codigo = '.$rst["id_usuario"] .' ]">';
                    $retval .=  '<a href="'. SUSTITUTOS_URL .'sustitutos.php?btnDetalle=Detalle&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                    $i = 1 - $i;

                    $retval .= '</table>';
                    $retval .= '</fieldset>';
                    $retval .= '<br>';
                endforeach;
            }else{
                 $retval .= '<fieldset class="fieldsetGrande">';
                $retval .= '<legend class="etiquetaborde">
                                B&uacute;squedas Sustitutos<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Resultado Datos Sustitutos
                            </legend>
                           ';

                $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                $retval .= '<tr>
                                <td colspan="2" align="center">
                                    <a href="'. BUSQUEDA_URL .'busqueda.php?btnbusqueda-acceso=a">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> Regresar B&uacute;squedas |</a>
                                </td>
                            </tr>
                            ';
                $retval .= '<tr><td colspan="2" align="center"><img src="'. IMAGENES_PATH .'/error.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: <br> Datos no encontrados. No existe informaci&oacute;n</span></tr></td>';
                $retval .= '</table>';
                $retval .= '</fieldset>';
            }

            return $retval;
    	
           
        }

        public function getStrBuscarUsuario()
        {
            $query = new clQuery();
            $ProcedimientoAlmacenado = "";
            //Nombre Procedimientos Almacenados

            switch ($this->getStrTipoBuscar()){
                case "1":
                    $ProcedimientoAlmacenado = sprintf("CALL spbdetalleusuariocuenta('%s');", $this->getStrBuscar());
                    break;
                case "2":
                    $ProcedimientoAlmacenado = sprintf("CALL spbdetalleninosnombres('%s');", $this->getStrBuscar());
                    break;
                case "3":
                    $ProcedimientoAlmacenado = sprintf("CALL spbdetalleusuarioclave('%s');", $this->getStrBuscar());
                    break;
            }

            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $totalregistros = count($resultado);
            if(  $totalregistros > 0 ){
                $i = 0;
                $j = 0;

                foreach( $resultado as $rst):
                    $j = $j + 1;

                     $retval .= '<fieldset class="fieldsetGrande">';
                     $retval .= '<legend class="etiquetaborde">
                                    B&uacute;squedas Usuarios <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Resultado Datos Usuario ( '. $j .' de '. $totalregistros .' )
                                </legend>
                               ';

                     $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                     if ($j == 1)
                         $retval .= '<tr>
                                        <td colspan="4" align="center">
                                            <a href="'. BUSQUEDA_URL .'busqueda.php?btnbusqueda-acceso=a">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> Regresar B&uacute;squedas |</a>
                                        </td>
                                    </tr>
                                    ';
                    $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["id_usuario"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["identificacion"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["apellido_paterno"] .' '. $rst["apellido_materno"] .' '. $rst["primer_nombre"] .' '. $rst["segundo_nombre"] .'</td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Ayudas Técnicas <br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. AYUDAST_URL.'ayudast.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/accesibilidad.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Discapacidad <br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. DISCAPACIDAD_URL.'discapacidad.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/accesibilidad.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                   $retval .= 	'<td align="center"><div class="vtip" title="Parientes Discapacidad <br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'.PERSONAD_URL.'personad.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/accesibilidad.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Formación I<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. FORMACIONA_URL.'formaciona.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/rptmedico.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Formación II<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. FORMACIONII_URL.'formacionii.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/rptpaciente.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					/*$retval .= 	'<td align="center"><div class="vtip" title="Datos Laborales<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. DATOSL_URL.'datosl.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/formativa.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';*/
                    $retval .= 	'</div></td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Orientacion<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. ORIENTACION_URL.'orientacion.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/rptstocksucursal.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Competencias<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. COMPETENCIAS_URL.'competencias.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/cursos.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Empleo y Formación<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. EMPLEOF_URL.'empleof.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/redactar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    /*$retval .= 	'<td align="center"><div class="vtip" title="Curriculom<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. CURRICULUM_URL.'empleof.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/pdf.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Test<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. TEST_URL.'test.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/contactanos.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';*/
                    
					$retval .= 	'<td align="center"><div class="vtip" title="Actualizar <br> [ codigo = '.$rst["id_usuario"] .' ]">';
                    $retval .=  '<a href="'. NINOS_URL .'ninos.php?btnActualizar=Actualizar&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					if($_SESSION["usuario"]["tipo"]==2 || $_SESSION["usuario"]["tipo"]==1 )
							{
                    $retval .= 	'<td align="center"><div class="vtip" title="Eliminar <br> [ codigo = '.$rst["id_usuario"] .' ]">';
                    $retval .=  '<a href="'. NINOS_URL .'ninos.php?btnEliminar=Eliminar&strCodigo='. $rst["id_usuario"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					        
							}
                    $retval .= 	'<td align="center"><div class="vtip" title="Detalle Ciudadano <br> [ codigo = '.$rst["id_usuario"] .' ]">';
                    $retval .=  '<a href="'. NINOS_URL .'ninos.php?btnDetalle=Detalle&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                    $i = 1 - $i;

                    $retval .= '</table>';
                    $retval .= '</fieldset>';
                    $retval .= '<br>';
                endforeach;
            }else{
                 $retval .= '<fieldset class="fieldsetGrande">';
                $retval .= '<legend class="etiquetaborde">
                                B&uacute;squedas M&eacute;dico <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Resultado Datos 
                            </legend>
                           ';

                $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                $retval .= '<tr>
                                <td colspan="2" align="center">
                                    <a href="'. BUSQUEDA_URL .'busqueda.php?btnbusqueda-acceso=a">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> Regresar B&uacute;squedas |</a>
                                </td>
                            </tr>
                            ';
                $retval .= '<tr><td colspan="2" align="center"><img src="'. IMAGENES_PATH .'/error.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada: <br> Datos no encontrados. No existe informaci&oacute;n</span></tr></td>';
                $retval .= '</table>';
                $retval .= '</fieldset>';
            }

            return $retval;
        }
}
?>