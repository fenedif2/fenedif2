<?php        
   define( "NAME", $_SESSION["nombresistema"] );     
	define( "HOST_NAME", $_SERVER['HTTP_HOST'] );
	define( "DOC_ROOT", $_SERVER['DOCUMENT_ROOT'] ."/sil/" );
	define( "HOST", "http://" . HOST_NAME ."/" );
   //dire imagenes
   define( "IMAGENES_PATH", HOST .NAME."/imagenes/" );
   define( "IMAGENES_URL", DOC_ROOT . "imagenes/" );

	define( "TITULO", "FENEDIF" );

	//define("CHARSET", "UTF-8" );
     define("CHARSET", "UTF-8" );

	//Donde se encuentra las Clases
	define( "CLASS_PATH", DOC_ROOT ."class/" );
	define( "CLASS_URL", HOST .NAME."/class/" );

        //Redireccionar a la Descargar de Archivos
	define( "ARCHIVOS_PATH", DOC_ROOT . "archivos/" );
	define( "ARCHIVOS_URL", HOST . NAME."/archivos/" );

        //Variable para el numero de registros por pagina
	define("REGISTROS","400");

	//Variable para desabilitar claves primarias en el momento de actualizar datos
	define("DESABILITAR",'readonly="readonly"');
        define("BLOQUEAR",'disabled="disabled"');

	//Redireccionar a la Pagina index.php
	define( "INICIO_URL", HOST. NAME.'/index.php' );   

        //Fuentes de Letra
	define( "FONT_PATH", DOC_ROOT . "font/" );
	define( "FONT_URL", HOST . NAME."/font/" );
        
	//Redireccionar a la Pagina Login
	define( "LOGIN_PATH", DOC_ROOT ."login/" );
	define( "LOGIN_URL", HOST .NAME."/login/" );

        //Redireccionar a la Pagina cformativo
	define( "CFORMATIVO_PATH", DOC_ROOT ."cformativo/" );
	define( "CFORMATIVO_URL", HOST .NAME."/cformativo/" );
	    //Redireccionar a la Pagina tsucursal
	define( "TSUCURSAL_PATH", DOC_ROOT ."tsucursal/" );
	define( "TSUCURSAL_URL", HOST .NAME."/tsucursal/" );
	        //Redireccionar a la Pagina cninos
	define( "NINOS_PATH", DOC_ROOT ."ninos/" );
	define( "NINOS_URL", HOST .NAME."/ninos/" );
		        //Redireccionar a la Pagina sustitutos
	define( "SUSTITUTOS_PATH", DOC_ROOT ."sustitutos/" );
	define( "SUSTITUTOS_URL", HOST .NAME."/sustitutos/" );
	        //Redireccionar a la Pagina pdiscapacidad
	define( "PDISCAPACIDAD_PATH", DOC_ROOT ."pdiscapacidad/" );
	define( "PDISCAPACIDAD_URL", HOST .NAME."/pdiscapacidad/" );
///////////////Redireccionar a la Pagina personad
	define( "PERSONAD_PATH", DOC_ROOT ."personad/" );
	define( "PERSONAD_URL", HOST .NAME."/personad/" );	
	///////////////Redireccionar a la Pagina personads
	define( "PERSONADS_PATH", DOC_ROOT ."personads/" );
	define( "PERSONADS_URL", HOST .NAME."/personads/" );	
 //Redireccionar a la Pagina TERAPIA
	define( "TERAPIA_PATH", DOC_ROOT ."terapia/" );
	define( "TERAPIA_URL", HOST .NAME."/terapia/" );	
 //Visitas familiares
	define( "VFAMILIARES_PATH", DOC_ROOT ."vfamiliares/" );
	define( "VFAMILIARES_URL", HOST .NAME."/vfamiliares/" );	
//Redireccionar a la Pagina EMPRESAS
	define( "EMPRESAS_PATH", DOC_ROOT ."empresas/" );
	define( "EMPRESAS_URL", HOST .NAME."/empresas/" );		
