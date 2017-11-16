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
	include_once( CLASS_PATH . "class.cltproduccion.php" );
	include_once( CLASS_PATH . "class.cltruc.php" );
	include_once( CLASS_PATH . "class.cltusuario.php" );
	include_once( CLASS_PATH . "class.cltsectorp.php" );
	include_once( CLASS_PATH . "class.clproduccion.php" );
	include_once( CLASS_PATH . "class.cltfplanteado.php" );
	include_once( CLASS_PATH . "class.cltantiguedadn.php" );
	include_once( CLASS_PATH . "class.cltventas.php" );
	include_once( CLASS_PATH . "class.cltcapital.php" );
	include_once( CLASS_PATH . "class.cltipocredito.php" );
	include_once( CLASS_PATH . "class.cltpuntual.php" );
	include_once( CLASS_PATH . "class.cltdeudasquien.php" );
	
    class clTemprendimiento
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
		private $strTproduccion;
		private $strNtrabajador;
		private $strTmaquinaria;
		private $strmaquinaria;
		private $strTformacion;
		private $strformacion;
		private $strTfamilia;
		private $strfamilia;
        private $StrCodigo;
        private $strNombre;
		private $strTcliente;
		private $strTruc;
		private $strTproducto;
		private $strproduccion; 
		private $strTfplanteado; 
		private $strTantiguedadn; 
		private $strTventas; 
		private $strtelefono; 
		private $strmail; 
		private $strtcompleto; 
		private $strtparcial; 
		private $strtrequerido; 
		private $strrequerido; 
		private $strtdeclaraciones; 
		private $strtmarca; 
		private $strmarca; 
		private $strtcapital; 
		private $strtclientes; 
		private $strtcredito; 
		private $strtipocredito; 
		private $strtretrasado; 
		private $strretrasado; 	
		private $strtpuntual; 
		private $strtdeudas; 
		private $strtdeudasquien; 
		
		
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
			$this->strTproduccion = "";
			$this->strTformacion = "";
			$this->strformacion = "";
			$this->strTfamilia = "";
			$this->strfamilia = "";
			$this->strNtrabajador = "";
			$this->strTmaquinaria = "";
			$this->strmaquinaria = "";
			$this->strTcliente = "";
			$this->strTruc = "";
			$this->strTproducto = "";
			$this->strproduccion = "";
			$this->strTfplanteado = "";
			$this->strTantiguedadn = "";
			$this->strTventas = "";
			$this->strtelefono = "";
			$this->strmail = "";
			$this->strtcompleto = "";
			$this->strtparcial = "";
			$this->strtrequerido = "";
			$this->strrequerido = "";
			$this->strtdeclaraciones = "";
			$this->strtmarca = "";
			$this->strmarca = "";
			$this->strtclientes = "";
			$this->strtcapital = "";
			$this->strtcredito = "";
			$this->strtipocredito = "";
			$this->strtretrasado = "";
			$this->strretrasado = "";
			$this->strtpuntual = "";
			$this->strtdeudas = "";
			$this->strtdeudasquien = "";
			
			$this->strTfinanciamiento= "";
			$this->strTaportado= "";
			$this->strTgarante= "";
			$this->strSector= "";
			$this->strTqgarante= "";
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
////////////// Tipo formacion /////////////////////
        public function getStrTformacion()
        {
            return $this->strTformacion;
        }
		public function setStrTformacion($n)
        {
            $this->strTformacion= $n;
        } 
////////////// crédito /////////////////////
        public function getStrtcredito()
        {
            return $this->strtcredito;
        }
		public function setStrtcredito($n)
        {
            $this->strtcredito= $n;
        } 
////////////// deudas /////////////////////
        public function getStrtdeudas()
        {
            return $this->strtdeudas;
        }
		public function setStrtdeudas($n)
        {
            $this->strtdeudas= $n;
        } 
////////////// deudas quien/////////////////////
        public function getStrtdeudasquien()
        {
            return $this->strtdeudasquien;
        }
		public function setStrtdeudasquien($n)
        {
            $this->strtdeudasquien= $n;
        }				
////////////// puntual /////////////////////
        public function getStrtpuntual()
        {
            return $this->strtpuntual;
        }
		public function setStrtpuntual($n)
        {
            $this->strtpuntual= $n;
        } 		
////////////// Tipo crédito /////////////////////
        public function getStrtipocredito()
        {
            return $this->strtipocredito;
        }
		public function setStrtipocredito($n)
        {
            $this->strtipocredito= $n;
        } 	
////////////// Tipo retrasado /////////////////////
        public function getStrtretrasado()
        {
            return $this->strtretrasado;
        }
		public function setStrtretrasado($n)
        {
            $this->strtretrasado= $n;
        } 		
////////////// retrasado /////////////////////
        public function getStrretrasado()
        {
            return $this->strretrasado;
        }
		public function setStrretrasado($n)
        {
            $this->strretrasado= $n;
        } 									
///////////// tdeclaraciones/////////////////////
        public function getStrtdeclaraciones()
        {
            return $this->strtdeclaraciones;
        }
		public function setStrtdeclaraciones($n)
        {
            $this->strtdeclaraciones= $n;
        }
