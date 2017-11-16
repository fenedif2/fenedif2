/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function reloj(){
    momentoActual = new Date()
    hora = momentoActual.getHours()
    hora = ( hora < 10 )? "0" + hora: hora;
    minuto = momentoActual.getMinutes()
    minuto = ( minuto < 10 )? "0" + minuto: minuto;
    segundo = momentoActual.getSeconds()
    segundo = ( segundo < 10 )? "0" + segundo: segundo;

    horaImprimible = hora + ":" + minuto + ":" + segundo

    document.getElementById("horaactual").innerHTML = horaImprimible

    setTimeout("reloj()",1000)
}



