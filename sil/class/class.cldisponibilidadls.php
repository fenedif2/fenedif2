<?php	
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.validaciones.php' );
    include_once( CLASS_PATH . "class.clquery.php" );
    include_once( CLASS_PATH . "class.clpaginacion.php" );   
	include_once( CLASS_PATH . "class.cljornada.php" ); 
	include_once( CLASS_PATH . "class.clsalarial.php" ); 
	include_once( CLASS_PATH . "class.clcontratacion.php" ); 
	include_once( CLASS_PATH . "class.clilaboral.php" ); 
	include_once( CLASS_PATH . "class.clexperiencia.php" );

    class clDisponibilidadls
    {
        private $StrJornada;	
		private $StrSalarial;
		private $strLunes;
		private $strMartes;
		private $strMiercoles;
		private $strJueves;
		private $strViernes;
		private $strSabado;
		private $strDomingo;
		private $strDias;
		private $strDviajar;
		private $strDresidencia;
		private $strContratacion;
		private $strIlaboral;
		private $strObservacion;
		
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
           	$this->StrJornada = ""; 
		   	$this->StrSalarial = ""; 
		   	$this->strLunes = "1";
			$this->strMartes = "2";
			$this->strMiercoles = "3";
			$this->strJueves = "4";
			$this->strViernes = "5";
			$this->strSabado = "6";
			$this->strDomingo = "7";
			$this->strDias = "";
			$this->strDviajar = "";
			$this->strDresidencia = "";
			$this->strContratacion = "";
			$this->strIlaboral = "";
			$this->strObservacion = "";
				
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
////////////// Jornada /////////////////////
        public function getStrJornada()
        {
            return $this->StrJornada;
        }
		public function setStrJornada($n)
        {
            $this->StrJornada = $n;
        }
 ////////////// Salarial /////////////////////
        public function getStrSalarial()
        {
            return $this->StrSalarial;
        }
		public function setStrSalarial($n)
        {
            $this->StrSalarial = $n;
        }   
////////////// Lunes/////////////////////
        public function getStrLunes()
        {
            return $this->strLunes;
        }
		public function setStrLunes($n)
        {
            $this->strLunes = $n;
        }	
////////////// Martes////////////////////
        public function getStrMartes()
        {
            return $this->strMartes;
        }
		public function setStrMartes($n)
        {
            $this->strMartes = $n;
        }	
////////////// Miercoles////////////////////
        public function getStrMiercoles()
        {
            return $this->strMiercoles;
        }
		public function setStrMiercoles($n)
        {
            $this->strMiercoles = $n;
        }	
////////////// Jueves////////////////////
        public function getStrJueves()
        {
            return $this->strJueves;
        }
		public function setStrJueves($n)
        {
            $this->strJueves = $n;
        }
////////////// Viernes////////////////////
        public function getStrViernes()
        {
            return $this->strViernes;
        }
		public function setStrViernes($n)
        {
            $this->strViernes = $n;
        }
////////////// Sabado////////////////////
        public function getStrSabado()
        {
            return $this->strSabado;
        }
		public function setStrSabado($n)
        {
            $this->strSabado = $n;
        }
////////////// Domingo ////////////////////
        public function getStrDomingo()
        {
            return $this->strDomingo;
        }
		public function setStrDomingo($n)
        {
            $this->strDomingo = $n;
        }		
////////////// Dias////////////////////
        public function getStrDias()
        {
            return $this->strDias;
        }
		public function setStrDias($n)
        {
            $this->strDias = $n;
        }	
////////////// Dviajar////////////////////
        public function getStrDviajar()
        {
            return $this->strDviajar;
        }
		public function setStrDviajar($n)
        {
            $this->strDviajar = $n;
        }
////////////// Dresidencia////////////////////
        public function getStrDresidencia()
        {
            return $this->strDresidencia;
        }
		public function setStrDresidencia($n)
        {
            $this->strDresidencia = $n;
        }	
////////////// Contratacion////////////////////
        public function getStrContratacion()
        {
            return $this->strContratacion;
        }
		public function setStrContratacion($n)
        {
            $this->strContratacion = $n;
        }
////////////// Ilaboral////////////////////
        public function getStrIlaboral()
        {
            return $this->strIlaboral;
        }
		public function setStrIlaboral($n)
        {
            $this->strIlaboral = $n;
        }	
////////////// Observacion////////////////////
        public function getStrObservacion()
        {
            return $this->strObservacion;
        }
		public function setStrObservacion($n)
        {
            $this->strObservacion = $n;
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
/////////////////////nombre//////////////////////////////////
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
////////////////////////////valor////////////////////////////////////
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
           
		$jornada = new clJornada();	
		$salarial = new clSalarial();	
		$dviajar = new clExperiencia();
		$dresidencia = new clExperiencia();
		$contratcion = new clContratacion();
		$ilaboral = new clIlaboral();
          $retval  = '<script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.validate.js"></script>
                        <script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.metadata.js"></script>
                       ';

            $retval .= '<br><br><br><br>
                        <script>
                            $(document).ready(function(){
                                    $.metadata.setType( \'attr\', \'validate\' );
                                    $(\'#frmdisponibilidadls\').validate({
                                            rules:{
                                              
                                                  },
                                            messages:{
                                              	
												     }
                                    });
	                           });
                        </script>
                       ';
		  
            $retval .= '<form id="frmdisponibilidadls" action="'. DISPONIBILIDADLS_URL.'disponibilidadls.php" method="POST">';

            $Regresar = "regresar('". DISPONIBILIDADLS_URL. "disponibilidadls.php')";
            $retval .= '<fieldset class="fieldsetPequeno">';
            $retval .= '<legend class="etiquetaborde">
                            DISPONIBILIDAD<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO DISPONIBILIDAD<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> '. $this->getStrEtiqueta() .'
                          </legend>
                       ';
            $NHC = "";		   
            $retval .= '
                        <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">'. $this->getStrEtiqueta() .'</td>
                                <input class="textbox" id="strCodigo" name="strCodigo" type="hidden" maxlength="50" value="'. $this->getStrCodigo() .'" />
   							 <tr class="formulariofila1">
                               <td align="right"><b>Tipo Jornada:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsJornada" id="lsJornada"  class="combobox">
	                                        '. $jornada->getStrListar($this->getStrJornada()) .'
	                                    </select>
                                </td> 
                                 <td align="right"><b>Aspiración Salarial:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsSalarial" id="lsSalarial"  class="combobox">
	                                        '. $salarial->getStrListar($this->getStrSalarial()) .'
	                                    </select>
                                </td> 
                             	
                            </tr>
                            <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">Seleccione los días</td>
                            </tr>
		                  	<tr class="formulariofila1">
		                  	   <td align="left">
                                	<input type="checkbox" id="strdias" name="strdias[]" value="'. $this->getStrLunes().'"> Lunes<br>
                               </td>
                               <td align="left">
                                	<input type="checkbox" id="strdias" name="strdias[]" value="'. $this->getStrMartes().'"> Martes<br>
                               </td>
              
                          	</tr>
                          	<tr class="formulariofila1">
		                  	   <td align="left">
                                	<input type="checkbox" id="strdias" name="strdias[]" value="'. $this->getStrMiercoles().'"> Miércoles<br>
                               </td>
                               <td align="left">
                                	<input type="checkbox" id="strdias" name="strdias[]" value="'. $this->getStrJueves().'"> Jueves<br>
                               </td>
                           	</tr>
                          	<tr class="formulariofila1">
		                  	   <td align="left">
                                	<input type="checkbox" id="strdias" name="strdias[]" value="'. $this->getStrViernes().'">Viernes<br>
                               </td>
                               <td align="left">
                                	<input type="checkbox" id="strdias" name="strdias[]" value="'. $this->getStrSabado().'">Sábado<br>
                               </td>
              
                          	</tr>
                          	<tr class="formulariofila1">
		                  	   <td align="left">
                                	<input type="checkbox" id="strdias" name="strdias[]" value="'. $this->getStrDomingo().'">Domingo<br>
                               </td>
                              
                          	</tr>
                          <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo"></td>
                            </tr> 	
							<tr class="formulariofila1">
                               <td align="right"><b>Disponibilidad para viajar eventualmente:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsDviajar" id="lsDviajar"  class="combobox">
	                                        '. $dviajar->getStrListar($this->getStrDviajar()) .'
	                                    </select>
                                </td> 
                                 <td align="right"><b>Disponibilidad para cambiar de residencia:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsDresidencia" id="lsDresidencia"  class="combobox">
	                                        '. $dresidencia->getStrListar($this->getStrDresidencia()) .'
	                                    </select>
                                </td> 
                             	
                            </tr>
							<table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo"></td>
                            </tr> 	
							<tr class="formulariofila1">
                               <td align="right"><b>Preferencia de Contración:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsContratacion" id="lsContratacion"  class="combobox">
	                                        '. $contratcion->getStrListar($this->getStrContratacion()) .'
	                                    </select>
                                </td> 
                                                             	
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

      public function getStrIngresar() 
        {
        	$First = $this->getStrDias();
			
		 if(count($First)>0)
		 {
		 	for($indx = 0 ; $indx < count($First); $indx ++)
            {	
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spingresardisponibilidadldias('%s','%s');",
            $First[$indx],$this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);

            if($query->getStrSqlInsertUpdateDelete())
            	{
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Dias = [ '.$First[$indx].' ] Usuario = [ '. $this->getStrCodigo().' ] ';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'G', 'tdlaboraldias', $descripcion);
                $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
                $query->getStrSqlInsertUpdateDelete();
                $resultado = true;
           		}
				
         	}
     		$query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spingresardisponibilidadl('%s','%s','%s','%s', '%s', '%s', '%s', '%s');",
            $this->getStrJornada(),$this->getStrSalarial(),$this->getStrDviajar(),$this->getStrDresidencia(),
           	$this->getStrContratacion(),$this->getStrIlaboral(),$this->getStrObservacion(),$this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);

            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Jornada = [ '.$this->getStrJornada().' ] Usuario = [ '. $this->getStrCodigo().' ] ';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'G', 'tdlaboral', $descripcion);
                $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
                $query->getStrSqlInsertUpdateDelete();
                $resultado = true;
           	}
	        return $resultado; 
		
		 }
       }
    public function getStrBuscardlsdias($v) 
	{
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbidentificadordlsdias('%d');","$v");
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
    public function getStrBuscardls($v) 
	{
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbidentificadordls('%d');","$v");
			$query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
            foreach( $resultado as $rst):   
				$valor=$rst['usuario_id'];
		    endforeach;
            }
		     return $valor;
      }           
 	public function getStrBuscar() {
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbdisponibilidadl('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
                foreach( $resultado as $rst):   
	               $this->setStrJornada($rst["jornada_id"]);
				$this->setStrSalarial($rst["salarial_id"]);
			 	$this->setStrDviajar($rst["dviajar_id"]);
				$this->setStrDresidencia($rst["dresidencia_id"]);
				$this->setStrContratacion($rst["contratacion_id"]);
				$this->setStrIlaboral($rst["ilaboral_id"]);
				$this->setStrObservacion($rst["observacion"]);
       
                endforeach;

                $retval = true;
            }
           
            return $retval;
        }
