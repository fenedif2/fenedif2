<?php	
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.validaciones.php' );
    include_once( CLASS_PATH . "class.clquery.php" );
    include_once( CLASS_PATH . "class.clpaginacion.php" );  
	include_once( CLASS_PATH . "class.clcertificado.php" );
	include_once( CLASS_PATH . "class.clavalizado.php" );
	include_once( CLASS_PATH . "class.cltcurso.php" );
	include_once( CLASS_PATH . "class.clsubtformacion.php" ); 
	include_once( CLASS_PATH . "class.clsubtformaciond.php" ); 
	include_once( CLASS_PATH . "class.clempresa.php" ); 
	include_once( CLASS_PATH . "class.clprovincia.php" );
	include_once( CLASS_PATH . "class.clcanton.php" );	  
	include_once( CLASS_PATH . "class.clparroquia.php" );
	include_once( CLASS_PATH . "class.clsector.php" );
	
    class clTcursocf
    {
        private $StrCodigo;
        private $strNombre;
		private $strCertificado;
		private $strAvalidado;
		private $strFechaInicio;
		private $strFechaFin;
		private $strNalumos;
		private $strCdisponibles;
		private $strNumero;
		private $strTcurso;	
		private $strSubtformacion;
		private $strSubtformaciond;	
		private $strEmpresa;
		private $strTasistentes;
		private $strNumhombres;
		private $strNummujeres;
		private $strNombtaller;
		private $strApellidof;
		private $strTcursosil;	
		private $strInstructor;
		private $strLcapacitacion;
		private $strProvincia;
		private $strCanton;
        private $strParroquia;
		private $strCprincipal;
		private $strNumerod;
		private $strTransversal;
		private $strSector;
		private $strPasaje;
		private $strBarrio;
		private $strManzana;
		private $strSolar;
		private $strObservacion;
		
		private $strEtiqueta;
        private $strNombreBoton;
        private $strValorBoton;
		private $strNombreBotons;
        private $strValorBotons;
		private $strNombreBotona;
        private $strValorBotona;
        private $strLectura;
		
        public function __construct()
        {
				
            $this->StrCodigo = "";	
			$this->strNombre = "";
			$this->strCertificado = "";
			$this->strAvalidado = "";
			$this->strFechaInicio = "";
			$this->strFechaFin = "";
			$this->strNalumos = "";
			$this->strCdisponibles = "";
			$this->strNumero= "";
			$this->strTcurso = "";
			$this->strSubtformacion="";			
            $this->strSubtformaciond="";
            $this->strEmpresa = "";
            $this->strTasistentes = "";
            $this->strNumhombres= "";
			$this->strNummujeres= "";
			$this->strNombtaller= "";
			$this->strApellidof= "";
			$this->strTcursosil = "";
			$this->strInstructor = "";
			$this->strLcapacitacion = "";
			$this->strProvincia = "";
            $this->strCanton = "";
            $this->strParroquia = "";
			$this->strCprincipal= "";
			$this->strNumerod= "";
			$this->strTransversal= "";
			$this->strSector= "";
			$this->strPasaje= "";
			$this->strBarrio= "";
			$this->strManzana= "";
			$this->strSolar= "";
			$this->strObservacion = "";
			$this->strLectura = "";
			$this->strEtiqueta = "";
            $this->strNombreBoton = "";
            $this->strValorBoton = "";
			$this->strNombreBotons = "";
            $this->strValorBotons = "";
            $this->strNombreBotona = "";
           $this->strValorBotona = "";
        }
//////////////////// codigo centro Fromativo//////////////////
        public function getStrCodigo()
        {
            return $this->StrCodigo;
        }
		public function setStrCodigo($n)
        {
            $this->StrCodigo = $n;
        }
                
////////////// Nombre Curso/////////////////////
        public function getStrNombre()
        {
            return $this->strNombre;
        }
		public function setStrNombre($n)
        {
            $this->strNombre = $n;
        }
		
////////////////////////////////Certificado Curso //////////////////////////////////////////////////////////////////////
		public function getstrCertificado()
	        {
	            return $this->strCertificado;
	        }

        public function setstrCertificado($exp)
	        {
	            $this->strCertificado = $exp;
	        }
//////////// Avalizado////////////////////////////////////////// 
		public function getstrAvalidado()
        {
            return $this->strAvalidado;
        }
  		public function setstrAvalidado($ct)
        {
            $this->strAvalidado = $ct;
        }     		
		
//////////////////////////Fecha Ininicio //////////////////////////////////////////
public function getStrFechaInicio()
        {
            return $this->strFechaInicio;
        }

        public function setstrFechaInicio($fn)
        {
            $this->strFechaInicio = $fn;
        }		
		
//////////////////////////Fecha Fin //////////////////////////////////////////
public function getStrFechaFin()
        {
            return $this->strFechaFin;
        }

        public function setstrFechaFin($fn)
        {
            $this->strFechaFin = $fn;
        }		
/////////////////////////Nº Alumnos//////////////////////////////
		public function getstrNalumos()
	        {
	            return $this->strNalumos;
	        }

        public function setstrNalumos($ne)
	        {
	            $this->strNalumos = $ne;
	        }
////////////////////////Cupos Disponibles/////////////////////////////////			
		public function getstrCdisponibles()
	        {
	            return $this->strCdisponibles;
	        }

        public function setstrCdisponibles($ned)
	        {
	            $this->strCdisponibles = $ned;
	        }			
 /////////////////////////Numero  de horas////////////////////////////////////////////////////		
         public function getStrNumero()
        {
            return $this->strNumero;
        }

        public function setStrNumero($cp)
        {
            $this->strNumero= $cp;
        }
		
////////////// Tipo Curso ////////////////////////////////////////////////////7	
		public function getstrTcurso()
        {
            return $this->strTcurso;
        }
  		public function setstrTcurso($rp)
        {
            $this->strTcurso = $rp;
        } 
	//////////////////////////////// Sub Tipo Fromacion  /////////////////////
        public function getStrSubtformacion()
        {
            return $this->strSubtformacion;
        }
		public function setStrSubtformacion($n)
        {
            $this->strSubtformacion = $n;
        }	
		
	////////////// Sub Tipo Formacion descripcion  /////////////////////
        public function getStrSubtformaciond()
        {
            return $this->strSubtformaciond;
        }
		public function setStrSubtformaciond($n)
        {
            $this->strSubtformaciond = $n;
        }                     			
////////////////////////////////Empresa //////////////////////////////////////////////////////////////////////
		public function getstrEmpresa()
	        {
	            return $this->strEmpresa;
	        }

        public function setstrEmpresa($exp)
	        {
	            $this->strEmpresa = $exp;
	        }		
		
//////////// Total Asistentes////////////////////////////////////////// 
		public function getstrTasistentes()
        {
            return $this->strTasistentes;
        }
  		public function setstrTasistentes($ct)
        {
            $this->strTasistentes = $ct;
        }     		
				
//////////// Numero Hombres////////////////////////////////////////// 
		public function getstrNumhombres()
        {
            return $this->strNumhombres;
        }
  		public function setstrNumhombres($ct)
        {
            $this->strNumhombres = $ct;
        }     		
//////////// Numero Mujeres////////////////////////////////////// 
		public function getstrNummujeres()
        {
            return $this->strNummujeres;
        }
  		public function setstrNummujeres($ct)
        {
            $this->strNummujeres = $ct;
        }     		
/////////////////////////// Nombre Taller////////////////////////////////////// 
		public function getstrNombtaller()
        {
            return $this->strNombtaller;
        }
  		public function setstrNombtaller($ct)
        {
            $this->strNombtaller = $ct;
        }     		
											
/////////////////////////// Apellido Familia ////////////////////////////////////// 
		public function getstrApellidof()
        {
            return $this->strApellidof;
        }
  		public function setstrApellidof($ct)
        {
            $this->strApellidof = $ct;
        }   
////////////// Instructor////////////////////////////////////////////////////7	
		public function getstrInstructor()
        {
            return $this->strInstructor;
        }
  		public function setstrInstructor($rp)
        {
            $this->strInstructor = $rp;
        } 		  		
////////////// Tipo Curso sil////////////////////////////////////////////////////7	
		public function getstrTcursosil()
        {
            return $this->strTcursosil;
        }
  		public function setstrTcursosil($rp)
        {
            $this->strTcursosil = $rp;
        } 
////////////// Lugar de Capacitación////////////////////////////////////////////////////	
		public function getstrLcapacitacion()
        {
            return $this->strLcapacitacion;
        }
  		public function setstrLcapacitacion($rp)
        {
            $this->strLcapacitacion = $rp;
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
		
/////////////////////////Calle principal ////////////////////////////////////////////////////
         public function getStrCprincipal()
        {
            return $this->strCprincipal;
        }

        public function setStrCprincipal($cp)
        {
            $this->strCprincipal= $cp;
        }
 /////////////////////////Numerod ////////////////////////////////////////////////////		
         public function getStrNumerod()
        {
            return $this->strNumerod;
        }

        public function setStrNumerod($cp)
        {
            $this->strNumerod= $cp;
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
////////////////////////////////Observacion/////////////////////////////////////////////////////////////
		public function getStrObservacion()
	        {
	            return $this->strObservacion;
	        }

        public function setStrObservacion($ob)
	        {
	            $this->strObservacion = $ob;
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
/////////////////////// nombre a////////////////////////////////
 		public function getStrNombreBotona()
	        {
	            return $this->strNombreBotona;
	        }

        public function setStrNombreBotona($nb)
	        {
	            $this->strNombreBotona = $nb;
	        }		
//////////////////////////valor a////////////////////////////////////
 		public function getStrValorBotona()
	        {
	            return $this->strValorBotona;
	        }

        public function setStrValorBotona($vb)
	        {
	            $this->strValorBotona = $vb;
	        }						
///////////////////////nombre ///////////////////////////////
 public function getStrNombreBotons()
        {
            return $this->strNombreBotons;
        }

        public function setStrNombreBotons($nb)
        {
            $this->strNombreBotons = $nb;
        }
/////////////////////////valor/////////////////////////////////
 public function getStrValorBotons()
        {
            return $this->strValorBotons;
        }

        public function setStrValorBotons($vb)
        {
            $this->strValorBotons = $vb;
        }
//////////////////////////////////////////////////////
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
            $certificado = new clCertificado();	
			$avalizado = new clAvalizado();
			$tcurso = new clTcurso();
			$subtformacion = new clSubtformacion();
			$subtformaciond = new clSubtformaciond();
			$empresa = new clEmpresa();	  
			$tcursosil = new clTcurso();   
			$provincia = new clProvincia();
            $canton = new clCanton();
            $parroquia = new clParroquia(); 
			$sector = new clSector();     
           
			
          $retval  = '<script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.validate.js"></script>
                        <script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.metadata.js"></script>
                       ';

            $retval .= '<br><br><br><br>
                        <script>
                            $(document).ready(function(){
                                    $.metadata.setType( \'attr\', \'validate\' );
                                    $(\'#frmtcursocf\').validate({
                                            rules:{
                                               
                                                  },
                                            messages:{
                                              	
												
                                               
                                              
												strObservaciond: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"}
												     }
                                    });
                                    $("#lsProvincia").change(function () {
                                    $("#lsProvincia option:selected").each(function () {
                                            var provincia = $(this).val();
                                            $.post( "'. TCURSOCF_URL .'tcursocf.php", { btnBuscar: "Canton",
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
                                            $.post( "'. TCURSOCF_URL .'tcursocf.php", { btnBuscar: "Parroquia",
                                                                                      strCodigoCanton: canton                                                                                      
                                                                                    },
                                        function(data){
                                                $("#lsParroquia").html(data);                                                
                                        });
                                    });
                                 });
                                     $("#lsTcurso").change(function () {
                                    $("#lsTcurso option:selected").each(function () 
                                    {
                                            var tcurso = $(this).val();
                                            $.post( "'. TCURSOCF_URL .'tcursocf.php", 
                                            { btnBuscar: "Subtcurso",
                                            strCodigoTcurso:tcurso                                                                                                                                                                      
                                                                                    },
                                        function(data){
                                                $("#lsSubtformacion").html(data);
                                        });
                                    });
                                 });
									$("#lsSubtformacion").change(function () {
                                    $("#lsSubtformacion option:selected").each(function () {
                                            var subtformacion  = $(this).val();
                                           $.post( "'. TCURSOCF_URL .'tcursocf.php", 
                                            { btnBuscar: "Subtformaciond",
                                                                                      strCodigoTformaciond: subtformacion                                                                                      
                                                                                    },
                                        function(data){
                                                $("#lsSubtformaciond").html(data);                                                
                                        });
                                    });
                                 });
								 
                 				$("#lsTcurso").change(function() 
                 				{
							  if($(this).val() == "1" || $(this).val() == "2" || $(this).val() == "7" || $(this).val() == "14") 
							  {
							    $("#lsEmpresa").attr("disabled", "disabled");
								$("#lsEmpresa").css("background-color", "#F5DA81"); 
								$("#strNombtaller").attr("disabled", "disabled");
								$("#strNombtaller").css("background-color", "#F5DA81"); 
								$("#strApellidof").attr("disabled", "disabled");
								$("#strApellidof").css("background-color", "#F5DA81"); 
								$("#lsSubtformacion").removeAttr("disabled");
								$("#lsSubtformacion").css("background-color", "#FFFFFF");
								$("#lsSubtformaciond").removeAttr("disabled");
								$("#lsSubtformaciond").css("background-color", "#FFFFFF");
								$("#strTasistentes").removeAttr("disabled");
								$("#strTasistentes").css("background-color", "#FFFFFF");
								$("#strNumhombres").removeAttr("disabled");
								$("#strNumhombres").css("background-color", "#FFFFFF");
								$("#strNummujeres").removeAttr("disabled");
								$("#strNummujeres").css("background-color", "#FFFFFF");
								
							  }
							  else 
							  {
							  	 if($(this).val() == "3" ) 
								  {    
								   	$("#strApellidof").attr("disabled", "disabled");
									$("#strApellidof").css("background-color", "#F5DA81"); 
									$("#lsSubtformacion").removeAttr("disabled");
									$("#lsSubtformacion").css("background-color", "#FFFFFF");
									$("#lsSubtformaciond").removeAttr("disabled");
									$("#lsSubtformaciond").css("background-color", "#FFFFFF");
									$("#strTasistentes").removeAttr("disabled");
									$("#strTasistentes").css("background-color", "#FFFFFF");
									$("#strNumhombres").removeAttr("disabled");
									$("#strNumhombres").css("background-color", "#FFFFFF");
									$("#strNummujeres").removeAttr("disabled");
									$("#strNummujeres").css("background-color", "#FFFFFF");
									$("#lsEmpresa").removeAttr("disabled");
									$("#lsEmpresa").css("background-color", "#FFFFFF");
									$("#strNombtaller").removeAttr("disabled");
									$("#strNombtaller").css("background-color", "#FFFFFF");
								  }
								  else 
								  {
									  if($(this).val() == "4" ) 
										  {    
										   	$("#lsEmpresa").attr("disabled", "disabled");
											$("#lsEmpresa").css("background-color", "#F5DA81"); 
											$("#strTasistentes").removeAttr("disabled");
											$("#strTasistentes").css("background-color", "#FFFFFF");
											$("#strNumhombres").removeAttr("disabled");
											$("#strNumhombres").css("background-color", "#FFFFFF");
											$("#strNummujeres").removeAttr("disabled");
											$("#strNummujeres").css("background-color", "#FFFFFF");
											$("#strNombtaller").removeAttr("disabled");
											$("#strNombtaller").css("background-color", "#FFFFFF");
											$("#strApellidof").removeAttr("disabled");
											$("#strApellidof").css("background-color", "#FFFFFF");
											$("#lsSubtformacion").attr("disabled", "disabled");
											$("#lsSubtformacion").css("background-color", "#F5DA81"); 
											$("#lsSubtformaciond").attr("disabled", "disabled");
											$("#lsSubtformaciond").css("background-color", "#F5DA81");
											$("#strNombtaller").attr("disabled", "disabled");
											$("#strNombtaller").css("background-color", "#F5DA81"); 
											
										  }

											else 
											{
											if($(this).val() == "6" ) 
										  	{    
										   	$("#lsEmpresa").attr("disabled", "disabled");
											$("#lsEmpresa").css("background-color", "#F5DA81"); 
											$("#strTasistentes").removeAttr("disabled");
											$("#strTasistentes").css("background-color", "#FFFFFF");
											$("#strNumhombres").removeAttr("disabled");
											$("#strNumhombres").css("background-color", "#FFFFFF");
											$("#strNummujeres").removeAttr("disabled");
											$("#strNummujeres").css("background-color", "#FFFFFF");
											$("#strNombtaller").removeAttr("disabled");
											$("#strNombtaller").css("background-color", "#FFFFFF");
											$("#strApellidof").removeAttr("disabled");
											$("#strApellidof").css("background-color", "#FFFFFF");
											$("#lsSubtformaciond").attr("disabled", "disabled");
											$("#lsSubtformaciond").css("background-color", "#F5DA81");
											$("#strNombtaller").attr("disabled", "disabled");
											$("#strNombtaller").css("background-color", "#F5DA81");
											$("#lsSubtformacion").removeAttr("disabled");
											$("#lsSubtformacion").css("background-color", "#FFFFFF"); 
											
										  }
											else
											{
											$("#lsEmpresa").removeAttr("disabled");
											$("#lsEmpresa").css("background-color", "#FFFFFF");
											$("#strTasistentes").removeAttr("disabled");
											$("#strTasistentes").css("background-color", "#FFFFFF");
											$("#strNumhombres").removeAttr("disabled");
											$("#strNumhombres").css("background-color", "#FFFFFF");
											$("#strNummujeres").removeAttr("disabled");
											$("#strNummujeres").css("background-color", "#FFFFFF");
											$("#strApellidof").attr("disabled", "disabled");
											$("#strApellidof").css("background-color", "#F5DA81"); 
											$("#strNombtaller").attr("disabled", "disabled");
											$("#strNombtaller").css("background-color", "#F5DA81"); 
											$("#lsSubtformacion").attr("disabled", "disabled");
											$("#lsSubtformacion").css("background-color", "#F5DA81"); 
											$("#lsSubtformaciond").attr("disabled", "disabled");
											$("#lsSubtformaciond").css("background-color", "#F5DA81");
											$("#strNombtaller").attr("disabled", "disabled");
											$("#strNombtaller").css("background-color", "#F5DA81"); 
											}
											}	
								  }
							  }
							});
															 
			  				$("#lsTcurso").change(function() 
                 				{
							  if($(this).val() == "3") 
							  {
							    $("#lsSubtformacion").css("background-color", "#FFFFFF");
								$("#lsSubtformacion").removeAttr("disabled");
								
							 }
	 						});
							$("#lsSubtformacion").change(function() 
                 				{
							  if($(this).val() == "105") 
							  {
							    $("#lsEmpresa").attr("disabled", "disabled");
								$("#lsEmpresa").css("background-color", "#F5DA81"); 
								$("#strApellidof").removeAttr("disabled");
								$("#strApellidof").css("background-color", "#FFFFFF");
							 }
	 						});
							
								 
                            });
                        </script>
                       ';
		  
            $retval .= '<form id="frmtcursocf" action="'. TCURSOCF_URL .'tcursocf.php" method="POST">';

            $Regresar = "regresar('". CFORMATIVO_URL . "cformativo.php')";

            $retval .= '<fieldset class="fieldsetPequeno">';
            $retval .= '<legend class="etiquetaborde">
                            CURSOS <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO CURSOS<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> '. $this->getStrEtiqueta() .'
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
                                <td  align="right"><b>Nombre:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strNombre" name="strNombre" type="text" maxlength="50" value="'. $this->getStrNombre() .'" />
                                </td>
                             	<td align="right"><b>Certificado:&nbsp;</b></td>
                                <td align="left">                                    
                                    <select name="lsCertificado" id="lsCertificado"  class="combobox">
                                        '. $certificado->getStrListar($this->getstrCertificado()) .'
                                    </select>
                                </td>
                            </tr>
                            <tr class="formulariofila1">
                                <td align="right"><b>¿Avalizado por la Institución?:&nbsp;</b></td>
                                <td align="left">                                    
                                    <select name="lsAvalizado" id="lsAvalizado"  class="combobox">
                                        '. $avalizado->getStrListar($this->getstrAvalidado()) .'
                                    </select>
                                </td>
                             	<td  align="right"><b>Fecha&nbsp;Inicio:</b></td>
                                <td align="left">
                                    <input name="dtFecha" type="text" id="dtFecha" value="'. $this->getStrFechaInicio() .'" size="10" readonly="readonly" class="textboxfecha" />
                                    
                                        <img src="'. IMAGENES_PATH .'/calendario.png" title="Calendario" name="strFecha" id="strFecha" width="16px" height="16px" style="border: 0px none;">
                                   
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
                                <td  align="right"><b>Fecha&nbsp;Fin:</b></td>
                                <td align="left">
                                    <input name="dtFechaf" type="text" id="dtFechaf" value="'. $this->getStrFechaFin() .'" size="10" readonly="readonly" class="textboxfecha" />
                                    <a href="#">
                                        <img src="'. IMAGENES_PATH .'/calendario.png" title="Calendario" name="strFechaf" id="strFechaf" width="16px" height="16px" style="border: 0px none;">
                                    </a>
                                    <script type="text/javascript">
                                        Calendar.setup({
                                                         inputField: "dtFechaf",
                                                         ifFormat: "%Y-%m-%d",
                                                         button: "strFechaf"
                                                         });
                                    </script>
                                </td>
                             	<td  align="right"><b>Nº Alumos:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strNalumos" name="strNalumos" type="text" maxlength="50" '. JS_ONLY_NUMS .' value="'. $this->getstrNalumos() .'" />
                                </td>
                            </tr>
                            <tr class="formulariofila1">
                               	<td  align="right"><b>Cupos Disponibles:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strCdisponibles" name="strCdisponibles" type="text" maxlength="9" '. JS_ONLY_NUMS .' value="'. $this->getstrCdisponibles() .'" />
                                </td>
                                <td  align="right"><b>Número de Horas :</b></td>
                                <td align="left">
                                    <input class="textbox" id="strNumero" name="strNumero" type="text" maxlength="100" '. JS_ONLY_NUMS .' value="'. $this->getStrNumero() .'" />
                                </td>
                            </tr>
                            <tr class="formulariofila1">
                               	<td align="right"><b>Tipo Curso:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsTcurso" id="lsTcurso"  class="combobox">
	                                        '. $tcurso->getStrListar($this->getstrTcurso()) .'
	                                    </select>
                                </td>
                                <td align="right"><b>Clase:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsSubtformacion" id="lsSubtformacion"  class="combobox">
	                                        '. $subtformacion->getStrListar($this->getStrSubtformacion()) .'
	                                    </select>
                                </td> 
                            </tr>
                           <tr class="formulariofila1">
                               <td align="right"><b>Área:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsSubtformaciond" id="lsSubtformaciond"  class="combobox">
	                                        '. $subtformaciond->getStrListar($this->getStrSubtformaciond()) .'
	                                    </select>
                                </td> 
                                <td align="right"><b>Empresas:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsEmpresa" id="lsEmpresa"  class="combobox">
	                                        '. $empresa->getStrListar($this->getstrEmpresa()) .'
	                                    </select>
                                </td> 
                            </tr> 
							<tr class="formulariofila1">
                               	<td  align="right"><b>Total Asistentes:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strTasistentes" name="strTasistentes" type="text" maxlength="9" '. JS_ONLY_NUMS .' value="'. $this->getstrTasistentes() .'" />
                                </td>
                                <td  align="right"><b>Hombres :</b></td>
                                <td align="left">
                                    <input class="textbox" id="strNumhombres" name="strNumhombres" type="text" maxlength="100" '. JS_ONLY_NUMS .' value="'. $this->getstrNumhombres() .'" />
                                </td>
                            </tr>
							<tr class="formulariofila1">
                               	<td  align="right"><b>Mujeres :</b></td>
                                <td align="left">
                                    <input class="textbox" id="strNummujeres" name="strNummujeres" type="text" maxlength="100" '. JS_ONLY_NUMS .' value="'. $this->getstrNummujeres() .'" />
                                </td>
                               <td  align="right"><b>Nombre Taller:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strNombtaller" name="strNombtaller" type="text" maxlength="50" value="'. $this->getstrNombtaller() .'" />
                                </td> 
                            </tr>
							<tr class="formulariofila1">
                               	<td  align="right"><b>Ciudadano-Familia :</b></td>
                                <td align="left">
                                    <input class="textbox" id="strApellidof" name="strApellidof" type="text" maxlength="100"  value="'. $this->getstrApellidof() .'" />
                                </td>
                               
                            </tr>
                            <tr class="formulariofila1">
                               	<td  align="right"><b>Instructor :</b></td>
                                <td align="left">
                                    <input class="textbox" id="strInstructor" name="strInstructor" type="text" maxlength="100"  value="'. $this->getstrInstructor() .'" />
                                </td>
                               
                            </tr>
                           <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">DIRECCIÓN DEL CURSO</td>
                            </tr>
							<tr class="formulariofila1">
                               	<td  align="right"><b>Lugar Capacitación :</b></td>
                                <td align="left">
                                    <input class="textbox" id="strLcapacitacion" name="strLcapacitacion" type="text" maxlength="100"  value="'. $this->getstrLcapacitacion() .'" />
                                </td>
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
                                <td  align="right"><b>Parroquia:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsParroquia" id="lsParroquia" class="combobox">
                                        '. $parroquia->getStrListar($this->getStrCanton(), $this->getStrParroquia()) .'
                                    </select>                                    
                                </td>
                               
                            </tr>
                           <tr class="formulariofila1">
                                 <td  align="right"><b>Calle Principal:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strCprincipal" name="strCprincipal" type="text" maxlength="100" value="'. $this->getStrCprincipal() .'" />
                                </td>
                             	<td  align="right"><b>Número:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strNumerod" name="strNumerod" type="text" maxlength="100" '. JS_ONLY_NUMS .' value="'. $this->getStrNumerod() .'" />
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
                                    <input class="textbox" id="strSolar" name="strSolar" type="text" maxlength="100"  value="'. $this->getStrSolar() .'" />
                                </td>
                            </tr>
							<tr class="formulariofila1">
                                  <td  align="right"><b>Observación:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strObservacion" name="strObservacion" type="text" maxlength="50" value="'. $this->getStrObservacion() .'" />
                                </td>
                             	
                            </tr>
							
							
							
							
							
	                        <tr>
                                <td colspan="4" class="formulariofila1" align="center">
                                    <input type="submit" class="boton" name="'. $this->getStrNombreBoton() .'" value="'. $this->getStrValorBoton() .'" />
                                    <input type="submit" class="boton" name="'. $this->getStrNombreBotona() .'" value="'. $this->getStrValorBotona() .'" />
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
      

        public function getStrIngresar() {
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spingresarcursocf('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s',
             '%s', '%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s');",
            $this->getStrNombre(), $this->getstrCertificado(), $this->getstrAvalidado(), $this->getStrFechaInicio(), $this->getStrFechaFin(),
            $this->getstrNalumos(),$this->getstrCdisponibles(),$this->getStrNumero(), $this->getstrTcurso(),
			$this->getStrSubtformacion(),$this->getStrSubtformaciond(),$this->getstrEmpresa(),$this->getstrTasistentes(),
			$this->getstrNumhombres(),$this->getstrNummujeres(),$this->getstrNombtaller(),$this->getstrApellidof(),$this->getstrTcurso(),
			$this->getstrInstructor(),$this->getstrLcapacitacion(),$this->getStrParroquia(),$this->getStrCprincipal(),$this->getStrNumerod(),
			$this->getStrTransversal(),$this->getStrSector(),$this->getStrPasaje(),$this->getStrBarrio(),$this->getStrManzana(),
			$this->getStrSolar(),$this->getStrObservacion(),$this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);

            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Nombres = [ '.$this->getStrNombre().' ] Certificado= [ '. $this->getstrCertificado().' ] Avalizado = [ '.$this->getstrAvalidado().' ] Fecha inicio= [ '. $this->getStrFechaInicio().' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'GUARDAR', 'tcursocf', $descripcion);
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
           $ProcedimientoAlmacenado = sprintf("CALL spactualizarcursocf('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s',
             '%s', '%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s');",
            $this->getStrCodigo(),$this->getStrNombre(), $this->getstrCertificado(), $this->getstrAvalidado(), $this->getStrFechaInicio(), $this->getStrFechaFin(),
            $this->getstrNalumos(),$this->getstrCdisponibles(),$this->getStrNumero(), $this->getstrTcurso(),
			$this->getStrSubtformacion(),$this->getStrSubtformaciond(),$this->getstrEmpresa(),$this->getstrTasistentes(),
			$this->getstrNumhombres(),$this->getstrNummujeres(),$this->getstrNombtaller(),$this->getstrApellidof(),$this->getstrTcursosil(),
			$this->getstrInstructor(),$this->getstrLcapacitacion(),$this->getStrParroquia(),$this->getStrCprincipal(),$this->getStrNumerod(),
			$this->getStrTransversal(),$this->getStrSector(),$this->getStrPasaje(),$this->getStrBarrio(),$this->getStrManzana(),
			$this->getStrSolar(),$this->getStrObservacion());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);

            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Nombres = [ '.$this->getStrNombre().' ] Certificado= [ '. $this->getstrCertificado().' ] Avalizado = [ '.$this->getstrAvalidado().' ] Fecha inicio= [ '. $this->getStrFechaInicio().' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'ACTUALIZAR', 'tcursocf', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL speliminarcursocf('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlInsertUpdateDelete();

           if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Nombres = [ '.$this->getStrNombre().' ] Certificado= [ '. $this->getstrCertificado().' ] Avalizado = [ '.$this->getstrAvalidado().' ] Fecha inicio= [ '. $this->getStrFechaInicio().' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'ELIMINAR', 'tcursocf', $descripcion);
                      $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
                $query->getStrSqlInsertUpdateDelete();
                $resultado = true;
            }

            return $resultado;
        }
	public function getStrBuscartccf($v) {
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $cf=$_SESSION["usuario"]["suc"];
			$me=$_SESSION["usuario"]["cuenta"];
            $ProcedimientoAlmacenado = sprintf("CALL spbidentificadortccf('%d');","$v");
			$query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
            foreach( $resultado as $rst):   
				$valor=$rst['id_centro_formativo'];
		    endforeach;
            }
		     return $valor;
        }    
 	public function getStrBuscar() 
 	{
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbcursocf('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
                foreach( $resultado as $rst):   
	                $this->setStrCodigo($rst['id_tcursocf']);
                    $this->setStrNombre($rst['nombre']);
					$this->setstrCertificado($rst['certificado']);
					$this->setstrAvalidado($rst['avalizado']);
					$this->setstrFechaInicio($rst['fecha_inicio']);
					$this->setstrFechaFin($rst['fecha_fin']);
					$this->setstrNalumos($rst['num_alumnos']);
					$this->setstrCdisponibles($rst['cupos_disponibles']);
					$this->setStrNumero($rst['num_horas']);
					$this->setstrTcurso($rst['tipo_curso']);
					$this->setStrSubtformacion($rst['edu_formal']);
					$this->setStrSubtformaciond($rst['area_edu_formal']);
					$this->setstrEmpresa($rst['id_empresa']);
					$this->setstrTasistentes($rst['total_asistentes']);
					$this->setstrNumhombres($rst['num_hombres']);
					$this->setstrNummujeres($rst['num_mujeres']);
					$this->setstrNombtaller($rst['nombre_taller']);
					$this->setstrApellidof($rst['apellido_familia']);
					$this->setstrTcursosil($rst['tipo_curso_sil']);
					$this->setstrInstructor($rst['instructor']);
					$this->setstrLcapacitacion($rst['lugar_imparticion']);
					$this->setStrProvincia(substr($rst['parcodigo'],0,2));
	            	$this->setStrCanton(substr($rst['parcodigo'],0,4));  
					$this->setStrParroquia($rst['parcodigo']);
					$this->setStrCprincipal($rst['cprincipal']);
					$this->setStrNumerod($rst['numero']);
					$this->setStrTransversal($rst['transversal']);
					$this->setStrSector($rst['sector']);
					$this->setStrPasaje($rst['pasaje']);
					$this->setStrBarrio($rst['barrio']);
					$this->setStrManzana($rst['manzana']);
					$this->setStrSolar($rst['solar']);
					$this->setStrObservacion($rst['observacion']);
					
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
             $valor=$this->getStrCodigo();
            $ProcedimientoAlmacenado = sprintf("CALL sptotalcursoscf('%d');",$valor);
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultadototal = $query->getStrSqlSelect();

            foreach( $resultadototal as $rst):
                $paginacion->setStrTotalRegistros($rst["accesototal"]);
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
			 $cf=$this->getStrCodigo();
            $ProcedimientoAlmacenado = sprintf("CALL splistarcursoscf('%d','%d','%d');","$re", "$pa","$cf");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            CURSOS<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO CURSOS</legend>
                       ';
            $retval .= '
            
                        <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                        ';$paginacion->setStrNombrePagina("tcursocf/tcursocf.php");
            				$retval .= '<tr><td colspan="50" align="center">'. $paginacion->getStrPaginacion() .'</td></tr> 
                            <tr class="tablatitulo">
                                <th colspan="13">LISTADO CURSOS</th>
                            </tr>';
                           $paginacion->setStrNombrePagina("tcursocf/tcursocf.php");
            				$retval .= '<tr><td colspan="50" align="center">'. $paginacion->getStrPaginacion() .'</td></tr> 
                            <tr class="tablasubtitulo">
                            	<th align="center"></th>  
                               <th align="center">ID Acceso</th>                                                              
                                <th align="center">Nombre</th>
                                <th align="center">Certificado</th>
                                <th align="center">Avalizado</th>
                                <th align="center">Instructor</th>
                                <th align="center">Formación Requerida</th>
                                <th align="center">Requisito Alumnos</th>
                                <th align="center">Ingreso Horario</th>
                                <th align="center">Asignacion a Curso</th>
                                <th align="center" colspan="3">Acciones</th>
                             </tr>
                        ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["id_tcursocf"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["nombre"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["certificado_nombre"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["avalizado_nombre"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["instructor"] .'</td>';
					$retval .= '<td align="center"><div class="vtip" title="Formación Requerida <br> [ codigo = '.$rst["id_tcursocf"] .' ]">';
                    $retval .=  '<a href="'.TFORMACIONRCU_URL.'tformacionrcu.php?btnNuevo=Nuevo&strCodigo='. $rst["id_tcursocf"] .'"><img src="'. IMAGENES_PATH .'/cursos.png" title="" width="16px" height="16px"  border="0" /></a>';
					$retval .= 	'</div></td>';
					$retval .= '<td align="center"><div class="vtip" title="Requisitos Alumnos <br> [ codigo = '.$rst["id_tcursocf"] .' ]">';
                    $retval .=  '<a href="'.TREQUISITOSCU_URL.'trequisitoscu.php?btnNuevo=Nuevo&strCodigo='. $rst["id_tcursocf"] .'"><img src="'. IMAGENES_PATH .'/rpthistoriaclinicapacientegeneral.png" title="" width="16px" height="16px"  border="0" /></a>';
					$retval .= 	'</div></td>';
					$retval .= '<td align="center"><div class="vtip" title="Horario <br> [ codigo = '.$rst["id_tcursocf"] .' ]">';
                    $retval .=  '<a href="'.THORARIOCU_URL.'thorariocu.php?btnNuevo=Nuevo&strCodigo='. $rst["id_tcursocf"] .'"><img src="'. IMAGENES_PATH .'/horario.ico" title="" width="16px" height="16px"  border="0" /></a>';
					$retval .= 	'</div></td>';
					$retval .= '<td align="center"><div class="vtip" title="Asignación a Curso <br> [ codigo = '.$rst["id_tcursocf"] .' ]">';
                    $retval .=  '<a href="'.TASIGNACIONCU_URL.'tasignacioncu.php?btnNuevo=Nuevo&strCodigo='. $rst["id_tcursocf"] .'"><img src="'. IMAGENES_PATH .'/rptauditoria.png" title="" width="32px" height="32px"  border="0" /></a>';
					$retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="ACTUALIZAR CURSOS <br> [ codigo = '.$rst["id_tcursocf"] .' ]">';
                    $retval .=  '<a href="'.TCURSOCF_URL.'tcursocf.php?btnActualizar=Actualizar&strCodigo='. $rst["id_tcursocf"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="ELIMINAR CURSOS<br> [codigo = '.$rst["id_tcursocf"] .' ]">';
                    $retval .=  '<a href="'.TCURSOCF_URL.'tcursocf.php?btnEliminar=Eliminar&strCodigo='. $rst["id_tcursocf"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="DETALLE CURSOS<br> [ codigo = '.$rst["id_tcursocf"] .' ]">';
                    $retval .=  '<a href="'.TCURSOCF_URL.'tcursocf.php?btnDetalle=Detalle&strCodigo='. $rst["id_tcursocf"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                    $i = 1 - $i;
                endforeach;
            }

            //$paginacion->setStrNombrePagina("tcursocf/tcursocf.php");
            //$retval .= '<tr><td colspan="50" align="center">'. $paginacion->getStrPaginacion() .'</td></tr>';
            $retval .= '</table>';
            $retval .= '</fieldset>';
            return $retval;
        }

public function getStrDetallePersona()
        {
            $query = new clQuery();
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbdetallecursocf('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            Curso<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Listado Curso <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Detalle Curso
                        </legend>
                       ';

            if( count($resultado) > 0 )
            {
                $i = 0;
				$valor=$this->getStrCodigo();
			 	$v=$this->getStrBuscartccf($valor);
                foreach( $resultado as $rst):
                    $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                    $retval .= '<tr>
                                    <td colspan="2" align="center">
                                        <a href="'. TCURSOCF_URL .'tcursocf.php?btnNuevo=Nuevo&strCodigo='.$v.'">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" />REGRESAR LISTADO  CURSOS|</a>
                                    <td>
                                </tr>
                                ';
                    
                    $retval .= '<tr class="tablatitulo">
                                    <th colspan="2">DETALLE&nbsp;CURSOS;REGISTRADO</th>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Código Curso:</th>
                                    <td align="left">  '. $rst["id_tcursocf"] .'</td>
                                </tr>
                                ';
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Nombre:</th>
                                    <td align="left">  '. $rst["nombre"] .'</td>
                                </tr>
                                ';
                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Certificado:</th>
                                    <td align="left">  '. $rst["certificado_nombre"] .'</td>
                                </tr>
                                ';

                    
                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Avalizado:</th>
                                    <td align="left">  '. $rst["avalizado_nombre"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Fecha Inicio:</th>
                                    <td align="left">  '. $rst["fecha_inicio"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Fecha Fin:</th>
                                    <td align="left">  '. $rst["fecha_fin"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Número Alumnos:</th>
                                    <td align="left">  '. $rst["num_alumnos"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Cupos Disponibles:</th>
                                    <td align="left">  '. $rst["cupos_disponibles"] .'</td>
                                </tr>
                                ';	
                     $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Número de Horas:</th>
                                    <td align="left">  '. $rst["num_horas"] .'</td>
                                </tr>
                                ';	  
					  $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Tipo Curso:</th>
                                    <td align="left">  '. $rst["tipo_descripcion"] .'</td>
                                </tr>
                                ';	
					 $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Subárea:</th>
                                    <td align="left">  '. $rst["capacitacion_nombre"] .'</td>
                                </tr>
                                ';							         												
					 $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Subárea Descripción:</th>
                                    <td align="left">  '. $rst["tformaciond_descripcion"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Empresa:</th>
                                    <td align="left">  '. $rst["nombre_empresa"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Total Asistentes:</th>
                                    <td align="left">  '. $rst["total_asistentes"] .'</td>
                                </tr>
                                ';				
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Número Hombres:</th>
                                    <td align="left">  '. $rst["num_hombres"] .'</td>
                                </tr>
                                ';				
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Número Mujeres:</th>
                                    <td align="left">  '. $rst["num_mujeres"] .'</td>
                                </tr>
                                ';							
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Nombre Taller:</th>
                                    <td align="left">  '. $rst["nombre_taller"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Apellido Familia:</th>
                                    <td align="left">  '. $rst["apellido_familia"] .'</td>
                                </tr>
                                ';			
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Tipo Curso Sil:</th>
                                    <td align="left">  '. $rst["cursosil"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Instructor:</th>
                                    <td align="left">  '. $rst["instructor"] .'</td>
                                </tr>
                                ';			
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Lugar Capacitación:</th>
                                    <td align="left">  '. $rst["lugar_imparticion"] .'</td>
                                </tr>
                                ';			
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Parroquia:</th>
                                    <td align="left">  '. $rst["pardescripcion"] .'</td>
                                </tr>
                                ';	
                     $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Calle Principal:</th>
                                    <td align="left">  '. $rst["cprincipal"] .'</td>
                                </tr>
                                ';	          			
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Número:</th>
                                    <td align="left">  '. $rst["numero"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Transversal:</th>
                                    <td align="left">  '. $rst["transversal"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Sector:</th>
                                    <td align="left">  '. $rst["tipoparroquia_nombre"] .'</td>
                                </tr>
                                ';	 
                     $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Pasaje:</th>
                                    <td align="left">  '. $rst["pasaje"] .'</td>
                                </tr>
                                ';	 
                      $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Barrio:</th>
                                    <td align="left">  '. $rst["barrio"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Manzana:</th>
                                    <td align="left">  '. $rst["manzana"] .'</td>
                                </tr>
                                ';	 
                     $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Solar:</th>
                                    <td align="left">  '. $rst["solar"] .'</td>
                                </tr>
                                ';	
				 	$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Observación:</th>
                                    <td align="left">  '. $rst["observacion"] .'</td>
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