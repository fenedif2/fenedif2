<?php	
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.validaciones.php' );
    include_once( CLASS_PATH . "class.clquery.php" );
    include_once( CLASS_PATH . "class.clpaginacion.php" ); 
	include_once( CLASS_PATH . "class.cltfinanciamiento.php" );
	include_once( CLASS_PATH . "class.claccesibilidad.php" );
	include_once( CLASS_PATH . "class.clexperiencia.php" );
	include_once( CLASS_PATH . "class.clcondicionesa.php" );
	include_once( CLASS_PATH . "class.cltemperatura.php" );
	include_once( CLASS_PATH . "class.clpesos.php" );
	include_once( CLASS_PATH . "class.clposicion.php" );
	include_once( CLASS_PATH . "class.cltrabajo.php" );
	
	include_once( CLASS_PATH . "class.cltipopuesto.php" ); 
	include_once( CLASS_PATH . "class.cltporcentaje.php" ); 
	include_once( CLASS_PATH . "class.clcategoriac.php" ); 
	include_once( CLASS_PATH . "class.cltipocargo.php" ); 
	
    class cldfunciones
    {
        private $strCodigo;
        private $strDescripcionf;
		private $strSueldo;
		private $strBeneficios;
		private $strAccesibilidad;
		private $strAvisual;
		private $strObservacionav;
		private $strCauditiva;
		private $strObservacionca;
		private $strCverbal;
		private $strObservacioncv;
		private $strExpresiono;
		private $strObservacioneo;
		private $strAfinidadm;
		private $strObservacionam;
		private $strDesplasamiento;
		private $strObservacionde;
		private $strAccesot;
		private $strObservacionat;
		private $strManejod;
		private $strObservacionmd;
		private $strCondicionesam;
		private $strObservacioncam;
		private $strTemperatura;
		private $strRuido;
		private $strHumedad;
		private $strAirea;
		private $strVibraciones;
		private $strIluminacion;
		private $strObservaciones;
		private $strIndependencia;
		private $strCadaptacion;
		private $strAprendizaje;
		private $strHabilidades;
		private $strTolerancia;
		private $strObservacionescomp;
		private $strCpesos;
		private $strPesos;
		private $strRealizare;
		private $strManipulacion;
		private $strMaquinaria;
		private $strMovilidad;
		private $strPosicion;
		private $strTrabajo;
		private $strAtension;
		private $strExpresion;
		private $strTension;
		private $strTrabajocond;
		private $strSeguridad;
		private $strObservaciontrab;
		
		private $strEtiqueta;
        private $strNombreBoton;
        private $strValorBoton;
		private $strNombreBotona;
        private $strValorBotona;
        private $strLectura;
		
		
        public function __construct()
        {
				
            $this->strCodigo = "";	
			$this->strNombre = "";
			$this->strDescripcionf = "";
			$this->strSueldo = "";
			$this->strBeneficios = "";
			$this->strAccesibilidad = "";
			$this->strAvisual = "";
			$this->strObservacionav = "";
			$this->strCauditiva = "";
			$this->strObservacionca = "";
			$this->strCverbal = "";
			$this->strObservacioncv = "";
			$this->strExpresiono = "";
			$this->strObservacioneo = "";
			$this->strAfinidadm = "";
			$this->strObservacionam = "";
			$this->strDesplasamiento = "";
			$this->strObservacionde = "";
			$this->strAccesot = "";
			$this->strObservacionat = "";
			$this->strManejod = "";
			$this->strObservacionmd = "";
			$this->strCondicionesam= "";
			$this->strObservacioncam = "";
			$this->strTemperatura = "";
			$this->strRuido = "";
			$this->strHumedad = "";
			$this->strAirea = "";
			$this->strVibraciones = "";
			$this->strIluminacion = "";
			$this->strObservaciones = "";
			$this->strIndependencia = "";
			$this->strCadaptacion = "";
			$this->strAprendizaje = "";
			$this->strHabilidades = "";
			$this->strTolerancia = "";
			$this->strObservacionescomp = "";
			$this->strCpesos = "";
			$this->strPesos = "";
			$this->strRealizare = "";
			$this->strManipulacion = "";
			$this->strMaquinaria = "";
			$this->strMovilidad = "";
			$this->strPosicion = "";
			$this->strTrabajo = "";
			$this->strAtension = "";
			$this->strExpresion = "";
			$this->strTension = "";
			$this->strTrabajocond = "";
			$this->strSeguridad = "";
			$this->strObservaciontrab = "";
			
			$this->strEtiqueta = "";
            $this->strNombreBoton = "";
            $this->strValorBoton = "";
			$this->strNombreBotona = "";
            $this->strValorBotona = "";
            $this->strLectura = "";
			
        }
//////////////////// codigo //////////////////
        public function getStrCodigo()
        {
            return $this->strCodigo;
        }
		public function setStrCodigo($n)
        {
            $this->strCodigo = $n;
        }
                
////////////////////////////////Descripcionf //////////////////////////////////////////////////////////////////////
		public function getstrDescripcionf()
	        {
	            return $this->strDescripcionf;
	        }

        public function setstrDescripcionf($exp)
	        {
	            $this->strDescripcionf = $exp;
	        }
//////////// Sueldo////////////////////////////////////////// 
		public function getstrSueldo()
        {
            return $this->strSueldo;
        }
  		public function setstrSueldo($ct)
        {
            $this->strSueldo = $ct;
        }    
//////////// Beneficios////////////////////////////////////////// 
		public function getstrBeneficios()
        {
            return $this->strBeneficios;
        }
  		public function setstrBeneficios($ct)
        {
            $this->strBeneficios = $ct;
        } 		 		
//////////// Accesibilidad////////////////////////////////////////// 
		public function getstrAccesibilidad()
        {
            return $this->strAccesibilidad;
        }
  		public function setstrAccesibilidad($ct)
        {
            $this->strAccesibilidad = $ct;
        } 		 		
//////////// Avisual////////////////////////////////////////// 
		public function getstrAvisual()
        {
            return $this->strAvisual;
        }
  		public function setstrAvisual($ct)
        {
            $this->strAvisual = $ct;
        } 		 		
//////////// Observacionav////////////////////////////////////////// 
		public function getstrObservacionav()
        {
            return $this->strObservacionav;
        }
  		public function setstrObservacionav($ct)
        {
            $this->strObservacionav = $ct;
        } 
//////////// Cauditiva////////////////////////////////////////// 
		public function getstrCauditiva()
        {
            return $this->strCauditiva;
        }
  		public function setstrCauditiva($ct)
        {
            $this->strCauditiva = $ct;
        }	
//////////// Observacionca////////////////////////////////////////// 
		public function getstrObservacionca()
        {
            return $this->strObservacionca;
        }
  		public function setstrObservacionca($ct)
        {
            $this->strObservacionca = $ct;
        }
//////////// Cverbal////////////////////////////////////////// 
		public function getstrCverbal()
        {
            return $this->strCverbal;
        }
  		public function setstrCverbal($ct)
        {
            $this->strCverbal = $ct;
        }	
//////////// Observacioncv////////////////////////////////////////// 
		public function getstrObservacioncv()
        {
            return $this->strObservacioncv;
        }
  		public function setstrObservacioncv($ct)
        {
            $this->strObservacioncv = $ct;
        }	
//////////// Expresiono////////////////////////////////////////// 
		public function getstrExpresiono()
        {
            return $this->strExpresiono;
        }
  		public function setstrExpresiono($ct)
        {
            $this->strExpresiono = $ct;
        }	
//////////// Observacioneo////////////////////////////////////////// 
		public function getstrObservacioneo()
        {
            return $this->strObservacioneo;
        }
  		public function setstrObservacioneo($ct)
        {
            $this->strObservacioneo = $ct;
        }
//////////// Observacionam////////////////////////////////////////// 
		public function getstrObservacionam()
        {
            return $this->strObservacionam;
        }
  		public function setstrObservacionam($ct)
        {
            $this->strObservacionam = $ct;
        }		
//////////// Afinidadm////////////////////////////////////////// 
		public function getstrAfinidadm()
        {
            return $this->strAfinidadm;
        }
  		public function setstrAfinidadm($ct)
        {
            $this->strAfinidadm = $ct;
        }																
 ///////////////////////////////Desplasamiento/////////////////////////////////////////////
 	public function getstrDesplasamiento()
        {
            return $this->strDesplasamiento;
        }
  		public function setstrDesplasamiento($ct)
        {
            $this->strDesplasamiento = $ct;
        }
/////////// Observacionde////////////////////////////////////////// 
		public function getstrObservacionde()
        {
            return $this->strObservacionde;
        }
  		public function setstrObservacionde($ct)
        {
            $this->strObservacionde = $ct;
        }	
 ///////////////////////////////Accesot/////////////////////////////////////////////
 	public function getstrAccesot()
        {
            return $this->strAccesot;
        }
  		public function setstrAccesot($ct)
        {
            $this->strAccesot = $ct;
        }	
/////////// Observacionat////////////////////////////////////////// 
		public function getstrObservacionat()
        {
            return $this->strObservacionat;
        }
  		public function setstrObservacionat($ct)
        {
            $this->strObservacionat = $ct;
        }	
///////////////////////////////Manejod/////////////////////////////////////////////
 	public function getstrManejod()
        {
            return $this->strManejod;
        }
  		public function setstrManejod($ct)
        {
            $this->strManejod = $ct;
        }	
/////////// Observacionmd////////////////////////////////////////// 
		public function getstrObservacionmd()
        {
            return $this->strObservacionmd;
        }
  		public function setstrObservacionmd($ct)
        {
            $this->strObservacionmd = $ct;
        }		
//////////////////////////////Condicionesam/////////////////////////////////////////////
 	public function getstrCondicionesam()
        {
            return $this->strCondicionesam;
        }
  		public function setstrCondicionesam($ct)
        {
            $this->strCondicionesam = $ct;
        }	
/////////// Observacioncam////////////////////////////////////////// 
		public function getstrObservacioncam()
        {
            return $this->strObservacioncam;
        }
  		public function setstrObservacioncam($ct)
        {
            $this->strObservacioncam = $ct;
        }
/////////// Temperatura////////////////////////////////////////// 
		public function getstrTemperatura()
        {
            return $this->strTemperatura;
        }
  		public function setstrTemperatura($ct)
        {
            $this->strTemperatura = $ct;
        }
/////////// Ruido////////////////////////////////////////// 
		public function getstrRuido()
        {
            return $this->strRuido;
        }
  		public function setstrRuido($ct)
        {
            $this->strRuido= $ct;
        }
/////////// Humedad////////////////////////////////////////// 
		public function getstrHumedad()
        {
            return $this->strHumedad;
        }
  		public function setstrHumedad($ct)
        {
            $this->strHumedad= $ct;
        }
/////////// Airea////////////////////////////////////////// 
		public function getstrAirea()
        {
            return $this->strAirea;
        }
  		public function setstrAirea($ct)
        {
            $this->strAirea= $ct;
        }	
/////////// Vibraciones////////////////////////////////////////// 
		public function getstrVibraciones()
        {
            return $this->strVibraciones;
        }
  		public function setstrVibraciones($ct)
        {
            $this->strVibraciones= $ct;
        }	
///////////Iluminacion////////////////////////////////////////// 
		public function getstrIluminacion()
        {
            return $this->strIluminacion;
        }
  		public function setstrIluminacion($ct)
        {
            $this->strIluminacion= $ct;
        }		
/////////// Observaciones////////////////////////////////////////// 
		public function getstrObservaciones()
        {
            return $this->strObservaciones;
        }
  		public function setstrObservaciones($ct)
        {
            $this->strObservaciones = $ct;
        }	
/////////// Independencia////////////////////////////////////////// 
		public function getstrIndependencia()
        {
            return $this->strIndependencia;
        }
  		public function setstrIndependencia($ct)
        {
            $this->strIndependencia = $ct;
        }
/////////// Cadaptacion////////////////////////////////////////// 
		public function getstrCadaptacion()
        {
            return $this->strCadaptacion;
        }
  		public function setstrCadaptacion($ct)
        {
            $this->strCadaptacion= $ct;
        }	
/////////// Aprendizaje////////////////////////////////////////// 
		public function getstrAprendizaje()
        {
            return $this->strAprendizaje;
        }
  		public function setstrAprendizaje($ct)
        {
            $this->strAprendizaje= $ct;
        }	
/////////// Habilidades////////////////////////////////////////// 
		public function getstrHabilidades()
        {
            return $this->strHabilidades;
        }
  		public function setstrHabilidades($ct)
        {
            $this->strHabilidades= $ct;
        }	
/////////// Tolerancia////////////////////////////////////////// 
		public function getstrTolerancia()
        {
            return $this->strTolerancia;
        }
  		public function setstrTolerancia($ct)
        {
            $this->strTolerancia= $ct;
        }	
/////////// Observacionescomp////////////////////////////////////////// 
		public function getstrObservacionescomp()
        {
            return $this->strObservacionescomp;
        }
  		public function setstrObservacionescomp($ct)
        {
            $this->strObservacionescomp= $ct;
        }	
/////////// Cpesos////////////////////////////////////////// 
		public function getstrCpesos()
        {
            return $this->strCpesos;
        }
  		public function setstrCpesos($ct)
        {
            $this->strCpesos= $ct;
        }	
/////////// Pesos////////////////////////////////////////// 
		public function getstrPesos()
        {
            return $this->strPesos;
        }
  		public function setstrPesos($ct)
        {
            $this->strPesos= $ct;
        }	
/////////// Realizare////////////////////////////////////////// 
		public function getstrRealizare()
        {
            return $this->strRealizare;
        }
  		public function setstrRealizare($ct)
        {
            $this->strRealizare= $ct;
        }
/////////// Manipulacion////////////////////////////////////////// 
		public function getstrManipulacion()
        {
            return $this->strManipulacion;
        }
  		public function setstrManipulacion($ct)
        {
            $this->strManipulacion= $ct;
        }
/////////// Maquinaria////////////////////////////////////////// 
		public function getstrMaquinaria()
        {
            return $this->strMaquinaria;
        }
  		public function setstrMaquinaria($ct)
        {
            $this->strMaquinaria= $ct;
        }
/////////// Movilidad////////////////////////////////////////// 
		public function getstrMovilidad()
        {
            return $this->strMovilidad;
        }
  		public function setstrMovilidad($ct)
        {
            $this->strMovilidad= $ct;
        }	
/////////// Posicion////////////////////////////////////////// 
		public function getstrPosicion()
        {
            return $this->strPosicion;
        }
  		public function setstrPosicion($ct)
        {
            $this->strPosicion= $ct;
        }
/////////// Trabajo////////////////////////////////////////// 
		public function getstrTrabajo()
        {
            return $this->strTrabajo;
        }
  		public function setstrTrabajo($ct)
        {
            $this->strTrabajo= $ct;
        }	
/////////// Atension////////////////////////////////////////// 
		public function getstrAtension()
        {
            return $this->strAtension;
        }
  		public function setstrAtension($ct)
        {
            $this->strAtension= $ct;
        }	
/////////// Expresion////////////////////////////////////////// 
		public function getstrExpresion()
        {
            return $this->strExpresion;
        }
  		public function setstrExpresion($ct)
        {
            $this->strExpresion= $ct;
        }	
/////////// Tension////////////////////////////////////////// 
		public function getstrTension()
        {
            return $this->strTension;
        }
  		public function setstrTension($ct)
        {
            $this->strTension= $ct;
        }
/////////// Trabajocond////////////////////////////////////////// 
		public function getstrTrabajocond()
        {
            return $this->strTrabajocond;
        }
  		public function setstrTrabajocond($ct)
        {
            $this->strTrabajocond= $ct;
        }	
/////////// Seguridad////////////////////////////////////////// 
		public function getstrSeguridad()
        {
            return $this->strSeguridad;
        }
  		public function setstrSeguridad($ct)
        {
            $this->strSeguridad= $ct;
        }	
/////////// Observaciontrab////////////////////////////////////////// 
		public function getstrObservaciontrab()
        {
            return $this->strObservaciontrab;
        }
  		public function setstrObservaciontrab($ct)
        {
            $this->strObservaciontrab= $ct;
        }																																																								
/////////////////////////////////////////////////////////////////////////////////////////////		
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
                    
		$tipopuesto=new clTipopuesto();
		$nvacantes=new clTporcentaje();	
		$categoriac=new clCategoriac();	
		$tipocargo=new clTipocargo();	
		
		$sueldo=new clTfinanciamiento();
		$accesibilidad=new clAccesibilidad();
		$avisual=new clExperiencia();
		$cauditiva=new clExperiencia();
		$cverbal=new clExperiencia();
		$expresiono=new clExperiencia();
		$afinidadm=new clExperiencia();
		$desplasamiento=new clExperiencia();
		$accesot=new clExperiencia();
		$manejod=new clExperiencia();
		$condicionesam=new clExperiencia();
		$observacioncam=new clCondicionesa();
		$temperatura=new clTemperatura();
		$ruido=new clExperiencia();
		$humedad=new clExperiencia();
		$airea=new clExperiencia();
		$vibraciones=new clExperiencia();
		$iluminacion=new clExperiencia();
		$independencia=new clExperiencia();
		$cadaptacion=new clExperiencia();
		$aprendizaje=new clExperiencia();
		$habilidades=new clExperiencia();
		$tolerancia=new clExperiencia();
		$cpesos=new clExperiencia();
		$pesos=new clPesos();
		$realizare=new clExperiencia();
		$manipulacion=new clExperiencia();
		$maquinaria=new clExperiencia();
		$movilidad=new clExperiencia();
		$posicion=new clPosicion();
		$trabajo=new clExperiencia();
		$atencion=new clExperiencia();
		$expresion=new clExperiencia();
		$tension=new clExperiencia();
		$trabajocond=new clTrabajo();
		$seguridad=new clExperiencia();
          $retval  = '<script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.validate.js"></script>
                        <script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.metadata.js"></script>
                       ';

            $retval .= '<br><br><br><br>
                        <script>
                            $(document).ready(function(){
                                    $.metadata.setType( \'attr\', \'validate\' );
                                    $(\'#frmdfunciones\').validate({
                                            rules:{
                                               strNombre: { required: true},
                                               strPtecnico: { required: true }
											    
                                            	
												strPtecnicod: { required: true }
                                                  },
                                            messages:{
                                              	strNombre: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                              	strPtecnico: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"}
												     }
                                    });
     		
							 $("#lsCondicionesam").change(function() 
	                 				{
								  		if($(this).val() == "2") 
										  	{
											 	$("#lsObservacioncam").attr("disabled", "disabled");
												$("#lsObservacioncam").css("background-color", "#F5DA81"); 	
												
											}
											else 
											{
												$("#lsObservacioncam").removeAttr("disabled");
												$("#lsObservacioncam").css("background-color", "#FFFFFF");
												
											}
										});	
									 });
                        </script>
                       ';
		  
            $retval .= '<form id="frmdfunciones" action="'.DFUNCIONES_URL.'dfunciones.php" method="POST">';

            $Regresar = "regresar('".DFUNCIONES_URL. "dfunciones.php')";

            $retval .= '<fieldset class="fieldsetPequeno">';
            $retval .= '<legend class="etiquetaborde">
                            SEGUIMIENTO<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO SEGUIMIENTO<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> '. $this->getStrEtiqueta() .'
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
                               	<td align="right"><b>Descripción:&nbsp;</b></td>
	                             	<td align="left">
                                    <input class="textbox" id="strDescripcionf" name="strDescripcionf" type="text"   value="'. $this->getstrDescripcionf().'" />
                                </td>
                               	<td  align="right"><b>Sueldo:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsSueldo" id="lsSueldo" class="combobox">
                                        '.$sueldo->getStrListar($this->getstrSueldo()) .'
                                    </select>                                    
                            	</td>
                            </tr>
                            <tr class="formulariofila1">
                               	<td align="right"><b>Beneficios:&nbsp;</b></td>
	                             	<td align="left">
                                    <input class="textbox" id="strBeneficios" name="strBeneficios" type="text"   value="'. $this->getstrBeneficios().'" />
                                </td>
                               
                            </tr>
                 <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">CAPACIDADES</td>
                            </tr>            
                 			<tr class="formulariofila1">
                               	<td  align="right"><b>Accesibilidad para el cargo:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsAccesibilidad" id="lsAccesibilidad" class="combobox">
                                        '. $accesibilidad->getStrListar($this->getstrAccesibilidad()) .'
                                    </select>                                    
                            	</td>
                                
                            </tr>         					
							<tr class="formulariofila1">
								<td  align="right"><b>Agudeza Visual:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsAvisual" id="lsAvisual" class="combobox">
                                        '. $avisual->getStrListar($this->getstrAvisual()) .'
                                    </select>                                    
                            	</td>
                               		<td align="right"><b>Observaciones:&nbsp;</b></td>
	                             	<td align="left">
                                    <input class="textbox" id="strObservacionav" name="strObservacionav" type="text"   value="'. $this->getstrObservacionav().'" />
                                </td>
                           
                            </tr>    
							<tr class="formulariofila1">
								<td  align="right"><b>Capacidad Auditiva:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsCauditiva" id="lsCauditiva" class="combobox">
                                        '. $cauditiva->getStrListar($this->getstrCauditiva()) .'
                                    </select>                                    
                            	</td>
                               	</td>
                               	<td align="right"><b>Observaciones:&nbsp;</b></td>
	                             	<td align="left">
                                    <input class="textbox" id="strObservacionca" name="strObservacionca" type="text"   value="'. $this->getstrObservacionca().'" />
                                </td>                                
 		                    </tr>    
			                <tr class="formulariofila1">  	
                            	<td  align="right"><b>Comprensión Verbal:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsCverbal" id="lsCverbal" class="combobox">
                                        '. $cverbal->getStrListar($this->getstrCverbal()) .'
                                    </select>                                    
                            	</td>
                                <td align="right"><b>Observaciones:&nbsp;</b></td>
	                             	<td align="left">
                                    <input class="textbox" id="strObservacioncv" name="strObservacioncv" type="text"   value="'. $this->getstrObservacioncv().'" />
                                </td> 
                             </tr>    
                             <tr class="formulariofila1">  	
                            	<td  align="right"><b>Expresión Oral:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsExpresiono" id="lsExpresiono" class="combobox">
                                        '. $expresiono->getStrListar($this->getstrExpresiono()) .'
                                    </select>                                    
                            	</td>
                                <td align="right"><b>Observaciones:&nbsp;</b></td>
	                             	<td align="left">
                                    <input class="textbox" id="strObservacioneo" name="strObservacioneo" type="text"   value="'. $this->getstrObservacioneo().'" />
                                </td> 
                             </tr>   
                     
							<tr class="formulariofila1">  	
                            	<td  align="right"><b>Afinidad Manual:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsAfinidadm" id="lsAfinidadm" class="combobox">
                                        '. $afinidadm->getStrListar($this->getstrAfinidadm()) .'
                                    </select>                                    
                            	</td>
                                 <td align="right"><b>Observaciones:&nbsp;</b></td>
	                             	<td align="left">
                                    <input class="textbox" id="strObservacionam" name="strObservacionam" type="text"   value="'. $this->getstrObservacionam().'" />
                                </td> 
                             </tr>   
                 			<tr>
                 			<tr class="formulariofila1">  	
                            	<td  align="right"><b>Desplazamiento:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsDesplasamiento" id="lsDesplasamiento" class="combobox">
                                        '. $desplasamiento->getStrListar($this->getstrDesplasamiento()) .'
                                    </select>                                    
                            	</td>
                                 <td align="right"><b>Observaciones:&nbsp;</b></td>
	                             	<td align="left">
                                    <input class="textbox" id="strObservacionde" name="strObservacionde" type="text"   value="'. $this->getstrObservacionde().'" />
                                </td> 
                             </tr>  
                            <tr class="formulariofila1">  	
                            	<td  align="right"><b>Accceso a Transporte:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsAcccesot" id="lsAcccesot" class="combobox">
                                        '. $accesot->getStrListar($this->getstrAccesot()) .'
                                    </select>                                    
                            	</td>
                                 <td align="right"><b>Observaciones:&nbsp;</b></td>
	                             	<td align="left">
                                    <input class="textbox" id="strObservacionat" name="strObservacionat" type="text"   value="'. $this->getstrObservacionat().'" />
                                </td> 
                             </tr> 
                             <tr class="formulariofila1">  	
                            	<td  align="right"><b>Manejo de Dinero:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsManejod" id="lsManejod" class="combobox">
                                        '. $manejod->getStrListar($this->getstrManejod()) .'
                                    </select>                                    
                            	</td>
                                 <td align="right"><b>Observaciones:&nbsp;</b></td>
	                             	<td align="left">
                                    <input class="textbox" id="strObservacionmd" name="strObservacionmd" type="text"   value="'. $this->getstrObservacionmd().'" />
                                </td> 
                             </tr>   
                             <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">FACTORES AMBIENTALES</td>
                            </tr>   
                            <tr class="formulariofila1">  	
                            	<td  align="right"><b>Condiciones Ambientales Tóxicas:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsCondicionesam" id="lsCondicionesam" class="combobox">
                                        '. $condicionesam->getStrListar($this->getstrCondicionesam()) .'
                                    </select>                                    
                            	</td>
                            	<td  align="right"><b>Tóxicos:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsObservacioncam" id="lsObservacioncam" class="combobox">
                                        '. $observacioncam->getStrListar($this->getstrObservacioncam()) .'
                                    </select>                                    
                            	</td>
                                
                             </tr>   
                            <tr class="formulariofila1">  	
                            	<td  align="right"><b>Temperatura:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsTemperatura" id="lsTemperatura" class="combobox">
                                        '. $temperatura->getStrListar($this->getstrTemperatura()) .'
                                    </select>                                    
                            	</td>
                            	<td  align="right"><b>Ruido:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsRuido" id="lsRuido" class="combobox">
                                        '. $ruido->getStrListar($this->getstrRuido()) .'
                                    </select>                                    
                            	</td>
  	                       </tr>   
                           <tr class="formulariofila1">  	
                            	<td  align="right"><b>Humedad:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsHumedad" id="lsHumedad" class="combobox">
                                        '. $humedad->getStrListar($this->getstrHumedad()) .'
                                    </select>                                    
                            	</td>
                            	<td  align="right"><b>Aire Acondicionado:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsAirea" id="lsAirea" class="combobox">
                                        '. $airea->getStrListar($this->getstrAirea()) .'
                                    </select>                                    
                            	</td>
  	                       </tr>   
  	                      <tr class="formulariofila1">  	
                            	<td  align="right"><b>Vibraciones:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsVibraciones" id="lsVibraciones" class="combobox">
                                        '. $vibraciones->getStrListar($this->getstrVibraciones()) .'
                                    </select>                                    
                            	</td>
                            	<td  align="right"><b>Iluminación:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsIluminacion" id="lsIluminacion" class="combobox">
                                        '. $iluminacion->getStrListar($this->getstrIluminacion()) .'
                                    </select>                                    
                            	</td>
  	                       </tr>
  	                      <tr class="formulariofila1">
                               	<td align="right"><b>Observaciones:&nbsp;</b></td>
	                             	<td align="left">
                                    <input class="textbox" id="strObservaciones" name="strObservaciones" type="text"   value="'. $this->getstrObservaciones().'" />
                                </td>
                               	
                            </tr>  
                           <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">CONDICIONES</td>
                            </tr>  
                            <tr class="formulariofila1">  	
                            	<td  align="right"><b>Independencia:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsIndependencia" id="lsIndependencia" class="combobox">
                                        '. $independencia->getStrListar($this->getstrIndependencia()) .'
                                    </select>                                    
                            	</td>
                            	<td  align="right"><b>Capacidad de Adaptación:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsCadaptacion" id="lsCadaptacion" class="combobox">
                                        '. $cadaptacion->getStrListar($this->getstrCadaptacion()) .'
                                    </select>                                    
                            	</td>
  	                       </tr>  
  	                       <tr class="formulariofila1">  	
                            	<td  align="right"><b>Capacidad de Aprendizaje:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsAprendizaje" id="lsAprendizaje" class="combobox">
                                        '. $aprendizaje->getStrListar($this->getstrAprendizaje()) .'
                                    </select>                                    
                            	</td>
                            	<td  align="right"><b>Habilidades Sociales:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsHabilidades" id="lsHabilidades" class="combobox">
                                        '. $habilidades->getStrListar($this->getstrHabilidades()) .'
                                    </select>                                    
                            	</td>
  	                       </tr> 
  	                       <tr class="formulariofila1">  	
                            	<td  align="right"><b>Tolerancia al Estrés:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsTolerancia" id="lsTolerancia" class="combobox">
                                        '. $tolerancia->getStrListar($this->getstrTolerancia()) .'
                                    </select>                                    
                            	</td>
                            	<td align="right"><b>Observaciones:&nbsp;</b></td>
	                             	<td align="left">
                                    <input class="textbox" id="strObservacionescomp" name="strObservacionescomp" type="text"   value="'. $this->getstrObservacionescomp().'" />
                                </td>
  	                       </tr>  
  	                        <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">CONDICIONES DE TRABAJO</td>
                            </tr>     
                            <tr class="formulariofila1">  	
                            	<td  align="right"><b>Coger Pesos:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsCpesos" id="lsCpesos" class="combobox">
                                        '. $cpesos->getStrListar($this->getstrCpesos()) .'
                                    </select>                                    
                            	</td>
                            	<td  align="right"><b>Pesos:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsPesos" id="lsPesos" class="combobox">
                                        '. $pesos->getStrListar($this->getstrPesos()) .'
                                    </select>                                    
                            	</td>
  	                       </tr>   
  	                       <tr class="formulariofila1">  	
                            	<td  align="right"><b>Realizar Esfuerzo:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsRealizare" id="lsRealizare" class="combobox">
                                        '. $realizare->getStrListar($this->getstrRealizare()) .'
                                    </select>                                    
                            	</td>
                            	<td  align="right"><b>Manipilación de Objetos:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsManipulacion" id="lsManipulacion" class="combobox">
                                        '. $manipulacion->getStrListar($this->getstrManipulacion()) .'
                                    </select>                                    
                            	</td>
  	                       </tr>  
  	                       <tr class="formulariofila1">  	
                            	<td  align="right"><b>Utilización de Maquinaria:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsMaquinaria" id="lsMaquinaria" class="combobox">
                                        '. $maquinaria->getStrListar($this->getstrMaquinaria()) .'
                                    </select>                                    
                            	</td>
                            	<td  align="right"><b>Movilidad:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsMovilidad" id="lsMovilidad" class="combobox">
                                        '. $movilidad->getStrListar($this->getstrMovilidad()) .'
                                    </select>                                    
                            	</td>
  	                       </tr>  





  	                       <tr class="formulariofila1">  	
                            	<td  align="right"><b>Postura/Posición:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsPosicion" id="lsPosicion" class="combobox">
                                        '. $posicion->getStrListar($this->getstrPosicion()) .'
                                    </select>                                    
                            	</td>
                            	<td  align="right"><b>Trabajo en Alturas:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsTrabajo" id="lsTrabajo" class="combobox">
                                        '. $trabajo->getStrListar($this->getstrTrabajo()) .'
                                    </select>                                    
                            	</td>
  	                       </tr> 
  	                      <tr class="formulariofila1">  	
                            	<td  align="right"><b>Atención/Concentración:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsAtension" id="lsAtension" class="combobox">
                                        '. $atencion->getStrListar($this->getstrAtension()) .'
                                    </select>                                    
                            	</td>
                            	<td  align="right"><b>Expresión Oral Continua:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsExpresion" id="lsExpresion" class="combobox">
                                        '. $expresion->getStrListar($this->getstrExpresion()) .'
                                    </select>                                    
                            	</td>
  	                       </tr> 
  	                       <tr class="formulariofila1">  	
                            	<td  align="right"><b>Tensión/Estrés:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsTension" id="lsTension" class="combobox">
                                        '. $tension->getStrListar($this->getstrTension()) .'
                                    </select>                                    
                            	</td>
                            	<td  align="right"><b>Trabajo:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsTrabajocond" id="lsTrabajocond" class="combobox">
                                        '. $trabajocond->getStrListar($this->getstrTrabajocond()) .'
                                    </select>                                    
                            	</td>
  	                       </tr> 
  	                       <tr class="formulariofila1">  	
                            	<td  align="right"><b>Seguridad Industrial:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsSeguridad" id="lsSeguridad" class="combobox">
                                        '. $seguridad->getStrListar($this->getstrSeguridad()) .'
                                    </select>                                    
                            	</td>
                            	<td align="right"><b>Observaciones:&nbsp;</b></td>
	                             	<td align="left">
                                    <input class="textbox" id="strObservaciontrab" name="strObservaciontrab" type="text"   value="'. $this->getstrObservaciontrab().'" />
                                </td>
  	                       </tr>                                  
                 			<tr>
                                <td colspan="4" class="formulariofila1" align="center">
                                    <input type="submit" class="boton" name="'. $this->getStrNombreBoton() .'" value="'. $this->getStrValorBoton() .'" />
                                   <input type="submit" class="boton" name="'. $this->getStrNombreBotona() .'" value="'. $this->getStrValorBotona() .'" />
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
            $ProcedimientoAlmacenado = sprintf("CALL spingresardfunciones('%s', '%s', '%s','%s', '%s', '%s', '%s','%s', '%s', '%s',
            '%s', '%s', '%s','%s', '%s', '%s', '%s','%s', '%s', '%s','%s', '%s', '%s','%s', '%s', '%s', '%s','%s', '%s', '%s',
			'%s', '%s', '%s','%s', '%s', '%s', '%s','%s', '%s', '%s','%s', '%s', '%s','%s', '%s', '%s', '%s','%s', '%s', '%s');",
            $this->getstrDescripcionf(),$this->getstrSueldo(),$this->getstrBeneficios(),$this->getstrAccesibilidad(),$this->getstrAvisual(),
            $this->getstrObservacionav(),$this->getstrCauditiva(),$this->getstrObservacionca(),$this->getstrCverbal(),$this->getstrObservacioncv(),
            $this->getstrExpresiono(),$this->getstrObservacioneo(),$this->getstrAfinidadm(),$this->getstrObservacionam(),$this->getstrDesplasamiento(),
            $this->getstrObservacionde(),$this->getstrAccesot(),$this->getstrObservacionat(),$this->getstrManejod(),$this->getstrObservacionmd(),
            $this->getstrCondicionesam(),$this->getstrObservacioncam(),$this->getstrTemperatura(),$this->getstrRuido(),$this->getstrHumedad(),
            $this->getstrAirea(),$this->getstrVibraciones(),$this->getstrIluminacion(),$this->getstrObservaciones(),$this->getstrIndependencia(),
           	$this->getstrCadaptacion(),$this->getstrAprendizaje(),$this->getstrHabilidades(),$this->getstrTolerancia(),$this->getstrObservacionescomp(),
            $this->getstrCpesos(),$this->getstrPesos(),$this->getstrRealizare(),$this->getstrManipulacion(),$this->getstrMaquinaria(),
            $this->getstrMovilidad(),$this->getstrPosicion(),$this->getstrTrabajo(),$this->getstrAtension(),$this->getstrExpresion(),
            $this->getstrTension(),$this->getstrTrabajocond(),$this->getstrSeguridad(),$this->getstrObservaciontrab(),$this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Contacto = [ '.$this->getstrDescripcionf().' ] Observacion= [ '. $this->getstrSueldo().' ] ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'GUARDAR', 'dfunciones', $descripcion);
                $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
                $query->getStrSqlInsertUpdateDelete();
                $resultado = true;
            }

            return $resultado;
        }

	public function getStrActualizar() 
		{
			//Nombre Procedimientos Almacenados

              	$query = new clQuery();
            	$resultado = false; 
	            $ProcedimientoAlmacenado = sprintf("CALL spactualizardfunciones('%s', '%s', '%s','%s', '%s', '%s', '%s','%s', '%s', '%s',
            '%s', '%s', '%s','%s', '%s', '%s', '%s','%s', '%s', '%s','%s', '%s', '%s','%s', '%s', '%s', '%s','%s', '%s', '%s',
			'%s', '%s', '%s','%s', '%s', '%s', '%s','%s', '%s', '%s','%s', '%s', '%s','%s', '%s', '%s', '%s','%s', '%s', '%s');",
            $this->getStrCodigo(),$this->getstrDescripcionf(),$this->getstrSueldo(),$this->getstrBeneficios(),$this->getstrAccesibilidad(),$this->getstrAvisual(),
            $this->getstrObservacionav(),$this->getstrCauditiva(),$this->getstrObservacionca(),$this->getstrCverbal(),$this->getstrObservacioncv(),
            $this->getstrExpresiono(),$this->getstrObservacioneo(),$this->getstrAfinidadm(),$this->getstrObservacionam(),$this->getstrDesplasamiento(),
            $this->getstrObservacionde(),$this->getstrAccesot(),$this->getstrObservacionat(),$this->getstrManejod(),$this->getstrObservacionmd(),
            $this->getstrCondicionesam(),$this->getstrObservacioncam(),$this->getstrTemperatura(),$this->getstrRuido(),$this->getstrHumedad(),
            $this->getstrAirea(),$this->getstrVibraciones(),$this->getstrIluminacion(),$this->getstrObservaciones(),$this->getstrIndependencia(),
           	$this->getstrCadaptacion(),$this->getstrAprendizaje(),$this->getstrHabilidades(),$this->getstrTolerancia(),$this->getstrObservacionescomp(),
            $this->getstrCpesos(),$this->getstrPesos(),$this->getstrRealizare(),$this->getstrManipulacion(),$this->getstrMaquinaria(),
            $this->getstrMovilidad(),$this->getstrPosicion(),$this->getstrTrabajo(),$this->getstrAtension(),$this->getstrExpresion(),
            $this->getstrTension(),$this->getstrTrabajocond(),$this->getstrSeguridad(),$this->getstrObservaciontrab());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Contacto = [ '.$this->getstrDescripcionf().' ] Observacion= [ '. $this->getstrSueldo().' ] ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'ACTUALIZAR', 'dfunciones', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL speliminardfunciones('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlInsertUpdateDelete();

           if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Contacto = [ '.$this->getstrDescripcionf().' ] Observacion= [ '. $this->getstrSueldo().' ] ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'G', 'dfunciones', $descripcion);
                $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
                $query->getStrSqlInsertUpdateDelete();
                $resultado = true;
            }

            return $resultado;
            
        }
