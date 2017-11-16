<?php
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.validaciones.php' );
    include_once( CLASS_PATH . "class.clquery.php" );
    include_once( CLASS_PATH . "class.cltipomedico.php" );
    include_once( CLASS_PATH . "class.clespecialidadmedico.php" );
    include_once( CLASS_PATH . "class.clpaciente.php" );
    include_once( CLASS_PATH . "class.cladministracion.php" );

    class clReporte
    {
        private $strUsuario;
        private $strTipoUsuario;
        private $strTipoMedico;
        private $strEspecialidadMedico;
        private $strNumeroHistoriaClinicaPaciente;
        private $strFechaInicio;
        private $strFechaFin;
        private $strNumeroFactura;

        private $strEtiqueta;
        private $strNombreBoton;
        private $strValorBoton;
        private $strLectura;

        public function __construct()
        {
            $this->strUsuario =  "";
            $this->strTipoUsuario =  "";
            $this->strTipoMedico =  "";
            $this->strEspecialidadMedico =  "";
            $this->strNumeroHistoriaClinicaPaciente =  "";
            $this->strFechaInicio =  "";
            $this->strFechaFin =  "";
            $this->strNumeroFactura =  "";

             $this->strEtiqueta = "";
            $this->strNombreBoton = "";
            $this->strValorBoton = "";
            $this->strLectura = "";
        }

        public function getStrUsuario()
        {
            return $this->strUsuario;
        }

        public function setStrUsuario($u)
        {
            $this->strUsuario = $u;
        }

        public function getStrTipoUsuario()
        {
            return $this->strTipoUsuario;
        }

        public function setStrTipoUsuario($tu)
        {
            $this->strTipoUsuario = $tu;
        }

         public function getStrTipoMedico()
        {
            return $this->strTipoMedico;
        }

        public function setStrTipoMedico($tm)
        {
            $this->strTipoMedico = $tm;
        }

         public function getStrEspecialidadMedico()
        {
            return $this->strEspecialidadMedico;
        }

        public function setStrEspecialidadMedico($tm)
        {
            $this->strEspecialidadMedico = $tm;
        }

         public function getStrNumeroHistoriaClinicaPaciente()
        {
            return $this->strNumeroHistoriaClinicaPaciente;
        }

        public function setStrNumeroHistoriaClinicaPaciente($nhcp)
        {
            $this->strNumeroHistoriaClinicaPaciente = $nhcp;
        }

         public function getStrFechaInicio()
        {
            return $this->strFechaInicio;
        }

        public function setStrFechaInicio($fi)
        {
            $this->strFechaInicio = $fi;
        }

        public function getStrFechaFin()
        {
            return $this->strFechaFin;
        }

        public function setStrFechaFin($ff)
        {
            $this->strFechaFin = $ff;
        }

        public function getStrNumeroFactura()
        {
            return $this->strNumeroFactura;
        }

        public function setStrNumeroFactura($nf)
        {
            $this->strNumeroFactura = $nf;
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

        public function getStrLectura()
        {
            return $this->strLectura;
        }

        public function setStrLectura($l)
        {
            $this->strLectura = $l;
        }


        //Crea un Archivo *.txt
        public function getStrAbrirArchivo($nombre)
        {
            $nombrearchivo = $nombre;
            //Windows
            //$directorio = dirname(__FILE__).'\\'.$nombrearchivo;
            //Linux
            //$directorio = dirname(__FILE__).'/'.$nombrearchivo;

            $directorio = dirname(__FILE__).LINUXWINDOWS.$nombrearchivo;
            $archivo = $directorio;
            $f = fopen($archivo,"w+");
            return $f;
        }

        //Cierra un Archivo creado *.txt
        public function getStrCerrarArchivo($nombre)
        {
            return fclose($nombre);
        }

        //Copia un archivo *.txt
        public function getStrCopiarArchivo($nombre)
        {
            //Mover el archivo a la carpeta /archivos
            $c = copy(CLASS_PATH.$nombre,ARCHIVOS_PATH.$nombre);
            if ($c){
                unlink(CLASS_PATH.$nombre);
            }
            return $c;
        }

        //Formulario Administrador - Reportes
        public function getStrFormularioReportes() {
        $retval .= '<fieldset class="fieldsetGrande">';
        $retval .= '<legend class="etiquetaborde">
                        Reporte
                    </legend>
                   ';

        $tipousuario = strtolower($_SESSION["usuario"]["tipo"]);


        if ($tipousuario == "2"){
            $imglistadopacientes = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'p">
                                    <img src="'. IMAGENES_PATH .'/rptpaciente.png" title="Listado Pacientes" style="border: 0px none;">
                                 </a>';


            $imglistadomedicos = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'m">
                                    <img src="'. IMAGENES_PATH .'/rptmedico.png" title="Listado M&eacute;dicos" style="border: 0px none;">
                               </a>';

            $imglistadocostos = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'c">
                                <img src="'. IMAGENES_PATH .'/rptcosto.png" title="Listado Costos" style="border: 0px none;">
                              </a>';

            $imglistadousuarios = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'u">
                                        <img src="'. IMAGENES_PATH .'/rptusuario.png" title="Listado Usuarios" style="border: 0px none;">
                                    </a>';

            $imgvisualizacionfactura = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'nf">
                                        <img src="'. IMAGENES_PATH .'/rptnumerofactura.png" title="Visualizaci&oacute;n&nbsp;Factura" style="border: 0px none;">
                                    </a>';

            $imghistorialpagospaciente = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'hpp">
                                        <img src="'. IMAGENES_PATH .'/rpthistorialpagos.png" title="Historial&nbsp;Pagos&nbsp;Paciente" style="border: 0px none;">
                                    </a>';

            $imgrecaudacionmedico = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'rm">
                                        <img src="'. IMAGENES_PATH .'/rptrecaudacionmedico.png" title="Recaudaci&oacute;n por M&eacute;cico" style="border: 0px none;">
                                    </a>';

            $imgrecaudacionservicio = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'rs">
                                        <img src="'. IMAGENES_PATH .'/rptrecaudacionservicio.png" title="Recaudaci&oacute;n por Servicio" style="border: 0px none;">
                                    </a>';

            $imgrecaudaciongeneral = '
                                    <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'rg">
                                        <img src="'. IMAGENES_PATH .'/rptrecaudaciongeneral.png" title="Recaudaci&oacute;n&nbsp;General" style="border: 0px none;">
                                    </a>';

            $imgatencionpacientemedico = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'apm">
                                        <img src="'. IMAGENES_PATH .'/rptatencionpacientemedico.png" title=" Atenci&oacute;n&nbsp;Paciente&nbsp;por&nbsp;M&eacute;dico" style="border: 0px none;">
                                    </a>';

            $imgatencionpacienteservicio = '
                                    <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'aps">
                                        <img src="'. IMAGENES_PATH .'/rptatencionpacienteservicio.png" title="Atenci&oacute;n&nbsp;Paciente&nbsp;por&nbsp;Servicio" style="border: 0px none;">
                                    </a>';

            $imgatencionpacientegeneral = '
                                    <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'apg">
                                        <img src="'. IMAGENES_PATH .'/rptatencionpacientegeneral.png" title="Atenci&oacute;n&nbsp;Paciente&nbsp;General" style="border: 0px none;">
                                    </a>';

            $imghistoriaclinicapacientemedico = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'hcpm">
                                        <img src="'. IMAGENES_PATH .'/rpthistoriaclinicapacientemedico.png" title="Historia&nbsp;Cl&iacute;nica&nbsp;Paciente&nbsp;por&nbsp;M&eacute;dico" style="border: 0px none;">
                                    </a>';

            $imghistoriaclinicapacienteservicio = '
                                    <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'hcps">
                                        <img src="'. IMAGENES_PATH .'/rpthistoriaclinicapacienteservicio.png" title="Historia&nbsp;Cl&iacute;nica&nbsp;Paciente&nbsp;por&nbsp;Servicio" style="border: 0px none;">
                                    </a>';

            $imghistoriaclinicapacientegeneral = '
                                    <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'hcpg">
                                        <img src="'. IMAGENES_PATH .'/rpthistoriaclinicapacientegeneral.png" title="Historia&nbsp;Cl&iacute;nica&nbsp;Paciente&nbsp;General" style="border: 0px none;">
                                    </a>';

            $imgauditoria = '
                                    <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'a">
                                        <img src="'. IMAGENES_PATH .'/rptauditoria.png" title="Auditoria" style="border: 0px none;">
                                    </a>';

            $txtlistadopacientes = ' <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'p">
                                        Listado&nbsp;Pacientes
                                  </a>';

            $txtlistadomedicos = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'m">
                                        Listado&nbsp;M&eacute;dicos
                                    </a>';

            $txtlistadocostos = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'c">
                                        Listado&nbsp;Costos
                                    </a>';

            $txtlistadousuarios = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'u">
                                        Listado&nbsp;Usuarios
                                    </a>';

            $txtvisualizacionfactura = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'nf">
                                        Visualizaci&oacute;n&nbsp;Factura
                                    </a>';

            $txthistorialpagospaciente = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'hpp">
                                        Historial&nbsp;Pagos&nbsp;Pacientes
                                    </a>';

            $txtrecaudacionmedico = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'rm">
                                        Recaudaci&oacute;n&nbsp;por&nbsp;M&eacute;dico
                                    </a>';

            $txtrecaudacionservicio = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'rs">
                                        Recaudaci&oacute;n&nbsp;por&nbsp;Servicio
                                    </a>';

            $txtrecaudaciongeneral = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'rg">
                                       Recaudaci&oacute;n&nbsp;General
                                    </a>';

            $txtatencionpacientemedico = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'apm">
                                        Atenci&oacute;n&nbsp;Paciente&nbsp;por&nbsp;M&eacute;dico
                                    </a>';

            $txtatencionpacienteservicio = '
                                    <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'aps">
                                        Atenci&oacute;n&nbsp;Paciente&nbsp;por&nbsp;Servicio
                                    </a>';

            $txtatencionpacientegeneral = '
                                    <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'apg">
                                       Atenci&oacute;n&nbsp;Paciente&nbsp;General
                                    </a>';

            $txthistoriaclinicapacientemedico = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'hcpm">
                                       Historia&nbsp;Cl&iacute;nica&nbsp;Paciente&nbsp;por&nbsp;M&eacute;dico
                                    </a>';

            $txthistoriaclinicapacienteservicio = '
                                    <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'hcps">
                                        Historia&nbsp;Cl&iacute;nica&nbsp;Paciente&nbsp;por&nbsp;Servicio
                                    </a>';

            $txthistoriaclinicapacientegeneral = '
                                    <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'hcpg">
                                       Historia&nbsp;Cl&iacute;nica&nbsp;Paciente&nbsp;General
                                    </a>';

            $txtauditoria = '
                                    <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'a">
                                       Auditoria
                                    </a>';


        }

        if ($tipousuario == "s"){
            $imglistadopacientes = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'p">
                                    <img src="'. IMAGENES_PATH .'/rptpaciente.png" title="Listado Pacientes" style="border: 0px none;">
                                 </a>';


            $imglistadomedicos = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'m">
                                    <img src="'. IMAGENES_PATH .'/rptmedico.png" title="Listado M&eacute;dicos" style="border: 0px none;">
                               </a>';

            $imglistadocostos = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'c">
                                <img src="'. IMAGENES_PATH .'/rptcosto.png" title="Listado Costos" style="border: 0px none;">
                              </a>';

            $imglistadousuarios = '<img src="'. IMAGENES_PATH .'/_rptusuario.png" title="Listado Usuarios" style="border: 0px none;">';

            $imgvisualizacionfactura = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'nf">
                                        <img src="'. IMAGENES_PATH .'/rptnumerofactura.png" title="Visualizaci&oacute;n&nbsp;Factura" style="border: 0px none;">
                                    </a>';

            $imghistorialpagospaciente = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'hpp">
                                        <img src="'. IMAGENES_PATH .'/rpthistorialpagos.png" title="Historial&nbsp;Pagos&nbsp;Paciente" style="border: 0px none;">
                                    </a>';

            $imgrecaudacionmedico = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'rm">
                                        <img src="'. IMAGENES_PATH .'/rptrecaudacionmedico.png" title="Recaudaci&oacute;n por M&eacute;cico" style="border: 0px none;">
                                    </a>';

            $imgrecaudacionservicio = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'rs">
                                        <img src="'. IMAGENES_PATH .'/rptrecaudacionservicio.png" title="Recaudaci&oacute;n por Servicio" style="border: 0px none;">
                                    </a>';

            $imgrecaudaciongeneral = '
                                    <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'rg">
                                        <img src="'. IMAGENES_PATH .'/rptrecaudaciongeneral.png" title="Recaudaci&oacute;n&nbsp;General" style="border: 0px none;">
                                    </a>';

            $imgatencionpacientemedico = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'apm">
                                        <img src="'. IMAGENES_PATH .'/rptatencionpacientemedico.png" title=" Atenci&oacute;n&nbsp;Paciente&nbsp;por&nbsp;M&eacute;dico" style="border: 0px none;">
                                    </a>';

            $imgatencionpacienteservicio = '
                                    <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'aps">
                                        <img src="'. IMAGENES_PATH .'/rptatencionpacienteservicio.png" title="Atenci&oacute;n&nbsp;Paciente&nbsp;por&nbsp;Servicio" style="border: 0px none;">
                                    </a>';

            $imgatencionpacientegeneral = '
                                    <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'apg">
                                        <img src="'. IMAGENES_PATH .'/rptatencionpacientegeneral.png" title="Atenci&oacute;n&nbsp;Paciente&nbsp;General" style="border: 0px none;">
                                    </a>';

            $imghistoriaclinicapacientemedico = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'hcpm">
                                        <img src="'. IMAGENES_PATH .'/rpthistoriaclinicapacientemedico.png" title="Historia&nbsp;Cl&iacute;nica&nbsp;Paciente&nbsp;por&nbsp;M&eacute;dico" style="border: 0px none;">
                                    </a>';

            $imghistoriaclinicapacienteservicio = '
                                    <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'hcps">
                                        <img src="'. IMAGENES_PATH .'/rpthistoriaclinicapacienteservicio.png" title="Historia&nbsp;Cl&iacute;nica&nbsp;Paciente&nbsp;por&nbsp;Servicio" style="border: 0px none;">
                                    </a>';

            $imghistoriaclinicapacientegeneral = '
                                    <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'hcpg">
                                        <img src="'. IMAGENES_PATH .'/rpthistoriaclinicapacientegeneral.png" title="Historia&nbsp;Cl&iacute;nica&nbsp;Paciente&nbsp;General" style="border: 0px none;">
                                    </a>';

            $txtlistadopacientes = ' <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'p">
                                        Listado&nbsp;Pacientes
                                  </a>';

            $txtlistadomedicos = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'m">
                                        Listado&nbsp;M&eacute;dicos
                                    </a>';

            $txtlistadocostos = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'c">
                                        Listado&nbsp;Costos
                                    </a>';

            $txtlistadousuarios = '<span class="desabilitado">Listado&nbsp;Usuarios</span>';

            $txtvisualizacionfactura = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'nf">
                                        Visualizaci&oacute;n&nbsp;Factura
                                    </a>';

            $txthistorialpagospaciente = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'hpp">
                                        Historial&nbsp;Pagos&nbsp;Pacientes
                                    </a>';

            $txtrecaudacionmedico = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'rm">
                                        Recaudaci&oacute;n&nbsp;por&nbsp;M&eacute;dico
                                    </a>';

            $txtrecaudacionservicio = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'rs">
                                        Recaudaci&oacute;n&nbsp;por&nbsp;Servicio
                                    </a>';

            $txtrecaudaciongeneral = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'rg">
                                       Recaudaci&oacute;n&nbsp;General
                                    </a>';

            $txtatencionpacientemedico = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'apm">
                                        Atenci&oacute;n&nbsp;Paciente&nbsp;por&nbsp;M&eacute;dico
                                    </a>';

            $txtatencionpacienteservicio = '
                                    <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'aps">
                                        Atenci&oacute;n&nbsp;Paciente&nbsp;por&nbsp;Servicio
                                    </a>';

            $txtatencionpacientegeneral = '
                                    <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'apg">
                                       Atenci&oacute;n&nbsp;Paciente&nbsp;General
                                    </a>';

            $txthistoriaclinicapacientemedico = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'hcpm">
                                       Historia&nbsp;Cl&iacute;nica&nbsp;Paciente&nbsp;por&nbsp;M&eacute;dico
                                    </a>';

            $txthistoriaclinicapacienteservicio = '
                                    <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'hcps">
                                        Historia&nbsp;Cl&iacute;nica&nbsp;Paciente&nbsp;por&nbsp;Servicio
                                    </a>';

            $txthistoriaclinicapacientegeneral = '
                                    <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'hcpg">
                                       Historia&nbsp;Cl&iacute;nica&nbsp;Paciente&nbsp;General
                                    </a>';

            $txtauditoria = '<span class="desabilitado">Auditoria</span>';
            $imgauditoria = '<img src="'. IMAGENES_PATH .'/_rptauditoria.png" title="Auditoria" style="border: 0px none;">';

        }

         if ($tipousuario == "t"){
            $imglistadopacientes = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'p">
                                    <img src="'. IMAGENES_PATH .'/rptpaciente.png" title="Listado Pacientes" style="border: 0px none;">
                                 </a>';


            $imglistadomedicos = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'m">
                                    <img src="'. IMAGENES_PATH .'/rptmedico.png" title="Listado M&eacute;dicos" style="border: 0px none;">
                               </a>';

            $imglistadocostos = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'c">
                                <img src="'. IMAGENES_PATH .'/rptcosto.png" title="Listado Costos" style="border: 0px none;">
                              </a>';

            $imglistadousuarios = '<img src="'. IMAGENES_PATH .'/_rptusuario.png" title="Listado Usuarios" style="border: 0px none;">';

            $imgvisualizacionfactura = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'nf">
                                        <img src="'. IMAGENES_PATH .'/rptnumerofactura.png" title="Visualizaci&oacute;n&nbsp;Factura" style="border: 0px none;">
                                    </a>';

            $imghistorialpagospaciente = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'hpp">
                                        <img src="'. IMAGENES_PATH .'/rpthistorialpagos.png" title="Historial&nbsp;Pagos&nbsp;Paciente" style="border: 0px none;">
                                    </a>';

            $imgrecaudacionmedico = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'rm">
                                        <img src="'. IMAGENES_PATH .'/rptrecaudacionmedico.png" title="Recaudaci&oacute;n por M&eacute;cico" style="border: 0px none;">
                                    </a>';

            $imgrecaudacionservicio = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'rs">
                                        <img src="'. IMAGENES_PATH .'/rptrecaudacionservicio.png" title="Recaudaci&oacute;n por Servicio" style="border: 0px none;">
                                    </a>';

            $imgrecaudaciongeneral = '
                                    <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'rg">
                                        <img src="'. IMAGENES_PATH .'/rptrecaudaciongeneral.png" title="Recaudaci&oacute;n&nbsp;General" style="border: 0px none;">
                                    </a>';

            $imgatencionpacientemedico = '<img src="'. IMAGENES_PATH .'/_rptatencionpacientemedico.png" title=" Atenci&oacute;n&nbsp;Paciente&nbsp;por&nbsp;M&eacute;dico" style="border: 0px none;">';

            $imgatencionpacienteservicio = '<img src="'. IMAGENES_PATH .'/_rptatencionpacienteservicio.png" title="Atenci&oacute;n&nbsp;Paciente&nbsp;por&nbsp;Servicio" style="border: 0px none;">';

            $imgatencionpacientegeneral = '<img src="'. IMAGENES_PATH .'/_rptatencionpacientegeneral.png" title="Atenci&oacute;n&nbsp;Paciente&nbsp;General" style="border: 0px none;">';

            $imghistoriaclinicapacientemedico = '<img src="'. IMAGENES_PATH .'/_rpthistoriaclinicapacientemedico.png" title="Historia&nbsp;Cl&iacute;nica&nbsp;Paciente&nbsp;por&nbsp;M&eacute;dico" style="border: 0px none;">';

            $imghistoriaclinicapacienteservicio = '<img src="'. IMAGENES_PATH .'/_rpthistoriaclinicapacienteservicio.png" title="Historia&nbsp;Cl&iacute;nica&nbsp;Paciente&nbsp;por&nbsp;Servicio" style="border: 0px none;">';

            $imghistoriaclinicapacientegeneral = '<img src="'. IMAGENES_PATH .'/_rpthistoriaclinicapacientegeneral.png" title="Historia&nbsp;Cl&iacute;nica&nbsp;Paciente&nbsp;General" style="border: 0px none;">';

            $txtlistadopacientes = ' <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'p">
                                        Listado&nbsp;Pacientes
                                  </a>';

            $txtlistadomedicos = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'m">
                                        Listado&nbsp;M&eacute;dicos
                                    </a>';

            $txtlistadocostos = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'c">
                                        Listado&nbsp;Costos
                                    </a>';

            $txtlistadousuarios = '<span class="desabilitado">Listado&nbsp;Usuarios</span>';

            $txtvisualizacionfactura = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'nf">
                                        Visualizaci&oacute;n&nbsp;Factura
                                    </a>';

            $txthistorialpagospaciente = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'hpp">
                                        Historial&nbsp;Pagos&nbsp;Pacientes
                                    </a>';

            $txtrecaudacionmedico = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'rm">
                                        Recaudaci&oacute;n&nbsp;por&nbsp;M&eacute;dico
                                    </a>';

            $txtrecaudacionservicio = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'rs">
                                        Recaudaci&oacute;n&nbsp;por&nbsp;Servicio
                                    </a>';

            $txtrecaudaciongeneral = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'rg">
                                       Recaudaci&oacute;n&nbsp;General
                                    </a>';

            $txtatencionpacientemedico = '<span class="desabilitado">Atenci&oacute;n&nbsp;Paciente&nbsp;por&nbsp;M&eacute;dico</span>';

            $txtatencionpacienteservicio = '<span class="desabilitado">Atenci&oacute;n&nbsp;Paciente&nbsp;por&nbsp;Servicio</span>';

            $txtatencionpacientegeneral = '<span class="desabilitado">Atenci&oacute;n&nbsp;Paciente&nbsp;General</span>';

            $txthistoriaclinicapacientemedico = '<span class="desabilitado">Historia&nbsp;Cl&iacute;nica&nbsp;Paciente&nbsp;por&nbsp;M&eacute;dico</span>';

            $txthistoriaclinicapacienteservicio = '<span class="desabilitado"> Historia&nbsp;Cl&iacute;nica&nbsp;Paciente&nbsp;por&nbsp;Servicio</span>';

            $txthistoriaclinicapacientegeneral = '<span class="desabilitado"> Historia&nbsp;Cl&iacute;nica&nbsp;Paciente&nbsp;General</span>';

            $txtauditoria = '<span class="desabilitado">Auditoria</span>';
            $imgauditoria = '<img src="'. IMAGENES_PATH .'/_rptauditoria.png" title="Auditoria" style="border: 0px none;">';

        }

        if ($tipousuario == "m"){
            $imglistadopacientes = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'p">
                                    <img src="'. IMAGENES_PATH .'/rptpaciente.png" title="Listado Pacientes" style="border: 0px none;">
                                 </a>';


            $imglistadomedicos = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'m">
                                    <img src="'. IMAGENES_PATH .'/rptmedico.png" title="Listado M&eacute;dicos" style="border: 0px none;">
                               </a>';

            $imglistadocostos = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'c">
                                <img src="'. IMAGENES_PATH .'/rptcosto.png" title="Listado Costos" style="border: 0px none;">
                              </a>';

            $imglistadousuarios = '<img src="'. IMAGENES_PATH .'/_rptusuario.png" title="Listado Usuarios" style="border: 0px none;">';

            $imgvisualizacionfactura = '<img src="'. IMAGENES_PATH .'/_rptnumerofactura.png" title="Visualizaci&oacute;n&nbsp;Factura" style="border: 0px none;">';

            $imghistorialpagospaciente = '<img src="'. IMAGENES_PATH .'/_rpthistorialpagos.png" title="Historial&nbsp;Pagos&nbsp;Paciente" style="border: 0px none;">';

             $imgrecaudacionmedico = '<img src="'. IMAGENES_PATH .'/_rptrecaudacionmedico.png" title="Recaudaci&oacute;n por M&eacute;cico" style="border: 0px none;">';

            $imgrecaudacionservicio = '<img src="'. IMAGENES_PATH .'/_rptrecaudacionservicio.png" title="Recaudaci&oacute;n por Servicio" style="border: 0px none;">';

            $imgrecaudaciongeneral = '<img src="'. IMAGENES_PATH .'/_rptrecaudaciongeneral.png" title="Recaudaci&oacute;n&nbsp;General" style="border: 0px none;">';

            $imgatencionpacientemedico = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'apm">
                                        <img src="'. IMAGENES_PATH .'/rptatencionpacientemedico.png" title=" Atenci&oacute;n&nbsp;Paciente&nbsp;por&nbsp;M&eacute;dico" style="border: 0px none;">
                                    </a>';

            $imgatencionpacienteservicio = '
                                    <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'aps">
                                        <img src="'. IMAGENES_PATH .'/rptatencionpacienteservicio.png" title="Atenci&oacute;n&nbsp;Paciente&nbsp;por&nbsp;Servicio" style="border: 0px none;">
                                    </a>';

            $imgatencionpacientegeneral = '
                                    <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'apg">
                                        <img src="'. IMAGENES_PATH .'/rptatencionpacientegeneral.png" title="Atenci&oacute;n&nbsp;Paciente&nbsp;General" style="border: 0px none;">
                                    </a>';

            $imghistoriaclinicapacientemedico = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'hcpm">
                                        <img src="'. IMAGENES_PATH .'/rpthistoriaclinicapacientemedico.png" title="Historia&nbsp;Cl&iacute;nica&nbsp;Paciente&nbsp;por&nbsp;M&eacute;dico" style="border: 0px none;">
                                    </a>';

            $imghistoriaclinicapacienteservicio = '
                                    <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'hcps">
                                        <img src="'. IMAGENES_PATH .'/rpthistoriaclinicapacienteservicio.png" title="Historia&nbsp;Cl&iacute;nica&nbsp;Paciente&nbsp;por&nbsp;Servicio" style="border: 0px none;">
                                    </a>';

            $imghistoriaclinicapacientegeneral = '
                                    <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'hcpg">
                                        <img src="'. IMAGENES_PATH .'/rpthistoriaclinicapacientegeneral.png" title="Historia&nbsp;Cl&iacute;nica&nbsp;Paciente&nbsp;General" style="border: 0px none;">
                                    </a>';

            $txtlistadopacientes = ' <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'p">
                                        Listado&nbsp;Pacientes
                                  </a>';

            $txtlistadomedicos = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'m">
                                        Listado&nbsp;M&eacute;dicos
                                    </a>';

            $txtlistadocostos = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'c">
                                        Listado&nbsp;Costos
                                    </a>';

            $txtlistadousuarios = '<span class="desabilitado">Listado&nbsp;Usuarios</span>';

            $txtvisualizacionfactura = '<span class="desabilitado">Visualizaci&oacute;n&nbsp;Factura</span>';

            $txthistorialpagospaciente = '<span class="desabilitado">Historial&nbsp;Pagos&nbsp;Pacientes</span>';

            $txtrecaudacionmedico = '<span class="desabilitado">Recaudaci&oacute;n&nbsp;por&nbsp;M&eacute;dico</span>';

            $txtrecaudacionservicio = '<span class="desabilitado">Recaudaci&oacute;n&nbsp;por&nbsp;Servicio</span>';

            $txtrecaudaciongeneral = '<span class="desabilitado">Recaudaci&oacute;n&nbsp;General</span>';

            $txtatencionpacientemedico = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'apm">
                                        Atenci&oacute;n&nbsp;Paciente&nbsp;por&nbsp;M&eacute;dico
                                    </a>';

            $txtatencionpacienteservicio = '
                                    <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'aps">
                                        Atenci&oacute;n&nbsp;Paciente&nbsp;por&nbsp;Servicio
                                    </a>';

            $txtatencionpacientegeneral = '
                                    <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'apg">
                                       Atenci&oacute;n&nbsp;Paciente&nbsp;General
                                    </a>';

            $txthistoriaclinicapacientemedico = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'hcpm">
                                       Historia&nbsp;Cl&iacute;nica&nbsp;Paciente&nbsp;por&nbsp;M&eacute;dico
                                    </a>';

            $txthistoriaclinicapacienteservicio = '
                                    <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'hcps">
                                        Historia&nbsp;Cl&iacute;nica&nbsp;Paciente&nbsp;por&nbsp;Servicio
                                    </a>';

            $txthistoriaclinicapacientegeneral = '
                                    <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'hcpg">
                                       Historia&nbsp;Cl&iacute;nica&nbsp;Paciente&nbsp;General
                                    </a>';
            $txtauditoria = '<span class="desabilitado">Auditoria</span>';
            $imgauditoria = '<img src="'. IMAGENES_PATH .'/_rptauditoria.png" title="Auditoria" style="border: 0px none;">';
        }

         if ($tipousuario == "e"){
            $imglistadopacientes = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'p">
                                    <img src="'. IMAGENES_PATH .'/rptpaciente.png" title="Listado Pacientes" style="border: 0px none;">
                                 </a>';


            $imglistadomedicos = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'m">
                                    <img src="'. IMAGENES_PATH .'/rptmedico.png" title="Listado M&eacute;dicos" style="border: 0px none;">
                               </a>';

            $imglistadocostos = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'c">
                                <img src="'. IMAGENES_PATH .'/rptcosto.png" title="Listado Costos" style="border: 0px none;">
                              </a>';

            $imglistadousuarios = '<img src="'. IMAGENES_PATH .'/_rptusuario.png" title="Listado Usuarios" style="border: 0px none;">';

            $imgvisualizacionfactura = '<img src="'. IMAGENES_PATH .'/_rptnumerofactura.png" title="Visualizaci&oacute;n&nbsp;Factura" style="border: 0px none;">';

            $imghistorialpagospaciente = '<img src="'. IMAGENES_PATH .'/_rpthistorialpagos.png" title="Historial&nbsp;Pagos&nbsp;Paciente" style="border: 0px none;">';

             $imgrecaudacionmedico = '<img src="'. IMAGENES_PATH .'/_rptrecaudacionmedico.png" title="Recaudaci&oacute;n por M&eacute;cico" style="border: 0px none;">';

            $imgrecaudacionservicio = '<img src="'. IMAGENES_PATH .'/_rptrecaudacionservicio.png" title="Recaudaci&oacute;n por Servicio" style="border: 0px none;">';

            $imgrecaudaciongeneral = '<img src="'. IMAGENES_PATH .'/_rptrecaudaciongeneral.png" title="Recaudaci&oacute;n&nbsp;General" style="border: 0px none;">';

            $imgatencionpacientemedico = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'apm">
                                        <img src="'. IMAGENES_PATH .'/rptatencionpacientemedico.png" title=" Atenci&oacute;n&nbsp;Paciente&nbsp;por&nbsp;M&eacute;dico" style="border: 0px none;">
                                    </a>';

            $imgatencionpacienteservicio = '
                                    <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'aps">
                                        <img src="'. IMAGENES_PATH .'/rptatencionpacienteservicio.png" title="Atenci&oacute;n&nbsp;Paciente&nbsp;por&nbsp;Servicio" style="border: 0px none;">
                                    </a>';

            $imgatencionpacientegeneral = '
                                    <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'apg">
                                        <img src="'. IMAGENES_PATH .'/rptatencionpacientegeneral.png" title="Atenci&oacute;n&nbsp;Paciente&nbsp;General" style="border: 0px none;">
                                    </a>';

            $imghistoriaclinicapacientemedico = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'hcpm">
                                        <img src="'. IMAGENES_PATH .'/rpthistoriaclinicapacientemedico.png" title="Historia&nbsp;Cl&iacute;nica&nbsp;Paciente&nbsp;por&nbsp;M&eacute;dico" style="border: 0px none;">
                                    </a>';

            $imghistoriaclinicapacienteservicio = '
                                    <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'hcps">
                                        <img src="'. IMAGENES_PATH .'/rpthistoriaclinicapacienteservicio.png" title="Historia&nbsp;Cl&iacute;nica&nbsp;Paciente&nbsp;por&nbsp;Servicio" style="border: 0px none;">
                                    </a>';

            $imghistoriaclinicapacientegeneral = '
                                    <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'hcpg">
                                        <img src="'. IMAGENES_PATH .'/rpthistoriaclinicapacientegeneral.png" title="Historia&nbsp;Cl&iacute;nica&nbsp;Paciente&nbsp;General" style="border: 0px none;">
                                    </a>';

            $txtlistadopacientes = ' <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'p">
                                        Listado&nbsp;Pacientes
                                  </a>';

            $txtlistadomedicos = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'m">
                                        Listado&nbsp;M&eacute;dicos
                                    </a>';

            $txtlistadocostos = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'c">
                                        Listado&nbsp;Costos
                                    </a>';

            $txtlistadousuarios = '<span class="desabilitado">Listado&nbsp;Usuarios</span>';

            $txtvisualizacionfactura = '<span class="desabilitado">Visualizaci&oacute;n&nbsp;Factura</span>';

            $txthistorialpagospaciente = '<span class="desabilitado">Historial&nbsp;Pagos&nbsp;Pacientes</span>';

            $txtrecaudacionmedico = '<span class="desabilitado">Recaudaci&oacute;n&nbsp;por&nbsp;M&eacute;dico</span>';

            $txtrecaudacionservicio = '<span class="desabilitado">Recaudaci&oacute;n&nbsp;por&nbsp;Servicio</span>';

            $txtrecaudaciongeneral = '<span class="desabilitado">Recaudaci&oacute;n&nbsp;General</span>';

            $txtatencionpacientemedico = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'apm">
                                        Atenci&oacute;n&nbsp;Paciente&nbsp;por&nbsp;M&eacute;dico
                                    </a>';

            $txtatencionpacienteservicio = '
                                    <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'aps">
                                        Atenci&oacute;n&nbsp;Paciente&nbsp;por&nbsp;Servicio
                                    </a>';

            $txtatencionpacientegeneral = '
                                    <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'apg">
                                       Atenci&oacute;n&nbsp;Paciente&nbsp;General
                                    </a>';

            $txthistoriaclinicapacientemedico = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'hcpm">
                                       Historia&nbsp;Cl&iacute;nica&nbsp;Paciente&nbsp;por&nbsp;M&eacute;dico
                                    </a>';

            $txthistoriaclinicapacienteservicio = '
                                    <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'hcps">
                                        Historia&nbsp;Cl&iacute;nica&nbsp;Paciente&nbsp;por&nbsp;Servicio
                                    </a>';

            $txthistoriaclinicapacientegeneral = '
                                    <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'hcpg">
                                       Historia&nbsp;Cl&iacute;nica&nbsp;Paciente&nbsp;General
                                    </a>';

            $txtauditoria = '<span class="desabilitado">Auditoria</span>';
            $imgauditoria = '<img src="'. IMAGENES_PATH .'/_rptauditoria.png" title="Auditoria" style="border: 0px none;">';
        }

        if ($tipousuario == "r"){
            $imglistadopacientes = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'p">
                                    <img src="'. IMAGENES_PATH .'/rptpaciente.png" title="Listado Pacientes" style="border: 0px none;">
                                 </a>';


            $imglistadomedicos = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'m">
                                    <img src="'. IMAGENES_PATH .'/rptmedico.png" title="Listado M&eacute;dicos" style="border: 0px none;">
                               </a>';

            $imglistadocostos = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'c">
                                <img src="'. IMAGENES_PATH .'/rptcosto.png" title="Listado Costos" style="border: 0px none;">
                              </a>';

            $imglistadousuarios = '<img src="'. IMAGENES_PATH .'/_rptusuario.png" title="Listado Usuarios" style="border: 0px none;">';

            $imgvisualizacionfactura = '<img src="'. IMAGENES_PATH .'/_rptnumerofactura.png" title="Visualizaci&oacute;n&nbsp;Factura" style="border: 0px none;">';

            $imghistorialpagospaciente = '<img src="'. IMAGENES_PATH .'/_rpthistorialpagos.png" title="Historial&nbsp;Pagos&nbsp;Paciente" style="border: 0px none;">';

            $imgrecaudacionmedico = '<img src="'. IMAGENES_PATH .'/_rptrecaudacionmedico.png" title="Recaudaci&oacute;n por M&eacute;cico" style="border: 0px none;">';

            $imgrecaudacionservicio = '<img src="'. IMAGENES_PATH .'/_rptrecaudacionservicio.png" title="Recaudaci&oacute;n por Servicio" style="border: 0px none;">';

            $imgrecaudaciongeneral = '
                                    <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'rg">
                                        <img src="'. IMAGENES_PATH .'/rptrecaudaciongeneral.png" title="Recaudaci&oacute;n&nbsp;General" style="border: 0px none;">
                                    </a>';

            $imgatencionpacientemedico = '<img src="'. IMAGENES_PATH .'/_rptatencionpacientemedico.png" title=" Atenci&oacute;n&nbsp;Paciente&nbsp;por&nbsp;M&eacute;dico" style="border: 0px none;">';

            $imgatencionpacienteservicio = '<img src="'. IMAGENES_PATH .'/_rptatencionpacienteservicio.png" title="Atenci&oacute;n&nbsp;Paciente&nbsp;por&nbsp;Servicio" style="border: 0px none;">';

            $imgatencionpacientegeneral = '
                                    <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'apg">
                                        <img src="'. IMAGENES_PATH .'/rptatencionpacientegeneral.png" title="Atenci&oacute;n&nbsp;Paciente&nbsp;General" style="border: 0px none;">
                                    </a>';

            $imghistoriaclinicapacientemedico = '<img src="'. IMAGENES_PATH .'/_rpthistoriaclinicapacientemedico.png" title="Historia&nbsp;Cl&iacute;nica&nbsp;Paciente&nbsp;por&nbsp;M&eacute;dico" style="border: 0px none;">';

            $imghistoriaclinicapacienteservicio = '<img src="'. IMAGENES_PATH .'/_rpthistoriaclinicapacienteservicio.png" title="Historia&nbsp;Cl&iacute;nica&nbsp;Paciente&nbsp;por&nbsp;Servicio" style="border: 0px none;">';

            $imghistoriaclinicapacientegeneral = '
                                    <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'hcpg">
                                        <img src="'. IMAGENES_PATH .'/rpthistoriaclinicapacientegeneral.png" title="Historia&nbsp;Cl&iacute;nica&nbsp;Paciente&nbsp;General" style="border: 0px none;">
                                    </a>';

            $txtlistadopacientes = ' <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'p">
                                        Listado&nbsp;Pacientes
                                  </a>';

            $txtlistadomedicos = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'m">
                                        Listado&nbsp;M&eacute;dicos
                                    </a>';

            $txtlistadocostos = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'c">
                                        Listado&nbsp;Costos
                                    </a>';

            $txtlistadousuarios = '<span class="desabilitado">Listado&nbsp;Usuarios</span>';

            $txtvisualizacionfactura = '<span class="desabilitado">Visualizaci&oacute;n&nbsp;Factura</span>';

            $txthistorialpagospaciente = '<span class="desabilitado">Historial&nbsp;Pagos&nbsp;Pacientes</span>';

            $txtrecaudacionmedico = '<span class="desabilitado">Recaudaci&oacute;n&nbsp;por&nbsp;M&eacute;dico</span>';

            $txtrecaudacionservicio = '<span class="desabilitado">Recaudaci&oacute;n&nbsp;por&nbsp;Servicio</span>';

            $txtrecaudaciongeneral = '<a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'rg">
                                       Recaudaci&oacute;n&nbsp;General
                                    </a>';


            $txtatencionpacientemedico = '<span class="desabilitado">Atenci&oacute;n&nbsp;Paciente&nbsp;por&nbsp;M&eacute;dico</span>';

            $txtatencionpacienteservicio = '<span class="desabilitado">Atenci&oacute;n&nbsp;Paciente&nbsp;por&nbsp;Servicio</span>';

            $txtatencionpacientegeneral = '
                                    <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'apg">
                                       Atenci&oacute;n&nbsp;Paciente&nbsp;General
                                    </a>';

            $txthistoriaclinicapacientemedico = '<span class="desabilitado">Historia&nbsp;Cl&iacute;nica&nbsp;Paciente&nbsp;por&nbsp;M&eacute;dico</span>';

            $txthistoriaclinicapacienteservicio = '<span class="desabilitado">Historia&nbsp;Cl&iacute;nica&nbsp;Paciente&nbsp;por&nbsp;Servicio</span>';

            $txthistoriaclinicapacientegeneral = '
                                    <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'hcpg">
                                       Historia&nbsp;Cl&iacute;nica&nbsp;Paciente&nbsp;General
                                    </a>';

            $txtauditoria = '<span class="desabilitado">Auditoria</span>';
            $imgauditoria = '<img src="'. IMAGENES_PATH .'/_rptauditoria.png" title="Auditoria" style="border: 0px none;">';
        }


        $retval .= '
                    <table border="0" width="100%" align="center" cellpadding="2" cellspacing="2">
                            <tr>
                                <td colspan="3" align="center" class="tablatitulo">
                                    LISTADO DE REPORTES
                                </td>
                            </tr>

                            <tr class="listadofila0">
                                <td align="center">
                                   '. $imglistadopacientes .'
                                </td>
                                <td align="center">
                                    '. $imglistadomedicos .'
                                </td>
                                <td align="center">
                                    '. $imglistadocostos .'
                                </td>
                            </tr>
                            <tr class="listadofila1">
                                <td align="center">
                                   '. $txtlistadopacientes .'
                                </td>
                                <td align="center">
                                    '. $txtlistadomedicos .'
                                </td>
                                <td align="center">
                                    '. $txtlistadocostos .'
                                </td>
                            </tr>

                            <tr class="listadofila0">
                                <td align="center">
                                    '. $imglistadousuarios .'
                                </td>
                                <td align="center">
                                    '. $imgvisualizacionfactura .'
                                </td>
                                <td align="center">
                                    '. $imghistorialpagospaciente .'
                                </td>
                            </tr>
                            <tr class="listadofila1">
                                <td align="center">
                                    '. $txtlistadousuarios .'
                                </td>
                                <td align="center">
                                    '. $txtvisualizacionfactura .'
                                </td>
                                <td align="center">
                                    '. $txthistorialpagospaciente .'
                                </td>
                            </tr>

                            <tr class="listadofila0">
                                <td align="center">
                                    '. $imgrecaudacionmedico .'
                                </td>
                                <td align="center">
                                    '. $imgrecaudacionservicio .'
                                </td>
                                <td align="center">
                                    '. $imgrecaudaciongeneral .'
                                </td>
                            </tr>
                            <tr class="listadofila1">
                                <td align="center">
                                    '. $txtrecaudacionmedico .'
                                </td>
                                <td align="center">
                                    '. $txtrecaudacionservicio .'
                                </td>
                                <td align="center">
                                    '. $txtrecaudaciongeneral .'
                                </td>
                            </tr>

                            <tr class="listadofila0">
                                <td align="center">
                                    '. $imgatencionpacientemedico .'
                                </td>
                                <td align="center">
                                    '. $imgatencionpacienteservicio .'
                                </td>
                                <td align="center">
                                    '. $imgatencionpacientegeneral .'
                                </td>
                            </tr>

                            <tr class="listadofila1">
                                <td align="center">
                                    '. $txtatencionpacientemedico .'
                                </td>
                                <td align="center">
                                    '. $txtatencionpacienteservicio .'
                                </td>
                                <td align="center">
                                    '. $txtatencionpacientegeneral .'
                                </td>
                            </tr>

                            <tr class="listadofila0">
                                <td align="center">
                                    '. $imghistoriaclinicapacientemedico .'
                                </td>
                                <td align="center">
                                    '. $imghistoriaclinicapacienteservicio .'
                                </td>
                                <td align="center">
                                    '. $imghistoriaclinicapacientegeneral .'
                                </td>
                            </tr>
                            <tr class="listadofila1">
                                <td align="center">
                                    '. $txthistoriaclinicapacientemedico .'
                                </td>
                                <td align="center">
                                    '. $txthistoriaclinicapacienteservicio .'
                                </td>
                                <td align="center">
                                    '. $txthistoriaclinicapacientegeneral .'
                                </td>
                            </tr>

                            <tr class="listadofila0">
                                <td align="center">
                                    '. $imgauditoria .'
                                </td>
                                <td align="center">

                                </td>
                                <td align="center">

                                </td>
                            </tr>

                            <tr class="listadofila1">
                                <td align="center">
                                    '. $txtauditoria .'
                                </td>
                                <td align="center">

                                </td>
                                <td align="center">

                                </td>
                            </tr>
                    </table>';
        $retval .= '</fieldset>';
        return $retval;
    }


    //Administrador - Reporte - Listado Pacientes
    public function getStrListadoPacientes()
    {
        $query = new clQuery();

        //Nombre Procedimientos Almacenados

        $ProcedimientoAlmacenado = sprintf("CALL sprptlistadopacientes();");
        $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
        $resultado = $query->getStrSqlSelect();

        $fecha = date("YmdHis").'.txt';
        $tipousuario = strtolower($_SESSION["usuario"]["tipo"]);

        $retval .= '<fieldset class="fieldsetGrande">';
        $retval .= '<legend class="etiquetaborde">
                        Reporte <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Listado Pacientes
                    </legend>
                   ';
        $retval .= '<table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                    <tr>
                        <td colspan="9" align="center">
                            <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> Regresar |</a>
                            <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso=descargar&descargararchivo='. $fecha .'"> <img src="'. IMAGENES_PATH .'/rptarchivo.png" title="Descargar Archivo" width="16px" height="16px"  border="0" /> Descargar Archivo |</a>
                        <td>
                    </tr>

                    <tr class="tablatitulo">
                        <th colspan="9">LISTADO&nbsp;DE&nbsp;PACIENTES</th>
                    </tr>
                    <tr class="tablasubtitulo">
                        <th align="center">NHC</th>
                        <th align="center">C&eacute;dula</th>
                        <th align="center">Apellidos</th>
                        <th align="center">Nombres</th>
                        <th align="center">Sexo</th>
                        <th align="center">Estado&nbsp;Civil</th>
                        <th align="center">Tipo&nbsp;Sangre</th>
                        <th align="center">Fec.&nbsp;Nac.</th>
                        <th align="center">Instituci&oacute;n</th>
                    </tr>';

        $f = $this->getStrAbrirArchivo($fecha);

        if( count($resultado) > 0 ) {
            $i = 0;
            $j = 0;
            fputs($f,"NHC");
            fputs($f,"\t");
            fputs($f,"SEXO");
            fputs($f,"\t");
            fputs($f,"ESTADO CIVIL");
            fputs($f,"\t");
            fputs($f,"TIPO SANGRE");
            fputs($f,"\t");
            fputs($f,"PROVINCIA");
            fputs($f,"\t");
            fputs($f,"CANTON");
            fputs($f,"\t");
            fputs($f,"PARROQUIA");
            fputs($f,"\t");
            fputs($f,"CEDULA");
            fputs($f,"\t");
            fputs($f,"NOMBRES");
            fputs($f,"\t");
            fputs($f,"APELLIDOS");
            fputs($f,"\t");
            fputs($f,"CALLE PRINCIPAL");
            fputs($f,"\t");
            fputs($f,"CALLE SECUNDARIA");
            fputs($f,"\t");
            fputs($f,"NUMERO CASA");
            fputs($f,"\t");
            fputs($f,"TELEFONO");
            fputs($f,"\t");
            fputs($f,"CELULAR");
            fputs($f,"\t");
            fputs($f,"EMAIL");
            fputs($f,"\t");
            fputs($f,"FECHA NACIMIENTO");
             fputs($f,"\t");
            fputs($f,"INSTITUCION");
            fputs($f,"\n");


            foreach( $resultado as $rst):
                $j = $j + 1;

               $NHC = "";
                    switch (strlen($rst["pacnumerohistoriaclinica"])){
                        case 1:
                                $NHC = "0000".$rst["pacnumerohistoriaclinica"];
                                break;
                        case 2:
                                $NHC = "000".$rst["pacnumerohistoriaclinica"];
                                break;
                        case 3:
                                $NHC = "00".$rst["pacnumerohistoriaclinica"];
                                break;
                        case 4:
                                $NHC = "0".$rst["pacnumerohistoriaclinica"];
                                break;
                        default:
                                $NHC = $rst["pacnumerohistoriaclinica"];
                                break;
                    }

                    $Cedula = "";

                    if ($rst["paccedula"] == "")
                        $Cedula = "-";
                    else
                        $Cedula = $rst["paccedula"];

                $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')">';
                $retval .= 	'<td align="center">'. $NHC .'</td>';
                $retval .= 	'<td align="center">'. $Cedula .'</td>';
                $retval .= 	'<td align="left">'. $rst["pacapellidos"] .'</td>';
                $retval .= 	'<td align="left">'. $rst["pacnombres"] .'</td>';
                $retval .= 	'<td align="left">'. $rst["sexdescripcion"] .'</td>';
                $retval .= 	'<td align="left">'. $rst["estcivdescripcion"] .'</td>';
                $retval .= 	'<td align="center">'. $rst["tipsandescripcion"] .'</td>';
                $retval .= 	'<td align="center">'. $rst["pacfechanacimiento"] .'</td>';
                $retval .= 	'<td align="left">'. $rst["insdescripcion"] .'</td>';
                //$retval .= 	'<td align="center"><div class="vtip" title="Detalle Paciente <br> [ N&uacute;mero Historia Cl&iacute;;nica = '.$rst["pacnumerohistoriaclinica"] .' ]">';
                //$retval .=  '<a href="'. PACIENTE_URL .'paciente.php?btnDetalle=Detalle&strNumeroHistoriaClinica='. $rst["pacnumerohistoriaclinica"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                //$retval .= 	'</div></td>';
                $retval .= '</tr>';
                $i = 1 - $i;

                fputs($f,$rst["pacnumerohistoriaclinica"]);
                fputs($f,"\t");
                fputs($f,$rst["sexdescripcion"]);
                fputs($f,"\t");
                fputs($f,$rst["estcivdescripcion"]);
                fputs($f,"\t");
                fputs($f,$rst["tipsandescripcion"]);
                fputs($f,"\t");
                fputs($f,$rst["prodescripcion"]);
                fputs($f,"\t");
                fputs($f,$rst["candescripcion"]);
                fputs($f,"\t");
                fputs($f,$rst["pardescripcion"]);
                fputs($f,"\t");
                fputs($f,$rst["paccedula"]);
                fputs($f,"\t");
                fputs($f,$rst["pacnombres"]);
                fputs($f,"\t");
                fputs($f,$rst["pacapellidos"]);
                fputs($f,"\t");
                fputs($f,$rst["paccalleprincipal"]);
                fputs($f,"\t");
                fputs($f,$rst["paccallesecundaria"]);
                fputs($f,"\t");
                fputs($f,$rst["pacnumerocasa"]);
                fputs($f,"\t");
                fputs($f,$rst["pactelefono"]);
                fputs($f,"\t");
                fputs($f,$rst["paccelular"]);
                fputs($f,"\t");
                fputs($f,$rst["pacmail"]);
                fputs($f,"\t");
                fputs($f,$rst["pacfechanacimiento"]);
                fputs($f,"\t");
                fputs($f,$rst["insdescripcion"]);
                fputs($f,"\n");
            endforeach;

            $retval .= '<tr class="tablasubtitulo">
                            <th align="right" colspan="8">TOTAL PACIENTES</th>
                            <th align="center">'. number_format($j,0,',','.') .'</th>
                        </tr>
                       ';
        }
        $retval .= '</table>';
        $retval .= '</fieldset>';

        $this->getStrCerrarArchivo($f);
        $this->getStrCopiarArchivo($fecha);

        return $retval;
    }

    //Administrador - Reporte - Listado Medicos
    public function getStrListadoMedicos()
    {
        $query = new clQuery();

        //Nombre Procedimientos Almacenados

        $ProcedimientoAlmacenado = sprintf("CALL sprptlistadomedicos();");
        $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
        $resultado = $query->getStrSqlSelect();

        $fecha = date("YmdHis").'.txt';
        $tipousuario = strtolower($_SESSION["usuario"]["tipo"]);

        $retval .= '<fieldset class="fieldsetGrande">';
        $retval .= '<legend class="etiquetaborde">
                        Reporte <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Listado M&eacute;dicos
                    </legend>
                   ';
        $retval .= '<table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                    <tr>
                        <td colspan="7" align="center">
                            <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> Regresar |</a>
                            <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso=descargar&descargararchivo='. $fecha .'"> <img src="'. IMAGENES_PATH .'/rptarchivo.png" title="Descargar Archivo" width="16px" height="16px"  border="0" /> Descargar Archivo |</a>
                        <td>
                    </tr>

                    <tr class="tablatitulo">
                        <th colspan="7">LISTADO&nbsp;DE&nbsp;MEDICOS</th>
                    </tr>
                    <tr class="tablasubtitulo">
                        <th align="center">C&eacute;dula</th>
                        <th align="center">Apellidos</th>
                        <th align="center">Nombres</th>
                        <th align="center">Sexo</th>
                        <th align="center">Estado&nbsp;Civil</th>
                        <th align="center">Tipo&nbsp;Sangre</th>
                        <th align="center">Fec.&nbsp;Nac.</th>
                    </tr>';



        $f = $this->getStrAbrirArchivo($fecha);

        if( count($resultado) > 0 ) {
            $i = 0;
            $j = 0;
            fputs($f,"CEDULA");
            fputs($f,"\t");
            fputs($f,"NOMBRES");
            fputs($f,"\t");
            fputs($f,"APELLIDOS");
            fputs($f,"\t");
            fputs($f,"SEXO");
            fputs($f,"\t");
            fputs($f,"ESTADO CIVIL");
            fputs($f,"\t");
            fputs($f,"TIPO SANGRE");
            fputs($f,"\t");
            fputs($f,"PROVINCIA");
            fputs($f,"\t");
            fputs($f,"CANTON");
            fputs($f,"\t");
            fputs($f,"PARROQUIA");
            fputs($f,"\t");
            fputs($f,"CALLE PRINCIPAL");
            fputs($f,"\t");
            fputs($f,"CALLE SECUNDARIA");
            fputs($f,"\t");
            fputs($f,"NUMERO CASA");
            fputs($f,"\t");
            fputs($f,"TELEFONO");
            fputs($f,"\t");
            fputs($f,"CELULAR");
            fputs($f,"\t");
            fputs($f,"EMAIL");
            fputs($f,"\t");
            fputs($f,"FECHA NACIMIENTO");
            fputs($f,"\n");


            foreach( $resultado as $rst):
                $j = $j + 1;

                $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')">';
                $retval .= 	'<td align="center">'. $rst["medcedula"] .'</td>';
                $retval .= 	'<td align="left">'. $rst["medapellidos"] .'</td>';
                $retval .= 	'<td align="left">'. $rst["mednombres"] .'</td>';
                $retval .= 	'<td align="left">'. $rst["sexdescripcion"] .'</td>';
                $retval .= 	'<td align="left">'. $rst["estcivdescripcion"] .'</td>';
                $retval .= 	'<td align="center">'. $rst["tipsandescripcion"] .'</td>';
                $retval .= 	'<td align="center">'. $rst["medfechanacimiento"] .'</td>';
                //$retval .= 	'<td align="center"><div class="vtip" title="Detalle Paciente <br> [ N&uacute;mero Historia Cl&iacute;;nica = '.$rst["pacnumerohistoriaclinica"] .' ]">';
                //$retval .=  '<a href="'. PACIENTE_URL .'paciente.php?btnDetalle=Detalle&strNumeroHistoriaClinica='. $rst["pacnumerohistoriaclinica"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                //$retval .= 	'</div></td>';
                $retval .= '</tr>';
                $i = 1 - $i;

                fputs($f,$rst["medcedula"]);
                fputs($f,"\t");
                fputs($f,$rst["mednombres"]);
                fputs($f,"\t");
                fputs($f,$rst["medapellidos"]);
                fputs($f,"\t");
                fputs($f,$rst["sexdescripcion"]);
                fputs($f,"\t");
                fputs($f,$rst["estcivdescripcion"]);
                fputs($f,"\t");
                fputs($f,$rst["tipsandescripcion"]);
                fputs($f,"\t");
                fputs($f,$rst["prodescripcion"]);
                fputs($f,"\t");
                fputs($f,$rst["candescripcion"]);
                fputs($f,"\t");
                fputs($f,$rst["pardescripcion"]);
                fputs($f,"\t");
                fputs($f,$rst["medcalleprincipal"]);
                fputs($f,"\t");
                fputs($f,$rst["medcallesecundaria"]);
                fputs($f,"\t");
                fputs($f,$rst["mednumerocasa"]);
                fputs($f,"\t");
                fputs($f,$rst["medtelefono"]);
                fputs($f,"\t");
                fputs($f,$rst["medcelular"]);
                fputs($f,"\t");
                fputs($f,$rst["medmail"]);
                fputs($f,"\t");
                fputs($f,$rst["medfechanacimiento"]);
                fputs($f,"\n");
            endforeach;

            $retval .= '<tr class="tablasubtitulo">
                            <th align="right" colspan="6">TOTAL MEDICOS</th>
                            <th align="center">'. number_format($j,0,',','.') .'</th>
                        </tr>
                       ';
        }
        $retval .= '</table>';
        $retval .= '</fieldset>';

        $this->getStrCerrarArchivo($f);
        $this->getStrCopiarArchivo($fecha);

        return $retval;
    }

    //Administrador - Reporte - Listado Usuarios
    public function getStrListadoUsuarios()
    {
        $query = new clQuery();

        //Nombre Procedimientos Almacenados

        $ProcedimientoAlmacenado = sprintf("CALL sprptlistadousuarios();");
        $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
        $resultado = $query->getStrSqlSelect();

        $fecha = date("YmdHis").'.txt';
        $tipousuario = strtolower($_SESSION["usuario"]["tipo"]);

        $retval .= '<fieldset class="fieldsetGrande">';
        $retval .= '<legend class="etiquetaborde">
                        Reporte <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Listado M&eacute;dicos
                    </legend>
                   ';
        $retval .= '<table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                    <tr>
                        <td colspan="6" align="center">
                            <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> Regresar |</a>
                            <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso=descargar&descargararchivo='. $fecha .'"> <img src="'. IMAGENES_PATH .'/rptarchivo.png" title="Descargar Archivo" width="16px" height="16px"  border="0" /> Descargar Archivo |</a>
                        <td>
                    </tr>

                    <tr class="tablatitulo">
                        <th colspan="6">LISTADO&nbsp;DE&nbsp;USUARIOS</th>
                    </tr>
                    <tr class="tablasubtitulo">
                        <th align="center">Apellidos</th>
                        <th align="center">Nombres</th>
                        <th align="center">Usuario</th>
                        <th align="center">Clave</th>
                        <th align="center">Tipo</th>
                        <th align="center">Estado</th>
                    </tr>';



        $f = $this->getStrAbrirArchivo($fecha);

        if( count($resultado) > 0 ) {
            $i = 0;
            $j = 0;
            fputs($f,"NOMBRES");
            fputs($f,"\t");
            fputs($f,"APELLIDOS");
            fputs($f,"\t");
            fputs($f,"USUARIO");
            fputs($f,"\t");
            fputs($f,"CLAVE");
            fputs($f,"\t");
            fputs($f,"TIPO");
            fputs($f,"\t");
            fputs($f,"ESTADO");
            fputs($f,"\n");


            foreach( $resultado as $rst):
                $j = $j + 1;

                $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')">';
                $retval .= 	'<td align="left">'. $rst["usuapellidos"] .'</td>';
                $retval .= 	'<td align="left">'. $rst["usunombres"] .'</td>';
                $retval .= 	'<td align="left">'. $rst["usucuenta"] .'</td>';
                $retval .= 	'<td align="left">'. $rst["usuclave"] .'</td>';
                $retval .= 	'<td align="left">'. $rst["tipusudescripcion"] .'</td>';
                $retval .= 	'<td align="center">'. $rst["estusudescripcion"] .'</td>';
                //$retval .= 	'<td align="center"><div class="vtip" title="Detalle Paciente <br> [ N&uacute;mero Historia Cl&iacute;;nica = '.$rst["pacnumerohistoriaclinica"] .' ]">';
                //$retval .=  '<a href="'. PACIENTE_URL .'paciente.php?btnDetalle=Detalle&strNumeroHistoriaClinica='. $rst["pacnumerohistoriaclinica"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                //$retval .= 	'</div></td>';
                $retval .= '</tr>';
                $i = 1 - $i;

                fputs($f,$rst["usunombres"]);
                fputs($f,"\t");
                fputs($f,$rst["usuapellidos"]);
                fputs($f,"\t");
                fputs($f,$rst["usucuenta"]);
                fputs($f,"\t");
                fputs($f,$rst["usuclave"]);
                fputs($f,"\t");
                fputs($f,$rst["tipusudescripcion"]);
                fputs($f,"\t");
                fputs($f,$rst["estusudescripcion"]);
                fputs($f,"\n");
            endforeach;

            $retval .= '<tr class="tablasubtitulo">
                            <th align="right" colspan="5">TOTAL USUARIOS</th>
                            <th align="center">'. number_format($j,0,',','.') .'</th>
                        </tr>
                       ';
        }
        $retval .= '</table>';
        $retval .= '</fieldset>';

        $this->getStrCerrarArchivo($f);
        $this->getStrCopiarArchivo($fecha);

        return $retval;
    }

    //Administrador - Reporte - Listado Precios
    public function getStrListadoPrecios()
    {
        $query = new clQuery();

        //Nombre Procedimientos Almacenados

        $ProcedimientoAlmacenado = sprintf("CALL sprptlistadoprecios();");
        $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
        $resultado = $query->getStrSqlSelect();

        $fecha = date("YmdHis").'.txt';
        $tipousuario = strtolower($_SESSION["usuario"]["tipo"]);

        $retval .= '<fieldset class="fieldsetGrande">';
        $retval .= '<legend class="etiquetaborde">
                        Reporte <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> Listado Precios
                    </legend>
                   ';
        $retval .= '<table border="0" width="100%" cellpadding="1" cellspacing="1" align="center">
                    <tr>
                        <td colspan="4" align="center">
                            <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tipousuario .'">| <img src="'. IMAGENES_PATH .'/atras.png" title="Regresar" width="16px" height="16px"  border="0" /> Regresar |</a>
                            <a href="'. REPORTE_URL .'reporte.php?btnreporte-acceso=descargar&descargararchivo='. $fecha .'"> <img src="'. IMAGENES_PATH .'/rptarchivo.png" title="Descargar Archivo" width="16px" height="16px"  border="0" /> Descargar Archivo |</a>
                        <td>
                    </tr>

                    <tr class="tablatitulo">
                        <th colspan="4">LISTADO&nbsp;DE&nbsp;PRECIOS</th>
                    </tr>
                    <tr class="tablasubtitulo">
                        <th align="center">Departamento</th>
                        <th align="center">Unidad</th>
                        <th align="center">Area</th>
                        <th align="center">Costo ($)</th>
                    </tr>';



        $f = $this->getStrAbrirArchivo($fecha);

        if( count($resultado) > 0 ) {
            $i = 0;
            $j = 0;
            fputs($f,"DEPARTAMENTO");
            fputs($f,"\t");
            fputs($f,"UNIDAD");
            fputs($f,"\t");
            fputs($f,"AREA");
            fputs($f,"\t");
            fputs($f,"COSTO");
            fputs($f,"\n");


            foreach( $resultado as $rst):
                $j = $j + 1;

                $retval .= '<tr class="listadofila'.$i.'" onMouseOver="resaltar(this)" onMouseOut="normal(this,'. $i .')">';
                $retval .= 	'<td align="left">'. $rst["depdescripcion"] .'</td>';
                $retval .= 	'<td align="left">'. $rst["unidescripcion"] .'</td>';
                $retval .= 	'<td align="left">'. $rst["subaredescripcion"] .'</td>';
                $retval .= 	'<td align="right">$ '. $rst["areprecio"] .'</td>';
                //$retval .= 	'<td align="center"><div class="vtip" title="Detalle Paciente <br> [ N&uacute;mero Historia Cl&iacute;;nica = '.$rst["pacnumerohistoriaclinica"] .' ]">';
                //$retval .=  '<a href="'. PACIENTE_URL .'paciente.php?btnDetalle=Detalle&strNumeroHistoriaClinica='. $rst["pacnumerohistoriaclinica"] .'"><img src="'. IMAGENES_PATH .'/detalle.png" title="" width="16px" height="16px"  border="0" /></a>';
                //$retval .= 	'</div></td>';
                $retval .= '</tr>';
                $i = 1 - $i;

                fputs($f,$rst["depdescripcion"]);
                fputs($f,"\t");
                fputs($f,$rst["unidescripcion"]);
                fputs($f,"\t");
                fputs($f,$rst["subaredescripcion"]);
                fputs($f,"\t");
                fputs($f,$rst["areprecio"]);
                fputs($f,"\n");
            endforeach;

            $retval .= '<tr class="tablasubtitulo">
                            <th align="right" colspan="3">TOTAL AREAS</th>
                            <th align="center">'. number_format($j,0,',','.') .'</th>
                        </tr>
                       ';
        }
        $retval .= '</table>';
        $retval .= '</fieldset>';

        $this->getStrCerrarArchivo($f);
        $this->getStrCopiarArchivo($fecha);

        return $retval;
    }

     public function getStrFormularioRecaudacionAtencionHistoriaClinicaMedico($tiporeporte)
        {
            $tipomedico = new clTipoMedico();
            $especialidadmedico = new clEspecialidadMedico();
            $paciente =  new clPaciente();

            $imagen = "<img src='". IMAGENES_PATH ."/cargando.gif' width='20px' height='20px' />";

             $retval .= '
                        <script>
                            $(document).ready(function(){
                                $.metadata.setType( \'attr\', \'validate\' );
                                $(\'#frmrecaudacionatencionhistoriaclinicamedico\').validate({
                                        rules:{
                                                lsMedico: { required: true },
                                                lsTipoMedico: { required: true }
                                        },
                                        messages:{
                                                lsMedico: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
                                                lsTipoMedico: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"}
                                        }
                                });

                                  $("#lsTipoMedico").change(function () {
                                        $("#lsTipoMedico option:selected").each(function () {
                                                var tmedico = $(this).val();
                                                $.post( "'. REPORTE_URL .'reporte.php", { btnreporteacceso: "EspecialidadMedico",
                                                                                            strCodigoTipoMedico: tmedico
                                                                                        },
                                                function(data){
                                                        $("#lsMedico").html(data);
                                                });
                                        });
                                 });

                            });
                        </script>
                       ';

             if (($tiporeporte == "ahcpm") || ($tiporeporte == "shcpm") || ($tiporeporte == "mhcpm") || ($tiporeporte == "ehcpm")){
                 $rptpaciente = '<tr class="formulariofila1">
                                    <td align="right"><b>Paciente:&nbsp;</b></td>
                                    <td align="left">
                                         '. $paciente->getStrListarPacientes($this->getStrNumeroHistoriaClinicaPaciente()) .'
                                    </td>
                                </tr>';
                 $rptfecha = '';
             }else{
                 $rptpaciente = "";
                 $rptfecha = '<tr class="formulariofila1">
                                <td  align="right"><b>Fecha&nbsp;Inicio:</b></td>
                                <td align="left">
                                    <input name="dtFechaInicio" type="text" id="dtFechaInicio" value="'. $this->getStrFechaInicio() .'" size="10" readonly="readonly" class="textboxfecha" />
                                    <a href="#">
                                        <img src="'. IMAGENES_PATH .'/calendario.png" title="Calendario" name="strFechaInicio" id="strFechaInicio" width="16px" height="16px" style="border: 0px none;">
                                    </a>
                                    <script type="text/javascript">
                                        Calendar.setup({
                                                         inputField: "dtFechaInicio",
                                                         ifFormat: "%Y-%m-%d",
                                                         button: "strFechaInicio"
                                                         });
                                    </script>
                                </td>
                            </tr>

                            <tr class="formulariofila1">
                                <td  align="right"><b>Fecha&nbsp;Fin:</b></td>
                                <td align="left">
                                    <input name="dtFechaFin" type="text" id="dtFechaFin" value="'. $this->getStrFechaFin() .'" size="10" readonly="readonly" class="textboxfecha" />
                                    <a href="#">
                                        <img src="'. IMAGENES_PATH .'/calendario.png" title="Calendario" name="strFechaFin" id="strFechaFin" width="16px" height="16px" style="border: 0px none;">
                                    </a>
                                    <script type="text/javascript">
                                        Calendar.setup({
                                                         inputField: "dtFechaFin",
                                                         ifFormat: "%Y-%m-%d",
                                                         button: "strFechaFin"
                                                         });
                                    </script>
                                </td>
                            </tr>';
             }

            $retval .= '
                        <form id="frmrecaudacionatencionhistoriaclinicamedico" action="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tiporeporte .'_pdf" method="POST">
                       ';

            $tipousuario = strtolower($_SESSION["usuario"]["tipo"]);

            $Regresar = "regresar('". REPORTE_URL . "reporte.php?btnreporte-acceso=". $tipousuario ."')";

            $retval .= '<fieldset class="fieldsetPequeno">';
            $retval .= '<legend class="etiquetaborde">
                            Reporte <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> '. $this->getStrEtiqueta() .'
                        </legend>
                       ';

            $retval .= '
                        <table width="100%" border="0" align="center" cellpadding="1" cellspacing="1">
                            <tr>
                                <td colspan="2" align="center" class="tablatitulo">
                                        '. $this->getStrEtiqueta() .'
                                </td>
                            </tr>

                            <tr class="formulariofila1">
                                <td  align="right"><b>Tipo&nbsp;M&eacute;dico:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsTipoMedico" id="lsTipoMedico" class="combobox">
                                        '. $tipomedico->getStrListar($this->getStrTipoMedico()) .'
                                    </select>
                                </td>
                            </tr>

                            <tr class="formulariofila1">
                                <td  align="right"><b>M&eacute;dico:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsMedico" id="lsMedico" class="combobox">
                                        '. $especialidadmedico->getStrListarMedicosEspecialidad($this->getStrTipoMedico(), $this->getStrEspecialidadMedico()) .'
                                    </select>
                                </td>
                            </tr>


                            '. $rptpaciente .'

                            '. $rptfecha .'


                            <tr>
                                <td colspan="2" class="formulariofila1" align="center">
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

        public function getStrFormularioRecaudacionAtencionHistoriaClinicaServicio($tiporeporte)
        {
             $tipomedico = new clTipoMedico();
             $paciente =  new clPaciente();

            $imagen = "<img src='". IMAGENES_PATH ."/cargando.gif' width='20px' height='20px' />";

             $retval .= '
                        <script>
                            $(document).ready(function(){
                                $.metadata.setType( \'attr\', \'validate\' );
                                $(\'#frmrecaudacion\').validate({
                                        rules:{
                                                lsTipoMedico: { required: true }
                                        },
                                        messages:{
                                                lsTipoMedico: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"}
                                        }
                                });
                            });
                        </script>
                       ';


             if (($tiporeporte == "ahcps") || ($tiporeporte == "shcps") || ($tiporeporte == "mhcps") || ($tiporeporte == "ehcps")){
                 $rptpaciente = '<tr class="formulariofila1">
                                    <td align="right"><b>Paciente:&nbsp;</b></td>
                                    <td align="left">
                                         '. $paciente->getStrListarPacientes($this->getStrNumeroHistoriaClinicaPaciente()) .'
                                    </td>
                                </tr>';
                 $rptfecha = '';
             }else{
                 $rptpaciente = "";
                 $rptfecha = '<tr class="formulariofila1">
                                <td  align="right"><b>Fecha&nbsp;Inicio:</b></td>
                                <td align="left">
                                    <input name="dtFechaInicio" type="text" id="dtFechaInicio" value="'. $this->getStrFechaInicio() .'" size="10" readonly="readonly" class="textboxfecha" />
                                    <a href="#">
                                        <img src="'. IMAGENES_PATH .'/calendario.png" title="Calendario" name="strFechaInicio" id="strFechaInicio" width="16px" height="16px" style="border: 0px none;">
                                    </a>
                                    <script type="text/javascript">
                                        Calendar.setup({
                                                         inputField: "dtFechaInicio",
                                                         ifFormat: "%Y-%m-%d",
                                                         button: "strFechaInicio"
                                                         });
                                    </script>
                                </td>
                            </tr>

                            <tr class="formulariofila1">
                                <td  align="right"><b>Fecha&nbsp;Fin:</b></td>
                                <td align="left">
                                    <input name="dtFechaFin" type="text" id="dtFechaFin" value="'. $this->getStrFechaFin() .'" size="10" readonly="readonly" class="textboxfecha" />
                                    <a href="#">
                                        <img src="'. IMAGENES_PATH .'/calendario.png" title="Calendario" name="strFechaFin" id="strFechaFin" width="16px" height="16px" style="border: 0px none;">
                                    </a>
                                    <script type="text/javascript">
                                        Calendar.setup({
                                                         inputField: "dtFechaFin",
                                                         ifFormat: "%Y-%m-%d",
                                                         button: "strFechaFin"
                                                         });
                                    </script>
                                </td>
                            </tr>';
             }

            $retval .= '
                        <form id="frmrecaudacion" action="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tiporeporte .'_pdf" method="POST">
                       ';

            $tipousuario = strtolower($_SESSION["usuario"]["tipo"]);

            $Regresar = "regresar('". REPORTE_URL . "reporte.php?btnreporte-acceso=". $tipousuario ."')";

            $retval .= '<fieldset class="fieldsetPequeno">';
            $retval .= '<legend class="etiquetaborde">
                            Reporte <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> '. $this->getStrEtiqueta() .'
                        </legend>
                       ';

            $retval .= '
                        <table width="100%" border="0" align="center" cellpadding="1" cellspacing="1">
                            <tr>
                                <td colspan="2" align="center" class="tablatitulo">
                                        '. $this->getStrEtiqueta() .'
                                </td>
                            </tr>

                            <tr class="formulariofila1">
                                <td  align="right"><b>Tipo&nbsp;M&eacute;dico:&nbsp;</b></td>
                                <td align="left">
                                    <select name="lsTipoMedico" id="lsTipoMedico" class="combobox">
                                        '. $tipomedico->getStrListar($this->getStrTipoMedico()) .'
                                    </select>
                                </td>
                            </tr>

                            '. $rptpaciente .'

                            '. $rptfecha .'

                            <tr>
                                <td colspan="2" class="formulariofila1" align="center">
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

         public function getStrFormularioRecaudacionAtencionHistoriaClinicaGeneral($tiporeporte)
        {
              $paciente =  new clPaciente();

            if (($tiporeporte == "ahcpg") || ($tiporeporte == "shcpg") || ($tiporeporte == "mhcpg") || ($tiporeporte == "ehcpg")  || ($tiporeporte == "rhcpg")){
                 $rptpaciente = '<tr class="formulariofila1">
                                    <td align="right"><b>Paciente:&nbsp;</b></td>
                                    <td align="left">
                                         '. $paciente->getStrListarPacientes($this->getStrNumeroHistoriaClinicaPaciente()) .'
                                    </td>
                                </tr>';
                 $rptfecha = '';
             }else{
                 $rptpaciente = "";
                 $rptfecha = '<tr class="formulariofila1">
                                <td  align="right"><b>Fecha&nbsp;Inicio:</b></td>
                                <td align="left">
                                    <input name="dtFechaInicio" type="text" id="dtFechaInicio" value="'. $this->getStrFechaInicio() .'" size="10" readonly="readonly" class="textboxfecha" />
                                    <a href="#">
                                        <img src="'. IMAGENES_PATH .'/calendario.png" title="Calendario" name="strFechaInicio" id="strFechaInicio" width="16px" height="16px" style="border: 0px none;">
                                    </a>
                                    <script type="text/javascript">
                                        Calendar.setup({
                                                         inputField: "dtFechaInicio",
                                                         ifFormat: "%Y-%m-%d",
                                                         button: "strFechaInicio"
                                                         });
                                    </script>
                                </td>
                            </tr>

                            <tr class="formulariofila1">
                                <td  align="right"><b>Fecha&nbsp;Fin:</b></td>
                                <td align="left">
                                    <input name="dtFechaFin" type="text" id="dtFechaFin" value="'. $this->getStrFechaFin() .'" size="10" readonly="readonly" class="textboxfecha" />
                                    <a href="#">
                                        <img src="'. IMAGENES_PATH .'/calendario.png" title="Calendario" name="strFechaFin" id="strFechaFin" width="16px" height="16px" style="border: 0px none;">
                                    </a>
                                    <script type="text/javascript">
                                        Calendar.setup({
                                                         inputField: "dtFechaFin",
                                                         ifFormat: "%Y-%m-%d",
                                                         button: "strFechaFin"
                                                         });
                                    </script>
                                </td>
                            </tr>';
             }

            $retval .= '
                        <form id="frmrecaudacion" action="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tiporeporte .'_pdf" method="POST">
                       ';

            $tipousuario = strtolower($_SESSION["usuario"]["tipo"]);

            $Regresar = "regresar('". REPORTE_URL . "reporte.php?btnreporte-acceso=". $tipousuario ."')";

            $retval .= '<fieldset class="fieldsetPequeno">';
            $retval .= '<legend class="etiquetaborde">
                            Reporte <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> '. $this->getStrEtiqueta() .'
                        </legend>
                       ';

            $retval .= '
                        <table width="100%" border="0" align="center" cellpadding="1" cellspacing="1">
                            <tr>
                                <td colspan="2" align="center" class="tablatitulo">
                                        '. $this->getStrEtiqueta() .'
                                </td>
                            </tr>

                            '. $rptpaciente .'

                            '. $rptfecha .'

                            <tr>
                                <td colspan="2" class="formulariofila1" align="center">
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

        //Recaudacion Medico - PDF
       public function getStrRptRecaudacionMedico()
        {
            define('FPDF_FONTPATH',FONT_PATH);
            include_once ( CLASS_PATH . "class.clfpdf.php" );

            //Limpia el buffer si no sale un error
            ob_end_clean();

            $fechaimpresion = date("Y/m/d H:i:s a");


            //create a FPDF object
            $pdf = new FPDF('P' , 'mm' , 'A4');

            //set document properties
            $pdf->SetAuthor('CPCH - KOICA');
            $pdf->SetTitle('Recibo Servicio');

            //encabezado
            $pdf->setStrTipoEncabezado(2);
            $pdf->Header();
            //
            //Envia a otra pagina
            $pdf->setAutoPagebreak(true,'');

            //set font for the entire document
            $pdf->SetFont('Arial','B',35);
            $pdf->SetTextColor(50,60,100);

            //set up a page
            $pdf->AddPage('P');
            $pdf->SetDisplayMode(75,'default');

            //insert an image and make it a link
            //$pdf->Image('logo.png',10,20,33,0,' ','http://www.fpdf.org/');

            $query = new clQuery();

            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL sprptrecaudacionmedico('%d','%d','%s','%s');", $this->getStrTipoMedico(),$this->getStrEspecialidadMedico(), $this->getStrFechaInicio(), $this->getStrFechaFin());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 ) {
                $i = 0;
                $j = 0;
                $Total = 0;
                foreach( $resultado as $rst):
                    $j = $j + 1;

                     if ($i == 0){
                         $pdf->Ln(2);

                         $pdf->SetFont('Arial','B',9);
                         $pdf->Cell(30,10,utf8_decode('SERVICIO: '),1,0,'C',0);

                         $pdf->SetFont('Arial','',8);
                         $pdf->Cell(55,10,utf8_decode(utf8_encode($rst["departamento"])),1,0,'C',0);

                         $pdf->Cell(20,10,'',0,0,'C',0);

                         $pdf->SetFont('Arial','B',9);
                         $pdf->Cell(30,10,utf8_decode('MEDICO: '),1,0,'C',0);

                         $pdf->SetFont('Arial','',8);
                         $pdf->Cell(55,10,utf8_decode(utf8_encode($rst["medico"])),1,1,'C',0);

//                         $pdf->Line(10, 70, 200, 70);

                         $pdf->Ln(2);

                         $pdf->SetFont('Arial','B',8);
                         $pdf->Cell(10,6,utf8_decode('N°'),1,0,'C',0);
                         $pdf->Cell(15,6,utf8_decode('Fecha'),1,0,'C',0);
                         $pdf->Cell(10,6,utf8_decode('NHC'),1,0,'C',0);
                         $pdf->Cell(55,6,utf8_decode('Paciente'),1,0,'C',0);
                         $pdf->Cell(10,6,utf8_decode('Sexo'),1,0,'C',0);
                         $pdf->Cell(60,6,utf8_decode('Unidad'),1,0,'C',0);
                         $pdf->Cell(15,6,utf8_decode('Edades'),1,0,'C',0);
                         $pdf->Cell(15,6,utf8_decode('Costo ($)'),1,1,'C',0);

                         $i = 1;
                     }

                     $NHC = "";
                    switch (strlen($rst["nhc"])){
                        case 1:
                                $NHC = "0000".$rst["nhc"];
                                break;
                        case 2:
                                $NHC = "000".$rst["nhc"];
                                break;
                        case 3:
                                $NHC = "00".$rst["nhc"];
                                break;
                        case 4:
                                $NHC = "0".$rst["nhc"];
                                break;
                        default:
                                $NHC = $rst["nhc"];
                                break;
                    }

                     $pdf->SetFont('Arial','',7);
                     $pdf->Cell(10,5,$j,1,0,'C',0);
                     $pdf->Cell(15,5,$rst["fecha"],1,0,'C',0);
                     $pdf->Cell(10,5,$NHC,1,0,'C',0);
                     $pdf->Cell(55,5,utf8_decode(utf8_encode($rst["paciente"])),1,0,'L',0);
                     $pdf->Cell(10,5,utf8_decode(utf8_encode($rst["sexo"])),1,0,'C',0);
                     $pdf->Cell(60,5,utf8_decode(utf8_encode($rst["unidad"])),1,0,'L',0);
                     $pdf->Cell(15,5,utf8_decode(utf8_encode($rst["subarea"])),1,0,'L',0);
                     $pdf->Cell(15,5,utf8_decode(utf8_encode(number_format($rst["costo"],2,',','.'))),1,1,'R',0);

                     $Total = $Total + $rst["costo"];

                endforeach;

                 $pdf->SetFont('Arial','B',10);
                 $pdf->Cell(175,5,'TOTAL ($) ',1,0,'R',0);
                 $pdf->Cell(15,5,  number_format($Total,2,',','.'),1,1,'R',0);

                 //Fecha Impresion
                $pdf->Ln(1);
                $pdf->SetFont('Arial','B',6);
                $pdf->Cell(20,4,utf8_decode('Fecha Impresión:'),0,0,'L',0);
                $pdf->SetFont('Arial','',6);
                $pdf->Cell(20,4,"  ".utf8_decode($fechaimpresion),0,1,'L',0);


                $pdf->Ln(20);
                $pdf->SetFont('Arial','B',10);
                $pdf->SetX (40);
                $pdf->Cell(50,4,'________________________________',0,0,'C',0);
                $pdf->Cell(40,4,'',0,0,'C',0);
                $pdf->Cell(50,4,'________________________________',0,1,'C',0);
                $pdf->SetX (40);
                $pdf->Cell(50,4,utf8_decode(RESPONSABLE),0,0,'C',0);
                $pdf->Cell(40,4,'',0,0,'C',0);
                $pdf->Cell(50,4,utf8_decode(TESORERO),0,1,'C',0);
                $pdf->SetX (40);
                $pdf->Cell(50,4,'RESPONSABLE',0,0,'C',0);
                $pdf->Cell(40,4,'',0,0,'C',0);
                $pdf->Cell(50,4,'TESORERO',0,1,'C',0);

                for($x = 0; $x < (260 - $pdf->GetY()); $x++){
                          $pdf->Ln(10);
                    }

                     $pdf->setAutoPagebreak(true,50);

            }else{
                //Set x and y position for the main text, reduce font size and write content
                $pdf->SetXY (30,100);
                $pdf->SetFontSize(8);
                $pdf->Write(5,utf8_decode(' No existe Informacion registrada'));
            }

            //Pie Pagina
            $pdf->Footer();

            //Para poner la Pagina 1/(1...n)
            $pdf->AliasNbPages();

            //Output the document
            $fecha = date("YmdHis").'.pdf';
            $pdf->Output($fecha,'D');

        }

         //Recaudacion Servicio - PDF
       public function getStrRptRecaudacionServicio()
        {
            define('FPDF_FONTPATH',FONT_PATH);
            include_once ( CLASS_PATH . "class.clfpdf.php" );

            //Limpia el buffer si no sale un error
            ob_end_clean();

            $fechaimpresion = date("Y/m/d H:i:s a");


            //create a FPDF object
            $pdf = new FPDF('P' , 'mm' , 'A4');

            //set document properties
            $pdf->SetAuthor('CPCH - KOICA');
            $pdf->SetTitle('Recibo Servicio');

            //encabezado
            $pdf->setStrTipoEncabezado(3);
            $pdf->Header();
            //
            //Envia a otra pagina
            $pdf->setAutoPagebreak(true,'');

            //set font for the entire document
            $pdf->SetFont('Arial','B',35);
            $pdf->SetTextColor(50,60,100);

            //set up a page
            $pdf->AddPage('P');
            $pdf->SetDisplayMode(75,'default');

            //insert an image and make it a link
            //$pdf->Image('logo.png',10,20,33,0,' ','http://www.fpdf.org/');

            $query = new clQuery();

            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL sprptrecaudacionservicio('%d','%s','%s');", $this->getStrTipoMedico(), $this->getStrFechaInicio(), $this->getStrFechaFin());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 ) {
                $i = 0;
                $j = 0;
                $Total = 0;
                foreach( $resultado as $rst):
                    $j = $j + 1;

                     if ($i == 0){
                         $pdf->Ln(2);

                         $pdf->SetFont('Arial','B',9);
                         $pdf->Cell(30,10,utf8_decode('SERVICIO: '),1,0,'C',0);

                         $pdf->SetFont('Arial','',8);
                         $pdf->Cell(55,10,utf8_decode(utf8_encode($rst["departamento"])),1,1,'C',0);

                         $pdf->Ln(2);

                         $pdf->SetFont('Arial','B',8);
                         $pdf->Cell(10,6,utf8_decode('N°'),1,0,'C',0);
                         $pdf->Cell(15,6,utf8_decode('Fecha'),1,0,'C',0);
                         $pdf->Cell(10,6,utf8_decode('NHC'),1,0,'C',0);
                         $pdf->Cell(55,6,utf8_decode('Paciente'),1,0,'C',0);
                         $pdf->Cell(10,6,utf8_decode('Sexo'),1,0,'C',0);
                         $pdf->Cell(60,6,utf8_decode('Unidad'),1,0,'C',0);
                         $pdf->Cell(15,6,utf8_decode('Edades'),1,0,'C',0);
                         $pdf->Cell(15,6,utf8_decode('Costo ($)'),1,1,'C',0);

                         $i = 1;
                     }

                     $NHC = "";
                    switch (strlen($rst["nhc"])){
                        case 1:
                                $NHC = "0000".$rst["nhc"];
                                break;
                        case 2:
                                $NHC = "000".$rst["nhc"];
                                break;
                        case 3:
                                $NHC = "00".$rst["nhc"];
                                break;
                        case 4:
                                $NHC = "0".$rst["nhc"];
                                break;
                        default:
                                $NHC = $rst["nhc"];
                                break;
                    }

                     $pdf->SetFont('Arial','',7);
                     $pdf->Cell(10,5,$j,1,0,'C',0);
                     $pdf->Cell(15,5,$rst["fecha"],1,0,'C',0);
                     $pdf->Cell(10,5,$NHC,1,0,'C',0);
                     $pdf->Cell(55,5,utf8_decode(utf8_encode($rst["paciente"])),1,0,'L',0);
                     $pdf->Cell(10,5,utf8_decode(utf8_encode($rst["sexo"])),1,0,'C',0);
                     $pdf->Cell(60,5,utf8_decode(utf8_encode($rst["unidad"])),1,0,'L',0);
                     $pdf->Cell(15,5,utf8_decode(utf8_encode($rst["subarea"])),1,0,'L',0);
                     $pdf->Cell(15,5,utf8_decode(utf8_encode(number_format($rst["costo"],2,',','.'))),1,1,'R',0);

                     $Total = $Total + $rst["costo"];

                endforeach;

                 $pdf->SetFont('Arial','B',10);
                 $pdf->Cell(175,5,'TOTAL ($) ',1,0,'R',0);
                 $pdf->Cell(15,5,  number_format($Total,2,',','.'),1,1,'R',0);

                 //Fecha Impresion
                $pdf->Ln(1);
                $pdf->SetFont('Arial','B',6);
                $pdf->Cell(20,4,utf8_decode('Fecha Impresión:'),0,0,'L',0);
                $pdf->SetFont('Arial','',6);
                $pdf->Cell(20,4,"  ".utf8_decode($fechaimpresion),0,1,'L',0);


                $pdf->Ln(20);
                $pdf->SetFont('Arial','B',10);
                $pdf->SetX (40);
                $pdf->Cell(50,4,'________________________________',0,0,'C',0);
                $pdf->Cell(40,4,'',0,0,'C',0);
                $pdf->Cell(50,4,'________________________________',0,1,'C',0);
                $pdf->SetX (40);
                $pdf->Cell(50,4,utf8_decode(RESPONSABLE),0,0,'C',0);
                $pdf->Cell(40,4,'',0,0,'C',0);
                $pdf->Cell(50,4,utf8_decode(TESORERO),0,1,'C',0);
                $pdf->SetX (40);
                $pdf->Cell(50,4,'RESPONSABLE',0,0,'C',0);
                $pdf->Cell(40,4,'',0,0,'C',0);
                $pdf->Cell(50,4,'TESORERO',0,1,'C',0);

                for($x = 0; $x < (260 - $pdf->GetY()); $x++){
                          $pdf->Ln(10);
                    }

                     $pdf->setAutoPagebreak(true,50);

            }else{
                //Set x and y position for the main text, reduce font size and write content
                $pdf->SetXY (30,100);
                $pdf->SetFontSize(8);
                $pdf->Write(5,utf8_decode(' No existe Informacion registrada'));
            }

            //Pie Pagina
            $pdf->Footer();

            //Para poner la Pagina 1/(1...n)
            $pdf->AliasNbPages();

            //Output the document
            $fecha = date("YmdHis").'.pdf';
            $pdf->Output($fecha,'D');

        }

         //Recaudacion General - PDF
       public function getStrRptRecaudacionGeneral()
        {
            define('FPDF_FONTPATH',FONT_PATH);
            include_once ( CLASS_PATH . "class.clfpdf.php" );

            //Limpia el buffer si no sale un error
            ob_end_clean();

            $fechaimpresion = date("Y/m/d H:i:s a");


            //create a FPDF object
            $pdf = new FPDF('P' , 'mm' , 'A4');

            //set document properties
            $pdf->SetAuthor('CPCH - KOICA');
            $pdf->SetTitle('Recibo Servicio');

            //encabezado
            $pdf->setStrTipoEncabezado(4);
            $pdf->Header();
            //
            //Envia a otra pagina
            $pdf->setAutoPagebreak(true,'');

            //set font for the entire document
            $pdf->SetFont('Arial','B',35);
            $pdf->SetTextColor(50,60,100);

            //set up a page
            $pdf->AddPage('L');
            $pdf->SetDisplayMode(75,'default');

            //insert an image and make it a link
            //$pdf->Image('logo.png',10,20,33,0,' ','http://www.fpdf.org/');

            $query = new clQuery();

            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL sprptrecaudaciongeneral('%s','%s');", $this->getStrFechaInicio(), $this->getStrFechaFin());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 ) {
                $i = 0;
                $j = 0;
                $Total = 0;
                foreach( $resultado as $rst):
                    $j = $j + 1;

                 if ($i == 0){
                     $pdf->Ln(2);

                     $pdf->SetFont('Arial','B',8);
                     $pdf->Cell(10,6,utf8_decode('N°'),1,0,'C',0);
                     $pdf->Cell(20,6,utf8_decode('Fecha'),1,0,'C',0);
                     $pdf->Cell(15,6,utf8_decode('NHC'),1,0,'C',0);
                     $pdf->Cell(70,6,utf8_decode('Paciente'),1,0,'C',0);
                     $pdf->Cell(10,6,utf8_decode('Sexo'),1,0,'C',0);
                     $pdf->Cell(40,6,utf8_decode('Departamento'),1,0,'C',0);
                     $pdf->Cell(70,6,utf8_decode('Unidad'),1,0,'C',0);
                     $pdf->Cell(22,6,utf8_decode('Edades'),1,0,'C',0);
                     $pdf->Cell(20,6,utf8_decode('Costo ($)'),1,1,'C',0);

                     $i = 1;
                 }

                     $NHC = "";
                    switch (strlen($rst["nhc"])){
                        case 1:
                                $NHC = "0000".$rst["nhc"];
                                break;
                        case 2:
                                $NHC = "000".$rst["nhc"];
                                break;
                        case 3:
                                $NHC = "00".$rst["nhc"];
                                break;
                        case 4:
                                $NHC = "0".$rst["nhc"];
                                break;
                        default:
                                $NHC = $rst["nhc"];
                                break;
                    }

                     $pdf->SetFont('Arial','',7);
                     $pdf->Cell(10,5,$j,1,0,'C',0);
                     $pdf->Cell(20,5,$rst["fecha"],1,0,'C',0);
                     $pdf->Cell(15,5,$NHC,1,0,'C',0);
                     $pdf->Cell(70,5,utf8_decode(utf8_encode($rst["paciente"])),1,0,'L',0);
                     $pdf->Cell(10,5,utf8_decode(utf8_encode($rst["sexo"])),1,0,'C',0);
                     $pdf->Cell(40,5,utf8_decode(utf8_encode($rst["departamento"])),1,0,'L',0);
                     $pdf->Cell(70,5,utf8_decode(utf8_encode($rst["unidad"])),1,0,'L',0);
                     $pdf->Cell(22,5,utf8_decode(utf8_encode($rst["subarea"])),1,0,'L',0);
                     $pdf->Cell(20,5,utf8_decode(utf8_encode(number_format($rst["costo"],2,',','.'))),1,1,'R',0);

                     $Total = $Total + $rst["costo"];

                endforeach;

                 $pdf->SetFont('Arial','B',10);
                 $pdf->Cell(257,5,'TOTAL ($) ',1,0,'R',0);
                 $pdf->Cell(20,5,  number_format($Total,2,',','.'),1,1,'R',0);

                 //Fecha Impresion
                $pdf->Ln(1);
                $pdf->SetFont('Arial','B',6);
                $pdf->Cell(20,4,utf8_decode('Fecha Impresión:'),0,0,'L',0);
                $pdf->SetFont('Arial','',6);
                $pdf->Cell(20,4,"  ".utf8_decode($fechaimpresion),0,1,'L',0);


                $pdf->Ln(20);
                $pdf->SetFont('Arial','B',10);
                $pdf->SetX (90);
                $pdf->Cell(50,4,'________________________________',0,0,'C',0);
                $pdf->Cell(40,4,'',0,0,'C',0);
                $pdf->Cell(50,4,'________________________________',0,1,'C',0);
                $pdf->SetX (90);
                $pdf->Cell(50,4,utf8_decode(RESPONSABLE),0,0,'C',0);
                $pdf->Cell(40,4,'',0,0,'C',0);
                $pdf->Cell(50,4,utf8_decode(TESORERO),0,1,'C',0);
                $pdf->SetX (90);
                $pdf->Cell(50,4,'RESPONSABLE',0,0,'C',0);
                $pdf->Cell(40,4,'',0,0,'C',0);
                $pdf->Cell(50,4,'TESORERO',0,1,'C',0);

                for($x = 0; $x < (260 - $pdf->GetY()); $x++){
                          $pdf->Ln(10);
                    }

                     $pdf->setAutoPagebreak(true,50);

            }else{
                //Set x and y position for the main text, reduce font size and write content
                $pdf->SetXY (30,100);
                $pdf->SetFontSize(8);
                $pdf->Write(5,utf8_decode(' No existe Informacion registrada'));
            }

            //Pie Pagina
            $pdf->Footer();

            //Para poner la Pagina 1/(1...n)
            $pdf->AliasNbPages();

            //Output the document
            $fecha = date("YmdHis").'.pdf';
            $pdf->Output($fecha,'D');

        }

        //Atencion Paciente - PDF
       public function getStrRptAtencionPacienteMedico()
        {
            define('FPDF_FONTPATH',FONT_PATH);
            include_once ( CLASS_PATH . "class.clfpdf.php" );

            //Limpia el buffer si no sale un error
            ob_end_clean();

            $fechaimpresion = date("Y/m/d H:i:s a");


            //create a FPDF object
            $pdf = new FPDF('P' , 'mm' , 'A4');

            //set document properties
            $pdf->SetAuthor('CPCH - KOICA');
            $pdf->SetTitle('Recibo Servicio');

            //encabezado
            $pdf->setStrTipoEncabezado(5);
            $pdf->Header();
            //
            //Envia a otra pagina
            $pdf->setAutoPagebreak(true,'');

            //set font for the entire document
            $pdf->SetFont('Arial','B',35);
            $pdf->SetTextColor(50,60,100);

            //set up a page
            $pdf->AddPage('P');
            $pdf->SetDisplayMode(75,'default');

            //insert an image and make it a link
            //$pdf->Image('logo.png',10,20,33,0,' ','http://www.fpdf.org/');

            $query = new clQuery();

            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL sprptatencionpacientemedico('%d','%d','%s','%s');", $this->getStrTipoMedico(),$this->getStrEspecialidadMedico(), $this->getStrFechaInicio(), $this->getStrFechaFin());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 ) {
                $i = 0;
                $j = 0;
                foreach( $resultado as $rst):
                    $j = $j + 1;

                     if ($i == 0){
                         $pdf->Ln(2);

                          $pdf->SetFont('Arial','B',9);
                         $pdf->Cell(30,10,utf8_decode('SERVICIO: '),1,0,'C',0);

                         $pdf->SetFont('Arial','',8);
                         $pdf->Cell(55,10,utf8_decode(utf8_encode($rst["departamento"])),1,0,'C',0);

                         $pdf->Cell(20,10,'',0,0,'C',0);

                         $pdf->SetFont('Arial','B',9);
                         $pdf->Cell(30,10,utf8_decode('MEDICO: '),1,0,'C',0);

                         $pdf->SetFont('Arial','',8);
                         $pdf->Cell(55,10,utf8_decode(utf8_encode($rst["medico"])),1,1,'C',0);

                          $pdf->Ln(2);

                         $pdf->SetFont('Arial','B',8);
                         $pdf->Cell(10,6,utf8_decode('N°'),1,0,'C',0);
                         $pdf->Cell(15,6,utf8_decode('Fec. Vis.'),1,0,'C',0);
                         $pdf->Cell(10,6,utf8_decode('NHC'),1,0,'C',0);
                         $pdf->Cell(60,6,utf8_decode('Paciente'),1,0,'C',0);
                         $pdf->Cell(10,6,utf8_decode('Sexo'),1,0,'C',0);
                         $pdf->Cell(15,6,utf8_decode('Fec. Nac.'),1,0,'C',0);
                         $pdf->Cell(55,6,utf8_decode('Unidad'),1,0,'C',0);
                         $pdf->Cell(15,6,utf8_decode('Edades'),1,1,'C',0);

                         $i = 1;
                     }

                     $NHC = "";
                    switch (strlen($rst["nhc"])){
                        case 1:
                                $NHC = "0000".$rst["nhc"];
                                break;
                        case 2:
                                $NHC = "000".$rst["nhc"];
                                break;
                        case 3:
                                $NHC = "00".$rst["nhc"];
                                break;
                        case 4:
                                $NHC = "0".$rst["nhc"];
                                break;
                        default:
                                $NHC = $rst["nhc"];
                                break;
                    }

                     $pdf->SetFont('Arial','',7);
                     $pdf->Cell(10,5,$j,1,0,'C',0);
                     $pdf->Cell(15,5,$rst["fecha"],1,0,'C',0);
                     $pdf->Cell(10,5,$NHC,1,0,'C',0);
                     $pdf->Cell(60,5,utf8_decode(utf8_encode($rst["paciente"])),1,0,'L',0);
                     $pdf->Cell(10,5,utf8_decode(utf8_encode($rst["sexo"])),1,0,'C',0);
                     $pdf->Cell(15,5,utf8_decode(utf8_encode($rst["fechanacimiento"])),1,0,'L',0);
                     $pdf->Cell(55,5,utf8_decode(utf8_encode($rst["unidad"])),1,0,'L',0);
                     $pdf->Cell(15,5,utf8_decode(utf8_encode($rst["subarea"])),1,1,'L',0);
                endforeach;

                 //Fecha Impresion
                $pdf->Ln(1);
                $pdf->SetFont('Arial','B',6);
                $pdf->Cell(20,4,utf8_decode('Fecha Impresión:'),0,0,'L',0);
                $pdf->SetFont('Arial','',6);
                $pdf->Cell(20,4,"  ".utf8_decode($fechaimpresion),0,1,'L',0);


//                $pdf->Ln(20);
//                $pdf->SetFont('Arial','B',10);
//                $pdf->SetX (40);
//                $pdf->Cell(50,4,'________________________________',0,0,'C',0);
//                $pdf->Cell(40,4,'',0,0,'C',0);
//                $pdf->Cell(50,4,'________________________________',0,1,'C',0);
//                $pdf->SetX (40);
//                $pdf->Cell(50,4,utf8_decode(RESPONSABLE),0,0,'C',0);
//                $pdf->Cell(40,4,'',0,0,'C',0);
//                $pdf->Cell(50,4,utf8_decode(TESORERO),0,1,'C',0);
//                $pdf->SetX (40);
//                $pdf->Cell(50,4,'RESPONSABLE',0,0,'C',0);
//                $pdf->Cell(40,4,'',0,0,'C',0);
//                $pdf->Cell(50,4,'TESORERO',0,1,'C',0);

            }else{
                //Set x and y position for the main text, reduce font size and write content
                $pdf->SetXY (30,100);
                $pdf->SetFontSize(8);
                $pdf->Write(5,utf8_decode(' No existe Informacion registrada'));
            }

            //Pie Pagina
            $pdf->Footer();

            //Para poner la Pagina 1/(1...n)
            $pdf->AliasNbPages();

            //Output the document
            $fecha = date("YmdHis").'.pdf';
            $pdf->Output($fecha,'D');

        }

        //Atencion Paciente Servicio - PDF
       public function getStrRptAtencionPacienteServicio()
        {
            define('FPDF_FONTPATH',FONT_PATH);
            include_once ( CLASS_PATH . "class.clfpdf.php" );

            //Limpia el buffer si no sale un error
            ob_end_clean();

            $fechaimpresion = date("Y/m/d H:i:s a");


            //create a FPDF object
            $pdf = new FPDF('P' , 'mm' , 'A4');

            //set document properties
            $pdf->SetAuthor('CPCH - KOICA');
            $pdf->SetTitle('Recibo Servicio');

            //encabezado
            $pdf->setStrTipoEncabezado(6);
            $pdf->Header();
            //
            //Envia a otra pagina
            $pdf->setAutoPagebreak(true,'');

            //set font for the entire document
            $pdf->SetFont('Arial','B',35);
            $pdf->SetTextColor(50,60,100);

            //set up a page
            $pdf->AddPage('L');
            $pdf->SetDisplayMode(75,'default');

            //insert an image and make it a link
            //$pdf->Image('logo.png',10,20,33,0,' ','http://www.fpdf.org/');

            $query = new clQuery();

            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL sprptatencionpacienteservicio('%d','%s','%s');", $this->getStrTipoMedico(), $this->getStrFechaInicio(), $this->getStrFechaFin());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 ) {
                $i = 0;
                $j = 0;
                foreach( $resultado as $rst):
                    $j = $j + 1;

                     if ($i == 0){
                         $pdf->Ln(2);

                          $pdf->SetFont('Arial','B',9);
                         $pdf->Cell(30,10,utf8_decode('SERVICIO: '),1,0,'C',0);

                         $pdf->SetFont('Arial','',8);
                         $pdf->Cell(55,10,utf8_decode(utf8_encode($rst["departamento"])),1,1,'C',0);

                          $pdf->Ln(2);

                         $pdf->SetFont('Arial','B',8);
                         $pdf->Cell(10,6,utf8_decode('N°'),1,0,'C',0);
                         $pdf->Cell(20,6,utf8_decode('Fec. Vis.'),1,0,'C',0);
                         $pdf->Cell(20,6,utf8_decode('NHC'),1,0,'C',0);
                         $pdf->Cell(60,6,utf8_decode('Paciente'),1,0,'C',0);
                         $pdf->Cell(10,6,utf8_decode('Sexo'),1,0,'C',0);
                         $pdf->Cell(20,6,utf8_decode('Fec. Nac.'),1,0,'C',0);
                         $pdf->Cell(60,6,utf8_decode('Unidad'),1,0,'C',0);
                         $pdf->Cell(20,6,utf8_decode('Edades'),1,0,'C',0);
                         $pdf->Cell(57,6,utf8_decode('Médico'),1,1,'C',0);

                         $i = 1;
                     }

                     $NHC = "";
                    switch (strlen($rst["nhc"])){
                        case 1:
                                $NHC = "0000".$rst["nhc"];
                                break;
                        case 2:
                                $NHC = "000".$rst["nhc"];
                                break;
                        case 3:
                                $NHC = "00".$rst["nhc"];
                                break;
                        case 4:
                                $NHC = "0".$rst["nhc"];
                                break;
                        default:
                                $NHC = $rst["nhc"];
                                break;
                    }

                     $pdf->SetFont('Arial','',7);
                     $pdf->Cell(10,5,$j,1,0,'C',0);
                     $pdf->Cell(20,5,$rst["fecha"],1,0,'C',0);
                     $pdf->Cell(20,5,$NHC,1,0,'C',0);
                     $pdf->Cell(60,5,utf8_decode(utf8_encode($rst["paciente"])),1,0,'L',0);
                     $pdf->Cell(10,5,utf8_decode(utf8_encode($rst["sexo"])),1,0,'C',0);
                     $pdf->Cell(20,5,utf8_decode(utf8_encode($rst["fechanacimiento"])),1,0,'L',0);
                     $pdf->Cell(60,5,utf8_decode(utf8_encode($rst["unidad"])),1,0,'L',0);
                     $pdf->Cell(20,5,utf8_decode(utf8_encode($rst["subarea"])),1,0,'L',0);
                     $pdf->Cell(57,5,utf8_decode(utf8_encode($rst["medico"])),1,1,'L',0);
                endforeach;

                 //Fecha Impresion
                $pdf->Ln(1);
                $pdf->SetFont('Arial','B',6);
                $pdf->Cell(20,4,utf8_decode('Fecha Impresión:'),0,0,'L',0);
                $pdf->SetFont('Arial','',6);
                $pdf->Cell(20,4,"  ".utf8_decode($fechaimpresion),0,1,'L',0);


//                $pdf->Ln(20);
//                $pdf->SetFont('Arial','B',10);
//                $pdf->SetX (40);
//                $pdf->Cell(50,4,'________________________________',0,0,'C',0);
//                $pdf->Cell(40,4,'',0,0,'C',0);
//                $pdf->Cell(50,4,'________________________________',0,1,'C',0);
//                $pdf->SetX (40);
//                $pdf->Cell(50,4,utf8_decode(RESPONSABLE),0,0,'C',0);
//                $pdf->Cell(40,4,'',0,0,'C',0);
//                $pdf->Cell(50,4,utf8_decode(TESORERO),0,1,'C',0);
//                $pdf->SetX (40);
//                $pdf->Cell(50,4,'RESPONSABLE',0,0,'C',0);
//                $pdf->Cell(40,4,'',0,0,'C',0);
//                $pdf->Cell(50,4,'TESORERO',0,1,'C',0);

            }else{
                //Set x and y position for the main text, reduce font size and write content
                $pdf->SetXY (30,100);
                $pdf->SetFontSize(8);
                $pdf->Write(5,utf8_decode(' No existe Informacion registrada'));
            }

            //Pie Pagina
            $pdf->Footer();

            //Para poner la Pagina 1/(1...n)
            $pdf->AliasNbPages();

            //Output the document
            $fecha = date("YmdHis").'.pdf';
            $pdf->Output($fecha,'D');

        }

          //Atencion Paciente General - PDF
       public function getStrRptAtencionPacienteGeneral()
        {
            define('FPDF_FONTPATH',FONT_PATH);
            include_once ( CLASS_PATH . "class.clfpdf.php" );

            //Limpia el buffer si no sale un error
            ob_end_clean();

            $fechaimpresion = date("Y/m/d H:i:s a");


            //create a FPDF object
            $pdf = new FPDF('P' , 'mm' , 'A4');

            //set document properties
            $pdf->SetAuthor('CPCH - KOICA');
            $pdf->SetTitle('Recibo Servicio');

            //encabezado
            $pdf->setStrTipoEncabezado(7);
            $pdf->Header();
            //
            //Envia a otra pagina
            $pdf->setAutoPagebreak(true,'');

            //set font for the entire document
            $pdf->SetFont('Arial','B',35);
            $pdf->SetTextColor(50,60,100);

            //set up a page
            $pdf->AddPage('L');
            $pdf->SetDisplayMode(75,'default');

            //insert an image and make it a link
            //$pdf->Image('logo.png',10,20,33,0,' ','http://www.fpdf.org/');

            $query = new clQuery();

            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL sprptatencionpacientegeneral('%s','%s');", $this->getStrFechaInicio(), $this->getStrFechaFin());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 ) {
                $i = 0;
                $j = 0;
                foreach( $resultado as $rst):
                    $j = $j + 1;

                     if ($i == 0){
                         $pdf->Ln(2);

                         $pdf->SetFont('Arial','B',7);
                         $pdf->Cell(10,6,utf8_decode('N°'),1,0,'C',0);
                         $pdf->Cell(15,6,utf8_decode('Fec. Vis.'),1,0,'C',0);
                         $pdf->Cell(10,6,utf8_decode('NHC'),1,0,'C',0);
                         $pdf->Cell(60,6,utf8_decode('Paciente'),1,0,'C',0);
                         $pdf->Cell(10,6,utf8_decode('Sexo'),1,0,'C',0);
                         $pdf->Cell(15,6,utf8_decode('Fec. Nac.'),1,0,'C',0);
                         $pdf->Cell(30,6,utf8_decode('Departamento'),1,0,'C',0);
                         $pdf->Cell(60,6,utf8_decode('Unidad'),1,0,'C',0);
                         $pdf->Cell(15,6,utf8_decode('Edades'),1,0,'C',0);
                         $pdf->Cell(52,6,utf8_decode('Médico'),1,1,'C',0);

                         $i = 1;
                     }

                     $NHC = "";
                    switch (strlen($rst["nhc"])){
                        case 1:
                                $NHC = "0000".$rst["nhc"];
                                break;
                        case 2:
                                $NHC = "000".$rst["nhc"];
                                break;
                        case 3:
                                $NHC = "00".$rst["nhc"];
                                break;
                        case 4:
                                $NHC = "0".$rst["nhc"];
                                break;
                        default:
                                $NHC = $rst["nhc"];
                                break;
                    }

                     $pdf->SetFont('Arial','',6);
                     $pdf->Cell(10,5,$j,1,0,'C',0);
                     $pdf->Cell(15,5,$rst["fecha"],1,0,'C',0);
                     $pdf->Cell(10,5,$NHC,1,0,'C',0);
                     $pdf->Cell(60,5,utf8_decode(utf8_encode($rst["paciente"])),1,0,'L',0);
                     $pdf->Cell(10,5,utf8_decode(utf8_encode($rst["sexo"])),1,0,'C',0);
                     $pdf->Cell(15,5,utf8_decode(utf8_encode($rst["fechanacimiento"])),1,0,'L',0);
                     $pdf->Cell(30,5,utf8_decode(utf8_encode($rst["departamento"])),1,0,'L',0);
                     $pdf->Cell(60,5,utf8_decode(utf8_encode($rst["unidad"])),1,0,'L',0);
                     $pdf->Cell(15,5,utf8_decode(utf8_encode($rst["subarea"])),1,0,'L',0);
                     $pdf->Cell(52,5,utf8_decode(utf8_encode($rst["medico"])),1,1,'L',0);
                endforeach;

                 //Fecha Impresion
                $pdf->Ln(1);
                $pdf->SetFont('Arial','B',6);
                $pdf->Cell(20,4,utf8_decode('Fecha Impresión:'),0,0,'L',0);
                $pdf->SetFont('Arial','',6);
                $pdf->Cell(20,4,"  ".utf8_decode($fechaimpresion),0,1,'L',0);


//                $pdf->Ln(20);
//                $pdf->SetFont('Arial','B',10);
//                $pdf->SetX (40);
//                $pdf->Cell(50,4,'________________________________',0,0,'C',0);
//                $pdf->Cell(40,4,'',0,0,'C',0);
//                $pdf->Cell(50,4,'________________________________',0,1,'C',0);
//                $pdf->SetX (40);
//                $pdf->Cell(50,4,utf8_decode(RESPONSABLE),0,0,'C',0);
//                $pdf->Cell(40,4,'',0,0,'C',0);
//                $pdf->Cell(50,4,utf8_decode(TESORERO),0,1,'C',0);
//                $pdf->SetX (40);
//                $pdf->Cell(50,4,'RESPONSABLE',0,0,'C',0);
//                $pdf->Cell(40,4,'',0,0,'C',0);
//                $pdf->Cell(50,4,'TESORERO',0,1,'C',0);

            }else{
                //Set x and y position for the main text, reduce font size and write content
                $pdf->SetXY (30,100);
                $pdf->SetFontSize(8);
                $pdf->Write(5,utf8_decode(' No existe Informacion registrada'));
            }

            //Pie Pagina
            $pdf->Footer();

            //Para poner la Pagina 1/(1...n)
            $pdf->AliasNbPages();

            //Output the document
            $fecha = date("YmdHis").'.pdf';
            $pdf->Output($fecha,'D');

        }

         //Historia Clinica Paciente Medico- PDF
       public function getStrRptHistoriaClinicaPacienteMedico()
        {
            define('FPDF_FONTPATH',FONT_PATH);
            include_once ( CLASS_PATH . "class.clfpdf.php" );

            //Limpia el buffer si no sale un error
            ob_end_clean();

            $fechaimpresion = date("Y/m/d H:i:s a");


            //create a FPDF object
            $pdf = new FPDF('P' , 'mm' , 'A4');

            //set document properties
            $pdf->SetAuthor('CPCH - KOICA');
            $pdf->SetTitle('Recibo Servicio');

            //encabezado
            $pdf->setStrTipoEncabezado(8);
            $pdf->Header();
            //
            //Envia a otra pagina
            $pdf->setAutoPagebreak(true,'');

            //set font for the entire document
            $pdf->SetFont('Arial','B',35);
            $pdf->SetTextColor(50,60,100);

            //set up a page
            $pdf->AddPage('P');
            $pdf->SetDisplayMode(75,'default');

            //insert an image and make it a link
            //$pdf->Image('logo.png',10,20,33,0,' ','http://www.fpdf.org/');

            $query = new clQuery();

            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL sprpthistoriaclinicapacientemedico('%d','%d','%d');", $this->getStrTipoMedico(),$this->getStrEspecialidadMedico(), $this->getStrNumeroHistoriaClinicaPaciente());
            //$ProcedimientoAlmacenado = sprintf("CALL sprpthistoriaclinicapacientemedico('%d','%d','%d');", 5,5,7);
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 ) {
                foreach( $resultado as $rst):
                    $pdf->Ln(2);

                    $NHC = "";
                        switch (strlen($rst["nhc"])){
                            case 1:
                                    $NHC = "0000".$rst["nhc"];
                                    break;
                            case 2:
                                    $NHC = "000".$rst["nhc"];
                                    break;
                            case 3:
                                    $NHC = "00".$rst["nhc"];
                                    break;
                            case 4:
                                    $NHC = "0".$rst["nhc"];
                                    break;
                            default:
                                    $NHC = $rst["nhc"];
                                    break;
                        }

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(20,5,utf8_decode('MEDICO: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(100,5,utf8_decode(utf8_encode($rst["medico"])),1,0,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(30,5,utf8_decode('FECHA VISITA: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(40,5,utf8_decode(utf8_encode($rst["fechahistoriaclinica"])),1,1,'C',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(20,5,utf8_decode('SERVICIO: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(60,5,utf8_decode(utf8_encode($rst["departamento"])),1,0,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(20,5,utf8_decode('UNIDAD: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(50,5,utf8_decode(utf8_encode($rst["unidad"])),1,0,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(20,5,utf8_decode('EDADES: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(20,5,utf8_decode(utf8_encode($rst["subarea"])),1,1,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(20,5,utf8_decode('NHC: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(20,5,utf8_decode(utf8_encode($NHC)),1,0,'C',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(20,5,utf8_decode('CEDULA: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(20,5,utf8_decode(utf8_encode($rst["cedula"])),1,0,'C',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(20,5,utf8_decode('PACIENTE: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(90,5,utf8_decode(utf8_encode($rst["paciente"])),1,1,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(20,5,utf8_decode('SEXO: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(60,5,utf8_decode(utf8_encode($rst["sexo"])),1,0,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(30,5,utf8_decode('ESTADO CIVIL: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(30,5,utf8_decode(utf8_encode($rst["estadocivil"])),1,0,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(30,5,utf8_decode('TIPO SANGRE: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(20,5,utf8_decode(utf8_encode($rst["tiposangre"])),1,1,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(20,5,utf8_decode('PROVINCIA: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(40,5,utf8_decode(utf8_encode($rst["provincia"])),1,0,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(20,5,utf8_decode('CANTON: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(40,5,utf8_decode(utf8_encode($rst["canton"])),1,0,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(30,5,utf8_decode('PARROQUIA: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(40,5,utf8_decode(utf8_encode($rst["parroquia"])),1,1,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(20,5,utf8_decode('DIRECCION: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(60,5,utf8_decode(utf8_encode($rst["direccion"])),1,0,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(30,5,utf8_decode('TELEFONO: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(25,5,utf8_decode(utf8_encode($rst["telefono"])),1,0,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(30,5,utf8_decode('CELULAR: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(25,5,utf8_decode(utf8_encode($rst["celular"])),1,1,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(40,5,utf8_decode('FECHA NACIMIENTO: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(65,5,utf8_decode(utf8_encode($rst["fechanacimiento"])),1,0,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(30,5,utf8_decode('EM@IL: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(55,5,utf8_decode(utf8_encode($rst["email"])),1,1,'L',0);

                     $pdf->Ln(4);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(15,5,utf8_decode('TALLA: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(10,5,utf8_decode(utf8_encode($rst["talla"])),1,0,'C',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(15,5,utf8_decode('PESO: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(10,5,utf8_decode(utf8_encode($rst["peso"])),1,0,'C',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(15,5,utf8_decode('GRASA: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(10,5,utf8_decode(utf8_encode($rst["grasa"])),1,0,'C',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(40,5,utf8_decode('PRESION ARTERIAL: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(10,5,utf8_decode(utf8_encode($rst["presionarterial"])),1,0,'C',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(30,5,utf8_decode('TEMPERATURA: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(10,5,utf8_decode(utf8_encode($rst["temperatura"])),1,0,'C',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(15,5,utf8_decode('PULSO: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(10,5,utf8_decode(utf8_encode($rst["pulso"])),1,1,'C',0);

                     $pdf->Ln(4);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(0,5,utf8_decode('MOTIVO CONSULTA: '),0,1,'L',0);
                     $pdf->SetFont('Arial','',8);
                     $pdf->MultiCell(0, 5, $rst["motivoconsulta"], 1, "J", 0);

                     $pdf->Ln(2);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(0,5,utf8_decode('EXAMEN FISICO: '),0,1,'L',0);
                     $pdf->SetFont('Arial','',8);
                     $pdf->MultiCell(0, 5, $rst["examenfisico"], 1, "J", 0);

                     $pdf->Ln(2);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(0,5,utf8_decode('TRATAMIENTO: '),0,1,'L',0);
                     $pdf->SetFont('Arial','',8);
                     $pdf->MultiCell(0, 5, $rst["tratamiento"], 1, "J", 0);

                      $pdf->Ln(2);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(0,5,utf8_decode('OBSERVACIONES: '),0,1,'L',0);
                     $pdf->SetFont('Arial','',8);
                     $pdf->MultiCell(0, 5, $rst["observaciones"], 1, "J", 0);

                      //Fecha Impresion
                    $pdf->Ln(1);
                    $pdf->SetFont('Arial','B',6);
                    $pdf->Cell(20,4,utf8_decode('Fecha Impresión:'),0,0,'L',0);
                    $pdf->SetFont('Arial','',6);
                    $pdf->Cell(20,4,"  ".utf8_decode($fechaimpresion),0,1,'L',0);

//                     $pdf->Ln(260 - $pdf->GetY());


                    for($x = 0; $x < (260 - $pdf->GetY()); $x++){
                          $pdf->Ln(10);
                    }

                     $pdf->setAutoPagebreak(true,50);

                endforeach;


            }else{
                //Set x and y position for the main text, reduce font size and write content
                $pdf->SetXY (30,100);
                $pdf->SetFontSize(8);
                $pdf->Write(5,utf8_decode(' No existe Informacion registrada'));
            }

            //Pie Pagina
            $pdf->Footer();

            //Para poner la Pagina 1/(1...n)
            $pdf->AliasNbPages();

            //Output the document
            $fecha = date("YmdHis").'.pdf';
            $pdf->Output($fecha,'D');

        }

         //Historia Clinica Paciente Servicios - PDF
       public function getStrRptHistoriaClinicaPacienteServicio()
        {
            define('FPDF_FONTPATH',FONT_PATH);
            include_once ( CLASS_PATH . "class.clfpdf.php" );

            //Limpia el buffer si no sale un error
            ob_end_clean();

            $fechaimpresion = date("Y/m/d H:i:s a");


            //create a FPDF object
            $pdf = new FPDF('P' , 'mm' , 'A4');

            //set document properties
            $pdf->SetAuthor('CPCH - KOICA');
            $pdf->SetTitle('Recibo Servicio');

            //encabezado
            $pdf->setStrTipoEncabezado(9);
            $pdf->Header();
            //
            //Envia a otra pagina
            $pdf->setAutoPagebreak(true,'');

            //set font for the entire document
            $pdf->SetFont('Arial','B',35);
            $pdf->SetTextColor(50,60,100);

            //set up a page
            $pdf->AddPage('P');
            $pdf->SetDisplayMode(75,'default');

            //insert an image and make it a link
            //$pdf->Image('logo.png',10,20,33,0,' ','http://www.fpdf.org/');

            $query = new clQuery();

            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL sprpthistoriaclinicapacienteservicio('%d','%d');", $this->getStrTipoMedico(), $this->getStrNumeroHistoriaClinicaPaciente());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 ) {
                foreach( $resultado as $rst):
                    $pdf->Ln(2);

                    $NHC = "";
                        switch (strlen($rst["nhc"])){
                            case 1:
                                    $NHC = "0000".$rst["nhc"];
                                    break;
                            case 2:
                                    $NHC = "000".$rst["nhc"];
                                    break;
                            case 3:
                                    $NHC = "00".$rst["nhc"];
                                    break;
                            case 4:
                                    $NHC = "0".$rst["nhc"];
                                    break;
                            default:
                                    $NHC = $rst["nhc"];
                                    break;
                        }

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(20,5,utf8_decode('MEDICO: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(100,5,utf8_decode(utf8_encode($rst["medico"])),1,0,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(30,5,utf8_decode('FECHA VISITA: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(40,5,utf8_decode(utf8_encode($rst["fechahistoriaclinica"])),1,1,'C',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(20,5,utf8_decode('SERVICIO: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(60,5,utf8_decode(utf8_encode($rst["departamento"])),1,0,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(20,5,utf8_decode('UNIDAD: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(50,5,utf8_decode(utf8_encode($rst["unidad"])),1,0,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(20,5,utf8_decode('EDADES: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(20,5,utf8_decode(utf8_encode($rst["subarea"])),1,1,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(20,5,utf8_decode('NHC: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(20,5,utf8_decode(utf8_encode($NHC)),1,0,'C',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(20,5,utf8_decode('CEDULA: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(20,5,utf8_decode(utf8_encode($rst["cedula"])),1,0,'C',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(20,5,utf8_decode('PACIENTE: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(90,5,utf8_decode(utf8_encode($rst["paciente"])),1,1,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(20,5,utf8_decode('SEXO: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(60,5,utf8_decode(utf8_encode($rst["sexo"])),1,0,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(30,5,utf8_decode('ESTADO CIVIL: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(30,5,utf8_decode(utf8_encode($rst["estadocivil"])),1,0,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(30,5,utf8_decode('TIPO SANGRE: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(20,5,utf8_decode(utf8_encode($rst["tiposangre"])),1,1,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(20,5,utf8_decode('PROVINCIA: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(40,5,utf8_decode(utf8_encode($rst["provincia"])),1,0,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(20,5,utf8_decode('CANTON: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(40,5,utf8_decode(utf8_encode($rst["canton"])),1,0,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(30,5,utf8_decode('PARROQUIA: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(40,5,utf8_decode(utf8_encode($rst["parroquia"])),1,1,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(20,5,utf8_decode('DIRECCION: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(60,5,utf8_decode(utf8_encode($rst["direccion"])),1,0,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(30,5,utf8_decode('TELEFONO: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(25,5,utf8_decode(utf8_encode($rst["telefono"])),1,0,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(30,5,utf8_decode('CELULAR: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(25,5,utf8_decode(utf8_encode($rst["celular"])),1,1,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(40,5,utf8_decode('FECHA NACIMIENTO: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(65,5,utf8_decode(utf8_encode($rst["fechanacimiento"])),1,0,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(30,5,utf8_decode('EM@IL: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(55,5,utf8_decode(utf8_encode($rst["email"])),1,1,'L',0);

                     $pdf->Ln(4);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(15,5,utf8_decode('TALLA: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(10,5,utf8_decode(utf8_encode($rst["talla"])),1,0,'C',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(15,5,utf8_decode('PESO: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(10,5,utf8_decode(utf8_encode($rst["peso"])),1,0,'C',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(15,5,utf8_decode('GRASA: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(10,5,utf8_decode(utf8_encode($rst["grasa"])),1,0,'C',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(40,5,utf8_decode('PRESION ARTERIAL: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(10,5,utf8_decode(utf8_encode($rst["presionarterial"])),1,0,'C',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(30,5,utf8_decode('TEMPERATURA: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(10,5,utf8_decode(utf8_encode($rst["temperatura"])),1,0,'C',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(15,5,utf8_decode('PULSO: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(10,5,utf8_decode(utf8_encode($rst["pulso"])),1,1,'C',0);

                     $pdf->Ln(4);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(0,5,utf8_decode('MOTIVO CONSULTA: '),0,1,'L',0);
                     $pdf->SetFont('Arial','',8);
                     $pdf->MultiCell(0, 5, $rst["motivoconsulta"], 1, "J", 0);

                     $pdf->Ln(2);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(0,5,utf8_decode('EXAMEN FISICO: '),0,1,'L',0);
                     $pdf->SetFont('Arial','',8);
                     $pdf->MultiCell(0, 5, $rst["examenfisico"], 1, "J", 0);

                     $pdf->Ln(2);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(0,5,utf8_decode('TRATAMIENTO: '),0,1,'L',0);
                     $pdf->SetFont('Arial','',8);
                     $pdf->MultiCell(0, 5, $rst["tratamiento"], 1, "J", 0);

                      $pdf->Ln(2);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(0,5,utf8_decode('OBSERVACIONES: '),0,1,'L',0);
                     $pdf->SetFont('Arial','',8);
                     $pdf->MultiCell(0, 5, $rst["observaciones"], 1, "J", 0);

                      //Fecha Impresion
                    $pdf->Ln(1);
                    $pdf->SetFont('Arial','B',6);
                    $pdf->Cell(20,4,utf8_decode('Fecha Impresión:'),0,0,'L',0);
                    $pdf->SetFont('Arial','',6);
                    $pdf->Cell(20,4,"  ".utf8_decode($fechaimpresion),0,1,'L',0);

//                     $pdf->Ln(260 - $pdf->GetY());


                     for($x = 0; $x < (260 - $pdf->GetY()); $x++){
                          $pdf->Ln(10);
                    }

//                    $salto = 270 - $pdf->GetY();
//                    $pdf->Cell(0,$salto,"",1,1,'L',0);

                     $pdf->setAutoPagebreak(true,50);

                endforeach;


            }else{
                //Set x and y position for the main text, reduce font size and write content
                $pdf->SetXY (30,100);
                $pdf->SetFontSize(8);
                $pdf->Write(5,utf8_decode(' No existe Informacion registrada'));
            }

            //Pie Pagina
            $pdf->Footer();

            //Para poner la Pagina 1/(1...n)
            $pdf->AliasNbPages();

            //Output the document
            $fecha = date("YmdHis").'.pdf';
            $pdf->Output($fecha,'D');

        }

         //Historia Clinica Paciente General - PDF
       public function getStrRptHistoriaClinicaPacienteGeneral()
        {
            define('FPDF_FONTPATH',FONT_PATH);
            include_once ( CLASS_PATH . "class.clfpdf.php" );

            //Limpia el buffer si no sale un error
            ob_end_clean();

            $fechaimpresion = date("Y/m/d H:i:s a");


            //create a FPDF object
            $pdf = new FPDF('P' , 'mm' , 'A4');

            //set document properties
            $pdf->SetAuthor('CPCH - KOICA');
            $pdf->SetTitle('Recibo Servicio');

            //encabezado
            $pdf->setStrTipoEncabezado(10);
            $pdf->Header();
            //
            //Envia a otra pagina
            $pdf->setAutoPagebreak(true,'');

            //set font for the entire document
            $pdf->SetFont('Arial','B',35);
            $pdf->SetTextColor(50,60,100);

            //set up a page
            $pdf->AddPage('P');
            $pdf->SetDisplayMode(75,'default');

            //insert an image and make it a link
            //$pdf->Image('logo.png',10,20,33,0,' ','http://www.fpdf.org/');

            $query = new clQuery();

            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL sprpthistoriaclinicapacientegeneral('%d');", $this->getStrNumeroHistoriaClinicaPaciente());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 ) {
                foreach( $resultado as $rst):
                    $pdf->Ln(2);

                    $NHC = "";
                        switch (strlen($rst["nhc"])){
                            case 1:
                                    $NHC = "0000".$rst["nhc"];
                                    break;
                            case 2:
                                    $NHC = "000".$rst["nhc"];
                                    break;
                            case 3:
                                    $NHC = "00".$rst["nhc"];
                                    break;
                            case 4:
                                    $NHC = "0".$rst["nhc"];
                                    break;
                            default:
                                    $NHC = $rst["nhc"];
                                    break;
                        }

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(20,5,utf8_decode('MEDICO: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(100,5,utf8_decode(utf8_encode($rst["medico"])),1,0,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(30,5,utf8_decode('FECHA VISITA: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(40,5,utf8_decode(utf8_encode($rst["fechahistoriaclinica"])),1,1,'C',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(20,5,utf8_decode('SERVICIO: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(60,5,utf8_decode(utf8_encode($rst["departamento"])),1,0,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(20,5,utf8_decode('UNIDAD: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(50,5,utf8_decode(utf8_encode($rst["unidad"])),1,0,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(20,5,utf8_decode('EDADES: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(20,5,utf8_decode(utf8_encode($rst["subarea"])),1,1,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(20,5,utf8_decode('NHC: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(20,5,utf8_decode(utf8_encode($NHC)),1,0,'C',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(20,5,utf8_decode('CEDULA: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(20,5,utf8_decode(utf8_encode($rst["cedula"])),1,0,'C',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(20,5,utf8_decode('PACIENTE: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(90,5,utf8_decode(utf8_encode($rst["paciente"])),1,1,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(20,5,utf8_decode('SEXO: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(60,5,utf8_decode(utf8_encode($rst["sexo"])),1,0,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(30,5,utf8_decode('ESTADO CIVIL: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(30,5,utf8_decode(utf8_encode($rst["estadocivil"])),1,0,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(30,5,utf8_decode('TIPO SANGRE: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(20,5,utf8_decode(utf8_encode($rst["tiposangre"])),1,1,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(20,5,utf8_decode('PROVINCIA: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(40,5,utf8_decode(utf8_encode($rst["provincia"])),1,0,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(20,5,utf8_decode('CANTON: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(40,5,utf8_decode(utf8_encode($rst["canton"])),1,0,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(30,5,utf8_decode('PARROQUIA: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(40,5,utf8_decode(utf8_encode($rst["parroquia"])),1,1,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(20,5,utf8_decode('DIRECCION: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(60,5,utf8_decode(utf8_encode($rst["direccion"])),1,0,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(30,5,utf8_decode('TELEFONO: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(25,5,utf8_decode(utf8_encode($rst["telefono"])),1,0,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(30,5,utf8_decode('CELULAR: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(25,5,utf8_decode(utf8_encode($rst["celular"])),1,1,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(40,5,utf8_decode('FECHA NACIMIENTO: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(65,5,utf8_decode(utf8_encode($rst["fechanacimiento"])),1,0,'L',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(30,5,utf8_decode('EM@IL: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(55,5,utf8_decode(utf8_encode($rst["email"])),1,1,'L',0);

                     $pdf->Ln(4);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(15,5,utf8_decode('TALLA: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(10,5,utf8_decode(utf8_encode($rst["talla"])),1,0,'C',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(15,5,utf8_decode('PESO: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(10,5,utf8_decode(utf8_encode($rst["peso"])),1,0,'C',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(15,5,utf8_decode('GRASA: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(10,5,utf8_decode(utf8_encode($rst["grasa"])),1,0,'C',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(40,5,utf8_decode('PRESION ARTERIAL: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(10,5,utf8_decode(utf8_encode($rst["presionarterial"])),1,0,'C',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(30,5,utf8_decode('TEMPERATURA: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(10,5,utf8_decode(utf8_encode($rst["temperatura"])),1,0,'C',0);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(15,5,utf8_decode('PULSO: '),1,0,'L',0);

                     $pdf->SetFont('Arial','',8);
                     $pdf->Cell(10,5,utf8_decode(utf8_encode($rst["pulso"])),1,1,'C',0);

                     $pdf->Ln(4);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(0,5,utf8_decode('MOTIVO CONSULTA: '),0,1,'L',0);
                     $pdf->SetFont('Arial','',8);
                     $pdf->MultiCell(0, 5, $rst["motivoconsulta"], 1, "J", 0);

                     $pdf->Ln(2);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(0,5,utf8_decode('EXAMEN FISICO: '),0,1,'L',0);
                     $pdf->SetFont('Arial','',8);
                     $pdf->MultiCell(0, 5, $rst["examenfisico"], 1, "J", 0);

                     $pdf->Ln(2);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(0,5,utf8_decode('TRATAMIENTO: '),0,1,'L',0);
                     $pdf->SetFont('Arial','',8);
                     $pdf->MultiCell(0, 5, $rst["tratamiento"], 1, "J", 0);

                      $pdf->Ln(2);

                     $pdf->SetFont('Arial','B',9);
                     $pdf->Cell(0,5,utf8_decode('OBSERVACIONES: '),0,1,'L',0);
                     $pdf->SetFont('Arial','',8);
                     $pdf->MultiCell(0, 5, $rst["observaciones"], 1, "J", 0);

                      //Fecha Impresion
                    $pdf->Ln(1);
                    $pdf->SetFont('Arial','B',6);
                    $pdf->Cell(20,4,utf8_decode('Fecha Impresión:'),0,0,'L',0);
                    $pdf->SetFont('Arial','',6);
                    $pdf->Cell(20,4,"  ".utf8_decode($fechaimpresion),0,1,'L',0);

//                     $pdf->Ln(260 - $pdf->GetY());


                     for($x = 0; $x < (260 - $pdf->GetY()); $x++){
                          $pdf->Ln(10);
                    }

//                    $salto = 270 - $pdf->GetY();
//                    $pdf->Cell(0,$salto,"",1,1,'L',0);

                     $pdf->setAutoPagebreak(true,50);

                endforeach;


            }else{
                //Set x and y position for the main text, reduce font size and write content
                $pdf->SetXY (30,100);
                $pdf->SetFontSize(8);
                $pdf->Write(5,utf8_decode(' No existe Informacion registrada'));
            }

            //Pie Pagina
            $pdf->Footer();

            //Para poner la Pagina 1/(1...n)
            $pdf->AliasNbPages();

            //Output the document
            $fecha = date("YmdHis").'.pdf';
            $pdf->Output($fecha,'D');

        }

         public function getStrFormularioNumeroFacturaHistorialPagosPaciente($tiporeporte)
        {
            $paciente =  new clPaciente();

            $imagen = "<img src='". IMAGENES_PATH ."/cargando.gif' width='20px' height='20px' />";

             if (($tiporeporte == "2hpp") || ($tiporeporte == "shpp") || ($tiporeporte == "thpp"))
             {
                 $rptpaciente = '<tr class="formulariofila1">
                                    <td align="right"><b>Paciente:&nbsp;</b></td>
                                    <td align="left">
                                         '. $paciente->getStrListarPacientes($this->getStrNumeroHistoriaClinicaPaciente()) .'
                                    </td>
                                </tr>';
                 $rptnumerofactura = '';
             }else{
                 $rptpaciente = "";
                 $rptnumerofactura = '<tr class="formulariofila1">
                                <td  align="right"><b>N&uacute;mero&nbsp;Factura:</b></td>
                                <td align="left">
                                    <input name="strNumeroFactura" type="text" id="strNumeroFactura" value="'. $this->getStrNumeroFactura() .'" size="10" '. JS_ONLY_NUMS .'  maxlength="7"   class="textboxfecha" />

                                </td>
                            </tr>';
             }

             $retval .= '
                        <script>
                            $(document).ready(function(){
                                $.metadata.setType( \'attr\', \'validate\' );
                                $(\'#frmnumerofacturahistorialpagospaciente\').validate({
                                        rules:{
                                                lsPaciente: { required: true }
                                        },
                                        messages:{
                                                lsPaciente: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"}
                                        }
                                });

                            });
                        </script>
                       ';

            $retval .= '
                        <form id="frmnumerofacturahistorialpagospaciente" action="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tiporeporte .'_pdf" method="POST">
                       ';

            $tipousuario = strtolower($_SESSION["usuario"]["tipo"]);

            $Regresar = "regresar('". REPORTE_URL . "reporte.php?btnreporte-acceso=". $tipousuario ."')";

            $retval .= '<fieldset class="fieldsetPequeno">';
            $retval .= '<legend class="etiquetaborde">
                            Reporte <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> '. $this->getStrEtiqueta() .'
                        </legend>
                       ';

            $retval .= '
                        <table width="100%" border="0" align="center" cellpadding="1" cellspacing="1">
                            <tr>
                                <td colspan="2" align="center" class="tablatitulo">
                                        '. $this->getStrEtiqueta() .'
                                </td>
                            </tr>

                            '. $rptpaciente .'

                            '. $rptnumerofactura .'


                            <tr>
                                <td colspan="2" class="formulariofila1" align="center">
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

         //Factura
       public function getStrRptFactura()
        {
            define('FPDF_FONTPATH',FONT_PATH);
            include_once ( CLASS_PATH . "class.clfpdf.php" );

            //Limpia el buffer si no sale un error
            ob_end_clean();

            $fechaimpresion = date("Y/m/d H:i:s a");
            $responsable = "-";

            //create a FPDF object
            $pdf = new FPDF('P' , 'mm' , 'A5');

            //set document properties
            $pdf->SetAuthor('CPCH - KOICA');
            $pdf->SetTitle('Recibo Servicio');

            //encabezado
            $pdf->setStrTipoEncabezado(1);
            $pdf->Header();
            //
            //Envia a otra pagina
            $pdf->setAutoPagebreak(true,'');



            //set font for the entire document
            $pdf->SetFont('Arial','B',35);
            $pdf->SetTextColor(50,60,100);

            //set up a page
            $pdf->AddPage('P');
            $pdf->SetDisplayMode(75,'default');

            //insert an image and make it a link
            //$pdf->Image('logo.png',10,20,33,0,' ','http://www.fpdf.org/');

            $query = new clQuery();

            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL sprptnumerofactura('%d');", $this->getStrNumeroFactura());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 ) {
                $i = 0;
                $j = 0;
                $Total = 0;
                foreach( $resultado as $rst):
                    $j = $j + 1;

                     if ($i == 0){
                         $pdf->SetFont('Arial','B',12);
                         $pdf->SetX(10);

                         $numerofactura = "";
                            switch (strlen($rst["facnumero"])){
                                case 1:
                                        $numerofactura = "000000".$rst["facnumero"];
                                        break;
                                case 2:
                                        $numerofactura = "00000".$rst["facnumero"];
                                        break;
                                case 3:
                                        $numerofactura = "0000".$rst["facnumero"];
                                        break;
                                case 4:
                                        $numerofactura = "000".$rst["facnumero"];
                                        break;
                                case 5:
                                        $numerofactura = "00".$rst["facnumero"];
                                        break;
                                case 6:
                                        $numerofactura = "0".$rst["facnumero"];
                                        break;
                                default:
                                        $numerofactura = $rst["facnumero"];
                                        break;
                            }
                         $pdf->Cell(130,10,utf8_decode('FACTURA N° '. $numerofactura),1,2,'C');
//                         $pdf->Line(5, 47, 145, 47);

                         $pdf->Ln(2);

                         //$pdf->Ln(2);

                         $pdf->SetFont('Arial','B',9);
                         $pdf->Cell(20,4,utf8_decode('Fecha: '),0,0,'R',0);

                         $pdf->SetFont('Arial','',8);
                         $pdf->Cell(40,4,utf8_decode($this->getStrMes($rst["facfecha"])),0,1,'L',0);

                         $pdf->SetFont('Arial','B',9);
                         $pdf->Cell(20,4,utf8_decode('Paciente: '),0,0,'R',0);

                         $pdf->SetFont('Arial','',8);
                         $pdf->Cell(40,4,utf8_decode(utf8_encode($rst["pacnombres"].' '.$rst["pacapellidos"])),0,1,'L',0);

                         $pdf->SetFont('Arial','B',9);
                         $pdf->Cell(20,4,utf8_decode('Dirección: '),0,0,'R',0);

                         $pdf->SetFont('Arial','',8);
                         $pdf->Cell(40,4,utf8_decode(utf8_encode($rst["paccalleprincipal"].' '.$rst["pacnumerocasa"].' y '.$rst["paccallesecundaria"])),0,1,'L',0);

                         $pdf->SetFont('Arial','B',9);
                         $pdf->Cell(20,4,utf8_decode('RUC/C.I.: '),0,0,'R',0);

                         $pdf->SetFont('Arial','',8);
                         $pdf->Cell(23,4,$rst["paccedula"],0,1,'L',0);

//                         $pdf->Line(5, 65, 145, 65);

                         $pdf->Ln(2);

                         $pdf->SetFont('Arial','B',8);
                         $pdf->Cell(10,6,utf8_decode('Cant.'),1,0,'C',0);
                         $pdf->Cell(80,6,utf8_decode('Descripción'),1,0,'C',0);
                         $pdf->Cell(20,6,utf8_decode('P.Unitario ($)'),1,0,'C',0);
                         $pdf->Cell(20,6,utf8_decode('P. Total ($)'),1,1,'C',0);

                         $i = 1;
                     }

                     $pdf->SetFont('Arial','',7);
                     $pdf->Cell(10,5,utf8_decode(utf8_encode(number_format($rst["faccantidad"],0,',','.'))),1,0,'C',0);
                     $pdf->Cell(80,5,utf8_decode(utf8_encode($rst["depdescripcion"].' - '.$rst["unidescripcion"].' - '.$rst["subaredescripcion"])),1,0,'L',0);
                     $pdf->Cell(20,5,utf8_decode(utf8_encode(number_format($rst["facpreciounitario"],2,',','.'))),1,0,'C',0);
                     $pdf->Cell(20,5,utf8_decode(utf8_encode(number_format($rst["faccantidad"] * $rst["facpreciounitario"],2,',','.'))),1,1,'C',0);

                     $Total = $Total + ($rst["faccantidad"] * $rst["facpreciounitario"]);

                endforeach;

                for($x = $j; $x < 12; $x++){
                     $pdf->Cell(10,6,'',1,0,'C',0);
                     $pdf->Cell(80,6,'',1,0,'C',0);
                     $pdf->Cell(20,6,'',1,0,'C',0);
                     $pdf->Cell(20,6,'',1,1,'C',0);
                }

                 $pdf->SetFont('Arial','B',10);
                 $pdf->Cell(110,5,'TOTAL ($) ',1,0,'C',0);
                 $pdf->Cell(20,5,  number_format($Total,2,',','.'),1,1,'C',0);

                 //Fecha Impresion
                $pdf->Ln(1);
                $pdf->SetFont('Arial','B',6);
                $pdf->Cell(20,4,utf8_decode('Fecha Impresión:'),0,0,'L',0);
                $pdf->SetFont('Arial','',6);
                $pdf->Cell(20,4,"  ".utf8_decode($fechaimpresion),0,1,'L',0);


                $pdf->Ln(20);
                $pdf->SetFont('Arial','B',10);
                $pdf->SetX (50);
                $pdf->Cell(58,4,'________________________________',0,1,'C',0);
                $pdf->SetX (50);
                $pdf->Cell(58,4,'FIRMA AUTORIZADA',0,1,'C',0);

            }else{
                //Set x and y position for the main text, reduce font size and write content
                $pdf->SetXY (30,100);
                $pdf->SetFontSize(8);
                $pdf->Write(5,utf8_decode('Error Interno. Intente nuevamente. No existe Informacion registrada'));
            }

            //Pie Pagina
            $pdf->Footer();

            //Para poner la Pagina 1/(1...n)
            $pdf->AliasNbPages();

            //Output the document
            $fecha = date("YmdHis").'.pdf';
            $pdf->Output($fecha,'D');

        }

         public function getStrMes($fecha){
            $retval = "";
            $mes = substr($fecha, 5, 2);
            $dia = substr($fecha, 8, 2);
            $ano = substr($fecha, 0, 4);
            switch ($mes) {
                case "1":
                    $retval = "Enero";
                    break;

                case "2":
                    $retval = "Febrero";
                    break;

                case "3":
                    $retval = "Marzo";
                    break;

                case "4":
                    $retval = "Abril";
                    break;

                case "5":
                    $retval = "Mayo";
                    break;

                case "6":
                    $retval = "Junio";
                    break;

                case "7":
                    $retval = "Julio";
                    break;

                case "8":
                    $retval = "Agosto";
                    break;

                case "9":
                    $retval = "Septiembre";
                    break;

                case "10":
                    $retval = "Octubre";
                    break;

                case "11":
                    $retval = "Noviembre";
                    break;

                case "12":
                    $retval = "Diciembre";
                    break;

                default:
                    $retval = "Desconocido";
                    break;
            }

            $retval = "Riobamba, " . $dia. " de ". $retval ." del ". $ano;
          return $retval;
        }

         //Historial ¨Pagos Paciente - PDF
       public function getStrRptHistorialPagosPaciente()
        {
            define('FPDF_FONTPATH',FONT_PATH);
            include_once ( CLASS_PATH . "class.clfpdf.php" );

            //Limpia el buffer si no sale un error
            ob_end_clean();

            $fechaimpresion = date("Y/m/d H:i:s a");


            //create a FPDF object
            $pdf = new FPDF('P' , 'mm' , 'A4');

            //set document properties
            $pdf->SetAuthor('CPCH - KOICA');
            $pdf->SetTitle('Recibo Servicio');

            //encabezado
            $pdf->setStrTipoEncabezado(11);
            $pdf->Header();
            //
            //Envia a otra pagina
            $pdf->setAutoPagebreak(true,'');

            //set font for the entire document
            $pdf->SetFont('Arial','B',35);
            $pdf->SetTextColor(50,60,100);

            //set up a page
            $pdf->AddPage('P');
            $pdf->SetDisplayMode(75,'default');

            //insert an image and make it a link
            //$pdf->Image('logo.png',10,20,33,0,' ','http://www.fpdf.org/');

            $query = new clQuery();

            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL sprninos('%d');", $this->getStrNumeroHistoriaClinicaPaciente());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 ) {
                $i = 0;
                $j = 0;
                $Total = 0;
                foreach( $resultado as $rst):
                    $j = $j + 1;

                 if ($i == 0){
                     $pdf->Ln(2);

                     $pdf->SetFont('Arial','B',8);
                     $pdf->Cell(5,6,utf8_decode('N°'),1,0,'C',0);
                     $pdf->Cell(15,6,utf8_decode('Fecha'),1,0,'C',0);
                     $pdf->Cell(10,6,utf8_decode('NHC'),1,0,'C',0);
                     $pdf->Cell(65,6,utf8_decode('Paciente'),1,0,'C',0);
                     $pdf->Cell(10,6,utf8_decode('Sexo'),1,0,'C',0);
                     $pdf->Cell(20,6,utf8_decode('Factura'),1,0,'C',0);
                     $pdf->Cell(30,6,utf8_decode('Cantidad'),1,0,'C',0);
                     $pdf->Cell(15,6,utf8_decode('P.U.'),1,0,'C',0);
                     $pdf->Cell(20,6,utf8_decode('Costo ($)'),1,1,'C',0);

                     $i = 1;
                 }

                                     

                     $pdf->SetFont('Arial','',7);
                     $pdf->Cell(5,5,$j,1,0,'C',0);
                     $pdf->Cell(15,5,$rst["fecha"],1,0,'C',0);
                     $pdf->Cell(10,5,$NHC,1,0,'C',0);
                     $pdf->Cell(65,5,utf8_decode(utf8_encode($rst["primere_nombre"].' '.$rst["segundo_nombre"])),1,0,'L',0);
                     $pdf->Cell(10,5,utf8_decode(utf8_encode($rst["sexcodigo"])),1,0,'C',0);
                     $pdf->Cell(20,5,utf8_decode(utf8_encode($numerofactura)),1,0,'C',0);
                     $pdf->Cell(30,5,utf8_decode(utf8_encode($rst["fecha_nac"])),1,0,'C',0);
                     $pdf->Cell(15,5,utf8_decode(utf8_encode($rst["fecha_ingreso"])),1,0,'C',0);
                     $pdf->Cell(25,5,utf8_decode(utf8_encode($rst["faccantidad"])),1,1,'R',0);

                     $Total = $Total +$rst["faccantidad"] * $rst["facpreciounitario"];

                endforeach;

                 $pdf->SetFont('Arial','B',10);
                 $pdf->Cell(170,5,'TOTAL ($) ',1,0,'R',0);
                 $pdf->Cell(20,5,  number_format($Total,2,',','.'),1,1,'R',0);

                 //Fecha Impresion
                $pdf->Ln(1);
                $pdf->SetFont('Arial','B',6);
                $pdf->Cell(20,4,utf8_decode('Fecha Impresión:'),0,0,'L',0);
                $pdf->SetFont('Arial','',6);
                $pdf->Cell(20,4,"  ".utf8_decode($fechaimpresion),0,1,'L',0);


                $pdf->Ln(20);
                $pdf->SetFont('Arial','B',10);
                $pdf->SetX (40);
                $pdf->Cell(50,4,'________________________________',0,0,'C',0);
                $pdf->Cell(40,4,'',0,0,'C',0);
                $pdf->Cell(50,4,'________________________________',0,1,'C',0);
                $pdf->SetX (40);
                $pdf->Cell(50,4,utf8_decode(RESPONSABLE),0,0,'C',0);
                $pdf->Cell(40,4,'',0,0,'C',0);
                $pdf->Cell(50,4,utf8_decode(TESORERO),0,1,'C',0);
                $pdf->SetX (40);
                $pdf->Cell(50,4,'RESPONSABLE',0,0,'C',0);
                $pdf->Cell(40,4,'',0,0,'C',0);
                $pdf->Cell(50,4,'TESORERO',0,1,'C',0);

                for($x = 0; $x < (260 - $pdf->GetY()); $x++){
                          $pdf->Ln(10);
                    }

                     $pdf->setAutoPagebreak(true,50);

            }else{
                //Set x and y position for the main text, reduce font size and write content
                $pdf->SetXY (30,100);
                $pdf->SetFontSize(8);
                $pdf->Write(5,utf8_decode(' No existe Informacion registrada'));
            }

            //Pie Pagina
            $pdf->Footer();

            //Para poner la Pagina 1/(1...n)
            $pdf->AliasNbPages();

            //Output the document
            $fecha = date("YmdHis").'.pdf';
            $pdf->Output($fecha,'D');

        }

        public function getStrFormularioAuditoria($tiporeporte)
        {
            $usuarioauditoria = new clAdministracion();

            $imagen = "<img src='". IMAGENES_PATH ."/cargando.gif' width='20px' height='20px' />";

             $retval .= '
                        <script>
                            $(document).ready(function(){
                                $.metadata.setType( \'attr\', \'validate\' );
                                $(\'#frmauditoria\').validate({
                                        rules:{
                                                lsUsuario: { required: true }
                                        },
                                        messages:{
                                                lsUsuario: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"}
                                        }
                                });

                            });
                        </script>
                       ';

            $retval .= '
                        <form id="frmauditoria" action="'. REPORTE_URL .'reporte.php?btnreporte-acceso='. $tiporeporte .'_pdf" method="POST">
                       ';

            $tipousuario = strtolower($_SESSION["usuario"]["tipo"]);

            $Regresar = "regresar('". REPORTE_URL . "reporte.php?btnreporte-acceso=". $tipousuario ."')";

            $retval .= '<fieldset class="fieldsetPequeno">';
            $retval .= '<legend class="etiquetaborde">
                            Reporte <img src="'. IMAGENES_PATH .'/siguiente.png" style="border: 0px none;"> '. $this->getStrEtiqueta() .'
                        </legend>
                       ';

            $retval .= '
                        <table width="100%" border="0" align="center" cellpadding="1" cellspacing="1">
                            <tr>
                                <td colspan="2" align="center" class="tablatitulo">
                                        '. $this->getStrEtiqueta() .'
                                </td>
                            </tr>

                            <tr class="formulariofila1">
                                <td  align="right"><b>Usuario:&nbsp;</b></td>
                                <td align="left">
                                        '. $usuarioauditoria->getStrListarUsuarios($this->getStrUsuario()) .'
                                </td>
                            </tr>

                           <tr class="formulariofila1">
                                <td  align="right"><b>Fecha&nbsp;Inicio:</b></td>
                                <td align="left">
                                    <input name="dtFechaInicio" type="text" id="dtFechaInicio" value="'. $this->getStrFechaInicio() .'" size="10" readonly="readonly" class="textboxfecha" />
                                    <a href="#">
                                        <img src="'. IMAGENES_PATH .'/calendario.png" title="Calendario" name="strFechaInicio" id="strFechaInicio" width="16px" height="16px" style="border: 0px none;">
                                    </a>
                                    <script type="text/javascript">
                                        Calendar.setup({
                                                         inputField: "dtFechaInicio",
                                                         ifFormat: "%Y-%m-%d",
                                                         button: "strFechaInicio"
                                                         });
                                    </script>
                                </td>
                            </tr>

                            <tr class="formulariofila1">
                                <td  align="right"><b>Fecha&nbsp;Fin:</b></td>
                                <td align="left">
                                    <input name="dtFechaFin" type="text" id="dtFechaFin" value="'. $this->getStrFechaFin() .'" size="10" readonly="readonly" class="textboxfecha" />
                                    <a href="#">
                                        <img src="'. IMAGENES_PATH .'/calendario.png" title="Calendario" name="strFechaFin" id="strFechaFin" width="16px" height="16px" style="border: 0px none;">
                                    </a>
                                    <script type="text/javascript">
                                        Calendar.setup({
                                                         inputField: "dtFechaFin",
                                                         ifFormat: "%Y-%m-%d",
                                                         button: "strFechaFin"
                                                         });
                                    </script>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2" class="formulariofila1" align="center">
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

        //Auditoria - PDF
       public function getStrRptAuditoria()
        {
            define('FPDF_FONTPATH',FONT_PATH);
            include_once ( CLASS_PATH . "class.clfpdf.php" );

            //Limpia el buffer si no sale un error
            ob_end_clean();

            $fechaimpresion = date("Y/m/d H:i:s a");


            //create a FPDF object
            $pdf = new FPDF('P' , 'mm' , 'A4');

            //set document properties
            $pdf->SetAuthor('CPCH - KOICA');
            $pdf->SetTitle('Auditoria');

            //encabezado
            $pdf->setStrTipoEncabezado(13);
            $pdf->Header();
            //
            //Envia a otra pagina
            $pdf->setAutoPagebreak(true,'');
            
            //set font for the entire document
            $pdf->SetFont('Arial','B',35);
            $pdf->SetTextColor(50,60,100);

            //set up a page
            $pdf->AddPage('L');
            $pdf->SetDisplayMode(75,'default');

            //insert an image and make it a link
            //$pdf->Image('logo.png',10,20,33,0,' ','http://www.fpdf.org/');

            $query = new clQuery();

            //Nombre Procedimientos Almacenados
            $ProcedimientoAlmacenado = sprintf("CALL sprptauditoria('%s','%s','%s');", $this->getStrUsuario(), $this->getStrFechaInicio(), $this->getStrFechaFin());
            $query->setStrProcedimientoAlmacenado($ProcedimientoAlmacenado);
            $resultado = $query->getStrSqlSelect();

            if( count($resultado) > 0 ) {
                $i = 0;
                $j = 0;
                foreach( $resultado as $rst):
                    $j = $j + 1;

                     if ($i == 0){
                         $pdf->Ln(2);

                          $pdf->SetFont('Arial','B',9);
                         $pdf->Cell(30,10,utf8_decode('USUARIO: '),1,0,'C',0);

                         $pdf->SetFont('Arial','',8);
                         $pdf->Cell(55,10,utf8_decode(utf8_encode($rst["usunombresapellidos"])),1,1,'C',0);

                          $pdf->Ln(2);

                         $pdf->SetFont('Arial','B',8);
                         $pdf->Cell(5,6,utf8_decode('N°'),1,0,'C',0);
                         $pdf->Cell(25,6,utf8_decode('Fecha'),1,0,'C',0);
                         $pdf->Cell(25,6,utf8_decode('Acción'),1,0,'C',0);
                         $pdf->Cell(25,6,utf8_decode('Tabla'),1,0,'C',0);
                         $pdf->Cell(195,6,utf8_decode('Descripcion'),1,1,'C',0);

                         $i = 1;
                     }                  
                     $pdf->SetFont('Arial','',7);
                     $pdf->Cell(5,5,$j,1,0,'C',0);
                     $pdf->Cell(25,5,$rst["audfecha"],1,0,'C',0);
                     $pdf->Cell(25,5,utf8_decode(utf8_encode($rst["accdescripcion"])),1,0,'L',0);
                     $pdf->Cell(25,5,utf8_decode(utf8_encode($rst["audtabla"])),1,0,'L',0);
                     $pdf->Cell(195,5,  utf8_decode(utf8_encode(substr($rst["auddescripcion"],0,175))),1,1,'L',0);
                     //$pdf->MultiCell(195, 5,utf8_decode(utf8_encode($rst["auddescripcion"])), 0, 'J');
                     //$pdf->Cell(275,0,'',1,1,'C');

//                     for($x = 0; $x < (260 - $pdf->GetY()); $x++){
//                          $pdf->Ln(10);
//                    }

                     if ($pdf->GetY() >= 180 ){
                        $pdf->setAutoPagebreak(true,25);

                        $pdf->Ln(2);
                        $pdf->SetFont('Arial','B',9);
                         $pdf->Cell(30,10,utf8_decode('USUARIO: '),1,0,'C',0);

                         $pdf->SetFont('Arial','',8);
                         $pdf->Cell(55,10,utf8_decode(utf8_encode($rst["usunombresapellidos"])),1,1,'C',0);

                          $pdf->Ln(2);

                         $pdf->SetFont('Arial','B',8);
                         $pdf->Cell(5,6,utf8_decode('N°'),1,0,'C',0);
                         $pdf->Cell(25,6,utf8_decode('Fecha'),1,0,'C',0);
                         $pdf->Cell(25,6,utf8_decode('Acción'),1,0,'C',0);
                         $pdf->Cell(25,6,utf8_decode('Tabla'),1,0,'C',0);
                         $pdf->Cell(195,6,utf8_decode('Descripcion'),1,1,'C',0);
                     }
                endforeach;

                 //Fecha Impresion
                $pdf->Ln(1);
                $pdf->SetFont('Arial','B',6);
                $pdf->Cell(20,4,utf8_decode('Fecha Impresión:'),0,0,'L',0);
                $pdf->SetFont('Arial','',6);
                $pdf->Cell(20,4,"  ".utf8_decode($fechaimpresion),0,1,'L',0);
            }else{
                //Set x and y position for the main text, reduce font size and write content
                $pdf->SetXY (30,100);
                $pdf->SetFontSize(8);
                $pdf->Write(5,utf8_decode(' No existe Informacion registrada'));
            }

            //Pie Pagina
            $pdf->Footer();

            //Para poner la Pagina 1/(1...n)
            $pdf->AliasNbPages();

            //Output the document
            $fecha = date("YmdHis").'.pdf';
            $pdf->Output($fecha,'D');

        }
    }
?>