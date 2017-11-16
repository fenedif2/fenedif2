<?php	
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.validaciones.php' );
    include_once( CLASS_PATH . "class.clquery.php" );
    include_once( CLASS_PATH . "class.clpaginacion.php" );   
	include_once( CLASS_PATH . "class.cltusuario.php" ); 
	
    class clAterapeutica
    {
        private $StrCodigo;
		private $StrTusuario;
        private $strOterapeuticoa;
		private $strPlana;	
		private $strOterapeuticob;
		private $strPlanb;
		private $strOterapeuticoc;
	 	private $StrPlanc;	
		private $StrOterapeuticod;
		private $StrPland;	 
		private $StrOterapeuticoe;
		private $StrPlane;
		private $StrOterapeuticof;
		private $StrPlanf;
			
        private $strEtiqueta;
        private $strNombreBoton;
        private $strValorBoton;
        private $strLectura;

        public function __construct()
        {
				
            $this->StrCodigo = "";	
			$this->StrTusuario = "";
			$this->strOterapeuticoa = "";
            $this->strPlana = "";
			$this->strOterapeuticob = "";
            $this->strPlanb = "";
			$this->strOterapeuticoc = "";
			$this->StrPlanc = "";
			$this->StrOterapeuticod = "";
			$this->StrPland = "";
			$this->StrOterapeuticoe = "";
			$this->StrPlane = "";	
			$this->StrOterapeuticof = "";
			$this->StrPlanf = "";
			
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
		
//////////// Oterapeuticoa /////////////////////
        public function getstrOterapeuticoa()
        {
            return $this->strOterapeuticoa;
        }
		public function setstrOterapeuticoa($n)
        {
            $this->strOterapeuticoa = $n;
        }
////////////// Plana/////////////////////		
		public function getstrPlana()
        {
            return $this->strPlana;
        }
  		public function setstrPlana($rp)
        {
            $this->strPlana = $rp;
        } 
//////////// Oterapeuticob////////////////// 
		public function getstrOterapeuticob()
        {
            return $this->strOterapeuticob;
        }
  		public function setstrOterapeuticob($ct)
        {
            $this->strOterapeuticob = $ct;
        } 
/////////////////////////Planb  //////////////////////////
 	public function getStrPlanb()
        {
            return $this->strPlanb;
        }

        public function setStrPlanb($et)
        {
            $this->strPlanb = $et;
        }

					
/////////////////////Oterapeuticoc ///////////////////////
        public function getStrOterapeuticoc()
        {
            return $this->strOterapeuticoc;
        }

        public function setStrOterapeuticoc($e)
        {
            $this->strOterapeuticoc = $e;
        }
/////////////////////Planc //////////////////////////////
		public function getStrPlanc()
	        {
	            return $this->StrPlanc;
	        }

        public function setStrPlanc($t)
	        {
	            $this->StrPlanc = $t;
	        }
/////////////////////////Oterapeuticod//////////////////////////////
		public function getStrOterapeuticod()
	        {
	            return $this->StrOterapeuticod;
	        }

        public function setStrOterapeuticod($ne)
	        {
	            $this->StrOterapeuticod = $ne;
	        }
////////////////////////Pland/////////////////////////////////			
		public function getStrPland()
	        {
	            return $this->StrPland;
	        }

        public function setStrPland($ned)
	        {
	            $this->StrPland = $ned;
	        }
//////////////////////////////Oterapeuticoe//////////////////////////////////////////////////////	
		public function getStrOterapeuticoe()
	        {
	            return $this->StrOterapeuticoe;
	        }

        public function setStrOterapeuticoe($tcf)
	        {
	            $this->StrOterapeuticoe = $tcf;
	        }
//////////////////////////////Plane////////////////////////////////////////////////////
		public function getStrPlane()
	        {
	            return $this->StrPlane;
	        }

        public function setStrPlane($cb)
	        {
	            $this->StrPlane = $cb;
	        }

////////////////////////////////Oterapeuticof //////////////////////////////////////
		public function getStrOterapeuticof()
	        {
	            return $this->StrOterapeuticof;
	        }

        public function setStrOterapeuticof($ob)
	        {
	            $this->StrOterapeuticof = $ob;
	        }
/////////////////////////Planf //////////////////////////
 	public function getStrPlanf()
        {
            return $this->strPlanf;
        }

        public function setStrPlanf($et)
        {
            $this->strPlanf = $et;
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
                                    $(\'#frmaterapeutica\').validate({
                                            rules:{
                                                strOterapeuticoa: { required: true },
                                               	strOterapeuticob: { required: true }
                                                  },
                                            messages:{
                                                strOterapeuticoa: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
                                                strOterapeuticob: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"}
												     }
                                    });

                            });
                        </script>
                       ';
		  
            $retval .= '<form id="frmaterapeutica" action="'. ATERAPEUTICA_URL .'aterapeutica.php" method="POST">';

            $Regresar = "regresar('". ATERAPEUTICA_URL . "aterapeutica.php')";

            $retval .= '<fieldset class="fieldsetPequeno">';
            $retval .= '<legend class="etiquetaborde">
                            PLAN DE ATENCIÓN TERAPÉUTICA <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> LISTADO PLAN DE ATENCIÓN TERAPÉUTICA<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> '. $this->getStrEtiqueta() .'
                          </legend>
                       ';
            $NHC = "";		   
            $retval .= '
                        <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">'. $this->getStrEtiqueta() .'</td>
                                <input class="textbox" id="strCodigo" name="strCodigo" type="hidden" maxlength="50" value="'. $this->getStrCodigo() .'" />
                            </tr>
                            <tr>
                               <td colspan="4" align="center" class="tablatitulo">TRATAMIENTO PSICOLÓGICO INDIVIDUAL</td>
                            </tr>
          					<tr class="formulariofila1">
                               <td align="right"><b>Usuario:&nbsp;</b></td>
                                <td align="left">                                    
                                    <select name="lsTusuario" id="lsTusuario"  class="combobox">
                                        '.$tusuario->getStrListar($this->getStrTusuario()) .'
                                    </select>
                                </td>
                            </tr>
                            
							
							<tr class="formulariofila1">
                                 <td  align="right"><b>Objetivo terapéutico:</b></td>
                                	<td align="left">
                                    <textarea class="textbox" id="strOterapeuticoa" rows="4" name="strOterapeuticoa" type="text" value="'. $this->getstrOterapeuticoa() .'" />'. $this->getstrOterapeuticoa() .'</textarea>
                                </td>
                             	<td  align="right"><b>Plan:</b></td>
                                <td align="left">
                                    <textarea class="textbox" id="strPlana" rows="4" name="strPlana" type="text"   value="'. $this->getstrPlana() .'" />'. $this->getstrPlana() .'</textarea>
                                </td>
                            </tr>
 <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">TRATAMIENTO PSICOLÓGICO FAMILIAR</td>
                            </tr>                           
                            <tr class="formulariofila1">
                                 <td  align="right"><b>Objetivo terapéutico:</b></td>
                                	<td align="left">
                                    <textarea class="textbox" id="strOterapeuticob" rows="4" name="strOterapeuticob" type="text"  value="'. $this->getstrOterapeuticob() .'" />'. $this->getstrOterapeuticob() .'</textarea>
                                </td>
                             	<td  align="right"><b>Plan:</b></td>
                                <td align="left">
                                    <textarea class="textbox" id="strPlanb" rows="4" name="strPlanb" type="text"   value="'. $this->getStrPlanb() .'" />'. $this->getStrPlanb() .'</textarea>
                                </td>
                            </tr>
 <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">TRATAMIENTO PSICOLÓGICO GRUPAL</td>
                            </tr>                           
                            <tr class="formulariofila1">
                                 <td  align="right"><b>Objetivo terapéutico:</b></td>
                                	<td align="left">
                                    <textarea class="textbox" id="strOterapeuticoc" rows="4" name="strOterapeuticoc" type="text"  value="'. $this->getStrOterapeuticoc() .'" />'. $this->getStrOterapeuticoc() .'</textarea>
                                </td>
                             	<td  align="right"><b>Plan:</b></td>
                                <td align="left">
                                    <textarea class="textbox" id="strPlanc" rows="4" name="strPlanc" type="text"   value="'. $this->getStrPlanc() .'" />'. $this->getStrPlanc() .'</textarea>
                                </td>
                            </tr>                                                  
 <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">TRATAMIENTO PSICOPEDAGÓGICO</td>
                            </tr>                           
                            <tr class="formulariofila1">
                                 <td  align="right"><b>Objetivo terapéutico:</b></td>
                                	<td align="left">
                                    <textarea class="textbox" id="strOterapeuticod" rows="4" name="strOterapeuticod" type="text"  value="'. $this->getStrOterapeuticod() .'" />'. $this->getStrOterapeuticod() .'</textarea>
                                </td>
                             	<td  align="right"><b>Plan:</b></td>
                                <td align="left">
                                    <textarea class="textbox" id="strPland" rows="4" name="strPland" type="text"   value="'. $this->getStrPland() .'" />'. $this->getStrPland() .'</textarea>
                                </td>
                            </tr>     
  <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">TRATAMIENTO PSICOLÓGICO SOCIAL</td>
                            </tr>                           
                            <tr class="formulariofila1">
                                 <td  align="right"><b>Objetivo terapéutico:</b></td>
                                	<td align="left">
                                    <textarea class="textbox" id="strOterapeuticoe" rows="4" name="strOterapeuticoe" type="text"  value="'. $this->getStrOterapeuticoe() .'" />'. $this->getStrOterapeuticoe() .'</textarea>
                                </td>
                             	<td  align="right"><b>Plan:</b></td>
                                <td align="left">
                                    <textarea class="textbox" id="strPlane" rows="4" name="strPlane" type="text"   value="'. $this->getStrPlane() .'" />'. $this->getStrPlane() .'</textarea>
                                </td>
                            </tr>                                                         
 <table width="100%" border="0" align="center" cellpadding="1">
                            <tr>
                                <td colspan="4" align="center" class="tablatitulo">TRATAMIENTO PSICOLÓGICO OCUPACIONAL</td>
                            </tr>                           
                            <tr class="formulariofila1">
                                 <td  align="right"><b>Objetivo terapéutico:</b></td>
                                	<td align="left">
                                    <textarea class="textbox" id="strOterapeuticof" rows="4" name="strOterapeuticof" type="text"  value="'. $this->getStrOterapeuticof() .'" />'. $this->getStrOterapeuticof() .'</textarea>
                                </td>
                             	<td  align="right"><b>Plan:</b></td>
                                <td align="left">
                                    <textarea class="textbox" id="strPlanf" rows="4" name="strPlanf" type="text"   value="'. $this->getStrPlanf().'" />'. $this->getStrPlanf().'</textarea>
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
            $ProcedimientoAlmacenado = sprintf("CALL spingresaraterapeutica('%s','%s','%s','%s','%s','%s','%s','%s',
			'%s','%s','%s','%s','%s','%s','%s');",
            $this->getStrTusuario(),$this->getstrOterapeuticoa(),$this->getstrPlana(),$this->getstrOterapeuticob(),$this->getStrPlanb(),
            $this->getStrOterapeuticoc(),$this->getStrPlanc(),$this->getStrOterapeuticod(), $this->getStrPland(),
            $this->getStrOterapeuticoe(),$this->getStrPlane(),$this->getStrOterapeuticof(),$this->getStrPlanf(),
            $_SESSION["usuario"]["suc"],$_SESSION["usuario"]["cuenta"]);
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);

            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Nombres = [ '.$this->getStrOterapeuticoa().' ] Telefonos = [ '. $this->getStrOterapeuticoa().' ] Em@il = [ '.$this->getStrOterapeuticoa().' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'GUARDAR', 'aterapeutica', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL spactualizaraterapeutico('%s','%s','%s','%s','%s','%s','%s','%s',
			'%s','%s','%s','%s','%s','%s');",
            $this->getStrCodigo(),$this->getStrTusuario(),$this->getstrOterapeuticoa(),$this->getstrPlana(),$this->getstrOterapeuticob(),$this->getStrPlanb(),
            $this->getStrOterapeuticoc(),$this->getStrPlanc(),$this->getStrOterapeuticod(), $this->getStrPland(),
            $this->getStrOterapeuticoe(),$this->getStrPlane(),$this->getStrOterapeuticof(),$this->getStrPlanf());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);

            if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Nombres = [ '.$this->getStrOterapeuticoa().' ] Telefonos = [ '. $this->getStrOterapeuticoa().' ] Em@il = [ '.$this->getStrOterapeuticoa().' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'ACTUALIZAR', 'aterapeutica', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL speliminaraterapeutica('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlInsertUpdateDelete();

           if($query->getStrSqlInsertUpdateDelete()){
                //Nombre Procedimientos Almacenados [Auditoria]
                $descripcion = 'Nombres = [ '.$this->getStrOterapeuticoa().' ] Telefonos = [ '. $this->getStrOterapeuticoa().' ]';
                $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'ELIMINAR', 'aterapeutica', $descripcion);
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
            $ProcedimientoAlmacenado = sprintf("CALL spbaterapeutica('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 )
            {
            foreach( $resultado as $rst):
				 $this->setStrTusuario($rst['tusuario_id']);     
		        $this->setstrOterapeuticoa($rst['oterapeuticoa']);   
	            $this->setstrPlana($rst['plana']);   
	            $this->setstrOterapeuticob($rst['oterapeuticob']);   
	            $this->setStrPlanb($rst['planb']);   
				$this->setstrOterapeuticoc($rst['oterapeuticoc']);   
	            $this->setStrPlanc($rst['planc']);   
				$this->setstrOterapeuticod($rst['oterapeuticod']);   
	            $this->setStrPland($rst['pland']);
				$this->setstrOterapeuticoe($rst['oterapeuticoe']);   
	            $this->setStrPlane($rst['plane']);
				$this->setstrOterapeuticof($rst['oterapeuticof']);   
	            $this->setStrPlanf($rst['planf']);
				   
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
            $ProcedimientoAlmacenado = sprintf("CALL sptotalaterapeutica('%d');",$sucursal);
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
            $paginacion->setStrPaginaUltima (ceil($paginacion->getStrTotalRegistros()/$paginacion->getStrRegistrosPorPagina()));

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
            $ProcedimientoAlmacenado = sprintf("CALL splistaraterapeutica('%d','%d','%d');","$re", "$pa","$cf");
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                           PLAN DE ATENCIÓN TERAPÉUTICA<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Listado PLAN DE ATENCIÓN TERAPÉUTICA</legend>
                       ';
            $retval .= '
                        <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                            <tr>
                                <td colspan="17" align="center"><div class="vtip" title="Ingreso<br> [NUEVO PLAN DE ATENCIÓN TERAPÉUTICA]">
                                    <a href="'. ATERAPEUTICA_URL.'aterapeutica.php?btnNuevo=Nuevo">| <img src="'. IMAGENES_PATH .'/rptstocksucursal.png" title="" width="16px" height="16px"  border="0" /><img src="'. IMAGENES_PATH .'/nuevo.png" title="" width="16px" height="16px"  border="0" />NUEVO PLAN DE ATENCIÓN TERAPÉUTICA |</a>
                                </div><td>
                            </tr>
                            <tr class="tablatitulo">
                                <th colspan="17">LISTADO&nbsp;DE&nbsp;ATENCIÓN TERAPÉUTICA&nbsp;REGISTRADOS</th>
                            </tr>
                            <tr class="tablasubtitulo">
                                <th>...</th>  
                                <th align="center"> </th>  
                                <th align="center">Usuario</th>                                                            
                                <th align="center">Objetivo terapéutico</th>
                                <th align="center">Plan</th>
                                <th align="center">Objetivo terapéutico</th>
                                <th align="center">Plan</th>
                                <th align="center">Objetivo terapéutico</th>
                                <th align="center">Plan</th>
                                <th align="center" colspan="3">Acciones</th>
                            </tr>
                        ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')" onclick="marcar(this,'. $i .')">';
                    $retval .= 	'<td align="center"><input name="rbSeleccionado" name="rbSeleccionado" type="radio"/></td>';                    
                    $retval .= 	'<td align="center">'. $rst["aterapeutica_id"] .'</td>';
					$retval .= 	'<td align="center">'. $rst["primer_nombre"] .' '. $rst["segundo_nombre"] .' '. $rst["apellido_paterno"] .' '. $rst["apellido_materno"] .'</td>';
                    $retval .= 	'<td align="center">'. $rst["oterapeuticoa"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["plana"] .'</td>';
                    $retval .= 	'<td align="center">'. $rst["oterapeuticob"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["planb"] .'</td>';
					$retval .= 	'<td align="center">'. $rst["oterapeuticoc"] .'</td>';
                    $retval .= 	'<td align="left">'. $rst["planc"] .'</td>';
                   	
					$retval .= 	'<td align="center"><div class="vtip" title="Actualizar Plan de Atención Terapeútica<br> [ codigo = '.$rst["aterapeutica_id"] .' ]">';
                    $retval .=  '<a href="'. ATERAPEUTICA_URL.'aterapeutica.php?btnActualizar=Actualizar&strCodigo='. $rst["aterapeutica_id"] .'"><img src="'. IMAGENES_PATH .'/actualizar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
					if($_SESSION["usuario"]["tipo"]==2 || $_SESSION["usuario"]["tipo"]==1 )
							{
                    $retval .= 	'<td align="center"><div class="vtip" title="Eliminar Plan de Atención Terapeútica <br> [ codigo = '.$rst["aterapeutica_id"] .' ]">';
                    $retval .=  '<a href="'. ATERAPEUTICA_URL .'aterapeutica.php?btnEliminar=Eliminar&strCodigo='. $rst["aterapeutica_id"] .'" onclick="return confirmar()"><img src="'. IMAGENES_PATH .'/eliminar.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
							}
                    $retval .= 	'<td align="center"><div class="vtip" title="Detalle Plan de Atención Terapeútica <br> [ codigo = '.$rst["aterapeutica_id"] .' ]">';
                    $retval .=  '<a href="'. ATERAPEUTICA_URL .'aterapeutica.php?btnDetalle=Detalle&strCodigo='. $rst["aterapeutica_id"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                    $retval .= 	'</div></td>';
                    $retval .= '</tr>';
                    $i = 1 - $i;
                endforeach;
            }

            $paginacion->setStrNombrePagina("aterapeutica/aterapeutica.php");
            $retval .= '<tr><td colspan="12" align="center">'. $paginacion->getStrPaginacion() .'</td></tr>';
            $retval .= '</table>';
            $retval .= '</fieldset>';
            return $retval;
        }

public function getStrDetallePersona()
        {
            $query = new clQuery();
            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL spbdetalleaterapeutica('%s');", $this->getStrCodigo());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            $retval .= '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            PLAN DE ATENCIÓN TERAPÉUTICA<img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> LISTADO PLAN DE ATENCIÓN TERAPÉUTICA <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;">DETALLE ATENCIÓN TERAPÉUTICA
                        </legend>
                       ';

            if( count($resultado) > 0 )
            {
                $i = 0;
                foreach( $resultado as $rst):
                    $retval .= '<table border="0" width="100%" cellpadding="2" cellspacing="2" align="center">';
                    $retval .= '<tr>
                                    <td colspan="2" align="center">
                                        <a href="'.ATERAPEUTICA_URL.'aterapeutica.php">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" />REGRESAR LISTADO ATENCIÓN TERAPÉUTICA|</a>
                                    <td>
                                </tr>
                                ';
                    
                    $retval .= '<tr class="tablatitulo">
                                    <th colspan="2">DETALLE&nbsp;PROCESO PSICOTERAPEÚTICO</th>
                                </tr>
                                ';

                    $retval .= '<tr class="listadofila0">
                                    <th align="right" class="bienvenida">Código:</th>
                                    <td align="left">  '. $rst["aterapeutica_id"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Usuario:</th>
                                    <td align="left">'. $rst["primer_nombre"] .' '. $rst["segundo_nombre"] .' '. $rst["apellido_paterno"] .' '. $rst["apellido_materno"] .'</td>
                                </tr>
                                ';
								
                    $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Objetivo terapéutico:</th>
                                    <td align="left">  '. $rst["oterapeuticoa"] .'</td>
                                </tr>
                                ';
					 $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Plan:</th>
                                    <td align="left">  '. $rst["plana"] .'</td>
                                </tr>
                                ';
                  	$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Objetivo terapéutico:</th>
                                    <td align="left">  '. $rst["oterapeuticob"] .'</td>
                                </tr>
                                ';
					 $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Plan:</th>
                                    <td align="left">  '. $rst["planb"] .'</td>
                                </tr>
                                ';
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Objetivo terapéutico:</th>
                                    <td align="left">  '. $rst["oterapeuticoc"] .'</td>
                                </tr>
                                ';
					 $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Plan:</th>
                                    <td align="left">  '. $rst["planc"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Objetivo terapéutico:</th>
                                    <td align="left">  '. $rst["oterapeuticod"] .'</td>
                                </tr>
                                ';
					 $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Plan:</th>
                                    <td align="left">  '. $rst["pland"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Objetivo terapéutico:</th>
                                    <td align="left">  '. $rst["oterapeuticoe"] .'</td>
                                </tr>
                                ';
					 $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Plan:</th>
                                    <td align="left">  '. $rst["plane"] .'</td>
                                </tr>
                                ';	
					$retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Objetivo terapéutico:</th>
                                    <td align="left">  '. $rst["oterapeuticof"] .'</td>
                                </tr>
                                ';
					 $retval .= '<tr class="listadofila1">
                                    <th align="right" class="bienvenida">Plan:</th>
                                    <td align="left">  '. $rst["planf"] .'</td>
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