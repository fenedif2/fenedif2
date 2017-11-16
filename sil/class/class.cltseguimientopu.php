<?php	
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.validaciones.php' );
    include_once( CLASS_PATH . "class.clquery.php" );
    include_once( CLASS_PATH . "class.clpaginacion.php" );  
	include_once( CLASS_PATH . "class.clestadopu.php" );
		
    class clTseguimientopu
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
		private $strestadopu;
		private $strNombreBotonanterior;
        private $strValorBotonanterior;
		private $strNombreBotons;
        private $strValorBotons;
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
			$this->strestadopu = "";
			$this->strNombreBotonanterior = "";
           $this->strValorBotonanterior = "";
		   $this->strNombreBotons = "";
            $this->strValorBotons = "";
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
//////////////////////////estadopu//////////////////////////////////////////
public function getStrestadopu()
        {
            return $this->strestadopu;
        }

        public function setstrestadopu($fn)
        {
            $this->strestadopu = $fn;
        }						
 ///////////////////////nombre s ///////////////////////////////
 public function getStrNombreBotons()
        {
            return $this->strNombreBotons;
        }

        public function setStrNombreBotons($nb)
        {
            $this->strNombreBotons = $nb;
        }
/////////////////////////valor s ////////////////////////////////
 public function getStrValorBotons()
        {
            return $this->strValorBotons;
        }

        public function setStrValorBotons($vb)
        {
            $this->strValorBotons = $vb;
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
			$Second = $this->getStrestadopu();
			$fechaini= $this->getStrFechaInicio();
			if(count($First)>=1)
		 {
              for($indx = 0 ; $indx < count($First); $indx ++)
              {
              	$query = new clQuery();
            	$resultado = false; 
	            $ProcedimientoAlmacenado = sprintf("CALL spingresartusuarioseg('%s', '%s', '%s', '%s');",
	            $First[$indx],$Second[$indx],$fechaini[$indx],$this->getStrCodigo());
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
            }

            return $resultado;
           
           
        }
		else 
		{
			$query = new clQuery();
            	$resultado = false; 
	            $ProcedimientoAlmacenado = sprintf("CALL spingresartusuarioseg('%s', '%s', '%s', '%s');",
	            $First,$Second,$fechaini,$this->getStrCodigo());
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
            $ProcedimientoAlmacenado = sprintf("CALL speliminarusuariopuestoseg('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlInsertUpdateDelete();
			 if($query->getStrSqlInsertUpdateDelete())
	            {
	                //Nombre Procedimientos Almacenados [Auditoria]
	                $descripcion = 'Puesto = [ '.$this->getStrCodigo().' ]  ]';
	                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'G', 'tusuariopuestoseg', $descripcion);
	                $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
	                $query->getStrSqlInsertUpdateDelete();
	                $resultado = true;
	            }
            

            return $resultado;

        
        }
	public function getStrBuscarteemp($v) {
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $cf=$_SESSION["usuario"]["suc"];
			$me=$_SESSION["usuario"]["cuenta"];
            $ProcedimientoAlmacenado = sprintf("CALL spbidentificadorteemp('%d');","$v");
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
            $ProcedimientoAlmacenado = sprintf("CALL spbusuariopuestoseg('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
                foreach( $resultado as $rst):   
	                $this->setStrCodigo($rst['id_usuario_puestoseg']);
                    $this->setstrusuarioscu($rst['id_usuario']);
                    $this->setstrestadopu($rst['id_estadopu']);
					 $this->setstrFechaInicio($rst['fecha_inicio']);
					
					
					
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
            $ProcedimientoAlmacenado = sprintf("CALL sptotalusuarioseg();", $this->getStrCodigo());
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
            $ProcedimientoAlmacenado = sprintf("CALL splistarusuariopuestoseg('%d','%d','%d');","$re", "$pa","$cf");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            SEGUIMIENTO PUESTO<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO SEGUIMIENTO PUESTO</legend>
                       ';
            $retval .= '
                        <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                            <tr class="tablatitulo">
                                <th colspan="11">LISTADO USUARIOS SEGUIMIENTO</th>
                            </tr>
                            <tr class="tablasubtitulo">
                            	<th align="center"></th>  
                               <th align="center">ID Usuario Seguimiento</th>                                                              
                                <th align="center">Nombres</th>
                                <th align="center">Apellidos</th>
                                <th align="center">Email</th>
                                <th align="center">Nombre del Puesto</th>
                                <th align="center">Estado</th>
                                <th align="center">Fecha</th>
                                <th align="center" colspan="2">Acciones</th>
                             </tr>
                        ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["id_usuario_puestoseg"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["primer_nombre"] .' '. $rst["segundo_nombre"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["apellido_paterno"] .' '. $rst["apellido_materno"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["email"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["descripcion"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["estadodescrip"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["fecha_inicio"] .'</td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Eliminar <br> [codigo = '.$rst["id_usuario_puestoseg"] .' ]">';
                    $retval .=  '<a href="'.TSEGUIMIENTOPU_URL.'tseguimientopu.php?btnEliminar=Eliminar&strCodigo='. $rst["id_usuario_puestoseg"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Detalle Usuarios Asignados <br> [ codigo = '.$rst["id_usuario_puestoseg"] .' ]">';
                    $retval .=  '<a href="'.TSEGUIMIENTOPU_URL.'tseguimientopu.php?btnDetalle=Detalle&strCodigo='. $rst["id_usuario_puestoseg"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                    $i = 1 - $i;
                endforeach;
            }

            $paginacion->setStrNombrePagina("tseguimientopu/tseguimientopu.php");
            $retval .= '<tr><td colspan="12" align="center">'. $paginacion->getStrPaginacion() .'</td></tr>';
            
            $retval .= '</table>';
            $retval .= '</fieldset>';
            return $retval;
            
        }
public function getStrListarb()
        {
        	 $testadopu = new clEstadopu();	
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
			$retval .= '<form id="frmtasignacionpub" action="'. TSEGUIMIENTOPU_URL .'tseguimientopu.php" method="POST">';			   
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
                            SEGUIMIENTO PUESTO<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO SEGUIMIENTO PUESTO</legend>
                       ';
            $retval .= '
                        <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                            <tr class="tablatitulo">
                                <th colspan="11">LISTADO USUARIOS SELECCIONADOS POR FECHA</th>
                            </tr>
                             <input class="textbox" id="strCodigo" name="strCodigo" type="hidden" maxlength="50" value="'. $this->getStrCodigo() .'" />
                            <tr class="tablasubtitulo">
                            	<th align="center"></th>  
                               <th align="center">ID</th>  
                               <th align="center">ID Usuario</th>                                                             
                               <th align="center">Nombres</th>
                               <th align="center">Apellidos</th>
                               <th align="center">Email</th>
                            	<th align="center">Estado</th>
                            	<th align="center">Fecha</th>
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
	                                    <select name="lsEstadopu[]" id="lsEstadopu"  class="combobox">
	                                        '. $testadopu->getStrListar($this->getStrestadopu()) .'
	                                    </select>
								</td>
								<td align="left">
                                    <input name="dtFecha['.$j.']" type="text" id="dtFecha['.$j.']" value="'. $this->getStrFechaInicio() .'" size="10" readonly="readonly" class="textboxfecha" />
                                    <a href="#">
                                        <img src="'. IMAGENES_PATH .'/calendario.png" title="Calendario" name="strFecha['.$j.']" id="strFecha['.$j.']" width="16px" height="16px" style="border: 0px none;">
                                    </a>
                                    <script type="text/javascript">
                                        Calendar.setup({
                                                         inputField: "dtFecha['.$j.']",
                                                         ifFormat: "%Y-%m-%d",
                                                         button: "strFecha['.$j.']"
                                                         });
                                    </script>
                                </td>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                    $i = 1 - $i;
					 $j =$j+1;
					
                endforeach;
            }
			$retval .= ' <tr>
                <td colspan="8" class="formulariofila1" align="center">
                                    <input type="submit" class="boton" name="'. $this->getStrNombreBoton() .'" value="'. $this->getStrValorBoton() .'" />
                                   <input type="submit" class="boton" name="'. $this->getStrNombreBotonanterior() .'" value="'. $this->getStrValorBotonanterior() .'" />
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

public function getStrDetallePersona()
        {
        	$query = new clQuery();
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbdetalleusuariopuestoseg('%s');", $this->getStrCodigo());
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
			 	$v=$this->getStrBuscarteemp($valor);
                foreach( $resultado as $rst):
                    $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                    $retval .= '<tr>
                                    <td colspan="2" align="center">
                                        <a href="'. TSEGUIMIENTOPU_URL .'tseguimientopu.php?btnBuscar=Buscar&strCodigo='.$v.'">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> Regresar Listado de Empresas|</a>
                                    <td>
                                </tr>
                                ';
                    
                    $retval .= '<tr class="tablatitulo">
                                    <th colspan="2">DETALLE&nbsp;USUARIOS PUESTO</th>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Código Usuario Curso:</th>
                                    <td align="left">  '. $rst["id_usuario_puestoseg"] .'</td>
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
                                    <th align="right" class="bienvenida">Estado:</th>
                                    <td align="left">  '. $rst["estadodescrip"] .'</td>
                                </tr>
                                ';   
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Fecha:</th>
                                    <td align="left">  '. $rst["fecha_inicio"] .'</td>
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