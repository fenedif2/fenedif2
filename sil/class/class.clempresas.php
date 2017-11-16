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
	include_once( CLASS_PATH . "class.cltactividad.php" );
	include_once( CLASS_PATH . "class.cltipoempresa.php" );
	include_once( CLASS_PATH . "class.clgenero.php" );
	include_once( CLASS_PATH . "class.clecivil.php" );
	include_once( CLASS_PATH . "class.clnhijos.php" );
	include_once( CLASS_PATH . "class.clfconocer.php" );
	include_once( CLASS_PATH . "class.cltseguro.php" );
	include_once( CLASS_PATH . "class.cltlicencia.php" );
	include_once( CLASS_PATH . "class.cltfederacion.php" );
    class clEmpresas
    {
        private $StrCodigo;
        private $strNempresa;
		private $strTactividad;	
		private $strRuc;
		private $StrParqueadero;
		private $StrAtransporte;
		private $strNempleados;
		private $StrCdiscapacidad;
		private $StrCuantos;
		private $StrTipoempresa;
		private $StrPoseeweb;
		private $strSitioweb;
		private $StrObservaciones;
		private $strFechaIngreso;
		private $strEstado;
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
		private $strObservacion;
		private $strFijo;
		private $strFijo2;
		private $StrFax;
		private $StrNcontacto;
		private $StrCargo;
		private $StrCelular;
		private $StrFaxcont;
		private $strEmail;
		private $StrCsil;	
		private $StrSensibilizacion;
		private $StrFechas;
		private $StrObservacionemp;
        private $strEtiqueta;
        private $strNombreBoton;
        private $strValorBoton;
		private $strNombreBotons;
        private $strValorBotons;
        private $strLectura;

        public function __construct()
        {
				
            $this->StrCodigo = "";	
			$this->strNempresa = "";
            $this->strTactividad = "";
			$this->strEmail = "";
			$this->strEstado = "";
			$this->StrPoseeweb = "";
			$this->StrParqueadero = "";
			$this->StrTipoempresa = "";
			$this->StrAtransporte = "";
			$this->strNempleados = "";	
			$this->StrCdiscapacidad = "";
			$this->StrCuantos = "";
			$this->strProvincia = "";
            $this->strCanton = "";
            $this->strParroquia = "";
			$this->strSucursal = "";
			$this->StrObservaciones = "";
			$this->StrFconocer = "";
			$this->StrTseguro = "";
			$this->StrTiposeguro = "";
			$this->strFechaIngreso = "";
			$this->strObservacion= "";
			$this->StrNcontacto= "";
			$this->StrCargo= "";
			$this->StrCsil= "";
			$this->StrCelular= "";
			$this->StrFaxcont= "";
			$this->StrSensibilizacion= "";
			$this->StrFechas= "";
			$this->StrObservacionemp= "";
			$this->strCprincipal= "";
			$this->strNumero= "";
			$this->strTransversal= "";
			$this->strSector= "";
			$this->strPasaje= "";
			$this->strBarrio= "";
			$this->strManzana= "";
			$this->strSolar= "";
			$this->strFijo= "";
			$this->strFijo2= "";
			$this->StrFax= "";
			$this->strSitioweb = "";
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
           
////////////// Nempresa /////////////////////
        public function getstrNempresa()
        {
            return $this->strNempresa;
        }
		public function setstrNempresa($n)
        {
            $this->strNempresa = $n;
        }
////////////// Responsable /////////////////////		
		public function getstrTactividad()
        {
            return $this->strTactividad;
        }
  		public function setstrTactividad($rp)
        {
            $this->strTactividad = $rp;
        } 
//////////// Ruc////////////////// 
		public function getstrRuc()
        {
            return $this->strRuc;
        }
  		public function setstrRuc($ct)
        {
            $this->strRuc = $ct;
        } 
/////////////////////////////////// Observacionemp////////////////// 
		public function getStrObservacionemp()
        {
            return $this->strObservacionemp;
        }
  		public function setStrObservacionemp($ct)
        {
            $this->strObservacionemp = $ct;
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
/////////////////////////Fechas //////////////////////////
 	public function getStrFechas()
        {
            return $this->strFechas;
        }

        public function setStrFechas($et)
        {
            $this->strFechas = $et;
        }		
			
/////////////////////////Observaciones //////////////////////////
 	public function getStrObservaciones()
        {
            return $this->strObservaciones;
        }

        public function setStrObservaciones($et)
        {
            $this->strObservaciones = $et;
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
/////////////////////////Celular//////////////////////////
 	public function getStrCelular()
        {
            return $this->strCelular;
        }

        public function setStrCelular($et)
        {
            $this->strCelular= $et;
        }	
/////////////////////////Faxcont//////////////////////////
 	public function getStrFaxcont()
        {
            return $this->strFaxcont;
        }

        public function setStrFaxcont($et)
        {
            $this->strFaxcont= $et;
        }	
/////////////////////////Sensibilizacion//////////////////////////
 	public function getStrSensibilizacion()
        {
            return $this->strSensibilizacion;
        }

        public function setStrSensibilizacion($et)
        {
            $this->strSensibilizacion= $et;
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
/////////////////////////Cargo/////////////////////////
 	public function getStrCargo()
        {
            return $this->strCargo;
        }

        public function setStrCargo($et)
        {
            $this->strCargo= $et;
        }	
/////////////////////////Csil//////////////////////////
 	public function getStrCsil()
        {
            return $this->strCsil;
        }

        public function setStrCsil($et)
        {
            $this->strCsil= $et;
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
/////////////////////Poseeweb //////////////////////////////
		public function getStrPoseeweb()
	        {
	            return $this->StrPoseeweb;
	        }

        public function setStrPoseeweb($t)
	        {
	            $this->StrPoseeweb = $t;
	        }
/////////////////////////Parqueadero//////////////////////////////
		public function getStrParqueadero()
	        {
	            return $this->StrParqueadero;
	        }

        public function setStrParqueadero($ne)
	        {
	            $this->StrParqueadero = $ne;
	        }
////////////////////////Tipoempresa////////////////////////////////			
		public function getStrTipoempresa()
	        {
	            return $this->StrTipoempresa;
	        }

        public function setStrTipoempresa($ned)
	        {
	            $this->StrTipoempresa = $ned;
	        }
//////////////////////////////Atransporte//////////////////////////////////////////////////////	
		public function getStrAtransporte()
	        {
	            return $this->StrAtransporte;
	        }

        public function setStrAtransporte($tcf)
	        {
	            $this->StrAtransporte = $tcf;
	        }
//////////////////////////////Nempleados////////////////////////////////////////////////////
		public function getStrNempleados()
	        {
	            return $this->strNempleados;
	        }

        public function setStrNempleados($cb)
	        {
	            $this->strNempleados = $cb;
	        }
////////////////////////////////Cdiscapacidad//////////////////////////////////////////////////////////////////////
		public function getStrCdiscapacidad()
	        {
	            return $this->StrCdiscapacidad;
	        }

        public function setStrCdiscapacidad($exp)
	        {
	            $this->StrCdiscapacidad = $exp;
	        }

////////////////////////////////Cuantos //////////////////////////////////////
		public function getStrCuantos()
	        {
	            return $this->StrCuantos;
	        }

        public function setStrCuantos($ob)
	        {
	            $this->StrCuantos = $ob;
	        }
//////////////////////////Sitioweb //////////////////////////////////////////
public function getStrSitioweb()
        {
            return $this->strSitioweb;
        }

        public function setStrSitioweb($fn)
        {
            $this->strSitioweb = $fn;
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
/////////////////////////Fijo2//////////////////////////////////////////////////////////////
		public function getStrFijo2()
        {
            return $this->strFijo2;
        }

        public function setStrFijo2($cp)
        {
            $this->strFijo2= $cp;
        }

////////////////////////Fax///////////////////////////////////////////////////////////////
		public function getStrFax()
        {
            return $this->StrFax;
        }

        public function setStrFax($fa)
        {
            $this->StrFax= $fa;
        }
////////////////////////Ncontacto///////////////////////////////////////////////////////////////
		public function getStrNcontacto()
        {
            return $this->StrNcontacto;
        }

        public function setStrNcontacto($fa)
        {
            $this->StrNcontacto= $fa;
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
///////////////////////////////nombre//////////////////////////////////
		public function getStrNombreBotons()
        {
            return $this->strNombreBotons;
        }

        public function setStrNombreBotons($nb)
        {
            $this->strNombreBotons = $nb;
        }
//////////////////////////////////valor//////////////////////////////////////
 		public function getStrValorBotons()
        {
            return $this->strValorBotons;
        }

        public function setStrValorBotons($vb)
        {
            $this->strValorBotons = $vb;
        }
////////////////////////////////////////////////////////////////////////////
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
			$tactividad = new clTactividad();
			$parqueadero= new clExperiencia();
			$atrasporte= new clExperiencia();
			$poseeweb= new clExperiencia();
			$sensibilizacion= new clExperiencia();
			$tipoempresa= new clTipoempresa();
			
			
			$csil= new clFconocer();
			$tseguro= new clExperiencia();
			$tiposeguro= new clTseguro();
			
			
			
			
			
			
			
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
                                    $(\'#frmempresas\').validate({
                                            rules:{
	                                            	strNempresa: { required: true},
	                                            	lsTactividad: { required: true},
	                                            	strRuc: { required: true},
	                                            	lsParqueadero: { required: true},
	                                            	lsAtransporte: { required: true},
	                                            	strNempleados: { required: true},
	                                            	strCdiscapacidad: { required: true},
	                                            	strCuantos: { required: true},
	                                            	lsTipoempresa: { required: true},
	                                            	lsPoseeweb: { required: true},
	                                               	lsEstado: { required: true}
                                                                                    
     					                           },
                                            messages:{
                                                	strNempresa: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                                	lsTactividad: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                                	strRuc: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                                	lsParqueadero: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                                	lsAtransporte: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                                	strNempleados: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                                	strCdiscapacidad: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                                	strCuantos: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                                	lsTipoempresa: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                                	lsPoseeweb: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
                                                	lsEstado: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"}
 		
												     }
                                    });
                                    
                                    $("#lsProvincia").change(function () {
                                    $("#lsProvincia option:selected").each(function () {
                                            var provincia = $(this).val();
                                            $.post( "'. EMPRESAS_URL .'empresas.php", { btnBuscar: "Canton",
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
                                            $.post( "'. EMPRESAS_URL .'empresas.php", { btnBuscar: "Parroquia",
                                                                                      strCodigoCanton: canton                                                                                      
                                                                                    },
                                        function(data){
                                                $("#lsParroquia").html(data);                                                
                                        });
                                    });
                                 });
								 $("#lsPoseeweb").change(function() 
	                 				{
								  		if($(this).val() == "1") 
										  	{
											   	$("#StrSitioweb").removeAttr("disabled");
												$("#StrSitioweb").css("background-color", "#FFFFFF");
											}
											  	else 
											  		{
											  	 	$("#StrSitioweb").attr("disabled", "disabled");
													$("#StrSitioweb").css("background-color", "#F5DA81"); 
													}
									});
								$("#lsSensibilizacion").change(function() 
	                 				{
								  		if($(this).val() == "1") 
										  	{
											   	$("#dtFechas").removeAttr("disabled");
												$("#dtFechas").css("background-color", "#FFFFFF");
											}
											  	else 
											  		{
											  	 	$("#dtFechas").attr("disabled", "disabled");
													$("#dtFechas").css("background-color", "#F5DA81"); 
													}
									});	 
										
										
										
															 
								 
                            });
                        </script>
                       ';
		  
            $retval .= '<form id="frmempresas" action="'. EMPRESAS_URL .'empresas.php" method="POST">';

            $Regresar = "regresar('". EMPRESAS_URL . "empresas.php')";

            $retval .= '<fieldset class="fieldsetPequeno">';
            $retval .= '<legend class="etiquetaborde">
                            EMPRESA <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO EMPRESA<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> '. $this->getStrEtiqueta() .'
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
							  	<td  align="right"><b>Nombre de la Empresa:</b></td>
							    <td align="left">
                                    <input class="textbox" id="strNempresa" name="strNempresa" type="text" maxlength="100" value="'. $this->getstrNempresa() .'" />
								</td>
                             	<td align="right"><b>Sector de Actividad:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsTactividad" id="lsTactividad"  class="combobox">
	                                        '. $tactividad->getStrListar($this->getstrTactividad()) .'
	                                    </select>
                                </td> 
                            </tr>
                            <tr class="formulariofila1">
                                <td  align="right"><b>Ruc:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strRuc" name="strRuc" type="text" maxlength="50" value="'. $this->getstrRuc() .'" />
                                </td>
                             	<td align="right"><b>Parqueadero para Trabajadores:&nbsp;</b></td>
                                <td align="left">                                    
                                    <select name="lsParqueadero" id="lsParqueadero"  class="combobox">
                                        '. $parqueadero->getStrListar($this->getStrParqueadero()) .'
                                    </select>
                                </td>
                             	
                            </tr>
                             <tr class="formulariofila1">
                                <td align="right"><b>Acceso al Transporte:&nbsp;</b></td>
                                <td align="left">                                    
                                    <select name="lsAtransporte" id="lsAtransporte"  class="combobox">
                                        '. $atrasporte->getStrListar($this->getStrAtransporte()) .'
                                    </select>
                                </td>
                                 <td  align="right"><b>Número de Empleados:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strNempleados" name="strNempleados" type="text" maxlength="50" value="'. $this->getStrNempleados() .'" />
                                </td>
                            </tr>
                            <tr class="formulariofila1">
                               <td  align="right"><b>Con Discapacidad:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strCdiscapacidad" name="strCdiscapacidad" type="text" maxlength="50" value="'. $this->getStrCdiscapacidad() .'" />
                                </td>
                                <td  align="right"><b>Cuantos debe tener:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strCuantos" name="strCuantos" type="text" maxlength="50" value="'. $this->getStrCuantos() .'" />
                                </td>
                            </tr>
                            <tr class="formulariofila1">
                            	<td align="right"><b>Tipo Empresa:&nbsp;</b></td>
                                <td align="left">                                    
                                    <select name="lsTipoempresa" id="lsTipoempresa"  class="combobox">
                                        '. $tipoempresa->getStrListar($this->getStrTipoempresa()) .'
                                    </select>
                                </td>
                                <td align="right"><b>Su Empresa Posee sitio web:&nbsp;</b></td>
                                <td align="left">                                    
                                    <select name="lsPoseeweb" id="lsPoseeweb"  class="combobox">
                                        '. $poseeweb->getStrListar($this->getStrPoseeweb()) .'
                                    </select>
                                </td>
                            </tr>
                            <tr class="formulariofila1">
                               <td  align="right"><b>Sitio Web:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="StrSitioweb" name="StrSitioweb" type="text" maxlength="50" value="'. $this->getStrSitioweb() .'" />
                                </td>
                               <td  align="right"><b>Observaciones:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="StrObservaciones" name="StrObservaciones" type="text" maxlength="50" value="'. $this->getStrObservaciones() .'" />
                                </td>
                             	
                            </tr>
                            <tr class="formulariofila1">
                               <td align="right"><b>Estado:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsEstado" id="lsEstado"  class="combobox">
	                                        '. $estado->getStrListar($this->getStrEstado()) .'
	                                    </select>
                                </td> 
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
            $ProcedimientoAlmacenado = sprintf("CALL spingresarempresas('%s','%s','%s','%s','%s','%s',
			'%s','%s','%s','%s','%s','%s','%s','%s','%s','%s');",
            $this->getstrNempresa(),$this->getstrTactividad(),$this->getstrRuc(),$this->getStrParqueadero(),$this->getStrAtransporte(),
            $this->getStrNempleados(),$this->getStrCdiscapacidad(),$this->getStrCuantos(),$this->getStrTipoempresa(),$this->getStrPoseeweb(),
            $this->getStrSitioweb(),$this->getStrObservaciones(),$this->getStrEstado(),$this->getStrFechaIngreso(),$_SESSION["usuario"]["cuenta"],
            $_SESSION["usuario"]["suc"]);
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Nempresa= [ '. $this->getstrNempresa().' ] Em@il = [ '.$this->getStrEmail().' ] Fecha_Ingreso= [ '. $this->getStrFechaIngreso().' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s','%s','%s','%s');", $_SESSION["usuario"]["cuenta"], 'GUARDAR', 'tempresa', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL spactualizarempresa('%s','%s','%s','%s','%s','%s',
			'%s','%s','%s','%s','%s','%s','%s','%s','%s');",
            $this->getStrCodigo(),$this->getstrNempresa(),$this->getstrTactividad(),$this->getstrRuc(),$this->getStrParqueadero(),$this->getStrAtransporte(),
            $this->getStrNempleados(),$this->getStrCdiscapacidad(),$this->getStrCuantos(),$this->getStrTipoempresa(),$this->getStrPoseeweb(),
            $this->getStrSitioweb(),$this->getStrObservaciones(),$this->getStrEstado(),$this->getStrFechaIngreso());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Nempresa= [ '. $this->getstrNempresa().' ] Em@il = [ '.$this->getStrEmail().' ] Fecha_Ingreso= [ '. $this->getStrFechaIngreso().' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s','%s','%s','%s');", $_SESSION["usuario"]["cuenta"], 'ACTUALIZAR', 'tempresa', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL speliminarempresa('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlInsertUpdateDelete();

           if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Nempresa= [ '. $this->getstrNempresa().' ] Em@il = [ '.$this->getStrEmail().' ] Fecha_Ingreso= [ '. $this->getStrFechaIngreso().' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s','%s','%s','%s');", $_SESSION["usuario"]["cuenta"], 'G', 'Empresas', $descripcion);
                $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
                $query->getStrSqlInsertUpdateDelete();
                $resultado = true;
                $resultado = true;
            }

            return $resultado;
        }
	public function getStrBuscarr() {
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $cf=$_SESSION["usuario"]["suc"];
			$me=$_SESSION["usuario"]["cuenta"];
            $ProcedimientoAlmacenado = sprintf("CALL spbidentificadoremp('%d','%d');","$cf","$me");
			$query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
            foreach( $resultado as $rst):   
				$valor=$rst['id_empresa'];
		    endforeach;
            }
		     return $valor;
        }
 	public function getStrBuscar() {
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbempresas('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
            foreach( $resultado as $rst):   
		    $this->setstrNempresa($rst["nombre"]);
            $this->setstrTactividad($rst["actividad_id"]);
			$this->setstrRuc($rst["ruc"]);
			$this->setStrParqueadero($rst["parqueadero"]); 
			$this->setStrAtransporte($rst["transporte"]);
			$this->setStrNempleados($rst["num_empleados"]); 
			$this->setStrCdiscapacidad($rst["num_empleados_dis"]);
			$this->setStrCuantos($rst["cuantos_emp"]);
			$this->setStrTipoempresa($rst["id_tipo_empresa"]);
			$this->setStrPoseeweb($rst["poseesitio"]);
			$this->setStrSitioweb($rst["sitioweb"]);
			$this->setStrObservaciones($rst["observaciones"]);
			$this->setStrEstado($rst["estado"]);
			$this->setStrFechaIngreso($rst["fecha_ingreso"]);
			
						
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
			//$valor=$_SESSION["usuario"]["cuenta"];
			$ProcedimientoAlmacenado = sprintf("CALL sptotalempresas('%d');", $sucursal);
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
			//$va=$_SESSION["usuario"]["cuenta"];
			$ProcedimientoAlmacenado = sprintf("CALL splistarempresas('%d','%d','%d');","$re", "$pa","$cf");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            EMPRESA<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO EMPRESAS</legend>
                       ';
            $retval .= '
                        <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                            <tr>
                                <td colspan="12" align="center"><div class="vtip" title="Ingreso<br> [NUEVA EMPRESA]">
                                    <a href="'.EMPRESAS_URL.'empresas.php?btnNuevo=Nuevo">| <img src="'. IMAGENES_PATH .'/rptstocksucursal.png" title="" width="16px" height="16px"  border="0" /><img src="'. IMAGENES_PATH .'/nuevo.png" title="" width="16px" height="16px"  border="0" />NUEVA EMPRESA|</a>
                                </div><td>
                            </tr>';
                           	$paginacion->setStrNombrePagina("empresas/empresas.php");
            				$retval .= '<tr><td colspan="12" align="center">'. $paginacion->getStrPaginacion() .'</td></tr>
                            <tr class="tablatitulo">
                                <th colspan="17">LISTADO EMPRESAS REGISTRADOS</th>
                            </tr>
                            <tr class="tablasubtitulo">
                                <th align="center"> </th> 
                                <th align="center">Id</th>                                                             
                                <th align="center">Nombre</th>
                                
                                <th align="center">Dirección Empresa</th>
                                <th align="center">Contacto</th>
                                <th align="center">Análisis del Puesto</th>
                                <th align="center">Formación Requerida</th>
                                <th align="center">Requerimientos Puesto</th>
                                <th align="center">Horario</th>
                                <th align="center">Capacidades</th>
                                <th align="center" colspan="3">Acciones</th>
                            </tr>
                        ';
 
            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["id_empresa"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["nombre"] .'</td>';
                   
                    $retval .= 	'<td align="center"><div class="vtip" title="Dirección Empresa <br> [ codigo = '.$rst["id_empresa"] .' ]">';
					 $retval .=  '<a href="'. TDIREMPRESA_URL.'tdirempresa.php?btnNuevo=Nuevo&strCodigo='. $rst["id_empresa"] .'"><img src="'. IMAGENES_PATH .'/accesibilidad.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Contacto Empresa <br> [ codigo = '.$rst["id_empresa"] .' ]">';
					 $retval .=  '<a href="'. TCONTACTOEMP_URL.'tcontactoemp.php?btnNuevo=Nuevo&strCodigo='. $rst["id_empresa"] .'"><img src="'. IMAGENES_PATH .'/accesibilidad.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Analisis del Puesto <br> [ codigo = '.$rst["id_empresa"] .' ]">';
					 $retval .=  '<a href="'. APUESTO_URL.'apuesto.php?btnNuevo=Nuevo&strCodigo='. $rst["id_empresa"] .'"><img src="'. IMAGENES_PATH .'/accesibilidad.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Formación I<br> [ codigo = '.$rst["id_empresa"] .' ]">';
					$retval .=  '<a href="'. TFORMACIONREMP_URL.'tformacionremp.php?btnNuevo=Nuevo&strCodigo='. $rst["id_empresa"] .'"><img src="'. IMAGENES_PATH .'/perfil.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Datos Laborales<br> [ codigo = '.$rst["id_empresa"] .' ]">';
					$retval .=  '<a href="'. TREQUISITOSEMP_URL.'trequisitosemp.php?btnNuevo=Nuevo&strCodigo='. $rst["id_empresa"] .'"><img src="'. IMAGENES_PATH .'/formativa.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                  	$retval .= 	'<td align="center"><div class="vtip" title="Orientacion<br> [ codigo = '.$rst["id_empresa"] .' ]">';
					$retval .=  '<a href="'. THORARIOEMP_URL.'thorarioemp.php?btnNuevo=Nuevo&strCodigo='. $rst["id_empresa"] .'"><img src="'. IMAGENES_PATH .'/rptstocksucursal.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Competencias..<br> [ codigo = '.$rst["id_empresa"] .' ]">';
					$retval .=  '<a href="'. DFUNCIONES_URL.'dfunciones.php?btnNuevo=Nuevo&strCodigo='. $rst["id_empresa"] .'"><img src="'. IMAGENES_PATH .'/cursos.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					/*$retval .= 	'<td align="center"><div class="vtip" title="Empleo y Formación<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. EMPLEOF_URL.'empleof.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/redactar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                   	$retval .= 	'<td align="center"><div class="vtip" title="Curriculom<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. CURRICULUM_URL.'empleof.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/pdf.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Test<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. TEST_URL.'test.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/contactanos.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';*/
                    
					$retval .= 	'<td align="center"><div class="vtip" title="ACTUALIZAR EMPRESA <br> [ codigo = '.$rst["id_empresa"] .' ]">';
                    $retval .=  '<a href="'. EMPRESAS_URL .'empresas.php?btnActualizar=Actualizar&strCodigo='. $rst["id_empresa"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    if($_SESSION["usuario"]["tipo"]==2 || $_SESSION["usuario"]["tipo"]==1 )
							{
                    $retval .= 	'<td align="center"><div class="vtip" title="ELIMINAR EMPRESA <br> [ codigo = '.$rst["id_empresa"] .' ]">';
                    $retval .=  '<a href="'. EMPRESAS_URL .'empresas.php?btnEliminar=Eliminar&strCodigo='. $rst["id_empresa"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
							}
                    $retval .= 	'<td align="center"><div class="vtip" title="DETALLE EMPRESA <br> [ codigo = '.$rst["id_empresa"] .' ]">';
                    $retval .=  '<a href="'. EMPRESAS_URL .'empresas.php?btnDetalle=Detalle&strCodigo='. $rst["id_empresa"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                    $i = 1 - $i;
                endforeach;
            }

            //$paginacion->setStrNombrePagina("empresas/empresas.php");
            //$retval .= '<tr><td colspan="12" align="center">'. $paginacion->getStrPaginacion() .'</td></tr>';
            $retval .= '</table>';
            $retval .= '</fieldset>';
            return $retval;
        }
 public function getStrListarr($cod)
        {
            $paginacion = new clPaginacion();
            $query = new clQuery();

            //Nombre Procedimientos Almacenados
            $sucursal=$_SESSION["usuario"]["suc"];
			//$valor=$_SESSION["usuario"]["cuenta"];
			$ProcedimientoAlmacenado = sprintf("CALL sptotalempresass('%d');", $cod);
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
			//$va=$_SESSION["usuario"]["cuenta"];
			$ProcedimientoAlmacenado = sprintf("CALL splistarempresass('%d','%d','%d');","$re", "$pa","$cod");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            EMPRESA<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO EMPRESAS</legend>
                       ';
            $retval .= '
                        <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                            <tr>
                                <td colspan="12" align="center"><div class="vtip" title="Ingreso<br> [NUEVA EMPRESA]">
                                    <a href="'.EMPRESAS_URL.'empresas.php?btnNuevo=Nuevo">| <img src="'. IMAGENES_PATH .'/rptstocksucursal.png" title="" width="16px" height="16px"  border="0" /><img src="'. IMAGENES_PATH .'/nuevo.png" title="" width="16px" height="16px"  border="0" />NUEVA EMPRESA|</a>
                                </div><td>
                            </tr>';
                           	$paginacion->setStrNombrePagina("empresas/empresas.php");
            				$retval .= '<tr><td colspan="12" align="center">'. $paginacion->getStrPaginacion() .'</td></tr>
                            <tr class="tablatitulo">
                                <th colspan="17">LISTADO EMPRESAS REGISTRADOS</th>
                            </tr>
                            <tr class="tablasubtitulo">
                                <th align="center"> </th> 
                                <th align="center">Id</th>                                                             
                                <th align="center">Nombre</th>
                                
                                <th align="center">Dirección Empresa</th>
                                <th align="center">Contacto</th>
                                <th align="center">Análisis del Puesto</th>
                                <th align="center">Formación Requerida</th>
                                <th align="center">Requerimientos Puesto</th>
                                <th align="center">Horario</th>
                                <th align="center">Capacidades</th>
                                <th align="center" colspan="3">Acciones</th>
                            </tr>
                        ';
 
            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["id_empresa"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["nombre"] .'</td>';
                   
                    $retval .= 	'<td align="center"><div class="vtip" title="Dirección Empresa <br> [ codigo = '.$rst["id_empresa"] .' ]">';
					 $retval .=  '<a href="'. TDIREMPRESA_URL.'tdirempresa.php?btnNuevo=Nuevo&strCodigo='. $rst["id_empresa"] .'"><img src="'. IMAGENES_PATH .'/accesibilidad.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Contacto Empresa <br> [ codigo = '.$rst["id_empresa"] .' ]">';
					 $retval .=  '<a href="'. TCONTACTOEMP_URL.'tcontactoemp.php?btnNuevo=Nuevo&strCodigo='. $rst["id_empresa"] .'"><img src="'. IMAGENES_PATH .'/accesibilidad.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Analisis del Puesto <br> [ codigo = '.$rst["id_empresa"] .' ]">';
					 $retval .=  '<a href="'. APUESTO_URL.'apuesto.php?btnNuevo=Nuevo&strCodigo='. $rst["id_empresa"] .'"><img src="'. IMAGENES_PATH .'/accesibilidad.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Formación I<br> [ codigo = '.$rst["id_empresa"] .' ]">';
					$retval .=  '<a href="'. TFORMACIONREMP_URL.'tformacionremp.php?btnNuevo=Nuevo&strCodigo='. $rst["id_empresa"] .'"><img src="'. IMAGENES_PATH .'/perfil.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Datos Laborales<br> [ codigo = '.$rst["id_empresa"] .' ]">';
					$retval .=  '<a href="'. TREQUISITOSEMP_URL.'trequisitosemp.php?btnNuevo=Nuevo&strCodigo='. $rst["id_empresa"] .'"><img src="'. IMAGENES_PATH .'/formativa.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                  	$retval .= 	'<td align="center"><div class="vtip" title="Orientacion<br> [ codigo = '.$rst["id_empresa"] .' ]">';
					$retval .=  '<a href="'. THORARIOEMP_URL.'thorarioemp.php?btnNuevo=Nuevo&strCodigo='. $rst["id_empresa"] .'"><img src="'. IMAGENES_PATH .'/rptstocksucursal.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Competencias..<br> [ codigo = '.$rst["id_empresa"] .' ]">';
					$retval .=  '<a href="'. DFUNCIONES_URL.'dfunciones.php?btnNuevo=Nuevo&strCodigo='. $rst["id_empresa"] .'"><img src="'. IMAGENES_PATH .'/cursos.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					/*$retval .= 	'<td align="center"><div class="vtip" title="Empleo y Formación<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. EMPLEOF_URL.'empleof.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/redactar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                   	$retval .= 	'<td align="center"><div class="vtip" title="Curriculom<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. CURRICULUM_URL.'empleof.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/pdf.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Test<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. TEST_URL.'test.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/contactanos.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';*/
                    
					$retval .= 	'<td align="center"><div class="vtip" title="ACTUALIZAR EMPRESA <br> [ codigo = '.$rst["id_empresa"] .' ]">';
                    $retval .=  '<a href="'. EMPRESAS_URL .'empresas.php?btnActualizar=Actualizar&strCodigo='. $rst["id_empresa"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    if($_SESSION["usuario"]["tipo"]==2 || $_SESSION["usuario"]["tipo"]==1 )
							{
                    $retval .= 	'<td align="center"><div class="vtip" title="ELIMINAR EMPRESA <br> [ codigo = '.$rst["id_empresa"] .' ]">';
                    $retval .=  '<a href="'. EMPRESAS_URL .'empresas.php?btnEliminar=Eliminar&strCodigo='. $rst["id_empresa"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
							}
                    $retval .= 	'<td align="center"><div class="vtip" title="DETALLE EMPRESA <br> [ codigo = '.$rst["id_empresa"] .' ]">';
                    $retval .=  '<a href="'. EMPRESAS_URL .'empresas.php?btnDetalle=Detalle&strCodigo='. $rst["id_empresa"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                    $i = 1 - $i;
                endforeach;
            }

            //$paginacion->setStrNombrePagina("empresas/empresas.php");
            //$retval .= '<tr><td colspan="12" align="center">'. $paginacion->getStrPaginacion() .'</td></tr>';
            $retval .= '</table>';
            $retval .= '</fieldset>';
            return $retval;
        }
public function getStrDetallePersona()
        {
            $query = new clQuery();
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbdetalleempresas('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            EMPRESAs<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO EMPRESAS<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">DETALLE EMPRESAS
                        </legend>
                       ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                    $retval .= '<tr>
                                    <td colspan="2" align="center">
                                        <a href="'. EMPRESAS_URL .'empresas.php">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" />REGRESAR LISTADO EMPRESA|</a>
                                    <td>
                                </tr>
                                ';
                    
                    $retval .= '<tr class="tablatitulo">
                                    <th colspan="2">DETALLE&nbsp;EMPRESA;REGISTRADO</th>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Código:</th>
                                    <td align="left">  '. $rst["id_empresa"] .'</td>
                                </tr>
                                ';
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Nombre de la Empresa:</th>
                                    <td align="left">  '. $rst["nombre"] .'</td>
                                </tr>
                                ';            
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Sector de Actividad:</th>
                                    <td align="left">  '. $rst["tactividad_descripcion"] .':   '. $rst["identificacion"] .'</td>
                                </tr>
                                ';
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Ruc:</th>
                                    <td align="left">  '. $rst["ruc"] .'</td>
                                </tr>
                                ';  
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Parqueadero para Trabajadores:</th>
                                    <td align="left">  '. $rst["parqueadero"] .'</td>
                                </tr>
                                ';  			
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Acceso al Transporte:</th>
                                    <td align="left">  '. $rst["transporte"] .'</td>
                                </tr>
                                ';  
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Número de Empleados:</th>
                                    <td align="left">  '. $rst["num_empleados"] .'</td>
                                </tr>
                                ';  	
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Con Discapacidad:</th>
                                    <td align="left">  '. $rst["num_empleados_dis"] .'</td>
                                </tr>
                                ';  	
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Cuantos debe tener:</th>
                                    <td align="left">  '. $rst["cuantos_emp"] .'</td>
                                </tr>
                                ';  
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Tipo Empresa:</th>
                                    <td align="left">  '. $rst["tipocformativo_nombre"] .'</td>
                                </tr>
                                ';  	
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Su Empresa Posee sitio web:</th>
                                    <td align="left">  '. $rst["poseeweb"] .'</td>
                                </tr>
                                ';  	
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Sitio Web:</th>
                                    <td align="left">  '. $rst["sitioweb"] .'</td>
                                </tr>
                                ';  	
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Observaciones:</th>
                                    <td align="left">  '. $rst["observaciones"] .'</td>
                                </tr>
                                ';  	
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Estado:</th>
                                    <td align="left">  '. $rst["estado"] .'</td>
                                </tr>
                                ';  	
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Fecha Ingreso:</th>
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