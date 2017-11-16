<?php	
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.validaciones.php' );
    include_once( CLASS_PATH . "class.clquery.php" );
    include_once( CLASS_PATH . "class.clpaginacion.php" );   
	include_once( CLASS_PATH . "class.cltporcentaje.php" ); 
	include_once( CLASS_PATH . "class.clsalarial.php" ); 
	include_once( CLASS_PATH . "class.clcontratacion.php" ); 
	include_once( CLASS_PATH . "class.clatecnicas.php" ); 
	include_once( CLASS_PATH . "class.cltqgarante.php" );
	
	include_once( CLASS_PATH . "class.clsubaformativa.php" ); 
	include_once( CLASS_PATH . "class.clexperiencia.php" ); 

    class clDatosls
    {
        private $strAiees;	
		private $strAlaborados;	
		private $strMfamiliar;
		private $strNhombres;
		private $strNMujeres;
		private $strCingresos;
		private $strPcargo;
		private $strCuantos;
		private $strEdades;
		private $strTienei;
		private $strTipoi;
		private $strMingreso;
		private $strObservaciones;
		private $strAtecnicas;
		private $strEmpresa;
		private $strJinmediato;
		private $strCargo;
		private $strTelefono;
		private $strAlaborando;
		private $strInsertado;
		private $strFechai;
		private $strFechaf;
		private $strMsalida;
		private $strFprincipales;
		private $strObservacion;
		private $strNombrer;
		private $strTelefonor;
		private $strRelacion;
		
        private $strCodigo;
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
           	$this->strAiees = ""; 	
		   	$this->strAlaborados="";
		   	$this->strMfamiliar="";
		   	$this->strNhombres="";
		   	$this->strNMujeres="";
		  	$this->strCingresos="";
		   	$this->strPcargo="";
		   	$this->strCuantos="";
		   	$this->strEdades="";
		   	$this->strTienei="";
		   	$this->strTipoi="";
		   	$this->strMingreso="";
		   	$this->strObservaciones="";
			$this->strAtecnicas="";
			$this->strEmpresa="";
			$this->strJinmediato="";
			$this->strCargo="";
			$this->strTelefono="";
			$this->strAlaborando="";
			$this->strInsertado="";
			$this->strFechai="";
			$this->strFechaf="";
			$this->strMsalida="";
			$this->strFprincipales="";
			$this->strObservacion="";
			$this->strNombrer="";
			$this->strTelefonor="";
			$this->strRelacion="";
			
		   $this->strCodigo = "";	
		    $this->strEtiqueta = "";
            $this->strNombreBoton = "";
            $this->strValorBoton = "";
			$this->strNombreBotons = "";
            $this->strValorBotons = "";
			$this->strNombreBotona = "";
            $this->strValorBotona = "";
            $this->strLectura = "";
		}
