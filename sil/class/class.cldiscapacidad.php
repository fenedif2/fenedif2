<?php	
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.validaciones.php' );
    include_once( CLASS_PATH . "class.clquery.php" );
    include_once( CLASS_PATH . "class.clpaginacion.php" );   
	include_once( CLASS_PATH . "class.cltdiscapacidad.php" ); 
	include_once( CLASS_PATH . "class.clpafectadas.php" ); 
	include_once( CLASS_PATH . "class.cltnivelavance.php" ); 
	include_once( CLASS_PATH . "class.clexperiencia.php" );
	include_once( CLASS_PATH . "class.clnhijos.php" );
	include_once( CLASS_PATH . "class.cltqgarante.php" );
	include_once( CLASS_PATH . "class.clodiscapacidad.php" ); 
	include_once( CLASS_PATH . "class.cltporcentaje.php" ); 
	include_once( CLASS_PATH . "class.cltayudaeconomica.php" ); 
	include_once( CLASS_PATH . "class.clestadod.php" ); 
	include_once( CLASS_PATH . "class.clatecnicas.php" ); 
	include_once( CLASS_PATH . "class.cltseguro.php" ); 
	include_once( CLASS_PATH . "class.cltratamiento.php" ); 
	include_once( CLASS_PATH . "class.clthorario.php" ); 
    class clDiscapacidad
    {
        private $StrTdiscapacidad;	
		private $StrPafectadas;	
		private $StrTnivelavance;
		private $StrObservaciones;
		private $StrPdiscapacidad;	
		private $StrNdiscapacidad;	
		private $StrParentezco;
		private $StrTdiscapacidadp;
		private $StrOdiscapacidad;
		private $StrDiagnostico;
		private $StrObservacionorigen;
		private $StrTporcentaje;
		private $strFechaIngreso;
		private $strTayuda;
		private $strTayudaeconomica;
		private $strEstadod;
		private $strAtecnicas;
		private $strCrehabilitacion;
		private $strTipocentro;
		private $strTratamiento;
		private $strTratamientod;
		private $strThorario;
		private $StrObservacionc;
		
        private $StrCodigo;
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
           $this->StrTdiscapacidad = ""; 
		   $this->StrPafectadas = ""; 
		   $this->StrTnivelavance = ""; 
		   $this->StrObservaciones = ""; 
		   $this->StrPdiscapacidad = ""; 
		   $this->StrNdiscapacidad= ""; 
		   $this->StrParentezco= ""; 
		   $this->StrTdiscapacidadp = ""; 
		   $this->StrOdiscapacidad = ""; 
		   $this->StrDiagnostico = ""; 
		   $this->StrObservacionorigen = ""; 
		   $this->StrTporcentaje = ""; 
		   $this->strFechaIngreso = "";
		   $this->strTayuda = "";
		   $this->strEstadod = "";
			$this->strAtecnicas = "";
			$this->strCrehabilitacion = "";
			$this->strTipocentro = "";
			$this->strTratamiento = "";
			$this->strTratamientod = "";
			$this->strThorario = "";
			$this->StrObservacionc = ""; 
			 
		   	$this->StrCodigo = "";	
		    $this->strEtiqueta = "";
            $this->strNombreBoton = "";
            $this->strValorBoton = "";
			$this->strNombreBotons = "";
            $this->strValorBotons = "";
			$this->strNombreBotona = "";
            $this->strValorBotona = "";
            $this->strLectura = "";
		}
////////////// Tipo de Discapacidad  /////////////////////
        public function getStrTdiscapacidad()
        {
            return $this->StrTdiscapacidad;
        }
		public function setStrTdiscapacidad($n)
        {
            $this->StrTdiscapacidad = $n;
        }
////////////// Atecnicas  /////////////////////
        public function getStrAtecnicas()
        {
            return $this->StrAtecnicas;
        }
		public function setStrAtecnicas($n)
        {
            $this->StrAtecnicas = $n;
        }	