//Redireccionar a la Pagina TDIREMPRESA
	define( "TDIREMPRESA_PATH", DOC_ROOT ."tdirempresa/" );
	define( "TDIREMPRESA_URL", HOST .NAME."/tdirempresa/" );			
	  //Redireccionar a la Pagina Emprendimiento
		define( "TEMPRENDIMIENTO_PATH", DOC_ROOT ."temprendimiento/" );
		define( "TEMPRENDIMIENTO_URL", HOST .NAME."/temprendimiento/" );
  //Redireccionar a la Pagina Emprendimiento
		define( "SILADMIN_PATH", DOC_ROOT ."siladmin/" );
		define( "SILADMIN_URL", HOST .NAME."/siladmin/" );		
        //Redireccionar a la Pagina Agenda
	define( "TAGENDA_PATH", DOC_ROOT ."tagenda/" );
	define( "TAGENDA_URL", HOST .NAME."/tagenda/" );	
        //Redireccionar a la Pagina Agenda
	define( "PSICOLOGO_PATH", DOC_ROOT ."psicologo/" );
	define( "PSICOLOGO_URL", HOST .NAME."/psicologo/" );
 //psicoterapeutico
	define( "TERAPEUTICO_PATH", DOC_ROOT ."terapeutico/" );
	define( "TERAPEUTICO_URL", HOST .NAME."/terapeutico/" );	
	 //psicoterapeutico
	define( "PTERAPEUTICO_PATH", DOC_ROOT ."pterapeutico/" );
	define( "PTERAPEUTICO_URL", HOST .NAME."/pterapeutico/" );
//aterapeutica
	define( "ATERAPEUTICA_PATH", DOC_ROOT ."aterapeutica/" );
	define( "ATERAPEUTICA_URL", HOST .NAME."/aterapeutica/" );				
//////////////////////////Ampliacion Negocio /////////////////////////////////////////////////////
	define( "TAMPLIACION_PATH", DOC_ROOT ."tampliacion/" );
	define( "TAMPLIACION_URL", HOST .NAME."/tampliacion/" );	
 ///////////////////////Redireccionar a la Pagina Empresa/////////////////////////////////////////
	define( "TEMPRESA_PATH", DOC_ROOT ."tempresa/" );
	define( "TEMPRESA_URL", HOST .NAME."/tempresa/" );	
///////////////////// redireccionar a la pagina forma de acceso al centro formativo ///////////////////////////////
	define( "FACCESOCF_PATH", DOC_ROOT ."faccesocf/" );
	define( "FACCESOCF_URL", HOST .NAME."/faccesocf/" );
///////////////////// redireccionar Discapacidad ///////////////////////////////
	define( "DISCAPACIDAD_PATH", DOC_ROOT ."discapacidad/" );
	define( "DISCAPACIDAD_URL", HOST .NAME."/discapacidad/" );
///////////////////// redireccionar Discapacidads ///////////////////////////////
	define( "DISCAPACIDADS_PATH", DOC_ROOT ."discapacidads/" );
	define( "DISCAPACIDADS_URL", HOST .NAME."/discapacidads/" );	
///////////////////// ayudast ///////////////////////////////
	define( "AYUDAST_PATH", DOC_ROOT ."ayudast/" );
	define( "AYUDAST_URL", HOST .NAME."/ayudast/" );	
///////////////////// ayudasts ///////////////////////////////
	define( "AYUDASTS_PATH", DOC_ROOT ."ayudasts/" );
	define( "AYUDASTS_URL", HOST .NAME."/ayudasts/" );	
///////////////////// TCONTACTOEMP ///////////////////////////////
	define( "TCONTACTOEMP_PATH", DOC_ROOT ."tcontactoemp/" );
	define( "TCONTACTOEMP_URL", HOST .NAME."/tcontactoemp/" );	
///////////////////// APUESTO ///////////////////////////////
	define( "APUESTO_PATH", DOC_ROOT ."apuesto/" );
	define( "APUESTO_URL", HOST .NAME."/apuesto/" );	
///////////////////// redireccionar a la pagina Puestos ///////////////////////////////
	define( "TPUESTO_PATH", DOC_ROOT ."tpuesto/" );
	define( "TPUESTO_URL", HOST .NAME."/tpuesto/" );		
