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

   public function contarEmpleados(){
      $consulta = "SELECT COUNT(*) FROM empleado";

      $resultado = $this->conexion->query($consulta);

      $resultadoMaximo = $resultado->fetch_assoc();

      return $resultadoMaximo;

   }

   //Este metodo me va a leer todos los registros de la tabla Empleados
   public function leerTodos($pagina , $numElementos){
      $consulta = "SELECT * FROM empleado LIMIT " . (($pagina-1) *$numElementos). ",". $numElementos;

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

   public function leerEmpleado($id){
      $sql = "SELECT * FROM empleado WHERE idEmpleado = $id";

      $resultado = $this->conexion->query($sql);

      if($resultado){
         $resultado = $resultado->fetch_assoc();
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

   public function actualizarEmpleado ($id , $nombre , $apellidoP , $apellidoM , $correo , $telefono , $fechaN , $celular){
      $sql = "UPDATE empleado SET nombre = '$nombre' , apellidoMaterno = '$apellidoM' , correo = '$correo', fechaNacimiento = '$fechaN' , telefono = '$telefono' , celular = '$celular' WHERE idEmpleado = $id ";

      $resultado = $this->conexion->query($sql);

      if($this->conexion->affected_rows > 0){
         return true;
      }else{
         return false;
      }
   }

   public function buscarUsuario($nombre , $password){
      $sql = "SELECT * FROM usuarios WHERE nombre = '$nombre' AND pass = '$password'; ";

      $resultado = $this->conexion->query($sql);

      if($resultado->num_rows != 0){
         return true;
      }else{
         return false;
      }
   }
}



?>
