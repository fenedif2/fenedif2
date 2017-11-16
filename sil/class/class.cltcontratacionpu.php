<?php	
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.validaciones.php' );
    include_once( CLASS_PATH . "class.clquery.php" );
    include_once( CLASS_PATH . "class.clpaginacion.php" );  
	include_once( CLASS_PATH . "class.clmrechazo.php" );
	//include_once( CLASS_PATH . "class.clestadopu.php" );
		
    class clTcontratacionpu
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
		private $strcontratado;
		private $strrechazado;
		private $strestadocontrat;
		private $strmrechazo;
		private $strNombreBotonanterior;
        private $strValorBotonanterior;
        public function __construct()
        {
				
            $this->StrCodigo = "";	
			$this->StrCodigos = "";	
			$this->strFechaInicio = "";
			$this->strFechaFin = "";
			$this->strcontratado = "1";
			$this->strrechazado = "2";
			$this->strestadocontrat = "";
			$this->strmrechazo = "";
			
			$this->strEtiqueta = "";
            $this->strNombreBoton = "";
			$this->strNombreBotonb = "";
            $this->strValorBoton = "";
			$this->strValorBotonb = "";
            $this->strLectura = "";
			$this->strusuarioscu = "";
			$this->strNombreBotonanterior = "";
           	$this->strValorBotonanterior = "";
			
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
//////////////////////////contratado //////////////////////////////////////////
public function getStrcontratado()
        {
            return $this->strcontratado;
        }

        public function setstrcontratado($fn)
        {
            $this->strcontratado = $fn;
        }
//////////////////////////rechazado //////////////////////////////////////////
public function getStrrechazado()
        {
            return $this->strrechazado;
        }

        public function setstrrechazado($fn)
        {
            $this->strrechazado = $fn;
        }	
//////////////////////////mrechazo //////////////////////////////////////////
public function getStrmrechazo()
        {
            return $this->strmrechazo;
        }

        public function setstrmrechazo($fn)
        {
            $this->strmrechazo= $fn;
        }							
//////////////////////////estadocontrat//////////////////////////////////////////
public function getStrestadocontrat()
        {
            return $this->strestadocontrat;
        }

        public function setstrestadocontrat($fn)
        {
            $this->strestadocontrat = $fn;
        }						
/////////////////////// nombre a////////////////////////////////
 		public function getStrNombreBotonanterior()
	        {
	            return $this->strNombreBotonanterior;
	        }

        public function setStrNombreBotonanterior($nb)
	        {
	            $this->strNombreBotonanterior = $nb;
	        }		
//////////////////////////valor a////////////////////////////////////
 		public function getStrValorBotonanterior()
	        {
	            return $this->strValorBotonanterior;
	        }

        public function setStrValorBotonanterior($vb)
	        {
	            $this->strValorBotonanterior = $vb;
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

        

        public function getStrIngresar() 
        {
           //Nombre Procedimientos Almacenados.
            $First = $this->getStrusuarioscu();
			$Second = $this->getStrestadocontrat();
			$mrecha= $this->getStrmrechazo();
	
			if(count($First)>0)
		 {
              for($indx = 0 ; $indx < count($First); $indx ++)
              {
              	$query = new clQuery();
            	$resultado = false; 
	            $ProcedimientoAlmacenado = sprintf("CALL spingresartusuariocontrat('%s', '%s', '%s','%s');",
	            $First[$indx],$Second[$indx],$mrecha[$indx],$this->getStrCodigo());
	            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            	
	            if($query->getStrSqlInsertUpdateDelete())
	            {
	                //Nombre Procedimientos Almacenados [Auditoria]
	                $descripcion = 'Puesto = [ '.$this->getStrCodigo().' ]  ]';
	                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'G', 'tusuariocontratacion', $descripcion);
	                $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
	                $query->getStrSqlInsertUpdateDelete();
	                $resultado = true;
	            }
            }

            return $resultado;
           
           
        }
		else 
		{
			$query = new clQuery();
            	$resultado = false; 
	            $ProcedimientoAlmacenado = sprintf("CALL spingresartusuarioseg('%s', '%s', '%s');",
	            $this->getStrusuarioscu(),$this->getStrestadocontrat(),$this->getStrmrechazo(),$this->getStrCodigo());
	            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            	
	            if($query->getStrSqlInsertUpdateDelete())
	            {
	                //Nombre Procedimientos Almacenados [Auditoria]
	                $descripcion = 'Puesto = [ '.$this->getStrCodigo().' ]  ]';
	                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'G', 'tseguimientopu', $descripcion);
	                $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
	                $query->getStrSqlInsertUpdateDelete();
	                $resultado = true;
	            }
            

            return $resultado;
		}
		
}

