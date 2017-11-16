<?php	
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/unidadmedica/config/config.configurar.php' );
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/unidadmedica/config/config.validaciones.php' );
    include_once( CLASS_PATH . "class.clquery.php" );
    include_once( CLASS_PATH . "class.clpaginacion.php" );    
    include_once( CLASS_PATH . "class.cltipousuario.php" );
    include_once( CLASS_PATH . "class.clestadousuario.php" );

    class clAdministracion {
        private $strCuenta;
        private $strClave;
        private $strNombres;
        private $strApellidos;
        private $strTipo;
        private $strEstado;

        private $strEtiqueta;
        private $strNombreBoton;
        private $strValorBoton;
        private $strLectura;
        private $strDesabilitar;

        public function __construct() {
            $this->strCuenta = "";
            $this->strClave = "";
            $this->strNombres = "";
            $this->strApellidos = "";
            $this->strTipo = "";
            $this->strEstado = "";

            $this->strEtiqueta = "";
            $this->strNombreBoton = "";
            $this->strValorBoton = "";
            $this->strLectura = "";
            $this->strDesabilitar = "";
        }

        // Funciones Get y Set de la Clase clLogin
        public function getStrCuenta()
        {
            return $this->strCuenta;
        }

        public function setStrCuenta($c)
        {
            $this->strCuenta = $c;
        }

        public function getStrClave()
        {
            return $this->strClave;
        }

        public function setStrClave($c)
        {
            $this->strClave = $c;
        }

        public function getStrNombres()
        {
            return $this->strNombres;
        }

        public function setStrNombres($n)
        {
            $this->strNombres = $n;
        }

        public function getStrApellidos()
        {
            return $this->strApellidos;
        }

        public function setStrApellidos($a)
        {
            $this->strApellidos = $a;
        }

        public function getStrTipo()
        {
            return $this->strTipo;
        }

        public function setStrTipo($t)
        {
            $this->strTipo = $t;
        }

        public function getStrEstado()
        {
            return $this->strEstado;
        }

        public function setStrEstado($e)
        {
            $this->strEstado = $e;
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

        public function getStrDesabilitar()
        {
            return $this->strDesabilitar;
        }

        public function setStrDesabilitar($d)
        {
            $this->strDesabilitar = $d;
        }

        public function getStrFormulario()
        {            
            $tipo = new clTipoUsuario();
            $estado = new clEstadoUsuario();
            //$imagen = "<img src='". IMAGENES_PATH ."/cargando.gif' width='20px' height='20px' />";
            $retval .= '
                        <script>
                            $(document).ready(function(){
                                $.metadata.setType( \'attr\', \'validate\' );
                                $(\'#frmusuario\').validate({
                                        rules:{
                                                strCuenta: { required: true},
                                                strClave: { required: true },
                                                strNombres: { required: true},
                                                strApellidos: { required: true},
                                                lsTipoUsuario: { required: true },
                                                lsEstadoUsuario: { required: true }
                                        },
                                        messages:{
                                                strCuenta: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                                strClave: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                                strNombres: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                                strApellidos: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                                lsTipoUsuario: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                                lsEstadoUsuario: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"}
                                        }
                                });
                            });
                        </script>
                       ';

            $retval .= '
                        <form id="frmusuario" action="'. ADMINISTRACION_URL .'administracion.php" method="POST">
                       ';

            $Regresar = "regresar('". ADMINISTRACION_URL . "administracion.php')";
            $retval .= '<fieldset class="fieldsetPequeno">';
            $retval .= '<legend class="etiquetaborde">
                            Administraci&oacute;n <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Listado Usuarios <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> '. $this->getStrEtiqueta() .'
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
                                <td  align="right"><b>Nombres</b></td>
                                <td align="left">
                                        <input class="textbox" id="strNombres" name="strNombres" type="text" maxlength="50" value="'. $this->getStrNombres() .'" />
                                </td>
                            </tr>

                            <tr class="formulariofila1">
                                <td  align="right"><b>Apellidos</b></td>
                                <td align="left">
                                        <input class="textbox" id="strApellidos" name="strApellidos" type="text" maxlength="50" value="'. $this->getStrApellidos() .'" />
                                </td>
                            </tr>

                            <tr class="formulariofila1">
                                <td  align="right"><b>Usuario:&nbsp;</b></td>
                                <td align="left">
                                        <input class="textbox" id="strCuenta" name="strCuenta" type="text" maxlength="10" value="'. $this->getStrCuenta() .'" '. $this->getStrLectura() .' />
                                </td>
                            </tr>

                            <tr class="formulariofila1">
                                <td  align="right"><b>Clave:&nbsp;</b></td>
                                <td align="left">
                                        <input class="textbox" id="strClave" name="strClave" type="password" maxlength="10" value="'. $this->getStrClave() .'" '. $this->getStrLectura() .' />
                                </td>
                            </tr>

                            <tr class="formulariofila1">
                                <td  align="right"><b>Tipo:&nbsp;</b></td>
                                <td align="left">'. $tipo->getStrListar($this->getStrTipo()) .'</td>
                            </tr>

                            <tr class="formulariofila1">
                                <td  align="right"><b>Estado:&nbsp;</b></td>
                                <td align="left">'. $estado->getStrListar($this->getStrEstado()) .'</td>
                            </tr>

                            <tr class="formulariofila1">
                                <td colspan="2" align="center">
                                    <input type="submit" class="boton" name="'. $this->getStrNombreBoton() .'" value="'. $this->getStrValorBoton() .'" />
                                    <input type="button" class="boton" value="Regresar" onclick="'. $Regresar .'" />
                                </td>
                            </tr>
                        </table>
                       ';

            $retval .= '</form>';
            $retval .= '</fieldset>';
            return $retval;
        }

        public function getStrIngresar() {
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spingresarusuario('%s', '%s', '%s', '%s', '%s', '%s');", $this->getStrCuenta(), $this->getStrClave(), $this->getStrTipo(), $this->getStrEstado(), $this->getStrNombres(), $this->getStrApellidos());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);

            if($query->getStrSqlInsertUpdateDelete()){
                $resultado = true;
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Usuario = [ '.$this->getStrCuenta().' ] Clave = [ '.$this->getStrClave().' ] Tipo Usuario = [ '.$this->getStrTipo().' ] Estado Usuario = [ '.$this->getStrEstado().' ] Nombres = [ '.$this->getStrNombres().' ] Apellidos =  [ '.$this->getStrApellidos().' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'G', 'tusuario', $descripcion);
                $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
                $query->getStrSqlInsertUpdateDelete();

            }

            return $resultado;
        }

        public function getStrActualizar() {
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spactualizarusuario('%s', '%s', '%s', '%s', '%s', '%s');", $this->getStrCuenta(), $this->getStrClave(), $this->getStrTipo(), $this->getStrEstado(), $this->getStrNombres(), $this->getStrApellidos());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);

            if($query->getStrSqlInsertUpdateDelete()) {
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Usuario = [ '.$this->getStrCuenta().' ] Clave = [ '.$this->getStrClave().' ] Tipo Usuario = [ '.$this->getStrTipo().' ] Estado Usuario = [ '.$this->getStrEstado().' ] Nombres = [ '.$this->getStrNombres().' ] Apellidos =  [ '.$this->getStrApellidos().' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'A', 'tusuario', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL speliminarusuario('%s');", $this->getStrCuenta());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlInsertUpdateDelete();

            if($query->getStrSqlInsertUpdateDelete()) {
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Usuario = [ '.$this->getStrCuenta().' ] Clave = [ '.$this->getStrClave().' ] Tipo Usuario = [ '.$this->getStrTipo().' ] Estado Usuario = [ '.$this->getStrEstado().' ] Nombres = [ '.$this->getStrNombres().' ] Apellidos =  [ '.$this->getStrApellidos().' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'E', 'tusuario', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL spbusuario('%s');", $this->getStrCuenta());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
                foreach( $resultado as $rst):
                    $this->setStrCuenta($rst['usucuenta']);
                    $this->setStrClave($rst['usuclave']);
                    $this->setStrNombres($rst['usunombres']);
                    $this->setStrApellidos($rst['usuapellidos']);
                    $this->setStrTipo($rst['tipusucodigo']);
                    $this->setStrEstado($rst['estusucodigo']);
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
            $ProcedimientoAlmacenado = sprintf("CALL sptotalusuarios();");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultadototal = $query->getStrSqlSelect();

            foreach( $resultadototal as $rst):
                $paginacion->setStrTotalRegistros($rst["usutotal"]);
            endforeach;


            if(isset($_REQUEST['btnPagina']))
                $paginacion->setStrPaginaActual($_REQUEST['btnPagina']);
            else
                $paginacion->setStrPaginaActual(1);

            //Cuantos registros por p�gina
            $paginacion->setStrRegistrosPorPagina(REGISTROS);

            //Calcula la ultima pagina
            $paginacion->setStrPaginaUltima (ceil($paginacion->getStrTotalRegistros() / $paginacion->getStrRegistrosPorPagina()));

            //Si la p�gina actual es mayor que la ultima p�gina
            if($paginacion->getStrPaginaActual() > $paginacion->getStrPaginaUltima())
                $paginacion->setStrPaginaActual($paginacion->getStrPaginaUltima());

            //Si la paginaci�n actual es menor que 1
            if($paginacion->getStrPaginaActual() < 1)
                $paginacion->setStrPaginaActual(1);

            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL splistarusuarios('%d','%d');", ($paginacion->getStrPaginaActual() - 1) * $paginacion->getStrRegistrosPorPagina(), $paginacion->getStrRegistrosPorPagina());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();
            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            Administraci&oacute;n <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Listado Usuarios
                        </legend>
                       ';

            $retval .= '
                        <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                            <tr>
                                <td colspan="9" align="center"><div class="vtip" title="Ingreso <br>[ Nuevo Usuario ]">
                                    <a href="'. ADMINISTRACION_URL .'administracion.php?btnNuevo=Nuevo">| <img src="'. IMAGENES_PATH .'/nuevousuario.png" title="" width="16px" height="16px"  border="0" /> Nuevo Usuario |</a>
                                </div><td>
                            </tr>
                            <tr class="tablatitulo">
                                <th colspan="9">LISTADO&nbsp;DE&nbsp;USUARIOS&nbsp;REGISTRADOS</th>
                            </tr>
                            <tr class="tablasubtitulo">
                                <th>...</th>
                                <th align="center">Usuario</th>
                                <th align="center">Clave</th>                                
                                <th align="center">Nombres</th>
                                <th align="center">Apellidos</th>
                                <th align="center">Tipo</th>
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
                    $retval .= 	'<td align="left">'. $rst["usucuenta"] .'</td>';
                    $retval .= 	'<td align="center"><div class="vtip" title=" << '. $rst["usuclave"] .' >> ">xxxxx</div></td>';                    
                    $retval .= 	'<td align="left">'. $rst["usunombres"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["usuapellidos"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["tipusudescripcion"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["estusudescripcion"] .'</td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Actualizar <br> [Usuario = '.$rst["usucuenta"] .']">';
                    $retval .=  '<a href="'. ADMINISTRACION_URL .'administracion.php?btnActualizar=Actualizar&strCuenta='. $rst["usucuenta"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Eliminar <br> [Usuario = '.$rst["usucuenta"] .']">';
                    $retval .=  '<a href="'. ADMINISTRACION_URL .'administracion.php?btnEliminar=Eliminar&strCuenta='. $rst["usucuenta"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                    $i = 1 - $i;
                endforeach;
            }

            $paginacion->setStrNombrePagina("administracion/administracion.php");
            $retval .= '<tr><td colspan="9" align="center">'. $paginacion->getStrPaginacion() .'</td></tr>';
            $retval .= '</table>';
            $retval .= '</fieldset>';
            return $retval;
        }

        public function getStrListarUsuarios($p)
        {
            $query = new clQuery();

            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL splusuarios();");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();
            $retval = "";
            if( count($resultado) > 0 ) {
                $retval .= '<select name="lsUsuario" id="lsUsuario" class="combobox">';
                $retval .= '<option value="">Seleccione&nbsp;Usuario</option>';
                foreach( $resultado as $rst):
                    if($rst["usucuenta"] == $p ){
                        $retval .= '<option value="'. $rst["usucuenta"] .'" selected="selected">[ '. $rst["tipusudescripcion"] .' ] - '. $rst["usunombres"] .' '. $rst["usuapellidos"] .'</option>';
                    }
                    else{
                        $retval .= '<option value="'. $rst["usucuenta"] .'">[ '. $rst["tipusudescripcion"] .' ] - '. $rst["usunombres"] .' '. $rst["usuapellidos"] .'</option>';
                    }
                endforeach;
                $retval .= "</select>";
            }
            return $retval;
        }
    }
?>