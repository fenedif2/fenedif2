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
    include_once( CLASS_PATH . "class.clinstitucion.php" );

    class clPaciente
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
        private $strNumeroHistorialClinico;
        private $strCelular;
        private $strEmail;
        private $strInstitucion;
        private $strTipoBuscar;
        private $strBuscarPaciente;



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
            $this->strNumeroHistorialClinico = "";
            $this->strCelular = "";
            $this->strEmail = "";
            $this->strInstitucion = "";
            $this->strTipoBuscar = "";
            $this->strBuscarPaciente = "";

            $this->strEtiqueta = "";
            $this->strNombreBoton = "";
            $this->strValorBoton = "";
            $this->strLectura = "";
        }
        
        public function getStrNumeroHistorialClinico()
        {
            return $this->strNumeroHistorialClinico;
        }

        public function setStrNumeroHistorialClinico($nhc)
        {
            $this->strNumeroHistorialClinico = $nhc;
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

         public function getStrInstitucion()
        {
            return $this->strInstitucion;
        }

        public function setStrInstitucion($i)
        {
            $this->strInstitucion = $i;
        }

         public function getStrTipoBuscar()
        {
            return $this->strTipoBuscar;
        }

        public function setStrTipoBuscar($tb)
        {
            $this->strTipoBuscar = $tb;
        }

         public function getStrBuscarPaciente()
        {
            return $this->strBuscarPaciente;
        }

        public function setStrBuscarPaciente($bp)
        {
            $this->strBuscarPaciente = $bp;
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
            $institucion = new clInstitucion();
            
            $imagen = "<img src='". IMAGENES_PATH ."/cargando.gif' width='20px' height='20px' />";
            $retval .= '
                        <script>
                            $(document).ready(function(){
                                $.metadata.setType( \'attr\', \'validate\' );
                                $(\'#frmpaciente\').validate({
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
                                                lsInstitucion: { required: true },
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
                                                lsInstitucion: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"}
                                        }
                                });

                                $("#lsProvincia").change(function () {
                                    $("#lsProvincia option:selected").each(function () {
                                            var provincia = $(this).val();
                                            $.post( "'. PACIENTE_URL .'paciente.php", { btnBuscar: "Canton",
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
                                            $.post( "'. PACIENTE_URL .'paciente.php", { btnBuscar: "Parroquia",
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
                        <form id="frmpaciente" action="'. PACIENTE_URL .'paciente.php" method="POST">
                       ';

            $Regresar = "regresar('". PACIENTE_URL . "paciente.php')";

            $retval .= '<fieldset class="fieldsetPequeno">';
            $retval .= '<legend class="etiquetaborde">
                            Paciente <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Listado Pacientes <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> '. $this->getStrEtiqueta() .'
                        </legend>
                       ';


            $NHC = "";
            switch (strlen($this->getStrNumeroHistorialClinico())){
                case 1:
                        $NHC = "0000".$this->getStrNumeroHistorialClinico();
                        break;
                case 2:
                        $NHC = "000".$this->getStrNumeroHistorialClinico();
                        break;
                case 3:
                        $NHC = "00".$this->getStrNumeroHistorialClinico();
                        break;
                case 4:
                        $NHC = "0".$this->getStrNumeroHistorialClinico();
                        break;
                default:
                        $NHC = $this->getStrNumeroHistorialClinico();
                        break;
            }

            if ($this->getStrNumeroHistorialClinico() == "")
                $EtiquetaNumeroHistoriaClinica = "";
            else

                $EtiquetaNumeroHistoriaClinica = '<tr class="formulariofila1">
                                                    <td align="right"><b>NHC:</b></td>
                                                    <td align="left" class="mensajelectura">
                                                        &laquo;'. $NHC .'&raquo;
                                                    </td>
                                                </tr>';
            
            $NHC = "";
            switch (strlen($this->getStrNumeroHistorialClinico())){
                case 1:
                        $NHC = "0000".$this->getStrNumeroHistorialClinico();
                        break;
                case 2:
                        $NHC = "000".$this->getStrNumeroHistorialClinico();
                        break;
                case 3:
                        $NHC = "00".$this->getStrNumeroHistorialClinico();
                        break;
                case 4:
                        $NHC = "0".$this->getStrNumeroHistorialClinico();
                        break;
                default:
                        $NHC = $this->getStrNumeroHistorialClinico();
                        break;
            }

            $retval .= '
                        <table width="100%" border="0" align="center" cellpadding="1" cellspacing="1">
                            <tr>
                                <td colspan="2" align="center" class="tablatitulo">
                                        '. $this->getStrEtiqueta() .'
                                </td>
                            </tr>

                            '. $EtiquetaNumeroHistoriaClinica .'

                            <tr class="formulariofila1">
                                <td align="right"><b>Provincia:&nbsp;</b></td>
                                <td align="left">
                                    <input class="textbox" id="strNumeroHistoriaClinica" name="strNumeroHistoriaClinica" type="hidden" maxlength="10"'. JS_ONLY_NUMS .' value="'. $this->getStrNumeroHistorialClinico() .'"/>
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
                                    <input class="textbox" id="strCedula" name="strCedula" type="text" maxlength="10" '. JS_ONLY_NUMS .' value="'. $this->getStrCedula() .'"/>
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

                            <tr class="formulariofila1">
                                <td  align="right"><b>Institucion:&nbsp;</b></td>
                                <td align="left">'. $institucion->getStrListar($this->getStrInstitucion()) .'</td>
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
            $ProcedimientoAlmacenado = sprintf("CALL spingresarpaciente('%s', '%s', '%d', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s');", $this->getStrSexo(), $this->getStrEstadoCivil(), $this->getStrTipoSangre(), $this->getStrParroquia(), $this->getStrCedula(), $this->getStrNombres(), $this->getStrApellidos(), $this->getStrCallePrincipal(), $this->getStrCalleSecundaria(), $this->getStrNumeroCasa(), $this->getStrTelefonos(),$this->getStrCelular(),$this->getStrEmail(), $this->getStrFechaNacimiento(), $this->getStrInstitucion());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);

            if($query->getStrSqlInsertUpdateDelete()){
               //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Sexo = [ '.$this->getStrSexo().' ] Estado Civil = [ '.$this->getStrEstadoCivil().' ] Tipo Sangre = ['. $this->getStrTipoSangre().' ] Parroquia = [ '.$this->getStrParroquia().' ] Cedula = [ '. $this->getStrCedula().' ] Nombres = [ '.$this->getStrNombres().' ] Apellidos  = [ '. $this->getStrApellidos().' ] Calle Principal = [ '.$this->getStrCallePrincipal().' ] Calle Secundaria = [ '.$this->getStrCalleSecundaria().' ] Numero Casa = [ '.$this->getStrNumeroCasa() .' ] Telefonos = [ '. $this->getStrTelefonos().' ] Celular = [ '.$this->getStrCelular().' ] Em@il = [ '.$this->getStrEmail().' ] Fecha Nacimiento= [ '. $this->getStrFechaNacimiento().' ] = Institucion = [ '. $this->getStrInstitucion() .' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'G', 'tpaciente', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL spactualizarpaciente('%d', '%s', '%s', '%d', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s');", $this->getStrNumeroHistorialClinico(), $this->getStrSexo(), $this->getStrEstadoCivil(), $this->getStrTipoSangre(), $this->getStrParroquia(), $this->getStrCedula(), $this->getStrNombres(), $this->getStrApellidos(), $this->getStrCallePrincipal(), $this->getStrCalleSecundaria(), $this->getStrNumeroCasa(), $this->getStrTelefonos(),$this->getStrCelular(),$this->getStrEmail(), $this->getStrFechaNacimiento(), $this->getStrInstitucion());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);

            if($query->getStrSqlInsertUpdateDelete()) {
                               //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Numero Historia Clinica = [ '. $this->getStrNumeroHistorialClinico() .' ] Sexo = [ '.$this->getStrSexo().' ] Estado Civil = [ '.$this->getStrEstadoCivil().' ] Tipo Sangre = ['. $this->getStrTipoSangre().' ] Parroquia = [ '.$this->getStrParroquia().' ] Cedula = [ '. $this->getStrCedula().' ] Nombres = [ '.$this->getStrNombres().' ] Apellidos  = [ '. $this->getStrApellidos().' ] Calle Principal = [ '.$this->getStrCallePrincipal().' ] Calle Secundaria = [ '.$this->getStrCalleSecundaria().' ] Numero Casa = [ '.$this->getStrNumeroCasa() .' ] Telefonos = [ '. $this->getStrTelefonos().' ] Celular = [ '.$this->getStrCelular().' ] Em@il = [ '.$this->getStrEmail().' ] Fecha Nacimiento= [ '. $this->getStrFechaNacimiento().' ] = Institucion = [ '. $this->getStrInstitucion() .' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'A', 'tpaciente', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL speliminarpaciente('%d');", $this->getStrNumeroHistorialClinico());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlInsertUpdateDelete();

            if($query->getStrSqlInsertUpdateDelete()) {
                               //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Numero Historia Clinica = [ '. $this->getStrNumeroHistorialClinico() .' ] Sexo = [ '.$this->getStrSexo().' ] Estado Civil = [ '.$this->getStrEstadoCivil().' ] Tipo Sangre = ['. $this->getStrTipoSangre().' ] Parroquia = [ '.$this->getStrParroquia().' ] Cedula = [ '. $this->getStrCedula().' ] Nombres = [ '.$this->getStrNombres().' ] Apellidos  = [ '. $this->getStrApellidos().' ] Calle Principal = [ '.$this->getStrCallePrincipal().' ] Calle Secundaria = [ '.$this->getStrCalleSecundaria().' ] Numero Casa = [ '.$this->getStrNumeroCasa() .' ] Telefonos = [ '. $this->getStrTelefonos().' ] Celular = [ '.$this->getStrCelular().' ] Em@il = [ '.$this->getStrEmail().' ] Fecha Nacimiento= [ '. $this->getStrFechaNacimiento().' ] = Institucion = [ '. $this->getStrInstitucion() .' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'E', 'tpaciente', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL spbpaciente('%d');", $this->getStrNumeroHistorialClinico());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
                foreach( $resultado as $rst):
                    $this->setStrNumeroHistorialClinico($rst['pacnumerohistoriaclinica']);
                    $this->setStrProvincia(substr($rst['parcodigo'],0,2));
                    $this->setStrCanton(substr($rst['parcodigo'],0,4));
                    $this->setStrParroquia($rst['parcodigo']);
                    $this->setStrSexo($rst['sexcodigo']);
                    $this->setStrEstadoCivil($rst['estcivcodigo']);
                    $this->setStrTipoSangre($rst['tipsancodigo']);
                    $this->setStrCedula($rst['paccedula']);
                    $this->setStrNombres($rst['pacnombres']);
                    $this->setStrApellidos($rst['pacapellidos']);
                    $this->setStrCallePrincipal($rst['paccalleprincipal']);
                    $this->setStrCalleSecundaria($rst['paccallesecundaria']);
                    $this->setStrNumeroCasa($rst['pacnumerocasa']);
                    $this->setStrTelefonos($rst['pactelefono']);
                    $this->setStrCelular($rst['paccelular']);
                    $this->setStrEmail($rst['pacmail']);
                    $this->setStrFechaNacimiento($rst['pacfechanacimiento']);
                    $this->setStrInstitucion($rst['inscodigo']);
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
            $ProcedimientoAlmacenado = sprintf("CALL sptotalpacientes('%d','%s');",$this->getStrTipoBuscar(), $this->getStrBuscarPaciente());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultadototal = $query->getStrSqlSelect();

            foreach( $resultadototal as $rst):
                $paginacion->setStrTotalRegistros($rst["pactotal"]);
            endforeach;


            if(isset($_REQUEST['btnPagina']))
                $paginacion->setStrPaginaActual($_REQUEST['btnPagina']);
            else
                $paginacion->setStrPaginaActual(1);

            //Cuantos registros por p?gina
            $paginacion->setStrRegistrosPorPagina(REGISTROS + 480);

            //Calcula la ultima pagina
            $paginacion->setStrPaginaUltima (ceil($paginacion->getStrTotalRegistros() / $paginacion->getStrRegistrosPorPagina()));

            //Si la p?gina actual es mayor que la ultima p?gina
            if($paginacion->getStrPaginaActual() > $paginacion->getStrPaginaUltima())
                $paginacion->setStrPaginaActual($paginacion->getStrPaginaUltima());

            //Si la paginaci?n actual es menor que 1
            if($paginacion->getStrPaginaActual() < 1)
                $paginacion->setStrPaginaActual(1);

            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL splistarpacientes('%d','%d','%d','%s');", ($paginacion->getStrPaginaActual() - 1) * $paginacion->getStrRegistrosPorPagina(), $paginacion->getStrRegistrosPorPagina(),$this->getStrTipoBuscar(), $this->getStrBuscarPaciente());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            Persona <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Listado Persona
                        </legend>
                       ';

        $retval .= '<form id="frmbuscar" action="'. PACIENTE_URL .'paciente.php" method="post">';
        $retval .= '<table border="0" width="100%" cellpadding="1" cellspacing="1" align="left">';
        $retval .=  '<tr class="formulariofila1">';
        $retval .=      '<td>';
        //$retval .=          '<img src="'. IMAGENES_PATH .'/bandera.jpg" width="690px" height="1px" style="border: 0px none;">';
        $retval .=      '</td>';
        $retval .=  '</tr>';
        $retval .=  '<tr>';
        $retval .=      '<td class="listadofila0" align="center">';
        $retval .=          '<b>Buscar:&nbsp;</b>';        
        $retval .=          '<input type="hidden" name="strBuscar" id="strBuscar" value="Buscar" class="cajaTextoDatos" />&nbsp;&nbsp;';
        $retval .=          '<input type="text" class="textbox" name="strBuscarPaciente" id="strBuscarPaciente" value="'. $this->getStrBuscarPaciente() .'" class="cajaTextoDatos" />&nbsp;&nbsp;';
        $retval .=          '<input type="radio" name="rbBuscar" id="rbBuscar" value="1" />&nbsp;N.H.C&nbsp;&nbsp;';
        $retval .=          '<input type="radio" name="rbBuscar" id="rbBuscar" value="2" />&nbsp;C&eacute;dula&nbsp;&nbsp;';
        $retval .=          '<input type="radio" name="rbBuscar" id="rbBuscar" value="3" />&nbsp;Nombres&nbsp;&nbsp;';
        $retval .=          '<input type="radio" name="rbBuscar" id="rbBuscar" value="4" checked="checked" />&nbsp;Apellidos&nbsp;&nbsp;';
        $retval .=          '<input type="submit" class="boton" name="btnBuscar" value="Buscar" />&nbsp;&nbsp;';
        $retval .=      '</td>';
        $retval .=  '</tr>';
        $retval .=  '<tr class="formulariofila1">';
        $retval .=      '<td>';
        //$retval .=          '<img src="'. IMAGENES_PATH .'/bandera.jpg" width="690px" height="1px" style="border: 0px none;">';
        $retval .=      '</td>';
        $retval .=  '</tr>';
        $retval .= '</table>';
        $retval .= '</form>';

        $retval .= '<div class="ScrollTabla">';
        
            $retval .= '
                        <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                            <tr>
                                <td colspan="10" align="center"><div class="vtip" title="Ingreso <br> [Nuevo Paciente]">
                                    <a href="'. PACIENTE_URL .'paciente.php?btnNuevo=Nuevo">| <img src="'. IMAGENES_PATH .'/nuevapersona.png" title="" width="16px" height="16px"  border="0" /> Nuevo Paciente |</a>
                                </div><td>
                            </tr>
                            <tr class="tablatitulo">
                                <th colspan="10">LISTADO&nbsp;DE&nbsp;PACIENTES&nbsp;REGISTRADOS</th>
                            </tr>
                            <tr class="tablasubtitulo">
                                <th>...</th>                                                                
                                <th align="center">C&eacute;dula</th>
                                <th align="center">Apellidos</th>
                                <th align="center">Nombres</th>
                                <th align="center">Sexo</th>
                                <th align="center">Est.&nbsp;Civil</th>                                
                                <th align="center">Fec.&nbsp;Nac.</th>
                                
                                <th align="center" colspan="3">Acciones</th>
                            </tr>
                        ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $NHC = "";
                    switch (strlen($rst["pacnumerohistoriaclinica"])){
                        case 1:
                                $NHC = "0000".$rst["pacnumerohistoriaclinica"];
                                break;
                        case 2:
                                $NHC = "000".$rst["pacnumerohistoriaclinica"];
                                break;
                        case 3:
                                $NHC = "00".$rst["pacnumerohistoriaclinica"];
                                break;
                        case 4:
                                $NHC = "0".$rst["pacnumerohistoriaclinica"];
                                break;
                        default:
                                $NHC = $rst["pacnumerohistoriaclinica"];
                                break;
                    }

                    $Cedula = "";

                    if ($rst["paccedula"] == "")
                        $Cedula = "-";
                    else
                        $Cedula = $rst["paccedula"];

                    $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';
                    //$retval .= 	'<td align="center">'. $NHC .'</td>';
                    $retval .= 	'<td align="center">'. $Cedula .'</td>';
                    $retval .= 	'<td align="left">'. $rst["pacapellidos"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["pacnombres"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["sexdescripcion"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["estcivdescripcion"] .'</td>';
                    //$retval .= 	'<td align="center">'. $rst["tipsandescripcion"] .'</td>';
                    $retval .= 	'<td align="center">'. $rst["pacfechanacimiento"] .'</td>';
                    //$retval .= 	'<td align="center">'. $rst["insdescripcion"] .'</td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Actualizar <br> [ N&uacute;mero Historia Cl&iacute;nica = '.$rst["pacnumerohistoriaclinica"] .' ]">';
                    $retval .=  '<a href="'. PACIENTE_URL .'paciente.php?btnActualizar=Actualizar&strNumeroHistoriaClinica='. $rst["pacnumerohistoriaclinica"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Eliminar <br> [ N&uacute;mero Historia Cl&iacute;nica = '.$rst["pacnumerohistoriaclinica"] .' ]">';
                    $retval .=  '<a href="'. PACIENTE_URL .'paciente.php?btnEliminar=Eliminar&strNumeroHistoriaClinica='. $rst["pacnumerohistoriaclinica"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Detalle Paciente <br> [ N&uacute;mero Historia Cl&iacute;nica = '.$rst["pacnumerohistoriaclinica"] .' ]">';
                    $retval .=  '<a href="'. PACIENTE_URL .'paciente.php?btnDetalle=Detalle&strNumeroHistoriaClinica='. $rst["pacnumerohistoriaclinica"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                    $i = 1 - $i;
                endforeach;
            }else{
                 $retval .= '<tr class="resultadoincorrecto">';
                 $retval .= 	'<td align="center" colspan="13"><br/><br/><br/><br/><br/><br/><img src="'. IMAGENES_PATH .'/error.png" title="" width="48px" height="48px"  border="0" /><br/><br/>No se encontr&oacute; ning&uacute;n paciente<br/><br/>Intente nuevamente</td>';
                 $retval .= '</tr>';
            }

            $paginacion->setStrNombrePagina("paciente/paciente.php");
            $retval .= '<tr><td colspan="13" align="center">'. $paginacion->getStrPaginacion() .'</td></tr>';
            $retval .= '</table>';
            $retval .= '</div>';

            return $retval;
        }

        public function getStrDetallePersona()
        {
            $query = new clQuery();
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbdetallepaciente('%s');", $this->getStrNumeroHistorialClinico());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            Paciente <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Listado Pacientes <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Detalle Paciente
                        </legend>
                       ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                    $retval .= '<tr>
                                    <td colspan="2" align="center">
                                        <a href="'. PACIENTE_URL .'paciente.php">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> Regresar Listado Pacientes|</a>
                                    <td>
                                </tr>
                                ';
                    
                    $retval .= '<tr class="tablatitulo">
                                    <th colspan="2">DETALLE&nbsp;PACIENTE&nbsp;REGISTRADO</th>
                                </tr>
                                ';

                    $NHC = "";
                    switch (strlen($rst["pacnumerohistoriaclinica"])){
                        case 1:
                                $NHC = "0000".$rst["pacnumerohistoriaclinica"];
                                break;
                        case 2:
                                $NHC = "000".$rst["pacnumerohistoriaclinica"];
                                break;
                        case 3:
                                $NHC = "00".$rst["pacnumerohistoriaclinica"];
                                break;
                        case 4:
                                $NHC = "0".$rst["pacnumerohistoriaclinica"];
                                break;
                        default:
                                $NHC = $rst["pacnumerohistoriaclinica"];
                                break;
                    }

                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">N&uacute;mero Historia Clinica:</th>
                                    <td align="left" class="mensajelectura">  '. $NHC .'</td>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">C&eacute;dula:</th>
                                    <td align="left">  '. $rst["paccedula"] .'</td>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Nombres:</th>
                                    <td align="left">  '. $rst["pacnombres"] .'</td>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Apellidos:</th>
                                    <td align="left"> '. $rst["pacapellidos"] .'</td>
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
                                    <td align="left">  '. $rst["paccalleprincipal"] .'</td>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">N&uacute;mero Casa:</th>
                                    <td align="left">  '. $rst["pacnumerocasa"] .'</td>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Calle Secundaria:</th>
                                    <td align="left">  '. $rst["paccallesecundaria"] .'</td>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Tel&eacute;fono:</th>
                                    <td align="left">  '. $rst["pactelefono"] .'</td>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Celular:</th>
                                    <td align="left">  '. $rst["paccelular"] .'</td>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Em@il:</th>
                                    <td align="left">  '. $rst["pacmail"] .'</td>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Fecha Nacimiento:</th>
                                    <td align="left">  '. $rst["pacfechanacimiento"] .'</td>
                                </tr>
                                ';

                     $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Instituci&oacute;n:</th>
                                    <td align="left">  '. $rst["insdescripcion"] .'</td>
                                </tr>
                                ';

                    $i = 1 - $i;
                endforeach;
            }

            $retval .= '</table>';
            $retval .= '</fieldset>';

            return $retval;
        }

        public function getStrListarPacientes($p)
        {
            $query = new clQuery();

            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL splistarsucursal();");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();
            $retval = "";
            if( count($resultado) > 0 ) {
                $retval .= '<select name="lsPaciente" id="lsPaciente" class="combobox">';
                $retval .= '<option value="">Seleccione&nbsp;Paciente</option>';
                foreach( $resultado as $rst):
                    if($rst["pacnumerohistoriaclinica"] == $p ){
                        $retval .= '<option value="'. $rst["sucursal_id"] .'" selected="selected">'. $rst["sucursal_nombre"] .' </option>';
                    }
                    else{
                        $retval .= '<option value="'. $rst["sucursal_id"] .'" selected="selected">'. $rst["sucursal_nombre"] .' </option>';
                    }
                endforeach;
                $retval .= "</select>";
            }
            return $retval;
        }

    }
?>