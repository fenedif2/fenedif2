<?php	
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.validaciones.php' );
    include_once( CLASS_PATH . "class.clquery.php" );
    include_once( CLASS_PATH . "class.clpaginacion.php" );   
	include_once( CLASS_PATH . "class.cltformacion.php" ); 
	include_once( CLASS_PATH . "class.clsubtformacion.php" ); 
	include_once( CLASS_PATH . "class.clsubtformaciond.php" ); 
	
	include_once( CLASS_PATH . "class.cltfnecesaria.php" ); 
	include_once( CLASS_PATH . "class.cltnivel.php" );
	include_once( CLASS_PATH . "class.cltniveledu.php" ); 
	include_once( CLASS_PATH . "class.clavalizado.php" );
	include_once( CLASS_PATH . "class.clcminimos.php" );
	include_once( CLASS_PATH . "class.cldigitacion.php" );
    class clTformacioncf
    {
        private $strTformacion;	
		private $strSubtformacion;
		private $strSubtformaciond;	
        private $strCodigo;
		
		private $strEtiqueta;
        private $strNombreBoton;
        private $strValorBoton;
		 private $strNombreBotons;
        private $strValorBotons;
        private $strLectura;
 		private $strNombreBotona;
        private $strValorBotona;
        public function __construct()
        {
           $this->strTformacion = ""; 	
		   $this->strSubtformacion="";
		   $this->strSubtformaciond="";
		   $this->strCodigo = "";	
		   
		   $this->strEtiqueta = "";
           $this->strNombreBoton = "";
           $this->strValorBoton = "";
		   $this->strNombreBotons = "";
           $this->strValorBotons = "";
           $this->strLectura = "";
		   $this->strNombreBotona = "";
           $this->strValorBotona = "";
		}
////////////// Tipo Formacion  /////////////////////
        public function getStrTformacion()
        {
            return $this->strTformacion;
        }
		public function setStrTformacion($tf)
        {
            $this->strTformacion = $tf;
        }
//////////////////////////////// Sub Tipo Fromacion  /////////////////////
        public function getStrSubtformacion()
        {
            return $this->strSubtformacion;
        }
		public function setStrSubtformacion($n)
        {
            $this->strSubtformacion = $n;
        }
 ////////////// Sub Tipo Fromacion descripcion  /////////////////////
        public function getStrSubtformaciond()
        {
            return $this->strSubtformaciond;
        }
		public function setStrSubtformaciond($n)
        {
            $this->strSubtformaciond = $n;
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
////////////////////////nombre/////////////////////////////
public function getStrNombreBotons()
        {
            return $this->strNombreBotons;
        }

        public function setStrNombreBotons($nb)
        {
            $this->strNombreBotons = $nb;
        }
////////////////////valor///////////////////////////////////////
 		public function getStrValorBotons()
        {
            return $this->strValorBotons;
        }

        public function setStrValorBotons($vb)
        {
            $this->strValorBotons = $vb;
        }
////////////////////////////////////////////////////////////////
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
           
		$tformacion = new clTformacion();	
		$subtformacion = new clSubtformacion();
		$subtformaciond = new clSubtformaciond();
		
		$retval  = '<script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.validate.js"></script>
                        <script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.metadata.js"></script>
                       ';

            $retval .= '<br><br><br><br>
                        <script>
                            $(document).ready(function(){
                                    $.metadata.setType( \'attr\', \'validate\' );
                                    $(\'#frmtformacioncf\').validate({
                                            rules:{
                                         	    
                                                  },
                                            messages:{
                                              
												     }
                                    });
									 $("#lsTformacion").change(function () {
                                    $("#lsTformacion option:selected").each(function () 
                                    {
                                            var tformacion = $(this).val();
                                            $.post( "'. TFORMACIONCF_URL .'tformacioncf.php", 
                                            { btnBuscar: "Subtformacion",
                                            strCodigoTformacion:tformacion                                                                                                                                                                      
                                                                                    },
                                        function(data){
                                                $("#lsSubtformacion").html(data);
                                        });
                                    });
                                 });
									$("#lsSubtformacion").change(function () {
                                    $("#lsSubtformacion option:selected").each(function () {
                                            var subtformacion  = $(this).val();
                                           $.post( "'. TFORMACIONCF_URL .'tformacioncf.php", 
                                            { btnBuscar: "Subtformaciond",
                                                                                      strCodigoTformaciond: subtformacion                                                                                      
                                                                                    },
                                        function(data){
                                                $("#lsSubtformaciond").html(data);                                                
                                        });
                                    });
                                 });
								 
								 
	                           });
                        </script>
                       ';
		  
            $retval .= '<form id="frmtformacioncf" action="'. TFORMACIONCF_URL.'tformacioncf.php" method="POST">';

            $Regresar = "regresar('". CFORMATIVO_URL . "cformativo.php')";
            $retval .= '<fieldset class="fieldsetPequeno">';
            $retval .= '<legend class="etiquetaborde">
                            TIPO FORMACIÓN<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO TIPO FORMACIÓN<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> '. $this->getStrEtiqueta() .'
                          </legend>
                       ';
            $NHC = "";		   
            $retval .= '
                        <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">'. $this->getStrEtiqueta() .'</td>
                                <input class="textbox" id="strCodigo" name="strCodigo" type="hidden" maxlength="50" value="'. $this->getStrCodigo() .'" />
   							 <tr class="formulariofila1">
                               <td align="right"><b>Tipo Formación:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsTformacion" id="lsTformacion"  class="combobox">
	                                        '. $tformacion->getStrListar($this->getStrTformacion()) .'
	                                    </select>
                            </tr>
                            <tr class="formulariofila1">
                               	<td align="right"><b>Subárea Formación:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsSubtformacion" id="lsSubtformacion"  class="combobox">
	                                        '. $subtformacion->getStrListar($this->getStrSubtformacion()) .'
	                                    </select>
                                </td> 
                            </tr>
           					<tr class="formulariofila1">
                               	<td align="right"><b>Descripción:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsSubtformaciond" id="lsSubtformaciond"  class="combobox">
	                                        '. $subtformaciond->getStrListar($this->getStrSubtformaciond()) .'
	                                    </select>
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
            $ProcedimientoAlmacenado = sprintf("CALL spingresartformacioncf('%s','%s','%s','%s');",
            $this->getStrSubtformacion(),$this->getStrSubtformaciond(),$this->getStrTformacion(),$this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);

            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Accesibilidad = [ '.$this->getStrSubtformacion().' ] Centro_Formativo = [ '. $this->getStrCodigo().' ] ';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'GUARDAR', 'tipo_formacion', $descripcion);
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
			 $ProcedimientoAlmacenado = sprintf("CALL spactualizartformativocf('%s','%s','%s','%s');",
            $this->getStrCodigo(),$this->getStrSubtformacion(),$this->getStrSubtformaciond(),$this->getStrTformacion());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
			if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Accesibilidad = [ '.$this->getStrSubtformacion().' ] Centro_Formativo = [ '. $this->getStrCodigo().' ] ';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'ACTUALIZAR', 'tipo_formacion', $descripcion);
                $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
                $query->getStrSqlInsertUpdateDelete();
                $resultado = true;
            }

            return $resultado;
 			
        }
