<?php	
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.validaciones.php' );
    include_once( CLASS_PATH . "class.clquery.php" );
    include_once( CLASS_PATH . "class.clpaginacion.php" );  
	include_once( CLASS_PATH . "class.clcertificado.php" );
	
	include_once( CLASS_PATH . "class.clhcomunicativas.php" );
	include_once( CLASS_PATH . "class.clnivel.php" ); 
	include_once( CLASS_PATH . "class.clexperiencia.php" );
	include_once( CLASS_PATH . "class.clderivacioninterna.php" );
	include_once( CLASS_PATH . "class.clderivacionexterna.php" );
	
    class clCompetencias
    {
        private $StrCodigo;
		private $strHcomunicativas;
		private $strHsociales;
		private $strTequipo;
		private $strIniciativa;
		private $strObservacionesini;
		private $strAdaptacion;
		private $strObservacionesada;
		private $strResponsabilidad;
		private $strObservacionesres;
		private $strInterpersonales;
		private $strObservacionesper;
		private $strDerivacion;
		private $strObservacionesder;
		private $strDerivacionint;
		private $strDerivacionext;
		
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
			$this->strHcomunicativas= "";
			$this->strHsociales= "";
			$this->strTequipo= "";
			$this->strIniciativa= "";
			$this->strObservacionesini= "";
			$this->strAdaptacion= "";
			$this->strObservacionesada= "";
			$this->strDerivacion= "";
			$this->strObservacionesder= "";
			$this->strDerivacionint= "";
			$this->strDerivacionext= "";
			$this->strEtiqueta = "";
            $this->strNombreBoton = "";
            $this->strValorBoton = "";
			$this->strNombreBotons = "";
            $this->strValorBotons = "";
			$this->strNombreBotona = "";
            $this->strValorBotona = "";
            $this->strLectura = "";
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
                
////////////////////////////////Hcomunicativas //////////////////////////////////////////////////////////////////////
		public function getstrHcomunicativas()
	        {
	            return $this->strHcomunicativas;
	        }

        public function setstrHcomunicativas($exp)
	        {
	            $this->strHcomunicativas= $exp;
	        }
////////////////////////////////Hsociales //////////////////////////////////////////////////////////////////////
		public function getstrHsociales()
	        {
	            return $this->strHsociales;
	        }

        public function setstrHsociales($exp)
	        {
	            $this->strHsociales= $exp;
	        }
////////////////////////////////Tequipo //////////////////////////////////////////////////////////////////////
		public function getstrTequipo()
	        {
	            return $this->strTequipo;
	        }

        public function setstrTequipo($exp)
	        {
	            $this->strTequipo= $exp;
	        }	
////////////////////////////////Iniciativa //////////////////////////////////////////////////////////////////////
		public function getstrIniciativa()
	        {
	            return $this->strIniciativa;
	        }

        public function setstrIniciativa($exp)
	        {
	            $this->strIniciativa= $exp;
	        }	
////////////////////////////////Observacionesini //////////////////////////////////////////////////////////////////////
		public function getstrObservacionesini()
	        {
	            return $this->strObservacionesini;
	        }

        public function setstrObservacionesini($exp)
	        {
	            $this->strObservacionesini= $exp;
	        }		
////////////////////////////////Adapatacion //////////////////////////////////////////////////////////////////////
		public function getstrAdaptacion()
	        {
	            return $this->strAdaptacion;
	        }

        public function setstrAdaptacion($exp)
	        {
	            $this->strAdaptacion= $exp;
	        }	
////////////////////////////////Observacionesada //////////////////////////////////////////////////////////////////////
		public function getstrObservacionesada()
	        {
	            return $this->strObservacionesada;
	        }

        public function setstrObservacionesada($exp)
	        {
	            $this->strObservacionesada= $exp;
	        }		
////////////////////////////////Responsabilidad//////////////////////////////////////////////////////////////////////
		public function getstrResponsabilidad()
	        {
	            return $this->strResponsabilidad;
	        }

        public function setstrResponsabilidad($exp)
	        {
	            $this->strResponsabilidad= $exp;
	        }	
////////////////////////////////Observacionesres //////////////////////////////////////////////////////////////////////
		public function getstrObservacionesres()
	        {
	            return $this->strObservacionesres;
	        }

        public function setstrObservacionesres($exp)
	        {
	            $this->strObservacionesres= $exp;
	        }			
////////////////////////////////Interpersonales//////////////////////////////////////////////////////////////////////
		public function getstrInterpersonales()
	        {
	            return $this->strInterpersonales;
	        }

        public function setstrInterpersonales($exp)
	        {
	            $this->strInterpersonales= $exp;
	        }	
////////////////////////////////Observacionesper //////////////////////////////////////////////////////////////////////
		public function getstrObservacionesper()
	        {
	            return $this->strObservacionesper;
	        }

        public function setstrObservacionesper($exp)
	        {
	            $this->strObservacionesper= $exp;
	        }
////////////////////////////////Derivacion //////////////////////////////////////////////////////////////////////
		public function getstrDerivacion()
	        {
	            return $this->strDerivacion;
	        }

        public function setstrDerivacion($exp)
	        {
	            $this->strDerivacion= $exp;
	        }
////////////////////////////////Observacionesder //////////////////////////////////////////////////////////////////////
		public function getstrObservacionesder()
	        {
	            return $this->strObservacionesder;
	        }

        public function setstrObservacionesder($exp)
	        {
	            $this->strObservacionesder= $exp;
	        }
////////////////////////////////Derivacionint //////////////////////////////////////////////////////////////////////
		public function getstrDerivacionint()
	        {
	            return $this->strDerivacionint;
	        }

        public function setstrDerivacionint($exp)
	        {
	            $this->strDerivacionint= $exp;
	        }	
////////////////////////////////Derivacionext //////////////////////////////////////////////////////////////////////
		public function getstrDerivacionext()
	        {
	            return $this->strDerivacionext;
	        }

        public function setstrDerivacionext($exp)
	        {
	            $this->strDerivacionext= $exp;
	        }												
 /////////////////////////////Etiqueta///////////////////////////////////////////////
        public function getStrEtiqueta()
        {
            return $this->strEtiqueta;
        }

        public function setStrEtiqueta($e)
        {
            $this->strEtiqueta = $e;
        }
 /////////////////////////////Nombre boton///////////////////////////////////////////////
        public function getStrNombreBoton()
        {
            return $this->strNombreBoton;
        }

        public function setStrNombreBoton($nb)
        {
            $this->strNombreBoton = $nb;
        }
////////////////////////////nombre /////////////////////////////////////
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
////////////////////////////// valor /////////////////////////////////////////////
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
 /////////////////////////////valor boton///////////////////////////////////////////////
        public function getStrValorBoton()
        {
            return $this->strValorBoton;
        }

        public function setStrValorBoton($vb)
        {
            $this->strValorBoton = $vb;
        }
 /////////////////////////////Lectura///////////////////////////////////////////////
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
        $hcomunicativas = new clHcomunicativas();	
		$hsociales = new clNivel;	
		$tequipo = new clExperiencia;               
		$iniciativa = new clNivel;	
		$adaptacion = new clNivel;	
		$responsabilidad = new clNivel;	
		$interpersonales = new clNivel;
		$derivacion = new clExperiencia;
		$derivacionint = new clDerivacioninterna;
		$derivacionext = new clDerivacionexterna;
          $retval  = '<script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.validate.js"></script>
                        <script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.metadata.js"></script>
                       ';

            $retval .= '<br><br><br><br>
                        <script>
                            $(document).ready(function(){
                                    $.metadata.setType( \'attr\', \'validate\' );
                                    $(\'#frmcompetencias\').validate({
                                            rules:{
                                               
											    
                                            	
												strObservaciond: { required: true }
                                                  },
                                            messages:{
                                              	
												
                                               
                                              
												strObservaciond: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"}
												     }
                                    });
                        });
                        </script>
                       ';
		  
            $retval .= '<form id="frmcompetencias" action="'. COMPETENCIAS_URL .'competencias.php" method="POST">';

            $Regresar = "regresar('". COMPETENCIAS_URL. "competencias.php')";

            $retval .= '<fieldset class="fieldsetPequeno">';
            $retval .= '<legend class="etiquetaborde">
                            COMPETENCIAS <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO COMPETENCIAS<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> '. $this->getStrEtiqueta() .'
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
                                <td align="right"><b>Habilidades Comunicativas:&nbsp;</b></td>
                                <td align="left">                                    
                                    <select name="lsHcomunicativas" id="lsHcomunicativas"  class="combobox">
                                        '. $hcomunicativas->getStrListar($this->getstrHcomunicativas()) .'
                                    </select>
                                </td>
                             	<td align="right"><b>Habilidades sociales:&nbsp;</b></td>
                                <td align="left">                                    
                                    <select name="lsHsociales" id="lsHsociales"  class="combobox">
                                        '. $hsociales->getStrListar($this->getstrHsociales()) .'
                                    </select>
                                </td>
                            </tr>
                            <tr class="formulariofila1">
                                <td align="right"><b>Trabaja en Equipo:&nbsp;</b></td>
                                <td align="left">                                    
                                    <select name="lsTequipo" id="lsTequipo"  class="combobox">
                                        '. $tequipo->getStrListar($this->getstrTequipo()) .'
                                    </select>
                                </td>
                                
                             	
                            </tr>
							 <tr class="formulariofila1">
                               <td align="right"><b>Capacidad de iniciativa:&nbsp;</b></td>
                                <td align="left">                                    
                                    <select name="lsIniciativa" id="lsIniciativa"  class="combobox">
                                        '. $iniciativa->getStrListar($this->getstrIniciativa()) .'
                                    </select>
                                </td>
							     <td  align="right"><b>Observaciones:&nbsp;</b></td>
                                <td align="left">
                                    <input class="textbox" id="strObservacionesini" name="strObservacionesini" type="text" maxlength="100"  value="'. $this->getstrObservacionesini().'" />
                                </td>
                              </tr>
							<tr class="formulariofila1">
                               <td align="right"><b>Adaptación:&nbsp;</b></td>
                                <td align="left">                                    
                                    <select name="lsAdaptacion" id="lsAdaptacion"  class="combobox">
                                        '. $adaptacion->getStrListar($this->getstrAdaptacion()) .'
                                    </select>
                                </td>
							     <td  align="right"><b>Observaciones:&nbsp;</b></td>
                                <td align="left">
                                    <input class="textbox" id="strObservacionesada" name="strObservacionesada" type="text" maxlength="100"  value="'. $this->getstrObservacionesada().'" />
                                </td>
                              </tr>
                             <tr class="formulariofila1">
                               <td align="right"><b>Responsabilidad:&nbsp;</b></td>
                                <td align="left">                                    
                                    <select name="lsResponsabilidad" id="lsResponsabilidad"  class="combobox">
                                        '. $responsabilidad->getStrListar($this->getstrResponsabilidad()) .'
                                    </select>
                                </td>
							     <td  align="right"><b>Observaciones:&nbsp;</b></td>
                                <td align="left">
                                    <input class="textbox" id="strObservacionesres" name="strObservacionesres" type="text" maxlength="100"  value="'. $this->getstrObservacionesres().'" />
                                </td>
                              </tr> 
							<tr class="formulariofila1">
                               <td align="right"><b>Relaciones Interpersonales:&nbsp;</b></td>
                                <td align="left">                                    
                                    <select name="lsInterpersonales" id="lsInterpersonales"  class="combobox">
                                        '. $interpersonales->getStrListar($this->getstrInterpersonales()) .'
                                    </select>
                                </td>
							     <td  align="right"><b>Observaciones:&nbsp;</b></td>
                                <td align="left">
                                    <input class="textbox" id="strObservacionesper" name="strObservacionesper" type="text" maxlength="100"  value="'. $this->getstrObservacionesper().'" />
                                </td>
                              </tr> 
							<tr class="formulariofila1">
                               <td  align="right"><b>Tolerancia al Estrés:&nbsp;</b></td>
                                <td align="left">
                                    <input class="textbox" id="strObservacionesder" name="strObservacionesder" type="text" maxlength="100"  value="'. $this->getstrObservacionesder().'" />
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
         $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spingresarcompetencias('%s','%s','%s','%s','%s','%s','%s','%s',
			'%s','%s','%s','%s','%s');",
            $this->getstrHcomunicativas(),$this->getstrHsociales(),$this->getstrTequipo(),$this->getstrIniciativa(),
            $this->getstrObservacionesini(),$this->getstrAdaptacion(),$this->getstrObservacionesada(),$this->getstrResponsabilidad(),
            $this->getstrObservacionesres(),$this->getstrInterpersonales(),$this->getstrObservacionesper(),
            $this->getstrObservacionesder(),$this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);

            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Accesibilidad = [ '.$this->getstrHcomunicativas().' ] Competencias = [ '. $this->getStrCodigo().' ] ';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'GUARDAR', 'tcompetencias', $descripcion);
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
			 $ProcedimientoAlmacenado = sprintf("CALL spactualizarcompetencias('%s','%s','%s','%s','%s','%s','%s','%s',
			'%s','%s','%s','%s','%s');",
            $this->getStrCodigo(),$this->getstrHcomunicativas(),$this->getstrHsociales(),$this->getstrTequipo(),$this->getstrIniciativa(),
            $this->getstrObservacionesini(),$this->getstrAdaptacion(),$this->getstrObservacionesada(),$this->getstrResponsabilidad(),
            $this->getstrObservacionesres(),$this->getstrInterpersonales(),$this->getstrObservacionesper(),$this->getstrObservacionesder());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);

            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Accesibilidad = [ '.$this->getstrHcomunicativas().' ] Competencias = [ '. $this->getStrCodigo().' ] ';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'ACTUALIZAR', 'tcompetencias', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL speliminarcompetencia('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlInsertUpdateDelete();
 			 if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Accesibilidad = [ '.$this->getstrHcomunicativas().' ] Competencias = [ '. $this->getStrCodigo().' ] ';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'ELIMINAR', 'tcompetencias', $descripcion);
                $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
                $query->getStrSqlInsertUpdateDelete();
                $resultado = true;
            }

            return $resultado;
            
        }
