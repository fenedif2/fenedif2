<?php	
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.validaciones.php' );
    include_once( CLASS_PATH . "class.clquery.php" );
    include_once( CLASS_PATH . "class.clpaginacion.php" );  
	
	
    class clTest
    {
        private $StrCodigo;
        private $strNombre;
		private $strFechaInicio;
		private $strContacto;
		private $strAsunto;
		
		private $strEtiqueta;
        private $strNombreBoton;
        private $strValorBoton;
        private $strLectura;
		
		
        public function __construct()
        {
				
            $this->StrCodigo = "";	
			$this->strNombre = "";
			$this->strFechaInicio = "";
			$this->strContacto = "";
			$this->strAsunto = "";
			
			$this->strEtiqueta = "";
            $this->strNombreBoton = "";
            $this->strValorBoton = "";
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
                
////////////// Nombre Curso/////////////////////
        public function getStrNombre()
        {
            return $this->strNombre;
        }
		public function setStrNombre($n)
        {
            $this->strNombre = $n;
        }
		
////////////////////////////////Contacto //////////////////////////////////////////////////////////////////////
		public function getstrContacto()
	        {
	            return $this->strContacto;
	        }

        public function setstrContacto($exp)
	        {
	            $this->strContacto = $exp;
	        }
//////////// Asunto////////////////////////////////////////// 
		public function getstrAsunto()
        {
            return $this->strAsunto;
        }
  		public function setstrAsunto($ct)
        {
            $this->strAsunto = $ct;
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
                       
			
          $retval  = '<script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.validate.js"></script>
                        <script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.metadata.js"></script>
                       ';

            $retval .= '<br><br><br><br>
                        <script>
                            $(document).ready(function(){
                                    $.metadata.setType( \'attr\', \'validate\' );
                                    $(\'#frmtseguimientocf\').validate({
                                            rules:{
                                               strNombre: { required: true},
                                               strAsunto: { required: true }
											    
                                            	
												strObservaciond: { required: true }
                                                  },
                                            messages:{
                                              	strNombre: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                              	strAsunto: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"}
												     }
                                    });
                                    
								 
									
								
								 
                            });
                        </script>
                       ';
		  
            $retval .= '<form id="frmtseguimientocf" action="'. TSEGUIMIENTOCF_URL .'tseguimientocf.php" method="POST">';

            $Regresar = "regresar('". CFORMATIVO_URL . "cformativo.php')";

            $retval .= '<fieldset class="fieldsetPequeno">';
            $retval .= '<legend class="etiquetaborde">
                            Seguimiento <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Listado Seguimiento<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> '. $this->getStrEtiqueta() .'
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
                               	<td  align="right"><b>Contacto:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strContacto" name="strContacto" type="text"   value="'. $this->getstrContacto() .'" />
                                </td>
                            </tr>
                            <tr class="formulariofila1">
                               	<td  align="right"><b>Asunto:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strAsunto" name="strAsunto" type="text"   value="'. $this->getstrAsunto() .'" />
                                </td>
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
            $ProcedimientoAlmacenado = sprintf("CALL spingresartseguimientocf('%s', '%s', '%s', '%s');",
            $this->getStrFechaInicio(), $this->getstrContacto(), $this->getstrAsunto(), 
            $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);

            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Contacto = [ '.$this->getstrContacto().' ] Asunto= [ '. $this->getstrAsunto().' ] ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'G', 'tseguimientocf', $descripcion);
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
           $ProcedimientoAlmacenado = sprintf("CALL spactualizartseguimientocf('%s', '%s', '%s', '%s');",
             $this->getStrCodigo(),$this->getStrFechaInicio(), $this->getstrContacto(), $this->getstrAsunto());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);

           if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Contacto = [ '.$this->getstrContacto().' ] Asunto= [ '. $this->getstrAsunto().' ] ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'G', 'tseguimientocf', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL speliminartseguimientocf('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlInsertUpdateDelete();

           if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Contacto = [ '.$this->getstrContacto().' ] Asunto= [ '. $this->getstrAsunto().' ] ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'G', 'tseguimientocf', $descripcion);
                $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
                $query->getStrSqlInsertUpdateDelete();
                $resultado = true;
            }

            return $resultado;
        }

 	public function getStrBuscar() 
 	{
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbtseguimientocf('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
                foreach( $resultado as $rst): 
					$this->setStrCodigo($rst['id_seguimientocf']);  
	                $this->setstrFechaInicio($rst['fecha']);
                    $this->setstrContacto($rst['contacto']);
					$this->setstrAsunto($rst['asunto']);
					
					
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
            $ProcedimientoAlmacenado = sprintf("CALL sptotaltseguimientocf();", $this->getStrCodigo());
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
            $ProcedimientoAlmacenado = sprintf("CALL splistartseguimientocf('%d','%d','%d');","$re", "$pa","$cf");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            Seguimiento<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">Listado Seguimiento</legend>
                       ';
            $retval .= '
                        <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                            <tr class="tablatitulo">
                                <th colspan="13">LISTADO Cursos</th>
                            </tr>
                            <tr class="tablasubtitulo">
                            	<th align="center"></th>  
                               <th align="center">ID Acceso</th>                                                              
                                <th align="center">Fecha</th>
                                <th align="center">Contacto</th>
                                <th align="center">Asunto</th>
                                <th align="center">Centro Fromativo</th>
                                <th align="center" colspan="3">Acciones</th>
                             </tr>
                        ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["id_seguimientocf"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["fecha"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["contacto"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["asunto"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["nombre"] .'</td>';
 					$retval .= 	'<td align="center"><div class="vtip" title="Actualizar <br> [ codigo = '.$rst["id_seguimientocf"] .' ]">';
                    $retval .=  '<a href="'.TSEGUIMIENTOCF_URL.'tseguimientocf.php?btnActualizar=Actualizar&strCodigo='. $rst["id_seguimientocf"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Eliminar <br> [codigo = '.$rst["id_seguimientocf"] .' ]">';
                    $retval .=  '<a href="'.TSEGUIMIENTOCF_URL.'tseguimientocf.php?btnEliminar=Eliminar&strCodigo='. $rst["id_seguimientocf"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Detalle Cursos <br> [ codigo = '.$rst["id_seguimientocf"] .' ]">';
                    $retval .=  '<a href="'.TSEGUIMIENTOCF_URL.'tseguimientocf.php?btnDetalle=Detalle&strCodigo='. $rst["id_seguimientocf"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                    $i = 1 - $i;
                endforeach;
            }

            $paginacion->setStrNombrePagina("tseguimientocf/tseguimientocf.php");
            $retval .= '<tr><td colspan="12" align="center">'. $paginacion->getStrPaginacion() .'</td></tr>';
            $retval .= '</table>';
            $retval .= '</fieldset>';
            return $retval;
        }

public function getStrDetallePersona()
        {
            $query = new clQuery();
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbdetalletseguimientocf('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            Seguimiento<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Listado Segumiento <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Detalle Seguimiento
                        </legend>
                       ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                    $retval .= '<tr>
                                    <td colspan="2" align="center">
                                        <a href="'. CFORMATIVO_URL .'cformativo.php">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> Regresar Listado Centros Formativos|</a>
                                    <td>
                                </tr>
                                ';
                    
                    $retval .= '<tr class="tablatitulo">
                                    <th colspan="2">DETALLE&nbsp;SEGUIMIENTOS;REGISTRADO</th>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Código Seguimiento:</th>
                                    <td align="left">  '. $rst["id_seguimientocf"] .'</td>
                                </tr>
                                ';
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Fecha:</th>
                                    <td align="left">  '. $rst["fecha"] .'</td>
                                </tr>
                                ';
                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Contacto:</th>
                                    <td align="left">  '. $rst["contacto"] .'</td>
                                </tr>
                                ';

                    
                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Asunto:</th>
                                    <td align="left">  '. $rst["asunto"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Centro Fromativo:</th>
                                    <td align="left">  '. $rst["nombre"] .'</td>
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