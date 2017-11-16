<?php	
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.validaciones.php' );
    include_once( CLASS_PATH . "class.clquery.php" );
    include_once( CLASS_PATH . "class.clpaginacion.php" ); 
	include_once( CLASS_PATH . "class.cltipopuesto.php" ); 
	include_once( CLASS_PATH . "class.cltporcentaje.php" ); 
	include_once( CLASS_PATH . "class.clcategoriac.php" ); 
	include_once( CLASS_PATH . "class.cltipocargo.php" ); 
	
    class clapuesto
    {
        private $strCodigo;
        private $strAtecnico;
		private $strPtecnico;
		private $strCargor;
		private $strTipopuesto;
		private $strLtrabajo;
		private $strNvacantes;
		private $strCategoriac;
		private $strTipocargo;
		private $strComputador;
		private $strInstrumento;
		private $strMaquinaria;
		private $strVehiculo;
		private $strDfunciones;
		private $strVehiculod;
		
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
				
            $this->strCodigo = "";	
			$this->strNombre = "";
			$this->strAtecnico = "";
			$this->strPtecnico = "";
			$this->strCargor = "";
			$this->strTipopuesto = "";
			$this->strLtrabajo = "";
			$this->strNvacantes = "";
			$this->strCategoriac = "";
			$this->strTipocargo = "";
			$this->strComputador = "";
			$this->strInstrumento = "";
			$this->strMaquinaria = "";
			$this->strVehiculo = "";
			$this->strDfunciones = "";
			$this->strVehiculod = "";
			
			$this->strEtiqueta = "";
            $this->strNombreBoton = "";
            $this->strValorBoton = "";
			$this->strNombreBotons = "";
            $this->strValorBotons = "";
			$this->strNombreBotona = "";
            $this->strValorBotona = "";
            $this->strLectura = "";
			
        }
//////////////////// codigo //////////////////
        public function getStrCodigo()
        {
            return $this->strCodigo;
        }
		public function setStrCodigo($n)
        {
            $this->strCodigo = $n;
        }
                
////////////////////////////////Atecnico //////////////////////////////////////////////////////////////////////
		public function getstrAtecnico()
	        {
	            return $this->strAtecnico;
	        }

        public function setstrAtecnico($exp)
	        {
	            $this->strAtecnico = $exp;
	        }
//////////// Ptecnico////////////////////////////////////////// 
		public function getstrPtecnico()
        {
            return $this->strPtecnico;
        }
  		public function setstrPtecnico($ct)
        {
            $this->strPtecnico = $ct;
        }    
//////////// Cargor////////////////////////////////////////// 
		public function getstrCargor()
        {
            return $this->strCargor;
        }
  		public function setstrCargor($ct)
        {
            $this->strCargor = $ct;
        } 		 		
//////////// Tipopuesto////////////////////////////////////////// 
		public function getstrTipopuesto()
        {
            return $this->strTipopuesto;
        }
  		public function setstrTipopuesto($ct)
        {
            $this->strTipopuesto = $ct;
        } 		 		
//////////// Ltrabajo////////////////////////////////////////// 
		public function getstrLtrabajo()
        {
            return $this->strLtrabajo;
        }
  		public function setstrLtrabajo($ct)
        {
            $this->strLtrabajo = $ct;
        } 		 		
//////////// Nvacantes////////////////////////////////////////// 
		public function getstrNvacantes()
        {
            return $this->strNvacantes;
        }
  		public function setstrNvacantes($ct)
        {
            $this->strNvacantes = $ct;
        } 
//////////// Categoriac////////////////////////////////////////// 
		public function getstrCategoriac()
        {
            return $this->strCategoriac;
        }
  		public function setstrCategoriac($ct)
        {
            $this->strCategoriac = $ct;
        }	
//////////// Tipocargo////////////////////////////////////////// 
		public function getstrTipocargo()
        {
            return $this->strTipocargo;
        }
  		public function setstrTipocargo($ct)
        {
            $this->strTipocargo = $ct;
        }
//////////// Computador////////////////////////////////////////// 
		public function getstrComputador()
        {
            return $this->strComputador;
        }
  		public function setstrComputador($ct)
        {
            $this->strComputador = $ct;
        }	
//////////// Instrumento////////////////////////////////////////// 
		public function getstrInstrumento()
        {
            return $this->strInstrumento;
        }
  		public function setstrInstrumento($ct)
        {
            $this->strInstrumento = $ct;
        }	
//////////// Maquinaria////////////////////////////////////////// 
		public function getstrMaquinaria()
        {
            return $this->strMaquinaria;
        }
  		public function setstrMaquinaria($ct)
        {
            $this->strMaquinaria = $ct;
        }	