public function getStrBuscaru($v) 
	{
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbidentificadorcomp('%d');","$v");
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
 	public function getStrBuscar() 
 	{
 		$query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbcompetencias('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
                foreach( $resultado as $rst): 
				$this->setStrCodigo($rst['tcompetencias_id']);	  
	         	$this->setstrHcomunicativas($rst["hcomunicativas_id"]);
				$this->setstrHsociales($rst["hsociales_id"]);
				$this->setstrTequipo($rst["tequipo_id"]);
				$this->setstrIniciativa($rst["iniciativa_id"]);
				$this->setstrObservacionesini($rst["observacionesini"]);
				$this->setstrAdaptacion($rst["adaptacion_id"]);
				$this->setstrObservacionesada($rst["observacionesada"]);
				$this->setstrResponsabilidad($rst["responsabilidad_id"]);
				$this->setstrObservacionesres($rst["observacionesres"]);
				$this->setstrInterpersonales($rst["interpersonales_id"]);
				$this->setstrObservacionesper($rst["observacionesper"]);
				$this->setstrDerivacion($rst["derivacion_id"]);
				$this->setstrObservacionesder($rst["observacionesder"]);
				$this->setstrDerivacionint($rst["derivacionint_id"]);
				$this->setstrDerivacionext($rst["derivacionext_id"]);
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
            $ProcedimientoAlmacenado = sprintf("CALL sptotalcompetencias();", $this->getStrCodigo());
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
            $ProcedimientoAlmacenado = sprintf("CALL splistarcompetencias('%d','%d','%d');","$re", "$pa","$cf");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            COMPETENCIAS<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO COMPETENCIAS</legend>
                       ';
            $retval .= '
                        <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                            <tr class="tablatitulo">
                                <th colspan="12">LISTADO COMPETENCIAS</th>
                            </tr>
                            <tr class="tablasubtitulo">
                               <th align="center"> </th> 
                                <th align="center">Id</th>                                                               
                                <th align="center">Habilidades Comunicativas</th>
                                <th align="center">Habilidades Sociales</th>
                                <th align="center">Trabaja en Equipo</th>
                                <th align="center">Capacidad de Iniciativa</th>
                                <th align="center" colspan="3">Acciones</th>
                             </tr>
                        ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["tcompetencias_id"] .'</td>';
                   	$retval .= 	'<td align="left">'. $rst["habilidadescomunicativas_nombre"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["hsaciales"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["tequipo"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["iniciativa"] .'</td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="ACTUALIZAR COMPETENCIAS <br> [ codigo = '.$rst["tcompetencias_id"] .' ]">';
                    $retval .=  '<a href="'.COMPETENCIAS_URL.'competencias.php?btnActualizar=Actualizar&strCodigo='. $rst["tcompetencias_id"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="ELIMINAR COMPETENCIAS<br> [codigo = '.$rst["tcompetencias_id"] .' ]">';
                    $retval .=  '<a href="'.COMPETENCIAS_URL.'competencias.php?btnEliminar=Eliminar&strCodigo='. $rst["tcompetencias_id"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="DETALLE COMPETENCIAS <br> [ codigo = '.$rst["tcompetencias_id"] .' ]">';
                    $retval .=  '<a href="'.COMPETENCIAS_URL.'competencias.php?btnDetalle=Detalle&strCodigo='. $rst["tcompetencias_id"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
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
            $ProcedimientoAlmacenado = sprintf("CALL spbdetalletcompetencias('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            COMPETENCIAS<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO COMPETENCIAS<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">DETALLE COMPETENCIAS
                        </legend>
                       ';

            if( count($resultado) > 0 )
            {
                $i = 0;
				$valor=$this->getStrCodigo();
			 	$v=$this->getStrBuscaru($valor);
                foreach( $resultado as $rst):
                    $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                    $retval .= '<tr>
                                    <td colspan="2" align="center">
                                        <a href="'. COMPETENCIAS_URL .'competencias.php?btnNuevo=Nuevo&strCodigo='.$v.'">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" />REGRESAR LISTADO COMPETENCIAS|</a>
                                    <td>
                                </tr>
                                ';
                    
                    $retval .= '<tr class="tablatitulo">
                                    <th colspan="2">DETALLE&nbsp; TIPO DE COMPETENCIAS</th>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Código:</th>
                                    <td align="left">  '. $rst["tcompetencias_id"] .'</td>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Habilidades Comunicativas:</th>
                                    <td align="left">  '. $rst["habilidadescomunicativas_nombre"] .' </td>
                                </tr>
                                ';
                     $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">habilidades Sociales:</th>
                                    <td align="left">  '. $rst["hsaciales"] .'</td>
                                </tr>
                                ';
	 				$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Trabaja en Equipo:</th>
                                    <td align="left">  '. $rst["tequipo"] .' </td>
                                </tr>
                                ';
                     $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Capacidad Iniciativa:</th>
                                    <td align="left">  '. $rst["iniciativa"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Observaciones:</th>
                                    <td align="left">  '. $rst["observacionesini"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Adaptación:</th>
                                    <td align="left">  '. $rst["adaptacion"] .' </td>
                                </tr>
                                ';
                     $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Observaciones:</th>
                                    <td align="left">  '. $rst["observacionesada"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Responsabilidades:</th>
                                    <td align="left">  '. $rst["responsabilidad"] .' </td>
                                </tr>
                                ';
                     $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Observaciones:</th>
                                    <td align="left">  '. $rst["observacionesres"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Relaciones Interpersonales:</th>
                                    <td align="left">  '. $rst["interpersonales"] .' </td>
                                </tr>
                                ';
                     $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Observaciones:</th>
                                    <td align="left">  '. $rst["observacionesper"] .'</td>
                                </tr>
                                ';	
					
                     $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Observaciones:</th>
                                    <td align="left">  '. $rst["observacionesder"] .'</td>
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