////////////// Thorario  /////////////////////
        public function getStrThorario()
        {
            return $this->StrThorario;
        }
		public function setStrThorario($n)
        {
            $this->StrThorario = $n;
        }			
////////////// Observacionc /////////////////////
        public function getStrObservacionc()
        {
            return $this->StrObservacionc;
        }
		public function setStrObservacionc($n)
        {
            $this->StrObservacionc = $n;
        }					
////////////// Tratamiento  /////////////////////
        public function getStrTratamiento()
        {
            return $this->StrTratamiento;
        }
		public function setStrTratamiento($n)
        {
            $this->StrTratamiento= $n;
        }		
////////////// Tratamientod  /////////////////////
        public function getStrTratamientod()
        {
            return $this->StrTratamientod;
        }
		public function setStrTratamientod($n)
        {
            $this->StrTratamientod= $n;
        }					
////////////// Tipocentro  /////////////////////
        public function getStrTipocentro()
        {
            return $this->StrTipocentro;
        }
		public function setStrTipocentro($n)
        {
            $this->StrTipocentro= $n;
        }			
////////////// Crehabilitacion  /////////////////////
        public function getStrCrehabilitacion()
        {
            return $this->StrCrehabilitacion;
        }
		public function setStrCrehabilitacion($n)
        {
            $this->StrCrehabilitacion = $n;
        }			
////////////// Estado Discapacidad  /////////////////////
        public function getStrEstadod()
        {
            return $this->StrEstadod;
        }
		public function setStrEstadod($n)
        {
            $this->StrEstadod = $n;
        }		
////////////// Tipo de Ayuda  /////////////////////
        public function getStrTayuda()
        {
            return $this->StrTayuda;
        }
		public function setStrTayuda($n)
        {
            $this->StrTayuda= $n;
        }	
