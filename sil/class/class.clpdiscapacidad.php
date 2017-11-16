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
	include_once( CLASS_PATH . "class.cletnia.php" );
	include_once( CLASS_PATH . "class.clpuesto.php" );
    class clPdiscapacidad
    {
        private $StrCodigo;
        private $strFoto;
		private $strIdentificacion;	
		private $strIdentificaciont;
		private $strEstado;
		private $strEmail;
	 	private $StrEcivil;	
		private $StrNcarne;
		private $StrGenero;	 
		private $StrApaterno;
		private $StrAmaterno;
		private $StrPnombre;
		private $StrSnombre;
		private $StrNhijos;
		private $StrFconocer;
		private $StrTseguro;
		private $StrTiposeguro;
		private $strFechaIngreso;
		private $strObservacion;
		private $StrReferido;
		private $StrTlicencia;
		private $StrTipolicencia;
		private $StrVehiculo;
		private $StrAdaptacion;
		private $StrTadaptacion;
		private $StrTfederacion;
		private $StrTipofederacion;
		private $StrAsociacion;
		
		private $strProvincia;
		private $strCanton;
        private $strParroquia;
		private $strSucursal;
		private $strCprincipal;
		private $strNumero;
		private $strTransversal;
		private $strSector;
		private $strPasaje;
		private $strBarrio;
		private $strManzana;
		private $strSolar;
		private $strFijo;
		private $strMovil;
		private $StrReferido1;
		private $strObservaciond;
		private $strFechaNacimiento;
		private $strTusuario;
		private $strEtnia;
		
        private $strEtiqueta;
        private $strNombreBoton;
        private $strValorBoton;
		
		 private $strNombreBotons;
        private $strValorBotons;
		
        private $strLectura;

        public function __construct()
        {
				
            $this->StrCodigo = "";	
			$this->strFoto = "";
            $this->strIdentificacion = "";
			$this->strEmail = "";
			$this->strEstado = "";
			$this->StrEcivil = "";
			$this->StrNcarne = "";
			$this->StrGenero = "";
			$this->StrApaterno = "";
			$this->StrAmaterno = "";	
			$this->StrPnombre = "";
			$this->StrSnombre = "";
			$this->strProvincia = "";
            $this->strCanton = "";
            $this->strParroquia = "";
			$this->strSucursal = "";
			$this->StrNhijos = "";
			$this->StrFconocer = "";
			$this->StrTseguro = "";
			$this->StrTiposeguro = "";
			$this->strFechaIngreso = "";
			$this->strObservacion= "";
			$this->StrReferido2= "";
			$this->StrTlicencia= "";
			$this->StrTipolicencia= "";
			$this->StrVehiculo= "";
			$this->StrAdaptacion= "";
			$this->StrTadaptacion= "";
			$this->StrTfederacion= "";
			$this->StrTipofederacion= "";
			$this->StrAsociacion= "";
			
			$this->strCprincipal= "";
			$this->strNumero= "";
			$this->strTransversal= "";
			$this->strSector= "";
			$this->strPasaje= "";
			$this->strBarrio= "";
			$this->strManzana= "";
			$this->strSolar= "";
			$this->strFijo= "";
			$this->strMovil= "";
			$this->StrReferido1= "";
			$this->strObservaciond= "";
			$this->strTusuario= "";
			$this->strEtnia= "";
			$this->strFechaNacimiento = "";
				
                      
			
            $this->strEtiqueta = "";
            $this->strNombreBoton = "";
            $this->strValorBoton = "";
			
			$this->strNombreBotons = "";
            $this->strValorBotons = "";
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
//////////////////// Tusuario//////////////////
        public function getStrTusuario()
        {
            return $this->strTusuario;
        }
		public function setStrTusuario($n)
        {
            $this->StrTusuario = $n;
        }                
////////////// Nombre /////////////////////
        public function getstrFoto()
        {
            return $this->strFoto;
        }
		public function setstrFoto($n)
        {
            $this->strFoto = $n;
        }
////////////// Responsable /////////////////////		
		public function getstrIdentificacion()
        {
            return $this->strIdentificacion;
        }
  		public function setstrIdentificacion($rp)
        {
            $this->strIdentificacion = $rp;
        } 
//////////// Contacto////////////////// 
		public function getstrIdentificaciont()
        {
            return $this->strIdentificaciont;
        }
  		public function setstrIdentificaciont($ct)
        {
            $this->strIdentificaciont = $ct;
        } 
/////////////////////////////////// Asociacion////////////////// 
		public function getStrAsociacion()
        {
            return $this->strAsociacion;
        }
  		public function setStrAsociacion($ct)
        {
            $this->strAsociacion = $ct;
        }   		    
/////////////////////////Estado  //////////////////////////
 	public function getStrEstado()
        {
            return $this->strEstado;
        }

        public function setStrEstado($et)
        {
            $this->strEstado = $et;
        }
/////////////////////////Tfederacion //////////////////////////
 	public function getStrTfederacion()
        {
            return $this->strTfederacion;
        }

        public function setStrTfederacion($et)
        {
            $this->strTfederacion = $et;
        }		
/////////////////////////Tipo federacion //////////////////////////
 	public function getStrTipofederacion()
        {
            return $this->strTipofederacion;
        }

        public function setStrTipofederacion($et)
        {
            $this->strTipofederacion = $et;
        }				
/////////////////////////Numero de hijos //////////////////////////
 	public function getStrNhijos()
        {
            return $this->strNhijos;
        }

        public function setStrNhijos($et)
        {
            $this->strNhijos = $et;
        }	
/////////////////////////Forma de conocer//////////////////////////
 	public function getStrFconocer()
        {
            return $this->strFconocer;
        }

        public function setStrFconocer($et)
        {
            $this->strFconocer= $et;
        }	
/////////////////////////vehiculo//////////////////////////
 	public function getStrVehiculo()
        {
            return $this->strVehiculo;
        }

        public function setStrVehiculo($et)
        {
            $this->strVehiculo= $et;
        }	
/////////////////////////Adaptacion//////////////////////////
 	public function getStrAdaptacion()
        {
            return $this->strAdaptacion;
        }

        public function setStrAdaptacion($et)
        {
            $this->strAdaptacion= $et;
        }	
/////////////////////////Tadaptacion//////////////////////////
 	public function getStrTadaptacion()
        {
            return $this->strTadaptacion;
        }

        public function setStrTadaptacion($et)
        {
            $this->strTadaptacion= $et;
        }						
/////////////////////////T seguro//////////////////////////
 	public function getStrTseguro()
        {
            return $this->strTseguro;
        }

        public function setStrTseguro($et)
        {
            $this->strTseguro= $et;
        }
/////////////////////////Tipo seguro//////////////////////////
 	public function getStrTiposeguro()
        {
            return $this->strTiposeguro;
        }

        public function setStrTiposeguro($et)
        {
            $this->strTiposeguro= $et;
        }	
/////////////////////////Tiene Licencia//////////////////////////
 	public function getStrTlicencia()
        {
            return $this->strTlicencia;
        }

        public function setStrTlicencia($et)
        {
            $this->strTlicencia= $et;
        }	
/////////////////////////Tipo Licencia//////////////////////////
 	public function getStrTipolicencia()
        {
            return $this->strTipolicencia;
        }

        public function setStrTipolicencia($et)
        {
            $this->strTipolicencia= $et;
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
/////////////////////mail ///////////////////////
        public function getStrEmail()
        {
            return $this->strEmail;
        }

        public function setStrEmail($e)
        {
            $this->strEmail = $e;
        }
/////////////////////Estado Civil //////////////////////////////
		public function getStrEcivil()
	        {
	            return $this->StrEcivil;
	        }

        public function setStrEcivil($t)
	        {
	            $this->StrEcivil = $t;
	        }
/////////////////////////Nº Estudiantes//////////////////////////////
		public function getStrNcarne()
	        {
	            return $this->StrNcarne;
	        }

        public function setStrNcarne($ne)
	        {
	            $this->StrNcarne = $ne;
	        }
////////////////////////Género/////////////////////////////////			
		public function getStrGenero()
	        {
	            return $this->StrGenero;
	        }

        public function setStrGenero($ned)
	        {
	            $this->StrGenero = $ned;
	        }
//////////////////////////////Apellido Paterno//////////////////////////////////////////////////////	
		public function getStrApaterno()
	        {
	            return $this->StrApaterno;
	        }

        public function setStrApaterno($tcf)
	        {
	            $this->StrApaterno = $tcf;
	        }
//////////////////////////////Apellido Materno////////////////////////////////////////////////////
		public function getStrAmaterno()
	        {
	            return $this->StrAmaterno;
	        }

        public function setStrAmaterno($cb)
	        {
	            $this->StrAmaterno = $cb;
	        }
////////////////////////////////Primer Nombre//////////////////////////////////////////////////////////////////////
		public function getStrPnombre()
	        {
	            return $this->StrPnombre;
	        }

        public function setStrPnombre($exp)
	        {
	            $this->StrPnombre = $exp;
	        }

////////////////////////////////Segundo Nombre //////////////////////////////////////
		public function getStrSnombre()
	        {
	            return $this->StrSnombre;
	        }

        public function setStrSnombre($ob)
	        {
	            $this->StrSnombre = $ob;
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
         public function getStrCprincipal()
        {
            return $this->strCprincipal;
        }

        public function setStrCprincipal($cp)
        {
            $this->strCprincipal= $cp;
        }
 /////////////////////////Numero ////////////////////////////////////////////////////		
         public function getStrNumero()
        {
            return $this->strNumero;
        }

        public function setStrNumero($cp)
        {
            $this->strNumero= $cp;
        }
	/////////////////////Transversal //////////////////////////////////////////////////
	     public function getStrTransversal()
        {
            return $this->strTransversal;
        }

        public function setStrTransversal($cp)
        {
            $this->strTransversal= $cp;
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
		public function getStrPasaje()
        {
            return $this->strPasaje;
        }

        public function setStrPasaje($cp)
        {
            $this->strPasaje= $cp;
        }
		
	
	/////////////////////Barrio //////////////////////////////////////////////////
		public function getStrBarrio()
        {
            return $this->strBarrio;
        }

        public function setStrBarrio($cp)
        {
            $this->strBarrio= $cp;
        }
		
//////////////////////////////Manzana//////////////////////////////////////////////////////////
		public function getStrManzana()
        {
            return $this->strManzana;
        }

        public function setStrManzana($cp)
        {
            $this->strManzana= $cp;
        }
		

///////////////////////////////solar////////////////////////////////////////////////////////////
		public function getStrSolar()
        {
            return $this->strSolar;
        }

        public function setStrSolar($cp)
        {
            $this->strSolar= $cp;
        }

/////////////////////////////fijo/////////////////////////////////////////////////////////////////
		public function getStrFijo()
        {
            return $this->strFijo;
        }

        public function setStrFijo($cp)
        {
            $this->strFijo= $cp;
        }
/////////////////////////Movil//////////////////////////////////////////////////////////////
		public function getStrMovil()
        {
            return $this->strMovil;
        }

        public function setStrMovil($cp)
        {
            $this->strMovil= $cp;
        }

////////////////////////referido 1///////////////////////////////////////////////////////////////
		public function getStrReferido1()
        {
            return $this->StrReferido1;
        }

        public function setStrReferido1($fa)
        {
            $this->StrReferido1= $fa;
        }
////////////////////////referido 2///////////////////////////////////////////////////////////////
		public function getStrReferido2()
        {
            return $this->StrReferido2;
        }

        public function setStrReferido2($fa)
        {
            $this->StrReferido2= $fa;
        }	
	
//////////////////////////observaciond //////////////////////////////////////////////////////////////
		public function getStrObservaciond()
        {
            return $this->strObservaciond;
        }

        public function setStrObservaciond($ob)
        {
            $this->strObservaciond= $ob;
        }
//////////////////////////observacion //////////////////////////////////////////////////////////////
		public function getStrObservacion()
        {
            return $this->strObservacion;
        }

        public function setStrObservacion($ob)
        {
            $this->strObservacion= $ob;
        }
//////////////////////////Etnia//////////////////////////////////////////////////////////////
		public function getStrEtnia()
        {
            return $this->strEtnia;
        }

        public function setStrEtnia($ob)
        {
            $this->strEtnia= $ob;
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
////////////////////////nombre////////////////////////////////////////////
public function getStrNombreBotons()
        {
            return $this->strNombreBotons;
        }

        public function setStrNombreBotons($nb)
        {
            $this->strNombreBotons = $nb;
        }
/////////////////////////////valor//////////////////////////////////
public function getStrValorBotons()
        {
            return $this->strValorBotons;
        }

        public function setStrValorBotons($vb)
        {
            $this->strValorBotons = $vb;
        }

///////////////////////////////////////////////////////////////////
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
			$etnia= new clEtnia();
			
			$tipocformativo = new clTipocformativo();
			$cobertura = new clCobertura();
			$experiencia = new clExperiencia();
			$provincia = new clProvincia();
            $canton = new clCanton();
            $parroquia = new clParroquia();
			$sucursal = new clSucursal();
			$sector = new clSector();
			$profesion = new clPuesto();
			
          $retval  = '<script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.validate.js"></script>
                        <script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.metadata.js"></script>
                       ';

            $retval .= '<br><br><br><br>
                        <script>
                            $(document).ready(function(){
                                    $.metadata.setType( \'attr\', \'validate\' );
                                    $(\'#frmpdiscapacidad\').validate({
                                            rules:{
                                            	lsIdentificacion: { required: true},
                                            	StrNcarne: { required: true},
                                            	StrApaterno: { required: true},
                                            	StrAmaterno: { required: true},
                                            	StrPnombre: { required: true},
                                            	StrSnombre: { required: true},
                                            	lsGenero: { required: true},
                                            	lsEcivil: { required: true},
                                            	dtFecha: { required: true},
                                            	lsNhijos: { required: true},
                                            	lsFconocer: { required: true},
                                            	lsEstado: { required: true},
                                            	lsTseguro: { required: true},
                                            	lsEtnia: { required: true},
                                            	lsProvincia: { required: true},
                                            	lsCanton: { required: true},
                                            	lsParroquia: { required: true},
                                            	
												strCprincipal: { required: true},
                                            	strMovil: { required: true},
                                            	strEmail: { required: true},
                                            	lsParroquia: { required: true},
                                            	
                                               	strIdentificaciont: { required: true }
                                                },
                                            messages:{
                                                lsIdentificacion: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                                StrNcarne: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                                StrApaterno: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                                StrAmaterno: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                                StrPnombre: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                                StrSnombre: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                                lsGenero: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                                lsEcivil: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                                dtFecha: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                                lsNhijos: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                                lsFconocer: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                                lsEstado: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                                lsTseguro: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                                lsEtnia: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                                lsProvincia: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                                lsCanton: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                                lsParroquia: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                                
                                                strCprincipal: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                                strMovil: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                                strEmail: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                                
                                                strIdentificaciont: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"}
                                            	}
                                    });
                                    
                                    $("#lsProvincia").change(function () {
                                    $("#lsProvincia option:selected").each(function () {
                                            var provincia = $(this).val();
                                            $.post( "'. PDISCAPACIDAD_URL .'pdiscapacidad.php", { btnBuscar: "Canton",
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
                                            $.post( "'. PDISCAPACIDAD_URL .'pdiscapacidad.php", { btnBuscar: "Parroquia",
                                                                                      strCodigoCanton: canton                                                                                      
                                                                                    },
                                        function(data){
                                                $("#lsParroquia").html(data);                                                
                                        });
                                    });
                                 });
								 $("#lsTseguro").change(function() 
	                 				{
								  		if($(this).val() == "1") 
										  	{
											   	$("#lsTiposeguro").removeAttr("disabled");
												$("#lsTiposeguro").css("background-color", "#FFFFFF");
											}
											  	else 
											  		{
											  	 	$("#lsTiposeguro").attr("disabled", "disabled");
													$("#lsTiposeguro").css("background-color", "#F5DA81"); 
													}
									});
									 $("#lsTlicencia").change(function() 
		                 				{
									  		if($(this).val() == "1") 
											  	{
												   	$("#lsTipolicencia").removeAttr("disabled");
													$("#lsTipolicencia").css("background-color", "#FFFFFF");
												}
												  	else 
												  		{
												  	 	$("#lsTipolicencia").attr("disabled", "disabled");
														$("#lsTipolicencia").css("background-color", "#F5DA81"); 
														}
										});
										$("#lsVehiculo").change(function() 
		                 				{
									  		if($(this).val() == "1") 
											  	{
												   	$("#lsAdaptacion").removeAttr("disabled");
													$("#lsAdaptacion").css("background-color", "#FFFFFF");
												}
												  	else 
												  		{
												  	 	$("#lsAdaptacion").attr("disabled", "disabled");
														$("#lsAdaptacion").css("background-color", "#F5DA81"); 
														$("#strTadaptacion").attr("disabled", "disabled");
														$("#strTadaptacion").css("background-color", "#F5DA81"); 
														}
										});
										$("#lsAdaptacion").change(function() 
		                 				{
									  		if($(this).val() == "1") 
											  	{
												   	$("#strTadaptacion").removeAttr("disabled");
													$("#strTadaptacion").css("background-color", "#FFFFFF");
												}
												  	else 
												  		{
												  	 	$("#strTadaptacion").attr("disabled", "disabled");
														$("#strTadaptacion").css("background-color", "#F5DA81"); 
														}
										});
										$("#lsTfederacion").change(function() 
			                 				{
										  		if($(this).val() == "1") 
												  	{
													   	$("#lsTipofederacion").removeAttr("disabled");
														$("#lsTipofederacion").css("background-color", "#FFFFFF");
														$("#strAsociacion").removeAttr("disabled");
														$("#strAsociacion").css("background-color", "#FFFFFF");
													}
													  	else 
													  		{
													  	 	$("#lsTipofederacion").attr("disabled", "disabled");
															$("#lsTipofederacion").css("background-color", "#F5DA81");
															$("#strAsociacion").attr("disabled", "disabled");
															$("#strAsociacion").css("background-color", "#F5DA81"); 
															}
											});
															 
								 
                            });
                        </script>
                       ';
		  
            $retval .= '<form id="frmpdiscapacidad" action="'. PDISCAPACIDAD_URL .'pdiscapacidad.php" method="POST">';

            $Regresar = "regresar('". PDISCAPACIDAD_URL . "pdiscapacidad.php')";

            $retval .= '<fieldset class="fieldsetPequeno">';
            $retval .= '<legend class="etiquetaborde">
                            PERSONA CO DISCAPACIDAD <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO PERSONAS CON DISCAPACIDAD<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> '. $this->getStrEtiqueta() .'
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
							  	<td align="right"><b>Profesión</b></td>
	                             	<td align="left">                                    
	                                    <select name="strFoto" id="strFoto"  class="combobox">
	                                        '. $profesion->getStrListar($this->getstrFoto()) .'
	                                    </select>
                                </td> 
                             	<td align="right"><b>Tipo Identificación:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsIdentificacion" id="lsIdentificacion"  class="combobox">
	                                        '. $identificacion->getStrListar($this->getstrIdentificacion()) .'
	                                    </select>
                                </td> 
                            </tr>
                            <tr class="formulariofila1">
                                <td  align="right"><b>Número Identificación:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strIdentificaciont" name="strIdentificaciont" type="text" maxlength="50" value="'. $this->getstrIdentificaciont() .'" />
                                </td>
                             	<td  align="right"><b>Nº Carné:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="StrNcarne" name="StrNcarne" type="text" maxlength="50" '. JS_ONLY_NUMS .' value="'. $this->getStrNcarne() .'" />
                                </td>
                             	
                            </tr>
                             <tr class="formulariofila1">
                                <td  align="right"><b>Apellido Paterno:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="StrApaterno" name="StrApaterno" type="text" maxlength="50" '.JS_ONLY_ALFA.' value="'. $this->getStrApaterno() .'" />
                                </td>
                                 <td  align="right"><b>Apellido Materno:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="StrAmaterno" name="StrAmaterno" type="text" maxlength="50" '.JS_ONLY_ALFA.' value="'. $this->getStrAmaterno() .'" />
                                </td>
                            </tr>
                            <tr class="formulariofila1">
                               <td  align="right"><b>Primer Nombre:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="StrPnombre" name="StrPnombre" type="text" maxlength="50" '.JS_ONLY_ALFA.' value="'. $this->getStrPnombre() .'" />
                                </td>
                                <td  align="right"><b>Segundo Nombre:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="StrSnombre" name="StrSnombre" type="text" maxlength="50" '.JS_ONLY_ALFA.' value="'. $this->getStrSnombre() .'" />
                                </td>
                            </tr>
                            <tr class="formulariofila1">
                            	<td align="right"><b>Género:&nbsp;</b></td>
                                <td align="left">                                    
                                    <select name="lsGenero" id="lsGenero"  class="combobox">
                                        '. $genero->getStrListar($this->getStrGenero()) .'
                                    </select>
                                </td>
                                <td align="right"><b>Estado Civil:&nbsp;</b></td>
                                <td align="left">                                    
                                    <select name="lsEcivil" id="lsEcivil"  class="combobox">
                                        '. $ecivil->getStrListar($this->getStrEcivil()) .'
                                    </select>
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
                               <td align="right"><b>Número de Hijos:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsNhijos" id="lsNhijos"  class="combobox">
	                                        '. $nhijos->getStrListar($this->getStrNhijos()) .'
	                                    </select>
                                </td> 
                             	
                            </tr>
                            <tr class="formulariofila1">
                            	<td align="right"><b>Referido Por:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsFconocer" id="lsFconocer"  class="combobox">
	                                        '. $fconocer->getStrListar($this->getStrFconocer()) .'
	                                    </select>
                                </td> 
                                <td align="right"><b>Estado:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsEstado" id="lsEstado"  class="combobox">
	                                        '. $estado->getStrListar($this->getStrEstado()) .'
	                                    </select>
                                </td> 
                           </tr>
                           <tr class="formulariofila1">
                            	<td align="right"><b>¿Tiene Seguro?:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsTseguro" id="lsTseguro"  class="combobox">
	                                        '. $tseguro->getStrListar($this->getStrTseguro()) .'
	                                    </select>
                                </td> 
                                <td align="right"><b>Tipo Seguro:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsTiposeguro" id="lsTiposeguro"  class="combobox">
	                                        '. $tiposeguro->getStrListar($this->getStrTiposeguro()) .'
	                                    </select>
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
								$retval .= '<td  align="right"><b>Fecha&nbsp;Ingreso:</b></td>
                                <td align="left">
                                    <input name="dtFechaIngreso" type="text" id="dtFechaIngreso" value="'. $this->getStrFechaIngreso() .'" size="10" readonly="readonly" style="background-color:#F7D358" class="textboxfecha" />
                              ';
									
								}
                            $retval .= '	
								
                               <td align="right"><b>Etnia:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsEtnia" id="lsEtnia"  class="combobox">
	                                        '. $etnia->getStrListar($this->getStrEtnia()) .'
	                                    </select>
                                </td> 	
                           </tr>  
							
                           

  <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">DIRECCIÓN DE LA PERSONA CON DISCAPACIDAD</td>
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
                                <td  align="right"><b>SIL</b></td>
                                <td align="left">
                                 	<input class="textbox" id="lsSucursal" name="lsSucursal" type="hidden" maxlength="50" value="'. $this->getStrSucursal() .'" />
                                </td>
                            </tr>       
                            <tr class="formulariofila1">
                                 <td  align="right"><b>Calle Principal:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strCprincipal" name="strCprincipal" type="text" maxlength="100" value="'. $this->getStrCprincipal() .'" />
                                </td>
                             	<td  align="right"><b>Numero:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strNumero" name="strNumero" type="text" maxlength="100" '. JS_ONLY_NUMS .' value="'. $this->getStrNumero() .'" />
                                </td>
                            </tr>
                            <tr class="formulariofila1">
                                 <td  align="right"><b>Transversal:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strTransversal" name="strTransversal" type="text" maxlength="100" value="'. $this->getStrTransversal() .'" />
                                </td>
                             	<td  align="right"><b>Sector:</b></td>
                                <td align="left">
                                    <select name="lsSector" id="lsSector" class="combobox">
                                        '. $sector->getStrListar($this->getStrSector()) .'
                                    </select>                           
                            </tr>
                            <tr class="formulariofila1">
                                 <td  align="right"><b>Pasaje:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strPasaje" name="strPasaje" type="text" maxlength="100" value="'. $this->getStrPasaje() .'" />
                                </td>
                             	<td  align="right"><b>Barrio:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strBarrio" name="strBarrio" type="text" maxlength="100" value="'. $this->getStrBarrio() .'" />
                                </td>
                            </tr>
                            <tr class="formulariofila1">
                                 <td  align="right"><b>Manzana:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strManzana" name="strManzana" type="text" maxlength="100"  value="'. $this->getStrManzana() .'" />
                                </td>
                             	<td  align="right"><b>Solar:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strSolar" name="strSolar" type="text" maxlength="100" value="'. $this->getStrSolar() .'" />
                                </td>
                            </tr>
                             <tr class="formulariofila1">
                               <td  align="right"><b>Observación:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strObservacion" name="strObservacion" type="text" maxlength="100"  value="'. $this->getStrObservacion() .'" />
                                </td>
                            </tr>
 <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">TELÉFONOS</td>
                            </tr>                           
                            
                            
                            <tr class="formulariofila1">
                                 <td  align="right"><b>Fijo:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strFijo" name="strFijo" type="text" maxlength="100" value="'. $this->getStrFijo() .'" />
                                </td>
                             	<td  align="right"><b>Móvil:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strMovil" name="strMovil" type="text" maxlength="100"  value="'. $this->getStrMovil() .'" />
                                </td>
                            </tr>
                            <tr class="formulariofila1">
                                 <td  align="right"><b>Referido 1:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="StrReferido1" name="StrReferido1" type="text" maxlength="100" value="'. $this->getStrReferido1() .'" />
                                </td>
                                <td  align="right"><b>Referido 2:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="StrReferido2" name="StrReferido2" type="text" maxlength="100" value="'. $this->getStrReferido2() .'" />
                                </td>
                             	
                            </tr>
                            <tr class="formulariofila1">
                            <td  align="right"><b>Em@il:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strEmail" name="strEmail" type="text" maxlength="50" value="'. $this->getStrEmail() .'" />
                            </td>
                             <td  align="right"><b>Observación:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strObservaciond" name="strObservaciond" type="text" maxlength="100"  value="'. $this->getStrObservaciond() .'" />
                                </td>
                             
							</tr>
 <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">VEHÍCULOS</td>
                            </tr> 
							<tr class="formulariofila1">
                            	<td  align="right"><b>¿Tiene Licencia de Conducir?:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsTlicencia" id="lsTlicencia" class="combobox">
                                        '. $tlicencia->getStrListar($this->getStrTlicencia()) .'
                                    </select>                                    
                            	</td>
                             	<td  align="right"><b>Tipo Licencia de Conducir?:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsTipolicencia" id="lsTipolicencia" class="combobox">
                                        '. $tipolicencia->getStrListar($this->getStrTipolicencia()) .'
                                    </select>                                    
                            	</td>
                           	</tr>
							<tr class="formulariofila1">
                            	<td  align="right"><b>¿Tiene Vehículo Propio?:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsVehiculo" id="lsVehiculo" class="combobox">
                                        '. $vehiculo->getStrListar($this->getStrVehiculo()) .'
                                    </select>                                    
                            	</td>
                             	<td  align="right"><b>Adaptación?:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsAdaptacion" id="lsAdaptacion" class="combobox">
                                        '. $adaptacion->getStrListar($this->getStrAdaptacion()) .'
                                    </select>                                    
                            	</td>
                           </tr>
                           <tr class="formulariofila1">
                            	<td  align="right"><b>Tipo Adaptación?:&nbsp;</b></td>
                                <td align="left">
                                    <input class="textbox" id="strTadaptacion" name="strTadaptacion" type="text" maxlength="100"  value="'. $this->getStrTadaptacion() .'" />
                                </td>
                           </tr>
<table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">AFILIACIONES</td>
                            </tr> 
                            <tr class="formulariofila1">
                            	<td  align="right"><b>¿Pertenece alguna Federación del sector de la Discapacidad?:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsTfederacion" id="lsTfederacion" class="combobox">
                                        '. $tfederacion->getStrListar($this->getStrTfederacion()) .'
                                    </select>                                    
                            	</td>
                             	<td  align="right"><b>¿Nombre Federación?:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsTipofederacion" id="lsTipofederacion" class="combobox">
                                        '. $tipofederacion->getStrListar($this->getStrTipofederacion()) .'
                                    </select>                                    
                            	</td>
                           </tr>
                           <tr class="formulariofila1">
                            	<td  align="right"><b>Asociación?:&nbsp;</b></td>
                                <td align="left">
                                    <input class="textbox" id="strAsociacion" name="strAsociacion" type="text" maxlength="100"  value="'. $this->getStrAsociacion().'" />
                                </td>
                           </tr>
                           
                            <tr>
                                <td colspan="4" class="formulariofila1" align="center">
                                    <input type="submit" class="boton" name="'. $this->getStrNombreBoton() .'" value="'. $this->getStrValorBoton() .'" />
                                    <input type="submit" class="boton" name="'. $this->getStrNombreBotons() .'" value="'. $this->getStrValorBotons() .'" />
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
            $valor="2";
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spingresarusuario('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s',
			'%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s',
			'%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s');",
            $this->getstrFoto(), $this->getstrIdentificacion(), $this->getstrIdentificaciont(), $this->getStrNcarne(), $this->getStrApaterno(),
            $this->getStrAmaterno(),$this->getStrPnombre(),$this->getStrSnombre(), $this->getStrGenero(),$this->getStrEcivil(),
            $this->getStrFechaNacimiento(),$this->getStrNhijos(),$this->getStrFconocer(),$this->getStrEstado(),$this->getStrTseguro(),
            $this->getStrTiposeguro(),$this->getStrFechaIngreso(),$this->getStrEtnia(),$this->getStrParroquia(),$_SESSION["usuario"]["suc"],$this->getStrCprincipal(),
            $this->getStrNumero(),$this->getStrTransversal(),$this->getStrSector(),$this->getStrPasaje(),$this->getStrBarrio(),
            $this->getStrManzana(),$this->getStrSolar(),$this->getStrObservacion(),$this->getStrFijo(),$this->getStrMovil(),
            $this->getStrReferido1(),$this->getStrReferido2(),$this->getStrEmail(),$this->getStrObservaciond(),$this->getStrTlicencia(),
            $this->getStrTipolicencia(),$this->getStrVehiculo(),$this->getStrAdaptacion(),$this->getStrTadaptacion(),$this->getStrTfederacion(),
			$this->getStrTipofederacion(),$this->getStrAsociacion(),$_SESSION["usuario"]["cuenta"],$valor);
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Estado_Civil= [ '. $this->getStrEcivil().' ] Em@il = [ '.$this->getStrEmail().' ] Fecha_Nacimiento= [ '. $this->getStrFechaNacimiento().' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s','%s','%s','%s');", $_SESSION["usuario"]["cuenta"], 'G', 'pdiscapacidad', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL spactualizarninos('%s','%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s',
            '%s', '%s', '%s', '%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s',
            '%s','%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s',
            '%s', '%s', '%s','%s');",
            $this->getStrCodigo(),$this->getstrFoto(), $this->getstrIdentificacion(),$this->getstrIdentificaciont(), $this->getStrNcarne(), 
            $this->getStrApaterno(),$this->getStrAmaterno(),$this->getStrPnombre(),$this->getStrSnombre(), $this->getStrGenero(),
            $this->getStrEcivil(),$this->getStrFechaNacimiento(),$this->getStrNhijos(),$this->getStrFconocer(),$this->getStrEstado(),
            $this->getStrTseguro(),$this->getStrTiposeguro(),$this->getStrFechaIngreso(),$this->getStrEtnia(),$this->getStrParroquia(),
            $_SESSION["usuario"]["suc"],$this->getStrCprincipal(),$this->getStrNumero(),$this->getStrTransversal(),$this->getStrSector(),
            $this->getStrPasaje(),$this->getStrBarrio(),$this->getStrManzana(),$this->getStrSolar(),$this->getStrObservacion(),
            $this->getStrFijo(),$this->getStrMovil(),$this->getStrReferido1(),$this->getStrReferido2(),$this->getStrEmail(),
            $this->getStrObservaciond(),$this->getStrTlicencia(),$this->getStrTipolicencia(),$this->getStrVehiculo(),$this->getStrAdaptacion(),
            $this->getStrTadaptacion(),$this->getStrTfederacion(),$this->getStrTipofederacion(),$this->getStrAsociacion());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Estado_Civil= [ '. $this->getStrEcivil().' ] Em@il = [ '.$this->getStrEmail().' ] Fecha_Nacimiento= [ '. $this->getStrFechaNacimiento().' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s','%s','%s','%s');", $_SESSION["usuario"]["cuenta"], 'G', 'ninos', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL speliminarpdiscapacidad('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlInsertUpdateDelete();

           if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Estado_civil =['. $this->getStrEcivil().' ] Em@il = [ '.$this->getStrEmail().' ] Fecha Nacimiento= [ '. $this->getStrFechaNacimiento().' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'G', 'centro_formativo', $descripcion);
                $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
                $query->getStrSqlInsertUpdateDelete();
                $resultado = true;
            }

            return $resultado;
        }
	public function getStrBuscarr() 
		{
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $cf=$_SESSION["usuario"]["suc"];
			$me=$_SESSION["usuario"]["cuenta"];
            $ProcedimientoAlmacenado = sprintf("CALL spbidentificadorpd('%d','%d');","$cf","$me");
			$query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
            foreach( $resultado as $rst):   
				$valor=$rst['id_usuario'];
		    endforeach;
            }
		     return $valor;
        }
 	public function getStrBuscar() {
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbninos('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
            foreach( $resultado as $rst):   
		        $this->setStrCodigo($rst['id_usuario']);  
				$this->setstrFoto($rst['foto']);
				$this->setstrIdentificacion($rst['tipoidentificacion_id']);
			$this->setstrIdentificaciont($rst['identificacion']);
			$this->setStrNcarne($rst['num_carne']); 
			$this->setStrApaterno($rst['apellido_paterno']);
			$this->setStrAmaterno($rst['apellido_materno']); 
			$this->setStrPnombre($rst['primer_nombre']);
			$this->setStrSnombre($rst['segundo_nombre']);
			$this->setStrGenero($rst['genero']);
			$this->setStrEcivil($rst['id_estado_civil']);
			$this->setStrFechaNacimiento($rst['fecha_nac']);
			$this->setStrNhijos($rst['num_hijos']);
			$this->setStrFconocer($rst['forma_conocer']);
			$this->setStrEstado($rst['estado']);
			$this->setStrTseguro($rst['seguro']);
			$this->setStrTiposeguro($rst['tipo_seguro']);
			$this->setStrFechaIngreso($rst['fecha_ingreso']);
			$this->setStrEtnia($rst['etnia_id']);
			$this->setStrProvincia(substr($rst['parcodigo'],0,2));
	        $this->setStrCanton(substr($rst['parcodigo'],0,4));  
			$this->setStrParroquia($rst['parcodigo']);
			$this->setStrCprincipal($rst['cprincipal']);
			$this->setStrNumero($rst['numero']);
			$this->setStrTransversal($rst['transversal']);
			$this->setStrSector($rst['sector']);
			$this->setStrPasaje($rst['pasaje']);
			$this->setStrBarrio($rst['barrio']);
			$this->setStrManzana($rst['manzana']);
			$this->setStrSolar($rst['solar']);
			$this->setStrObservacion($rst['observacion']);
			$this->setStrFijo($rst['fijo']);
			$this->setStrMovil($rst['movil']);
			$this->setStrReferido1($rst['referido1']);
			$this->setStrReferido2($rst['referido2']);
			$this->setStrEmail($rst['email']);
			$this->setStrObservaciond($rst['observacion_telefono']);
			$this->setStrTlicencia($rst['licencia']);
			$this->setStrTipolicencia($rst['tlicencia']);
			$this->setStrVehiculo($rst['vehiculo']);
			$this->setStrAdaptacion($rst['adaptacion_vehiculo']);
			$this->setStrTadaptacion($rst['tipo_adaptacion']);
			$this->setStrTfederacion($rst['federacion']);
			$this->setStrTipofederacion($rst['tfederacion']);
			$this->setStrAsociacion($rst['asociacion']);
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
			$valor=2;
			$ProcedimientoAlmacenado = sprintf("CALL sptotalninos('%d','%d');", $sucursal,$valor);
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
			 $va="2";
            $ProcedimientoAlmacenado = sprintf("CALL splistarninos('%d','%d','%d','%d');","$re", "$pa","$cf","$va");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            PERSONA CON DISCAPACIDAD<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO PERSONAS CON DISCAPACIDAD</legend>
                       ';
            $retval .= '
                        <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                            <tr>
                                <td colspan="14" align="center"><div class="vtip" title="Ingreso<br> [NUEVA PERSONA CON DISCAPACIDAD">
                                    <a href="'.PDISCAPACIDAD_URL.'pdiscapacidad.php?btnNuevo=Nuevo">| <img src="'. IMAGENES_PATH .'/rptstocksucursal.png" title="" width="16px" height="16px"  border="0" /><img src="'. IMAGENES_PATH .'/nuevo.png" title="" width="16px" height="16px"  border="0" />NUEVA PERSONA CON DISCAPACIDAD |</a>
                                </div><td>
                            </tr>';
                            $paginacion->setStrNombrePagina("pdiscapacidad/pdiscapacidad.php");
            				$retval .= '<tr><td colspan="20" align="center">'. $paginacion->getStrPaginacion() .'</td></tr>
                            <tr class="tablatitulo">
                                <th colspan="20">LISTADO&nbsp;DE&nbsp;PERSONAS CON DISCAPACIDAD&nbsp;REGISTRADOS</th>
                            </tr>
                            <tr class="tablasubtitulo">
                                <th align="center"> </th> 
                                <th align="center">Id</th>                                                             
                                <th align="center">Cédula</th>
                                <th align="center">Nombres Apellidos</th>
                                <th align="center">A. Técnicas</th>
                                <th align="center">Discapacidad</th>
                                <th align="center">Pariente Discapacidad</th>
                                <th align="center">D. Laboral</th>
                                <th align="center">I. Laboral</th>
                                <th align="center">Formación I</th>
                                <th align="center">Formación II</th>
                             	<th align="center">Datos Laborales</th>
                                <th align="center">Orientación</th>
                                <th align="center">Competencias</th>
                                <th align="center">Empleo formación</th>
                                <th align="center" colspan="3">Acciones</th>
                            </tr>
                        ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
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
                    $retval .= 	'<td align="center"><div class="vtip" title="DETALLE PERSONA CON DISCAPACIDAD <br> [ codigo = '.$rst["id_usuario"] .' ]">';
                    $retval .=  '<a href="'. PDISCAPACIDAD_URL .'pdiscapacidad.php?btnDetalle=Detalle&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                    $i = 1 - $i;
                endforeach;
            }

            //$paginacion->setStrNombrePagina("pdiscapacidad/pdiscapacidad.php");
            //$retval .= '<tr><td colspan="20" align="center">'. $paginacion->getStrPaginacion() .'</td></tr>';
            $retval .= '</table>';
            $retval .= '</fieldset>';
            return $retval;
        }

public function getStrDetallePersona()
        {
            $query = new clQuery();
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbdetalleninos('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();
			//$retval .= '<td><p class="centrado"><a href="#" onclick="abreExceld(\'usuariosp_excel.php\',\''. $rst["id_usuario"] .'\')" title="'.$id_excel.'"><img src="../imgs/excel_img.png" alt="'.$id_excel.'" /></a> ';
            $retval .= '<fieldset class="fieldsetGrande">';
			
            $retval .= '<legend class="etiquetaborde">
                            PERSONA CON DISCAPACIDAD<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO PERSONAS CON DISCAPACIDAD<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">DETALLE PERSONA CON DISCAPACIDAD
                            
                        </legend>
                       ';
			
            if( count($resultado) > 0 )
            {
            	
                $i = 0;
                foreach( $resultado as $rst):
					
                    $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">
                    <a href="#" onclick="abreExceld(\'usuarios_excel.php\',\''. $rst["id_usuario"] .'\')" title="'.$id_excel.'"><img src="../imgs/excel_img.png" alt="'.$id_excel.'" /></a>';
                    $retval .= '<tr>
                                    <td colspan="2" align="center">
                                        <a href="'. PDISCAPACIDAD_URL .'pdiscapacidad.php">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> REGRESAR LISTADO PERSONAS CON DISCAPACIDAD|</a>
                                    <td>
                                </tr>
                                ';
                    
                    $retval .= '<tr class="tablatitulo">
                                    <th colspan="2">DETALLE&nbsp;PERSONA CON DISCAPACIDAD;REGISTRADO</th>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Código:</th>
                                    <td align="left">  '. $rst["id_usuario"] .'</td>
                                </tr>
                                ';
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Profesión:</th>
                                    <td align="left">  '. $rst["descripcion"] .'</td>
                                </tr>
                                ';            
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Tipo Identificación:</th>
                                    <td align="left">  '. $rst["tipoidentificacion_nombre"] .':   '. $rst["identificacion"] .'</td>
                                </tr>
                                ';
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">N° Carné:</th>
                                    <td align="left">  '. $rst["num_carne"] .'</td>
                                </tr>
                                ';  
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Nombres y Apellidos:</th>
                                    <td align="left">  '. $rst["apellido_paterno"] .' '. $rst["apellido_materno"] .' '. $rst["primer_nombre"] .' '. $rst["segundo_nombre"] .'</td>
                                </tr>
                                ';  			
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Género:</th>
                                    <td align="left">  '. $rst["genero_nombre"] .'</td>
                                </tr>
                                ';  
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Estado Civil:</th>
                                    <td align="left">  '. $rst["estadocivil_nombre"] .'</td>
                                </tr>
                                ';  	
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Fecha Nacimiento:</th>
                                    <td align="left">  '. $rst["fecha_nac"] .'</td>
                                </tr>
                                ';  	
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Numero de hijos:</th>
                                    <td align="left">  '. $rst["hijos_descripcion"] .'</td>
                                </tr>
                                ';  
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Referido por:</th>
                                    <td align="left">  '. $rst["formaconocer_nombre"] .'</td>
                                </tr>
                                ';  	
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Tiene Seguro:</th>
                                    <td align="left">  '. $rst["tseguro"] .'</td>
                                </tr>
                                ';  	
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Tipo Seguro:</th>
                                    <td align="left">  '. $rst["tiposeguro_nombre"] .'</td>
                                </tr>
                                ';  	
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Fecha de Ingreso:</th>
                                    <td align="left">  '. $rst["fecha_ingreso"] .'</td>
                                </tr>
                                '; 
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Etnia:</th>
                                    <td align="left">  '. $rst["etnia_nombre"] .'</td>
                                </tr>
                                ';  			 	
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Parroquia:</th>
                                    <td align="left">  '. $rst["pardescripcion"] .'</td>
                                </tr>
                                ';  
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Calle Principal:</th>
                                    <td align="left">  '. $rst["cprincipal"] .'</td>
                                </tr>
                                '; 		
				$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Número:</th>
                                    <td align="left">  '. $rst["numero"] .'</td>
                                </tr>
                                '; 		
				$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">transversal:</th>
                                    <td align="left">  '. $rst["transversal"] .'</td>
                                </tr>
                                '; 	
				$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Sector:</th>
                                    <td align="left">  '. $rst["tipoparroquia_nombre"] .'</td>
                                </tr>
                                '; 	
				$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Pasaje:</th>
                                    <td align="left">  '. $rst["pasaje"] .'</td>
                                </tr>
                                '; 	
               $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Barrio:</th>
                                    <td align="left">  '. $rst["barrio"] .'</td>
                                </tr>
                                '; 		                 				
                 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Manzana:</th>
                                    <td align="left">  '. $rst["manzana"] .'</td>
                                </tr>
                                '; 	      
				 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Solar:</th>
                                    <td align="left">  '. $rst["solar"] .'</td>
                                </tr>
                                '; 	   
				 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Observación:</th>
                                    <td align="left">  '. $rst["observacion"] .'</td>
                                </tr>
                                '; 	  
				 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Fijo:</th>
                                    <td align="left">  '. $rst["fijo"] .'</td>
                                </tr>
                                '; 	  		
                 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Móvil:</th>
                                    <td align="left">  '. $rst["movil"] .'</td>
                                </tr>
                                '; 	  	  
				 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Referido 1:</th>
                                    <td align="left">  '. $rst["referido1"] .'</td>
                                </tr>
                                '; 	
				 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Referido 2:</th>
                                    <td align="left">  '. $rst["referido2"] .'</td>
                                </tr>
                                '; 		
				 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Email:</th>
                                    <td align="left">  '. $rst["email"] .'</td>
                                </tr>
                                '; 	
				$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Observación telefono:</th>
                                    <td align="left">  '. $rst["observacion_telefono"] .'</td>
                                </tr>
                                '; 	
				$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Tiene Licencia:</th>
                                    <td align="left">  '. $rst["licencia"] .'</td>
                                </tr>
                                '; 		
               $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Tipo Licencia:</th>
                                    <td align="left">  '. $rst["tipolicencia_nombre"] .'</td>
                                </tr>
                                '; 		
			 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Vehiculo:</th>
                                    <td align="left">  '. $rst["vehiculo"] .'</td>
                                </tr>
                                '; 	
			$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Adaptacion:</th>
                                    <td align="left">  '. $rst["adaptacion"] .'</td>
                                </tr>
                                '; 	
            $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Tipo adaptacion:</th>
                                    <td align="left">  '. $rst["tipo_adaptacion"] .'</td>
                                </tr>
                                '; 	
             $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Federacion:</th>
                                    <td align="left">  '. $rst["federacion"] .'</td>
                                </tr>
                                '; 	                                       
			 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Nombre Federacion:</th>
                                    <td align="left">  '. $rst["asociacion_nombre"] .'</td>
                                </tr>
                                '; 	
			$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Asociación:</th>
                                    <td align="left">  '. $rst["asociacion"] .'</td>
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