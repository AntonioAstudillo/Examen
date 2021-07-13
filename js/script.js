var elementoEditar = document.getElementsByClassName('fa-edit');
var elementoEliminar = document.getElementsByClassName('fa-trash-alt');


//Activo eventos a icono editar
activarEvento(elementoEditar);

//Activo eventos a icono eliminar
activarEvento(elementoEliminar);

function mensaje(){
   console.log(parseInt(this.getAttribute('value')) );
}

function activarEvento(elemento){
   let tam = elemento.length;

   for (var i = 0; i < tam; i++) {
      elemento[i].addEventListener('click',mensaje);
   }
}
