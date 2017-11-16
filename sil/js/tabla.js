//FUnciones para resaltar las filas de la tabla cuando pasa el mouse por ensema de cada fila
  var anterior = "";
  var a = -1;
      
function resaltar(obj) {               
		if (anterior != obj)
				obj.style.backgroundColor='#FFCC66';////'#fad163';/*'#ffcc00';*/
}

function normal(obj,b) {                
		if (anterior != obj)
				if (b == 1)
					//obj.style.backgroundColor='#E7F0FA';
                                        obj.style.backgroundColor='#E7F0FA';
				else
					obj.style.backgroundColor='#FFFFFF';////'#FFFFCC';
}

function marcar(obj,b) {
		/* despinto la anterior */                   
		if (anterior) 
				if (a != -1){
					if (a == 1)
						/*anterior.style.backgroundColor='#E7F0FA';*/
                                                anterior.style.backgroundColor='#E7F0FA';

					else
						anterior.style.backgroundColor='#FFFFFF';////'#FFFFCC';
				
						var fa=anterior.getElementsByTagName('td');
						fa[0].innerHTML="<input name=rbSeleccionado name=rbSeleccionado type=radio />";
				}
				
		a = b;
		/*obj.style.backgroundColor='#CCFFCC';////'#fdfbe7';*/
                obj.style.backgroundColor='#CCFFCC';
		anterior = obj;                
		var f=obj.getElementsByTagName('td'); 
		if (f.length>0){
				f[0].innerHTML="<input name=rbSeleccionado name=rbSeleccionado type=radio checked=checked />"                   
		}                                          
}
