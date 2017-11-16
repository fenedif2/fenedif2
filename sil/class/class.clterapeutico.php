<?php	
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.validaciones.php' );
    include_once( CLASS_PATH . "class.clquery.php" );
    include_once( CLASS_PATH . "class.clpaginacion.php" );    
	include_once( CLASS_PATH . "class.clexperiencia.php" );
	class clTerapeutico
    {
        private $StrCodigo;
        private $strTratamientop;
		private $strTratamientoi;
		private $strTratamientor;	
		private $StrCual;
		private $strIndividual;
		private $StrPareja;
		private $StrFamiliar;
		private $StrGrupal;
		private $StrInstitucional;	
		private $StrRproceso;
	    private $strEtiqueta;
        private $strNombreBoton;
        private $strValorBoton;
        private $strLectura;

        public function __construct()
        {
				
            $this->StrCodigo = "";	
			$this->strTratamientop = "";
			$this->strTratamientoi = "";
            $this->strTratamientor = "";
			$this->StrCual = "";
			$this->strIndividual = "";
			$this->StrPareja = "";
			$this->StrFamiliar = "";
			$this->StrGrupal = "";
			$this->StrInstitucional = "";
			$this->StrRproceso = "";
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
       
////////////// Nombre /////////////////////
        public function getstrTratamientop()
        {
            return $this->strTratamientop;
        }
		public function setstrTratamientop($n)
        {
            $this->strTratamientop = $n;
        }
////////////// Responsable /////////////////////		
		public function getstrTratamientoi()
        {
            return $this->strTratamientoi;
        }
  		public function setstrTratamientoi($rp)
        {
            $this->strTratamientoi = $rp;
        } 
//////////// Contacto////////////////// 
		public function getstrTratamientor()
        {
            return $this->strTratamientor;
        }
  		public function setstrTratamientor($ct)
        {
            $this->strTratamientor = $ct;
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
/////////////////////Estado Civil //////////////////////////////
		public function getStrRproceso()
	        {
	            return $this->StrRproceso;
	        }

        public function setStrRproceso($t)
	        {
	            $this->StrRproceso = $t;
	        }
/////////////////////////Nº Estudiantes//////////////////////////////
		public function getStrCual()
	        {
	            return $this->strCual;
	        }

        public function setStrCual($ne)
	        {
	            $this->strCual = $ne;
	        }
////////////////////////Género/////////////////////////////////			
		public function getStrInstitucional()
	        {
	            return $this->StrInstitucional;
	        }

        public function setStrInstitucional($ned)
	        {
	            $this->StrInstitucional = $ned;
	        }
//////////////////////////////Apellido Materno////////////////////////////////////////////////////
		public function getStrPareja()
	        {
	            return $this->StrPareja;
	        }

        public function setStrPareja($cb)
	        {
	            $this->StrPareja = $cb;
	        }
////////////////////////////////Primer Nombre//////////////////////////////////////////////////////////////////////
		public function getStrFamiliar()
	        {
	            return $this->StrFamiliar;
	        }

        public function setStrFamiliar($exp)
	        {
	            $this->StrFamiliar = $exp;
	        }

////////////////////////////////Segundo Nombre //////////////////////////////////////
		public function getStrGrupal()
	        {
	            return $this->StrGrupal;
	        }

        public function setStrGrupal($ob)
	        {
	            $this->StrGrupal = $ob;
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
            $tratamientop= new clExperiencia();
			$tratamientoi= new clExperiencia();
			$tratamientor= new clExperiencia();
						
			
          $retval  = '<script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.validate.js"></script>
                        <script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.metadata.js"></script>
                       ';

            $retval .= '<br><br><br><br>
                        <script>
                            $(document).ready(function(){
                                    $.metadata.setType( \'attr\', \'validate\' );
                                    $(\'#frmterapeutico\').validate({
                                            rules:{
                                                strTratamientoi: { required: true },
                                               	strTratamientoit: { required: true}
										
												
                                                  },
                                            messages:{
                                                strTratamientoi: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
                                                strTratamientoit: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"}
                                                
												     }
                                    });
                                  
								 
                            });
                        </script>
                       ';
		  
            $retval .= '<form id="frmterapeutico" action="'.TERAPEUTICO_URL .'terapeutico.php" method="POST">';

            $Regresar = "regresar('".TERAPEUTICO_URL ."terapeutico.php')";

            $retval .= '<fieldset class="fieldsetPequeno">';
            $retval .= '<legend class="etiquetaborde">
                            Ciudadano <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Listado Ciudadano<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> '. $this->getStrEtiqueta() .'
                          </legend>
                       ';
            $NHC = "";		   
            $retval .= '
                        <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">'. $this->getStrEtiqueta() .'</td>
                            </tr>
							<tr class="formulariofila1">
                                <td align="right"><b>Usuario susceptible de tratamiento psicológico:&nbsp;</b></td>
                                	<td align="left">                                    
                                    <select name="lsTratamientop" id="lsTratamientop"  class="combobox">
                                        '. $tratamientop->getStrListar($this->getStrTratamientop()) .'
                                    </select>
                                </td>
                               <td align="right"><b>Requiere tratamiento  psicológico integral:&nbsp;</b></td>
                                	<td align="left">                                    
                                    <select name="lsTratamientoi" id="lsTratamientoi"  class="combobox">
                                        '. $tratamientoi->getStrListar($this->getstrTratamientoi()) .'
                                    </select>
                                </td>
                            </tr>
                            <tr class="formulariofila1">
                                <td align="right"><b>Requiere tratamiento interdisciplinar :&nbsp;</b></td>
                                	<td align="left">                                    
                                    <select name="lsTratamientor" id="lsTratamientor"  class="combobox">
                                        '. $tratamientor->getStrListar($this->getStrTratamientor()) .'
                                    </select>
                                </td>
                               <td  align="right"><b>¿Cuál?:</b></td>
                                	<td align="left">
                                    <textarea class="textbox" id="strCual" name="strCual" rows="4"  type="text" value="'. $this->getStrCual() .'"  /></textarea>
                                </td>
                            </tr>
                            
                        
  <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">REQUIERE INTERVENCIÓN</td>
                            </tr>
							
                           <tr class="formulariofila1">
                                 <td  align="right"><b>Individual:</b></td>
                                	<td align="left">
                                    <textarea class="textbox" id="strIndividual" name="strIndividual" rows="4"  type="text" value="'. $this->getStrIndividual() .'"  /></textarea>
                                </td>
                             	<td  align="right"><b>De pareja:</b></td>
                                <td align="left">
                                    <textarea class="textbox" id="strPareja" name="strPareja" rows="4"  type="text" value="'. $this->getStrPareja() .'"  /></textarea>
                                </td>
                            </tr>
                            <tr class="formulariofila1">
                                 <td  align="right"><b>Familiar:</b></td>
                                	<td align="left">
                                    <textarea class="textbox" id="strFamiliar" name="strFamiliar" rows="4"  type="text" value="'. $this->getStrFamiliar() .'"  /></textarea>
                                </td>
                             	<td  align="right"><b>Grupal:</b></td>
                                	<td align="left">
                                    <textarea class="textbox" id="strGrupal" name="strGrupal" rows="4"  type="text" value="'. $this->getStrGrupal() .'"  /></textarea>
                                </td>                  
                            </tr>
                            <tr class="formulariofila1">
                                 
                             	<td  align="right"><b>Institucional:</b></td>
                                	<td align="left">
                                    <textarea class="textbox" id="strInstitucional" name="strInstitucional" rows="4"  type="text" value="'. $this->getStrInstitucional() .'"  /></textarea>
                                </td>
                                <td  align="right"><b>¿Factores de riesgo en el proceso?:</b></td>
                                	<td align="left">
                                    <textarea class="textbox" id="strRproceso" name="strRproceso" rows="4"  type="text" value="'. $this->getStrRproceso() .'"  /></textarea>
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

        public function getStrIngresar() 
        {
            $query = new clQuery();
            $resultado = false;
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spingresarpsicoterapeutico('%s','%s','%s','%s','%s');",
            $this->getstrTratamientop(),$this->getstrTratamientoi(),$this->getstrTratamientor(),
            $_SESSION["usuario"]["suc"],$_SESSION["usuario"]["cuenta"]);
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Tratamientop= [ '. $this->getStrTratamientop().' ] Grupal = [ '.$this->getStrTratamientop().' ] Individual= [ '. $this->getStrTratamientop().' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s','%s','%s','%s');", $_SESSION["usuario"]["cuenta"], 'G', 'terapeutico', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL spactualizarcformativo('%s','%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s','%s','%s',
			'%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s');",
            $this->getStrCodigo(), $this->getstrTratamientop(), $this->getStrResponsable(), $this->getstrTratamientor(), $this->getStrGrupal(),
            $this->getStrRproceso(),$this->getStrCual(),$this->getStrInstitucional(), $this->getStrIndividual(),
			$this->getStrPareja(),$this->getStrFamiliar(),$this->getStrGrupal()	);
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Nombres = [ '.$this->getstrTratamientop().' ] Telefonos = [ '. $this->getStrRproceso().' ] Em@il = [ '.$this->getStrGrupal().' ] Fecha Nacimiento= [ '. $this->getStrIndividual().' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'G', 'centro_formativo', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL speliminarcformativo('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlInsertUpdateDelete();

           if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Estado_civil =['. $this->getStrRproceso().' ] Em@il = [ '.$this->getStrGrupal().' ] Fecha Nacimiento= [ '. $this->getStrIndividual().' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'G', 'centro_formativo', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL spbninos('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
            foreach( $resultado as $rst):   
		        $this->setStrCodigo($rst['id_usuario']);  
				$this->setstrTratamientop($rst['foto']);
				$this->setstrTratamientoi($rst['tipoidentificacion_id']);
				$this->setstrTratamientor($rst['identificacion']);
				$this->setStrCual($rst['num_carne']); 
				$this->setStrIndividual($rst['apellido_paterno']);
				$this->setStrPareja($rst['apellido_materno']); 
				$this->setStrFamiliar($rst['primer_nombre']);
				$this->setStrGrupal($rst['segundo_nombre']);
				$this->setStrInstitucional($rst['genero']);
				$this->setStrRproceso($rst['id_estado_civil']);
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
            $ProcedimientoAlmacenado = sprintf("CALL sptotalninos();", $sucursal);
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
            $ProcedimientoAlmacenado = sprintf("CALL splistarninos('%d','%d','%d');","$re", "$pa","$cf");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            Ciudadano<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Listado Ciudadanos</legend>
                       ';
            $retval .= '
                        <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                            <tr>
                                <td colspan="14" align="center"><div class="vtip" title="Ingreso<br> [Nuevo Ciudadano]">
                                    <a href="'.TERAPEUTICO_URL.'terapeutico.php?btnNuevo=Nuevo">| <img src="'. IMAGENES_PATH .'/rptstocksucursal.png" title="" width="16px" height="16px"  border="0" /><img src="'. IMAGENES_PATH .'/nuevo.png" title="" width="16px" height="16px"  border="0" />Nuevo Ciudadano |</a>
                                </div><td>
                            </tr>
                            <tr class="tablatitulo">
                                <th colspan="17">LISTADO&nbsp;DE&nbsp;CIUDADANOS&nbsp;REGISTRADOS</th>
                            </tr>
                            <tr class="tablasubtitulo">
                                <th align="center"> </th> 
                                <th align="center">Id</th>                                                             
                                <th align="center">Cédula</th>
                                <th align="center">Nombres y apellidos</th>
                                <th align="center">Email</th>
                                <th align="center">Fec. Ingreso</th>
                                <th align="center">Discapacidad</th>
                                <th align="center">Formación I</th>
                                <th align="center">Formación II</th>
                             
                                <th align="center">Orientación</th>
                                <th align="center">Competencias</th>
                                <th align="center">Empleo y formación</th>
                                <th align="center" colspan="3">Acciones</th>
                            </tr>
                        ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["id_usuario"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["identificacion"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["apellido_paterno"] .' '. $rst["apellido_materno"] .' '. $rst["primer_nombre"] .' '. $rst["segundo_nombre"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["email"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["fecha_ingreso"] .'</td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Discapacidad <br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. DISCAPACIDAD_URL.'discapacidad.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/accesibilidad.png" title="" width="32px" height="32px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    /*$retval .= 	'<td align="center"><div class="vtip" title="Disponibilidad Laboral<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. DISPONIBILIDADL_URL.'disponibilidadl.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/acceso.png" title="" width="32px" height="32px"  border="0" /></a>';
                    $retval .= 	'</div></td>';*/
                    $retval .= 	'</div></td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Formación I<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. FORMACION_URL.'formacion.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/rptatencionpacientemedico.png" title="" width="32px" height="32px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Formación II<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. FORMACIONII_URL.'formacionii.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/rptatencionpacientemedico.png" title="" width="32px" height="32px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					/*$retval .= 	'<td align="center"><div class="vtip" title="Datos Laborales<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. DATOSL_URL.'datosl.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/formativa.png" title="" width="32px" height="32px"  border="0" /></a>';
                    $retval .= 	'</div></td>';*/
                    $retval .= 	'</div></td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Orientacion<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. ORIENTACION_URL.'orientacion.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/rptstocksucursal.png" title="" width="32px" height="32px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Competencias<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. COMPETENCIAS_URL.'competencias.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/cursos.png" title="" width="32px" height="32px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Empleo y Formación<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. EMPLEOF_URL.'empleof.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/redactar.png" title="" width="32px" height="32px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    /*$retval .= 	'<td align="center"><div class="vtip" title="Curriculom<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. CURRICULUM_URL.'empleof.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/pdf.png" title="" width="32px" height="32px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					$retval .= 	'<td align="center"><div class="vtip" title="Test<br> [ codigo = '.$rst["id_usuario"] .' ]">';
					$retval .=  '<a href="'. TEST_URL.'test.php?btnNuevo=Nuevo&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/contactanos.png" title="" width="32px" height="32px"  border="0" /></a>';
                    $retval .= 	'</div></td>';*/
                    
					$retval .= 	'<td align="center"><div class="vtip" title="Actualizar <br> [ codigo = '.$rst["id_usuario"] .' ]">';
                    $retval .=  '<a href="'. TERAPEUTICO_URL .'terapeutico.php?btnActualizar=Actualizar&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Eliminar <br> [ codigo = '.$rst["id_usuario"] .' ]">';
                    $retval .=  '<a href="'. TERAPEUTICO_URL .'terapeutico.php?btnEliminar=Eliminar&strCodigo='. $rst["id_usuario"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= 	'<td align="center"><div class="vtip" title="Detalle Ciudadano <br> [ codigo = '.$rst["id_usuario"] .' ]">';
                    $retval .=  '<a href="'. TERAPEUTICO_URL .'terapeutico.php?btnDetalle=Detalle&strCodigo='. $rst["id_usuario"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                    $i = 1 - $i;
                endforeach;
            }

            $paginacion->setStrNombrePagina("terapeutico/terapeutico.php");
            $retval .= '<tr><td colspan="12" align="center">'. $paginacion->getStrPaginacion() .'</td></tr>';
            $retval .= '</table>';
            $retval .= '</fieldset>';
            return $retval;
        }

public function getStrDetallePersona()
        {
            $query = new clQuery();
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbdetalleninos('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            Ciudadanos<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Listado Ciudadanos<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Detalle Ciudadanos
                        </legend>
                       ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                    $retval .= '<tr>
                                    <td colspan="2" align="center">
                                        <a href="'. TERAPEUTICO_URL .'terapeutico.php">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> Regresar Listado Ciudadano|</a>
                                    <td>
                                </tr>
                                ';
                    
                    $retval .= '<tr class="tablatitulo">
                                    <th colspan="2">DETALLE&nbsp;CIUDADANO;REGISTRADO</th>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Código:</th>
                                    <td align="left">  '. $rst["id_usuario"] .'</td>
                                </tr>
                                ';
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Foto:</th>
                                    <td align="left">  '. $rst["foto"] .'</td>
                                </tr>
                                ';            
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Tipo de Identificación:</th>
                                    <td align="left">  '. $rst["tipoidentificacion_nombre"] .':   '. $rst["identificacion"] .'</td>
                                </tr>
                                ';
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">N° Carné:</th>
                                    <td align="left">  '. $rst["num_carne"] .'</td>
                                </tr>
                                ';  
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Nombres y Apellidos:</th>
                                    <td align="left">  '. $rst["apellido_paterno"] .' '. $rst["apellido_materno"] .' '. $rst["primer_nombre"] .' '. $rst["segundo_nombre"] .'</td>
                                </tr>
                                ';  			
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Género:</th>
                                    <td align="left">  '. $rst["genero_nombre"] .'</td>
                                </tr>
                                ';  
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Estado Civil:</th>
                                    <td align="left">  '. $rst["estadocivil_nombre"] .'</td>
                                </tr>
                                ';  	
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Fecha Nacimiento:</th>
                                    <td align="left">  '. $rst["fecha_nac"] .'</td>
                                </tr>
                                ';  	
					 
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Forma de Conocer:</th>
                                    <td align="left">  '. $rst["formaconocer_nombre"] .'</td>
                                </tr>
                                ';  	
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Estado:</th>
                                    <td align="left">  '. $rst["estcfdescripcion"] .'</td>
                                </tr>
                                ';  	
					
						
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Fecha de Ingreso:</th>
                                    <td align="left">  '. $rst["fecha_ingreso"] .'</td>
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
