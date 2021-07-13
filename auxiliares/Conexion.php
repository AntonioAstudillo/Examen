<?php

class Conexion{

   private $conexion;

   public function __construct(){

      require_once 'configuracion/config.php';

      $this->conexion = new Mysqli($host , $usuario , $pass , $bd);
      $this->conexion->set_charset('utf8');

   }

   public function getConexion(){
      return $this->conexion;
   }
}


?>
