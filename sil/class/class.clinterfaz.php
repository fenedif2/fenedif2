<?php include('../caching/cache.start.php'); ?>
<?php
    session_start();
    include_once( CLASS_PATH . "class.clmenu.php" );
    class clInterfaz
    {
    // Variables
        private $strMenu;
        private $strCentro;

        public function __construct()
        {
            $this->strMenu = "";
            $this->strstrCentro = "";
        }

        // Funciones Get y Set de la Clase clInterfaz
        public function getStrMenu()
        {
            return $this->strMenu;
        }

        public function setStrMenu($m)
        {
            $this->strMenu = $m;
        }

        public function getStrCentro()
        {
            return $this->strCentro;
        }

        public function setStrCentro($c)
        {
            $this->strCentro = $c;
        }

        public function getStrInterfaz()
        {            

            $logo = '<img src="'. IMAGENES_PATH .'/logo.jpg" title="Logo">';
			$pie = '<img src="'. IMAGENES_PATH .'/footer.png" title="LogoPie">';
                
            if(isset($_SESSION["usuario"]))
            {
                $NombresApellidos = '<img src="'. IMAGENES_PATH .'/usuario.png" title="Usuario">&nbsp;' . "Bienvenido (a): ".$_SESSION["usuario"]["nombres"]." ".$_SESSION["usuario"]["apellidos"];
                $UsuarioSesion = '<table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                     <tr>
                                 				              <td align="left" class="fecha">&nbsp;&nbsp;
                                                              <img src="'. IMAGENES_PATH .'/tipousuario.png" width="16px" height="16px" alt="" align="top"></img>
                                    							&nbsp;'. $_SESSION["usuario"]["tipodescripcion"] .'      
                                                            </td>
                                                            <td class="bienvenida" align="center" height="10px">
                                                              <img src="'. IMAGENES_PATH .'/usuario.png" width="16px" height="16px" alt="" align="top"></img>
                                   								&nbsp;'. $_SESSION["usuario"]["nombres"] .' '. $_SESSION["usuario"]["apellidos"] .'
                                                            </td>
                                                            <td class="bienvenida" align="right" height="10px">
                                                              <img src="'. IMAGENES_PATH .'/rptstocksucursal.png" width="16px" height="16px" alt="" align="top"></img>
                                   								&nbsp;'.$_SESSION["usuario"]["sucursal"].'
                                                            </td>
				                                    </tr>
                                                   <img src="'. IMAGENES_PATH .'/calendario.png" width="16px" height="16px" alt="" align="top"></img>
				                                    &nbsp;
				                                    <span id="fechaactual" class="fecha"></span>
				                                    &nbsp;
				                                    <br/>
				                                    <img src="'. IMAGENES_PATH .'/reloj.png" width="16px" height="16px" alt="" align="top"></img>
				                                    &nbsp;
				                                    <span id="horaactual" class="fecha"></span>
				                                    
                          
                                            </table>
                                    ';
                /*$UsuarioSesion .= '<tr>
                                    <td valign="top"><img src="'. IMAGENES_PATH .'/bandera.jpg" width="100%" height="1px"></td>
                            </tr>';
                */
            }
            else
            {
                $NombresApellidos = "Bienvenido (a)";
                $UsuarioSesion = '<table width="100%" border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="fecha" align="left" height="10px">
                                                        &nbsp;&nbsp;'. $NombresApellidos .'&nbsp;&nbsp;
                                                </td>
                                                <td align="right" class="fecha">&nbsp;&nbsp;
                                                        <script language=JavaScript>
                                                                meses = new Array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
                                                                dias = new Array("Domingo","Lunes","Martes","Mi&eacute;rcoles","Jueves","Viernes","S&aacute;bado");
                                                                var curdate=new Date();
                                                                var mes=curdate.getMonth();
                                                                var mes2 = mes+1;
                                                                var dia_num=curdate.getDate();
                                                                var dia_sem=curdate.getDay();
                                                                var anio=curdate.getYear();

                                                                if(anio < 2000)
                                                                    anio = 1900 + anio;

                                                                if (dia_num >= 10)
                                                                    document.writeln(dias[dia_sem] + ", " + dia_num + " de " + meses[mes]+" del "+anio);

                                                                if (dia_num <= 9)
                                                                        document.writeln(dias[dia_sem] + ", " + "0" + dia_num + " de " + meses[mes] + " del " + anio);
                                                        </script>&nbsp;&nbsp;
                                                </td>
                                        </tr>
                                </table>';
                /*$UsuarioSesion .= '<tr>
                                    <td valign="top"><img src="'. IMAGENES_PATH .'/bandera.jpg" width="100%" height="1px"></td>
                            </tr>';
                */

                 
                
            }
            // Instancia de la Clase clmenu
            $menu = new clMenu();

            // Envio el menu segun los privilegios del Usuario
            $this->setStrMenu($menu->getStrMenuOpcion());

            // Etiquetas de la Pagina
            $retval = '
                        <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
                        <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-us">
                        <head>
                      ';

            $retval .= '<title>' . TITULO .'</title>';
			  $retval .= '<body onload="horaactual(); fechaactual();" style="overflow-x:hidden; overflow-y:scroll;">';
            $retval .= '
						<meta http-equiv="content-type" content="text/html; charset=.'. CHARSET .'\">                                                
						<!-- <meta http-equiv="content-language" content="es"> -->

						<link rel="stylesheet" type="text/css" media="all" href="' . HOST . NAME . '/css/estilos.css" ></link>
						<link rel="stylesheet" type="text/css" media="all" href="' . HOST . NAME . '/css/paginacion.css"></link>
						<link rel="stylesheet" type="text/css" media="all" href="' . HOST . NAME . '/css/calendarioazul.css"></link>
						<link rel="stylesheet" type="text/css" media="all" href="' . HOST . NAME . '/css/vtip.css"></link>
                                                <link rel="stylesheet" type="text/css" media="all" href="' . HOST . NAME . '/css/uploadify.css"></link>

                                                <!-- JQuery -->
						<script type="text/javascript" src="' . HOST . NAME . '/jquery/jquery.js"></script>
						<script type="text/javascript" src="' . HOST . NAME . '/jquery/jquery.metadata.js"></script>
						<script type="text/javascript" src="' . HOST . NAME . '/jquery/jquery.validate.js"></script>
						<script type="text/javascript" src="' . HOST . NAME . '/jquery/jquery.formcontact.js"></script>
						<script type="text/javascript" src="' . HOST . NAME . '/jquery/vtip.js"></script>
						<script type="text/javascript" src="' . HOST . NAME . '/jquery/vtip-min.js"></script>
						<!-- <script type="text/javascript" src="' . HOST . NAME . '/jquery.corner.js"></script> -->
						<script type="text/javascript" src="' . HOST . NAME . '/js/flash.js"></script>
                         <script type="text/javascript" src="' . HOST . NAME . '/jquery/jquery.uploadify.js"></script>
                        <script type="text/javascript" src="' . HOST . NAME . '/jquery/swfobject.js"></script>
						<script type="text/javascript" src="' . HOST . NAME . '/jquery/jquery.disableOnSubmit.js"></script>
						<script type="text/javascript" src="' . HOST . NAME . '/js/mensaje.js"></script>
						<script type="text/javascript" src="' . HOST . NAME . '/js/navegacion.js"></script>
						<script type="text/javascript" src="' . HOST . NAME . '/js/tabla.js"></script>
						<script type="text/javascript" src="' . HOST . NAME . '/js/validaciones.js"></script>
						<script type="text/javascript" src="' . HOST . NAME . '/js/calendario.js"></script>
						<script type="text/javascript" src="' . HOST . NAME . '/js/calendarioespanol.js"></script>
						<script type="text/javascript" src="' . HOST . NAME . '/js/calendariosetup.js"></script>
						<script type="text/javascript" src="' . HOST . NAME . '/js/fechahora.js"></script>
					</head>';
				
            // Inicio del body
            $retval .= '<body>';

            // Cabecera Pagina
            //$logo_x = '<img src="'. IMAGENES_PATH .'/logo.jpg" width="949px" height="180px">';
            $retval .= '
                        <table width="950px" align="center" border="0" cellpadding="4" cellspacing="4" height="100%">
                        <tr bgcolor="#e3eef2">
                            <td class="content_center" align="center">
                                <table width="950px" border="0" cellpadding="0" cellspacing="0" height="100%">
                                    <tr>
                                        <td valign="top">
                                                '. $logo .'
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <tr>
                        <td class="content_center">
                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                <tr bgcolor="#e3eef2">
                                    <td>
                                        <table class="banner_user_time" width="100%" border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td valign="center" height="40px">
                                                    '. $UsuarioSesion .'
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                ';

            //Izquierda Pagina
            $retval .= '
                        <tr>
                            <td valign="top">
                                <table width="100%" border="0" height="100%" cellpadding="0" cellspacing="1">
                                    <tr>
                                        <td valign="top" width="150px">
                                                '. $this->getStrMenu() .'
                                        </td>
                        ';

            //Centro Pagina
            $retval .= '
                                                    <td valign="top" align="center">
                                                            '. $this->getStrCentro() .'
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>';

            // Pie de Pagina
            $retval .= '
                                <tr bgcolor="#e3eef2">
                            <td class="content_center" align="center">
                                <table width="950px" border="0" cellpadding="0" cellspacing="0" height="100%">
                                    <tr>
                                        <td valign="top">
                                                '. $pie .'
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        </table>';

            $retval .= '</body>';
            $retval .= '</html>';

            return $retval;
        }


    }	//	Fin Clase clInterfaz
    
?>
<?php include('../caching/cache.end.php'); ?>