<?php
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
    include_once( CLASS_PATH . "class.clinterfaz.php" );
    include_once( CLASS_PATH . "class.cllogin.php" );    
   class clMenu
    {
        //	OPCIONES DE MENU DE ACUERDO AL TIPO DE USUARIO
        public function getStrMenuOpcion()
        {
            if(isset ($_SESSION["usuario"]))
                switch( $_SESSION["usuario"]["tipo"] )
                {
                    // Usuario - Administrador
                   
					 case "1": $retval = $this->getStrMenuSadministrador();
                              break;
					 case "2": $retval = $this->getStrMenuAdministrador();
                              break;
					 case "3": $retval = $this->getStrMenuRegistrador();
                              break; 
					 case "4": $retval = $this->getStrMenuGestor();
                              break; 
					 case "7": $retval = $this->getStrMenuOrientador();
                              break; 
					case "8": $retval = $this->getStrMenuPromotor();
                              break; 
					case "9": $retval = $this->getStrMenuPsicologo();
                              break; 
					case "10": $retval = $this->getStrMenuLegal();
                              break; 	
					case "11": $retval = $this->getStrMenuMonitoreo();
                              break;
					case "12": $retval = $this->getStrMenueEmprendimientos();
                              break;
					case "13": $retval = $this->getStrMenuMonitoreoSil();
                              break;
                 }
            else
            {
                $retval = "";
                switch ($_REQUEST["btnpagina"])
                {
                    //Menu Pagina Publico - Inicio Informacion
                    case "pagina-publico-inicio":
                        $retval = $this->getStrMenuPublico($this->getStrInformacionPaginaPublicoInicio()," ");
                    break;

                    //Menu Pagina Publico - Historia Informacion
                    case "pagina-publico-ingresarsistema":
                        $retval = $this->getStrMenuPublico($this->getStrInformacionPaginaPublicoHistoria()," ");
                    break;

                    //Menu Pagina Publico - Antecedentes Informacion
                    case "pagina-publico-antecedentes":
                        $retval = $this->getStrMenuPublico($this->getStrInformacionPaginaPublicoAntecedentes()," ");
                    break;

                    //Menu Pagina Publico - Mision Informacion
                    case "pagina-publico-mision":
                        $retval = $this->getStrMenuPublico($this->getStrInformacionPaginaPublicoMision()," ");
                    break;

                    //Menu Pagina Publico - Vision Informacion
                    case "pagina-publico-vision":
                        $retval = $this->getStrMenuPublico($this->getStrInformacionPaginaPublicoVision()," ");
                    break;

                    //Menu Pagina Publico - Quienes Somos
                    case "pagina-publico-quienes-somos":
                        $retval = $this->getStrMenuPublico($this->getStrInformacionPaginaPublicoQuienesSomos()," ");
                    break;

                    //Menu Pagina Publico - Contactanos
                    case "pagina-publico-contactanos":
                        $retval = $this->getStrMenuPublico($this->getStrInformacionPaginaPublicoContactanos()," ");
                    break;

                    //Menu Pagina Publico - Servicios Informacion
                    case "pagina-publico-servicios":
                        $retval = $this->getStrMenuPublico($this->getStrInformacionPaginaPublicoServicios()," ");
                    break;

                    /*Menu Inicio Sesion*/
                    case "pagina-publico-ingresar-sistema":
                        $login = new clLogin();
                        $retval = $this->getStrMenuPublico('<center>'. $login->getStrFormulario() .'</center>'," ");
                    break;


                    case "pagina-publico-ingresar-sistema-login":
                        $login = new clLogin();
                        //$interfaz = new clInterfaz();
                        $login->setStrCuenta($_REQUEST["strUsuario"]);
                        $login->setStrClave($_REQUEST["strClave"]);
                        if(!($login->getStrCheckLogin()))
                        {
                            $strCheck = $login->getStrFormulario().'<img src="'. IMAGENES_PATH .'/error.gif" title="Error" width="16px" height="16px" /> <span class="camporequerido">Usuario y/o Clave incorrecto <br>y/o Usuario inactivo</span>';
                            $retval = $this->getStrMenuPublico('<center>'. $strCheck .'</center>'," ");                            
                        }
                        else
                        {                            
                            header( "Location:". INICIO_URL );                            
                        }
                    break;

                    default:
                        $retval = $this->getStrMenuPublico($this->getStrPaginaDefault()," ");
                    break;
                }
            }
            return $retval;
        }

        //Menu para el publico
        private function getStrMenuPublico($informacion,$pagina)
        {
            $retval .= '<div class="outer-container">';
            $retval .= '<div class="inner-container">';
            $retval .= '<div class="content">';
            $retval .= $informacion;
            $retval .= '</div>';
            $retval .= '<div class="navigation">';
            $retval .= '<h2>'. $pagina .'</h2>';
            $retval .= '<ul>';
            $retval .= $this->getStrMenuPaginasPublico();
            $retval .= '</ul>';
            $retval .= '</div>';
            $retval .= '</div>';
            $retval .= '</div>';
            return $retval;
        }

        //Pagina publico por defecto
        private function getStrPaginaDefault() {
            ////$retval =  '<br>';
            $retval .= '<h1><center>FENEDIF</center></h1>';
            $retval .= '<h1><center></center></h1>';            
            $retval .= '<p align="center">
                        <img src="'. IMAGENES_PATH .'/1.jpg" title="FENEDIF" />
                       </p>
                      ';
/*            $retval .= '<p align="justify">
                            <img src="'. IMAGENES_PATH .'/ingresarsistema.png" title="Inicio" border="0" /><img src="'. IMAGENES_PATH .'/check.png" title="FENEDIF" /> Maria Luisa Carrillo <br>
                        </p>';
 * 
 */
            return $retval;
        }

        //Menu - Paginas Publico
        private function getStrMenuPaginasPublico()
        {
            $retval = "";
            $retval .= $this->getStrMenuPublicoInicio();
            //$retval .= $this->getStrMenuPublicoHistoria();
            $retval .= $this->getStrMenuPublicoAntecedentes();
            $retval .= $this->getStrMenuPublicoMision();
            $retval .= $this->getStrMenuPublicoVision();            
            $retval .= $this->getStrMenuPublicoQuienesSomos();
            $retval .= $this->getStrMenuPublicoContactanos();
            $retval .= $this->getStrMenuPublicoServicios();
            $retval .= $this->getStrMenuPublicoIngresarSistema();
			
            return $retval;
        }

        //Menu - Publico Inicio
        private function getStrMenuPublicoInicio()
        {
            $retval = '
                        <li>
                            <div class="vtip" title="&lt;&lt; Men&uacute; Inicio &gt;&gt;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Informaci&oacute;n de Bienvenida al Sistema <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FENEDIF">
                                <a href="'. INICIO_URL .'?btnpagina=pagina-publico-inicio">
                                    &nbsp;&nbsp;
                                    <img src="'. IMAGENES_PATH .'/inicio.png" title="" border="0" />
                                    Inicio
                                </a>
                            </div>
                        </li>
                      ';
            return $retval;
        }

        //Menu - Publico Historia
        private function getStrMenuPublicoHistoria()
        {
            $retval = '
                        <li>
                            <div class="vtip" title="&lt;&lt; Men&uacute; Historia &gt;&gt;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Informaci&oacute;n de la Historia de la  <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FENEDIF">
                                <a href="'. INICIO_URL .'?btnpagina=pagina-publico-ingresarsistema">
                                    &nbsp;&nbsp;
                                    <img src="'. IMAGENES_PATH .'/historia.png" title="" border="0" />
                                    Historia
                                </a>
                            </div>
                        </li>
                      ';
            return $retval;
        }

        //Menu - Publico Antecedentes
        private function getStrMenuPublicoAntecedentes()
        {
            $retval = '
                        <li>
                            <div class="vtip" title="&lt;&lt; Men&uacute; Antecedentes &gt;&gt;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Informaci&oacute;n de los Antecedentes de la  <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FENEDIF">
                                <a href="'. INICIO_URL .'?btnpagina=pagina-publico-antecedentes">
                                    &nbsp;&nbsp;
                                    <img src="'. IMAGENES_PATH .'/antecedentes.png" title="" border="0" />
                                    Antecendentes
                                </a>
                            </div>
                        </li>
                      ';
            return $retval;
        }

        //Menu - Publico Mision
        private function getStrMenuPublicoMision()
        {
            $retval = '
                        <li>
                            <div class="vtip" title="&lt;&lt; Men&uacute; Misi&oacute;n &gt;&gt;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Informaci&oacute;n de la Misi&oacute;n de la  <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FENEDIF">
                                <a href="'. INICIO_URL .'?btnpagina=pagina-publico-mision">
                                    &nbsp;&nbsp;
                                    <img src="'. IMAGENES_PATH .'/mision.png" title="" border="0" />
                                    Misi&oacute;n
                                </a>
                            </div>
                        </li>
                      ';
            return $retval;
        }

        //Menu - Publico Vision
        private function getStrMenuPublicoVision()
        {
            $retval = '
                        <li>
                            <div class="vtip" title="&lt;&lt; Men&uacute; Visi&oacute;n &gt;&gt;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Informaci&oacute;n de la Visi&oacute;n de la  <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FENEDIF">
                                <a href="'. INICIO_URL .'?btnpagina=pagina-publico-vision">
                                    &nbsp;&nbsp;
                                    <img src="'. IMAGENES_PATH .'/vision.png" title="" border="0" />
                                    Visi&oacute;n
                                </a>
                            </div>
                        </li>
                      ';
            return $retval;
        }

        //Menu - Publico Servicios
        private function getStrMenuPublicoServicios()
        {
            $retval = '
                        <li>
                            <div class="vtip" title="&lt;&lt; Men&uacute; Servicios &gt;&gt;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Informaci&oacute;n de los Servicios de la  <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FENEDIF">
                                <a href="'. INICIO_URL .'?btnpagina=pagina-publico-servicios">
                                    &nbsp;&nbsp;
                                    <img src="'. IMAGENES_PATH .'/servicios.png" title="" border="0" />
                                    Servicios
                                </a>
                            </div>
                        </li>
                      ';
            return $retval;
        }

        //Menu - Publico Quienes somos
        private function getStrMenuPublicoQuienesSomos()
        {
            $retval = '
                        <li>
                            <div class="vtip" title="&lt;&lt; Men&uacute; Quienes Somos &gt;&gt;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Informaci&oacute;n de Quienes Somos de la  <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FENEDIF">
                                <a href="'. INICIO_URL .'?btnpagina=pagina-publico-quienes-somos">
                                    &nbsp;&nbsp;
                                    <img src="'. IMAGENES_PATH .'/quienessomos.png" title="" border="0" />
                                    Quienes Somos
                                </a>
                            </div>
                        </li>
                      ';
            return $retval;
        }

        //Menu - Publico Contactanos
        private function getStrMenuPublicoContactanos()
        {
            $retval = '
                        <li>
                            <div class="vtip" title="&lt;&lt; Men&uacute; Cont&aacute;ctanos &gt;&gt;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Informaci&oacute;n de Cont&aacute;ctos para la  <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FENEDIF">
                                <a href="'. INICIO_URL .'?btnpagina=pagina-publico-contactanos">
                                    &nbsp;&nbsp;
                                    <img src="'. IMAGENES_PATH .'/contactanos.png" title="" border="0" />
                                    Cont&aacute;ctanos
                                </a>
                            </div>
                        </li>
                      ';
            return $retval;
        }

        //Menu - Publico Ingresar al Sistema
        private function getStrMenuPublicoIngresarSistema()
        {
            $retval = '
                        <li>
                            <div class="vtip" title="&lt;&lt; Men&uacute; Ingresar al Sistema &gt;&gt;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Informaci&oacute;n del Inicio de Sesi&oacute;n <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FENEDIF">
                                <a href="'. INICIO_URL .'?btnpagina=pagina-publico-ingresar-sistema">
                                    &nbsp;&nbsp;
                                    <img src="'. IMAGENES_PATH .'/ingresarsistema.png" title="" border="0" />
                                    Ingresar al Sistema
                                </a>
                            </div>
                        </li>
                      ';
            return $retval;
        }

        //Informacion - Pagina publico inicio
        private function getStrInformacionPaginaPublicoInicio() {
            //$retval =  '<br>';
            $retval .= '<h1><center>FENEDIF</center></h1>';
            $retval .= '<h1><center></center></h1>';
            $retval .= '<p align="center">
                        <img src="'. IMAGENES_PATH .'/1.jpg" title="FENEDIF" />
                       </p>
                      ';
            return $retval;
        }

        //Informacion - Pagina publico Historia
        private function getStrInformacionPaginaPublicoHistoria() {
            //$retval =  '<br>';
            $retval .= '<h1><center>Historia</center></h1>';
            $retval .= '<p align="justify">
                            La , se crea el primero de enero de 1946, bajo un an&aacute;isis somero y efectivo de los gobernantes de aquella �poca, como medio de soluci�n a las necesidades y requerimientos de los pueblos m�s alejados por el Poder Central. Su historia ha sido dilatada desde el inicio de su gesti�n, por carencia de un cuerpo legal que norme sus responsabilidades, derechos y obligaciones.
                            <br><br>                            
                            El 24 de Enero de 1969, la Comisi�n Legislativa Permanente del H. Congreso Nacional deroga el T&iacute;ulo VI de la Ley de R�gimen Administrativo y todas las leyes y decretos que se opongan a la Ley de R�gimen Provincial, recibiendo el Ejec&iacute;ese del Se�or Presidente de la Rep�blica del Ecuador, Dr. Jos� Mar�a Velasco Ibarra, en el Palacio de Gobierno, en Quito al 4 de Febrero de 1969.
                       </p>
                      ';
            $retval .= '<p align="center">
                            <img src="'. IMAGENES_PATH .'/historia.jpg" title="FENEDIF" />
                        </p>';
            return $retval;
        }

        //Informacion - Pagina publico Antecedenetes
        private function getStrInformacionPaginaPublicoAntecedentes() {
            //$retval =  '<br>';
            $retval .= '<h1><center>Antecedentes</center></h1>';
            $retval .= '<p align="justify">
                            INCLUSIÓN LABORAL DE  PERSONAS CON DISCAPACIDAD
                </p>
                      ';   
					              
  $retval .= '<p align="justify">
                   
                     
En el año 2006, la ley ecuatoriana en tema de discapacidad era una de las más completas y desarrolladas de Latinoamérica, sin embargo la  población con discapacidad de nuestro país todavía se encontraba social y políticamente marginada, enfrentando constantemente la violación de derechos fundamentales como el derecho a la salud, a la educación, y al trabajo.
 
Frente a esta realidad, las cinco Federaciones Nacionales de y para la Discapacidad, que representan a un total aproximado de 32.000 personas, ejecutaron desde ese mismo  año una propuesta para promover el ejercicio de los derechos políticos y laborales de la población con discapacidad.
 
En este contexto, la Federación Nacional de Ecuatorianos con Discapacidad Física (FENEDIF) que es la coordinadora de la gestión de las cinco federaciones,  fue desde un principio la unidad ejecutora de lo que se denominó “Servicio de Integración Laboral de las Federaciones Nacionales de y para la Discapacidad” (SIL) como veremos en las siguientes líneas hoy se trata de uno de los más exitosos programas de inserción laboral en nuestro país con una gran influencia y proyección a nivel internacional. 
 
La finalidad principal de este importante programa es la de exigir el cumplimiento de la Ley Reformatoria al Código del Trabajo vigente desde enero del 2006 que dispone la obligatoriedad de contratar a personas con discapacidad en entidades privadas de acuerdo con la siguiente cronología:
   </p>
                      '; 
  $retval .= '<p align="justify">					   
•         2006: 1 trabajador de cada 25 personas deberá ser persona con discapacidad
   </p>
                      ';
					    $retval .= '<p align="justify">	 
					  
•         2007: 1% de los empleados deberán ser personas con discapacidad
   </p>
                      ';
					   $retval .= '<p align="justify">
•         2008: 2% de los empleados deberán ser personas con discapacidad
   </p>
                      ';
					   $retval .= '<p align="justify"> 	
•         2009: 3% de los empleados deberán ser personas con discapacidad
   </p>
                      ';
 $retval .= '<p align="justify"> 					  
•         2010: 4% de los empleados deberán ser personas con discapacidad
    </p>
                      ';
 $retval .= '<p align="justify"> 					  
Para este fin se propusieron dos estrategias; i (sensibilizar a empleadores públicos y privados para promover la inserción laboral de personas con discapacidad); ii (y la otra destinada a fortalecer y ampliar el trabajo que llevan adelante los SIL existentes. Estrategias que son operativizadas por actividades de promoción, orientación, sensibilización, monitoreo y capacitación formal y alternativa. El sector público se rige, en esta materia, por lo dispuesto en la Ley Orgánica del Servicio Público (LOSEP), la que determina una diferente escala de inserción  (2011  2%, 2012  3% y a partir del año 2013 es del 4%).

 

El desarrollo e impulso del programa de inserción laboral ha sido de rápida evolución, inició en septiembre del 2006 con tan solo dos oficinas una en Quito y una en Guayaquil;  en el año 2009 se abrieron las oficinas de Azuay, Manabí, Los Ríos y El Oro; y en el año 2010, se crearon tres nuevas oficinas del SIL en Imbabura, Santo Domingo de los Tsáchilas y una bi provincial para Sucumbíos y Orellana; en el año 2012 abrieron sus puertas los SIL de Cotopaxi y Tungurahua. Desde septiembre del 2015 tenemos oficinas en las 23 provincias ecuatorianas para atender a la población local con discapaciad.
 
Cabe señalar que el SIL cuenta con el  financiamiento de organismo de cooperación internacional, del Consejo Nacional de la Igualdad en Discapacidad (CONADIS), PETROAMAZONAS EP y otras empresas privadas.
							

                       </p>
                      ';
            $retval .= '<p align="center">
                            <img src="'. IMAGENES_PATH .'/1.jpg" title="FENEDIF" />
                        </p>';
            return $retval;
        }

        //Informacion - Pagina publico Mision
        private function getStrInformacionPaginaPublicoMision() {
            //$retval =  '<br>';
            $retval .= '<h1><center>Misi&oacute;n</center></h1>';
            $retval .= '<p align="justify">
                        FENEDIF es una entidad sin fines de lucro, que agrupa a asociaciones de personas con discapacidad física legalmente constituidas, cuya finalidad es fortalecer el trabajo de sus filiales mediante capacitación, intercambio de experiencias, recursos e información con el fin de lograr su visibilidad, autonomía y sostenibilidad.
                       </p>
                      ';
            $retval .= '<p align="center">
                            <img src="'. IMAGENES_PATH .'/1.jpg" title="FENEDIF" />
                        </p>';
            return $retval;
        }

        //Informacion - Pagina publico Vision
        private function getStrInformacionPaginaPublicoVision() {
            //$retval =  '<br>';
            $retval .= '<h1><center>Visi&oacute;n</center></h1>';
            $retval .= '<p align="justify">
Cree en un movimiento asociativo de la discapacidad sólido, visible, sostenible, con protagonismo social, con líderes capaces y generando una sociedad inclusiva con igualdad de deberes y derechos; trabaja por la visibilidad y el reconocimiento de las personas con discapacidad frente a los gobiernos locales, provinciales y nacionales.  
                       </p>
                      ';
            $retval .= '<p align="center">
                            <img src="'. IMAGENES_PATH .'/1.jpg" title="FENEDIF" />
                        </p>';
            return $retval;
        }

        //Informacion - Pagina publico Quienes Somos
        private function getStrInformacionPaginaPublicoQuienesSomos() {
            //$retval =  '<br>';
            $retval .= '<h1><center>Quienes Somos</center></h1>';
            $retval .= '<p align="justify">
                            La Federación Nacional de Ecuatorianos con Discapacidad Física FENEDIF, es una entidad sin fines de lucro, que agrupa a asociaciones de personas con discapacidad física legalmente constituidas, cuya finalidad es fortalecer el trabajo de sus filiales mediante capacitación, intercambio de experiencias, recursos e información con el fin de lograr su visibilidad, autonomía y sostenibilidad. Está federación cree en un movimiento asociativo de la discapacidad sólido, visible, sostenible, con protagonismo social, con líderes capaces y generando una sociedad inclusiva con igualdad de deberes y derechos es por eso que trabaja por la visibilidad y el reconocimiento de las personas con discapacidad frente a los gobiernos locales, provinciales y nacionales.

Apostamos por una sociedad más justa y equitativa y somos conscientes de ser los protagonistas de todos los cambios que permitan construir un mundo más humano, equitativo e incluyente.
							
                       </p>
                      ';
            $retval .= '<p align="center">
                            <img src="'. IMAGENES_PATH .'/1.jpg" title="FENEDIF" />
                        </p>';
            return $retval;
        }

        //Informacion - Pagina publico Cotactanos
        private function getStrInformacionPaginaPublicoContactanos() {
            //$retval =  '<br>';
            $retval .= '<h1><center>Cont&aacute;ctanos</center></h1>';            
            $retval .= '<p align="center">
                            <img src="'. IMAGENES_PATH .'/1.jpg" title="FENEDIF" />
                        </p>';
            $retval .= '<p align="center">
                           Horario de atención: Lunes a Viernes de 8:00 am a 16:30 pm Casilla: 17-17733

Av. 10 de Agosto 5451(N37-193) entre Villalengua y Barón de Carondelet
(593-2) 2456-088 Fax: ext. 111
fenedif@gmail.com
info@fenedif.org


                       </p>
                      ';
            return $retval;
        }

        //Informacion - Pagina publico Servicios
        private function getStrInformacionPaginaPublicoServicios() {
            //$retval =  '<br>';
           $retval .= '<h1><center>Servicios</center></h1>';
            $retval .= '<p align="justify">
                            Servicio de Integración Laboral
     </p> ';
 $retval .= '<p align="justify">                     
El Servicio de Integración Laboral de Personas con Discapacidad (SIL), de la Federación Nacional de Ecuatorianos con Discapacidad Física (FENEDIF) es un programa especializado en la integración laboral normalizada de personas con discapacidad, que permite brindar a este sector de atención prioritaria, orientación, promoción laboral, información sobre el mercado de trabajo, auto evaluación socio profesional, capacitación, bolsa dinámica de trabajo, asesoramiento y apoyo en el proceso de integración laboral, en forma gratuita. El Servicio de Integración Laboral SIL está dirigido a la orientación del usuario para ubicar un puesto de trabajo y/o para mejoramiento del perfil laboral a través de una capacitación puntual de la persona con discapacidad que está en búsqueda de empleo. La persona con discapacidad, usuaria del Servicio SIL, será parte de un proceso que le apoyará en la integración laboral.
     </p> ';
 $retval .= '<p align="justify">  
Call Center
 </p> ';
  $retval .= '<p align="justify">  
La Federación Nacional de Ecuatorianos con Discapacidad Física – FENEDIF, a fin de fortalecer el trabajo de sus movimientos asociativos y de la población ecuatoriana con discapacidad y lograr la visibilidad y sostenibilidad para los distintos proyectos que promueve como por ejemplo integración laboral, emprendimientos productivos, turismo accesible, control social, jóvenes, género y mujeres, entre otros, oferta en la actualidad su SERVICIO DE CALL CENTER dirigido a medianas y pequeñas empresas del sector privado que buscan el fortalecimiento de su relación Cliente-Empresa dentro de su organización.
 </p> ';
   $retval .= '<p align="justify">  
Guía de turismo accesible
 </p> ';
    $retval .= '<p align="justify">
Esta Guía, primera de este tipo a nivel nacional, tiene como objetivo brindar información para que las personas con discapacidad gocen de pleno acceso a actividades turísticas, culturales y de recreación.

Visita el portal web: turismo.fenedif.org
							
						</p>
                      ';			  	  	  	          			          
            $retval .= '<p align="center">
                            <img src="'. IMAGENES_PATH .'/1.jpg" title="FENEDIF" />
                        </p>';
            return $retval;
        }
		private function getStrMenuSadministrador()
        {
            $retval .= $this->getStrMenuInicio();   
			$retval .= $this->getStrMenuNinos();
			$retval .= $this->getStrMenuPdiscapacidad();
			$retval .= $this->getStrMenuSustitutos();
			$retval .= $this->getStrMenuPsicologico();
			$retval .= $this->getStrMenuTerapeutico();
			$retval .= $this->getStrMenuAterapeutica();
			$retval .= $this->getStrMenuTerapia();
			$retval .= $this->getStrMenuVfamiliares();
			
			//$retval .= $this->getStrMenuUsuario(); 
			$retval .= $this->getStrMenuEmpresa();          
            $retval .= $this->getStrMenuCformativo();
            $retval .= $this->getStrMenuEmpleo();
			// $retval .= $this->getStrMenuSeguimiento();
			$retval .= $this->getStrMenuAgenda();
			$retval .= $this->getStrMenuAmpliacion();  
			$retval .= $this->getStrMenuEmprendimiento();
			$retval .= $this->getStrMenuReporte();
			$retval .= $this->getStrMenuBusqueda();
            $retval .= $this->getStrMenuContrasena();            
			$retval .= $this->getStrMenuTsucursal();
            $retval .= $this->getStrMenuSalir();

            return $retval;
        }
private function getStrMenuMonitoreoSil()
        {
            $retval .= $this->getStrMenuInicio();   
			//$retval .= $this->getStrMenuNinos();
			//$retval .= $this->getStrMenuPdiscapacidad();
			//$retval .= $this->getStrMenuSustitutos();
			//$retval .= $this->getStrMenuPsicologico();
			//$retval .= $this->getStrMenuTerapeutico();
			//$retval .= $this->getStrMenuAterapeutica();
			//$retval .= $this->getStrMenuTerapia();
			//$retval .= $this->getStrMenuVfamiliares();
			
			//$retval .= $this->getStrMenuEmpresa();          
            //$retval .= $this->getStrMenuCformativo();
           // $retval .= $this->getStrMenuEmpleo();
			// $retval .= $this->getStrMenuSeguimiento();
			//$retval .= $this->getStrMenuAgenda();
			//$retval .= $this->getStrMenuAmpliacion();  
			//$retval .= $this->getStrMenuEmprendimiento();
			$retval .= $this->getStrMenuReporte();
			$retval .= $this->getStrMenuBusqueda();
           //$retval .= $this->getStrMenuContrasena();            
			$retval .= $this->getStrMenuTsucursal();
            $retval .= $this->getStrMenuSalir();

            return $retval;
        }
private function getStrMenuPromotor()
        {
            $retval .= $this->getStrMenuInicio();   
			$retval .= $this->getStrMenuNinos();
			$retval .= $this->getStrMenuPdiscapacidad();
			$retval .= $this->getStrMenuSustitutos();
			//$retval .= $this->getStrMenuPsicologico();
			//$retval .= $this->getStrMenuTerapeutico();
			//$retval .= $this->getStrMenuAterapeutica();
			//$retval .= $this->getStrMenuTerapia();
			//$retval .= $this->getStrMenuVfamiliares();
			
			//$retval .= $this->getStrMenuUsuario(); 
			$retval .= $this->getStrMenuEmpresa();          
            $retval .= $this->getStrMenuCformativo();
            $retval .= $this->getStrMenuEmpleo();
			// $retval .= $this->getStrMenuSeguimiento();
			$retval .= $this->getStrMenuAgenda();
			$retval .= $this->getStrMenuAmpliacion();  
			$retval .= $this->getStrMenuEmprendimiento();
			$retval .= $this->getStrMenuReporte();
			$retval .= $this->getStrMenuBusqueda();
            //$retval .= $this->getStrMenuContrasena();            
			//$retval .= $this->getStrMenuTsucursal();
            $retval .= $this->getStrMenuSalir();

            return $retval;
        }
private function getStrMenuMonitoreo()
        {
            $retval .= $this->getStrMenuInicio();   
			$retval .= $this->getStrMenuNinos();
			$retval .= $this->getStrMenuPdiscapacidad();
			$retval .= $this->getStrMenuSustitutos();
			//$retval .= $this->getStrMenuPsicologico();
			//$retval .= $this->getStrMenuTerapeutico();
			//$retval .= $this->getStrMenuAterapeutica();
			//$retval .= $this->getStrMenuTerapia();
			//$retval .= $this->getStrMenuVfamiliares();
			
			//$retval .= $this->getStrMenuUsuario(); 
			$retval .= $this->getStrMenuEmpresa();          
            $retval .= $this->getStrMenuCformativo();
            $retval .= $this->getStrMenuEmpleo();
			// $retval .= $this->getStrMenuSeguimiento();
			$retval .= $this->getStrMenuAgenda();
			$retval .= $this->getStrMenuAmpliacion();  
			$retval .= $this->getStrMenuEmprendimiento();
			$retval .= $this->getStrMenuReporte();
			$retval .= $this->getStrMenuBusqueda();
            $retval .= $this->getStrMenuContrasena();            
			//$retval .= $this->getStrMenuTsucursal();
            $retval .= $this->getStrMenuSalir();

            return $retval;
        }
private function getStrMenuEmprendimientos()
        {
            $retval .= $this->getStrMenuInicio();   
			$retval .= $this->getStrMenuNinos();
			$retval .= $this->getStrMenuPdiscapacidad();
			$retval .= $this->getStrMenuSustitutos();
			//$retval .= $this->getStrMenuPsicologico();
			//$retval .= $this->getStrMenuTerapeutico();
			//$retval .= $this->getStrMenuAterapeutica();
			//$retval .= $this->getStrMenuTerapia();
			//$retval .= $this->getStrMenuVfamiliares();
			
			//$retval .= $this->getStrMenuUsuario(); 
			$retval .= $this->getStrMenuEmpresa();          
            $retval .= $this->getStrMenuCformativo();
            $retval .= $this->getStrMenuEmpleo();
			// $retval .= $this->getStrMenuSeguimiento();
			$retval .= $this->getStrMenuAgenda();
			$retval .= $this->getStrMenuAmpliacion();  
			$retval .= $this->getStrMenuEmprendimiento();
			$retval .= $this->getStrMenuReporte();
			$retval .= $this->getStrMenuBusqueda();
            //$retval .= $this->getStrMenuContrasena();            
			//$retval .= $this->getStrMenuTsucursal();
            $retval .= $this->getStrMenuSalir();

            return $retval;
        }
private function getStrMenuLegal()
        {
            $retval .= $this->getStrMenuInicio();   
			//$retval .= $this->getStrMenuNinos();
			$retval .= $this->getStrMenuPdiscapacidad();
			//$retval .= $this->getStrMenuSustitutos();
			//$retval .= $this->getStrMenuPsicologico();
			//$retval .= $this->getStrMenuTerapeutico();
			//$retval .= $this->getStrMenuAterapeutica();
			//$retval .= $this->getStrMenuTerapia();
			//$retval .= $this->getStrMenuVfamiliares();
			
			//$retval .= $this->getStrMenuUsuario(); 
			//$retval .= $this->getStrMenuEmpresa();          
            $retval .= $this->getStrMenuCformativo();
            //$retval .= $this->getStrMenuEmpleo();
			// $retval .= $this->getStrMenuSeguimiento();
			$retval .= $this->getStrMenuAgenda();
			//$retval .= $this->getStrMenuAmpliacion();  
			//$retval .= $this->getStrMenuEmprendimiento();
			$retval .= $this->getStrMenuReporte();
			$retval .= $this->getStrMenuBusqueda();
            //$retval .= $this->getStrMenuContrasena();            
			//$retval .= $this->getStrMenuTsucursal();
            $retval .= $this->getStrMenuSalir();

            return $retval;
        }
private function getStrMenuPsicologo()
        {
            $retval .= $this->getStrMenuInicio();   
			$retval .= $this->getStrMenuNinos();
			$retval .= $this->getStrMenuPdiscapacidad();
			$retval .= $this->getStrMenuSustitutos();
			$retval .= $this->getStrMenuPsicologico();
			$retval .= $this->getStrMenuTerapeutico();
			$retval .= $this->getStrMenuAterapeutica();
			$retval .= $this->getStrMenuTerapia();
			$retval .= $this->getStrMenuVfamiliares();
			
			//$retval .= $this->getStrMenuUsuario(); 
			//$retval .= $this->getStrMenuEmpresa();          
            $retval .= $this->getStrMenuCformativo();
            //$retval .= $this->getStrMenuEmpleo();
			// $retval .= $this->getStrMenuSeguimiento();
			$retval .= $this->getStrMenuAgenda();
			//$retval .= $this->getStrMenuAmpliacion();  
			//$retval .= $this->getStrMenuEmprendimiento();
			$retval .= $this->getStrMenuReporte();
			$retval .= $this->getStrMenuBusqueda();
            //$retval .= $this->getStrMenuContrasena();            
			//$retval .= $this->getStrMenuTsucursal();
            $retval .= $this->getStrMenuSalir();

            return $retval;
        }
      	private function getStrMenuOrientador()
        	{
            $retval .= $this->getStrMenuInicio();   
			$retval .= $this->getStrMenuNinos();
			$retval .= $this->getStrMenuPdiscapacidad();
			$retval .= $this->getStrMenuSustitutos();
			//$retval .= $this->getStrMenuPsicologico();
			//$retval .= $this->getStrMenuTerapeutico();
			//$retval .= $this->getStrMenuAterapeutica();
			//$retval .= $this->getStrMenuTerapia();
			//$retval .= $this->getStrMenuVfamiliares();
			
			//$retval .= $this->getStrMenuUsuario(); 
			//$retval .= $this->getStrMenuEmpresa();          
            $retval .= $this->getStrMenuCformativo();
            //$retval .= $this->getStrMenuEmpleo();
			// $retval .= $this->getStrMenuSeguimiento();
			$retval .= $this->getStrMenuAgenda();
			$retval .= $this->getStrMenuAmpliacion();  
			$retval .= $this->getStrMenuEmprendimiento();
			$retval .= $this->getStrMenuReporte();
			$retval .= $this->getStrMenuBusqueda();
            //$retval .= $this->getStrMenuContrasena();            
			//$retval .= $this->getStrMenuTsucursal();
            $retval .= $this->getStrMenuSalir();

            return $retval;
        }  
        private function getStrMenuAdministrador()
        {
            $retval .= $this->getStrMenuInicio();   
			//$retval .= $this->getStrMenuNinos();
			//$retval .= $this->getStrMenuPdiscapacidad();
			//$retval .= $this->getStrMenuSustitutos();
			//$retval .= $this->getStrMenuPsicologico();
			//$retval .= $this->getStrMenuTerapeutico();
			//$retval .= $this->getStrMenuAterapeutica();
			//$retval .= $this->getStrMenuTerapia();
			//$retval .= $this->getStrMenuVfamiliares();
			//$retval .= $this->getStrMenuUsuario(); 
			//$retval .= $this->getStrMenuEmpresa();          
            //$retval .= $this->getStrMenuCformativo();
            //$retval .= $this->getStrMenuEmpleo();
			// $retval .= $this->getStrMenuSeguimiento();
			$retval .= $this->getStrMenuAgenda();
			//$retval .= $this->getStrMenuAmpliacion();  
			//$retval .= $this->getStrMenuEmprendimiento();
			$retval .= $this->getStrMenuReporte();
            //$retval .= $this->getStrMenuContrasena();            
			//$retval .= $this->getStrMenuTsucursal();
			$retval .= $this->getStrMenuBusqueda();
            $retval .= $this->getStrMenuSalir();

            return $retval;
        }
		 private function getStrMenuRegistrador()
        {
            $retval .= $this->getStrMenuInicio();   
			$retval .= $this->getStrMenuNinos();
			$retval .= $this->getStrMenuPdiscapacidad();
			$retval .= $this->getStrMenuSustitutos();
			$retval .= $this->getStrMenuPsicologico();
			$retval .= $this->getStrMenuTerapeutico();
			$retval .= $this->getStrMenuAterapeutica();
			$retval .= $this->getStrMenuTerapia();
			$retval .= $this->getStrMenuVfamiliares();
			//$retval .= $this->getStrMenuUsuario(); 
			$retval .= $this->getStrMenuEmpresa();          
            $retval .= $this->getStrMenuCformativo();
            $retval .= $this->getStrMenuEmpleo();
			// $retval .= $this->getStrMenuSeguimiento();
			$retval .= $this->getStrMenuAgenda();
			$retval .= $this->getStrMenuAmpliacion();  
			$retval .= $this->getStrMenuEmprendimiento();
			$retval .= $this->getStrMenuReporte();
            //$retval .= $this->getStrMenuContrasena();            

            $retval .= $this->getStrMenuSalir();

            return $retval;
        }
		private function getStrMenuGestor()
        {
            $retval .= $this->getStrMenuInicio();   
			$retval .= $this->getStrMenuNinos();
			$retval .= $this->getStrMenuPdiscapacidad();
			//$retval .= $this->getStrMenuSustitutos();
			//$retval .= $this->getStrMenuPsicologico();
			//$retval .= $this->getStrMenuTerapeutico();
			$retval .= $this->getStrMenuAterapeutica();
			$retval .= $this->getStrMenuTerapia();
			$retval .= $this->getStrMenuVfamiliares();
			//$retval .= $this->getStrMenuUsuario(); 
			$retval .= $this->getStrMenuEmpresa();          
            $retval .= $this->getStrMenuCformativo();
            $retval .= $this->getStrMenuEmpleo();
			// $retval .= $this->getStrMenuSeguimiento();
			$retval .= $this->getStrMenuAgenda();
			$retval .= $this->getStrMenuAmpliacion();  
			$retval .= $this->getStrMenuEmprendimiento();
			$retval .= $this->getStrMenuReporte();
            //$retval .= $this->getStrMenuContrasena();            

            $retval .= $this->getStrMenuSalir();

            return $retval;
        }

  //Menu Inicio
        private function getStrMenuInicio()
        {
            $retval = '
                    <a href="'. HOST .NAME.'/index.php">
                            <img src="'. IMAGENES_PATH .'/home.png" style="border: 0px none;">
                    </a>';
            return $retval;
        }

        //Menu Salir
        private function getStrMenuSalir()
        {
            $retval = '
                    <a href="'. LOGIN_URL .'logout.php">
                            <img src="'. IMAGENES_PATH .'/salir.png" style="border: 0px none;">
                    </a>';

            return $retval;
        }
		

     
        //Menu Medico
        
		private function getStrMenuNinos()
        {
            $retval = '
                    <a href="'. NINOS_URL .'ninos.php"><img src="'. IMAGENES_PATH .'/ninoss.png" style="border: 0px none;"></a>';
            return $retval;
        }
		private function getStrMenuPdiscapacidad()
        {
            $retval = '
                    <a href="'. PDISCAPACIDAD_URL.'pdiscapacidad.php"><img src="'. IMAGENES_PATH .'/discapacidad.png" style="border: 0px none;"></a>';
            return $retval;
        }
private function getStrMenuTerapia()
        {
            $retval = '
                    <a href="'. TERAPIA_URL.'terapia.php"><img src="'. IMAGENES_PATH .'/terapia.png" style="border: 0px none;"></a>';
            return $retval;
        }
		//// Tsucursal
private function getStrMenuTsucursal()
        {
            $retval = '
                    <a href="'.TSUCURSAL_URL.'tsucursal.php"><img src="'. IMAGENES_PATH .'/sucursal.png" style="border: 0px none;"></a>';
            return $retval;
        }		
private function getStrMenuVfamiliares()
        {
            $retval = '
                    <a href="'.VFAMILIARES_URL.'vfamiliares.php"><img src="'. IMAGENES_PATH .'/vfamiliares.png" style="border: 0px none;"></a>';
            return $retval;
        }		
private function getStrMenuTerapeutico()
        {
            $retval = '
                    <a href="'.PTERAPEUTICO_URL.'pterapeutico.php"><img src="'. IMAGENES_PATH .'/psicoterapeutico.png" style="border: 0px none;"></a>';
            return $retval;
        }	
private function getStrMenuAterapeutica()
        {
            $retval = '
                    <a href="'. ATERAPEUTICA_URL.'aterapeutica.php"><img src="'. IMAGENES_PATH .'/paterapeutica.png" style="border: 0px none;"></a>';
            return $retval;
        }			
	private function getStrMenuSustitutos()
        {
            $retval = '
                    <a href="'. SUSTITUTOS_URL.'sustitutos.php"><img src="'. IMAGENES_PATH .'/sustitutos.png" style="border: 0px none;"></a>';
            return $retval;
        }

		private function getStrMenuEmpresa()
        {
           $retval = '
                    <a href="'. EMPRESAS_URL.'empresas.php"><img src="'. IMAGENES_PATH .'/empresas.png" style="border: 0px none;"></a>';
            return $retval;
        }
        private function getStrMenuCformativo()
        {
            $retval = '
                    <a href="'. CFORMATIVO_URL .'cformativo.php"><img src="'. IMAGENES_PATH .'/centro.png" style="border: 0px none;"></a>';
            return $retval;
        }
		
		private function getStrMenuEmpleo()
        {
            $retval = '
                    <a href="'. TEMPRESA_URL .'tempresa.php"><img src="'. IMAGENES_PATH .'/empleo.png" style="border: 0px none;"></a>';
            return $retval;
        }
//////////////psicologico //////////////////////////
		private function getStrMenuPsicologico()
        {
           $retval = '
                    <a href="'.PSICOLOGO_URL.'psicologo.php"><img src="'. IMAGENES_PATH .'/ipsicologico.png" style="border: 0px none;"></a>';
            return $retval;
        }
		
		private function getStrMenuAgenda()
        {
            $retval = '
                    <a href="'.TAGENDA_URL .'tagenda.php"><img src="'. IMAGENES_PATH .'/agenda.png" style="border: 0px none;"></a>';
            return $retval;
        }
		private function getStrMenuAmpliacion()
        {
            $retval = '
                    <a href="'. TAMPLIACION_URL.'tampliacion.php"><img src="'. IMAGENES_PATH .'/negocio.png" style="border: 0px none;"></a>';
            return $retval;
        }
       		private function getStrMenuEmprendimiento()
        {
            $retval = '
                    <a href="'. TEMPRENDIMIENTO_URL .'temprendimiento.php"><img src="'. IMAGENES_PATH .'/emprendimiento.png" style="border: 0px none;"></a>';
            return $retval;
        } 
		private function getStrMenuBusqueda()
        {
            $retval = '
                    <a href="'. BUSQUEDA_URL .'busqueda.php?btnbusqueda-acceso=a">
                            <img src="'. IMAGENES_PATH .'/busquedas.png" style="border: 0px none;">
                    </a>';
            return $retval;
        }
		//Menu Reporte
        private function getStrMenuReporte()
        {
           
         $retval = '
            
                    <a target="_blank" href="http://discapacidadesecuador.org/reportes/mod_inicio/index.php?usuario='.$_SESSION["usuario"]["cuenta"].'" >
                            <img src="'. IMAGENES_PATH .'/btnreporte.png" style="border: 0px none;">
                    </a>';
            return $retval;   
       /* $retval = '
            
                    <a target="_blank" href="http://localhost/reportes/mod_inicio?usuario='.$_SESSION["usuario"]["cuenta"].'" >
                            <img src="'. IMAGENES_PATH .'/btnreporte.png" style="border: 0px none;" >
                    </a>';
            return $retval;*/
        }
         //Menu Especialidad Medico
       
        //Menu Administracion
 
        //Menu Cambiar Contrase�a
        private function getStrMenuContrasena()
        {
            $retval = '
                    <a href="'. CONTRASENA_URL .'contrasena.php">
                            <img src="'. IMAGENES_PATH .'/btncontrasena.png" style="border: 0px none;">
                    </a>';
            return $retval;
        }



       }
?>