public function getStrEliminar() 
        {
           $query = new clQuery();
            $resultado = TRUE;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL speliminarusuariopuestocontrat('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlInsertUpdateDelete();
			 if($query->getStrSqlInsertUpdateDelete())
	            {
	                //Nombre Procedimientos Almacenados [Auditoria]
	                $descripcion = 'Puesto = [ '.$this->getStrCodigo().' ]  ]';
	                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'G', 'tusuariocontratacion', $descripcion);
	                $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
	                $query->getStrSqlInsertUpdateDelete();
	                $resultado = true;
	            }
            

            return $resultado;

        
        }
	public function getStrBuscartcemp($v) {
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $cf=$_SESSION["usuario"]["suc"];
			$me=$_SESSION["usuario"]["cuenta"];
            $ProcedimientoAlmacenado = sprintf("CALL spbidentificadortcemp('%d');","$v");
			$query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
            foreach( $resultado as $rst):   
				$valor=$rst['id_puestoempresa'];
		    endforeach;
            }
		     return $valor;
        }    
 	public function getStrBuscar() 
 	{
 	$query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbusuariopuestocontrat('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
                foreach( $resultado as $rst):   
	                $this->setStrCodigo($rst['id_usuario_contratacion']);
                    $this->setstrusuarioscu($rst['id_usuario']);
                    $this->setstrestadocontrat($rst['id_estadocontratacion']);
					 $this->setstrmrechazo($rst['id_mrechazo']);
					
					
					
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
            $ProcedimientoAlmacenado = sprintf("CALL sptotalusuariocontrat();", $this->getStrCodigo());
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
            $ProcedimientoAlmacenado = sprintf("CALL splistarusuariopuestocontrat('%d','%d','%d');","$re", "$pa","$cf");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            USUARIOS CONTRATADOS/NO CONTRATADOS<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO USUARIOS CONTRATADOS/NO CONTRATADOS</legend>
                       ';
            $retval .= '
                        <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                            <tr class="tablatitulo">
                                <th colspan="14">LISTADO USUARIOS CONTRATADOS/NO CONTRATADOS</th>
                            </tr>
                            <tr class="tablasubtitulo">
                            	<th align="center"></th>  
                               <th align="center">ID Usuario Contratados</th>                                                              
                                <th align="center">Nombres</th>
                                <th align="center">Apellidos</th>
                                <th align="center">Nombre del Puesto</th>
                                <th align="center">Estado Contratación</th>
                                <th align="center">Fijo Empresa</th>
                                <th align="center" colspan="2">Acciones</th>
                             </tr>
                        ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["id_usuario_contratacion"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["primer_nombre"] .' '. $rst["segundo_nombre"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["apellido_paterno"] .' '. $rst["apellido_materno"] .'</td>';
					
					$retval .= 	'<td align="left">'. $rst["descripcion"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["contratacion_descripcion"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["fijo"] .'</td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Eliminar <br> [codigo = '.$rst["id_usuario_contratacion"] .' ]">';
                    $retval .=  '<a href="'.TCONTRATACIONPU_URL.'tcontratacionpu.php?btnEliminar=Eliminar&strCodigo='. $rst["id_usuario_contratacion"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Detalle Usuarios Asignados <br> [ codigo = '.$rst["id_usuario_contratacion"] .' ]">';
                    $retval .=  '<a href="'.TCONTRATACIONPU_URL.'tcontratacionpu.php?btnDetalle=Detalle&strCodigo='. $rst["id_usuario_contratacion"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                    $i = 1 - $i;
                endforeach;
            }

            $paginacion->setStrNombrePagina("tcontratacionpu/tcontratacionpu.php");
            $retval .= '<tr><td colspan="12" align="center">'. $paginacion->getStrPaginacion() .'</td></tr>';
            
            $retval .= '</table>';
            $retval .= '</fieldset>';
            return $retval;
            
        }
public function getStrListarb()
        {
        	 //$testadopu = new clEstadopu();	
			 $tmrechazo = new clMrechazo();
           $retval  = '<script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.validate.js"></script>
                        <script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.metadata.js"></script>
                       ';

            $retval .= '<br><br><br><br>
                        <script>
                            $(document).ready(function(){
                                    $.metadata.setType( \'attr\', \'validate\' );
                                    $(\'#frmtasignacionpub\').validate({
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
			$retval .= '<form id="frmtasignacionpub" action="'. TCONTRATACIONPU_URL .'tcontratacionpu.php" method="POST">';			   
            $NHC = "";		   
		    $Regresar = "regresar('". TEMPRESA_URL. "tempresa.php')";
		    $query = new clQuery();
            //Nombre Procedimientos Almacenados
           	$cf=$this->getStrCodigo();
			$ProcedimientoAlmacenado = sprintf("CALL splistarusuariopu('%s');","$cf");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            CONTRATACIÓN<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO CONTRATACIÓN</legend>
                       ';
            $retval .= '
                        <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                            <tr class="tablatitulo">
                                <th colspan="14">USUARIOS SELECCIONADOS</th>
                            </tr>
                             <input class="textbox" id="strCodigo" name="strCodigo" type="hidden" maxlength="50" value="'. $this->getStrCodigo() .'" />
                            <tr class="tablasubtitulo">
                            	<th align="center"></th>  
                               <th align="center">ID</th>    
                               <th align="center">ID Usuario</th>                                                           
                               <th align="center">Nombres</th>
                               <th align="center">Apellidos</th>
                               <th align="center">Email</th>
                            	<th align="center">Contratado</th>
                            	<th align="center">Rechazado</th>
                            	<th align="center">Motivos Rechazo</th>
                             </tr>
                        ';
			
            if( count($resultado) > 0 )
            {
                $i = 0;
				$j = 0;
				
                foreach( $resultado as $rst):
					
                    $retval .= '<tr class="listadofila'.$i.'">';
                    $retval .= '<td align="left"><input type="checkbox" id="strusuarioscu" name="strusuarioscu[]" value="'. $rst["id_usuario"] .'"></td>';
                    $retval .= 	'<td align="center">'. $rst["id_usuario_puesto"] .'</td>';
					$retval .= 	'<td align="center">'. $rst["id_usuario"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["primer_nombre"] .' '. $rst["segundo_nombre"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["apellido_paterno"] .' '. $rst["apellido_materno"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["email"] .'</td>
								 <td align="left">
								 <input type="radio" id="strtcontratacion" name="strtcontratacion['.$j.']" value="'. $this->getStrcontratado().'">Contratado<br>
						          <td align="left">
								 <input type="radio" id="strtcontratacion" name="strtcontratacion['.$j.']" value="'. $this->getStrrechazado().'">Rechazado<br>
								</td>
								<td align="left">                                    
	                                    <select name="lsMrechazo[]" id="lsMrechazo"  class="combobox">
	                                        '. $tmrechazo->getStrListar($this->getStrmrechazo()) .'
	                                    </select>
								</td>';			
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                    $i = 1 - $i;
					 $j =$j+1;
					
                endforeach;
            }
			$retval .= ' <tr>
                <td colspan="12" class="formulariofila1" align="center">
                                    <input type="submit" class="boton" name="'. $this->getStrNombreBoton() .'" value="'. $this->getStrValorBoton() .'" />
                                    <input type="submit" class="boton" name="'. $this->getStrNombreBotonanterior() .'" value="'. $this->getStrValorBotonanterior() .'" />
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
            $ProcedimientoAlmacenado = sprintf("CALL spbdetalleusuariopuestocontrat('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                           Detalle usuario contratado/no contratado<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Listado Usuarios contratado/no contratado<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Detalle Usuarios contratado/no contratado
                        </legend>
                       ';

            if( count($resultado) > 0 )
            {
                $i = 0;
				$valor=$this->getStrCodigo();
			 	$v=$this->getStrBuscartcemp($valor);
                foreach( $resultado as $rst):
                    $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                    $retval .= '<tr>
                                    <td colspan="2" align="center">
                                        <a href="'. TCONTRATACIONPU_URL .'tcontratacionpu.php?btnBuscar=Buscar&strCodigo='.$v.'">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> Regresar Listado de Empresas|</a>
                                    <td>
                                </tr>
                                ';
                    
                    $retval .= '<tr class="tablatitulo">
                                    <th colspan="2">DETALLE&nbsp;USUARIOS CONTRATADO/NO CONTRATADO</th>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Código Usuario Curso:</th>
                                    <td align="left">  '. $rst["id_usuario_contratacion"] .'</td>
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
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Nombre Puesto:</th>
                                    <td align="left">  '. $rst["descripcion"] .'</td>
                                </tr>
                                ';  
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Estado Contratación:</th>
                                    <td align="left">  '. $rst["contratacion_descripcion"] .'</td>
                                </tr>
                                ';   
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Motivo No Contratación:</th>
                                    <td align="left">  '. $rst["descripcion_mrechazo"] .'</td>
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