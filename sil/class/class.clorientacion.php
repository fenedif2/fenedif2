<?php	
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.validaciones.php' );
    include_once( CLASS_PATH . "class.clquery.php" );
    include_once( CLASS_PATH . "class.clpaginacion.php" ); 
	  
	include_once( CLASS_PATH . "class.cldigitacion.php" ); 
	include_once( CLASS_PATH . "class.clnivel.php" ); 
 	include_once( CLASS_PATH . "class.clexperiencia.php" );
	
	include_once( CLASS_PATH . "class.clsubtformaciond.php" ); 
    class clOrientacion
    {
        private $strEpersonales;	
		private $strObservacionesep;
		private $strEprofesionales;
		private $strObservacionespro;
		private $strAespectativas;
		private $strObservacionesae;
		private $strMotivacion;
		private $strObservacionesmot;
		private $strHabilidades;
		private $strObservacioneshab;
		private $strEmpleabilidad;
		private $strObservacionesemp;
		private $strIndependencia;
		private $strObservacionesind;
		private $strTransporte;
		private $strObservacionestra;
		private $strEntorno;
		private $strObservacionesent;
		private $strEspacial;
		private $strObservacionesesp;
			
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
           $this->strEpersonales = ""; 	
		   $this->strObservacionesep="";
		    $this->strObservacionespro="";
			$this->strAespectativas="";
			$this->strObservacionesae="";
			$this->strMotivacion="";
			$this->strObservacionesmot="";
			$this->strHabilidades="";
			$this->strObservacioneshab="";
			$this->strEmpleabilidad="";
			$this->strObservacionesemp="";
		   $this->strEprofesionales="";
		   $this->strIndependencia="";
		   $this->strObservacionesind="";
		   $this->strTransporte="";
		   $this->strObservacionestra="";
		   $this->strEntorno="";
		   $this->strObservacionesent="";
		   $this->strEspacial="";
		   $this->strObservacionesesp="";
		   
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
////////////// Tipo Formacion  /////////////////////
        public function getstrEpersonales()
        {
            return $this->strEpersonales;
        }
		public function setstrEpersonales($tf)
        {
            $this->strEpersonales = $tf;
        }
//////////////////////////////// Observacionesep  /////////////////////
        public function getStrObservacionesep ()
        {
            return $this->strObservacionesep ;
        }
		public function setStrObservacionesep ($n)
        {
            $this->strObservacionesep  = $n;
        }
//////////////Motivacion  /////////////////////
        public function getstrMotivacion()
        {
            return $this->strMotivacion;
        }
		public function setstrMotivacion($tf)
        {
            $this->strMotivacion = $tf;
        }
//////////////////////////////// Observacionesmot  /////////////////////
        public function getStrObservacionesmot ()
        {
            return $this->strObservacionesmot ;
        }
		public function setStrObservacionesmot ($n)
        {
            $this->strObservacionesmot  = $n;
        }	
//////////////Independencia  /////////////////////
        public function getstrIndependencia()
        {
            return $this->strIndependencia;
        }
		public function setstrIndependencia($tf)
        {
            $this->strIndependencia= $tf;
        }
//////////////////////////////// Observacionesind  /////////////////////
        public function getStrObservacionesind ()
        {
            return $this->strObservacionesind ;
        }
		public function setStrObservacionesind ($n)
        {
            $this->strObservacionesind  = $n;
        }
//////////////Transporte  /////////////////////
        public function getstrTransporte()
        {
            return $this->strTransporte;
        }
		public function setstrTransporte($tf)
        {
            $this->strTransporte= $tf;
        }
//////////////////////////////// Observacionestra  /////////////////////
        public function getStrObservacionestra  ()
        {
            return $this->strObservacionestra  ;
        }
		public function setStrObservacionestra ($n)
        {
            $this->strObservacionestra   = $n;
        }
//////////////Entorno  /////////////////////
        public function getstrEntorno()
        {
            return $this->strEntorno;
        }
		public function setstrEntorno($tf)
        {
            $this->strEntorno= $tf;
        }
//////////////////////////////// Observacionesent  /////////////////////
        public function getStrObservacionesent  ()
        {
            return $this->strObservacionesent  ;
        }
		public function setStrObservacionesent ($n)
        {
            $this->strObservacionesent  = $n;
        }	
//////////////Espacial  /////////////////////
        public function getstrEspacial()
        {
            return $this->strEspacial;
        }
		public function setstrEspacial($tf)
        {
            $this->strEspacial= $tf;
        }
//////////////////////////////// Observacionesesp  /////////////////////
        public function getStrObservacionesesp  ()
        {
            return $this->strObservacionesesp ;
        }
		public function setStrObservacionesesp ($n)
        {
            $this->strObservacionesesp  = $n;
        }												
//////////////Habilidades /////////////////////
        public function getstrHabilidades()
        {
            return $this->strHabilidades;
        }
		public function setstrHabilidades($tf)
        {
            $this->strHabilidades = $tf;
        }
//////////////////////////////// Observacioneshab  /////////////////////
        public function getStrObservacioneshab()
        {
            return $this->strObservacioneshab ;
        }
		public function setStrObservacioneshab ($n)
        {
            $this->strObservacioneshab = $n;
        }	
//////////////Empleabilidad /////////////////////
        public function getstrEmpleabilidad ()
        {
            return $this->strEmpleabilidad ;
        }
		public function setstrEmpleabilidad ($tf)
        {
            $this->strEmpleabilidad  = $tf;
        }
//////////////////////////////// Observacionesemp  /////////////////////
        public function getStrObservacionesemp()
        {
            return $this->strObservacionesemp ;
        }
		public function setStrObservacionesemp ($n)
        {
            $this->strObservacionesemp = $n;
        }									

	
 ////////////// Eprofesionales  /////////////////////
        public function getstrEprofesionales()
        {
            return $this->strEprofesionales;
        }
		public function setstrEprofesionales($n)
        {
            $this->strEprofesionales = $n;
        } 
//////////////////////////////// Observacionespro /////////////////////
        public function getStrObservacionespro ()
        {
            return $this->strObservacionespro ;
        }
		public function setStrObservacionespro ($n)
        {
            $this->strObservacionespro  = $n;
        }		 
 ////////////// AEspectativas /////////////////////
        public function getstrAespectativas()
        {
            return $this->strAespectativas;
        }
		public function setstrAespectativas($n)
        {
            $this->strAespectativas = $n;
        } 
//////////////////////////////// Observacionesae  /////////////////////
        public function getStrObservacionesae ()
        {
            return $this->strObservacionesae ;
        }
		public function setStrObservacionesae ($n)
        {
            $this->strObservacionesae  = $n;
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
///////////////////////// nombre /////////////////////////////////////
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
/////////////////////////valor/////////////////////////////////////////
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
/////////////////////////////////////////////////////////////////////
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
           
		$epersonales = new clDigitacion();	
		$eprofesionales = new clnivel();
		$aespectativas = new clExperiencia();
		$motivacion = new clnivel();
		$habilidades= new clnivel();
		$empleabilidad = new clnivel();
		$independencia = new clnivel();
		$transporte = new clnivel();
		$entorno = new clnivel();
		$espacial = new clnivel();
          $retval  = '<script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.validate.js"></script>
                        <script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.metadata.js"></script>
                       ';

            $retval .= '<br><br><br><br>
                        <script>
                            $(document).ready(function(){
                                    $.metadata.setType( \'attr\', \'validate\' );
                                    $(\'#frmorientacion\').validate({
                                            rules:{
                                         	    
                                                  },
                                            messages:{
                                              	
												     }
                                    });
									
									
								 
								 
	                           });
                        </script>
                       ';
		  
            $retval .= '<form id="frmorientacion" action="'. ORIENTACION_URL.'orientacion.php" method="POST">';

            $Regresar = "regresar('".ORIENTACION_URL . "orientacion.php')";
            $retval .= '<fieldset class="fieldsetPequeno">';
            $retval .= '<legend class="etiquetaborde">
                            TIPO ORIENTACIÓN <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO TIPO ORIENTACIÓN <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> '. $this->getStrEtiqueta() .'
                          </legend>
                       ';
            $NHC = "";		   
            $retval .= '
                        <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">'. $this->getStrEtiqueta() .'</td>
                                <input class="textbox" id="strCodigo" name="strCodigo" type="hidden" maxlength="50" value="'. $this->getStrCodigo() .'" />
   							 <tr class="formulariofila1">
                               <td align="right"><b>Espectativas Personales:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsEpersonales" id="lsEpersonales"  class="combobox">
	                                        '. $epersonales->getStrListar($this->getstrEpersonales()) .'
	                                    </select>
                                </td> 
                                <td  align="right"><b>Observaciones:&nbsp;</b></td>
                                <td align="left">
                                    <input class="textbox" id="strObservacionesep" name="strObservacionesep" type="text" maxlength="100"  value="'. $this->getStrObservacionesep().'" />
                                </td>
                            </tr>
                            <tr class="formulariofila1">
                               <td align="right"><b>Espectativas Profesionales:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsEprofesional" id="lsEprofesional"  class="combobox">
	                                        '. $eprofesionales->getStrListar($this->getstrEprofesionales()) .'
	                                    </select>
                                </td> 
                                <td  align="right"><b>Observaciones:&nbsp;</b></td>
                                <td align="left">
                                    <input class="textbox" id="strObservacionespro" name="strObservacionespro" type="text" maxlength="100"  value="'. $this->getStrObservacionespro().'" />
                                </td>
                            </tr>
                            <tr class="formulariofila1">
                               <td align="right"><b>Adecuación:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsAespectativas" id="lsAespectativas"  class="combobox">
	                                        '. $aespectativas->getStrListar($this->getstrAespectativas()) .'
	                                    </select>
                                </td> 
                                <td  align="right"><b>Observaciones:&nbsp;</b></td>
                                <td align="left">
                                    <input class="textbox" id="strObservacionesae" name="strObservacionesae" type="text" maxlength="100"  value="'. $this->getStrObservacionesae().'" />
                                </td>
                            </tr>
                            <tr class="formulariofila1">
                               <td align="right"><b>Motivación ante la búsqueda de empleo:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsMotivacion" id="lsMotivacion"  class="combobox">
	                                        '. $motivacion->getStrListar($this->getstrMotivacion()) .'
	                                    </select>
                                </td> 
                                <td  align="right"><b>Observaciones:&nbsp;</b></td>
                                <td align="left">
                                    <input class="textbox" id="strObservacionesmot" name="strObservacionesmot" type="text" maxlength="100"  value="'. $this->getStrObservacionesmot().'" />
                                </td>
                            </tr>
                            <tr class="formulariofila1">
                               <td align="right"><b>Habildades para la búsqueda activa de Empleo:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsHabilidades" id="lsHabilidades"  class="combobox">
	                                        '. $habilidades->getStrListar($this->getstrHabilidades()) .'
	                                    </select>
                                </td> 
                                <td  align="right"><b>Observaciones:&nbsp;</b></td>
                                <td align="left">
                                    <input class="textbox" id="strObservacioneshab" name="strObservacioneshab" type="text" maxlength="100"  value="'. $this->getStrObservacioneshab().'" />
                                </td>
                            </tr>
							<tr class="formulariofila1">
                               <td align="right"><b>Nivel de Empleabilidad:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsEmpleabilidad" id="lsEmpleabilidad"  class="combobox">
	                                        '. $empleabilidad->getStrListar($this->getstrEmpleabilidad()) .'
	                                    </select>
                                </td> 
                                <td  align="right"><b>Observaciones:&nbsp;</b></td>
                                <td align="left">
                                    <input class="textbox" id="strObservacionesemp" name="strObservacionesemp" type="text" maxlength="100"  value="'. $this->getStrObservacionesemp().'" />
                                </td>
                            </tr>
                               <tr>
                                <td colspan="4" align="center" class="tablatitulo">ANATOMÍA PERSONAL</td>
                            </tr>
                            <tr class="formulariofila1">
                               <td align="right"><b>Independencia para las actividades diarias:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsIndependencia" id="lsIndependencia"  class="combobox">
	                                        '. $independencia->getStrListar($this->getstrIndependencia()) .'
	                                    </select>
                                </td> 
                                <td  align="right"><b>Observaciones:&nbsp;</b></td>
                                <td align="left">
                                    <input class="textbox" id="strObservacionesind" name="strObservacionesind" type="text" maxlength="100"  value="'. $this->getStrObservacionesind().'" />
                                </td>
                            </tr>
                            <tr class="formulariofila1">
                               <td align="right"><b>Acceso al Transporte:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsTransporte" id="lsTransporte"  class="combobox">
	                                        '. $transporte->getStrListar($this->getstrTransporte()) .'
	                                    </select>
                                </td> 
                                <td  align="right"><b>Observaciones:&nbsp;</b></td>
                                <td align="left">
                                    <input class="textbox" id="strObservacionestra" name="strObservacionestra" type="text" maxlength="100"  value="'. $this->getStrObservacionestra().'" />
                                </td>
                            </tr>
                            <tr class="formulariofila1">
                               <td align="right"><b>Orientación en el Entorno:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsEntorno" id="lsEntorno"  class="combobox">
	                                        '. $entorno->getStrListar($this->getstrEntorno()) .'
	                                    </select>
                                </td> 
                                <td  align="right"><b>Observaciones:&nbsp;</b></td>
                                <td align="left">
                                    <input class="textbox" id="strObservacionesent" name="strObservacionesent" type="text" maxlength="100"  value="'. $this->getStrObservacionesent().'" />
                                </td>
                            </tr> 
							<tr class="formulariofila1">
                               <td align="right"><b>Orientación Temporo-Espacial:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsEspacial" id="lsEspacial"  class="combobox">
	                                        '. $espacial->getStrListar($this->getstrEspacial()) .'
	                                    </select>
                                </td> 
                                <td  align="right"><b>Observaciones:&nbsp;</b></td>
                                <td align="left">
                                    <input class="textbox" id="strObservacionesesp" name="strObservacionesesp" type="text" maxlength="100"  value="'. $this->getStrObservacionesesp().'" />
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
            $ProcedimientoAlmacenado = sprintf("CALL spingresarorientacion('%s','%s','%s','%s','%s','%s','%s','%s',
			'%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s');",
            $this->getstrEpersonales(),$this->getStrObservacionesep(),$this->getstrEprofesionales(),$this->getStrObservacionespro(),
            $this->getstrAespectativas(),$this->getStrObservacionesae(),$this->getstrMotivacion(),$this->getStrObservacionesmot(),
            $this->getstrHabilidades(),$this->getStrObservacioneshab(),$this->getstrEmpleabilidad(),$this->getStrObservacionesemp(),
            $this->getstrIndependencia(),$this->getStrObservacionesind(),$this->getstrTransporte(),$this->getStrObservacionestra(),
            $this->getstrEntorno(),$this->getStrObservacionesent(),$this->getstrEspacial(),$this->getStrObservacionesesp(),
            $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);

            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Accesibilidad = [ '.$this->getstrEpersonales().' ] Centro_Formativo = [ '. $this->getStrCodigo().' ] ';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'GUARDAR', 'torientacion', $descripcion);
                $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
                $query->getStrSqlInsertUpdateDelete();
                $resultado = true;
            }

            return $resultado;
        }
	public function getStrBuscaros($v) 
	{
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbidentificadoros('%d');","$v");
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
            $ProcedimientoAlmacenado = sprintf("CALL spborientacion('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
                foreach( $resultado as $rst):  
				$this->setStrCodigo($rst['torientacion_id']); 	 
	            $this->setstrEpersonales($rst["epersonales_id"]);          
	            $this->setStrObservacionesep($rst["observacionesep"]);
				$this->setstrEprofesionales($rst["eprofesionales_id"]);          
	            $this->setStrObservacionespro($rst["observacionespro"]);
	            $this->setstrAespectativas($rst["aespectativas_id"]);          
	            $this->setStrObservacionesae($rst["observacionesae"]);
				$this->setstrMotivacion($rst["motivaion_id"]);          
	            $this->setStrObservacionesmot($rst["observacionesmot"]);
				$this->setstrHabilidades($rst["habilidades_id"]);          
	            $this->setStrObservacioneshab($rst["observacioneshab"]);
	            $this->setstrEmpleabilidad($rst["empleabilidad_id"]);          
	            $this->setStrObservacionesemp($rst["observacionesemp"]);
				$this->setstrIndependencia($rst["independencia_id"]);          
	            $this->setStrObservacionesind($rst["observacionesind"]);
				$this->setstrTransporte($rst["transporte_id"]);          
	            $this->setStrObservacionestra($rst["observacionestra"]);
				$this->setstrEntorno($rst["entorno_id"]);          
	            $this->setStrObservacionesent($rst["observacionesent"]);
				$this->setstrEspacial($rst["espacial_id"]);          
	            $this->setStrObservacionesesp($rst["observacionesesp"]);
                endforeach;

                $retval = true;
            }
           
            return $retval;
        }
