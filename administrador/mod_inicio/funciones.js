var globalCallbacks = {
                onCreate: function(){
                        $('cargando').show();
                },
                onComplete: function() {
                        if(Ajax.activeRequestCount == 0){
                                $('cargando').hide();
                        }
                }
        };
/* Se registran los callbacks en Ajax.Responders */
Ajax.Responders.register( globalCallbacks );

function replaceChars(entry,out,add) {
	
	temp = "" + entry;

	//bucle mientras se encuentre la cadena de busqueda
	while (temp.indexOf(out)>-1)
	{
		//pos es igual a la posicion donde se encuentra la coincidencia
		pos=temp.indexOf(out);
		//coge la cadena desde el principio hasta la primera coincidencia, añade
		// el caracter de reemplazo, y coge el resto de cadena, realizando de esta
		// mantera el reemplazo
		temp = "" + (temp.substring(0, pos) + add + temp.substring((pos + out.length), temp.length));
	}
	return temp;
}
///////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////
//Funciones Administrador//////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////
function procesaRespuesta(resp){
	$("center").innerHTML = resp.responseText;
}
function docMasivo(){
	var url = "docentes.php";
	var pars = "p1=rm";
	var ajax = new Ajax.Request( url, {
                                parameters: pars,
                                method:"post",
                                onComplete: procesaRespuesta
                                });
}
function tivestMasivo(){
	var url = "tinvestigador.php";
	var pars = "p1=rm";
	var ajax = new Ajax.Request( url, {
                                parameters: pars,
                                method:"post",
                                onComplete: procesaRespuesta
                                });
}
function agrMasivo(){
	var url = "agrupamientos.php";
	var pars = "p1=rm";
	var ajax = new Ajax.Request( url, {
                                parameters: pars,
                                method:"post",
                                onComplete: procesaRespuesta
                                });
}
function gruMasivo(){
	var url = "grupos.php";
	var pars = "p1=rm";
	var ajax = new Ajax.Request( url, {
                                parameters: pars,
                                method:"post",
                                onComplete: procesaRespuesta
                                });
}
//////// grafico datos segun el proyecto //////////////////////////////////////
function grafico_est(url,argumento1)
				{
	window.open('../grafico/'+url+'?p1='+argumento1+'');
}	


