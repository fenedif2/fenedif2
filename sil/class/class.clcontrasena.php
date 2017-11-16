<?php	
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.validaciones.php' );
	include_once( CLASS_PATH . "class.clquery.php" );

	class clContrasena
		{
			private $strContrasenaActual;
			private $strNuevaContrasena;
			private $strConfirmarContrasena;                        
                        private $strUsuario;
			
			private $strEtiqueta;
			private $strNombreBoton;
			private $strValorBoton;
			
			public function __construct()
			{
				$this->strContrasenaActual = "";
				$this->strNuevaContrasena = "";
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

			public function getStrNuevaContrasena()
				{
					return $this->strNuevaContrasena;
				}
	
			public function setStrNuevaContrasena($nc)
				{
					$this->strNuevaContrasena = $nc;
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
				       $retval .= '
							<script>
								$(document).ready(function(){
									$.metadata.setType( \'attr\', \'validate\' );
									$(\'#frmcontrasena\').validate({
										rules:{
											strContrasenaActual: { required: true},
											strNuevaContrasena: {	required: true },
											strConfirmarContrasena: {required: true },
                                                                                        strCampoContrasenaActual: {required: true },
                                                                                        strCampoNuevaContrasena: {required: true },
                                                                                        strCampoConfirmarContrasena: {required: true }
										},
										messages:{
											strContrasenaActual: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
											strNuevaContrasena: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
											strConfirmarContrasena: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                                                                        strCampoContrasenaActual: { required: ""},
                                                                                        strCampoNuevaContrasena: {required: "" },
                                                                                        strCampoConfirmarContrasena: { required: ""}
										}
									});

                                                                        $(\'#strContrasenaActual\').change(function(){
                                                                            var contrasenaactual = $(this).val();
                                                                            $.post( "'. CONTRASENA_URL .'contrasena.php", { btnBuscar:"ContrasenaActual",
                                                                                                                            strNumeroContrasenaActual: contrasenaactual
                                                                                                                          },
                                                                            function ( data ){
                                                                                        $( \'#lblContrasenaActual\' ).html( data );
                                                                            });
                                                                         });

                                                                        $(\'#strConfirmarContrasena\').change(function(){
                                                                            var confirmarcontrasena = $(this).val();
                                                                            var nuevacontrasena = $(\'#strNuevaContrasena\').val();
                                                                            $.post( "'. CONTRASENA_URL .'contrasena.php", { btnBuscar:"ConfirmarContrasena",
                                                                                                                            strNumeroConfirmarContrasena: confirmarcontrasena,
                                                                                                                             strNumeroNuevaContrasena: nuevacontrasena
                                                                                                                          },
                                                                            function ( data ){
                                                                                $( \'#lblConfirmarContrasena\' ).html( data );                                                                                
                                                                            });
                                                                         });


                                                                        $(\'#strNuevaContrasena\').change(function(){
                                                                            var nuevacontrasena = $(this).val();
                                                                            var confirmarcontrasena = $(\'#strConfirmarContrasena\').val();
                                                                            $.post( "'. CONTRASENA_URL .'contrasena.php", { btnBuscar:"NuevaContrasena",
                                                                                                                            strNumeroConfirmarContrasena: confirmarcontrasena,
                                                                                                                             strNumeroNuevaContrasena: nuevacontrasena
                                                                                                                          },
                                                                            function ( data ){
                                                                                        $( \'#lblNuevaContrasena\' ).html( data );                                                                                        
                                                                            });
                                                                         });

								});
							</script>';
					
					$retval .= '
						<form id="frmcontrasena" action="'. CONTRASENA_URL .'contrasena.php" method="post">';
					
					$retval .= '<fieldset class="fieldsetMediano">';
                                        $retval .= '<legend class="etiquetaborde">
                                                        Cambiar Contrase&ntilde;a
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
									<td align="right"><b>Contrase&ntilde;a&nbsp;actual:</b></td>
									<td align="left">										
                                                                                <input id="strUsuario" name="strUsuario" type="hidden" value="'. $this->getStrUsuario() .'" />
										<input class="textbox" id="strContrasenaActual" name="strContrasenaActual" type="password" maxlength="10" />
                                                                                <div id="lblContrasenaActual" align="left">
									</td>
								</tr>

                                                                <tr class="formulariofila1">
									<td align="right"><b>Nueva&nbsp;contrase&ntilde;a:</b></td>
									<td align="left">										
										<input class="textbox" id="strNuevaContrasena" name="strNuevaContrasena" type="password" maxlength="10" />
                                                                                <div id="lblNuevaContrasena" align="left">
									</td>
								</tr>

                                                                <tr class="formulariofila1">
									<td align="right"><b>Confirmar&nbsp;nueva&nbsp;contrase&ntilde;a:</b></td>
									<td align="left">										
										<input class="textbox" id="strConfirmarContrasena" name="strConfirmarContrasena" type="password" maxlength="10" />
                                                                                <div id="lblConfirmarContrasena" align="left">
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
					$ProcedimientoAlmacenado = sprintf("CALL spactualizarcontrasena('%s','%s');", $this->getStrUsuario(), $this->getStrNuevaContrasena());
					$query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);					
					
					if($query->getStrSqlInsertUpdateDelete()){
                                            $descripcion = 'Usuario = [ '.$this->getStrUsuario().' ] Clave = [ '.$this->getStrNuevaContrasena().' ]';
                                            $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'A', 'tusuario', $descripcion);
                                            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
                                            $query->getStrSqlInsertUpdateDelete();

                                            $resultado = true;
                                        }
                                        
					return $resultado;
				}


			public function getStrBuscar()
				{
					$query = new clQuery();	
					
					//Nombre Procedimientos Almacenados					
					$ProcedimientoAlmacenado = sprintf("CALL splogin1('%s','%s');", $this->getStrUsuario(), $this->getStrContrasenaActual());
					$query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);					
					$resultado = $query->getStrSqlSelect();
				
					if( count($resultado) > 0 )
                                            $retval = true;
					else
                                            $retval = false;
						
					return $retval;
				}
		}
?>