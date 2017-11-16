<?php	
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.validaciones.php' );
    include_once( CLASS_PATH . "class.clquery.php" );
    include_once( CLASS_PATH . "class.clpaginacion.php" );   
	include_once( CLASS_PATH . "class.clfacceso.php" ); 

    class clTpuesto
    {
        private $StrFacceso;	
        private $StrCodigo;
		private $StrPuesto;
		private $StrEmpresa;
		private $StrCantidad;
		 private $strEtiqueta;
        private $strNombreBoton;
        private $strValorBoton;
        private $strLectura;
 		
        public function __construct()
        {
           $this->StrFacceso = ""; 	
		   $this->StrCodigo = "";	
		    $this->strEtiqueta = "";
            $this->strNombreBoton = "";
            $this->strValorBoton = "";
            $this->strLectura = "";
		}
////////////// Forma de acceso  /////////////////////
        public function getStrFacceso()
        {
            return $this->StrFacceso;
        }
		public function setStrFacceso($n)
        {
            $this->StrFacceso = $n;
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
////////////// Puesto /////////////////////
        public function getStrPuesto()
        {
            return $this->StrPuesto;
        }
		public function setStrPuesto($c)
        {
            $this->StrPuesto = $c;
        }
////////////// Empresa /////////////////////
        public function getStrEmpresa()
        {
            return $this->StrEmpresa;
        }
		public function setStrEmpresa($c)
        {
            $this->StrEmpresa = $c;
        }				
 ////////////// Cantidad /////////////////////
        public function getStrCantidad()
        {
            return $this->StrCantidad;
        }
		public function setStrCantidad($c)
        {
            $this->StrCantidad = $c;
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
            
		
        }

        public function getStrIngresar() {
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spingresarfaccesocf('%s','%s');",
            $this->getStrFacceso(),$this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);

            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Acceso = [ '.$this->getStrFacceso().' ] Centro_Formativo = [ '. $this->getStrCodigo().' ] ';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'G', 'faccesocf', $descripcion);
                $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
                $query->getStrSqlInsertUpdateDelete();
                $resultado = true;
            
		
			
			
			
			}

            return $resultado;
        }
 	public function getStrBuscar() {
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbtpuesto('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
                foreach( $resultado as $rst):   
	
					                 
                    $this->setStrCodigo($rst['id_puestoempresa']);
                    $this->setStrPuesto($rst['id_puesto']);
                    $this->setStrEmpresa($rst['id_empresa']);
					$this->setStrCantidad($rst['cantidad']);
                   
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
            $ProcedimientoAlmacenado = sprintf("CALL sptotaltpuesto();", $this->getStrCodigo());
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
            $ProcedimientoAlmacenado = sprintf("CALL splistartpuesto('%d','%d','%d');","$re", "$pa","$cf");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            PUESTOS DISPONIBLES<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO PUESTOS DISPONIBLES</legend>
                       ';
            $retval .= '
                        <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                            <tr class="tablatitulo">
                                <th colspan="11">LISTADO DE PUESTOS DISPONIBLES</th>
                            </tr>
                            <tr class="tablasubtitulo">
                                <th>...</th>  
                                <th align="center">ID Puesto</th>                                                              
                                <th align="center">Puesto</th>
                                <th align="center">Cantidad Disponible</th>
                                <th align="center">Nombre Empresa</th>
                                <th align="center">Asignar Puesto</th>
                                <th align="center">Seguimiento Proceso</th>
                                <th align="center">Contratación Candidatos</th>
                                <th align="center" colspan="2">Acciones</th>
                             </tr>
                        ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["id_puestoempresa"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["descripcion"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["cantidad"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["nombre"] .'</td>';
                    $retval .= '<td align="center"><div class="vtip" title="Nuevo <br> [ codigo = '.$rst["id_puestoempresa"] .' ]">';
                    $retval .=  '<a href="'.TASIGNACIONPU_URL.'tasignacionpu.php?btnNuevo=Nuevo&strCodigo='. $rst["id_puestoempresa"] .'"><img src="'. IMAGENES_PATH .'/rptauditoria.png" title="" width="32px" height="32px"  border="0" /></a>';
					$retval .= 	'</div></td>';
					$retval .= '<td align="center"><div class="vtip" title="Nuevo <br> [ codigo = '.$rst["id_puestoempresa"] .' ]">';
                    $retval .=  '<a href="'.TSEGUIMIENTOPU_URL.'tseguimientopu.php?btnBuscar=Buscar&strCodigo='. $rst["id_puestoempresa"] .'"><img src="'. IMAGENES_PATH .'/redactar.png" title="" width="32px" height="32px"  border="0" /></a>';
					$retval .= 	'</div></td>';
					$retval .= '<td align="center"><div class="vtip" title="Nuevo <br> [ codigo = '.$rst["id_puestoempresa"] .' ]">';
                    $retval .=  '<a href="'.TCONTRATACIONPU_URL.'tcontratacionpu.php?btnBuscar=Buscar&strCodigo='. $rst["id_puestoempresa"] .'"><img src="'. IMAGENES_PATH .'/rptrecaudacionmedico.png" title="" width="32px" height="32px"  border="0" /></a>';
					$retval .= 	'</div></td>';	
                    $retval .= 	'<td align="center"><div class="vtip" title="Eliminar <br> [codigo = '.$rst["id_puestoempresa"] .' ]">';
                    $retval .=  '<a href="'. TPUESTO_URL .'tpuesto.php?btnEliminar=Eliminar&strCodigo='. $rst["id_puestoempresa"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Detalle Centro Formativo <br> [ codigo = '.$rst["id_puestoempresa"] .' ]">';
                    $retval .=  '<a href="'. TPUESTO_URL .'tpuesto.php?btnDetalle=Detalle&strCodigo='. $rst["id_puestoempresa"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                    $i = 1 - $i;
                endforeach;
            }

            $paginacion->setStrNombrePagina("faccesocf/faccesocf.php");
            $retval .= '<tr><td colspan="12" align="center">'. $paginacion->getStrPaginacion() .'</td></tr>';
            $retval .= '</table>';
            $retval .= '</fieldset>';
            return $retval;
        }
 public function getStrEliminar() 
        {
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL speliminartpuesto('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlInsertUpdateDelete();

           if($query->getStrSqlInsertUpdateDelete())
            {
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Acceso = [ '.$this->getStrFacceso().' ] Centro_Formativo = [ '. $this->getStrCodigo().' ] ';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'G', 'faccesocf', $descripcion);
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
			 $ProcedimientoAlmacenado = sprintf("CALL spactualizarfaccesocf('%s','%s');",
            $this->getStrCodigo(),$this->getStrFacceso());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);

            if($query->getStrSqlInsertUpdateDelete())
            {
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Acceso = [ '.$this->getStrFacceso().' ] Centro_Formativo = [ '. $this->getStrCodigo().' ] ';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'G', 'faccesocf', $descripcion);
                $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
                $query->getStrSqlInsertUpdateDelete();
                $resultado = true;
            		
	       
            }

            return $resultado;
        }
public function getStrDetallePersona()
        {
            $query = new clQuery();
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbdetalletpuesto('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            PUESTOS DISPONIBLES<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO PUESTOS DISPONIBLES<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">DETALLE PUESTOS DISPONIBLES
                        </legend>
                       ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                    $retval .= '<tr>
                                    <td colspan="2" align="center">
                                        <a href="'. TEMPRESA_URL .'tempresa.php">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" />REGRESAR LISTADO PUESTOS DISPONIBLES|</a>
                                    <td>
                                </tr>
                                ';
                    
                    $retval .= '<tr class="tablatitulo">
                                    <th colspan="2">DETALLE&nbsp;PUESTO;REGISTRADO</th>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Código:</th>
                                    <td align="left">  '. $rst["id_puestoempresa"] .'</td>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Nombre de Puesto:</th>
                                    <td align="left">  '. $rst["descripcion"] .'</td>
                                </tr>
                                ';
					  $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Cantidad de Puestos Disponibles:</th>
                                    <td align="left">  '. $rst["cantidad"] .'</td>
                                </tr>
                                ';
                    
                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Nombre de la Empresa:</th>
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