<?php	
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/unidadmedica/config/config.configurar.php' );
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/unidadmedica/config/config.validaciones.php' );
    include_once( CLASS_PATH . "class.clquery.php" );
    include_once( CLASS_PATH . "class.clpaginacion.php" );    
    include_once( CLASS_PATH . "class.clestadocivil.php" );
    include_once( CLASS_PATH . "class.clsexo.php" );
    include_once( CLASS_PATH . "class.cltiposangre.php" );
    include_once( CLASS_PATH . "class.clprovincia.php" );
    include_once( CLASS_PATH . "class.clcanton.php" );
    include_once( CLASS_PATH . "class.clparroquia.php" );

    class clMedico
    {
        private $strCedula;
        private $strProvincia;
        private $strCanton;
        private $strParroquia;
        private $strSexo;
        private $strEstadoCivil;
        private $strNombres;
        private $strApellidos;
        private $strCallePrincipal;
        private $strCalleSecundaria;
        private $strNumeroCasa;
        private $strTelefonos;
        private $strFechaNacimiento;
        private $strTipoSangre;
        private $strCelular;
        private $strEmail;

        private $strEtiqueta;
        private $strNombreBoton;
        private $strValorBoton;
        private $strLectura;

        public function __construct()
        {
            $this->strCedula = "";
            $this->strProvincia = "";
            $this->strCanton = "";
            $this->strParroquia = "";
            $this->strSexo = "";
            $this->strEstadoCivil = "";
            $this->strNombres = "";
            $this->strApellidos = "";
            $this->strCallePrincipal = "";
            $this->strCalleSecundaria = "";
            $this->strNumeroCasa = "";
            $this->strTelefonos = "";
            $this->strFechaNacimiento = "";
            $this->strTipoSangre = "";
            $this->strCelular = "";
            $this->strEmail = "";

            $this->strEtiqueta = "";
            $this->strNombreBoton = "";
            $this->strValorBoton = "";
            $this->strLectura = "";
        }
                
        public function getStrCedula()
        {
            return $this->strCedula;
        }

        public function setStrCedula($c)
        {
            $this->strCedula = $c;
        }

        public function getStrCelular()
        {
            return $this->strCelular;
        }

        public function setStrCelular($c)
        {
            $this->strCelular = $c;
        }

        public function getStrEmail()
        {
            return $this->strEmail;
        }

        public function setStrEmail($e)
        {
            $this->strEmail = $e;
        }

        public function getStrProvincia()
        {
            return $this->strProvincia;
        }

        public function setStrProvincia($p)
        {
            $this->strProvincia = $p;
        }

        public function getStrCanton()
        {
            return $this->strCanton;
        }

        public function setStrCanton($c)
        {
            $this->strCanton = $c;
        }

        public function getStrParroquia()
        {
            return $this->strParroquia;
        }

        public function setStrParroquia($p)
        {
            $this->strParroquia = $p;
        }

        public function getStrSexo()
        {
            return $this->strSexo;
        }

        public function setStrSexo($s)
        {
            $this->strSexo = $s;
        }

        public function getStrEstadoCivil()
        {
            return $this->strEstadoCivil;
        }

        public function setStrEstadoCivil($ec)
        {
            $this->strEstadoCivil = $ec;
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

        public function getStrCallePrincipal()
        {
            return $this->strCallePrincipal;
        }

        public function setStrCallePrincipal($cp)
        {
            $this->strCallePrincipal = $cp;
        }

        public function getStrCalleSecundaria()
        {
            return $this->strCalleSecundaria;
        }

        public function setStrCalleSecundaria($cs)
        {
            $this->strCalleSecundaria = $cs;
        }

        public function getStrNumeroCasa()
        {
            return $this->strNumeroCasa;
        }

        public function setStrNumeroCasa($nc)
        {
            $this->strNumeroCasa = $nc;
        }

        public function getStrTelefonos()
        {
            return $this->strTelefonos;
        }

        public function setStrTelefonos($t)
        {
            $this->strTelefonos = $t;
        }

        public function getStrFechaNacimiento()
        {
            return $this->strFechaNacimiento;
        }

        public function setStrFechaNacimiento($fn)
        {
            $this->strFechaNacimiento = $fn;
        }

        public function getStrTipoSangre()
        {
            return $this->strTipoSangre;
        }

        public function setStrTipoSangre($ts)
        {
            $this->strTipoSangre = $ts;
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
            $provincia = new clProvincia();
            $canton = new clCanton();
            $parroquia = new clParroquia();
            $sexo = new clSexo();
            $estadocivil = new clEstadoCivil();
            $tiposangre = new clTipoSangre();
            
            $imagen = "<img src='". IMAGENES_PATH ."/cargando.gif' width='20px' height='20px' />";
            $retval .= '
                        <script>
                            $(document).ready(function(){
                                $.metadata.setType( \'attr\', \'validate\' );
                                $(\'#frmmedico\').validate({
                                        rules:{                                                
                                                lsProvincia: { required: true },
                                                lsCanton: { required: true},
                                                lsParroquia: { required: true },
                                                lsSexo: { required: true },
                                                lsEstadoCivil: { required: true },
                                                lsTipoSangre: { required: true },
                                                strNombres: { required: true },
                                                strApellidos: { required: true },
                                                strCallePrincipal: { required: true },
                                                strCalleSecundaria: { required: true },
                                                strNumeroCasa: { required: true },
                                                strCedula: { required: true },
                                                strTelefonos: { required: true },
                                                strCelular: { required: true }
                                        },
                                        messages:{                                                
                                                lsProvincia: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
                                                lsCanton: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
                                                lsParroquia: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
                                                lsSexo: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
                                                lsEstadoCivil: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
                                                lsTipoSangre: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
                                                strNombres: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
                                                strApellidos: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
                                                strCallePrincipal: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
                                                strCalleSecundaria: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
                                                strNumeroCasa: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
                                                strCedula: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
                                                strTelefonos: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
                                                strCelular: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"}
                                        }
                                });

                                $("#lsProvincia").change(function () {
                                    $("#lsProvincia option:selected").each(function () {
                                            var provincia = $(this).val();
                                            $.post( "'. MEDICO_URL .'medico.php", { btnBuscar: "Canton",
                                                                                      strCodigoProvincia: provincia
                                                                                    },
                                        function(data){
                                                $("#lsCanton").html(data);
                                        });
                                    });
                                 });

                                $("#lsCanton").change(function () {
                                    $("#lsCanton option:selected").each(function () {
                                            var canton = $(this).val();
                                            $.post( "'. MEDICO_URL .'medico.php", { btnBuscar: "Parroquia",
                                                                                      strCodigoCanton: canton                                                                                      
                                                                                    },
                                        function(data){
                                                $("#lsParroquia").html(data);                                                
                                        });
                                    });
                                 });
                                 
                            });
                        </script>
                       ';

            $retval .= '
                        <form id="frmmedico" action="'. MEDICO_URL .'medico.php" method="POST">
                       ';

            $Regresar = "regresar('". MEDICO_URL . "medico.php')";

            $retval .= '<fieldset class="fieldsetPequeno">';
            $retval .= '<legend class="etiquetaborde">
                            M&eacute;dico <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Listado M&eacute;dicos <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> '. $this->getStrEtiqueta() .'
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
                                <td align="right"><b>Provincia:&nbsp;</b></td>
                                <td align="left">                                    
                                    <select name="lsProvincia" id="lsProvincia"  class="combobox">
                                        '. $provincia->getStrListar($this->getStrProvincia()) .'
                                    </select>
                                </td>
                            </tr>

                            <tr class="formulariofila1">
                                <td  align="right"><b>Cant&oacute;n:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsCanton" id="lsCanton" class="combobox">
                                        '. $canton->getStrListar($this->getStrProvincia(), $this->getStrCanton()) .'
                                    </select>
                                </td>
                            </tr>

                            <tr class="formulariofila1">
                                <td  align="right"><b>Parroquia:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsParroquia" id="lsParroquia" class="combobox">
                                        '. $parroquia->getStrListar($this->getStrCanton(), $this->getStrParroquia()) .'
                                    </select>                                    
                                </td>
                            </tr>                            
                            

                            <tr class="formulariofila1">
                                <td  align="right"><b>Sexo:&nbsp;</b></td>
                                <td align="left">'. $sexo->getStrListar($this->getStrSexo()) .'</td>
                            </tr>

                            <tr class="formulariofila1">
                                <td  align="right"><b>Estado&nbsp;Civil:&nbsp;</b></td>
                                <td align="left">'. $estadocivil->getStrListar($this->getStrEstadoCivil()) .'</td>
                            </tr>

                            <tr class="formulariofila1">
                                <td  align="right"><b>Tipo&nbsp;Sangre:&nbsp;</b></td>
                                <td align="left">'. $tiposangre->getStrListar($this->getStrTipoSangre()) .'</td>
                            </tr>

                            <tr class="formulariofila1">
                                <td  align="right"><b>C&eacute;dula</b></td>
                                <td align="left">
                                    <input class="textbox" id="strCedula" name="strCedula" type="text" maxlength="10"'. JS_ONLY_NUMS .' value="'. $this->getStrCedula() .'" '. $this->getStrLectura() .' />
                                </td>
                            </tr>

                            <tr class="formulariofila1">
                                <td  align="right"><b>Nombres:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strNombres" name="strNombres" type="text" maxlength="20" value="'. $this->getStrNombres() .'" />
                                </td>
                            </tr>

                            <tr class="formulariofila1">
                                <td  align="right"><b>Apellidos:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strApellidos" name="strApellidos" type="text" maxlength="20" value="'. $this->getStrApellidos() .'" />
                                </td>
                            </tr>

                            <tr class="formulariofila1">
                                <td  align="right"><b>Calle&nbsp;Principal:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strCallePrincipal" name="strCallePrincipal" type="text" maxlength="20" value="'. $this->getStrCallePrincipal() .'" />
                                </td>
                            </tr>

                            <tr class="formulariofila1">
                                <td  align="right"><b>Calle&nbsp;Secundaria:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strCalleSecundaria" name="strCalleSecundaria" type="text" maxlength="20" value="'. $this->getStrCalleSecundaria() .'" />
                                </td>
                            </tr>

                            <tr class="formulariofila1">
                                <td  align="right"><b>N&uacute;mero&nbsp;Casa:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strNumeroCasa" name="strNumeroCasa" type="text" maxlength="10" value="'. $this->getStrNumeroCasa() .'" />
                                </td>
                            </tr>

                            <tr class="formulariofila1">
                                <td  align="right"><b>Tel&eacute;fonos:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strTelefonos" name="strTelefonos" type="text" maxlength="9" '. JS_ONLY_NUMS .' value="'. $this->getStrTelefonos() .'" />
                                </td>
                            </tr>

                            <tr class="formulariofila1">
                                <td  align="right"><b>Celular</b></td>
                                <td align="left">
                                    <input class="textbox" id="strCelular" name="strCelular" type="text" maxlength="9" '. JS_ONLY_NUMS .' value="'. $this->getStrCelular() .'" />
                                </td>
                            </tr>

                            <tr class="formulariofila1">
                                <td  align="right"><b>Em@il:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strEmail" name="strEmail" type="text" maxlength="50" value="'. $this->getStrEmail() .'" />
                                </td>
                            </tr>

                            <tr class="formulariofila1">
                                <td  align="right"><b>Fecha&nbsp;Nacimiento:</b></td>
                                <td align="left">
                                    <input name="dtFecha" type="text" id="dtFecha" value="'. $this->getStrFechaNacimiento() .'" size="10" readonly="readonly" class="textboxfecha" />
                                    <a href="#">
                                        <img src="'. IMAGENES_PATH .'/calendario.png" title="Calendario" name="strFecha" id="strFecha" width="16px" height="16px" style="border: 0px none;">
                                    </a>
                                    <script type="text/javascript">
                                        Calendar.setup({
                                                         inputField: "dtFecha",
                                                         ifFormat: "%Y-%m-%d",
                                                         button: "strFecha"
                                                         });
                                    </script>
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
            $ProcedimientoAlmacenado = sprintf("CALL spingresarmedico('%s', '%s', '%d', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s');", $this->getStrSexo(), $this->getStrEstadoCivil(), $this->getStrTipoSangre(), $this->getStrParroquia(), $this->getStrCedula(), $this->getStrNombres(), $this->getStrApellidos(), $this->getStrCallePrincipal(), $this->getStrCalleSecundaria(), $this->getStrNumeroCasa(), $this->getStrTelefonos(),$this->getStrCelular(),$this->getStrEmail(), $this->getStrFechaNacimiento());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);

            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Sexo = [ '.$this->getStrSexo().' ] Estado Civil = [ '.$this->getStrEstadoCivil().' ] Tipo Sangre = ['. $this->getStrTipoSangre().' ] Parroquia = [ '.$this->getStrParroquia().' ] Cedula = [ '. $this->getStrCedula().' ] Nombres = [ '.$this->getStrNombres().' ] Apellidos  = [ '. $this->getStrApellidos().' ] Calle Principal = [ '.$this->getStrCallePrincipal().' ] Calle Secundaria = [ '.$this->getStrCalleSecundaria().' ] Numero Casa = [ '.$this->getStrNumeroCasa() .' ] Telefonos = [ '. $this->getStrTelefonos().' ] Celular = [ '.$this->getStrCelular().' ] Em@il = [ '.$this->getStrEmail().' ] Fecha Nacimiento= [ '. $this->getStrFechaNacimiento().' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'G', 'tmedico', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL spactualizarmedico('%s', '%s', '%d', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s');", $this->getStrSexo(), $this->getStrEstadoCivil(), $this->getStrTipoSangre(), $this->getStrParroquia(), $this->getStrCedula(), $this->getStrNombres(), $this->getStrApellidos(), $this->getStrCallePrincipal(), $this->getStrCalleSecundaria(), $this->getStrNumeroCasa(), $this->getStrTelefonos(),$this->getStrCelular(),$this->getStrEmail(), $this->getStrFechaNacimiento());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);

            if($query->getStrSqlInsertUpdateDelete()) {
                 //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Sexo = [ '.$this->getStrSexo().' ] Estado Civil = [ '.$this->getStrEstadoCivil().' ] Tipo Sangre = ['. $this->getStrTipoSangre().' ] Parroquia = [ '.$this->getStrParroquia().' ] Cedula = [ '. $this->getStrCedula().' ] Nombres = [ '.$this->getStrNombres().' ] Apellidos  = [ '. $this->getStrApellidos().' ] Calle Principal = [ '.$this->getStrCallePrincipal().' ] Calle Secundaria = [ '.$this->getStrCalleSecundaria().' ] Numero Casa = [ '.$this->getStrNumeroCasa() .' ] Telefonos = [ '. $this->getStrTelefonos().' ] Celular = [ '.$this->getStrCelular().' ] Em@il = [ '.$this->getStrEmail().' ] Fecha Nacimiento= [ '. $this->getStrFechaNacimiento().' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'A', 'tmedico', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL speliminarmedico('%s');", $this->getStrCedula());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlInsertUpdateDelete();

            if($query->getStrSqlInsertUpdateDelete()) {
                                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Sexo = [ '.$this->getStrSexo().' ] Estado Civil = [ '.$this->getStrEstadoCivil().' ] Tipo Sangre = ['. $this->getStrTipoSangre().' ] Parroquia = [ '.$this->getStrParroquia().' ] Cedula = [ '. $this->getStrCedula().' ] Nombres = [ '.$this->getStrNombres().' ] Apellidos  = [ '. $this->getStrApellidos().' ] Calle Principal = [ '.$this->getStrCallePrincipal().' ] Calle Secundaria = [ '.$this->getStrCalleSecundaria().' ] Numero Casa = [ '.$this->getStrNumeroCasa() .' ] Telefonos = [ '. $this->getStrTelefonos().' ] Celular = [ '.$this->getStrCelular().' ] Em@il = [ '.$this->getStrEmail().' ] Fecha Nacimiento= [ '. $this->getStrFechaNacimiento().' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'E', 'tmedico', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL spbmedico('%s');", $this->getStrCedula());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
                foreach( $resultado as $rst):                    
                    $this->setStrProvincia(substr($rst['parcodigo'],0,2));
                    $this->setStrCanton(substr($rst['parcodigo'],0,4));
                    $this->setStrParroquia($rst['parcodigo']);
                    $this->setStrSexo($rst['sexcodigo']);
                    $this->setStrEstadoCivil($rst['estcivcodigo']);
                    $this->setStrTipoSangre($rst['tipsancodigo']);
                    $this->setStrCedula($rst['medcedula']);
                    $this->setStrNombres($rst['mednombres']);
                    $this->setStrApellidos($rst['medapellidos']);
                    $this->setStrCallePrincipal($rst['medcalleprincipal']);
                    $this->setStrCalleSecundaria($rst['medcallesecundaria']);
                    $this->setStrNumeroCasa($rst['mednumerocasa']);
                    $this->setStrTelefonos($rst['medtelefono']);
                    $this->setStrCelular($rst['medcelular']);
                    $this->setStrEmail($rst['medmail']);
                    $this->setStrFechaNacimiento($rst['medfechanacimiento']);
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
            $ProcedimientoAlmacenado = sprintf("CALL sptotalmedicos();");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultadototal = $query->getStrSqlSelect();

            foreach( $resultadototal as $rst):
                $paginacion->setStrTotalRegistros($rst["medtotal"]);
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
            $ProcedimientoAlmacenado = sprintf("CALL splistarmedicos('%d','%d');", ($paginacion->getStrPaginaActual() - 1) * $paginacion->getStrRegistrosPorPagina(), $paginacion->getStrRegistrosPorPagina());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            M&eacute;dico <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Listado M&eacute;dicos
                        </legend>
                       ';
            $retval .= '
                        <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                            <tr>
                                <td colspan="11" align="center"><div class="vtip" title="Ingreso <br> [Nuevo M&eacute;dico]">
                                    <a href="'. MEDICO_URL .'medico.php?btnNuevo=Nuevo">| <img src="'. IMAGENES_PATH .'/nuevapersona.png" title="" width="16px" height="16px"  border="0" /> Nuevo M&eacute;dico |</a>
                                </div><td>
                            </tr>
                            <tr class="tablatitulo">
                                <th colspan="11">LISTADO&nbsp;DE&nbsp;MEDICOS&nbsp;REGISTRADOS</th>
                            </tr>
                            <tr class="tablasubtitulo">
                                <th>...</th>                                                                
                                <th align="center">C&eacute;dula</th>
                                <th align="center">Apellidos</th>
                                <th align="center">Nombres</th>
                                <th align="center">Sexo</th>
                                <th align="center">Estado&nbsp;Civil</th>
                                <th align="center">Tipo&nbsp;Sangre</th>
                                <th align="center">Fec.&nbsp;Nac.</th>
                                <th align="center" colspan="3">Acciones</th>
                            </tr>
                        ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["medcedula"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["medapellidos"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["mednombres"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["sexdescripcion"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["estcivdescripcion"] .'</td>';
                    $retval .= 	'<td align="center">'. $rst["tipsandescripcion"] .'</td>';
                    $retval .= 	'<td align="center">'. $rst["medfechanacimiento"] .'</td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Actualizar <br> [ C&eacute;dula = '.$rst["medcedula"] .' ]">';
                    $retval .=  '<a href="'. MEDICO_URL .'medico.php?btnActualizar=Actualizar&strCedula='. $rst["medcedula"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Eliminar <br> [ C&eacute;dula = '.$rst["medcedula"] .' ]">';
                    $retval .=  '<a href="'. MEDICO_URL .'medico.php?btnEliminar=Eliminar&strCedula='. $rst["medcedula"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Detalle M&eacute;dico <br> [ C&eacute;dula = '.$rst["medcedula"] .' ]">';
                    $retval .=  '<a href="'. MEDICO_URL .'medico.php?btnDetalle=Detalle&strCedula='. $rst["medcedula"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                    $i = 1 - $i;
                endforeach;
            }

            $paginacion->setStrNombrePagina("medico/medico.php");
            $retval .= '<tr><td colspan="12" align="center">'. $paginacion->getStrPaginacion() .'</td></tr>';
            $retval .= '</table>';
            $retval .= '</fieldset>';
            return $retval;
        }

        public function getStrDetallePersona()
        {
            $query = new clQuery();
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbdetallemedico('%s');", $this->getStrCedula());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            M&eacute;dico <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Listado M&eacute;dicos <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Detalle M&eacute;dico
                        </legend>
                       ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                    $retval .= '<tr>
                                    <td colspan="2" align="center">
                                        <a href="'. MEDICO_URL .'medico.php">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> Regresar Listado M&eacute;dicos|</a>
                                    <td>
                                </tr>
                                ';
                    
                    $retval .= '<tr class="tablatitulo">
                                    <th colspan="2">DETALLE&nbsp;MEDICO&nbsp;REGISTRADO</th>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">C&eacute;dula:</th>
                                    <td align="left">  '. $rst["medcedula"] .'</td>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Nombres:</th>
                                    <td align="left">  '. $rst["mednombres"] .'</td>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Apellidos:</th>
                                    <td align="left"> '. $rst["medapellidos"] .'</td>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Sexo:</th>
                                    <td align="left"> '. $rst["sexdescripcion"] .'</td>                                    
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Estado Civil:</th>
                                    <td align="left">  '. $rst["estcivdescripcion"] .'</td>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Tipo Sangre:</th>
                                    <td align="left">  '. $rst["tipsandescripcion"] .'</td>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Provincia:</th>
                                    <td align="left">  '. $rst["prodescripcion"] .'</td>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Cant&oacute;n:</th>
                                    <td align="left">  '. $rst["candescripcion"] .'</td>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Parroquia:</th>
                                    <td align="left">  '. $rst["pardescripcion"] .'</td>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Calle Principal:</th>
                                    <td align="left">  '. $rst["medcalleprincipal"] .'</td>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">N&uacute;mero Casa:</th>
                                    <td align="left">  '. $rst["mednumerocasa"] .'</td>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Calle Secundaria:</th>
                                    <td align="left">  '. $rst["medcallesecundaria"] .'</td>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Tel&eacute;fono:</th>
                                    <td align="left">  '. $rst["medtelefono"] .'</td>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Celular:</th>
                                    <td align="left">  '. $rst["medcelular"] .'</td>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Em@il:</th>
                                    <td align="left">  '. $rst["medmail"] .'</td>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Fecha Nacimiento:</th>
                                    <td align="left">  '. $rst["medfechanacimiento"] .'</td>
                                </tr>
                                ';

                    $i = 1 - $i;
                endforeach;
            }

            $retval .= '</table>';
            $retval .= '</fieldset>';
            return $retval;
        }

        public function getStrListarMedicosEspecialidad($cedula)
        {
            $query = new clQuery();

            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL splmedicos();");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();
            $retval = "";
            if( count($resultado) > 0 ) {
                $retval .= '<select name="lsMedico" id="lsMedico" class="combobox">';
                $retval .= '<option value="">Seleccione&nbsp;M&eacute;dico</option>';
                foreach( $resultado as $rst):
                    if($rst["medcedula"] == $cedula ){
                        $retval .= '<option value="'. $rst["medcedula"] .'" selected="selected">'. $rst["mednombres"] .' '. $rst["medapellidos"] .'</option>';
                        $this->setStrNombres($rst["mednombres"]);
                        $this->setStrApellidos($rst["medapellidos"]);
                    }
                    else{
                        $retval .= '<option value="'. $rst["medcedula"] .'">'. $rst["mednombres"] .' '. $rst["medapellidos"] .'</option>';
                    }
                endforeach;
                $retval .= "</select>";
            }
            return $retval;
        }
        
    }
?>