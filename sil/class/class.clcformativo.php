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
    class clCformativo
    {
        private $StrCodigo;
        private $strNombre;
		private $strResponsable;	
		private $strContacto;
		private $strEstado;
		private $strEmail;
	 	private $strTelefonos;	
		private $strNestudiantes;
		private $strNestudiantesd;	 
		private $strTipocformativo;
		private $strCobertura;
		private $strExperiencia;
		private $strObservacion;
		
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
		private $strFax;
		private $strObservaciond;
		private $strFechaNacimiento;
		
        private $strEtiqueta;
        private $strNombreBoton;
        private $strValorBoton;
        private $strLectura;

        public function __construct()
        {
				
            $this->StrCodigo = "";	
			$this->strNombre = "";
            $this->strResponsable = "";
			$this->strEmail = "";
			$this->strEstado = "";
			$this->strTelefonos = "";
			$this->strNestudiantes = "";
			$this->strNestudiantesd = "";
			$this->strTipocformativo = "";
			$this->strCobertura = "";	
			$this->strExperiencia = "";
			$this->strObservacion = "";
			$this->strProvincia = "";
            $this->strCanton = "";
            $this->strParroquia = "";
			$this->strSucursal = "";
			
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
			$this->strFax= "";
			$this->strObservaciond= "";
			
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
////////////// Responsable /////////////////////		
		public function getStrResponsable()
        {
            return $this->strResponsable;
        }
  		public function setStrResponsable($rp)
        {
            $this->strResponsable = $rp;
        } 
//////////// Contacto////////////////// 
		public function getStrContacto()
        {
            return $this->strContacto;
        }
  		public function setStrContacto($ct)
        {
            $this->strContacto = $ct;
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
/////////////////////mail ///////////////////////
        public function getStrEmail()
        {
            return $this->strEmail;
        }

        public function setStrEmail($e)
        {
            $this->strEmail = $e;
        }
/////////////////////telefonos//////////////////////////////
		public function getStrTelefonos()
	        {
	            return $this->strTelefonos;
	        }

        public function setStrTelefonos($t)
	        {
	            $this->strTelefonos = $t;
	        }
/////////////////////////Nº Estudiantes//////////////////////////////
		public function getStrNestudiantes()
	        {
	            return $this->strNestudiantes;
	        }

        public function setStrNestudiantes($ne)
	        {
	            $this->strNestudiantes = $ne;
	        }
////////////////////////Nº Estudiantes Discapacidad/////////////////////////////////			
		public function getStrNestudiantesd()
	        {
	            return $this->strNestudiantesd;
	        }

        public function setStrNestudiantesd($ned)
	        {
	            $this->strNestudiantesd = $ned;
	        }
//////////////////////////////Tipo C Formativo//////////////////////////////////////////////////////	
		public function getStrTipocformativo()
	        {
	            return $this->strTipocformativo;
	        }

        public function setStrTipocformativo($tcf)
	        {
	            $this->strTipocformativo = $tcf;
	        }
//////////////////////////////Cobertura////////////////////////////////////////////////////////////////
		public function getStrCobertura()
	        {
	            return $this->strCobertura;
	        }

        public function setStrCobertura($cb)
	        {
	            $this->strCobertura = $cb;
	        }
////////////////////////////////Experiencia //////////////////////////////////////////////////////////////////////
		public function getStrExperiencia()
	        {
	            return $this->strExperiencia;
	        }

        public function setStrExperiencia($exp)
	        {
	            $this->strExperiencia = $exp;
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

////////////////////////fax///////////////////////////////////////////////////////////////
		public function getStrFax()
        {
            return $this->strFax;
        }

        public function setStrFax($fa)
        {
            $this->strFax= $fa;
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
			$tipocformativo = new clTipocformativo();
			$cobertura = new clCobertura();
			$experiencia = new clExperiencia();
			$provincia = new clProvincia();
            $canton = new clCanton();
            $parroquia = new clParroquia();
			$sucursal = new clSucursal();
			$sector = new clSector();
			
          $retval  = '<script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.validate.js"></script>
                        <script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.metadata.js"></script>
                       ';

            $retval .= '<br><br><br><br>
                        <script>
                            $(document).ready(function(){
                                    $.metadata.setType( \'attr\', \'validate\' );
                                    $(\'#frmcformativo\').validate({
                                            rules:{
                                               strNombre: { required: true},
                                               strResponsable: { required: true },
                                               	strContacto: { required: true}, 	
												lsEstado: { required: true},
												strEmail: { required: true },
												strTelefonos: { required: true },	
												strNestudiantes: { required: true },
												strNestudiantesd: { required: true },
												lsTipocformativo: { required: true}, 
												lsCobertura: { required: true}, 
												lsExperiencia: { required: true},
												lsProvincia: { required: true },
                                                lsCanton: { required: true},
                                                lsParroquia: { required: true },
                                               
												strObservacion: { required: true },
												strCprincipal: { required: true },
												strNumero: { required: true },
												strTransversal: { required: true },
												lsSector: { required: true },
                               					strPasaje: { required: true },
                               					strBarrio: { required: true },
												strManzana: { required: true },
												strSolar: { required: true },
												strFijo: { required: true },
												strMovil: { required: true },
												strFax: { required: true },
												strObservaciond: { required: true }
                                                  },
                                            messages:{
                                              	strNombre: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                                strResponsable: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
                                                strContacto: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
                                                lsEstado: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
												strEmail: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},	
												strTelefonos: { required: "<span class=\'resultadoincorrecto\'><br>*Ingrese solo Numeros</span>"},
												strNestudiantes: { required: "<span class=\'resultadoincorrecto\'><br>*Ingrese solo Numeros</span>"},
												strNestudiantesd: { required: "<span class=\'resultadoincorrecto\'><br>*Ingrese solo Numeros</span>"},
												lsTipocformativo: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
												lsCobertura: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
												lsExperiencia: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
												lsProvincia: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
                                                lsCanton: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
                                                lsParroquia: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
                                                
                                                strObservacion: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                                strCprincipal: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                                strNumero: { required: "<span class=\'resultadoincorrecto\'>*Ingrese solo Numeros</span>"},
												strTransversal: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
												lsSector: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
												strPasaje: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
												strBarrio: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
												strManzana: { required: "<span class=\'resultadoincorrecto\'>* Ingrese solo Numeros</span>"},
												strSolar: { required: "<span class=\'resultadoincorrecto\'>*Ingrese solo Numeros</span>"},
												strFijo: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
												strMovil: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
												strFax: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
												strObservaciond: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"}
												     }
                                    });
                                    
                                    $("#lsProvincia").change(function () {
                                    $("#lsProvincia option:selected").each(function () {
                                            var provincia = $(this).val();
                                            $.post( "'. CFORMATIVO_URL .'cformativo.php", { btnBuscar: "Canton",
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
                                            $.post( "'. CFORMATIVO_URL .'cformativo.php", { btnBuscar: "Parroquia",
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
		  
            $retval .= '<form id="frmcformativo" action="'. CFORMATIVO_URL .'cformativo.php" method="POST">';

            $Regresar = "regresar('". CFORMATIVO_URL . "cformativo.php')";

            $retval .= '<fieldset class="fieldsetPequeno">';
            $retval .= '<legend class="etiquetaborde">
                            CENTRO FORMATIVO <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO CENTRO FORMATIVO<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> '. $this->getStrEtiqueta() .'
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
                                <td  align="right"><b>Entidad:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strNombre" name="strNombre" type="text" maxlength="50" value="'. $this->getStrNombre() .'" />
                                </td>
                             	<td  align="right"><b>Responsable:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strResponsable" name="strResponsable" type="text" maxlength="50" value="'. $this->getStrResponsable() .'" />
                                </td>
                            </tr>
                            <tr class="formulariofila1">
                                <td  align="right"><b>Contacto:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strContacto" name="strContacto" type="text" maxlength="50" value="'. $this->getStrContacto() .'" />
                                </td>
                             	<td align="right"><b>Estado:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsEstado" id="lsEstado"  class="combobox">
	                                        '. $estado->getStrListar($this->getStrEstado()) .'
	                                    </select>
                                </td> 
                            </tr>
                            <tr class="formulariofila1">
                                 <td  align="right"><b>Em@il:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strEmail" name="strEmail" type="text" maxlength="50" value="'. $this->getStrEmail() .'" />
                                </td>
                             		<td  align="right"><b>Tel&eacute;fonos:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strTelefonos" name="strTelefonos" type="text" maxlength="12"  value="'. $this->getStrTelefonos() .'" />
                                </td>
                            </tr>
                            <tr class="formulariofila1">
                                 <td  align="right"><b>Nº Estudiantes:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strNestudiantes" name="strNestudiantes" type="text" maxlength="50"  value="'. $this->getStrNestudiantes() .'" />
                                </td>
                             	<td  align="right"><b>Nº Estudiantes Discapacidad:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strNestudiantesd" name="strNestudiantesd" type="text" maxlength="9"  value="'. $this->getStrNestudiantesd() .'" />
                                </td>
                            </tr>
                            <tr class="formulariofila1">
                                <td align="right"><b>Tipo:&nbsp;</b></td>
                                <td align="left">                                    
                                    <select name="lsTipocformativo" id="lsTipocformativo"  class="combobox">
                                        '. $tipocformativo->getStrListar($this->getStrTipocformativo()) .'
                                    </select>
                                </td>
                                <td align="right"><b>Cobertura:&nbsp;</b></td>
	                                <td align="left">                                    
	                                    <select name="lsCobertura" id="lsCobertura"  class="combobox">
	                                        '. $cobertura->getStrListar($this->getStrCobertura()) .'
	                                    </select>
                                </td> 
                            </tr>
                            <tr class="formulariofila1">
                                <td align="right"><b>Experiencia:&nbsp;</b></td>
                                <td align="left">                                    
                                    <select name="lsExperiencia" id="lsExperiencia"  class="combobox">
                                        '. $experiencia->getStrListar($this->getStrExperiencia()) .'
                                    </select>
                                </td>
                                <td  align="right"><b>Observación:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strObservacion" name="strObservacion" type="text" maxlength="50" value="'. $this->getStrObservacion() .'" />
                                </td>
                            </tr>
                           

  <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">DIRECCIÓN DEL CENTRO FORMATIVO</td>
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
                                 <td  align="right"><b>Calle Principal:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strCprincipal" name="strCprincipal" type="text" maxlength="100" value="'. $this->getStrCprincipal() .'" />
                                </td>
                             	<td  align="right"><b>Número:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strNumero" name="strNumero" type="text" maxlength="100"  value="'. $this->getStrNumero() .'" />
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
                                 <td  align="right"><b>Fax:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strFax" name="strFax" type="text" maxlength="100" value="'. $this->getStrFax() .'" />
                                </td>
                             	<td  align="right"><b>Observación:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strObservaciond" name="strObservaciond" type="text" maxlength="100"  value="'. $this->getStrObservaciond() .'" />
                                </td>
                            </tr>
                            <tr class="formulariofila1">
                                ';
                           if($_SESSION["usuario"]["tipo"]==2 || $_SESSION["usuario"]["tipo"]==1 )
							{
							$retval .= '
                                <td  align="right"><b>Fecha&nbsp;Ingreso:::</b></td>
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
								$retval .= '<td  align="right"><b>Fecha&nbsp;Ingreso:::</b></td>
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
            $ProcedimientoAlmacenado = sprintf("CALL spingresarcformativo('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s','%s','%s',
			'%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s');",
            $this->getStrNombre(), $this->getStrResponsable(), $this->getStrContacto(), $this->getStrEstado(), $this->getStrEmail(),
            $this->getStrTelefonos(),$this->getStrNestudiantes(),$this->getStrNestudiantesd(), $this->getStrTipocformativo(),
			$this->getStrCobertura(),$this->getStrExperiencia(),$this->getStrObservacion(),$this->getStrParroquia(),
			$_SESSION["usuario"]["suc"],$this->getStrCprincipal(),$this->getStrNumero(),$this->getStrTransversal(),$this->getStrSector(),
			$this->getStrPasaje(),$this->getStrBarrio(),$this->getStrManzana(),$this->getStrSolar(),$this->getStrFijo(),
			$this->getStrMovil(),$this->getStrFax(),$this->getStrObservaciond(),$this->getStrFechaNacimiento());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);

            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Nombres = [ '.$this->getStrNombre().' ] Telefonos = [ '. $this->getStrTelefonos().' ] Em@il = [ '.$this->getStrEmail().' ] Fecha Nacimiento= [ '. $this->getStrFechaNacimiento().' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'GUARDAR', 'centro_formativo', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL spactualizarcformativo('%s','%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s','%s','%s',
			'%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s');",
            $this->getStrCodigo(), $this->getStrNombre(), $this->getStrResponsable(), $this->getStrContacto(), $this->getStrEstado(), $this->getStrEmail(),
            $this->getStrTelefonos(),$this->getStrNestudiantes(),$this->getStrNestudiantesd(), $this->getStrTipocformativo(),
			$this->getStrCobertura(),$this->getStrExperiencia(),$this->getStrObservacion(),$this->getStrParroquia(),
			$this->getStrSucursal(),$this->getStrCprincipal(),$this->getStrNumero(),$this->getStrTransversal(),$this->getStrSector(),
			$this->getStrPasaje(),$this->getStrBarrio(),$this->getStrManzana(),$this->getStrSolar(),$this->getStrFijo(),
			$this->getStrMovil(),$this->getStrFax(),$this->getStrObservaciond(),$this->getStrFechaNacimiento());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Nombres = [ '.$this->getStrNombre().' ] Telefonos = [ '. $this->getStrTelefonos().' ] Em@il = [ '.$this->getStrEmail().' ] Fecha Nacimiento= [ '. $this->getStrFechaNacimiento().' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'ACTUALIZAR', 'centro_formativo', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL speliminarcformativo('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlInsertUpdateDelete();

           if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Nombres = [ '.$this->getStrNombre().' ] Telefonos = [ '. $this->getStrTelefonos().' ] Em@il = [ '.$this->getStrEmail().' ] Fecha Nacimiento= [ '. $this->getStrFechaNacimiento().' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'ELIMINAR', 'centro_formativo', $descripcion);
                $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
                $query->getStrSqlInsertUpdateDelete();
                $resultado = true;
            }

            return $resultado;
        }
	public function getStrBuscarr() {
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $cf=$_SESSION["usuario"]["suc"];
			
            $ProcedimientoAlmacenado = sprintf("CALL spbidentificadorcform('%d');","$cf");
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
 	public function getStrBuscar() {
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbcformativo('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
            foreach( $resultado as $rst):   
		        $this->setStrNombre($rst['nombre']);   
	            $this->setStrResponsable($rst['responsable']);   
	            $this->setStrContacto($rst['contacto']);   
				$this->setStrEstado($rst['estado']);   
				$this->setStrEmail($rst['email']);   
				$this->setStrTelefonos($rst['telefono_contacto']);   
				$this->setStrNestudiantes($rst['num_estudiantes']);   
				$this->setStrNestudiantesd($rst['num_estudiantes_disc']);   
				$this->setStrTipocformativo($rst['tipo']);   
				$this->setStrCobertura($rst['cobertura']);   
				$this->setStrExperiencia($rst['experiencia_integracion']);   
				$this->setStrObservacion($rst['observacion']); 
				$this->setStrProvincia(substr($rst['parcodigo'],0,2));
	            $this->setStrCanton(substr($rst['parcodigo'],0,4));  
				$this->setStrParroquia($rst['parcodigo']);
				$this->setStrSucursal($rst['sucursal']);   
				$this->setStrCprincipal($rst['cprincipal']);   
				$this->setStrNumero($rst['numero']);   
				$this->setStrTransversal($rst['transversal']);   
				$this->setStrSector($rst['sector']);   
				$this->setStrPasaje($rst['pasaje']);   
				$this->setStrBarrio($rst['barrio']);   
				$this->setStrManzana($rst['manzana']);   
				$this->setStrSolar($rst['solar']);   
				$this->setStrFijo($rst['fijo']);   
				$this->setStrMovil($rst['movil']);   
				$this->setStrFax($rst['fax']);   
				$this->setStrObservaciond($rst['Observaciond']);
				$this->setStrFechaNacimiento($rst['fecha_ingreso']);   
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
			$ProcedimientoAlmacenado = sprintf("CALL sptotalcformativos('%s');", $sucursal);
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
			 $me=$_SESSION["usuario"]["cuenta"];
            $ProcedimientoAlmacenado = sprintf("CALL splistarCformativos('%d','%d','%d');","$re", "$pa","$cf");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            CENTRO FORMATIVO<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO CENTRO FORMATIVO</legend>
                       ';
            $retval .= '
                        <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                            <tr>
                                <td colspan="11" align="center"><div class="vtip" title="Ingreso<br> [NUEVO CENTRO FORMATIVO]">
                                    <a href="'. CFORMATIVO_URL .'cformativo.php?btnNuevo=Nuevo">| <img src="'. IMAGENES_PATH .'/rptstocksucursal.png" title="" width="16px" height="16px"  border="0" /><img src="'. IMAGENES_PATH .'/nuevo.png" title="" width="16px" height="16px"  border="0" />NUEVO CENTRO FORMATIVO |</a>
                                </div><td>
                            </tr>';
                            $paginacion->setStrNombrePagina("cformativo/cformativo.php");
            				$retval .= '<tr><td colspan="12" align="center">'. $paginacion->getStrPaginacion() .'</td></tr>
                            <tr class="tablatitulo">
                                <th colspan="17">LISTADO CENTRO FORMATIVO REGISTRADOS</th>
                            </tr>
                            <tr class="tablasubtitulo">
                                <th>...</th>  
                                <th align="center"> </th>                                                              
                                <th align="center">Centro Formativo</th>
                                <th align="center">Responsable</th>
                                <th align="center">Estado</th>
                                <th align="center">Fec. Ingreso</th>
                                <th align="center">Acceso</th>
                                <th align="center">Accesibilidad</th>
                                <th align="center">Perfil</th>
                                <th align="center">A. Formativa</th>
                                <th align="center">T. Formación</th>
                                <th align="center">Cursos</th>
                                 <th align="center">Seguimiento</th>
                                <th align="center" colspan="3">Acciones</th>
                            </tr>
                        ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["id_centro_formativo"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["nombre"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["responsable"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["estcfdescripcion"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["fecha_ingreso"] .'</td>';
                   	$retval .= 	'<td align="center"><div class="vtip" title="Forma de Acceso <br> [ codigo = '.$rst["id_centro_formativo"] .' ]">';
					$retval .=  '<a href="'. FACCESOCF_URL.'faccesocf.php?btnNuevo=Nuevo&strCodigo='. $rst["id_centro_formativo"] .'"><img src="'. IMAGENES_PATH .'/acceso.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Accesibilidad <br> [ codigo = '.$rst["id_centro_formativo"] .' ]">';
					$retval .=  '<a href="'. ACCESIBILIDADCF_URL.'accesibilidadcf.php?btnNuevo=Nuevo&strCodigo='. $rst["id_centro_formativo"] .'"><img src="'. IMAGENES_PATH .'/accesibilidad.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Perfil<br> [ codigo = '.$rst["id_centro_formativo"] .' ]">';
					$retval .=  '<a href="'. PERFILCF_URL.'perfilcf.php?btnNuevo=Nuevo&strCodigo='. $rst["id_centro_formativo"] .'"><img src="'. IMAGENES_PATH .'/perfil.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Area Formativa<br> [ codigo = '.$rst["id_centro_formativo"] .' ]">';
					$retval .=  '<a href="'. AFORMATIVACF_URL.'aformativacf.php?btnNuevo=Nuevo&strCodigo='. $rst["id_centro_formativo"] .'"><img src="'. IMAGENES_PATH .'/formativa.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Tipo Formación<br> [ codigo = '.$rst["id_centro_formativo"] .' ]">';
					$retval .=  '<a href="'. TFORMACIONCF_URL.'tformacioncf.php?btnNuevo=Nuevo&strCodigo='. $rst["id_centro_formativo"] .'"><img src="'. IMAGENES_PATH .'/rptstocksucursal.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					
					$retval .= 	'<td align="center"><div class="vtip" title="Cursos<br> [ codigo = '.$rst["id_centro_formativo"] .' ]">';
					$retval .=  '<a href="'. TCURSOCF_URL.'tcursocf.php?btnNuevo=Nuevo&strCodigo='. $rst["id_centro_formativo"] .'"><img src="'. IMAGENES_PATH .'/cursos.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					
					$retval .= 	'<td align="center"><div class="vtip" title="Seguimiento<br> [ codigo = '.$rst["id_centro_formativo"] .' ]">';
					$retval .=  '<a href="'. TSEGUIMIENTOCF_URL.'tseguimientocf.php?btnNuevo=Nuevo&strCodigo='. $rst["id_centro_formativo"] .'"><img src="'. IMAGENES_PATH .'/redactar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    
					$retval .= 	'<td align="center"><div class="vtip" title="ACTUALIZAR CENTRO FORMATIVO <br> [ codigo = '.$rst["id_centro_formativo"] .' ]">';
                    $retval .=  '<a href="'. CFORMATIVO_URL .'cformativo.php?btnActualizar=Actualizar&strCodigo='. $rst["id_centro_formativo"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					if($_SESSION["usuario"]["tipo"]==2 || $_SESSION["usuario"]["tipo"]==1 )
							{
                    $retval .= 	'<td align="center"><div class="vtip" title="ELIMINAR CENTRO FORMATIVO <br> [ codigo = '.$rst["id_centro_formativo"] .' ]">';
                    $retval .=  '<a href="'. CFORMATIVO_URL .'cformativo.php?btnEliminar=Eliminar&strCodigo='. $rst["id_centro_formativo"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
							}
                    $retval .= 	'<td align="center"><div class="vtip" title="DETALLE CENTRO FORMATIVO <br> [ codigo = '.$rst["id_centro_formativo"] .' ]">';
                    $retval .=  '<a href="'. CFORMATIVO_URL .'cformativo.php?btnDetalle=Detalle&strCodigo='. $rst["id_centro_formativo"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                    $i = 1 - $i;
                endforeach;

            }

            //$paginacion->setStrNombrePagina("cformativo/cformativo.php");
            //$retval .= '<tr><td colspan="12" align="center">'. $paginacion->getStrPaginacion() .'</td></tr>';
            $retval .= '</table>';
            $retval .= '</fieldset>';
            return $retval;
        }

public function getStrDetallePersona()
        {
            $query = new clQuery();
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbdetallecformativo('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            CENTRO FORMATIVO<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO CENTRO FORMATIVO <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">DETALLE CENTRO FORMATIVO
                        </legend>
                       ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                    $retval .= '<tr>
                                    <td colspan="2" align="center">
                                        <a href="'. CFORMATIVO_URL .'cformativo.php">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" />REHRESAR LISTADO CENTRO FORMATIVO|</a>
                                    <td>
                                </tr>
                                ';
                    
                    $retval .= '<tr class="tablatitulo">
                                    <th colspan="2">DETALLE&nbsp;CENTRO FORMATIVO;REGISTRADO</th>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Código:</th>
                                    <td align="left">  '. $rst["id_centro_formativo"] .'</td>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Nombres:</th>
                                    <td align="left">  '. $rst["nombre"] .'</td>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Responsable:</th>
                                    <td align="left">  '. $rst["responsable"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Contacto:</th>
                                    <td align="left">  '. $rst["contacto"] .'</td>
                                </tr>
                                ';
                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Estado:</th>
                                    <td align="left">  '. $rst["estcfdescipcion"] .'</td>
                                </tr>
                                ';       
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Email:</th>
                                    <td align="left">  '. $rst["email"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Telefono:</th>
                                    <td align="left">  '. $rst["telefono_contacto"] .'</td>
                                </tr>
                                ';	
                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Número Estudiantes:</th>
                                    <td align="left">  '. $rst["num_estudiantes"] .'</td>
                                </tr>
                                ';    
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Número Estudiantes Discapacidad:</th>
                                    <td align="left">  '. $rst["num_estudiantes_disc"] .'</td>
                                </tr>
                                '; 	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Tipo Cnetro Formativo:</th>
                                    <td align="left">  '. $rst["tipocformativo_nombre"] .'</td>
                                </tr>
                                '; 	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Cobertura:</th>
                                    <td align="left">  '. $rst["cobertura_nombre"] .'</td>
                                </tr>
                                '; 		
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Experiencia:</th>
                                    <td align="left">  '. $rst["experiencia_nombre"] .'</td>
                                </tr>
                                '; 	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Experiencia:</th>
                                    <td align="left">  '. $rst["experiencia_nombre"] .'</td>
                                </tr>
                                '; 			
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Observación:</th>
                                    <td align="left">  '. $rst["observacion"] .'</td>
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
                                    <th align="right" class="bienvenida">Fijo:</th>
                                    <td align="left">  '. $rst["fijo"] .'</td>
                                </tr>
                                '; 
					 $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Móvil:</th>
                                    <td align="left">  '. $rst["movil"] .'</td>
                                </tr>
                                '; 
					 $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Fax:</th>
                                    <td align="left">  '. $rst["fax"] .'</td>
                                </tr>
                                '; 		
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Observación:</th>
                                    <td align="left">  '. $rst["observaciond"] .'</td>
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