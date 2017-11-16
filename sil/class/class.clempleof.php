<?php	
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.validaciones.php' );
    include_once( CLASS_PATH . "class.clquery.php" );
    include_once( CLASS_PATH . "class.clpaginacion.php" ); 
	 
	include_once( CLASS_PATH . "class.cltipo.php" ); 
	
    class clEmpleof
    {
        private $StrCodigo;
       	private $strFechaInicio;
		private $strTipo;
		private $strObservacion;
		
		private $strEtiqueta;
        private $strNombreBoton;
        private $strValorBoton;
		 private $strNombreBotona;
        private $strValorBotona;
        private $strLectura;
		
		
        public function __construct()
        {
				
            $this->StrCodigo = "";	
			$this->strNombre = "";
			$this->strFechaInicio = "";
			$this->strTipo = "";
			$this->strObservacion = "";
			
			$this->strEtiqueta = "";
            $this->strNombreBoton = "";
            $this->strValorBoton = "";
            $this->strNombreBotona = "";
            $this->strValorBotona = "";
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
                
////////////////////////////////Tipo //////////////////////////////////////////////////////////////////////
		public function getstrTipo()
	        {
	            return $this->strTipo;
	        }

        public function setstrTipo($exp)
	        {
	            $this->strTipo = $exp;
	        }
//////////// Observacion////////////////////////////////////////// 
		public function getstrObservacion()
        {
            return $this->strObservacion;
        }
  		public function setstrObservacion($ct)
        {
            $this->strObservacion = $ct;
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
/////////////////////// nombre a////////////////////////////////
 		public function getStrNombreBotona()
	        {
	            return $this->strNombreBotona;
	        }

        public function setStrNombreBotona($nb)
	        {
	            $this->strNombreBotona = $nb;
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
////////////////////// valor //////////////////			
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
         $tipo=new clTipo();	              
			
          $retval  = '<script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.validate.js"></script>
                        <script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.metadata.js"></script>
                       ';

            $retval .= '<br><br><br><br>
                        <script>
                            $(document).ready(function(){
                                    $.metadata.setType( \'attr\', \'validate\' );
                                    $(\'#frmempleof\').validate({
                                            rules:{
                                               strNombre: { required: true},
                                               strObservacion: { required: true }
											    
                                            	
												strObservaciond: { required: true }
                                                  },
                                            messages:{
                                              	strNombre: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                              	strObservacion: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"}
												     }
                                    });
                                    
								 
									
								
								 
                            });
                        </script>
                       ';
		  
            $retval .= '<form id="frmempleof" action="'. EMPLEOF_URL.'empleof.php" method="POST">';

            $Regresar = "regresar('". EMPLEOF_URL . "empleof.php')";

            $retval .= '<fieldset class="fieldsetPequeno">';
            $retval .= '<legend class="etiquetaborde">
                            SEGUIMIENTO <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> LISTADO SEGUIMIENTO<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> '. $this->getStrEtiqueta() .'
                          </legend>
                       ';
            $NHC = "";		   
            $retval .= '
                        <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="2" align="center" class="tablatitulo">'. $this->getStrEtiqueta() .'</td>
                                <input class="textbox" id="strCodigo" name="strCodigo" type="hidden" maxlength="50" value="'. $this->getStrCodigo() .'" />
                            </tr>
							<tr class="formulariofila1">
                                <td  align="right"><b>Fecha&nbsp:</b></td>
                                <td align="left">
                                    <input name="dtFechai" type="text" id="dtFechai" value="'. $this->getStrFechaInicio() .'" size="10" readonly="readonly" class="textboxfecha" />
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
                            </tr>
                            <tr class="formulariofila1">
                               	<td align="right"><b>Tipo:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsTipo" id="lsTipo"  class="combobox">
	                                        '. $tipo->getStrListar($this->getstrTipo()) .'
	                                    </select>
                                </td> 
                            </tr>
                            <tr class="formulariofila1">
                               	<td  align="right"><b>Observación:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strObservacion" name="strObservacion" type="text"   value="'. $this->getstrObservacion() .'" />
                                </td>
                            </tr>
                          					
							
							
							
	                        <tr>
                                <td colspan="4" class="formulariofila1" align="center">
                                    <input type="submit" class="boton" name="'. $this->getStrNombreBoton() .'" value="'. $this->getStrValorBoton() .'" />
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
      

        public function getStrIngresar() {
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spingresarempleof('%s', '%s', '%s', '%s');",
            $this->getStrFechaInicio(),$this->getstrTipo(),$this->getstrObservacion(),$this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Contacto = [ '.$this->getstrTipo().' ] Observacion= [ '. $this->getstrObservacion().' ] ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'GUARDAR', 'tpersonal', $descripcion);
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
           $ProcedimientoAlmacenado = sprintf("CALL spactualizarempleof('%s', '%s', '%s', '%s');",
            $this->getStrCodigo(),$this->getStrFechaInicio(),$this->getstrTipo(),$this->getstrObservacion());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Contacto = [ '.$this->getstrTipo().' ] Observacion= [ '. $this->getstrObservacion().' ] ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'ACTUALIZAR', 'tpersonal', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL speliminarempleof('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlInsertUpdateDelete();
 			 if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Contacto = [ '.$this->getstrTipo().' ] Observacion= [ '. $this->getstrObservacion().' ] ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'ELIMINAR', 'tpersonal', $descripcion);
                $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
                $query->getStrSqlInsertUpdateDelete();
                $resultado = true;
            }

            return $resultado;
        }
public function getStrBuscaremp($v) 
	{
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbidentificadorempl('%d');","$v");
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
            $ProcedimientoAlmacenado = sprintf("CALL spbempleof('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
                foreach( $resultado as $rst): 
					$this->setStrCodigo($rst['tpersonal_id']);	
					$this->setstrFechaInicio($rst["fechaingreso"]);
					$this->setstrTipo($rst["tipo_id"]);
					$this->setstrObservacion($rst["observacion"]);
			
					
					
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
            $ProcedimientoAlmacenado = sprintf("CALL sptotalempleof();", $this->getStrCodigo());
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
            $ProcedimientoAlmacenado = sprintf("CALL splistarempleof('%d','%d','%d');","$re", "$pa","$cf");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            SEGUIMIENTO<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO SEGUIMIENTO</legend>
                       ';
            $retval .= '
                        <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                            <tr class="tablatitulo">
                                <th colspan="13">LISTADO SEGUIMIENTO</th>
                            </tr>
                            <tr class="tablasubtitulo">
                            	<th align="center"></th>  
                               <th align="center">ID Acceso</th>                                                              
                                <th align="center">Fecha</th>
                                <th align="center">Tipo</th>
                                <th align="center">Observación</th>
                                <th align="center" colspan="3">Acciones</th>
                             </tr>
                        ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["tpersonal_id"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["fechaingreso"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["ttipo_nombre"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["observacion"] .'</td>';
 					$retval .= 	'<td align="center"><div class="vtip" title="ACTUALIZAR SEGUIMIENTO<br> [ codigo = '.$rst["tpersonal_id"] .' ]">';
                    $retval .=  '<a href="'.EMPLEOF_URL.'empleof.php?btnActualizar=Actualizar&strCodigo='. $rst["tpersonal_id"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="ELIMINAR SEGUIMIENTO <br> [codigo = '.$rst["tpersonal_id"] .' ]">';
                    $retval .=  '<a href="'.EMPLEOF_URL.'empleof.php?btnEliminar=Eliminar&strCodigo='. $rst["tpersonal_id"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="DETALLE SEGUIMIENTO <br> [ codigo = '.$rst["tpersonal_id"] .' ]">';
                    $retval .=  '<a href="'.EMPLEOF_URL.'empleof.php?btnDetalle=Detalle&strCodigo='. $rst["tpersonal_id"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                    $i = 1 - $i;
                endforeach;
            }

            $paginacion->setStrNombrePagina("empleof/empleof.php");
            $retval .= '<tr><td colspan="12" align="center">'. $paginacion->getStrPaginacion() .'</td></tr>';
            $retval .= '</table>';
            $retval .= '</fieldset>';
            return $retval;
        }

public function getStrDetallePersona()
        {
            $query = new clQuery();
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbdetalleempleof('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            SEGUIMIENTO<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO SEGUIMIENTO <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> DETALLE SEGUIMIENTO
                        </legend>
                       ';

            if( count($resultado) > 0 )
            {
                $i = 0;
				$valor=$this->getStrCodigo();
			 	$v=$this->getStrBuscaremp($valor);
                foreach( $resultado as $rst):
                    $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                    $retval .= '<tr>
                                    <td colspan="2" align="center">
                                        <a href="'. EMPLEOF_URL .'empleof.php?btnNuevo=Nuevo&strCodigo='.$v.'">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> REGRESAR LISTADO SEGUIMIENTO|</a>
                                    <td>
                                </tr>
                                ';
                    
                    $retval .= '<tr class="tablatitulo">
                                    <th colspan="2">DETALLE&nbsp;SEGUIMIENTO;REGISTRADO</th>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Código Seguimiento:</th>
                                    <td align="left">  '. $rst["tpersonal_id"] .'</td>
                                </tr>
                                ';
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Fecha:</th>
                                    <td align="left">  '. $rst["fechaingreso"] .'</td>
                                </tr>
                                ';
                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">tipo:</th>
                                    <td align="left">  '. $rst["ttipo_nombre"] .'</td>
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