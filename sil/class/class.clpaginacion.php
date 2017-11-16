<?php
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
	class clPaginacion
		{
			private $strNombrePagina;
			private $strPaginaActual;
			private $strPaginaSiguiente;
			private $strPaginaAnterior;
			private $strPaginaUltima;
			
			private $strTotalRegistros;
			private $strRegistrosPorPaginas;
			
			public function __construct()
			{
				$this->strNombrePagina = "";
				$this->strPaginaActual = "";				
				$this->strPaginaSiguiente = "";
				$this->strPaginaAnterior = "";
				$this->strPaginaUltima = "";				
				$this->strPaginaTotalRegistros = "";
				$this->strPaginaRegistrosPorPagina = "";																
			}
			
			
			// Funciones Get y Set de la Clase clQuery
			public function getStrNombrePagina()
				{
					return $this->strNombrePagina;
				}
	
			public function setStrNombrePagina($np)
				{
					$this->strNombrePagina = $np;
				}

			public function getStrPaginaActual()
				{
					return $this->strPaginaActual;
				}
	
			public function setStrPaginaActual($pa)
				{
					$this->strPaginaActual = $pa;
				}


			// Funciones Get y Set de la Clase clQuery
			public function getStrPaginaSiguiente()
				{
					return $this->strPaginaSiguiente;
				}
	
			public function setStrPaginaSiguiente($ps)
				{
					$this->strPaginaSiguiente = $ps;
				}

			// Funciones Get y Set de la Clase clQuery
			public function getStrPaginaAnterior()
				{
					return $this->strPaginaAnterior;
				}
	
			public function setStrPaginaAnterior($pa)
				{
					$this->strPaginaAnterior = $pa;
				}

			// Funciones Get y Set de la Clase clQuery
			public function getStrPaginaUltima()
				{
					return $this->strPaginaUltima;
				}
	
			public function setStrPaginaUltima($pu)
				{
					$this->strPaginaUltima = $pu;
				}
			
			// Funciones Get y Set de la Clase clQuery
			public function getStrTotalRegistros()
				{
					return $this->strTotalRegistros;
				}
	
			public function setStrTotalRegistros($tr)
				{
					$this->strTotalRegistros = $tr;
				}	

			// Funciones Get y Set de la Clase clQuery
			public function getStrRegistrosPorPagina()
				{
					return $this->strRegistrosPorPagina;
				}
	
			public function setStrRegistrosPorPagina($rp)
				{
					$this->strRegistrosPorPagina = $rp;
				}	

			public function getStrPaginacion()			
				{														
					$retval = "";
					//UNA VEZ Q MUESTRO LOS DATOS TENGO Q MOSTRAR EL BLOQUE DE PAGINACIÓN SIEMPRE Y CUANDO HAYA MÁS DE UNA PÁGINA
					if($this->getStrTotalRegistros() != 0)
						{
							 $this->setStrPaginaSiguiente($this->getStrPaginaActual() + 1);
							 $this->setStrPaginaAnterior($this->getStrPaginaActual() - 1);
							 
							 $retval .= "<ul id='pagination-digg'>";
				
							//SI ES LA PRIMERA PÁGINA DESHABILITO EL BOTON DE PREVIOUS, MUESTRO EL 1 COMO ACTIVO Y MUESTRO EL RESTO DE PÁGINAS
							 if ($this->getStrPaginaActual() == 1) 
								{
									$retval .= "<li class='previous-off'>&laquo; Anterior</li>";
									$retval .= "<li class='active'>1</li>";
						
									for($i = $this->getStrPaginaActual() + 1; $i <= $this->getStrPaginaUltima(); $i++)									
										$retval .= "<li><a href='". HOST ."sil/". $this->getStrNombrePagina() ."?btnPagina=". $i ."'>". $i ."</a></li>";
									
									 //Y SI LA ULTIMA PÁGINA ES MAYOR QUE LA ACTUAL MUESTRO EL BOTON NEXT O LO DESHABILITO
									if($this->getStrPaginaUltima() > $this->getStrPaginaActual() )
										$retval .= "<li class='next'><a href='". HOST ."sil/". $this->getStrNombrePagina() ."?btnPagina=". $this->getStrPaginaSiguiente() ."'>Siguiente &raquo;</a></li>";
									else			
										$retval .= "<li class='next-off'>Siguiente &raquo;</li>";							
								} 
							 else
							 {
								 //EN CAMBIO SI NO ESTAMOS EN LA PÁGINA UNO HABILITO EL BOTON DE PREVIUS Y MUESTRO LAS DEMÁS
									$retval .= "<li class='previous'><a href='". HOST ."sil/". $this->getStrNombrePagina() ."?btnPagina=". $this->getStrPaginaAnterior() ."'>&laquo; Anterior</a></li>";
						
									for($i = 1; $i<= $this->getStrPaginaUltima() ; $i++)
										//COMPRUEBO SI ES LA PÁGINA ACTIVA O NO
										if($this->getStrPaginaActual() == $i)
											$retval .= "<li class='active'>". $i ."</li>";			
										else
											$retval .= "<li><a href='". HOST ."sil/". $this->getStrNombrePagina() ."?btnPagina=". $i ."'>". $i ."</a></li>";
			
									 //SI NO ES LA ÚLTIMA PÁGINA ACTIVO EL BOTON NEXT    
									if($this->getStrPaginaUltima() > $this->getStrPaginaActual() )
										$retval .= "<li class='next'><a href='". HOST ."sil/". $this->getStrNombrePagina() ."?btnPagina=". $this->getStrPaginaSiguiente() ."'>Siguiente &raquo;</a></li>";
									else			 
										$retval .= "<li class='next-off'>Siguiente &raquo;</li>";			
							 }   						
							$retval .= "</ul>";
						}		  
						return $retval;
				}

               public function getStrPaginacionContinua()
				{
					$retval = "";
					//UNA VEZ Q MUESTRO LOS DATOS TENGO Q MOSTRAR EL BLOQUE DE PAGINACIÓN SIEMPRE Y CUANDO HAYA MÁS DE UNA PÁGINA
					if($this->getStrTotalRegistros() != 0)
						{
							 $this->setStrPaginaSiguiente($this->getStrPaginaActual() + 1);
							 $this->setStrPaginaAnterior($this->getStrPaginaActual() - 1);

							 $retval .= "<ul id='pagination-digg'>";

							//SI ES LA PRIMERA PÁGINA DESHABILITO EL BOTON DE PREVIOUS, MUESTRO EL 1 COMO ACTIVO Y MUESTRO EL RESTO DE PÁGINAS
							 if ($this->getStrPaginaActual() == 1)
								{
									$retval .= "<li class='previous-off'>&laquo; Anterior</li>";
									$retval .= "<li class='active'>1</li>";

									for($i = $this->getStrPaginaActual() + 1; $i <= $this->getStrPaginaUltima(); $i++)
										$retval .= "<li><a href='". HOST ."sil/". $this->getStrNombrePagina() . $i ."'>". $i ."</a></li>";

									 //Y SI LA ULTIMA PÁGINA ES MAYOR QUE LA ACTUAL MUESTRO EL BOTON NEXT O LO DESHABILITO
									if($this->getStrPaginaUltima() > $this->getStrPaginaActual() )
										$retval .= "<li class='next'><a href='". HOST ."sil/". $this->getStrNombrePagina() . $this->getStrPaginaSiguiente() ."'>Siguiente &raquo;</a></li>";
									else
										$retval .= "<li class='next-off'>Siguiente &raquo;</li>";
								}
							 else
							 {
								 //EN CAMBIO SI NO ESTAMOS EN LA PÁGINA UNO HABILITO EL BOTON DE PREVIUS Y MUESTRO LAS DEMÁS
									$retval .= "<li class='previous'><a href='". HOST ."sil/". $this->getStrNombrePagina() . $this->getStrPaginaAnterior() ."'>&laquo; Anterior</a></li>";

									for($i = 1; $i<= $this->getStrPaginaUltima() ; $i++)
										//COMPRUEBO SI ES LA PÁGINA ACTIVA O NO
										if($this->getStrPaginaActual() == $i)
											$retval .= "<li class='active'>". $i ."</li>";
										else
											$retval .= "<li><a href='". HOST ."sil/". $this->getStrNombrePagina() . $i ."'>". $i ."</a></li>";

									 //SI NO ES LA ÚLTIMA PÁGINA ACTIVO EL BOTON NEXT
									if($this->getStrPaginaUltima() > $this->getStrPaginaActual() )
										$retval .= "<li class='next'><a href='". HOST ."sil/". $this->getStrNombrePagina() . $this->getStrPaginaSiguiente() ."'>Siguiente &raquo;</a></li>";
									else
										$retval .= "<li class='next-off'>Siguiente &raquo;</li>";
							 }
							$retval .= "</ul>";
						}
						return $retval;
				}
		}
?>
