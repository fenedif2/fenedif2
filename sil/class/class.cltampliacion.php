<?php	
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.validaciones.php' );
    include_once( CLASS_PATH . "class.clquery.php" );
    include_once( CLASS_PATH . "class.clpaginacion.php" );    
	include_once( CLASS_PATH . "class.cltdtiempo.php" );
	include_once( CLASS_PATH . "class.cltcontable.php" );
	include_once( CLASS_PATH . "class.cltfnegocio.php" );
	include_once( CLASS_PATH . "class.cltfinanciamiento.php" );
	include_once( CLASS_PATH . "class.cltaportado.php" );
	include_once( CLASS_PATH . "class.cltcontabilidad.php" );
	include_once( CLASS_PATH . "class.cltqgarante.php" );
	include_once( CLASS_PATH . "class.clexperiencia.php" );
	include_once( CLASS_PATH . "class.clprovincia.php" );
    include_once( CLASS_PATH . "class.clcanton.php" );
    include_once( CLASS_PATH . "class.clparroquia.php" );
	include_once( CLASS_PATH . "class.clsucursal.php" );
	include_once( CLASS_PATH . "class.clsector.php" );
	
	include_once( CLASS_PATH . "class.cltusuario.php" );
	include_once( CLASS_PATH . "class.cltsectorp.php" );
    class clTampliacion
    {
        private $strTusuario;	
        private $strTnegocio;
		private $strTsectorp;
		private $strCapacitacion;
		private $strInstitucion;
		private $strConocimiento;
		private $strEspacio;
		private $strIngreso;	
		private $strTcontable;
		private $strTcontabilidad;
		private $strTdtiempo;
		private $strTfnegocio;
		private $strProvincia;
		private $strCanton;
        private $strParroquia;
		private $strTfinanciamiento;
		private $strTaportado;
		private $strTgarante;
		private $strSector;
		private $strTqgarante;
		private $strFechaNacimiento;
		private $strSucursal;
        private $StrCodigo;
        private $strNombre;
			
		private $strEtiqueta;
        private $strNombreBoton;
        private $strValorBoton;
        private $strLectura;

        public function __construct()
        {
				
            $this->StrCodigo = "";	
			$this->strNombre = "";
            $this->strTnegocio = "";
			$this->strInstitucion = "";
			$this->strTsectorp = "";
			$this->strConocimiento = "";
			$this->strEspacio = "";
			$this->strIngreso = "";
			$this->strTcontable = "";
			$this->strTcontabilidad = "";	
			$this->strCapacitacion = "";
			$this->strTfnegocio = "";
			$this->strProvincia = "";
            $this->strCanton = "";
            $this->strParroquia = "";
			$this->strSucursal = "";
			$this->strTusuario = "";
			
			$this->strTfinanciamiento= "";
			$this->strTaportado= "";
			$this->strTgarante= "";
			$this->strSector= "";
			$this->strTqgarante= "";
			$this->strBarrio= "";
			$this->strManzana= "";
			$this->strSolar= "";
			$this->strFijo= "";
			$this->strMovil= "";
			$this->strFax= "";
			
			
			$this->strFechaNacimiento = "";
				
                      
			
            $this->strEtiqueta = "";
            $this->strNombreBoton = "";
            $this->strValorBoton = "";
            $this->strLectura = "";
        }
//////////////////// codigo //////////////////
        public function getStrCodigo()
        {
            return $this->StrCodigo;
        }
		public function setStrCodigo($n)
        {
            $this->StrCodigo = $n;
        }
                
////////////// Nombre /////////////////////
        public function getStrNombre()
        {
            return $this->strNombre;
        }
		public function setStrNombre($n)
        {
            $this->strNombre = $n;
        }
////////////// Tipo Negocio /////////////////////		
		public function getstrTnegocio()
        {
            return $this->strTnegocio;
        }
  		public function setstrTnegocio($rp)
        {
            $this->strTnegocio = $rp;
        } 
//////////// Disponibilidad de tiempo////////////////// 
		public function getstrTdtiempo()
        {
            return $this->strTdtiempo;
        }
  		public function setstrTdtiempo($ct)
        {
            $this->strTdtiempo = $ct;
        }     
/////////////////////////Estado  //////////////////////////
 	public function getstrTsectorp()
        {
            return $this->strTsectorp;
        }

        public function setstrTsectorp($et)
        {
            $this->strTsectorp = $et;
        }
/////////////////////////Tusuario  //////////////////////////
 	public function getStrTusuario()
        {
            return $this->strTusuario;
        }

        public function setStrTusuario($et)
        {
            $this->strTusuario = $et;
        }		
/////////////////////Institución///////////////////////
        public function getstrInstitucion()
        {
            return $this->strInstitucion;
        }

        public function setstrInstitucion($e)
        {
            $this->strInstitucion = $e;
        }
/////////////////////Conocimiento//////////////////////////////
		public function getstrConocimiento()
	        {
	            return $this->strConocimiento;
	        }

        public function setstrConocimiento($t)
	        {
	            $this->strConocimiento = $t;
	        }
/////////////////////////tiene Espacio//////////////////////////////
		public function getstrEspacio()
	        {
	            return $this->strEspacio;
	        }

        public function setstrEspacio($ne)
	        {
	            $this->strEspacio = $ne;
	        }
////////////////////////Manejo de ingress y Gastos/////////////////////////////////			
		public function getstrIngreso()
	        {
	            return $this->strIngreso;
	        }

        public function setstrIngreso($ned)
	        {
	            $this->strIngreso = $ned;
	        }
//////////////////////////////conocimiento financiero y contable//////////////////////////////////////////////////////	
		public function getstrTcontable()
	        {
	            return $this->strTcontable;
	        }

        public function setstrTcontable($tcf)
	        {
	            $this->strTcontable = $tcf;
	        }
//////////////////////////////conocimiento contabilidad////////////////////////////////////////////////////////////////
		public function getstrTcontabilidad()
	        {
	            return $this->strTcontabilidad;
	        }

        public function setstrTcontabilidad($cb)
	        {
	            $this->strTcontabilidad = $cb;
	        }
////////////////////////////////Capacitacion//////////////////////////////////////////////////////////////////////
		public function getstrCapacitacion()
	        {
	            return $this->strCapacitacion;
	        }

        public function setstrCapacitacion($exp)
	        {
	            $this->strCapacitacion = $exp;
	        }

////////////////////////////////Frecuencia de Negocio///////////////////////////////
		public function getstrTfnegocio()
	        {
	            return $this->strTfnegocio;
	        }

        public function setstrTfnegocio($ob)
	        {
	            $this->strTfnegocio = $ob;
	        }
//////////////////////////Fecha Ingreso //////////////////////////////////////////
public function getStrFechaNacimiento()
        {
            return $this->strFechaNacimiento;
        }

        public function setStrFechaNacimiento($fn)
        {
            $this->strFechaNacimiento = $fn;
        }

///////////////////////Provincia ///////////////////////////////////////////////			
	    public function getStrProvincia()
        {
            return $this->strProvincia;
        }

        public function setStrProvincia($p)
        {
            $this->strProvincia = $p;
        }						
 ////////////////////////// canton ////////////////////////////////////////
      public function getStrCanton()
        {
            return $this->strCanton;
        }

        public function setStrCanton($c)
        {
            $this->strCanton = $c;
        }
///////////////////////////// parroquia ////////////////////////////////////
        public function getStrParroquia()
        {
            return $this->strParroquia;
        }

        public function setStrParroquia($p)
        {
            $this->strParroquia = $p;
        }
 
 /////////////////////////Sucursal////////////////////////////////////////////////
        public function getStrSucursal()
        {
            return $this->strSucursal;
        }

        public function setStrSucursal($su)
        {
            $this->strSucursal = $su;
        }
 
 /////////////////////////Calle principal ////////////////////////////////////////////////////
         public function getstrTfinanciamiento()
        {
            return $this->strTfinanciamiento;
        }

        public function setstrTfinanciamiento($cp)
        {
            $this->strTfinanciamiento= $cp;
        }
 /////////////////////////Numero ////////////////////////////////////////////////////		
         public function getstrTaportado()
        {
            return $this->strTaportado;
        }

        public function setstrTaportado($cp)
        {
            $this->strTaportado= $cp;
        }
	/////////////////////Transversal //////////////////////////////////////////////////
	     public function getstrTgarante()
        {
            return $this->strTgarante;
        }

        public function setstrTgarante($cp)
        {
            $this->strTgarante= $cp;
        }
	/////////////////////sector//////////////////////////////////////////////////
		public function getStrSector()
        {
            return $this->strSector;
        }

        public function setStrSector($cp)
        {
            $this->strSector= $cp;
        }
	
	/////////////////////Pasaje //////////////////////////////////////////////////
		public function getstrTqgarante()
        {
            return $this->strTqgarante;
        }

        public function setstrTqgarante($cp)
        {
            $this->strTqgarante= $cp;
        }
		
	
 ////////////////////////////////////////////////////////////////////////////
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
            $tsectorp = new clTsectorp();
			$tcontable = new clTcontable();
			$tcontabilidad = new clTcontabilidad();
			$tcapacitacion = new clExperiencia();
			$tespacio = new clExperiencia();
			$tingreso = new clExperiencia();
			$tgarante = new clExperiencia();
			$provincia = new clProvincia();
            $canton = new clCanton();
            $parroquia = new clParroquia();
			$sucursal = new clSucursal();
			$sector = new clSector();
			$tusuario = new clTusuario();
			$tdtiempo = new clTdtiempo();
			$tfnegocio = new clTfnegocio();
			$tfinanciamiento = new clTfinanciamiento();
			$taportado = new clTaportado();
			$tqgarante = new clTqgarante();
			
          $retval  = '<script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.validate.js"></script>
                        <script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.metadata.js"></script>
                       ';

            $retval .= '<br><br><br><br>
                        <script>
                            $(document).ready(function(){
                                    $.metadata.setType( \'attr\', \'validate\' );
                                    $(\'#frmtampliacion\').validate({
                                            rules:{
                                               	lsTusuario: { required: true},
                                              	strTnegocio: { required: true },
                                               	lsTsectorp: { required: true}, 	
											   	lsCapacitacion: { required: true},
											   	strInstitucion: { required: true },
												strConocimiento: { required: true },	
												lsEspacio: { required: true },
												lsIngreso: { required: true },
												lsTcontable: { required: true}, 
												lsTcontabilidad: { required: true}, 
												lsTdtiempo: { required: true},
												lsTfnegocio: { required: true},
												lsProvincia: { required: true },
	                                            lsCanton: { required: true},
	                                            lsParroquia: { required: true },
	                                            lsTfinanciamiento: { required: true },
												lsTaportado: { required: true },
												lsTgarante: { required: true },
												lsSector: { required: true },
	                               				lsTqgarante: { required: true }
                                                  },
                                            messages:{
                                              	lsTusuario: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                                strTnegocio: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
                                                lsTsectorp: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
                                                lsCapacitacion: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
												strInstitucion: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},	
												strConocimiento: { required: "<span class=\'resultadoincorrecto\'><br>*Ingrese solo Numeros</span>"},
												lsEspacio: { required: "<span class=\'resultadoincorrecto\'><br>*Ingrese solo Numeros</span>"},
												lsIngreso: { required: "<span class=\'resultadoincorrecto\'><br>*Ingrese solo Numeros</span>"},
												lsTcontable: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
												lsTcontabilidad: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
												lsTdtiempo: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
												llsTfnegocio: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
												lsProvincia: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
	                                            lsCanton: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
	                                            lsParroquia: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
	                                            lsTfinanciamiento: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                                lsTaportado: { required: "<span class=\'resultadoincorrecto\'>*Ingrese solo Numeros</span>"},
												lsTgarante: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
												lsSector: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
												lsTqgarante: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"}
												}
                                    });
                                    
                                    $("#lsProvincia").change(function () {
                                    $("#lsProvincia option:selected").each(function () {
                                            var provincia = $(this).val();
                                            $.post( "'. TAMPLIACION_URL .'tampliacion.php", { btnBuscar: "Canton",
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
                                            $.post( "'. TAMPLIACION_URL .'tampliacion.php", { btnBuscar: "Parroquia",
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
		  
            $retval .= '<form id="frmtampliacion" action="'. TAMPLIACION_URL .'tampliacion.php" method="POST">';

            $Regresar = "regresar('". TAMPLIACION_URL . "tampliacion.php')";

            $retval .= '<fieldset class="fieldsetPequeno">';
            $retval .= '<legend class="etiquetaborde">
                            AMPLIACIÓN DE NEGOCIO <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO AMPLIACIÓN DE NEGOCIO<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> '. $this->getStrEtiqueta() .'
                          </legend>
                       ';
            $NHC = "";		   
            $retval .= '
                        <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">'. $this->getStrEtiqueta() .'</td>
                            	<input class="textbox" id="strCodigo" name="strCodigo" type="hidden" maxlength="50" value="'. $this->getStrCodigo() .'" />
                            </tr>
							 <tr class="formulariofila1">
                                <td align="right"><b>Usuario:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsTusuario" id="lsTusuario"  class="combobox">
	                                        '. $tusuario->getStrListar($this->getStrTusuario()) .'
	                                    </select>
                                </td> 
                             	<td  align="right"><b>Tipo de Negocio:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strTnegocio" name="strTnegocio" type="text" maxlength="50" value="'. $this->getstrTnegocio() .'" />
                                </td>
                            </tr>
                            <tr class="formulariofila1">
                            	<td align="right"><b>Sector Productivo:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsTsectorp" id="lsTsectorp"  class="combobox">
	                                        '. $tsectorp->getStrListar($this->getstrTsectorp()) .'
	                                    </select>
                                </td> 
                                <td align="right"><b>Ha Recibido Capacitación:&nbsp;</b></td>
                                <td align="left">                                    
                                    <select name="lsCapacitacion" id="lsCapacitacion"  class="combobox">
                                        '. $tcapacitacion->getStrListar($this->getstrCapacitacion()) .'
                                    </select>
                                </td>
                                
                            </tr>
                            <tr class="formulariofila1">
                                 <td  align="right"><b>¿En que Institución?:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strInstitucion" name="strInstitucion" type="text" maxlength="100" value="'. $this->getstrInstitucion() .'" />
                                </td>
                             		<td  align="right"><b>Posee conocimiento para la actividad?:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strConocimiento" name="strConocimiento" type="text" maxlength="100"  value="'. $this->getstrConocimiento() .'" />
                                </td>
                            </tr>
                            <tr class="formulariofila1">
                            	<td align="right"><b>Cuenta con espacio para llevar su negocio:&nbsp;</b></td>
                                <td align="left">                                    
                                    <select name="lsEspacio" id="lsEspacio"  class="combobox">
                                        '. $tespacio->getStrListar($this->getstrEspacio()) .'
                                    </select>
                                </td>
                                <td align="right"><b>¿Manejo de Ingresos y Gastos?:&nbsp;</b></td>
                                <td align="left">                                    
                                    <select name="lsIngreso" id="lsIngreso"  class="combobox">
                                        '. $tingreso->getStrListar($this->getstrIngreso()) .'
                                    </select>
                                </td>
                            </tr>
                            <tr class="formulariofila1">
                                <td align="right"><b>Conocimientos Contables/Financieros:&nbsp;</b></td>
                                <td align="left">                                    
                                    <select name="lsTcontable" id="lsTcontable"  class="combobox">
                                        '. $tcontable->getStrListar($this->getstrTcontable()) .'
                                    </select>
                                </td>
                                <td align="right"><b>Conocimientos de Contabilidad:&nbsp;</b></td>
	                                <td align="left">                                    
	                                    <select name="lsTcontabilidad" id="lsTcontabilidad"  class="combobox">
	                                        '. $tcontabilidad->getStrListar($this->getstrTcontabilidad()) .'
	                                    </select>
                                </td> 
                            </tr>
                            <tr class="formulariofila1">
                                <td align="right"><b>Disponibilidad de Tiempo:&nbsp;</b></td>
	                                <td align="left">                                    
	                                    <select name="lsTdtiempo" id="lsTdtiempo"  class="combobox">
	                                        '. $tdtiempo->getStrListar($this->getstrTdtiempo()) .'
	                                    </select>
                                </td> 
                             	<td align="right"><b>Frecuencia del Negocio:&nbsp;</b></td>
	                                <td align="left">                                    
	                                    <select name="lsTfnegocio" id="lsTfnegocio"  class="combobox">
	                                        '. $tfnegocio->getStrListar($this->getstrTfnegocio()) .'
	                                    </select>
                                </td> 
                            </tr>
                           

  <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">DIRECCIÓN DEL NEGOCIO</td>
                            </tr>
							
                             <tr class="formulariofila1">
                                <td align="right"><b>Provincia:&nbsp;</b></td>
                                <td align="left">                                    
                                    <select name="lsProvincia" id="lsProvincia"  class="combobox">
                                        '. $provincia->getStrListar($this->getStrProvincia()) .'
                                    </select>
                                </td>
              
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
                                <td  align="right"><b>Sucursal</b></td>
                                <td align="left">
                                 	<input class="textbox" id="lsSucursal" name="lsSucursal" type="hidden" maxlength="50" value="'. $this->getStrSucursal() .'" />
                                </td>
                            </tr>       
                            <tr class="formulariofila1">
                                 <td align="right"><b>Monto Financiamiento:&nbsp;</b></td>
	                                <td align="left">                                    
	                                    <select name="lsTfinanciamiento" id="lsTfinanciamiento"  class="combobox">
	                                        '. $tfinanciamiento->getStrListar($this->getstrTfinanciamiento()) .'
	                                    </select>
                                </td> 
                             	<td align="right"><b>Monto Aportado:&nbsp;</b></td>
	                                <td align="left">                                    
	                                    <select name="lsTaportado" id="lsTaportado"  class="combobox">
	                                        '. $taportado->getStrListar($this->getstrTaportado()) .'
	                                    </select>
                                </td> 
                            </tr>
                            <tr class="formulariofila1">
                                 <td align="right"><b>Podría Presentar un Garante:&nbsp;</b></td>
	                                <td align="left">                                    
	                                    <select name="lsTgarante" id="lsTgarante"  class="combobox">
	                                        '. $tgarante->getStrListar($this->getstrTgarante()) .'
	                                    </select>
                                </td> 
                             	 <td  align="right"><b>Sector:</b></td>
                                <td align="left">
                                    <select name="lsSector" id="lsSector" class="combobox">
                                        '. $sector->getStrListar($this->getStrSector()) .'
                                    </select>                           
                            </tr>
                            <tr class="formulariofila1">
                                 <td align="right"><b>Escoja un Garante:&nbsp;</b></td>
	                                <td align="left">                                    
	                                    <select name="lsTqgarante" id="lsTqgarante"  class="combobox">
	                                        '. $tqgarante->getStrListar($this->getstrTqgarante()) .'
	                                    </select>
                                </td>
                                 ';
                           if($_SESSION["usuario"]["tipo"]==2 || $_SESSION["usuario"]["tipo"]==1 )
							{
							$retval .= ' 
                             	<td  align="right"><b>Fecha&nbsp;Ingreso:</b></td>
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
                                 ';
							}
								else 
								{
								$retval .= '
								<td  align="right"><b>Fecha&nbsp;Ingreso:</b></td>
                                <td align="left">
                                    <input name="dtFecha" type="text" id="dtFecha" value="'. $this->getStrFechaNacimiento() .'" size="10" readonly="readonly" style="background-color:#F7D358" class="textboxfecha" />
            
                              ';
									
								}
                            $retval .= '
			              </tr>
                          <tr>
                                <td colspan="4" class="formulariofila1" align="center">
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
            $ProcedimientoAlmacenado = sprintf("CALL spingresartanegocio('%s', '%s', '%s', '%s', '%s', 
            '%s', '%s', '%s', '%s', '%s','%s', '%s', '%s','%s','%s','%s','%s','%s','%s','%s');",
            $this->getStrTusuario(), $this->getstrTnegocio(), $this->getstrTsectorp(),$this->getstrCapacitacion(),
            $this->getstrInstitucion(),$this->getstrConocimiento(),$this->getstrEspacio(),$this->getstrIngreso(), $this->getstrTcontable(),
			$this->getstrTcontabilidad(),$this->getstrTdtiempo(),$this->getstrTfnegocio(),$this->getStrParroquia(),
			$this->getstrTfinanciamiento(),$this->getstrTaportado(),$this->getstrTgarante(),$this->getStrSector(),
			$this->getstrTqgarante(),$this->getStrFechaNacimiento(),$_SESSION["usuario"]["suc"]);
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);

            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Nombres = [ '.$this->getStrTusuario().' ] Tipo_negocio = [ '. $this->getstrTnegocio().' ] Fecha_Ingreso= ['. $this->getStrFechaNacimiento().' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'G', 'tanegocio', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL spactualizartanegocio('%s','%s','%s', '%s', '%s', '%s', 
            '%s', '%s', '%s', '%s', '%s','%s', '%s', '%s','%s','%s','%s','%s','%s','%s');",
            $this->getStrCodigo(),$this->getStrTusuario(), $this->getstrTnegocio(), $this->getstrTsectorp(),$this->getstrCapacitacion(),
            $this->getstrInstitucion(),$this->getstrConocimiento(),$this->getstrEspacio(),$this->getstrIngreso(), $this->getstrTcontable(),
			$this->getstrTcontabilidad(),$this->getstrTdtiempo(),$this->getstrTfnegocio(),$this->getStrParroquia(),
			$this->getstrTfinanciamiento(),$this->getstrTaportado(),$this->getstrTgarante(),$this->getStrSector(),
			$this->getstrTqgarante(),$this->getStrFechaNacimiento());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            if($query->getStrSqlInsertUpdateDelete()){
                 //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Nombres = [ '.$this->getStrTusuario().' ] Tipo_negocio = [ '. $this->getstrTnegocio().' ] Fecha_Ingreso= ['. $this->getStrFechaNacimiento().' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'A', 'tanegocio', $descripcion);
                $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
                $query->getStrSqlInsertUpdateDelete();
                $resultado = true;
            }

            return $resultado;
        }
 public function getStrEliminar() 
        {
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL speliminartanegocio('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlInsertUpdateDelete();

           if($query->getStrSqlInsertUpdateDelete()){
               //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Nombres = [ '.$this->getStrTusuario().' ] Tipo_negocio = [ '. $this->getstrTnegocio().' ] Fecha_Ingreso= ['. $this->getStrFechaNacimiento().' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'E', 'tanegocio', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL spbtanegocio('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
            foreach( $resultado as $rst): 
				$this->setStrCodigo($rst['tanegocio_id']);  
		        $this->setStrTusuario($rst['id_usuario']);   
	            $this->setstrTnegocio($rst['tnegocio']); 
				$this->setstrTsectorp($rst['tsectorp_id']); 
				$this->setstrCapacitacion($rst['capacitacion_id']);
				$this->setstrInstitucion($rst['institucion']);
				$this->setstrConocimiento($rst['conocimiento']); 
				$this->setstrEspacio($rst['espacio']);   
				$this->setstrIngreso($rst['ingresos']);   
				$this->setstrTcontable($rst['tcontable_id']);   
				$this->setstrTcontabilidad($rst['tcontabilidad_id']);  
				$this->setstrTdtiempo($rst['tdtiempo_id']);   
				$this->setstrTfnegocio($rst['tfnegocio_id']); 
				$this->setStrProvincia(substr($rst['parcodigo'],0,2));
	            $this->setStrCanton(substr($rst['parcodigo'],0,4));  
				$this->setStrParroquia($rst['parcodigo']);
				$this->setstrTfinanciamiento($rst['tfinanciamiento_id']);
				$this->setstrTaportado($rst['taportado_id']);  
				$this->setstrTgarante($rst['tgarante_id']);
				$this->setStrSector($rst['sector']); 
				$this->setstrTqgarante($rst['tqgarante_id']); 
				$this->setStrFechaNacimiento($rst['fecha_ingreso']);  
				$this->setStrSucursal($rst['sucursal']);   
				 
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
            $sucursal=$_SESSION["usuario"]["suc"];
            $ProcedimientoAlmacenado = sprintf("CALL sptotaltanegocio('%d');", $sucursal);
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultadototal = $query->getStrSqlSelect();

            foreach( $resultadototal as $rst):
                $paginacion->setStrTotalRegistros($rst["accestotal"]);
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
            $re=($paginacion->getStrPaginaActual() - 1) * $paginacion->getStrRegistrosPorPagina();
			 $pa=$paginacion->getStrRegistrosPorPagina();
			 $cf=$_SESSION["usuario"]["suc"];
            $ProcedimientoAlmacenado = sprintf("CALL splistartanegocio('%d','%d','%d');","$re", "$pa","$cf");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            AMPLIACIÓN DE NEGOCIO<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO AMPLIACIÓN DE NEGOCIO</legend>
                       ';
            $retval .= '
                        <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                            <tr>
                                <td colspan="11" align="center"><div class="vtip" title="Ingreso<br> [NUEVA AMPLIACIÓN DE NEGOCIO]">
                                    <a href="'. TAMPLIACION_URL .'tampliacion.php?btnNuevo=Nuevo">| <img src="'. IMAGENES_PATH .'/rptstocksucursal.png" title="" width="16px" height="16px"  border="0" /><img src="'. IMAGENES_PATH .'/nuevo.png" title="" width="16px" height="16px"  border="0" />NUEVA AMPLIACIÓN DE NEGOCIO|</a>
                                </div><td>
                            </tr>';
                            $paginacion->setStrNombrePagina("cformativo/tampliacion.php");
            				$retval .= '<tr><td colspan="12" align="center">'. $paginacion->getStrPaginacion() .'</td></tr>
                            <tr class="tablatitulo">
                                <th colspan="17">LISTADO&nbsp;DE&nbsp;AMPLIACION DE NEGOCIO&nbsp;REGISTRADOS</th>
                            </tr>
                            <tr class="tablasubtitulo">
                                <th>...</th>  
                                                                
                                <th align="center">Ampliación de Negocio</th>
                                <th align="center">Apellido y Nombre Usuario</th>
                                <th align="center">Tipo de Negocio</th>
                                <th align="center">Sector Productivo</th>
                                <th align="center">Fec. Ingreso</th>
                                <th align="center" colspan="3">Acciones</th>
                            </tr>
                        ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["tanegocio_id"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["apellido_paterno"] .' '. $rst["primer_nombre"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["tnegocio"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["tsectorp_descripcion"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["fecha_ingreso"] .'</td>';
                    $retval .= 	'</div></td>';
                  	$retval .= 	'<td align="center"><div class="vtip" title="ACTUALIZAR AMPLIACIÓN DE NEGOCIO<br> [ codigo = '.$rst["tanegocio_id"] .' ]">';
                    $retval .=  '<a href="'. TAMPLIACION_URL .'tampliacion.php?btnActualizar=Actualizar&strCodigo='. $rst["tanegocio_id"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    if($_SESSION["usuario"]["tipo"]==2 || $_SESSION["usuario"]["tipo"]==1 )
							{
                    $retval .= 	'<td align="center"><div class="vtip" title="ELIMINAR AMPLIACIÓN DE NEGOCIO <br> [ codigo = '.$rst["tanegocio_id"] .' ]">';
                    $retval .=  '<a href="'. TAMPLIACION_URL .'tampliacion.php?btnEliminar=Eliminar&strCodigo='. $rst["tanegocio_id"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    		}
                    $retval .= 	'<td align="center"><div class="vtip" title="DETALLE AMPLIACIÓN DE NEGOCIO <br> [ codigo = '.$rst["tanegocio_id"] .' ]">';
                    $retval .=  '<a href="'. TAMPLIACION_URL .'tampliacion.php?btnDetalle=Detalle&strCodigo='. $rst["tanegocio_id"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                    $i = 1 - $i;
                endforeach;
            }

            //$paginacion->setStrNombrePagina("cformativo/tampliacion.php");
            //$retval .= '<tr><td colspan="12" align="center">'. $paginacion->getStrPaginacion() .'</td></tr>';
            $retval .= '</table>';
            $retval .= '</fieldset>';
            return $retval;
        }

public function getStrDetallePersona()
        {
            $query = new clQuery();
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbdetalletanegocio('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            Ampliación de Negocio<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Listado Ampliación de Negocio <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Detalle Ampliación de Negocio
                        </legend>
                       ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                    $retval .= '<tr>
                                    <td colspan="2" align="center">
                                        <a href="'. TAMPLIACION_URL .'tampliacion.php">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> Regresar Listado Ampliación de Negocio|</a>
                                    <td>
                                </tr>
                                ';
                    
                    $retval .= '<tr class="tablatitulo">
                                    <th colspan="2">DETALLE&nbsp;Ampliación de Negocio;REGISTRADO</th>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Código:</th>
                                    <td align="left">  '. $rst["tanegocio_id"] .'</td>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Nombres y Apellidos:</th>
                                    <td align="left">  '. $rst["apellido_paterno"] .'  '. $rst["primer_nombre"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Tipo de Negocio:</th>
                                    <td align="left"> '. $rst["tnegocio"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Sector Productivo:</th>
                                    <td align="left"> '. $rst["tsectorp_descripcion"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">¿Ha recibido Capacitación?:</th>
                                    <td align="left"> '. $rst["capacitacion_detalle"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">¿En que Institucion?:</th>
                                    <td align="left"> '. $rst["institucion"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">¿Posee conocimiento para la actividad?:</th>
                                    <td align="left"> '. $rst["conocimiento"] .'</td>
                                </tr>
                                ';		
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">¿Cuenta con espacio para su negocio?:</th>
                                    <td align="left"> '. $rst["espacio_detalle"] .'</td>
                                </tr>
                                ';		
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">¿Manejo de ingresos y gastos?:</th>
                                    <td align="left"> '. $rst["ingreso_detalle"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">¿Posee conocimientos contables?:</th>
                                    <td align="left"> '. $rst["contable_descripcion"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">¿Posee conocimientos de contabilidad?:</th>
                                    <td align="left"> '. $rst["tcontabilidad_descripcion"] .'</td>
                                </tr>
                                ';		
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">¿Disponibilidad de tiempo?:</th>
                                    <td align="left"> '. $rst["tdtiempo_descripcion"] .'</td>
                                </tr>
                                ';		
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">¿Frecuencia de negocio?:</th>
                                    <td align="left"> '. $rst["tfnegocio_descripcion"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Parroquia:</th>
                                    <td align="left"> '. $rst["pardescripcion"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Monto Financiamiento:</th>
                                    <td align="left"> '. $rst["tfinanciamiento_descripcion"] .'</td>
                                </tr>
                                ';		
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Monto Aportado:</th>
                                    <td align="left"> '. $rst["taportado_descripcion"] .'</td>
                                </tr>
                                ';			
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">¿Podria presentar un garante?:</th>
                                    <td align="left"> '. $rst["garante_descripcion"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Sector:</th>
                                    <td align="left"> '. $rst["tipoparroquia_nombre"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Garante:</th>
                                    <td align="left"> '. $rst["tqgarante_descripcion"] .'</td>
                                </tr>
                                ';										
																																																		
                     $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Fecha de Registro:</th>
                                    <td align="left">  '. $rst["fecha_ingreso"] .'</td>
                                </tr>
                                ';

                    $i = 1 - $i;
                endforeach;
            }

            $retval .= '</table>';
            $retval .= '</fieldset>';
            return $retval;
        }

        
    }
?>