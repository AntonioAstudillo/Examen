<!DOCTYPE html>
<html lang="es" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Menú Principal</title>
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="css/estilos.css">
   </head>
   <body>
      <!-- AQUI IRA EL BUSCADOR -->
      <header class="container-fluid p-0">
         <div class="d-flex justify-content-between inline-block header">
            <div class="p-0 mt-2">
               <p class="text-white font-weight-bold logo">Examen</p>
            </div>
            <div class="row p-0 mt-2">
               <div class="col-5 p-0 mr-1">
                  <select  class="form-control" name="">
                     <option value="">Elige una Opción</option>
                     <option value="">Empresa</option>
                     <option value="">Departamento</option>
                     <option value="">Nombre</option>
                  </select>
               </div>
               <div class="col-3 p-0 mr-1">
                  <input class="form-control" type="text" id="buscador" placeholder="Buscar...">
               </div>
               <div class="col-3 p-0 mr-1">
                  <button class="btn btn-primary" type="button" name="button"><i class="fas fa-search"></i></button>
               </div>
            </div>
         </div>
      </header>

      <!-- AQUI IRA LA TABLA CON LOS USUARIOS -->

      <div class="container-fluid p-0">
         <table class="table table-striped table-bordered">
            <thead class="thead encabezado_tabla">
               <!-- Encabezados -->
               <tr class="text-center">
                  <th>Id</th>
                  <th>Nombre</th>
                  <th>Apellido Materno</th>
                  <th>Apellido Paterno</th>
                  <th>Fecha Nacimiento</th>
                  <th>Correo</th>
                  <th>Género</th>
                  <th>Teléfono</th>
                  <th>Celular</th>
                  <th>Fecha de Ingreso</th>
                  <th>Acciones</th>
               </tr>
            </thead>
            <tbody>
               <tr class="text-center">
                  <td>1</td>
                  <td>Antonio</td>
                  <td>Astudillo</td>
                  <td>Jaimes</td>
                  <td>29/12/1994</td>
                  <td>antonio@gmail.com</td>
                  <td>M</td>
                  <td>No tiene</td>
                  <td>3329283921</td>
                  <td>10/07/2021</td>
                  <td rowspan="2">
                     <i id="editar" class="text-warning lead far fa-edit "></i>
                     <i id="eliminar" class="text-danger lead far fa-trash-alt"></i></td>
               </tr>
            </tbody>
         </table>
      </div>

      <script src="js/script.js" charset="utf-8"></script>
   </body>
</html>
