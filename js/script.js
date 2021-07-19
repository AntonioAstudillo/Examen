var elementoEditar = document.getElementsByClassName('fa-edit');
var elementoEliminar = document.getElementsByClassName('fa-trash-alt');
var empresas = document.getElementById('empresaSelect');
var buscador = document.getElementById('buscador');
var peticion = new XMLHttpRequest();
var peticionHttp;

empresas.addEventListener('change',crearDepartamentos);
buscador.addEventListener('click',buscarUsuario);

//Activo eventos a icono editar
activarEvento(elementoEditar);

//Activo eventos a icono eliminar
activarEvento(elementoEliminar);


function buscarUsuario(){
   let valor = document.getElementById('buscadorText').value;
   let opcion = document.getElementById('opcionBusqueda').value;
   let bandera = 0;

   if(opcion == 'opcion' || valor == '' ){
      alert("Coloque los datos correctamente");
   }else{

      switch(opcion){
         case 'empresa':
           bandera = 1;
         break;
         case 'departamento':
           bandera = 2;
         break;
         case 'nombre':
           bandera = 3;
         break;
      }

      peticionHttp = new XMLHttpRequest();
      peticionHttp.onreadystatechange = buscar;
      peticionHttp.open('GET','buscar.php?valor='+valor+'&bandera='+bandera);
      peticionHttp.send();
   }


}

function buscar(){
   if(peticionHttp.readyState == 4)
   {
      if(peticionHttp.status == 200)
      {
         let datos = JSON.parse(peticionHttp.responseText);
         let tabla = document.getElementById('cuerpoTabla');
         let contenido = '';
         tabla.innerHTML = '';

         for (var i = 0; i < datos.length; i++)
         {
            contenido += '<tr class="text-center">';
            contenido +=  "<td>"+datos[i]['idEmpleado'];+"</td>";
            contenido +=  "<td>"+datos[i]['nombre']+' '+datos[i]['apellidoPaterno']+' '+datos[i]['apellidoMaterno']+"</td>";
            contenido +=  "<td>"+datos[i]['fechaNacimiento'];+"</td>";
            contenido +=  "<td>"+datos[i]['correo'];+"</td>";
            contenido +=  "<td>"+datos[i]['celular'];+"</td>";
            contenido +=  "<td>"+datos[i]['fechaIngreso'];+"</td>";
            contenido += "<td> <i id = 'editar'  value=' "+datos[i]['idEmpleado']+"' class='text-warning lead far fa-edit'> </i>";
            contenido += "<i id='eliminar'  value='"+datos[i]['idEmpleado']+"' class='text-danger lead far fa-trash-alt'> </i> </td>";
            contenido += '</tr>';
         }
         tabla.innerHTML = contenido;
         //Activo eventos a icono editar
         activarEvento(elementoEditar);

         //Activo eventos a icono eliminar
         activarEvento(elementoEliminar);
      }
   }
}

//Esta funcion es de utilidad, la voy a utilizar para eliminar o editar un elemento
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
   if(peticion.readyState == 4)
   {
      if(peticion.status == 200)
      {
         let datos = JSON.parse(peticion.responseText);
          document.getElementById('departamentos').innerHTML = "<option>"+'Elige un departamento'+"</option>";

         for (var i = 0; i < datos.length; i++)
         {
            //<option value="">Elige un departamento</option>
            document.getElementById('departamentos').innerHTML += "<option>"+datos[i].nombre+"</option>";
         }
      }
   }

}