public function getStrBuscardias() {
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbdisponibilidadldias('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
                foreach( $resultado as $rst):   
	               $this->setStrDias($rst["dia_id"]);
				
       
                endforeach;

                $retval = true;
            }
           
            return $retval;
        }
public function getStrActualizar() 
	{
			$query = new clQuery();
            $resultado = false;		
			 $ProcedimientoAlmacenado = sprintf("CALL spactualizardisponibilidadl('%s','%s','%s','%s', '%s', '%s', '%s', '%s');",
            $this->getStrCodigo(),$this->getStrJornada(),$this->getStrSalarial(),$this->getStrDviajar(),$this->getStrDresidencia(),
           	$this->getStrContratacion(),$this->getStrIlaboral(),$this->getStrObservacion());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);

            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'jornada = [ '.$this->getStrJornada().' ] codigo= [ '. $this->getStrCodigo().' ] ';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'A', 'disponibilidadl', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL speliminardisponibilidadl('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlInsertUpdateDelete();
 		 if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'dias = [ '.$this->getStrDias().' ] codigo = [ '. $this->getStrCodigo().' ] ';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'E', 'disponibilidadl', $descripcion);
                $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
                $query->getStrSqlInsertUpdateDelete();
                $resultado = true;
            }

            return $resultado;
          
        }	
