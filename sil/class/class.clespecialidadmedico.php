<?php	
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/sil/config/config.configurar.php' );
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/sil/config/config.validaciones.php' );
    include_once( CLASS_PATH . "class.clquery.php" );
    include_once( CLASS_PATH . "class.clpaginacion.php" );
    include_once( CLASS_PATH . "class.clmedico.php" );
    include_once( CLASS_PATH . "class.cltipomedico.php" );
    include_once( CLASS_PATH . "class.clestadomedico.php" );

    class clEspecialidadMedico
    {
        private $strCodigo;
        private $strCedula;
        private $strTipoMedico;
        private $strEstadoMedico;
        private $strDescripcionMedico;

        private $strEtiqueta;
        private $strNombreBoton;
        private $strValorBoton;
        private $strLectura;

        public function __construct()
        {
            $this->strCodigo = "";
            $this->strCedula = "";
            $this->strTipoMedico = "";
            $this->strEstadoMedico = "";
            $this->strDescripcionMedico = "";

            $this->strEtiqueta = "";
            $this->strNombreBoton = "";
            $this->strValorBoton = "";
            $this->strLectura = "";
        }
                
        public function getStrCodigo()
        {
            return $this->strCodigo;
        }

        public function setStrCodigo($c)
        {
            $this->strCodigo = $c;
        }

        public function getStrCedula()
        {
            return $this->strCedula;
        }

        public function setStrCedula($c)
        {
            $this->strCedula = $c;
        }

        public function getStrTipoMedico()
        {
            return $this->strTipoMedico;
        }

        public function setStrTipoMedico($tm)
        {
            $this->strTipoMedico = $tm;
        }

        public function getStrEstadoMedico()
        {
            return $this->strEstadoMedico;
        }

        public function setStrEstadoMedico($em)
        {
            $this->strEstadoMedico = $em;
        }

        public function getStrDescripcionMedico()
        {
            return $this->strDescripcionMedico;
        }

        public function setStrDescripcionMedico($dm)
        {
            $this->strDescripcionMedico = $dm;
        }

        public function getStrEtiqueta()
        {
            return $this->strEtiqueta;
        }

        public function setStrEtiqueta($e)
        {
            $this->strEtiqueta = $e;
        }

        public function getStrNombreBoton()
        {
            return $this->strNombreBoton;
        }

        public function setStrNombreBoton($nb)
        {
            $this->strNombreBoton = $nb;
        }

        public function getStrValorBoton()
        {
            return $this->strValorBoton;
        }

        public function setStrValorBoton($vb)
        {
            $this->strValorBoton = $vb;
        }

        public function getStrLectura()
        {
            return $this->strLectura;
        }

        public function setStrLectura($l)
        {
            $this->strLectura = $l;
        }

        public function getStrFormulario()
        {            
            $medico = new clMedico();
            $tipomedico = new clTipoMedico();
            $estadomedico = new clEstadoMedico();

            $imagen = "<img src='". IMAGENES_PATH ."/cargando.gif' width='20px' height='20px' />";
            $retval .= '
                        <script>
                            $(document).ready(function(){
                                $.metadata.setType( \'attr\', \'validate\' );
                                $(\'#frmespecialidadmedico\').validate({
                                        rules:{
                                                lsMedico: { required: true },
                                                lsTipoMedico: { required: true },
                                                lsEstadoMedico: { required: true},
                                                strDescripcionMedico: { required: true }
                                        },
                                        messages:{
                                                lsMedico: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
                                                strDescripcionMedico: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
                                                lsTipoMedico: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
                                                lsEstadoMedico: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"}
                                        }
                                });
                            });
                        </script>
                       ';

            $cedula = $medico->getStrListarMedicosEspecialidad($this->getStrCedula());

            if ($this->getStrCodigo() <> ""){
                $cedula = '<span class="bienvenida">' . $medico->getStrNombres().' '.$medico->getStrApellidos().'</span>';
                $cedula .= '<input class="textbox" id="lsMedico" name="lsMedico" type="hidden" value="'. $this->getStrCedula() .'" '. $this->getStrLectura() .' />';
            }
            $retval .= '
                        <form id="frmespecialidadmedico" action="'. ESPECIALIDADMEDICO_URL .'especialidadmedico.php" method="POST">
                       ';

            $Regresar = "regresar('". ESPECIALIDADMEDICO_URL . "especialidadmedico.php')";

            $retval .= '<fieldset class="fieldsetPequeno">';
            $retval .= '<legend class="etiquetaborde">
                            Especialidad M&eacute;dico <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Listado Especialidades M&eacute;dicos <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> '. $this->getStrEtiqueta() .'
                        </legend>
                       ';
            $retval .= '
                        <table width="100%" border="0" align="center" cellpadding="1" cellspacing="1">
                            <tr>
                                <td colspan="2" align="center" class="tablatitulo">
                                        '. $this->getStrEtiqueta() .'
                                </td>
                            </tr>

                            <tr class="formulariofila1">
                                <td align="right"><b>M&eacute;dico:&nbsp;</b></td>
                                <td align="left">
                                    <input class="textbox" id="strCodigo" name="strCodigo" type="hidden" value="'. $this->getStrCodigo() .'" />

                                        '. $cedula .'
                                </td>
                            </tr>

                            <tr class="formulariofila1">
                                <td align="right"><b>Especialidad:&nbsp;</b></td>
                                <td align="left">                                                                        
                                    <select name="lsTipoMedico" id="lsTipoMedico" class="combobox">
                                        '. $tipomedico->getStrListar($this->getStrTipoMedico()) .'
                                    </select>
                                </td>
                            </tr>

                            <tr class="formulariofila1">
                                <td  align="right"><b>Descripci&oacute;n:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strDescripcionMedico" name="strDescripcionMedico" type="text" maxlength="50" value="'. $this->getStrDescripcionMedico() .'" />
                                </td>
                            </tr>

                            <tr class="formulariofila1">
                                <td align="right"><b>Estado:&nbsp;</b></td>
                                <td align="left">                                    
                                        '. $estadomedico->getStrListar($this->getStrEstadoMedico()) .'
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2" class="formulariofila1" align="center">
                                    <input type="submit" class="boton" name="'. $this->getStrNombreBoton() .'" value="'. $this->getStrValorBoton() .'" />
                                    <input type="button" class="boton" value="Regresar" onclick="'. $Regresar .'" />
                                </td>
                            </tr>
                        </table>
                       ';
            $retval .= '</fieldset>';
            $retval .= '
                        </form>
                       ';            
            return $retval;
        }

        public function getStrIngresar() {
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spingresarespecialidadmedico('%s', '%d', '%s', '%s');", $this->getStrCedula(), $this->getStrTipoMedico(), $this->getStrEstadoMedico(), $this->getStrDescripcionMedico());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);

            if($query->getStrSqlInsertUpdateDelete()){
                                              //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Cedula = [ '.$this->getStrCedula().' ] Tipo Medico = [ '.$this->getStrTipoMedico().' ] Estado Medico = ['. $this->getStrEstadoMedico().' ] Descripcion Medico = [ '.$this->getStrDescripcionMedico().' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'G', 'tespecialidadmedico', $descripcion);
                $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
                $query->getStrSqlInsertUpdateDelete();

                $resultado = true;
            }

            return $resultado;
        }

        public function getStrActualizar() {
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spactualizarespecialidadmedico('%d', '%s', '%d', '%s', '%s');", $this->getStrCodigo(), $this->getStrCedula(), $this->getStrTipoMedico(), $this->getStrEstadoMedico(), $this->getStrDescripcionMedico());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);

            if($query->getStrSqlInsertUpdateDelete()) {
                                                              //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Cedula = [ '.$this->getStrCedula().' ] Tipo Medico = [ '.$this->getStrTipoMedico().' ] Estado Medico = ['. $this->getStrEstadoMedico().' ] Descripcion Medico = [ '.$this->getStrDescripcionMedico().' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'A', 'tespecialidadmedico', $descripcion);
                $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
                $query->getStrSqlInsertUpdateDelete();


                $resultado = true;
            }
           
            return $resultado;
        }


        public function getStrEliminar() {
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL speliminarespecialidadmedico('%d');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlInsertUpdateDelete();

            if($query->getStrSqlInsertUpdateDelete()) {
                                                              //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Cedula = [ '.$this->getStrCedula().' ] Tipo Medico = [ '.$this->getStrTipoMedico().' ] Estado Medico = ['. $this->getStrEstadoMedico().' ] Descripcion Medico = [ '.$this->getStrDescripcionMedico().' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'E', 'tespecialidadmedico', $descripcion);
                $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
                $query->getStrSqlInsertUpdateDelete();


                $resultado = true;
            }
            return $resultado;
        }

        public function getStrBuscar() {
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbespecialidadmedico('%d');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
                foreach( $resultado as $rst):
                    $this->setStrCodigo($rst['espmedcodigo']);
                    $this->setStrCedula($rst['medcedula']);
                    $this->setStrTipoMedico($rst['tipmedcodigo']);
                    $this->setStrEstadoMedico($rst['estmedcodigo']);
                    $this->setStrDescripcionMedico($rst['espmeddescripcion']);
                endforeach;

                $retval = true;
            }
           
            return $retval;
        }

        public function getStrListar()
        {
            $paginacion = new clPaginacion();
            $query = new clQuery();

            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL sptotalespecialidadesmedicos();");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultadototal = $query->getStrSqlSelect();

            foreach( $resultadototal as $rst):
                $paginacion->setStrTotalRegistros($rst["espmedtotal"]);
            endforeach;


            if(isset($_REQUEST['btnPagina']))
                $paginacion->setStrPaginaActual($_REQUEST['btnPagina']);
            else
                $paginacion->setStrPaginaActual(1);

            //Cuantos registros por p?gina
            $paginacion->setStrRegistrosPorPagina(REGISTROS);

            //Calcula la ultima pagina
            $paginacion->setStrPaginaUltima (ceil($paginacion->getStrTotalRegistros() / $paginacion->getStrRegistrosPorPagina()));

            //Si la p?gina actual es mayor que la ultima p?gina
            if($paginacion->getStrPaginaActual() > $paginacion->getStrPaginaUltima())
                $paginacion->setStrPaginaActual($paginacion->getStrPaginaUltima());

            //Si la paginaci?n actual es menor que 1
            if($paginacion->getStrPaginaActual() < 1)
                $paginacion->setStrPaginaActual(1);

            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL splistarespecialidadesmedicos('%d','%d');", ($paginacion->getStrPaginaActual() - 1) * $paginacion->getStrRegistrosPorPagina(), $paginacion->getStrRegistrosPorPagina());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            Especialidad M&eacute;dico <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Listado Especialidades M&eacute;dicos
                        </legend>
                       ';
            $retval .= '
                        <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                            <tr>
                                <td colspan="9" align="center"><div class="vtip" title="Ingreso <br> [Nueva Especialidad M&eacute;dico]">
                                    <a href="'. ESPECIALIDADMEDICO_URL .'especialidadmedico.php?btnNuevo=Nuevo">| <img src="'. IMAGENES_PATH .'/nuevapersona.png" title="" width="16px" height="16px"  border="0" /> Nueva Especialidad M&eacute;dico |</a>
                                </div><td>
                            </tr>
                            <tr class="tablatitulo">
                                <th colspan="9">LISTADO&nbsp;DE&nbsp;MEDICOS&nbsp;REGISTRADOS</th>
                            </tr>
                            <tr class="tablasubtitulo">
                                <th>...</th>                                                                
                                <th align="center">C&eacute;dula</th>
                                <th align="center">Apellidos</th>
                                <th align="center">Nombres</th>
                                <th align="center">Descripci&oacute;n</th>
                                <th align="center">Especialidad</th>
                                <th align="center">Estado</th>
                                <th align="center" colspan="2">Acciones</th>
                            </tr>
                        ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["medcedula"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["medapellidos"] .' </td>';
                    $retval .= 	'<td align="left">'. $rst["mednombres"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["espmeddescripcion"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["tipmeddescripcion"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["estmeddescripcion"] .'</td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Actualizar <br> [ C&eacute;dula = '.$rst["medcedula"] .' ]">';
                    $retval .=  '<a href="'. ESPECIALIDADMEDICO_URL .'especialidadmedico.php?btnActualizar=Actualizar&strCodigo='. $rst["espmedcodigo"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Eliminar <br> [ C&eacute;dula = '.$rst["medcedula"] .' ]">';
                    $retval .=  '<a href="'. ESPECIALIDADMEDICO_URL .'especialidadmedico.php?btnEliminar=Eliminar&strCodigo='. $rst["espmedcodigo"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';                    
                    $retval .= '</tr>';
                    $i = 1 - $i;
                endforeach;
            }

            $paginacion->setStrNombrePagina("espcialidadmedico/especialidadmedico.php");
            $retval .= '<tr><td colspan="9" align="center">'. $paginacion->getStrPaginacion() .'</td></tr>';
            $retval .= '</table>';
            $retval .= '</fieldset>';
            return $retval;
        }

        public function getStrListarMedicosEspecialidad($tipomedico, $especialidadmedico)
        {
            $query = new clQuery();

            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL splespecialidadesmedicos(%d);", $tipomedico);
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();
            $retval = "";
            if( count($resultado) > 0 ) {
//                $retval .= '<select name="lsMedico" id="lsMedico" class="combobox">';
                $retval .= '<option value="">Seleccione&nbsp;M&eacute;dico</option>';
                foreach( $resultado as $rst):
                    if($rst["espmedcodigo"] == $especialidadmedico ){
                        $retval .= '<option value="'. $rst["espmedcodigo"] .'" selected="selected">'. $rst["mednombres"] .' '. $rst["medapellidos"] .'</option>';
                    }
                    else{
                        $retval .= '<option value="'. $rst["espmedcodigo"] .'">'. $rst["mednombres"] .' '. $rst["medapellidos"] .'</option>';
                    }
                endforeach;
//                $retval .= '</select>';
            }else{
//                 $retval .= '<select name="lsEspecialidadMedico" id="lsEspecialidadMedico" class="combobox">';
                 $retval .= '<option value="">Seleccione&nbsp;M&eacute;dico</option>';
//                 $retval .= '</select>';
            }

          return $retval;
        }
    }
?>