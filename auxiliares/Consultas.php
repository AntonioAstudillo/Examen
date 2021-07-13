<?php

require_once 'Conexion.php';

class Consultas{
   private $conexion;

   public function __construct(){
      $this->conexion = new Conexion();
      $this->conexion = $this->conexion->getConexion();
   }
   //Este metodo me va a leer todos los registros de la tabla Empleados
   public function leerTodos(){
      $consulta = "SELECT * FROM empleado;";
      $resultado = $this->conexion->query($consulta);

      if($resultado){
         return $resultado;
      }else{
         return false;
      }
   }

   public function leerEmpresa(){
      $consulta = 'SELECT * FROM empresa';
      $resultado = $this->conexion->query($consulta);

      if($resultado){
         return $resultado;
      }else{
         return false;
      }
   }

   public function leerDepartamento(){
      $consulta = 'SELECT * FROM departamento';
      $resultado = $this->conexion->query($consulta);

      if($resultado){
         return $resultado;
      }else{
         return false;
      }
   }
}



?>
