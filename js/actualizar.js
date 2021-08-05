var btnActivar = document.getElementById('btnActivar');
var btnFecha = document.getElementById('fecha');

btnActivar.onclick = activarCalendario;
btnFecha.onchange = cambiarFecha;


function activarCalendario(){
   btnFecha.disabled = false;
}

function cambiarFecha(){
   document.getElementById('fechaN').value = btnFecha.value;
}
