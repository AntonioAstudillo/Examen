<?php

 require_once 'auxiliares/Consultas.php';

 if(isset($_GET['pag'])){
    $pagina = $_GET['pag'];
 }else{
    $pagina = 1;
 }

  $numElementos = 8;

 $objetoConsultas = new Consultas();
 $resultadoMaximo = $objetoConsultas->contarEmpleados();
 $resultEmpleados = $objetoConsultas->leerTodos($pagina , $numElementos);
 $resultEmpresas = $objetoConsultas->leerEmpresa();
 $resultDepartamento = $objetoConsultas->leerDepartamento();

 //codigo de paginador





if(!$resultEmpleados && !$resultEmpresas && !$resultDepartamento){
   die("Error:1");
}

?>

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
         <div class="d-flex justify-content-between header p-0 aling-items-baseline">

            <div class="p-0 mt-2">
               <p class="text-white font-weight-bold logo"><a href="menu.php">Examen</a>   </p>
            </div>

            <div class="row p-0 mt-2 d-flex justify-content-end aling-items-baseline">
               <div class="col-5 p-0 mr-1">
                  <select id="opcionBusqueda" class="form-control" name="">
                     <option value="opcion">Elige una Opción</option>
                     <option value="empresa">Empresa</option>
                     <option value="departamento">Departamento</option>
                     <option value="nombre">Nombre</option>
                  </select>
               </div>

               <div class="col-3 p-0 mr-1">
                  <input class="form-control" type="text" id="buscadorText" placeholder="Buscar...">
               </div>

               <div class="col-3 p-0 mr-1">
                  <button class="btn btn-primary" type="button" name="button" id="buscador"><i class="fas fa-search"></i></button>
               </div>
            </div>
         </div>
      </header>

      <div class="container">
         <div class="row mt-4">
            <div class="col-6">
               <select id="empresaSelect" class="form-control" name="">
                  <option value="">Elige una empresa</option>
                  <?php while($empresa = $resultEmpresas->fetch_assoc()): ?>
                     <option value="<?php echo $empresa['nombre']; ?>"><?php echo $empresa['nombre']; ?></option>
                  <?php endwhile; ?>
               </select>

            </div>

            <div class="col-6">
               <select id="departamentos" class="form-control" name="">
                  <option value="">Elige un departamento</option>
               </select>

            </div>
         </div>
      </div>

      <!-- AQUI IRA LA TABLA CON LOS USUARIOS -->
      <div class="container p-0">
         <table class="table table-striped table-bordered mt-4">
            <thead class="thead encabezado_tabla">
               <!-- Encabezados -->
               <tr class="text-center">
                  <th>Id</th>
                  <th>Nombre</th>
                  <th>Fecha Nacimiento</th>
                  <th>Correo</th>
                  <th>Celular</th>
                  <th>Fecha de Ingreso</th>
                  <th>Acciones</th>
               </tr>
            </thead>
            <tbody id="cuerpoTabla">
               <?php while($empleado = $resultEmpleados->fetch_assoc()): ?>
                  <tr class="text-center">
                     <td><?php echo $empleado['idEmpleado']; ?></td>
                     <td><?php echo $empleado['nombre'].' '.$empleado['apellidoPaterno'] .' '.$empleado['apellidoMaterno']; ?> </td>
                     <td><?php echo $empleado['fechaNacimiento']; ?></td>
                     <td><?php echo $empleado['correo']; ?></td>
                     <td><?php echo $empleado['celular']; ?>1</td>
                     <td><?php echo $empleado['fechaIngreso']; ?></td>
                     <td>
                        <i id="editar"  value='<?php echo $empleado['idEmpleado']; ?>' class="text-warning lead far fa-edit"></i>
                        <i data-toggle="modal" data-target="#modal1" id="eliminar"  value='<?php echo $empleado['idEmpleado']; ?>' class="text-danger lead far fa-trash-alt"></i>
                     </td>
                  </tr>
               <?php endwhile; ?>
            </tbody>
         </table>



         <!-- BLOQUE DE PAGINACION -->
         <nav aria-label="Page navigation example">
            <ul class="pagination">
            <?php if(isset($_GET['pag'])): ?>
               <?php if($_GET['pag']>1): ?>
                  <li class="page-item"><a class="page-link" href="index.php?pag=<?php echo $_GET['pag']-1; ?>">Anterior</a></li>
               <?php else: ?>
                  <li class="page-item">Anterior</li>
               <?php endif; ?>
            <?php else: ?>
               <li class="page-item">Anterior</li>
            <?php endif; ?>

            <?php if(isset($_GET['pag'])): ?>
               <?php if(($pagina * $numElementos)<$resultadoMaximo ): ?>
                  <li class="page-item"><a class="page-link" href="menu.php?pag=<?php echo $_GET['pag'] + 1 ?>">Siguiente</a></li>
               <?php else: ?>
                  <li class="page-item">Siguiente</li>
               <?php endif; ?>
            <?php else: ?>
               <li class="page-item"><a class="page-link" href="menu.php?pag=2">Siguiente</a></li>
            <?php endif; ?>
            </ul>
         </nav>
      </div>


      <!-- CREAMOS EL MODAL DE EDICION EL CUAL SERÁ UN FORMULARIO -->
      <div class="modal" tabindex="-1" role="dialog" id="modal1">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">Elimando Empleados</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <p>El registro fue eliminado de forma correcta</p>
               </div>
               <div class="modal-footer">
                  <button id="aceptarDel" type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
               </div>
            </div>
         </div>
      </div>
      <!-- <footer class="bg-black">Derechos Reservados copyright &copy</footer> -->
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
      <script src="js/script.js" charset="utf-8"></script>
   </body>
</html>
