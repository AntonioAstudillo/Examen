<?php

if(isset($_GET['id'])){
   $id = $_GET['id'];
   require_once 'auxiliares/Consultas.php';

   $objeto = new Consultas();
   $resultado = $objeto->leerEmpleado($id);
}else{
   header("Location:menu.php");
}

?>


<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
   <meta charset="utf-8">
   <title>Formulario edicion</title>
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;1,300;1,400&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="css/estilos.css">

   <style media="screen">
   *{
      font-family: 'Open Sans', sans-serif;
   }
   </style>
</head>
<body>
   <header class="container-fluid p-0">
      <div class="d-flex justify-content-between header p-0 aling-items-baseline">
         <div class="p-0 mt-2">
            <p class="text-white font-weight-bold logo"><a href="menu.php">Examen</a>   </p>
         </div>
      </div>
   </header>
   <div class="container border mt-3 p-4">
      <h1 class="text-center text-info mb-3">Formulario de Actualización</h1>
      <form class="" action="guardarCambios.php?id=<?php echo $resultado['idEmpleado']; ?>" method="post" autocomplete="off">
         <div class="row">
            <div class="col-4">
               <label for="nombre">Nombre</label>
               <input class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $resultado['nombre']; ?>">
            </div>
            <div class="col-4">
               <label for="apellidoP">Apellido Paterno</label>
               <input class="form-control" type="text" name="apellidoP" id="apellidoP" value="<?php echo $resultado['apellidoPaterno']; ?>">
            </div>
            <div class="col-4">
               <label for="apellidoM">Apellido Materno</label>
               <input class="form-control" type="text" name="apellidoM" id="apellidoM" value="<?php echo $resultado['apellidoMaterno']; ?>">
            </div>
         </div>

         <div class="row mt-3">
            <div class="col-12">
               <label for="correo">Correo Electrónico</label>
               <input class="form-control" type="email" name="correo" value="<?php echo $resultado['correo']; ?>" id="correo">
            </div>
         </div>

         <div class="row mt-3">
            <div class="col-6">
               <label for="fechaN">Fecha de Nacimiento</label>
               <input readonly class="form-control" type="text" name="fechaN" value="<?php echo $resultado['fechaNacimiento']; ?>" id="fechaN">
            </div>
            <div class="col-4">
               <label for="fecha">Calendario</label>
               <input disabled class="form-control" type="date" id="fecha" name="fecha" value="">
            </div>
            <div class="col-2">
               <label class="text-center" for="modificarF">Modificar Fecha</label>
               <button class="btn btn-info btn-block font-weight-bold" type="button" name="button" id="btnActivar">Activar</button>
            </div>
         </div>

         <div class="row mt-3">
            <div class="col-6">
               <label for="celular">Celular</label>
               <input class="form-control" type="text" name="celular" id="celular" value="<?php echo $resultado['celular']; ?>">
            </div>
            <div class="col-6">
               <label for="telefono">Teléfono</label>
               <input class="form-control" type="text" name="telefono" id="telefono" value="<?php echo (isset($resultado['telefono'])) ? $resultado['telefono'] : 'No tiene' ?>">
            </div>
         </div>

         <div class="row mt-4 text-center">
            <div class="col-12">
               <input type="submit" class="btn btn-primary font-weight-bold" name="btnGuardar" value="Guardar Cambios">
            </div>
         </div>

      </form>
   </div>

   <script src="js/actualizar.js" charset="utf-8"></script>
</body>
</html>