public function getStrEliminardias() 
        {
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL speliminarddias('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlInsertUpdateDelete();
 		 if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'dias = [ '.$this->getStrDias().' ] codigo = [ '. $this->getStrCodigo().' ] ';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'E', 'tdlaboraldias', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL sptotaldisponibilidadl();", $this->getStrCodigo());
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
            $ProcedimientoAlmacenado = sprintf("CALL splistardisponibilidadl('%d','%d','%d');","$re", "$pa","$cf");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            FORMA DE DISPONIBILIDAD<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO FORMA DE DISPONIBILIDAD</legend>
                       ';
            $retval .= '
                        <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                            <tr class="tablatitulo">
                                <th colspan="11">LISTADO DISPONIBILIDAD</th>
                            </tr>
                            <tr class="tablasubtitulo">
                                <th>...</th>  
                                <th align="center">ID Disponibilidad</th>                                                              
                                <th align="center">Jornada</th>
                                <th align="center">Aspiración salarial</th>
                                <th align="center" colspan="3">Acciones</th>
                             </tr>
                        ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["dlaboral_id"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["tipojornada_nombre"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["aspiracionsalarial_nombre"] .'</td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Actualizar <br> [ codigo = '.$rst["dlaboral_id"] .' ]">';
                    $retval .=  '<a href="'.DISPONIBILIDADLS_URL.'disponibilidadls.php?btnActualizar=Actualizar&strCodigo='. $rst["dlaboral_id"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Eliminar <br> [codigo = '.$rst["dlaboral_id"] .' ]">';
                    $retval .=  '<a href="'. DISPONIBILIDADLS_URL .'disponibilidadls.php?btnEliminar=Eliminar&strCodigo='. $rst["dlaboral_id"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Detalle Centro Formativo <br> [ codigo = '.$rst["dlaboral_id"] .' ]">';
                    $retval .=  '<a href="'. DISPONIBILIDADLS_URL .'disponibilidadls.php?btnDetalle=Detalle&strCodigo='. $rst["dlaboral_id"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                    $i = 1 - $i;
                endforeach;
            }

            $paginacion->setStrNombrePagina("disponibilidadls/disponibilidadls.php");
            $retval .= '<tr><td colspan="12" align="center">'. $paginacion->getStrPaginacion() .'</td></tr>';
            $retval .= '</table>';
            $retval .= '</fieldset>';
            return $retval;
        }
//////////////////////////////// listar dias ///////////////////////////////////////////////

  public function getStrListardias()
        {
            $paginacion = new clPaginacion();
            $query = new clQuery();

            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL sptotaldisponibilidadldias();", $this->getStrCodigo());
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
            $ProcedimientoAlmacenado = sprintf("CALL splistardisponibilidadldias('%d','%d','%d');","$re", "$pa","$cf");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            FORMA DE DISPONIBILIDAD<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO FORMA DE DISPONIBILIDAD</legend>
                       ';
            $retval .= '
                        <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                            <tr class="tablatitulo">
                                <th colspan="11">LISTADO DISPONIBILIDAD DÍAS</th>
                            </tr>
                            <tr class="tablasubtitulo">
                                <th>...</th>  
                                <th align="center">ID</th>                                                              
                              
                                <th align="center">Días</th>
                                <th align="center" colspan="1">Acciones</th>
                             </tr>
                        ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["tdlaboraldias_id"] .'</td>';
                   
                    $retval .= 	'<td align="left">'. $rst["dia_nombre"] .'</td>';
                    
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Eliminar <br> [codigo = '.$rst["tdlaboraldias_id"] .' ]">';
                    $retval .=  '<a href="'. DISPONIBILIDADLS_URL .'disponibilidadls.php?btnEliminar=Eliminardias&strCodigo='. $rst["tdlaboraldias_id"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    
                    $retval .= '</tr>';
                    $i = 1 - $i;
                endforeach;
            }

            $paginacion->setStrNombrePagina("disponibilidadls/disponibilidadls.php");
            $retval .= '<tr><td colspan="12" align="center">'. $paginacion->getStrPaginacion() .'</td></tr>';
            $retval .= '</table>';
            $retval .= '</fieldset>';
            return $retval;
        }


/////////////////////////////////////////////////////////////////////////////////////////
        
public function getStrDetallePersona()
        {
            $query = new clQuery();
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbdetalledisponibilidadl('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();
            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            DISPONIBILIDAD<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO DISPONIBILIDAD<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">DETALLE DISPONIBILIDAD
                        </legend>
                       ';

            if( count($resultado) > 0 )
            {
                $i = 0;
				$valor=$this->getStrCodigo();
			 	$v=$this->getStrBuscardls($valor);
                foreach( $resultado as $rst):
                    $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                    $retval .= '<tr>
                                    <td colspan="2" align="center">
                                        <a href="'.DISPONIBILIDADLS_URL.'disponibilidadls.php?btnNuevo=Nuevo&strCodigo='.$v.'">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" />REGRESAR LISTADO DISPONIBILIDAD|</a>
                                    <td>
                                </tr>
                                ';
                    
                    $retval .= '<tr class="tablatitulo">
                                    <th colspan="2">DETALLE&nbsp;FORMAS DE DISPONIBILIDAD;REGISTRADO</th>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Código:</th>
                                    <td align="left">  '. $rst["dlaboral_id"] .'</td>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Tipo Jornada:</th>
                                    <td align="left">  '. $rst["tipojornada_nombre"] .'</td>
                                </tr>
                                ';

                    
                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Aspiración Salarial:</th>
                                    <td align="left">  '. $rst["aspiracionsalarial_nombre"] .'</td>
                                </tr>
                                ';
					 $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Días:</th>
                                    <td align="left">  '. $rst["dia_nombre"] .'</td>
                                </tr>
                                ';
					 $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Disponibilidad para viajar eventualmente:</th>
                                    <td align="left">  '. $rst["dviajar"] .'</td>
                                </tr>
                                ';
					 $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Disponibilidad para cambiar de residencia:</th>
                                    <td align="left">  '. $rst["dresidencia"] .'</td>
                                </tr>
                                ';
					 $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Preferencia de Contración:</th>
                                    <td align="left">  '. $rst["tipocontrato_nombre"] .'</td>
                                </tr>
                                ';												
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Interés Laboral:</th>
                                    <td align="left">  '. $rst["intereslaboral_nombre"] .'</td>
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