////////////// Tipo de Ayuda Economica /////////////////////
        public function getStrTayudaeconomica()
        {
            return $this->StrTayudaeconomica;
        }
		public function setStrTayudaeconomica($n)
        {
            $this->StrTayudaeconomica= $n;
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
////////////// Porcentaje  /////////////////////
        public function getStrTporcentaje()
        {
            return $this->StrTporcentaje;
        }
		public function setStrTporcentaje($n)
        {
            $this->StrTporcentaje = $n;
        }		
////////////// Diagnostico /////////////////////
        public function getStrDiagnostico()
        {
            return $this->StrDiagnostico;
        }
		public function setStrDiagnostico($n)
        {
            $this->StrDiagnostico = $n;
        }	
////////////// Observacionorigen /////////////////////
        public function getStrObservacionorigen()
        {
            return $this->StrObservacionorigen;
        }
		public function setStrObservacionorigen($n)
        {
            $this->StrObservacionorigen = $n;
        }				
////////////// Origen de Discapacidad  /////////////////////
        public function getStrOdiscapacidad()
        {
            return $this->StrOdiscapacidad;
        }
		public function setStrOdiscapacidad($n)
        {
            $this->StrOdiscapacidad = $n;
        }		
////////////// Tipo de Discapacidad  Pariente/////////////////////
        public function getStrTdiscapacidadp()
        {
            return $this->StrTdiscapacidadp;
        }
		public function setStrTdiscapacidadp($n)
        {
            $this->StrTdiscapacidadp = $n;
        }		
////////////// Parentezco  /////////////////////
        public function getStrParentezco()
        {
            return $this->StrParentezco;
        }
		public function setStrParentezco($n)
        {
            $this->StrParentezco= $n;
        }		
////////////// Numero de Discapacidad /////////////////////
        public function getStrNdiscapacidad()
        {
            return $this->StrNdiscapacidad;
        }
		public function setStrNdiscapacidad($n)
        {
            $this->StrNdiscapacidad = $n;
        }		
////////////// Parientes con Discapacidad  /////////////////////
        public function getStrPdiscapacidad()
        {
            return $this->StrPdiscapacidad;
        }
		public function setStrPdiscapacidad($n)
        {
            $this->StrPdiscapacidad= $n;
        }		
////////////// Nivel Avance  /////////////////////
        public function getStrTnivelavance()
        {
            return $this->StrTnivelavance;
        }
		public function setStrTnivelavance($n)
        {
            $this->StrTnivelavance = $n;
        }      
////////////// Observaciones /////////////////////
        public function getStrObservaciones()
        {
            return $this->StrObservaciones;
        }
		public function setStrObservaciones($n)
        {
            $this->StrObservaciones = $n;
        }        		  
////////////// Parte Afectadas /////////////////////
        public function getStrPafectadas()
        {
            return $this->StrPafectadas;
        }
		public function setStrPafectadas($n)
        {
            $this->StrPafectadas = $n;
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
////////////////////// Nombre ///////////////////////////////
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
//////////////////////////valor////////////////////////////////
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
//////////////////////////////////////////////////////////
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
            
		$tdiscapacidad = new clTdiscapacidad();	
		$pafectadas= new clPafectadas();	
		$tnivelavance= new clTnivelavance();
		$pdiscapacidad= new clExperiencia();
		$ndiscapacidad= new clNhijos();
		$parentezco= new clTqgarante();
		$tdiscapacidadp = new clTdiscapacidad();	
		$odiscapacidad = new clOdiscapacidad();
		$tporcentaje = new clTporcentaje();
		$tayuda = new clExperiencia();
		$tayudaeconomica = new clTayudaeconomica();
		$estadod = new clEstadod();
		$atecnicas= new clAtecnicas();
		$crehabilitacion= new clExperiencia();
		$tipocentro= new clTseguro();
		$tratamiento= new clExperiencia();
		$tratamientod= new clTratamiento();
		$thorario= new clThorario();
		
          $retval  = '<script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.validate.js"></script>
                        <script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.metadata.js"></script>
                       ';

            $retval .= '<br><br><br><br>
                        <script>
                            $(document).ready(function(){
                                    $.metadata.setType( \'attr\', \'validate\' );
                                    $(\'#frmdiscapacidad\').validate({
                                            rules:{
                                             
                                                  },
                                            messages:{
                                              	 
												     }
                                    });
									$("#lsTdiscapacidad").change(function () {
                                    $("#lsTdiscapacidad option:selected").each(function () {
                                            var tdiscapacidad = $(this).val();
                                            $.post( "'. DISCAPACIDAD_URL.'discapacidad.php", { btnBuscar: "pafectadas",
                                                                                      strCodigoTdiscapacidad: tdiscapacidad
                                                                                    },
                                        function(data){
                                                $("#lsPafectadas").html(data);
                                        });
                                    });
                                 });
								  $("#lsPafectadas").change(function () {
                                    $("#lsPafectadas option:selected").each(function () {
                                            var pafectadas = $(this).val();
                                            $.post( "'. DISCAPACIDAD_URL.'discapacidad.php", { btnBuscar: "tnivelavance",
                                                                                      strCodigoPafectadas: pafectadas                                                                                      
                                                                                    },
                                        function(data){
                                                $("#lsTnivelavance").html(data);                                                
                                        });
                                    });
                                 });
								 
								$("#lsTdiscapacidad").change(function() 
	                 				{
								  		if($(this).val() == "8" || $(this).val() == "7" || $(this).val() == "5" || $(this).val() == "4") 
										  	{
											 	$("#lsPafectadas").attr("disabled", "disabled");
												$("#lsPafectadas").css("background-color", "#F5DA81"); 
												$("#lsTnivelavance").attr("disabled", "disabled");
												$("#lsTnivelavance").css("background-color", "#F5DA81"); 
											}
											else 
											{
										
												if($(this).val() == "1" || $(this).val() == "3" || $(this).val() == "2" || $(this).val() == "6") 
												  	{
													 	$("#lsPafectadas").removeAttr("disabled");
														$("#lsPafectadas").css("background-color", "#FFFFFF");	
													 	$("#lsTnivelavance").attr("disabled", "disabled");
														$("#lsTnivelavance").css("background-color", "#F5DA81"); 
														
													}
												
											}
									});
									$("#lsPafectadas").change(function() 
	                 				{
								  		if($(this).val() == "1" || $(this).val() == "2" || $(this).val() == "21" || $(this).val() == "6" || $(this).val() == "7") 
										  	{
											 	$("#lsTnivelavance").removeAttr("disabled");
												$("#lsTnivelavance").css("background-color", "#FFFFFF");	
												
											}
											else 
											{
								
													 	$("#lsTnivelavance").attr("disabled", "disabled");
														$("#lsTnivelavance").css("background-color", "#F5DA81"); 
											}
									});
									$("#lsPdiscapacidad").change(function() 
	                 				{
								  		if($(this).val() == "2") 
										  	{
											 	$("#lsNdiscapacidad").attr("disabled", "disabled");
												$("#lsNdiscapacidad").css("background-color", "#F5DA81"); 	
												$("#lsParentezco").attr("disabled", "disabled");
												$("#lsParentezco").css("background-color", "#F5DA81"); 
												$("#lsTdiscapacidadp").attr("disabled", "disabled");
												$("#lsTdiscapacidadp").css("background-color", "#F5DA81"); 
											}
											else 
											{
												$("#lsNdiscapacidad").removeAttr("disabled");
												$("#lsNdiscapacidad").css("background-color", "#FFFFFF");
												$("#lsParentezco").removeAttr("disabled");
												$("#lsParentezco").css("background-color", "#FFFFFF");
												$("#lsTdiscapacidadp").removeAttr("disabled");
												$("#lsTdiscapacidadp").css("background-color", "#FFFFFF");
											}
											
									});	
									$("#lsTayuda").change(function() 
	                 				{
								  		if($(this).val() == "2") 
										  	{
											 	$("#lsTayudaeconomica").attr("disabled", "disabled");
												$("#lsTayudaeconomica").css("background-color", "#F5DA81"); 	
												
											}
											else 
											{
												$("#lsTayudaeconomica").removeAttr("disabled");
												$("#lsTayudaeconomica").css("background-color", "#FFFFFF");
												
											}
											
									});	
									$("#lsCrehabilitacion").change(function() 
	                 				{
								  		if($(this).val() == "2") 
										  	{
											 	$("#lsTipocentro").attr("disabled", "disabled");
												$("#lsTipocentro").css("background-color", "#F5DA81"); 	
												
											}
											else 
											{
												$("#lsTipocentro").removeAttr("disabled");
												$("#lsTipocentro").css("background-color", "#FFFFFF");
												
											}
											
									});	 
									
									
	                           });
                        </script>
                       ';
		  
            $retval .= '<form id="frmdiscapacidad" action="'. DISCAPACIDAD_URL.'discapacidad.php" method="POST">';

           $Regresar = "regresar('". DISCAPACIDAD_URL. "discapacidad.php')";

            $retval .= '<fieldset class="fieldsetPequeno">';
            $retval .= '<legend class="etiquetaborde">
                            DISCAPACIDAD <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO DISCAPACIDAD<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> '. $this->getStrEtiqueta() .'
                          </legend>
                       ';
            $NHC = "";		   
            $retval .= '
                        <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">'. $this->getStrEtiqueta() .'</td>
                                <input class="textbox" id="strCodigo" name="strCodigo" type="hidden" maxlength="50" value="'. $this->getStrCodigo() .'" />
     						<tr class="formulariofila1">
                               <td align="right"><b>Tipo de Discapacidad:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsTdiscapacidad" id="lsTdiscapacidad"  class="combobox">
	                                        '. $tdiscapacidad->getStrListar($this->getStrTdiscapacidad()) .'
	                                    </select>
                                </td> 
                               	<td align="right"><b>Partes Afectadas:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsPafectadas" id="lsPafectadas"  class="combobox">
	                                        '. $pafectadas->getStrListar($this->getStrPafectadas()) .'
	                                    </select>
                                </td>  
                             	
                            </tr>
                            <tr class="formulariofila1">
                               <td align="right"><b>Nivel de Avance:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsTnivelavance" id="lsTnivelavance"  class="combobox">
	                                        '. $tnivelavance->getStrListar($this->getStrTnivelavance()) .'
	                                    </select>
                                </td> 
                                <td  align="right"><b>Observaciones:&nbsp;</b></td>
                                <td align="left">
                                    <input class="textbox" id="strObservaciones" name="strObservaciones" type="text" maxlength="100"  value="'. $this->getStrObservaciones() .'" />
                                </td>
                               	
                            </tr>

<table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">DESCRIPCIÓN DISCAPACIDAD</td>
                            </tr> 
                            <tr class="formulariofila1">
                            	<td align="right"><b>Origen de Discapacidad:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsOdiscapacidad" id="lsOdiscapacidad"  class="combobox">
	                                        '. $odiscapacidad->getStrListar($this->getStrOdiscapacidad()) .'
	                                    </select>
                                </td>  
                                <td  align="right"><b>Diagnóstico:&nbsp;</b></td>
                                <td align="left">
                                    <input class="textbox" id="strDiagnostico" name="strDiagnostico" type="text" maxlength="100"  value="'. $this->getStrDiagnostico() .'" />
                                </td>
                           </tr>                           
							<tr class="formulariofila1">
                            	<td  align="right"><b>Observaciones:&nbsp;</b></td>
                                <td align="left">
                                    <input class="textbox" id="strObservacionorigen" name="strObservacionorigen" type="text" maxlength="100"  value="'. $this->getStrObservacionorigen() .'" />
                                </td>
                               <td align="right"><b>Porcentaje:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsTporcentaje" id="lsTporcentaje"  class="combobox">
	                                        '. $tporcentaje->getStrListar($this->getStrTporcentaje()) .'
	                                    </select>
                                </td>  
                           </tr>       
							<tr class="formulariofila1">
                            	<td  align="right"><b>Fecha&nbsp;Adquirió la Discapacidad:</b></td>
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
                               <td align="right"><b>Recibe algún tipo de ayuda económica:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsTayuda" id="lsTayuda"  class="combobox">
	                                        '. $tayuda->getStrListar($this->getStrTayuda()) .'
	                                    </select>
                                </td>  
                           </tr>    
                           <tr class="formulariofila1">
                            	<td align="right"><b>¿Cuál?:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsTayudaeconomica" id="lsTayudaeconomica"  class="combobox">
	                                        '. $tayudaeconomica->getStrListar($this->getStrTayudaeconomica()) .'
	                                    </select>
                                </td>  
                               <td align="right"><b>Estado Discapacidad:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsEstadod" id="lsEstadod"  class="combobox">
	                                        '. $estadod->getStrListar($this->getStrEstadod()) .'
	                                    </select>
                                </td>  
                           </tr>                           
<table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">PLAN DE ATENCIÓN</td>
                            </tr> 
                            <tr class="formulariofila1">
                            	<td align="right"><b>¿Centro de Rehabilitación?:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsCrehabilitacion" id="lsCrehabilitacion"  class="combobox">
	                                        '. $crehabilitacion->getStrListar($this->getStrCrehabilitacion()) .'
	                                    </select>
                                </td>  
                           </tr>                          
                            <tr class="formulariofila1">
                            	<td align="right"><b>Tipo Centro:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsTipocentro" id="lsTipocentro"  class="combobox">
	                                        '. $tipocentro->getStrListar($this->getStrTipocentro()) .'
	                                    </select>
                                </td>  
                                <td align="right"><b>¿Tratamiento?:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsTratamiento" id="lsTratamiento"  class="combobox">
	                                        '. $tratamiento->getStrListar($this->getStrTratamiento()) .'
	                                    </select>
                                </td>  
                           </tr>  
						   <tr class="formulariofila1">
                            	<td align="right"><b>¿Cuál?:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsTratamientod" id="Tratamientod"  class="combobox">
	                                        '. $tratamientod->getStrListar($this->getStrTratamientod()) .'
	                                    </select>
                                </td>  
                                <td align="right"><b>Horario:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsThorario" id="lsThorario"  class="combobox">
	                                        '. $thorario->getStrListar($this->getStrThorario()) .'
	                                    </select>
                                </td>  
                           </tr>   
                            <tr class="formulariofila1">
                            	<td  align="right"><b>Observaciones:&nbsp;</b></td>
                                <td align="left">
                                    <input class="textbox" id="strObservacionc" name="strObservacionc" type="text" maxlength="100"  value="'. $this->getStrObservacionc() .'" />
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
            $ProcedimientoAlmacenado = sprintf("CALL spingresartdiscapacidad('%s','%s','%s','%s','%s','%s','%s','%s','%s',
			'%s','%s','%s','%s','%s','%s','%s','%s','%s','%s');",
            $this->getStrCodigo(),$this->getStrTdiscapacidad(),$this->getStrPafectadas(), $this->getStrTnivelavance(),
            $this->getStrObservaciones(),$this->getStrOdiscapacidad(),$this->getStrDiagnostico(),$this->getStrObservacionorigen(),$this->getStrTporcentaje(),
			$this->getStrFechaIngreso(),$this->getStrTayuda(),$this->getStrTayudaeconomica(),$this->getStrEstadod(),
			$this->getStrCrehabilitacion(),$this->getStrTipocentro(),$this->getStrTratamiento(),
			$this->getStrTratamientod(),$this->getStrThorario(),$this->getStrObservacionc());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);

            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'TDiscapacidad = [ '.$this->getStrTdiscapacidad().' ] PAfectadas = [ '. $this->getStrPafectadas().' ] ';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'G', 'discapacidad', $descripcion);
                $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
                $query->getStrSqlInsertUpdateDelete();
                $resultado = true;
 			}

            return $resultado;
        }
	public function getStrBuscards($v) 
	{
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbidentificadords('%d');","$v");
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
            $ProcedimientoAlmacenado = sprintf("CALL spbdiscapacidades('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
                foreach( $resultado as $rst):   
		            $this->setStrCodigo($rst['id_usuario_discapacidad']);
                    $this->setStrTdiscapacidad($rst['id_tipo_discapacidad']);
                    $this->setStrPafectadas($rst['id_detalle_tipo_discapacidad']);
                   	$this->setStrTnivelavance($rst['nivelavance_id']);
					$this->setStrNdiscapacidad($rst['nivelavance_id']);
					$this->setStrObservaciones($rst['observacion']);
					$this->setStrOdiscapacidad($rst["odiscapacidad_id"]);
					$this->setStrDiagnostico($rst["diagnostico"]);
					$this->setStrObservacionorigen($rst["observacionorigen"]);
					$this->setStrTporcentaje($rst["tporcentaje_id"]);
					$this->setStrFechaIngreso($rst["fecha_discapacidad"]);
					$this->setStrTayuda($rst["tayuda_id"]);
					$this->setStrTayudaeconomica($rst["tipoayudaeconomica_id"]);
					$this->setStrEstadod($rst["estadodiscapacidad_id"]);
					$this->setStrCrehabilitacion($rst["crehabilitacion_id"]);
					$this->setStrTipocentro($rst["tipocentro_id"]);
					$this->setStrTratamiento($rst["tratamiento_id"]);
					$this->setStrTratamientod($rst["ttratamiento_id"]);
					$this->setStrThorario($rst["thorario_id"]);
					$this->setStrObservacionc($rst["observacionc"]);
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
            $ProcedimientoAlmacenado = sprintf("CALL sptotaltdiscapacidad('%s');", $this->getStrCodigo());
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
            $ProcedimientoAlmacenado = sprintf("CALL splistartdiscapacidades('%d','%d','%d');","$re", "$pa","$cf");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            FORMA DE DISCAPACIDAD<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO DISCAPACIDAD</legend>
                       ';
            $retval .= '
                        <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                            <tr class="tablatitulo">
                                <th colspan="11">LISTADO TIPOS DE DISCAPACIDAD </th>
                            </tr>
                            <tr class="tablasubtitulo">
                                <th>...</th>  
                                <th align="center">ID Discapacidad</th>                                                              
                                <th align="center">Tipo Discapacidad</th>
                                <th align="center">Partes Afectadas</th>
                                <th align="center">Nivel de Avance</th>
                                <th align="center">Observaciones</th>
                                <th align="center" colspan="3">Acciones</th>
                             </tr>
                        ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["id_usuario_discapacidad"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["tipodiscapacidad_nombre"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["partesafectadas_nombre"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["nivelavance_nombre"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["observacion"] .'</td>';
										
                    $retval .= 	'<td align="center"><div class="vtip" title="Actualizar <br> [ codigo = '.$rst["id_usuario_discapacidad"] .' ]">';
                    $retval .=  '<a href="'. DISCAPACIDAD_URL .'discapacidad.php?btnActualizar=Actualizar&strCodigo='. $rst["id_usuario_discapacidad"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Eliminar <br> [codigo = '.$rst["id_usuario_discapacidad"] .' ]">';
                    $retval .=  '<a href="'.  DISCAPACIDAD_URL .'discapacidad.php?btnEliminar=Eliminar&strCodigo='. $rst["id_usuario_discapacidad"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Detalle Centro Formativo <br> [ codigo = '.$rst["id_usuario_discapacidad"] .' ]">';
                    $retval .=  '<a href="'.  DISCAPACIDAD_URL .'discapacidad.php?btnDetalle=Detalle&strCodigo='. $rst["id_usuario_discapacidad"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                    $i = 1 - $i;
                endforeach;
            }

            $paginacion->setStrNombrePagina("discapacidad/discapacidad.php");
            $retval .= '<tr><td colspan="12" align="center">'. $paginacion->getStrPaginacion() .'</td></tr>';
            $retval .= '</table>';
            $retval .= '</fieldset>';
            return $retval;
        }
 public function getStrEliminar() 
        {
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL speliminardiscapacidades('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlInsertUpdateDelete();

           if($query->getStrSqlInsertUpdateDelete())
            {
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'TDiscapacidad = [ '.$this->getStrTdiscapacidad().' ] PAfectadas = [ '. $this->getStrPafectadas().' ] ';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'E', 'discapacidad', $descripcion);
                $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
                $query->getStrSqlInsertUpdateDelete();
                $resultado = true;
				      
            }

            return $resultado;
        }

	public function getStrActualizar() 
	{
			$query = new clQuery();
            $resultado = false;		
			 $ProcedimientoAlmacenado = sprintf("CALL spactualizardiscapacidad('%s','%s','%s','%s','%s','%s','%s','%s','%s',
			'%s','%s','%s','%s','%s','%s','%s','%s','%s','%s');",
            $this->getStrCodigo(),$this->getStrTdiscapacidad(),$this->getStrPafectadas(), $this->getStrTnivelavance(),
            $this->getStrObservaciones(),$this->getStrOdiscapacidad(),$this->getStrDiagnostico(),$this->getStrObservacionorigen(),$this->getStrTporcentaje(),
			$this->getStrFechaIngreso(),$this->getStrTayuda(),$this->getStrTayudaeconomica(),$this->getStrEstadod(),
			$this->getStrCrehabilitacion(),$this->getStrTipocentro(),$this->getStrTratamiento(),
			$this->getStrTratamientod(),$this->getStrThorario(),$this->getStrObservacionc());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);

            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'TDiscapacidad = [ '.$this->getStrTdiscapacidad().' ] PAfectadas = [ '. $this->getStrPafectadas().' ] ';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'G', 'discapacidad', $descripcion);
                $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
                $query->getStrSqlInsertUpdateDelete();
                $resultado = true;
 			}

            return $resultado;
        }
public function getStrDetallePersona()
        {
            $query = new clQuery();
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbdetallediscapacidades('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            Acceso<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Listado Acceso<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">DETALLE DISCAPACIDAD
                        </legend>
                       ';

            if( count($resultado) > 0 )
            {
                $i = 0;
				$valor=$this->getStrCodigo();
			 	$v=$this->getStrBuscards($valor);
                foreach( $resultado as $rst):
                    $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                    $retval .= '<tr>
                                    <td colspan="2" align="center">
                                        <a href="'. DISCAPACIDAD_URL.'discapacidad.php?btnNuevo=Nuevo&strCodigo='.$v.'">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" />REGRESAR LISTADO DISCAPACIDAD|</a>
                                    <td>
                                </tr>
                                ';
                    
                    $retval .= '<tr class="tablatitulo">
                                    <th colspan="2">DETALLE&nbsp;FORMA DE DISCAPACIDAD;REGISTRADO</th>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Código:</th>
                                    <td align="left">  '. $rst["id_usuario_discapacidad"] .'</td>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Tipo Discapacidad:</th>
                                    <td align="left">  '. $rst["tipodiscapacidad_nombre"] .'</td>
                                </tr>
                                ';
                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Partes Afectadas:</th>
                                    <td align="left">  '. $rst["partesafectadas_nombre"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Nivel de Avance:</th>
                                    <td align="left">  '. $rst["nivelavance_nombre"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Observaciones:</th>
                                    <td align="left">  '. $rst["observacion"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">¿Parientes con Discapacidad?:</th>
                                    <td align="left">  '. $rst["pdiscapacidad"] .'</td>
                                </tr>
                                ';
                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">¿Cuántos?:</th>
                                    <td align="left">  '. $rst["hijos_descripcion"] .'</td>
                                </tr>
                                ';
					 $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Parentezco:</th>
                                    <td align="left">  '. $rst["tqgarante_descripcion"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Tipo Discapacidad Pariente:</th>
                                    <td align="left">  '. $rst["tdiscapacidadpar"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Origen Discapacidad:</th>
                                    <td align="left">  '. $rst["origendeficiencia_nombre"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Diagnostico:</th>
                                    <td align="left">  '. $rst["diagnostico"] .'</td>
                                </tr>
                                ';						
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Observación:</th>
                                    <td align="left">  '. $rst["observacionorigen"] .'</td>
                                </tr>
                                ';		
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Porcentaje:</th>
                                    <td align="left">  '. $rst["tporcentaje_descripcion"] .'</td>
                                </tr>';	
                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Fecha Adquirió la Discapacidad:</th>
                                    <td align="left">  '. $rst["fecha_discapacidad"] .'</td>
                                </tr>            
                                ';			
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Recibe algún tipo de ayuda económica:</th>
                                    <td align="left">  '. $rst["tyuda"] .'</td>
                                </tr>            
                                ';		
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">¿Cuál?:</th>
                                    <td align="left">  '. $rst["tipoayudaeconomica_nombre"] .'</td>
                                </tr>            
                                ';		
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Estado Discapacidad:</th>
                                    <td align="left">  '. $rst["estadodiscapacidad_nombre"] .'</td>
                                </tr>            
                                ';		
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Ayudas Técnicas:</th>
                                    <td align="left">  '. $rst["ayudastecnicas_nombre"] .'</td>
                                </tr>            
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Centro de Rehabilitación:</th>
                                    <td align="left">  '. $rst["rehabilitacion"] .'</td>
                                </tr>            
                                ';		
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Tipo Centro:</th>
                                    <td align="left">  '. $rst["tiposeguro_nombre"] .'</td>
                                </tr>            
                                ';		
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Tratamiento:</th>
                                    <td align="left">  '. $rst["tratamientod"] .'</td>
                                </tr>            
                                ';		
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">¿Cuál?:</th>
                                    <td align="left">  '. $rst["tratamiento_nombre"] .'</td>
                                </tr>            
                                ';			
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Horario:</th>
                                    <td align="left">  '. $rst["horario_nombre"] .'</td>
                                </tr>            
                                ';		
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Observacion:</th>
                                    <td align="left">  '. $rst["observacionc"] .'</td>
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