///////////// tmarca/////////////////////
        public function getStrtmarca()
        {
            return $this->strtmarca;
        }
		public function setStrtmarca($n)
        {
            $this->strtmarca= $n;
        } 
///////////// tclientes/////////////////////
        public function getStrtclientes()
        {
            return $this->strtclientes;
        }
		public function setStrtclientes($n)
        {
            $this->strtclientes= $n;
        } 	
///////////// tcapital/////////////////////
        public function getStrtcapital()
        {
            return $this->strtcapital;
        }
		public function setStrtcapital($n)
        {
            $this->strtcapital= $n;
        } 					
///////////// marca/////////////////////
        public function getStrmarca()
        {
            return $this->strmarca;
        }
		public function setStrmarca($n)
        {
            $this->strmarca= $n;
        } 					 		
////////////// trequerido /////////////////////
        public function getStrtrequerido()
        {
            return $this->strtrequerido;
        }
		public function setStrtrequerido($n)
        {
            $this->strtrequerido= $n;
        } 
////////////// requerido /////////////////////
        public function getStrrequerido()
        {
            return $this->strrequerido;
        }
		public function setStrrequerido($n)
        {
            $this->strrequerido= $n;
        }				
////////////// telefono /////////////////////
        public function getStrtelefono()
        {
            return $this->strtelefono;
        }
		public function setStrtelefono($n)
        {
            $this->strtelefono= $n;
        } 
////////////// mail /////////////////////
        public function getStrmail()
        {
            return $this->strmail;
        }
		public function setStrmail($n)
        {
            $this->strmail= $n;
        } 
////////////// tcompleto /////////////////////
        public function getStrtcompleto()
        {
            return $this->strtcompleto;
        }
		public function setStrtcompleto($n)
        {
            $this->strtcompleto= $n;
        } 
////////////// tparcial /////////////////////
        public function getStrtparcial()
        {
            return $this->strtparcial;
        }
		public function setStrtparcial($n)
        {
            $this->strtparcial= $n;
        } 								 
////////////// Antiguedad Negocio /////////////////////
        public function getStrTantiguedadn()
        {
            return $this->strTantiguedadn;
        }
		public function setStrTantiguedadn($n)
        {
            $this->strTantiguedadn= $n;
        } 
////////////// ventas /////////////////////
        public function getStrTventas()
        {
            return $this->strTventas;
        }
		public function setStrTventas($n)
        {
            $this->strTventas= $n;
        }  			 		
////////////// tfplanteado /////////////////////
        public function getStrTfplanteado()
        {
            return $this->strTfplanteado;
        }
		public function setStrTfplanteado($n)
        {
            $this->strTfplanteado= $n;
        }  		
////////////// Tipo RUC /////////////////////
        public function getStrTruc()
        {
            return $this->strTruc;
        }
		public function setStrTruc($n)
        {
            $this->strTruc= $n;
        }  	
////////////// Producto /////////////////////
        public function getStrTproducto()
        {
            return $this->strTproducto;
        }
		public function setStrTproducto($n)
        {
            $this->strTproducto= $n;
        }  
////////////// Produccion /////////////////////
        public function getStrproduccion()
        {
            return $this->strproduccion;
        }
		public function setStrproduccion($n)
        {
            $this->strproduccion= $n;
        }  						
////////////// Clientes /////////////////////
        public function getStrTcliente()
        {
            return $this->strTcliente;
        }
		public function setStrTcliente($n)
        {
            $this->strTcliente= $n;
        }  		
 ////////////// Formacion /////////////////////
       public function getStrformacion()
        {
            return $this->strformacion;
        }
		public function setStrformacion($n)
        {
            $this->strformacion= $n;
        }  	
////////////// familia /////////////////////
        public function getStrTfamilia()
        {
            return $this->strTfamilia;
        }
		public function setStrTfamilia($n)
        {
            $this->strTfamilia= $n;
        } 
////////////// familia nombre /////////////////////
        public function getStrfamilia()
        {
            return $this->strfamilia;
        }
		public function setStrfamilia($n)
        {
            $this->strfamilia= $n;
        }  				  		
 ////////////// Tipo Maquinaria /////////////////////
        public function getStrTmaquinaria()
        {
            return $this->strTmaquinaria;
        }
		public function setStrTmaquinaria($n)
        {
            $this->strTmaquinaria= $n;
        }  
 //////////////  Maquinaria /////////////////////
        public function getStrmaquinaria()
        {
            return $this->strmaquinaria;
        }
		public function setStrmaquinaria($n)
        {
            $this->strmaquinaria= $n;
        }  						
 ////////////// Produnccion /////////////////////
        public function getStrTproduccion()
        {
            return $this->strTproduccion;
        }
		public function setStrTproduccion($n)
        {
            $this->strTproduccion = $n;
        }  
