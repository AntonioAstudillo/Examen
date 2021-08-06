<?php

if(isset($_POST))
{
   require_once 'auxiliares/Consultas.php';

   $id = $_GET['id'];
   $nombre = $_POST['nombre'];
   $apellidoP = $_POST['apellidoP'];
   $apellidoM = $_POST['apellidoM'];
   $correo = $_POST['correo'];
   $fechaN = $_POST['fechaN'];
   $celular = $_POST['celular'];

   if($_POST['telefono']== 'No tiene'){
      $telefono = null;
   }else {
      $telefono = $_POST['telefono'];
   }

   //($id , $nombre , $apellidoP , $apellidoM , $correo , $telefono , $fechaN , $celular)
   $objeto = new Consultas();

   $resultado = $objeto->actualizarEmpleado($id , $nombre , $apellidoP , $apellidoM , $correo , $telefono , $fechaN , $celular);


   if($resultado){
      echo "Los cambios se actualizaron con exito";
      header("Refresh:3; url=menu.php");
   }else{
      echo "Hubo un problema al actualizar los datos";
      header("Refresh:3; url=menu.php");
   }
}




 ?>