/////////////////////////////////// accesibilidad //////////////////////////////////////////////////////
	define( "ACCESIBILIDADCF_PATH", DOC_ROOT ."accesibilidadcf/" );
	define( "ACCESIBILIDADCF_URL", HOST .NAME."/accesibilidadcf/" );
	////////////////////////////////// interes laboral S //////////////////////////////////////////////////////
	define( "INTERESLABORALS_PATH", DOC_ROOT ."intereslaborals/" );
	define( "INTERESLABORALS_URL", HOST .NAME."/intereslaborals/" );
	////////////////////////////////// interes laboral //////////////////////////////////////////////////////
	define( "INTERESLABORAL_PATH", DOC_ROOT ."intereslaboral/" );
	define( "INTERESLABORAL_URL", HOST .NAME."/intereslaboral/" );
/////////////////////////////////// Disponibilidad Laboral //////////////////////////////////////////////////////
	define( "DISPONIBILIDADL_PATH", DOC_ROOT ."disponibilidadl/" );
	define( "DISPONIBILIDADL_URL", HOST .NAME."/disponibilidadl/" );
/////////////////////////////////// Disponibilidad s //////////////////////////////////////////////////////
	define( "DISPONIBILIDADLS_PATH", DOC_ROOT ."disponibilidadls/" );
	define( "DISPONIBILIDADLS_URL", HOST .NAME."/disponibilidadls/" );	
/////////////////////////////////// Perfil //////////////////////////////////////////////////////
	define( "PERFILCF_PATH", DOC_ROOT ."perfilcf/" );
	define( "PERFILCF_URL", HOST .NAME."/perfilcf/" );	
/////////////////////////////////// Formación //////////////////////////////////////////////////////
	define( "FORMACION_PATH", DOC_ROOT ."formacion/" );
	define( "FORMACION_URL", HOST .NAME."/formacion/" );
/////////////////////////////////// Formacióna //////////////////////////////////////////////////////
	define( "FORMACIONA_PATH", DOC_ROOT ."formaciona/" );
	define( "FORMACIONA_URL", HOST .NAME."/formaciona/" );	
/////////////////////////////////// Formacións //////////////////////////////////////////////////////
	define( "FORMACIONS_PATH", DOC_ROOT ."formacions/" );
	define( "FORMACIONS_URL", HOST .NAME."/formacions/" );		
	/////////////////////////////////// FormaciónII //////////////////////////////////////////////////////
	define( "FORMACIONII_PATH", DOC_ROOT ."formacionii/" );
	define( "FORMACIONII_URL", HOST .NAME."/formacionii/" );			
/////////////////////////////////// Area Formativa //////////////////////////////////////////////////////
	define( "AFORMATIVACF_PATH", DOC_ROOT ."aformativacf/" );
	define( "AFORMATIVACF_URL", HOST .NAME."/aformativacf/" );	
///////////////////////////////////Datos Laborales //////////////////////////////////////////////////////
	define( "DATOSL_PATH", DOC_ROOT ."datosl/" );
	define( "DATOSL_URL", HOST .NAME."/datosl/" );
///////////////////////////////////Datos S //////////////////////////////////////////////////////
	define( "DATOSLS_PATH", DOC_ROOT ."datosls/" );
	define( "DATOSLS_URL", HOST .NAME."/datosls/" );					
/////////////////////////////////// Tipo Formación //////////////////////////////////////////////////////
	define( "TFORMACIONCF_PATH", DOC_ROOT ."tformacioncf/" );
	define( "TFORMACIONCF_URL", HOST .NAME."/tformacioncf/" );		
/////////////////////////////////// Orientación //////////////////////////////////////////////////////
	define( "ORIENTACION_PATH", DOC_ROOT ."orientacion/" );
	define( "ORIENTACION_URL", HOST .NAME."/orientacion/" );			
//////////////////////////////// cursos /////////////////////////////////////////////////////////////////
	define( "TCURSOCF_PATH", DOC_ROOT ."tcursocf/" );
	define( "TCURSOCF_URL", HOST .NAME."/tcursocf/" );
////////////////////////////////Competencias/////////////////////////////////////////////////////////////////
	define( "COMPETENCIAS_PATH", DOC_ROOT ."competencias/" );
	define( "COMPETENCIAS_URL", HOST .NAME."/competencias/" );	
