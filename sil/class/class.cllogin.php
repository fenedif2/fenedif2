<?php include('../caching/cache.start.php'); ?>
<?php	
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
    include_once( CLASS_PATH . "class.clquery.php" );

    class clLogin
    {
        private $strCuenta;
        private $strClave;

        // Funciones Get y Set de la Clase clLogin
        public function getStrCuenta()
        {
            return $this->strCuenta;
        }

        public function setStrCuenta($c)
        {
            $this->strCuenta = $c;
        }

        public function getStrClave()
        {
            return $this->strClave;
        }

        public function setStrClave($c)
        {
            $this->strClave = $c;
			
        }

        public function getStrFormulario()
        {
            $retval  = '<script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.validate.js"></script>
                        <script type="text/JavaScript" src="' . HOST .NAME. '/jquery/jquery.metadata.js"></script>
                       ';

            $retval .= '<br><br><br><br>
                        <script>
                            $(document).ready(function(){
                                    $.metadata.setType( \'attr\', \'validate\' );
                                    $(\'#frmlogin\').validate({
                                            rules:{
                                                    strUsuario: { required: true},
                                                    strClave: {	required: true }
                                                  },
                                            messages:{
                                                        strUsuario: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"},
                                                        strClave: { required: "<span class=\'resultadoincorrecto\'>* Requerido</span>"}
                                                     }
                                    });
                            });
                        </script>
                       ';

            $retval .= '<form id="frmlogin" action="'. INICIO_URL .'?btnpagina=pagina-publico-ingresar-sistema-login" method="post">';
            $retval .= '<fieldset class="fieldsetLogin">';
            $retval .= '<legend class="etiquetaborde">
                            Iniciar Sesi&oacute;n
                        </legend>
                       ';

            $retval .= '<table border="0" align="center" cellpadding="1" cellspacing="1" width="100%">
                            <tr>
                                <td colspan="2" align="center" class="tablatitulo">
                                    Iniciar&nbsp;Sesi&oacute;n
                                </td>
                            </tr>

                            <tr>
                                <td class="formulariofila1" align="right"><b>Usuario:&nbsp;</b></td>
                                <td class="formulariofila1">
                                    <input class="textboxlogin" id="strUsuario" name="strUsuario" type="text" />
                                </td>
                            </tr>

                            <tr>
                                <td class="formulariofila1" align="right"><b>Clave:&nbsp;</b></td>
                                <td class="formulariofila1">
                                    <input class="textboxlogin" id="strClave" name="strClave" type="password" />
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2" class="formulariofila1" align="center">
                                    <input class="boton" name="btnLogin" type="submit" value="Ingresar" />
                                </td>
                            </tr>
                     </table>
                    ';
            $retval .= '</fieldset>';
            $retval .='</form>';
            
            return $retval;
        }

        public function getStrCheckLogin()
        {
            $query = new clQuery();

            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL splogin('%s','%s');", $this->getStrCuenta(), $this->getStrClave());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();
			
            if( count($resultado) > 0 )
            {
            	//$ProcedimientoAlmacenados = sprintf("CALL spactualizarlogins('%s');", $this->getStrCuenta());
				//$querys->setStrProcedimientoAlmacenado($ProcedimientoAlmacenados);
                foreach( $resultado as $rst):
                   	$_SESSION["usuario"]["cuenta"] = $rst['usuario_cedula'];
                    $_SESSION["usuario"]["clave"] = $rst['usuario_password'];
                    $_SESSION["usuario"]["tipo"] = $rst['tipousuario_id'];
                    $_SESSION["usuario"]["tipodescripcion"] = $rst['tipousuario_nombre'];
                    $_SESSION["usuario"]["estadodescripcion"] = $rst['usuario_detalle'];
					$_SESSION["usuario"]["estado"] = $rst['estusudescripcion'];
					$_SESSION["usuario"]["suc"] = $rst['sucursal'];
					$_SESSION["usuario"]["sucursal"] = $rst['sucursal_nombre'];
                    $_SESSION["usuario"]["nombres"] = $rst['usuario_nombres'];
                    $_SESSION["usuario"]["apellidos"] = $rst['usuario_apellidos'];
                endforeach;

                   //Nombre Procedimientos Almacenados [Auditoria]
                    $ProcedimientoAlmacenado = sprintf("CALL spauditoria('%s', '%s', '%s', '%s');", $_SESSION["usuario"]["cuenta"], 'I', 'tusuario', 'Ingreso al Sistema');
                    $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
                    $query->getStrSqlInsertUpdateDelete();
					$retval = true;
					 $ProcedimientoAlmacenado = sprintf("CALL spactualizarlogins('%s');", $_SESSION["usuario"]["cuenta"]);
                    $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
                    $query->getStrSqlInsertUpdateDelete();
					 $retval = true;
                
            }
            else
                $retval = false;

            return $retval;
        }

        public function getStrInformacionUsuario()
        {
            $retval = '<fieldset class="fieldsetGrande">';
            $retval .= '<legend class="etiquetaborde">
                            Inicio <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Informaci&oacute;n del Usuario
                        </legend>
                       ';
            $retval .= '
                       <table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                            <tr class="tablatitulo">
                                    <th colspan="2" align="center">INFORMACI&Oacute;N&nbsp;DEL&nbsp;USUARIO</th>
                            </tr>
                            <tr class="listadofila0">
                                    <th align="right" class="bienvenida">&nbsp;[&nbsp;Nombres&nbsp;]&nbsp;'. '<img src="'. IMAGENES_PATH .'/flecha.png" title="Flecha">&nbsp;</th>
                                    <th align="left">&nbsp;[&nbsp;'. $_SESSION["usuario"]["nombres"] .'&nbsp;]&nbsp;</th>
                            </tr>
                            <tr class="listadofila1">
                                    <th align="right" class="bienvenida">&nbsp;[&nbsp;Apellidos&nbsp;]&nbsp;'. '<img src="'. IMAGENES_PATH .'/flecha.png" title="Flecha">&nbsp;</th>
                                    <th align="left">&nbsp;[&nbsp;'. $_SESSION["usuario"]["apellidos"] .'&nbsp;]&nbsp;</th>
                            </tr>
                            <tr class="listadofila0">
                                    <th align="right" class="bienvenida">&nbsp;[&nbsp;Tipo&nbsp;Usuario&nbsp;]&nbsp;'. '<img src="'. IMAGENES_PATH .'/flecha.png" title="Flecha">&nbsp;</th>
                                    <th align="left">&nbsp;[&nbsp;'. $_SESSION["usuario"]["tipodescripcion"] .'&nbsp;]&nbsp;</th>
                            </tr>
                            <tr class="listadofila1">
                                    <th align="right" class="bienvenida">&nbsp;[&nbsp;Estado&nbsp;Usuario&nbsp;]&nbsp;'. '<img src="'. IMAGENES_PATH .'/flecha.png" title="Flecha">&nbsp;</th>
                                    <th align="left">&nbsp;[&nbsp;'. $_SESSION["usuario"]["estado"] .'&nbsp;]&nbsp;</th>
                            </tr>
                            <tr class="listadofila0">
                                    <th align="right" class="bienvenida">&nbsp;[&nbsp;Usuario&nbsp;]&nbsp;'. '<img src="'. IMAGENES_PATH .'/flecha.png" title="Flecha">&nbsp;</th>
                                    <th align="left">&nbsp;[&nbsp;'. $_SESSION["usuario"]["cuenta"] .'&nbsp;]&nbsp;</th>
                            </tr>
                           
                           	<tr class="listadofila0">
                                    <th align="right" class="bienvenida">&nbsp;[&nbsp;Sucursal Centro Formativo&nbsp;]&nbsp;'. '<img src="'. IMAGENES_PATH .'/flecha.png" title="Flecha">&nbsp;</th>
                                    <th align="left">&nbsp;[&nbsp;'. $_SESSION["usuario"]["suc"] .'&nbsp;]&nbsp;</th>
                            </tr> 
                      </table>
                     ';
            $retval .= '</fieldset>';
            return $retval;
        }
    }
?>
<?php include('../caching/cache.end.php'); ?>