////////////// Numero de trabajadores /////////////////////
        public function getStrNtrabajador()
        {
            return $this->strNtrabajador;
        }
		public function setStrNtrabajador($n)
        {
            $this->strNtrabajador = $n;
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
			$tproduccion = new clTproduccion();
			$tmaquinaria = new clExperiencia();
			$tformacion = new clExperiencia();
			$tfamilia = new clExperiencia();
			$truc = new clTruc();
			$produccion = new clProduccion();
			$tfplanteado = new clTfplanteado();
			$tantiguedadn = new clTantiguedadn();
			$tventas = new clTventas();
			$trequerido = new clExperiencia();
			$tdeclaraciones = new clExperiencia();
			$tmarca = new clExperiencia();
			$tcapital = new clTcapital();
			$tcredito = new clExperiencia();
			$tipocredito = new clTipocredito();
			$tretrasado = new clExperiencia();
			$tpuntual = new clTpuntual();
			$tdeudas = new clExperiencia();
			$tdeudasquien = new clTdeudasquien();
			
          $retval  = '<script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.validate.js"></script>
                        <script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.metadata.js"></script>
                       ';

            $retval .= '<br><br><br><br>
                        <script>
                            $(document).ready(function(){
                                    $.metadata.setType( \'attr\', \'validate\' );
                                    $(\'#frmtemprendimiento\').validate({
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
	                               				lsTqgarante: { required: true },
	                               				dtFecha: { required: true },
	                               				lsTproduccion: { required: true },
	                               				strNtrabajador: { required: true },
	                               				lsTmaquinaria: { required: true },
	                               				strmaquinaria: { required: true },
	                               				lsTformacion: { required: true },
	                               				strformacion: { required: true },
	                               				lsTfamilia: { required: true },
	                               				strfamilia: { required: true },
	                               				strtcliente: { required: true },
	                               				lsTruc: { required: true },
	                               				strtproducto: { required: true },
	                               				lsproduccion: { required: true },
	                               				lstfplanteado: { required: true },
												lstantiguedadn: { required: true },
												lstventas: { required: true },
												strTelefono: { required: true },
												strmail: { required: true },
												strtcompleto: { required: true },
												strtparcial: { required: true },
												lstrequerido: { required: true },
												strrequerido: { required: true },
												lstdeclaraciones: { required: true },
												lstmarca: { required: true },
												strmarca: { required: true },
												strtclientes: { required: true },
												lstcapital: { required: true },
												lstcredito: { required: true },
												lstipocredito: { required: true },
												lstretrasado: { required: true },
												strretrasado: { required: true },
												lstpuntual: { required: true },
												lstdeudas: { required: true },
												lstdeudasquien: { required: true }
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
												lsTqgarante: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
												dtFecha: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
												lsTproduccion: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
												strNtrabajador: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
												lsTmaquinaria: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
												strmaquinaria: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
												lsTformacion: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
												strformacion: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
												lsTfamilia: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
												strfamilia: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
												strtcliente: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
												lsTruc: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
												strtproducto: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
												lsproduccion: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
												lstfplanteado: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
												lstantiguedadn: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
												lstventas: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
												strTelefono: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
												strmail: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
												strtcompleto: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
												strtparcial: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
												lstrequerido: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
												strrequerido: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
												lstdeclaraciones: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
												lstmarca: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
												strmarca: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
												strtclientes: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
												lstcapital: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
												lstcredito: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
												lstipocredito: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
												lstretrasado: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
												strretrasado: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
												lstpuntual: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
												lstdeudas: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
												lstdeudasquien: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"}
												}
                                    });
                                    
                                    $("#lsProvincia").change(function () {
                                    $("#lsProvincia option:selected").each(function () {
                                            var provincia = $(this).val();
                                            $.post( "'. TEMPRENDIMIENTO_URL .'temprendimiento.php", { btnBuscar: "Canton",
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
                                            $.post( "'. TEMPRENDIMIENTO_URL .'temprendimiento.php", { btnBuscar: "Parroquia",
                                                                                      strCodigoCanton: canton                                                                                      
                                                                                    },
                                        function(data){
                                                $("#lsParroquia").html(data);                                                
                                        });
                                    });
                                 });
								 
								 $("#lsTgarante").change(function() 
                 				{
							  if($(this).val() == "2") 
							  {
							  	$("#lsTqgarante").attr("disabled", "disabled");
								$("#lsTqgarante").css("background-color", "#F5DA81"); 
							 }
							  
	 						});
							 $("#lsTfamilia").change(function() 
                 				{
							  if($(this).val() == "2") 
							  {
							  	$("#strfamilia").attr("disabled", "disabled");
								$("#strfamilia").css("background-color", "#F5DA81"); 
							 }
							  
	 						});	 
                            });
                        </script>
                       ';
		  
            $retval .= '<form id="frmtemprendimiento" action="'. TEMPRENDIMIENTO_URL .'temprendimiento.php" method="POST">';

            $Regresar = "regresar('". TEMPRENDIMIENTO_URL . "temprendimiento.php')";

            $retval .= '<fieldset class="fieldsetPequeno">';
            $retval .= '<legend class="etiquetaborde">
                            EMPRENDIMINETO <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO EMPRENDIMINETO<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> '. $this->getStrEtiqueta() .'
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
                                <td colspan="4" align="center" class="tablatitulo">DIRECCIÓN EMPRENDIMIENTO</td>
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
								$retval .= '<td  align="right"><b>Fecha&nbsp;Ingreso:</b></td>
                                <td align="left">
                                    <input name="dtFecha" type="text" id="dtFecha" value="'. $this->getStrFechaNacimiento() .'" size="10" readonly="readonly" style="background-color:#F7D358" class="textboxfecha" />
                              ';
									
								}
                            $retval .= '
			              </tr>
			              <tr class="formulariofila1">
                                 <td align="right"><b>Producción Prevista:&nbsp;</b></td>
	                                <td align="left">                                    
	                                    <select name="lsTproduccion" id="lsTproduccion"  class="combobox">
	                                        '. $tproduccion->getStrListar($this->getStrTproduccion()) .'
	                                    </select>
                                </td> 
                             	<td  align="right"><b>Número de Trabajadores:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strNtrabajador" name="strNtrabajador" type="text" maxlength="100" '. JS_ONLY_NUMS .' value="'. $this->getStrNtrabajador() .'" />
                                </td>
			              </tr>					
						<tr class="formulariofila1">
                                 <td align="right"><b>¿Necesita Maquinaria?:&nbsp;</b></td>
	                                <td align="left">                                    
	                                    <select name="lsTmaquinaria" id="lsTmaquinaria"  class="combobox">
	                                        '. $tmaquinaria->getStrListar($this->getStrTmaquinaria()) .'
	                                    </select>
                                </td> 
                             	<td  align="right"><b>¿Qué Maquinaria?:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strmaquinaria" name="strmaquinaria" type="text" maxlength="100"  value="'. $this->getStrmaquinaria() .'" />
                                </td>
			              </tr>
			              <tr class="formulariofila1">
                                 <td align="right"><b>¿Necesita Formación Específica?:&nbsp;</b></td>
	                                <td align="left">                                    
	                                    <select name="lsTformacion" id="lsTformacion"  class="combobox">
	                                        '. $tformacion->getStrListar($this->getStrTformacion()) .'
	                                    </select>
                                </td> 
                             	<td  align="right"><b>¿Qué Formación?:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strformacion" name="strformacion" type="text" maxlength="100"  value="'. $this->getStrformacion() .'" />
                                </td>
			              </tr>
			              <tr class="formulariofila1">
                                 <td align="right"><b>¿Cuenta con el apoyo Familiar?:&nbsp;</b></td>
	                                <td align="left">                                    
	                                    <select name="lsTfamilia" id="lsTfamilia"  class="combobox">
	                                        '. $tfamilia->getStrListar($this->getStrTfamilia()) .'
	                                    </select>
                                </td> 
                             	<td  align="right"><b>¿Quién?:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strfamilia" name="strfamilia" type="text" maxlength="100"  value="'. $this->getStrfamilia() .'" />
                                </td>
			              </tr>
						<tr class="formulariofila1">
                                <td  align="right"><b>¿Cuáles son sus potencilaes clientes?:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strtcliente" name="strtcliente" type="text" maxlength="100"  value="'. $this->getStrTcliente() .'" />
                                </td>
                                <td align="right"><b>¿Cuenta con RUC/RISE?:&nbsp;</b></td>
	                                <td align="left">                                    
	                                    <select name="lsTruc" id="lsTruc"  class="combobox">
	                                        '. $truc->getStrListar($this->getStrTruc()) .'
	                                    </select>
                                </td> 
			              </tr>
						<tr class="formulariofila1">
                                <td  align="right"><b>Producto o Servicio:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strtproducto" name="strtproducto" type="text" maxlength="100"  value="'. $this->getStrTproducto() .'" />
                                </td>
                               <td align="right"><b>Tipo de Producción:&nbsp;</b></td>
	                                <td align="left">                                    
	                                    <select name="lsproduccion" id="lsproduccion"  class="combobox">
	                                        '. $produccion->getStrListar($this->getStrproduccion()) .'
	                                    </select>
                                </td> 
			              </tr>
							<tr class="formulariofila1">
                                <td align="right"><b>Fortalecimiento Planteado:&nbsp;</b></td>
	                                <td align="left">                                    
	                                    <select name="lstfplanteado" id="lstfplanteado"  class="combobox">
	                                        '. $tfplanteado->getStrListar($this->getStrTfplanteado()) .'
	                                    </select>
                                </td> 
                                <td align="right"><b>Antigüedad del Negocio:&nbsp;</b></td>
	                                <td align="left">                                    
	                                    <select name="lstantiguedadn" id="lstantiguedadn"  class="combobox">
	                                        '. $tantiguedadn->getStrListar($this->getStrTantiguedadn()) .'
	                                    </select>
                                </td> 
			              </tr>
			               <tr class="formulariofila1">
                                <td align="right"><b>Ventas Anuales:&nbsp;</b></td>
	                                <td align="left">                                    
	                                    <select name="lstventas" id="lstventas"  class="combobox">
	                                        '. $tventas->getStrListar($this->getStrTventas()) .'
	                                    </select>
                                </td> 
                                </td>
                             		<td  align="right"><b>Tel&eacute;fonos:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strTelefono" name="strTelefono" type="text" maxlength="10" '. JS_ONLY_NUMS .' value="'. $this->getStrtelefono() .'" />
                                </td>
			              </tr>
			              <tr class="formulariofila1">
                            	<td  align="right"><b>Email:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strmail" name="strmail" type="text" maxlength="100" value="'. $this->getStrmail() .'" />
                                </td>
                                <td  align="right"><b>Número de Trabajores Tiempo Completo:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strtcompleto" name="strtcompleto" type="text" maxlength="10" '. JS_ONLY_NUMS .' value="'. $this->getStrtcompleto() .'" />
                                </td>
			              </tr>
						   <tr class="formulariofila1">
                               <td  align="right"><b>Número de Trabajores Tiempo Parcial:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strtparcial" name="strtparcial" type="text" maxlength="10" '. JS_ONLY_NUMS .' value="'. $this->getStrtparcial() .'" />
                                </td>
                                <td align="right"><b>Cuenta con los permisos requeridos:&nbsp;</b></td>
	                                <td align="left">                                    
	                                    <select name="lstrequerido" id="lstrequerido"  class="combobox">
	                                        '. $trequerido->getStrListar($this->getStrtrequerido()) .'
	                                    </select>
                                </td> 
			              </tr>
			                    <tr class="formulariofila1">
                               <td  align="right"><b>¿Cuáles?:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strrequerido" name="strrequerido" type="text" maxlength="100" value="'. $this->getStrrequerido() .'" />
                                </td>
                                <td align="right"><b>Está al día en las declaraciones del SRI:&nbsp;</b></td>
	                                <td align="left">                                    
	                                    <select name="lstdeclaraciones" id="lstdeclaraciones"  class="combobox">
	                                        '. $tdeclaraciones->getStrListar($this->getStrtdeclaraciones()) .'
	                                    </select>
                                </td> 
			              </tr>
			              <tr class="formulariofila1">
                              <td align="right"><b>¿Tiene Marca Propia?:&nbsp;</b></td>
	                                <td align="left">                                    
	                                    <select name="lstmarca" id="lstmarca"  class="combobox">
	                                        '. $tmarca->getStrListar($this->getStrtmarca()) .'
	                                    </select>
                                </td> 
                                 <td  align="right"><b>¿Cuál?:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strmarca" name="strmarca" type="text" maxlength="100" value="'. $this->getStrmarca() .'" />
                                </td>
			              </tr>
						  <tr class="formulariofila1">
			               		<td  align="right"><b>¿Cuáles son sus Clientes?:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strtclientes" name="strtclientes" type="text" maxlength="100" value="'. $this->getStrtclientes() .'" />
                              </td>
                             <td  align="right"><b>¿Estimasión de Capital Propio?:</b></td>
                                	<td align="left">                                
	                                    <select name="lstcapital" id="lstcapital"  class="combobox">
	                                       '. $tcapital->getStrListar($this->getStrtcapital()) .'
	                                    </select>
                                </td>
							  
							  
                           </tr>
						  <tr class="formulariofila1">
			               	    <td align="right"><b>¿En los últimos 5 años a tenido algún tipo de crédito?:&nbsp;</b></td>
	                                <td align="left">                                    
	                                    <select name="lstcredito" id="lstcredito"  class="combobox">
	                                        '. $tcredito->getStrListar($this->getStrtcredito()) .'
	                                    </select>
                                </td> 
                                 <td align="right"><b>¿Qué tipo de crédito?</b></td>
	                                <td align="left">                                    
	                                    <select name="lstipocredito" id="lstipocredito"  class="combobox">
	                                        '. $tipocredito->getStrListar($this->getStrtipocredito()) .'
	                                    </select>
                                </td> 
                           </tr>
                           <tr class="formulariofila1">
			               	    <td align="right"><b>¿Se ha retrasado en el pago del crédito?;</b></td>
	                                <td align="left">                                    
	                                    <select name="lstretrasado" id="lstretrasado"  class="combobox">
	                                        '. $tretrasado->getStrListar($this->getStrtretrasado()) .'
	                                    </select>
                                </td> 
                                 <td  align="right"><b>¿Cuál ha sido su motivo y en que institución?:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strretrasado" name="strretrasado" type="text" maxlength="100" value="'. $this->getStrretrasado() .'" />
                              </td>
                           </tr>
                           <tr class="formulariofila1">
			               	    <td align="right"><b>¿Paga sus coutas puntualmente?</b></td>
	                                <td align="left">                                    
	                                    <select name="lstpuntual" id="lstpuntual"  class="combobox">
	                                        '. $tpuntual->getStrListar($this->getStrtpuntual()) .'
	                                    </select>
                                </td> 
                               <td align="right"><b>¿Tiene deudas actualmente?</b></td>
	                                <td align="left">                                    
	                                    <select name="lstdeudas" id="lstdeudas"  class="combobox">
	                                        '. $tdeudas->getStrListar($this->getStrtdeudas()) .'
	                                    </select>
                                </td> 
                           </tr> 
                            <tr class="formulariofila1">
			               	    <td align="right"><b>¿Con quién?</b></td>
	                                <td align="left">                                    
	                                    <select name="lstdeudasquien" id="lstdeudasquien"  class="combobox">
	                                        '. $tdeudasquien->getStrListar($this->getStrtdeudasquien()) .'
	                                    </select>
                                </td> 
                               
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
            $ProcedimientoAlmacenado = sprintf("CALL spingresartemprendimiento('%s', '%s', '%s', '%s', '%s', 
            '%s', '%s', '%s', '%s', '%s','%s', '%s', '%s','%s','%s','%s','%s','%s','%s','%s',
			'%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s',
			'%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s');",
            $this->getStrTusuario(), $this->getstrTnegocio(), $this->getstrTsectorp(),$this->getstrCapacitacion(),
            $this->getstrInstitucion(),$this->getstrConocimiento(),$this->getstrEspacio(),$this->getstrIngreso(), $this->getstrTcontable(),
			$this->getstrTcontabilidad(),$this->getstrTdtiempo(),$this->getstrTfnegocio(),$this->getStrParroquia(),
			$this->getstrTfinanciamiento(),$this->getstrTaportado(),$this->getstrTgarante(),$this->getStrSector(),
			$this->getstrTqgarante(),$this->getStrFechaNacimiento(),$_SESSION["usuario"]["suc"],
			$this->getStrTproduccion(),$this->getStrNtrabajador(),$this->getStrTmaquinaria(),$this->getStrmaquinaria(),$this->getStrTformacion(),$this->getStrformacion(),
			$this->getStrTfamilia(),$this->getStrfamilia(),$this->getStrTcliente(),$this->getStrTruc(),$this->getStrTproducto(),$this->getStrproduccion(),
			$this->getStrTfplanteado(),$this->getStrTantiguedadn(),$this->getStrTventas(),$this->getStrtelefono(),$this->getStrmail(),$this->getStrtcompleto(),
			$this->getStrtparcial(),$this->getStrtrequerido(),$this->getStrrequerido(),$this->getStrtdeclaraciones(),$this->getStrtmarca(),$this->getStrmarca(),
			$this->getStrtclientes(),$this->getStrtcapital(),$this->getStrtcredito(),$this->getStrtipocredito(),$this->getStrtretrasado(),$this->getStrretrasado(),
			$this->getStrtpuntual(),$this->getStrtdeudas(),$this->getStrtdeudasquien());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);

            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Nombres = [ '.$this->getStrTusuario().' ] Tipo_negocio = [ '. $this->getstrTnegocio().' ] Fecha_Ingreso= ['. $this->getStrFechaNacimiento().' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'G', 'temprendimiento', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL spactualizartemprendimiento('%s', '%s', '%s', '%s', '%s', 
            '%s', '%s', '%s', '%s', '%s','%s', '%s', '%s','%s','%s','%s','%s','%s','%s','%s',
			'%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s',
			'%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s');",
            $this->getStrCodigo(),$this->getStrTusuario(), $this->getstrTnegocio(), $this->getstrTsectorp(),$this->getstrCapacitacion(),
            $this->getstrInstitucion(),$this->getstrConocimiento(),$this->getstrEspacio(),$this->getstrIngreso(), $this->getstrTcontable(),
			$this->getstrTcontabilidad(),$this->getstrTdtiempo(),$this->getstrTfnegocio(),$this->getStrParroquia(),
			$this->getstrTfinanciamiento(),$this->getstrTaportado(),$this->getstrTgarante(),$this->getStrSector(),
			$this->getstrTqgarante(),$this->getStrFechaNacimiento(),
			$this->getStrTproduccion(),$this->getStrNtrabajador(),$this->getStrTmaquinaria(),$this->getStrmaquinaria(),$this->getStrTformacion(),$this->getStrformacion(),
			$this->getStrTfamilia(),$this->getStrfamilia(),$this->getStrTcliente(),$this->getStrTruc(),$this->getStrTproducto(),$this->getStrproduccion(),
			$this->getStrTfplanteado(),$this->getStrTantiguedadn(),$this->getStrTventas(),$this->getStrtelefono(),$this->getStrmail(),$this->getStrtcompleto(),
			$this->getStrtparcial(),$this->getStrtrequerido(),$this->getStrrequerido(),$this->getStrtdeclaraciones(),$this->getStrtmarca(),$this->getStrmarca(),
			$this->getStrtclientes(),$this->getStrtcapital(),$this->getStrtcredito(),$this->getStrtipocredito(),$this->getStrtretrasado(),$this->getStrretrasado(),
			$this->getStrtpuntual(),$this->getStrtdeudas(),$this->getStrtdeudasquien());
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
            $ProcedimientoAlmacenado = sprintf("CALL speliminartemprendimiento('%s');", $this->getStrCodigo());
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
            $ProcedimientoAlmacenado = sprintf("CALL spbtemprendimiento('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
            foreach( $resultado as $rst): 
				$this->setStrCodigo($rst['temprendimiento_id']);  
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
				$this->setStrTproduccion($rst['tproduccion_id']); 
				$this->setStrNtrabajador($rst['ntrabajador']); 
				$this->setStrTmaquinaria($rst['tmaquinaria_id']); 
				$this->setStrmaquinaria($rst['maquinaria']); 
				$this->setStrTformacion($rst['tformacion_id']); 
				$this->setStrformacion($rst['formacion']); 
				$this->setStrTfamilia($rst['tfamilia_id']); 
				$this->setStrfamilia($rst['familia']); 
				$this->setStrTcliente($rst['tcliente']); 
				$this->setStrTruc($rst['truc_id']); 
				$this->setStrTproducto($rst['tproducto']); 
				$this->setStrproduccion($rst['produccion_id']); 
				$this->setStrTfplanteado($rst['tfplanteado_id']); 
				$this->setStrTantiguedadn($rst['tantiguedadn_id']); 
				$this->setStrTventas($rst['tventas_id']); 
				$this->setStrtelefono($rst['telefono']);
				$this->setStrmail($rst['mail']);  
				$this->setStrtcompleto($rst['tcompleto']);  
				$this->setStrtparcial($rst['tparcial']);  
				$this->setStrtrequerido($rst['trequerido']); 
				$this->setStrrequerido($rst['requerido']);  
				$this->setStrtdeclaraciones($rst['tdeclaraciones']);   
				$this->setStrtmarca($rst['tmarca']);  
				$this->setStrmarca($rst['marca']); 
				$this->setStrtclientes($rst['tclientes']); 
				$this->setStrtcapital($rst['tcapital_id']); 
				$this->setStrtcredito($rst['tcredito_id']); 
				$this->setStrtipocredito($rst['tipocredito_id']);
				$this->setStrtretrasado($rst['tretrasado_id']);
				$this->setStrretrasado($rst['retrasado']);
				$this->setStrtpuntual($rst['tpuntual_id']);
				$this->setStrtdeudas($rst['tdeudas_id']);
				$this->setStrtdeudasquien($rst['tdeudasquien_id']);
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
            $ProcedimientoAlmacenado = sprintf("CALL sptotaltemprendimiento('%d');", $sucursal);
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
            $ProcedimientoAlmacenado = sprintf("CALL splistartemprendimiento('%d','%d','%d');","$re", "$pa","$cf");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            EMPRENDIMIENTO<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO EMPRENDIMIENTO</legend>
                       ';
            $retval .= '
                        <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                            <tr>
                                <td colspan="17" align="center"><div class="vtip" title="Ingreso<br> [NUEVO EMPRENDIMIENTO]">
                                    <a href="'. TEMPRENDIMIENTO_URL .'temprendimiento.php?btnNuevo=Nuevo">| <img src="'. IMAGENES_PATH .'/rptstocksucursal.png" title="" width="16px" height="16px"  border="0" /><img src="'. IMAGENES_PATH .'/nuevo.png" title="" width="16px" height="16px"  border="0" />NUEVO EMPRENDIMIENTO|</a>
                                </div><td>
                            </tr>';
                            $paginacion->setStrNombrePagina("cformativo/temprendimiento.php");
            				$retval .= '<tr><td colspan="12" align="center">'. $paginacion->getStrPaginacion() .'</td></tr>
                            <tr class="tablatitulo">
                                <th colspan="17">LISTADO&nbsp;DE&nbsp;EMPRENDIMIENTO&nbsp;REGISTRADOS</th>
                            </tr>
                            <tr class="tablasubtitulo">
                                <th>...</th>  
                                                                
                                <th align="center">Emprendimiento</th>
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
                    $retval .= 	'<td align="center">'. $rst["temprendimiento_id"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["apellido_paterno"] .' '. $rst["primer_nombre"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["tnegocio"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["tsectorp_descripcion"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["fecha_ingreso"] .'</td>';
                    $retval .= 	'</div></td>';
                  	$retval .= 	'<td align="center"><div class="vtip" title="ACTUALIZAR EMPRENDIMIENTO <br> [ codigo = '.$rst["temprendimiento_id"] .' ]">';
                    $retval .=  '<a href="'. TEMPRENDIMIENTO_URL .'temprendimiento.php?btnActualizar=Actualizar&strCodigo='. $rst["temprendimiento_id"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    if($_SESSION["usuario"]["tipo"]==2 || $_SESSION["usuario"]["tipo"]==1 )
							{
                    $retval .= 	'<td align="center"><div class="vtip" title="ELIMINAR EMPRENDIMIENTO <br> [ codigo = '.$rst["temprendimiento_id"] .' ]">';
                    $retval .=  '<a href="'. TEMPRENDIMIENTO_URL .'temprendimiento.php?btnEliminar=Eliminar&strCodigo='. $rst["temprendimiento_id"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
							}
                    $retval .= 	'<td align="center"><div class="vtip" title="DETALLE EMPRENDIMIENTO <br> [ codigo = '.$rst["temprendimiento_id"] .' ]">';
                    $retval .=  '<a href="'. TEMPRENDIMIENTO_URL .'temprendimiento.php?btnDetalle=Detalle&strCodigo='. $rst["temprendimiento_id"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                    $i = 1 - $i;
                endforeach;
            }

            //$paginacion->setStrNombrePagina("cformativo/temprendimiento.php");
            //$retval .= '<tr><td colspan="12" align="center">'. $paginacion->getStrPaginacion() .'</td></tr>';
            $retval .= '</table>';
            $retval .= '</fieldset>';
            return $retval;
        }

public function getStrDetallePersona()
        {
            $query = new clQuery();
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbdetalletemprendimiento('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            EMPRENDIMIENTO<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO EMPRENDIMIENTO<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">DETALLE EMPRENDIMIENTO
                        </legend>
                       ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                    $retval .= '<tr>
                                    <td colspan="2" align="center">
                                        <a href="'. TEMPRENDIMIENTO_URL .'temprendimiento.php">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> REGRESAR LISTADO EMPRENDIMIENTO|</a>
                                    <td>
                                </tr>
                                ';
                    
                    $retval .= '<tr class="tablatitulo">
                                    <th colspan="2">DETALLE&nbsp;EMPRENDIMIENTO;REGISTRADO</th>
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
								
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Producción Prevista:</th>
                                    <td align="left">  '. $rst["tproduccion_descripcion"] .'</td>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Número de Trabajadores:</th>
                                    <td align="left">  '. $rst["ntrabajador"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">¿Necesita Maquinaria?:</th>
                                    <td align="left"> '. $rst["maquinaria_detalle"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">¿Qué Maquinaria?:</th>
                                    <td align="left"> '. $rst["maquinaria"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">¿Necesita Formación Específica?:</th>
                                    <td align="left"> '. $rst["formacion_detalle"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">¿Qué Formación?:</th>
                                    <td align="left"> '. $rst["formacion"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">¿Cuenta con el apoyo Familiar?:</th>
                                    <td align="left"> '. $rst["tfamilia_descripcion"] .'</td>
                                </tr>
                                ';		
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">¿Quién?:</th>
                                    <td align="left"> '. $rst["familia"] .'</td>
                                </tr>
                                ';		
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">¿Cuáles son sus potencilaes clientes?:</th>
                                    <td align="left"> '. $rst["tcliente"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">¿Cuenta con RUC/RISE?:</th>
                                    <td align="left"> '. $rst["truc_descripcion"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Producto o Servicio:</th>
                                    <td align="left"> '. $rst["tproducto"] .'</td>
                                </tr>
                                ';		
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Tipo de Producción:</th>
                                    <td align="left"> '. $rst["produccion_descripcion"] .'</td>
                                </tr>
                                ';		
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Fortalecimiento Planteado:</th>
                                    <td align="left"> '. $rst["tfplanteado_descripcion"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Antigüedad del Negocio:</th>
                                    <td align="left"> '. $rst["tantiguedadn_descripcion"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Ventas Anuales:</th>
                                    <td align="left"> '. $rst["tventas_descripcion"] .'</td>
                                </tr>
                                ';		
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Teléfonos:</th>
                                    <td align="left"> '. $rst["telefono"] .'</td>
                                </tr>
                                ';			
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Email:</th>
                                    <td align="left"> '. $rst["mail"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Número de Trabajores Tiempo Completo:</th>
                                    <td align="left"> '. $rst["tcompleto"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Número de Trabajores Tiempo Parcial:</th>
                                    <td align="left"> '. $rst["tparcial"] .'</td>
                                </tr>
                                ';										
																																																		
                     $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Cuenta con los permisos requeridos:</th>
                                    <td align="left">  '. $rst["trequerido_detalle"] .'</td>
                                </tr>
                                ';		
								
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">¿Cuáles?:</th>
                                    <td align="left"> '. $rst["requerido"] .'</td>
                                </tr>
                                ';		
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Está al día en las declaraciones del SRI:</th>
                                    <td align="left"> '. $rst["tdeclaraciones_detalle"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">¿Tiene Marca Propia?:</th>
                                    <td align="left"> '. $rst["tmarca_detalle"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">¿Cuál?:</th>
                                    <td align="left"> '. $rst["marca"] .'</td>
                                </tr>
                                ';		
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">¿Cuáles son sus Clientes?:</th>
                                    <td align="left"> '. $rst["tclientes"] .'</td>
                                </tr>
                                ';			
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">¿Estimasión de Capital Propio?:</th>
                                    <td align="left"> '. $rst["tcapital_descripcion"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">¿En los últimos 5 años a tenido algún tipo de crédito?:</th>
                                    <td align="left"> '. $rst["t_credito_detalle"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">¿Qué tipo de crédito?:</th>
                                    <td align="left"> '. $rst["tipocredito_descripcion"] .'</td>
                                </tr>
                                ';										
																																																		
                     $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">¿Se ha retrasado en el pago del crédito?:</th>
                                    <td align="left">  '. $rst["tretrasado_detalle"] .'</td>
                                </tr>
                                ';		
								
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">¿Cuál ha sido su motivo y en que institución?:</th>
                                    <td align="left"> '. $rst["retrasado"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">¿Paga sus coutas puntualmente?:</th>
                                    <td align="left"> '. $rst["tpuntual_descripcion"] .'</td>
                                </tr>
                                ';										
																																																		
                     $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">¿Tiene deudas actualmente?:</th>
                                    <td align="left">  '. $rst["tdeudas_descripcion"] .'</td>
                                </tr>
                                ';										
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">¿Con quién?:</th>
                                    <td align="left">  '. $rst["tdeudasquien_descripcion"] .'</td>
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