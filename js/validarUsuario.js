let boton = document.getElementById('boton');

boton.onclick = validarUsuario;

function validarUsuario(e){
   let usuario = document.getElementById('usuario').value;
   let pass = document.getElementById('pass').value;
   let peticion = new XMLHttpRequest();
   let variables = '';

   if(usuario != '' && pass !=''){
      variables = "usuario="+usuario+"&pass="+pass;
      peticion.onreadystatechange = comprobarUsuario;
      peticion.open('POST','validar.php');
      peticion.setRequestHeader('Content-type','application/x-www-form-urlencoded');
      peticion.send(variables);
   }else{
      alert("Ingrese los datos de forma correcta");
   }

   function comprobarUsuario(){
      if(peticion.readyState == 4){
         if(peticion.status == 200){
            if(peticion.responseText == 'true'){
               localStorage.setItem('user',document.getElementById('usuario').value);
               window.location.href = 'menu.php';
            }else{
               alert("Las credenciales son incorrectas");
               return false;
            }
         }
      }
   }

   e.preventDefault();
}