////////////// Aiess /////////////////////
        public function getStrAiees()
        {
            return $this->strAiees;
        }
		public function setStrAiees($n)
        {
            $this->strAiees = $n;
        }
  ////////////// Alaborados  /////////////////////
        public function getStrAlaborados()
        {
            return $this->strAlaborados;
        }
		public function setStrAlaborados($n)
        {
            $this->strAlaborados = $n;
        }
  ////////////// Mfamiliar /////////////////////
        public function getStrMfamiliar()
        {
            return $this->strMfamiliar;
        }
		public function setStrMfamiliar($n)
        {
            $this->strMfamiliar = $n;
        } 
  ////////////// Nhombres /////////////////////
        public function getStrNhombres()
        {
            return $this->strNhombres;
        }
		public function setStrNhombres($n)
        {
            $this->strNhombres = $n;
        } 	
 ////////////// Nmujeres /////////////////////
        public function getStrNmujeres()
        {
            return $this->strNmujeres;
        }
		public function setStrNmujeres($n)
        {
            $this->strNmujeres = $n;
        } 
 ////////////// Cingresos /////////////////////
        public function getStrCingresos()
        {
            return $this->strCingresos;
        }
		public function setStrCingresos($n)
        {
            $this->strCingresos = $n;
        } 
 ////////////// Pcargo /////////////////////
        public function getStrPcargo()
        {
            return $this->strPcargo;
        }
		public function setStrPcargo($n)
        {
            $this->strPcargo = $n;
        } 
 ////////////// Cuantos /////////////////////
        public function getStrCuantos()
        {
            return $this->strCuantos;
        }
		public function setStrCuantos($n)
        {
            $this->strCuantos = $n;
        } 
 ////////////// Edades /////////////////////
        public function getStrEdades()
        {
            return $this->strEdades;
        }
		public function setStrEdades($n)
        {
            $this->strEdades = $n;
        } 	
 ////////////// Tienei /////////////////////
        public function getStrTienei()
        {
            return $this->strTienei;
        }
		public function setStrTienei($n)
        {
            $this->strTienei= $n;
        } 
 ////////////// Tipoi /////////////////////
        public function getStrTipoi()
        {
            return $this->strTipoi;
        }
		public function setStrTipoi($n)
        {
            $this->strTipoi = $n;
        } 
 ////////////// Mingreso/////////////////////
        public function getStrMingreso()
        {
            return $this->strMingreso;
        }
		public function setStrMingreso($n)
        {
            $this->strMingreso = $n;
        } 
 ////////////// Observaciones /////////////////////
        public function getStrObservaciones()
        {
            return $this->strObservaciones;
        }
		public function setStrObservaciones($n)
        {
            $this->strObservaciones = $n;
        } 
 ////////////// Atecnicas /////////////////////
        public function getStrAtecnicas()
        {
            return $this->strAtecnicas;
        }
		public function setStrAtecnicas($n)
        {
            $this->strAtecnicas = $n;
        } 	
 ////////////// Empresa /////////////////////
        public function getStrEmpresa()
        {
            return $this->strEmpresa;
        }
		public function setStrEmpresa($n)
        {
            $this->strEmpresa = $n;
        } 
 ////////////// Jinmediato /////////////////////
        public function getStrJinmediato()
        {
            return $this->strJinmediato;
        }
		public function setStrJinmediato($n)
        {
            $this->strJinmediato= $n;
        } 
 ////////////// Cargo /////////////////////
        public function getStrCargo()
        {
            return $this->strCargo;
        }
		public function setStrCargo($n)
        {
            $this->strCargo= $n;
        } 
 ////////////// Telefono /////////////////////
        public function getStrTelefono()
        {
            return $this->strTelefono;
        }
		public function setStrTelefono($n)
        {
            $this->strTelefono= $n;
        } 
 ////////////// Alaborando/////////////////////
        public function getStrAlaborando()
        {
            return $this->strAlaborando;
        }
		public function setStrAlaborando($n)
        {
            $this->strAlaborando= $n;
        } 	
 ////////////// Insertado/////////////////////
        public function getStrInsertado()
        {
            return $this->strInsertado;
        }
		public function setStrInsertado($n)
        {
            $this->strInsertado= $n;
        } 
 ////////////// Fechai////////////////////
        public function getStrFechai()
        {
            return $this->strFechai;
        }
		public function setStrFechai($n)
        {
            $this->strFechai= $n;
        } 
 ////////////// Fechaf////////////////////
        public function getStrFechaf()
        {
            return $this->strFechaf;
        }
		public function setStrFechaf($n)
        {
            $this->strFechaf= $n;
        } 
 ////////////// Msalida////////////////////
        public function getStrMsalida()
        {
            return $this->strMsalida;
        }
		public function setStrMsalida($n)
        {
            $this->strMsalida= $n;
        } 
 ////////////// Fprincipales////////////////////
        public function getStrFprincipales()
        {
            return $this->strFprincipales;
        }
		public function setStrFprincipales($n)
        {
            $this->strFprincipales= $n;
        } 
 ////////////// Observacion////////////////////
        public function getStrObservacion()
        {
            return $this->strObservacion;
        }
		public function setStrObservacion($n)
        {
            $this->strObservacion= $n;
        } 
 ////////////// Nombrer////////////////////
        public function getStrNombrer()
        {
            return $this->strNombrer;
        }
		public function setStrNombrer($n)
        {
            $this->strNombrer= $n;
        } 	
