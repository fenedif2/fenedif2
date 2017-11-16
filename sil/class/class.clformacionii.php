<?php	
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.validaciones.php' );
    include_once( CLASS_PATH . "class.clquery.php" );
    include_once( CLASS_PATH . "class.clpaginacion.php" );   
	 
	include_once( CLASS_PATH . "class.cltformacionii.php" ); 
	include_once( CLASS_PATH . "class.clinstitucion.php" ); 
	include_once( CLASS_PATH . "class.clexperiencia.php" );
	include_once( CLASS_PATH . "class.clcentroformativo.php" );
	include_once( CLASS_PATH . "class.clcursos.php" );
	
    class clFormacionii
    {
        private $strNcurso;	
		private $strInstitucion;
		private $strInstitucionb;
		private $strDuracion;
		private $strFechaIngreso;
		private $strCapacitacionsil;
		private $strCformativo;
		private $strCursos;
		private $strCurso;
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
          	$this->strNcurso = ""; 	
		  	$this->strInstitucion="";
			$this->strInstitucionb="";
			$this->strDuracion="";
			$this->strFechaIngreso="";
			$this->strCapacitacionsil=" ";
			$this->strCformativo=" ";
			$this->strCurso=" ";
			$this->strCursos=" ";
			$this->strCodigo="";
			
			
			   	
		 
		    $this->strEtiqueta = "";
            $this->strNombreBoton = "";
            $this->strValorBoton = "";
            $this->strNombreBotons = "";
            $this->strValorBotons = "";
			$this->strNombreBotona = "";
            $this->strValorBotona = "";
            $this->strLectura = "";
		}
    
 ////////////// Nombre del curso /////////////////////
        public function getStrNcurso()
        {
            return $this->strNcurso;
        }
		public function setStrNcurso($tf)
        {
            $this->strNcurso = $tf;
        }
 ////////////// Nombre Institución /////////////////////
        public function getStrInstitucion()
        {
            return $this->strInstitucion;
        }
		public function setStrInstitucion($tf)
        {
            $this->strInstitucion = $tf;
        }