////////////////////////////////dfunciones/////////////////////////////////////////////////////////////////
	define( "DFUNCIONES_PATH", DOC_ROOT ."dfunciones/" );
	define( "DFUNCIONES_URL", HOST .NAME."/dfunciones/" );	
//////////////////////////////// Horario curso /////////////////////////////////////////////////////////////////
	define( "THORARIOCU_PATH", DOC_ROOT ."thorariocu/" );
	define( "THORARIOCU_URL", HOST .NAME."/thorariocu/" );	
//////////////////////////////// Horario Empresa /////////////////////////////////////////////////////////////////
	define( "THORARIOEMP_PATH", DOC_ROOT ."thorarioemp/" );
	define( "THORARIOEMP_URL", HOST .NAME."/thorarioemp/" );		
//////////////////////////////// Requisitos Alumnos/////////////////////////////////////////////////////////////////
	define( "TREQUISITOSCU_PATH", DOC_ROOT ."trequisitoscu/" );
	define( "TREQUISITOSCU_URL", HOST .NAME."/trequisitoscu/" );	
//////////////////////////////// Formacion Requerida/////////////////////////////////////////////////////////////////
	define( "TFORMACIONRCU_PATH", DOC_ROOT ."tformacionrcu/" );
	define( "TFORMACIONRCU_URL", HOST .NAME."/tformacionrcu/" );	
//////////////////////////////// Formacion Requerida Empresa/////////////////////////////////////////////////////////////////
	define( "TFORMACIONREMP_PATH", DOC_ROOT ."tformacionremp/" );
	define( "TFORMACIONREMP_URL", HOST .NAME."/tformacionremp/" );	
//////////////////////////////// FRequisitos Empresa/////////////////////////////////////////////////////////////////
	define( "TREQUISITOSEMP_PATH", DOC_ROOT ."trequisitosemp/" );
	define( "TREQUISITOSEMP_URL", HOST .NAME."/trequisitosemp/" );			
////////////////////////////////////Seguimiento////////////////////////////////////////////////////////////////////		
	define( "TSEGUIMIENTOCF_PATH", DOC_ROOT ."tseguimientocf/" );
	define( "TSEGUIMIENTOCF_URL", HOST .NAME."/tseguimientocf/" );	
////////////////////////////////////Empleo y Formación////////////////////////////////////////////////////////////////////		
	define( "EMPLEOF_PATH", DOC_ROOT ."empleof/" );
	define( "EMPLEOF_URL", HOST .NAME."/empleof/" );		
////////////////////////////////////Curriculum////////////////////////////////////////////////////////////////////		
	define( "CURRICULUM_PATH", DOC_ROOT ."curriculum/" );
	define( "CURRICULUM_URL", HOST .NAME."/curriculum/" );		
////////////////////////////////////Test////////////////////////////////////////////////////////////////////		
	define( "TEST_PATH", DOC_ROOT ."test/" );
	define( "TEST_URL", HOST .NAME."/test/" );			
////////////////////////////////////Seguimiento Empreso ////////////////////////////////////////////////////////////////////		
	define( "TSEGUIMIENTOEMP_PATH", DOC_ROOT ."tseguimientoemp/" );
	define( "TSEGUIMIENTOEMP_URL", HOST .NAME."/tseguimientoemp/" );		
//////////////////////////////////////Asignaciones Cursos////////////////////////////////////////////////////////////////
	define( "TASIGNACIONCU_PATH", DOC_ROOT ."tasignacioncu/" );
	define( "TASIGNACIONCU_URL", HOST .NAME."/tasignacioncu/" );
//////////////////////////////////////Asignaciones Puestos////////////////////////////////////////////////////////////////
	define( "TASIGNACIONPU_PATH", DOC_ROOT ."tasignacionpu/" );
	define( "TASIGNACIONPU_URL", HOST .NAME."/tasignacionpu/" );	
//////////////////////////////////////Seguimiento Puestos////////////////////////////////////////////////////////////////
	define( "TSEGUIMIENTOPU_PATH", DOC_ROOT ."tseguimientopu/" );
	define( "TSEGUIMIENTOPU_URL", HOST .NAME."/tseguimientopu/" );		