///////////////////////////////////////////////////////////////////////////////////	
function aluMasivo(){
	var url = "alum.php";
	var pars = "p1=rm";
	var ajax = new Ajax.Request( url, {
                                parameters: pars,
                                method:"post",
                                onComplete: procesaRespuesta
                                });
}
function docLista(){
	var url = "docentes.php";
	var pars = "p1=li";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function listaips(){
	var url = "ips.php";
	var pars = "p1=consulta";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function docLista1(){
	var url = "docentes1.php";
	var pars = "p1=li";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function tinvestLista(){
	var url = "tinvestigador.php";
	var pars = "p1=li";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function chorasLista(){
	var url = "choras.php";
	var pars = "p1=li";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function cindirectosLista(){
	var url = "cindirectos.php";
	var pars = "p1=li";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function convocatoriasLista(){
	var url = "convocatorias.php";
	var pars = "p1=li";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function extencionLista(){
	var url = "extencion.php";
	var pars = "p1=li";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function linvestLista(){
	var url = "linvest.php";
	var pars = "p1=li";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function uoiLista(){
	var url = "uoi.php";
	var pars = "p1=li";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function investLista(){
	var url = "investigacion.php";
	var pars = "p1=li";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function unescoLista(){
	var url = "unesco.php";
	var pars = "p1=li";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function agrLista(){
	var url = "agrupamientos.php";
	var pars = "p1=li";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function gruLista(){
	var url = "grupos.php";
	var pars = "p1=li";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function aluLista(){
	var url = "alum.php";
	var pars = "p1=li";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function evaLista(){
	var url = "eva.php";
	var ajax = new Ajax.Request( url, {
				onComplete: procesaRespuesta
				});
}
function evaLista1(){
	var url = "eva1.php";
	var ajax = new Ajax.Request( url, {
				onComplete: procesaRespuesta
				});
}
function docSolicitaEdita(docente){
	var url = "docentes.php";
	var pars = "p1=edita&p2="+docente+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function vhoraSolicitaEdita(id){
	var url = "matri.php";
	//var pars = "p1=consulta&p7="+agrupamiento+"&p8="+numero+"&p9="+agrupamiento_antiguo+"&p4="+agrupamiento_antiguo+"";
	
	var pars = "p1=edita&p33="+id+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function vhoraSolicitaEdita1(id){
	var url = "recursos.php";
	//var pars = "p1=consulta&p7="+agrupamiento+"&p8="+numero+"&p9="+agrupamiento_antiguo+"&p4="+agrupamiento_antiguo+"";
	
	var pars = "p1=edita&p33="+id+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function tinvestSolicitaEdita(clave){
	var url = "tinvestigador.php";
	var pars = "p1=edita&p2="+clave+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function convSolicitaEdita(clave){
	var url = "convocatorias.php";
	var pars = "p1=edita&p2="+clave+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function extSolicitaEdita(clave){
	var url = "extencion.php";
	var pars = "p1=edita&p2="+clave+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function linvestSolicitaEdita(clave){
	var url = "linvest.php";
	var pars = "p1=edita&p2="+clave+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function uoiSolicitaEdita(clave){
	var url = "uoi.php";
	var pars = "p1=edita&p2="+clave+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function facSolicitaEdita(id){
	var url = "recursos.php";
	var pars = "p1=editafac&p33="+id+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function matSolicitaEdita(id){
	var url = "recursos.php";
	var pars = "p1=editamat&p33="+id+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function cindirectosEdita(clave){
	var url = "cindirectos.php";
	var pars = "p1=edita&p2="+clave+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function investSolicitaEdita(clave){
	var url = "investigacion.php";
	var pars = "p1=edita&p2="+clave+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function cindirectosSolicitaEdita(codigo){
	var url = "cindirectos.php";
	var pars = "p1=edita&p2="+codigo+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function unescoSolicitaEdita(clave){
	var url = "unesco.php";
	var pars = "p1=edita&p2="+clave+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function agrSolicitaEdita(agrupamiento){
	var url = "agrupamientos.php";
	var pars = "p1=edita&p2="+agrupamiento+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function gruSolicitaEdita(grupo){
	var url = "grupos.php";
	var pars = "p1=edita&p2="+grupo+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function docElimina(docente){
	if( ! confirm("¿Desea eliminar este docente?") ) {
                return false;
            }
	var url = "docentes.php";
	var pars = "p1=elimina&p2="+docente+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function tinvestElimina(clave){
	if( ! confirm("¿Desea eliminar otro tipo de investigador?") ) {
                return false;
            }
	var url = "tinvestigador.php";
	var pars = "p1=elimina&p2="+clave+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function convElimina(clave){
	if( ! confirm("¿Desea eliminar otro tipo de convocatoria?") ) {
                return false;
            }
	var url = "convocatorias.php";
	var pars = "p1=elimina&p2="+clave+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function extElimina(clave){
	if( ! confirm("¿Desea eliminar otro tipo de Extencion?") ) {
                return false;
            }
	var url = "extencion.php";
	var pars = "p1=elimina&p2="+clave+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function linvestElimina(clave){
	if( ! confirm("¿Desea eliminar otro tipo de Línea de Investigación..?") ) {
                return false;
            }
	var url = "linvest.php";
	var pars = "p1=elimina&p2="+clave+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function uoiElimina(clave){
	if( ! confirm("¿Desea eliminar otro tipo de Unidad Operativa de Investigación?") ) {
                return false;
            }
	var url = "uoi.php";
	var pars = "p1=elimina&p2="+clave+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function convElimina(clave){
	if( ! confirm("¿Desea eliminar otro tipo de convocatoria?") ) {
                return false;
            }
	var url = "convocatorias.php";
	var pars = "p1=elimina&p2="+clave+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function facElimina(id){
	if( ! confirm("¿Desea eliminar otro tipo de Factura?") ) {
                return false;
            }
	var url = "recursos.php";
	var pars = "p1=eliminafac&p33="+id+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function matElimina(id){
	if( ! confirm("¿Desea eliminar otro tipo de matriz de seguimiento?") ) {
                return false;
            }
	var url = "recursos.php";
	var pars = "p1=eliminamat&p33="+id+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function cindirectosElimina(codigo){
	if( ! confirm("¿Desea eliminar otro tipo de costo indirecto?") ) {
                return false;
            }
	var url = "cindirectos.php";
	var pars = "p1=elimina&p2="+codigo+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
//elimina 
function vhoraElimina(id){
	if( ! confirm("¿Desea eliminar otro tipo de investigacion?") ) {
                return false;
            }
	var url = "matri.php";
	var pars = "p1=elimina&p2="+id+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function unescoElimina(clave){
	if( ! confirm("¿Desea eliminar otro tipo de investigacion?") ) {
                return false;
            }
	var url = "unesco.php";
	var pars = "p1=elimina&p2="+clave+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function agrElimina(agrupamiento){
	if( ! confirm("¿Desea eliminar este Proyecto?") ) {
                return false;
            }
	var url = "agrupamientos.php";
	var pars = "p1=elimina&p2="+agrupamiento+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function gruElimina(grupo){
	if( ! confirm("¿Desea eliminar este grupo de referencia?") ) {
                return false;
            }
	var url = "grupos.php";
	var pars = "p1=elimina&p2="+grupo+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function docEdita(docente){
	var clave = $F('pwd_1');
	var claverep = $F('pwd_2');
	if(clave!=claverep)
	{
	alert('Las claves no coinciden. No se actualizará nada.');
	}
	else
	{
	var url = "docentes.php";
	var params = Form.serialize($('edita'));
	var pars = "p1=guarda&p2="+docente+"";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
				parameters: parametros,
				method:"post",
				onComplete: procesaRespuesta
				});
	}
}
// edita hora
function vhoraEdita(id){
	var url = "matri.php";
	var params = Form.serialize($('edita'));
	var pars = "p1=guarda&p33="+id+"";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
				parameters: parametros,
				method:"post",
				onComplete: procesaRespuesta
				});
	
	}
function vhoraEdita1(id){
	var url = "recursos.php";
	var params = Form.serialize($('edita'));
	var pars = "p1=guarda&p33="+id+"";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
				parameters: parametros,
				method:"post",
				onComplete: procesaRespuesta
				});
	
	}


function tivestEdita(clave)
{
	var url = "tinvestigador.php";
	var params = Form.serialize($('edita'));
	var pars = "p1=guarda&p2="+clave+"";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
				parameters: parametros,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function convEdita(clave)
{
	var url = "convocatorias.php";
	var params = Form.serialize($('edita'));
	var pars = "p1=guarda&p2="+clave+"";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
				parameters: parametros,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function extEdita(clave)
{
	var url = "extencion.php";
	var params = Form.serialize($('edita'));
	var pars = "p1=guarda&p2="+clave+"";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
				parameters: parametros,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function linvestEdita(clave)
{
	var url = "linvest.php";
	var params = Form.serialize($('edita'));
	var pars = "p1=guarda&p2="+clave+"";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
				parameters: parametros,
				method:"post",
				onComplete: procesaRespuesta
				});
}

function uoiEdita(clave)
{
	var url = "uoi.php";
	var params = Form.serialize($('edita'));
	var pars = "p1=guarda&p2="+clave+"";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
				parameters: parametros,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function facEdita(id)
{
	var url = "recursos.php";
	var params = Form.serialize($('edita'));
	var pars = "p1=guardafac&p33="+id+"";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
				parameters: parametros,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function matEdita(id)
{
	var url = "recursos.php";
	var params = Form.serialize($('edita'));
	var pars = "p1=guardamat&p33="+id+"";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
				parameters: parametros,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function cindirectosEdita(codigo)
{
	var url = "cindirectos.php";
	var params = Form.serialize($('edita'));
	var pars = "p1=guarda&p2="+codigo+"";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
				parameters: parametros,
				method:"post",
				onComplete: procesaRespuesta
				});
}

function ivestEdita(clave)
{
	var url = "investigacion.php";
	var params = Form.serialize($('edita'));
	var pars = "p1=guarda&p2="+clave+"";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
				parameters: parametros,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function unescoEdita(clave)
{
	var url = "unesco.php";
	var params = Form.serialize($('edita'));
	var pars = "p1=guarda&p2="+clave+"";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
				parameters: parametros,
				method:"post",
				onComplete: procesaRespuesta
				});
}

function agrEdita(agrupamiento){
	var url = "agrupamientos.php";
	var params = Form.serialize($('edita'));
	var pars = "p1=guarda&p2="+agrupamiento+"";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
				parameters: parametros,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function gruEdita(grupo){
	var url = "grupos.php";
	var params = Form.serialize($('edita'));
	var pars = "p1=guarda&p2="+grupo+"";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
				parameters: parametros,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function docAgrega(){
	var url = "docentes.php";
	var pars = "p1=agrega";
	var ajax = new Ajax.Request( url, {
			parameters: pars,
			method:"post",
			onComplete: procesaRespuesta
			});
}
function tinvestAgrega(){
	var url = "tinvestigador.php";
	var pars = "p1=agrega";
	var ajax = new Ajax.Request( url, {
			parameters: pars,
			method:"post",
			onComplete: procesaRespuesta
			});
}
function extencionAgrega(){
	var url = "extencion.php";
	var pars = "p1=agrega";
	var ajax = new Ajax.Request( url, {
			parameters: pars,
			method:"post",
			onComplete: procesaRespuesta
			});
}
function linvestAgrega(){
	var url = "linvest.php";
	var pars = "p1=agrega";
	var ajax = new Ajax.Request( url, {
			parameters: pars,
			method:"post",
			onComplete: procesaRespuesta
			});
}
function uoiAgrega(){
	var url = "uoi.php";
	var pars = "p1=agrega";
	var ajax = new Ajax.Request( url, {
			parameters: pars,
			method:"post",
			onComplete: procesaRespuesta
			});
}
//////////// calcular horas //////////////////////////
function chorasAgrega(){
	var url = "choras.php";
	var pars = "p1=agrega";
	var ajax = new Ajax.Request( url, {
			parameters: pars,
			method:"post",
			onComplete: procesaRespuesta
			});
}

////////////////////////////////////////////////////
function cindirectosAgrega(){
	var url = "cindirectos.php";
	var pars = "p1=agrega";
	var ajax = new Ajax.Request( url, {
			parameters: pars,
			method:"post",
			onComplete: procesaRespuesta
			});
}

function convocatoriaAgrega(){
	var url = "convocatorias.php";
	var pars = "p1=agrega";
	var ajax = new Ajax.Request( url, {
			parameters: pars,
			method:"post",
			onComplete: procesaRespuesta
			});
}
function extencionAgrega(){
	var url = "extencion.php";
	var pars = "p1=agrega";
	var ajax = new Ajax.Request( url, {
			parameters: pars,
			method:"post",
			onComplete: procesaRespuesta
			});
}

function investAgrega(){
	var url = "investigacion.php";
	var pars = "p1=agrega";
	var ajax = new Ajax.Request( url, {
			parameters: pars,
			method:"post",
			onComplete: procesaRespuesta
			});
}
function unescoAgrega(){
	var url = "unesco.php";
	var pars = "p1=agrega";
	var ajax = new Ajax.Request( url, {
			parameters: pars,
			method:"post",
			onComplete: procesaRespuesta
			});
}
function agrAgrega(){
	var url = "agrupamientos.php";
	var pars = "p1=agrega";
	var ajax = new Ajax.Request( url, {
			parameters: pars,
			method:"post",
			onComplete: procesaRespuesta
			});
}
function gruAgrega(){
	var url = "grupos.php";
	var pars = "p1=agrega";
	var ajax = new Ajax.Request( url, {
			parameters: pars,
			method:"post",
			onComplete: procesaRespuesta
			});
}
function aluAgrega(){
	var url = "alum.php";
	var pars = "p1=agrega";
	var ajax = new Ajax.Request( url, {
			parameters: pars,
			method:"post",
			onComplete: procesaRespuesta
			});
}
function aluBorraTodos(grupo){
	if( ! confirm("Se eliminará tod@s l@s investigadores/ras de este grupo ¿Desea continuar?") ) {
                return false;
            }
	var url = "alum.php";
	var pars = "p1=li&p3="+grupo+"&borratodos=si";
	var ajax = new Ajax.Request( url, {
			parameters: pars,
			method:"post",
			onComplete: procesaRespuesta
			});
	alert('Investigadores/ras del grupo '+grupo+' eliminad@s');
}
function aluEliminaSelec(numero){
	if( ! confirm("¿Desea eliminar l@s Investigadores/ras seleccionad@s?") ) {
                return false;
            }
	var url = "alum.php?numero="+numero+"";
	var params = Form.serialize($('checkboxes'));
	var pars = "p1=elimina_sel";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
			parameters: parametros,
			method:"post",
			onComplete: procesaRespuesta
			});
}
function aluCambiaGru(numero){
	if( ! confirm("¿Desea cambiar de grupo a l@s Investigadores/ras seleccionad@s?") ) {
                return false;
            }
	var grupo = $F('list_grupo');
	var url = "alum.php?numero="+numero+"&grupo="+grupo+"";
	var params = Form.serialize($('checkboxes'));
	var pars = "p1=cambia_sel";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
			parameters: parametros,
			method:"post",
			onComplete: procesaRespuesta
			});
}
function docGuarda(){
	var formulario = document.getElementById('guardadoc');
	for (j=0; j<formulario.length; j++)
		{
		if (formulario[j].value=="") {alert('Debes cumplimentar todos los campos. Si no dispones de algún dato puedes registrar ND (No disponible)');exit;}
		}
	var url = "docentes.php";
	var params = Form.serialize($('guardadoc'));
	var pars = "p1=grabadoc";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
			parameters: parametros,
			method:"post",
			onComplete: procesaRespuesta
			});
}
function cindirectosGuarda(){
	var formulario = document.getElementById('guardacindirectos');
	for (j=0; j<formulario.length; j++)
		{
		if (formulario[j].value=="") {alert('Debes cumplimentar todos los campos. Si no dispones de algún dato puedes registrar ND (No disponible)');exit;}
		}
	var url = "cindirectos.php";
	var params = Form.serialize($('guardacindirectos'));
	var pars = "p1=grabacindirectos";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
			parameters: parametros,
			method:"post",
			onComplete: procesaRespuesta
			});
}
function investGuarda(){
	var formulario = document.getElementById('guardainvest');
	for (j=0; j<formulario.length; j++)
		{
		if (formulario[j].value=="") {alert('Debes complementar todos los campos. Si no dispones de algún dato puedes registrar ND (No disponible)');exit;}
		}
	var url = "investigacion.php";
	var params = Form.serialize($('guardainvest'));
	var pars = "p1=grabainvest";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
			parameters: parametros,
			method:"post",
			onComplete: procesaRespuesta
			});
}
function evaGuarda()
{
	var formulario = document.getElementById('guardaper');
	for (j=0; j<formulario.length; j++)
		{
		if (formulario[j].value=="") {alert('Debes complementar todos los campos. Si no dispones de algún dato puedes registrar ND (No disponible)');exit;}
		}
	var url = "eva.php";
	var params = Form.serialize($('guardaper'));
	var pars = "p2=graba";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
			parameters: parametros,
			method:"post",
			onComplete: procesaRespuesta
			});
}
function tinvestGuarda(){
	var formulario = document.getElementById('guardatinvest');
	for (j=0; j<formulario.length; j++)
		{
		if (formulario[j].value=="") {alert('Debes complementar todos los campos. Si no dispones de algún dato puedes registrar ND (No disponible)');exit;}
		}
	var url = "tinvestigador.php";
	var params = Form.serialize($('guardatinvest'));
	var pars = "p1=grabainvest";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
			parameters: parametros,
			method:"post",
			onComplete: procesaRespuesta
			});
}
function convGuarda(){
	var formulario = document.getElementById('guardaconv');
	for (j=0; j<formulario.length; j++)
		{
		if (formulario[j].value=="") {alert('Debes complementar todos los campos. Si no dispones de algún dato puedes registrar ND (No disponible)');exit;}
		}
	var url = "convocatorias.php";
	var params = Form.serialize($('guardaconv'));
	var pars = "p1=grabaconv";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
			parameters: parametros,
			method:"post",
			onComplete: procesaRespuesta
			});
}
function extGuarda(){
	var formulario = document.getElementById('guardaext');
	for (j=0; j<formulario.length; j++)
		{
		if (formulario[j].value=="") {alert('Debes complementar todos los campos. Si no dispones de algún dato puedes registrar ND (No disponible)');exit;}
		}
	var url = "extencion.php";
	var params = Form.serialize($('guardaext'));
	var pars = "p1=grabaext";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
			parameters: parametros,
			method:"post",
			onComplete: procesaRespuesta
			});
}
function linvestGuarda(){
	var formulario = document.getElementById('guardalinvest');
	for (j=0; j<formulario.length; j++)
		{
		if (formulario[j].value=="") {alert('Debes complementar todos los campos. Si no dispones de algún dato puedes registrar ND (No disponible)');exit;}
		}
	var url = "linvest.php";
	var params = Form.serialize($('guardalinvest'));
	var pars = "p1=grabalinvest";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
			parameters: parametros,
			method:"post",
			onComplete: procesaRespuesta
			});
}
function uoiGuarda(){
	var formulario = document.getElementById('guardauoi');
	for (j=0; j<formulario.length; j++)
		{
		if (formulario[j].value=="") {alert('Debes complementar todos los campos. Si no dispones de algún dato puedes registrar ND (No disponible)');exit;}
		}
	var url = "uoi.php";
	var params = Form.serialize($('guardauoi'));
	var pars = "p1=grabauoi";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
			parameters: parametros,
			method:"post",
			onComplete: procesaRespuesta
			});
}
function unescoGuarda(){
	var formulario = document.getElementById('guardaunesco');
	for (j=0; j<formulario.length; j++)
		{
		if (formulario[j].value=="") {alert('Debes cumplimentar todos los campos. Si no dispones de algún dato puedes registrar ND (No disponible)');exit;}
		}
	var url = "unesco.php";
	var params = Form.serialize($('guardaunesco'));
	var pars = "p1=grabaunesco";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
			parameters: parametros,
			method:"post",
			onComplete: procesaRespuesta
			});
}
function agrGuarda(){
	var formulario = document.getElementById('guardaagr');
	var url = "agrupamientos.php";
	var params = Form.serialize($('guardaagr'));
	var pars = "p1=grabaagr";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
			parameters: parametros,
			method:"post",
			onComplete: procesaRespuesta
			});
}
function gruGuarda(){
	var formulario = document.getElementById('guardagru');
	for (j=0; j<formulario.length; j++)
		{
		if (formulario[j].value=="") {alert('Debes cumplimentar todos los campos. Si no dispones de algún dato puedes registrar ND (No disponible)');exit;}
		}
	var url = "grupos.php";
	var params = Form.serialize($('guardagru'));
	var pars = "p1=grabagru";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
			parameters: parametros,
			method:"post",
			onComplete: procesaRespuesta
			});
}
function aluGuarda(){
	var formulario = document.getElementById('guardaalu');
	for (j=0; j<formulario.length; j++)
		{
		if (formulario[j].value=="") {alert('Debes cumplimentar todos los campos. Si no dispones de algún dato puedes registrar ND (No disponible)');exit;}
		}
	var url = "alum.php";
	var params = Form.serialize($('guardaalu'));
	var pars = "p1=grabaalu";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
			parameters: parametros,
			method:"post",
			onComplete: procesaRespuesta
			});
}
function docBorraTodos(){
	if( ! confirm("Vas a eliminar a todos los docentes excepto al administrador ¿Estás segur@?") ) {
                return false;
            }
	var url = "docentes.php";
	var pars = "p1=eliminatodo";
	var ajax = new Ajax.Request(url, {
			parameters: pars,
			method:"post",
			onComplete: procesaRespuesta
			});
}
function tinvestBorraTodos(){
	if( ! confirm("Vas a eliminar a todos los tipos de investigadores ¿Estás segur@?") ) {
                return false;
            }
	var url = "tinvestigador.php";
	var pars = "p1=eliminatodo";
	var ajax = new Ajax.Request(url, {
			parameters: pars,
			method:"post",
			onComplete: procesaRespuesta
			});
}
function convBorraTodos(){
	if( ! confirm("Vas a eliminar a todos los tipos de convocatorias ¿Estás segur@?") ) {
                return false;
            }
	var url = "convocatorias.php";
	var pars = "p1=eliminatodo";
	var ajax = new Ajax.Request(url, {
			parameters: pars,
			method:"post",
			onComplete: procesaRespuesta
			});
}
function extBorraTodos(){
	if( ! confirm("Vas a eliminar a todos los tipos de Extenciones ¿Estás segur@?") ) {
                return false;
            }
	var url = "extencion.php";
	var pars = "p1=eliminatodo";
	var ajax = new Ajax.Request(url, {
			parameters: pars,
			method:"post",
			onComplete: procesaRespuesta
			});
}
function linvestBorraTodos(){
	if( ! confirm("Vas a eliminar a todos los tipos de Línea de Investigación ¿Estás segur@?") ) {
                return false;
            }
	var url = "linvest.php";
	var pars = "p1=eliminatodo";
	var ajax = new Ajax.Request(url, {
			parameters: pars,
			method:"post",
			onComplete: procesaRespuesta
			});
}
function uoiBorraTodos(){
	if( ! confirm("Vas a eliminar a todos los tipos de Unidad Operativa de Investigación ¿Estás segur@?") ) {
                return false;
            }
	var url = "uoi.php";
	var pars = "p1=eliminatodo";
	var ajax = new Ajax.Request(url, {
			parameters: pars,
			method:"post",
			onComplete: procesaRespuesta
			});
}
function facBorraTodos(){
	if( ! confirm("Vas a eliminar a todos los tipos de facturas ¿Estás segur@?") ) {
                return false;
            }
	var url = "recursos.php";
	var pars = "p1=eliminatodo";
	var ajax = new Ajax.Request(url, {
			parameters: pars,
			method:"post",
			onComplete: procesaRespuesta
			});
}
function matBorraTodos(){
	if( ! confirm("Vas a eliminar todas las matrices de seguimiento ¿Estás segur@?") ) {
                return false;
            }
	var url = "recursos.php";
	var pars = "p1=eliminatodomat";
	var ajax = new Ajax.Request(url, {
			parameters: pars,
			method:"post",
			onComplete: procesaRespuesta
			});
}
function cindirectosBorraTodos(){
	if( ! confirm("Vas a eliminar a todos los tipos de costos indirectos ¿Estás segur@?") ) {
                return false;
            }
	var url = "cindirectos.php";
	var pars = "p1=eliminatodo";
	var ajax = new Ajax.Request(url, {
			parameters: pars,
			method:"post",
			onComplete: procesaRespuesta
			});
}
function investBorraTodos(){
	if( ! confirm("Vas a eliminar a todos los tipos de investigadociones ¿Estás segur@?") ) {
                return false;
            }
	var url = "investigacion.php";
	var pars = "p1=eliminatodo";
	var ajax = new Ajax.Request(url, {
			parameters: pars,
			method:"post",
			onComplete: procesaRespuesta
			});
}
function unescoBorraTodos(){
	if( ! confirm("Vas a eliminar a todos los tipos de investigaciones ¿Estás segur@?") ) {
                return false;
            }
	var url = "unesco.php";
	var pars = "p1=eliminatodo";
	var ajax = new Ajax.Request(url, {
			parameters: pars,
			method:"post",
			onComplete: procesaRespuesta
			});
}
function agrBorraTodos(){
	if( ! confirm("Vas a eliminar todos los Proyectos ¿Estás segur@?") ) {
                return false;
            }
	var url = "agrupamientos.php";
	var pars = "p1=eliminatodo";
	var ajax = new Ajax.Request(url, {
			parameters: pars,
			method:"post",
			onComplete: procesaRespuesta
			});
}
function gruBorraTodos(){
	if( ! confirm("Vas a eliminar todos los grupos de referencia ¿Estás segur@?") ) {
                return false;
            }
	var url = "grupos.php";
	var pars = "p1=eliminatodo";
	var ajax = new Ajax.Request(url, {
			parameters: pars,
			method:"post",
			onComplete: procesaRespuesta
			});
}
function paginaGrupo(grupo,accion){
	var url = "alum.php";
	var pars = "p1="+accion+"&p3="+grupo+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}

function editaFichaAlu(campo,codigo){
	var url = "edita_alu.php";
	var valor = $F(campo);
	var pars = "p1="+campo+"&p2="+codigo+"&p3="+valor+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				});
}
function ediAluMasiva(){
	var url = "alum.php";
	var pars = "p1=edita_masiva";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function validaCampo(tipo,campo){
	var valor = $F(campo);
	switch (tipo){
		case 'codigo':
		if(valor=='') alert('El código no puede estar vacío');
		break;
		}
}
function marcaTodos(numero,formulario){
		for (var i=0;i<numero;i++)
			{
			if(document.getElementById("cb_"+i+"").checked)
				{document.getElementById("cb_"+i+"").checked=false;}
			else
				{document.getElementById("cb_"+i+"").checked=true;}
			}
} 
function consultarfecha(){
	var formulario = document.getElementById('guardafecha');
	for (j=0; j<formulario.length; j++)
		{
		if (formulario[j].value=="") {alert('Debes ingresar las Fechas para buscar los proyectos');exit;}
		}
	var url = "matri.php";
	var params = Form.serialize($('guardafecha'));
	var pars = "p1=consultarfecha";
	var parametros = ""+params+"&"+pars+"";	
	var ajax = new Ajax.Request( url, {
			parameters: parametros,
			method: "post",
			onComplete: procesaRespuesta
			});
}
function consultarconv(){
	var formulario = document.getElementById('guardaper');
	for (j=0; j<formulario.length; j++)
		{
		if (formulario[j].value=="") {alert('Debes cumplimentar todos los campos');exit;}
		}
	var url = "matri.php";
	var params = Form.serialize($('guardaper'));
	var pars = "p1=consultarconvo";
	var parametros = ""+params+"&"+pars+"";	
	var ajax = new Ajax.Request( url, {
			parameters: parametros,
			method: "post",
			onComplete: procesaRespuesta
			});
}
function consultarconvod(){
	var formulario = document.getElementById('guardaper');
	for (j=0; j<formulario.length; j++)
		{
		if (formulario[j].value=="") {alert('Debes cumplimentar todos los campos');exit;}
		}
	var url = "agrupamientos.php";
	var params = Form.serialize($('guardaper'));
	var pars = "p1=consultarconvod";
	var parametros = ""+params+"&"+pars+"";	
	var ajax = new Ajax.Request( url, {
			parameters: parametros,
			method: "post",
			onComplete: procesaRespuesta
			});
}
function consultard(){
	var formulario = document.getElementById('ordenard');
	for (j=0; j<formulario.length; j++)
		{
		if (formulario[j].value=="") {alert('Debes cumplimentar todos los campos');exit;}
		}
	var url = "docentes.php";
	var params = Form.serialize($('ordenard'));
	var pars = "p1=consultard";
	var parametros = ""+params+"&"+pars+"";	
	var ajax = new Ajax.Request( url, {
			parameters: parametros,
			method: "post",
			onComplete: procesaRespuesta
			});
}
function consultarp(){
	var formulario = document.getElementById('ordenarp');
	for (j=0; j<formulario.length; j++)
		{
		if (formulario[j].value=="") {alert('Debes cumplimentar todos los campos');exit;}
		}
	var url = "agrupamientos.php";
	var params = Form.serialize($('ordenarp'));
	var pars = "p1=consultarp";
	var parametros = ""+params+"&"+pars+"";	
	var ajax = new Ajax.Request( url, {
			parameters: parametros,
			method: "post",
			onComplete: procesaRespuesta
			});
}
function consultari(){
	var formulario = document.getElementById('ordenari');
	for (j=0; j<formulario.length; j++)
		{
		if (formulario[j].value=="") {alert('Debes cumplimentar todos los campos');exit;}
		}
	var url = "alum.php";
	var params = Form.serialize($('ordenari'));
	var pars = "p1=consultari";
	var parametros = ""+params+"&"+pars+"";	
	var ajax = new Ajax.Request( url, {
			parameters: parametros,
			method: "post",
			onComplete: procesaRespuesta
			});
}
function consultarpro()
{
	var formulario = document.getElementById('ordenarpro');
	for (j=0; j<formulario.length; j++)
		{
		if (formulario[j].value=="") {alert('Debes cumplimentar todos los campos');exit;}
		}
	var url = "matri.php";
	var params = Form.serialize($('ordenarpro'));
	var pars = "p1=consultarpro";
	var parametros = ""+params+"&"+pars+"";	
	var ajax = new Ajax.Request( url, {
			parameters: parametros,
			method: "post",
			onComplete: procesaRespuesta
			});
}

function consultarcoord(){
	var formulario = document.getElementById('buscoord');
	var url = "matri.php";
	var params = Form.serialize($('buscoord'));
	var pars = "p1=consultarcoord";
	var parametros = ""+params+"&"+pars+"";	
	var ajax = new Ajax.Request( url, {
			parameters: parametros,
			method: "post",
			onComplete: procesaRespuesta
			});
}
function consultarcoordc(){
	var formulario = document.getElementById('buscoord');
	var url = "agrupamientos.php";
	var params = Form.serialize($('buscoord'));
	var pars = "p1=consultarcoordc";
	var parametros = ""+params+"&"+pars+"";	
	var ajax = new Ajax.Request( url, {
			parameters: parametros,
			method: "post",
			onComplete: procesaRespuesta
			});
}
function consultaruoi(){
	var formulario = document.getElementById('buscuoi');
	var url = "matri.php";
	var params = Form.serialize($('buscuoi'));
	var pars = "p1=consultaruoi";
	var parametros = ""+params+"&"+pars+"";	
	var ajax = new Ajax.Request( url, {
			parameters: parametros,
			method: "post",
			onComplete: procesaRespuesta
			});
}
function consultaruoid(){
	var formulario = document.getElementById('buscuoi');
	var url = "docentes.php";
	var params = Form.serialize($('buscuoi'));
	var pars = "p1=consultaruoid";
	var parametros = ""+params+"&"+pars+"";	
	var ajax = new Ajax.Request( url, {
			parameters: parametros,
			method: "post",
			onComplete: procesaRespuesta
			});
}
function consultarlinvest(){
	var formulario = document.getElementById('busclinvest');
	var url = "matri.php";
	var params = Form.serialize($('busclinvest'));
	var pars = "p1=consultarlinvest";
	var parametros = ""+params+"&"+pars+"";	
	var ajax = new Ajax.Request( url, {
			parameters: parametros,
			method: "post",
			onComplete: procesaRespuesta
			});
}
function consultarext()
{
	var formulario = document.getElementById('guardaext');
	var url = "matri.php";
	var params = Form.serialize($('guardaext'));
	var pars = "p1=consultarext";
	var parametros = ""+params+"&"+pars+"";	
	var ajax = new Ajax.Request( url, {
			parameters: parametros,
			method: "post",
			onComplete: procesaRespuesta
			});
}
function consultarextp()
{
	var formulario = document.getElementById('guardaext');
	var url = "agrupamientos.php";
	var params = Form.serialize($('guardaext'));
	var pars = "p1=consultarextp";
	var parametros = ""+params+"&"+pars+"";	
	var ajax = new Ajax.Request( url, {
			parameters: parametros,
			method: "post",
			onComplete: procesaRespuesta
			});
}

function facGuarda(){
	var formulario = document.getElementById('test_paneldoc');
	
	for (j=0; j<formulario.length; j++)
		{
		if (formulario[j].value=="") {alert('Debes cumplimentar todos los campos');exit;}
		}
	var url = "recursos.php";
	var params = Form.serialize($('test_paneldoc'));
	var pars = "p1=graba";
	var parametros = ""+params+"&"+pars+"";	
	var ajax = new Ajax.Request( url, {
			parameters: parametros,
			method: "post",
			onComplete: procesaRespuesta
			});
}
function editaPer(campo,periodo){
	var url = "eva.php";
	var valor = $F(campo);
	var pars = "p2=edita";
	var params = "p3="+valor+"&p4="+periodo+"&p5="+campo+"";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
				parameters: parametros,
				method:"post",
				onComplete: procesaRespuesta
				});
}
//edita valor hora
function editahora(campo,codigo){
	var url = "matri.php";
	var valor = $F(campo);
	var pars = "p1=edita";
	var params = "p33="+valor+"&p44="+codigo+"&p54="+campo+"";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
				parameters: parametros,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function evaBorra(periodo){
	if( ! confirm("Vas a eliminar este período de evaluación ¿Estás segur@?") ) {
                return false;
            }
	var url = "eva.php";
	var pars = "p2=borra&p3="+periodo+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
//borra hora
function horaBorra(codigo){
	if( ! confirm("Vas a eliminar este período de evaluación ¿Estás segur@?") ) {
                return false;
            }
	var url = "matri.php";
	var pars = "p1=borra&p33="+codigo+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function matriculaMasiva(){
	var url = "reg_matri.php";
	var pars = "p1=masiva";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuesta
				});
}
function matriculafactura(){
	var url = "matri.php";
	var pars = "p1=factura";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuesta
				});
}
function matriculaConsulta(){
	var url = "matri.php";
	var pars = "p1=consulta";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuesta
				});
}
function matriculaConsultag(){
	var url = "matri.php";
	var pars = "p1=consultag";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuesta
				});
}
function listaGrupoMatricula(grupo){
	var url = "matri.php";
	var pars = "p1=masiva&p2="+grupo+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuesta
				})
}
function abreFicha(){
	var codigo = $F("codigo");
	new LITBox('carga_fichaal.php?alu='+codigo+'', {type:'window', overlay:true});
}

function matriculaAlumnos(){
	var url = "reg_matri.php";
	var agrupamiento = $F('agrupamiento');
	var pars = "p3=graba&agrupamiento="+agrupamiento+"";
	var params = Form.serialize($('alumnado_a_matricular'));
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
				parameters: parametros,
				method: "post",
				onComplete: procesaRespuesta
				})
}
function listaAlumMat(){
	var url = "matri.php";
	var agrupamiento = $F('agrupamiento');
	var pars = "p1=consulta&p4="+agrupamiento+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuesta
				})
}
function listap(){
	var url = "matri.php";
	var agrupamiento = $F('agrupamiento');
	var pars = "p1=consultag&p4="+agrupamiento+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuesta
				})
}

