<?php	
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.validaciones.php' );
    include_once( CLASS_PATH . "class.clquery.php" );
    include_once( CLASS_PATH . "class.clpaginacion.php" );    
	include_once( CLASS_PATH . "class.cltusuario.php" ); 
	class clVfamiliares
    {
        private $strCodigo;
        private $strNapellidos;
        private $strVisitaa;
		private $strVisitab;
		private $strVisitac;	
		private $strVisitamf;
		private $strLlegada;	
		private $strSalida;
	 	private $strTiempov;
		private $strFechaNacimiento;
		private $strObjetivov;
		private $strVisitanh;
		private $strVarones;	 
		private $strVaronesn;
		private $strVaronesp;
		private $strMujeres;
		private $strMujeresn;
		private $strMujeresp;
		private $strPadre;
		private $strMadre;
		private $strHijosc;
		private $strOtrosq;
		private $strDirecciond;
		private $strZona;
		
		
		
        private $strEtiqueta;
        private $strNombreBoton;
        private $strValorBoton;
        private $strLectura;

        public function __construct()
        {
				
            $this->StrCodigo = "";	
			$this->strNapellidos = "";
			$this->strVisitaa = "V1";
            $this->strVisitab = "V2";
			$this->strVisitac = "V3";
			$this->strVisitamf = "";
			$this->StrLlegada = "";
			$this->StrSalida = "";
			$this->StrTiempov = "";
			$this->strFechaNacimiento = "";
			$this->strObjetivov = "";
			$this->strVisitanh = "";
			$this->strVarones = "";
			$this->strVaronesn = "-18";
			$this->strVaronesp = "+18";	
			$this->strMujeres = "";
			$this->strMujeresn = "-18";
			$this->strMujeresp = "+18";
							
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
        public function getstrNapellidos()
        {
            return $this->strNapellidos;
        }
		public function setstrNapellidos($n)
        {
            $this->strNapellidos = $n;
        }
//////////////Visitaa /////////////////////		
		public function getstrVisitaa()
        {
            return $this->strVisitaa;
        }
  		public function setstrVisitaa($rp)
        {
            $this->strVisitaa = $rp;
        } 
////////////Visitab////////////////// 
		public function getstrVisitab()
        {
            return $this->strVisitab;
        }
  		public function setstrVisitab($ct)
        {
            $this->strVisitab = $ct;
        } 
/////////////////////////////////// Asociacion////////////////// 
		public function getStrAsociacion()
        {
            return $this->strAsociacion;
        }
  		public function setStrAsociacion($ct)
        {
            $this->strAsociacion = $ct;
        }   		    
/////////////////////////Visitac  //////////////////////////
 	public function getStrVisitac()
        {
            return $this->strVisitac;
        }

        public function setStrVisitac($et)
        {
            $this->strVisitac = $et;
        }
/////////////////////////Tfederacion //////////////////////////
 	public function getStrTfederacion()
        {
            return $this->strTfederacion;
        }

        public function setStrTfederacion($et)
        {
            $this->strTfederacion = $et;
        }		
/////////////////////////Tipo federacion //////////////////////////
 	public function getStrTipofederacion()
        {
            return $this->strTipofederacion;
        }

        public function setStrTipofederacion($et)
        {
            $this->strTipofederacion = $et;
        }				
/////////////////////////Varonesp //////////////////////////
 	public function getStrVaronesp()
        {
            return $this->strVaronesp;
        }

        public function setStrVaronesp($et)
        {
            $this->strVaronesp = $et;
        }	
/////////////////////////Mujeres//////////////////////////
 	public function getStrMujeres()
        {
            return $this->strMujeres;
        }

        public function setStrMujeres($et)
        {
            $this->strMujeres= $et;
        }	
/////////////////////////Direcciond//////////////////////////
 	public function getStrDirecciond()
        {
            return $this->strDirecciond;
        }

        public function setStrDirecciond($et)
        {
            $this->strDirecciond= $et;
        }	
/////////////////////////Zona//////////////////////////
 	public function getStrZona()
        {
            return $this->strZona;
        }

        public function setStrZona($et)
        {
            $this->strZona= $et;
        }	

/////////////////////////Mujeresn//////////////////////////
 	public function getStrMujeresn()
        {
            return $this->strMujeresn;
        }

        public function setStrMujeresn($et)
        {
            $this->strMujeresn= $et;
        }
/////////////////////////Mujeresp/////////////////////////
 	public function getStrMujeresp()
        {
            return $this->strMujeresp;
        }

        public function setStrMujeresp($et)
        {
            $this->strMujeresp= $et;
        }	
/////////////////////////Hijosc//////////////////////////
 	public function getStrHijosc()
        {
            return $this->strHijosc;
        }

        public function setStrHijosc($et)
        {
            $this->strHijosc= $et;
        }	
////////////////////////Otrosq//////////////////////////
 	public function getStrOtrosq()
        {
            return $this->strOtrosq;
        }

        public function setStrOtrosq($et)
        {
            $this->strOtrosq= $et;
        }			
								
/////////////////////Visitamf ///////////////////////
        public function getStrVisitamf()
        {
            return $this->strVisitamf;
        }

        public function setStrVisitamf($e)
        {
            $this->strVisitamf = $e;
        }
/////////////////////Llegada //////////////////////////////
		public function getStrLlegada()
	        {
	            return $this->strLlegada;
	        }

        public function setStrLlegada($t)
	        {
	            $this->strLlegada = $t;
	        }
/////////////////////////Salida//////////////////////////////
		public function getStrSalida()
	        {
	            return $this->strSalida;
	        }

        public function setStrSalida($ne)
	        {
	            $this->strSalida = $ne;
	        }
////////////////////////Tiempov////////////////////////////////			
		public function getStrTiempov()
	        {
	            return $this->strTiempov;
	        }

        public function setStrTiempov($ned)
	        {
	            $this->strTiempov = $ned;
	        }
//////////////////////////////Objetivov//////////////////////////////////////////////////////	
		public function getStrObjetivov()
	        {
	            return $this->strObjetivov;
	        }

        public function setStrObjetivov($tcf)
	        {
	            $this->strObjetivov = $tcf;
	        }
//////////////////////////////Visitanh///////////////////////////////////////////////////
		public function getStrVisitanh()
	        {
	            return $this->strVisitanh;
	        }

        public function setStrVisitanh($cb)
	        {
	            $this->strVisitanh = $cb;
	        }
////////////////////////////////Varones//////////////////////////////////////////////////////////////////////
		public function getStrVarones()
	        {
	            return $this->strVarones;
	        }

        public function setStrVarones($exp)
	        {
	            $this->strVarones = $exp;
	        }

////////////////////////////////Varonesn//////////////////////////////////////
		public function getStrVaronesn()
	        {
	            return $this->strVaronesn;
	        }

        public function setStrVaronesn($ob)
	        {
	            $this->strVaronesn = $ob;
	        }
//////////////////////////FechaNacimiento //////////////////////////////////////////
public function getStrFechaNacimiento()
        {
            return $this->strFechaNacimiento;
        }

        public function setStrFechaNacimiento($fn)
        {
            $this->strFechaNacimiento = $fn;
        }


 
 /////////////////////////Sucursal////////////////////////////////////////////////
        public function getStrSucursal()
        {
            return $this->strSucursal;
        }

        public function setStrSucursal($su)
        {
            $this->strSucursal = $su;
        }
 

////////////////////////Madre///////////////////////////////////////////////////////////////
		public function getStrMadre()
        {
            return $this->strMadre;
        }

        public function setStrMadre($fa)
        {
            $this->strMadre= $fa;
        }
//////////////////////////Padre //////////////////////////////////////////////////////////////
		public function getStrPadre()
        {
            return $this->strPadre;
        }

        public function setStrPadre($ob)
        {
            $this->strPadre= $ob;
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
        	$tusuario = new clTusuario();            
            		
          $retval  = '<script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.validate.js"></script>
                        <script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.metadata.js"></script>
                       ';

            $retval .= '<br><br><br><br>
                        <script>
                            $(document).ready(function(){
                                    $.metadata.setType( \'attr\', \'validate\' );
                                    $(\'#frmvfamiliares\').validate({
                                            rules:{
                                                strIdentificacion: { required: true },
                                               	strIdentificaciont: { required: true}, 	
												lsEstado: { required: true},
												strObservaciond: { required: true }
                                                  },
                                            messages:{
                                                strIdentificacion: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
                                                strIdentificaciont: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
                                                lsEstado: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
												strObservaciond: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"}
												     }
                                    });
                                    
                                   
								   
															 
								 
                            });
                        </script>
                       ';
		  
            $retval .= '<form id="frmvfamiliares" action="'. VFAMILIARES_URL.'vfamiliares.php" method="POST">';

            $Regresar = "regresar('". VFAMILIARES_URL . "vfamiliares.php')";

            $retval .= '<fieldset class="fieldsetPequeno">';
            $retval .= '<legend class="etiquetaborde">
                            VISITAS FAMILIARES  <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO VISITAS FAMILIARES <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> '. $this->getStrEtiqueta() .'
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
								<td align="right"><b>Nombres y apellidos:&nbsp;</b></td>
                                <td align="left">                                    
                                    <select name="strNapellidos" id="strNapellidos"  class="combobox">
                                        '.$tusuario->getStrListar($this->getStrNapellidos()) .'
                                    </select>
                                </td>
	                        </tr>
                            <tr class="formulariofila1">
                                <td  align="right"><b></b></td>
                                <td align="left">
                                    <input type="checkbox" id="strVisitaa" name="strVisitaa" value="'. $this->getStrVisitaa().'">V1<br>
                                </td>
                                
                            </tr>
                            <tr class="formulariofila1">
                                <td  align="right"><b></b></td>
                                <td align="left">
                                    <input type="checkbox" id="strVisitab" name="strVisitab" value="'. $this->getStrVisitab().'">V2<br>
                                </td>
                                
                            </tr>
                            <tr class="formulariofila1">
                                <td  align="right"><b></b></td>
                                <td align="left">
                                    <input type="checkbox" id="strVisitac" name="strVisitac" value="'. $this->getStrVisitac().'">V3<br>
                                </td>
                                
                            </tr>
                            <tr class="formulariofila1">
                                 
                             	<td  align="right"><b>N°. Familiares Durante Visita:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strVisitamf" name="strVisitamf" type="text" maxlength="100" value="'. $this->getStrVisitamf() .'" />
                                </td>
                           </tr>
  <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">VISITAS</td>
                            </tr>                                                 
                            <tr class="formulariofila1">
                                 
                             	<td  align="right"><b>LLegada:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strLlegada" name="strLlegada" type="text" maxlength="100" value="'. $this->getStrLlegada() .'" />
                                </td>
                                <td  align="right"><b>Salida:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strSalida" name="strSalida" type="text" maxlength="100" value="'. $this->getStrSalida() .'" />
                                </td>
                           </tr>
                           <tr class="formulariofila1">
                                 
                             	<td  align="right"><b>Tiempo Visita:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strTiempov" name="strTiempov" type="text" maxlength="100" value="'. $this->getStrTiempov() .'" />
                                </td>
                                <td  align="right"><b>Fecha:</b></td>
                                <td align="left">
                                    <input name="dtFecha" type="text" id="dtFecha" value="'. $this->getStrFechaNacimiento() .'" size="10" readonly="readonly" class="textboxfecha" />
                                    <a href="#">
                                        <img src="'. IMAGENES_PATH .'/calendario.png" title="Calendario" name="strFecha" id="strFecha" width="16px" height="16px" style="border: 0px none;">
                                    </a>
                                    <script type="text/javascript">
                                        Calendar.setup({
                                                         inputField: "dtFecha",
                                                         ifFormat: "%Y-%m-%d",
                                                         button: "strFecha"
                                                         });
                                    </script>
                                </td>
                           </tr>
                           <tr class="formulariofila1">
                                 
                             	<td  align="right"><b>Objetivo de visita:</b></td>
                                <td align="left">
                                    <textarea class="textbox" id="strObjetivov" rows="4" name="strObjetivov" type="text" value="'. $this->getStrObjetivov() .'" />'. $this->getStrObjetivov() .'</textarea>
                                </td>
                               <td  align="right"><b>Número de Hijos:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strVisitanh" name="strVisitanh" type="text" maxlength="100" value="'. $this->getStrVisitanh() .'" />
                                </td> 
                           </tr>
<table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">COMPOSICIÓN FAMILIAR</td>
                            </tr>
                           <tr class="formulariofila1">
                                 
                             	<td  align="right"><b>Varones:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strVarones" name="strVarones" type="text" maxlength="100" value="'. $this->getStrVarones() .'" />
                                </td>
                                
 			               </tr> 						   
						   <tr class="formulariofila1">
                               <td  align="right"><b></b></td>
                                	<td align="left">
                                    <input type="checkbox" id="strVaronesn" name="strVaronesn" value="'. $this->getStrVaronesn().'">-18<br>
                               </td> 
                                 
                          </tr> 
                          <tr class="formulariofila1">
                               
                                <td  align="right"><b></b></td>
                                	<td align="left">
                                    <input type="checkbox" id="strVaronesp" name="strVaronesp" value="'. $this->getStrVaronesp().'">+18<br>
                               </td>   
                          </tr> 		
                          <tr class="formulariofila1">
                                 
                             	<td  align="right"><b>Mujeres:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strMujeres" name="strMujeres" type="text" maxlength="100" value="'. $this->getStrMujeres() .'" />
                                </td>
                               
 			               </tr> 						   
						   <tr class="formulariofila1">
                               <td  align="right"><b></b></td>
                                	<td align="left">
                                    <input type="checkbox" id="strMujeresn" name="strMujeresn" value="'. $this->getStrMujeresn().'">-18<br>
                               </td>  
                              
                          </tr> 
                          <tr class="formulariofila1">
                              
                               <td  align="right"><b></b></td>
                                	<td align="left">
                                    <input type="checkbox" id="strMujeresp" name="strMujeresp" value="'. $this->getStrMujeresp().'">+18<br>
                               </td>  
                          </tr> 
                          
						  <tr class="formulariofila1">
                               <td  align="right"><b>Nombre del Padre:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strPadre" name="strPadre" type="text" maxlength="100" value="'. $this->getStrPadre() .'" />
                                </td>
                               <td  align="right"><b>Nombre de la Madre:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strMadre" name="strMadre" type="text" maxlength="100" value="'. $this->getStrMadre() .'" />
                                </td> 
                          </tr> 	
						  <tr class="formulariofila1">
                               <td  align="right"><b>Hijos (as) / Cuántos:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strHijosc" name="strHijosc" type="text" maxlength="100" value="'. $this->getStrHijosc() .'" />
                                </td>
                               <td  align="right"><b>Otros/Quién:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strOtrosq" name="strOtrosq" type="text" maxlength="100" value="'. $this->getStrOtrosq() .'" />
                                </td> 
                          </tr> 
                          <tr class="formulariofila1">
                               <td  align="right"><b>Dirección Domiciliaria:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strDirecciond" name="strDirecciond" type="text" maxlength="100" value="'. $this->getStrDirecciond() .'" />
                                </td>
                               <td  align="right"><b>Zona:</b></td>
                                <td align="left">
                                    <input class="textbox" id="strZona" name="strZona" type="text" maxlength="100" value="'. $this->getStrZona() .'" />
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
            $ProcedimientoAlmacenado = sprintf("CALL spingresarvfamiliares('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s',
            '%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s');",
            $this->getstrNapellidos(), $this->getstrVisitaa(), $this->getstrVisitab(), $this->getStrVisitac(), $this->getStrVisitamf(),
            $this->getStrLlegada(),$this->getStrSalida(),$this->getStrTiempov(), $this->getStrFechaNacimiento(),$this->getStrObjetivov(),
            $this->getStrVisitanh(),$this->getStrVarones(),$this->getStrVaronesn(),$this->getStrVaronesp(),$this->getStrMujeres(),
            $this->getStrMujeresn(),$this->getStrMujeresp(),$this->getStrPadre(),$this->getStrMadre(),$this->getStrHijosc(),
            $this->getStrOtrosq(),$this->getStrDirecciond(),$this->getStrZona(),$_SESSION["usuario"]["suc"],$_SESSION["usuario"]["cuenta"]);
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Estado_Civil= [ '. $this->getStrNapellidos().' ] Em@il = [ '.$this->getStrNapellidos().' ] Fecha_Nacimiento= [ '. $this->getStrFechaNacimiento().' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s','%s','%s','%s');", $_SESSION["usuario"]["cuenta"], 'GUARDAR', 'tvfamiliar', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL spactualizarvfamiliares('%s','%s','%s','%s','%s','%s','%s','%s','%s',
            '%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s');",
            $this->getStrCodigo(),$this->getstrNapellidos(), $this->getstrVisitaa(), $this->getstrVisitab(), $this->getStrVisitac(), $this->getStrVisitamf(),
            $this->getStrLlegada(),$this->getStrSalida(),$this->getStrTiempov(), $this->getStrFechaNacimiento(),$this->getStrObjetivov(),
            $this->getStrVisitanh(),$this->getStrVarones(),$this->getStrVaronesn(),$this->getStrVaronesp(),$this->getStrMujeres(),
            $this->getStrMujeresn(),$this->getStrMujeresp(),$this->getStrPadre(),$this->getStrMadre(),$this->getStrHijosc(),
            $this->getStrOtrosq(),$this->getStrDirecciond(),$this->getStrZona());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Estado_Civil= [ '. $this->getStrNapellidos().' ] Em@il = [ '.$this->getStrNapellidos().' ] Fecha_Nacimiento= [ '. $this->getStrFechaNacimiento().' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s','%s','%s','%s');", $_SESSION["usuario"]["cuenta"], 'ACTUALIZAR', 'tvfamiliar', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL speliminarvfamiliares('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlInsertUpdateDelete();

           if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Estado_civil =['. $this->getStrVisitac().' ] Em@il = [ '.$this->getStrVisitamf().' ] Fecha Nacimiento= [ '. $this->getStrFechaNacimiento().' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'ELIMINAR', 'tvfamiliar', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL spbvfamiliares('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
            foreach( $resultado as $rst):   
		    $this->setstrNapellidos($rst["napellidos"]);
            $this->setstrVisitaa($rst["visitaa"]);
			$this->setstrVisitab($rst["visitab"]);
			$this->setStrVisitac($rst["visitac"]); 
			$this->setStrVisitamf($rst["visitamf"]);
			$this->setStrLlegada($rst["llegada"]); 
			$this->setStrSalida($rst["salida"]);
			$this->setStrTiempov($rst["tiempov"]);
			$this->setStrFechaNacimiento($rst["dtFecha"]);
			$this->setStrObjetivov($rst["objetivov"]);
			$this->setStrVisitanh($rst["visitanh"]);
			$this->setStrVarones($rst["varones"]);
			$this->setStrVaronesn($rst["varonesn"]);
			$this->setStrVaronesp($rst["varonesp"]);
			$this->setStrMujeres($rst["mujeres"]);
			$this->setStrMujeresn($rst["mujeresn"]);
			$this->setStrMujeresp($rst["mujeresp"]);
			$this->setStrPadre($rst["padre"]);
			$this->setStrMadre($rst["madre"]);
			$this->setStrHijosc($rst["hijosc"]);
			$this->setStrOtrosq($rst["otrosq"]);
			$this->setStrDirecciond($rst["direcciond"]);
			$this->setStrZona($rst["zona"]);
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
            $ProcedimientoAlmacenado = sprintf("CALL sptotalvfamiliares('%d');", $sucursal);
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
            $ProcedimientoAlmacenado = sprintf("CALL splistarvfamiliare('%d','%d','%d');","$re", "$pa","$cf");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            VISITAS FAMILIARES <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO VISITAS FAMILIARES s</legend>
                       ';
            $retval .= '
                        <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                            <tr>
                                <td colspan="14" align="center"><div class="vtip" title="Ingreso<br> [NUEVA VISITA FAMILIAR ]">
                                    <a href="'.VFAMILIARES_URL.'vfamiliares.php?btnNuevo=Nuevo">| <img src="'. IMAGENES_PATH .'/rptstocksucursal.png" title="" width="16px" height="16px"  border="0" /><img src="'. IMAGENES_PATH .'/nuevo.png" title="" width="16px" height="16px"  border="0" />NUEVA VISITA FAMILIAR|</a>
                                </div><td>
                            </tr>
                            <tr class="tablatitulo">
                                <th colspan="17">LISTADO&nbsp;DE&nbsp;VISITAS FAMILIARES&nbsp;REGISTRADAS</th>
                            </tr>
                            <tr class="tablasubtitulo">
                                <th align="center"> </th> 
                                <th align="center">Id</th>                                                             
                                <th align="center">Nombres y apellidos usuario</th>
                                <th align="center">V1</th>
                                <th align="center">V2</th>
                                <th align="center">V3</th>
                                 <th align="center">N°. Familiares Durante Visita</th>
                                <th align="center">LLegada</th>
                                <th align="center">Salida</th>
                                <th align="center">Tiempo Visita</th>
                                <th align="center">Fecha</th>
                                <th align="center">Objetivo de visita</th>
                                <th align="center">N/H</th>
                                <th align="center" colspan="3">Acciones</th>
                            </tr>
                        ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["tvfamiliar_id"] .'</td>';
                    $retval .= 	'<td align="left">'.$rst["primer_nombre"].' '.$rst["segundo_nombre"].' '.$rst["apellido_paterno"].' '.$rst["apellido_materno"].'</td>';
                    $retval .= 	'<td align="left">'. $rst["visitaa"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["visitab"] .'</td>';
					$retval .= 	'<td align="center">'. $rst["visitac"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["visitamf"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["llegada"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["salida"] .'</td>';
					$retval .= 	'<td align="left">'. $rst["tiempov"] .'</td>'; 
					$retval .= 	'<td align="left">'. $rst["fechan"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["objetivov"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["visitanh"] .'</td>';
					      
					$retval .= 	'<td align="center"><div class="vtip" title="ACTUALIZAR VISITAS FAMILIARES<br> [ codigo = '.$rst["tvfamiliar_id"] .' ]">';
                    $retval .=  '<a href="'. VFAMILIARES_URL .'vfamiliares.php?btnActualizar=Actualizar&strCodigo='. $rst["tvfamiliar_id"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    if($_SESSION["usuario"]["tipo"]==2 || $_SESSION["usuario"]["tipo"]==1 )
							{
                    $retval .= 	'<td align="center"><div class="vtip" title="ELIMINAR VISITAS FAMILIARES<br> [ codigo = '.$rst["tvfamiliar_id"] .' ]">';
                    $retval .=  '<a href="'. VFAMILIARES_URL .'vfamiliares.php?btnEliminar=Eliminar&strCodigo='. $rst["tvfamiliar_id"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
							}
                    $retval .= 	'<td align="center"><div class="vtip" title="DETALLE VISITAS FAMILIARES  <br> [ codigo = '.$rst["tvfamiliar_id"] .' ]">';
                    $retval .=  '<a href="'. VFAMILIARES_URL .'vfamiliares.php?btnDetalle=Detalle&strCodigo='. $rst["tvfamiliar_id"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                    $i = 1 - $i;
                endforeach;
            }

            $paginacion->setStrNombrePagina("vfamiliares/vfamiliares.php");
            $retval .= '<tr><td colspan="12" align="center">'. $paginacion->getStrPaginacion() .'</td></tr>';
            $retval .= '</table>';
            $retval .= '</fieldset>';
            return $retval;
        }

public function getStrDetallePersona()
        {
            $query = new clQuery();
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbdetallevfamiliares('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            VISITAS FAMILIARES <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">LISTADO VISITAS FAMILIARES <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">DETALLE VISITAS FAMILIARES 
                        </legend>
                       ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                    $retval .= '<tr>
                                    <td colspan="2" align="center">
                                        <a href="'. VFAMILIARES_URL .'vfamiliares.php">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" />REGRESAR LISTADO VISITAS FAMILIARES |</a>
                                    <td>
                                </tr>
                                ';
                    
                    $retval .= '<tr class="tablatitulo">
                                    <th colspan="2">DETALLE&nbsp;VISITA FAMILIAR;REGISTRADO</th>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Código:</th>
                                    <td align="left">  '. $rst["tvfamiliar_id"] .'</td>
                                </tr>
                                ';
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Nombres y apellidos usuario:</th>
                                    <td align="left">  '. $rst["primer_nombre"] .' '. $rst["segundo_nombre"] .' '. $rst["apellido_paterno"] .' '. $rst["apellido_materno"] .'</td>
                                </tr>
                                ';            
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">V1:</th>
                                    <td align="left">  '. $rst["visitaa"] .'</td>
                                </tr>
                                ';
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">V2:</th>
                                    <td align="left">  '. $rst["visitab"] .'</td>
                                </tr>
                                ';			
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">V3:</th>
                                    <td align="left">  '. $rst["visitac"] .'</td>
                                </tr>
                                ';		
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">N°. Familiares Durante Visita:</th>
                                    <td align="left">  '. $rst["visitamf"] .'</td>
                                </tr>
                                ';  	
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">LLegada:</th>
                                    <td align="left">  '. $rst["llegada"] .'</td>
                                </tr>
                                ';  	
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Salida:</th>
                                    <td align="left">  '. $rst["salida"] .'</td>
                                </tr>
                                ';  
					 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Tiempo Visita:</th>
                                    <td align="left">  '. $rst["tiempov"] .'</td>
                                </tr>
                                ';  	
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Fecha:</th>
                                    <td align="left">  '. $rst["fechan"] .'</td>
                                </tr>
                                ';  	
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Objetivo de visita:</th>
                                    <td align="left">  '. $rst["objetivov"] .'</td>
                                </tr>
                                ';  	
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">N/H:</th>
                                    <td align="left">  '. $rst["visitanh"] .'</td>
                                </tr>
                                ';  	
                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Varones:</th>
                                    <td align="left">  '. $rst["varones"] .'</td>
                                </tr>
                                ';  	
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">-18:</th>
                                    <td align="left">  '. $rst["varonesn"] .'</td>
                                </tr>
                                ';  
					$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">+18:</th>
                                    <td align="left">  '. $rst["varonesp"] .'</td>
                                </tr>
                                '; 		
				$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Mujeres:</th>
                                    <td align="left">  '. $rst["mujeres"] .'</td>
                                </tr>
                                '; 		
				$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">-18:</th>
                                    <td align="left">  '. $rst["mujeresn"] .'</td>
                                </tr>
                                '; 	
				$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">+18:</th>
                                    <td align="left">  '. $rst["mujeresp"] .'</td>
                                </tr>
                                '; 	
				$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Padre:</th>
                                    <td align="left">  '. $rst["padre"] .'</td>
                                </tr>
                                '; 	
               $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Madre:</th>
                                    <td align="left">  '. $rst["madre"] .'</td>
                                </tr>
                                '; 		                 				
                 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Hijos (as) / Cuántos:</th>
                                    <td align="left">  '. $rst["hijosc"] .'</td>
                                </tr>
                                '; 	      
				 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Otros/Quién:</th>
                                    <td align="left">  '. $rst["otrosq"] .'</td>
                                </tr>
                                '; 	   
				$retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Dirección Domiciliaria:</th>
                                    <td align="left">  '. $rst["direcciond"] .'</td>
                                </tr>
                                '; 	  		
                 $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Zona:</th>
                                    <td align="left">  '. $rst["zona"] .'</td>
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