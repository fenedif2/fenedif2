<?php
session_start();
require_once( $_SERVER['DOCUMENT_ROOT'] . '/'. $_SESSION["nombresistema"] .'/config/config.configurar.php' );


if(!(isset($_SESSION["usuario"])))
    header( "Location:". INICIO_URL );

include_once( CLASS_PATH . "class.clinterfaz.php" );
include_once( CLASS_PATH . "class.clbusqueda.php" );

$interfaz = new clInterfaz();
$busqueda = new clBusqueda();

$strResultado = "";

//$tipo = strtolower($_SESSION["usuario"]["tipo"]);

$busqueda->setStrEtiqueta("Informaci&oacute;n&nbsp;B&uacute;squedas");
$busqueda->setStrNombreBoton("btnBuscar");
$busqueda->setStrValorBoton("Buscar");

$tipobusqueda = "";

switch (strtolower($_SESSION["usuario"]["tipo"])){
    case "1":
        $tipobusqueda = '<select name="lsTipoBusqueda" id="lsTipoBusqueda" class="combobox">
                            <option value="">Seleccione Opci&oacute;n</option>
                            <option value="1">Persona con Discapacidad</option>
                            <option value="2">Sustitutos</option>
                            <option value="3">Niños y Adolecentes</option>
                            <option value="4">Informe Psicológico</option>
                            <option value="5">Proceso Psicoterapeútico</option>
                            <option value="6">Plan de Atención Terapeútica</option>
                            <option value="7">Atención Psicoterapútica</option>
                            <option value="8">Visitas Familiares</option>
                            <option value="9">Empresa</option>
                            <option value="10">Centro Formativo</option>
                            <option value="11">Empleo</option>
                            <option value="12">Emprendimiento</option>
                            <option value="13">Ampliación Negocio</option>
                         </select>
                        ';
    break;
    default:
        $tipobusqueda = '<select name="lsTipoBusqueda" id="lsTipoBusqueda" class="combobox">
                            <option value="">Seleccione Opci&oacute;n</option>
                            <option value="1">Persona con Discapacidad</option>
                            <option value="2">Sustitutos</option>
                            <option value="3">Niños y Adolecentes</option>
                            <option value="4">Informe Psicológico</option>
                            <option value="5">Proceso Psicoterapeútico</option>
                            <option value="6">Plan de Atención Terapeútica</option>
                            <option value="7">Atención Psicoterapútica</option>
                            <option value="8">Visitas Familiares</option>
                            <option value="9">Empresa</option>
                            <option value="10">Centro Formativo</option>
                            <option value="11">Empleo</option>
                            <option value="12">Emprendimiento</option>
                            <option value="13">Ampliación Negocio</option>                                   
                         </select>
                        ';
    break;
}

$buscarpor = '<select name="lsBuscar" id="lsBuscar" class="combobox">
                <option value="">Seleccione Opci&oacute;n</option>
               </select>
            ';


$busqueda->setStrTipoBuscar($buscarpor);
$busqueda->setStrTipoBusqueda($tipobusqueda);

$tipo = $_REQUEST["btnbusqueda-acceso"];

