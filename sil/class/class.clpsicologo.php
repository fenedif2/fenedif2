<?php	
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.validaciones.php' );
    include_once( CLASS_PATH . "class.clquery.php" );
    include_once( CLASS_PATH . "class.clpaginacion.php" );    
	include_once( CLASS_PATH . "class.clgenero.php" );
	include_once( CLASS_PATH . "class.clecivil.php" );
	include_once( CLASS_PATH . "class.cltfnecesaria.php" ); 
	include_once( CLASS_PATH . "class.cltusuario.php" );
    class clPsicologo
    {
        private $StrCodigo;
        private $strFechai;
       	private $strResponsable;	 
		private $strCargo;
		private $StrFechae;
		private $StrLevaluacion;
		private $StrSolicitado;
		private $StrNombresape;
		private $StrFechan;
		private $strpc;
		private $StrLnacimiento;
		private $StrDireccion;
		private $strEc;
		private $StrEm;
		private $StrGenero;
		private $StrEcivil;
		private $strTfnecesaria;
		private $StrOcupacion;
		private $strFechaIngreso;
		private $strCelular;	
		private $strConvencional;
		private $strMconsulta;
		private $strRentrevista;
		private $strRaplicados;
		private $strReactivosa;
		private $strDintegral;
		private $strConcluciones;
		private $strRecomendaciones;
		
		private $strEtiqueta;
        private $strNombreBoton;
        private $strValorBoton;
        private $strLectura;

        public function __construct()
        {
				
            $this->StrCodigo = "";	
			$this->strFechai = "";
            $this->strResponsable = "";
			$this->StrFechae = "";
			$this->StrLevaluacion = "";
			$this->StrSolicitado = "";
			$this->StrNombresape = "";
			$this->StrFechan = "";
			$this->strpc = "";
			$this->StrLnacimiento = "";
			$this->StrDireccion = "";
			$this->strEc = "";
			$this->StrEm = "";
			$this->StrGenero = "";
			$this->StrEcivil = "";
			$this->strTfnecesaria = ""; 	
			$this->StrOcupacion = "";
			$this->strFechaIngreso = "";
			$this->strCelular = "";
			$this->strConvencional= "";
			$this->strMconsulta= "";
			$this->strRentrevista= "";
			$this->strRaplicados= "";
			$this->strReactivosa= "";
			$this->strDintegral= "";
			$this->strConcluciones= "";
			$this->strRecomendaciones= "";
			
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
 ////////////// Tipo Formacion  /////////////////////
        public function getStrTfnecesaria()
        {
            return $this->strTfnecesaria;
        }
		public function setStrTfnecesaria($tf)
        {
            $this->strTfnecesaria = $tf;
        }               
////////////// Nombre /////////////////////
        public function getstrFechai()
        {
            return $this->strFechai;
        }
		public function setstrFechai($n)
        {
            $this->strFechai = $n;
        }
////////////// Responsable /////////////////////		
		public function getstrResponsable()
        {
            return $this->strResponsable;
        }
  		public function setstrResponsable($rp)
        {
            $this->strResponsable = $rp;
        } 
//////////// Contacto////////////////// 
		public function getstrCargo()
        {
            return $this->strCargo;
        }
  		public function setstrCargo($ct)
        {
            $this->strCargo = $ct;
        } 
		    
/////////////////////////Ec  //////////////////////////
 	public function getStrEc()
        {
            return $this->strEc;
        }

        public function setStrEc($et)
        {
            $this->strEc = $et;
        }

			
/////////////////////////Numero de hijos //////////////////////////
 	public function getStrLnacimiento()
        {
            return $this->strLnacimiento;
        }

        public function setStrLnacimiento($et)
        {
            $this->strLnacimiento = $et;
        }	
/////////////////////////Forma de conocer//////////////////////////
 	public function getStrDireccion()
        {
            return $this->strDireccion;
        }
    public function setStrDireccion($et)
        {
            $this->strDireccion= $et;
        }	


				
/////////////////////////T seguro//////////////////////////
 	public function getStrEm()
        {
            return $this->strEm;
        }

        public function setStrEm($et)
        {
            $this->strEm= $et;
        }
/////////////////////////Tipo seguro//////////////////////////
 	public function getStrOcupacion()
        {
            return $this->strOcupacion;
        }

        public function setStrOcupacion($et)
        {
            $this->strOcupacion= $et;
        }	

	
/////////////////////////Fecha Ingreso//////////////////////////
 	public function getStrFechaIngreso()
        {
            return $this->strFechaIngreso;
        }

        public function setStrFechaIngreso($et)
        {
            $this->strFechaIngreso= $et;
        }									

/////////////////////Estado Civil //////////////////////////////
		public function getStrEcivil()
	        {
	            return $this->StrEcivil;
	        }

        public function setStrEcivil($t)
	        {
	            $this->StrEcivil = $t;
	        }
/////////////////////////Nº Estudiantes//////////////////////////////
		public function getStrFechae()
	        {
	            return $this->StrFechae;
	        }

        public function setStrFechae($ne)
	        {
	            $this->StrFechae = $ne;
	        }
////////////////////////Género/////////////////////////////////			
		public function getStrGenero()
	        {
	            return $this->StrGenero;
	        }

        public function setStrGenero($ned)
	        {
	            $this->StrGenero = $ned;
	        }
//////////////////////////////Apellido Paterno//////////////////////////////////////////////////////	
		public function getStrLevaluacion()
	        {
	            return $this->StrLevaluacion;
	        }

        public function setStrLevaluacion($tcf)
	        {
	            $this->StrLevaluacion = $tcf;
	        }
//////////////////////////////Apellido Materno////////////////////////////////////////////////////
		public function getStrSolicitado()
	        {
	            return $this->StrSolicitado;
	        }

        public function setStrSolicitado($cb)
	        {
	            $this->StrSolicitado = $cb;
	        }
////////////////////////////////Primer Nombre//////////////////////////////////////////////////////////////////////
		public function getStrNombresape()
	        {
	            return $this->StrNombresape;
	        }

        public function setStrNombresape($exp)
	        {
	            $this->StrNombresape = $exp;
	        }

////////////////////////////////Segundo Nombre //////////////////////////////////////
		public function getStrFechan()
	        {
	            return $this->StrFechan;
	        }

        public function setStrFechan($ob)
	        {
	            $this->StrFechan = $ob;
	        }
//////////////////////////Fecha Ingreso //////////////////////////////////////////
public function getStrpc()
        {
            return $this->strpc;
        }

        public function setStrpc($fn)
        {
            $this->strpc = $fn;
        }

					
 
///////////////////////////// Celular ////////////////////////////////////
        public function getStrCelular()
        {
            return $this->strCelular;
        }

        public function setStrCelular($p)
        {
            $this->strCelular = $p;
        }
 
 /////////////////////////Calle principal ////////////////////////////////////////////////////
         public function getStrConvencional()
        {
            return $this->strConvencional;
        }

        public function setStrConvencional($cp)
        {
            $this->strConvencional= $cp;
        }
 /////////////////////////Mconsulta ////////////////////////////////////////////////////		
         public function getStrMconsulta()
        {
            return $this->strMconsulta;
        }

        public function setStrMconsulta($cp)
        {
            $this->strMconsulta= $cp;
        }
	/////////////////////Rentrevista //////////////////////////////////////////////////
	     public function getStrRentrevista()
        {
            return $this->strRentrevista;
        }

        public function setStrRentrevista($cp)
        {
            $this->strRentrevista= $cp;
        }
	/////////////////////Raplicados//////////////////////////////////////////////////
		public function getStrRaplicados()
        {
            return $this->strRaplicados;
        }

        public function setStrRaplicados($cp)
        {
            $this->strRaplicados= $cp;
        }
	
	/////////////////////Reactivosa //////////////////////////////////////////////////
		public function getStrReactivosa()
        {
            return $this->strReactivosa;
        }

        public function setStrReactivosa($cp)
        {
            $this->strReactivosa= $cp;
        }
		
	
	/////////////////////Dintegral //////////////////////////////////////////////////
		public function getStrDintegral()
        {
            return $this->strDintegral;
        }

        public function setStrDintegral($cp)
        {
            $this->strDintegral= $cp;
        }
		
//////////////////////////////Concluciones//////////////////////////////////////////////////////////
		public function getStrConcluciones()
        {
            return $this->strConcluciones;
        }

        public function setStrConcluciones($cp)
        {
            $this->strConcluciones= $cp;
        }
		

///////////////////////////////Recomendaciones////////////////////////////////////////////////////////////
		public function getStrRecomendaciones()
        {
            return $this->strRecomendaciones;
        }

        public function setStrRecomendaciones($cp)
        {
            $this->strRecomendaciones= $cp;
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
            $genero= new clGenero();
			$ecivil= new clEcivil();
			$tfnecesaria = new clTfnecesaria();	
			$nombreapellido = new clTusuario();
			
          $retval  = '<script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.validate.js"></script>
                        <script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.metadata.js"></script>
                       ';

            $retval .= '<br><br><br><br>
                        <script>
                            $(document).ready(function(){
                                    $.metadata.setType( \'attr\', \'validate\' );
                                    $(\'#frmpsicologo\').validate({
                                            rules:{
                                                strResponsable: { required: true },
                                               	strCargo: { required: true} 	
												
											
                                                  },
                                            messages:{
                                                strResponsable: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
                                                strCargo: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"}
                                               
												
												     }
                                    });
				 
                            });
                        </script>
                       ';
		  
            $retval .= '<form id="frmpsicologo" action="'. PSICOLOGO_URL .'psicologo.php" method="POST">';

            $Regresar = "regresar('".PSICOLOGO_URL . "psicologo.php')";

            $retval .= '<fieldset class="fieldsetPequeno">';
            $retval .= '<legend class="etiquetaborde">
                            PSICOLOGÍA <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO ATENCIONES PSICOLÓGICAS<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> '. $this->getStrEtiqueta() .'
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
                              <td  align="right"><b>Fecha Nacimiento&nbsp:</b></td>
                                <td align="left">
                                    <input name="dtFechai" type="text" id="dtFechai" value="'. $this->getStrFechai() .'" size="10" readonly="readonly" class="textboxfecha" />
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
                                <td  align="right"><b>Responsable:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="StrResponsable" name="StrResponsable" type="text" maxlength="50" value="'. $this->getstrResponsable() .'" />
                                </td>  
                            </tr>
                            <tr class="formulariofila1">
                            	<td  align="right"><b>Cargo:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="StrCargo" name="StrCargo" type="text" maxlength="50" value="'. $this->getstrCargo() .'" />
                                </td>  
                              <td  align="right"><b>Fecha&nbsp Evaluación:</b></td>
                                <td align="left">
                                    <input name="dtFechae" type="text" id="dtFechae" value="'. $this->getStrFechae() .'" size="10" readonly="readonly" class="textboxfecha" />
                                    <a href="#">
                                        <img src="'. IMAGENES_PATH .'/calendario.png" title="Calendario" name="strFechae" id="strFechae" width="16px" height="16px" style="border: 0px none;">
                                    </a>
                                    <script type="text/javascript">
                                        Calendar.setup({
                                                         inputField: "dtFechae",
                                                         ifFormat: "%Y-%m-%d",
                                                         button: "strFechae"
                                                         });
                                    </script>
                                </td>
                                
                            </tr>
                            <tr class="formulariofila1">
                            	<td  align="right"><b>Lugar Evaluación:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="StrLevaluacion" name="StrLevaluacion" type="text" maxlength="50" value="'. $this->getStrLevaluacion() .'" />
                                </td>  
                              	<td  align="right"><b>Solicitado Por:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="StrSolicitado" name="StrSolicitado" type="text" maxlength="50" value="'. $this->getStrSolicitado() .'" />
                                </td>  
                            </tr>
                            <tr class="formulariofila1">
                            	<td align="right"><b>Nombres y apellidos:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="StrNombresape" id="StrNombresape"  class="combobox">
	                                        '. $nombreapellido->getStrListar($this->getStrNombresape()) .'
	                                    </select>
                                </td> 
							     <td  align="right"><b>P/C:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="StrPc" name="StrPc" type="text" maxlength="50" value="'. $this->getStrpc() .'" />
                                </td>    
                               
                            </tr>
                            
                           <tr class="formulariofila1">
                                <td  align="right"><b>Lugar de Nacimiento:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="StrLnacimiento" name="StrLnacimiento" type="text" maxlength="50" value="'. $this->getStrLnacimiento() .'" />
                                </td>
                               
                            </tr> 
                            <tr class="formulariofila1">
                                <td  align="right"><b>EC:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="StrEc" name="StrEc" type="text" maxlength="50" value="'. $this->getStrEc() .'" />
                                </td>
                               <td  align="right"><b>EM:</b></td>
                                	<td align="left">
                                    <input class="textbox" id="StrEm" name="StrEm" type="text" maxlength="50" value="'. $this->getStrEm() .'" />
                                </td>
                            </tr> 
                            
                           <tr class="formulariofila1">
                            	<td align="right"><b>Nivel de Instrucción:&nbsp;</b></td>
                                <td align="left">                                    
                                    <select name="lsTfnecesaria" id="lsTfnecesaria"  class="combobox">
                                        '. $tfnecesaria->getStrListar($this->getStrTfnecesaria()) .'
                                    </select>
                                </td>
                                <td  align="right"><b>Ocupación:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strOcupacion" name="strOcupacion" type="text" maxlength="100" value="'. $this->getStrOcupacion().'" />
                                </td>
                           </tr>
                          
                           <tr class="formulariofila1">
                            	<td  align="right"><b>Fecha&nbsp;Ingreso:</b></td>
                                <td align="left">
                                    <input name="dtFechaIngreso" type="text" id="dtFechaIngreso" value="'. $this->getStrFechaIngreso() .'" size="10" readonly="readonly" class="textboxfecha" />
                                    <a href="#">
                                        <img src="'. IMAGENES_PATH .'/calendario.png" title="Calendario" name="strFechaIngreso" id="strFechaIngreso" width="16px" height="16px" style="border: 0px none;">
                                    </a>
                                    <script type="text/javascript">
                                        Calendar.setup({
                                                         inputField: "dtFechaIngreso",
                                                         ifFormat: "%Y-%m-%d",
                                                         button: "strFechaIngreso"
                                                         });
                                    </script>
                                </td>
                               
                           </tr>  
							
                           

  <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">CONSULTA</td>
                            </tr>
							
                           <tr class="formulariofila1">
                                 <td  align="right"><b>Motivo de Consulta:</b></td>
                                	<td align="left">
                                    <textarea class="textbox" id="strMconsulta" name="strMconsulta" rows="4"  type="text" value="'. $this->getStrMconsulta() .'"  />'. $this->getStrMconsulta() .'</textarea>
                                </td>
                             	<td  align="right"><b>Resultados de Entrevista:</b></td>
                                <td align="left">
                                    <textarea class="textbox" id="strRentrevista" rows="4" name="strRentrevista" type="text"   value="'. $this->getStrRentrevista() .'" />'. $this->getStrRentrevista() .'</textarea>
                                </td>
                            </tr>
                            <tr class="formulariofila1">
                                 <td  align="right"><b>Reactivos Aplicados:</b></td>
                                	<td align="left">
                                    <textarea class="textbox" id="strRaplicados" rows="4" name="strRaplicados" type="text" value="'. $this->getStrRaplicados() .'" />'. $this->getStrRaplicados() .'</textarea>
                                </td>
                             	                      
                            </tr>
                            <tr class="formulariofila1">
                                 <td  align="right"><b>Resultados de reactivos aplicados:</b></td>
                                	<td align="left">
                                    <textarea class="textbox" id="strReactivosa" rows="4" name="strReactivosa" type="text" value="'. $this->getStrReactivosa() .'" />'. $this->getStrReactivosa() .'</textarea>
                                </td>
                             	<td  align="right"><b>Descripción Diagnóstica Integral:</b></td>
                                <td align="left">
                                    <textarea class="textbox" id="strDintegral" rows="4" name="strDintegral" type="text" value="'. $this->getStrDintegral() .'" />'. $this->getStrDintegral() .'</textarea>
                                </td>
                            </tr>
                            <tr class="formulariofila1">
                                 <td  align="right"><b>Conclusiones:</b></td>
                                	<td align="left">
                                    <textarea class="textbox" id="strConcluciones" rows="4" name="strConcluciones" type="text" value="'. $this->getStrConcluciones() .'" />'. $this->getStrConcluciones() .'</textarea>
                                </td>
                             	<td  align="right"><b>Recomendaciones:</b></td>
                                <td align="left">
                                    <textarea class="textbox" id="strRecomendaciones" rows="4" name="strRecomendaciones" type="text" value="'. $this->getStrRecomendaciones() .'" />'. $this->getStrRecomendaciones() .'</textarea>
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
            $ProcedimientoAlmacenado = sprintf("CALL spingresarpsicologo('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s',
            '%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s');",
            $this->getstrFechai(), $this->getstrResponsable(), $this->getstrCargo(), $this->getStrFechae(), $this->getStrLevaluacion(),
            $this->getStrSolicitado(),$this->getStrNombresape(),$this->getStrpc(),$this->getStrLnacimiento(),
            $this->getStrEc(),$this->getStrEm(),
            $this->getStrTfnecesaria(),$this->getStrOcupacion(),$this->getStrFechaIngreso(),
            $this->getStrMconsulta(),$this->getStrRentrevista(),$this->getStrRaplicados(),$this->getStrReactivosa(), $this->getStrDintegral(),
            $this->getStrConcluciones(),$this->getStrRecomendaciones(),$_SESSION["usuario"]["suc"],$_SESSION["usuario"]["cuenta"]);
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Responsable= [ '. $this->getstrResponsable().' ] Em@il = [ '.$this->getStrFechae().' ] Solicitado= [ '. $this->getStrSolicitado().' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s','%s','%s','%s');", $_SESSION["usuario"]["cuenta"], 'GUARDAR', 'apsicologicas', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL spactualizarpsicologo('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s',
            '%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s');",
            $this->getStrCodigo(),$this->getstrFechai(), $this->getstrResponsable(), $this->getstrCargo(), $this->getStrFechae(), $this->getStrLevaluacion(),
            $this->getStrSolicitado(),$this->getStrNombresape(),$this->getStrpc(),$this->getStrLnacimiento(),
            $this->getStrEc(),$this->getStrEm(),
            $this->getStrTfnecesaria(),$this->getStrOcupacion(),$this->getStrFechaIngreso(),
            $this->getStrMconsulta(),$this->getStrRentrevista(),$this->getStrRaplicados(),$this->getStrReactivosa(), $this->getStrDintegral(),
            $this->getStrConcluciones(),$this->getStrRecomendaciones());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Nombres = [ '.$this->getstrFechai().' ] Telefonos = [ '. $this->getStrEcivil().' ] Em@il = [ '.$this->getStrFechae().' ] Fecha Nacimiento= [ '. $this->getStrpc().' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'ACTUALIZAR', 'apsicologicas', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL speliminarpsicologo('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlInsertUpdateDelete();

           if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Estado_civil =['. $this->getStrEcivil().' ] Em@il = [ '.$this->getStrFechae().' ] Fecha Nacimiento= [ '. $this->getStrpc().' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'ELIMINAR', 'apsicologicas', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL spbpsicologo('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
            foreach( $resultado as $rst):   
		    //$this->setStrCodigo($rst['id_usuario']);  
			$this->setstrFechai($rst['fechai']);
			$this->setstrResponsable($rst['responsable']);
			$this->setstrCargo($rst['cargo']);
			$this->setStrFechae($rst['fechae']); 
			$this->setStrLevaluacion($rst['levaluacion']);
			$this->setStrSolicitado($rst['solicitado']); 
			$this->setStrNombresape($rst['nombres']);
			$this->setStrFechan($rst['fechan']);
			$this->setStrpc($rst['pc']);
			$this->setStrLnacimiento($rst['lnacimiento']);
			$this->setStrDireccion($rst['direccion']);
			$this->setStrEc($rst['ec']);
			$this->setStrEm($rst['em']);
			$this->setStrGenero($rst['genero_id']);
			$this->setStrEcivil($rst['estadoc_id']);
			$this->setStrTfnecesaria($rst['ninstruccion_id']);
			$this->setStrOcupacion($rst['ocupacion']);
			$this->setStrFechaIngreso($rst['fechaing']);
			$this->setStrCelular($rst['celular']);
			$this->setStrConvencional($rst['convencional']);
			$this->setStrMconsulta($rst['mconsulta']);
			$this->setStrRentrevista($rst['rentrevista']);
			$this->setStrRaplicados($rst['raplicados']);
			$this->setStrReactivosa($rst['reactivosa']);
			$this->setStrDintegral($rst['dintegral']);
			$this->setStrConcluciones($rst['concluciones']);
			$this->setStrRecomendaciones($rst['recomendaciones']);
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
			$ProcedimientoAlmacenado = sprintf("CALL sptotalpsicologo('%d');", $sucursal);
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
			$ProcedimientoAlmacenado = sprintf("CALL splistarpsicologo('%d','%d','%d');","$re", "$pa","$cf");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            PSICOLOGÍA<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO PSICOLOGÍA</legend>
                       ';
            $retval .= '
                        <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                            <tr>
                                <td colspan="17" align="center"><div class="vtip" title="Ingreso<br> [NUEVO PSICOLOGÍA]">
                                    <a href="'.PSICOLOGO_URL.'psicologo.php?btnNuevo=Nuevo">| <img src="'. IMAGENES_PATH .'/rptstocksucursal.png" title="" width="16px" height="16px"  border="0" /><img src="'. IMAGENES_PATH .'/nuevo.png" title="" width="16px" height="16px"  border="0" />NUEVA PSICOLOGÍA |</a>
                                </div><td>
                            </tr>
                            <tr class="tablatitulo">
                                <th colspan="17">LISTADO&nbsp;DE&nbsp;ATENCIONES PSICOLÓGICAS&nbsp;REGISTRADAS</th>
                            </tr>
                            <tr class="tablasubtitulo">
                                <th align="center"> </th> 
                                <th align="center">Id</th>                                                             
                                <th align="center">Fecha</th>
                                <th align="center">Responsable</th>
                                <th align="center">Cargo</th>
                                <th align="center">Fecha  Evaluación</th>
                                <th align="center">Lugar Evaluación</th>
                                <th align="center">Solicitado Por</th>
                                <th align="center">Nombres y apellidos</th>
                                <th align="center">P/C</th>
                                
                                <th align="center" colspan="3">Acciones</th>
                            </tr>
                        ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["apsicologicas_id"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["fechai"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["responsable"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["cargo"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["fechae"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["levaluacion"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["solicitado"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["primer_nombre"] .' '. $rst["segundo_nombre"] .' '. $rst["apellido_paterno"] .' '. $rst["apellido_materno"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["pc"] .'</td>';
					
					$retval .= 	'<td align="center"><div class="vtip" title="Actualizar <br> [ codigo = '.$rst["apsicologicas_id"] .' ]">';
                    $retval .=  '<a href="'. PSICOLOGO_URL .'psicologo.php?btnActualizar=Actualizar&strCodigo='. $rst["apsicologicas_id"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					if($_SESSION["usuario"]["tipo"]==2 || $_SESSION["usuario"]["tipo"]==1 )
							{
                    $retval .= 	'<td align="center"><div class="vtip" title="Eliminar <br> [ codigo = '.$rst["apsicologicas_id"] .' ]">';
                    $retval .=  '<a href="'. PSICOLOGO_URL .'psicologo.php?btnEliminar=Eliminar&strCodigo='. $rst["apsicologicas_id"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    		}
                    $retval .= 	'<td align="center"><div class="vtip" title="Detalle Atención Psicológica <br> [ codigo = '.$rst["apsicologicas_id"] .' ]">';
                    $retval .=  '<a href="'. PSICOLOGO_URL .'psicologo.php?btnDetalle=Detalle&strCodigo='. $rst["apsicologicas_id"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                    $i = 1 - $i;
                endforeach;
            }

            $paginacion->setStrNombrePagina("psicologo/psicologo.php");
            $retval .= '<tr><td colspan="12" align="center">'. $paginacion->getStrPaginacion() .'</td></tr>';
            $retval .= '</table>';
            $retval .= '</fieldset>';
            return $retval;
        }

public function getStrDetallePersona()
        {
            $query = new clQuery();
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbdetallepsicologo('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            PSICOLOGÍA<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO ATENCIONES PSICOLÓGICAS<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">DETALLE ATENCIONES PSICOLÓGICAS
                        </legend>
                       ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                    $retval .= '<tr>
                                    <td colspan="2" align="center">
                                        <a href="'. PSICOLOGO_URL .'psicologo.php">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> REGRESAR LISTADO ATENCIONES PSICOLÓGICAS|</a>
                                    <td>
                                </tr>
                                ';
                    
                    $retval .= '<tr class="tablatitulo">
                                    <th colspan="2">DETALLE&nbsp;ATENCIÓN PSICOLÓGICA;REGISTRADO</th>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Código:</th>
                                    <td align="left">  '. $rst["apsicologicas_id"] .'</td>
                                </tr>
                                ';
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Fecha:</th>
                                    <td align="left">  '. $rst["fechai"] .'</td>
                                </tr>
                                ';            
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Responsable:</th>
                                    <td align="left">  '. $rst["responsable"] .'</td>
                                </tr>
                                ';
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Cargo:</th>
                                    <td align="left">  '. $rst["cargo"] .'</td>
                                </tr>
                                ';  
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Fecha  Evaluación:</th>
                                    <td align="left">  '. $rst["fechae"] .'</td>
                                </tr>
                                ';  			
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Lugar Evaluación:</th>
                                    <td align="left">  '. $rst["levaluacion"] .'</td>
                                </tr>
                                ';  
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Solicitado Por:</th>
                                    <td align="left">  '. $rst["solicitado"] .'</td>
                                </tr>
                                ';  	
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Nombres y apellidos:</th>
                                    <td align="left">  '. $rst["primer_nombre"] .' '. $rst["segundo_nombre"] .' '. $rst["apellido_paterno"] .' '. $rst["apellido_materno"] .'</td>
                                </tr>
                                ';  	
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Fecha Nacimiento:</th>
                                    <td align="left">  '. $rst["fechan"] .'</td>
                                </tr>
                                ';  
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">P/C:</th>
                                    <td align="left">  '. $rst["pc"] .'</td>
                                </tr>
                                ';  	
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Lugar de Nacimiento:</th>
                                    <td align="left">  '. $rst["lnacimiento"] .'</td>
                                </tr>
                                ';  	
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Dirección Domiciliaria:</th>
                                    <td align="left">  '. $rst["direccion"] .'</td>
                                </tr>
                                ';  	
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">EC:</th>
                                    <td align="left">  '. $rst["ec"] .'</td>
                                </tr>
                                ';  	
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">EM:</th>
                                    <td align="left">  '. $rst["em"] .'</td>
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
                                    <th align="right" class="bienvenida">Nivel de Instrucción:</th>
                                    <td align="left">  '. $rst["instruccion_nombre"] .'</td>
                                </tr>
                                '; 		
				$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Ocupación:</th>
                                    <td align="left">  '. $rst["ocupacion"] .'</td>
                                </tr>
                                '; 	
				$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Fecha Ingreso:</th>
                                    <td align="left">  '. $rst["fechaing"] .'</td>
                                </tr>
                                '; 	
				$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Celular:</th>
                                    <td align="left">  '. $rst["celular"] .'</td>
                                </tr>
                                '; 	
               $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Convencional:</th>
                                    <td align="left">  '. $rst["convencional"] .'</td>
                                </tr>
                                '; 		                 				
                 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Motivo de Consulta:</th>
                                    <td align="left">  '. $rst["mconsulta"] .'</td>
                                </tr>
                                '; 	      
				 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Resultados de Entrevista:</th>
                                    <td align="left">  '. $rst["rentrevista"] .'</td>
                                </tr>
                                '; 	   
				  $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Reactivos Aplicados:</th>
                                    <td align="left">  '. $rst["raplicados"] .'</td>
                                </tr>
                                '; 
				$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Resultados de reactivos aplicados:</th>
                                    <td align="left">  '. $rst["reactivosa"] .'</td>
                                </tr>
                                '; 
				$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Descripción Diagnóstica Integral:</th>
                                    <td align="left">  '. $rst["dintegral"] .'</td>
                                </tr>
                                '; 
				$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Conclusiones:</th>
                                    <td align="left">  '. $rst["concluciones"] .'</td>
                                </tr>
                                ';
                 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Recomendaciones:</th>
                                    <td align="left">  '. $rst["recomendaciones"] .'</td>
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
