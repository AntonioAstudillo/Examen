let cerrar = document.getElementById('cerrar');

cerrar.addEventListener('click',cerrarSesion);

function cerrarSesion(){
   localStorage.removeItem('user');
   window.location.href = 'index.php';
}
