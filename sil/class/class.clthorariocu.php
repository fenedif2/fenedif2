<?php	
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.validaciones.php' );
    include_once( CLASS_PATH . "class.clquery.php" );
    include_once( CLASS_PATH . "class.clpaginacion.php" );  
	include_once( CLASS_PATH . "class.clhora.php" );
	include_once( CLASS_PATH . "class.clthorariocu.php" );
	
    class clThorariocu
    {
        private $StrCodigo;
        private $strNombre;
		private $strHorario;
		private $strLunes;
		private $strMartes;
		private $strMiercoles;
		private $strJueves;
		private $strViernes;
		private $strSabado;
		private $strDomingo;
		private $strDias;
		private $strHorainicio;
		private $strHorafin;
		private $StrCodigos;
		private $strNombreBotons;
        private $strValorBotons;
		private $strNombreBotona;
        private $strValorBotona;
        public function __construct()
        {
				
            $this->StrCodigo = "";	
			$this->strNombre = "";
			$this->strHorario = "";
			$this->strLunes = "1";
			$this->strMartes = "2";
			$this->strMiercoles = "3";
			$this->strJueves = "4";
			$this->strViernes = "5";
			$this->strSabado = "6";
			$this->strDomingo = "7";
			$this->strDias = "";
			$this->strHorainicio = "";
			$this->strHorafin = "";
			$this->StrCodigos = "";	
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
 //////////////////// codigo centro Fromativo//////////////////
        public function getStrCodigos()
        {
            return $this->StrCodigos;
        }
		public function setStrCodigos($n)
        {
            $this->StrCodigos = $n;
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
////////////// Horario/////////////////////
        public function getStrHorario()
        {
            return $this->strHorario;
        }
		public function setStrHorario($n)
        {
            $this->strHorario = $n;
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
////////////// hora inicio ////////////////////
        public function getStrHorainicio()
        {
            return $this->strHorainicio;
        }
		public function setStrHorainicio($n)
        {
            $this->strHorainicio = $n;
        }			
////////////// hora fin ////////////////////
        public function getStrHorafin()
        {
            return $this->strHorafin;
        }
		public function setStrHorafin($n)
        {
            $this->strHorafin = $n;
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

///////////////////////////nombre/////////////////////////
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
//////////////////////////////valor///////////////////////////
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
          $horainicio= new clHora();
          $horafin= new clHora(); 
			
          $retval  = '<script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.validate.js"></script>
                        <script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.metadata.js"></script>
                       ';

            $retval .= '<br><br><br><br>
                        <script>
                            $(document).ready(function(){
                                    $.metadata.setType( \'attr\', \'validate\' );
                                    $(\'#frmthorariocu\').validate({
                                            rules:{
                                               strNombre: { required: true},
                                              
											    
                                            	
												strObservaciond: { required: true }
                                                  },
                                            messages:{
                                              	strNombre: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                              	
												
                                               
                                              
												strObservaciond: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"}
												     }
                                    });
                                   
                                     
									
								 
                 				
			
								 
                            });
                        </script>
                       ';
		  
            $retval .= '<form id="frmthorariocu" action="'. THORARIOCU_URL .'thorariocu.php" method="POST">';

            $Regresar = "regresar('". CFORMATIVO_URL . "cformativo.php')";

            $retval .= '<fieldset class="fieldsetPequeno">';
            $retval .= '<legend class="etiquetaborde">
                            HORARIO <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> LISTADO HORARIO del Curso<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> '. $this->getStrEtiqueta() .'
                          </legend>
                       ';
            $NHC = "";		   
            $retval .= '
                        <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="6" align="center" class="tablatitulo">'. $this->getStrEtiqueta() .'</td>
                                <input class="textbox" id="strCodigo" name="strCodigo" type="hidden" maxlength="50" value="'. $this->getStrCodigo() .'" />
                                <input class="textbox" id="strCodigos" name="strCodigos" type="hidden" maxlength="50" value="'. $this->getStrCodigos() .'" />
                            </tr>
							<tr class="formulariofila1">
                               <td align="right"><b>Hora Desde:&nbsp;</b></td>
                                <td align="left">                                    
                                    <select name="lsHorainicio" id="lsHorainicio"  class="combobox">
                                        '. $horainicio->getStrListar($this->getStrHorainicio()) .'
                                    </select>
                                </td>
                                <td align="right"><b>Hora Hasta:&nbsp;</b></td>
                                <td align="left">                                    
                                    <select name="lsHorafin" id="lsHorafin"  class="combobox">
                                        '. $horafin->getStrListar($this->getStrHorafin()) .'
                                    </select>
                                </td>
                            </tr>
                            
							<table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">SELECCIONE LOS DÍAS</td>
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
                                	<input type="checkbox" id="strdias" name="strdias[]" value="'. $this->getStrMiercoles().'"> Miercoles<br>
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
        	
            //Nombre Procedimientos Almacenados
              foreach($this->getStrDias() as $folio20)
              {
              	$query = new clQuery();
            	$resultado = false; 
	            $ProcedimientoAlmacenado = sprintf("CALL spingresarhorariocu('%s', '%s','%s', '%s');",
	            $folio20,$this->getStrHorainicio(),$this->getStrHorafin(),$this->getStrCodigo());
	            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            	
	            if($query->getStrSqlInsertUpdateDelete())
	            {
	                //Nombre Procedimientos Almacenados [Auditoria]
	                $descripcion = 'Dias = [ '.$this->getStrDias().' ]  ]';
	                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'GUARDAR', 'thorario_curso', $descripcion);
	                $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
	                $query->getStrSqlInsertUpdateDelete();
	                $resultado = true;
	            }
            }

            return $resultado;
           
        }

	public function getStrActualizar() 
		{
			
               //Nombre Procedimientos Almacenados

              	$query = new clQuery();
            	$resultado = false; 
	            $ProcedimientoAlmacenado = sprintf("CALL spactualizarhorariocu('%s', '%s','%s', '%s');",
	            $folio20,$this->getStrHorainicio(),$this->getStrHorafin());
	            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            	
	            if($query->getStrSqlInsertUpdateDelete())
	            {
	                //Nombre Procedimientos Almacenados [Auditoria]
	                $descripcion = 'Dias = [ '.$this->getStrDias().' ]  ]';
	                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'ACTUALIZAR', 'thorario_curso', $descripcion);
	                $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
	                $query->getStrSqlInsertUpdateDelete();
	                $resultado = true;
	            }
           
			
            return $resultado;
            
        }
 public function getStrEliminar() 
        {
            $query = new clQuery();
            $resultado = TRUE;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL speliminarthorariocu('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlInsertUpdateDelete();
			if($query->getStrSqlInsertUpdateDelete())
	            {
	                //Nombre Procedimientos Almacenados [Auditoria]
	                $descripcion = 'Dias = [ '.$this->getStrDomingo().' ]  ]';
	                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'ELIMINAR', 'thorario_curso', $descripcion);
	                $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
	                $query->getStrSqlInsertUpdateDelete();
	                $resultado = true;
	            }
           
			
            return $resultado;

        
        }
	public function getStrBuscarthcu($v) {
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $cf=$_SESSION["usuario"]["suc"];
			$me=$_SESSION["usuario"]["cuenta"];
            $ProcedimientoAlmacenado = sprintf("CALL spbidentificadorthcu('%d');","$v");
			$query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
            foreach( $resultado as $rst):   
				$valor=$rst['id_tcursocf'];
		    endforeach;
            }
		     return $valor;
        }    
 	public function getStrBuscar() 
 	{
 		$query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbthorariocu('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
                foreach( $resultado as $rst):   
	                
                    $this->setStrDias($rst['dia_id']);
					$this->setStrHorainicio($rst['hora_inicio']);
					$this->setStrHorafin($rst['hora_fin']);
					
					
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
            $ProcedimientoAlmacenado = sprintf("CALL sptotalhorariocu();", $this->getStrCodigo());
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
            $ProcedimientoAlmacenado = sprintf("CALL splistarhorariocu('%d','%d','%d');","$re", "$pa","$cf");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            HORARIO<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO DÍAS CURSO</legend>
                       ';
            $retval .= '
                        <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                            <tr class="tablatitulo">
                                <th colspan="11">LISTADO DÍAS CURSO</th>
                            </tr>
                            <tr class="tablasubtitulo">
                            	<th align="center"></th>  
                               <th align="center">ID Acceso</th>                                                              
                                <th align="center">Dia</th>
                                <th align="center">Hora Inicio</th>
                                <th align="center">Hora Fin</th>
                                <th align="center" colspan="3">Acciones</th>
                             </tr>
                        ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["horario_id"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["dia_nombre"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["hinicio"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["hfin"] .'</td>';
					$retval .= 	'<td align="center"><div class="vtip" title="ACTUALIZAR HORARIO <br> [ codigo = '.$rst["horario_id"] .' ]">';
                    $retval .=  '<a href="'.THORARIOCU_URL.'thorariocu.php?btnActualizar=Actualizar&strCodigo='. $rst["horario_id"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="ELIMINAR HORARIO <br> [codigo = '.$rst["horario_id"] .' ]">';
                    $retval .=  '<a href="'.THORARIOCU_URL.'thorariocu.php?btnEliminar=Eliminar&strCodigo='. $rst["horario_id"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="DETALLE HORARIO<br> [ codigo = '.$rst["horario_id"] .' ]">';
                    $retval .=  '<a href="'.THORARIOCU_URL.'thorariocu.php?btnDetalle=Detalle&strCodigo='. $rst["horario_id"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                    $i = 1 - $i;
                endforeach;
            }

            $paginacion->setStrNombrePagina("thorariocu/thorariocu.php");
            $retval .= '<tr><td colspan="12" align="center">'. $paginacion->getStrPaginacion() .'</td></tr>';
            $retval .= '</table>';
            $retval .= '</fieldset>';
            return $retval;
            
        }

public function getStrDetallePersona()
        {
        	$query = new clQuery();
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbdetallethorariocu('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                           HORARIO<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO HORARIO Curso <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">DETALLE HORARIO
                        </legend>
                       ';

            if( count($resultado) > 0 )
            {
                $i = 0;
				$valor=$this->getStrCodigo();
			 	$v=$this->getStrBuscarthcu($valor);
                foreach( $resultado as $rst):
                    $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                    $retval .= '<tr>
                                    <td colspan="2" align="center">
                                        <a href="'. THORARIOCU_URL .'thorariocu.php?btnNuevo=Nuevo&strCodigo='.$v.'">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> Regresar Listado Cursos|</a>
                                    <td>
                                </tr>
                                ';
                    
                    $retval .= '<tr class="tablatitulo">
                                    <th colspan="2">DETALLE&nbsp; HORARIO CURSOS;REGISTRADO</th>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Código Horario:</th>
                                    <td align="left">  '. $rst["horario_id"] .'</td>
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