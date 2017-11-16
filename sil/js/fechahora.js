function fechaactual(){
    meses = new Array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
    dias = new Array("Domingo","Lunes","Martes","Mi&eacute;rcoles","Jueves","Viernes","S&aacute;bado");
    var curdate=new Date();
    var mes=curdate.getMonth();
    //var mes2 = mes + 1;
    var dia_num=curdate.getDate();
    var dia_sem=curdate.getDay();
    var anio=curdate.getYear();

    if(anio < 2000)
        anio = 1900 + anio;

    if (dia_num >= 10)
        fechaimprimible = dias[dia_sem] + ", " + dia_num + " de " + meses[mes]+" del "+anio;


    if (dia_num <= 9)
        fechaimprimible = dias[dia_sem] + ", " + "0" + dia_num + " de " + meses[mes] + " del " + anio;

    document.getElementById("fechaactual").innerHTML =  fechaimprimible;

}

function horaactual(){
    momentoActual = new Date();
    hora = momentoActual.getHours();
    hora = ( hora < 10 )? "0" + hora: hora;
    minuto = momentoActual.getMinutes();
    minuto = ( minuto < 10 )? "0" + minuto: minuto;
    segundo = momentoActual.getSeconds();
    segundo = ( segundo < 10 )? "0" + segundo: segundo;

    if (hora >= 12 && hora < 24)
        apm = " p.m.";
    else
        apm = " a.m.";

    horaImprimible = hora + ":" + minuto + ":" + segundo + apm;

    document.getElementById("horaactual").innerHTML = horaImprimible;

    setTimeout("horaactual()",1000);
}