//////////////////////////////////////Contratacion////////////////////////////////////////////////////////////////
	define( "TCONTRATACIONPU_PATH", DOC_ROOT ."tcontratacionpu/" );
	define( "TCONTRATACIONPU_URL", HOST .NAME."/tcontratacionpu/" );	

        //Redireccionar a la Pagina Especialidad cformativo
	define( "ESPECIALIDADcformativo_PATH", DOC_ROOT ."especialidadcformativo/" );
	define( "ESPECIALIDADcformativo_URL", HOST .NAME."/especialidadcformativo/" );

        //Redireccionar a la Pagina Paciente
	define( "PACIENTE_PATH", DOC_ROOT ."paciente/" );
	define( "PACIENTE_URL", HOST .NAME."/paciente/" );

        //Redireccionar a la Pagina Departamento
	define( "DEPARTAMENTO_PATH", DOC_ROOT ."departamento/" );
	define( "DEPARTAMENTO_URL", HOST .NAME."/departamento/" );

        //Redireccionar a la Pagina Unidad
	define( "UNIDAD_PATH", DOC_ROOT ."unidad/" );
	define( "UNIDAD_URL", HOST .NAME."/unidad/" );

        //Redireccionar a la Pagina Area
	define( "AREA_PATH", DOC_ROOT ."area/" );
	define( "AREA_URL", HOST .NAME."/area/" );

        //Redireccionar a la Pagina Sub-Area
	define( "SUBAREA_PATH", DOC_ROOT ."subarea/" );
	define( "SUBAREA_URL", HOST .NAME."/subarea/" );

        //Redireccionar a la Pagina Reportes
	define( "REPORTE_PATH", DOC_ROOT ."reporte/" );
	define( "REPORTE_URL", HOST .NAME."/reporte/" );

        //Redireccionar a la Pagina Usuario
	define( "ADMINISTRACION_PATH", DOC_ROOT ."administracion/" );
	define( "ADMINISTRACION_URL", HOST .NAME."/administracion/" );

        //Redireccionar a la Pagina Contrase�a
	define( "CONTRASENA_PATH", DOC_ROOT ."contrasena/" );
	define( "CONTRASENA_URL", HOST .NAME."/contrasena/" );

        //Redireccionar a la Pagina Jornada Entrada
	define( "JORNADAENTRADA_PATH", DOC_ROOT ."jornadaentrada/" );
	define( "JORNADAENTRADA_URL", HOST .NAME."/jornadaentrada/" );

        //Redireccionar a la Pagina Jornada Salida
	define( "JORNADASALIDA_PATH", DOC_ROOT ."jornadasalida/" );
	define( "JORNADASALIDA_URL", HOST .NAME."/jornadasalida/" );

        //Redireccionar a la Pagina Horario
	define( "HORARIO_PATH", DOC_ROOT ."horario/" );
	define( "HORARIO_URL", HOST .NAME."/horario/" );

        //Redireccionar a la Pagina Jornada
	define( "JORNADA_PATH", DOC_ROOT ."jornada/" );
	define( "JORNADA_URL", HOST .NAME."/jornada/" );
        //Redireccionar a la Pagina Busquedas
	define( "BUSQUEDA_PATH", DOC_ROOT ."busqueda/" );
	define( "BUSQUEDA_URL", HOST .NAME."/busqueda/" );
        //Redireccionar a la Pagina Historia Clinica
	define( "HISTORIACLINICA_PATH", DOC_ROOT ."historiaclinica/" );
	define( "HISTORIACLINICA_URL", HOST .NAME."/historiaclinica/" );

        //Redireccionar a la Pagina Factura
	define( "FACTURA_PATH", DOC_ROOT ."factura/" );
	define( "FACTURA_URL", HOST .NAME."/factura/" );




        //Responsable
        define("RESPONSABLE", "Ing. Mayra Rodríguez" );
        //Tesorero
        define("TESORERO", "Econ. David Vallejo" );

        //Archivos Linux (/) - Windows (\\)
        define("LINUXWINDOWS","/");

?>