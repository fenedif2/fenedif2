<?php	
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.validaciones.php' );
    include_once( CLASS_PATH . "class.clquery.php" );
    include_once( CLASS_PATH . "class.clpaginacion.php" );    
	include_once( CLASS_PATH . "class.clexperiencia.php" );
	include_once( CLASS_PATH . "class.cltusuario.php" );
	class clPterapuetico
    {
        private $StrCodigo;
		private $StrTusuario;
		private $strTratamientop;
		private $strTratamientoi;
		private $strTratamientor;
		private $strObservacion;
		private $strCual;
		private $strIndividual;
		private $strPareja;
		private $strFamiliar;
		private $strGrupal;
		private $strInstitucional;	
		private $strProceso;
	
	    private $strEtiqueta;
        private $strNombreBoton;
        private $strValorBoton;
        private $strLectura;

        public function __construct()
        {
				
            $this->StrCodigo = "";	
			$this->StrTusuario = "";	
            
			
			$this->strTratamientop = "";
			$this->strTratamientoi = "";
			$this->strTratamientor = "";
			$this->strCual = ""; 
			$this->strIndividual = "";
			$this->strPareja = "";
			$this->strFamiliar = "";
			$this->strGrupal = "";
			$this->strInstitucional = "";
			$this->strProceso = "";
			
            $this->strEtiqueta = "";
            $this->strNombreBoton = "";
            $this->strValorBoton = "";
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
                
////////////////////////////////Tusuario //////////////////////////////////////////////////////////////////////
		public function getStrTusuario()
	        {
	            return $this->StrTusuario;
	        }

        public function setStrTusuario($exp)
	        {
	            $this->StrTusuario = $exp;
	        }

////////////////////////////////Tratamientop //////////////////////////////////////////////////////////////////////
		public function getStrTratamientop()
	        {
	            return $this->strTratamientop;
	        }

        public function setStrTratamientop($exp)
	        {
	            $this->strTratamientop = $exp;
	        }
////////////////////////////////Tratamientoi //////////////////////////////////////////////////////////////////////
		public function getStrTratamientoi()
	        {
	            return $this->strTratamientoi;
	        }

        public function setStrTratamientoi($exp)
	        {
	            $this->strTratamientoi = $exp;
	        }
////////////////////////////////Tratamientor //////////////////////////////////////////////////////////////////////
		public function getStrTratamientor()
	        {
	            return $this->strTratamientor;
	        }

        public function setStrTratamientor($exp)
	        {
	            $this->strTratamientor = $exp;
	        }
/////////////////////////cual//////////////////////////////
		public function getStrCual()
	        {
	            return $this->strCual;
	        }

        public function setStrCual($ne)
	        {
	            $this->strCual = $ne;
	        }	
/////////////////////////Individual  //////////////////////////
 	public function getStrIndividual()
        {
            return $this->strIndividual;
        }

        public function setStrIndividual($et)
        {
            $this->strIndividual = $et;
        }
//////////////////////////////Pareja////////////////////////////////////////////////////
		public function getStrPareja()
	        {
	            return $this->StrPareja;
	        }

        public function setStrPareja($cb)
	        {
	            $this->StrPareja = $cb;
	        }	
////////////////////////////////Familiar//////////////////////////////////////////////////////////////////////
		public function getStrFamiliar()
	        {
	            return $this->StrFamiliar;
	        }

        public function setStrFamiliar($exp)
	        {
	            $this->StrFamiliar = $exp;
	        }
////////////////////////////////Grupal //////////////////////////////////////
		public function getStrGrupal()
	        {
	            return $this->strGrupal;
	        }

        public function setStrGrupal($ob)
	        {
	            $this->strGrupal = $ob;
	        }	
////////////////////////Institucional/////////////////////////////////			
		public function getStrInstitucional()
	        {
	            return $this->StrInstitucional;
	        }

        public function setStrInstitucional($ned)
	        {
	            $this->StrInstitucional = $ned;		
			}	
/////////////////////Proceso //////////////////////////////
		public function getStrProceso()
	        {
	            return $this->strProceso;
	        }

        public function setStrProceso($t)
	        {
	            $this->strProceso = $t;
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
            
			$tratamientop = new clExperiencia();
			$tratamientoi = new clExperiencia();
			$tratamientor = new clExperiencia();
			$tusuario = new clTusuario();
			
          $retval  = '<script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.validate.js"></script>
                        <script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.metadata.js"></script>
                       ';

            $retval .= '<br><br><br><br>
                        <script>
                            $(document).ready(function(){
                                    $.metadata.setType( \'attr\', \'validate\' );
                                    $(\'#frmpterapeutico\').validate({
                                            rules:{
                                               lsTratamientop: { required: true}
                                         
                                                  },
                                            messages:{
                                              	lsTratamientop: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"}
                                                
												     }
                                    });
                                    
                                   
								   
								 
                            });
                        </script>
                       ';
		  
            $retval .= '<form id="frmpterapeutico" action="'.PTERAPEUTICO_URL .'pterapeutico.php" method="POST">';

            $Regresar = "regresar('". PTERAPEUTICO_URL . "pterapeutico.php')";

            $retval .= '<fieldset class="fieldsetPequeno">';
            $retval .= '<legend class="etiquetaborde">
                            PROCESO PSICOTERAPÉUTICO <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO PROCESO PSICOTERAPÉUTICO<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> '. $this->getStrEtiqueta() .'
                          </legend>
                       ';
            $NHC = "";		   
            $retval .= '
                        <table width="100%" border="0" align="center" cellpadding="1">
                             <tr>
                                <td colspan="4" align="center" class="tablatitulo">PROCESO PSICOTERAPÉUTICO</td>
                            </tr>
                            <tr>
                            	 <td colspan="4" align="center" class="tablatitulo">'. $this->getStrEtiqueta() .'</td>
                                <input class="textbox" id="strCodigo" name="strCodigo" type="hidden" maxlength="50" value="'. $this->getStrCodigo() .'" />
                            </tr>
							
		                    <tr class="formulariofila1">
		                    	<td align="right"><b>Usuario:&nbsp;</b></td>
                                <td align="left">                                    
                                    <select name="lsTusuario" id="lsTusuario"  class="combobox">
                                        '.$tusuario->getStrListar($this->getStrTusuario()) .'
                                    </select>
                                </td>
                                <td align="right"><b>Usuario susceptible de tratamiento psicológico:&nbsp;</b></td>
                                <td align="left">                                    
                                    <select name="lsTratamientop" id="lsTratamientop"  class="combobox">
                                        '. $tratamientop->getStrListar($this->getStrTratamientop()) .'
                                    </select>
                                </td>
                                
                            </tr>
                           <tr class="formulariofila1">
                           		<td align="right"><b>Requiere tratamiento  psicológico integral:&nbsp;</b></td>
                                <td align="left">                                    
                                    <select name="lsTratamientoi" id="lsTratamientoi"  class="combobox">
                                        '. $tratamientoi->getStrListar($this->getStrTratamientoi()) .'
                                    </select>
                                </td>
                                <td align="right"><b>Requiere tratamiento interdisciplinario:&nbsp;</b></td>
                                <td align="left">                                    
                                    <select name="lsTratamientor" id="lsTratamientor"  class="combobox">
                                        '. $tratamientor->getStrListar($this->getStrTratamientor()) .'
                                    </select>
                                </td>
                               
                            </tr>
                            <tr class="formulariofila1">
                           		<td  align="right"><b>¿Cuál?:</b></td>
                                	<td align="left">
                                    <textarea class="textbox" id="strCual" name="strCual" rows="4"  type="text" value="'. $this->getStrCual() .'"  />'. $this->getStrCual() .'</textarea>
                                </td>
                            </tr>

  <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">REQUIERE INTERVENCIÓN</td>
                            </tr>
							 <tr class="formulariofila1">
                                 <td  align="right"><b>Individual:</b></td>
                                	<td align="left">
                                    <textarea class="textbox" id="strIndividual" name="strIndividual" rows="4"  type="text" value="'. $this->getStrIndividual() .'"  />'. $this->getStrIndividual() .'</textarea>
                                </td>
                             	<td  align="right"><b>De pareja:</b></td>
                                <td align="left">
                                    <textarea class="textbox" id="strPareja" name="strPareja" rows="4"  type="text" value="'. $this->getStrPareja() .'"  />'. $this->getStrPareja() .'</textarea>
                                </td>
                            </tr>
                            <tr class="formulariofila1">
                                 <td  align="right"><b>Familiar:</b></td>
                                	<td align="left">
                                    <textarea class="textbox" id="strFamiliar" name="strFamiliar" rows="4"  type="text" value="'. $this->getStrFamiliar() .'"  />'. $this->getStrFamiliar() .'</textarea>
                                </td>
                             	<td  align="right"><b>Grupal:</b></td>
                                	<td align="left">
                                    <textarea class="textbox" id="strGrupal" name="strGrupal" rows="4"  type="text" value="'. $this->getStrGrupal() .'"  />'. $this->getStrGrupal() .'</textarea>
                                </td>                  
                            </tr>
                            <tr class="formulariofila1">
                                 
                             	<td  align="right"><b>Institucional:</b></td>
                                	<td align="left">
                                    <textarea class="textbox" id="strInstitucional" name="strInstitucional" rows="4"  type="text" value="'. $this->getStrInstitucional() .'"  />'. $this->getStrInstitucional() .'</textarea>
                                </td>
                                <td  align="right"><b>¿Factores de riesgo en el proceso?:</b></td>
                                	<td align="left">
                                    <textarea class="textbox" id="strProceso" name="strProceso" rows="4"  type="text" value="'. $this->getStrProceso() .'"  />'. $this->getStrProceso() .'</textarea>
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
            $ProcedimientoAlmacenado = sprintf("CALL spingresarpsicoterapeutico('%s','%s','%s','%s','%s','%s','%s',
			'%s','%s','%s','%s','%s','%s');",
            $this->getStrTusuario(),$this->getstrTratamientop(),$this->getstrTratamientoi(),$this->getstrTratamientor(),
            $this->getStrCual(),$this->getStrIndividual(),$this->getStrPareja(), $this->getStrFamiliar(),$this->getStrGrupal(),
            $this->getStrInstitucional(),$this->getStrProceso(),$_SESSION["usuario"]["suc"],$_SESSION["usuario"]["cuenta"]);
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);

            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Nombres = [ '.$this->getStrTratamientop().' ] Telefonos = [ '. $this->getStrTratamientop().' ] Em@il = [ '.$this->getStrTratamientop().' ] Fecha Nacimiento= [ '. $this->getStrTratamientop().' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'GUARDAR', 'terapeutico', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL spactualizarterapeutico('%s','%s','%s','%s','%s','%s','%s',
			'%s','%s','%s','%s','%s');",
            $this->getStrCodigo(),$this->getStrTusuario(),$this->getstrTratamientop(),$this->getstrTratamientoi(),$this->getstrTratamientor(),
            $this->getStrCual(),$this->getStrIndividual(),$this->getStrPareja(), $this->getStrFamiliar(),$this->getStrGrupal(),
            $this->getStrInstitucional(),$this->getStrProceso());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);

            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Tratamientop = [ '.$this->getStrTratamientop().' ] Tratamientop = [ '. $this->getStrTratamientop().' ] Fecha Nacimiento= [ '. $this->getStrTratamientop().' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'GUARDAR', 'terapeutico', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL speliminarpterapeutico('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlInsertUpdateDelete();

           if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Nombres = [ '.$this->getStrTusuario().' ] Tratamiento = [ '. $this->getStrTratamientop().' ] Tratamientoi = [ '.$this->getStrTratamientoi().' ] Individual= [ '. $this->getStrIndividual().' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'ELIMINAR', 'terapeutico', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL spbpterapeutico('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
            foreach( $resultado as $rst):   
				$this->setStrTusuario($rst['tusuario_id']); 
		        $this->setStrTratamientop($rst['tratamientop_id']);   
	            $this->setStrTratamientoi($rst['tratamientoi_id']);   
	            $this->setStrTratamientor($rst['tratamientor_id']);   
				$this->setStrCual($rst['cual']);   
				$this->setStrIndividual($rst['individual']);   
				$this->setStrPareja($rst['pareja']);   
				$this->setStrFamiliar($rst['familiar']);   
				$this->setStrGrupal($rst['grupal']);   
				$this->setStrInstitucional($rst['institucional']);   
				$this->setStrProceso($rst['proceso']);   
				   
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
            $sucursal=$_SESSION["usuario"]["suc"];
            $ProcedimientoAlmacenado = sprintf("CALL sptotalpterapeutico('%d');", $sucursal);
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultadototal = $query->getStrSqlSelect();

            foreach( $resultadototal as $rst):
                $paginacion->setStrTotalRegistros($rst["accestotal"]);
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
			 $cf=$_SESSION["usuario"]["suc"];
            $ProcedimientoAlmacenado = sprintf("CALL splistarpterapeutico('%d','%d','%d');","$re", "$pa","$cf");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            PSICOTERAPÉUTICO<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO PROCESO PSICOTERAPÉUTICO</legend>
                       ';
            $retval .= '
                        <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                            <tr>
                                <td colspan="12" align="center"><div class="vtip" title="Ingreso<br> [NUEVO PROCESO PSICOTERAPÉUTICO]">
                                    <a href="'. PTERAPEUTICO_URL.'pterapeutico.php?btnNuevo=Nuevo">| <img src="'. IMAGENES_PATH .'/rptstocksucursal.png" title="" width="16px" height="16px"  border="0" /><img src="'. IMAGENES_PATH .'/nuevo.png" title="" width="16px" height="16px"  border="0" />NUEVO PROCESO PSICOTERAPÉUTICO |</a>
                                </div><td>
                            </tr>
                            <tr class="tablatitulo">
                                <th colspan="12">LISTADO&nbsp;DE&nbsp;PROCESOS PSICOTERAPEUTICOS&nbsp;REGISTRADOS</th>
                            </tr>
                            <tr class="tablasubtitulo">
                                <th>...</th>  
                                <th align="center"> </th>  
                                 <th align="center">Usuario</th>                                                            
                                <th align="center">Usuario susceptible de tratamiento psicológico</th>
                                <th align="center">Requiere tratamiento psicológico integral</th>
                                <th align="center">Requiere tratamiento interdisciplinar </th>
                                
                                
                 
                                <th align="center" colspan="3">Acciones</th>
                            </tr>
                        ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["psicoterapeutico_id"] .'</td>';
					$retval .= 	'<td align="center">'. $rst["primer_nombre"] .' '. $rst["segundo_nombre"] .' '. $rst["apellido_paterno"] .' '. $rst["apellido_materno"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["tratamientop"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["tratamientoi"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["tratamientor"] .'</td>';
				
					
				
                   	
					$retval .= 	'<td align="center"><div class="vtip" title="ACTUALIZAR PSICOTERAPÉUTICO<br> [ codigo = '.$rst["psicoterapeutico_id"] .' ]">';
                    $retval .=  '<a href="'. PTERAPEUTICO_URL .'pterapeutico.php?btnActualizar=Actualizar&strCodigo='. $rst["psicoterapeutico_id"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    if($_SESSION["usuario"]["tipo"]==2 || $_SESSION["usuario"]["tipo"]==1 )
							{
                    $retval .= 	'<td align="center"><div class="vtip" title="ELIMINAR PSICOTERAPÉUTICO <br> [ codigo = '.$rst["psicoterapeutico_id"] .' ]">';
                    $retval .=  '<a href="'. PTERAPEUTICO_URL .'pterapeutico.php?btnEliminar=Eliminar&strCodigo='. $rst["psicoterapeutico_id"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
							}
                    $retval .= 	'<td align="center"><div class="vtip" title="DETALLE PSICOTERAPÉUTICO <br> [ codigo = '.$rst["psicoterapeutico_id"] .' ]">';
                    $retval .=  '<a href="'. PTERAPEUTICO_URL .'pterapeutico.php?btnDetalle=Detalle&strCodigo='. $rst["psicoterapeutico_id"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                    $i = 1 - $i;
                endforeach;
            }

            $paginacion->setStrNombrePagina("pterapeutico/pterapeutico.php");
            $retval .= '<tr><td colspan="12" align="center">'. $paginacion->getStrPaginacion() .'</td></tr>';
            $retval .= '</table>';
            $retval .= '</fieldset>';
            return $retval;
        }

public function getStrDetallePersona()
        {
            $query = new clQuery();
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbdetallepterapeutico('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            PSICOTERAPÉUTICO<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO PROCESO PSICOTERAPÉUTICO<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">DETALLE PSICOTERAPÉUTICO
                        </legend>
                       ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                    $retval .= '<tr>
                                    <td colspan="2" align="center">
                                        <a href="'.PTERAPEUTICO_URL.'pterapeutico.php">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" />REGRESAR LISTADO PROCESO PSICOTERAPÉUTICO|</a>
                                    <td>
                                </tr>
                                ';
                    
                    $retval .= '<tr class="tablatitulo">
                                    <th colspan="2">DETALLE&nbsp;PROCESO PSICOTERAPEÚTICO</th>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Código:</th>
                                    <td align="left">  '. $rst["psicoterapeutico_id"] .'</td>
                                </tr>
                                ';

					 $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Usuario:</th>
                                    <td align="left">  '. $rst["primer_nombre"] .' '. $rst["segundo_nombre"] .' '. $rst["apellido_paterno"] .' '. $rst["apellido_materno"] .'</td>
                                </tr>
                                ';
					
                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Usuario susceptible de tratamiento psicológico:</th>
                                    <td align="left">  '. $rst["tratamientop"] .'</td>
                                </tr>
                                ';

                    
                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Requiere tratamiento psicológico integral:</th>
                                    <td align="left">  '. $rst["tratamientoi"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Requiere tratamiento interdisciplinar :</th>
                                    <td align="left">  '. $rst["tratamientor"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">¿Cuál?:</th>
                                    <td align="left">  '. $rst["cual"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Individual:</th>
                                    <td align="left">  '. $rst["individual"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">De pareja:</th>
                                    <td align="left">  '. $rst["pareja"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Familiar:</th>
                                    <td align="left">  '. $rst["familiar"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Grupal:</th>
                                    <td align="left">  '. $rst["grupal"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Institucional:</th>
                                    <td align="left">  '. $rst["institucional"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">¿Factores de riesgo en el proceso?:</th>
                                    <td align="left">  '. $rst["proceso"] .'</td>
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