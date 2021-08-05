<?php

require_once 'auxiliares/Consultas.php';

// $_POST['usuario'] = 'antonio';
// $_POST['pass'] = '4881245';

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
