<?php	
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.validaciones.php' );
    include_once( CLASS_PATH . "class.clquery.php" );
    include_once( CLASS_PATH . "class.clpaginacion.php" );  
	include_once( CLASS_PATH . "class.clhora.php" );
		
    class clTasignacioncu
    {
        private $StrCodigo;
       	private $StrCodigos;
		private $strFechaInicio;
		private $strFechaFin;
		private $strEtiqueta;
        private $strNombreBoton;
		private $strNombreBotonb;
        private $strValorBoton;
		private $strValorBotonb;
        private $strLectura;
		private $strusuarioscu;
		private $strNombreBotons;
        private $strValorBotons;
		private $strNombreBotona;
        private $strValorBotona;
        public function __construct()
        {
				
            $this->StrCodigo = "";	
			$this->StrCodigos = "";	
			$this->strFechaInicio = "";
			$this->strFechaFin = "";
			
			$this->strEtiqueta = "";
            $this->strNombreBoton = "";
			$this->strNombreBotonb = "";
            $this->strValorBoton = "";
			$this->strValorBotonb = "";
            $this->strLectura = "";
			$this->strusuarioscu = "";
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
//////////////////////////Fecha Ininicio //////////////////////////////////////////
public function getStrFechaInicio()
        {
            return $this->strFechaInicio;
        }

        public function setstrFechaInicio($fn)
        {
            $this->strFechaInicio = $fn;
        }		
		
//////////////////////////Fecha Fin //////////////////////////////////////////
public function getStrFechaFin()
        {
            return $this->strFechaFin;
        }

        public function setstrFechaFin($fn)
        {
            $this->strFechaFin = $fn;
        }
//////////////////////////usuarioscu //////////////////////////////////////////
public function getStrusuarioscu()
        {
            return $this->strusuarioscu;
        }

        public function setstrusuarioscu($fn)
        {
            $this->strusuarioscu = $fn;
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
			
//////////////////////////////// boton Buscar ////////////////////////////////
  public function getStrNombreBotonb()
        {
            return $this->strNombreBotonb;
        }

        public function setStrNombreBotonb($nb)
        {
            $this->strNombreBotonb = $nb;
        }

        public function getStrValorBotonb()
        {
            return $this->strValorBotonb;
        }

        public function setStrValorBotonb($vb)
        {
            $this->strValorBotonb = $vb;
        }

//////////////////////////////////////////////////////////////////////////////
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
			
          $retval  = '<script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.validate.js"></script>
                        <script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.metadata.js"></script>
                       ';

            $retval .= '<br><br><br><br>
                        <script>
                            $(document).ready(function(){
                                    $.metadata.setType( \'attr\', \'validate\' );
                                    $(\'#frmtasignacioncu\').validate({
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
		  
            $retval .= '<form id="frmtasignacioncu" action="'. TASIGNACIONCU_URL .'tasignacioncu.php" method="POST">';

            $Regresar = "regresar('". CFORMATIVO_URL . "cformativo.php')";

            $retval .= '<fieldset class="fieldsetPequeno">';
            $retval .= '<legend class="etiquetaborde">
                            Busqueda Usuarios <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Listado Busqueda Usuarios del Curso<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> '. $this->getStrEtiqueta() .'
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
                              <td  align="right"><b>Fecha&nbsp;Desde:</b></td>
                                <td align="left">
                                    <input name="dtFecha" type="text" id="dtFecha" value="'. $this->getStrFechaInicio() .'" size="10" readonly="readonly" class="textboxfecha" />
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
                                 <td  align="right"><b>Fecha&nbsp;Hasta:</b></td>
                                <td align="left">
                                    <input name="dtFechaf" type="text" id="dtFechaf" value="'. $this->getStrFechaFin() .'" size="10" readonly="readonly" class="textboxfecha" />
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
                            
							<table width="100%" border="0" align="center" cellpadding="1">
                           
                          	</tr>
                          	
	                        <tr>
                                <td colspan="4" class="formulariofila1" align="center">
                                    <input type="submit" class="boton" name="'. $this->getStrNombreBotonb() .'" value="'. $this->getStrValorBotonb() .'" />
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
      

        public function getStrIngresar() 
        {
        	
           //Nombre Procedimientos Almacenados
              foreach($this->getStrusuarioscu() as $folio20)
              {
              	$query = new clQuery();
            	$resultado = false; 
	            $ProcedimientoAlmacenado = sprintf("CALL spingresartusuariocu('%s', '%s');",
	            $folio20,$this->getStrCodigo());
	            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            	
	            if($query->getStrSqlInsertUpdateDelete())
	            {
	                //Nombre Procedimientos Almacenados [Auditoria]
	                $descripcion = 'Curso = [ '.$this->getStrCodigo().' ]  ]';
	                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'G', 'tusuariocurso', $descripcion);
	                $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
	                $query->getStrSqlInsertUpdateDelete();
	                $resultado = true;
	            }
            }

            return $resultado;
           
           
        }

public function getStrEliminar() 
        {
           $query = new clQuery();
            $resultado = TRUE;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL speliminarusuariocurso('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlInsertUpdateDelete();
			if($query->getStrSqlInsertUpdateDelete())
	            {
	                //Nombre Procedimientos Almacenados [Auditoria]
	                $descripcion = 'Curso = [ '.$this->getStrCodigo().' ]  ]';
	                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'G', 'tusuariocurso', $descripcion);
	                $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
	                $query->getStrSqlInsertUpdateDelete();
	                $resultado = true;
	            }
            

            return $resultado;

        
        }
	public function getStrBuscartacu($v) {
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $cf=$_SESSION["usuario"]["suc"];
			$me=$_SESSION["usuario"]["cuenta"];
            $ProcedimientoAlmacenado = sprintf("CALL spbidentificadortacu('%d');","$v");
			$query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
            foreach( $resultado as $rst):   
				$valor=$rst['id_curso'];
		    endforeach;
            }
		     return $valor;
        }   
 	public function getStrBuscar() 
 	{
 	$query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbusuariocurso('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
                foreach( $resultado as $rst):   
	                $this->setStrCodigo($rst['id_usuario_curso']);
                    $this->setstrusuarioscu($rst['id_usuario']);
					
					
					
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
            $ProcedimientoAlmacenado = sprintf("CALL sptotalusuariocu();", $this->getStrCodigo());
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
            $ProcedimientoAlmacenado = sprintf("CALL splistarusuariocurso('%d','%d','%d');","$re", "$pa","$cf");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            Usuarios Registrados<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">Listado Usuarios Registrados </legend>
                       ';
            $retval .= '
                        <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                            <tr class="tablatitulo">
                                <th colspan="11">LISTADO USUARIOS CURSO</th>
                            </tr>
                            <tr class="tablasubtitulo">
                            	<th align="center"></th>  
                               <th align="center">ID</th>   
                               <th align="center">ID Usuario</th>                                                             
                                <th align="center">Nombres</th>
                                <th align="center">Apellidos</th>
                                <th align="center">Email</th>
                                <th align="center">Nombre Curso</th>
                                <th align="center" colspan="3">Acciones</th>
                             </tr>
                        ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["id_usuario_curso"] .'</td>';
					$retval .= 	'<td align="center">'. $rst["id_usuario"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["primer_nombre"] .' '. $rst["segundo_nombre"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["apellido_paterno"] .' '. $rst["apellido_materno"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["email"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["nombre"] .'</td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Eliminar <br> [codigo = '.$rst["id_usuario_curso"] .' ]">';
                    $retval .=  '<a href="'.TASIGNACIONCU_URL.'tasignacioncu.php?btnEliminar=Eliminar&strCodigo='. $rst["id_usuario_curso"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Detalle Usuarios Asignados <br> [ codigo = '.$rst["id_usuario_curso"] .' ]">';
                    $retval .=  '<a href="'.TASIGNACIONCU_URL.'tasignacioncu.php?btnDetalle=Detalle&strCodigo='. $rst["id_usuario_curso"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
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
public function getStrListarb()
        {
           $retval  = '<script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.validate.js"></script>
                        <script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.metadata.js"></script>
                       ';

            $retval .= '<br><br><br><br>
                        <script>
                            $(document).ready(function(){
                                    $.metadata.setType( \'attr\', \'validate\' );
                                    $(\'#frmtasignacioncub\').validate({
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
			$retval .= '<form id="frmtasignacioncub" action="'. TASIGNACIONCU_URL .'tasignacioncu.php" method="POST">';			   
            $NHC = "";		   
		    $Regresar = "regresar('". CFORMATIVO_URL . "cformativo.php')";
		    $query = new clQuery();
            //Nombre Procedimientos Almacenados
           	 $fi=$this->getStrFechaInicio();
			 $ff=$this->getStrFechaFin();
			 $suc=$_SESSION["usuario"]["suc"];
			$ProcedimientoAlmacenado = sprintf("CALL splistarusuariocu('%s','%s','%s');","$fi","$ff","$suc");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();
			echo count($resultado);
            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            Busqueda Usuarios<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">Listado Días Curso</legend>
                       ';
            $retval .= '
                        <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                            <tr class="tablatitulo">
                                <th colspan="11">LISTADO Usuarios Sleccionados por Fechas</th>
                            </tr>
                             <input class="textbox" id="strCodigo" name="strCodigo" type="hidden" maxlength="50" value="'. $this->getStrCodigo() .'" />
                            <tr class="tablasubtitulo">
                            	<th align="center"></th>  
                               <th align="center">ID Usuario</th>                                                              
                               <th align="center">Nombres</th>
                               <th align="center">Apellidos</th>
                               <th align="center">Tipo Discapacidad</th>
                            
                             </tr>
                        ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
					
                    $retval .= '<tr class="listadofila'.$i.'">';
                    $retval .= '<td align="left"><input type="checkbox" id="strusuarioscu" name="strusuarioscu[]" value="'. $rst["id_usuario"] .'"></td>';
                    $retval .= 	'<td align="center">'. $rst["id_usuario"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["primer_nombre"] .' '. $rst["segundo_nombre"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["apellido_paterno"] .' '. $rst["apellido_materno"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["tipodiscapacidad_nombre"] .'</td>';
					
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                    $i = 1 - $i;
                endforeach;
            }
			$retval .= ' <tr>
                <td colspan="6" class="formulariofila1" align="center">
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

public function getStrDetallePersona()
        {
        	$query = new clQuery();
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbdetalleusuariocurso('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                           Detalle usuarios<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Listado Usuarios Curso <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Detalle Usuarios Curso
                        </legend>
                       ';

            if( count($resultado) > 0 )
            {
                $i = 0;
				$valor=$this->getStrCodigo();
			 	$v=$this->getStrBuscartacu($valor);
                foreach( $resultado as $rst):
                    $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                    $retval .= '<tr>
                                    <td colspan="2" align="center">
                                        <a href="'. TASIGNACIONCU_URL .'tasignacioncu.php?btnNuevo=Nuevo&strCodigo='.$v.'">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> Regresar Listado Cursos|</a>
                                    <td>
                                </tr>
                                ';
                    
                    $retval .= '<tr class="tablatitulo">
                                    <th colspan="2">DETALLE&nbsp;USUARIOS CURSO</th>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Código Usuario Curso:</th>
                                    <td align="left">  '. $rst["id_usuario_curso"] .'</td>
                                </tr>
                                ';
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Nombres:</th>
                                    <td align="left">  '. $rst["primer_nombre"] .'   '. $rst["segundo_nombre"] .'</td>
                                </tr>
                                ';    	           				 					 					
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Apellidos:</th>
                                    <td align="left">  '. $rst["apellido_paterno"] .'   '. $rst["apellido_materno"] .'</td>
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