////////////// Telefonor////////////////////
        public function getStrTelefonor()
        {
            return $this->strTelefonor;
        }
		public function setStrTelefonor($n)
        {
            $this->strTelefonor= $n;
        } 
////////////// Relacion////////////////////
        public function getStrRelacion()
        {
            return $this->strRelacion;
        }
		public function setStrRelacion($n)
        {
            $this->strRelacion= $n;
        } 																																																                     
////////////// Codigo /////////////////////
        public function getStrCodigo()
        {
            return $this->StrCodigo;
        }
		public function setStrCodigo($c)
        {
            $this->StrCodigo = $c;
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
/////////////////////////nombre///////////////////////////////////
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
						
////////////////////////////valor//////////////////////////////////
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
						
//////////////////////////////////////////////////////////////////
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
           
		$aiees = new clExperiencia();	
		$alaborados = new clTporcentaje();
		$mfamiliar = new clTporcentaje();
		$nhombres = new clTporcentaje();
		$nmujeres = new clTporcentaje();
		$cingresos = new clTporcentaje();
		$pcargo = new clExperiencia();
		$cuantos = new clTporcentaje();
		$tienei = new clExperiencia();
		$tipoi = new clContratacion();
		$mingreso = new clSalarial();
		$atecnicas = new clAtecnicas();
		$alaborando = new clExperiencia();
		$insertado = new clExperiencia();
		$relacion = new clTqgarante();
          	$retval  = '<script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.validate.js"></script>
                        <script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.metadata.js"></script>
                       ';

            $retval .= '<br><br><br><br>
                        <script>
                            $(document).ready(function(){
                                    $.metadata.setType( \'attr\', \'validate\' );
                                    $(\'#frmdatosls\').validate({
                                            rules:{
                                         	    lsAformativa: { required: true},
                                         	    lsSubaformativa: { required: true},
                              					strObservaciond: { required: true }
                                                  },
                                            messages:{
                                              	lsAformativa: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
                                              	lsSubaformativa: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
                                                strResponsable: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
                                               	strObservaciond: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"}
												     }
                                    });
									
			
								 
	                           });
                        </script>
                       ';
		  
            	$retval .= '<form id="frmdatosls" action="'.DATOSLS_URL.'datosls.php" method="POST">';

             	$Regresar = "regresar('".DATOSLS_URL . "datosls.php')";
            	$retval .= '<fieldset class="fieldsetPequeno">';
            	$retval .= '<legend class="etiquetaborde">
                            Datos Laborales<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Listado Datos Laborales<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> '. $this->getStrEtiqueta() .'
                          </legend>
                       ';
            $NHC = "";		   
            $retval .= '
                        <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">'. $this->getStrEtiqueta() .'</td>
                                <input class="textbox" id="strCodigo" name="strCodigo" type="hidden" maxlength="50" value="'. $this->getStrCodigo() .'" />
   							 <tr class="formulariofila1">
                               <td align="right"><b>Afiliación al IESS:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsAiees" id="lsAiees"  class="combobox">
	                                        '. $aiees->getStrListar($this->getStrAiees()) .'
	                                    </select>
                              		<td align="right"><b>Años Laborados:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsAlaborados" id="lsAlaborados"  class="combobox">
	                                        '. $alaborados->getStrListar($this->getStrAlaborados()) .'
	                                    </select>
                                </td> 
                            </tr>
  <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">Situación Sociolaboral</td>
                            </tr>                           
                            <tr class="formulariofila1">
                               	<td align="right"><b>Miembros de unidad Familiar:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsMfamiliar" id="lsMfamiliar"  class="combobox">
	                                        '. $mfamiliar->getStrListar($this->getStrMfamiliar()) .'
	                                    </select>
                                </td> 
                                <td align="right"><b>Número Hombres:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsNhombres" id="lsNhombres"  class="combobox">
	                                        '. $nhombres->getStrListar($this->getStrNhombres()) .'
	                                    </select>
                                </td> 
                            </tr>
                            <tr class="formulariofila1">
                               <td align="right"><b>Número Mujeres:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsNmujeres" id="lsNmujeres"  class="combobox">
	                                        '. $nmujeres->getStrListar($this->getStrNmujeres()) .'
	                                    </select>
                                </td> 
                                <td align="right"><b>Con Ingresos:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsCingresos" id="lsCingresos"  class="combobox">
	                                        '. $cingresos->getStrListar($this->getStrCingresos()) .'
	                                    </select>
                                </td>
                             </tr>
                            <tr class="formulariofila1">
                               <td align="right"><b>Monto del Ingreso:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsMingreso" id="lsMingreso"  class="combobox">
	                                        '. $mingreso->getStrListar($this->getStrMingreso()) .'
	                                    </select>
                                </td> 
                                <td align="right"><b>Tipo Ingreso:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsTipoi" id="lsTipoi"  class="combobox">
	                                        '. $tipoi->getStrListar($this->getStrTipoi()) .'
	                                    </select>
                                </td> 
	                          </tr>
                             
							 
							 
							  
                            <tr class="formulariofila1">
                               <td align="right"><b>¿Tiene Personas a su cargo?:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsPcargo" id="lsPcargo"  class="combobox">
	                                        '. $pcargo->getStrListar($this->getStrPcargo()) .'
	                                    </select>
                                </td> 
                                <td align="right"><b>¿Cuantos?:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsCuantos" id="lsCuantos"  class="combobox">
	                                        '. $cuantos->getStrListar($this->getStrCuantos()) .'
	                                    </select>
                                </td> 
                            </tr>
                            <tr class="formulariofila1">
                               <td  align="right"><b>Edades:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="StrEdades" name="StrEdades" type="text" maxlength="50" value="'. $this->getStrEdades() .'" />
                                </td>
                               
                            </tr>
                           <tr class="formulariofila1">
                               <td  align="right"><b>Observaciones:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="StrObservaciones" name="StrObservaciones" type="text" maxlength="50" value="'. $this->getStrObservaciones() .'" />
                                </td>
                               <td align="right"><b>Ayuda técnica del puesto de trabajo necesarias:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsAtecnicas" id="lsAtecnicas"  class="combobox">
	                                        '. $atecnicas->getStrListar($this->getStrAtecnicas()) .'
	                                    </select>
                                </td>  
                            </tr>
  <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">REFERENCIAS PERSONALES Y LABORALES
</td>
                            </tr> 							
							<tr class="formulariofila1">
                               <td  align="right"><b>Nombre:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="StrNombrer" name="StrNombrer" type="text" maxlength="50" value="'. $this->getStrNombrer() .'" />
                                </td>
                               <td  align="right"><b>Teléfono:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="StrTelefonor" name="StrTelefonor" type="text" maxlength="50" value="'. $this->getStrTelefonor() .'" />
                                </td>
                            </tr>
                            <tr class="formulariofila1">
							<td align="right"><b>Relación:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsRelacion" id="lsRelacion"  class="combobox">
	                                        '. $relacion->getStrListar($this->getStrRelacion()) .'
	                                    </select>
                                </td> 
							 </tr>                                 
 <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">Experiencia Laboral</td>
                            </tr> 
                            <tr class="formulariofila1">
                               <td  align="right"><b>Empresa:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="StrEmpresa" name="StrEmpresa" type="text" maxlength="50" value="'. $this->getStrEmpresa() .'" />
                                </td>
                               <td  align="right"><b>Jefe Inmediato:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="StrJinmediato" name="StrJinmediato" type="text" maxlength="50" value="'. $this->getStrJinmediato() .'" />
                                </td>
                            </tr>
							<tr class="formulariofila1">
                               <td  align="right"><b>Cargo:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="StrCargo" name="StrCargo" type="text" maxlength="50" value="'. $this->getStrCargo() .'" />
                                </td>
                               <td  align="right"><b>Teléfono:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="StrTelefono" name="StrTelefono" type="text" maxlength="50" value="'. $this->getStrTelefono() .'" />
                                </td>
                            </tr>
                            <tr class="formulariofila1">
                               	<td align="right"><b>Actualmente se encuentra laborando:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsAlaborando" id="lsAlaborando"  class="combobox">
	                                        '. $alaborando->getStrListar($this->getStrAlaborando()) .'
	                                    </select>
                                </td> 
                                <td align="right"><b>Insertado por el SIL:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsInsertado" id="lsInsertado"  class="combobox">
	                                        '. $insertado->getStrListar($this->getStrInsertado()) .'
	                                    </select>
                                </td> 
                            </tr>
							<tr class="formulariofila1">
                               	<td  align="right"><b>Fecha&nbsp;Inicio:</b></td>
                                	<td align="left">
                                    <input name="dtFechai" type="text" id="dtFechai" value="'. $this->getStrFechai() .'" size="10" readonly="readonly" class="textboxfecha" />
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
                               	<td  align="right"><b>Fecha&nbsp;Fin:</b></td>
                                	<td align="left">
                                    <input name="dtFechaf" type="text" id="dtFechaf" value="'. $this->getStrFechaf() .'" size="10" readonly="readonly" class="textboxfecha" />
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
                            </tr>
							<tr class="formulariofila1">
                               <td  align="right"><b>Motivos de salida:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="StrMsalida" name="StrMsalida" type="text" maxlength="50" value="'. $this->getStrMsalida() .'" />
                                </td>
                               <td  align="right"><b>Funciones Principales:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="StrFprincipales" name="StrFprincipales" type="text" maxlength="50" value="'. $this->getStrFprincipales() .'" />
                                </td>
                            </tr>
							<tr class="formulariofila1">
                               <td  align="right"><b>Observaciones:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="StrObservacion" name="StrObservacion" type="text" maxlength="50" value="'. $this->getStrObservacion() .'" />
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
            $ProcedimientoAlmacenado = sprintf("CALL spingresardatosl('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s',
			'%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s');",
            $this->getStrAiees(),$this->getStrAlaborados(),$this->getStrMfamiliar(),$this->getStrNhombres(),$this->getStrNmujeres(),
            $this->getStrCingresos(),$this->getStrPcargo(),$this->getStrCuantos(),$this->getStrEdades(),$this->getStrTienei(),
            $this->getStrTipoi(),$this->getStrMingreso(),$this->getStrObservaciones(),$this->getStrAtecnicas(),$this->getStrEmpresa(),
            $this->getStrJinmediato(),$this->getStrCargo(),$this->getStrTelefono(),$this->getStrAlaborando(),$this->getStrInsertado(),
            $this->getStrFechai(),$this->getStrFechaf(),$this->getStrMsalida(),$this->getStrFprincipales(),$this->getStrObservacion(),
            $this->getStrNombrer(),$this->getStrTelefonor(),$this->getStrRelacion(),$this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Aiess = [ '.$this->getStrAiees().' ] Usuario = [ '. $this->getStrCodigo().' ] ';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'G', 'tdatosl', $descripcion);
                $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
                $query->getStrSqlInsertUpdateDelete();
                $resultado = true;
            }
            return $resultado;
        }
	public function getStrBuscardls($v) 
	{
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbidentificadordatosls('%d');","$v");
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
	public function getStrBuscardl($v) 
	{
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbidentificadordl('%d');","$v");
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
            $ProcedimientoAlmacenado = sprintf("CALL spbdatosl('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
                foreach( $resultado as $rst):   
					$this->setStrAiees($rst["aiess_id"]);
					$this->setStrAlaborados($rst["alaborados_id"]);
					$this->setStrMfamiliar($rst["mfamiliar_id"]);
					$this->setStrNhombres($rst["nhombres_id"]);
					$this->setStrNmujeres($rst["nmujeres_id"]);
					$this->setStrCingresos($rst["cingresos_id"]);
					$this->setStrPcargo($rst["pcargo_id"]);
					$this->setStrCuantos($rst["cuantos_id"]);
					$this->setStrEdades($rst["edades"]);
					$this->setStrTienei($rst["tienei_id"]);
					$this->setStrTipoi($rst["tipoi_id"]);
					$this->setStrMingreso($rst["mingreso_id"]);
					$this->setStrObservaciones($rst["observaciones"]);
					$this->setStrAtecnicas($rst["atecnica_id"]);
					$this->setStrEmpresa($rst["empresa"]);
					$this->setStrJinmediato($rst["jinmediato"]);
					$this->setStrCargo($rst["cargo"]);
					$this->setStrTelefono($rst["telefono"]);
					$this->setStrAlaborando($rst["alaborando_id"]);
					$this->setStrInsertado($rst["insertado_id"]);
					$this->setStrFechai($rst["fechai"]);
					$this->setStrFechaf($rst["fachaf"]);
					$this->setStrMsalida($rst["msalida"]);
					$this->setStrFprincipales($rst["fprincipales"]);
					$this->setStrObservacion($rst["observacion"]);
					$this->setStrNombrer($rst["nombrer"]);
					$this->setStrTelefonor($rst["telefonor"]);
					$this->setStrRelacion($rst["relacion_id"]);
                    	
                endforeach;

                $retval = true;
            }
           
            return $retval;
        }
public function getStrActualizar() 
	{
			$query = new clQuery();
            $resultado = false;		
			 $ProcedimientoAlmacenado = sprintf("CALL spactualizaradatosl('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s',
			'%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s');",
            $this->getStrCodigo(),$this->getStrAiees(),$this->getStrAlaborados(),$this->getStrMfamiliar(),$this->getStrNhombres(),$this->getStrNmujeres(),
            $this->getStrCingresos(),$this->getStrPcargo(),$this->getStrCuantos(),$this->getStrEdades(),$this->getStrTienei(),
            $this->getStrTipoi(),$this->getStrMingreso(),$this->getStrObservaciones(),$this->getStrAtecnicas(),$this->getStrEmpresa(),
            $this->getStrJinmediato(),$this->getStrCargo(),$this->getStrTelefono(),$this->getStrAlaborando(),$this->getStrInsertado(),
            $this->getStrFechai(),$this->getStrFechaf(),$this->getStrMsalida(),$this->getStrFprincipales(),$this->getStrObservacion(),
            $this->getStrNombrer(),$this->getStrTelefonor(),$this->getStrRelacion());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Aiess = [ '.$this->getStrAiees().' ] Usuario = [ '. $this->getStrCodigo().' ] ';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'ACTUALIZAR', 'tdatosl', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL speliminardatosl('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlInsertUpdateDelete();
 			if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Afiliación IESS = [ '.$this->getStrAiees().' ] Centro_Formativo = [ '. $this->getStrCodigo().' ] ';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'ELIMINAR', 'tdatosl', $descripcion);
                $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
                $query->getStrSqlInsertUpdateDelete();
                $resultado = true;
            }

            return $resultado;
          
        }				
		

 public function getStrListar()
        {
            $paginacion = new clPaginacion();
            $query = new clQuery();

            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL sptotaldatosl();", $this->getStrCodigo());
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
            $ProcedimientoAlmacenado = sprintf("CALL splistardatosl('%d','%d','%d');","$re", "$pa","$cf");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            Datos laborales<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">Listado Experiencia Laboral</legend>
                       ';
            $retval .= '
                        <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                            <tr class="tablatitulo">
                                <th colspan="11">LISTADO EXPERIENCIA LABORAL</th>
                            </tr>
                            <tr class="tablasubtitulo">
                                <th>...</th>  
                                <th align="center">ID Acceso</th>                                                              
                                <th align="center">Empresa</th>
                                <th align="center">Jefe Inmediato</th>
                                <th align="center">Cargo</th>
                                <th align="center">Teléfono</th>
                                <th align="center" colspan="3">Acciones</th>
                             </tr>
                        ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["tdatosl_id"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["empresa"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["jinmediato"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["cargo"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["telefono"] .'</td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Actualizar <br> [ codigo = '.$rst["tdatosl_id"] .' ]">';
                    $retval .=  '<a href="'.DATOSLS_URL.'datosls.php?btnActualizar=Actualizar&strCodigo='. $rst["tdatosl_id"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Eliminar <br> [codigo = '.$rst["tdatosl_id"] .' ]">';
                    $retval .=  '<a href="'.DATOSLS_URL.'datosls.php?btnEliminar=Eliminar&strCodigo='. $rst["tdatosl_id"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Detalle Datos Laborales <br> [ codigo = '.$rst["tdatosl_id"] .' ]">';
                    $retval .=  '<a href="'.DATOSLS_URL.'datosls.php?btnDetalle=Detalle&strCodigo='. $rst["tdatosl_id"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                    $i = 1 - $i;
                endforeach;
            }

            $paginacion->setStrNombrePagina("datosls/datosls.php");
            $retval .= '<tr><td colspan="12" align="center">'. $paginacion->getStrPaginacion() .'</td></tr>';
            $retval .= '</table>';
            $retval .= '</fieldset>';
            return $retval;
        }
 ////////////////////////// por SIL /////////////////////////////////////////
    public function getStrListarc()
        {
            $paginacion = new clPaginacion();
            $query = new clQuery();

            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL sptotaldatoslc();", $this->getStrCodigo());
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
            $ProcedimientoAlmacenado = sprintf("CALL splistardatoslc('%d','%d','%d');","$re", "$pa","$cf");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            SIL<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO EXPERIENCIA LABORAL INGRESADOS POR EL SIL</legend>
                       ';
            $retval .= '
                        <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                            <tr class="tablatitulo">
                                <th colspan="11">LISTADO EXPERIENCIA LABORAL INGRESADOS POR EL SIL</th>
                            </tr>
                            <tr class="tablasubtitulo">
                                <th>...</th>  
                                <th align="center">ID Acceso</th>                                                              
                                <th align="center">Empresa</th>
                                <th align="center">Contratación Descripción</th>
                                <th align="center">Cargo</th>
                                <th align="center">Teléfono</th>
                               
                             </tr>
                        ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["id_usuario_contratacion"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["nombre"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["contratacion_descripcion"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["descripcion"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["movil"] .'</td>';
                    
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                    $i = 1 - $i;
                endforeach;
            }

            $paginacion->setStrNombrePagina("datosls/datosls.php");
            $retval .= '<tr><td colspan="12" align="center">'. $paginacion->getStrPaginacion() .'</td></tr>';
            $retval .= '</table>';
            $retval .= '</fieldset>';
            return $retval;
        }
    
       
       
/////////////////////////////////////////////////////////////////////////////////////      

public function getStrDetallePersona()
        {
            $query = new clQuery();
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbdetalledatosl('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            Área Formativa<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Listado Área Formativa<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Detalle Área Formativa
                        </legend>
                       ';

            if( count($resultado) > 0 )
            {
                $i = 0;
				$valor=$this->getStrCodigo();
			 	$v=$this->getStrBuscardl($valor);
                foreach( $resultado as $rst):
                    $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                    $retval .= '<tr>
                                    <td colspan="2" align="center">
                                        <a href="'. DATOSLS_URL .'datosls.php?btnNuevo=Nuevo&strCodigo='.$v.'">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> Regresar Listado Datos Laborales|</a>
                                    <td>
                                </tr>
                                ';
                    
                    $retval .= '<tr class="tablatitulo">
                                    <th colspan="2">DETALLE&nbsp;DATOS LABORALES;REGISTRADA</th>
                                </tr>
                                ';
								

                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Código:</th>
                                    <td align="left">  '. $rst["tdatosl_id"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Afiliación al IESS:</th>
                                    <td align="left">  '. $rst["aiees"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Años Laborados:</th>
                                    <td align="left">  '. $rst["alaborados"] .'</td>
                                </tr>
                                ';			
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Miembros de unidad Familiar:</th>
                                    <td align="left">  '. $rst["mfamiliar"] .'</td>
                                </tr>
                                ';				
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Número Hombres:</th>
                                    <td align="left">  '. $rst["nhombres"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Número Mujeres:</th>
                                    <td align="left">  '. $rst["nmujeres"] .'</td>
                                </tr>
                                ';				
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Con Ingresos:</th>
                                    <td align="left">  '. $rst["cingresos"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">¿Tiene Personas a su cargo?:</th>
                                    <td align="left">  '. $rst["pcargo"] .'</td>
                                </tr>
                                ';		
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">¿Cuantos?:</th>
                                    <td align="left">  '. $rst["cuantos"] .'</td>
                                </tr>
                                ';            		
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Edades:</th>
                                    <td align="left">  '. $rst["edades"] .'</td>
                                </tr>
                                ';   			
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">¿Tiene Ingresos?:</th>
                                    <td align="left">  '. $rst["tienei"] .'</td>
                                </tr>
                                ';  			
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Tipo Ingreso:</th>
                                    <td align="left">  '. $rst["tipocontrato_nombre"] .'</td>
                                </tr>
                                '; 			
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Monto del Ingreso:</th>
                                    <td align="left">  '. $rst["aspiracionsalarial_nombre"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Observaciones:</th>
                                    <td align="left">  '. $rst["observaciones"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Ayuda técnica del puesto de trabajo necesarias:</th>
                                    <td align="left">  '. $rst["ayudastecnicas_nombre"] .'</td>
                                </tr>
                                ';						
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Empresa:</th>
                                    <td align="left">  '. $rst["empresa"] .'</td>
                                </tr>
                                ';		
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Jefe Inmediato:</th>
                                    <td align="left">  '. $rst["jinmediato"] .'</td>
                                </tr>
                                ';						
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Cargo:</th>
                                    <td align="left">  '. $rst["cargo"] .'</td>
                                </tr>
                                ';					
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Teléfono:</th>
                                    <td align="left">  '. $rst["telefono"] .'</td>
                                </tr>
                                ';				
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Actualmente se encuentra laborando:</th>
                                    <td align="left">  '. $rst["alaborando"] .'</td>
                                </tr>
                                ';			
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Insertado por el SIL:</th>
                                    <td align="left">  '. $rst["insertado"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Fecha Inicio:</th>
                                    <td align="left">  '. $rst["fechai"] .'</td>
                                </tr>
                                ';				
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Fecha Fin:</th>
                                    <td align="left">  '. $rst["fachaf"] .'</td>
                                </tr>
                                ';				
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Motivos de salida:</th>
                                    <td align="left">  '. $rst["msalida"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Funciones Principales:</th>
                                    <td align="left">  '. $rst["fprincipales"] .'</td>
                                </tr>
                                ';				
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Nombre:</th>
                                    <td align="left">  '. $rst["nombrer"] .'</td>
                                </tr>
                                ';				
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Teléfono:</th>
                                    <td align="left">  '. $rst["telefonor"] .'</td>
                                </tr>
                                ';					
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Relación:</th>
                                    <td align="left">  '. $rst["tqgarante_descripcion"] .'</td>
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