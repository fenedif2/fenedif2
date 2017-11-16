<?php	
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.validaciones.php' );
    include_once( CLASS_PATH . "class.clquery.php" );
    include_once( CLASS_PATH . "class.clpaginacion.php" );
	include_once( CLASS_PATH . "class.cllaborando.php" );  
	include_once( CLASS_PATH . "class.cledad.php" ); 
	
	
    class clTrequisitosemp
    {
        private $StrCodigo;
        private $strNombre;
		private $strLaborando;
		private $strEdadminima;
		private $strEdadmaxima;
		private $strFisica;
		private $strSensorial;
		private $strIntelectual;
		private $strPsicologica;
		private $strPluridiscapacidad;
		private $strSistemas;
		private $strInternos;
		private $strNinguna;
		private $strVisual;
		private $strDiscapacidad;
		private $strCprevios;
		private $strNombreBoton;
        private $strValorBoton;
		private $strNombreBotons;
        private $strValorBotons;
		private $strNombreBotona;
        private $strValorBotona;
		
        public function __construct()
        {
				
            $this->StrCodigo = "";	
			$this->strNombre = "";
			$this->strLaborando = "";
			$this->strEdadminima = "";
			$this->strEdadmaxima = "";
			$this->strNinguna = "10";
			$this->strFisica = "1";
			$this->strIntelectual = "3";
			$this->strInternos = "7";
			$this->strVisual = "9";
			$this->strPluridiscapacidad = "5";
			$this->strPsicologica = "4";
			$this->strSensorial = "2";
			$this->strSistemas = "6";
			
			
			
			
			
			$this->strDiscapacidad = "";
			$this->strCprevios = "";
			$this->strNombreBoton = "";
            $this->strValorBoton = "";
			$this->strNombreBotons = "";
            $this->strValorBotons = "";
			$this->strNombreBotona = "";
            $this->strValorBotona = "";
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
		
////////////////////////////////Laborando //////////////////////////////////////////////////////////////////////
		public function getstrLaborando()
	        {
	            return $this->strLaborando;
	        }

        public function setstrLaborando($exp)
	        {
	            $this->strLaborando = $exp;
	        }
			
////////////////////////////////Edad Minima  //////////////////////////////////////////////////////////////////////
		public function getstrEdadminima()
	        {
	            return $this->strEdadminima;
	        }

        public function setstrEdadminima($exp)
	        {
	            $this->strEdadminima = $exp;
	        }
////////////////////////////////Edad Maxima  //////////////////////////////////////////////////////////////////////
		public function getstrEdadmaxima()
	        {
	            return $this->strEdadmaxima;
	        }

        public function setstrEdadmaxima($exp)
	        {
	            $this->strEdadmaxima = $exp;
	        }
			
////////////////////////////////Fisica  //////////////////////////////////////////////////////////////////////
		public function getstrFisica()
	        {
	            return $this->strFisica;
	        }

        public function setstrFisica($exp)
	        {
	            $this->strFisica = $exp;
	        }
////////////////////////////////Visual  //////////////////////////////////////////////////////////////////////
		public function getstrVisual()
	        {
	            return $this->strVisual;
	        }

        public function setstrVisual($exp)
	        {
	            $this->strVisual = $exp;
	        }			
////////////////////////////////Sensorial  //////////////////////////////////////////////////////////////////////
		public function getstrSensorial()
	        {
	            return $this->strSensorial;
	        }

        public function setstrSensorial($exp)
	        {
	            $this->strSensorial = $exp;
	        }
			
////////////////////////////////Intelectual  //////////////////////////////////////////////////////////////////////
		public function getstrIntelectual()
	        {
	            return $this->strIntelectual;
	        }

        public function setstrIntelectual($exp)
	        {
	            $this->strIntelectual = $exp;
	        }
			
////////////////////////////////Psicologica  //////////////////////////////////////////////////////////////////////
		public function getstrPsicologica()
	        {
	            return $this->strPsicologica;
	        }

        public function setstrPsicologica($exp)
	        {
	            $this->strPsicologica = $exp;
	        }
			
////////////////////////////////Pluridiscapacidad  //////////////////////////////////////////////////////////////////////
		public function getstrPluridiscapacidad()
	        {
	            return $this->strPluridiscapacidad;
	        }

        public function setstrPluridiscapacidad($exp)
	        {
	            $this->strPluridiscapacidad = $exp;
	        }
			
////////////////////////////////Sistemas  //////////////////////////////////////////////////////////////////////
		public function getstrSistemas()
	        {
	            return $this->strSistemas;
	        }

        public function setstrSistemas($exp)
	        {
	            $this->strSistemas = $exp;
	        }
			
////////////////////////////////Internos  //////////////////////////////////////////////////////////////////////
		public function getstrInternos()
	        {
	            return $this->strInternos;
	        }

        public function setstrInternos($exp)
	        {
	            $this->strInternos = $exp;
	        }
			
////////////////////////////////Ninguna  //////////////////////////////////////////////////////////////////////
		public function getstrNinguna()
	        {
	            return $this->strNinguna;
	        }

        public function setstrNinguna($exp)
	        {
	            $this->strNinguna = $exp;
	        }
////////////////////////////////Discapacidad  //////////////////////////////////////////////////////////////////////
		public function getstrDiscapacidad()
	        {
	            return $this->strDiscapacidad;
	        }

        public function setstrDiscapacidad($exp)
	        {
	            $this->strDiscapacidad = $exp;
	        }
////////////////////////////////Conocimientos Previos ////////////////////////////////////////
		public function getstrCprevios()
	        {
	            return $this->strCprevios;
	        }

        public function setstrCprevios($exp)
	        {
	            $this->strCprevios = $exp;
	        }
										
////////////////////////////Etiqueta ////////////////////////////////////////////////
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
////////////////////////////////////////////////////////////////////////			
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
            $laborando = new clLaborando();	
			$edadminima = new clEdad();
			$edadmaxima = new clEdad();
			
           
			
          $retval  = '<script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.validate.js"></script>
                        <script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.metadata.js"></script>
                       ';

            $retval .= '<br><br><br><br>
                        <script>
                            $(document).ready(function(){
                                    $.metadata.setType( \'attr\', \'validate\' );
                                    $(\'#frmtrequisitosemp\').validate({
                                            rules:{
                                              
                                                  },
                                            messages:{
                                              	
												     }
                                    });

									$("#lsEdadmaxima").change(function() 
		                 				{
		                 					var edadmaxima=$(this).val();
		                 					var edadminima= $("#lsEdadminima").val()
				           
												
												
		                 				
		                 				 if(edadminima > edadmaxima ) 
									  	{
									    	
									    	alert("La Edad máxima nuna debe ser menor que la Edad mínima");
											return false;
										}
										});
										
			
								 
                            });
                        </script>
                       ';
		  
            $retval .= '<form id="frmtrequisitosemp" action="'. TREQUISITOSEMP_URL .'trequisitosemp.php" method="POST">';

            $Regresar = "regresar('". EMPRESAS_URL. "empresas.php')";

            $retval .= '<fieldset class="fieldsetPequeno">';
            $retval .= '<legend class="etiquetaborde">
                            REQUISITOS PUESTO <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO REQUISITOS PUESTO<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> '. $this->getStrEtiqueta() .'
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
                                <td align="right"><b>Laborando:&nbsp;</b></td>
                                <td align="left">                                    
                                    <select name="lsLaborando" id="lsLaborando"  class="combobox">
                                        '. $laborando->getStrListar($this->getstrLaborando()) .'
                                    </select>
                                </td>
                               <td align="right"><b>Edad Mínima</b></td>
                                <td align="left">                                    
                                    <select name="lsEdadminima" id="lsEdadminima"  class="combobox">
                                        '. $edadminima->getStrListar($this->getstrEdadminima()) .'
                                    </select>
                                </td>
                            </tr>
                            <tr class="formulariofila1">
                                <td align="right"><b>Edad Máxima</b></td>
                                <td align="left">                                    
                                    <select name="lsEdadmaxima" id="lsEdadmaxima"  class="combobox">
                                        '. $edadmaxima->getStrListar($this->getstrEdadmaxima()) .'
                                    </select>
                                </td>
                            </tr>
                            <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">TIPO DE DISCAPACIDAD</td>
                            </tr>
							<tr class="formulariofila1">
                             	<td align="left">
                                	<input type="checkbox" id="strdiscapacidad" name="strdiscapacidad[]" value="'. $this->getstrFisica().'">Discapacidad Física<br>
                               	</td>
                                	<td align="left">
                                	<input type="checkbox" id="strdiscapacidad" name="strdiscapacidad[]" value="'. $this->getstrSensorial().'">Sensorial<br>
                               	</td>
 			                </tr>
 			                <tr class="formulariofila1">
                             	<td align="left">
                                	<input type="checkbox" id="strdiscapacidad" name="strdiscapacidad[]" value="'. $this->getstrVisual().'">Sensorial Visual<br>
                               	
 			                </tr>
							<tr class="formulariofila1">
                             	<td align="left">
                                	<input type="checkbox" id="strdiscapacidad" name="strdiscapacidad[]" value="'. $this->getstrIntelectual().'">Discapacidad Intelectual<br>
                               	</td>
                                	<td align="left">
                                	<input type="checkbox" id="strdiscapacidad" name="strdiscapacidad[]" value="'. $this->getstrPsicologica().'">Discapacidad Psicológica<br>
                               	</td>
 			                </tr>	
							<tr class="formulariofila1">
                             	<td align="left">
                                	<input type="checkbox" id="strdiscapacidad" name="strdiscapacidad[]" value="'. $this->getstrPluridiscapacidad().'">Pluridiscapacidad<br>
                               	</td>
                                	<td align="left">
                                	<input type="checkbox" id="strdiscapacidad" name="strdiscapacidad[]" value="'. $this->getstrSistemas().'">Sistemas<br>
                               	</td>
 			                </tr>
							<tr class="formulariofila1">
                             	<td align="left">
                                	<input type="checkbox" id="strdiscapacidad" name="strdiscapacidad[]" value="'. $this->getstrInternos().'">Organos Internos<br>
                               	</td>
                                	<td align="left">
                                	<input type="checkbox" id="strdiscapacidad" name="strdiscapacidad[]" value="'. $this->getstrNinguna().'" onclick="marca_1()">Ninguna<br>
                               	</td>
 			                </tr>
							 <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">CONOCIMIENTOS PREVIOS</td>
                            </tr>
							<tr class="formulariofila1">
                             	<td  align="right"><b>Conocimientos Previos:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strCprevios" name="strCprevios" type="text" maxlength="50"  value="'. $this->getstrCprevios() .'" />
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
        	  //Nombre Procedimientos Almacenados
              foreach($this->getstrDiscapacidad() as $dicapacidad)
              {
              	$query = new clQuery();
            	$resultado = false; 
	            $ProcedimientoAlmacenado = sprintf("CALL spingresartrequisitosemp('%s', '%s','%s', '%s','%s', '%s');",
	            $this->getstrLaborando(),$this->getstrEdadminima(),$this->getstrEdadmaxima(),
				$dicapacidad,$this->getstrCprevios(),$this->getStrCodigo());
	            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            	
	            if($query->getStrSqlInsertUpdateDelete())
	            {
	                //Nombre Procedimientos Almacenados [Auditoria]
	                $descripcion = 'Laborando = [ '.$this->getstrLaborando().' ]  ]';
	                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'GUARDAR', 'trequisitoempresa', $descripcion);
	                $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
	                $query->getStrSqlInsertUpdateDelete();
	                $resultado = true;
	            }
            }

            return $resultado;
           
           
        }

	public function getStrActualizar() 
	{
        foreach($this->getstrDiscapacidad() as $dicapacidad)
              {	
         $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
           $ProcedimientoAlmacenado = sprintf("CALL spactualizartrequisitoemp('%s', '%s','%s', '%s','%s', '%s');",
	            $this->getStrCodigo(),$this->getstrLaborando(),$this->getstrEdadminima(),$this->getstrEdadmaxima(),
				$dicapacidad,$this->getstrCprevios());
	            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            	
	            if($query->getStrSqlInsertUpdateDelete())
	            {
	                //Nombre Procedimientos Almacenados [Auditoria]
	                $descripcion = 'Laborando = [ '.$this->getstrLaborando().' ]  ]';
	                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'ACTUALIZAR', 'trequisitoempresa', $descripcion);
	                $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
	                $query->getStrSqlInsertUpdateDelete();
	                $resultado = true;
	            }
            }

            return $resultado;
    }
 public function getStrEliminar() 
        {
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL speliminartrequisitosemp('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlInsertUpdateDelete();

           if($query->getStrSqlInsertUpdateDelete()){
                 //Nombre Procedimientos Almacenados [Auditoria]
	                $descripcion = 'Laborando = [ '.$this->getstrLaborando().' ]  ]';
	                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'ELIMINAR', 'trequisitoempresa', $descripcion);
	                $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
	                $query->getStrSqlInsertUpdateDelete();
	                $resultado = true;
            }

            return $resultado;
        }
	public function getStrBuscartremp($v) {
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $cf=$_SESSION["usuario"]["suc"];
			$me=$_SESSION["usuario"]["cuenta"];
            $ProcedimientoAlmacenado = sprintf("CALL spbidentificadortremp('%d');","$v");
			$query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
            foreach( $resultado as $rst):   
				$valor=$rst['empresa_id'];
		    endforeach;
            }
		     return $valor;
        }    
 	public function getStrBuscar() 
 		{
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbtrequisitosemp('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
                foreach( $resultado as $rst):   
	                
                    $this->setstrLaborando($rst['laborando']);
					$this->setstrEdadminima($rst['edad_minima']);
					$this->setstrEdadmaxima($rst['edad_maxima']);
					$this->setstrDiscapacidad($rst['id_tipo_discapacidad']);
					$this->setstrCprevios($rst['conocimiento_min']);
	
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
            $ProcedimientoAlmacenado = sprintf("CALL sptotaltrequisitosemp();", $this->getStrCodigo());
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
            $ProcedimientoAlmacenado = sprintf("CALL splistartrequisitosemp('%d','%d','%d');","$re", "$pa","$cf");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            REQUISITOS PUESTO<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO REQUISITOS PUESTO</legend>
                       ';
            $retval .= '
                        <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                            <tr class="tablatitulo">
                                <th colspan="14">LISTADO REQUISITOS</th>
                            </tr>
                            <tr class="tablasubtitulo">
                            	<th align="center"></th>  
                               <th align="center">ID Requisito</th>                                                              
                                <th align="center">Laborando</th>
                                <th align="center">Edad Mínima</th>
                                <th align="center">Edad Máxima</th>
                                <th align="center">Tipo Discapacidad</th>
                                <th align="center">Conocimiento Mínimo</th>
                                <th align="center" colspan="3">Acciones</th>
                             </tr>
                        ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["trequisito_id"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["laborando_descripcion"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["edad_minima"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["edad_maxima"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["tipodiscapacidad_nombre"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["conocimiento_min"] .'</td>';
					$retval .= 	'<td align="center"><div class="vtip" title="ACTUALIZAR REQUISITOS PUESTO <br> [ codigo = '.$rst["trequisito_id"] .' ]">';
                    $retval .=  '<a href="'.TREQUISITOSEMP_URL.'trequisitosemp.php?btnActualizar=Actualizar&strCodigo='. $rst["trequisito_id"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="ELIMINAR REQUISITOS PUESTO<br> [codigo = '.$rst["trequisito_id"] .' ]">';
                    $retval .=  '<a href="'.TREQUISITOSEMP_URL.'trequisitosemp.php?btnEliminar=Eliminar&strCodigo='. $rst["trequisito_id"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="DETALLE REQUISITOS PUESTO <br> [ codigo = '.$rst["trequisito_id"] .' ]">';
                    $retval .=  '<a href="'.TREQUISITOSEMP_URL.'trequisitosemp.php?btnDetalle=Detalle&strCodigo='. $rst["trequisito_id"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                    $i = 1 - $i;
                endforeach;
            }

            $paginacion->setStrNombrePagina("trequisitosemp/trequisitosemp.php");
            $retval .= '<tr><td colspan="12" align="center">'. $paginacion->getStrPaginacion() .'</td></tr>';
            $retval .= '</table>';
            $retval .= '</fieldset>';
            return $retval;
          
        }

public function getStrDetallePersona()
        {
        	$query = new clQuery();
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbdetalletrequisitosemp('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            REQUISITOS PUESTO<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO REQUISITOS PUESTO <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">DETALLE REQUISITOS PUESTO
                        </legend>
                       ';

            if( count($resultado) > 0 )
            {
                $i = 0;
				$valor=$this->getStrCodigo();
			 	$v=$this->getStrBuscartremp($valor);
                foreach( $resultado as $rst):
                    $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                    $retval .= '<tr>
                                    <td colspan="2" align="center">
                                        <a href="'. TREQUISITOSEMP_URL.'trequisitosemp.php?btnNuevo=Nuevo&strCodigo='.$v.'">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" />REGRESAR REQUISITOS PUESTO|</a>
                                    <td>
                                </tr>
                                ';
                    
                    $retval .= '<tr class="tablatitulo">
                                    <th colspan="2">DETALLE&nbsp;REQUISITOS;REGISTRADO</th>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Código Curso:</th>
                                    <td align="left">  '. $rst["trequisito_id"] .'</td>
                                </tr>
                                ';
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Laborando:</th>
                                    <td align="left">  '. $rst["laborando_descripcion"] .'</td>
                                </tr>
                                ';
                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Edad Mínima:</th>
                                    <td align="left">  '. $rst["edad_minima"] .'</td>
                                </tr>
                                ';

                    
                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Edad Mínima:</th>
                                    <td align="left">  '. $rst["edad_maxima"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Tipo Discapacidad:</th>
                                    <td align="left">  '. $rst["tipodiscapacidad_nombre"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Conocimientos Mínimos:</th>
                                    <td align="left">  '. $rst["conocimiento_min"] .'</td>
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