<?php
header('Content-type: application/json; charset=utf-8');

require_once 'auxiliares/Conexion.php';

$objeto = new Conexion();
$respuesta = []; //En este array, voy a guardar los datos de la busqueda

$valor = $_GET['valor'];
$bandera = $_GET['bandera'];

switch ($bandera) {
   case 1://empresa
      $consulta = "SELECT empleado.* FROM empleado INNER JOIN empresa
                    ON empleado.idEmpresa = empresa.idEmpresa
                   WHERE empresa.nombre = '$valor';";
      break;
   case 2://departamento
      $consulta = "SELECT empleado.* FROM empleado INNER JOIN departamento
                ON empleado.idDepartamento = departamento.idDepartamento
                WHERE departamento.nombre = '$valor';";
      break;
   case 3://nombre
         $consulta = "SELECT * FROM empleado where nombre like '%$valor%';";
      break;
}

$conexion = $objeto->getConexion();

$resultado = $conexion->query($consulta);

while($empleado = $resultado->fetch_assoc()){
   $respuesta[] = $empleado;
}

echo json_encode($respuesta);

?>
