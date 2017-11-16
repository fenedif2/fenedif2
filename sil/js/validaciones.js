//Funci�n para los eventos de teclado
function hkp( evt )
	{
		_KeyCode = ( window.event ) ? evt.keyCode : evt.which;
		return( _KeyCode );
	}
function abreExcel(url)
{
window.open('../excel/'+url+'');
}
function abreExceld(url,argumento1)
{
window.open('../pdf/'+url+'?p1='+argumento1 +'');
}