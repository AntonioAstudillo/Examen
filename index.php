<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
   <meta charset="utf-8">
   <title>Inicio</title>
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;1,300;1,400&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="css/login.css">
</head>
<body>
   <div class="container contenedor border p-5">
      <form class="" action="" method="post">
         <h1 class="text-info text-center mb-3">Bienvenido</h1>
         <div class="input-group mb-2">
            <div class="input-group-prepend">
               <div class="input-group-text"><i class="fas fa-user"></i></div>
            </div>
            <input type="text" class="form-control" id="usuario" placeholder="Usuario">
         </div>
         <div class="input-group mb-2 mt-4">
            <div class="input-group-prepend">
               <div class="input-group-text"><i class="fas fa-lock"></i></div>
            </div>
            <input type="password" class="form-control" id="pass" placeholder="Password">
         </div>
         <div class="text-center mt-3">
            <input id="boton" type="submit" class="btn btn-info text-center font-weight-bold" value="Ingresar">
         </div>
      </form>
   </div>
   <script src="js/validarUsuario.js" charset="utf-8"></script>
</body>
</html>