function matBorra(codigo,agrupamiento){
	if( ! confirm("Vas a eliminar esta matrícula ¿Estás segur@?") ) {
                return false;
            }
	var url = "matri.php";
	var pars = "p1=consulta&p5="+codigo+"&p6="+agrupamiento+"&p4="+agrupamiento+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuesta
				})
}
function cambiaAlumnosAgrup(numero,agrupamiento_antiguo){
	var agrupamiento = $F('list_agrupamiento');
	if( ! confirm("¿Realmente quieres cambiar est@s investigadores/as al agrupamiento "+agrupamiento+"?") ) {
		return false;
	    }
	var url = "matri.php";
	var params = Form.serialize($('checkboxes'));
	var pars = "p1=consulta&p7="+agrupamiento+"&p8="+numero+"&p9="+agrupamiento_antiguo+"&p4="+agrupamiento_antiguo+"";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
				parameters: parametros,
				method: "post",
				onComplete: procesaRespuesta
				})
}	
///////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////
//Funciones Docente////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////
function abreAdmin(){
	document.location.href="admin/panel.php";
}
function abredoc(){
	document.location.href="admin/paneldoc.php";
}
function procesaRespuestaDoc(resp){
	$("center").innerHTML = resp.responseText;
}
function procesaCalendario(resp){
	$("calendario").innerHTML = resp.responseText;
}
function navegaMes(numero,anyo,variacion){
	var url = "calendario.php";
		if(variacion=="menos")
			{
			numeromes=parseFloat(numero);
			mes = numeromes - 1;
			if(mes<1)
				{
				mes = 12;
				anyo = anyo - 1;
				}
			}
		else
			{
			numeromes=parseFloat(numero);
			mes = numeromes + 1;
			if(mes>12)
				{
				mes = 1;
				anyo = (parseInt(anyo) + 1);
				}
			}
	var pars = "mes="+mes+"&anyo="+anyo+"";
	var ajax = new Ajax.Request( url, {
			parameters: pars,
			method: "post",
			onComplete: procesaCalendario
			});
}
function navegaMesPeq(numero,anyo,variacion,id){
		if(variacion=="menos")
			{
			mes = (parseFloat(numero) - 1);
			if(mes<1)
				{
				mes = 12;
				anyo = anyo - 1;
				}
			}
		else
			{
			mes = (parseFloat(numero) + 1);
			if(mes>12)
				{
				mes = 1;
				anyo = (parseInt(anyo) + 1);
				}
			}
	document.location.href="calend_peq.php?mes="+mes+"&anyo="+anyo+"&id="+id+"";
}
function navegaAnyo(numero,mes,variacion){
	var url = "calendario.php";
		if(variacion=="menos")
			{
			anyo = (parseInt(numero) - 1);
			}
		else
			{
			anyo = (parseInt(numero) + 1);
			}
	var pars = "anyo="+anyo+"&mes="+mes+"";
	var ajax = new Ajax.Request( url, {
			parameters: pars,
			method: "post",
			onComplete: procesaCalendario
			});
}
function navegaAnyoPeq(numero,mes,variacion,id){
		if(variacion=="menos")
			{
			anyo = (parseInt(numero) - 1);
			}
		else
			{
			anyo = (parseInt(numero) + 1);
			}
	document.location.href="calend_peq.php?mes="+mes+"&anyo="+anyo+"&id="+id+"";
}
function cargaInicio(dia,mes,anyo){
	var url="inicio.php";
	var pars="p1="+dia+"&p2="+mes+"&p3="+anyo+"";
	var ajax = new Ajax.Request( url, {
				method: "post",
				parameters: pars,
				onComplete: procesaRespuestaDoc
				})
	//document.getElementById('contenedor_doc').style["display"] = "none";
	//document.getElementById('inicio').style["display"] = "block";
}
function miraPerfil(docente){
	/*if(document.getElementById('contenedor_doc').style["display"] = "none")
		{
		document.getElementById('contenedor_doc').style["display"] = "block";
		}
	document.getElementById('inicio').style["display"] = "none";*/
	var url="perfil.php";
	var pars = "p1="+docente+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function editaDocente(campo,docente,valor){
	new Ajax.InPlaceEditor('' + campo + '', 'edita.php?docente='+docente+'&campo='+campo+'',{size:"15"});
}	
function presenta(elemento){
	document.getElementById(elemento).style["display"] = "block";
	if(elemento=='fileUpload')
		{
		alert('El nombre de la fotografía debe coincidir con tu nombre de usuario (Gustavo.jpg para la usuaria Gustavo).');
		}
}
function recarga(parametro,pagina){
	var url=pagina;
	var pars = "p1="+parametro+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function cambiaClave(docente){
	var clave = $F('clave');
	var claverep = $F('claverep');
	if((clave != claverep) || (clave == '' && claverep == ''))
		{
		alert('Las claves no coinciden o son nulas. No se cambiará nada');
		exit;
		}
	var url = "edita.php";
	var pars = "p1=clave&clave="+clave+"&docente="+docente+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function miraActividades(docente){
	/*if(document.getElementById('contenedor_doc').style["display"] = "none")
		{
		document.getElementById('contenedor_doc').style["display"] = "block";
		}
	document.getElementById('inicio').style["display"] = "none";*/
	var url="actividades.php";
	var pars = "p1="+docente+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function miraAgrup0(agrupamiento){
	var act=$F('act');
	var url="agrup_list.php";
	var pars = "p1="+agrupamiento+"&p4=not&act_post="+act+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function notaElimina(id){
	if( ! confirm("¿Desea eliminar esta Nota?") ) {
                return false;
            }
	var url = "agrup_list.php";
	var pars = "p4=elimina&p44="+id+"";
	var ajax = new Ajax.Request( url, 
				{
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function miraAgrup(agrupamiento){
	var url="agrup_list.php";
	var pars = "p1="+agrupamiento+"&p4=not";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function recursosAgrega(agrupamiento){
	var url="recursos.php";
		var pars = "p11="+agrupamiento+"&p1=consulta";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function vhoraEdita_recursos(){
	var url = "recursos.php";
	var params = Form.serialize($('edita'));
	var pars = "p4=guarda&p1="+agupamiento+"";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
				parameters: parametros,
				method:"post",
				onComplete: procesaRespuesta
				});
	
	}
function miraAgrup1(agrupamiento){
	var url="agrup_list.php";
	var pars = "p1="+agrupamiento+"&p4=obs";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function miraObjetivos(docente)
{
	/*if(document.getElementById('contenedor_doc').style["display"] = "none")
		{
		document.getElementById('contenedor_doc').style["display"] = "block";
		}
	document.getElementById('inicio').style["display"] = "none";*/
	var url="objetivos.php";
	var pars = "p1="+docente+"";
	var ajax = new Ajax.Request( url, 
				{
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function registraObjetivo(docente,numero){
	if(!document.getElementById('activ').value) {alert('Debes indicar un nombre para el nuevo objetivo');exit;}
	for(j=0;j<numero;j++)
		{
		if (!document.getElementById(j).checked)
			{
			var vacio = 'si';
			}
		else
			{
			j=numero;
			var vacio = 'no';
			}
		}
	if(vacio == 'si') {alert('Debes seleccionar al menos un proyecto');exit;}
	var url = "objetivos.php";
	var params = Form.serialize($('reg_act'));
	var pars = "p1="+docente+"&p2=registro&numero="+numero+"";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
				parameters: parametros,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function editaObjetivoAgr(nombre_input,campo,objetivo,agrupamiento,numero)
{
	var valores = new Array();
	for(j=0;j<numero;j++)
		{
		valores[j]=document.getElementById(j).value;
		}
	new Ajax.InPlaceCollectionEditor('' + nombre_input + '', 'edita.php?activ_ant='+actividad+'&agrup_ant='+agrupamiento+'&campo='+campo+'',{collection: valores,ajaxOptions: {method: 'post'}});
}
function eliminaObjetivo(docente,objetivo,agrupamiento)
{
	if( ! confirm("¿Realmente deseas eliminar el objetivo "+objetivo+" del proyecto "+agrupamiento+"?") )
		{
		return false;
	    }
	var url="objetivos.php";
	var pars = "p1="+docente+"&p2=elimina&activ_eli="+objetivo+"&agrup_eli="+agrupamiento+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function objetSolicitaEdita(id){
	var url = "objetivos.php";
	var pars = "p2=edita&p4="+id+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function objetEdita(id){
	var url = "objetivos.php";
	var params = Form.serialize($('edita'));
	var pars = "p2=guarda&p4="+id+"";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
				parameters: parametros,
				method:"post",
				onComplete: procesaRespuesta
				});

}
function registraActividad1(){
	var formulario = document.getElementById('reg_act');
	var url = "actividades.php";
	var params = Form.serialize($('reg_act'));
	var pars = "p2=registro";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
			parameters: parametros,
			method:"post",
			onComplete: procesaRespuesta
			});
}
function registraActividad(docente,numero){
	if(!document.getElementById('activ').value) {alert('Debes indicar un nombre para la nueva actividad');exit;}
	for(j=0;j<numero;j++)
		{
		if (!document.getElementById(j).checked)
			{
			var vacio = 'si';
			}
		else
			{
			j=numero;
			var vacio = 'no';
			}
		}
	if(vacio == 'si') {alert('Debes seleccionar al menos un agrupamiento');exit;}
	if(!document.getElementById('ponderacion').value) {alert('Debes indicar la ponderación de la actividad');exit;}
	var url = "actividades.php";
	var params = Form.serialize($('reg_act'));
	var pars = "p1="+docente+"&p2=registro&numero="+numero+"";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
				parameters: parametros,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function editaActividad(nombre_input,campo,actividad,agrupamiento){
	new Ajax.InPlaceEditor('' + nombre_input + '', 'edita.php?activ_ant='+actividad+'&agrup_ant='+agrupamiento+'&campo='+campo+'',{size:"15"});
}
function editaActividadAgr(nombre_input,campo,actividad,agrupamiento,numero){
	var valores = new Array();
	for(j=0;j<numero;j++)
		{
		valores[j]=document.getElementById(j).value;
		}
	new Ajax.InPlaceCollectionEditor('' + nombre_input + '', 'edita.php?activ_ant='+actividad+'&agrup_ant='+agrupamiento+'&campo='+campo+'',{collection: valores,ajaxOptions: {method: 'post'}});
}
function editaActividadPer(nombre_input,campo,actividad,agrupamiento,numero)
{
	var valores = new Array();
	final = (parseInt(numero) + 1);
	for(j=0;j<final;j++)
		{
		valores[j]=document.getElementById('p'+j+'').value;
		}
	new Ajax.InPlaceCollectionEditor('' + nombre_input + '', 'edita.php?activ_ant='+actividad+'&agrup_ant='+agrupamiento+'&campo='+campo+'',{collection: valores,ajaxOptions: {method: 'post'}});
}
function activSolicitaEdita(id){
	var url = "actividades.php";
	var pars = "p2=edita&p4="+id+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method:"post",
				onComplete: procesaRespuesta
				});
}
function activEdita(id){
	var url = "actividades.php";
	var params = Form.serialize($('edita'));
	var pars = "p2=guarda&p4="+id+"";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
				parameters: parametros,
				method:"post",
				onComplete: procesaRespuesta
				});

}
function eliminaActividad(docente,actividad,agrupamiento)
{
	if( ! confirm("¿Realmente deseas eliminar la actividad "+actividad+" del agrupamiento "+agrupamiento+"?") )
		{
		return false;
	    }
	var url="actividades.php";
	var pars = "p1="+docente+"&p2=elimina&activ_eli="+actividad+"&agrup_eli="+agrupamiento+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}	
function miraHorario(docente){
	var url="horario.php";
	var pars = "p1="+docente+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function guardaFranja(docente,franja){
	var hini=$F("ini_"+franja+"");
	var hfin=$F("fin_"+franja+"");
	if(hini=="")
		{
		alert('Debes introducir la hora de inicio de esta franja horaria');exit;
		}
	if(hfin=="")
		{
		alert('Debes introducir la hora de finalización de esta franja horaria');exit;
		}
	var url="horario.php";
	var pars = "p1="+docente+"&p5="+hini+"&p6="+hfin+"&p7="+franja+"";
	var ajax = new Ajax.Request( url, {
			parameters: pars,
			method: "post",
			onComplete: procesaRespuestaDoc
			})
}
function guardaSesion(docente,franja,dia){
	var sesion = $F("agr_"+franja+"_"+dia+"");
	var url="horario.php";
	var pars = "p1="+docente+"&p2="+franja+"&p3="+dia+"&p4="+sesion+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function nuevaFila(docente,franja){
	var url="horario.php";
	var pars = "p1="+docente+"&p8="+franja+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function calendario(dia,mes,anyo){
	var url="inicio.php";
	var pars = "p1="+dia+"&p2="+mes+"&p3="+anyo+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function editaCita(campo,docente,franja,dia,caracter,fecha){
	new Ajax.InPlaceEditor('' + campo + '', 'edita.php?docente='+docente+'&citafranja='+franja+'&citadia='+dia+'&citacaracter='+caracter+'&citafecha='+fecha+'',{rows:15,cols:40});
}
function abreJustif(sesion,fecha,hini,codigo){
	var url="justif_masiva.php";
	var pars = "p1="+sesion+"&p2="+fecha+"&p3="+hini+"&p4="+codigo+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function abreJustifAnt(sesion,fecha,hini,codigo,mes){
	var mes_ant=(parseInt(mes)-1);
	if (mes_ant==0)
		{
		mes_ant = 12;
		}
	var url="justif_masiva.php";
	var pars = "p1="+sesion+"&p2="+fecha+"&p3="+hini+"&p4="+codigo+"&p5="+mes_ant+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function abreJustifSig(sesion,fecha,hini,codigo,mes){
	var mes_sig=(parseInt(mes)+1);
	if (mes_sig==13)
		{
		mes_sig = 1;
		}
	var url="justif_masiva.php";
	var pars = "p1="+sesion+"&p2="+fecha+"&p3="+hini+"&p4="+codigo+"&p5="+mes_sig+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function justiFica(sesion,fecha,hini,codigo,mes)
{
	var url="justif_masiva.php";
	var params = Form.serialize($('lista'));
	var pars = "p1="+sesion+"&p2="+fecha+"&p3="+hini+"&p4="+codigo+"&p5="+mes+"&p6=justifica";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
				parameters: parametros,
				method: "post",
				onComplete: procesaRespuestaDoc
				})

}
///// comprueban datos //////////////////////////////////////////////////////
function comprobar(obj)
{
  var objotro = document.getElementById("list_tinvest"); 
  var textOculto = document.getElementById("txt_telef1");
  var textvhora = document.getElementById("txt_sueldo");
if( list_tinvest.options[ list_tinvest.selectedIndex ].value == 'Contratación servicios profesionales' )
{
textOculto.readOnly=true;
textOculto.style.backgroundColor='#FF3333';

//textOculto.style.visibility = 'hidden'; 
textvhora.readOnly=false; 
textvhora.style.backgroundColor='#ffffff'; 
}
else 
{
	textOculto.readOnly=false;
	  textOculto.style.backgroundColor='#ffffff'; 
	
    textvhora.readOnly=true; 
  textvhora.style.backgroundColor='#FF3333'; 
	
  
}
}
function marcaTodos(numero)
{
   for (i=0;i<numero;i++)
	{
	document.getElementById('just_'+i+'').checked=1;
        }
}
  function recargar()
    {
      window.location.reload()
    } 
function desmarcaTodos(numero){
   for (i=0;i<numero;i++)
	{
	document.getElementById('just_'+i+'').checked=0;
        }
} 
function abreAgrup(sesion,fecha,hini){
	var url="agrupamiento.php";
	var pars = "p1="+sesion+"&p2="+fecha+"&p3="+hini+"&p4=asi";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function abreAgrupNotas1(sesion,fecha,hini){
	var act=$F('act');
	var url="agrupamiento.php";
	var pars = "p1="+sesion+"&p2="+fecha+"&p3="+hini+"&p4=not&act_post="+act+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function abreAgrup1(sesion){
	var url="agrup_list.php";
	var pars = "p1="+sesion+"&p4=obs";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function abrerecursos(sesion){
	var url="recursos.php";
	var pars = "p1="+sesion+"&p4=obs";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function abreAgrupNotas(sesion,fecha,hini){
	var url="agrupamiento.php";
	var pars = "p1="+sesion+"&p2="+fecha+"&p3="+hini+"&p4=not";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function abreAgrupObs(sesion,fecha,hini){
	var url="agrupamiento.php";
	var pars = "p1="+sesion+"&p2="+fecha+"&p3="+hini+"&p4=obs";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function regAsi(codigo,agrupamiento,fecha,hini,n){
	var dato = $F("list_"+n+"");
	if(dato != "E" && dato != "R" && dato != "C" && dato != "N")
		{
		alert("No se ha especificado el tipo de dato . No se grabará nada");
		exit;
		}
	var url="agrupamiento.php";
	var pars = "registro=asi&codigo="+codigo+"&p1="+agrupamiento+"&p2="+fecha+"&p3="+hini+"&p4=asi&dato="+dato+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function nuevaCita(id){
	var parrafo="parrafocita"+id+"";	
	document.getElementById(parrafo).style["display"] = "inline"	
}
function cancelaCita(id){
	
	self.blur();
		
}
function grabaCita(id,dia,mes,anyo,franja,diacita){
	var content = FCKeditorAPI.GetInstance('area').GetXHTML();
	var out = '=';
	var add = '[igual]';	
	var content_filtrado = replaceChars(content,out,add);
	var out = '?';
	var add = '~inte~';
	var content_filtrado1 = replaceChars(content_filtrado,out,add);
	var tipo=document.getElementById("select"+id+"").value;
	var url="inicio.php";
	var pars="p1="+dia+"&p2="+mes+"&p3="+anyo+"&accion=graba&cita="+content_filtrado1+"&franjacita="+franja+"&diacita="+diacita+"&tipocita="+tipo+"";
	this.close.innerHTML;
	var ajax=new Ajax.Request(url,{
				parameters: pars,
				method:"post",
				onComplete:procesaRespuestaDoc
				})
}
function actualizaCita(id,dia,mes,anyo,franja,diacita){
	
	var content = FCKeditorAPI.GetInstance('area').GetXHTML();
	var out = '=';
	var add = '[igual]';	
	var content_filtrado = replaceChars(content,out,add);
	var out = '?';
	var add = '~inte~';
	var content_filtrado1 = replaceChars(content_filtrado,out,add);
	var tipo=document.getElementById("select").value;
	var url="inicio.php";
	var pars="p1="+dia+"&p2="+mes+"&p3="+anyo+"&accion=actualiza&cita="+content_filtrado1+"&franjacita="+franja+"&diacita="+diacita+"&tipocita="+tipo+"&numerocita="+id+"";
	var ajax=new Ajax.Request(url,{
				parameters: pars,
				method:"post",
				onComplete:procesaRespuestaDoc
				})
}
function borraCita(id,dia,mes,anyo){
	if( ! confirm("¿Realmente quieres eliminar esta cita?") ) {
		return false;
	    }
	var url="inicio.php";
	var pars="p1="+dia+"&p2="+mes+"&p3="+anyo+"&accion=elimina&id="+id+"";
	var ajax=new Ajax.Request(url,{
				parameters: pars,
				method:"post",
				onComplete:procesaRespuestaDoc
				})
}
function editaCita(id,texto,tipo,numerocita){
	var parrafo="act_cita"+id+"";
	var cita="act_textocita"+id+"";
	var tipocita="act_select"+id+"";
	var hidden="hidden"+id+"";
	document.getElementById(parrafo).style["display"] = "block"
	document.getElementById(cita).value = texto
	document.getElementById(tipocita).value = tipo
	document.getElementById(hidden).value = numerocita
}
function abreFicha(codigo,sesion,fecha,hini,accion){
	var url="ficha.php?ini=ini";
	var pars = "p1="+sesion+"&p2="+fecha+"&p3="+hini+"&p4="+accion+"&codigo="+codigo+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function abreFicha1(fecha){
	var url="ficha.php?ini=ini";
	var input = document.getElementById('autorelleno').value;
	if(input == '')
		{
		alert('No existen investigadores/ras a buscar');
		exit;
		}
	var arrayinput = input.split(',');
	var apellidos=arrayinput[0];
	var nombre=arrayinput[1];
	var sesion=arrayinput[2];
	var pars = "p1="+sesion+"&p2="+fecha+"&nombre="+nombre+"&apellidos="+apellidos+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function informeAsistencia(){
	var url="inf_asi.php";
	var ajax = new Ajax.Request( url, {
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function informe(argumento){
	var url="inf_"+argumento+".php";
	var ajax = new Ajax.Request( url, {
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function cargaAlumnos(url){
	var agr = $F("agr");
	var pars="agr="+agr+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function listaFaltas(agr){
	var codigo=$F("alu");
	var url="inf_asi.php";
	var pars="alu="+codigo+"&agr="+agr+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function listaActividades(agr){
	var codigo=$F("alu");
	var url="inf_not.php";
	var pars="alu="+codigo+"&agr="+agr+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function listaPerEval(agr,alu){
	var actividad=$F("act");
	var url="inf_not.php";
	var pars="act="+actividad+"&alu="+alu+"&agr="+agr+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function notas(agr,alu,act){
	var per=$F("per");
	var url="inf_not.php";
	var pars="agr="+agr+"&alu="+alu+"&act="+act+"&per="+per+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function obs(agr){
	var per=$F("per");
	var url="inf_obs.php";
	var pars="agr="+agr+"&per="+per+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function tareas(agr){
	var per=$F("per");
	var url="inf_tar.php";
	var pars="agr="+agr+"&per="+per+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function examenes(agr){
	var per=$F("per");
	var url="inf_exa.php";
	var pars="agr="+agr+"&per="+per+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function informeAsis(codigo,agrupamiento){
	var tipo=$F("pdf");
	var url="pdf/inf_asi.php?codigo="+codigo+"&agrupamiento="+agrupamiento+"&tipo="+tipo+"";
	window.open(url);
}
function grabaNota(agrupamiento,fecha,hini,n){
	var actividad = $F("act");
	var descripcion = $F("desc");
	if(actividad == '0')
		{
		alert("No se ha especificado la actividad. No se grabará nada");
		exit;
		}
	if(descripcion == '')
		{
		alert("No se ha especificado una descripción de la actividad. No se grabará nada");
		exit;
		}
	var url="agrupamiento.php";
	var params = Form.serialize($('notas'));
	var pars = "registro=not&p1="+agrupamiento+"&p2="+fecha+"&p3="+hini+"&actividad="+actividad+"&descripcion="+descripcion+"&numero="+n+"";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
				parameters: parametros,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function grabaObs(agrupamiento,fecha,hini,n){
	var url="agrupamiento.php";
	var params = Form.serialize($('obs'));
	var pars = "registro=obs&p1="+agrupamiento+"&p2="+fecha+"&p3="+hini+"&numero="+n+"";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
				parameters: parametros,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function grabaObs1(agrupamiento,fecha,hini,n){
	var url="agrup_list.php";
	var params = Form.serialize($('obs'));
	var pars = "registro=obs&p1="+agrupamiento+"&p2="+fecha+"&p3="+hini+"&numero="+n+"";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
				parameters: parametros,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function grabaNota1(agrupamiento,n){
	var actividad = $F("act");
	var descripcion = $F("desc");
	if(actividad == '0')
		{
		alert("No se ha especificado la actividad. No se grabará nada");
		exit;
		}
	if(descripcion == '')
		{
		alert("No se ha especificado una descripción de la actividad. No se grabará nada");
		exit;
		}
	var url="agrup_list.php";
	var params = Form.serialize($('notas'));
	var pars = "registro=not&p1="+agrupamiento+"&actividad="+actividad+"&descripcion="+descripcion+"&numero="+n+"";
	var parametros = ""+params+"&"+pars+"";
	var ajax = new Ajax.Request( url, {
				parameters: parametros,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function muestraComent(numero){
	document.getElementById('li_'+numero+'').style["display"] = "block"
}
function ocultaComent(numero){
	document.getElementById('li_'+numero+'').style["display"] = "none"
}
function miraMensajes(){
	var url="mensajes.php";
	var pars="accion=recibidos";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function redactaMensaje(){
	var url="mensajes.php";
	var pars="accion=redacta";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function muestraDest(tipo){
	if(tipo=='f')
		{
		document.getElementById('sel_doc').value = "0"
		}
	if(tipo=='d')
		{
		document.getElementById('sel_fam').value = "0"
		}
}
function enviaMensaje(argumento){
	if(argumento == 'c')
		{
		var url="mensajes.php";
		var pars="accion=recibidos";
		var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
		exit;
		}
	if($F('asunto')=='')
		{
		alert('Debes especificar un asunto para el mensaje');
		exit;
		}
	if($F('sel_doc') == '0' && $F('sel_fam') == '0')
		{
		alert('Debes especificar un destinatario (Docente o Investigador)');
		exit;
		}
	switch(argumento)
		{
		case 'e':
		var pars="accion=envia";
		break;

		case 'b':
		var pars="accion=borrador";
		break;
		}
	var url="mensajes.php";
	var content = FCKeditorAPI.GetInstance('area').GetXHTML();
	var out = '=';
	var add = '[igual]';	
	var content_filtrado = replaceChars(content,out,add);
	var out = '?';
	var add = '~inte~';
	var content_filtrado1 = replaceChars(content_filtrado,out,add);
	var params = Form.serialize($('formulario'));
	var parametros = ""+params+"&"+pars+"&texto="+content_filtrado1+"";
	var ajax = new Ajax.Request( url, {
				parameters: parametros,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function enviaMensajeBorrador(argumento,id){
	if($F('asunto')=='')
		{
		alert('Debes especificar un asunto para el mensaje');
		exit;
		}
	if($F('sel_doc') == '0' && $F('sel_fam') == '0')
		{
		alert('Debes especificar un destinatario (Docente o Investigador)');
		exit;
		}
	switch(argumento)
		{
		case 'e':
		var pars="accion=envia&idb="+id+"";
		break;

		case 'b':
		var pars="accion=borrador&idb="+id+"";
		break;
		}
	var url="mensajes.php";
	var content = FCKeditorAPI.GetInstance('area').GetXHTML();
	var out = '=';
	var add = '[igual]';	
	var content_filtrado = replaceChars(content,out,add);
	var out = '?';
	var add = '~inte~';
	var content_filtrado1 = replaceChars(content_filtrado,out,add);
	var params = Form.serialize($('formulario'));
	var parametros = ""+params+"&"+pars+"&texto="+content_filtrado1+"";
	var ajax = new Ajax.Request( url, {
				parameters: parametros,
				method: "post",
				onComplete:alert('Acción realizada. Haz clic fuera de la ventana para cerrar')
				})
}
function recibidosMensaje(){
	var url="mensajes.php";
	var pars="accion=recibidos";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function eliminaRec(id){
	if( ! confirm("¿Realmente quieres eliminar este mensaje?") ) {
		return false;
	    }
	var url="mensajes.php";
	var pars="accion=eliminarec&id="+id+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function eliminaEnv(id){
	if( ! confirm("¿Realmente quieres eliminar este mensaje?") ) {
		return false;
	    }
	var url="mensajes.php";
	var pars="accion=eliminaenv&id="+id+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function eliminaMensajeTotal(id){
	if( ! confirm("¿Realmente quieres eliminar este mensaje?") ) {
		return false;
	    }
	var url="mensajes.php";
	var pars="accion=eliminatotal&id="+id+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function enviadosMensaje(){
	var url="mensajes.php";
	var pars="accion=enviados";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function borradorMensaje(){
	var url="mensajes.php";
	var pars="accion=listaborrador";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function iniFicha(sesion,fecha,hini,codigo){
	var url="ficha.php?ini=ini";
	var pars="p1="+sesion+"&p2="+fecha+"&p3="+hini+"&codigo="+codigo+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function ficha(sesion,fecha,hini,codigo,argumento){
	var url="ficha.php";
	var pars="p1="+sesion+"&p2="+fecha+"&p3="+hini+"&p4="+argumento+"&codigo="+codigo+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function ficha2(sesion,fecha,hini,codigo,argumento,texto){
	var out = '=';
	var add = '[igual]';	
	var content_filtrado = replaceChars(texto,out,add);
	var out = '?';
	var add = '~inte~';
	var content_filtrado1 = replaceChars(content_filtrado,out,add);
	var url="ficha.php";
	var pars="p1="+sesion+"&p2="+fecha+"&p3="+hini+"&p4="+argumento+"&codigo="+codigo+"&texto="+content_filtrado1+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function ficha3(sesion,fecha,hini,codigo,argumento){
	var url="ficha.php";
	var item=$F('texto_item');
	var pars="p1="+sesion+"&p2="+fecha+"&p3="+hini+"&p4="+argumento+"&codigo="+codigo+"&item="+item+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function oculta(argumento){
	document.getElementById(argumento).style["display"]="none"
}
function calend_peq(){
	window.open('calend_peq.php','','scrollbars=no,status=no,resizable=yes,toolbars=0,location=0,directories=0,menubar=no,width=180,height=220');
}
function calendarioPeq(dia,mes,anyo){
	window.opener.document.getElementById('fecha_ent').value=""+dia+"-"+mes+"-"+anyo+"";
	window.close();
}
function calend_peq1(id){
	window.open('calend_peq.php?id='+id+'','','scrollbars=no,status=no,resizable=yes,toolbars=0,location=0,directories=0,menubar=no,width=180,height=220');
}
function calend(id){
	window.open('calend_peq.php?id='+id+'','','scrollbars=yes,status=yes,resizable=yes,toolbars=0,location=0,directories=0,menubar=yes,width=180,height=220');
}
function calendarioPeq1(dia,mes,anyo,id){
	window.opener.document.getElementById(id).value=""+dia+"-"+mes+"-"+anyo+"";
	window.close();
}
function editaNotaFecha(nombre_input,campo,id){
	new Ajax.InPlaceEditor('' + nombre_input + '', 'edita.php?id='+id+'&campo='+campo+'&tabla=notas&tipo=fecha',{size:"15"});
}
function editaNota(nombre_input,campo,id){
	new Ajax.InPlaceEditor('' + nombre_input + '', 'edita.php?id='+id+'&campo='+campo+'&tabla=notas',{size:"15"});
}
function editaNotaActividad(nombre_input,campo,id,numero){
	var valores = new Array();
	for(j=0;j<numero;j++)
		{
		valores[j]=document.getElementById(j).value;
		}
	new Ajax.InPlaceCollectionEditor('' + nombre_input + '', 'edita.php?id='+id+'&campo='+campo+'&tabla=notas',{collection: valores,ajaxOptions: {method: 'post'}});
}
function eliminaNota(sesion,fecha,hini,codigo,argumento,id){
	if( ! confirm("¿Realmente quieres eliminar este registro?") ) {
		return false;
	    }
	var url="ficha.php";
	var pars="p1="+sesion+"&p2="+fecha+"&p3="+hini+"&p4="+argumento+"&codigo="+codigo+"&id="+id+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function eliminaNota1(sesion,fecha,hini,codigo,argumento,id){
	if( ! confirm("¿Realmente quieres eliminar este registro?") ) {
		return false;
	    }
	var url="ficha.php";
	var pars="p1="+sesion+"&p2="+fecha+"&p3="+hini+"&p4="+argumento+"&codigo="+codigo+"&id="+id+"&recibido=si";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function editaTareaFecha(nombre_input,campo,id){
	new Ajax.InPlaceEditor('' + nombre_input + '', 'edita.php?id='+id+'&campo='+campo+'&tabla=tareas&tipo=fecha',{size:"15"});
}
function editaTarea(nombre_input,campo,id){
	new Ajax.InPlaceEditor('' + nombre_input + '', 'edita.php?id='+id+'&campo='+campo+'&tabla=tareas',{size:"15"});
}
function registraEditor(sesion,fecha,hini,codigo,argumento,input){
	if($F(input)=='')
		{
		alert('Debes especificar una fecha de entrega para la tarea');
		exit;
		}
	var fecha_ent = $F(input);
	var url="ficha.php";
	var content = FCKeditorAPI.GetInstance('area').GetXHTML();
	var out = '=';
	var add = '[igual]';	
	var content_filtrado = replaceChars(content,out,add);
	var out = '?';
	var add = '~inte~';
	var content_filtrado1 = replaceChars(content_filtrado,out,add);
	var pars="p1="+sesion+"&p2="+fecha+"&p3="+hini+"&p4="+argumento+"&codigo="+codigo+"&fecha_ent="+fecha_ent+"";
	var parametros = ""+pars+"&texto="+content_filtrado1+"";
	var ajax = new Ajax.Request( url, {
				parameters: parametros,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function registraEditor2(sesion,fecha,hini,codigo,argumento){
	var url="ficha.php";
	var content = FCKeditorAPI.GetInstance('area').GetXHTML();
	var out = '=';
	var add = '[igual]';	
	var content_filtrado = replaceChars(content,out,add);
	var out = '?';
	var add = '~inte~';
	var content_filtrado1 = replaceChars(content_filtrado,out,add);
	var pars="p1="+sesion+"&p2="+fecha+"&p3="+hini+"&p4="+argumento+"&codigo="+codigo+"";
	var parametros = ""+pars+"&texto="+content_filtrado1+"";
	var ajax = new Ajax.Request( url, {
				parameters: parametros,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function registraEditor3(sesion,fecha,hini,codigo,argumento,numero_items){
	var docente = $F('doc');
	if(docente == '0')
		{
		alert('Debes elegir un destinatario o la opción "No usa SIESTTA"');
		exit;
		}
	var url="ficha.php";
	var content = FCKeditorAPI.GetInstance('area').GetXHTML();
	var out = '=';
	var add = '[igual]';	
	var content_filtrado = replaceChars(content,out,add);
	var out = '?';
	var add = '~inte~';
	var content_filtrado1 = replaceChars(content_filtrado,out,add);
	var params = Form.serialize($('tut'));
	var pars="p1="+sesion+"&p2="+fecha+"&p3="+hini+"&p4="+argumento+"&codigo="+codigo+"&numero_items="+numero_items+"&destin="+docente+"";
	var parametros = ""+pars+"&texto="+content_filtrado1+"&"+params+"";
	var ajax = new Ajax.Request( url, {
				parameters: parametros,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function editaObsFecha(nombre_input,campo,id){
	new Ajax.InPlaceEditor('' + nombre_input + '', 'edita.php?id='+id+'&campo='+campo+'&tabla=observaciones&tipo=fecha',{size:"15"});
}
function editaObs(nombre_input,campo,id){
	new Ajax.InPlaceEditor('' + nombre_input + '', 'edita.php?id='+id+'&campo='+campo+'&tabla=observaciones',{size:"15"});
}
function listaCartas(){
	var agr=$F('agr');
	var url="inf_car.php";
 	var pars="agr="+agr+"&p1=lista";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function redactaCarta(agr){
	var url="inf_car.php";
 	var pars="agr="+agr+"&p1=redacta";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function grabaCarta(agr){
	var url="inf_car.php";
	var content = FCKeditorAPI.GetInstance('area').GetXHTML();
	var out = '=';
	var add = '[igual]';	
	var content_filtrado = replaceChars(content,out,add);
	var out = '?';
	var add = '~inte~';
	var content_filtrado1 = replaceChars(content_filtrado,out,add);
 	var pars="agr="+agr+"&p1=lista&texto="+content_filtrado1+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function eliminaCarta(agr,id){
	if( ! confirm("¿Realmente quieres eliminar este registro?") ) {
		return false;
	    }
	var url="inf_car.php";
	var pars="agr="+agr+"&p1=lista&id="+id+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function editaCarta(agr,id){
	var url="inf_car.php";
	var pars="agr="+agr+"&p1=edita&id="+id+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function presentaEval(agr){
	var alu=$F('alu');
	var url='inf_eva.php';
	var pars="agr="+agr+"&alu="+alu+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function redactaEvaluacion(agr,alu){
	var url='inf_eva.php';
	var pars="agr="+agr+"&alu="+alu+"&p1=redacta";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function redactaEvaluacion1(agr,fecha){
	var alu=$F('alu');
	var url='inf_eva.php';
	var pars="agr="+agr+"&alu="+alu+"&fecha="+fecha+"&p1=redacta";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function editaEvaluacion(agr,alu,fecha){
	var url='inf_eva.php';
	var pars="agr="+agr+"&alu="+alu+"&fecha="+fecha+"&p1=redacta";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function editaApunteEval(nombre_input,campo,id){
	new Ajax.InPlaceEditor('' + nombre_input + '', 'edita.php?id='+id+'&campo='+campo+'&tabla=evaluacion',{size:"15"});
}
function registraApunteEval(agr,alu,fecha){
	var materia = $F('nombre');
	var nota = $F('nota');
	var observaciones = $F('observaciones');
	if(materia == '')
		{
		alert('Debes especificar el proyecto');
		exit;
		}
	var url='inf_eva.php';
	var pars="agr="+agr+"&alu="+alu+"&fecha="+fecha+"&nombre="+materia+"&nota="+nota+"&observaciones="+observaciones+"&p1=redacta";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function atrasEval(agr,alu){
	var url='inf_eva.php';
	var pars="agr="+agr+"&alu="+alu+"";
	var ajax = new Ajax.Request( url, {
				parameters: pars,
				method: "post",
				onComplete: procesaRespuestaDoc
				})
}
function editaRecuperacion(nombre_input,campo,periodo,codigo,agrupamiento,tipo){
	if(tipo == 'borra')
		{
		if( ! confirm("¿Realmente quieres eliminar este registro?") ) {
		return false;
	   	}
		}
	new Ajax.InPlaceEditor('' + nombre_input + '', 'edita.php?campo='+campo+'&tabla=recuperaciones&id='+periodo+'&codigo='+codigo+'&agrupamiento='+agrupamiento+'&tipo='+tipo+'',{size:"15"});
}
///////////////////////////////////////////////////////////////////////
//Funciones con PDF  excel y graficos//////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
function abrePdf(url){
	window.open('pdf/'+url+'');
}
function abregrafico(url)
{
window.open('../grafico/'+url+'');
}
function abreExcel(url)
{
window.open('../excel/'+url+'');
}
function abreExceld(url,argumento1)
{
window.open('../excel/'+url+'?p1='+argumento1 +'');
}
function abre_pdf(url)
{
window.open('../pdf/'+url+'');
}
function abre_pdfs(url,argumento1,argumento2)
{
	window.open('../pdf/'+url+'?p1='+argumento1+'&p2='+argumento2+'');
}
function abre_pdfsd(url,argumento1)
{
	window.open('../pdf/'+url+'?p1='+argumento1 +'');
}
function pdf(url,id){
	var argumento = $F(id);
	window.open('pdf/'+url+'?p1='+argumento+'');
}
function pdf1(url,argumento1,argumento2)
		{
	window.open('pdf/'+url+'?p1='+argumento1+'&p2='+argumento2+'');
}
function pdf2(url,argumento1,argumento2,argumento3)
			{
	window.open('pdf/'+url+'?p1='+argumento1+'&p2='+argumento2+'&p3='+argumento3+'');
}		
function pdf3(url,argumento1,argumento2,argumento3,argumento4)
				{
	window.open('pdf/'+url+'?p1='+argumento1+'&p2='+argumento2+'&p3='+argumento3+'&p4='+argumento4+'');
}		
function pdf4(url,argumento1,argumento2,argumento3,argumento4,argumento5)
				{
	window.open('pdf/'+url+'?p1='+argumento1+'&p2='+argumento2+'&p3='+argumento3+'&p4='+argumento4+'&p5='+argumento5+'');
}		
function pdf5(url,argumento1,argumento2,argumento3,argumento4,argumento5,argumento6)
				{
	window.open('pdf/'+url+'?p1='+argumento1+'&p2='+argumento2+'&p3='+argumento3+'&p4='+argumento4+'&p5='+argumento5+'&p6='+argumento6+'');
}
function pdfTutoriaBlanco(url,argumento1,argumento2,argumento3,argumento4,argumento5,numero){
	var params = Form.serialize($('tut'));
	window.open('pdf/'+url+'?p1='+argumento1+'&p2='+argumento2+'&p3='+argumento3+'&p4='+argumento4+'&p5='+argumento5+'&numero='+numero+'&'+params+'');
}
