<?php	
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.validaciones.php' );
    include_once( CLASS_PATH . "class.clquery.php" );
    include_once( CLASS_PATH . "class.clpaginacion.php" );    
	include_once( CLASS_PATH . "class.clestadocformativo.php" );
	include_once( CLASS_PATH . "class.cltipocformativo.php" );
	include_once( CLASS_PATH . "class.clcobertura.php" );
	include_once( CLASS_PATH . "class.clexperiencia.php" );
	include_once( CLASS_PATH . "class.clprovincia.php" );
    include_once( CLASS_PATH . "class.clcanton.php" );
    include_once( CLASS_PATH . "class.clparroquia.php" );
	include_once( CLASS_PATH . "class.clsucursal.php" );
	include_once( CLASS_PATH . "class.clsector.php" );
	include_once( CLASS_PATH . "class.clidentificacion.php" );
	include_once( CLASS_PATH . "class.clgenero.php" );
	include_once( CLASS_PATH . "class.clecivil.php" );
	include_once( CLASS_PATH . "class.clnhijos.php" );
	include_once( CLASS_PATH . "class.clfconocer.php" );
	include_once( CLASS_PATH . "class.cltseguro.php" );
	include_once( CLASS_PATH . "class.cltlicencia.php" );
	include_once( CLASS_PATH . "class.cltfederacion.php" );
	include_once( CLASS_PATH . "class.cltusuario.php" ); 
	
	include_once( CLASS_PATH . "class.cltfnecesaria.php" ); 
    class clTerapia
    {
        private $StrCodigo;
		private $StrTusuario;
        private $strFechai;
		private $strResponsable;	
		private $strCargo;
		private $strFechae;
		private $strLevaluacion;
		private $strSolicitadop;
		private $StrNapellidos;
		private $strFechaNacimiento;
		private $StrLnacimiento;
		private $strDirecciond;
		private $StrIngresoec;
		private $StrIngresoem;
		private $strGenero;	 
		private $StrEcivil;
		private $strTfnecesaria;
		private $StrOcupacion;
	 	private $StrFechaIngreso;	
		private $strCelular;
		private $strConvencional;
		private $strUsuario;
		private $strFamiliar;
		private $strEmpresa;
		private $strEquiposil;
		private $strOtrosr;
		private $strNombrer;
		private $strEntrevista;
		private $strConsulta;
		private $strRentrevista;
		private $strEvaluacionp;
		private $strIniciopt;
		private $strAntecedentesr;
		private $strAnamesis;
		private $strComposicionf;
		private $strPropia;
		private $strAlquilada;
		private $strPrestada;
		private $strVfamiliar;
		private $strVotros;
		private $strApotable;
		private $strAlcantarillado;
		private $strElectricidad;
		private $StrTelefoniaf;
		private $strTransportep;
		private $strCorreoe;
		private $strViasa;
		private $strProcedencia;
		private $strCantidad;
		private $strCantidadg;
		private $strResultadose;
		private $strReactivosa;
		private $strResultadosra;
		private $strEvaluacionindi;
		private $strEvaluacionfami;
		private $strEvaluacionpsico;
		private $strEvaluacionsocial;
		private $strEvaluacionocup;
		private $strPersonales;
		private $strPsicosociales;
		private $strTransversales;
		private $strAfortalecer;
		private $strAtencionp;
		private $strAtencions;
		private $strDescripciond;
		private $strPronostico;
		private $strConcluciones;
		private $strRecomendaciones;
		
        private $strEtiqueta;
        private $strNombreBoton;
        private $strValorBoton;
        private $strLectura;

        public function __construct()
        {
            $this->strCodigo = "";	
			$this->StrTusuario = "";
			$this->strFechai = "";
            $this->strResponsable = "";
			$this->strCargo = "";
			$this->strFechae = "";
			$this->strLevaluacion = "";
			$this->strSolicitadop = "";
			$this->strNapellidos = "";
			$this->strFechaNacimiento = "";
			$this->strLnacimiento = "";
			$this->strDirecciond = "";
			$this->strIngresoec = "";
			$this->StrIngresoem = "";
			$this->StrGenero = "";
			$this->StrEcivil = "";
			$this->strTfnecesaria = ""; 
			$this->strOcupacion = "";
			$this->strFechaIngreso = "";
			$this->strCelular = "";
			$this->strConvencional= "";
			$this->strUsuario = "Usuario";
			$this->strFamiliar= "Familiar";
			$this->strEmpresa= "Empresa";
			$this->strEquiposil= "Equiposil";
			$this->strOtrosr= "";
			$this->strNombrer= "";
			$this->strEntrevista= "Entrevista única";
			$this->strConsulta= "Consulta";
			$this->strRentrevista= "Re-Entrevista";
			$this->strEvaluacionp = "Evaluación Psicológica Integral";
			$this->strIniciopt = "Inicio de proceso terapéutico";
			$this->strAntecedentesr = "";
			$this->strAnamesis= "";
			$this->strComposicionf= "";
			$this->strPropia= "Propia";
			$this->strAlquilada= "Alquilada";
			$this->strPrestada= "Prestada";
			$this->strVfamiliar= "Familiar";
			$this->strVotros= "";
			$this->strApotable= "Agua Potable";
			$this->strAlcantarillado= "Alcantarillado";
			$this->strElectricidad= "Electricidad";
			$this->StrTelefoniaf= "Telefonía Fíja";
			$this->strTransportep = "Transporte Público";
			$this->strCorreoe= "Correo Electrónico";
			$this->strViasa = "Vías de acceso";
			$this->strProcedencia = "";
			$this->strCantidad= "";
			$this->StrCantidadg= "";
			$this->strResultadose= "";
			$this->strReactivosa= "";
			$this->strResultadosra= "";
			$this->strEvaluacionindi= "";
			$this->strEvaluacionfami= "";
			$this->strEvaluacionpsico= "";
			$this->strEvaluacionsocial= "";
			$this->strEvaluacionocup= "";
			$this->strPersonales= "";
			$this->strPsicosociales= "";
			$this->strTransversales= "";
			$this->strAfortalecer= "";
			$this->strAtencionp= "";
			$this->strAtencions= "";
			$this->strDescripciond= "";
			$this->strPronostico= "";
			$this->strConcluciones= "";
			$this->strRecomendaciones= "";
			
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
////////////////////////////////Transportep //////////////////////////////////////////////////////////////////////
	public function getstrTransportep()
        {
            return $this->strTransportep;
        }
  		public function setstrTransportep($ct)
        {
            $this->strTransportep = $ct;
        } 		
 ////////////// Tipo Formacion  /////////////////////
        public function getStrTfnecesaria()
        {
            return $this->strTfnecesaria;
        }
		public function setStrTfnecesaria($tf)
        {
            $this->strTfnecesaria = $tf;
        }               
////////////// Fechai /////////////////////
        public function getstrFechai()
        {
            return $this->strFechai;
        }
		public function setstrFechai($n)
        {
            $this->strFechai = $n;
        }
////////////// Responsable /////////////////////		
		public function getstrResponsable()
        {
            return $this->strResponsable;
        }
  		public function setstrResponsable($rp)
        {
            $this->strResponsable = $rp;
        } 
////////////// Entrevista /////////////////////		
		public function getstrEntrevista()
        {
            return $this->strEntrevista;
        }
  		public function setstrEntrevista($rp)
        {
            $this->strEntrevista = $rp;
        } 		
//////////// Cargo////////////////// 
		public function getstrCargo()
        {
            return $this->strCargo;
        }
  		public function setstrCargo($ct)
        {
            $this->strCargo = $ct;
        } 
/////////////////////////////////// Rentrevista////////////////// 
		public function getStrRentrevista()
        {
            return $this->strRentrevista;
        }
  		public function setStrRentrevista($ct)
        {
            $this->strRentrevista = $ct;
        }   		    
/////////////////////////Fechae  //////////////////////////
 	public function getStrFechae()
        {
            return $this->strFechae;
        }

        public function setStrFechae($et)
        {
            $this->strFechae = $et;
        }
/////////////////////////Cantidadg //////////////////////////
 	public function getStrCantidadg()
        {
            return $this->strCantidadg;
        }

        public function setStrCantidadg($et)
        {
            $this->strCantidadg = $et;
        }		
/////////////////////////Consulta//////////////////////////
 	public function getStrConsulta()
        {
            return $this->strConsulta;
        }

        public function setStrConsulta($et)
        {
            $this->strConsulta = $et;
        }				
/////////////////////////Ingresoec //////////////////////////
 	public function getStrIngresoec()
        {
            return $this->strIngresoec;
        }

        public function setStrIngresoec($et)
        {
            $this->strIngresoec = $et;
        }	
/////////////////////////Ingresoem//////////////////////////
 	public function getStrIngresoem()
        {
            return $this->strIngresoem;
        }

        public function setStrIngresoem($et)
        {
            $this->strIngresoem= $et;
        }	
/////////////////////////Equiposil//////////////////////////
 	public function getStrEquiposil()
        {
            return $this->strEquiposil;
        }

        public function setStrEquiposil($et)
        {
            $this->strEquiposil= $et;
        }	
/////////////////////////Otrosr//////////////////////////
 	public function getStrOtrosr()
        {
            return $this->strOtrosr;
        }

        public function setStrOtrosr($et)
        {
            $this->strOtrosr= $et;
        }	
/////////////////////////Nombrer//////////////////////////
 	public function getStrNombrer()
        {
            return $this->strNombrer;
        }

        public function setStrNombrer($et)
        {
            $this->strNombrer= $et;
        }						
/////////////////////////Ocupacion//////////////////////////
 	public function getStrOcupacion()
        {
            return $this->strOcupacion;
        }

        public function setStrOcupacion($et)
        {
            $this->strOcupacion= $et;
        }
/////////////////////////Celular//////////////////////////
 	public function getStrCelular()
        {
            return $this->strCelular;
        }

        public function setStrCelular($et)
        {
            $this->strCelular= $et;
        }	
/////////////////////////Empresa//////////////////////////
 	public function getStrEmpresa()
        {
            return $this->strEmpresa;
        }

        public function setStrEmpresa($et)
        {
            $this->strEmpresa= $et;
        }	
/////////////////////////Familiar//////////////////////////
 	public function getStrFamiliar()
        {
            return $this->strFamiliar;
        }

        public function setStrFamiliar($et)
        {
            $this->strFamiliar= $et;
        }			
/////////////////////////Fecha Ingreso//////////////////////////
 	public function getStrFechaIngreso()
        {
            return $this->strFechaIngreso;
        }

        public function setStrFechaIngreso($et)
        {
            $this->strFechaIngreso= $et;
        }									
/////////////////////Levaluacion ///////////////////////
        public function getStrLevaluacion()
        {
            return $this->strLevaluacion;
        }

        public function setStrLevaluacion($e)
        {
            $this->strLevaluacion = $e;
        }
/////////////////////Estado Civil //////////////////////////////
		public function getStrEcivil()
	        {
	            return $this->strEcivil;
	        }

        public function setStrEcivil($t)
	        {
	            $this->strEcivil = $t;
	        }
/////////////////////////Solicitadop//////////////////////////////
		public function getStrSolicitadop()
	        {
	            return $this->StrSolicitadop;
	        }

        public function setStrSolicitadop($ne)
	        {
	            $this->StrSolicitadop = $ne;
	        }
////////////////////////Género/////////////////////////////////			
		public function getStrGenero()
	        {
	            return $this->strGenero;
	        }

        public function setStrGenero($ned)
	        {
	            $this->strGenero = $ned;
	        }
//////////////////////////////Procedencia//////////////////////////////////////////////////////	
		public function getStrProcedencia()
	        {
	            return $this->strProcedencia;
	        }

        public function setStrProcedencia($tcf)
	        {
	            $this->strProcedencia = $tcf;
	        }
//////////////////////////////Direcciond////////////////////////////////////////////////////
		public function getStrDirecciond()
	        {
	            return $this->strDirecciond;
	        }

        public function setStrDirecciond($cb)
	        {
	            $this->strDirecciond = $cb;
	        }
////////////////////////////////Napellidos//////////////////////////////////////////////////////////////////////
		public function getStrNapellidos()
	        {
	            return $this->StrNapellidos;
	        }

        public function setStrNapellidos($exp)
	        {
	            $this->StrNapellidos = $exp;
	        }

////////////////////////////////Lnacimiento //////////////////////////////////////
		public function getStrLnacimiento()
	        {
	            return $this->StrLnacimiento;
	        }

        public function setStrLnacimiento($ob)
	        {
	            $this->StrLnacimiento = $ob;
	        }
//////////////////////////FechaNacimiento//////////////////////////////////////////
public function getStrFechaNacimiento()
        {
            return $this->strFechaNacimiento;
        }

        public function setStrFechaNacimiento($fn)
        {
            $this->strFechaNacimiento = $fn;
        }

///////////////////////Evaluacionp ///////////////////////////////////////////////			
	    public function getStrEvaluacionp()
        {
            return $this->strEvaluacionp;
        }

        public function setStrEvaluacionp($p)
        {
            $this->strEvaluacionp = $p;
        }						
 ////////////////////////// Iniciopt ////////////////////////////////////////
      public function getStrIniciopt()
        {
            return $this->strIniciopt;
        }

        public function setStrIniciopt($c)
        {
            $this->strIniciopt = $c;
        }
///////////////////////////// Antecedntesr ////////////////////////////////////
        public function getStrAntecedentesr()
        {
            return $this->strAntecedentesr;
        }

        public function setStrAntecedentesr($p)
        {
            $this->strAntecedentesr = $p;
        }
 
 /////////////////////////Viasa////////////////////////////////////////////////
        public function getStrViasa()
        {
            return $this->strViasa;
        }

        public function setStrViasa($su)
        {
            $this->strViasa = $su;
        }
 
 /////////////////////////Anamesis ////////////////////////////////////////////////////
         public function getStrAnamesis()
        {
            return $this->strAnamesis;
        }

        public function setStrAnamesis($c)
        {
            $this->strAnamesis= $c;
        }
 /////////////////////////Composicionf ////////////////////////////////////////////////////		
         public function getStrComposicionf()
        {
            return $this->strComposicionf;
        }

        public function setStrComposicionf($cp)
        {
            $this->strComposicionf= $cp;
        }
	/////////////////////Propia //////////////////////////////////////////////////
	     public function getStrPropia()
        {
            return $this->strPropia;
        }

        public function setStrPropia($cp)
        {
            $this->strPropia= $cp;
        }
	/////////////////////Prestada//////////////////////////////////////////////////
		public function getStrPrestada()
        {
            return $this->strPrestada;
        }

        public function setStrPrestada($cp)
        {
            $this->strPrestada= $cp;
        }
	
	/////////////////////Alquilada //////////////////////////////////////////////////
		public function getStrAlquilada()
        {
            return $this->strAlquilada;
        }

        public function setStrAlquilada($cp)
        {
            $this->strAlquilada= $cp;
        }
		
	
	/////////////////////Vfamiliar //////////////////////////////////////////////////
		public function getStrVfamiliar()
        {
            return $this->strVfamiliar;
        }

        public function setStrVfamiliar($cp)
        {
            $this->strVfamiliar= $cp;
        }
		
//////////////////////////////Votros//////////////////////////////////////////////////////////
		public function getStrVotros()
        {
            return $this->strVotros;
        }

        public function setStrVotros($cp)
        {
            $this->strVotros= $cp;
        }
		

///////////////////////////////Apotable////////////////////////////////////////////////////////////
		public function getStrApotable()
        {
            return $this->strApotable;
        }

        public function setStrApotable($cp)
        {
            $this->strApotable= $cp;
        }

/////////////////////////////Alcantarillado/////////////////////////////////////////////////////////////////
		public function getStrAlcantarillado()
        {
            return $this->strAlcantarillado;
        }

        public function setStrAlcantarillado($cp)
        {
            $this->strAlcantarillado= $cp;
        }
/////////////////////////Electricidad//////////////////////////////////////////////////////////////
		public function getStrElectricidad()
        {
            return $this->strElectricidad;
        }

        public function setStrElectricidad($cp)
        {
            $this->strElectricidad= $cp;
        }
////////////////////////Usuario///////////////////////////////////////////////////////////////
		public function getStrUsuario()
        {
            return $this->strUsuario;
        }

        public function setStrUsuario($fa)
        {
            $this->strUsuario= $fa;
        }
////////////////////////Telefoniaf///////////////////////////////////////////////////////////////
		public function getStrTelefoniaf()
        {
            return $this->StrTelefoniaf;
        }

        public function setStrTelefoniaf($fa)
        {
            $this->StrTelefoniaf= $fa;
        }
////////////////////////Cantidad//////////////////////////////////////////////////////////////
		public function getStrCantidad()
        {
            return $this->StrCantidad;
        }

        public function setStrCantidad($fa)
        {
            $this->StrCantidad= $fa;
        }	
	
//////////////////////////Correoe//////////////////////////////////////////////////////////////
		public function getStrCorreoe()
        {
            return $this->strCorreoe;
        }

        public function setStrCorreoe($ob)
        {
            $this->strCorreoe= $ob;
        }
//////////////////////////Convencional //////////////////////////////////////////////////////////////
		public function getStrConvencional()
        {
            return $this->strConvencional;
        }

        public function setStrConvencional($ob)
        {
            $this->strConvencional= $ob;
        }
//////////////////////////Resultadose //////////////////////////////////////////////////////////////
		public function getStrResultadose()
        {
            return $this->strResultadose;
        }

        public function setStrResultadose($ob)
        {
            $this->strResultadose= $ob;
        }
//////////////////////////Reactivosa //////////////////////////////////////////////////////////////
		public function getStrReactivosa()
        {
            return $this->strReactivosa;
        }

        public function setStrReactivosa($ob)
        {
            $this->strReactivosa= $ob;
        }
//////////////////////////Resultadosra //////////////////////////////////////////////////////////////
		public function getStrResultadosra()
        {
            return $this->strResultadosra;
        }

        public function setStrResultadosra($ob)
        {
            $this->strResultadosra= $ob;
        }
//////////////////////////Evaluacionindi //////////////////////////////////////////////////////////////
		public function getStrEvaluacionindi()
        {
            return $this->strEvaluacionindi;
        }

        public function setStrEvaluacionindi($ob)
        {
            $this->strEvaluacionindi= $ob;
        }
//////////////////////////Evaluacionfami //////////////////////////////////////////////////////////////
		public function getStrEvaluacionfami()
        {
            return $this->strEvaluacionfami;
        }

        public function setStrEvaluacionfami($ob)
        {
            $this->strEvaluacionfami= $ob;
        }
//////////////////////////Evaluacionpsico //////////////////////////////////////////////////////////////
		public function getStrEvaluacionpsico()
        {
            return $this->strEvaluacionpsico;
        }

        public function setStrEvaluacionpsico($ob)
        {
            $this->strEvaluacionpsico= $ob;
        }	
//////////////////////////Evaluacionsocial //////////////////////////////////////////////////////////////
		public function getStrEvaluacionsocial()
        {
            return $this->strEvaluacionsocial;
        }

        public function setStrEvaluacionsocial($ob)
        {
            $this->strEvaluacionsocial= $ob;
        }
//////////////////////////Evaluacionocup //////////////////////////////////////////////////////////////
		public function getStrEvaluacionocup()
        {
            return $this->strEvaluacionocup;
        }

        public function setStrEvaluacionocup($ob)
        {
            $this->strEvaluacionocup= $ob;
        }
//////////////////////////Personales//////////////////////////////////////////////////////////////
		public function getStrPersonales()
        {
            return $this->strPersonales;
        }

        public function setStrPersonales($ob)
        {
            $this->strPersonales= $ob;
        }	
//////////////////////////Psicosociales//////////////////////////////////////////////////////////////
		public function getStrPsicosociales()
        {
            return $this->strPsicosociales;
        }

        public function setStrPsicosociales($ob)
        {
            $this->strPsicosociales= $ob;
        }	
//////////////////////////Transversales//////////////////////////////////////////////////////////////
		public function getStrTransversales()
        {
            return $this->strTransversales;
        }

        public function setStrTransversales($ob)
        {
            $this->strTransversales= $ob;
        }
//////////////////////////Afortalecer//////////////////////////////////////////////////////////////
		public function getStrAfortalecer()
        {
            return $this->strAfortalecer;
        }

        public function setStrAfortalecer($ob)
        {
            $this->strAfortalecer= $ob;
        }
//////////////////////////Atencionp//////////////////////////////////////////////////////////////
		public function getStrAtencionp()
        {
            return $this->strAtencionp;
        }

        public function setStrAtencionp($ob)
        {
            $this->strAtencionp= $ob;
        }	
//////////////////////////Atencions//////////////////////////////////////////////////////////////
		public function getStrAtencions()
        {
            return $this->strAtencions;
        }

        public function setStrAtencions($ob)
        {
            $this->strAtencions= $ob;
        }
//////////////////////////Descripciond//////////////////////////////////////////////////////////////
		public function getStrDescripciond()
        {
            return $this->strDescripciond;
        }

        public function setStrDescripciond($ob)
        {
            $this->strDescripciond= $ob;
        }
/////////////////////////Pronostico//////////////////////////////////////////////////////////////
		public function getStrPronostico()
        {
            return $this->strPronostico;
        }

        public function setStrPronostico($ob)
        {
            $this->strPronostico= $ob;
        }	
/////////////////////////Concluciones/////////////////////////////////////////////////////////////
		public function getStrConcluciones()
        {
            return $this->strConcluciones;
        }

        public function setStrConcluciones($b)
        {
            $this->strConcluciones= $b;
        }
/////////////////////////Recomendaciones/////////////////////////////////////////////////////////////
		public function getStrRecomendaciones()
        {
            return $this->strRecomendaciones;
        }

        public function setStrRecomendaciones($ob)
        {
            $this->strRecomendaciones= $ob;
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
            $estado = new clEstadoCformativo();
			$identificacion = new clIdentificacion();
			$genero= new clGenero();
			$ecivil= new clEcivil();
			$tfnecesaria = new clTfnecesaria();	
			
			$nhijos= new clNhijos();
			$fconocer= new clFconocer();
			$tseguro= new clExperiencia();
			$tiposeguro= new clTseguro();
			$tlicencia= new clExperiencia();
			$tipolicencia= new clTlicencia();
			$vehiculo= new clExperiencia();
			$adaptacion= new clExperiencia();
			$tfederacion= new clExperiencia();
			$tipofederacion= new clTfederacion();
			
			$tipocformativo = new clTipocformativo();
			$cobertura = new clCobertura();
			$experiencia = new clExperiencia();
			$provincia = new clProvincia();
            $canton = new clCanton();
            $parroquia = new clParroquia();
			$sucursal = new clSucursal();
			$sector = new clSector();
			$tusuario = new clTusuario();
			
          $retval  = '<script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.validate.js"></script>
                        <script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.metadata.js"></script>
                       ';

            $retval .= '<br><br><br><br>
                        <script>
                            $(document).ready(function(){
                                    $.metadata.setType( \'attr\', \'validate\' );
                                    $(\'#frmninos\').validate({
                                            rules:{
                                         
                                                  },
                                            messages:{
                                            
												     }
                                  });
                          });
                        </script>
                       ';
		  
            $retval .= '<form id="frmninos" action="'. TERAPIA_URL .'terapia.php" method="POST">';

            $Regresar = "regresar('". TERAPIA_URL . "terapia.php')";

            $retval .= '<fieldset class="fieldsetPequeno">';
            $retval .= '<legend class="etiquetaborde">
                            PSICOTERAPÉUTICA <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO PSICOTERAPÉUTICA<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> '. $this->getStrEtiqueta() .'
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
                              <td  align="right"><b>FECHA&nbsp:</b></td>
                                <td align="left">
                                    <input name="dtFechai" type="text" id="dtFechai" value="'. $this->getstrFechai() .'" size="10" readonly="readonly" class="textboxfecha" />
                                    <a href="#">
                                        <img src="'. IMAGENES_PATH .'/calendario.png" title="Calendario" name="strFechai" id="strFechai" width="16px" height="16px" style="border: 0px none;">
                                    </a>
                                    <script type="text/javascript">
                                        Calendar.setup({
                                                         inputField: "dtFechai",
                                                         ifFormat: "%Y-%m-%d",
                                                         button: "strFechai"
                                                         });
                                    </script>
                                </td>
                                <td  align="right"><b>RESPONSABLE:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strResponsable" name="strResponsable" type="text" maxlength="50" value="'. $this->getstrResponsable() .'" />
                                </td>  
                            </tr>
                            <tr class="formulariofila1">
                            	<td  align="right"><b>CARGO:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strCargo" name="strCargo" type="text" maxlength="50" value="'. $this->getstrCargo() .'" />
                                </td>  
                              <td  align="right"><b>FECHA&nbsp EVALUACIÓN:</b></td>
                                <td align="left">
                                    <input name="dtFechae" type="text" id="dtFechae" value="'. $this->getStrFechae() .'" size="10" readonly="readonly" class="textboxfecha" />
                                    <a href="#">
                                        <img src="'. IMAGENES_PATH .'/calendario.png" title="Calendario" name="strFechae" id="strFechae" width="16px" height="16px" style="border: 0px none;">
                                    </a>
                                    <script type="text/javascript">
                                        Calendar.setup({
                                                         inputField: "dtFechae",
                                                         ifFormat: "%Y-%m-%d",
                                                         button: "strFechae"
                                                         });
                                    </script>
                                </td>
                                
                            </tr>
                            <tr class="formulariofila1">
                            	<td  align="right"><b>LUGAR EVALUACIÓN:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strLevaluacion" name="strLevaluacion" type="text" maxlength="50" value="'. $this->getStrLevaluacion() .'" />
                                </td>  
                              	<td  align="right"><b>SOLICITADO POR:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strSolicitadop" name="strSolicitadop" type="text" maxlength="50" value="'. $this->getStrSolicitadop() .'" />
                                </td>  
                                
                            </tr>
							<tr class="formulariofila1">
								<td align="right"><b>NOMBRES Y APELLIDOS:&nbsp;</b></td>
                                <td align="left">                                    
                                    <select name="strNapellidos" id="strNapellidos"  class="combobox">
                                        '.$tusuario->getStrListar($this->getStrNapellidos()) .'
                                    </select>
                                </td>
                                <td  align="right"><b>FECHA&nbsp;NACIMIENTO:</b></td>
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
                                <td  align="right"><b>LUGAR DE NACIMIENTO:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strLnacimiento" name="strLnacimiento" type="text" maxlength="50" value="'. $this->getStrLnacimiento() .'" />
                                </td>
                               <td  align="right"><b>DIRECCIÓN DOMICILIARIA:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strDirecciond" name="strDirecciond" type="text" maxlength="50" value="'. $this->getStrDirecciond().'" />
                                </td>
                            </tr> 
                            <tr class="formulariofila1">
                                <td  align="right"><b>EC:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strIngresoec" name="strIngresoec" type="text" maxlength="50" value="'. $this->getStrIngresoec() .'" />
                                </td>
                               <td  align="right"><b>EM:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strIngresoem" name="strIngresoem" type="text" maxlength="50" value="'. $this->getStrIngresoem() .'" />
                                </td>
                            </tr> 
                            <tr class="formulariofila1">
                            	<td align="right"><b>GÉNERO:&nbsp;</b></td>
                                <td align="left">                                    
                                    <select name="lsGenero" id="lsGenero"  class="combobox">
                                        '. $genero->getStrListar($this->getStrGenero()) .'
                                    </select>
                                </td>
                                <td align="right"><b>ESTADO CIVIL:&nbsp;</b></td>
                                <td align="left">                                    
                                    <select name="lsEcivil" id="lsEcivil"  class="combobox">
                                        '. $ecivil->getStrListar($this->getStrEcivil()) .'
                                    </select>
                                </td>
                            </tr>
                           <tr class="formulariofila1">
                            	<td align="right"><b>NIVEL DE INSTRUCCIÓN:&nbsp;</b></td>
                                <td align="left">                                    
                                    <select name="lsTfnecesaria" id="lsTfnecesaria"  class="combobox">
                                        '. $tfnecesaria->getStrListar($this->getStrTfnecesaria()) .'
                                    </select>
                                </td>
                                <td  align="right"><b>OCUPACIÓN:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strOcupacion" name="strOcupacion" type="text" maxlength="100" value="'. $this->getStrOcupacion() .'" />
                                </td>
                           </tr>
                          
                           <tr class="formulariofila1">
                            	';
                           if($_SESSION["usuario"]["tipo"]==2 || $_SESSION["usuario"]["tipo"]==1 )
							{
							$retval .= '<td  align="right"><b>Fecha&nbsp;Ingreso:</b></td>
                                <td align="left">
                                    <input name="dtFechaIngreso" type="text" id="dtFechaIngreso" value="'. $this->getStrFechaIngreso() .'" size="10" readonly="readonly" class="textboxfecha" />
                                    <a href="#">
                                        <img src="'. IMAGENES_PATH .'/calendario.png" title="Calendario" name="strFechaIngreso" id="strFechaIngreso" width="16px" height="16px" style="border: 0px none;">
                                    </a>
                                    <script type="text/javascript">
                                        Calendar.setup({
                                                         inputField: "dtFechaIngreso",
                                                         ifFormat: "%Y-%m-%d",
                                                         button: "strFechaIngreso"
                                                         });
                                    </script>
                                </td>
                                ';
							}
								else 
								{
								$retval .= '<td  align="right"><b>FECHA&nbsp;INGRESO:</b></td>
                                <td align="left">
                                    <input name="dtFechaIngreso" type="text" id="dtFechaIngreso" value="'. $this->getStrFechaIngreso() .'" size="10" readonly="readonly" style="background-color:#F7D358" class="textboxfecha" />
                              ';
									
								}
                            $retval .= '		
                               <td  align="right"><b>CELULAR:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strCelular" name="strCelular" type="text" maxlength="100" value="'. $this->getStrCelular() .'" />
                                </td>
                           </tr>  
							<tr class="formulariofila1">
                                 <td  align="right"><b>CONVENCIONAL:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strConvencional" name="strConvencional" type="text" maxlength="100" value="'. $this->getStrConvencional() .'" />
                                </td>
                             	
                            </tr>
                           

  <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">REFERIDO POR:</td>
                            </tr>
							
                           <tr class="formulariofila1">
                               	<td  align="right"><b> </b></td>
                                <td align="left">
                                    <input type="checkbox" id="strUsuario" name="strUsuario" value="'. $this->getStrUsuario().'">USUARIO<br>
                                </td>
                                <td  align="right"><b></b></td>
                                <td align="left">
                                    <input type="checkbox" id="strFamiliar" name="strFamiliar" value="'. $this->getStrFamiliar().'">FAMILIAR<br>
                                </td>
                                
                            </tr>
                            <tr class="formulariofila1">
                               	<td  align="right"><b> </b></td>
                                <td align="left">
                                    <input type="checkbox" id="strEmpresa" name="strEmpresa" value="'. $this->getstrEmpresa().'">EMPRESA<br>
                                </td>
                                <td  align="right"><b> </b></td>
                                <td align="left">
                                    <input type="checkbox" id="strEquiposil" name="strEquiposil" value="'. $this->getStrEquiposil().'">EQUIPO SIL<br>
                                </td>
                                
                            </tr>
                            <tr class="formulariofila1">
                            	<td  align="right"><b>¿OTROS-QUIÉN?:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strOtrosr" name="strOtrosr" type="text" maxlength="100" value="'. $this->getStrOtrosr() .'" />
                                </td>
                                 <td  align="right"><b>NOMBRE:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strNombrer" name="strNombrer" type="text" maxlength="100" value="'. $this->getStrNombrer() .'" />
                                </td>
                             	
                            </tr>
<table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">TIPO DE ATENCIÓN INICIAL</td>
                            </tr>
                           <tr class="formulariofila1">
 		                       	<td  align="right"><b></b></td>
                                <td align="left">
                                    <input type="checkbox" id="strEntrevista" name="strEntrevista" value="'. $this->getstrEntrevista().'">ENTREVISTA UNICA<br>
                                </td>
                               	<td  align="right"><b></b></td>
                                <td align="left">
                                    <input type="checkbox" id="strConsulta" name="strConsulta" value="'. $this->getStrConsulta().'">CONSULTA<br>
                                </td>
                             </tr>
                            <tr class="formulariofila1">
 		                       	<td  align="right"><b></b></td>
                                <td align="left">
                                    <input type="checkbox" id="strRentrevista" name="strRentrevista" value="'. $this->getStrRentrevista().'">RE-ENTREVISTA<br>
                                </td>
                               	<td  align="right"><b></b></td>
                                <td align="left">
                                    <input type="checkbox" id="strEvaluacionp" name="strEvaluacionp" value="'. $this->getStrEvaluacionp().'">EVALUACIÓN PSICOLÓGICA INTEGRAL<br>
                                </td>
                            </tr>
                            <tr class="formulariofila1">
 		                       	<td  align="right"><b></b></td>
                                <td align="left">
                                    <input type="checkbox" id="strIniciopt" name="strIniciopt" value="'. $this->getStrIniciopt().'">INICIO DE PROCESO TERAPÉUTICO<br>
                                </td>
                               
                            </tr>
   <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo"></td>
                            </tr>                             
							  
							  
							  
                            <tr class="formulariofila1">
                                 <td  align="right"><b>ANTECEDENTES DE REFERENCIA:</b></td>
                                	<td align="left">
                                    <textarea class="textbox" id="strAntecedentesr" rows="4" name="strAntecedentesr" type="text" value="'. $this->getStrAntecedentesr() .'" />'. $this->getStrAntecedentesr() .'</textarea>
                                </td>
                             	                      
                               <td  align="right"><b>ANAMNESIS:</b></td>
                                	<td align="left">
                                    <textarea class="textbox" id="strAnamesis" rows="4" name="strAnamesis" type="text" value="'. $this->getStrAnamesis() .'" />'. $this->getStrAnamesis() .'</textarea>
                                </td>
                             	
                            </tr>
                            
                           
                                
                             	
                            </tr>
<table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">SITUACIÓN ECONÓMICA FAMILIAR</td>
                            </tr> 
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">VIVIENDA</td>
                            </tr>    
                            <tr class="formulariofila1">
 		                       	<td  align="right"><b></b></td>
                                <td align="left">
                                    <input type="checkbox" id="strPropia" name="strPropia" value="'. $this->getstrPropia().'">PROPIA<br>
                                </td>
                               	<td  align="right"><b></b></td>
                                <td align="left">
                                    <input type="checkbox" id="strAlquilada" name="strAlquilada" value="'. $this->getstrAlquilada().'">ALQUILADA<br>
                                </td>
                            </tr>
                            <tr class="formulariofila1">
 		                       	<td  align="right"><b></b></td>
                                <td align="left">
                                    <input type="checkbox" id="strPrestada" name="strPrestada" value="'. $this->getstrPrestada().'">PRESTADA<br>
                                </td>
                               	<td  align="right"><b></b></td>
                                <td align="left">
                                    <input type="checkbox" id="strVfamiliar" name="strVfamiliar" value="'. $this->getStrVfamiliar().'">FAMILIAR<br>
                                </td>
                            </tr> 
                            <tr class="formulariofila1">
 		                       	<td  align="right"><b>OTROS/CUÁL:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strVotros" name="strVotros" type="text" maxlength="100"  value="'. $this->getStrVotros() .'" />
                                </td>
                            </tr>
                            
 <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">SERVICIOS BÁSICOS</td>
                            </tr>   
                            <tr class="formulariofila1">
 		                       	<td  align="right"><b></b></td>
                                <td align="left">
                                    <input type="checkbox" id="strApotable" name="strApotable" value="'. $this->getStrApotable().'">AGUA POTABLE<br>
                                </td>
                               	<td  align="right"><b></b></td>
                                <td align="left">
                                    <input type="checkbox" id="strAlcantarillado" name="strAlcantarillado" value="'. $this->getstrAlcantarillado().'">ALCANTARILLADO<br>
                                </td>
                            </tr> 
                            <tr class="formulariofila1">
 		                       	<td  align="right"><b></b></td>
                                <td align="left">
                                    <input type="checkbox" id="strElectricidad" name="strElectricidad" value="'. $this->getstrElectricidad().'">ELECTRICIDAD<br>
                                </td>
                               	<td  align="right"><b></b></td>
                                <td align="left">
                                    <input type="checkbox" id="strTelefoniaf" name="strTelefoniaf" value="'. $this->getstrTelefoniaf().'">TELEFONÍA FIJA<br>
                                </td>
                            </tr> 
                            <tr class="formulariofila1">
 		                       	<td  align="right"><b></b></td>
                                <td align="left">
                                    <input type="checkbox" id="strTransportep" name="strTransportep" value="'. $this->getstrTransportep().'">TRANSPORTE PÚBLICO<br>
                                </td>
                               	<td  align="right"><b></b></td>
                                <td align="left">
                                    <input type="checkbox" id="strCorreoe" name="strCorreoe" value="'. $this->getstrCorreoe().'">CORREO ELECTRÓNICO<br>
                                </td>
                            </tr> 
                            <tr class="formulariofila1">
 		                       	<td  align="right"><b></b></td>
                                <td align="left">
                                    <input type="checkbox" id="strViasa" name="strViasa" value="'. $this->getstrViasa().'">VÍAS DE ACCESO<br>
                                </td>
                               	
                            </tr> 
 <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">INGRESOS</td>
                            </tr>  
                            <tr class="formulariofila1">
                                 <td  align="right"><b>PROCEDENCIA:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strProcedencia" name="strProcedencia" type="text" maxlength="100"  value="'. $this->getStrProcedencia() .'" />
                                </td>
                             	<td  align="right"><b>CANTIDAD:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strCantidad" name="strCantidad" type="text" maxlength="100"  value="'. $this->getStrCantidad() .'" />
                                </td>
                            </tr>                           
							
 <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">GASTOS</td>
                            </tr>  
                            <tr class="formulariofila1">
                                 <td  align="right"><b>Cantidad:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strCantidadg" name="strCantidadg" type="text" maxlength="100"  value="'. $this->getStrCantidadg() .'" />
                                </td>
                             	
                            </tr>                           
							                        
 <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo"></td>
                            </tr> 
                            <tr class="formulariofila1">
                                <td  align="right"><b>RESULTADOS DE ENTREVISTA:</b></td>
                                <td align="left">
                                    <textarea class="textbox" id="strResultadose" rows="4" name="strResultadose" type="text" value="'. $this->getstrResultadose() .'" />'. $this->getstrResultadose() .'</textarea>
                                </td>
                                <td  align="right"><b>REACTIVOS APLICADOS:</b></td>
                                <td align="left">
                                    <textarea class="textbox" id="strReactivosa" rows="4" name="strReactivosa" type="text" value="'. $this->getstrReactivosa() .'" />'. $this->getstrReactivosa() .'</textarea>
                                </td>
                            </tr>
							<tr class="formulariofila1">
								<td  align="right"><b></b></td>
                                <td align="left">
                                    
                                </td>
                                <td  align="right"><b>RESULTADOS DE REACTIVOS APLICADOS:</b></td>
                                <td align="left">
                                    <textarea class="textbox" id="strResultadosra" rows="8" name="strResultadosra" type="text" value="'. $this->getstrResultadosra() .'" />'. $this->getstrResultadosra() .'</textarea>
                                </td>
                                
                            </tr>
 <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">EVALUACIÓN</td>
                            </tr> 
                            <tr class="formulariofila1">
                                <td  align="right"><b>EVALUACIÓN PSICOLÓGICO INDIVIDUAL:</b></td>
                                <td align="left">
                                    <textarea  class="textbox" id="strEvaluacionindi" rows="4" name="strEvaluacionindi" type="text" value="'. $this->getstrEvaluacionindi() .'" />'. $this->getstrEvaluacionindi() .'</textarea>
                                </td>
                                <td  align="right"><b>EVALUACIÓN PSICOLÓGICA FAMILIAR:</b></td>
                                <td align="left">
                                    <textarea  class="textbox" id="strEvaluacionfami" rows="4" name="strEvaluacionfami" type="text" value="'. $this->getstrEvaluacionfami() .'" />'. $this->getstrEvaluacionfami() .'</textarea>
                                </td>
                            </tr>
							<tr class="formulariofila1">
                                <td  align="right"><b>EVALUACIÓN PSICOPEDAGÓGICA :</b></td>
                                <td align="left">
                                    <textarea  class="textbox" id="strEvaluacionpsico" rows="4" name="strEvaluacionpsico" type="text" value="'. $this->getstrEvaluacionpsico() .'" />'. $this->getstrEvaluacionpsico() .'</textarea>
                                </td>
                                <td  align="right"><b>EVALUACIÓN PSICOLÓGICO SOCIAL:</b></td>
                                <td align="left">
                                    <textarea  class="textbox" id="strEvaluacionsocial" rows="4" name="strEvaluacionsocial" type="text" value="'. $this->getstrEvaluacionsocial() .'" />'. $this->getstrEvaluacionsocial() .'</textarea>
                                </td>
                            </tr>                            
							<tr class="formulariofila1">
                                <td  align="right"><b>EVALUACIÓN OCUPACIONAL :</b></td>
                                <td align="left">
                                    <textarea  class="textbox" id="strEvaluacionocup" rows="4" name="strEvaluacionocup" type="text" value="'. $this->getstrEvaluacionocup() .'" />'. $this->getstrEvaluacionocup() .'</textarea>
                                </td>
                                
                            </tr>  
  <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">COMPETENCIAS Y ÁREAS A FORTALECER</td>
                            </tr> 
                            <tr class="formulariofila1">
                                <td  align="right"><b>PERSONALES:</b></td>
                                <td align="left">
                                    <textarea class="textbox" id="strPersonales" rows="4" name="strPersonales" type="text" value="'. $this->getstrPersonales() .'" />'. $this->getstrPersonales() .'</textarea>
                                </td>
                                <td  align="right"><b>PSICOSOCIALES:</b></td>
                                <td align="left">
                                    <textarea  class="textbox" id="strPsicosociales" rows="4" name="strPsicosociales" type="text" value="'. $this->getstrPsicosociales() .'" />'. $this->getstrPsicosociales() .'</textarea>
                                </td>
                            </tr>
                           <tr class="formulariofila1">
                                <td  align="right"><b>TRANSVERSALES:</b></td>
                                <td align="left">
                                    <textarea class="textbox" id="strTransversales" rows="4" name="strTransversales" type="text" value="'. $this->getstrTransversales() .'" />'. $this->getstrTransversales() .'</textarea>
                                </td>
                                <td  align="right"><b>ÁREAS A FORTALECER:</b></td>
                                <td align="left">
                                    <textarea  class="textbox" id="strAfortalecer" rows="4" name="strAfortalecer" type="text" value="'. $this->getstrAfortalecer() .'" />'. $this->getstrAfortalecer() .'</textarea>
                                </td>
                            </tr> 
<table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">JERARQUIZACIÒN DE NECESIDADES</td>
                            </tr> 
                            <tr class="formulariofila1">
                                <td  align="right"><b>ATENCIÓN PRIMARIA:</b></td>
                                <td align="left">
                                    <textarea  class="textbox" id="strAtencionp" rows="4" name="strAtencionp" type="text" value="'. $this->getstrAtencionp() .'" />'. $this->getstrAtencionp() .'</textarea>
                                </td>
                                <td  align="right"><b>ATENCIÓN SECUNDARIA:</b></td>
                                <td align="left">
                                    <textarea  class="textbox" id="strAtencions" rows="4" name="strAtencions" type="text" value="'. $this->getstrAtencions() .'" />'. $this->getstrAtencions() .'</textarea>
                                </td>
                            </tr>							
<table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">DIAGNÓSIS</td>
                            </tr> 
                            <tr class="formulariofila1">
                                <td  align="right"><b>DESCRIPCIÓN DIAGNÓSTICA INTEGRAL:</b></td>
                                <td align="left">
                                    <textarea  class="textbox" id="strDescripciond" rows="4" name="strDescripciond" type="text" value="'. $this->getstrDescripciond() .'" />'. $this->getstrDescripciond() .'</textarea>
                                </td>
                                <td  align="right"><b>PRONÓSTICO:</b></td>
                                <td align="left">
                                    <textarea class="textbox" id="strPronostico" rows="4" name="strPronostico" type="text" value="'. $this->getstrPronostico() .'" />'. $this->getstrPronostico() .'</textarea>
                                </td>
                            </tr>								
							<tr class="formulariofila1">
                                <td  align="right"><b>CONCLUSIONES:</b></td>
                                <td align="left">
                                    <textarea class="textbox" id="strConcluciones" rows="4" name="strConcluciones" type="text" value="'. $this->getstrConcluciones() .'" />'. $this->getstrConcluciones() .'</textarea>
                                </td>
                                <td  align="right"><b>RECOMENDACIONES:</b></td>
                                <td align="left">
                                    <textarea  class="textbox" id="strRecomendaciones" rows="4" name="strRecomendaciones" type="text" value="'. $this->getstrRecomendaciones() .'" />'. $this->getstrRecomendaciones() .'</textarea>
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

        public function getStrIngresar() 
        {
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spingresarterapia('%s','%s','%s','%s','%s','%s','%s','%s',
            '%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s',
            '%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s',
            '%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s');",
            $this->getstrFechai(), $this->getstrResponsable(), $this->getstrCargo(), $this->getStrFechae(), $this->getStrLevaluacion(),
            $this->getStrSolicitadop(),$this->getStrNapellidos(),$this->getStrFechaNacimiento(), $this->getStrLnacimiento(),$this->getStrDirecciond(),
            $this->getStrIngresoec(),$this->getStrIngresoem(),$this->getStrGenero(),$this->getStrEcivil(),$this->getStrTfnecesaria(),
            $this->getStrOcupacion(),$this->getStrFechaIngreso(),$this->getStrCelular(),$this->getStrConvencional(),$this->getStrUsuario(),
            $this->getstrFamiliar(),$this->getStrEmpresa(),$this->getStrEquiposil(),$this->getStrOtrosr(),$this->getStrNombrer(),
            $this->getStrEntrevista(),$this->getStrConsulta(),$this->getStrRentrevista(),$this->getStrEvaluacionp(),$this->getStrIniciopt(),
            $this->getStrAntecedentesr(),$this->getStrAnamesis(),$this->getStrComposicionf(),$this->getStrPropia(),$this->getStrAlquilada(),
            $this->getStrPrestada(),$this->getStrVfamiliar(),$this->getStrVotros(),$this->getStrApotable(),$this->getStrAlcantarillado(),
            $this->getstrElectricidad(), $this->getstrTelefoniaf(), $this->getstrTransportep(), $this->getStrCorreoe(), $this->getStrViasa(),
            $this->getStrProcedencia(),$this->getStrCantidad(),$this->getStrCantidadg(), $this->getStrResultadose(),$this->getStrReactivosa(),
            $this->getStrResultadosra(),$this->getStrEvaluacionindi(),$this->getStrEvaluacionfami(),$this->getStrEvaluacionpsico(),$this->getStrEvaluacionsocial(),
            $this->getStrEvaluacionocup(),$this->getStrPersonales(),$this->getStrPsicosociales(),$this->getStrTransversales(),$this->getStrAfortalecer(),
            $this->getstrAtencionp(),$this->getStrAtencions(),$this->getStrDescripciond(),$this->getStrPronostico(),$this->getStrConcluciones(),
            $this->getStrRecomendaciones(),$_SESSION["usuario"]["suc"],$_SESSION["usuario"]["cuenta"]);
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Estado_Civil= [ '. $this->getStrFechai().' ] Em@il = [ '.$this->getStrFechai().' ] Fecha_Nacimiento= [ '. $this->getStrFechaNacimiento().' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s','%s','%s','%s');", $_SESSION["usuario"]["cuenta"], 'GUARDAR', 'tpsicoterapeutico', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL spactualizaterapia('%s','%s','%s','%s','%s','%s','%s',
            '%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s',
            '%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s',
            '%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s');",
            $this->getStrCodigo(),$this->getstrFechai(), $this->getstrResponsable(), $this->getstrCargo(), $this->getStrFechae(),
            $this->getStrLevaluacion(),$this->getStrSolicitadop(),$this->getStrNapellidos(),$this->getStrFechaNacimiento(),$this->getStrLnacimiento(),
            $this->getStrDirecciond(),$this->getStrIngresoec(),$this->getStrIngresoem(),$this->getStrGenero(),$this->getStrEcivil(),
            $this->getStrTfnecesaria(),$this->getStrOcupacion(),$this->getStrFechaIngreso(),$this->getStrCelular(),$this->getStrConvencional(),
            $this->getStrUsuario(),$this->getstrFamiliar(),$this->getStrEmpresa(),$this->getStrEquiposil(),$this->getStrOtrosr(),
            $this->getStrNombrer(),$this->getStrEntrevista(),$this->getStrConsulta(),$this->getStrRentrevista(),$this->getStrEvaluacionp(),
            $this->getStrIniciopt(),$this->getStrAntecedentesr(),$this->getStrAnamesis(),$this->getStrComposicionf(),$this->getStrPropia(),
            $this->getStrAlquilada(),$this->getStrPrestada(),$this->getStrVfamiliar(),$this->getStrVotros(),$this->getStrApotable(),
            $this->getStrAlcantarillado(),$this->getstrElectricidad(), $this->getstrTelefoniaf(), $this->getstrTransportep(), $this->getStrCorreoe(),
            $this->getStrViasa(),$this->getStrProcedencia(),$this->getStrCantidad(),$this->getStrCantidadg(), $this->getStrResultadose(),
            $this->getStrReactivosa(),$this->getStrResultadosra(),$this->getStrEvaluacionindi(),$this->getStrEvaluacionfami(),$this->getStrEvaluacionpsico(),
            $this->getStrEvaluacionsocial(),$this->getStrEvaluacionocup(),$this->getStrPersonales(),$this->getStrPsicosociales(),$this->getStrTransversales(),
            $this->getStrAfortalecer(),$this->getstrAtencionp(),$this->getStrAtencions(),$this->getStrDescripciond(),$this->getStrPronostico(),
            $this->getStrConcluciones(),$this->getStrRecomendaciones());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Estado_Civil= [ '. $this->getStrFechai().' ] Em@il = [ '.$this->getStrFechai().' ] Fecha_Nacimiento= [ '. $this->getStrFechaNacimiento().' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s','%s','%s','%s');", $_SESSION["usuario"]["cuenta"], 'ACTUALIZAR', 'tpsicoterapeutico', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL speliminarterapia('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlInsertUpdateDelete();

           if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'responsable =['. $this->getstrResponsable().' ] apotable = [ '.$this->getStrApotable().' ] Fecha Nacimiento= [ '. $this->getStrFechaNacimiento().' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'ELIMINAR', 'tpsicoterapeutico', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL spbterapia('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
            foreach( $resultado as $rst):   
			$this->setStrCodigo($rst['psicoterapeutico_id']); 	
		    $this->setstrFechai($rst["fechai"]);
            $this->setstrResponsable($rst["responsable"]);
			$this->setstrCargo($rst["cargo"]);
			$this->setStrFechae($rst["fechae"]); 
			$this->setStrLevaluacion($rst["levaluacion"]);
			$this->setStrSolicitadop($rst["solicitadop"]); 
			$this->setStrNapellidos($rst["napellidos"]);
			$this->setStrFechaNacimiento($rst["fechanacimiento"]);
			$this->setStrLnacimiento($rst["lnacimiento"]);
			$this->setStrDirecciond($rst["direcciond"]);
			$this->setStrIngresoec($rst["ingresoec"]);
			$this->setStrIngresoem($rst["ingresoem"]);
			$this->setStrGenero($rst["genero_id"]);
			$this->setStrEcivil($rst["ecivil_id"]);
			$this->setStrTfnecesaria($rst["tfnecesaria_id"]);
			$this->setStrOcupacion($rst["ocupacion"]);
			$this->setStrFechaIngreso($rst["fechaingreso"]);
			$this->setStrCelular($rst["celular"]);
			$this->setStrConvencional($rst["convencional"]);
			$this->setStrUsuario($rst["usuario"]);
			$this->setStrFamiliar($rst["familiar"]);
			$this->setStrEmpresa($rst["empresa"]);
			$this->setStrEquiposil($rst["equiposil"]);
			$this->setStrOtrosr($rst["otrosr"]);
			$this->setStrNombrer($rst["nombrer"]);
			$this->setstrEntrevista($rst["entrevista"]);
			$this->setStrConsulta($rst["consulta"]);
			$this->setStrRentrevista($rst["rentrevista"]);
			$this->setStrEvaluacionp($rst["evaluacionp"]);
			$this->setStrIniciopt($rst["iniciopt"]);
			$this->setStrAntecedentesr($rst["antecedentesr"]);
			$this->setStrAnamesis($rst["anamesis"]);
			$this->setStrComposicionf($rst["composicionf"]);
			$this->setStrPropia($rst["propia"]);
			$this->setStrAlquilada($rst["alquilada"]);
			$this->setStrPrestada($rst["prestada"]);
			$this->setStrVfamiliar($rst["vfamiliar"]);
			$this->setStrVotros($rst["votros"]);
			$this->setStrApotable($rst["apotable"]);
			$this->setStrAlcantarillado($rst["alcantarillado"]);
			$this->setStrElectricidad($rst["electricidad"]);
			$this->setStrTelefoniaf($rst["telefoniaf"]);
			$this->setstrTransportep($rst["transportep"]);
			$this->setStrCorreoe($rst["correoe"]);
			$this->setStrViasa($rst["viasa"]);
			$this->setStrProcedencia($rst["procedencia"]);
			$this->setStrCantidad($rst["cantidad"]);
			$this->setStrCantidadg($rst["cantidadg"]);
			$this->setStrResultadose($rst["resultadose"]);
			$this->setStrReactivosa($rst["reactivosa"]);
			$this->setStrResultadosra($rst["resultadosra"]);
			$this->setStrEvaluacionindi($rst["evaluacionindi"]);
			$this->setStrEvaluacionfami($rst["evaluacionfami"]);
			$this->setStrEvaluacionpsico($rst["evaluacionpsico"]);
			$this->setStrEvaluacionsocial($rst["evaluacionsocial"]);
			$this->setStrEvaluacionocup($rst["evaluacionocup"]);
			$this->setStrPersonales($rst["personales"]);
			$this->setStrPsicosociales($rst["psicosociales"]);
			$this->setStrTransversales($rst["transversales"]);
			$this->setStrAfortalecer($rst["afortalecer"]);
			$this->setStrAtencionp($rst["atencionp"]);
			$this->setStrAtencions($rst["atencions"]);
			$this->setStrDescripciond($rst["descripciond"]);
			$this->setStrPronostico($rst["pronostico"]);
			$this->setStrConcluciones($rst["conclusiones"]);
			$this->setStrRecomendaciones($rst["recomendaciones"]);
			
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
            $ProcedimientoAlmacenado = sprintf("CALL sptotalterapia('%d');", $sucursal);
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
            $ProcedimientoAlmacenado = sprintf("CALL splistarterapia('%d','%d','%d');","$re", "$pa","$cf");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            PSICOTERAPÉUTICA<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> LISTADO PSICOTERAPÉUTICAs</legend>
                       ';
            $retval .= '
                        <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                            <tr>
                                <td colspan="14" align="center"><div class="vtip" title="Ingreso<br> [NUEVA ATENCIÓN PSICOTERAPÉUTICA]">
                                    <a href="'.TERAPIA_URL.'terapia.php?btnNuevo=Nuevo">| <img src="'. IMAGENES_PATH .'/rptstocksucursal.png" title="" width="16px" height="16px"  border="0" /><img src="'. IMAGENES_PATH .'/nuevo.png" title="" width="16px" height="16px"  border="0" />NUEVA ATENCIÓN PSICOTERAPÉUTICA |</a>
                                </div><td>
                            </tr>
                            <tr class="tablatitulo">
                                <th colspan="17">LISTADO&nbsp;ATENCIÓN PSICOTERAPÉUTICA;REGISTRADOS</th>
                            </tr>
                            <tr class="tablasubtitulo">
                                <th align="center"> </th> 
                                <th align="center">Id</th>                                                             
                                <th align="center">Fecha</th>
                                <th align="center">Responsable</th>
                                <th align="center">Cargo</th>
                                <th align="center">Fecha  Evaluación</th>
                                <th align="center">Lugar Evaluación</th>
                                <th align="center">Solicitado Por</th>
                                <th align="center">Nombres y apellidos</th>
                                <th align="center" colspan="3">Acciones</th>
                            </tr>
                        ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["psicoterapeutico_id"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["fechai"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["responsable"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["cargo"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["fechae"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["levaluacion"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["solicitadop"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["primer_nombre"] .' '. $rst["segundo_nombre"] .' '. $rst["apellido_paterno"] .' '. $rst["apellido_materno"] .'</td>';
					
					$retval .= 	'<td align="center"><div class="vtip" title="ACTUALIZAR PSICOTERAPÉUTICA<br> [ codigo = '.$rst["psicoterapeutico_id"] .' ]">';
                    $retval .=  '<a href="'. TERAPIA_URL .'terapia.php?btnActualizar=Actualizar&strCodigo='. $rst["psicoterapeutico_id"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    if($_SESSION["usuario"]["tipo"]==2 || $_SESSION["usuario"]["tipo"]==1 )
							{
                    $retval .= 	'<td align="center"><div class="vtip" title="ELIMINAR PSICOTERAPÉUTICA<br> [ codigo = '.$rst["psicoterapeutico_id"] .' ]">';
                    $retval .=  '<a href="'. TERAPIA_URL .'terapia.php?btnEliminar=Eliminar&strCodigo='. $rst["psicoterapeutico_id"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    }
                    $retval .= 	'<td align="center"><div class="vtip" title="DETALLE PSICOTERAPÉUTICA <br> [ codigo = '.$rst["psicoterapeutico_id"] .' ]">';
                    $retval .=  '<a href="'. TERAPIA_URL .'terapia.php?btnDetalle=Detalle&strCodigo='. $rst["psicoterapeutico_id"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                    $i = 1 - $i;
                endforeach;
            }

            $paginacion->setStrNombrePagina("terapia/terapia.php");
            $retval .= '<tr><td colspan="12" align="center">'. $paginacion->getStrPaginacion() .'</td></tr>';
            $retval .= '</table>';
            $retval .= '</fieldset>';
            return $retval;
        }

public function getStrDetallePersona()
        {
            $query = new clQuery();
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbdetalleterapia('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            PSICOTERAPÉUTICAS<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO PSICOTERAPÉUTICAS<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">DETALLE PSICOTERAPÉUTICAS
                        </legend>
                       ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                    $retval .= '<tr>
                                    <td colspan="2" align="center">
                                        <a href="'. TERAPIA_URL .'terapia.php">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" />REGRESAR LISTADO PSICOTERAPÉUTICAS|</a>
                                    <td>
                                </tr>
                                ';
                    
                    $retval .= '<tr class="tablatitulo">
                                    <th colspan="2">DETALLE&nbsp;PSICOTERAPÉUTICA;REGISTRADO</th>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">CÓDIGO:</th>
                                    <td align="left">  '. $rst["psicoterapeutico_id"] .'</td>
                                </tr>
                                ';
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">FECHA:</th>
                                    <td align="left">  '. $rst["fechai"] .'</td>
                                </tr>
                                ';            
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">RESPONSABLE:</th>
                                    <td align="left">  '. $rst["responsable"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">CARGO:</th>
                                    <td align="left">  '. $rst["cargo"] .'</td>
                                </tr>
                                ';	
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">FECHA EVALUACIÓN:</th>
                                    <td align="left">  '. $rst["fechae"] .'</td>
                                </tr>
                                ';	            		
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">LUGAR EVALUACIÓN:</th>
                                    <td align="left">  '. $rst["levaluacion"] .'</td>
                                </tr>
                                ';  
								
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">SOLICITADO POR:</th>
                                    <td align="left">  '. $rst["solicitadop"] .'</td>
                                </tr>
                                ';  
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">NOMBRES Y APELLIDOS:</th>
                                    <td align="left">  '. $rst["primer_nombre"] .'  '. $rst["segundo_nombre"] .' '. $rst["apellido_paterno"] .' '. $rst["apellido_materno"] .'</td>
                                </tr>
                                ';  
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">FECHA DE NACIMIENTO:</th>
                                    <td align="left">  '. $rst["fechanacimiento"] .'</td>
                                </tr>
                                ';  
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">LUGAR DE NACIMIENTO:</th>
                                    <td align="left">  '. $rst["lnacimiento"] .'</td>
                                </tr>
                                ';  
                     $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">DEIRECCIÓN DOMICILIARIA:</th>
                                    <td align="left">  '. $rst["direcciond"] .'</td>
                                </tr>
                                ';                         									
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">EC:</th>
                                    <td align="left">  '. $rst["ingresoec"] .'</td>
                                </tr>
                                ';  	
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">EM:</th>
                                    <td align="left">  '. $rst["ingresoem"] .'</td>
                                </tr>
                                ';  
								
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">GÉNERO:</th>
                                    <td align="left">  '. $rst["genero_nombre"] .'</td>
                                </tr>
                                ';
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">ESTADO CIVIL:</th>
                                    <td align="left">  '. $rst["estadocivil_nombre"] .'</td>
                                </tr>
                                ';            
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">NIVEL DE INSTRUCCIÓN:</th>
                                    <td align="left">  '. $rst["formacion_descripcion"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">OCUPACIÓN:</th>
                                    <td align="left">  '. $rst["ocupacion"] .'</td>
                                </tr>
                                ';	
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">FECHA INGRESO:</th>
                                    <td align="left">  '. $rst["fechaingreso"] .'</td>
                                </tr>
                                ';	            		
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">CELULAR:</th>
                                    <td align="left">  '. $rst["celular"] .'</td>
                                </tr>
                                ';  
								
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">CONVENCIONAL:</th>
                                    <td align="left">  '. $rst["convencional"] .'</td>
                                </tr>
                                ';  
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">USUARIO:</th>
                                    <td align="left">  '. $rst["usuario"] .'</td>
                                </tr>
                                ';  
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">FAMILIAR:</th>
                                    <td align="left">  '. $rst["familiar"] .'</td>
                                </tr>
                                ';  
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">EMPRESA:</th>
                                    <td align="left">  '. $rst["empresa"] .'</td>
                                </tr>
                                ';  
                     $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">EQUIPO SIL:</th>
                                    <td align="left">  '. $rst["equiposil"] .'</td>
                                </tr>
                                ';                         									
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">¿OTROS-QUIÉN?::</th>
                                    <td align="left">  '. $rst["otrosr"] .'</td>
                                </tr>
                                ';  	
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">NOMBRE:</th>
                                    <td align="left">  '. $rst["nombrer"] .'</td>
                                </tr>
                                ';  
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">ENTREVISTA ÚNICA:</th>
                                    <td align="left">  '. $rst["entrevista"] .'</td>
                                </tr>
                                ';
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">CONSULTA:</th>
                                    <td align="left">  '. $rst["consulta"] .'</td>
                                </tr>
                                ';            
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">RE-ENTREVISTA:</th>
                                    <td align="left">  '. $rst["rentrevista"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">EVALUACIÓN PSICOLÓGICA INTEGRAL:</th>
                                    <td align="left">  '. $rst["evaluacionp"] .'</td>
                                </tr>
                                ';	
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">INICIO DE PROCESO TERAPÉUTICO:</th>
                                    <td align="left">  '. $rst["iniciopt"] .'</td>
                                </tr>
                                ';	            		
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">ANTECEDENTES DE REFERENCIA:</th>
                                    <td align="left">  '. $rst["antecedentesr"] .'</td>
                                </tr>
                                ';  
								
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">ANAMNESIS:</th>
                                    <td align="left">  '. $rst["anamesis"] .'</td>
                                </tr>
                                ';  
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">PROPIA:</th>
                                    <td align="left">  '. $rst["propia"] .'</td>
                                </tr>
                                ';  
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">ALQUILADA:</th>
                                    <td align="left">  '. $rst["alquilada"] .'</td>
                                </tr>
                                ';  
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">PRESTADA:</th>
                                    <td align="left">  '. $rst["prestada"] .'</td>
                                </tr>
                                ';  
                     $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">FAMILIAR:</th>
                                    <td align="left">  '. $rst["vfamiliar"] .'</td>
                                </tr>
                                ';                         									
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">OTROS/CUÁL:</th>
                                    <td align="left">  '. $rst["votros"] .'</td>
                                </tr>
                                ';  	
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">AGUA POTABLE:</th>
                                    <td align="left">  '. $rst["apotable"] .'</td>
                                </tr>
                                ';  
								
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">ALCANTARILLADO:</th>
                                    <td align="left">  '. $rst["alcantarillado"] .'</td>
                                </tr>
                                ';
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">ELECTRICIDAD:</th>
                                    <td align="left">  '. $rst["electricidad"] .'</td>
                                </tr>
                                ';            
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">TELEFONÍA FIJA:</th>
                                    <td align="left">  '. $rst["telefoniaf"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">TRANSPORTE PÚBLICO:</th>
                                    <td align="left">  '. $rst["transportep"] .'</td>
                                </tr>
                                ';	
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">CORREO ELECTRÓNICO:</th>
                                    <td align="left">  '. $rst["correoe"] .'</td>
                                </tr>
                                ';	            		
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">VÍAS DE ACCESO:</th>
                                    <td align="left">  '. $rst["viasa"] .'</td>
                                </tr>
                                ';  
								
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">PROCEDENCIA:</th>
                                    <td align="left">  '. $rst["procedencia"] .'</td>
                                </tr>
                                ';  
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">CANTIDAD INGRESOS:</th>
                                    <td align="left">  '. $rst["cantidad"] .'</td>
                                </tr>
                                ';  
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">CANTIDAD EGRESOS:</th>
                                    <td align="left">  '. $rst["cantidadg"] .'</td>
                                </tr>
                                ';  
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">RESULTADOS DE ENTREVISTA:</th>
                                    <td align="left">  '. $rst["resultadose"] .'</td>
                                </tr>
                                ';  
                     $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">REACTIVOS APLICADOS:</th>
                                    <td align="left">  '. $rst["reactivosa"] .'</td>
                                </tr>
                                ';                         									
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">RESULTADOS DE REACTIVOS APLICADOS:</th>
                                    <td align="left">  '. $rst["resultadosra"] .'</td>
                                </tr>
                                ';  	
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">EVALUACIÓN PSICOLÓGICO INDIVIDUAL:</th>
                                    <td align="left">  '. $rst["evaluacionindi"] .'</td>
                                </tr>
                                ';  
								
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">EVALUACIÓN PSICOLÓGICA FAMILIAR:</th>
                                    <td align="left">  '. $rst["evaluacionfami"] .'</td>
                                </tr>
                                ';  
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">EVALUACIÓN PSICOPEDAGÓGICA:</th>
                                    <td align="left">  '. $rst["evaluacionpsico"] .'</td>
                                </tr>
                                ';  
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">EVALUACIÓN PSICOLÓGICO SOCIAL:</th>
                                    <td align="left">  '. $rst["evaluacionsocial"] .'</td>
                                </tr>
                                ';  
                     $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">EVALUACIÓN OCUPACIONAL:</th>
                                    <td align="left">  '. $rst["evaluacionocup"] .'</td>
                                </tr>
                                ';                         									
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">PERSONALES:</th>
                                    <td align="left">  '. $rst["resultadosra"] .'</td>
                                </tr>
                                ';  	
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">PSICOSOCIALES:</th>
                                    <td align="left">  '. $rst["psicosociales"] .'</td>
                                </tr>
                                ';  	
								
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">TRANSVERSALES:</th>
                                    <td align="left">  '. $rst["transversales"] .'</td>
                                </tr>
                                ';  
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">ÁREAS A FORTALECER:</th>
                                    <td align="left">  '. $rst["afortalecer"] .'</td>
                                </tr>
                                ';  
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">ATENCIÓN PRIMARIA:</th>
                                    <td align="left">  '. $rst["atencionp"] .'</td>
                                </tr>
                                ';  
                     $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">ATENCIÓN SECUNDARIA:</th>
                                    <td align="left">  '. $rst["atencions"] .'</td>
                                </tr>
                                ';                         									
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">DESCRIPCIÓN DIAGNÓSTICA INTEGRAL:</th>
                                    <td align="left">  '. $rst["descripciond"] .'</td>
                                </tr>
                                ';  	
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">PRONÓSTICO:</th>
                                    <td align="left">  '. $rst["pronostico"] .'</td>
                                </tr>
                                ';  
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">CONCLUSIONES:</th>
                                    <td align="left">  '. $rst["conclusiones"] .'</td>
                                </tr>
                                ';  	
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">RECOMENDACIONES:</th>
                                    <td align="left">  '. $rst["recomendaciones"] .'</td>
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