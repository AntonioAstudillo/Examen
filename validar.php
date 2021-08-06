<?php

require_once 'auxiliares/Consultas.php';

if(isset($_POST)){
   $usuario = $_POST['usuario'];
   $pass = $_POST['pass'];
   $objeto = new Consultas();

   $resultado = $objeto->buscarUsuario($usuario , $pass);

   if($resultado){
      echo 'true';
   }else{
      echo 'false';
   }
}else{
   echo 'falso';
}


?>