public function getStrBuscardfuncemp($v) 
	{
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbidentificadordfuncemp('%d');","$v");
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
 public function getStrBuscar() 
 	{
 		$query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbdfunciones('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
                foreach( $resultado as $rst):   
	        $this->setstrDescripcionf($rst["descripcionf"]);
			$this->setstrSueldo($rst["sueldo_id"]);
			$this->setstrBeneficios($rst["beneficios"]);
			$this->setstrAccesibilidad($rst["accesibiidad_id"]);
			$this->setstrAvisual($rst["avisual_id"]);
			$this->setstrObservacionav($rst["observacionav"]);
			$this->setstrCauditiva($rst["cauditiva_id"]);
			$this->setstrObservacionca($rst["observacionca"]);
			$this->setstrCverbal($rst["cverbal_id"]);
			$this->setstrObservacioncv($rst["observacioncv"]);
			$this->setstrExpresiono($rst["expresiono_id"]);
			$this->setstrObservacioneo($rst["observacioneo"]);
			$this->setstrAfinidadm($rst["afinidadm_id"]);
			$this->setstrObservacionam($rst["observacionam"]);
			$this->setstrDesplasamiento($rst["desplasamiento_id"]);
			$this->setstrObservacionde($rst["observacionde"]); 
			$this->setstrAccesot($rst["accesot_id"]);
			$this->setstrObservacionat($rst["observacionat"]);
			$this->setstrManejod($rst["manejod_id"]);
			$this->setstrObservacionmd($rst["observacionmd"]);
			$this->setstrCondicionesam($rst["condicionesam_id"]);
			$this->setstrObservacioncam($rst["observacioncam_id"]);
			$this->setstrTemperatura($rst["temperatura_id"]);
			$this->setstrRuido($rst["ruido_id"]);
			$this->setstrHumedad($rst["humedad_id"]);
			$this->setstrAirea($rst["airea_id"]);
			$this->setstrVibraciones($rst["vibraciones_id"]);
			$this->setstrIluminacion($rst["iluminacion_id"]);
			$this->setstrObservaciones($rst["observaciones"]);
			$this->setstrIndependencia($rst["independencia_id"]);
			$this->setstrCadaptacion($rst["cadaptacion_id"]);
			$this->setstrAprendizaje($rst["aprendizaje_id"]);
			$this->setstrHabilidades($rst["habilidades_id"]);
			$this->setstrTolerancia($rst["tolerancia_id"]);
			$this->setstrObservacionescomp($rst["observacionescomp"]);
			$this->setstrCpesos($rst["cpesos_id"]);
			$this->setstrPesos($rst["pesos_id"]);
			$this->setstrRealizare($rst["realizare_id"]);
			$this->setstrManipulacion($rst["manipulacion_id"]);
			$this->setstrMaquinaria($rst["maquinaria_id"]);
			$this->setstrMovilidad($rst["movilidad_id"]);
			$this->setstrPosicion($rst["posicion_id"]);
			$this->setstrTrabajo($rst["trabajo_id"]);
			$this->setstrAtension($rst["atension_id"]);
			$this->setstrExpresion($rst["expresion_id"]);
			$this->setstrTension($rst["tension_id"]);
			$this->setstrTrabajocond($rst["trabajocond_id"]);
			$this->setstrSeguridad($rst["seguridad_id"]);
			$this->setstrObservaciontrab($rst["observaciontrab"]);
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
            $ProcedimientoAlmacenado = sprintf("CALL sptotaldfunciones();", $this->getStrCodigo());
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
            $ProcedimientoAlmacenado = sprintf("CALL splistardfunciones('%d','%d','%d');","$re", "$pa","$cf");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            DESCRIPCIÓN DE FUNCIONES<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO DESCRIPCIÓN DE FUNCIONES</legend>
                       ';
            $retval .= '
                        <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                            <tr class="tablatitulo">
                                <th colspan="11">LISTADO DESCRIPCIÓN DE FUNCIONES</th>
                            </tr>
                            <tr class="tablasubtitulo">
                            	<th align="center"></th>  
                               <th align="center">ID Acceso</th>                                                              
                                <th align="center">Descripción</th>
                                <th align="center">Sueldo:</th>
                                <th align="center">Beneficios</th>
                                <th align="center" colspan="3">Acciones</th>
                             </tr>
                        ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["dfunciones_id"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["descripcionf"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["tfinanciamiento_descripcion"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["beneficios"] .'</td>';
					
					$retval .= 	'<td align="center"><div class="vtip" title="Actualizar <br> [ codigo = '.$rst["dfunciones_id"] .' ]">';
                    $retval .=  '<a href="'.DFUNCIONES_URL.'dfunciones.php?btnActualizar=Actualizar&strCodigo='. $rst["dfunciones_id"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Eliminar <br> [codigo = '.$rst["dfunciones_id"] .' ]">';
                    $retval .=  '<a href="'.DFUNCIONES_URL.'dfunciones.php?btnEliminar=Eliminar&strCodigo='. $rst["dfunciones_id"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Detalle Cursos <br> [ codigo = '.$rst["dfunciones_id"] .' ]">';
                    $retval .=  '<a href="'.DFUNCIONES_URL.'dfunciones.php?btnDetalle=Detalle&strCodigo='. $rst["dfunciones_id"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                    $i = 1 - $i;
                endforeach;
            }

            $paginacion->setStrNombrePagina("dfunciones/dfunciones.php");
            $retval .= '<tr><td colspan="12" align="center">'. $paginacion->getStrPaginacion() .'</td></tr>';
            $retval .= '</table>';
            $retval .= '</fieldset>';
            return $retval;
            
            
        }

public function getStrDetallePersona()
        {
        	$query = new clQuery();
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbdetalledfunciones('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                           DESCRIPCIÓN DE FUNCIONES<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO DESCRIPCIÓN DE FUNCIONES<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">DETALLE DESCRIPCIÓN DE FUNCIONES
                        </legend>
                       ';

            if( count($resultado) > 0 )
            {
                $i = 0;
				$valor=$this->getStrCodigo();
			 	$v=$this->getStrBuscardfuncemp($valor);
                foreach( $resultado as $rst):
                    $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                    $retval .= '<tr>
                                    <td colspan="2" align="center">
                                        <a href="'. DFUNCIONES_URL .'dfunciones.php?btnNuevo=Nuevo&strCodigo='.$v.'">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" />REGRESAR DESCRIPCIÓN DE FUNCIONES|</a>
                                    <td>
                                </tr>
                                ';
                    
                    $retval .= '<tr class="tablatitulo">
                                    <th colspan="2">DETALLE&nbsp; DESCCRIPCIÓN DE FUNCIONES ;REGISTRADO</th>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Código:</th>
                                    <td align="left">  '. $rst["dfunciones_id"] .'</td>
                                </tr>
                                ';
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Sueldo:</th>
                                    <td align="left">  '. $rst["tfinanciamiento_descripcion"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Beneficios:</th>
                                    <td align="left">  '. $rst["beneficios"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Accesibilidad para el cargo:</th>
                                    <td align="left">  '. $rst["adaptacion_nombre"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Agudeza Visual:</th>
                                    <td align="left">  '. $rst["avisual"] .'</td>
                                </tr>
                                ';
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Observaciones:</th>
                                    <td align="left">  '. $rst["observacionav"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Capacidad Auditiva:</th>
                                    <td align="left">  '. $rst["cauditiva"] .'</td>
                                </tr>
                                '; 
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Observaciones:</th>
                                    <td align="left">  '. $rst["observacionca"] .'</td>
                                </tr>
                                ';    	           				 					 					
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Comprensión Verbal:</th>
                                    <td align="left">  '. $rst["cverbal"] .'</td>
                                </tr>
                                '; 
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Observaciones:</th>
                                    <td align="left">  '. $rst["observacioncv"] .'</td>
                                </tr>
                                ';  
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Expresión Oral:</th>
                                    <td align="left">  '. $rst["expresiono"] .'</td>
                                </tr>
                                ';  
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Observaciones:</th>
                                    <td align="left">  '. $rst["observacioneo"] .'</td>
                                </tr>
                                ';  			
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Afinidad Manual:</th>
                                    <td align="left">  '. $rst["afinidadm"] .'</td>
                                </tr>
                                ';  
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Observaciones:</th>
                                    <td align="left">  '. $rst["observacionam"] .'</td>
                                </tr>
                                ';
                   $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Desplazamiento:</th>
                                    <td align="left">  '. $rst["desplasamiento"] .'</td>
                                </tr>
                                ';             
                   $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Observaciones:</th>
                                    <td align="left">  '. $rst["observacionde"] .'</td>
                                </tr>
                                ';         
				    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Accceso a Transporte:</th>
                                    <td align="left">  '. $rst["accesot"] .'</td>
                                </tr>
                                ';      	
				 	$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Observaciones:</th>
                                    <td align="left">  '. $rst["observacionat"] .'</td>
                                </tr>
                                ';    
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Manejo de Dinero:</th>
                                    <td align="left">  '. $rst["manejod"] .'</td>
                                </tr>
                                ';     
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Observaciones:</th>
                                    <td align="left">  '. $rst["observacionmd"] .'</td>
                                </tr>
                                ';  
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Condiciones Ambientales Tóxicas:</th>
                                    <td align="left">  '. $rst["condicionesam"] .'</td>
                                </tr>
                                '; 
                     $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Tóxicos:</th>
                                    <td align="left">  '. $rst["tcondicionesa_descripcion"] .'</td>
                                </tr>
                                '; 
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Temperatura:</th>
                                    <td align="left">  '. $rst["temperatura_nombre"] .'</td>
                                </tr>
                                '; 			
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Ruido: </th>
                                    <td align="left">  '. $rst["ruido"] .'</td>
                                </tr>
                                '; 		
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Humedad:</th>
                                    <td align="left">  '. $rst["humedad"] .'</td>
                                </tr>
                                '; 	
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Aire Acondicionado:</th>
                                    <td align="left">  '. $rst["airea"] .'</td>
                                </tr>
                                '; 	  
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Vibraciones:</th>
                                    <td align="left">  '. $rst["vibraciones"] .'</td>
                                </tr>
                                ';  
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Iluminación:</th>
                                    <td align="left">  '. $rst["iluminacion"] .'</td>
                                </tr>
                                ';   
				   $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Independencia:</th>
                                    <td align="left">  '. $rst["independencia"] .'</td>
                                </tr>
                                '; 		
				$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Capacidad de Adaptación:</th>
                                    <td align="left">  '. $rst["cadaptacion"] .'</td>
                                </tr>
                                '; 		
				$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Capacidad de Aprendizaje:</th>
                                    <td align="left">  '. $rst["aprendizaje"] .'</td>
                                </tr>
                                '; 	
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Habilidades Sociales:</th>
                                    <td align="left">  '. $rst["habilidades"] .'</td>
                                </tr>
                                '; 	
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Tolerancia al Estrés:</th>
                                    <td align="left">  '. $rst["tolerancia"] .'</td>
                                </tr>
                                '; 	
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Observaciones:</th>
                                    <td align="left">  '. $rst["observacionescomp"] .'</td>
                                </tr>
                                '; 	
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Coger Pesos:</th>
                                    <td align="left">  '. $rst["cpesos"] .'</td>
                                </tr>
                                '; 
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Pesos:</th>
                                    <td align="left">  '. $rst["cogerpesos_nombre"] .'</td>
                                </tr>
                                '; 
                     $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Realizar Esfuerzo:</th>
                                    <td align="left">  '. $rst["realizare"] .'</td>
                                </tr>
                                ';
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Manipilación de Objetos:</th>
                                    <td align="left">  '. $rst["manipulacion"] .'</td>
                                </tr>
                                ';   
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Utilización de Maquinaria:</th>
                                    <td align="left">  '. $rst["maquinaria"] .'</td>
                                </tr>
                                ';  
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Movilidad:</th>
                                    <td align="left">  '. $rst["movilidad"] .'</td>
                                </tr>
                                '; 	
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Postura/Posición:</th>
                                    <td align="left">  '. $rst["posicion_nombre"] .'</td>
                                </tr>
                                '; 	
                     $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Trabajo en Alturas:</th>
                                    <td align="left">  '. $rst["trabajos"] .'</td>
                                </tr>
                                '; 
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Atención/Concentración:</th>
                                    <td align="left">  '. $rst["atension"] .'</td>
                                </tr>
                                '; 
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Expresión Oral Continua:</th>
                                    <td align="left">  '. $rst["expresion"] .'</td>
                                </tr>
                                '; 			
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Tensión/Estrés:</th>
                                    <td align="left">  '. $rst["tension"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Trabajo:</th>
                                    <td align="left">  '. $rst["trabajo_nombre"] .'</td>
                                </tr>
                                ';			
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Seguridad Industrial:</th>
                                    <td align="left">  '. $rst["seguridad"] .'</td>
                                </tr>
                                ';
                   $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Observaciones:</th>
                                    <td align="left">  '. $rst["observaciontrab"] .'</td>
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