///////////// Nombre Instituciónb /////////////////////
        public function getStrInstitucionb()
        {
            return $this->strInstitucionb;
        }
		public function setStrInstitucionb($tf)
        {
            $this->strInstitucionb = $tf;
        }		
		
 ////////////// Duracion /////////////////////
        public function getStrDuracion()
        {
            return $this->strDuracion;
        }
		public function setStrDuracion($tf)
        {
            $this->strDuracion= $tf;
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
/////////////////////////Capacitacionsil//////////////////////////
 	public function getStrCapacitacionsil()
        {
            return $this->strCapacitacionsil;
        }

        public function setStrCapacitacionsil($et)
        {
            $this->strCapacitacionsil= $et;
        }
/////////////////////////Centro Formativo//////////////////////////
 	public function getStrCformativo()
        {
            return $this->strCformativo;
        }

        public function setStrCformativo($et)
        {
            $this->strCformativo= $et;
        }	
/////////////////////////Cursos//////////////////////////
 	public function getStrCursos()
        {
            return $this->strCursos;
        }

        public function setStrCursos($et)
        {
            $this->strCursos= $et;
        }	
/////////////////////////Curso//////////////////////////
 	public function getStrCurso()
        {
            return $this->strCurso;
        }

        public function setStrCurso($et)
        {
            $this->strCurso= $et;
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

                
 ///////////////////////////Etiqueta/////////////////////////////////////////////////
        public function getStrEtiqueta()
        {
            return $this->strEtiqueta;
        }

        public function setStrEtiqueta($e)
        {
            $this->strEtiqueta = $e;
        }
 ///////////////////////////Boton/////////////////////////////////////////////////
        public function getStrNombreBoton()
        {
            return $this->strNombreBoton;
        }

        public function setStrNombreBoton($nb)
        {
            $this->strNombreBoton = $nb;
        }
////////////////////// nombre //////////////////////////////////////////
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
///////////////////// valor //////////////////////////////////////////
		public function getStrValorBotons()
        {
            return $this->strValorBotons;
        }

        public function setStrValorBotons($vb)
        {
            $this->strValorBotons = $vb;
        }
 ///////////////////////////Valor Boton/////////////////////////////////////////////////
        public function getStrValorBoton()
        {
            return $this->strValorBoton;
        }

        public function setStrValorBoton($vb)
        {
            $this->strValorBoton = $vb;
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
 ///////////////////////////Lectura/////////////////////////////////////////////////
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
        	$institucion = new clinstitucion();
			$capacitadosil = new clExperiencia();
			$cformativo = new clcentroformativo();
			$cursos = new clcursos();
    	     
         $retval  = '<script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.validate.js"></script>
                        <script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.metadata.js"></script>
                       ';

            $retval .= '<br><br><br><br>
                        <script>
                            $(document).ready(function(){
                                    $.metadata.setType( \'attr\', \'validate\' );
                                    $(\'#frmformacionii\').validate({
                                            rules:{
                                         	   
												
                                                  },
                                            messages:{
                                              	
												     }
                                    });
									 							
								  $("#lsCformativo").change(function () 
								  {
                                    $("#lsCformativo option:selected").each(function () 
                                    {
                                            var centroformativo = $(this).val();
                                            $.post( "'.FORMACIONII_URL .'formacionii.php", { btnBuscar: "Cursos",
                                                                                      strCodigocentroformativo: centroformativo
                                                                                    },
                                        function(data){
                                                $("#lsCursos").html(data);
                                        });
                                    });
                                 });
								 
								 
								 
	                           });
                        </script>
                       ';
		  
            $retval .= '<form id="frmformacionii" action="'. FORMACIONII_URL.'formacionii.php" method="POST">';

            $Regresar = "regresar('". FORMACIONII_URL . "formacionii.php')";
            $retval .= '<fieldset class="fieldsetPequeno">';
            $retval .= '<legend class="etiquetaborde">
                            CAPACITACIÓN RECIBIDA<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO CAPACITACIÓN RECIBIDA<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> '. $this->getStrEtiqueta() .'
                          </legend>
                       ';
            $NHC = "";		   
            $retval .= '
                        <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">'. $this->getStrEtiqueta() .'</td>
                                <input class="textbox" id="strCodigo" name="strCodigo" type="hidden" maxlength="50" value="'. $this->getStrCodigo() .'" />

                                
                                
   							 	
   							 <tr class="formulariofila1">
                               <td  align="right"><b>Nombre del curso::&nbsp;</b></td>
                                <td align="left">
                                    <input class="textbox" id="strNcurso" name="strNcurso" type="text" maxlength="100"  value="'. $this->getStrNcurso().'" />
                                    
                                </td>
                                <td align="right"><b>Institución:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsInstitucion" id="lsInstitucion"  class="combobox">
	                                        '. $institucion->getStrListar($this->getStrInstitucion()) .'
	                                    </select>
                                </td> 
                                
                            </tr>
                			<tr class="formulariofila1">
                				<td  align="right"><b>Institución:&nbsp;</b></td>
                                <td align="left">
                                    <input class="textbox" id="strInstitucion" name="strInstitucion" type="text" maxlength="100"  value="'. $this->getStrInstitucionb().'" />
                                    
                                </td>
                				<td  align="right"><b>Duración:&nbsp;</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strDuracion" name="strDuracion" type="text" maxlength="100"  value="'. $this->getStrDuracion().'" />
                                </td> 
                           </tr>
                           <tr class="formulariofila1">
                				<td  align="right"><b>Fecha&nbsp;Ingreso:</b></td>
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
            $ProcedimientoAlmacenado = sprintf("CALL spingresartformacionii('%s','%s','%s','%s','%s', '%s', '%s', '%s', '%s');",
            $this->getStrNcurso(),$this->getStrInstitucion(),$this->getStrInstitucionb(),$this->getStrDuracion(),$this->getStrFechaIngreso(),
			$this->getStrCapacitacionsil(),$this->getStrCformativo(),$this->getStrCursos(),$this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);

            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Accesibilidad = [ '.$this->getStrNcurso().' ] Centro_Formativo = [ '. $this->getStrCformativo().' ] ';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'GUARDAR', 'tfotmacionii', $descripcion);
                $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
                $query->getStrSqlInsertUpdateDelete();
                $resultado = true;
           }
				
           return $resultado;
		 }
		
    public function getStrBuscarfii($v) 
	{
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbidentificadorfii('%d');","$v");
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
            $ProcedimientoAlmacenado = sprintf("CALL spbformacionii('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
                foreach( $resultado as $rst):   
		    $this->setStrNcurso($rst["ncurso"]);          
           	$this->setStrInstitucion($rst["institucion_id"]);  
			$this->setStrInstitucionb($rst["institucionb"]); 
			$this->setStrDuracion($rst["duracion"]); 
			$this->setStrFechaIngreso($rst["fechaingreso"]);
			$this->setStrCapacitacionsil($rst["capacitado_id"]);
			$this->setStrCformativo($rst["centroformativo_id"]);
			$this->setStrCursos($rst["cursos_id"]);
			

                endforeach;

                $retval = true;
            }
           
            return $retval;
        }
public function getStrActualizar() 
	{
			$query = new clQuery();
            $resultado = false;		
			 $ProcedimientoAlmacenado = sprintf("CALL spactualizarformacionii('%s','%s','%s','%s','%s', '%s', '%s', '%s', '%s');",
            $this->getStrCodigo(),$this->getStrNcurso(),$this->getStrInstitucion(),$this->getStrInstitucionb(),$this->getStrDuracion(),$this->getStrFechaIngreso(),
			$this->getStrCapacitacionsil(),$this->getStrCformativo(),$this->getStrCursos());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
 			if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'capacitacion = [ '.$this->getStrCapacitacionsil().' ] codigo = [ '. $this->getStrCodigo().' ] ';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'ACTUALIZAR', 'tformacionii', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL speliminarformacionii('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlInsertUpdateDelete();
 			if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'cursos = [ '.$this->getStrCurso().' ] codigo = [ '. $this->getStrCodigo().' ] ';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'ELIMINAR', 'tformacionii', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL sptotalformacionii();", $this->getStrCodigo());
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
            $ProcedimientoAlmacenado = sprintf("CALL splistarformacionii('%d','%d','%d');","$re", "$pa","$cf");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            CAPACITACIÓN RECIBIDA<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO CAPACITACIÓN RECIBIDA</legend>
                       ';
            $retval .= '
                        <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                            <tr class="tablatitulo">
                                <th colspan="11">LISTADO CAPACITACIÓN</th>
                            </tr>
                            <tr class="tablasubtitulo">
                                <th>...</th>  
                                <th align="center">ID Acceso</th>                                                              
                                <th align="center">Nombre del Curso</th>
                                <th align="center">Duración</th>
                                <th align="center" colspan="3">Acciones</th>
                             </tr>
                        ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["tformacionii_id"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["ncurso"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["duracion"] .'</td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="ACTUALIZAR CAPACITACIÓN RECIBIDA<br> [ codigo = '.$rst["tformacionii_id"] .' ]">';
                    $retval .=  '<a href="'.FORMACIONII_URL.'formacionii.php?btnActualizar=Actualizar&strCodigo='. $rst["tformacionii_id"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="ELIMINAR CAPACITACIÓN RECIBIDA<br> [codigo = '.$rst["tformacionii_id"] .' ]">';
                    $retval .=  '<a href="'.FORMACIONII_URL.'formacionii.php?btnEliminar=Eliminar&strCodigo='. $rst["tformacionii_id"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="DETALLE CAPACITACIÓN RECIBIDA <br> [ codigo = '.$rst["tformacionii_id"] .' ]">';
                    $retval .=  '<a href="'.FORMACIONII_URL.'formacionii.php?btnDetalle=Detalle&strCodigo='. $rst["tformacionii_id"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                    $i = 1 - $i;
                endforeach;
            }

            $paginacion->setStrNombrePagina("formacionii/formacionii.php");
            $retval .= '<tr><td colspan="12" align="center">'. $paginacion->getStrPaginacion() .'</td></tr>';
            $retval .= '</table>';
            $retval .= '</fieldset>';
            return $retval;
        }
/////////////////// lista curso por el SIL //////////////////////////////
public function getStrListarc()
        {
            $paginacion = new clPaginacion();
            $query = new clQuery();

            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL sptotalformacioniic();", $this->getStrCodigo());
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
            $ProcedimientoAlmacenado = sprintf("CALL splistarformacioniic('%d','%d','%d');","$re", "$pa","$cf");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            SIL<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO CURSOS ASIGNADOS POR EL SIL</legend>
                       ';
            $retval .= '
                        <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                            <tr class="tablatitulo">
                                <th colspan="11">LISTADO CURSOS ASIGNADOS POR EL SIL</th>
                            </tr>
                            <tr class="tablasubtitulo">
                                <th>...</th>  
                                <th align="center">ID Acceso</th>                                                              
                                <th align="center">Nombre del Curso</th>
                                <th align="center">Número Horas</th>
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
                    $retval .= 	'<td align="left">'. $rst["nombre"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["num_horas"] .'</td>';
                    
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

            $paginacion->setStrNombrePagina("formacionii/formacionii.php");
            $retval .= '<tr><td colspan="12" align="center">'. $paginacion->getStrPaginacion() .'</td></tr>';
            $retval .= '</table>';
            $retval .= '</fieldset>';
            return $retval;
        }



////////////////////////////////////////////////////////////////////////////

        
public function getStrDetallePersona()
        {
            $query = new clQuery();
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbdetalleformacionii('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            CAPACITACIÓN RECIBIDA<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO CAPACITACIÓN RECIBIDA<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">DETALLE CAPACITACIÓN RECIBIDA
                        </legend>
                       ';

            if( count($resultado) > 0 )
            {
                $i = 0;
				$valor=$this->getStrCodigo();
			 	$v=$this->getStrBuscarfii($valor);
                foreach( $resultado as $rst):
                    $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                    $retval .= '<tr>
                                    <td colspan="2" align="center">
                                        <a href="'. FORMACIONII_URL .'formacionii.php?btnNuevo=Nuevo&strCodigo='.$v.'">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" />REGRESAR LISTADO CAPACITACIÓN RECIBIDA|</a>
                                    <td>
                                </tr>
                                ';
                    
                    $retval .= '<tr class="tablatitulo">
                                    <th colspan="2">DETALLE CAPACITACIÓN RECIBIDA REGISTRADO</th>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Código:</th>
                                    <td align="left">  '. $rst["tformacionii_id"] .'</td>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Nombre del Curso:</th>
                                    <td align="left">  '. $rst["ncurso"] .'</td>
                                </tr>
                                ';
                    
                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Institución:</th>
                                    <td align="left">  '. $rst["institucion_nombre"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Institución:</th>
                                    <td align="left">  '. $rst["institucionb"] .'</td>
                                </tr>
                                ';			
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Duración:</th>
                                    <td align="left">  '. $rst["duracion"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Fecha Ingreso:</th>
                                    <td align="left">  '. $rst["fechaingreso"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Capacitado por el SIL:</th>
                                    <td align="left">  '. $rst["capacitado_sil"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Centro Formativo:</th>
                                    <td align="left">  '. $rst["centro_formativo"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Cursos:</th>
                                    <td align="left">  '. $rst["nombre_curso"] .'</td>
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