<?php

require_once 'Conexion.php';

class Consultas{
   private $conexion;

   public function __construct(){
      $this->conexion = new Conexion();
      $this->conexion = $this->conexion->getConexion();
   }

   public function __destruct(){
      $this->conexion->close();
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

   //Con esta funcion voy a buscar a los empleados correspondientes
   //al departamento y empresa seleccionados
   public function buscarEmpleadoDept($empresa , $departamento){
      $sql = "select empleado.* from empleado
               inner join empresa
               on empleado.idEmpresa = empresa.idEmpresa
               inner join departamento on
               empleado.idDepartamento = departamento.idDepartamento
               where empresa.nombre = '$empresa' and departamento.nombre = '$departamento';";

      $resultado = $this->conexion->query($sql);

      if($resultado){
         return $resultado;
      }else{
         return false;
      }

   }

   public function eliminarEmpleado($id){
      $sql = "DELETE FROM empleado WHERE idEmpleado = $id";

      $resultado = $this->conexion->query($sql);

      if($this->conexion->affected_rows > 0){
         return true;
      }else{
         return false;
      }
   }
}



?>