//////////// Vehiculo////////////////////////////////////////// 
		public function getstrVehiculo()
        {
            return $this->strVehiculo;
        }
  		public function setstrVehiculo($ct)
        {
            $this->strVehiculo = $ct;
        }
//////////// Vehiculod////////////////////////////////////////// 
		public function getstrVehiculod()
        {
            return $this->strVehiculod;
        }
  		public function setstrVehiculod($ct)
        {
            $this->strVehiculod = $ct;
        }		
//////////// Dfunciones////////////////////////////////////////// 
		public function getstrDfunciones()
        {
            return $this->strDfunciones;
        }
  		public function setstrDfunciones($ct)
        {
            $this->strDfunciones = $ct;
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
/////////////////////////// siguiente //////////////////////////
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

//////////////////////////valor/////////////////////////////////
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
/////////////////////////////////////////////////////////////
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
                    
		$tipopuesto=new clTipopuesto();
		$nvacantes=new clTporcentaje();	
		$categoriac=new clCategoriac();	
		$tipocargo=new clTipocargo();	
          $retval  = '<script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.validate.js"></script>
                        <script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.metadata.js"></script>
                       ';

            $retval .= '<br><br><br><br>
                        <script>
                            $(document).ready(function(){
                                    $.metadata.setType( \'attr\', \'validate\' );
                                    $(\'#frmapuesto\').validate({
                                            rules:{
                                            
											    
                                            	
												strPtecnicod: { required: true }
                                                  },
                                            messages:{
                                              	
												     }
                                    });
                                    
					
								 
                            });
                        </script>
                       ';
		  
            $retval .= '<form id="frmapuesto" action="'.APUESTO_URL.'apuesto.php" method="POST">';

            $Regresar = "regresar('".APUESTO_URL. "apuesto.php')";

            $retval .= '<fieldset class="fieldsetPequeno">';
            $retval .= '<legend class="etiquetaborde">
                            ANÁLISIS PUESTO <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO ANÁLISIS PUESTO<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> '. $this->getStrEtiqueta() .'
                          </legend>
                       ';
            $NHC = "";		   
            $retval .= '
                        <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">'. $this->getStrEtiqueta() .'</td>
                                <input class="textbox" id="strCodigo" name="strCodigo" type="hidden" maxlength="50" value="'. $this->getStrCodigo() .'" />
                            </tr>
							<tr class="formulariofila1">
                               	<td align="right"><b>Análisis realizado por (Técnico):&nbsp;</b></td>
	                             	<td align="left">
                                    <input class="textbox" id="strAtecnico" name="strAtecnico" type="text"   value="'. $this->getstrAtecnico().'" />
                                </td>
                                <td  align="right"><b>Cargo de Técnico:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strPtecnico" name="strPtecnico" type="text"   value="'. $this->getstrPtecnico() .'" />
                                </td>
                            </tr>
                 <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">DATOS DEL PUESTO</td>
                            </tr>            
                 			<tr class="formulariofila1">
                               	<td  align="right"><b>Cargo Requerido:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsTipopuesto" id="lsTipopuesto" class="combobox">
                                        '. $tipopuesto->getStrListar($this->getstrTipopuesto()) .'
                                    </select>                                    
                            	</td>
                                <td  align="right"><b>Lugar de Trabajo:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strLtrabajo" name="strLtrabajo" type="text"   value="'. $this->getstrLtrabajo() .'" />
                                </td>
                            </tr>         					
							<tr class="formulariofila1">
                               	<td  align="right"><b>Número Vacantes:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsNvacantes" id="lsNvacantes" class="combobox">
                                        '. $nvacantes->getStrListar($this->getstrNvacantes()) .'
                                    </select>                                    
                            	</td>
                                <td  align="right"><b>Categoría Cargo:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsCategoriac" id="Categoriac" class="combobox">
                                        '. $categoriac->getStrListar($this->getstrCategoriac()) .'
                                    </select>                                    
                            	</td>
                            </tr>    
							<tr class="formulariofila1">
                               	<td  align="right"><b>Tipo Cargo:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsTipc" id="lsTipc" class="combobox">
                                        '. $tipocargo->getStrListar($this->getstrTipocargo()) .'
                                    </select>                                    
 		                    </tr>    
			<table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">ELEMENTOS UTILIZADOS</td>
                            </tr>
                            <tr class="formulariofila1">  	
                            	<td  align="right"><b>Computador:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strComputador" name="strComputador" type="text"   value="'. $this->getstrComputador() .'" />
                                </td>
                                <td  align="right"><b>Instrumento:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strInstrumento" name="strInstrumento" type="text"   value="'. $this->getstrInstrumento() .'" />
                                </td>
                             </tr>    
                             <tr class="formulariofila1">  	
                            	<td  align="right"><b>Maquinaria:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strMaquinaria" name="strMaquinaria" type="text"   value="'. $this->getstrMaquinaria() .'" />
                                </td>
                                <td  align="right"><b>Vehículo:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="strVehiculo" name="strVehiculo" type="text"   value="'. $this->getstrVehiculo() .'" />
                                </td>
                             </tr>   
 	<table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">DESCRIPCIÓN DE FUNCIONES</td>
                            </tr>                            
							<tr class="formulariofila1">  	
                            	<td  align="right"><b>Descripción de Funciones:</b></td>
                                	<td align="left">
                                    <textarea class="textbox" id="strDfunciones" name="strDfunciones"  rows="4" type="text"   value="'. $this->getstrDfunciones() .'" />'. $this->getstrDfunciones() .'</textarea>
                                </td>
                                <td  align="right"><b>Vehículo:</b></td>
                                	<td align="left">
                                    <textarea class="textbox" id="strVehiculod" name="strVehiculod" type="text" rows="4"  value="'. $this->getstrVehiculod() .'" />'. $this->getstrVehiculod().'</textarea>
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
public function getStrBuscarempuesto($v) 
	{
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbidentificadorcontpuesto('%d');","$v");
			$query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
            foreach( $resultado as $rst):   
				$valor=$rst['id_empresa'];
		    endforeach;
            }
		     return $valor;
      }    	      

        public function getStrIngresar() {
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spingresarapuesto('%s', '%s', '%s','%s', '%s', '%s', '%s',
			'%s', '%s', '%s', '%s','%s', '%s', '%s');",
            $this->getstrAtecnico(),$this->getstrPtecnico(),$this->getstrTipopuesto(),$this->getstrLtrabajo(),
			$this->getstrNvacantes(),$this->getstrCategoriac(),$this->getstrTipocargo(),$this->getstrComputador(),
			$this->getstrInstrumento(),$this->getstrMaquinaria(),$this->getstrVehiculo(),$this->getstrDfunciones(),
			$this->getstrVehiculod(),$this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Contacto = [ '.$this->getstrAtecnico().' ] Observacion= [ '. $this->getstrPtecnico().' ] ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'GUARDAR', 'tpuesto_empresa', $descripcion);
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
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spactualizarapuesto('%s', '%s', '%s','%s', '%s', '%s', '%s',
			'%s', '%s', '%s', '%s','%s', '%s', '%s');",
            $this->getStrCodigo(),$this->getstrAtecnico(),$this->getstrPtecnico(),$this->getstrTipopuesto(),$this->getstrLtrabajo(),
			$this->getstrNvacantes(),$this->getstrCategoriac(),$this->getstrTipocargo(),$this->getstrComputador(),
			$this->getstrInstrumento(),$this->getstrMaquinaria(),$this->getstrVehiculo(),$this->getstrDfunciones(),
			$this->getstrVehiculod());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Contacto = [ '.$this->getstrAtecnico().' ] Observacion= [ '. $this->getstrPtecnico().' ] ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'GUARDAR', 'tpuesto_empresa', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL speliminarapuesto('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlInsertUpdateDelete();

           if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
              $descripcion = 'Contacto = [ '.$this->getstrAtecnico().' ] Observacion= [ '. $this->getstrPtecnico().' ] ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'ELIMINAR', 'tpuesto_empresa', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL spbapuesto('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
                foreach( $resultado as $rst):   
	        $this->setstrAtecnico($rst["atecnico"]);
			$this->setstrPtecnico($rst["ptecnico"]);
			$this->setstrTipopuesto($rst["id_puesto"]);
			$this->setstrLtrabajo($rst["ltrabajo"]);
			$this->setstrNvacantes($rst["cantidad"]);
			$this->setstrCategoriac($rst["cargo_id"]);
			$this->setstrTipocargo($rst["tipocargo_id"]);
			$this->setstrComputador($rst["computador"]);
			$this->setstrInstrumento($rst["instrumento"]);
			$this->setstrMaquinaria($rst["maquinaria"]);
			$this->setstrVehiculo($rst["vehiculo"]);
			$this->setstrDfunciones($rst["dfunciones"]);
			$this->setstrVehiculod($rst["beneficios"]);
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
            $ProcedimientoAlmacenado = sprintf("CALL sptotalapuesto();", $this->getStrCodigo());
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
            $ProcedimientoAlmacenado = sprintf("CALL splistarapuesto('%d','%d','%d');","$re", "$pa","$cf");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            ANÁLISIS PUESTO<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">ANÁLISIS PUESTO</legend>
                       ';
            $retval .= '
                        <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                            <tr class="tablatitulo">
                                <th colspan="11">LISTADO ANÁLISIS PUESTO</th>
                            </tr>
                            <tr class="tablasubtitulo">
                            	<th align="center"></th>  
                               <th align="center">ID Acceso</th>                                                              
                                <th align="center">Análisis realizado por (Técnico)</th>
                                <th align="center">Cargo de Técnico:</th>
                                <th align="center">Cargo Requerido</th>
                                <th align="center" colspan="3">Acciones</th>
                             </tr>
                        ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["id_puestoempresa"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["atecnico"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["ptecnico"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["descripcion"] .'</td>';
					
					$retval .= 	'<td align="center"><div class="vtip" title="ACTUALIZAR ANÁLISIS PUESTO<br> [ codigo = '.$rst["id_puestoempresa"] .' ]">';
                    $retval .=  '<a href="'.APUESTO_URL.'apuesto.php?btnActualizar=Actualizar&strCodigo='. $rst["id_puestoempresa"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="ELIMINAR ANÁLISIS PUESTO<br> [codigo = '.$rst["id_puestoempresa"] .' ]">';
                    $retval .=  '<a href="'.APUESTO_URL.'apuesto.php?btnEliminar=Eliminar&strCodigo='. $rst["id_puestoempresa"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="DETALLE ANÁLISIS PUESTO<br> [ codigo = '.$rst["id_puestoempresa"] .' ]">';
                    $retval .=  '<a href="'.APUESTO_URL.'apuesto.php?btnDetalle=Detalle&strCodigo='. $rst["id_puestoempresa"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                    $i = 1 - $i;
                endforeach;
            }

            $paginacion->setStrNombrePagina("apuesto/apuesto.php");
            $retval .= '<tr><td colspan="12" align="center">'. $paginacion->getStrPaginacion() .'</td></tr>';
            $retval .= '</table>';
            $retval .= '</fieldset>';
            return $retval;
            
            
        }

public function getStrDetallePersona()
        {
        	$query = new clQuery();
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbdetalleapuesto('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                           ANÁLISIS PUESTO<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO ANÁLISIS PUESTO<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">DETALLE ANÁLISIS PUESTO
                        </legend>
                       ';

            if( count($resultado) > 0 )
            {
                $i = 0;
				$valor=$this->getStrCodigo();
			 	$v=$this->getStrBuscarempuesto($valor);
                foreach( $resultado as $rst):
                    $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                    $retval .= '<tr>
                                    <td colspan="2" align="center">
                                        <a href="'. APUESTO_URL.'apuesto.php?btnNuevo=Nuevo&strCodigo='.$v.'">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" />REGRESAR LISTADO ANÁLISIS PUESTO|</a>
                                    <td>
                                </tr>
                                ';
                    
                    $retval .= '<tr class="tablatitulo">
                                    <th colspan="2">DETALLE&nbsp; ANÁLISIS PUESTO ;REGISTRADO</th>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Código:</th>
                                    <td align="left">  '. $rst["id_puestoempresa"] .'</td>
                                </tr>
                                ';
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Análisis realizado por (Técnico):</th>
                                    <td align="left">  '. $rst["atecnico"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Cargo de Técnico:</th>
                                    <td align="left">  '. $rst["ptecnico"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Cargo Requerido:</th>
                                    <td align="left">  '. $rst["descripcion"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Lugar de Trabajo:</th>
                                    <td align="left">  '. $rst["ltrabajo"] .'</td>
                                </tr>
                                ';
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Número Vacantes:</th>
                                    <td align="left">  '. $rst["cantidad"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Categoría Cargo:</th>
                                    <td align="left">  '. $rst["categoriacargo_nombre"] .'</td>
                                </tr>
                                '; 
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Tipo Cargo:</th>
                                    <td align="left">  '. $rst["tipocargo_nombre"] .'</td>
                                </tr>
                                ';    	           				 					 					
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Computador:</th>
                                    <td align="left">  '. $rst["computador"] .'</td>
                                </tr>
                                '; 
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Instrumento:</th>
                                    <td align="left">  '. $rst["instrumento"] .'</td>
                                </tr>
                                ';  
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Maquinaria:</th>
                                    <td align="left">  '. $rst["maquinaria"] .'</td>
                                </tr>
                                ';  
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Vehículo:</th>
                                    <td align="left">  '. $rst["vehiculo"] .'</td>
                                </tr>
                                ';  			
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Descripción de Funciones:</th>
                                    <td align="left">  '. $rst["dfunciones"] .'</td>
                                </tr>
                                ';  
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Vehículo:</th>
                                    <td align="left">  '. $rst["beneficios"] .'</td>
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