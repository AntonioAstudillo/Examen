var elementoEditar = document.getElementsByClassName('fa-edit');
var elementoEliminar = document.getElementsByClassName('fa-trash-alt');
var empresas = document.getElementById('empresaSelect');
var peticion = new XMLHttpRequest();


empresas.addEventListener('change',crearDepartamentos);

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

function crearDepartamentos(){
   let valor = empresas.value;
   valor = "empresa="+valor;
   peticion.onreadystatechange = llenarSelect;
   peticion.open('GET','consultaEmpresa.php?'+valor,true);
   peticion.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
   peticion.send();
}

function llenarSelect(){
   if(peticion.readyState == 4){
      if(peticion.status == 200){
          let datos = JSON.parse(peticion.responseText);
           document.getElementById('departamentos').innerHTML = "<option>"+'Elige un departamento'+"</option>";

          for (var i = 0; i < datos.length; i++) {
             // <option value="">Elige un departamento</option>
             document.getElementById('departamentos').innerHTML += "<option>"+datos[i].nombre+"</option>";
          }
      }
   }

}
