<?php	
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.validaciones.php' );
    include_once( CLASS_PATH . "class.clquery.php" );
    include_once( CLASS_PATH . "class.clpaginacion.php" );   
	include_once( CLASS_PATH . "class.claformativa.php" ); 
	include_once( CLASS_PATH . "class.clsubaformativa.php" ); 

    class clAformativacf
    {
        private $strAformativa;	
		private $strSubaformativa;	
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
           $this->strAformativa = ""; 	
		   $this->strSubaformativa="";
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
////////////// Area Formativa  /////////////////////
        public function getStrAformativa()
        {
            return $this->strAformativa;
        }
		public function setStrAformativa($n)
        {
            $this->strAformativa = $n;
        }
  ////////////// Sub area Formativa  /////////////////////
        public function getStrSubaformativa()
        {
            return $this->strSubaformativa;
        }
		public function setStrSubaformativa($n)
        {
            $this->strSubaformativa = $n;
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
////////////////////////////nombre////////////////////////////
 public function getStrNombreBotons()
        {
            return $this->strNombreBotons;
        }

        public function setStrNombreBotons($nb)
        {
            $this->strNombreBotons = $nb;
        }
//////////////////////////valor/////////////////////////////////////
public function getStrValorBotons()
        {
            return $this->strValorBotons;
        }

        public function setStrValorBotons($vb)
        {
            $this->strValorBotons = $vb;
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
           
		$aformativa = new clAformativa();	
		$subaformativa = new clSubaformativa();
          $retval  = '<script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.validate.js"></script>
                        <script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.metadata.js"></script>
                       ';

            $retval .= '<br><br><br><br>
                        <script>
                            $(document).ready(function(){
                                    $.metadata.setType( \'attr\', \'validate\' );
                                    $(\'#frmaformativacf\').validate({
                                            rules:{
                                         	   
                                                  },
                                            messages:{
                                              	
												     }
                                    });
									 $("#lsAformativa").change(function () 
									 {
                                    $("#lsAformativa option:selected").each(function () 
                                    {
                                            var aformativa = $(this).val();
                                            $.post( "'. AFORMATIVACF_URL .'aformativacf.php", 
                                            { btnBuscar: "Subarea",
                                            strCodigoAformativa: aformativa
                                                                                    },
                                        function(data){
                                                $("#lsSubaformativa").html(data);
                                        });
                                    });
                                 });
			
								 
	                           });
                        </script>
                       ';
		  
            $retval .= '<form id="frmaformativacf" action="'. AFORMATIVACF_URL.'aformativacf.php" method="POST">';

             $Regresar = "regresar('". CFORMATIVO_URL . "cformativo.php')";
            $retval .= '<fieldset class="fieldsetPequeno">';
            $retval .= '<legend class="etiquetaborde">
                            ÁREA FORMATIVA<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO ÁREA FORMATIVA<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> '. $this->getStrEtiqueta() .'
                          </legend>
                       ';
            $NHC = "";		   
            $retval .= '
                        <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">'. $this->getStrEtiqueta() .'</td>
                                <input class="textbox" id="strCodigo" name="strCodigo" type="hidden" maxlength="50" value="'. $this->getStrCodigo() .'" />
   							 <tr class="formulariofila1">
                               <td align="right"><b>Área Formativa:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsAformativa" id="lsAformativa"  class="combobox">
	                                        '. $aformativa->getStrListar($this->getStrAformativa()) .'
	                                    </select>
                              
                            </tr>
                            <tr class="formulariofila1">
                               	<td align="right"><b>Subárea Formativa:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsSubaformativa" id="lsSubaformativa"  class="combobox">
	                                        '. $subaformativa->getStrListar($this->getStrSubaformativa()) .'
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
            $ProcedimientoAlmacenado = sprintf("CALL spingresaraformativacf('%s','%s');",
            $this->getStrSubaformativa(),$this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);

            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Accesibilidad = [ '.$this->getStrSubaformativa().' ] Centro_Formativo = [ '. $this->getStrCodigo().' ] ';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'GUARDAR', 'areaformativacf', $descripcion);
                $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
                $query->getStrSqlInsertUpdateDelete();
                $resultado = true;
            }

            return $resultado;
        }
	public function getStrBuscarafcf($v) {
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $cf=$_SESSION["usuario"]["suc"];
			$me=$_SESSION["usuario"]["cuenta"];
            $ProcedimientoAlmacenado = sprintf("CALL spbidentificadorafcf('%d');","$v");
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
            $ProcedimientoAlmacenado = sprintf("CALL spbaformativacf('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
                foreach( $resultado as $rst):   
					  	$this->setStrCodigo($rst['areaformativacf_id']);
						$this->setStrSubaformativa($rst['subarea_id']);
						$this->setStrAformativa($rst['areaformativa_id']);
                    	
                endforeach;

                $retval = true;
            }
           
            return $retval;
        }
public function getStrActualizar() 
	{
			$query = new clQuery();
            $resultado = false;		
			 $ProcedimientoAlmacenado = sprintf("CALL spactualizaraformativacf('%s','%s');",
            $this->getStrCodigo(),$this->getStrSubaformativa());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
 			if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Accesibilidad = [ '.$this->getStrSubaformativa().' ] Centro_Formativo = [ '. $this->getStrCodigo().' ] ';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'ACTUALIZAR', 'areaformativacf', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL speliminaraformativacf('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlInsertUpdateDelete();
 			if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Accesibilidad = [ '.$this->getStrSubaformativa().' ] Centro_Formativo = [ '. $this->getStrCodigo().' ] ';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'ELIMINAR', 'areaformativacf', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL sptotalaformativacf();", $this->getStrCodigo());
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
            $ProcedimientoAlmacenado = sprintf("CALL splistaraformativacf('%d','%d','%d');","$re", "$pa","$cf");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            ÁREA FORMATIVA<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO ÁREA FORMATIVA</legend>
                       ';
            $retval .= '
                        <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                            <tr class="tablatitulo">
                                <th colspan="11">LISTADO ÁREAS FORMATIVAS</th>
                            </tr>
                            <tr class="tablasubtitulo">
                                <th>...</th>  
                                <th align="center">ID Acceso</th>                                                              
                                <th align="center">Áreas Formativas</th>
                                <th align="center">Subárea Formativa</th>
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
                    $retval .= 	'<td align="center">'. $rst["areaformativacf_id"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["areaformativa_nombre"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["subarea_nombre"] .'</td>';
					 $retval .= 	'<td align="left">'. $rst["nombre"] .'</td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="ACTUALIZAR ÁREA FORMATIVA <br> [ codigo = '.$rst["areaformativacf_id"] .' ]">';
                    $retval .=  '<a href="'.AFORMATIVACF_URL.'aformativacf.php?btnActualizar=Actualizar&strCodigo='. $rst["areaformativacf_id"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="ELIMINAR ÁREA FORMATIVA <br> [codigo = '.$rst["areaformativacf_id"] .' ]">';
                    $retval .=  '<a href="'.AFORMATIVACF_URL.'aformativacf.php?btnEliminar=Eliminar&strCodigo='. $rst["areaformativacf_id"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="DETALLE ÁREA FORMATIVA <br> [ codigo = '.$rst["areaformativacf_id"] .' ]">';
                    $retval .=  '<a href="'.AFORMATIVACF_URL.'aformativacf.php?btnDetalle=Detalle&strCodigo='. $rst["areaformativacf_id"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                    $i = 1 - $i;
                endforeach;
            }

            $paginacion->setStrNombrePagina("aformativacf/aformativacf.php");
            $retval .= '<tr><td colspan="12" align="center">'. $paginacion->getStrPaginacion() .'</td></tr>';
            $retval .= '</table>';
            $retval .= '</fieldset>';
            return $retval;
        }

public function getStrDetallePersona()
        {
            $query = new clQuery();
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbdetalleaformativacf('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            ÁREA FORMATIVA<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO ÁREA FORMATIVA<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">DETALLE ÁREA FORMATIVA
                        </legend>
                       ';

            if( count($resultado) > 0 )
            {
                $i = 0;
				$valor=$this->getStrCodigo();
			 	$v=$this->getStrBuscarafcf($valor);
                foreach( $resultado as $rst):
                    $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                    $retval .= '<tr>
                                    <td colspan="2" align="center">
                                        <a href="'. AFORMATIVACF_URL .'aformativacf.php?btnNuevo=Nuevo&strCodigo='.$v.'">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" />REGRESAR LISTADO ÁREA FORMATIVA|</a>
                                    <td>
                                </tr>
                                ';
                    
                    $retval .= '<tr class="tablatitulo">
                                    <th colspan="2">DETALLE&nbsp;ÁREA FORMATIVA;REGISTRADA</th>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Código:</th>
                                    <td align="left">  '. $rst["areaformativacf_id"] .'</td>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Área Formativa:</th>
                                    <td align="left">  '. $rst["areaformativa_nombre"] .'</td>
                                </tr>
                                ';

                    
                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida"> Sub Área Formativa:</th>
                                    <td align="left">  '. $rst["subarea_nombre"] .'</td>
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