public function getStrActualizar() 
	{
			$query = new clQuery();
            $resultado = false;		
			 $ProcedimientoAlmacenado = sprintf("CALL spactualizarorientacion('%s','%s','%s','%s','%s','%s','%s','%s',
			'%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s');",
            $this->getStrCodigo(),$this->getstrEpersonales(),$this->getStrObservacionesep(),$this->getstrEprofesionales(),$this->getStrObservacionespro(),
            $this->getstrAespectativas(),$this->getStrObservacionesae(),$this->getstrMotivacion(),$this->getStrObservacionesmot(),
            $this->getstrHabilidades(),$this->getStrObservacioneshab(),$this->getstrEmpleabilidad(),$this->getStrObservacionesemp(),
            $this->getstrIndependencia(),$this->getStrObservacionesind(),$this->getstrTransporte(),$this->getStrObservacionestra(),
            $this->getstrEntorno(),$this->getStrObservacionesent(),$this->getstrEspacial(),$this->getStrObservacionesesp());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);

            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Accesibilidad = [ '.$this->getstrEpersonales().' ] Centro_Formativo = [ '. $this->getStrCodigo().' ] ';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'ACTUALIZAR', 'torientacion', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL speliminarorientacion('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlInsertUpdateDelete();
 			 if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Epersonales = [ '.$this->getstrEpersonales().' ] codigo = [ '. $this->getStrCodigo().' ] ';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'ELIMINAR', 'torientacion', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL sptotaltorientacion();", $this->getStrCodigo());
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
            $ProcedimientoAlmacenado = sprintf("CALL splistarorientacion('%d','%d','%d');","$re", "$pa","$cf");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            TIPO ORIENTACIÓN <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO TIPO ORIENTACIÓN </legend>
                       ';
            $retval .= '
                        <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                            <tr class="tablatitulo">
                                <th colspan="12">TIPO ORIENTACIÓN</th>
                            </tr>
                            <tr class="tablasubtitulo">
                               <th align="center"> </th> 
                                <th align="center">Id</th>                                                               
                                <th align="center">Espectativas Personales</th>
                                <th align="center">Observaciones</th>
                                <th align="center">Espectativas Profesionales</th>
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
                    $retval .= 	'<td align="center">'. $rst["torientacion_id"] .'</td>';
                   	$retval .= 	'<td align="left">'. $rst["epersonales"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["observacionesep"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["eprofesionales"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["observacionespro"] .'</td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="ACTUALIZAR TIPO ORIENTACIÓN  <br> [ codigo = '.$rst["torientacion_id"] .' ]">';
                    $retval .=  '<a href="'.ORIENTACION_URL.'orientacion.php?btnActualizar=Actualizar&strCodigo='. $rst["torientacion_id"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="ELIMINAR TIPO ORIENTACIÓN  <br> [codigo = '.$rst["torientacion_id"] .' ]">';
                    $retval .=  '<a href="'.ORIENTACION_URL.'orientacion.php?btnEliminar=Eliminar&strCodigo='. $rst["torientacion_id"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="DETALLE TIPO ORIENTACIÓN  <br> [ codigo = '.$rst["torientacion_id"] .' ]">';
                    $retval .=  '<a href="'.ORIENTACION_URL.'orientacion.php?btnDetalle=Detalle&strCodigo='. $rst["torientacion_id"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                    $i = 1 - $i;
                endforeach;
            }

            $paginacion->setStrNombrePagina("tformacioncf/tformacioncf.php");
            $retval .= '<tr><td colspan="12" align="center">'. $paginacion->getStrPaginacion() .'</td></tr>';
            $retval .= '</table>';
            $retval .= '</fieldset>';
            return $retval;
        }
public function getStrDetallePersona()
        {
            $query = new clQuery();
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbdetalletorientacion('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            TIPO ORIENTACIÓN <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO TIPO ORIENTACIÓN <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">DETALLE TIPO ORIENTACIÓN 
                        </legend>
                       ';

            if( count($resultado) > 0 )
            {
                $i = 0;
				$valor=$this->getStrCodigo();
			 	$v=$this->getStrBuscaros($valor);
                foreach( $resultado as $rst):
                    $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                    $retval .= '<tr>
                                    <td colspan="2" align="center">
                                        <a href="'. ORIENTACION_URL .'orientacion.php?btnNuevo=Nuevo&strCodigo='.$v.'">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" />REGRESAR LISTADO TIPO ORIENTACIÓN |</a>
                                    <td>
                                </tr>
                                ';
                    
                    $retval .= '<tr class="tablatitulo">
                                    <th colspan="2">DETALLE&nbsp; TIPO DE ORIENTACIÓN</th>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Código:</th>
                                    <td align="left">  '. $rst["torientacion_id"] .'</td>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Espestativas Personales:</th>
                                    <td align="left">  '. $rst["epersonales"] .' </td>
                                </tr>
                                ';
                     $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Observaciones:</th>
                                    <td align="left">  '. $rst["observacionesep"] .'</td>
                                </tr>
                                ';
	 				$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Espestativas Profesionales:</th>
                                    <td align="left">  '. $rst["eprofesionales"] .' </td>
                                </tr>
                                ';
                     $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Observaciones:</th>
                                    <td align="left">  '. $rst["observacionespro"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Adecuación de Espectativas:</th>
                                    <td align="left">  '. $rst["aespectativas"] .' </td>
                                </tr>
                                ';
                     $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Observaciones:</th>
                                    <td align="left">  '. $rst["observacionesae"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Motivación ante la búsqueda de empleo:</th>
                                    <td align="left">  '. $rst["motivacion"] .' </td>
                                </tr>
                                ';
                     $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Observaciones:</th>
                                    <td align="left">  '. $rst["observacionesmot"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Habilidades para la búsqueda activa de empleo:</th>
                                    <td align="left">  '. $rst["habilidades"] .' </td>
                                </tr>
                                ';
                     $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Observaciones:</th>
                                    <td align="left">  '. $rst["observacioneshab"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Nivel de Empleabilidad:</th>
                                    <td align="left">  '. $rst["empleabilidad"] .' </td>
                                </tr>
                                ';
                     $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Observaciones:</th>
                                    <td align="left">  '. $rst["observacionesemp"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Independencia para las actividades diarias:</th>
                                    <td align="left">  '. $rst["independencia"] .' </td>
                                </tr>
                                ';
                     $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Observaciones:</th>
                                    <td align="left">  '. $rst["observacionesind"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Acceso al Transporte:</th>
                                    <td align="left">  '. $rst["transporte"] .' </td>
                                </tr>
                                ';
                     $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Observaciones:</th>
                                    <td align="left">  '. $rst["observacionestra"] .'</td>
                                </tr>
                                ';			
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Orientación en el entorno:</th>
                                    <td align="left">  '. $rst["entorno"] .' </td>
                                </tr>
                                ';
                     $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Observaciones:</th>
                                    <td align="left">  '. $rst["observacionesent"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Orientación Temporo-Espacial:</th>
                                    <td align="left">  '. $rst["espacial"] .' </td>
                                </tr>
                                ';
                     $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Observaciones:</th>
                                    <td align="left">  '. $rst["observacionesesp"] .'</td>
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