public function getStrBuscartfcf($v) {
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $cf=$_SESSION["usuario"]["suc"];
			$me=$_SESSION["usuario"]["cuenta"];
            $ProcedimientoAlmacenado = sprintf("CALL spbidentificadortfcf('%d');","$v");
			$query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
            foreach( $resultado as $rst):   
				$valor=$rst['id_centro_formativo'];
		    endforeach;
            }
		     return $valor;
        }    
 	public function getStrBuscar() {
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbtformacioncf('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
                foreach( $resultado as $rst):   
	                $this->setStrCodigo($rst['formacion_id']);
                    $this->setStrTformacion($rst['tipo_id']);
					$this->setStrSubtformacion($rst['tipocf_id']);
					$this->setStrSubtformaciond($rst['descripcion']);
                endforeach;

                $retval = true;
            }
           
            return $retval;
        }
public function getStrEliminar() 
        {
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL speliminartformacioncf('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlInsertUpdateDelete();
 			 if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Accesibilidad = [ '.$this->getStrSubtformacion().' ] Centro_Formativo = [ '. $this->getStrCodigo().' ] ';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'ELIMINAR', 'tipo_formacion', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL sptotaltformacioncf();", $this->getStrCodigo());
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
            $ProcedimientoAlmacenado = sprintf("CALL splistartformacioncf('%d','%d','%d');","$re", "$pa","$cf");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            TIPO FORMACIÓN<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO TIPO FORMACIÓN</legend>
                       ';
            $retval .= '
                        <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                            <tr class="tablatitulo">
                                <th colspan="11">LISTADO TIPO FORMACIÓN</th>
                            </tr>
                            <tr class="tablasubtitulo">
                            <th align="center"> </th> 
                               <th align="center">ID Acceso</th>                                                              
                                <th align="center">Tipo</th>
                                <th align="center">Tipo Formación</th>
                                <th align="center">Descripción</th>
                                <th align="center">Centro Formativo</th>
                                <th align="center" colspan="3">Acciones</th>
                             </tr>
                        ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["formacion_id"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["tipo"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["tipo_formacion"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["descripcion"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["nombre"] .'</td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="ACTUALIZAR TIPO FORMACIÓN <br> [ codigo = '.$rst["formacion_id"] .' ]">';
                    $retval .=  '<a href="'.TFORMACIONCF_URL.'tformacioncf.php?btnActualizar=Actualizar&strCodigo='. $rst["formacion_id"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="ELIMINAR TIPO FORMACIÓN <br> [codigo = '.$rst["formacion_id"] .' ]">';
                    $retval .=  '<a href="'.TFORMACIONCF_URL.'tformacioncf.php?btnEliminar=Eliminar&strCodigo='. $rst["formacion_id"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="DETALLE TIPO FORMACIÓN<br> [ codigo = '.$rst["formacion_id"] .' ]">';
                    $retval .=  '<a href="'.TFORMACIONCF_URL.'tformacioncf.php?btnDetalle=Detalle&strCodigo='. $rst["formacion_id"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
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
            $ProcedimientoAlmacenado = sprintf("CALL spbdetalletformacioncf('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                           TIPO FORMACIÓN<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO TIPO FORMACIÓN<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">DETALLE TIPO FORMACIÓN
                        </legend>
                       ';

            if( count($resultado) > 0 )
            {
                $i = 0;
				$valor=$this->getStrCodigo();
			 	$v=$this->getStrBuscartfcf($valor);
                foreach( $resultado as $rst):
                    $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                    $retval .= '<tr>
                                    <td colspan="2" align="center">
                                        <a href="'. TFORMACIONCF_URL .'tformacioncf.php?btnNuevo=Nuevo&strCodigo='.$v.'">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" />REGRESAR LISTADO TIPO FORMACIÓN|</a>
                                    <td>
                                </tr>
                                ';
                    
                    $retval .= '<tr class="tablatitulo">
                                    <th colspan="2">DETALLE&nbsp; TIPO DE FORMACIÓN</th>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Código:</th>
                                    <td align="left">  '. $rst["formacion_id"] .'</td>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Tipo:</th>
                                    <td align="left">  '. $rst["tipo"] .'</td>
                                </tr>
                                ';

                    
                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Tipo Formación:</th>
                                    <td align="left">  '. $rst["tipo_formacion"] .'</td>
                                </tr>
                                ';
	 				$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Descripción:</th>
                                    <td align="left">  '. $rst["descripcion"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Centro Formativo:</th>
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