switch( $tipo ){
    //Tipo de Usuario (Administrador - Formulario)
    case  "a": case "s": case "e": case "m": case "t": case "r":
            $strResultado .= $busqueda->getStrFormulario();
    break;

    //Visualizar Busqueda
    case  "Buscar":
            $busqueda->setStrTipoBusqueda($_REQUEST["lsTipoBusqueda"]);
            $busqueda->setStrTipoBuscar($_REQUEST["lsBuscar"]);
            $busqueda->setStrBuscar($_REQUEST["strBuscar"]);
            $strResultado .= $busqueda->getStrBusquedaInformacion();
    break;

    case "tipobusqueda":
         $etiqueta = "";
         $valortipobusqueda = $_REQUEST["strtipobusqueda"];         
         $valorbuscarpor = "";
         
         switch ( $valortipobusqueda ){
             //Paciente
            case "1":
                $valorbuscarpor = '<select name="lsBuscar" id="lsBuscar" class="combobox">
                                        <option value="">Seleccione Opci&oacute;n</option>
                                        <option value="1">Cédula/Pasaporte/Carnet Refugiados</option>
                                        <option value="2">Apellido Paterno y Materno</option>
                                        <option value="3">ID </option>
                                   </select>
                                ';
            break;

            //Medico
            case "2":
                 $valorbuscarpor = '<select name="lsBuscar" id="lsBuscar" class="combobox">
                                        <option value="">Seleccione Opci&oacute;n</option>
                                        <option value="1">Cédula/Pasaporte/Carnet Refugiados</option>
                                        <option value="2">Apellido Paterno y Materno</option>
                                        <option value="3">ID </option>
                                   </select>
                                ';
            break;

            //Usuario
            case "3":
                $valorbuscarpor = '<select name="lsBuscar" id="lsBuscar" class="combobox">
                                        <option value="">Seleccione Opci&oacute;n</option>
                                        <option value="1">Cédula/Pasaporte/Carnet Refugiados</option>
                                        <option value="2">Apellido Paterno y Materno</option>
                                        <option value="3">ID </option>
                                   </select>
                                ';
            break;
            case "4":
                $valorbuscarpor = '<select name="lsBuscar" id="lsBuscar" class="combobox">
                                        <option value="">Seleccione Opci&oacute;n</option>
                                        <option value="1">ID </option>
                                   </select>
                                ';
			break;					
			case "5":
                $valorbuscarpor = '<select name="lsBuscar" id="lsBuscar" class="combobox">
                                        <option value="">Seleccione Opci&oacute;n</option>
                                        <option value="1">ID </option>
                                   </select>
                                ';					
            break;
			case "6":
                $valorbuscarpor = '<select name="lsBuscar" id="lsBuscar" class="combobox">
                                        <option value="">Seleccione Opci&oacute;n</option>
                                        <option value="1">ID </option>
                                   </select>
                                ';					
            break;
        	case "7":
                $valorbuscarpor = '<select name="lsBuscar" id="lsBuscar" class="combobox">
                                        <option value="">Seleccione Opci&oacute;n</option>
                                        <option value="1">ID </option>
                                   </select>
                                ';					
            break;
			case "8":
                $valorbuscarpor = '<select name="lsBuscar" id="lsBuscar" class="combobox">
                                        <option value="">Seleccione Opci&oacute;n</option>
                                        <option value="1">ID </option>
                                   </select>
                                ';					
            break;
			case "9":
                $valorbuscarpor = '<select name="lsBuscar" id="lsBuscar" class="combobox">
                                        <option value="">Seleccione Opci&oacute;n</option>
                                        <option value="1">ID </option>
                                        <option value="2">Nombre </option>
                                        <option value="3">RUC</option>
                                   </select>
                                ';					
            break;
			case "10":
                $valorbuscarpor = '<select name="lsBuscar" id="lsBuscar" class="combobox">
                                        <option value="">Seleccione Opci&oacute;n</option>
                                        <option value="1">Responsable</option>
                                        <option value="2">Nombre </option>
                                   </select>
                                ';					
            break;
			case "11":
                $valorbuscarpor = '<select name="lsBuscar" id="lsBuscar" class="combobox">
                                        <option value="">Seleccione Opci&oacute;n</option>
                                        <option value="1">Nombre </option>
                                   </select>
                                ';					
            break;
			case "12":
                $valorbuscarpor = '<select name="lsBuscar" id="lsBuscar" class="combobox">
                                        <option value="">Seleccione Opci&oacute;n</option>
                                        <option value="1">Apellido</option>
                                   </select>
                                ';					
            break;
			case "13":
                $valorbuscarpor = '<select name="lsBuscar" id="lsBuscar" class="combobox">
                                        <option value="">Seleccione Opci&oacute;n</option>
                                        <option value="1">Apellido</option>
                                   </select>
                                ';					
            break;
            default:
                $valorbuscarpor = '<select name="lsBuscar" id="lsBuscar" class="combobox">
                                        <option value="">Seleccione Opci&oacute;n</option>
                                   </select>
                                ';
            break;
         }
         $retval .= '
                    <script>
                        $(document).ready(function(){
                            $.metadata.setType( \'attr\', \'validate\' );
                            $(\'#frmgeneral\').validate({
                                    rules:{
                                            strBuscar: { required: true},
                                            lsBuscar: { required: true},
                                            lsTipoBusqueda: { required: true}
                                    },
                                    messages:{
                                            strBuscar: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
                                            lsBuscar: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"},
                                            lsTipoBusqueda: { required: "<span class=\'resultadoincorrecto\'><br>* Requerido</span>"}
                                    }
                            });

                            $("#lsTipoBusqueda").change(function () {
                                $("#lsTipoBusqueda option:selected").each(function () {
                                        var tipobuscar = $(this).val();
                                        $.post( "'. BUSQUEDA_URL .'busqueda.php?btnbusqueda-acceso=tipobusqueda", {
                                                                                                                    strtipobusqueda: tipobuscar
                                                                                                                  },
                                        function(data){
                                                $("#lblBuscarPor").html(data);
                                                $("#lblEtiqueta").html("Informaci&oacute;n:");
                                                $("#strBuscar").val("");
                                    });
                                });
                             });

                            $("#lsBuscar").change(function () {
                                $("#lsBuscar option:selected").each(function () {
                                        var etiquetabuscar = $(this).val();
                                        var tipobuscar = $(\'#lsTipoBusqueda\').val();
                                        $.post( "'. BUSQUEDA_URL .'busqueda.php?btnbusqueda-acceso=buscarpor", {
                                                                                                                    strtipobusqueda: tipobuscar,
                                                                                                                    strbuscarpor: etiquetabuscar
                                                                                                               },
                                        function(data){
                                                $("#lblEtiqueta").html(data);
                                                $("#strBuscar").val("");
                                    });
                                });
                             });

                        });
                    </script>';
         $strResultado = print($retval.$valorbuscarpor);
    exit;
    
    case "buscarpor":
         $etiqueta = "";
         $tbusqueda = $_REQUEST["strtipobusqueda"];
         $buscarpor = $_REQUEST["strbuscarpor"];
         switch($tbusqueda.'-'.$buscarpor){
             //Persona con Discapacidad - Buscar por
             case "1-1":
                     $etiqueta = "Cédula:";
             break;
             case "1-2":
                     $etiqueta = "Apellidos:";
             break;
             case "1-3":
                     $etiqueta = "ID:";
             break;
            //Sustitutos- Buscar por
              case "2-1":
                     $etiqueta = "Cédula:";
             break;
             case "2-2":
                     $etiqueta = "Apellidos:";
             break;
             case "2-3":
                     $etiqueta = "ID:";
             break;
            //Usuario - Buscar por
             case "3-1":
                     $etiqueta = "Cédula:";
             break;
             case "3-2":
                     $etiqueta = "Apellidos:";
             break;
             case "3-3":
                     $etiqueta = "ID:";
             break;
			 
			//Informe Psicológico
			 case "4-1":
                     $etiqueta = "ID:";
             break;
			 //Proceso Psicoterapeutico
			 case "5-1":
                     $etiqueta = "ID:";
             break;
			  //Proceso Psicoterapeutico
			 case "6-1":
                     $etiqueta = "ID:";
             break;
			  //Atención Psicoterapeutica
			 case "7-1":
                     $etiqueta = "ID:";
             break;
			  //Visitas Familiares
			 case "8-1":
                     $etiqueta = "ID:";
             break;
			   //Empresa
			 case "9-1":
                     $etiqueta = "ID:";
             break;  
			 case "9-2":
                     $etiqueta = "Nombre:";
             break;
			 case "9-3":
                     $etiqueta = "Ruc:";
             break;
			   //Centro Formativo
			 case "10-1":
                     $etiqueta = "Responsable:";
             break;  
			 case "10-2":
                     $etiqueta = "Nombre:";
             break; 
               //Empresa
			 case "11-1":
                     $etiqueta = "Nombre:";
             break;  
			    //Emprendimiento
			 case "12-1":
                     $etiqueta = "Apellido:";
             break; 
			    //Ampliacion Negocio
			 case "13-1":
                     $etiqueta = "Apellido:";
             break;   
             
         }
         $strResultado = print($etiqueta);
    exit;

    default:
            $strResultado .= '<br><br><br><br><img src="'. IMAGENES_PATH .'/error.gif" title="Error" width="16px" height="16px" /> <span class="resultadoincorrecto">Operaci&oacute;n cancelada <br> No tiene acceso a b&uacute;squedas <br> y/o Error interno. Intente nuevamente</span>';
    break;

}

$interfaz->setStrCentro($strResultado);
echo $interfaz->getStrInterfaz();
?>