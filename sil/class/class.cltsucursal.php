<?php	
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.validaciones.php' );
	include_once( CLASS_PATH . "class.clquery.php" );
	include_once( CLASS_PATH . "class.clsucursal.php" );

	class clTsucursal
		{
			private $strContrasenaActual;
			private $strSucursal;
			private $strConfirmarContrasena;                        
                        private $strUsuario;
			
			private $strEtiqueta;
			private $strNombreBoton;
			private $strValorBoton;
			
			public function __construct()
			{
				$this->strContrasenaActual = "";
				$this->strSucursal = "";
				$this->strConfirmarContrasena = "";				
                                $this->strUsuario = "";
				
				$this->strEtiqueta = "";
				$this->strNombreBoton = "";
				$this->strValorBoton = "";												
			}
			
			// Funciones Get y Set de la Clase clpersona
			public function getStrContrasenaActual()
				{
					return $this->strContrasenaActual;
				}
	
			public function setStrContrasenaActual($ca)
				{
					$this->strContrasenaActual = $ca;
				}
		
                        public function getStrUsuario()
				{
					return $this->strUsuario;
				}

			public function setStrUsuario($u)
				{
					$this->strUsuario = $u;
				}

			public function getStrSucursal()
				{
					return $this->strSucursal;
				}
	
			public function setStrSucursal($nc)
				{
					$this->strSucursal = $nc;
				}

			public function getStrConfirmarContrasena()
				{
					return $this->strConfirmarContrasena;
				}
	
			public function setStrConfirmarContrasena($cc)
				{
					$this->strConfirmarContrasena = $cc;
				}
				
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

			 public function getStrFormulario()
			 	{
			 		$sucursal = new clSucursal();
			 		$retval .= '
						<form id="frmtsucursal" action="'. TSUCURSAL_URL.'tsucursal.php" method="post">';
					
					$retval .= '<fieldset class="fieldsetMediano">';
                                        $retval .= '<legend class="etiquetaborde">
                                                        Cambiar SIL
                                                    </legend>
                                                   ';
					$retval .= '	
							<table border="0" align="center" cellpadding="1" cellspacing="1" width="100%">
								<tr>
									<td colspan="2" align="center" class="tablatitulo">
										'. $this->getStrEtiqueta() .'
									</td>
								</tr>
								
								<tr class="formulariofila1">
									<td align="right"><b>SIL:&nbsp;</b></td>
	                             	<td align="left">                                    
	                                    <select name="lsSucursal" id="lsSucursal"  class="combobox">
	                                        '. $sucursal->getStrListar($this->getStrSucursal()) .'
	                                    </select>
                                </td> 
								</tr>

                                 
		
								<tr>
									<td colspan="2" class="formulariofila1" align="center">
										<input type="submit" class="boton" name="'. $this->getStrNombreBoton() .'" value="'. $this->getStrValorBoton() .'" />										
									</td>
								</tr>								
							</table>';
					$retval.= '</fieldset>';
					$retval .='		
						</form>';
					return $retval;
				}			
			
			public function getStrActualizar()
				{
					$query = new clQuery();									
					$resultado = false;
					//Nombre Procedimientos Almacenados					
					$ProcedimientoAlmacenado = sprintf("CALL spactualizarsucursal('%s','%s');", $this->getStrUsuario(), $this->getStrSucursal());
					$query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);					
					
					if($query->getStrSqlInsertUpdateDelete()){
                                            $descripcion = 'Usuario = [ '.$this->getStrUsuario().' ] Clave = [ '.$this->getStrSucursal().' ]';
                                            $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'ACTUALIZAR', 'tusuario', $descripcion);
                                            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
                                            $query->getStrSqlInsertUpdateDelete();

                                            $resultado = true;
                                        }
                                        
					return $resultado;
				}


			
		}
?>