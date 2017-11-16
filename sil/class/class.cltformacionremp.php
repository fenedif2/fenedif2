<?php	
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.validaciones.php' );
    include_once( CLASS_PATH . "class.clquery.php" );
    include_once( CLASS_PATH . "class.clpaginacion.php" ); 
	
	include_once( CLASS_PATH . "class.cltfnecesaria.php" ); 
	include_once( CLASS_PATH . "class.cltnivel.php" );
	include_once( CLASS_PATH . "class.cltniveledu.php" ); 
	include_once( CLASS_PATH . "class.clavalizado.php" );
	include_once( CLASS_PATH . "class.clcminimos.php" );
	include_once( CLASS_PATH . "class.cldigitacion.php" );
	
    class clTformacionremp
    {
        private $StrCodigo;
        private $strNombre;
		private $strTfnecesaria;
		private $strTnivel;
		private $strTniveledu;
		private $strAvalidado;
		private $strWork;
		private $strPoint;
		private $strJaws;
		private $strExcel;
		private $strInternet;
		private $strOtros;
		private $strOtross;
		private $strCinformaticos;
		private $strCinformatico;
		private $strCminimos;
		private $strPcontables;
		private $strDinformaticos;
		private $strDgraficos;
		private $strVdigitacion;
		private $strNombreBoton;
        private $strValorBoton;
		private $strNombreBotons;
        private $strValorBotons;
		private $strNombreBotona;
        private $strValorBotona;
        public function __construct()
        {
				
            $this->StrCodigo = "";	
			$this->strNombre = "";
			$this->strTfnecesaria = "";
			$this->strTnivel = "";
			$this->strTniveledu = "";
			$this->strAvalidado = "";
			$this->strWork = "1";
			$this->strPoint = "2";
			$this->strJaws = "3";
			$this->strExcel = "4";
			$this->strInternet = "5";
			$this->strOtros = "6";
			$this->strOtros6 = "";
			$this->strCinformaticos = " ";
			$this->strCinformatico = " ";
			$this->strCminimos = " ";
			$this->strPcontables = " ";
			$this->strDinformaticos = " ";
			$this->strDgraficos = " ";
			$this->strVdigitacion = " ";
			$this->strNombreBoton = "";
            $this->strValorBoton = "";
			$this->strNombreBotons = "";
            $this->strValorBotons = "";
			$this->strNombreBotona = "";
            $this->strValorBotona = "";
			
        }
//////////////////// codigo centro Formativo//////////////////
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
////////////// Formacion Necesaria/////////////////////
        public function getStrTfnecesaria()
        {
            return $this->strTfnecesaria;
        }
		public function setStrTfnecesaria($n)
        {
            $this->strTfnecesaria = $n;
        }
////////////// Nivel/////////////////////
        public function getStrTnivel()
        {
            return $this->strTnivel;
        }
		public function setStrTnivel($n)
        {
            $this->strTnivel = $n;
        }				
////////////// Nivel edu /////////////////////
        public function getStrTniveledu()
        {
            return $this->strTniveledu;
        }
		public function setStrTniveledu($n)
        {
            $this->strTniveledu = $n;
        }				
////////////////////////////////Conocimientos //////////////////////////////////////////////////////////////////////
	public function getstrAvalidado()
        {
            return $this->strAvalidado;
        }
  		public function setstrAvalidado($ct)
        {
            $this->strAvalidado = $ct;
        }     		
////////////////////////////////Work //////////////////////////////////////////////////////////////////////
	public function getstrWork()
        {
            return $this->strWork;
        }
  		public function setstrWork($ct)
        {
            $this->strWork = $ct;
        } 
////////////////////////////////Point //////////////////////////////////////////////////////////////////////
	public function getstrPoint()
        {
            return $this->strPoint;
        }
  		public function setstrPoint($ct)
        {
            $this->strPoint = $ct;
        } 
////////////////////////////////Jaws //////////////////////////////////////////////////////////////////////
	public function getstrJaws()
        {
            return $this->strJaws;
        }
  		public function setstrJaws($ct)
        {
            $this->strJaws = $ct;
        } 
////////////////////////////////Excel//////////////////////////////////////////////////////////////////////
	public function getstrExcel()
        {
            return $this->strExcel;
        }
  		public function setstrExcel($ct)
        {
            $this->strExcel = $ct;
        } 
	///////////////////////////////Internet//////////////////////////////////////////////////////////////////////
	public function getstrInternet()
        {
            return $this->strInternet;
        }
  		public function setstrInternet($ct)
        {
            $this->strInternet = $ct;
        } 
///////////////////////////////Otros//////////////////////////////////////////////////////////////////////
	public function getstrOtros()
        {
            return $this->strOtros;
        }
  		public function setstrOtros($ct)
        {
            $this->strOtros = $ct;
        } 
///////////////////////////////Otross//////////////////////////////////////////////////////////////////////
	public function getstrOtross()
        {
            return $this->strOtross;
        }
  		public function setstrOtross($ct)
        {
            $this->strOtross = $ct;
        } 													
////////////////////////////////Cinformaticos//////////////////////////////////////////////////////////////////////
	public function getstrCinformaticos()
        {
            return $this->strCinformaticos;
        }
  		public function setstrCinformaticos($ct)
        {
            $this->strCinformaticos = $ct;
        } 
////////////////////////////////Cinformatico//////////////////////////////////////////////////////////////////////
	public function getstrCinformatico()
        {
            return $this->strCinformatico;
        }
  		public function setstrCinformatico($ct)
        {
            $this->strCinformatico = $ct;
        } 		
////////////////////////////////Cminimos//////////////////////////////////////////////////////////////////////
	public function getstrCminimos()
        {
            return $this->strCminimos;
        }
  		public function setstrCminimos($ct)
        {
            $this->strCminimos = $ct;
        } 
////////////////////////////////Pcontables//////////////////////////////////////////////////////////////////////
	public function getstrPcontables()
        {
            return $this->strPcontables;
        }
  		public function setstrPcontables($ct)
        {
            $this->strPcontables = $ct;
        } 
////////////////////////////////Dinformaticos//////////////////////////////////////////////////////////////////////
	public function getstrDinformaticos()
        {
            return $this->strDinformaticos;
        }
  		public function setstrDinformaticos($ct)
        {
            $this->strDinformaticos = $ct;
        } 
////////////////////////////////Dgraficos//////////////////////////////////////////////////////////////////////
	public function getstrDgraficos()
        {
            return $this->strDgraficos;
        }
  		public function setstrDgraficos($ct)
        {
            $this->strDgraficos = $ct;
        } 
////////////////////////////////Vdigitacion//////////////////////////////////////////////////////////////////////
	public function getstrVdigitacion()
        {
            return $this->strVdigitacion;
        }
  		public function setstrVdigitacion($ct)
        {
            $this->strVdigitacion = $ct;
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
/////////////////////////// siguiente //////////////////////////
  public function getStrNombreBotons()
        {
            return $this->strNombreBotons;
        }

        public function setStrNombreBotons($nb)
        {
            $this->strNombreBotons = $nb;
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

//////////////////////////valor/////////////////////////////////
 public function getStrValorBotons()
        {
            return $this->strValorBotons;
        }

        public function setStrValorBotons($vb)
        {
            $this->strValorBotons = $vb;
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
//////////////////////////////////////////			
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
          $tfnecesaria = new clTfnecesaria();	
		  $tnivel = new clTnivel();  
		  $tniveledu = new clTniveledu();
          $cinformatico = new clAvalizado();
		  $pcontables = new clAvalizado();
		  $dinformatico = new clAvalizado();
		  $dgrafico = new clAvalizado();
		  $cminimos = new clCminimos();	 
		  $vdigitacion = new clDigitacion();
			
          $retval  = '<script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.validate.js"></script>
                        <script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.metadata.js"></script>
                       ';

            $retval .= '<br><br><br><br>
                        <script>
                            $(document).ready(function(){
                                    $.metadata.setType( \'attr\', \'validate\' );
                                    $(\'#frmtformacionremp\').validate({
                                            rules:{
                                               strNombre: { required: true},
                                               
                                            	
												strObservaciond: { required: true }
                                                  },
                                            messages:{
                                              	strNombre: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                              	lsCertificado: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
												
                                               
                                              
												strObservaciond: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"}
												     }
                                    });
									
                                    $("#lsTfnecesaria").change(function () {
                                    $("#lsTfnecesaria option:selected").each(function () {
                                            var tfnecesaria = $(this).val();
                                            $.post( "'. TFORMACIONREMP_URL .'tformacionremp.php", { btnBuscar: "nivel",
                                                    strCodigotfnecesaria: tfnecesaria
                                                                                    },
                                        function(data){
                                                $("#lsTnivel").html(data);
                                        });
                                    });
                                 });
								 $("#lsTfnecesaria").change(function () {
                                    $("#lsTfnecesaria option:selected").each(function () {
                                            var tfnecesaria = $(this).val();
                                            $.post( "'. TFORMACIONREMP_URL .'tformacionremp.php", { btnBuscar: "niveledu",
                                                    strCodigotfnecesaria: tfnecesaria
                                                                                    },
                                        function(data){
                                                $("#lsTniveledu").html(data);
                                        });
                                    });
                                 });
															 
                 				$("#lsTfnecesaria").change(function() 
                 				{
								  if($(this).val() == "8" || $(this).val() == "2" || $(this).val() == "7") 
								  {
								    $("#lsTnivel").attr("disabled", "disabled");
									$("#lsTnivel").css("background-color", "#F5DA81"); 
									$("#lsTniveledu").attr("disabled", "disabled");
									$("#lsTniveledu").css("background-color", "#F5DA81");
								  }
									  else 
									  {
									  	 if($(this).val() == "1" ) 
										  {
										   	$("#lsTnivel").removeAttr("disabled");
											$("#lsTnivel").css("background-color", "#FFFFFF");	    
										   	$("#lsTniveledu").attr("disabled", "disabled");
											$("#lsTniveledu").css("background-color", "#F5DA81");
							
										  }
										  else 
											  {
											  	if($(this).val() == "3" || $(this).val() == "5" || $(this).val() == "6") 
												  {    
												   	$("#lsTniveledu").removeAttr("disabled");
													$("#lsTniveledu").css("background-color", "#FFFFFF");
													$("#lsTnivel").removeAttr("disabled");
													$("#lsTnivel").css("background-color", "#FFFFFF");
												  }
													  else 
													  {
														  if($(this).val() == "4" ) 
															  {
															   	$("#lsTnivel").attr("disabled", "disabled");
																$("#lsTnivel").css("background-color", "#F5DA81");	    
															   	$("#lsTniveledu").removeAttr("disabled");
																$("#lsTniveledu").css("background-color", "#FFFFFF");
															  }
													  }
												  
											  }
												  
							  		}
							});
							
							$("#lsCinformatico").change(function() 
                 				{
								  if($(this).val() == "2") 
								  {
								    $("#lsCminimos1").attr("disabled", "disabled");
									$("#lsCminimos1").css("background-color", "#F5DA81"); 
									$("#lsCminimos2").attr("disabled", "disabled");
									$("#lsCminimos2").css("background-color", "#F5DA81"); 
									$("#lsCminimos3").attr("disabled", "disabled");
									$("#lsCminimos3").css("background-color", "#F5DA81"); 
									$("#lsCminimos4").attr("disabled", "disabled");
									$("#lsCminimos4").css("background-color", "#F5DA81"); 
									$("#lsCminimos5").attr("disabled", "disabled");
									$("#lsCminimos5").css("background-color", "#F5DA81"); 
									$("#strOtross").attr("disabled", "disabled");
									$("#strOtross").css("background-color", "#F5DA81"); 
									$("#strcinformaticos1").attr("disabled", "disabled");
									$("#strcinformaticos1").css("background-color", "#F5DA81");
									$("#strcinformaticos2").attr("disabled", "disabled");
									$("#strcinformaticos2").css("background-color", "#F5DA81");
									$("#strcinformaticos3").attr("disabled", "disabled");
									$("#strcinformaticos3").css("background-color", "#F5DA81");
									$("#strcinformaticos4").attr("disabled", "disabled");
									$("#strcinformaticos4").css("background-color", "#F5DA81");
									$("#strcinformaticos5").attr("disabled", "disabled");
									$("#strcinformaticos5").css("background-color", "#F5DA81");
									$("#strcinformaticos6").attr("disabled", "disabled");
									$("#strcinformaticos6").css("background-color", "#F5DA81");
								 	$("#lspcontable").attr("disabled", "disabled");
									$("#lspcontable").css("background-color", "#F5DA81");
									$("#lsdinformatico").attr("disabled", "disabled");
									$("#lsdinformatico").css("background-color", "#F5DA81");
									$("#lsdgrafico").attr("disabled", "disabled");
									$("#lsdgrafico").css("background-color", "#F5DA81");
									$("#lsdigitacion").attr("disabled", "disabled");
									$("#lsdigitacion").css("background-color", "#F5DA81");
								  }
								  else
								  {
								  		$("#lspcontable").removeAttr("disabled");
										$("#lspcontable").css("background-color", "#FFFFFF");	
										$("#lsdinformatico").removeAttr("disabled");
										$("#lsdinformatico").css("background-color", "#FFFFFF");
										$("#lsdgrafico").removeAttr("disabled");
										$("#lsdgrafico").css("background-color", "#FFFFFF");
										$("#lsdigitacion").removeAttr("disabled");
										$("#lsdigitacion").css("background-color", "#FFFFFF");
										$("#strcinformaticos1").removeAttr("disabled");
										$("#strcinformaticos1").css("background-color", "#FFFFFF");
										$("#strcinformaticos2").removeAttr("disabled");
										$("#strcinformaticos2").css("background-color", "#FFFFFF");
										$("#strcinformaticos3").removeAttr("disabled");
										$("#strcinformaticos3").css("background-color", "#FFFFFF");
										$("#strcinformaticos4").removeAttr("disabled");
										$("#strcinformaticos4").css("background-color", "#FFFFFF");
										$("#strcinformaticos5").removeAttr("disabled");
										$("#strcinformaticos5").css("background-color", "#FFFFFF");
										$("#strcinformaticos6").removeAttr("disabled");
										$("#strcinformaticos6").css("background-color", "#FFFFFF");
										$("#lsCminimos1").attr("disabled", "disabled");
										$("#lsCminimos1").css("background-color", "#F5DA81"); 
										$("#lsCminimos2").attr("disabled", "disabled");
										$("#lsCminimos2").css("background-color", "#F5DA81"); 
										$("#lsCminimos3").attr("disabled", "disabled");
										$("#lsCminimos3").css("background-color", "#F5DA81"); 
										$("#lsCminimos4").attr("disabled", "disabled");
										$("#lsCminimos4").css("background-color", "#F5DA81"); 
										$("#lsCminimos5").attr("disabled", "disabled");
										$("#lsCminimos5").css("background-color", "#F5DA81"); 
										$("#strOtross").attr("disabled", "disabled");
										$("#strOtross").css("background-color", "#F5DA81"); 
										
								  }
									 
							});
							$("#strcinformaticos1").click(function() 
							{  
						        if($("#strcinformaticos1").is(":checked")) 
						        {
						             $("#lsCminimos1").removeAttr("disabled");
									$("#lsCminimos1").css("background-color", "#FFFFFF");
						        } 
						        else 
						        {  
						          $("#lsCminimos1").attr("disabled", "disabled");
									$("#lsCminimos1").css("background-color", "#F5DA81"); 
						        }  
						    });  
							$("#strcinformaticos2").click(function() 
							{  
						        if($("#strcinformaticos2").is(":checked")) 
						        {
						             $("#lsCminimos2").removeAttr("disabled");
									$("#lsCminimos2").css("background-color", "#FFFFFF");
						        } 
						        else 
						        {  
						          $("#lsCminimos2").attr("disabled", "disabled");
									$("#lsCminimos2").css("background-color", "#F5DA81"); 
						        }  
						    });  
						$("#strcinformaticos3").click(function() 
							{  
						        if($("#strcinformaticos3").is(":checked")) 
						        {
						             $("#lsCminimos3").removeAttr("disabled");
									$("#lsCminimos3").css("background-color", "#FFFFFF");
						        } 
						        else 
						        {  
						          $("#lsCminimos3").attr("disabled", "disabled");
									$("#lsCminimos3").css("background-color", "#F5DA81"); 
						        }  
						    });  
						$("#strcinformaticos4").click(function() 
							{  
						        if($("#strcinformaticos4").is(":checked")) 
						        {
						             $("#lsCminimos4").removeAttr("disabled");
									$("#lsCminimos4").css("background-color", "#FFFFFF");
						        } 
						        else 
						        {  
						          $("#lsCminimos4").attr("disabled", "disabled");
									$("#lsCminimos4").css("background-color", "#F5DA81"); 
						        }  
						    });  
						$("#strcinformaticos5").click(function() 
							{  
						        if($("#strcinformaticos5").is(":checked")) 
						        {
						             $("#lsCminimos5").removeAttr("disabled");
									$("#lsCminimos5").css("background-color", "#FFFFFF");
						        } 
						        else 
						        {  
						          $("#lsCminimos5").attr("disabled", "disabled");
									$("#lsCminimos5").css("background-color", "#F5DA81"); 
						        }  
						    });  			
						$("#strcinformaticos6").click(function() 
							{  
						        if($("#strcinformaticos6").is(":checked")) 
						        {
						             $("#strOtross").removeAttr("disabled");
									$("#strOtross").css("background-color", "#FFFFFF");
						        } 
						        else 
						        {  
						          	$("#strOtross").attr("disabled", "disabled");
									$("#strOtross").css("background-color", "#F5DA81"); 
						        }  
						    });  
								 
                            });
                        </script>
                       ';
            $retval .= '<form id="frmtformacionremp" action="'. TFORMACIONREMP_URL .'tformacionremp.php" method="POST">';

            $Regresar = "regresar('". CFORMATIVO_URL . "cformativo.php')";

            $retval .= '<fieldset class="fieldsetPequeno">';
            $retval .= '<legend class="etiquetaborde">
                            FORMACIÓN REQUERIDA <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO FORMACIÓN REQUERIDA<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> '. $this->getStrEtiqueta() .'
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
                                <td align="right"><b>Formación Necesaria:&nbsp;</b></td>
                                <td align="left">                                    
                                    <select name="lsTfnecesaria" id="lsTfnecesaria"  class="combobox">
                                        '. $tfnecesaria->getStrListar($this->getStrTfnecesaria()) .'
                                    </select>
                                </td>
                                <td align="right"><b>Nivel Alcanzado:&nbsp;</b></td>
                                <td align="left">                                    
                                    <select name="lsTnivel" id="lsTnivel"  class="combobox">
                                        '. $tnivel->getStrListar($this->getStrTnivel()) .'
                                    </select>
                                </td>
        		            </tr>
                           <tr class="formulariofila1">
        		            	<td align="right"><b>Área:&nbsp;</b></td>
                                <td align="left">                                    
                                    <select name="lsTniveledu" id="lsTniveledu"  class="combobox">
                                        '. $tniveledu->getStrListar($this->getStrTniveledu()) .'
                                    </select>
                                </td>
								<td align="right"><b>Conocimientos Informáticos</b></td>
                                <td align="left">                                    
                                    <select name="lsCinformatico" id="lsCinformatico""  class="combobox">
                                        '. $cinformatico->getStrListar($this->getstrAvalidado()) .'
                                    </select>
                                </td>
						    </tr>
						    <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                               <td colspan="4" align="center" class="tablatitulo">CONOCIMIENTOS INFORMÁTICOS</td>
                            </tr>
                            <tr class="formulariofila1">
        		            	<td align="left">
                                	<input type="checkbox" id="strcinformaticos1" name="strcinformaticos[]" value="'. $this->getstrWork().'">Word<br>
   				                      <select name="lsCminimos[]" id="lsCminimos1"  class="combobox">
                                        '. $cminimos->getStrListar($this->getstrCminimos()) .'
                                    </select>
                                </td>
                                <td align="left">
                                	<input type="checkbox" id="strcinformaticos2" name="strcinformaticos[]" value="'. $this->getstrPoint().'">Power Point<br>
                                    <select name="lsCminimos[]" id="lsCminimos2"  class="combobox">
                                        '. $cminimos->getStrListar($this->getstrCminimos()) .'
                                    </select>
                                </td>
						   	</tr>
						    <tr class="formulariofila1">
        		            	<td align="left">
                                	<input type="checkbox" id="strcinformaticos3" name="strcinformaticos[]" value="'. $this->getstrJaws().'">Jaws<br>
   				                      <select name="lsCminimos[]" id="lsCminimos3"  class="combobox">
                                        '. $cminimos->getStrListar($this->getstrCminimos()) .'
                                    </select>
                                </td>
                                <td align="left">
                                	<input type="checkbox" id="strcinformaticos4" name="strcinformaticos[]" value="'. $this->getstrExcel().'">Excel<br>
                                    <select name="lsCminimos[]" id="lsCminimos4"  class="combobox">
                                        '. $cminimos->getStrListar($this->getstrCminimos()) .'
                                    </select>
                                </td>
						   	</tr>			    
						    <tr class="formulariofila1">
        		            	<td align="left">
                                	<input type="checkbox" id="strcinformaticos5" name="strcinformaticos[]" value="'. $this->getstrInternet().'">Internet<br>
   				                      <select name="lsCminimos[]" id="lsCminimos5"  class="combobox">
                                        '. $cminimos->getStrListar($this->getstrCminimos()) .'
                                    </select>
                                </td>
                                <td align="left">
                                	<input type="checkbox" id="strcinformaticos6" name="strcinformaticos[]" value="'. $this->getstrOtros().'">Otros<br>
                                   
                                    	<input class="textbox" id="strOtross" name="strOtross" type="text" maxlength="100" value="'. $this->getstrOtross() .'" />
                                	
                                </td>
						   	</tr>	
						   	<table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                               <td colspan="4" align="center" class="tablatitulo"></td>
                            </tr>
                            <tr class="formulariofila1">
        		            	 <td  align="right"><b>Programas Contables</b></td>
                                	<td align="left">
                                    <select name="lspcontable" id="lspcontable" class="combobox">
                                        '. $pcontables->getStrListar($this->getstrAvalidado()) .'
                                    </select>
                                </td>
                                <td  align="right"><b>Desarrolladores Informáticos</b></td>
                                	<td align="left">
                                    <select name="lsdinformatico" id="lsdinformatico" class="combobox">
                                        '. $dinformatico->getStrListar($this->getstrAvalidado()) .'
                                    </select>
                                </td>
						   	</tr>
							 <tr class="formulariofila1">
        		            	 <td  align="right"><b>Diseñadores Gráficos</b></td>
                                	<td align="left">
                                    <select name="lsdgrafico" id="lsdgrafico" class="combobox">
                                        '. $dgrafico->getStrListar($this->getstrAvalidado()) .'
                                    </select>
                                </td>
                                <td  align="right"><b>Velocidad Digitación</b></td>
                                	<td align="left">
                                    <select name="lsdigitacion" id="lsdigitacion" class="combobox">
                                        '. $vdigitacion->getStrListar($this->getstrVdigitacion()) .'
                                    </select>
                                </td>
						   	</tr>
							
							
						   	
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
      
  public function getStrIngresar() 
        {
        $First = $this->getstrCinformaticos();
		$Second = $this->getstrCminimos();
		 if(count($First)>0)
		 {
		 	for($indx = 0 ; $indx < count($First); $indx ++)
            {
           	$query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spingresartformacionremp('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s');",
            $this->getStrTfnecesaria(),$this->getStrTnivel(), $this->getStrTniveledu(), $this->getstrCinformatico(),
           	$First[$indx],$Second[$indx],$this->getstrOtross(),$this->getstrPcontables(),
           	$this->getstrDinformaticos(),$this->getstrDgraficos(),$this->getstrVdigitacion(),$this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            if($query->getStrSqlInsertUpdateDelete())
	            {
	                //Nombre Procedimientos Almacenados [Auditoria]
	                $descripcion = 'F_Necesaria = [ '.$this->getStrTfnecesaria().' ]  ]';
	                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'GUARDAR', 'tformacionremp', $descripcion);
	                $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
	                $query->getStrSqlInsertUpdateDelete();
	                $resultado = true;
	            }
				
         	}
			
         	
            return $resultado;
		 }
		 else 
		 {
			$query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spingresartformacionremp('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s');",
            $this->getStrTfnecesaria(),$this->getStrTnivel(), $this->getStrTniveledu(), $this->getstrCinformatico(),
           	$this->getstrCinformaticos(),$this->getstrCminimos(),$this->getstrOtross(),$this->getstrPcontables(),
           	$this->getstrDinformaticos(),$this->getstrDgraficos(),$this->getstrVdigitacion(),$this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            if($query->getStrSqlInsertUpdateDelete())
	            {
	                //Nombre Procedimientos Almacenados [Auditoria]
	                $descripcion = 'F_Necesaria = [ '.$this->getStrTfnecesaria().' ]  ]';
	                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'GUARDADR', 'tformacionremp', $descripcion);
	                $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
	                $query->getStrSqlInsertUpdateDelete();
	                $resultado = true;
	            }
	        return $resultado; 
		 }
		 
       }

	public function getStrActualizar() 
	{
            //Nombre Procedimientos Almacenados

              	$query = new clQuery();
            	$resultado = false; 
	            $ProcedimientoAlmacenado = sprintf("CALL spactualizartformacionremp('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s');",
	            $this->getStrCodigo(),$this->getStrTfnecesaria(),$this->getStrTnivel(), $this->getStrTniveledu(), $this->getstrCinformatico(),
	           	$this->getstrCinformaticos(),$this->getstrCminimos(),$this->getstrOtross(),$this->getstrPcontables(),
	           	$this->getstrDinformaticos(),$this->getstrDgraficos(),$this->getstrVdigitacion());
	            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
	            if($query->getStrSqlInsertUpdateDelete())
		            {
		                //Nombre Procedimientos Almacenados [Auditoria]
		                $descripcion = 'F_Necesaria = [ '.$this->getStrTfnecesaria().' ]  ]';
		                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'ACTUALIZAR', 'tformacionremp', $descripcion);
		                $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
		                $query->getStrSqlInsertUpdateDelete();
		                $resultado = true;
		            }
	        return $resultado; 
    }
public function getStrBuscarempform($v) 
	{
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbidentificadorformemp('%d');","$v");
			$query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
            foreach( $resultado as $rst):   
				$valor=$rst['empresa_id'];
		    endforeach;
            }
		     return $valor;
      }    	 
 public function getStrEliminar() 
        {
        	$query = new clQuery();
           $resultado = TRUE;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL speliminartformacionremp('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlInsertUpdateDelete();
			if($query->getStrSqlInsertUpdateDelete())
	            {
	                //Nombre Procedimientos Almacenados [Auditoria]
	                $descripcion = 'F_Necesaria = [ '.$this->getStrTfnecesaria().' ]  ]';
	                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'ELIMINARL', 'tformacionremp', $descripcion);
	                $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
	                $query->getStrSqlInsertUpdateDelete();
	                $resultado = true;
	            }
           
			
            return $resultado;
			
           
        }

 	public function getStrBuscar() 
 	{
          $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbtformacionremp('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
                foreach( $resultado as $rst):   
	                $this->setStrCodigo($rst['tformacionremp_id']);
                  	$this->setStrTfnecesaria($rst['tfnecesaria_id']);
                  	$this->setStrTnivel($rst['tnivel_id']);
					$this->setStrTniveledu($rst['tniveledu_id']);
					$this->setstrCinformatico($rst['tinformaticos_id']);
					$this->setstrCinformaticos($rst['tcinformaticos_id']);
					$this->setstrCminimos($rst['conocimientosminimos_id']);
					$this->setstrOtross($rst['otros']);
					$this->setstrPcontables($rst['pcontable']);
					$this->setstrDinformaticos($rst['dinformatico']);
					$this->setstrDgraficos($rst['dgrafico']);
					$this->setstrVdigitacion($rst['vdigitacion']);
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
            $ProcedimientoAlmacenado = sprintf("CALL sptotaltformacionremp();", $this->getStrCodigo());
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
            $ProcedimientoAlmacenado = sprintf("CALL splistartformacionremp('%d','%d','%d');","$re", "$pa","$cf");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            FORMACIÓN REQUERIDA<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO FORMACIÓN REQUERIDA</legend>
                       ';
            $retval .= '
                        <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                            <tr class="tablatitulo">
                                <th colspan="17">LISTADO FORMACIÓN REQUERIDA</th>
                            </tr>
                            <tr class="tablasubtitulo">
                            	<th align="center"></th>  
                               <th align="center">ID Acceso</th>                                                              
                                <th align="center">Formación Necesaria</th>
                                <th align="center">Nivel</th>
                                <th align="center">Área</th>
                                <th align="center">Conocimientos Informáticos</th>
                                <th align="center">Descripción Conocimientos Informáticos</th>
                                 <th align="center">Descripción Conocimientos</th>
                                 <th align="center">Otros</th>
                               	<th align="center">Programas Contables</th>
                                <th align="center">Desarrolladores Informáticos</th>
                                <th align="center">Diseñadores Gráficos</th>
                                <th align="center">Velocidad Digitación</th>
                                <th align="center" colspan="3">Acciones</th>
                             </tr>
                        ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["tformacionremp_id"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["formacion_descripcion"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["tnivel_descripcion"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["tniveledu_descripcion"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["avalizado_nombre"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["tcinformaticos_descripcion"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["conocimientosminimos_nombre"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["otros"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["pcontable"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["dinformatico"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["dgrafico"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["tdigitacion_descripcion"] .'</td>';
									
					$retval .= 	'<td align="center"><div class="vtip" title="ACTUALIZAR FORMACIÓN REQUERIDA<br> [ codigo = '.$rst["tformacionremp_id"] .' ]">';
                    $retval .=  '<a href="'.TFORMACIONREMP_URL.'tformacionremp.php?btnActualizar=Actualizar&strCodigo='. $rst["tformacionremp_id"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="ELIMINAR FORMACIÓN REQUERIDA <br> [codigo = '.$rst["tformacionremp_id"] .' ]">';
                    $retval .=  '<a href="'.TFORMACIONREMP_URL.'tformacionremp.php?btnEliminar=Eliminar&strCodigo='. $rst["tformacionremp_id"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="DETALLE FORMACIÓN REQUERIDA <br> [ codigo = '.$rst["tformacionremp_id"] .' ]">';
                    $retval .=  '<a href="'.TFORMACIONREMP_URL.'tformacionremp.php?btnDetalle=Detalle&strCodigo='. $rst["tformacionremp_id"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                    $i = 1 - $i;
                endforeach;
            }

            $paginacion->setStrNombrePagina("tformacionremp/thorariocutformacionremp.php");
            $retval .= '<tr><td colspan="12" align="center">'. $paginacion->getStrPaginacion() .'</td></tr>';
            $retval .= '</table>';
            $retval .= '</fieldset>';
            return $retval; 
        }

public function getStrDetallePersona()
        {
        	$query = new clQuery();
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbdetalletformacionremp('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                           FORMACIÓN REQUERIDA<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO FORMACIÓN REQUERIDA<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Detalle Formación
                        </legend>
                       ';

            if( count($resultado) > 0 )
            {
                $i = 0;
				$valor=$this->getStrCodigo();
			 	$v=$this->getStrBuscarempform($valor);
                foreach( $resultado as $rst):
                    $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                    $retval .= '<tr>
                                    <td colspan="2" align="center">
                                        <a href="'. TFORMACIONREMP_URL .'tformacionremp.php?btnNuevo=Nuevo&strCodigo='.$v.'">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> Regresar Listado Formación|</a>
                                    <td>
                                </tr>
                                ';
                    
                    $retval .= '<tr class="tablatitulo">
                                    <th colspan="2">DETALLE&nbsp; FORMACIÓN REQUERIDA</th>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">ID:</th>
                                    <td align="left">  '. $rst["tformacionremp_id"] .'</td>
                                </tr>
                                ';
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">FORMACIÓN NECESARIA:</th>
                                    <td align="left">  '. $rst["formacion_descripcion"] .'</td>
                                </tr>
                                ';    	           				 					 					
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">NIVEL:</th>
                                    <td align="left">  '. $rst["tnivel_descripcion"] .'</td>
                                </tr>
                                ';   	
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">ÁREA:</th>
                                    <td align="left">  '. $rst["tniveledu_descripcion"] .'</td>
                                </tr>
                                ';   
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">CONOCIMIENTOS INFORMÁTICOS:</th>
                                    <td align="left">  '. $rst["avalizado_nombre"] .'</td>
                                </tr>
                                '; 
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">DESCRIPCIÓN:</th>
                                    <td align="left">  '. $rst["tcinformaticos_descripcion"] .'</td>
                                </tr>
                                ';     	
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">CONOCIMIENTOS MÍNIMOS:</th>
                                    <td align="left">  '. $rst["conocimientosminimos_nombre"] .'</td>
                                </tr>
                                ';  
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">OTROS:</th>
                                    <td align="left">  '. $rst["otros"] .'</td>
                                </tr>
                                '; 		
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">PROGRAMAS CONTABLES:</th>
                                    <td align="left">  '. $rst["pcontable"] .'</td>
                                </tr>
                                '; 	
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">DESARROLLADORES INFORMÁTICOS:</th>
                                    <td align="left">  '. $rst["dinformatico"] .'</td>
                                </tr>
                                '; 		
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">DISEÑADORES GRÁFICOS:</th>
                                    <td align="left">  '. $rst["dgrafico"] .'</td>
                                </tr>
                                '; 		
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">VELOCIDAD DIGITACIÓN:</th>
                                    <td align="left">  '. $rst["tdigitacion_descripcion"] .'</td>
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