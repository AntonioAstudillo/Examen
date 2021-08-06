var usuario = localStorage.getItem('user');

if(usuario == null){
   window.location.href = 'index.php';
}
